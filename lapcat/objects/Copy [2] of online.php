<?
class Online{
	private $A_Party=array(
		'current-goal'=>1,
		'goals'=>array(
			1=>'one-reached-end',
			2=>'one-reached-exit'
		)
	);

	private $A_Encounters=array(
		0=>array(
			'id'=>0,
			'name'=>'Human Fighter',
			'guild'=>'fighter',
			'cost'=>'10',
			'abilities'=>array(),
			'conditions'=>array(
				0=>array(
					'name'=>'brave',
					'type'=>'during-battle',
					'description'=>'This creature cannot be feared.'
				)
			),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'walk',
				'distance'=>1
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>0
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Steel Longsword',
					'hit-chance'=>15,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Melee',
					'hit-effect'=>35,
					'hit-effect-description'=>'Slashing',
					'initiative'=>1
				)
			),
			'training'=>array(
				'hit-chance'=>20,
				'hit-effect'=>10
			)
		),
		1=>array(
			'id'=>1,
			'name'=>'Goblin Scout',
			'guild'=>'rogue',
			'cost'=>'10',
			'abilities'=>array(),
			'conditions'=>array(
				0=>array(
					'name'=>'fearful',
					'type'=>'creatures-within-range',
					'description'=>'This creature begins retreating whenever it is at the same location as a party member.'
				)
			),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'scurry',
				'distance'=>2
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>1
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Half-Rock Sling',
					'hit-chance'=>5,
					'hit-distance'=>'close-ranged-attack',
					'hit-distance-description'=>'Close Range',
					'hit-effect'=>5,
					'hit-effect-description'=>'Blunt',
					'initiative'=>2
				)
			),
			'training'=>array(
				'hit-chance'=>20,
				'hit-effect'=>0
			)
		),
		2=>array(
			'id'=>2,
			'name'=>'Goblin Warrior',
			'guild'=>'fighter',
			'cost'=>'10',
			'abilities'=>array(),
			'conditions'=>array(),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'scurry',
				'distance'=>2
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>1
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Dagger',
					'hit-chance'=>5,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Melee',
					'hit-effect'=>10,
					'hit-effect-description'=>'Piercing',
					'initiative'=>2
				)
			),
			'training'=>array(
				'hit-chance'=>10,
				'hit-effect'=>0
			)
		),
		3=>array(
			'id'=>3,
			'name'=>'Human Wizard',
			'guild'=>'wizard',
			'cost'=>'10',
			'abilities'=>array(
				0=>array(
					'name'=>'Fire Bolt',
					'hit-chance'=>45,
					'hit-distance'=>'close-ranged-attack',
					'hit-distance-description'=>'Close Range',
					'hit-effect'=>65,
					'hit-effect-description'=>'Fire',
					're-use'=>true,
					're-use-timer'=>3,
					're-use-reset'=>3,
					'initiative'=>3
				)
			),
			'conditions'=>array(),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'walk',
				'distance'=>1
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>1
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Splintered Staff',
					'hit-chance'=>10,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Melee',
					'hit-effect'=>5,
					'hit-effect-description'=>'Blunt',
					'initiative'=>1
				)
			),
			'training'=>array(
				'hit-chance'=>10,
				'hit-effect'=>10
			)
		),
		4=>array(
			'id'=>4,
			'name'=>'Goblin Apprentice',
			'guild'=>'wizard',
			'cost'=>'10',
			'abilities'=>array(
				0=>array(
					'name'=>'Thorns',
					'hit-chance'=>20,
					'hit-distance'=>'close-ranged-attack',
					'hit-distance-description'=>'Close Range',
					'hit-effect'=>20,
					'hit-effect-description'=>'Piercing',
					're-use'=>true,
					're-use-timer'=>2,
					're-use-reset'=>3,
					'initiative'=>1
				)
			),
			'conditions'=>array(),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'walk',
				'distance'=>1
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>1
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Short Stick',
					'hit-chance'=>5,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Melee',
					'hit-effect-description'=>'Blunt',
					'hit-effect'=>5,
					'initiative'=>1
				)
			),
			'training'=>array(
				'hit-chance'=>20,
				'hit-effect'=>0
			)
		),
		5=>array(
			'id'=>5,
			'name'=>'Human Archer',
			'guild'=>'ranger',
			'cost'=>'10',
			'abilities'=>array(
				0=>array(
					'name'=>'Precise Shot',
					'hit-chance'=>85,
					'hit-distance'=>'close-ranged-attack',
					'hit-distance-description'=>'Close Range',
					'hit-effect'=>85,
					'hit-effect-description'=>'Piercing',
					're-use'=>true,
					're-use-timer'=>6,
					're-use-reset'=>6,
					'initiative'=>1
				)
			),
			'conditions'=>array(),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'walk',
				'distance'=>1
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>2
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Longbow',
					'hit-chance'=>25,
					'hit-distance'=>'close-ranged-attack',
					'hit-distance-description'=>'Close Range',
					'hit-effect'=>45,
					'hit-effect-description'=>'Piercing',
					'initiative'=>1
				)
			),
			'training'=>array(
				'hit-chance'=>0,
				'hit-effect'=>10
			)
		),
		6=>array(
			'id'=>6,
			'name'=>'Dog',
			'guild'=>'ranger',
			'cost'=>'10',
			'abilities'=>array(
				0=>array(
					'name'=>'Howl',
					'hit-chance'=>85,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Melee',
					'hit-effect'=>0,
					'hit-effect-description'=>'This ability has a 35% chance to Fear humanoid creatures.',
					're-use'=>true,
					're-use-timer'=>3,
					're-use-reset'=>3,
					'initiative'=>4
				)
			),
			'conditions'=>array(),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'run',
				'distance'=>2
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>1
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'Fangs',
					'hit-chance'=>25,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Close Melee',
					'hit-effect'=>5,
					'hit-effect-description'=>'Piercing',
					'initiative'=>1
				)
			),
			'training'=>array(
				'hit-chance'=>0,
				'hit-effect'=>0
			)
		),
		7=>array(
			'id'=>7,
			'name'=>'Drowned Undead',
			'guild'=>'fighter',
			'cost'=>'10',
			'abilities'=>array(),
			'conditions'=>array(),
			'creatures-within-range'=>array(),
			'movement'=>array(
				'type'=>'immobile',
				'distance'=>0
			),
			'next-action'=>'move',
			'path'=>array(
				'location'=>0,
				'vision'=>0
			),
			'retreating'=>false,
			'weapons'=>array(
				0=>array(
					'name'=>'',
					'hit-chance'=>5,
					'hit-distance'=>'close-melee-attack',
					'hit-distance-description'=>'Close Melee',
					'hit-effect'=>0,
					'hit-effect-description'=>'Blunt',
					'initiative'=>0
				)
			),
			'training'=>array(
				'hit-chance'=>0,
				'hit-effect'=>0
			)
		)
	);
	
	private $A_Quest=array(
		'ID'=>1,
		'name'=>'Quest I - Part I',
		'description'=>'Fisherman undead.',
		'quest-action-modifier'=>50,
		'creature-counter'=>1,
		'image'=>1,
		'current-turn'=>0,
		'triggered-events'=>array(
			0=>array(
				'event'=>array('name'=>'add-creature-ambush','value'=>7),
				'trigger'=>array('name'=>'one-at-location','value'=>10),
				'triggered'=>false
			)
		),
		'length-of-path'=>20,
		'turn-counter'=>0
	);
	
	private $A_Game=array(
		'creature'=>'',
		'party'=>'',
		'quest'=>''
	);
	
	private $A_Log=array();
	
	/* Function - Get Creatures Within Range */
	function f_GetCreaturesWithinRange($v_GameKey,$v_CreatureKey){
		$a_CreaturesWithinRange=array();
		foreach($this->A_Game[(($v_GameKey=='party')?'quest':'party')] as $v_Key=>$a_Creature){
			$this->A_Game[$v_GameKey][$v_CreatureKey]['same-location']=false;
			if($a_Creature['path']['location']==$this->A_Game['creature']['path']['location']){
				$this->A_Game[$v_GameKey][$v_CreatureKey]['same-location']=true;
				$this->A_Game[$v_GameKey][$v_CreatureKey]['attack-distance']='close-melee';
				$this->A_Game[$v_GameKey][$v_CreatureKey]['attack-target']=$v_Key;
				$a_CreaturesWithinRange[$v_Key]=$v_Key;
			}elseif(
				($this->A_Game['creature']['path']['vision']==1&&$a_Creature['path']['location']==($this->A_Game['creature']['path']['location']-1))
				||
				($this->A_Game['creature']['path']['vision']==1&&$a_Creature['path']['location']==($this->A_Game['creature']['path']['location']+1))
			){
				$this->A_Game[$v_GameKey][$v_CreatureKey]['attack-distance']='close-range';
				$this->A_Game[$v_GameKey][$v_CreatureKey]['attack-target']=$v_Key;
				$a_CreaturesWithinRange[$v_Key]=$v_Key;
			}else{
				$this->A_Game[$v_GameKey][$v_CreatureKey]['attack-distance']='';
				$this->A_Game[$v_GameKey][$v_CreatureKey]['attack-target']=0;
			}
		}
		return $a_CreaturesWithinRange;
	}
	/* Function - Can Attack */
	function f_CanAttack(){
		foreach($this->A_Game['creature']['weapons'] as $v_Key=>$a_Weapon){
			switch($a_Weapon['hit-distance']){
				case 'close-ranged-attack':
				case 'close-melee-attack':
					return 'weapon-'.$v_Key;
					break;
				default:
					break;
			}
		}
		return false;
	}
	/* Function - Can Use Ability */
	function f_CanUseAbility($v_GameKey,$v_CreatureKey){
		foreach($this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'] as $v_Key=>$a_Ability){
			if(!$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][$v_Key]['re-use']){
				$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][$v_Key]['re-use-timer']--;
				if($this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][$v_Key]['re-use-timer']<=0){
					$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][$v_Key]['re-use']=true;
					$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][$v_Key]['re-use-timer']=$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][$v_Key]['re-use-reset'];
				}
			}else{
				switch($a_Ability['hit-distance']){
					case 'close-ranged-attack':
					case 'close-melee-attack':
						return 'ability-'.$v_Key;
						break;
					default:
						break;
				}
			}
		}
		return false;
	}
	private $v_FailSafeCounter=0;
	/* Function - Continue */
	function f_ChooseNextAction($v_GameKey,$v_CreatureKey){
		$a_CreaturesWithinRange=$this->f_GetCreaturesWithinRange($v_GameKey,$v_CreatureKey);
		$v_CreaturesWithinRangeCount=count($a_CreaturesWithinRange);
		$this->A_Game[$v_GameKey][$v_CreatureKey]['creatures-within-range']=$a_CreaturesWithinRange;
		if($v_CreaturesWithinRangeCount>0){
			if($this->f_CreatureHasCondition($v_GameKey,$v_CreatureKey,'fearful')&&$this->A_Game[$v_GameKey][$v_CreatureKey]['same-location']){return 'flee';}
			$v_UseAbility=$this->f_CanUseAbility($v_GameKey,$v_CreatureKey);
			$v_Attack=$this->f_CanAttack();
			if(!$v_UseAbility){
				if(!$v_Attack){return 'move';}else{return $v_Attack;}
			}else{
				return $v_UseAbility;
			}
		}else{
			return 'move';
		}
	}
	/* Function - Creature Has Condition */
	function f_CreatureHasCondition($v_GameKey,$v_CreatureKey=0,$v_Condition=''){
		$v_Pass=false;
		foreach($this->A_Game[$v_GameKey][$v_CreatureKey]['conditions'] as $v_Key=>$a_Condition){
			if($a_Condition['name']==$v_Condition){$v_Pass=true;}
		}
		return $v_Pass;
	}
	/* Function - Continue */
	function f_Continue(){
		$this->A_Quest['turn-counter']++;
		$this->v_FailSafeCounter++;
		foreach($this->A_Game['party'] as $v_Key=>$a_Creature){
			$this->A_Game['creature']=$a_Creature;
			$this->A_Game['party'][$v_Key]['next-action']=$this->f_ChooseNextAction('party',$v_Key);
		}
		foreach($this->A_Game['quest'] as $v_Key=>$a_Creature){
			$this->A_Game['creature']=$a_Creature;
			$this->A_Game['quest'][$v_Key]['next-action']=$this->f_ChooseNextAction('quest',$v_Key);
		}
		//
		foreach($this->A_Game['party'] as $v_Key=>$a_Creature){
			$this->A_Game['creature']=$a_Creature;
			$this->A_Game['party'][$v_Key]['next-action']=$this->f_PerformAction('party',$v_Key);
		}
		foreach($this->A_Game['quest'] as $v_Key=>$a_Creature){
			$this->A_Game['creature']=$a_Creature;
			$this->A_Game['quest'][$v_Key]['next-action']=$this->f_PerformAction('quest',$v_Key);
		}
		//
		$this->f_CheckTriggers();
		$this->f_CheckGoal();
		if($this->v_FailSafeCounter>90){
			//print_r('Your party has failed.');die();
			return $this->A_Log;
		}else{
			return $this->f_Continue();
		}
	}
	function f_CheckTriggers(){
		foreach($this->A_Quest['triggered-events'] as $v_Key=>$a_Event){
			if(!$a_Event['triggered']){
				$v_PerformEvent=false;
				switch($a_Event['trigger']['name']){
					case 'one-at-location':
						foreach($this->A_Game['party'] as $v_CreatureKey=>$a_Creature){
							if($a_Creature['path']['location']==$a_Event['trigger']['value']){
								if($a_Creature['retreating']){
									$v_PerformEvent=true;
									$this->A_Log[]=array(
										'turn'=>$this->A_Quest['turn-counter'],
										'text'=>$a_Creature['name'].' (party-'.$v_CreatureKey.') screams like a little girl when the dead fisherman comes to life.'
									);
								}else{
									$this->A_Log[]=array(
										'turn'=>$this->A_Quest['turn-counter'],
										'text'=>$a_Creature['name'].' (party-'.$v_CreatureKey.') spotted a dead fisherman.'
									);
								}
							}
						}
						break;
					case 'turns-have-passed':
						if($this->A_Quest['turn-counter']>=$a_Event['trigger']['value']){
							$v_PerformEvent=true;
						}
						break;
					default:break;
				}
				if($v_PerformEvent){
					$this->A_Quest['triggered-events'][$v_Key]['triggered']=true;
					switch($a_Event['event']['name']){
						case 'add-creature':
							$this->f_AddCreatureToQuest($a_Event['event']['value'],0);
							break;
						case 'add-creature-ambush':
							$this->f_AddCreatureToQuest($a_Event['event']['value'],$a_Event['trigger']['value']);
							break;
						default:break;
					}
				}
			}
		}
	}
	function f_AddCreatureToQuest($v_Value=0,$v_Location=0){
		$this->A_Log[]=array(
			'turn'=>$this->A_Quest['turn-counter'],
			'text'=>$this->A_Encounters[$v_Value]['name'].' has entered the quest.'
		);
		$this->A_Game['quest'][$this->A_Quest['creature-counter']]=$this->A_Encounters[$v_Value];
		$this->A_Game['quest'][$this->A_Quest['creature-counter']]['path']['location']=$v_Location;
		$this->A_Quest['creature-counter']++;
	}
	function f_CheckGoal(){
		$v_Pass=false;
		switch($this->A_Party['goals'][$this->A_Party['current-goal']]){
			case 'one-reached-end':
				foreach($this->A_Game['party'] as $v_Key=>$a_Creature){
					if($a_Creature['path']['location']==$this->A_Quest['length-of-path']){
						$v_Pass=true;
						$this->A_Game['party'][$v_Key]['retreating']=true;
					}
				}
				break;
			case 'one-reached-exit':
				foreach($this->A_Game['party'] as $v_Key=>$a_Creature){
					if($a_Creature['path']['location']==0&&$a_Creature['retreating']){
						$v_Pass=true;
						//print_r('Your party has succeeded.');die();
						$this->A_Log[]=array(
							'turn'=>$this->A_Quest['turn-counter'],
							'text'=>'Your party was successful.'
						);
					}
				}
				break;
			default:
				break;
		}
		if($v_Pass){
			$this->A_Party['current-goal']++;
		}
		if($this->A_Party['current-goal']>count($this->A_Party['goals'])){
			$this->v_FailSafeCounter=91;
		}
	}
	/* Function - Get Target */
	function f_GetTarget(){
		foreach($this->A_Game['creature']['creatures-within-range'] as $v_Key=>$a_Creature){
			return $v_Key;
		}
	}
	/* Function - Perform Action */
	function f_PerformAction($v_GameKey,$v_CreatureKey){
		$v_OtherSide=(($v_GameKey=='party')?'quest':'party');
		switch($this->A_Game['creature']['next-action']){
			case 'ability-0':
				if($v_Target=$this->A_Game['creature']['attack-target']>0){
					$v_Target=$this->A_Game['creature']['attack-target'];
				}else{
					$v_Target=$this->f_GetTarget();
				}
				if(array_key_exists($v_Target,$this->A_Game[$v_OtherSide])){
					if($this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['re-use']){
						$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['re-use']=false;
					}
					$v_Accuracy=rand(0,100);
					if($v_Accuracy<=$this->A_Game['creature']['abilities'][0]['hit-chance']){
						// Hit
						$v_Word='casts '.$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['name'];
						$v_Death=rand(0,100);
						if($v_Death<=$this->A_Game['creature']['abilities'][0]['hit-effect']){
							$v_Word='casts '.$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['name'].' and kills';
						}else{
							$v_Word='casts '.$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['name'].' but does not kill';
						}
					}else{
						// Miss
						$v_Word='casts '.$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['name'].' and misses';
					}
					$this->A_Log[]=array(
						'turn'=>$this->A_Quest['turn-counter'],
						'text'=>'The '.$this->A_Game['creature']['name'].' ('.$v_GameKey.'-'.$v_CreatureKey.') '.$v_Word.' the '.$this->A_Game[$v_OtherSide][$v_Target]['name'].' ('.$v_OtherSide.'-'.$v_Target.').'
					);
					if($v_Word=='casts '.$this->A_Game[$v_GameKey][$v_CreatureKey]['abilities'][0]['name'].' and kills'){
						unset($this->A_Game[$v_OtherSide][$v_Target]);
					}
				}else{
					$this->A_Log[]=array(
						'turn'=>$this->A_Quest['turn-counter'],
						'text'=>'The '.$this->A_Game['creature']['name'].' ('.$v_GameKey.'-'.$v_CreatureKey.') waits.'
					);
				}
				break;
			case 'weapon-0':
				if($v_Target=$this->A_Game['creature']['attack-target']>0){
					$v_Target=$this->A_Game['creature']['attack-target'];
				}else{
					$v_Target=$this->f_GetTarget();
				}
				if(array_key_exists($v_Target,$this->A_Game[$v_OtherSide])){
					$v_Accuracy=rand(0,100);
					if($v_Accuracy<=$this->A_Game['creature']['weapons'][0]['hit-chance']){
						// Hit
						$v_Word='hits';
						$v_Death=rand(0,100);
						if($v_Death<=$this->A_Game['creature']['weapons'][0]['hit-effect']){
							$v_Word='hits and kills';
						}else{
							$v_Word='hits but does not kill';
						}
					}else{
						// Miss
						$v_Word='swings and misses';
					}
					$this->A_Log[]=array(
						'turn'=>$this->A_Quest['turn-counter'],
						'text'=>'The '.$this->A_Game['creature']['name'].' ('.$v_GameKey.'-'.$v_CreatureKey.') '.$v_Word.' the '.$this->A_Game[$v_OtherSide][$v_Target]['name'].' ('.$v_OtherSide.'-'.$v_Target.').'
					);
					if($v_Word=='hits and kills'){
						unset($this->A_Game[$v_OtherSide][$v_Target]);
					}
				}else{
					$this->A_Log[]=array(
						'turn'=>$this->A_Quest['turn-counter'],
						'text'=>'The '.$this->A_Game['creature']['name'].' ('.$v_GameKey.'-'.$v_CreatureKey.') waits.'
					);
				}
				break;
			case 'flee':
				$this->A_Game[$v_GameKey][$v_CreatureKey]['retreating']=true;
				$this->A_Game['creature']['retreating']=true;
			case 'move':
				$v_Retreating=$this->A_Game['creature']['retreating'];
				$v_Distance=$this->A_Game[$v_GameKey][$v_CreatureKey]['movement']['distance'];
				$v_Location=$this->A_Game[$v_GameKey][$v_CreatureKey]['path']['location'];
				$v_Limit=$this->A_Quest['length-of-path'];
				switch($this->A_Game['creature']['movement']['type']){
					case 'walk':case 'scurry':
						if($v_Retreating){
							//$v_Distance=$v_Limit-$v_Location;
							if($v_Location-$v_Distance<=0){
								$v_Location=0;
							}else{
								$v_Location-=$v_Distance;
							}
						}else{
							//$v_Distance=$v_Location;
							if($v_Location+$v_Distance>=$v_Limit){
								$v_Location=$v_Limit;
							}else{
								$v_Location+=$v_Distance;
							}
						}
						$this->A_Game[$v_GameKey][$v_CreatureKey]['path']['location']=$v_Location;
						break;
					default:
						break;
				}
				$this->A_Log[]=array(
					'turn'=>$this->A_Quest['turn-counter'],
					'text'=>'The '.$this->A_Game['creature']['name'].' ('.$v_GameKey.'-'.$v_CreatureKey.') '.(($v_Retreating)?'retreats':'advances').' '.$v_Distance.' square'.(($v_Distance==1)?'':'s').'. Current path position: '.$this->A_Game[$v_GameKey][$v_CreatureKey]['path']['location'].'.'
				);
				break;
			default:
				break;
		}
	}
	/* Function - Get Quests */
	function f_GetQuests(){
		$a_List=array();
		$a_List[$this->A_Quest['ID']]=array(
			'name'=>$this->A_Quest['name'],
			'description'=>$this->A_Quest['description'],
			'image'=>$this->A_Quest['image']
		);
		return array('quests'=>$a_List);
	}
	/* Function - Get List */
	function f_GetList($v_Guild){
		$a_List=array();
		foreach($this->A_Encounters as $v_Key=>$a_Encounter){
			if($a_Encounter['guild']==$v_Guild){
				$a_List[]=$a_Encounter;
			}
		}
		return array('data'=>$a_List,'guild'=>$v_Guild);
	}
	/* Function - Start */
	function f_Start(){
		// $v_QuestModifier=$this->A_Quest['difficulty']+$this->A_Quest['ID'];
		$a_Party=array(
			1=>$this->A_Encounters[0] // Human Fighter
		);
		$a_Quest=array();
		$this->A_Game=array(
			'creature'=>'',
			'party'=>$a_Party,
			'quest'=>$a_Quest
		);
		return $this->f_Continue();
	}

	function Online(){}
}
?>