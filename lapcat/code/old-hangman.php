<?
require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
$A_URLE=explode('/',$_SERVER['REQUEST_URI']);
$V_LI=false;
$V_SH=$_SERVER['HTTP_HOST'];
$V_SR=$_SERVER['DOCUMENT_ROOT'];
$V_URLE='';
function F_URLNF(){header('HTTP/1.0 404 Not Found');header('Status: 404 Not Found');echo '404 Error';}
array_shift($A_URLE);
array_shift($A_URLE);
array_shift($A_URLE);
if(is_null($A_URLE[0])||strlen($A_URLE[0])==0){$A_URLE=explode('/','hangman');}
$V_S=array_shift($A_URLE);
function F_HR($v_XML){header('HTTP/1.1 200 OK');header('Status: 200 OK');echo $v_XML;die();}
$a_XML=array();
if(isset($_SESSION['user'])){$o_U=unserialize($_SESSION['user']);}else{$o_U=new User();}
if($o_U->A_U['logged-in']>2){$V_LI=true;}
$o_U->A_U['XML']='';
// Set-Up
if(isset($_SESSION['setup'])){$o_S=unserialize($_SESSION['setup']);}else{$o_S=new Setup();}
if(isset($o_S)){$_SESSION['setup']=serialize($o_S);}
// Variable - Load All Parts
if(in_array('ajax',$A_URLE)){$v_LAP=false;}else{$v_LAP=true;}
switch($V_S){
	case 'hangman.php':
	case 'hangman':
		//if(isset($_SESSION['hangman'])){$o_H=unserialize($_SESSION['hangman']);}else{$o_H=new Hangman();$v_LAP=true;}
		$a_XML[]='<hangman></hangman>';
		//if(isset($o_H)){$_SESSION['hangman']=serialize($o_H);}
		break;
	default:break;
}
if(!empty($a_XML)){$o_U->A_U['XML']=implode($a_XML,'<boom>');}else{print_r('<font style="color:rgb(255,255,255);">Hangman</font>');die();F_URLNF();}
if(isset($o_U)){$_SESSION['user']=serialize($o_U);}
if($v_LAP){header('HTTP/1.1 200 OK');header('Status: 200 OK');}else{F_HR($o_U->A_U['XML']);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="color-off">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="http://<?=$V_SH;?>/lapcat/css/hangman.css" />
		<link id="css-theme" rel="stylesheet" type="text/css" href="http://<?=$V_SH;?>/lapcat/css/theme-<?=$o_U->V_TS;?>.css" />
		<!--//                 //-->

		<script type="text/javascript" src="http://<?=$V_SH;?>/lapcat/java/ajax-2009.js" type="text/javascript"></script>

		<script type="text/javascript" src="http://<?=$V_SH;?>/lapcat/java/hangman-2009.js" type="text/javascript"></script>
	</head>
	<body class="color-off" style="margin:2px; width:auto;">
        <?
		flush();
		include_once $V_SR.'/lapcat/layout/hangman-2009.php';
		?>
		<!--//<script type="text/javascript">F_MR('/lapcat/ajax/get-XML.php');</script>//-->
	</span></body>
</html>