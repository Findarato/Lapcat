<?

//turn on the line below once all of the errors are fixed.
//ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$globalQueryAmount = 4000;

$startTime = time();
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

include_once("../objects/db.php");  
include_once("amazon.php");

include "marc_parse.php";
$db = db::getInstance();

$res = $db->Query("SELECT ID,ISBNorSN FROM lapcat.hex_materials LIMIT ".$globalQueryAmount.";",false,"row_array");
//$res = $db->Query("SELECT id,isbn_sn FROM lapcat.lapcat_materials WHERE title='' ;",false,"row");
$start = time();
$xml = "";
$category = "None"; 
$tag = ""; 
echo "***************** Starting a record *****************\n";
if(is_array($res)){
  foreach($res as $r){
    $tag = $db->Query("SELECT tag_ID FROM lapcat.hex_tags_by_material WHERE id=".$r[0],true,"row_array");
    $tag = fixTags($tag);//This should fix the problem
    $category = getCategory($tag);    
    $xml = simplexml_load_file(awsRequest($category, $r[1],false, "ItemSearch", "1"));
    $normalAmazon = normalizeData($xml,$catalogTemplate,$tag,$r[1]);
    print_r($normalAmazon);
    enterData($normalAmazon,$category,$r[1]);
  }
}


//Lets deal with the records that are missing ASIN tags
//$missing = $db->Query("SELECT id,isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE id>995",true,"assoc");
$missing = $db->Query("SELECT id,isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE (title='' or tag1_id=0)",true,"assoc");
//$missing = $db->Query("SELECT id,isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE valid=0",true,"assoc");
foreach($missing as $m){
  $t = array($m["tag1_id"],$m["tag2_id"],$m["tag3_id"],$m["tag4_id"]);
  //Parse the catalog for the item
  $catalog = parseMarc($m["isbn_sn"]);
  //Loop though the tags to set the category
  $category = getCategory($t);
  if(!is_array($catalog["isbn"])){$catalog["isbn"] = array($catalog["isbn"]); }
  if(isset($catalog["sn"])){
    if(!is_array($catalog["sn"])){
      $catalog["sn"] = array($catalog["sn"]); 
    }
  }else{
    $catalog["sn"] = array();
  }
  
  $isbnSn = array_merge($catalog["isbn"],$catalog["sn"]);
  $parsed = false;
  echo "================= Starting second Amazon parse\n";
  foreach($isbnSn as $isbn2){
    if($catagory!="borked" && $parsed === false){ // we do not need to run the code if its already found the result
      $xml = simplexml_load_file(awsRequest($category, $isbn2,false, "ItemSearch", "1"));
      if($xml->Items->Item->ASIN){ //there is a record with amazon
        //we must normalize the data from amazon to match that of the catalog
        echo "Found a record with Amazon: ".$xml->Items->Item->ASIN."\n";
        $amazonData = normalizeData($xml,$catalogTemplate,$t,$m["isbn_sn"]);
        print_r($amazonData);
        enterData($amazonData,$category,$m["isbn_sn"],$m["isbn_sn"]);
        $parsed = true;
      }
    }
  }
  echo "================= End second Amazon parse\n";
  if(!$parsed){    //Something went wrong getting the category
    echo "ISBN:".$catalog["isbn"][0]."\n";
    $catalog = array_merge($catalogTemplate,$catalog);
    $catalog["isbn"] = array_smart_implode($catalog["isbn"]);
    print_r($catalog);
    enterData($catalog,$category,$m["isbn_sn"],$m["isbn_sn"]);
  }
  echo "***************** Ending a record *****************\n\n\n\n";
}

$endTime = time();
echo "\n\n\nTotal Queries Executed:".$db->v_Queries."<br>\n";
echo "Total Time:".($endTime - $startTime)."<br>\n";
echo "Average Queries per second:".$db->v_Queries/($endTime - $startTime)."<br>\n";

?>