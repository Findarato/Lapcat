<?Php
$isbn = $_GET['isbn'];
//include_once("amazonImg.php");
if(isset($_GET['size'])){$size = $_GET['size'];}else{$size = "S";}
$checkGoogle = false;
date_default_timezone_set('America/Chicago');

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
  }else{
    if($width>290){
      $newwidth=247;
      $newheight=381;
      $thumb = imagecreatetruecolor($newwidth, $newheight);
      imagecopyresized($thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
      return $thumb;
    }
    return $img;
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
header('Content-Type: image/jpeg');
if(file_exists("./cache/".$isbn."|".$size.".jpg")){
	$img = loadJpeg("./cache/".$isbn."|".$size.".jpg",true,$isbn);
}else{
	$img = checkImage($size,loadJpeg("http://contentcafe2.btol.com/ContentCafe/Jacket.aspx?UserID=LPT18968&Password=CC11787&Return=1&Type=$size&Value=$isbn",false,$isbn));
}

imagejpeg($img);
//imagejpeg($img,"./cache/".$isbn."|".$size.".jpg");
imagedestroy($img);