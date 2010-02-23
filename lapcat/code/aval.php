<?Php
function makeCoolXMLStuff($array,$home="main"){
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
	return $locs;
}

function avalByisbn($isbn,$home="main"){
	if(is_array($isbn)){
		foreach ($isbn as $is){
			$returnArray[$is] = avalByisbn($is);
		}
		return $returnArray;
	}
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
										if(!$multi){return makeCoolXMLStuff($a_status,$home);}
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
		return makeCoolXMLStuff($a_status,$home);
	}
}
?>