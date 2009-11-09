<?
class Market{
	//
	// ARRAYS
	//
	//
	// Array - Area
	//
	private $A_Area=array(
		'ID'=>0,
		'name'=>''
	);
	//
	// VARIABLES
	//
	//
	// Variable - Hotkey Link
	private $V_HotkeyLink='';
	//
	// Variable - Hotkey Description
	private $V_HotkeyDescription='';
	//
	// FUNCTIONS
	//
	//
	// Function - Choose
	function F_Choose($v_UserID=0){
		if($v_UserID>0){
			if($this->V_HotkeyLink!=''){
				return $this->F_CreateHotkey($v_UserID);
			}else{
				return $this->F_Browse($v_UserID);
			}
		}
	}
	//
	// Function - Create Hotkey
	function F_CreateHotkey($v_UserID=0){return '<create-'.$this->A_Area['name'].'-hotkey><link>'.$this->V_HotkeyLink.'</link><description>'.$this->V_HotkeyDescription.'</description></create-'.$this->A_Area['name'].'-hotkey>';}
	//
	// Function - Get Hotkey Description
	function F_GetHotkeyDescription($v_UserID=0){return $this->V_HotkeyDescription;}
	//
	// Function - Get Hotkey Link
	function F_GetHotkeyLink($v_UserID=0){return $this->V_HotkeyLink;}
	//
	// Function - Purchase Hotkey
	function F_PurchaseHotkey($v_UserID=0,$v_LI=false,$a_URLE=array()){
		if($v_UserID>0&&$v_LI){
			if(array_key_exists(2,$a_URLE)){
				$this->V_Selected=$a_URLE[2];
				$v_Code=$this->A_Link[1].'/'.implode('/',$this->A_Code).'/'.$this->V_Selected;
				$v_SQL='SELECT objective_points AS points FROM hex_points WHERE ID='.$v_UserID.';';
				$v_DC=db::getInstance();
				$v_DC->Query($v_SQL);
				if($v_DC->Count_res()>0){
					$a_Data=$v_DC->Format('assoc');
					if($a_Data['points']-80>=0){
						$v_DC->Query('UPDATE hex_points SET objective_points=objective_points-80 WHERE ID='.$v_UserID.';');
						$v_DC->Query('INSERT INTO hex_hotkeys (user_ID,code,description) VALUES ('.$v_UserID.',"'.$v_Code.'","'.$this->V_Link.'");');
						if(count($v_DC->Error)>0){return 0;
						}else{return 1;}
					}else{return 2;}
				}else{return 2;}
			}
		}
	}
	//
	// Function - Set Area
	function F_SetArea($v_UserID=0,$v_AreaID=0,$v_AreaName=''){$this->A_Area=array('ID'=>$v_AreaID,'name'=>$v_AreaName);}
	//
	// Function - Set Hotkey Description
	function F_SetHotkeyDescription($v_UserID=0,$v_Description=''){$this->V_HotkeyDescription=str_replace('I am browsing','Search for',$v_Description);}
	//
	// Function - Set Hotkey Link
	function F_SetHotkeyLink($v_UserID=0,$v_Link=''){$this->V_HotkeyLink=$v_Link;}



	private $A_SQL=array();
	private $A_Items=array();
	private $A_Link=array();
	private $A_Code=array();
	private $V_Selected=0;
	private $V_Link='';
	//
	// Function - Market (Object Initialization)
	function Market(){$this->F_Reset();}
	//
	// Function - Area SQL
	function F_ASQL(){
		$this->A_SQL=array(
			'SQL-A'=>'SELECT hp.portal_ID, hp.name, hp.description, hp.op_cost, hp.link_values, hp.special FROM hex_portals AS hp',
			'where-A'=>' WHERE hp.locked=2',
			'where-B'=>'',
			'order-by'=>' ORDER BY hp.name ASC',
			'limit'=>'');
	}
	//
	// Function - Return Data
	function F_ReturnData(){return FF_CATXML($this->A_Items,'hotkeys',true,'hotkey');}
	//
	// Function - Browse
	function F_Browse($v_UserID=0,$v_LI=false){
		$v_DC=db::getInstance();
		$v_DC->Query(implode('',$this->A_SQL));
		if($v_DC->Count_res()>0){$this->A_Items=$v_DC->Format('assoc_array');}
		return $this->F_ReturnData();
	}
	//
	// Function - Reset
	function F_Reset(){
		$this->A_Items=array();
		$this->F_ASQL();
	}
	//
	// Function - Create
	function F_Create($v_UserID=0,$v_LI=false,$a_URLE=array()){
		$this->A_Link=$a_URLE;
	}
	//
	// Function - Manage
	function F_Manage($v_UserID=0,$v_LI=false,$a_H=array()){
		if($v_UserID>0&&$v_LI){
			return FF_CATXML($a_H,'manage-hotkeys',true,'hotkey');
		}
	}
	//
	// Function - Create Hotkey
	function F_CreateHotkey2($v_UserID=0,$v_LI=false){
		$a_Link=$this->A_Link;
		$a_CodeXML=array('change-search'=>0,'change-tag'=>0,'change-sort'=>0);
		$a_LinkXML=array('area'=>'','change-search'=>0,'change-tag'=>0,'change-sort'=>0);
		$v_Create=array_shift($a_Link);
		$a_LinkXML['area']=array_shift($a_Link);
		for($v_C=0;$v_C<count($a_Link)-1;$v_C+=2){$a_LinkXML[$a_Link[$v_C]]=$a_Link[$v_C+1];}
		//print_r($a_LinkXML);die();
		foreach($a_LinkXML as $v_Key=>$v_Data){
			if(array_key_exists($v_Key,$a_CodeXML)){$a_CodeXML[$v_Key]=$v_Data;}
			switch($v_Key){
				case 'change-tag':if($v_Data>0){$a_LinkXML[$v_Key]=' tagged as '.FF_GTN($v_Data);}else{$a_LinkXML[$v_Key]='';}break;
				case 'change-sort':
					switch($a_LinkXML['area']){
						case 'events':
							switch($v_Data){
								case 0:default:$a_LinkXML[$v_Key]=' sorted by date';break;
								case 1:$a_LinkXML[$v_Key]=' sorted by anticipation';break;
								case 2:$a_LinkXML[$v_Key]=' sorted alphabetically';break;
								case 3:$a_LinkXML[$v_Key]=' sorted alphabetically in reverse order';break;
							}break;
						case 'materials':
							switch($v_Data){
								case 0:default:$a_LinkXML[$v_Key]=' sorted by year';break;
								case 1:$a_LinkXML[$v_Key]=' sorted by rating';break;
								case 2:$a_LinkXML[$v_Key]=' sorted alphabetically';break;
								case 3:$a_LinkXML[$v_Key]=' sorted alphabetically in reverse order';break;
							}break;
						case 'news':
							switch($v_Data){
								case 0:default:$a_LinkXML[$v_Key]=' sorted by date';break;
								case 1:$a_LinkXML[$v_Key]=' sorted alphabetically';break;
								case 2:$a_LinkXML[$v_Key]=' sorted alphabetically in reverse order';break;
							}break;
						default:$a_LinkXML[$v_Key]='';break;
					}break;
				case 'change-search':
					switch($a_LinkXML['area']){
						case 'events':
							switch($v_Data){
								case 0:default:$a_LinkXML[$v_Key]=' at all libraries';break;
								case 1:$a_LinkXML[$v_Key]=' at Main Library';break;
								case 2:$a_LinkXML[$v_Key]=' at Coolspring';break;
								case 3:$a_LinkXML[$v_Key]=' at Fish Lake';break;
								case 4:$a_LinkXML[$v_Key]=' at Hanna';break;
								case 5:$a_LinkXML[$v_Key]=' at Kingsford Heights';break;
								case 6:$a_LinkXML[$v_Key]=' at Rolling Prairie';break;
								case 7:$a_LinkXML[$v_Key]=' at Union Mills';break;
								case 8:$a_LinkXML[$v_Key]=' at Mobile Library';break;
							}break;
						case 'materials':
							switch($v_Data){
								case 1:$a_LinkXML[$v_Key]=' for books';break;
								case 2:$a_LinkXML[$v_Key]=' for music';break;
								case 3:$a_LinkXML[$v_Key]=' for movies';break;
								case 4:$a_LinkXML[$v_Key]=' for video games';break;
								case 5:$a_LinkXML[$v_Key]=' for television shows';break;
								case 23:$a_LinkXML[$v_Key]=' for audio books';break;
								case 24:$a_LinkXML[$v_Key]=' for downloadable audio books';break;
								case 32:$a_LinkXML[$v_Key]=' for graphic novels';break;
								case 50:$a_LinkXML[$v_Key]=' for large print books';break;
								case 75:$a_LinkXML[$v_Key]=' for digital audio players';break;
								default:$a_LinkXML[$v_Key]=' for all materials';break;
							}break;
						case 'news':$a_LinkXML[$v_Key]=' for articles';break;
						default:$a_LinkXML[$v_Key]='';break;
					}break;
				default:break;
			}
		}
		$this->A_Code=$a_CodeXML;
		// print_r($this->A_Code);die();
		$v_Wrapper='create-'.$a_LinkXML['area'].'-hotkey';
		$a_LinkXML['area']='Track '.$a_LinkXML['area'];
		$this->V_Link=implode('',$a_LinkXML).'.';
		return FF_CATXML($a_CodeXML,'hotkey-code').'<boom>'.FF_CATXML($a_LinkXML,$v_Wrapper);
	}
}
?>