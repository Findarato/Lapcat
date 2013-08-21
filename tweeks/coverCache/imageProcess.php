<?Php
$isbn = $_GET['isbn'];
//include_once("amazonImg.php");
if(isset($_GET['size'])){$size = $_GET['size'];}else{$size = "S";}
if(isset($_GET['google'])){$getGoogle = $_GET['google'];}else{$getGoogle = false;}
$getGoogle = true; // google is always on right now
date_default_timezone_set('America/Chicago');

function getHTTPS($url){
  $curl = curl_init($url); 
  curl_setopt($curl, CURLOPT_FAILONERROR, true); 
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   
  $result = curl_exec($curl);
  return $result;
}
function getGoogle($isbn){

  //we get the thumbnail if it happens to exsist  
  $api = json_decode(getHTTPS('https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn)); 
  //print_r($api);
  $thumb = $api->items[0]->volumeInfo->imageLinks->thumbnail;
  //echo $thumb;
  //die();
  if($thumb !=""){
    return (string)$thumb."&edge=curl";
  }
  return false;
}
function loadJpeg($imgname,$cache=false,$isbn=0){
    $im = imagecreatefromJPEG($imgname);
    if(!$im){
        $im  = imagecreatetruecolor(1, 1);
        $bgc = imagecolorallocate($im, 255, 255,255);
        imagefilledrectangle($im, 0, 0, 1, 1, $bgc);
    }
    return $im;
}
function checkImage($size,$img){
  $size = strtoupper($size);
  $width = imagesx($img);
  $height = imagesy($img);
 
  if($width<10){
    $img = loadJpeg("http://dev.laportelibrary.org/sites/all/themes/lapcat/images/BCNF.jpeg");
  }else{//this is not a default image
    if($width>290){
      $newwidth=247;
      $newheight=381;
      $thumb = imagecreatetruecolor($newwidth, $newheight);
      imagecopyresized($thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
      return $thumb;
    }
    //return $img;
  }
  
  $newwidth=80;
  $newheight=120;
  $width = imagesx($img);
  $height = imagesy($img);
    switch($size){
      case "S":
        $newwidth=80;
        $newheight=120;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
      break;
      case "M":
        $newwidth=247;
        $newheight=381;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
      break;

      case "L":
        $newwidth=247;
        $newheight=381;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
      break;
      default:
        $img = loadJpeg("http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=$size&Value=$isbn",false,$isbn);
      break;
    }
  imagecopyresized($thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  return $thumb;
}


if($getGoogle){
  $jGoo = getGoogle($isbn);
  if($jGoo){
    $img = checkImage($size,loadJpeg($jGoo,false,$isbn));
  }else{
    $img = checkImage($size,loadJpeg("http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=$size&Value=$isbn",false,$isbn));  
  }
}else{
  $img = checkImage($size,loadJpeg("http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=$size&Value=$isbn",false,$isbn));
}
header('Content-Type: image/jpeg');
imagejpeg($img);
imagedestroy($img);