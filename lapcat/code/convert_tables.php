<?

//turn on the line below once all of the errors are fixed.
//ini_set('display_errors', 1);
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$globalQueryAmount = 4000;
$globalProcessed = 0;
$startTime = time();
include_once ("../objects/db.php");  
include_once ("marc_parse.php");
include_once ("amazon.php");

$db = db::getInstance();

$res = $db->Query("SELECT ID,ISBNorSN FROM lapcat.hex_materials LIMIT ".$globalQueryAmount.";",false,"row_array");
echo "Total Results to parse:".$db->Count_res()."\n";
//$res = $db->Query("SELECT id,isbn_sn FROM lapcat.lapcat_materials WHERE title='' ;",false,"row");
$start = time();
$xml = "";
$category = "None"; 
$tag = ""; 
if(is_array($res)){ // the query did not have a fit
  foreach($res as $r){
    $oldId = $r[0];
    $isbn = $r[1];
    $globalProcessed++;
    $catalog = array();
    echo "***************** Starting a record *****************\n";
    echo "Record: ".$globalProcessed."\n";
    $tag = $db->Query("SELECT tag_ID FROM lapcat.hex_tags_by_material WHERE id=".$oldId,true,"row_array");
    $tag = fixTags($tag);//This should fix the problem
    $category = getCategory($tag);    
    $xml = simplexml_load_file(awsRequest($category, $isbn,false, "ItemSearch", "1"));
    //Parse the catalog for the item
    $catalog = parseMarc($isbn); // lets just get the catalog item first.  That way we can fall back on this easier.
    
    if(strval($xml->Items->Request->IsValid)=="True"){
      echo "******** Amazon record ********\n";
      $category = getCategory($tag);   
      $normalAmazon = normalizeData($xml,$catalogTemplate,$tag,$isbn);
      if($normalAmazon["title"]==""){
        $normalAmazon["title"] = $catalog["title"];
      }
      enterData($normalAmazon,$category,$isbn);
    }else{ //this should be a bad record
      $category = getCategory($tag);   
      //Loop though the tags to set the category
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
      echo "******** Amazon second Parse Start ********\n";
      foreach($isbnSn as $isbn2){
        if($category!="borked" && $parsed === false){ // we do not need to run the code if its already found the result
          $xml = simplexml_load_file(awsRequest($category, $isbn2,false, "ItemSearch", "1"));
          if($xml->Items->Item->ASIN){ //there is a record with amazon
            echo "******** Amazon record ********\n";
            echo "Record: ".$globalProcessed."\n";
            //we must normalize the data from amazon to match that of the catalog
            echo "Found a record with Amazon: ".$xml->Items->Item->ASIN."\n";
            $amazonData = normalizeData($xml,$catalogTemplate,$tag,$isbn);
            enterData($amazonData,$category,$isbn,$isbn);
            $parsed = true;
          }
        }
      }
      echo "******** Amazon second Parse End ********\n";
      if(!$parsed){    //Something went wrong getting the category
        echo "******** Catalog record ********\n";
        echo "Record: ".$globalProcessed."\n";
        echo "ISBN:".$catalog["isbn"][0]."\n";
        $catalog = array_merge($catalogTemplate,$catalog);
        $catalog["isbn"] = array_smart_implode($catalog["isbn"]);
        //print_r($catalog);
        enterData($catalog,$category,$isbn,$isbn);
      }
    }
    echo "***************** Ending a record *****************\n\n\n\n";
  }
}else{echo "The primary conversion query is broken some how!";}


//Lets deal with the records that are missing ASIN tags
//$missing = $db->Query("SELECT id,isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE id>995",true,"assoc");
/*
$missing = $db->Query("SELECT id,isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE (title='' or tag1_id=0) and FALSE",true,"assoc");
//$missing = $db->Query("SELECT id,isbn_sn,tag1_id,tag2_id,tag3_id,tag4_id FROM lapcat.lapcat_materials WHERE valid=0",true,"assoc");
echo "Total Missing Results to parse:".$db->Count_res()."\n";
$category = "";
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
        //print_r($amazonData);
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
    //print_r($catalog);
    enterData($catalog,$category,$m["isbn_sn"],$m["isbn_sn"]);
  }
}
*/
$endTime = time();

echo "\n\n\nTotal Queries Executed:".$db->v_Queries."<br>\n";
echo "Total Entries Processed:".$globalProcessed."<br>\n";
echo "Total Time:".($endTime - $startTime)."<br>\n";
echo "Average Queries per second:".$db->v_Queries/($endTime - $startTime)."<br>\n";

?>