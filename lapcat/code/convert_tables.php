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
/*
$debugSQL = "
TRUNCATE TABLE  `lapcat_actor`;
TRUNCATE TABLE  `lapcat_artist`;
TRUNCATE TABLE  `lapcat_author`;
TRUNCATE TABLE  `lapcat_director`;
TRUNCATE TABLE  `lapcat_label`;
TRUNCATE TABLE  `lapcat_materials`;
TRUNCATE TABLE  `lapcat_materials_by_actor`;
TRUNCATE TABLE  `lapcat_platform`;
TRUNCATE TABLE  `lapcat_publisher`;
TRUNCATE TABLE  `lapcat_rating`;
TRUNCATE TABLE  `lapcat_studio`;
";

$debugSQLarray = explode(";",$debugSQL);



//THIS IS FOR DEBUG ONLY
foreach($debugSQLarray as $bugSql){
  $db->Query($bugSql);  
}

//THIS IS FOR DEBUG ONLY
*/
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
    $parsed = false;
    $normalAmazon = array();
    echo "***************** Starting a record *****************\n";
    echo "Record: ".$globalProcessed."\n";
    $tag = $db->Query("SELECT tag_ID FROM lapcat.hex_tags_by_material WHERE id=".$oldId,true,"row_array");
    $tag = fixTags($tag);//This should fix the problem
    $category = getCategory($tag);    
    $xml = simplexml_load_file(awsRequest($category, $isbn,false, "ItemSearch", "1"));
    //Parse the catalog for the item
    $catalog = parseMarc($isbn); // lets just get the catalog item first.  That way we can fall back on this easier.
    $catalog = array_merge($catalogTemplate,$catalog); // lets merge the templates together.
    
    if(strval($xml->Items->Request->IsValid)=="True"){ // there is an Amazon record
      echo "******** Amazon record ********\n";
      echo "Record: ".$globalProcessed."\n";
      $normalAmazon = normalizeData($xml,$catalogTemplate,$tag,$isbn);
      if($normalAmazon["title"]==""){ // lets just do a fall back check before we even toss it over to the checker.
        $normalAmazon["title"] = $catalog["title"];
        $normalAmazon = array_merge($catalog,$normalAmazon); // lets merge the templates together to see if we can make a one time insert of the record.
      }
      //print_r($normalAmazon);
      enterData($normalAmazon,$category,$isbn);
    }else{ //this should be a bad record
      echo "Amazon search result:".strval($xml->Items->Request->IsValid)."\n" ;
      if(!is_array($catalog["isbn"])){$catalog["isbn"] = array($catalog["isbn"]); }
      if(isset($catalog["sn"])){
        if(!is_array($catalog["sn"])){
          $catalog["sn"] = array($catalog["sn"]); 
        }
      }else{
        $catalog["sn"] = array();
      }
      
      $isbnSn = $catalog["isbn"]+$catalog["sn"];
      echo "******** Amazon second Parse Start ********\n";
      foreach($isbnSn as $isbn2){
        if($parsed === false){ // we do not need to run the code if its already found the result
          $xml = simplexml_load_file(awsRequest($category, $isbn2,false, "ItemSearch", "1"));
          if(strval($xml->Items->Request->IsValid)=="True"){ //there is a record with amazon
            echo "******** Amazon record ********\n";
            echo "Record: ".$globalProcessed."\n";
            //we must normalize the data from amazon to match that of the catalog
            echo "Found a record with Amazon: ".$xml->Items->Item->ASIN."\n";
            $amazonData = normalizeData($xml,$catalogTemplate,$tag,$isbn);
            $normalAmazon = array_merge($catalog,$normalAmazon); // lets merge the templates together to see if we can make a one time insert of the record.
            enterData($amazonData,$category,$isbn,$isbn);
            $parsed = true;
          }
        }
      }
      echo "******** Amazon second Parse End ********\n";
      if(!$parsed){    //Something went wrong getting the category
        echo "******** Catalog record ********\n";
        echo "Record: ".$globalProcessed."\n";
        echo "ISBN: ".$catalog["isbn"][0]."\n";
        $catalog["isbn"] = array_smart_implode($catalog["isbn"]);
        enterData($catalog,$category,$isbn,$isbn);
      }
    }
    echo "***************** Ending a record *****************\n\n\n\n";
  }
}else{echo "The primary conversion query is broken some how!";}

$endTime = time();
echo "\n\n\nTotal Queries Executed:".$db->v_Queries."<br>\n";
echo "Total Entries Processed:".$globalProcessed."<br>\n";
echo "Total Time:".($endTime - $startTime)."<br>\n";
echo "Average Queries per second:".$db->v_Queries/($endTime - $startTime)."<br>\n";

?>