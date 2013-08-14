<?Php
  date_default_timezone_set('America/Chicago');
  $nextBday = mktime(1, 52, 0, 8, 8, date("y")+1);
  $expire = date("Y-m-d H:i:s",$nextBday);
  if(isset($_GET["json"])){
    $getJSON = $_GET['json'];  
  }
  if(isset($_GET['isbn'])){
    $getISBN = $_GET['isbn'];  
  }
  if(isset($_GET['size'])){
    $getSize = $_GET['size'];  
  }
  
//include_once("amazonImg.php");
  if(isset($_GET['size'])){$size = $_GET['size'];}else{$size = "S";}
  require ("db.class.php");
  $db = db::getInstance();
  $res = $db->Query("SELECT * FROM covers",false,"assoc_array");
  

function setHeaders(){
  header("Expires: ".date(DATE_RFC822,$nextBday));
  header("Cache-Control: cache");
  header("Pragma: cache");  
}
  
  //$fileName = "http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=".$getISBN."&size=".$getSize;
  $fileName = "http://dev.laportelibrary.org/tweeks/coverCache/imageFetch.php?isbn=".$getISBN."&size=".$getSize;
  $handle = fopen($fileName, "rb");
  $contents = stream_get_contents($handle);
  fclose($handle);
  $base64Image = base64_encode($contents);
  
  
  
  
  $db->Query("INSERT INTO covers(SN,Image,default) VALUES('".$getISBN."','".$base64Image."')")
  
  ?>
  
<img src="data:image/jpeg;base64,<?Php print $base64Image;?>">