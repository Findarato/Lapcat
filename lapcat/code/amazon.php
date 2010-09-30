<?Php

//turn on the line below once all of the errors are fixed.
//ini_set('display_errors', 1);
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include_once ("marc_parse.php");
$catalogTemplate = 
  array(
   "actor"=>array(),
   "asin"=>"",
   "artist"=>"",
   "author"=>"",
   "console"=>"",
   "category"=>"",
   "description"=>"",
   "director"=>"",
   "isbn"=>"",
   "label"=>"",
   "origionalReleaseDate"=>"",
   "publisher"=>"",
   "publicationDate"=>"",
   "rating"=>"",
   "releaseDate"=>"",
   "runTime"=>"",
   "sn"=>array(),
   "studio"=>"",
   "tags"=>array(), 
   "tagsRaw"=>"",
   "title"=>"",
   "title"=>"",
   "tracks"=>array(),
   "type"=>"",
   "url"=>"",
   "year"=>""
  );

/*
 * The main amazon parsing function 
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
/**
 * Function used to translate tags into amazon categories 
 */ 
function getCategory($tag = array()){
  $category = "";
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
      default:break;
    }
  }
  return $category;
}

function enterData($xml,$category,$isbn,$update=false){
      $db = db::getInstance();         
      //$xml = $db->Clean($xml);
      //Lets make sure they are all defined first
      $labelId = 0;
      $materialId = 0;
      $studioId = 0;
      $publisherId = 0;
      $platformId = 0;
      $actorId = 0;
      $artistId = 0;
      $authorId = 0;
      $internalISBN = "";

      if($update){
        $internalISBN = $update;
        $materialId = $db->Query("SELECT id FROM lapcat.lapcat_materials WHERE isbn_sn='".$update."' LIMIT 1",false,"row");
      }else{
        $materialId = $db->Query("SELECT id FROM lapcat.lapcat_materials WHERE isbn_sn='".$isbn."' LIMIT 1",false,"row");
        $internalISBN = $isbn;  
      }
      echo $materialId."\n";

      if(count($xml["tags"])>4){
        $tempArray[0]= $xml["tags"][0];
        $tempArray[1]= $xml["tags"][1];
        $tempArray[2]= $xml["tags"][2];
        $tempArray[3]= $xml["tags"][3];
        //die("There are more than 4 tags");
        $xml["tags"] = $tempArray;
        unset($tempArray);
      }
      if(isset($xml["asin"]) && $xml["asin"]!=""){
        $dataSource = "amazon";
        echo "Amazon ASIN:".$xml["asin"]."\n";
      }else{
        $dataSource = "catalog";
        echo "Catalog Parsed\n";
      }

      if($materialId == 0){ //this is a new item and needs to be inserted
        echo "New Record:".$isbn."\n";

        $xml["tags"] = fixTags($xml["tags"]);
        $tempArray = array();
        
        $materialId = $db->Query("INSERT INTO lapcat.lapcat_materials 
        (isbn_sn,asin,category,tag1_id,tag2_id,tag3_id,tag4_id,valid,modified_on,data_source) 
        VALUES(
          '".$isbn."',
          '".$xml["asin"]."',
          '".$category."',
          '".implode("','",$xml["tags"])."'
          ,
          1,
          NOW(),
          '".$dataSource."'
        )");
        if($materialId == 0 || count($db->Error)==2){
          print_r($db->Error);die();
        }else{
          echo "NEW Material ID: ".$materialId."\n";
        }
      }else{ //this is a dupe record and should be put into the dupe table, and all references should be linked there
        $db->Query("INSERT INTO lapcat.lapcat_materials_dupes 
        (isbn_sn,asin,category,tag1_id,tag2_id,tag3_id,tag4_id,valid,modified_on,data_source) 
        VALUES(
          '".$isbn."',
          '".$xml["asin"]."',
          '".$category."',
          '".implode("','",$xml["tags"])."'
          ,
          1,
          NOW(),
          '".$dataSource."'
        )");
        //print_r($db->Lastsql);
        echo "\n";
        echo "UPDATED Material ID:".$materialId."\n";
        echo "DUPE ISBN :".$internalISBN."\n";
        return "DUPE";
      }
      
      
      //Lets just make sure there are tags
      $tag1Id = $db->Query("SELECT tag1_id FROM lapcat.lapcat_materials WHERE id='".$materialId."' LIMIT 1",false,"row");
      if($tag1Id == 0 && isset($xml["tags"][0]) && $xml["tags"][0] > 0){ //its missing tags and I have a tag to give it.
        echo "I am missing tags in the table but I have tags to be put in.\n";
        $db->Query("UPDATE lapcat.lapcat_materials SET tag1_id='".$xml["tags"][0]."',tag2_id='".$xml["tags"][1]."',tag3_id='".$xml["tags"][2]."',tag4_id='".$xml["tags"][3]."' WHERE id=".$materialId);
      }else{ // its missing tags or I do not have tags to give it.
        if(!isset($xml["tags"][0]) && $xml["tags"][0] != 0){//I some how do not have any tags to give the item.
          if($materialId > 0){// we need to make sure at this point that we do indeed have a material id.  This should never fail, but better be safe
            if($internalISBN != ""){ //we have a isbn number or standard number to work with
              if(!is_array($xml["numbers"])){ // lets just make sure its an array so we do not have to edit the sql
                $xml["numbers"] = array($xml["numbers"]);
              }
              $oldMaterialId = $db->Query("SELECT ID FROM lapcat.hex_materials WHERE ISBNorSN IN ('".join("','",$xml["numbers"])."') LIMIT 1",false,"row");
              if($oldMaterialId>0){ // this was an record converted from the old material table
                //lets look up the tags from the old table
                $dbTags = fixTags($db->Query("SELECT tag_id FROM hex_tags_by_material WHERE ID=".$oldMaterialId.";",false,"row_array"));
                if(is_array($dbTags)){//we have a list of tags from the old tags by material table we can use.
                  $db->Query("UPDATE lapcat.lapcat_materials SET tag1_id='".$dbTags[0]."',tag2_id='".$dbTags[1]."',tag3_id='".$dbTags[2]."',tag4_id='".$dbTags[3]."' WHERE id=".$materialId);
                  echo "Tags where successfully ported over\n";
                }else{echo "This item is missing tags totally.\n";}            
              }else{echo "This item is not in the old material table\n";echo $db->Lastsql."\n";}
            }else{echo "There was an error getting the ISBN number for this item\n";}
          }else{echo "Item is missing a material ID\n";}
        }
      }
      //Parse out non searchable things
      if($materialId >0){
        if($xml["runTime"]>0){
          $db->Query("UPDATE lapcat_materials SET run_time='".$xml["runTime"]."' WHERE id=".$materialId);  
        }
        if($xml["title"]!=""){
           echo "title:".mysql_real_escape_string($xml["title"])."\n";
           $db->Query("UPDATE lapcat_materials SET title='".mysql_real_escape_string($xml["title"])."' WHERE id=".$materialId);
           //print_r($db->Lastsql."\n");
        }else{
          echo "There was an error entering in the title\n";
          echo "title:".mysql_real_escape_string($xml["title"])."\n";
        }
        if($xml["origionalReleaseDate"]!=""){
           $db->Query("UPDATE lapcat_materials SET origional_release_date='".date("Y-m-d",strtotime($xml["origionalReleaseDate"]))."' WHERE id=".$materialId);
        }
        if($xml["releaseDate"]!=""){
           $db->Query("UPDATE lapcat_materials SET origional_release_date='".date("Y-m-d",strtotime($xml["releaseDate"]))."' WHERE id=".$materialId);
        }else{
          if($xml["publicationDate"]!=""){
             $db->Query("UPDATE lapcat_materials SET release_date='".date("Y-m-d",strtotime($xml["publicationDate"]))."' WHERE id=".$materialId);
          }
        }
      }
      //Parse out and update the Tracks
      if(isset($xml["tracks"])){
        if(count($xml["tracks"])>0){
          $trackHold = array();
          foreach ($xml["tracks"] as $t){
            $trackHold[] = strval($t);
          }
          if($materialId >0 ){
            $db->Query("UPDATE lapcat_materials SET tracks='".json_encode($trackHold)."' WHERE id=".$materialId);
          }
        }        
      }

      //Parse out and update the Artist
      if($xml["artist"]!=""){
        $artistId = $db->Query("SELECT id FROM lapcat.lapcat_artist WHERE name='".$xml["artist"]."'",false,"row");
        if($artistId === 0){ 
          $artistId = $db->Query("INSERT INTO lapcat.lapcat_artist (name,modified_on) VALUES('".$xml["artist"]."',NOW())");
        }
        if($materialId >0 && $artistId >0){
          $db->Query("UPDATE lapcat_materials SET artist_id=".$artistId." WHERE id=".$materialId);
        }
      }
      //Parse out and update the Actors
      if(isset($xml["actor"])>0){
        if(count($xml["actor"])>0){
          $actor = array();
          foreach ($xml["actor"] as $a){
            $actorId = $db->Query("SELECT id FROM lapcat.lapcat_actor WHERE name='".strval($a)."'",false,"row");
            if($actorId === 0){
              $actorId = $db->Query("INSERT INTO lapcat.lapcat_actor (name,modified_on) VALUES('".strval($a)."',NOW())");
            }
            /* I know its a lot more queries, but we should make sure that the actor->material link is not already in. */
            $actorCheck = $db->Query("SELECT material_id FROM lapcat.lapcat_materials_by_actor WHERE actor_id='".$actorId."'",false,"row");
            if($actorCheck === 0){ //We know that there is not already a link, so lets make one.
              $db->Query("INSERT INTO lapcat.lapcat_materials_by_actor (material_id,actor_id,modified_on) VALUES ('".$materialId."','".$actorId."',NOW())");
            }
          } 
        }
      }
      //Parse out and update the Director
      if($xml["director"]!=""){
        $directorId = $db->Query("SELECT id FROM lapcat.lapcat_director WHERE name='".$xml["director"]."'",false,"row");
        if($directorId === 0){ 
          $directorId = $db->Query("INSERT INTO lapcat.lapcat_director (name,modified_on) VALUES('".$xml["director"]."',NOW())");
        }
        if($materialId >0 && $directorId >0){
          $db->Query("UPDATE lapcat_materials SET director_id=".$directorId." WHERE id=".$materialId);
        }
      }
      //Parse out and update the rateingAudienceRating
      if($xml["rating"] != ""){
        $rateId = $db->Query("SELECT id FROM lapcat.lapcat_rating WHERE name='".$xml["rating"]."'",false,"row");
        if($rateId === 0){ 
          $rateId = $db->Query("INSERT INTO lapcat.lapcat_rating (name,modified_on) VALUES('".$xml["rating"]."',NOW())");
        }
        if($materialId >0 && $rateId >0){
          $db->Query("UPDATE lapcat_materials SET rating_id=".$rateId." WHERE id=".$materialId);
        }
      }
      //Parse out and update the platform
      if($xml["console"]!=""){
        $platformId = $db->Query("SELECT id FROM lapcat.lapcat_platform WHERE name='".$xml["console"]."'",false,"row");
        if($platformId === 0){ 
          $platformId = $db->Query("INSERT INTO lapcat.lapcat_platform (name,modified_on) VALUES('".$xml["console"]."',NOW())");
          echo "platform ID:".$platformId." Name".$xml["console"]."\n";
        }
        if($materialId >0 && $platformId >0){
          $db->Query("UPDATE lapcat_materials SET platform_id=".$platformId." WHERE id=".$materialId);
        }
      }       
      //Parse out and update the publisher
      if($xml["publisher"]!=""){
        $publisherId = $db->Query("SELECT id FROM lapcat.lapcat_publisher WHERE name='".$xml["publisher"]."'",false,"row");
        if($publisherId === 0){ 
          $publisherId = $db->Query("INSERT INTO lapcat.lapcat_publisher (name,modified_on) VALUES('".$xml["publisher"]."',NOW())");
        }
        if($materialId >0 && $publisherId >0){
          $db->Query("UPDATE lapcat_materials SET publisher_id=".$publisherId." WHERE id=".$materialId);
        }
      }    
      //Parse out and update the lables
      if($xml["label"]){
        $labelId = $db->Query("SELECT id FROM lapcat.lapcat_label WHERE name='".$xml["label"]."'",false,"row");
        if($labelId === 0){
          $labelId = $db->Query("INSERT INTO lapcat.lapcat_label (name,modified_on) VALUES('".$xml["label"]."',NOW())");
        }
        if($materialId >0 && $labelId >0){
          $db->Query("UPDATE lapcat_materials SET label_id=".$labelId." WHERE id=".$materialId);
        }
      }
      if($xml["author"]){
        $authorId = $db->Query("SELECT id FROM lapcat.lapcat_author WHERE name='".$xml["author"]."'",false,"row");
        if($authorId === 0){
          $authorId = $db->Query("INSERT INTO lapcat.lapcat_author (name,modified_on) VALUES('".$xml["author"]."',NOW())");
        }
        if($materialId >0 && $authorId >0){
          $db->Query("UPDATE lapcat_materials SET author_id=".$authorId." WHERE id=".$materialId);
        }
      }    
      //Parse out and update the studios
      if($xml["studio"]){
        $studioId = $db->Query("SELECT id FROM lapcat.lapcat_studio WHERE name='".$xml["studio"]."'",false,"row");
        if($studioId === 0){
          $studioId = $db->Query("INSERT INTO lapcat.lapcat_studio (name,modified_on) VALUES('".$xml["studio"]."',NOW())");
        }
        if($materialId >0 && $studioId >0){
          $db->Query("UPDATE lapcat_materials SET studio_id=".$studioId." WHERE id=".$materialId);
        }
          
      }
}
/**
 * Function used to normalize amazon data to that of the catalog 
 */
function normalizeData($xml,$template,$tags=false,$isbn=0){
  $data = $template;
  if(is_object($xml->Items->Item->ItemAttributes->ISBN)){
    $data["isbn"] = strval($xml->Items->Item->ItemAttributes->ISBN);
  }elseif(is_object($xml->Items->Item->ItemAttributes->UPC)){
    $data["isbn"] = strval($xml->Items->Item->ItemAttributes->UPC);
  }else{
    $data["isbn"] = $isbn;
  }
  $data["tags"] = fixTags($tags); // yeah lets just make sure its good even here.
  $data["asin"] = @strval($xml->Items->Item->ASIN); 
  $data["description"] = @strval($xml->Items->Item->EditorialReviews->EditorialReview->Content);
  if(is_object($xml->Items->Item->ItemAttributes->ESRBAgeRating)){
    $data["rating"] = @strval($xml->Items->Item->ItemAttributes->ESRBAgeRating);  
  }else{
    $data["rating"] = @strval($xml->Items->Item->ItemAttributes->AudienceRating);
  }
  $data["director"] = @strval($xml->Items->Item->ItemAttributes->Director);
  if(is_object($xml->Items->Item->ItemAttributes->Actor)){
    foreach (@$xml->Items->Item->ItemAttributes->Actor as $a){
      $data["actor"][] = strval($a);
    }  
  }
  
  if(@$xml->Items->Item->ItemAttributes->Platform){
    $data["console"] = @strval($xml->Items->Item->ItemAttributes->Platform);  
  }
  if(@$xml->Items->Item->ItemAttributes->Artist){
    $data["artist"] = @strval($xml->Items->Item->ItemAttributes->Artist);  
  }
  $data["runTime"] = @strval($xml->Items->Item->ItemAttributes->RunningTime);
  $data["releaseDate"] = @strval($xml->Items->Item->ItemAttributes->ReleaseDate);  
  $data["origionalReleaseDate"] = @strval($xml->Items->Item->ItemAttributes->OriginalReleaseDate);
  $data["label"] = @strval($xml->Items->Item->ItemAttributes->Label);
  $data["studio"] = @strval($xml->Items->Item->ItemAttributes->Studio);
  $data["publisher"] = @strval($xml->Items->Item->ItemAttributes->Publisher);
  $data["title"] = @strval($xml->Items->Item->ItemAttributes->Title);
  $data["author"] = @strval($xml->Items->Item->ItemAttributes->Author);
  
  $data["publicationDate"] = strval($xml->Items->Item->ItemAttributes->PublicationDate);
  if(is_object(@$xml->Items->Item->Tracks->Disc->Track)){
    foreach (@$xml->Items->Item->Tracks->Disc->Track as $a){
      $data["tracks"][] = strval($a);
    }    
  }
  return $data;
}

function fixTags($tags){
  if(!is_array($tags)){ return array(0,0,0,0); } //If we do not get an array we will return a blank one
    $tags = array_pad($tags,4,"0"); // lets make sure we have 4 items
  //Now that we can be assured that both of the values are set lets do stuff to them.
    $firstTag = 0;
    $tagCount = 0;
    $replacedTag = 0;
    if($tags[0]==0){//lets make sure that this is broken
    $newTags = array();
    foreach($tags as $t){
      switch($t){
        case "1": //books  
        case "2": //music
        case "3": //movie 
        case "5": //tv
        case "4": //video game
        case "23": //audio book
        case "24": //digital book
        case "32": //graphic novel
        case "50": //large print
        case "75": //digital audio player
        case "76": //digital audio book
        case "159": //dital audio book
          $firstTag = $t;
          $replacedTag = $tagCount;
        default:$tagCount++;break;
      }//end of switch statement
    }//end of loop though tags
   
    $newTags[0] = $firstTag;
    for($a=1;$a<4;$a++){
      if($a!=$replacedTag){
        $newTags[$a] = $tags[$a];  
      }
    }
    return $newTags;
  }else{
    return $tags;
  }
    
}
?>