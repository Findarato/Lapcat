<?
/*
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
*/
function awsRequest($searchIndex, $keywords, $responseGroup = false, $operation = "ItemSearch", $pageNumber = 1){
	$service_url = "http://ecs.amazonaws.com/onca/xml?Service=AWSECommerceService";
	$associate_tag = "your-associate-tag";
	$secret_key = "+NfwKQ51CjlkMc+IR7XR1PVLYpTIi+ND9TCSPaW1";
	$access_key = "AKIAINWTFGNW25U2G4MA";

	// build initial request uri
	$request = "$service_url&Operation=$operation&VariationPage=1&ResponseGroup=Large&AssociateTag=$associate_tag&SearchIndex=$searchIndex&Keywords=".urlencode($keywords)."&ItemPage=$pageNumber";

	// parse request into params
	$uri_elements = parse_url($request);
	$request = $uri_elements['query'];
	parse_str($request, $parameters);

	// add new params
	$parameters['Timestamp'] = gmdate("Y-m-d\TH:i:s\Z");
	$parameters['Version'] = "2006-11-14";
	$parameters['AWSAccessKeyId'] = $access_key;
	if($responseGroup){
		$parameters['ResponseGroup'] = $responseGroup;
	}
	ksort($parameters);

	// encode params and values
	foreach($parameters as $parameter => $value){
		$parameter = str_replace("%7E", "~", rawurlencode($parameter));
		$value = str_replace("%7E", "~", rawurlencode($value));
		$request_array[] = $parameter . '=' . $value;
	}
	$new_request = implode('&', $request_array);

	// make it happen
	$signature_string = "GET\n{$uri_elements['host']}\n{$uri_elements['path']}\n{$new_request}";
	$signature = urlencode(base64_encode(hash_hmac('sha256', $signature_string, $secret_key, true)));

	// return signed request uri
	return "http://{$uri_elements['host']}{$uri_elements['path']}?{$new_request}&Signature={$signature}";
}

//include("../objects/db.php");
include "marc_parse.php";
$db = db::getInstance();

/**
 * 
 * DeBUG
 * 
 */

$res = $db->Query("SELECT ID,ISBNorSN FROM lapcat.hex_materials LIMIT 400;",false,"row");
//$res = $db->Query("SELECT ID,ISBNorSN FROM lapcat.hex_materials;",false,"row");
//$res = array();
$start = time();
$xml = "";
$category = "None"; 
$tag = "";

foreach($res as $r){
	$tag = $db->Query("SELECT tag_ID FROM lapcat.hex_tags_by_material WHERE id=".$r[0],true,"row_array");
	$tag = array_implode(array_pad($tag,4,0));
	foreach($tag as $t){
		switch($t){
			case "1": //books 
			case "23": //audio book
			case "24": //digital book
			case "32": //graphic novel
			case "50": //large print
			case "75": //digital audio player
			case "76": //digital audio book
			case "159": //dital audio book
				$category = "Books";
			break;
			case "2": //music
				$category = "Music";
			break;

			case "3": //movie
			case "5": //tv
				$category = "DVD";
			break;

			case "4": //video game
				$category = "VideoGames";
			break;

			
			default:
				
			break;
		}
				
	}
	$xml = simplexml_load_file(awsRequest($category, $r[1],false, "ItemSearch", "1"));
	//echo (string)$xml->Items->Item->ASIN;
	
	if($xml->Items->Item->ASIN){ //there is a record
/**
  echo "Run Time:".(string)$xml->Items->Item->ItemAttributes->RunningTime."<br>";

lapcat_label
id,name
//
 */
    //Lets make sure they are all defined first
    $labelId = 0;
    $materialId = 0;
    $studioId = 0;
    $publisherId = 0;
    $platformId = 0;
    $actorId = 0;
    $artistId = 0;

    //$materialId = $db->Query("SELECT id FROM lapcat.lapcat_materials WHERE isbn_sn='".$r[1]."'",false,"row");
    //if($materialId === 0){ 
      $materialId = $db->Query("INSERT INTO lapcat.lapcat_materials (isbn_sn,asin,category,tag1_id,tag2_id,tag3_id,tag4_id,valid,modified_on) VALUES(
      '".$r[1]."',
      '".(string)$xml->Items->Item->ASIN."',
      '".$category."',
      ".join(",",$tag)."
      ,
      true,
      NOW()
      )");
    //}
    

/**
 * 
 *   

 * 
 * 
 */


    //Parse out non searchable things
    if($materialId >0){
      if((string)$xml->Items->Item->ItemAttributes->RunningTime){
         $db->Query("UPDATE lapcat_materials SET run_time='".(string)$xml->Items->Item->ItemAttributes->RunningTime."' WHERE id=".$materialId);
      }
      if((string)$xml->Items->Item->ItemAttributes->Title){
         $db->Query("UPDATE lapcat_materials SET title='".(string)$xml->Items->Item->ItemAttributes->Title."' WHERE id=".$materialId);
      }
      if((string)$xml->Items->Item->ItemAttributes->OriginalReleaseDate){
         $db->Query("UPDATE lapcat_materials SET origional_release_date='".date("Y-m-d",strtotime((string)$xml->Items->Item->ItemAttributes->OriginalReleaseDate))."' WHERE id=".$materialId);
      }
      if((string)$xml->Items->Item->ItemAttributes->ReleaseDate){
         $db->Query("UPDATE lapcat_materials SET release_date='".date("Y-m-d",strtotime((string)$xml->Items->Item->ItemAttributes->ReleaseDate))."' WHERE id=".$materialId);
      }else{
        if((string)$xml->Items->Item->ItemAttributes->PublicationDate){
           $db->Query("UPDATE lapcat_materials SET release_date='".date("Y-m-d",strtotime((string)$xml->Items->Item->ItemAttributes->PublicationDate))."' WHERE id=".$materialId);
        }
      }
    }
    //Parse out and update the Tracks
  if((string)$xml->Items->Request->ItemSearchRequest->SearchIndex=="Music"){
    
    $trackHold = array();
    foreach ($xml->Items->Item->Tracks->Disc->Track as $t){
      $trackHold[] = (string)$t;
    }
    if($materialId >0 ){
      $db->Query("UPDATE lapcat_materials SET tracks='".json_encode($trackHold)."' WHERE id=".$materialId);
    }
  }
    
    
    

    //Parse out and update the Artist
    if((string)$xml->Items->Item->ItemAttributes->Artist){
      $artistId = $db->Query("SELECT id FROM lapcat.lapcat_artist WHERE name='".(string)$xml->Items->Item->ItemAttributes->Artist."'",false,"row");
      if($artistId === 0){ 
        $artistId = $db->Query("INSERT INTO lapcat.lapcat_artist (name,modified_on) VALUES('".(string)$xml->Items->Item->ItemAttributes->Artist."',NOW())");
      }
      if($materialId >0 && $artistId >0){
        $db->Query("UPDATE lapcat_materials SET artist_id=".$artistId." WHERE id=".$materialId);
      }
    }
    
    //Parse out and update the Actors
    if($xml->Items->Item->ItemAttributes->Actor){
      $actor = array();
      foreach ($xml->Items->Item->ItemAttributes->Actor as $a){
        $actorId = $db->Query("SELECT id FROM lapcat.lapcat_actor WHERE name='".(string)$a."'",false,"row");
        if($actorId === 0){ 
          $actorId = $db->Query("INSERT INTO lapcat.lapcat_actor (name,modified_on) VALUES('".(string)$a."',NOW())");
        }
        /* I know its a lot more queries, but we should make sure that the actor->material link is not already in. */
        $actorCheck = $db->Query("SELECT material_id FROM lapcat.lapcat_materials_by_actor WHERE actor_id='".$actorId."'",false,"row");
        if($actorCheck === 0){ //We know that there is not already a link, so lets make one.
          $db->Query("INSERT INTO lapcat.lapcat_materials_by_actor (material_id,actor_id,modified_on) VALUES ('".$materialId."','".$actorId."',NOW())");
        }
      } 
      //$db->Query("UPDATE lapcat_materials SET actors='".json_encode($actor)."' WHERE id=".$materialId); 
    }
      
    //Parse out and update the Director
    if((string)$xml->Items->Item->ItemAttributes->Director){
      $directorId = $db->Query("SELECT id FROM lapcat.lapcat_director WHERE name='".(string)$xml->Items->Item->ItemAttributes->Director."'",false,"row");
      if($directorId === 0){ 
        $directorId = $db->Query("INSERT INTO lapcat.lapcat_director (name,modified_on) VALUES('".(string)$xml->Items->Item->ItemAttributes->Director."',NOW())");
      }
      if($materialId >0 && $directorId >0){
        $db->Query("UPDATE lapcat_materials SET director_id=".$directorId." WHERE id=".$materialId);
      }
    }
    //Parse out and update the rateingAudienceRating
    if((string)$xml->Items->Item->ItemAttributes->ESRBAgeRating || (string)$xml->Items->Item->ItemAttributes->AudienceRating){
      $rate = "";
      if((string)$xml->Items->Item->ItemAttributes->ESRBAgeRating ){$rate = (string)$xml->Items->Item->ItemAttributes->ESRBAgeRating; }else{$rate=(string)$xml->Items->Item->ItemAttributes->AudienceRating;}
      $rateId = $db->Query("SELECT id FROM lapcat.lapcat_rating WHERE name='".$rate."'",false,"row");
      if($rateId === 0){ 
        $rateId = $db->Query("INSERT INTO lapcat.lapcat_rating (name,modified_on) VALUES('".$rate."',NOW())");
      }
      if($materialId >0 && $rateId >0){
        $db->Query("UPDATE lapcat_materials SET rating_id=".$rateId." WHERE id=".$materialId);
      }
    }
    //Parse out and update the platform
    if((string)$xml->Items->Item->ItemAttributes->Platform){
      $platformId = $db->Query("SELECT id FROM lapcat.lapcat_platform WHERE name='".(string)$xml->Items->Item->ItemAttributes->Platform."'",false,"row");
      if($platformId === 0){ 
        $platformId = $db->Query("INSERT INTO lapcat.lapcat_platform (name,modified_on) VALUES('".(string)$xml->Items->Item->ItemAttributes->Platform."',NOW())");
      }
      if($materialId >0 && $platformId >0){
        $db->Query("UPDATE lapcat_materials SET platform_id=".$platformId." WHERE id=".$materialId);
      }
    }       
    //Parse out and update the publisher
    if((string)$xml->Items->Item->ItemAttributes->Publisher){
      $publisherId = $db->Query("SELECT id FROM lapcat.lapcat_publisher WHERE name='".(string)$xml->Items->Item->ItemAttributes->Publisher."'",false,"row");
      if($publisherId === 0){ 
        $publisherId = $db->Query("INSERT INTO lapcat.lapcat_publisher (name,modified_on) VALUES('".(string)$xml->Items->Item->ItemAttributes->Publisher."',NOW())");
      }
      if($materialId >0 && $publisherId >0){
        $db->Query("UPDATE lapcat_materials SET publisher_id=".$publisherId." WHERE id=".$materialId);
      }
    }    

    //Parse out and update the lables
		if((string)$xml->Items->Item->ItemAttributes->Label){
  		$labelId = $db->Query("SELECT id FROM lapcat.lapcat_label WHERE name='".(string)$xml->Items->Item->ItemAttributes->Label."'",false,"row");
      if($labelId === 0){
        $labelId = $db->Query("INSERT INTO lapcat.lapcat_label (name,modified_on) VALUES('".(string)$xml->Items->Item->ItemAttributes->Label."',NOW())");
      }
      if($materialId >0 && $labelId >0){
        $db->Query("UPDATE lapcat_materials SET label_id=".$labelId." WHERE id=".$materialId);
      }
		}
    //Parse out and update the studios
    if((string)$xml->Items->Item->ItemAttributes->Studio){
      $studioId = $db->Query("SELECT id FROM lapcat.lapcat_studio WHERE name='".(string)$xml->Items->Item->ItemAttributes->Studio."'",false,"row");
      if($studioId === 0){
        $studioId = $db->Query("INSERT INTO lapcat.lapcat_studio (name,modified_on) VALUES('".(string)$xml->Items->Item->ItemAttributes->Studio."',NOW())");
      }
      if($materialId >0 && $studioId >0){
        $db->Query("UPDATE lapcat_materials SET studio_id=".$studioId." WHERE id=".$materialId);
      }
        
    }
		
    
	}else{ // no record
		$db->Query("INSERT INTO lapcat.lapcat_materials (isbn_sn,asin,category,tag1_id,tag2_id,tag3_id,tag4_id,valid,modified_on) VALUES(
		'".$r[1]."',
		0,
		'None',
		".join(",",$tag)."
		,
		false,
		NOW()
		)");
	}
}

/**
 * 
 * Lets deal with the records that are missing ASIN tags
 * 
 */ 
/*
$missing = $db->Query("SELECT isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE valid=0",true,"assoc");
foreach($missing as $m){
	$t = array($m["tag1_id"],$m["tag2_id"],$m["tag3_id"],$m["tag4_id"]);
	$catalog = parseMarc($m["isbn_sn"]);
	foreach ($t as $tag){
		switch($tag){
			case "1": //books
			case "23": //audio book
			case "24": //digital book
			case "32": //graphic novel
			case "50": //large print
			case "75": //digital audio player
			case "76": //digital audio book
			case "159": //dital audio book
				$category = "Books";
			break;
			case "2": //music
				$category = "Music";
			break;

			case "3": //movie
			case "5": //tv
				$category = "DVD";
			break;

			case "4": //video game
				$category = "VideoGames";
			break;
			default:break;
		}
	}
	if(!is_array($catalog["isbn"])){$catalog["isbn"] = array($catalog["isbn"]);	}
	if(isset($catalog["sn"])){
		if(!is_array($catalog["sn"])){
			$catalog["sn"] = array($catalog["sn"]);	
		}
	}else{
		$catalog["sn"] = array();
	}
	
//	print_r($catalog["isbn"]);
	$isbnSn = array_merge($catalog["isbn"],$catalog["sn"]);
	foreach($isbnSn as $isbn2){
		//echo "ISBN::".$isbn2.":<br>";
		$xml = simplexml_load_file(awsRequest($category, $isbn2,false, "ItemSearch", "1"));
		if($xml->Items->Item->ASIN){ //there is a record
			$db->Query("UPDATE lapcat_materials SET valid=1,category='$category',asin='".(string)$xml->Items->Item->ASIN."' WHERE isbn_sn='".$m["isbn_sn"]."'");
		}else{
		}	
	}
}
*/
echo "Total Queries Executed:".$db->v_Queries;


?>