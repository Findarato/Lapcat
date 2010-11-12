<?
class adventures{
	//
	// ARRAYS
	//
	//
	// Array - Map
	private $A_Map=array();
	//
	// Array - Adjacent
	private $A_AdjacentLocation=array(
		'x'=>0,
		'y'=>0,
		'z'=>0,
		'is-blocked'=>3
	);
	//
	// Array - Condition
	private $A_Condition=array(
		'trigger-phase'=>array(),
		'trigger-ID'=>0,
		'failed-trigger-effect'=>array(),
		'passed-trigger-effect'=>array()
	);
	//
	// Array - Location
	private $A_Location=array(
		'x'=>0,
		'y'=>0,
		'z'=>0,
		'provided-actions'=>array(),
		'active-conditions'=>array(),
		'actions-not-allowed'=>array(),
		'conditions-not-allowed'=>array(),
		'is-inside'=>3,
		'is-solid'=>3,
		'down'=>array(),
		'east'=>array(),
		'north'=>array(),
		'south'=>array(),
		'west'=>array(),
		'up'=>array()
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
					print_r($a_MapData);die();
					$this->F_ConstructMap();
				}
				break;
			default:break;
		}
	}
	//
	// Function - Player Has Moved
	function F_PlayerHasMoved(){if($this->A_Player['moved']==3){return true;}else{return false;}}
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
	// Function - Construct Map
	function F_ConstructMap(){
		$a_Map=array();
		for($v_Z=1;$v_Z<=$this->A_Options['maximum-z'];$v_Z++){
			$a_Layer=array();
			for($v_Y=1;$v_Y<=$this->A_Options['maximum-y'];$v_Y++){
				$a_Row=array();
				for($v_X=1;$v_X<=$this->A_Options['maximum-x'];$v_X++){
					$v_Down=$v_Z+1;
					$v_Up=$v_Z-1;
					$v_East=$v_X+1;
					$v_South=$v_Y+1;
					$v_West=$v_X-1;
					$v_North=$v_Y-1;
					$a_Location=$this->A_Location;
					$a_Location['x']=$v_X;
					$a_Location['y']=$v_Y;
					$a_Location['z']=$v_Z;
					// Down
					$a_Location['down']=$this->A_AdjacentLocation;
					$a_Location['down']['x']=$v_X;
					$a_Location['down']['y']=$v_Y;
					$a_Location['down']['z']=$v_Down;
					if($a_Location['down']['z']<=$this->A_Options['maximum-z']){$a_Location['down']['is-blocked']=2;}
					// East
					$a_Location['east']=$this->A_AdjacentLocation;
					$a_Location['east']['x']=$v_East;
					$a_Location['east']['y']=$v_Y;
					$a_Location['east']['z']=$v_Z;
					if($a_Location['east']['x']<=$this->A_Options['maximum-x']){$a_Location['east']['is-blocked']=2;}
					// North
					$a_Location['north']=$this->A_AdjacentLocation;
					$a_Location['north']['x']=$v_X;
					$a_Location['north']['y']=$v_North;
					$a_Location['north']['z']=$v_Z;
					if($a_Location['north']['y']>0){$a_Location['north']['is-blocked']=2;}
					// South
					$a_Location['south']=$this->A_AdjacentLocation;
					$a_Location['south']['x']=$v_X;
					$a_Location['south']['y']=$v_South;
					$a_Location['south']['z']=$v_Z;
					if($a_Location['south']['y']<=$this->A_Options['maximum-y']){$a_Location['south']['is-blocked']=2;}
					// West
					$a_Location['west']=$this->A_AdjacentLocation;
					$a_Location['west']['x']=$v_West;
					$a_Location['west']['y']=$v_Y;
					$a_Location['west']['z']=$v_Z;
					if($a_Location['west']['x']>0){$a_Location['west']['is-blocked']=2;}
					// Up
					$a_Location['up']=$this->A_AdjacentLocation;
					$a_Location['up']['x']=$v_X;
					$a_Location['up']['y']=$v_Y;
					$a_Location['up']['z']=$v_Up;
					if($a_Location['up']['z']>0){$a_Location['up']['is-blocked']=2;}
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
	// Function - Move
	function F_Move($v_Direction=0){
		switch($v_Direction){case 3:case 4:$v_D='x';break;case 2:case 5:$v_D='y';break;case 1:case 6:$v_D='z';break;default:$v_D='';}
		switch($v_Direction){
			// Up, North, West
			case 1:case 2:case 3:
				if($this->A_Player[$v_D]-1>0){
					$this->A_Player[$v_D]--;
					$this->F_Step();
					return $this->F_MessageXML(8);
				}else{return $this->F_MessageXML(7);}
				break;
			// East, South, Down
			case 4:case 5:case 6:
				if($this->A_Player[$v_D]+1<=$this->A_Options['maximum-'.$v_D]){
					$this->A_Player[$v_D]++;
					$this->F_Step();
					return $this->F_MessageXML(8);
				}else{return $this->F_MessageXML(7);}
				break;
			default:
				$this->A_Player['moved']=2;
				return $this->F_MessageXML(9);
				break;
		}
	}
	//
	// Function - Message XML
	function F_MessageXML($v_MessageID=0){
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
	// Function - Location XML
	function F_LocationXML($v_X=0,$v_Y=0,$v_Z=0,$v_Full=false){
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
	// Function - Row XML
	function F_RowXML($v_Y=0,$v_Z=0){
		if($v_Y==0){$v_Y=$this->A_Player['y'];}
		if($v_Z==0){$v_Z=$this->A_Player['z'];}
		$a_Row=$this->A_Map[$v_Z][$v_Y];
		$v_RowXML='<row>';
		foreach($a_Row as $v_X=>$a_Data){
			$v_RowXML.=$this->F_LocationXML($v_X,$v_Y,$v_Z);
		}
		$v_RowXML.='</row>';
		return $v_RowXML;
	}
	//
	// Function - Layer XML
	function F_LayerXML($v_Z=0){
		if($v_Z==0){$v_Z=$this->A_Player['z'];}
		$a_Layer=$this->A_Map[$v_Z];
		$v_LayerXML='<layer>';
		foreach($a_Layer as $v_Y=>$a_Data){
			$v_LayerXML.=$this->F_RowXML($v_Y,$v_Z);
		}
		$v_LayerXML.='</layer>';
		return $v_LayerXML;
	}
	//
	// Function - Get Map XML
	function F_GetMapXML(){if($this->A_Options['map-created']<3){return true;}else{return false;}}
	//
	// Function - Map XML
	function F_MapXML(){
		$v_MapXML='<map>';
		foreach($this->A_Map as $v_Z=>$a_Data){$v_MapXML.=$this->F_LayerXML($v_Z);}
		$this->A_Options['map-created']=3;
		$v_MapXML.='</map>';
		return $v_MapXML;
	}
	//
	// Function - Options XML
	function F_OptionsXML(){
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
	// Function - Player XML
	function F_PlayerXML(){
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