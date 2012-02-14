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
			"available-home"=>0,
			"due"=>0,
			"next-due-ts"=>0,
			"due-ts-array"=>array(),
			"holds"=>0,
			"total-copies"=>0,
			"full-marc-record"=>"",
			"marc-record"=>""
			
			);
			foreach ($array as $k=>$v)	{
				if($k=="holds"){
					$holdTemp = explode(" ",$v[0]);
					$locs["holds"] = $locs["holds"] + $holdTemp[0];
				}elseif($k=="marcR"){
			//		$locs["full-marc-record"]=$v["full"];
					$locs["marc-record"]=$v["parsed"];
				}else{
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
						}elseif(strpos(ucwords($v_v),'DUE')){
							$temp = explode(" ",$v_v);
							$locs["due-ts-array"][]=strtotime($temp[1]);
							$locs["due"]++;
							if(strpos(ucwords($v_v),'HOLD') || strpos(ucwords($v_v),'HOLDS')){
								$specialHolds = intVal($temp[2],10);
								$locs["holds"] = $locs["holds"] + $specialHolds;
							}
						}
					}
				}
			}
			foreach($locs["due-ts-array"] as $dta){
				if($dta > $locs["next-due-ts"]){
					$locs["next-due-ts"] = $dta;		
				}	
			}
			$locs["total-copies"]=($locs["due"]+$locs["available"]);
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

function avalByisbn($isbn,$home="main",$cache=false,$marc=520){
	//now for the actual processing of the website
	$url = "http://catalog.lapcat.org/search~S12?/i".$isbn."/i".$isbn."/1%2C1%2C1%2CE/marc&FF=i".$isbn;
	//$url = "http://catalog.lapcat.org/search/i".$isbn;
	$doc = new DOMDocument();
	@$doc->loadHTMLFile($url);
	$elements = $doc->getElementsByTagName('tr');
	$holds = $doc->getElementsByTagName('span');
	$marcRecord = $doc->getElementsByTagName('pre');
	$keep = true;
	$cnt = 0;
	$ls = false;
	$a_status = array();
	$pnv = "";
	$multi = false;//default is that it is not a multi item record

//parse the marc record
	if($marc!=0){
		if (!is_null($marcRecord)) { //you are not parsing the marc record view
			foreach ($marcRecord as $mr) {
				$mcr = explode("\n",$mr->nodeValue);
				$fixedMCR = array();
				$preIndex = 0;
				foreach($mcr as $mr2){
					if(substr($mr2,0,3)=="   "){
						$fixedMCR[$preIndex] .= substr_replace($mr2, "", 0,7);
					}else{
						$fixedMCR[substr($mr2,0,3)] = substr_replace($mr2, "", 0,7);
						$preIndex = substr($mr2,0,3);
					}
					 
				}
				if(isset($fixedMCR[$marc])){$a_status["marcR"]["parsed"] = $fixedMCR[$marc];}else{$a_status["marcR"]["parsed"] = "";}
				$a_status["marcR"]["full"] = $mr->nodeValue;
			}
		}
	}
//Parse out the holds	
	if (!is_null($holds)) {
		foreach ($holds as $hold) {
			if($hold->hasAttributes())
			{
			    $attributes = $hold->attributes;
			    if(!is_null($attributes))
			    {
			        foreach ($attributes as $index=>$attr)
			        {
						if($attr->name == "class" && $attr->value == "bibHolds"){
							$a_status["holds"][] = trim($hold->nodeValue);
						}
			        }
			    }
			} 
		}
	}
	
//parse out the availablity
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


function avalBylink($link,$home="main",$cache=false,$marc=520){
	//now for the actual processing of the website
	
	//$url = "http://catalog.lapcat.org/search/i".$isbn;
	$doc = new DOMDocument();
	$doc->loadHTMLFile($link);
	$elements = $doc->getElementsByTagName('tr');
	$bibItems = $doc->getElementsByTagName('table');
	$marcRecord = $doc->getElementsByTagName('pre');
	$keep = true;
	$cnt = 0;
	$ls = false;
	$a_status = array();
	$pnv = "";
	$multi = false;//default is that it is not a multi item record


print_r($doc);
//parse the marc record
//Parse out the holds	
	if (!is_null($bibItems)) {
		foreach ($bibItems as $bi) {
			if($bi->hasAttributes())
			{
			    $attributes = $bi->attributes;
			    if(!is_null($attributes))
			    {
			        foreach ($attributes as $index=>$attr)
			        {
						if($attr->name == "class" && $attr->value == "bibHolds"){
							$a_status["holds"][] = trim($bi->nodeValue);
						}
			        }
			    }
			} 
		}
	}
/*
//parse out the availablity
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
	}*/
print_r($a_status);
}



?>