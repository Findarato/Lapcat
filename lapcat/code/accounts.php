<?
require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/php-functions.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
if(isset($_SESSION['user'])){
	$o_U=unserialize($_SESSION['user']);
	if(isset($_POST['submitted'])){
		if(isset($_POST['username'])&&isset($_POST['pass'])){
			if($_POST['username']!=''){
				if($o_U->UserLogin($_POST['username'],$_POST['pass'])){$_SESSION['user']=serialize($o_U);}}}}}
?>
<html><head><script language="javascript">window.parent.location='/';</script></head><body></body></html>
