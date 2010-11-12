<?
class SAW{
	// Array - Character (Blank)
	private $A_Character=array(
		'conditions'=>array(),
		'controller'=>''
	);
	// Array - Location (Blank)
	private $A_Location=array(
		'character'=>array()
	);

	// Array - Conditions
	private $A_Conditions=array();
	
	// Array - Queue
	private $A_Queue=array(
		1=>array(),
		2=>array(),
		3=>array()
	);
	
	// Array - Map
	private $A_Map=array();
	// Array - Phase Names
	private $A_Phases=array(
		1=>'Start of Turn',
		2=>'Recovery',
		3=>'Rest',
		4=>'Action',
		5=>'End of Turn'
	);
	// Array - Target XY
	private $A_Target=array(
		'x'=>1,
		'y'=>1
	);
	//
	// VARIABLES
	// Variable - Current Phase
	private $V_CurrentPhase=0;
	//
	// FUNCTIONS
	// Function - Add Condition
	function F_AddCondition($a_Targets=array(),$v_ConditionID=0){
		if(!empty($a_Targets)){
			foreach($a_Targets as $v_Key=>$v_TargetXY){
				if(!array_key_exists($v_ConditionID,$v_TargetXY)){
					$this->A_Map[$v_TargetXY]['character']['conditions'][]=$v_ConditionID;
				}
			}
		}
	}
	// Function - Add To Queue
	function F_AddToQueue($v_Position=0,$v_ActionID=0,$a_Parameters=array()){
		$this->A_Queue[$v_Position][]=array($v_ActionID=>$a_Parameters);
	}
	// Function - Clear Queue
	function F_ClearQueue(){
		$this->A_Queue=array();
	}
	// Function - Create Queue
	function F_CreateQueue(){
		$this->ClearQueue();
		foreach($this->A_Map as $v_XY=>$a_Location){
			if(array_key_exists('character',$a_Location)){
				foreach($a_Location['character']['conditions'] as $v_ID=>$a_Condition){
					if($a_Condition['phase']==$this->V_CurrentPhase){
						$this->F_AddToQueue();
					}
				}
			}
		}
	}
	// Function - Next Phase
	function F_NextPhase(){
		$this->V_CurrentPhase++;
		if(!array_key_exists($this->V_CurrentPhase,$this->A_Phases)){
			$this->V_CurrentPhase=1;
		}
		switch($this->V_CurrentPhase){
			case 1: // Start of Turn
				$this->F_CreateQueue();
				break;
			case 0:default:break;
		}
	}
	// Function - Check
	function F_Check($v_CheckID=0){
		switch($v_CheckID){
			case 1:
				if(array_key_exists(1,)){
					return TRUE;
				}
				break;
			case 0:default:break;
		}
		return FALSE;
	}


	// Function - Check
	function F_Check($a_Effect=array()){
		switch($a_Effect['checkID']){
			case 1:
				// Continue if the target of the effect is exerted.
				if(){
				}
				break;
			case 0:default:break;
		}
		return FALSE;
	}
	// Array - Conditions
	private $A_Conditions=array(
		// Phase - Recovery
		2000=>'Rested',
		// Phase - Rest
		3000=>'Exerted'
	);
	//
	// Function - Rest Phase
	function F_RestPhase(){
		// Loop through all locations.
		foreach($this->A_Map as $v_LocationXY=>$a_Location){
			// Continue if this location is occupied by a character.
			if(array_key_exists('character',$a_Location)){
				// Continue if the occupied character is friendly.
				if($a_Location['character']['controller']=='friendly'){
					// Loop through all conditions on this character.
					foreach($a_Location['character']['conditions'] as $v_ConditionID){
						// Continue if condition is a Phase - Rest condition.
						if(array_key_exists($v_ConditionID,$this->A_Conditions)){
							$this->F_RestCharacter($v_LocationXY);
						}
					}
				}
			}
		}
	}
	// Function - Rest Character
	function F_RestCharacter($v_LocationXY=''){
		$this->F_RemoveCondition($v_LocationXY,3000);
		$this->F_AddCondition($v_LocationXY,2000);
	}
	// Function - Add Condition
	function F_AddCondition($v_LocationXY='',$v_ConditionID=0){
		$this->A_Map[$v_LocationXY]['character']['conditions'][$v_ConditionID]=$v_ConditionID;
	}
	// Function - Remove Condition
	function F_RemoveCondition($v_LocationXY='',$v_ConditionID=0){
		$this->A_Map[$v_LocationXY]['character']['conditions']
	}
	//
	// Function - Recovery
	function F_RecoveryPhase(){
		// Each friendly rested character loses rested.
	}
}
?>