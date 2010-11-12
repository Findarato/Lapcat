<?
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/db.php';
$v_DC=db::getInstance();
$v_DC->Query('SELECT title FROM hex_databases;');
$a_Results=$v_DC->Format('assoc_array');
foreach($a_Results as $v_Key=>$a_Result){
	$v_DC->Query('INSERT INTO lapcat_hotkeys (title,description,class,area) VALUES ("Use Database - '.$a_Result['title'].'","Access '.$a_Result['title'].' database.","single","databases");');
}
print_r($a_Results);die();
?>