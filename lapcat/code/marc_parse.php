<?php
	include("../objects/db.php");
	$db = db::getInstance();
  //now for the actual processing of the website
	function array_implode($arrays, &$target = array()) {
		if(is_array($arrays)){
		    foreach ($arrays as $item) {
		        if (is_array($item)) {
		            array_implode($item, $target);
		        } else {
		            $target[] = $item;
		        }
		    }
		    return $target;
		}else {return false;}
	}
	function array_smart_implode($array){
		$returnArray = $array;
		foreach($array as $key=>$value){
			if(is_array($value)){
				if(count($value)==1){
					$returnArray[$key]=$value[0];
				}
			}
		}
		return $returnArray;
	}
	function parseMarc($isbn){
		preg_match("/([0-9]*)/",$isbn,$matches);
		$isbn = $matches[0];
		$url = "http://catalog.lapcat.org/search~S12?/i".$isbn."/i".$isbn."/1%2C1%2C1%2CE/marc&FF=i".$isbn;
		//$url = "http://catalog.lapcat.org/search/i".$isbn;
		//settings variables
		$cleaned = array("isbn"=>$isbn);
		$a_status = array();
		$cleaned["year"] = 0;
		$cleaned["studio"] = "";
		$cleaned["location"] = "";
		$cleaned["rating"] = "";
		$cleaned["title"] = "";
		$cleaned["description"] = "";
		$cleaned["type"] = "";
		$cleaned["url"] = $url;
		$cleaned["tags"] = array();
		$cleaned["console"] = "";
		$marcKeys = array(260,520,521,245);
		$doc = new DOMDocument();
		@$doc->loadHTMLFile($url);
		
		$marcRecord = $doc->getElementsByTagName('pre');
	//parse the marc record
		if (!is_null($marcRecord)) { //you are not parsing the marc record view
			foreach ($marcRecord as $mr) {
				$mcr = explode("\n",$mr->nodeValue);
				$fixedMCR = array();
				$preIndex = 0;
				foreach($mcr as $mr2){
					if(substr($mr2,0,3)=="   "){
						$fixedMCR[$preIndex][0] .= substr_replace($mr2, "", 0,7);
					}else{
						$fixedMCR[substr($mr2,0,3)][] = substr_replace($mr2, "", 0,7);
						$preIndex = substr($mr2,0,3);
					}
				}
				$a_status = $fixedMCR;
			}
		}
		$a_status = array_smart_implode($a_status);
	//	print_r($a_status);
		foreach ($a_status as $key=>$value){

			switch ($key){
				case 245:
					$split = explode("|", $value);
					preg_match("/([A-Za-z \s]*)/",$split[0],$titleMatches);
					$cleaned["title"] = $titleMatches[0];
					if(isset($split[1])){
						switch(substr($split[1], 0,1)){
							case "n":
								if(preg_match("/([Vv]ol\.\s[0-9][0-9])/",substr($split[1], 0),$titleMatches)){$cleaned["volume"] = $titleMatches[0];}
							break;
							
							default:break;
						}
					}
					
				break;
				case 260:
					$split = explode("|", $value);
					if(preg_match("/([1-9][0-9]{3})/",$value,$matches)){$cleaned["year"] = $matches[0];}
					if(isset($split[1]) && preg_match("/([A-Z|1-9\s][A-Za-z \s]*)/",$split[1],$studioMatches)){$cleaned["studio"] = $studioMatches[0];}
					if(preg_match("/([A-Za-z \s]*)/",$split[0],$locationMatches)){$cleaned["location"] = $locationMatches[0];}
				break;
				
				case 520:
					$cleaned["description"] = $value;
				break;
				
				case 521:
					$cleaned["rating"] = str_replace("ESRB rating:", "", $value);
					$cleaned["rating"] = str_replace("MPAA rating:", "", $cleaned["rating"]);
				break;
				case 655: case 538: //type
					if(is_array($value)){
						foreach($value as $k=>$v){
							if(preg_match("/([A-Z0-9a-z \s]*)/",$v,$Matches)){$cleaned["type".$key] = $Matches[0];}		
						}
					}else{if(preg_match("/([A-Z0-9a-z \s]*)/",$value,$Matches)){$cleaned["type".$key] = $Matches[0];}}
				break;
				case 590: //this should be the tags field
					$cleaned["tags"]=explode(",",$value);
				break;
				case 690: //This is where video games are normally entered
					if(isset($value) && preg_match("/([A-Z0-9a-z \s]*)/",$value,$Matches)){$cleaned["console"] = $Matches[0];}
				break;
				default:break;
			}
		}
		return $cleaned;	
	}
	//$isbn = "9781602525177";
	//parseMarc($isbn);
	//print_r(parseMarc($isbn));

	$db->Query("SELECT ISBNorSN FROM lapcat.hex_materials;");
//	$db->Query("SELECT isbn FROM lapcat.marc_record WHERE year=0");
	$res = $db->Fetch("row");
	foreach($res as $r){
		$cleaned = parseMarc($r[0]);
		print_r($cleaned);

		$db->Query("
		REPLACE INTO lapcat.marc_record (title,description,year,rating,isbn,studio,city,console)
		VALUES(
		'".$cleaned["title"]."',
		'".$cleaned["description"]."',
		'".$cleaned["year"]."',
		'".$cleaned["rating"]."',
		'".$cleaned["isbn"]."',
		'".$cleaned["studio"]."',
		'".$cleaned["location"]."',
		'".$cleaned["console"]."'
		)
		");
	}
?>