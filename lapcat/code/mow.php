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
// Variable - Load All Parts
if(in_array('ajax',$A_URLE)){$v_LAP=false;}else{$v_LAP=true;}
// Variable - Pass
$v_P=false;
if(isset($_SESSION['mow'])){$o_MoW=unserialize($_SESSION['mow']);}else{$o_MoW=new Mow();$v_LAP=true;}
$v_URL='start/ajax';
switch($A_URLE[0]){
	case 'start':$a_XML[]=$o_MoW->F_SG();break;
	case 'form':$a_XML[]=$o_MoW->F_SAC();break;
	case 'list':$a_XML[]=$o_MoW->F_SL();break;
	case 'ability-list':$a_XML[]=$o_MoW->F_SAL();break;
	case 'action-list':$a_XML[]=$o_MoW->F_SAcL();break;
	case 'log':$a_XML[]=$o_MoW->F_Log($A_URLE[1]);break;
	case 'ability':$a_XML[]=$o_MoW->F_SAA();break;
	case 'action':$a_XML[]=$o_MoW->F_SAAc();break;
	case 'update':$a_XML[]=$o_MoW->F_SAM();break;
	case 'add-ability':$a_XML[]=$o_MoW->F_AA($_POST);break;
	case 'add-action':$a_XML[]=$o_MoW->F_AAc($_POST);break;
	case 'add-message':$a_XML[]=$o_MoW->F_AM($_POST);break;
	case 'retrieve-messages':$a_XML[]=$o_MoW->F_RM($_POST);break;
	case 'add':$a_XML[]=$o_MoW->F_AdC($A_URLE[1]);break;
	case 'remove':$a_XML[]=$o_MoW->F_ReC($A_URLE[1]);break;
	case 'add-card':$a_XML[]=$o_MoW->F_AC($_POST);break;
	default:break;
}
if(isset($o_MoW)){$_SESSION['mow']=serialize($o_MoW);}

if(empty($a_XML)||$v_P){F_URLNF();}
if($v_LAP){header('HTTP/1.1 200 OK');header('Status: 200 OK');}else{F_HR(implode($a_XML,'<boom>'));}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link href="http://dev.lapcat.org/lapcat/css/mow.css" rel="stylesheet" type="text/css" />
		<script src="http://dev.lapcat.org/lapcat/java/parts-2009.js" type="text/javascript"></script>
		<script src="http://dev.lapcat.org/lapcat/java/mow-2009.js" type="text/javascript"></script>
	</head>
	<body style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/layout/mow-2009.php';
		?>
		<script type="text/javascript">Fun_MR('/lapcat/code/mow.php?url=<?=$v_URL;?>');</script>
	</span></body>
</html>