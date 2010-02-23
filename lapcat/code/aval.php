<?Php
function makeCoolXMLStuff($array,$home="main",$cache=false,$isbn=0){
	$db = db::getInstance();
	if($cache){ //if the data is stale we need to work with it
		if(is_array($array)){
			$locs = array(
			"main"=>0,
			"coolspring"=>0,
			"fish"=>0,
			"hanna"=>0,
			"kingsford"=>0,
			"rolling"=>0,
			"union"=>0,
			"bookmobile"=>0,
			"available"=>0,
			"available-other"=>0,
			"available-home"=>0
			);
			foreach ($array as $k=>$v)	{
				$loc = explode(" ",substr($k,2));
				foreach ($v as $v_k=>$v_v)	{
					if(strpos(ucwords($v_v),'AVAILABLE')){
						$locs[strtolower(trim($loc[0]))]++;
						if($home == strtolower(trim($loc[0]))){
							$locs["available-home"]++;	
						}else{
							$locs["available-other"]++;
						}
						$locs["available"]++;
					}
				}
			}
		}else{
			$locs=array('error'=>'Could not parse item record.');
		}
		//Lets enter the data into the database.  Making sure to delete it first
		$db->Query("DELETE FROM lapcat.cache_aval WHERE isbn='".$isbn."';");
		$sql = "INSERT INTO lapcat.cache_aval (isbn,updated,cache) VALUES('".$isbn."',NOW(),'".serialize($locs)."');";
		$db->Query($sql);
	}else{//the data is still fresh, do not delete just show it
		//this is kind of an old way of doing it and it should not ever be hit.  Its here mainly as a catch for a mistake
		$db->Query("SELECT cache from lapcat.cache_aval WHERE isbn='".$isbn."';");
		$res = $db->Fetch("row");
		$locs = unserialize($res);
	}
	return $locs;
}

function avalByisbn($isbn,$home="main",$cache=false){
	$db = db::getInstance();
	$returnArray = array();
	if(is_array($isbn)){
		$sql = "SELECT isbn,updated,cache,TIMESTAMPDIFF(SECOND ,updated, now( ) ) AS updatedDiff FROM lapcat.cache_aval WHERE isbn IN ('".implode("','",$isbn)."')";
		$db->Query($sql);
		if($db->Count_res()>0){//there are results
			$res = $db->Fetch("assoc_array");
			foreach($res as $k=>$r){
				if($r["updatedDiff"]>300){
					$returnArray[$r["isbn"]] = avalByisbn($r["isbn"],$home,true);
					$returnArray[$r["isbn"]]["cache"]=1;
				}else{
					 $returnArray[$r["isbn"]] = unserialize($r["cache"]);
					 $returnArray[$r["isbn"]]["cache"]=2;
				}
			}			
		}else{//no results this should not happen very often
			foreach ($isbn as $is){
				$returnArray[$is] = avalByisbn($is,$home,true);
			}
			return $returnArray;
		}

		//lets now deal with the isbn numbers that were not in the database already
		foreach ($isbn as $is){
			if(!isset($returnArray[$is])){
				$returnArray[$is] = avalByisbn($is,$home,true);	
			}
		}
		return $returnArray;
	}
	
	
	//now for the actual processing of the website
	$url = "http://catalog.lapcat.org/search/i".$isbn;
	$doc = new DOMDocument();
	@$doc->loadHTMLFile($url);
	$elements = $doc->getElementsByTagName('tr');
	$keep = true;
	$cnt = 0;
	$ls = false;
	$a_status = array();
	$pnv = "";
	$multi = false;//default is that it is not a multi item record
	if (!is_null($elements)) {
		foreach ($elements as $element) {
		    $nodes = $element->childNodes;
			foreach ($nodes as $node){
				if($node->hasAttributes())
				{
				    $attributes = $node->attributes;
				    if(!is_null($attributes))
				    {
				        foreach ($attributes as $index=>$attr)
				        {
				        	if($attr->value == "browseHeaderData"){$multi = true;} //should only work with a tv show style item
							if($attr->name == "width"){
								if(substr_count($node->nodeValue,"Location")){
									if($ls == true){
										if(!$multi){return makeCoolXMLStuff($a_status,$home,true,$isbn);}
									}else{$ls=true;}
								}
								if($attr->value == "27%"){
									if(!substr_count($node->nodeValue,"Multipart")){
										if(!substr_count($node->nodeValue,"Location")){
											if(!substr_count($node->nodeValue,"Status")){
												$keep = true;
												$pnv = trim($node->nodeValue);											
											}else{$keep = false;}
										}else{$keep = false;}
									}else{$keep = false;}
								}
								if($attr->value == "18%"){
									if($keep){
										if(isset($a_status[$pnv])){
											$a_status[$pnv][] = trim($node->nodeValue);
										}else{
											$a_status[$pnv] = array(trim($node->nodeValue));
										}
									}
								}
							}
				        }
				    }
				} 
			}
		}
		return makeCoolXMLStuff($a_status,$home,true,$isbn);
	}
}
?>