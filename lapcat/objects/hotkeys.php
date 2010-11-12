<?
class Hotkeys{
	public $A_R=array();
	public $V_AID=39;
	public $V_ATL=0;
	public $V_ATD=39;
	public $V_CURL='';
	public $V_HB=' all hotkeys';
	public $V_HE=' sorted by popularity.';
	public $V_L=8;
	public $V_LS=1;
	public $V_LT=0;
	public $V_OB=' ORDER BY vh.counted DESC, vh.sub_name ASC';
	public $V_PURL='';
	public $V_SQL='';
	public $V_W='';
	//
	// View SQL
	// SELECT COUNT(*) AS counted, hp.portal_ID AS ID, hp.op_cost AS cost, hp.link_values, ha.sub_name FROM hex_portals AS hp LEFT JOIN hex_portals_collected AS hpc ON (hpc.portal_ID=hp.portal_ID) LEFT JOIN hex_areas AS ha ON (ha.portal_ID=hp.portal_ID) WHERE hp.portal_ID>0 AND hp.locked=2 GROUP BY hp.portal_ID;
	//
	// Function - Get Hotkeys
	function F_GH($v_UID,$v_UT,$v_UM=''){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='SELECT COUNT(*) AS total FROM viewable_hotkeys AS vh WHERE vh.ID>0'.$this->V_W;
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){$a_LT=$v_DC->Format('assoc');$this->V_LT=$a_LT['total'];}
		$v_SQL='SELECT vh.counted, vh.ID AS hotkey_image, vh.sub_name AS name, vh.link_values AS hotkey_link, hpc.active_status FROM viewable_hotkeys AS vh LEFT JOIN hex_portals_collected AS hpc ON (hpc.portal_ID=vh.ID&&hpc.user_ID='.$v_UID.') WHERE vh.ID>0'.$this->V_W;$this->V_SQL=$v_SQL;
		$v_SQL.=$this->V_OB.' LIMIT '.(($this->V_LS-1)*8).','.$this->V_L.';';
		//print_r($v_SQL);die();
		$v_DC->Query($v_SQL);
		$v_He='I am browsing'.$this->V_HB.$this->V_HE;
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc_array'));
			if($this->V_L==1){$a_R['total']=1;}else{$a_R['total']=$this->V_LT;}
			$a_R['screen']=$this->V_LS;
			$a_R['header']=$v_He;
			$a_G['t']=$a_R[0]['hotkey_image'];
			$a_R['OL']=$this->F_GOL($a_G['t'],$v_UID,$v_UT);
			$this->A_R=$a_R;
			return FF_CATXML($a_R,'hkeys',true,'hkey').$v_UM;
		}else{print_r($v_SQL);die();return '<no_hkeys><total>0</total><screen>1</screen><header>'.$v_He.'</header></no_hkeys>';}
	}
	//
	// Function - Get Open Line
	function F_GOL($v_Ta,$v_UID=0,$v_UT=2){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='SELECT vh.counted, vh.cost, vh.ID AS hotkey_image, vh.sub_name AS name, vh.link_values AS hotkey_link, hpc.active_status, hpc.position FROM viewable_hotkeys AS vh LEFT JOIN hex_portals_collected AS hpc ON (hpc.portal_ID=vh.ID&&hpc.user_ID='.$v_UID.') WHERE vh.ID='.$v_Ta.';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc'));
			$a_R['target']='39-'.$v_Ta;
			$a_R['tag_set']=FF_GE($v_Ta,'hotkey');
			return FF_CATXML($a_R,'openline');
		}else{return '<openline/>';}
	}
	//
	// Function - Add Hotkey
	function F_AH($v_Ta,$v_UID=0,$v_UT=2){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='SELECT active_status, position FROM hex_portals_collected WHERE user_ID='.$v_UID.' AND portal_ID='.$v_Ta[1].';';
		$v_DC->Query($v_SQL);
		$a_R=$v_DC->Format('assoc');
		if($v_DC->Count_res()>0){
			// Selected Hotkey is Unlocked
			// Remove the previous Hotkey from this Position on the Hotkey Bar
			$v_SQL='UPDATE hex_portals_collected SET active_status=3, position=0 WHERE user_ID='.$v_UID.' AND position='.$v_Ta[2].';';
			$v_DC->Query($v_SQL);
			// Add the new Hotkey to this Position on the Hotkey Bar
			$v_SQL='UPDATE hex_portals_collected SET active_status=2, position='.$v_Ta[2].' WHERE user_ID='.$v_UID.' AND portal_ID='.$v_Ta[1].';';
			$v_DC->Query($v_SQL);
			return 'BOOM';
		}else{
			// Selected Hotkey is Locked
			return '';
		}
		//return $this->F_GOL($v_Ta[1],$v_UID,$v_UT);
	}
	//
	// Function - Get URL
	function F_GURL($a_G,$v_UID=0,$v_UT=2){
		$this->V_PURL=$this->V_CURL;
		$this->V_CURL=implode('/',$a_G);
		foreach($a_G as $v_K=>$v_D){
			// [0] Hotkeys, [1] Area ID, [2] Search, [3] Screen, [4] Sort, [5] Target
			switch($v_K){
				// Area ID
				case 1:switch($v_D){case 0:break;default:$this->V_AID=$v_D;break;}break;
				// Search ID
				case 2:
					switch($v_D){
						case 0:break;
						case 1:$this->V_W='';$this->V_HB=' all hotkeys';break;
						case 2:$this->V_W=' AND hpc.active_status=NULL';$this->V_HB=' locked hotkeys';break;
						case 3:$this->V_W=' AND (hpc.active_status=2 OR hpc.active_status=4)';$this->V_HB=' unlocked hotkeys';break;
						default:$this->V_W='';break;}break;
				// Screen
				case 3:switch($v_D){case 0:$this->V_LS=1;break;default:$this->V_LS=$v_D;break;}break;
				// Sort
				case 4:
					switch($v_D){
						case 0:break;
						case 1:default:$this->V_OB=' ORDER BY vh.counted DESC, vh.sub_name ASC';$this->V_HE=' sorted by popularity.';break;
						case 2:$this->V_OB=' ORDER BY vh.sub_name ASC, vh.counted DESC';$this->V_HE=' sorted alphabetically.';break;
						case 3:$this->V_OB=' ORDER BY vh.sub_name DESC, vh.counted DESC';$this->V_HE=' sorted alphabetically in reverse order.';break;}break;
				// 
				default:break;
			}
		}
		return $this->F_GH($v_UID,$v_UT);
	}
}
?>