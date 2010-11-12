<?
class adventures{
	//
	// ARRAYS
	//
	//
	// Array - Map
	private $A_Map=array();
	//
	// Array - Condition
	private $A_Condition=array(
		'ID'=>0,
		'name'=>'',
		'description'=>'',
		'keywords'=>array(),
		'trigger-phases'=>array(),
		'triggers'=>array(),
		'failed-trigger-effects'=>array(),
		'passed-trigger-effects'=>array(),
		'visible'=>true
	);
	//
	// Array - Location
	private $A_Location=array(
		'location-ID'=>0,
		'map-ID'=>0,
		'x'=>0,
		'y'=>0,
		'z'=>0,
		'provided-actions'=>array(),
		'active-conditions'=>array(),
		'actions-not-allowed'=>array(),
		'conditions-not-allowed'=>array(),
		'is-inside'=>3,
		'is-solid'=>3,
		'up-is-blocked'=>3,
		'north-is-blocked'=>3,
		'west-is-blocked'=>3,
		'east-is-blocked'=>3,
		'south-is-blocked'=>3,
		'down-is-blocked'=>3
	);
	//
	// Array - Player
	private $A_Player=array(
		'x'=>1,
		'y'=>1,
		'z'=>1,
		'moved'=>2,
		'steps'=>0
	);
	//
	// Array - Options
	private $A_Options=array(
		'maximum-x'=>8,
		'maximum-y'=>8,
		'maximum-z'=>8,
		'map-created'=>2,
		'map'=>0
	);
	//
	// Array - Phases
	private $A_Phases=array(
		1=>'Start of Game',
		2=>'During Game',
		3=>'Start of Turn',
		4=>'During Turn',
		5=>'Start of Action',
		6=>'During Action',
		7=>'End of Action',
		8=>'During Turn',
		9=>'End of Turn',
		10=>'During Game',
		11=>'End of Game'
	);
	//
	// Array - Player Actions
	private $A_PlayerActions=array();
	//
	// Array - Player Conditions
	private $A_PlayerConditions=array();
	//
	// VARIABLES
	//
	//
	// Variable - Current Phase
	private $V_CurrentPhase=0;
	//
	//
	// Function - Load Map
	function F_LoadMap($v_Map=0){
		switch($v_Map){
			case 1:
				$a_MapData=array();
				$v_DC=db::getInstance();
				$v_SQL='SELECT * FROM online_maps AS om WHERE om.map_ID='.$v_Map.';';
				$v_DC->Query($v_SQL);
				if($v_DC->Count_res()>0){
					$a_MapData=$v_DC->Fetch('assoc_array');
					$this->F_ConstructMap();
					foreach($a_MapData as $v_Key=>$a_LocationData){
						$a_Location=$this->A_Map[$a_LocationData['z']][$a_LocationData['y']][$a_LocationData['x']];
						$a_Location['location-ID']=$a_LocationData['location_ID'];
						$a_Location['map-ID']=$a_LocationData['map_ID'];
						$a_Location['up-is-blocked']=$a_LocationData['up'];
						$a_Location['north-is-blocked']=$a_LocationData['north'];
						$a_Location['west-is-blocked']=$a_LocationData['west'];
						$a_Location['east-is-blocked']=$a_LocationData['east'];
						$a_Location['south-is-blocked']=$a_LocationData['south'];
						$a_Location['down-is-blocked']=$a_LocationData['down'];
						$a_Location['is-inside']=$a_LocationData['is_inside'];
						$a_Location['is-solid']=$a_LocationData['is_solid'];
						if($a_Location['is-inside']==3){$a_Location['active-conditions'][]=$this->F_CreateCondition(3);}
						$this->A_Map[$a_LocationData['z']][$a_LocationData['y']][$a_LocationData['x']]=$a_Location;
					}
				}else{
					print_r('ERROR - Load Map: '.$v_DC->Lastsql);die();
				}
				break;
			default:break;
		}
	}
	//
	// Function - Get Keywords
	function F_GetKeywords($v_ConditionID=0){
		switch($v_ConditionID){
			case 0:default:break;
			case 3:return array(3=>'neutral',4=>'protective');break;
			case 103:return array(2=>'negative',5=>'movement');break;
			case 104:return array(2=>'negative',6=>'sight');break;
		}
	}
	//
	// Function - Create Condition
	function F_CreateCondition($v_ConditionID=0){
		$a_Condition=$this->A_Condition;
		$a_Condition['ID']=$v_ConditionID;
		switch($v_ConditionID){
			case 3:
				$a_Condition['name']='Inside';
				$a_Condition['keywords']=$this->F_GetKeywords($v_ConditionID);
				$a_Condition['description']='You are protected from most Weather conditions.';
				break;
			case 103:
				$a_Condition['name']='Immobile';
				$a_Condition['description']='You cannot perform most Movement actions.';
				break;
			case 104:
				$a_Condition['name']='Blind';
				$a_Condition['description']='You cannot perform most Sight actions.';
				break;
			default:
				break;
		}
		return $a_Condition;
	}
	//
	// Function - Get Active Conditions XML
	function F_GetActiveConditionsXML(){
		$v_XML='<active-conditions>';
		foreach($this->F_PlayerLocationData('active-conditions') as $v_Key=>$a_Data){
			$v_XML.='<condition>';
			foreach($a_Data as $a_TagName_A=>$a_TagData_A){
				if(!is_array($a_TagData_A)){
					$v_XML.='<'.$a_TagName_A.'>'.$a_TagData_A.'</'.$a_TagName_A.'>';
				}
			}
			$v_XML.='</condition>';
		}
		$v_XML.='</active-conditions>';
		return $v_XML;
	}
	//
	// Function - Player Has Moved
	function F_PlayerHasMoved(){if($this->A_Player['moved']==3){return true;}else{return false;}}
	//
	// Function - Location Data
	function F_PlayerLocationData($v_Key=''){return $this->A_Map[$this->A_Player['z']][$this->A_Player['y']][$this->A_Player['x']][$v_Key];}
	//
	// Function - Send Map
	function F_SendMap(){$this->A_Options['map-created']=2;}
	//
	// Function - Adventures
	function adventures(){
		$this->F_Reset();
		if($this->A_Options['map']<1){$this->F_LoadMap(1);}
	}
	//
	// Function - Can Move
	function F_CanMove($v_CharacterID=0){
		switch($v_CharacterID){
			case 0:
				foreach(array(103) as $v_Key=>$v_ConditionID){if(array_key_exists($v_ConditionID,$this->A_PlayerConditions)){return false;}}
				return true;
				break;
			default:
				break;
		}
		return false;
	}
	//
	// Function - Can See
	function F_CanSee($v_CharacterID=0){
		switch($v_CharacterID){
			case 0:
				foreach(array(104) as $v_Key=>$v_ConditionID){if(array_key_exists($v_ConditionID,$this->A_PlayerConditions)){return false;}}
				return true;
				break;
			default:
				break;
		}
		return false;
	}
	//
	// Function - Construct Actions
	function F_ConstructActions($v_CharacterID=0){
		$a_Actions=array();
		switch($v_CharacterID){
			case 0:
				if($this->F_CanSee($v_CharacterID)){
					$a_Actions[]=array('ID'=>1,'name'=>'Look Around');
					$a_Actions[]=array('ID'=>2,'name'=>'Search');
				}
				if($this->F_CanMove($v_CharacterID)){
					$a_Actions[]=array('ID'=>3,'name'=>'Walk');
					$a_Actions[]=array('ID'=>4,'name'=>'Run');
					$a_Actions[]=array('ID'=>5,'name'=>'Sprint');
				}
				break;
			default:
				break;
		}
		$this->A_PlayerActions=$a_Actions;
	}
	//
	// Function - Construct Map
	function F_ConstructMap(){
		$a_Map=array();
		for($v_Z=1;$v_Z<=$this->A_Options['maximum-z'];$v_Z++){
			$a_Layer=array();
			for($v_Y=1;$v_Y<=$this->A_Options['maximum-y'];$v_Y++){
				$a_Row=array();
				for($v_X=1;$v_X<=$this->A_Options['maximum-x'];$v_X++){
					$a_Location=$this->A_Location;
					$a_Location['x']=$v_X;
					$a_Location['y']=$v_Y;
					$a_Location['z']=$v_Z;
					// Up
					if($v_Z-1>0){$a_Location['up-is-blocked']=2;}
					// North
					if($v_Y-1>0){$a_Location['north-is-blocked']=2;}
					// West
					if($v_X-1>0){$a_Location['west-is-blocked']=2;}
					// East
					if($v_X+1<=$this->A_Options['maximum-x']){$a_Location['east-is-blocked']=2;}
					// South
					if($v_Y+1<=$this->A_Options['maximum-y']){$a_Location['south-is-blocked']=2;}
					// Down
					if($v_Z+1<=$this->A_Options['maximum-z']){$a_Location['down-is-blocked']=2;}
					$a_Row[$v_X]=$a_Location;
				}
				$a_Layer[$v_Y]=$a_Row;
			}
			$a_Map[$v_Z]=$a_Layer;
		}
		$this->A_Map=$a_Map;
	}
	//
	// Function - Step
	function F_Step(){$this->A_Player['steps']++;$this->A_Player['moved']=3;}
	//
	// Function - Location Is Open
	function F_LocationIsOpen($a_Destination=array(0,0,0)){
		if($this->A_Map[$a_Destination['z']][$a_Destination['y']][$a_Destination['x']]['is-solid']==2){
			return true;
		}
		return false;
	}
	//
	// Function - Move
	function F_Move($v_Action='walk',$v_Direction=0){
		switch($v_Direction){case 3:case 4:$v_D='x';break;case 2:case 5:$v_D='y';break;case 1:case 6:$v_D='z';break;default:$v_D='';}
		$a_Destination=array('z'=>$this->A_Player['z'],'y'=>$this->A_Player['y'],'x'=>$this->A_Player['x']);
		switch($v_Direction){
			// Up, North, West
			case 1:case 2:case 3:
				$a_Destination[$v_D]--;
				if($this->A_Player[$v_D]-1>0&&$this->F_LocationIsOpen($a_Destination)){
					$this->A_Player[$v_D]--;
					$this->F_Step();
					return $this->F_GetMessageXML(8);
				}else{return $this->F_GetMessageXML(7);}
				break;
			// East, South, Down
			case 4:case 5:case 6:
				$a_Destination[$v_D]++;
				if($this->A_Player[$v_D]+1<=$this->A_Options['maximum-'.$v_D]&&$this->F_LocationIsOpen($a_Destination)){
					$this->A_Player[$v_D]++;
					$this->F_Step();
					return $this->F_GetMessageXML(8);
				}else{return $this->F_GetMessageXML(7);}
				break;
			default:
				$this->A_Player['moved']=2;
				return $this->F_GetMessageXML(9);
				break;
		}
	}
	//
	// Function - Get Actions XML
	function F_GetActionsXML(){
		$this->F_ConstructActions(0);
		$v_XML='<actions>';
		foreach($this->A_PlayerActions as $v_Key=>$a_Action){$v_XML.='<action><ID>'.$a_Action['ID'].'</ID><name>'.$a_Action['name'].'</name></action>';}
		$v_XML.='</actions>';
		return $v_XML;
	}
	//
	// Function - Get Layer XML
	function F_GetLayerXML($v_Z=0){
		if($v_Z==0){$v_Z=$this->A_Player['z'];}
		$a_Layer=$this->A_Map[$v_Z];
		$v_LayerXML='<layer>';
		foreach($a_Layer as $v_Y=>$a_Data){
			$v_LayerXML.=$this->F_GetRowXML($v_Y,$v_Z);
		}
		$v_LayerXML.='</layer>';
		return $v_LayerXML;
	}
	//
	// Function - Get Location XML
	function F_GetLocationXML($v_X=0,$v_Y=0,$v_Z=0,$v_Full=false){
		if($v_X==0){$v_X=$this->A_Player['x'];}
		if($v_Y==0){$v_Y=$this->A_Player['y'];}
		if($v_Z==0){$v_Z=$this->A_Player['z'];}
		$a_Location=$this->A_Map[$v_Z][$v_Y][$v_X];
		$v_LocationXML='<location>';
		foreach($a_Location as $a_TagName_A=>$a_TagData_A){
			if(is_array($a_TagData_A)){
				if($v_Full){
					$v_LocationXML.='<'.$a_TagName_A.'>';
					foreach($a_TagData_A as $a_TagName_B=>$a_TagData_B){
						if(is_array($a_TagData_B)){
							$v_LocationXML.='<'.$a_TagName_B.'>';
							foreach($a_TagData_B as $a_TagName_C=>$a_TagData_C){
								$v_LocationXML.='<'.$a_TagName_C.'>'.$a_TagData_C.'</'.$a_TagName_C.'>';
							}
							$v_LocationXML.='</'.$a_TagName_B.'>';
						}else{
							$v_LocationXML.='<'.$a_TagName_B.'>'.$a_TagData_B.'</'.$a_TagName_B.'>';
						}
					}
					$v_LocationXML.='</'.$a_TagName_A.'>';
				}
			}else{
				$v_LocationXML.='<'.$a_TagName_A.'>'.$a_TagData_A.'</'.$a_TagName_A.'>';
			}
		}
		$v_LocationXML.='</location>';
		return $v_LocationXML;
	}
	//
	// Function - Get Map
	function F_GetMap(){if($this->A_Options['map-created']<3){return true;}else{return false;}}
	//
	// Function - Get Map XML
	function F_GetMapXML(){
		$v_MapXML='<map>';
		foreach($this->A_Map as $v_Z=>$a_Data){$v_MapXML.=$this->F_GetLayerXML($v_Z);}
		$this->A_Options['map-created']=3;
		$v_MapXML.='</map>';
		return $v_MapXML;
	}
	//
	// Function - Get Message XML
	function F_GetMessageXML($v_MessageID=0){
		$a_Message=array(
			0=>'<message>',
			1=>'<message-text>',
			2=>'',
			3=>'</message-text>',
			4=>'</message>'
		);
		switch($v_MessageID){
			case 1:$a_Message[2]='The group is missing.';break;
			case 2:$a_Message[2]='That group is unknown.';break;
			case 3:$a_Message[2]='The action is missing.';break;
			case 4:$a_Message[2]='That action is unknown.';break;
			case 5:$a_Message[2]='The target is missing.';break;
			case 6:$a_Message[2]='That target is unknown.';break;
			case 7:$a_Message[2]='You are unable to move in that direction.';break;
			case 8:$a_Message[2]='You have moved.';break;
			case 9:$a_Message[2]='That direction is unknown.';break;
			default:break;
		}
		return implode('',$a_Message);
	}
	//
	// Function - Get Options XML
	function F_GetOptionsXML(){
		$v_OptionXML='<options>';
		foreach($this->A_Options as $a_TagName_A=>$a_TagData_A){
			if(is_array($a_TagData_A)){
				$v_OptionXML.='<'.$a_TagName_A.'>';
				foreach($a_TagData_A as $a_TagName_B=>$a_TagData_B){
					$v_OptionXML.='<'.$a_TagName_B.'>'.$a_TagData_B.'</'.$a_TagName_B.'>';
				}
				$v_OptionXML.='</'.$a_TagName_A.'>';
			}else{
				$v_OptionXML.='<'.$a_TagName_A.'>'.$a_TagData_A.'</'.$a_TagName_A.'>';
			}
		}
		$v_OptionXML.='</options>';
		return $v_OptionXML;
	}
	//
	// Function - Get Player XML
	function F_GetPlayerXML(){
		$v_PlayerXML='<player>';
		foreach($this->A_Player as $a_TagName_A=>$a_TagData_A){
			if(is_array($a_TagData_A)){
				$v_PlayerXML.='<'.$a_TagName_A.'>';
				foreach($a_TagData_A as $a_TagName_B=>$a_TagData_B){
					$v_PlayerXML.='<'.$a_TagName_B.'>'.$a_TagData_B.'</'.$a_TagName_B.'>';
				}
				$v_PlayerXML.='</'.$a_TagName_A.'>';
			}else{
				$v_PlayerXML.='<'.$a_TagName_A.'>'.$a_TagData_A.'</'.$a_TagName_A.'>';
			}
		}
		$v_PlayerXML.='</player>';
		return $v_PlayerXML;
	}
	//
	// Function - Get Row XML
	function F_GetRowXML($v_Y=0,$v_Z=0){
		if($v_Y==0){$v_Y=$this->A_Player['y'];}
		if($v_Z==0){$v_Z=$this->A_Player['z'];}
		$a_Row=$this->A_Map[$v_Z][$v_Y];
		$v_RowXML='<row>';
		foreach($a_Row as $v_X=>$a_Data){
			$v_RowXML.=$this->F_GetLocationXML($v_X,$v_Y,$v_Z);
		}
		$v_RowXML.='</row>';
		return $v_RowXML;
	}
	//
	// Function - Reset Game
	function F_Reset(){
		$this->F_ConstructMap();
	}
	//
	// Function - Available Actions
	function F_AvailableActions($v_CharacterID=0){
	}
}
?>