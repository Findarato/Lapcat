<?
$V_SR=$_SERVER['DOCUMENT_ROOT'];
require_once $V_SR.'/lapcat/code/no-cache.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
include_once $V_SR.'/lapcat/code/php-functions.php';
$A_URL=explode('.php?url=',$_SERVER['REQUEST_URI']);
if(!array_key_exists(1,$A_URL)){
	$v_FullRefresh=true;
	$A_Extra=array('continue');
}else{
	$v_FullRefresh=false;
	$A_Extra=explode('/',$A_URL[1]);
}
if(isset($_SESSION['online'])){$o_Online=unserialize($_SESSION['online']);}else{$o_Online=new Online();}
if(!$v_FullRefresh){
	switch($A_Extra[0]){
		case 'get-quests':$V_JSON=$o_Online->f_GetQuests();break;
		case 'get-list':$V_JSON=$o_Online->f_GetList($A_Extra[1]);break;
		case 'continue':
		default:$V_JSON=$o_Online->f_Start();break;
	}
	//print_r($V_JSON);die();
}
//if(isset($o_Online)){$_SESSION['online']=serialize($o_Online);}

if($v_FullRefresh){
	header('HTTP/1.1 200 OK');
	header('Status: 200 OK');
}else{
	if($V_JSON==''){
		header('HTTP/1.0 404 Not Found');
		header('Status: 404 Not Found');
		echo '404 Error';
	}else{
		header('HTTP/1.1 200 OK');
		header('Status: 200 OK');
		die(json_encode($V_JSON));
	}
	die();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link id="index-css-theme" rel="stylesheet" type="text/css" href="/lapcat/css/themes/theme-generator.php?theme=22" />
		<script defer src="/lapcat/java/pngfix.js" type="text/javascript"></script>
		<script src="/lapcat/java/parts-2009.js" type="text/javascript"></script>
		<script src="http://cdn1.lapcat.org/js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script src="/lapcat/online/online-2009.js" type="text/javascript"></script>
	</head>
	<body style="margin:2px; width:auto;">
        <?
		include_once $V_SR.'/lapcat/online/online-layout-2009.php';
		?>
	</span></body>
</html>