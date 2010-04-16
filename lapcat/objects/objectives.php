<?
class Objectives{
	private $A_OI=array();
	private $A_OCB=array();
	private $A_SQL=array();
	private $A_WSQL=array();
	private $A_GSQL=array();
	public $A_PD=array();
	public $V_AID=32;
	public $V_RPC=0;
	public $V_EC=0;
	public $V_AN='';
	//
	// Function - Objectives (Object Initialization)
	function Objectives(){$this->F_ResetSearch();}
	//
	// Function - Edit
	function F_Edit($v_UID=0,$v_UT=0,$v_Target=0){
		/*
		$v_OID=26;
		$v_TN='';
		$v_TTN='';
		$a_Positions=array();
		$a_Tags=array();
		$a_R=array();
		$v_DC=db::getInstance();
		if($v_Target>0){
			$v_DC->Query('SELECT oc.objective_ID, ho.tags_tablename, ho.tablename FROM obj_calendar AS oc LEFT JOIN hex_objectives AS ho ON (oc.objective_ID=ho.ID) WHERE oc.ID='.$v_Target.' AND oc.entered_by_ID=999;');
			if($v_DC->Count_res()>0){
				$a_R=$v_DC->Format('assoc');
				$v_OID=$a_R['objective_ID'];
				$v_TTN=$a_R['tags_tablename'];
				$v_TN=$a_R['tablename'];}}
		$a_R=array();
		$v_XML=$this->F_GetObjectiveParts($v_UID,$v_UT,$v_OID,$v_Target);
		$v_DC->Query('SELECT htb.tag_ID, ht.name FROM '.$v_TTN.' AS htb LEFT JOIN hex_tags AS ht ON (ht.ID=htb.tag_ID) WHERE htb.ID='.$v_Target.';');
		$a_R=$v_DC->Format('assoc_array');
		if($v_DC->Count_res()>0){foreach($a_R as $v_Key=>$a_Data){$a_Tags[]=$a_Data['name'];}}
		$v_DC->Query('SELECT column_name, position FROM hex_objectives_parts_by_ID WHERE objective_ID='.$v_OID.' ORDER BY position ASC;');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			foreach($a_R as $v_Key=>$a_Data){
				if($a_Data['column_name']!=''){
					$a_Positions[$a_Data['column_name']]=$a_Data['position'];}}
			$v_DC->Query('SELECT '.implode(', ',array_keys($a_Positions)).' FROM '.$v_TN.' WHERE ID='.$v_Target.';');
			$a_R=FF_RAN($v_DC->Format('assoc'));
			foreach($a_R as $v_Key=>$v_Data){$this->A_PD[$a_Positions[$v_Key]]['data']=$v_Data;}
		}
		return $v_XML.'<boom>'.$this->F_ReturnData(true);
		*/
	}
	//
	// Function - Area SQL
	function F_ASQL(){
		$this->A_SQL=array(
			'SQL-A'=>'SELECT ho.ID, ho.name, ho.tablename, ho.permission, ho.repeatable, ho.reward, ho.reward_type, ho.tags_tablename, ho.edit, ho.description FROM hex_objectives AS ho',
			'where-A'=>' WHERE ho.locked=2',
			'where-B'=>'',
			'order-by'=>' ORDER BY ho.name ASC',
			'limit'=>'');
	}
	//
	// Function - General SQL
	function F_GSQL(){
		$this->A_GSQL=array(
			'SQL-A'=>'SELECT ho.ID, ho.name, ho.tablename, ho.permission, ho.repeatable, ho.reward, ho.reward_type, ho.tags_tablename, ho.edit, ho.description FROM hex_objectives AS ho',
			'where-A'=>' WHERE ho.locked=2',
			'where-B'=>'',
			'order-by'=>' ORDER BY ho.name ASC',
			'limit'=>'');
	}
	//
	// Function - Work SQL
	function F_WSQL(){
		$this->A_WSQL=array(
			'SQL-A'=>'SELECT ho.ID, ho.name, ho.tablename, ho.permission, ho.repeatable, ho.reward, ho.reward_type, ho.tags_tablename, ho.edit, ho.description FROM hex_objectives AS ho',
			'where-A'=>' WHERE ho.locked=2',
			'where-B'=>'',
			'order-by'=>' ORDER BY ho.name ASC',
			'limit'=>'');
	}
	//
	// Function - Check Account Name
	function F_CheckAccountName($v_N){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) AS total FROM hex_users AS hu WHERE hu.username="'.$v_N.'";');
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc'));
			if($a_R['total']>0){return true;}
		}
		return false;
	}
	//
	// Function - Get Message
	function F_GetMessage($v_UID=0,$v_UT=2,$v_OID=0){
		$v_M='';
		switch($v_OID){
			case '26C':$v_M='Welcome! You are one step away from being able to log-in to your LAPCAT account. An email has been sent to your email-address. As a bonus for joining, your account has been awarded 1000 LAPCAT points and 10 Patron Plus points!';break;
			case '21C':case '28C':case '318PC':case '319C':$v_M='Well done! You have completed another objective.';break;
			case 26:$v_M='Congratulations! You may now log-in to your LAPCAT account.';break;
			case 0:default:break;
		}
		return '<message>'.$v_M.'</message>';
	}
	//
	// Function - Return Data
	function F_ReturnData($v_PartIDOrKey=false){
		$a_PD=array();
		foreach($this->A_PD as $v_K=>$a_D){if($a_D['data']!=''){$a_PD[(($v_PartIDOrKey)?$a_D['part_ID']:$v_K)]=$a_D['data'];}}
		return FF_CATXML($a_PD,'return-data',true,'data');
	}
	//
	// Function - Return Position (by Part ID)
	function F_ReturnPosition($v_PartID=0){foreach($this->A_PD as $a_Part){if($a_Part['part_ID']==$v_PartID){return $a_Part['position'];}}}
	//
	// Function - Check Letters
	function F_CheckLetters($v_D=''){
		foreach($v_D as $v_Key=>$v_Letter){if(!substr_count('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890',$v_Letter)){return true;}}
		return false;
	}
	//
	// Function - Check Card Number
	function F_CheckCardNumber($v_N){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) AS total FROM hex_users AS hu WHERE hu.cardnumber="'.$v_N.'";');
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc'));
			if($a_R['total']>0){return true;}
		}
		return false;
	}
	//
	// Function - Complete Objective
	function F_CompleteObjective($v_UID=0,$v_UT=2,$v_LI=false,$v_OID=0,$v_SC=''){
		$this->V_EC=0;
		$a_OE=array();
		//print_r($_POST['objective-data-12']);die();
		//print_r($this->A_PD);die();
		foreach($this->A_PD as $v_K=>$a_D){
			if($a_D['part_ID']==10&&!array_key_exists('objective-data-10',$_POST)){$a_OE['objective-data-10']='This box must be checked.';}
			if(array_key_exists('objective-data-'.$a_D['part_ID'],$_POST)){
				if(!in_array($a_D['input_type'],array(24,25,29))){
					$this->A_PD[$a_D['part_ID']]['data']=$_POST['objective-data-'.$a_D['part_ID']];}}}
		$v_PAPI='';
		$v_C=0;
		//print_r($_POST);die();
		//print_r($this->A_PD);die();
		foreach($_POST as $v_K=>$v_D){
			$a_PD=$this->A_PD[$this->F_ReturnPosition(intval(str_replace('objective-data-','',$v_K)))];
			if($a_PD['required']==2||$a_PD['input_type']==21){
				switch($a_PD['mod_ID']){
					// Account Name
					case 2:if($this->F_CheckAccountName($v_D)||$this->F_CheckLetters($v_D)){$a_OE[$v_K]='There is an error with the account name.';}break;
					case 7:if(FF_PinAPI($v_PAPI,$v_D)==3){$a_OE[$v_K]='The library card-number or PIN is not valid.';}break;
					case 8:$v_PAPI=$v_D;if($this->F_CheckCardNumber($v_D)){$a_OE[$v_K]='The library card-number or PIN is not valid.';}break;
					case 11:if($v_SC!==$v_D){$a_OE[$v_K]='The security code was incorrect.';}break;
					case 13:$_POST['objective-data-14']=str_replace(array('<p>','</p>'),'',$v_D);break;
					default:break;}}
		}
		if(!empty($a_OE)){$this->A_OE[]=$a_OE;$this->V_EC=count($this->A_OE);return FALSE;}
		$v_SQL='';
		$v_DC=db::getInstance();
		$a_Tags=array('objective-data-24','objective-data-25','objective-data-26','objective-data-27');
		switch($v_OID){

			case 21:$v_SQL='INSERT INTO '.$this->A_R['tablename'].' ('.$this->A_R['column_names'].',entered_on,entered_by_ID,locked) VALUES ("'.$v_DC->Clean($_POST['objective-data-29']).'","'.date('Y-m-d g:i:s',time()).'","'.$v_UID.'",2);';break;

			case 26:$v_GVK=$this->F_GetValidationKey(date('Y-m-d',time()));$v_SQL='INSERT INTO '.$this->A_R['tablename'].' ('.$this->A_R['column_names'].') VALUES ("'.$v_DC->Clean($_POST['objective-data-1']).'","'.$v_DC->Clean($_POST['objective-data-2']).'","'.$_POST['objective-data-3'].'", MD5("'.$_POST['objective-data-4'].'") ,"'.date('Y-m-d',strtotime($_POST['objective-data-7'].'-'.$_POST['objective-data-6'].'-01')).'","'.$_POST['objective-data-8'].'","'.$_POST['objective-data-9'].'","'.date('Y-m-d g:i:s',time()).'","'.$v_DC->Clean($_POST['objective-data-12']).'","'.$v_GVK.'","'.$_SERVER['REMOTE_ADDR'].'");';break;

			case 318:
				// Add An Event
				if(array_key_exists('objective-data-28',$_POST)){
					if($_POST['objective-data-28']==0){$_POST['objective-data-28']=9;
					}else{$_POST['objective-data-28']=$_POST['objective-data-28']-1;}}
				if(!array_key_exists('objective-data-30',$_POST)){$_POST['objective-data-30']=0;}
				if(!array_key_exists('objective-data-32',$_POST)){$_POST['objective-data-32']=0;}
				if(!array_key_exists('objective-data-33',$_POST)){$_POST['objective-data-33']=0;}
				if(array_key_exists('objective-data-34',$_POST)){$_POST['objective-data-34']=date('Y-m-d',strtotime($_POST['objective-data-34']));}
				if(array_key_exists('objective-data-35',$_POST)){$_POST['objective-data-35']=date('H:i:s',strtotime($_POST['objective-data-35']));}
				if(array_key_exists('objective-data-36',$_POST)){$_POST['objective-data-36']=date('H:i:s',strtotime($_POST['objective-data-36']));}
			case 28:case 319:
				$v_SQL='INSERT INTO '.$this->A_R['tablename'].' ('.$this->A_R['column_names'].',entered_on,entered_by_ID,objective_ID,locked) VALUES (';
				foreach($_POST as $v_K=>$v_D){
					if(!in_array($v_K,$a_Tags)){
						$v_SQL.='"'.$v_DC->Clean($v_D).'",';
					}
				}
				$v_SQL.='"'.date('Y-m-d g:i:s',time()).'","'.$v_UID.'","'.$v_OID.'",2);';
				break;

			case 0:default:break;}
		//print_r($v_SQL);die();
		$v_DC->Query($v_SQL);
		if(count($v_DC->Error)==2){
		}else{
			$v_LID=$v_DC->v_Lastid;
			switch($v_OID){
				case 26:
					$v_DC->Query('INSERT INTO hex_points (ID,objective_points,patron_plus_points,hotkeys_unlocked) VALUES ('.$v_LID.',1000,10,2);');
					$v_DC->Query('INSERT INTO hex_my_library (user_ID,library_ID) VALUES ('.$v_LID.',0);');
					$v_DC->Query('INSERT INTO hex_portals_collected (user_ID,portal_ID,active_status,position) VALUES ('.$v_LID.',1000,2,1);');
					$v_DC->Query('INSERT INTO hex_themes_by_user (user_ID,theme_ID) VALUES ('.$v_LID.',9);');
					FF_CE($v_LID,$v_DC->Clean($_POST['objective-data-12']),$v_DC->Clean($v_GVK),$v_OID);
					break;
				case 28:case 318:
					if($this->A_R['tags_tablename']!=''){
						$v_SQLV='';
						foreach($_POST as $v_K=>$a_D){
							if($a_D['tag_ID']>0){if(in_array($v_K,$a_Tags)){$v_SQLV.=(($v_SQLV!='')?', ':'').'('.$v_LID.','.$a_D['tag_ID'].')';}}}
						$v_DC->Query('INSERT INTO '.$this->A_R['tags_tablename'].' (ID, tag_ID) VALUES '.$v_SQLV.';');}
					break;
				case 0:default:break;}
			return TRUE;
		}
		return FALSE;
	}
	
	//
	// Function - Generate Validation Key
	function F_GetValidationKey(){return substr(md5(time()),0,15);}
	//
	// Function - Determine Objectives
	function F_DetermineObjectives($v_UID=0,$v_UT=2,$v_LI=false,$a_I=array()){
		$this->F_ResetSearch();
		$v_E=' AND ho.ID NOT IN(26)';
		if($v_LI){
			foreach($a_I as $v_K=>$v_D){$this->A_OI[$v_K]=$v_D;}
			foreach($a_I as $v_K=>$v_D){
				switch($v_K){
					case 1: // Area
						switch($v_D){
							case 10:if($v_LI){
								$this->A_OCB[]=20;
							}break;
							case 28:if($v_LI){$this->A_OCB[]=318;}break;
							case 34:if($v_LI){$this->A_OCB[]=29;}break;
							case 131:if($v_LI){
								$this->A_OCB[]=319;
								$this->A_OCB[]=28;
							}break;
							default:break;}break;
					case 2: // Target
						switch($this->A_OI[1]){
							case 10:if($v_LI){$this->A_OCB[]=22;}break;
							default:break;}break;
					default:break;}}
		}else{$this->A_OCB[]=26;$v_E='';}
		//print_r($this->A_OCB);die();
		$this->A_SQL['where-B']=' AND ho.ID IN('.implode(',',$this->A_OCB).') AND ho.permission<='.$v_UT.$v_E;
		$this->A_GSQL['where-B']=' AND ho.general=3 AND ho.permission<='.$v_UT.$v_E;
		$this->A_WSQL['where-B']=' AND ho.permission<='.$v_UT.$v_E;
	}
	//
	// Function - Get Objectives
	function F_GetObjectives($v_UID=0,$v_T=0){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='';
		switch($v_T){
			case 1:$v_SQL=implode('',$this->A_GSQL);break;
			case 2:$v_SQL=implode('',$this->A_WSQL);break;
			case 0:default:$v_SQL=implode('',$this->A_SQL);break;
		}
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc_array'));
			return FF_CATXML($a_R,'objectives',true,'objective');
		}else{return '<message>There are no objectives here.</message>';}
	}
	//
	// Function - Reset Search
	function F_ResetSearch(){
		$this->A_OE=array();
		$this->A_PD=array();
		$this->A_OI=array();
		$this->A_OCB=array();
		$this->F_ASQL();
		$this->F_GSQL();
		$this->F_WSQL();
	}
	//
	// Function - Start Objective
	function F_StartObjective($v_UID=0,$v_UT=2,$v_OID=26,$v_SC=0){
		return $this->F_GetObjectiveParts($v_UID,$v_UT,$v_OID);
	}

	public $A_R=array();
	public $V_OID=0;
	public $V_RPD=0;
	//
	// Function - Get Objective Parts
	function F_GetObjectiveParts($v_UID=0,$v_UT=2,$v_OID=26,$v_Target=0){
		if($v_Target>0&&$v_OID==26){return;}
		$v_DC=db::getInstance();
		$this->A_PD=array();
		$a_R=array();
		$a_OP=array();
		$v_SQL='SELECT hopbid.part_ID, hop.name, hop.input_type, hop.required, hop.modification_ID AS mod_ID, hopbid.position FROM hex_objectives_parts_by_ID AS hopbid LEFT JOIN hex_objectives_parts AS hop ON (hop.ID=hopbid.part_ID) WHERE hopbid.objective_ID='.$v_OID.' ORDER BY hopbid.position ASC';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_OP=$v_DC->Format('assoc_array');
			$this->V_RPC=0;
			foreach($a_OP as $v_K=>$a_P){
				$a_P['data']='';
				$a_P['mod-pass']=false;
				$a_P['req-pass']=false;
				$this->A_PD[]=$a_P;
				if($a_P['required']==2){$this->V_RPC++;}}}
		$v_SQL='SELECT ho.ID, ho.description, ho.tablename, ho.column_names, ho.name, ho.repeatable, ho.reward, ho.reward_type, ho.tags_tablename FROM hex_objectives AS ho WHERE '.$v_UT.'>=ho.permission AND ho.ID='.$v_OID.' AND ho.locked=2;';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc'));
			$a_R['current-total']=0;
			$a_R['required-total']=$this->V_RPC;
			$a_R['parts-box']=FF_CATXML($a_OP,'parts',true,'part');
			$this->A_R=$a_R;
			return FF_CATXML($a_R,'objective');
		}else{return '<no-objective></no-objective>';}
	}
}
?>