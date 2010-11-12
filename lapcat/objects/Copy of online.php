<?
class Online{
	//
	// ARRAYS
	//
	//
	// Array - Character
	private $A_Character=array(
		'Mental'=>array(
			'Energy'=>array(
				'Current'=>0,
				'Maximum'=>0,
				'Recovery'=>0
			),
			'Health'=>array(
				'Current'=>0,
				'Maximum'=>0,
				'Recovery'=>0,
				'Heal Counter'=>0
			),
			'Life'=>array(
				'Maximum'=>1,
				'On Gain Wound'=>array(
				),
				'On Remove Wound'=>array(
				),
				'Wound'=>array(
				)
			),
			'Control'=>array(
				'Defensive'=>array(
					'Repose'=>array(
						'Match Reduction'=>0,
						'Skill'=>array(
							'Normal'=>0,
							'Star'=>0
						)
					)
				),
				'Offensive'=>array(
					'Hearing'=>array(
						'Cost Reduction'=>0,
						'Match Reduction'=>0,
						'Range'=>array(
							'Distance'=>0,
							'Extended'=>0
						),
						'Skill'=>array(
							'Normal'=>0,
							'Star'=>0
						)
					),
					'Perception'=>array(
						'Cost Reduction'=>0,
						'Match Reduction'=>0,
						'Range'=>array(
							'Distance'=>0,
							'Extended'=>0
						),
						'Skill'=>array(
							'Normal'=>0,
							'Star'=>0
						)
					)
				)
			)
		)
	);
	//
	// FUNCTIONS
	//
	//
	// Array - Character
	function F_PrintCharacter(){
		print_r($this->A_Character);die();
	}
	//
	// Function - Online
	function Online(){
		$this->F_PrintCharacter();
	}
}
if(isset($_SESSION['online'])){$o_Online=unserialize($_SESSION['online']);}else{$o_Online=new Online();}
/*
class C_A{
	public $V_Test=2;
}
class C_B{
	function return_test(){return parent::$V_Test;}
}
$v_A=new C_A();
echo $v_A->V_B->return_test();
*/
?>