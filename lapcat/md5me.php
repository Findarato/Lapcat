<?
/**
 * makeMD5 convertes the passwords in the database to be md5 hashes.  SHOULD ONLY BE RAN ONCE!
 * @return 
 */
	function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}

	$SQL = "SELECT id,password FROM hex_users";
	$db=db::getInstance();
	$db->Query($SQL);
	$res = $db->Fetch("assoc_array");
	if(isset($_GET) && $_GET['doit']=='yes'){
		foreach ($res as $r){
			$SQL = "UPDATE hex_users SET password = MD5('".$r['password']."') WHERE id=".$r['id'].";";
			$db->Query($SQL);
			echo $SQL;
		}
	}

	?>