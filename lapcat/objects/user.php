<?
class User {
	// Array - Achievements
	private $A_Achievements=array(
		1=>false,
		2=>false,
		3=>false,
		4=>false
	);
	//
	// Function - Remove Achievement
	function F_RemoveAchievement($v_AchievementID=0){
		if(array_key_exists($v_AchievementID,$this->A_Achievements)){
			unset($this->A_Achievements[$v_AchievementID]);
		}
	}
	//
	// Function - Load Achievements
	function F_LoadAchievements(){
		
	}
	//
	// Function - Check Achievements
	function F_CheckAchievements($a_AchievementIDs=array()){
		$v_DC=db::getInstance();
		$a_Response=array();
		foreach($a_AchievementIDs as $v_AchievementID){
			if(array_key_exists($v_AchievementID,$this->A_Achievements)){
				$a_Response[$v_AchievementID]=F_Achievements($this->User_id,$v_AchievementID);
				//
				//
			}
			//
		}
		return $a_Response;
	}
	//
	// Function - Get Points Information
	function F_GetPointsInformation($v_UserID=0){
		if($v_UserID==$this->User_id){
			$a_JSON=array('data'=>array(
				'objective'=>$this->A_P['objective-points'],
				'patron-plus'=>$this->A_P['patron-plus-points'],
				'LAPCAT'=>0
			));
			$a_JSON['pointer']='points';
			return json_encode($a_JSON);
		}else{
			return json_encode(array('fail'=>true,'pointer'=>'points'));
		}
	}

	//
	// Function - Get Promotions XML
	function F_GetPromotionsXML($v_UserID=0){
		if(empty($this->A_Promotions)){$this->F_LoadPromotions($v_UserID);}
		return FF_CATXML($this->A_Promotions,'promotions-list');
	}

	//
	public $A_U=array('area-ID'=>0,'user-ID'=>0,'type'=>2,'library-ID'=>0,'online'=>2,'logged-in'=>2,'XML'=>'','patron-plus'=>2,'tag'=>0,'validated'=>false);
	public $A_BG=array('on'=>2,'r'=>0,'g'=>0,'b'=>0,'a'=>100,'image'=>1);
	public $A_D=array(0=>1,1=>1,2=>0,3=>0,'r'=>67,'g'=>118,'b'=>169,'a'=>35);
	public $A_P=array('objective-points'=>0,'patron-plus-points'=>0,'hotkeys-unlocked'=>0,'username'=>'Guest','user-type-ID'=>2,'user-type-name'=>'Guest','library-ID'=>0);
	private $A_Promotions=array();
	private $V_Promotion=0;
	private $V_PromotionCount=0;
	public $V_TS=9;
	public $V_LI=false;
	public $V_LIChanged=false;
	public $User_id = -1;//adding compatability to Joe's coding style
	//
	// Function - Get Data
	function F_GD(){return FF_CATXML($this->A_U,'user-info').'<boom>'.FF_CATXML($this->A_BG,'background-info').'<boom>'.FF_CATXML($this->A_D,'display-info').FF_CATXML($this->A_P,'points-info');}
	//
	// Function - Get Points Information
	function F_GPI(){return FF_CATXML($this->A_P,'points-info');}
	//
	// Function - Get Theme Set
	function F_GetThemeSet($v_UserID=0){
		$v_DC=db::getInstance();
		$v_SQL='SELECT htbu.theme_ID FROM lapcat.hex_themes_by_user AS htbu WHERE htbu.user_ID='.$v_UserID.';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){$a_Results=$v_DC->Format('assoc');$this->V_TS=$a_Results['theme_ID'];}
	}
	//
	// Function - Load Promotions
	function F_LoadPromotions($v_UserID=0){
		$v_DH=opendir($_SERVER['DOCUMENT_ROOT'].'/promotions/');
		while(($v_File=readdir($v_DH))!==false){
			if($v_File!=='..'&&$v_File!=='.'&&$v_File!=='.svn'){
				$this->A_Promotions[]=str_replace(' ','%20',$v_File);
			}
		}
		$this->V_PromotionCount=count($this->A_Promotions);
		closedir($v_DH);
	}
	//
	// Function - Next Promotion
	function F_NextPromotion(){
		if($this->V_Promotion+1<$this->V_PromotionCount){$this->V_Promotion++;}else{$this->V_Promotion=0;}
		return '<promotion>'.$this->A_Promotions[$this->V_Promotion].'</promotion>';
	}
	//
	// Function - User
	function User($tickets=false){if(!$tickets){$this->F_LoadPromotions();}}
	//
	// User Log-In
	function UserLogin($name=0,$pass=''){
		$SQL='SELECT hu.ID, hu.username, hu.adventureOn, hu.type, hu.cardnumber, hu.pin, hml.library_ID, hp.objective_points, hp.patron_plus_points, hp.hotkeys_unlocked, hu.firstname,hu.lastname FROM lapcat.hex_users AS hu LEFT JOIN lapcat.hex_points AS hp ON (hp.ID=hu.ID) LEFT JOIN lapcat.hex_my_library AS hml ON (hu.ID=hml.user_ID) WHERE hu.username="'.$name.'" AND hu.password=MD5("'.$pass.'") AND hu.validated="Yes" AND hu.locked=2;';
		$db=db::getInstance();
		$db->Query($SQL);
		$rows=$db->Format('assoc_array');
		if($db->Count_res()>0){
			foreach($rows as $row){
				// Valid Log-In and Password 
				$this->A_U['area-ID']=0;
				$this->A_U['user-ID']=$row['ID'];
				$this->User_id=$row['ID']; //adding compatability to Joe's coding style
				$this->A_U['type']=$row['type'];
				$this->A_U['first-name']=$row['firstname'];
				$this->A_U['last-name']=$row['lastname']; //adding compatability to Joe's coding style
				$this->A_P['user-type-ID']=$row['type']; 
				$this->A_P['user-type-name']=FF_CaT($row['type']); 
				$this->A_P['username']=$row['username'];
				$this->A_P['library-ID']=$row['library_ID'];
				$this->A_U['library-ID']=$row['library_ID'];
				$this->A_P['objective-points']=$row['objective_points'];
				$this->A_P['patron-plus-points']=$row['patron_plus_points'];
				$this->A_P['hotkeys-unlocked']=$row['hotkeys_unlocked'];
				$this->A_U['online']=$row['adventureOn'];
				$this->A_U['logged-in']=3;
				$this->A_U['validated']=true;
				if($row['cardnumber']>0&&$row['pin']>0){$this->A_U['patron-plus']=FF_PinAPI($row['cardnumber'],$row['pin']);}
				$this->F_GetThemeSet($row['ID']);
				return TRUE;
			}
		}
		return FALSE;
	}
	//
	// Function - Account Creation Completed
	function F_ACC($v_UID=0,$v_VK=''){
		$v_DC=db::getInstance();
		$v_DC->Query('UPDATE lapcat.hex_users SET validated="Yes" WHERE ID='.$v_UID.' AND valid_key="'.$v_VK.'";');
		if(empty($v_DC->Error)){$this->A_U['validated']=true;}
		return $this->A_U['validated'];
	}
}
?>