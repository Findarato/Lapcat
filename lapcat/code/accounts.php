<?
require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/php-functions.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
if(isset($_SESSION['user'])){
	$o_User=unserialize($_SESSION['user']);
	if(isset($_GET['submitted'])){
		if(isset($_GET['username'])&&isset($_GET['password'])){
			if($_GET['username']!=''){
				$a_Status=$o_User->UserLogin($_GET['username'],$_GET['password']);
				switch($a_Status['success']){
					case 2:
						//$o_LAPCAT=unserialize($_SESSION['LAPCAT']);
						//$o_LAPCAT->f_LogUserIn($a_Status['user']);
						//$_SESSION['LAPCAT']=serialize($o_LAPCAT);
						$_SESSION['user']=serialize($o_User);
						echo json_encode(array('switch'=>'passed','hotkeys'=>$o_User->a_Hotkeys,'theme'=>$o_User->a_User['theme'],'type'=>$o_User->A_U['type']));
						die();
						break;
					case 1:echo json_encode(array('switch'=>'could-not-create-account','theme'=>$o_User->a_User['theme'],'type'=>$o_User->A_U['type']));die();break;
					case 0:default:
						echo json_encode(array('switch'=>$a_Status['success'],'theme'=>$o_User->a_User['theme'],'type'=>$o_User->A_U['type']));die();break;
						break;
				}
			}
		}
	}
}
echo json_encode(array('switch'=>'failed'));die();
?>
<!--//<html><head><script language="javascript">window.parent.location='/';</script></head><body></body></html>//-->