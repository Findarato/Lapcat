<?Php
  date_default_timezone_set('America/Chicago');
  $startTime = microtime();
  $nextBday = mktime(1, 52, 0, 8, 8, date("y")+1);
  $expire = date("Y-m-d H:i:s",$nextBday);
  if(isset($_GET["json"])){
    $getJSON = $_GET['json'];  
  }else{$getJSON=false;}
  if(isset($_GET['isbn'])){
    $getISBN = strtoupper($_GET['isbn']);  
  }else{$getISBN="blank";}
  if(isset($_GET['size'])){
    $getSize = strtoupper($_GET['size']);  
  }else{$getSize = "s";}
  
//include_once("amazonImg.php");
  if(isset($_GET['size'])){$size = $_GET['size'];}else{$size = "S";}
  require ("db.class.php");
  $db = db::getInstance();
  $res = $db->Query("SELECT * FROM covers WHERE SN='".$getISBN."' AND size='".$getSize."';",false,"assoc_array");//lets get the file from the database
  if(!is_array($res)){//Looks like it is not in the table.
    updateDatabase($getISBN,$getSize); //lets update the database with the image
    $res = $db->Query("SELECT * FROM covers WHERE SN='".$getISBN."' AND size='".$getSize."';",false,"assoc_array");//lets get the file from the database
  }
function getImage($url){
  $handle = fopen($url, "rb");
  $contents = stream_get_contents($handle);
  fclose($handle); 
  return $contents;
}

function setHeaders(){
  header("Expires: ".date(DATE_RFC822,$nextBday));
  header("Cache-Control: cache");
  header("Pragma: cache");
  header('Content-Type: image/jpeg');
}
/**
 * 
 * @param string $size pass through of the size of the image
 */
function getDefaultImage($size){
  $db = db::getInstance();
  $res = $db->Query("SELECT * FROM covers WHERE SN='bcnf' AND size='".$size."'",false,"assoc");
  if(!is_array($res)){//there is no result
    $contents = getImage("http://dev.laportelibrary.org/tweeks/coverCache/imageProcess.php?isbn=junk&size=".$size);
    $base64Image = base64_encode($contents);
    $db->Query("INSERT INTO covers (SN,Image,defaultImage,size) VALUES(
      'bcnf',
      '".$db->Clean($base64Image)."',
      '1',
      '".$size."'
      )");
    $res = $db->Query("SELECT * FROM covers WHERE SN='bcnf' AND size='".$size."'",false,"assoc");
  }
  return $res;
}

/**
 * 
 * @param string $isbn pass through of the isbn of the book image
 * @param string $size pass through of the size of the image
 */
function updateDatabase($isbn,$size){
  $db = db::getInstance();  
  $defaultImage = 0;
  $default64 = getDefaultImage($size);
  $contents = getImage("http://dev.laportelibrary.org/tweeks/coverCache/imageProcess.php?isbn=".$isbn."&size=".$size);
  $base64Image = base64_encode($contents);
  
  if($base64Image == $default64["image"]){$defaultImage = 1;}
  $db->Query("INSERT INTO covers (SN,Image,defaultImage,size) VALUES(
  '".$isbn."',
  '".$db->Clean($base64Image)."',
  '".$defaultImage."',
  '".$size."'
  )");
}


  
setHeaders();
print base64_decode($res[0]["image"]);