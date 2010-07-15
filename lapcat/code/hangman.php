<?
require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/php-functions.php';
$A_S=explode('.php?url=',$_SERVER['REQUEST_URI']);
$A_URLE=explode('/',$A_S[1]);
$V_LI=false;
$V_SR=$_SERVER['DOCUMENT_ROOT'];
function F_URLNF(){header('HTTP/1.0 404 Not Found');header('Status: 404 Not Found');echo '404 Error';}
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

if(isset($_SESSION['hangman'])){$o_H=unserialize($_SESSION['hangman']);}else{$o_H=new Hangman();$v_LAP=true;}
switch($A_URLE[0]){
	case 'reset':
	case 'start':
	case 'continue':
		$a_XML[]=$o_H->F_C($o_U->A_U['user-ID']);break;
	default:break;
}
if(isset($o_H)){$_SESSION['hangman']=serialize($o_H);}

if(!empty($a_XML)){$o_U->A_U['XML']=implode($a_XML,'<boom>');}else{F_URLNF();}
if(isset($o_U)){$_SESSION['user']=serialize($o_U);}
if($v_LAP){header('HTTP/1.1 200 OK');header('Status: 200 OK');}else{F_HR($o_U->A_U['XML']);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="color-off">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link href="http://dev.lapcat.org/lapcat/css/nebula.css" rel="stylesheet" type="text/css" />
		<link href="http://dev.lapcat.org/lapcat/css/themes/theme-0.css" id="css-theme" rel="stylesheet" type="text/css" />
		<link href="http://dev.lapcat.org/lapcat/css/themes/theme-<?=$o_U->V_TS;?>.css" id="css-theme" rel="stylesheet" type="text/css" />
		<script src="http://dev.lapcat.org/lapcat/java/parts-2009.js" type="text/javascript"></script>
		<script src="http://dev.lapcat.org/lapcat/java/hangman-2009.js" type="text/javascript"></script>
	</head>
	<body class="color-off" style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/layout/hangman-2009.php';
		?>
		<script type="text/javascript">Func_MR('/lapcat/code/hangman.php?url=start/ajax');</script>
	</span></body>
</html>