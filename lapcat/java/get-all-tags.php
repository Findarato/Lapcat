<?
header('Content-type: application/javascript');
header("Cache-Control: max-age=120, must-revalidate");
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
if(isset($_SESSION['LAPCAT'])){
	$o_LAPCAT=unserialize($_SESSION['LAPCAT']);
	$a_Tags=$o_LAPCAT->f_GetAllTags();
	$_SESSION['LAPCAT']=serialize($o_LAPCAT);
	echo 'var A_Tags='.json_encode($a_Tags).';';
}
?>