<?
class mow{
	private $A_Map=array();
	private $V_HandSize=64;
	private $V_Rows=8;
	private $V_Columns=16;
	public $V_LoggedIn=FALSE;
	private $V_UserID=0;
	//
	// Deck Ideas
	// 64 cards
	// 1 Star - Unlimited
	// 2 Star - 16
	// 3 Star - 12
	// 4 Star - 8
	// 5 Star - 4
	// 6 Star - 2

	//
	// 1 Kingdom
	// 1 Landmark
	//
	// Game Purpose
	// Find and destroy your opponent's Kingdom
	
	// Card Basics
	// Alignment - Good, Neutral, Evil
	// Class - Warrior, Wizard, Rogue, Cleric, None
	
	// Giant, Boulder-Tosser
	// The giant tosses a boulder in any direction for 3 spaces. Each space is 'attacked' by a creature.
	
	// Combat Breakdown
	// 3 Steps
	// 1 - Speed Check
	// 2 - Power Check
	// 3 - Star Check
	// Best 2 out of 3 wins.
	//
	
	// Form for Create Cards
	//
	// Card-ID (Auto-Increment)
	// Name (Name of Card)
	// Type (Type of Card: Creature, Landmark, Land, Chest, Item)
	// Unique (Not-Unique = 0, Unique = 1)
	// Star ()
	// Power ()
	// Speed ()
	// Gametext ()
	//
	// send form link to
	// davisab@earlham.edu
	
	//
	// Function - MoW
	function mow(){$this->F_RG();}
	//
	// Function - Reset Game
	function F_RG(){
		// Clear Array
		$this->A_Map=array();
		// Create Map
		$this->F_CM();
	}
	//
	// Function - Start Game
	function F_SG(){
		// Send Map as XML
		return $this->F_MI().'<boom>'.$this->F_CMXML();
	}
	//
	// Function - Map Information
	function F_MI(){
		return '<page-info><row-info>'.$this->V_Rows.'</row-info><column-info>'.$this->V_Columns.'</column-info></page-info>';
	}
	//
	// Function - Retrieve Messages
	function F_RM(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT mm.ID, mm.UserID, mm.Message, mm.CreatedOn, mu.user_name FROM mow_messages AS mm LEFT JOIN mow_users AS mu ON (mm.UserID=mu.ID) WHERE mm.Locked=2 ORDER BY mm.ModifiedOn DESC LIMIT 20');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			return FF_CATXML($a_R,'updates');
		}else{return '<updates/>';}
	}
	//
	// Function - Add Ability
	function F_AA($a_P){
		$v_DC=db::getInstance();
		$v_HTMLC='';
		$v_HTMLV='';
		foreach($a_P as $v_K=>$v_D){
			$v_HTMLC.=$v_K.', ';
			if($v_D==''){$v_HTMLV.='"", ';
			}else{$v_HTMLV.='"'.$v_DC->escape_str($v_D).'", ';}
		}
		$v_SQL='INSERT INTO mow_abilities ('.$v_HTMLC.'CreatedOn) VALUES ('.$v_HTMLV.'"'.date('Y-m-d',time()).'");';
		$v_DC->Query($v_SQL);
		return '<ability-added>'.$a_P['AbilityName'].'</ability-added>';
	}
	//
	// Function - Add Message
	function F_AM($a_P){
		if($this->V_UserID==0){return;}
		$v_DC=db::getInstance();
		$v_HTMLC='';
		$v_HTMLV='';
		foreach($a_P as $v_K=>$v_D){
			$v_HTMLC.=$v_K.', ';
			if($v_D==''){$v_HTMLV.='"", ';
			}else{$v_HTMLV.='"'.$v_DC->escape_str($v_D).'", ';}
		}
		$v_SQL='INSERT INTO mow_messages (UserID, '.$v_HTMLC.'CreatedOn) VALUES ('.$this->V_UserID.', '.$v_HTMLV.'"'.date('Y-m-d',time()).'");';
		$v_DC->Query($v_SQL);
		return '<message-added>'.$a_P['Message'].'</message-added>';
	}
	//
	// Function - Add Action
	function F_AAc($a_P){
		$v_DC=db::getInstance();
		$v_HTMLC='';
		$v_HTMLV='';
		$v_AN='';
		foreach($a_P as $v_K=>$v_D){
			$v_HTMLC.=$v_K.', ';
			if($v_K=='ActionName'){$v_AN=$v_D;}
			if($v_K=='ActionCost'){if($v_D==''){$v_D=$v_AN;}}
			if($v_D==''){$v_HTMLV.='"", ';
			}else{$v_HTMLV.='"'.$v_DC->escape_str($v_D).'", ';}
		}
		$v_SQL='INSERT INTO mow_actions ('.$v_HTMLC.'CreatedOn) VALUES ('.$v_HTMLV.'"'.date('Y-m-d',time()).'");';
		$v_DC->Query($v_SQL);
		return '<action-added>'.$a_P['ActionName'].'</action-added>';
	}
	//
	// Function - Add Card
	function F_AC($a_P){
		$v_DC=db::getInstance();
		$v_HTMLC='';
		$v_HTMLV='';
		//$a_Actions=array();
		//$a_Abilities=array();
		foreach($a_P as $v_K=>$v_D){
			$v_Pass=FALSE;
			if($v_K=='GameText'){$v_D=str_replace("\n",'<br>',$v_D);}
			//if($v_K=='ActionA'||$v_K=='ActionB'||$v_K=='ActionC'||$v_K=='ActionD'){if($v_D>0){$a_Actions[]=$v_D;}$v_Pass=TRUE;}
			//if($v_K=='AbilityA'||$v_K=='AbilityB'||$v_K=='AbilityC'||$v_K=='AbilityD'){if($v_D>0){$a_Abilities[]=$v_D;}$v_Pass=TRUE;}
			if($v_Pass){
				// Ignore Data
			}else{
				$v_HTMLC.=$v_K.', ';
				if($v_D==''){$v_HTMLV.='"", ';}else{$v_HTMLV.='"'.$v_DC->escape_str($v_D).'", ';}
			}
		}
		$v_SQL='INSERT INTO mow_cards ('.$v_HTMLC.'CreatedOn) VALUES ('.$v_HTMLV.'"'.date('Y-m-d',time()).'");';
		$v_DC->Query($v_SQL);
		$v_LID=$v_DC->Lastid;
		// Actions
		/*
		if(!empty($a_Actions)){
			$v_SQL='INSERT INTO mow_actions_by_card (card_ID, action_ID) VALUES ';
			foreach($a_Actions as $v_K=>$v_D){if($v_K>0){$v_SQL.=', ';}$v_SQL.='('.$v_LID.', '.$v_D.')';}
			$v_SQL.=';';
			$v_DC->Query($v_SQL);}
		// Abilities
		if(!empty($a_Abilities)){
			$v_SQL='INSERT INTO mow_abilities_by_card (card_ID, ability_ID) VALUES ';
			foreach($a_Abilities as $v_K=>$v_D){if($v_K>0){$v_SQL.=', ';}$v_SQL.='('.$v_LID.', '.$v_D.')';}
			$v_SQL.=';';
			$v_DC->Query($v_SQL);}
		*/
		return '<card-added>'.$a_P['Name'].'</card-added>';
}
	//
	// Function - Start List
	function F_SL(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ID, Name, IsUnique, Type, Class, Alignment, Star, Power, Speed, GameText FROM mow_cards LEFT JOIN mow_actions_by_card AS mabc ON (mabc.card_ID=ID) WHERE Locked=2 ORDER BY ModifiedOn DESC LIMIT 20;');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			return FF_CATXML($a_R,'list');
		}else{return '<list/>';}
	}
	//
	// Function - Start Ability List
	function F_SAL(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ID, AbilityName, AbilityText, AbilityType, AbilityNature, AbilityPointValue FROM mow_abilities WHERE Locked=2 ORDER BY AbilityName ASC LIMIT 20;');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			return FF_CATXML($a_R,'ability-list');
		}else{return '<ability-list/>';}
	}
	//
	// Function - Start Action List
	function F_SAcL(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ID, ActionName, ActionCost, ActionText, ActionType, ActionNature, ActionPointValue FROM mow_actions WHERE Locked=2 ORDER BY ActionName ASC LIMIT 20;');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			return FF_CATXML($a_R,'action-list');
		}else{return '<action-list/>';}
	}
	//
	// Function - Log
	function F_Log($v_Type){
		$v_DC=db::getInstance();
		if($v_Type=='in'){
			$v_DC->Query('SELECT COUNT(*) AS login, ID FROM mow_users WHERE user_name="'.$_POST['mow|username'].'" AND password="'.$_POST['mow|password'].'" and Locked=2 GROUP BY ID;');
			if($v_DC->Count_res()>0){
				$a_R=$v_DC->Format('assoc');
				if($a_R['login']==1){$this->V_LoggedIn=TRUE;$this->V_UserID=$a_R['ID'];}
				return FF_CATXML($a_R,'log-'.$v_Type);
			}
		}
		return '<could-not-log-'.$v_Type.'/>';
	}
	//
	// Function - Start Add Card
	function F_SAC(){
		return '<start-form></start-form>';
	}
	//
	// Function - Start Add Ability
	function F_SAA(){
		return '<start-ability></start-ability>';
	}
	//
	// Function - Start Add Action
	function F_SAAc(){return '<start-action></start-action>';}
	//
	// Function - Start Add Message
	function F_SAM(){return '<start-message></start-message>';}
	//
	// Function - Add Card
	function F_AdC($v_CID=0){
		return '<not-working-yet></not-working-yet>';
	}
	//
	// Function - Remove Card
	function F_ReC($v_CID=0){
		return '<not-working-yet></not-working-yet>';
	}
	//
	// Function - Convert Map (to XML)
	function F_CMXML(){
		$v_XML='<map>';
		foreach($this->A_Map as $v_K=>$a_Map){
			$v_XML.='<map-row>';
			foreach($a_Map as $v_Ke=>$a_M){
				$v_XML.='<map-cell>'.$this->A_Map[$v_K][$v_Ke].'</map-cell>';
			}
			$v_XML.='</map-row>';
		}
		$v_XML.='</map>';
		return $v_XML;
	}
	//
	// Function - Create Map
	function F_CM(){
		for($v_R=0;$v_R<$this->V_Rows;$v_R++){
			for($v_C=0;$v_C<$this->V_Columns;$v_C++){
				$this->A_Map[$v_R][$v_C]=0;
			}
		}
	}
}
?>