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
if(isset($_SESSION['objectives'])){$o_O=unserialize($_SESSION['objectives']);}else{$o_O=new Objectives();$v_LAP=true;}
$v_URL='start/ajax';
if(isset($_SESSION['tag'])){$o_CT=unserialize($_SESSION['tag']);}else{$o_CT=new Tag();}
$V_AN='???';
switch($A_URLE[0]){
	case 'edit':if(array_key_exists(2,$A_URLE)){$v_URL='edit/'.$A_URLE[1].'/'.$A_URLE[2].'/ajax';}break;
	case 'join':$v_URL='objective/26/ajax';break;
	case 'reset':
		switch(intval($A_URLE[1])){
			case 2:$V_AN='My Library';break;
			case 3:$V_AN='Home';break;
			case 8:$V_AN='Hours';break;
			case 10:$V_AN='Databases';break;
			case 28:$V_AN='Events';break;
			case 34:$V_AN='Materials';break;
			case 131:$V_AN='News';break;
			default:break;}
		$o_O->V_AID=$V_AN;
		$o_O->V_AN=$V_AN;
		break;
	default:break;
}
$V_OT=$o_O->V_AN;
switch($A_URLE[0]){
	case 'change-tag':$a_XML[]='<AC-target>'.$A_URLE[1].'</AC-target>';$a_XML[]=$o_CT->F_AC($o_U->A_U['user-ID'],$A_URLE[2],'form');break;
	case 'error':break;
	case 'message':$a_XML[]=$o_O->F_GetMessage($o_U->A_U['user-ID'],$o_U->A_U['type'],$A_URLE[1]);$v_URL='message/'.$A_URLE[1].'/ajax';break;
	case 'edit':if(array_key_exists(2,$A_URLE)){$a_XML[]=$o_O->F_Edit($o_U->A_U['user-ID'],$o_U->A_U['type'],$A_URLE[2]);}break;
	case 'action':
		if(isset($_SESSION['security_code'])){$v_SC=$_SESSION['security_code'];}else{$v_SC='';}
		$a_Tags=array('objective-data-24','objective-data-25','objective-data-26','objective-data-27');
		foreach($_POST as $v_K=>$v_D){if(in_array($v_K,$a_Tags)){$_POST[$v_K]=$o_CT->F_CT($o_U->A_U['user-ID'],$v_D);}}
		if($o_O->F_CompleteObjective($o_U->A_U['user-ID'],$o_U->A_U['type'],$V_LI,$A_URLE[1],$v_SC)){
			$v_P=true;
			$v_URL='message/'.$A_URLE[1].'C/ajax';
		}else{
			$v_P=true;
			$v_URL='continue/'.$A_URLE[1].'/ajax';
		}
		break;

	case 'join':
	case 'reset':$o_O->F_DetermineObjectives($o_U->A_U['user-ID'],$o_U->A_U['type'],$V_LI,$A_URLE);
	case 'start':$a_XML[]=$o_O->F_GetObjectives($o_U->A_U['user-ID'],0);break;

	case 'continue':if($o_O->V_EC>0){$a_XMLE[]=$o_O->F_ReturnData();$a_XMLE[]=FF_CATXML($o_O->A_OE,'objective-errors');}
	case 'objective':$a_XML[]=$o_O->F_StartObjective($o_U->A_U['user-ID'],$o_U->A_U['type'],intval($A_URLE[1]));break;

	case 'general':$a_XML[]=$o_O->F_GetObjectives($o_U->A_U['user-ID'],1);$V_OT='General';break;

	case 'work':$a_XML[]=$o_O->F_GetObjectives($o_U->A_U['user-ID'],2);$V_OT='Work';break;

	default:break;
}
if(isset($o_CT)){$_SESSION['tag']=serialize($o_CT);}

if(!empty($a_XMLE)){foreach($a_XMLE as $v_K=>$v_D){$a_XML[]=$v_D;}}

if(isset($o_O)){$_SESSION['objectives']=serialize($o_O);}

if(!empty($a_XML)||$v_P){$o_U->A_U['XML']=implode($a_XML,'<boom>');}else{F_URLNF();}
if(isset($o_U)){$_SESSION['user']=serialize($o_U);}
if($v_LAP){header('HTTP/1.1 200 OK');header('Status: 200 OK');}else{F_HR($o_U->A_U['XML']);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="color-off">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link href="/lapcat/css/nebula.css" rel="stylesheet" type="text/css" />
		<link href="/lapcat/css/themes/theme-0.css" id="css-theme" rel="stylesheet" type="text/css" />
		<link href="/lapcat/css/themes/theme-generator.php?theme=<?=$o_U->V_TS;?>" id="css-theme" rel="stylesheet" type="text/css" />
		<link href="/lapcat/css/objectives.css" rel="stylesheet" type="text/css" />
		<script src="/lapcat/java/parts-2009.js" type="text/javascript"></script>
		<script src="/lapcat/java/objectives-2009.js" type="text/javascript"></script>
		<script type="text/javascript" src="/lapcat/tinymce_3_2_2_1/jscripts/tiny_mce/tiny_mce.js"></script>
	</head>
	<body class="color-off" style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/layout/objectives-2009.php';
		?>
		<script type="text/javascript">Fu_MR('/lapcat/code/objectives.php?url=<?=$v_URL;?>');</script>
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