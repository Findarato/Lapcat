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
// Variable - Pass
$v_P=false;
// Array - Extra
$a_XMLE=false;
// User ID
$V_UserID=$o_U->A_U['user-ID'];
// Tag ID
$V_TagID=$o_U->A_U['tag'];
// Tag Name
$V_TagName='';
if(isset($_SESSION['options'])){$o_Options=unserialize($_SESSION['options']);}else{$o_Options=new Options($V_UserID,$o_U->V_TS);$v_LAP=true;}
$v_URL='continue/ajax';
if(isset($_SESSION['tag'])){$o_CT=unserialize($_SESSION['tag']);}else{$o_CT=new Tag();}
switch($A_URLE[0]){
	case 'change-theme':
		if(isset($A_URLE[1])){$o_U->V_TS=$A_URLE[1];}
	case 'continue':
		// Add XML
		$a_XML[]=$o_Options->F_PerformAction($V_UserID,$A_URLE[0],((isset($A_URLE[1]))?$A_URLE[1]:''));
		break;
	case 'reset':
		$o_Options->F_PerformAction($V_UserID,$A_URLE[0],'');
		break;
	default:break;
}
if(isset($o_CT)){$_SESSION['tag']=serialize($o_CT);}

if(!empty($a_XMLE)){foreach($a_XMLE as $v_K=>$v_D){$a_XML[]=$v_D;}}

if(isset($o_Options)){$_SESSION['options']=serialize($o_Options);}
if(!empty($a_XML)||$v_P){$o_U->A_U['XML']=implode($a_XML,'<boom>');}else{F_URLNF();}
if(isset($o_U)){$_SESSION['user']=serialize($o_U);}
if($v_LAP){header('HTTP/1.1 200 OK');header('Status: 200 OK');}else{F_HR($o_U->A_U['XML']);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="color-off">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/lapcat/css/nebula.css" />
		<link id="css-theme" rel="stylesheet" type="text/css" href="/lapcat/css/themes/theme-generator.php?theme=<?=$o_U->V_TS;?>" />
		<script defer src="/lapcat/java/pngfix.js" type="text/javascript"></script>
		<script src="http://cdn1.lapcat.org/js/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script type="text/javascript">if(jQuery.browser.msie){document.write('<link rel="stylesheet" type="text/css" href="/lapcat/css/IE.css" />');}</script>
        <script src="/lapcat/java/options-2009.js"></script>
	</head>
	<body class="color-off" style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/layout/options-2009.php';
		?>
		<script type="text/javascript">Fu_MR('/lapcat/code/options.php?url=<?=$v_URL;?>');</script>
	</span></body>
</html>