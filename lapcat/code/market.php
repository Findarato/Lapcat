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
// User ID
$V_UserID=$o_U->A_U['user-ID'];
// Tag ID
$V_TagID=$o_U->A_U['tag'];
// Tag Name
$V_TagName='';
// Set-Up
if(isset($_SESSION['setup'])){$o_S=unserialize($_SESSION['setup']);}else{$o_S=new Setup();}
if(isset($o_S)){$_SESSION['setup']=serialize($o_S);}
// Variable - Load All Parts
if(in_array('ajax',$A_URLE)){$v_LAP=false;}else{$v_LAP=true;}
// Variable - Pass
$v_P=false;
// Array - Extra
$a_XMLE=false;
if(isset($_SESSION['market'])){$o_Market=unserialize($_SESSION['market']);}else{$o_Market=new Market();$v_LAP=true;}
$v_URL='start/ajax';

switch($A_URLE[0]){
	case 'start':
		switch($o_U->A_U['area-ID']){
			default:break;
			case 34:
				if(isset($_SESSION['materials'])){$o_M=unserialize($_SESSION['materials']);}else{$o_M=new Materials2($V_UserID,$V_TagID);}
				$o_Market->F_SetArea($V_UserID,34,'materials');
				$o_Market->F_SetHotkeyLink($V_UserID,$o_M->F_ConstructHotkeyLink($V_UserID,'materials'));
				$o_Market->F_SetHotkeyDescription($V_UserID,$o_M->F_ConstructDescription($V_UserID));
				if(isset($o_M)){$_SESSION['materials']=serialize($o_M);}
				break;
		}
		$a_XML[]=$o_Market->F_Choose($V_UserID,$V_LI);
		break;


	case 'manage-hotkeys':
		$a_XML[]=$o_Market->F_Manage($o_U->A_U['user-ID'],$V_LI,$o_S->A_H);
		break;

	case 'purchase-hotkey':
		$v_HotkeyCreated=$o_Market->F_PurchaseHotkey($o_U->A_U['user-ID'],$V_LI,$A_URLE);
		switch($v_HotkeyCreated){
			case 0:
				$a_XML[]=FF_MM('Market','Unable to create new hotkey.');
				break;
			case 1:
				$a_XML[]=FF_MM('Market','You have created a new hotkey.');
				$a_XML[]=$o_Market->F_Manage($o_U->A_U['user-ID'],$V_LI,$o_S->A_H);
				break;
			case 2:default:
				$a_XML[]=FF_MM('Market','You do not have enough points for this purchase.');
				break;
		}break;

	case 'reset':
		$o_Market->F_Reset($o_U->A_U['user-ID'],$o_U->A_U['type'],$V_LI,$A_URLE);
	case 'multi':case 'create-hotkey':
		$a_XML[]=$o_Market->F_Create($o_U->A_U['user-ID'],$V_LI,$A_URLE);
		break;

	case 'browse':
		$a_XML[]=$o_Market->F_Browse($V_UserID,$V_LI);
		break;

	default:break;
}

if(!empty($a_XMLE)){foreach($a_XMLE as $v_K=>$v_D){$a_XML[]=$v_D;}}

if(isset($o_Market)){$_SESSION['market']=serialize($o_Market);}

if(!empty($a_XML)||$v_P){$o_U->A_U['XML']=implode($a_XML,'<boom>');}else{F_URLNF();}
if(isset($o_U)){$_SESSION['user']=serialize($o_U);}
if($v_LAP){header('HTTP/1.1 200 OK');header('Status: 200 OK');}else{F_HR($o_U->A_U['XML']);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="color-off">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link href="/lapcat/css/nebula.css" rel="stylesheet" type="text/css" />
		<link id="css-theme" rel="stylesheet" type="text/css" href="/lapcat/css/themes/theme-0.css" />
		<link id="css-theme" rel="stylesheet" type="text/css" href="/lapcat/css/themes/theme-generator.php?theme=<?=$o_U->V_TS;?>" />
		<link href="/lapcat/css/market.css" rel="stylesheet" type="text/css" />
		<script src="http://cdn1.lapcat.org/js/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="/lapcat/java/jquery.purr.js" type="text/javascript"></script>
		<script src="/lapcat/java/parts-2009.js" type="text/javascript"></script>
		<script src="/lapcat/java/market-2009.js" type="text/javascript"></script>
		<script type="text/javascript" src="/lapcat/tinymce_3_2_2_1/jscripts/tiny_mce/tiny_mce.js"></script>
	</head>
	<body class="color-off" style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/layout/market-2009.php';
		?>
		<script type="text/javascript">F_MakeR('/lapcat/code/market.php?url=<?=$v_URL;?>');</script>
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			try {
				var pageTracker = _gat._getTracker("UA-8067208-2");
				pageTracker._trackPageview();
			} catch(err) {}
		</script>
	</span></body>
</html>