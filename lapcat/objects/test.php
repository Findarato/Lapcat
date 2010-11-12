<?
class LAPCAT{
	//
	// ARRAYS
	//
	//
	// Array - Parameters
	private $A_Parameters=array(
		'message-filter'=>0
	);
	//
	// Array - News
	private $A_News=array(
		
	);
	//
	// Array - Tag
	private $A_Tag=array(
		'ID'=>0,
		'name'=>''
	);
	//
	// Array - User
	private $A_User=array(
		'ID'=>0,
		'IP'=>0
	);
	//
	// LAPCAT
	function LAPCAT($v_UserID=0,$v_IP=''){
		if($v_UserID>0){
			$this->A_User['ID']=$v_UserID;
		}
		$this->F_SetIP($v_IP);
	}
	//
	// Function - Set Tag
	function F_SetTag(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT name FROM hex_tags WHERE ID='.$v_TagID.';');
		$this->A_CurrentTag=array(
			'ID'=>$v_TagID,
			'name'=>$v_DC->Format('assoc')
		);
	}
	//
	// Function - Click Tag
	function F_ClickTag($v_TagID=0){
		if($v_TagID>0){
			$this->F_SetTag($v_TagID);
			$a_Date=explode('-',date('d-m-Y'));
			$v_DC=db::getInstance();
			$v_DC->Query('SELECT COUNT(*) AS total FROM hex_popular_tags WHERE tag_ID='.$v_TagID.' AND ip_address='.$this->A_Parameters['IP'].' AND DAY(time_stamp)='.$a_Date[0].' AND MONTH(time_stamp)='.$a_Date[1].' AND YEAR(time_stamp)='.$a_Date[2].';');
			$a_R=$v_DC->Format('assoc');
			if($a_R['total']==0){
				$v_DC->Query('INSERT INTO hex_popular_tags (tag_ID,ip_address) VALUES ('.$v_TagID.','.$this->A_Parameters['IP'].');');
			}
		}
	}
	//
	// Function - Set IP
	function F_SetIP($v_IP=''){
		$a_IP=$v_IP.explode('.',$v_IP,4);
		$this->A_User['IP']=(intval($a_IP[0])*pow(2,24))+(intval($a_IP[1])*pow(2,16))+(intval($a_IP[2])*pow(2,8))+intval($a_IP[3]);
	}
}
?>