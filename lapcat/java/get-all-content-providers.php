<?
header('Content-type: application/javascript');
header("Cache-Control: max-age=120, must-revalidate");
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
if(isset($_SESSION['LAPCAT'])){
	$o_LAPCAT=unserialize($_SESSION['LAPCAT']);
	$a_ContentProviders=$o_LAPCAT->f_GetAllContentProviders();
	$_SESSION['LAPCAT']=serialize($o_LAPCAT);
	echo 'var A_ContentProviders='.json_encode($a_ContentProviders).';';
}
?>