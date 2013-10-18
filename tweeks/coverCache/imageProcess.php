<?Php
$isbn = $_GET['isbn'];
//include_once("amazonImg.php");
if(isset($_GET['size'])){$size = $_GET['size'];}else{$size = "S";}
if(isset($_GET['google'])){$getGoogle = $_GET['google'];}else{$getGoogle = false;}
$getGoogle = true; // google is always on right now
date_default_timezone_set('America/Chicago');

function getHTTPS($url){
  $browsers = array("Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.3) Gecko/2008092510 Ubuntu/8.04 (hardy) Firefox/3.0.3", "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1) Gecko/20060918 Firefox/2.0", "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3", "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.0.04506)");
  $referers = array("google.com", "yahoo.com", "msn.com", "ask.com", "live.com");
  $choice2 = array_rand($browsers);
  $agent = $browsers[$choice2];
  $choice = array_rand($referers);
  $referer = "http://" . $referers[$choice] . "";
  
  $curl = curl_init($url); 
  curl_setopt($curl, CURLOPT_USERAGENT, $agent);
  curl_setopt($curl, CURLOPT_REFERER, $referer);
  curl_setopt($curl, CURLOPT_VERBOSE, true);
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
 
  if($width<10 || $height<10){
    $img = loadJpeg("http://dev.laportelibrary.org/sites/all/themes/lapcat/images/BCNF.jpeg");
  }
  $newwidth=80;
  $newheight=120;
    switch($size){
      case "S":
        //normal 78x120
        //cd 80x80
        $newwidth=80;
        $newheight=120;
        if($width == $height || $width>$height){//Square CD
          $newwidth=$width;
          $newheight=$height;
          $thumb = imagecreatetruecolor($width, $height);
        }else{
          $thumb = imagecreatetruecolor($newwidth, $newheight);
        }
        
        
      break;
      case "M":
        $newwidth=247;
        $newheight=381;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
      break;

      case "L":
        $newwidth=247;
        $newheight=381;
        if($width == $height)$newheight=247;
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