<?
$V_SR=$_SERVER['DOCUMENT_ROOT'];
require_once $V_SR.'/lapcat/code/no-cache.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
include_once $V_SR.'/lapcat/code/php-functions.php';
$A_S=explode('.php?url=',$_SERVER['REQUEST_URI']);
if(!array_key_exists(1,$A_S)){$A_URLE=array('continue');}else{$A_URLE=explode('/',$A_S[1]);}
$V_LI=false;

// Array - XML
$a_XML=array();

// Variable - Load All Parts
if(in_array('ajax',$A_URLE)){$v_LAP=false;}else{$v_LAP=true;}

// Online Adventures
if(isset($_SESSION['online'])){$o_OA=unserialize($_SESSION['online']);}else{$o_OA=new Adventures();$v_LAP=true;}

// Variable - URL
$v_URL='continue/ajax';

// Array - Pass
$a_Pass=array('group'=>false,'action'=>false,'target'=>false);

// Variable - Group
if(array_key_exists(0,$A_URLE)){$v_Group=$A_URLE[0];$a_Pass['group']=true;}

// Variable - Action
if(array_key_exists(1,$A_URLE)){$v_Action=$A_URLE[1];$a_Pass['action']=true;}

// Variable - Target
if(array_key_exists(2,$A_URLE)){$v_Target=$A_URLE[2];$a_Pass['target']=true;}

if(!$v_LAP&&$a_Pass['group']){switch($v_Group){

		case 'continue':
			$a_XML[]=$o_OA->F_GetOptionsXML();
			if($a_Pass['action']){switch($v_Action){
			
					case 'walk':case 'run':case'move':
						$a_XML[]=$o_OA->F_Move($v_Action,$v_Target);
						break;
						
					default:$a_XML[]=$o_OA->F_GetMessageXML(4);break;

			}}else{$a_XML[]=$o_OA->F_GetMessageXML(3);}
			$a_XML[]=$o_OA->F_GetPlayerXML();
			$a_XML[]=$o_OA->F_GetActionsXML();
			if($o_OA->F_GetMap()){$a_XML[]=$o_OA->F_GetMapXML();}
			if($o_OA->F_PlayerHasMoved()){$a_XML[]='<player-has-moved/>';}
			$a_XML[]=$o_OA->F_GetActiveConditionsXML();
			break;

		default:$a_XML[]=$o_OA->F_GetMessageXML(2);break;

}}else{$o_OA->F_SendMap();}

if(isset($o_OA)){$_SESSION['online']=serialize($o_OA);}

if($v_LAP){
	header('HTTP/1.1 200 OK');
	header('Status: 200 OK');
}else{
	if(empty($a_XML)){
		header('HTTP/1.0 404 Not Found');
		header('Status: 404 Not Found');
		echo '404 Error';
	}else{
		header('HTTP/1.1 200 OK');
		header('Status: 200 OK');
		echo implode($a_XML,'<boom>');
	}
	die();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/lapcat/online/online.css" />
		<script defer src="/lapcat/java/pngfix.js" type="text/javascript"></script>
		<script src="/lapcat/java/parts-2009.js" type="text/javascript"></script>
		<script src="/lapcat/online/online-2009.js" type="text/javascript"></script>
		<script src="http://cdn1.lapcat.org/js/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="/lapcat/java/jquery.purr.js" type="text/javascript"></script>
	</head>
	<body style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/online/layout-2009.php';
		?>
		<script type="text/javascript">F_MR('/lapcat/online/online.php?url=<?=$v_URL;?>');</script>
	</span></body>
</html>