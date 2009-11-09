<?
class Options{
	//
	// ARRAYS
	//
	//
	// Array - Display
	private $A_Display=array(
		'theme'=>9
	);
	//
	// FUNCTIONS
	//
	//
	// Function - Options
	function Options($v_UserID=0,$v_Theme=0){
		$this->F_Reset($v_UserID);
		$this->A_Display['theme']=$v_Theme;
	}
	//
	// Function - Perform Action
	function F_PerformAction($v_UserID=0,$v_Action='',$v_Data=''){
		if($v_UserID>0){
			switch($v_Action){
				case 'change-theme':
					$this->F_SetDisplay($v_UserID,'theme',$v_Data);
					$this->F_SaveDisplay($v_UserID);
				case 'continue':
					return $this->F_GetDisplayXML($v_UserID);
					break;
				case 'reset':
					$this->F_Reset($v_UserID);
					break;
				default:break;
			}
		}
	}
	//
	// Function - Get Display XML
	function F_GetDisplayXML($v_UserID=0){return FF_CATXML($this->A_Display,'options');}
	//
	// Function - Get Display
	function F_GetDisplay($v_UserID=0,$v_Key=''){return $this->A_Display[$v_Key];}
	//
	// Function - Reset
	function F_Reset($v_UserID=0){$this->A_Display=array('theme'=>9);}
	//
	// Function - Save Display
	function F_SaveDisplay($v_UserID=0){
		if($v_UserID>0){
			$v_DC=db::getInstance();
			$v_DC->Query('REPLACE INTO hex_themes_by_user (user_ID,theme_ID) VALUES ('.$v_UserID.','.$this->A_Display['theme'].');');
		}
	}
	//
	// Function - Set Display
	function F_SetDisplay($v_UserID=0,$v_Key='',$v_Data=''){$this->A_Display[$v_Key]=$v_Data;}
}
?>