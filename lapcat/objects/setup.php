<?
class Setup{
	public $A_H=array();
	private $A_HI=array('max'=>5,'total'=>0);
	private $V_UpdateTS=0;
	private $V_HomeLibrary=0;
	//
	// Function - Setup
	function Setup($v_UserID=0){$this->F_Reset($v_UserID);}
	//
	// Function - Reset
	function F_Reset($v_UserID=0){
		$this->V_HomeLibrary=0;
		$this->A_H=array();
		$this->A_HI=array('max'=>5,'total'=>0,'update'=>true);
	}


	public $V_AID=28;
	//
	// Function - Set Home Library
	function F_SetHomeLibrary($v_UserID=0,$v_HomeLibrary=0){$this->V_HomeLibrary=$v_HomeLibrary;}
	//
	// Function - Get Home Library XML
	function F_GetHomeLibraryXML($v_UserID=0){return '<my-library-ID>'.$this->V_HomeLibrary.'</my-library-ID>';}
	//
	// Function - Get Hotkey Information
	function F_GetHotkeyInformation($v_UserID=0){
		$v_DC=db::getInstance();
		$v_SQL='SELECT hpc.portal_ID AS hotkey_image, ha.sub_name, hp.op_cost AS cost, hp.link_values AS hotkey_link, hpc.position, hp.special FROM hex_portals_collected AS hpc LEFT JOIN hex_areas AS ha ON (hpc.portal_ID=ha.portal_ID) LEFT JOIN hex_portals AS hp ON (hpc.portal_ID=hp.portal_ID) WHERE hpc.user_ID='.$v_UserID.' AND hpc.active_status=2;';
		$v_DC->Query($v_SQL);
		$a_R=$v_DC->Format('assoc_array');
		if($v_DC->Count_res()>0){
			foreach($a_R as $v_K=>$v_D){
				switch($a_R[$v_K]['special']){
					case 8:
						$v_SQL='SELECT hl.time_start, hl.time_end FROM hex_libraries AS hl WHERE hl.library_ID='.$this->V_HomeLibrary.' AND hl.day_of_week='.date('w');
						$v_DC->Query($v_SQL);
						$a_Sp=$v_DC->Format('assoc');
						if(strtotime($a_Sp['time_start'])<=time()&&strtotime($a_Sp['time_end'])>=time()){$a_R[$v_K]['special']='Open';}else{$a_R[$v_K]['special']='Closed';}
						break;
					case 9:
						$v_SQL='SELECT COUNT(*) AS counted FROM viewable_events AS ve WHERE WEEK(ve.o_date)=WEEK(DATE(CURRENT_TIMESTAMP));';
						$v_DC->Query($v_SQL);
						$a_Sp=$v_DC->Format('assoc');
						$a_R[$v_K]['special']=$a_Sp['counted'];
						break;
					case 0:default:break;}}
			$this->A_H=$a_R;
			return FF_CATXML($a_R,'hotkeys',true,'hotkey');}else{return '<hotkeys><hotkey-image>1000</hotkey-image><sub-name>Hours and Locations</sub-name><cost>0</cost><hotkey-link>/hotkey/hours-and-locations</hotkey-link><position>1</position><special>???</special></hotkeys>';}
	}
}
?>