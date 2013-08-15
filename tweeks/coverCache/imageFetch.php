<?Php
  date_default_timezone_set('America/Chicago');
  $startTime = microtime();
  $nextBday = mktime(1, 52, 0, 8, 8, date("y")+1);
  $expire = date("Y-m-d H:i:s",$nextBday);
  if(isset($_GET["json"])){
    $getJSON = $_GET['json'];  
  }else{$getJSON=false;}
  if(isset($_GET['isbn'])){
    $getISBN = $_GET['isbn'];  
  }else{$getISBN="blank";}
  if(isset($_GET['size'])){
    $getSize = $_GET['size'];  
  }else{$getSize = "s";}
  
//include_once("amazonImg.php");
  if(isset($_GET['size'])){$size = $_GET['size'];}else{$size = "S";}
  require ("db.class.php");
  $db = db::getInstance();
  $res = $db->Query("SELECT * FROM covers WHERE SN=".$getISBN,false,"assoc_array");
  if(!is_array($res)){
    updateDatabase($getISBN,$getSize);
  }else{
    //print_r($res);
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
  $res = $db->Query("SELECT * FROM covers WHERE SN='default' AND size='".$size."'",false,"assoc_array");
  if(!is_array($res)){//there is no result
    $fileName = "http://dev.laportelibrary.org/tweeks/coverCache/imageProcess.php?isbn=junk&size=".$getSize;
    $handle = fopen($fileName, "rb");
    $contents = stream_get_contents($handle);
    fclose($handle);
    $base64Image = base64_encode($contents);
    $db->Query("INSERT INTO covers (SN,Image,defaultImage,size) VALUES(
      '".$getISBN."',
      '".$db->Clean($base64Image)."',
      '1',
      '".$getSize."'
      )");
    $res = $db->Query("SELECT * FROM covers WHERE SN='default' AND size='".$size."'",false,"assoc_array");
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
  
  //$fileName = "http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=".$getISBN."&size=".$getSize;
  $fileName = "http://dev.laportelibrary.org/tweeks/coverCache/imageProcess.php?isbn=".$isbn."&size=".$size;
  $handle = fopen($fileName, "rb");
  $contents = stream_get_contents($handle);
  fclose($handle); 
  $base64Image = base64_encode($contents);
  
  if($base64Image["image"] == $default64){$defaultImage = 1;}
  
  $db->Query("INSERT INTO covers (SN,Image,defaultImage,size) VALUES(
  '".$isbn."',
  '".$db->Clean($base64Image)."',
  '".$defaultImage."',
  '".$size."'
  )");
  
  
  echo $db->Lastsql;
  print_r($db->Error);
}


  
setHeaders();
print base64_decode($res[0]["image"]);