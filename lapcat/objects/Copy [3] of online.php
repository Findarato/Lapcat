<?
class Online{
	/* Array - Player Teams */
	private $a_PlayerTeams=array();

	/* Array - Stronghold */
	private $a_Stronghold=array();

	/* Array - JSON */
	private $a_JSON=array(
		'switch'=>'failed',
		'data'=>array()
	);

	/* Function - Reset JSON */
	function f_ResetJSON(){
		$this->a_JSON=array(
			'switch'=>'failed',
			'data'=>array()
		);
	}

	/* Function - Buy Member From Guild */
	function f_BuyMemberFromGuild($v_MemberID=1){
		if(!array_key_exists($v_MemberID,$this->a_TestMemberData)){
			$this->a_JSON['data'][]='member-does-not-exist';
		}else{
			$this->a_Stronghold[]=$this->a_TestMemberData[$v_MemberID];
			$this->a_JSON['data'][]='member-bought';
		}
	}

	/* Function - Manage Team */
	function f_ManageTeam($v_ReturnJSON=false,$a_Parameters){
		$v_Count=count($a_Parameters);
		switch($v_Count){
			case 4:$v_Optional=$a_Parameters[3];
			case 3:$v_Secondary=$a_Parameters[2];
			case 2:$v_Main=$a_Parameters[1];
			case 1:$v_Command=$a_Parameters[0];
				break;
			case '':default:
				if($v_ReturnJSON){return $this->a_JSON;}else{return;}
				break;
		}
			/*                             */
		switch($v_Command){
			case 'buy-member':case 'transfer-member':case 'create-team':
				$this->a_JSON['switch']='data';
				break;
			/*                             */
			case '':default:
				break;
		}
			/*                             */
		switch($v_Command){

			case 'buy-member':
			/* This command adds a member to the stronghold from a guild. */
			/*         Main = Member ID    */
			/*    Secondary = Team ID      */
				$this->f_BuyMemberFromGuild($v_Main);
				break;

			case 'transfer-member':
			/* This command transfers a member to a different team. */
			/*         Main = Member ID    */
			/*    Secondary = Team ID      */
				break;

			case 'create-team':
			/* This command creates a new team. */
			/*         Main = Team ID      */
				if(!array_key_exists($v_Main,$this->a_PlayerTeams)){
					$this->a_PlayerTeams[$v_Main]=array();
					$this->a_JSON['data'][]='team-created';
				}
				break;
			case '':default:
				break;
		}
			/*                             */
		if($v_ReturnJSON){return $this->a_JSON;}
			/*                             */
	}




	/* Array - Mercenary (Base) */
	private $a_Mercenary=array(
		'id'=>0,
		'guild'=>'',
		'location'=>0,
		'name'=>'',
		'preference'=>array('action'=>15,'magic'=>10,'use-item'=>5,'attack'=>0),
		'range-preference'=>array('close'=>15,'short'=>10,'long'=>5,'distant'=>0),
		'preferred-targets'=>array(),
		'skills'=>array('hearing'=>0,'speech'=>0,'stealth'=>0,'vision'=>0),
		'spotted'=>array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array()),
		'spotted-total'=>0,
		'targets'=>array('action'=>array(),'attack'=>array(),'magic'=>array(),'use-item'=>array()),
		'abilities'=>array(
			'action'=>'',
			'magic'=>''
		),
		'general'=>array(
			'gender'=>'',
			'race'=>'',
			'guild'=>'',
			'size'=>''
		),
		'training'=>array(
			'action'=>'',
			'attack'=>'',
			'defense'=>'',
			'magic'=>'',
			'move'=>''
		),

		'captain'=>false,
		'health'=>array('current-points'=>1,'maximum-points'=>1,'regeneration'=>0),
		'mana'=>array('current-points'=>0,'maximum-points'=>0,'regeneration'=>0),
		'stamina'=>array('current-points'=>1,'maximum-points'=>1,'regeneration'=>0),
		'next-performance'=>'',
		'retreating'=>false,
		'visible-members'=>array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array()),
		'visible-member-total'=>0,
		'can-action'=>false,'can-attack'=>false,'can-magic'=>false,'can-hear'=>false,'can-hide'=>false,'can-move'=>false,'can-speak'=>false,'can-see'=>false,'can-use-item'=>false,
		'communication'=>array('can-speak'=>false,'speech'=>0,'can-hear'=>true,'hearing'=>0,'known-languages'=>array(''),'spoken-language'=>''),

		'action'=>array('can-action'=>false,'behavior'=>'act-at-will','close'=>false,'short'=>false,'long'=>false,'distant'=>false,'deal-damage'=>false,'stamina-cost'=>0,'attacker'=>'','defender'=>'','has-target'=>false,'text'=>'','re-use-timer'=>0,'re-use'=>0,'natural'=>array('accuracy'=>0,'damage'=>0,'damage-type'=>'blunt'),'description'=>''),

		'attack'=>array('can-attack'=>false,'behavior'=>'attack-at-will','close'=>false,'short'=>false,'long'=>false,'distant'=>false,'deal-damage'=>true,'has-target'=>true,'on-hit'=>false,'physical'=>array('accuracy'=>0,'damage'=>0,'damage-type'=>'blunt')),

		'magic'=>array('can-magic'=>false,'behavior'=>'cast-at-will','close'=>false,'short'=>false,'long'=>false,'distant'=>false,'deal-damage'=>false,'mana-cost'=>0,'attacker'=>'','defender'=>'','has-target'=>false,'text'=>'','re-use-timer'=>0,'re-use'=>0,'mental'=>array('accuracy'=>0,'damage'=>0,'damage-type'=>'blunt'),'description'=>''),

		'defense'=>array('behavior'=>'','block'=>0,'dodge'=>0,'parry'=>0,'resistance'=>array('blunt'=>array('absorption'=>0,'amplification'=>0),'cold'=>array('absorption'=>0,'amplification'=>0),'electrical'=>array('absorption'=>0,'amplification'=>0),'heat'=>array('absorption'=>0,'amplification'=>0),'piercing'=>array('absorption'=>0,'amplification'=>0),'slashing'=>array('absorption'=>0,'amplification'=>0))),

		'move'=>array('can-move'=>true,'can-hide'=>true,'can-see'=>true,'behavior'=>'move-at-will','distance'=>0,'initiative'=>0,'range-of-view'=>0,'spot'=>'normal-spot','stealth'=>0,'vision'=>0),

		'use-item'=>array('can-use-item'=>true,'has-target'=>true,'close'=>false,'short'=>false,'long'=>false,'distant'=>false),

		'conditions'=>array('base'=>array(),'action'=>array(),'attack'=>array(),'defense'=>array(),'magic'=>array(),'move'=>array(),'temporary'=>array()),
		'items'=>array(
			'base'=>array('fingers'=>'','neck'=>''),
			'attack'=>array('left-hand'=>'','right-hand'=>''),
			'defense'=>array('legs'=>'','torso'=>'','hands'=>'','head'=>''),
			'move'=>array('face'=>'','feet'=>'','waist'=>'')
		),
		'target'=>array('close'=>-1,'short'=>-1,'long'=>-1,'distant'=>-1),
		'next-range'=>''
	);


	/* Function - Start */
	function f_Start(){
		$this->A_Quest=$this->A_TestQuestData[$this->V_QuestID];
		$this->A_Party['goals']=$this->A_Quest['goals'];
		$this->A_Log[]=array(
			'team'=>'narrator',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>'Started quest ('.$this->A_Quest['name'].').'
		);
		$this->f_LoadMemberData();
		$this->A_Log[]=array(
			'team'=>'narrator',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>'Members loaded.'
		);
		$this->f_ConstructTeam('party');
		$this->f_ConstructTeam('quest');
		$this->f_SortPreferences('party');
		$this->f_SortPreferences('quest');
		return $this->f_Continue();
	}
	/* Function - Continue */
	function f_Continue(){
		$this->A_TeamData['turn-counter']++;
		$this->v_FailSafeCounter++;

		$this->f_AllMembersLookAround('party');
		$this->f_AllMembersLookAround('quest');

		$this->f_AllMembersRegenerate('party');
		$this->f_AllMembersRegenerate('quest');

		$this->f_AllMembersCheckTemporaryConditions('party');
		$this->f_AllMembersCheckTemporaryConditions('quest');

		$this->f_AllMembersInformOthers('party');
		$this->f_AllMembersInformOthers('quest');

		$this->f_AllMembersChoosePossibleTargets('party');
		$this->f_AllMembersChoosePossibleTargets('quest');

		$this->f_AllTeamsChooseTargetAndPerform();

		$this->f_CheckTriggers('party');
		$this->f_CheckGoal('party');

		if($this->v_FailSafeCounter>$this->A_Quest['maximum-turns-fail-safe']||$this->A_TeamData['party-has-won']||$this->A_TeamData['quest-has-won']){
			$this->A_Log[]=array('team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>'Finished quest ('.$this->A_Quest['name'].').');
			if($this->A_TeamData['quest-has-won']){
				array_unshift($this->A_Log,array('team'=>'narrator-bold','turn'=>0,'text'=>'The party never returned or could be missing.'));
			}else{
				array_unshift($this->A_Log,array('team'=>'narrator-bold','turn'=>0,'text'=>'The party returned after '.$this->f_GetTime().' of journeying.'));
			}
			return $this->A_Log;
		}else{
			return $this->f_Continue();
		}
	}


	/* Function - All Members Choose Possible Targets */
	function f_AllMembersChoosePossibleTargets($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_ChoosePossibleTargets($v_TeamName,$v_MemberID);}
	}
	/* Function - All Members Inform Others */
	function f_AllMembersInformOthers($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_InformOthers($v_TeamName,$v_MemberID);}
	}
	/* Function - All Members Look Around */
	function f_AllMembersLookAround($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_LookAround($v_TeamName,$v_MemberID);}
	}
	/* Function - All Members Regenerate */
	function f_AllMembersRegenerate($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_Regenerate($v_TeamName,$v_MemberID);}
	}
	/* Function - All Members Check Temporary Conditions */
	function f_AllMembersCheckTemporaryConditions($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_TemporaryConditionCheck($v_TeamName,$v_MemberID);}
	}

	/* Function - All Teams Choose Target And Perform */
	function f_AllTeamsChooseTargetAndPerform(){
		$a_Initiative=$this->f_SortByInitiative();
		foreach($a_Initiative as $v_Initiative=>$a_Members){
			foreach($a_Members as $v_Key=>$a_Member){$this->f_ChooseTargetAndPerform($a_Member['team'],$a_Member['id']);}
		}
	}

	/* Function - Choose Possible Targets */
	function f_ChoosePossibleTargets($v_TeamName,$v_MemberID){
		$this->f_ResetTargets($v_TeamName,$v_MemberID);
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if($a_Member['spotted-total']==0){return;}
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['spotted'] as $v_RangeName=>$a_DefendingMembers){
			foreach($a_DefendingMembers as $v_Key=>$v_DefendingMemberID){
				$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
				$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
				foreach($a_Member['preference'] as $v_PerformanceName=>$v_PreferenceWeight){
					if(!array_key_exists('close',$a_Member[$v_PerformanceName])){
						echo $v_PerformanceName.' = ';
						print_r($a_Member[$v_PerformanceName]);die();
					}
					if($a_Member['can-'.$v_PerformanceName]&&$a_Member[$v_PerformanceName]['has-target']&&$a_Member[$v_PerformanceName][$v_RangeName]){
						$v_Pass=true;
						switch($v_PerformanceName){
							case 'magic':if($a_Member['mana']['current-points']<$a_Member[$v_PerformanceName]['mana-cost']){$v_Pass=false;}break;
							case 'action':if($a_Member['stamina']['current-points']<$a_Member[$v_PerformanceName]['stamina-cost']){$v_Pass=false;}break;
							default:break;
						}
						if($v_Pass){
							$v_TotalWeight=$v_PreferenceWeight+$a_Member['range-preference'][$v_RangeName]+$this->f_GetTotalWeight($v_DefendingTeamName,$v_DefendingMemberID);
							$this->A_Teams[$v_TeamName][$v_MemberID]['targets'][$v_PerformanceName][$v_DefendingMemberID]=$v_TotalWeight;
							$this->A_Log[]=array(
								'team'=>$v_TeamName,
								'turn'=>$this->A_TeamData['turn-counter'],
								'text'=>$v_MemberLogName.' chooses '.$v_DefendingMemberLogName.' as a possible '.$v_PerformanceName.' target - weight ['.$v_TotalWeight.'].'
							);
						}
					}
				}
			}
		}
	}
	/* Function - Choose Target And Perform */
	function f_ChooseTargetAndPerform($v_TeamName,$v_MemberID){
		if(!array_key_exists($v_MemberID,$this->A_Teams[$v_TeamName])){return;}
		$this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets']=array();
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['targets'] as $v_PerformanceName=>$a_Targets){
			foreach($a_Targets as $v_DefendingMemberID=>$v_PreferenceWeight){
				if(array_key_exists($v_DefendingMemberID,$this->A_Teams[$v_DefendingTeamName])){
					$this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets'][$v_PreferenceWeight][]=array($v_PerformanceName=>$v_DefendingMemberID);
				}
			}
		}
		if(empty($this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets'])){$this->f_Move($v_TeamName,$v_MemberID);return;}
		$this->f_Perform($v_TeamName,$v_MemberID);
	}
	/* Function - Remove Cost From Pool */
	function f_RemoveCostFromPool($v_TeamName,$v_MemberID,$v_PoolName,$v_Cost){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$this->A_Log[]=array(
			'team'=>$v_TeamName,
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' is drained of '.$v_Cost.' '.$v_PoolName.'.'
		);
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current-points']-=$v_Cost;
		if($this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current-points']<1){
			$this->A_Log[]=array(
				'team'=>$v_TeamName,
				'turn'=>$this->A_TeamData['turn-counter'],
				'text'=>$v_MemberLogName.' is out of '.$v_PoolName.'.'
			);
		}
	}
	/* Function - Deal Damage To Pool */
	function f_DealDamageToPool($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PoolName,$v_Damage,$v_DamageType){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
		$this->A_Log[]=array(
			'team'=>$v_TeamName.'-bold',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' deals '.$v_Damage.' '.$v_DamageType.' damage to '.$v_DefendingMemberLogName.'.'
		);
		$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID][$v_PoolName]['current-points']-=$v_Damage;
		if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID][$v_PoolName]['current-points']>0){return false;}
		return true;
	}
	/* Function - Inform Others */
	function f_InformOthers($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($this->A_Teams[$v_TeamName] as $v_OtherMemberID=>$a_OtherMember){
			if($v_MemberID!==$v_OtherMemberID){
				if($a_Member['location']==$a_OtherMember['location']){
					if(in_array($a_Member['communication']['spoken-language'],$a_OtherMember['communication']['known-languages'])){
						$v_OtherMemberLogName=$a_OtherMember['name'].' ['.$v_OtherMemberID.']';
						foreach($a_Member['spotted'] as $v_RangeName=>$a_Range){
							if($a_Member['move']['initiative']>=$a_OtherMember['move']['initiative']){
								foreach($a_Range as $v_Key=>$v_DefendingMemberID){
									if($this->f_Challenge('normal-speak',$a_Member,$a_OtherMember,false)){
										$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
										$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
										if(!in_array($v_DefendingMemberID,$a_OtherMember['spotted'][$v_RangeName])){
											$v_Language=$a_Member['communication']['spoken-language'];
											if($v_Language!==''){
												$this->A_Log[]=array(
													'team'=>$v_TeamName,
													'turn'=>$this->A_TeamData['turn-counter'],
													'text'=>'In '.$v_Language.', '.$v_MemberLogName.' informs '.$v_OtherMemberLogName.' about '.$v_DefendingMemberLogName.' on tile '.$a_DefendingMember['location'].'.'
												);
											}
											$this->A_Teams[$v_TeamName][$v_OtherMemberID]['spotted'][$v_RangeName][]=$v_DefendingMemberID;
											$this->A_Teams[$v_TeamName][$v_OtherMemberID]['spotted-total']++;
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	/* Function - Look Around */
	function f_LookAround($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['spotted-total']=0;
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_RangeOfView=$a_Member['move']['range-of-view'];
		$v_Tile=$a_Member['location'];
		$a_OthersInView=array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array());
		switch($v_RangeOfView){
			case 3:$a_OthersInView['distant']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'distant',$v_Tile,3);
			case 2:$a_OthersInView['long']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'long',$v_Tile,2);
			case 1:$a_OthersInView['short']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'short',$v_Tile,1);
			case 0:default:$a_OthersInView['close']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'close',$v_Tile,0);
				break;
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['spotted']=$a_OthersInView;
	}
	/* Function - Look At Tile */
	function f_LookAtTile($v_TeamName,$v_MemberID,$v_RangeName,$v_Tile,$v_DistanceFromTile){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);

		$a_OthersInRange=array();
		if($v_DistanceFromTile>0){$a_Tiles=array($v_Tile-$v_DistanceFromTile,$v_Tile+$v_DistanceFromTile);}else{$a_Tiles=array($v_Tile);}
		$this->A_Log[]=array(
			'team'=>$v_TeamName,
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' looks around ('.$v_RangeName.' range).'
		);
		foreach($this->A_Teams[$v_DefendingTeamName] as $v_DefendingMemberID=>$a_DefendingMember){
			$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
			foreach($a_Tiles as $v_Key=>$v_Tile){
				if($v_Tile==$a_DefendingMember['location']){
					if($this->f_Challenge('normal-spot',$a_Member,$a_DefendingMember,$v_RangeName)){
						$this->A_Log[]=array(
							'team'=>$v_TeamName,
							'turn'=>$this->A_TeamData['turn-counter'],
							'text'=>$v_MemberLogName.' spots '.$v_DefendingMemberLogName.' on tile '.$v_Tile.'.'
						);
						$this->A_Teams[$v_TeamName][$v_MemberID]['spotted'][$v_RangeName][]=$v_DefendingMemberID;
						$this->A_Teams[$v_TeamName][$v_MemberID]['spotted-total']++;
						$a_OthersInRange[]=$v_DefendingMemberID;
					}
				}
			}
		}
		return $a_OthersInRange;
	}
	/* Function - Member Waits */
	function f_MemberWaits($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$this->A_Log[]=array(
			'team'=>$v_TeamName,
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' waits.'
		);
	}
	/* Function - Move */
	function f_Move($v_TeamName,$v_MemberID){
		if(!$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']){$this->f_MemberWaits($v_TeamName,$v_MemberID);return;}
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_CurrentTile=$a_Member['location'];
		$v_MaximumDistanceMoved=$a_Member['move']['distance'];
		$v_MaximumPathLocation=$this->A_Quest['length-of-path'];
		$v_DistanceMoved=$v_MaximumDistanceMoved;
		$v_Retreating=$a_Member['retreating'];
		if($v_Retreating){
			if($v_CurrentTile-$v_MaximumDistanceMoved<1){
				$v_DistanceMoved=$v_CurrentTile-1;
			}
			$v_Destination=$v_CurrentTile-$v_DistanceMoved;
			if($v_Destination==1){
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=false;
				$this->A_Log[]=array(
					'team'=>$v_TeamName,
					'turn'=>$this->A_TeamData['turn-counter'],
					'text'=>$v_MemberLogName.' stops retreating.'
				);
			}
		}else{
			if($v_CurrentTile+$v_MaximumDistanceMoved>$v_MaximumPathLocation){
				$v_DistanceMoved=$v_MaximumPathLocation-$v_CurrentTile;
			}
			$v_Destination=$v_CurrentTile+$v_DistanceMoved;
			if($v_Destination==$this->A_Quest['length-of-path']){
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=true;
				$this->A_Log[]=array(
					'team'=>$v_TeamName,
					'turn'=>$this->A_TeamData['turn-counter'],
					'text'=>$v_MemberLogName.' begins retreating.'
				);
			}
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['location']=$v_Destination;
		if($v_DistanceMoved==0){
			$this->f_MemberWaits($v_TeamName,$v_MemberID);
		}else{
			$this->A_Log[]=array('team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' moves '.$v_DistanceMoved.' tile'.(($v_DistanceMoved==1)?'':'s').', stopping on tile '.$v_Destination.'.');
		}
	}
	/* Function - Perform */
	function f_Perform($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['preference'] as $v_PerformanceName=>$v_PreferenceWeight){
			if(!$a_Member[$v_PerformanceName]['has-target']&&$a_Member['can-'.$v_PerformanceName]){
				$v_TotalWeight=$a_Member['preference'][$v_PerformanceName]+15;
				$v_Pass=true;
				switch($v_PerformanceName){
					case 'magic':if($a_Member['mana']['current-points']<$a_Member[$v_PerformanceName]['mana-cost']){$v_Pass=false;}break;
					case 'action':if($a_Member['stamina']['current-points']<$a_Member[$v_PerformanceName]['stamina-cost']){$v_Pass=false;}break;
					default:break;
				}
				if($v_Pass){
					switch($v_PerformanceName){
						case 'magic':$v_Pass=$this->f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,'health',1,0);break;
						default:break;
					}
					if($v_Pass){
						$a_Member['preferred-targets'][$v_TotalWeight][]=array($v_PerformanceName=>-1);
						$this->A_Log[]=array(
							'team'=>$v_TeamName,
							'turn'=>$this->A_TeamData['turn-counter'],
							'text'=>$v_MemberLogName.' chooses '.$v_PerformanceName.' as a possibility - weight ['.$v_TotalWeight.'].'
						);
					}
				}
			}
		}
		krsort($a_Member['preferred-targets']);
		foreach($a_Member['preferred-targets'] as $v_WeightKey=>$a_PreferredTargets){
			foreach($a_PreferredTargets as $v_Key=>$a_PreferredTarget){
				$v_PerformanceName=key($a_PreferredTarget);
				$v_DefendingMemberID=$a_PreferredTarget[$v_PerformanceName];
				if($v_DefendingMemberID>=0){
					$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
					$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
				}
				$a_Optional=false;
				switch($v_PerformanceName){
					case 'action':
						$v_ActionName=$a_Member['abilities'][$v_PerformanceName];
						$this->f_RemoveCostFromPool($v_TeamName,$v_MemberID,'stamina',$a_Member[$v_PerformanceName]['stamina-cost']);
						switch($v_ActionName){
							case 'War Cry':
								$a_Conditions=array('War Cry'=>array('duration'=>4,'name'=>'Battle Rage'));
								$this->A_Log[]=array(
									'team'=>$v_TeamName,
									'turn'=>$this->A_TeamData['turn-counter'],
									'text'=>$v_MemberLogName.' performs '.$v_ActionName.'.'
								);
								$this->f_AddTemporaryCondition($v_TeamName,$v_MemberID,$a_Conditions[$v_ActionName]['name'],$a_Conditions[$v_ActionName]['duration']);
								break;

							case 'Ground Pound':case 'Throw Dirt':
								$a_Conditions=array('Throw Dirt'=>array('duration'=>1,'name'=>'Partial Blindness'),'Ground Pound'=>array('duration'=>2,'name'=>'Knocked Down'));
								$this->A_Log[]=array(
									'team'=>$v_TeamName,
									'turn'=>$this->A_TeamData['turn-counter'],
									'text'=>$v_MemberLogName.' performs '.$v_ActionName.'.'
								);
								foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
									if($a_TargetMember['location']==$a_Member['location']){
										switch($v_ActionName){
											case 'Ground Pound':
											case 'Throw Dirt':
												$this->f_AddTemporaryCondition($v_DefendingTeamName,$v_TargetMemberID,$a_Conditions[$v_ActionName]['name'],$a_Conditions[$v_ActionName]['duration']);
												break;
											case '':default:
												break;
										}
									}
								}
								return;
								break;

							case 'Fierce Growl':
								$this->A_Log[]=array(
									'team'=>$v_TeamName,
									'turn'=>$this->A_TeamData['turn-counter'],
									'text'=>$v_MemberLogName.' performs '.$v_ActionName.'.'
								);
								foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
									if($a_TargetMember['can-hear']&&$a_TargetMember['location']==$a_Member['location']){$this->f_AddTemporaryCondition($v_DefendingTeamName,$v_TargetMemberID,'Afraid',3);}
								}
								return;
								break;
							case 'Poison Spit':
								if($this->f_Challenge('normal-action',$a_Member,$a_DefendingMember,$a_Optional)){
									$this->A_Log[]=array(
										'team'=>$v_TeamName,
										'turn'=>$this->A_TeamData['turn-counter'],
										'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and hits '.$v_DefendingMemberLogName.'.'
									);
									$v_Killed=$this->f_AddTemporaryCondition($v_DefendingTeamName,$v_DefendingMemberID,'Weak Poisoning',3);
									if($v_Killed){$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);}
								}else{
									$this->A_Log[]=array(
										'team'=>$v_TeamName,
										'turn'=>$this->A_TeamData['turn-counter'],
										'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and misses '.$v_DefendingMemberLogName.'.'
									);
								}
								return;
								break;
							case 'Assassinate':
								$a_Optional['member-ID']=$v_MemberID;
								$a_Optional['range']=$this->f_GetRangeNameFromDistance($a_Member,$a_DefendingMember,$v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
							case 'Fling Rocks':case 'Precise Shot':case 'Strong Swipe':
								if($this->f_Challenge('normal-action',$a_Member,$a_DefendingMember,$a_Optional)){
									$a_Damage=$this->f_GetDamage($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName,'natural');
									$this->A_Log[]=array(
										'team'=>$v_TeamName,
										'turn'=>$this->A_TeamData['turn-counter'],
										'text'=>$v_MemberLogName.$a_Damage['sneaking-text'].' performs '.$v_ActionName.' and hits '.$v_DefendingMemberLogName.'.'
									);
									$v_Killed=$this->f_DealDamageToPool($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'health',$a_Damage['value'],$a_Damage['type']);
									if($v_Killed){$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);}
								}else{
									$this->A_Log[]=array(
										'team'=>$v_TeamName,
										'turn'=>$this->A_TeamData['turn-counter'],
										'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and misses '.$v_DefendingMemberLogName.'.'
									);
								}
								return;
							case '':default:
								break;
						}
						break;
					case 'attack':
						if($this->f_Challenge('normal-attack',$a_Member,$a_DefendingMember,false)){
							$a_Damage=$this->f_GetDamage($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName,'physical');
							$this->A_Log[]=array(
								'team'=>$v_TeamName,
								'turn'=>$this->A_TeamData['turn-counter'],
								'text'=>$v_MemberLogName.$a_Damage['sneaking-text'].' attacks and hits '.$v_DefendingMemberLogName.'.'
							);
							$v_Killed=$this->f_DealDamageToPool($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'health',$a_Damage['value'],$a_Damage['type']);
							if(!empty($a_Member['abilities']['attack'])){
								$v_AttackName=$a_Member['abilities']['attack'];
								switch($v_AttackName){
									case 'Poison Tip':
										$v_Killed=$this->f_AddTemporaryCondition($v_DefendingTeamName,$v_DefendingMemberID,'Weak Poisoning',3);
										break;
									default:
										break;
								}
							}
							if($v_Killed){$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);}
						}else{
							$this->A_Log[]=array(
								'team'=>$v_TeamName,
								'turn'=>$this->A_TeamData['turn-counter'],
								'text'=>$v_MemberLogName.' attacks and misses '.$v_DefendingMemberLogName.'.'
							);
						}
						return;
						break;
					case 'magic':
						$v_SpellName=$a_Member['abilities'][$v_PerformanceName];
						$this->f_RemoveCostFromPool($v_TeamName,$v_MemberID,'mana',$a_Member[$v_PerformanceName]['mana-cost']);
						switch($v_SpellName){
							case 'Lesser Heal All':
								$this->A_Log[]=array(
									'team'=>$v_TeamName,
									'turn'=>$this->A_TeamData['turn-counter'],
									'text'=>$v_MemberLogName.' casts '.$v_SpellName.'.'
								);
								$this->f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,'health',0,1);
								return;
								break;
							case 'Fire Bolt':
								if($this->f_Challenge('normal-magic',$a_Member,$a_DefendingMember,false)){
									$a_Damage=$this->f_GetDamage($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName,'mental');
									$this->A_Log[]=array(
										'team'=>$v_TeamName,
										'turn'=>$this->A_TeamData['turn-counter'],
										'text'=>$v_MemberLogName.$a_Damage['sneaking-text'].' casts '.$v_SpellName.' and hits '.$v_DefendingMemberLogName.'.'
									);
									$v_Killed=$this->f_DealDamageToPool($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'health',$a_Damage['value'],$a_Damage['type']);
									if($v_Killed){$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);}
								}else{
									$this->A_Log[]=array(
										'team'=>$v_TeamName,
										'turn'=>$this->A_TeamData['turn-counter'],
										'text'=>$v_MemberLogName.' casts '.$v_SpellName.' and misses '.$v_DefendingMemberLogName.'.'
									);
								}
								return;
							case '':default:
								break;
						}
						break;
					case '':default:
						break;
				}
			}
		}
	}

	/* Function - Add Temporary Condition */
	function f_AddTemporaryCondition($v_TeamName,$v_MemberID,$v_ConditionName,$v_Duration){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$this->A_Teams[$v_TeamName][$v_MemberID]['conditions']['temporary'][]=array('name'=>$v_ConditionName,'duration'=>$v_Duration);
		$v_WithReturn=false;
		switch($v_ConditionName){
			case 'Knocked Down':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']-=2;
				break;
			case 'Afraid':
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=!$this->A_Teams[$v_TeamName][$v_MemberID]['retreating'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-speak']=false;
				break;
			case 'Battle Rage':$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']+=2;break;
			case 'Weak Poisoning':
				$v_WithReturn=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current-points']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current-points']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points'];
				}
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current-points']<1){$v_Return=true;}else{$v_Return=false;}
				break;
			case 'Partial Blindness':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']--;break;
			case '':default:
				break;
		}
		$this->A_Log[]=array(
			'team'=>'narrator-bold',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' has '.$v_ConditionName.'.'
		);
		if($v_WithReturn){return $v_Return;}
	}
	/* Function - Remove Temporary Condition */
	function f_RemoveTemporaryCondition($v_TeamName,$v_MemberID,$v_ConditionID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_ConditionName=$a_Member['conditions']['temporary'][$v_ConditionID]['name'];
		switch($v_ConditionName){
			case 'Knocked Down':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']+=2;
				break;
			case 'Afraid':
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=!$this->A_Teams[$v_TeamName][$v_MemberID]['retreating'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-speak']=$this->A_Teams[$v_TeamName][$v_MemberID]['communication']['can-speak'];
				break;
			case 'Battle Rage':$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']-=2;break;
			case 'Partial Blindness':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;break;
			case 'Weak Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points']++;break;
			case '':default:
				break;
		}
		unset($this->A_Teams[$v_TeamName][$v_MemberID]['conditions']['temporary'][$v_ConditionID]);
		$this->A_Log[]=array(
			'team'=>'narrator-bold',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' no longer has '.$v_ConditionName.'.'
		);
	}
	/* Function - Temporary Condition Check */
	function f_TemporaryConditionCheck($v_TeamName,$v_MemberID){
		if(!empty($this->A_Teams[$v_TeamName][$v_MemberID]['conditions']['temporary'])){
			foreach($this->A_Teams[$v_TeamName][$v_MemberID]['conditions']['temporary'] as $v_ConditionID=>$a_Condition){
				$this->A_Teams[$v_TeamName][$v_MemberID]['conditions']['temporary'][$v_ConditionID]['duration']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['conditions']['temporary'][$v_ConditionID]['duration']==0){
					$this->f_RemoveTemporaryCondition($v_TeamName,$v_MemberID,$v_ConditionID);
				}
			}
		}
	}

	/* Function - Regenerate */
	function f_Regenerate($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$this->f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,'health',1,$a_Member['health']['regeneration']);
		$this->f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,'stamina',1,$a_Member['stamina']['regeneration']);
		$this->f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,'mana',1,$a_Member['mana']['regeneration']);
	}

	/* Function - Set Cans */
	function f_SetCans($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-hear']=$this->A_Teams[$v_TeamName][$v_MemberID]['communication']['can-hear'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-speak']=$this->A_Teams[$v_TeamName][$v_MemberID]['communication']['can-speak'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-hide']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-hide'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-see'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-use-item']=$this->A_Teams[$v_TeamName][$v_MemberID]['use-item']['can-use-item'];
	}

	/* Function - Get Damage */
	function f_GetDamage($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName,$v_DamageName){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		$v_SneakingDamage=0;
		$v_RangeName=$this->f_GetRangeNameFromDistance($a_Member,$a_DefendingMember,$v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
		if(!in_array($v_MemberID,$a_DefendingMember['spotted'][$v_RangeName])){
			$v_SneakingDamage++;
			$v_SneakingText=' sneaks,';
		}else{
			$v_SneakingText='';
		}
		$v_Damage=$a_Member[$v_PerformanceName][$v_DamageName]['damage'];
		$v_DamageType=$a_Member[$v_PerformanceName][$v_DamageName]['damage-type'];
		$v_DamageAbsorption=$a_DefendingMember['defense']['resistance'][$v_DamageType]['absorption'];
		$v_DamageAmplification=$a_DefendingMember['defense']['resistance'][$v_DamageType]['amplification'];
		$v_Damage=$v_Damage+$v_DamageAmplification-$v_DamageAbsorption+$v_SneakingDamage;
		if($v_Damage<1){$v_Damage=1;}
		return array('value'=>$v_Damage,'type'=>$v_DamageType,'sneaking-text'=>$v_SneakingText,'range'=>$v_RangeName);
	}
	/* Function - Get Range Name From Distance */
	function f_GetRangeNameFromDistance($a_Member,$a_DefendingMember,$v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID){
		$v_MemberTile=$a_Member['location'];
		$v_DefendingMemberTile=$a_DefendingMember['location'];
		$v_Distance=abs($v_DefendingMemberTile-$v_MemberTile);
		switch($v_Distance){
			case 3:return 'distant';break;
			case 2:return 'long';break;
			case 1:return 'short';break;
			case 0:return 'close';break;
			default:$this->f_Debug($a_Member,$a_DefendingMember,$v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);break;
		}
	}
	/* Function - Get Total Weight */
	function f_GetTotalWeight($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_TotalWeight=0;
		switch($a_Member['defense']['behavior']){
			case 'protect-group':$v_TotalWeight+=10;break;
			case 'stay-back':break;
			case '':default:$v_TotalWeight+=5;break;
		}
		return $v_TotalWeight;
	}
	/* Function - Members Need More Points In Pool  */
	function f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,$v_PoolName,$v_Minimum=1,$v_Amount=0){
		$v_Tile=$this->A_Teams[$v_TeamName][$v_MemberID]['location'];
		$v_Total=0;
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			if($v_Tile==$a_Member['location']){
				if($a_Member[$v_PoolName]['current-points']<$a_Member[$v_PoolName]['maximum-points']){
					if($v_Amount>0){
						$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
						$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current-points']+=$v_Amount;
						$this->A_Log[]=array(
							'team'=>$v_TeamName.'-healing-bold',
							'turn'=>$this->A_TeamData['turn-counter'],
							'text'=>$v_MemberLogName.' has '.$v_Amount.' point'.(($v_Amount==1)?'':'s').' of '.$v_PoolName.' restored.'
						);
					}
					$v_Total++;
				}
			}
		}
		if($v_Total>=$v_Minimum){return true;}
		return false;
	}
	/* Function - Opposite */
	function f_Opposite($v_TeamName){return(($v_TeamName=='party')?'quest':'party');}
	/* Function - Sort Preferences */
	function f_SortPreferences($v_TeamName){foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){arsort($this->A_Teams[$v_TeamName][$v_MemberID]['preference']);}}
	/* Function - Reset Targets */
	function f_ResetTargets($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['targets']=array('action'=>array(),'attack'=>array(),'magic'=>array(),'use-item'=>array());
	}

	/* Function - Debug */
	function f_Debug($a_Member,$a_DefendingMember,$v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID){
		echo $v_TeamName.' ';
		foreach($a_Member as $v_Key=>$a_Value){
			switch($v_Key){
				case 'targets':
					print_r($a_Value);
					echo ' ::: ';
				case 'name':
					echo $a_Member['name'].' is at '.$a_Member['location'].'. ::: ';
					break;
				default:break;
			}
		}
		echo $v_DefendingTeamName.' ';
		foreach($this->A_Teams[$v_DefendingTeamName] as $v_QuestMemberID=>$a_QuestMember){echo $a_QuestMember['name'].' is at '.$a_QuestMember['location'].'. ::: ';}
		die();
	}




	
	
	
	
	/* Function - Add Member To Team */
	function f_AddMemberToTeam($v_TeamName,$a_Parameters){
		$v_MemberID=$a_Parameters[0];
		$v_Captain=$a_Parameters[1];
		$v_Tile=$a_Parameters[2];
		$v_NextKey=$this->A_TeamData[$v_TeamName]['next-key'];
		$this->A_TeamData[$v_TeamName]['next-key']++;
		$this->A_Teams[$v_TeamName][$v_NextKey]=$this->a_TestMemberData[$v_MemberID];
		$v_MemberID=$v_NextKey;
		$this->A_Teams[$v_TeamName][$v_MemberID]['location']=$v_Tile;
		$this->A_Log[]=array(
			'team'=>$v_TeamName,
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$this->A_Teams[$v_TeamName][$v_MemberID]['name'].' ['.$v_MemberID.'] has joined the '.$v_TeamName.' on tile '.$v_Tile.'.'
		);
		if($v_Captain){$this->f_Promote($v_TeamName,$v_MemberID);}
		$this->f_ApplyConditionsToMember($v_TeamName,$v_MemberID);
		$this->f_SetCans($v_TeamName,$v_MemberID);
		$this->A_TeamData[$v_TeamName]['total-members-added']++;
		$this->f_CheckEmptyStatus($v_TeamName);
	}
	/* Function - Check Empty Status */
	function f_CheckEmptyStatus($v_TeamName){
		$this->A_TeamData[$v_TeamName]['is-empty']=empty($this->A_Teams[$v_TeamName]);
		$this->A_Log[]=array(
			'team'=>'narrator',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>ucfirst($v_TeamName).' is'.(($this->A_TeamData[$v_TeamName]['is-empty'])?'':' not').' empty.'
		);
		if($this->A_TeamData['party']['is-empty']){$this->A_TeamData['quest-has-won']=true;}
	}
	/* Function - Look Around */
	function f_LookAround2($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_RangeOfView=$a_Member['move']['range-of-view'];
		$v_Tile=$a_Member['location'];
		$a_OthersInView=array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array());
		$v_TotalInView=0;
		switch($v_RangeOfView){
			case 3:$a_OthersInView['distant']=$this->f_SpotTile($v_TeamName,$v_MemberID,'distant',$v_Tile,3);$v_TotalInView+=count($a_OthersInView['distant']);
			case 2:$a_OthersInView['long']=$this->f_SpotTile($v_TeamName,$v_MemberID,'long',$v_Tile,2);$v_TotalInView+=count($a_OthersInView['long']);
			case 1:$a_OthersInView['short']=$this->f_SpotTile($v_TeamName,$v_MemberID,'short',$v_Tile,1);$v_TotalInView+=count($a_OthersInView['short']);
			case 0:default:$a_OthersInView['close']=$this->f_SpotTile($v_TeamName,$v_MemberID,'close',$v_Tile,0);$v_TotalInView+=count($a_OthersInView['close']);
				break;
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['visible-members']=$a_OthersInView;
		$this->A_Teams[$v_TeamName][$v_MemberID]['visible-member-total']=$v_TotalInView;
	}
	/* Function - Remove Member From Team */
	function f_RemoveMemberFromTeam($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$this->A_Log[]=array(
			'team'=>'narrator-bold',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' has left the '.$v_TeamName.'.'
		);
		unset($this->A_Teams[$v_TeamName][$v_MemberID]);
		$this->f_CheckEmptyStatus($v_TeamName);
		if($v_TeamName=='quest'){$this->A_Quest['opposing-members-left']--;}
	}
	/* Function - Spot Tile */
	function f_SpotTile($v_TeamName,$v_MemberID,$v_RangeName,$v_Tile,$v_DistanceFromTile){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);

		$a_OthersInRange=array();
		if(!$this->A_TeamData[$v_TeamName]['is-empty']){
			if($v_DistanceFromTile>0){$a_Tiles=array($v_Tile-$v_DistanceFromTile,$v_Tile+$v_DistanceFromTile);}else{$a_Tiles=array($v_Tile);}
			$this->A_Log[]=array('team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' looks around ('.$v_RangeName.' range).');
			foreach($this->A_Teams[$v_DefendingTeamName] as $v_DefendingMemberID=>$a_DefendingMember){
				$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
				foreach($a_Tiles as $v_Key=>$v_Tile){
					if($v_Tile==$a_DefendingMember['location']){
						if($this->f_Challenge($a_Member['move']['spot'],$a_Member,$a_DefendingMember,$v_RangeName)){
							$a_OthersInRange[]=$v_DefendingMemberID;
							$this->A_Log[]=array('team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' spots '.$v_DefendingMemberLogName.' on tile '.$v_Tile.'.');
						}
					}
				}
			}
		}
		return $a_OthersInRange;
	}


	private $a_DefaultMemberData=array(
		'id'=>0,
		'guild'=>'',
		'location'=>0,
		'name'=>'',
		'preference'=>array('action'=>15,'magic'=>10,'use-item'=>5,'attack'=>0),
		'range-preference'=>array('close'=>15,'short'=>10,'long'=>5,'distant'=>0),
		'preferred-targets'=>array(),
		'skills'=>array('hearing'=>0,'speech'=>0,'stealth'=>0,'vision'=>0),
		'spotted'=>array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array()),
		'spotted-total'=>0,
		'targets'=>array('action'=>array(),'attack'=>array(),'magic'=>array(),'use-item'=>array()),

		'captain'=>false,
		'health'=>array('current-points'=>1,'maximum-points'=>1,'regeneration'=>0),
		'mana'=>array('current-points'=>0,'maximum-points'=>0,'regeneration'=>0),
		'stamina'=>array('current-points'=>1,'maximum-points'=>1,'regeneration'=>0),
		'next-performance'=>'',
		'retreating'=>false,
		'visible-members'=>array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array()),
		'visible-member-total'=>0,
		'can-action'=>false,'can-attack'=>false,'can-magic'=>false,'can-hear'=>false,'can-hide'=>false,'can-move'=>false,'can-speak'=>false,'can-see'=>false,'can-use-item'=>false,
		'communication'=>array('can-speak'=>false,'speech'=>0,'can-hear'=>true,'hearing'=>0,'known-languages'=>array(''),'spoken-language'=>''),

		'action'=>array('can-action'=>false,'behavior'=>'act-at-will','close'=>false,'short'=>false,'long'=>false,'distant'=>false,'deal-damage'=>false,'stamina-cost'=>0,'attacker'=>'','defender'=>'','has-target'=>false,'text'=>'','re-use-timer'=>0,'re-use'=>0,'natural'=>array('accuracy'=>0,'damage'=>0,'damage-type'=>'blunt'),'description'=>''),

		'attack'=>array('can-attack'=>false,'behavior'=>'attack-at-will','close'=>false,'short'=>false,'long'=>false,'distant'=>false,'deal-damage'=>true,'has-target'=>true,'physical'=>array('accuracy'=>0,'damage'=>0,'damage-type'=>'blunt')),

		'magic'=>array('can-magic'=>false,'behavior'=>'cast-at-will','close'=>false,'short'=>false,'long'=>false,'distant'=>false,'deal-damage'=>false,'mana-cost'=>0,'attacker'=>'','defender'=>'','has-target'=>false,'text'=>'','re-use-timer'=>0,'re-use'=>0,'mental'=>array('accuracy'=>0,'damage'=>0,'damage-type'=>'blunt'),'description'=>''),

		'defense'=>array('behavior'=>'','block'=>0,'dodge'=>0,'parry'=>0,'resistance'=>array('blunt'=>array('absorption'=>0,'amplification'=>0),'cold'=>array('absorption'=>0,'amplification'=>0),'electrical'=>array('absorption'=>0,'amplification'=>0),'heat'=>array('absorption'=>0,'amplification'=>0),'piercing'=>array('absorption'=>0,'amplification'=>0),'slashing'=>array('absorption'=>0,'amplification'=>0))),

		'move'=>array('can-move'=>true,'can-hide'=>true,'can-see'=>true,'behavior'=>'move-at-will','distance'=>0,'initiative'=>0,'range-of-view'=>0,'spot'=>'normal-spot','stealth'=>0,'vision'=>0),

		'use-item'=>array('can-use-item'=>true,'has-target'=>true,'close'=>false,'short'=>false,'long'=>false,'distant'=>false),

		'conditions'=>array('base'=>array(),'action'=>array(),'attack'=>array(),'defense'=>array(),'magic'=>array(),'move'=>array(),'temporary'=>array()),
		'items'=>array(
			'base'=>array('fingers'=>'','neck'=>''),
			'attack'=>array('left-hand'=>'','right-hand'=>''),
			'defense'=>array('legs'=>'','torso'=>'','hands'=>'','head'=>''),
			'move'=>array('face'=>'','feet'=>'','waist'=>'')
		),
		'target'=>array('close'=>-1,'short'=>-1,'long'=>-1,'distant'=>-1),
		'next-range'=>''
	);
	private $A_Party=array(
		'current-goal'=>1,
		'goals'=>array()
	);
	private $A_TeamData=array(
		'party'=>array(
			'captain-id'=>-1,
			'data'=>array(),
			'is-empty'=>true,
			'next-key'=>0,
			'total-members-added'=>0
		),
		'party-has-won'=>false,
		'quest'=>array(
			'captain-id'=>-1,
			'data'=>array(),
			'is-empty'=>true,
			'next-key'=>0,
			'total-members-added'=>0
		),
		'quest-has-won'=>false,
		'turn-counter'=>0
	);
	private $A_Teams=array(
		'party'=>array(),
		'quest'=>array()
	);

	private $V_QuestID=1;

	/* Function - Apply Conditions To Member */
	function f_ApplyConditionsToMember($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';

		/* Items - Defense */
		foreach($a_Member['items']['defense'] as $v_ItemSlot=>$v_ItemName){
			if($v_ItemName!==''){
				$this->A_Log[]=array(
					'team'=>'narrator',
					'turn'=>$this->A_TeamData['turn-counter'],
					'text'=>$v_MemberLogName.' equips '.$v_ItemName.'.'
				);
			}
			switch($v_ItemName){
				case 'Toughened Carapace':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['blunt']['absorption']++;
					break;
				case 'Very Hard Carapace':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
				case 'Hard Carapace':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
				case 'Shining Plate':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['piercing']['absorption']++;
				case 'Leather Tunic':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['slashing']['absorption']++;
				case 'Bronze Plate':case 'Cloth Shirt':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['blunt']['absorption']++;
					break;
				case 'Shining Greaves':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['blunt']['absorption']++;
				case 'Bronze Leggings':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
					break;
				case 'Multiple Legs':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']+=4;
					break;
				case 'Shining Helm':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['piercing']['absorption']++;
					break;
				case 'Shining Gauntlets':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['slashing']['absorption']++;
					break;
				case '':default:
					break;
			}
		}
		/* Items - Base */
		foreach($a_Member['items']['base'] as $v_ItemSlot=>$v_ItemName){
			if($v_ItemName!==''){
				$this->A_Log[]=array(
					'team'=>'narrator',
					'turn'=>$this->A_TeamData['turn-counter'],
					'text'=>$v_MemberLogName.' equips '.$v_ItemName.'.'
				);
			}
			switch($v_ItemName){
				case 'Ring Of Stamina':
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points']++;
					break;
				case 'Platinum Necklace':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']++;
					break;
				case '':default:
					break;
			}
		}
		/* Items - Move */
		foreach($a_Member['items']['move'] as $v_ItemSlot=>$v_ItemName){
			if($v_ItemName!==''){
				$this->A_Log[]=array(
					'team'=>'narrator',
					'turn'=>$this->A_TeamData['turn-counter'],
					'text'=>$v_MemberLogName.' equips '.$v_ItemName.'.'
				);
			}
			switch($v_ItemName){
				case 'Lancing Girdle':
					if(in_array('Lance Jab',$this->A_Teams[$v_TeamName][$v_MemberID]['abilities'])){
						$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use']--;
					}
					break;
				case 'Spider Eyes':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']+=7;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['range-of-view']+=2;
				case 'Pair Of Glasses':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;
					break;
				case 'Fur-Lined Boots':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['cold']['absorption']++;
					break;
				case 'Platinum Belt':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']++;
					break;
				case '':default:
					break;
			}
		}
		/* Items - Attack */
		foreach($a_Member['items']['attack'] as $v_ItemSlot=>$v_ItemName){
			if($v_ItemName!==''){
				$this->A_Log[]=array(
					'team'=>'narrator',
					'turn'=>$this->A_TeamData['turn-counter'],
					'text'=>$v_MemberLogName.' equips '.$v_ItemName.'.'
				);
			}
			switch($v_ItemName){
				// Shields
				case 'Thousand Soul Shield':
					if(in_array('War Cry',$this->A_Teams[$v_TeamName][$v_MemberID]['abilities'])){$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use']--;}
				case 'Steel Shield':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
				case 'Iron Shield':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
				case 'Bronze Shield':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
					break;

				// Piercing
				case 'Oak Shortbow':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Oak Longbow':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Steel Lance':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Iron Lance':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Cedar Shortbow':case 'Iron Lance':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Bronze Lance':case 'Cedar Lonbow':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage-type']='piercing';
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['short']=true;
					switch($v_ItemName){
						case 'Bronze Lance':case 'Iron Lance':case 'Steel Lance':$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['close']=true;break;
						case 'Cedar Lonbow':case 'Oak Longbow':$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['long']=true;break;
						case '':default:
							break;
					}
					break;
				case 'Poison-Tipped Dagger':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['abilities']['attack']='Poison Tip';
				case 'Sharp Fangs':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage']++;
				case 'Curved Dagger':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Bronze Dagger':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Fangs':case 'Claws':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage-type']='piercing';
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['close']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack']=true;
					break;
				// Blunt
				case 'Half-Rock Sling':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage-type']='blunt';
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['short']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack']=true;
					break;
				case 'Stalagmite':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Oak Staff':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage']++;
				case 'Cedar Staff':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage-type']='blunt';
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['close']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack']=true;
					break;
				// Slashing
				case 'Steel Longsword':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Iron Longsword':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Bronze Longsword':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
				case 'Claws':case 'Crude Longsword':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['damage-type']='slashing';
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['close']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack']=true;
					break;
				case '':default:
					break;
			}
		}
		/* General */
		foreach($a_Member['general'] as $v_ConditionType=>$v_ConditionName){
			switch($v_ConditionName){
				/* Guild */
				case 'Fighter':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['hearing']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']+=2;
					break;
				case 'Ranger':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['stealth']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']+=3;
					break;
				case 'Rogue':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['stealth']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']+=2;
					break;
				case 'Cleric':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['hearing']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['speech']++;
					break;
				case 'Wizard':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['speech']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']++;
					break;

				/* Race */
				case 'Goblin':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']++;
				case 'Human':
					if($v_ConditionName=='Human'){$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['speech']++;}
					$this->A_Teams[$v_TeamName][$v_MemberID]['use-item']['can-use-item']=true;
				case 'Bat':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']++;
				case 'Dog':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['range-of-view']++;
				case 'Bear':case 'Rat':case 'Spider':
					$this->A_Teams[$v_TeamName][$v_MemberID]['communication']['can-speak']=true;
					break;
				case 'Troll':
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['regeneration']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['use-item']['can-use-item']=true;
					break;

				/* Size */
				case 'Very Large':
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-hide']=false;
					break;
				case 'Large':
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points']+=2;
					break;
				case 'Average':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['stealth']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points']++;
					break;
				case 'Small':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['stealth']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points']++;
					break;
				case 'Very Small':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['stealth']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['initiative']++;
					break;

				/* Default */
				case '':default:
					break;
			}
		}
		
		/* Training */
		foreach($a_Member['training'] as $v_ConditionType=>$v_ConditionName){
			switch($v_ConditionName){
				/* Action */
				case 'Basic Endurance':
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points']++;
					break;
				case 'Basic Tracking':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['range-of-view']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;
					break;

				/* Attack */
				case 'Basic Melee Weapons':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['parry']++;
					break;
				case 'Basic Ranged Weapons':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['physical']['accuracy']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['vision']++;
					break;

				/* Defense */
				case 'Basic Blocking':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']+=2;
					break;
				case 'Basic Defense':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']++;
					break;
				case 'Basic Dodging':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['dodge']+=2;
					break;
				case 'Basic Protection':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['blunt']['absorption']++;
					break;

				/* Magic */
				case 'Basic Incantations':
					$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['maximum-points']++;
					break;

				/* Move */
				case 'Advanced Mobility':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['distance']++;
				case 'Basic Mobility':
					$this->A_Teams[$v_TeamName][$v_MemberID]['move']['distance']++;
					break;

				/* Default */
				case '':default:
					break;
			}
		}
		
		/* Abilities */
		foreach($a_Member['abilities'] as $v_ConditionType=>$v_ConditionName){
			switch($v_ConditionName){
				/* Action */
				case 'Assassinate':
				case 'Charm Animal':
				case 'Fling Rocks':
				case 'Lance Jab':
				case 'Poison Spit':
				case 'Precise Shot':
				case 'Strong Swipe':
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['has-target']=true;
					/* Damage */
					switch($v_ConditionName){
						case 'Assassinate':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['natural']['damage']++;
						case 'Strong Swipe':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['natural']['damage']++;
						case 'Fling Rocks':case 'Lance Jab':case 'Precise Shot':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['natural']['damage']++;
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['deal-damage']=true;
							break;
						case '':default:
							break;
					}
					/* Damage Type */
					switch($v_ConditionName){
						case 'Assassinate':case 'Lance Jab':case 'Precise Shot':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['natural']['damage-type']='piercing';
							break;
						case 'Strong Swipe':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['natural']['damage-type']='slashing';
							break;
						case '':default:
							break;
					}
				case 'Fierce Growl':
				case 'Ground Pound':
				case 'War Cry':
				case 'Throw Dirt':
					/* Range */
					switch($v_ConditionName){
						case 'Precise Shot':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['long']=true;
						case 'Fling Rocks':case 'Poison Spit':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['short']=true;
							break;
						case 'Lance Jab':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['short']=true;
						case 'Assassinate':case 'Charm Animal':case 'Fierce Growl':case 'Ground Pound':case 'Strong Swipe':case 'Throw Dirt':case 'War Cry':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['close']=true;
							break;
						case '':default:
							break;
					}
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['stamina-cost']=1;
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use-timer']=0;
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use']=3;
					/* Re-Use / Re-Use Timer */
					switch($v_ConditionName){
						case 'Assassinate':$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use']=6;break;
						case 'Lance Jab':$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use']=4;break;
						case '':default:
							break;
					}
					/* Attack / Defense */
					switch($v_ConditionName){
						case 'Ground Pound':case 'Throw Dirt':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['attacker']='can-action';
							break;
						case 'Assassinate':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['attacker']='sneaking';
							break;
						case 'Fling Rocks':case 'Precise Shot':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['attacker']='greater-accuracy';
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['defender']='normal-defend';
							break;
						case 'Fierce Growl':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['defender']='can-hear';
						case 'War Cry':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['attacker']='can-speak';
							break;
						case 'Lance Jab':case 'Poison Spit':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['attacker']='lesser-accuracy';
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['defender']='normal-defend';
							break;
						case 'Strong Swipe':
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['attacker']='normal-accuracy';
							$this->A_Teams[$v_TeamName][$v_MemberID]['action']['defender']='normal-defend';
							break;
						case '':default:
							break;
					}
					break;
				
				/* Attack */
				case 'Poison Tip':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['on-hit']=true;
					break;

				/* Magic */
				case 'Fire Bolt':
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['deal-damage']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['mental']['damage']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['mental']['damage-type']='heat';
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['has-target']=true;
				case 'Lesser Heal All':
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['mana-cost']=1;
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['re-use-timer']=0;
					$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['re-use']=3;
					/* Range */
					switch($v_ConditionName){
						case 'Fire Bolt':
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['distant']=true;
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['long']=true;
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['short']=true;
							break;
						case 'Lesser Heal All':
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['close']=true;
							break;
						case '':default:
							break;
					}
					/* Attack / Defense */
					switch($v_ConditionName){
						case 'Fire Bolt':
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['attacker']='normal-accuracy';
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['defender']='normal-defend';
							break;
						case 'Lesser Heal All':
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['attacker']='can-magic';
							$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['defender']='';
							break;
						case '':default:
							break;
					}
					break;

				/* Default */
				case '':default:
					break;
			}
		}

		$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current-points']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['maximum-points'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['current-points']=$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['maximum-points'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['current-points']=$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['maximum-points'];
	}
	
	function f_CheckGoal($v_TeamName){
		$v_Pass=false;
		switch($this->A_Party['goals'][$this->A_Party['current-goal']]){
			case 'no-opposing-members-left':
				if($this->A_Quest['opposing-members-left']<1){
					$v_Pass=true;
					$this->A_Log[]=array('team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>'All opposing members have been defeated.');
				}
				break;
			case 'one-reached-end':
				foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
					$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
					if($a_Member['location']==$this->A_Quest['length-of-path']){
						$v_Pass=true;
						$this->A_Log[]=array('team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has reached the end.');
					}
				}
				break;
			case 'one-reached-exit':
				foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
					$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
					if($a_Member['location']==1){
						$v_Pass=true;
						$this->A_Log[]=array('team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has reached the exit.');
					}
				}
				break;
			default:
				break;
		}
		if($v_Pass){$this->A_Party['current-goal']++;}
		if($this->A_Party['current-goal']>count($this->A_Party['goals'])){$this->A_TeamData['party-has-won']=true;}
	}
	function f_CheckTriggers($v_TeamName){
		foreach($this->A_Quest['triggered-events'] as $v_Key=>$a_Event){
			if(!$a_Event['triggered']){
				$v_PerformEvent=false;
				switch($a_Event['trigger']['name']){
					case 'one-at-location':
						foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
							$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
							if($a_Member['location']==$a_Event['trigger']['value']){$v_PerformEvent=true;}
						}
						break;
					case 'retreating-one-at-location':
						foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
							$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
							if($a_Member['location']==$a_Event['trigger']['value']){
								if($this->A_Teams[$v_TeamName][$v_MemberID]['retreating']){
									$v_PerformEvent=true;
									$this->A_Log[]=array('team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' screams like a little girl when the dead fisherman comes to life.');
								}else{
									$this->A_Log[]=array('team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' notices a dead fisherman.');
								}
							}
						}
						break;
					case 'turns-have-passed':
						if($this->A_TeamData['turn-counter']>=$a_Event['trigger']['value']){
							$v_PerformEvent=true;
						}
						break;
					default:break;
				}
				if($v_PerformEvent){
					$this->A_Quest['triggered-events'][$v_Key]['triggered']=true;
					switch($a_Event['event']['name']){
						case 'add-member':
							$this->f_AddMemberToTeam('quest',array($a_Event['event']['value'],false,1));
							break;
						case 'add-member-ambush':
							$this->f_AddMemberToTeam('quest',array($a_Event['event']['value'],false,$this->f_GetTileWithMemberNearEnd('party')));
							break;
						default:break;
					}
				}
			}
		}
	}
	function f_GetTileWithMemberNearEnd($v_TeamName){
		$v_Tile=1;
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($a_Member['location']>$v_Tile){$v_Tile=$a_Member['location'];}}
		return $v_Tile;
	}
	function f_GetTargetFromView($v_TeamName,$v_MemberID,$v_RangeName,$a_MembersInView){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		$a_Weights=array();
		foreach($a_MembersInView as $v_Key=>$v_DefendingMemberID){
			$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
			$a_Weights[$v_DefendingMemberID]=10;
			switch($a_DefendingMember['defense']['behavior']){
				case 'stay-back':$a_Weights[$v_DefendingMemberID]-=5;break;
				case 'protect-group':$a_Weights[$v_DefendingMemberID]+=10;break;
				case '':default:
					break;
			}
		}
		krsort($a_Weights);
		return key($a_Weights);
	}
	function f_LoadMemberData(){
		$this->a_TestMemberData=array();
		$a_TestMembers=$this->A_TestMembers;
		foreach($a_TestMembers as $v_TestMemberID=>$a_DataToModify){
			//$a_DefaultMemberData=$this->a_DefaultMemberData;
			$a_TestMemberData=$this->a_Mercenary;
			foreach($a_DataToModify as $v_DataKey=>$v_Data){
				if(is_array($v_Data)){
					foreach($v_Data as $v_SecondDataKey=>$v_SecondData){
						$a_TestMemberData[$v_DataKey][$v_SecondDataKey]=$v_SecondData;
					}
				}else{
					$a_TestMemberData[$v_DataKey]=$v_Data;
				}
			}
			$this->a_TestMemberData[$v_TestMemberID]=$a_TestMemberData;
		}
	}
	function f_ConstructTeam($v_TeamName){
		switch($v_TeamName){
			case 'Cleric':case 'Fighter':case 'Ranger':case 'Rogue':case 'Wizard':
				$this->A_Teams[$v_TeamName]=array();
				$this->f_LoadTeam($v_TeamName);
				break;
			case 'party':case 'quest':
				$this->A_Teams[$v_TeamName]=array();
				$this->A_Log[]=array('team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>ucfirst($v_TeamName).' constructed.');
				$this->f_LoadTeam($v_TeamName);
				$this->A_Log[]=array('team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>ucfirst($v_TeamName).' gathered.');
				$this->f_CheckEmptyStatus($v_TeamName);
				break;
			default:
				$this->A_Log[]=array('team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>'Error - "'.$v_TeamName.'" is not an acceptable team name.');
				break;
		}
	}
	function f_LoadTeam($v_TeamName){
		$v_Equip=true;
		switch($v_TeamName){
			case 'Cleric':case 'Fighter':case 'Ranger':case 'Rogue':case 'Wizard':
				$this->A_TeamData[$v_TeamName]=array('captain-id'=>-1,'data'=>array(),'is-empty'=>true,'next-key'=>0,'total-members-added'=>0);
				$this->A_TeamData[$v_TeamName]['data']=array();
				foreach($this->A_TestMembers as $v_MemberID=>$a_Member){
					if($a_Member['guild']==$v_TeamName){$this->A_TeamData[$v_TeamName]['data'][]=array($v_MemberID,false,1);}
				}
				$v_Equip=false;
				break;
			case 'party':
				$this->A_TeamData[$v_TeamName]['data']=array(
					0=>array(0,true,1),
					1=>array(1,false,1),
					2=>array(17,false,1)
				);
				foreach($this->A_Quest['starting-player-data'] as $v_Key=>$a_Member){
					$this->A_TeamData[$v_TeamName]['data'][]=$a_Member;
				}
				break;
			case 'quest':
				$this->A_TeamData[$v_TeamName]['data']=$this->A_Quest['starting-data'];
				break;
			default:
				return;
				break;
		}
		foreach($this->A_TeamData[$v_TeamName]['data'] as $v_Key=>$a_Parameters){$this->f_AddMemberToTeam($v_TeamName,$a_Parameters);}
	}
	function f_Challenge($v_Type,$a_Attacker,$a_Defender,$a_Optional){
		$v_AttackTotal=0;
		$v_DefendTotal=0;
		switch($v_Type){
			case 'normal-magic':
				switch($a_Attacker['magic']['attacker']){
					case 'can-magic':return $a_Attacker['can-magic'];break;
					case 'normal-accuracy':case 'greater-accuracy':
						$v_AttackTotal=$a_Attacker['magic']['mental']['accuracy'];
						switch($a_Attacker['magic']['attacker']){
							case 'greater-accuracy':$v_AttackTotal+=2;break;
							case '':default:
								break;
						}
						break;
					case '':default:
						break;
				}
				switch($a_Attacker['action']['defender']){
					case 'normal-defend':case 'greater-defend':
						$v_DefendTotal=$a_Defender['defense']['block']+$a_Defender['defense']['dodge'];
						if($a_Attacker['magic']['defender']=='greater-defend'){$v_DefendTotal+=2;}
						break;
					case '':default:
						break;
				}
				break;
			case 'normal-action':
				switch($a_Attacker['action']['attacker']){
					case 'normal-accuracy':case 'greater-accuracy':
						$v_AttackTotal=$a_Attacker['attack']['physical']['accuracy'];
						switch($a_Attacker['magic']['attacker']){
							case 'lesser-accuracy':$v_AttackTotal-=2;break;
							case 'greater-accuracy':$v_AttackTotal+=2;break;
							case '':default:
								break;
						}
						if($v_AttackTotal<=0){$v_AttackTotal=0;}
						break;
					case 'can-speak':return $a_Attacker['can-speak'];break;
					case 'can-action':return $a_Attacker['can-action'];break;
					case 'sneaking':if(!in_array($a_Optional['member-ID'],$a_Defender['spotted'][$a_Optional['range']])){return true;}else{return false;}break;
					case '':default:
						break;
				}
				switch($a_Attacker['action']['defender']){
					case 'normal-defend':case 'greater-defend':
						$v_DefendTotal=$a_Defender['defense']['block']+$a_Defender['defense']['dodge'];
						if($a_Attacker['action']['defender']=='greater-defend'){$v_DefendTotal+=2;}
						break;
					case '':default:
						break;
				}
				break;
			case 'normal-attack':
				$v_AttackTotal=$a_Attacker['attack']['physical']['accuracy'];
				$v_DefendTotal=$a_Defender['defense']['block']+$a_Defender['defense']['dodge'];
				break;
			case 'normal-speak':
				if(!$a_Attacker['can-speak']||!$a_Defender['can-hear']){return false;}
				$v_AttackTotal=$a_Attacker['skills']['speech']+$a_Defender['skills']['hearing'];
				break;
			case 'normal-spot':
				if(!$a_Attacker['can-see']){return false;}elseif(!$a_Defender['can-hide']){return true;}
				$v_AttackTotal=$a_Attacker['skills']['vision'];
				$v_DefendTotal=$a_Defender['skills']['stealth'];
				switch($a_Optional){
					case 'distant':$v_DefendTotal+=5;break;
					case 'long':$v_DefendTotal+=2;break;
					case 'short':$v_AttackTotal+=2;break;
					case 'close':default:$v_AttackTotal+=5;break;
				}
				break;
			default:
				break;
		}
		$v_AttackChance=rand(0,50+($v_AttackTotal*5));
		$v_DefendChance=rand(0,50+($v_DefendTotal*5));
		return $v_AttackChance>=$v_DefendChance;
	}
	function f_AddInformedMembers($v_TeamName,$v_MemberID,$v_FriendlyMemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.']';
		$a_FriendlyMember=$this->A_Teams[$v_TeamName][$v_FriendlyMemberID];
		$v_FriendlyMemberLogName=$a_FriendlyMember['name'].' ['.$v_FriendlyMemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['visible-members'] as $v_RangeName=>$a_MembersInView){
			if(!empty($a_MembersInView)){
				foreach($a_MembersInView as $v_Key=>$v_DefendingMemberID){
					if(!in_array($v_DefendingMemberID,$this->A_Teams[$v_TeamName][$v_FriendlyMemberID]['visible-members'][$v_RangeName])){
						$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
						$v_DefendingMemberLogName=$a_DefendingMember['name'].' ['.$v_DefendingMemberID.']';
						$this->A_Teams[$v_TeamName][$v_FriendlyMemberID]['visible-members'][$v_RangeName][]=$v_DefendingMemberID;
						$this->A_Log[]=array('team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' informs '.$v_FriendlyMemberLogName.' about '.$v_DefendingMemberLogName.' on tile '.$a_DefendingMember['location'].'.');
					}
				}
			}
		}
	}
	function f_InformTeam($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if($a_Member['visible-member-total']<=0){return;}
		$v_Language=$this->A_Teams[$v_TeamName][$v_MemberID]['communication']['spoken-language'];
		foreach($this->A_Teams[$v_TeamName] as $v_FriendlyMemberID=>$a_FriendlyMember){
			if($v_MemberID!==$v_FriendlyMemberID){
				if($a_Member['location']==$a_FriendlyMember['location']){
					if($this->f_Challenge('normal-speak',$a_Member,$a_FriendlyMember,false)){
						if(in_array($v_Language,$a_FriendlyMember['communication']['known-languages'])){
							$this->f_AddInformedMembers($v_TeamName,$v_MemberID,$v_FriendlyMemberID);
						}
					}
				}
			}
		}
	}
	function f_Promote($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['captain']=true;
		$this->A_TeamData[$v_TeamName]['captain-id']=$v_MemberID;
		$this->A_Log[]=array('team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$this->A_Teams[$v_TeamName][$v_MemberID]['name'].' ['.$v_MemberID.'] has been promoted to captain.');
	}
	function f_SortByInitiative(){
		$a_Initiative=array();
		foreach($this->A_Teams as $v_TeamName=>$a_Team){
			foreach($a_Team as $v_MemberID=>$a_Member){
				$v_Initiative=$a_Member['move']['initiative'];
				if(!array_key_exists($v_Initiative,$a_Initiative)){$a_Initiative[$v_Initiative]=array();}
				$a_Initiative[$v_Initiative][]=array('id'=>$v_MemberID,'team'=>$v_TeamName);
			}
		}
		krsort($a_Initiative);
		return $a_Initiative;
	}

	function f_GetTime(){
		if($this->A_Quest['preset-finish']>0){
			$v_TotalSeconds=$this->A_Quest['preset-finish'];
		}else{
			$v_TotalSeconds=$this->A_TeamData['turn-counter']*(($this->A_Quest['minutes-per-turn']*60)+$this->A_Quest['seconds-per-turn']);
		}
		$v_FailSafeCounter=0;
		$a_TimeInWords=array(
			'day'=>0,
			'hour'=>0,
			'minute'=>0
		);
		while($v_TotalSeconds>0){
			if($v_TotalSeconds>=60){
				// At least one minute
				if($v_TotalSeconds>=60*60){
					// At least one hour
					if($v_TotalSeconds>=60*60*24){
						// At least one day
						$a_TimeInWords['day']++;
						$v_TotalSeconds-=60*60*24;
					}else{
						$a_TimeInWords['hour']++;
						$v_TotalSeconds-=60*60;
					}
				}else{
					$a_TimeInWords['minute']++;
					$v_TotalSeconds-=60;
				}
			}else{
				$v_TotalSeconds=0;
			}

			$v_FailSafeCounter++;
			if($v_FailSafeCounter>100){$v_TotalSeconds=0;}
		}
		$v_TimeInWords='';
		foreach($a_TimeInWords as $v_Word=>$v_Value){
			if($v_Value>0){
				if($v_TimeInWords!==''){$v_TimeInWords.=', ';}
				if($v_Value>1){$v_Word.='s';}
				$v_TimeInWords.=$v_Value.' '.$v_Word;
			}
		}
		return $v_TimeInWords;
	}


	private $A_Quest=array();
	
	private $A_TestQuestData=array(
		1=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'one-reached-exit'
			),
			'opposing-members-left'=>2,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
				0=>array(14,false,5),
				1=>array(15,false,8)
			),
			'ID'=>1,
			'name'=>'Steps Into Darkness',
			'description'=>'Scout the first level of the dungeon.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>10,
			'maximum-turns-fail-safe'=>40,
			'minutes-per-turn'=>0,
			'seconds-per-turn'=>30,
			'preset-finish'=>300
		),
		2=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>3,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(
				0=>array(0,false,1),
				1=>array(0,false,1)
			),
			'starting-data'=>array(
			),
			'ID'=>2,
			'name'=>'A Call To Arms',
			'description'=>'Eliminate all brigands in the Blackbark Woods.',
			'image'=>3,
			'triggered-events'=>array(
				0=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>16,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>9),
					'triggered'=>false
				),
				1=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>16,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>9),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>16,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>9),
					'triggered'=>false
				)
			),
			'length-of-path'=>20,
			'maximum-turns-fail-safe'=>80,
			'minutes-per-turn'=>0,
			'seconds-per-turn'=>20,
			'preset-finish'=>0
		),
		3=>array(
			'minimum-team-size'=>4,
			'maximum-team-size'=>4,
			'maximum-team-size-with-others'=>6,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				2=>'one-reached-exit'
			),
			'opposing-members-left'=>6,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(
				0=>array(0,false,1)
			),
			'starting-data'=>array(
			),
			'ID'=>3,
			'name'=>'Wanderlust',
			'description'=>'Eliminate the creatures in the old castle prison and search for the body of the missing prison guard.',
			'image'=>2,
			'triggered-events'=>array(
				0=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>18,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				),
				1=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>18,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>14,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				),
				3=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>18,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>24),
					'triggered'=>false
				),
				4=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>19,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>24),
					'triggered'=>false
				),
				5=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>20,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>24),
					'triggered'=>false
				)
			),
			'length-of-path'=>25,
			'maximum-turns-fail-safe'=>90,
			'minutes-per-turn'=>0,
			'seconds-per-turn'=>20,
			'preset-finish'=>0
		),
		12=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>1,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(),
			'starting-data'=>array(),
			'ID'=>12,
			'name'=>'Quest I - Part I',
			'description'=>'An unpleasant passing. You must kill 1 Drowned Fisherman to complete this quest.',
			'image'=>4,
			'triggered-events'=>array(
				0=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>7,'optional'=>true),
					'trigger'=>array('name'=>'retreating-one-at-location','value'=>10),
					'triggered'=>false
				)
			),
			'length-of-path'=>20,
			'maximum-turns-fail-safe'=>80,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		13=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>9,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(),
			'starting-data'=>array(),
			'ID'=>13,
			'name'=>'Actions, Magics and Attacks, Oh My!',
			'description'=>'Your party will be ambushed! You must kill 9 Goblin Slingers and Goblin Skirmishers to complete this quest.',
			'image'=>5,
			'triggered-events'=>array(
				0=>array(
					'event'=>array('name'=>'add-member','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>1),
					'triggered'=>false
				),
				1=>array(
					'event'=>array('name'=>'add-member','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>2),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>2),
					'triggered'=>false
				),
				3=>array(
					'event'=>array('name'=>'add-member','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>6),
					'triggered'=>false
				),
				4=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>12),
					'triggered'=>false
				),
				5=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>12),
					'triggered'=>false
				),
				6=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>12),
					'triggered'=>false
				),
				7=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>12),
					'triggered'=>false
				),
				8=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>12),
					'triggered'=>false
				)
			),
			'length-of-path'=>20,
			'maximum-turns-fail-safe'=>120,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		14=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>1,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(),
			'starting-data'=>array(
				0=>array(8,false,5)
			),
			'ID'=>14,
			'name'=>'One Mean Troll',
			'description'=>'Please slay the fearsome troll. You must kill 1 Mean Troll to complete this quest.',
			'image'=>1,
			'triggered-events'=>array(),
			'length-of-path'=>8,
			'maximum-turns-fail-safe'=>80,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		15=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>12,
			'party-team-id'=>0,'party-captain-id'=>0,'party-group-attack-behavior'=>'free-choice','party-group-move-behavior'=>'follow-captain',
			'quest-team-id'=>0,'quest-captain-id'=>0,'quest-group-attack-behavior'=>'free-choice','quest-group-move-behavior'=>'free-choice',

			'starting-player-data'=>array(),
			'starting-data'=>array(
				0=>array(10,false,1),
				1=>array(10,false,1),
				2=>array(10,false,2),
				3=>array(10,false,2),
				4=>array(10,false,4),
				5=>array(10,false,4),
				6=>array(10,false,6),
				7=>array(10,false,6),
				8=>array(10,false,8),
				9=>array(10,false,8),
				10=>array(10,false,10),
				11=>array(10,false,10)
			),
			'ID'=>15,
			'name'=>'Bats In The Belfry',
			'description'=>'Please clear out the bat infestation. You must kill 12 Black Bats to complete this quest.',
			'image'=>1,
			'triggered-events'=>array(),
			'length-of-path'=>10,
			'maximum-turns-fail-safe'=>80,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		)
	);
	
	function f_ChangeQuest($v_QuestID=1){
		$this->V_QuestID=$v_QuestID;
	}
	
	private $A_Log=array();
	
	/* Function - Get Teams */
	function f_GetTeams(){}

	/* Function - Get Quests */
	function f_GetQuests(){
		/*
		$a_List=array();
		$a_List[$this->A_Quest['ID']]=array(
			'name'=>$this->A_Quest['name'],
			'description'=>$this->A_Quest['description'],
			'image'=>$this->A_Quest['image']
		);
		*/
		return array('quests'=>$this->A_TestQuestData);
	}
	/* Function - False Start */
	function f_FalseStart($v_GuildName){
		$this->f_LoadMemberData();
		$this->f_ConstructTeam($v_GuildName);
		$this->f_SortPreferences($v_GuildName);
	}
	
	/* Function - Get List */
	function f_GetList($v_GuildName){
		$this->f_FalseStart($v_GuildName);
		$a_List=array();
		foreach($this->A_Teams[$v_GuildName] as $v_MemberID=>$a_Member){
			if($a_Member['guild']==$v_GuildName){
				$a_List[]=$a_Member;
			}
		}
		return array('data'=>$a_List,'guild'=>$v_GuildName);
	}

	private $A_TestMembers=array(
		0=>array(
			'abilities'=>array(
				'action'=>'War Cry'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Fighter',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Protection',
				'move'=>'Basic Mobility'
			),
			'id'=>0,
			'name'=>'Human Swordsman',
			'guild'=>'Fighter',
			'defense'=>array('behavior'=>'protect-group'),
			'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Fighter'),
			'action'=>array('training'=>'War Cry')),
			'items'=>array(
				'attack'=>array('left-hand'=>'Bronze Longsword','right-hand'=>'Bronze Shield'),
				'defense'=>array('legs'=>'Bronze Leggings','torso'=>'Bronze Plate','hands'=>'','head'=>'')
			),
			'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),
			'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')
		),

		1=>array(
			'abilities'=>array(
				'magic'=>'Lesser Heal All'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Cleric',
				'size'=>'Average'
			),
			'training'=>array(
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Defense',
				'magic'=>'Basic Incantations',
				'move'=>'Basic Mobility'
			),
			'id'=>1,'name'=>'Human Cleric','guild'=>'Cleric','conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Cleric'),'magic'=>array('training'=>'Lesser Heal All')),'items'=>array('attack'=>array('left-hand'=>'Cedar Staff','right-hand'=>''),'defense'=>array('legs'=>'Bronze Leggings','torso'=>'Bronze Plate','hands'=>'','head'=>'')),'preference'=>array('action'=>5,'attack'=>10,'magic'=>15,'use-item'=>0),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		2=>array(
			'abilities'=>array(
				'action'=>'Precise Shot'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Ranger',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Tracking',
				'attack'=>'Basic Ranged Weapons',
				'defense'=>'Basic Defense',
				'move'=>'Basic Mobility'
			),
			'id'=>2,'name'=>'Human Archer','guild'=>'Ranger','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Ranger'),'action'=>array('training'=>'Precise Shot')),'items'=>array('attack'=>array('left-hand'=>'Curved Dagger','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Leather Tunic','hands'=>'','head'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		3=>array(
			'abilities'=>array(
				'action'=>'Fling Rocks'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Goblin',
				'guild'=>'Ranger',
				'size'=>'Small'
			),
			'training'=>array(
				'move'=>'Advanced Mobility'
			),
			'id'=>3,'name'=>'Goblin Slinger','guild'=>'Ranger','conditions'=>array('base'=>array('race'=>'Goblin','training'=>'Basic Ranger'),'action'=>array('training'=>'Fling Rocks')),'items'=>array('attack'=>array('left-hand'=>'Half-Rock Sling','right-hand'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Goblin'),'spoken-language'=>'Goblin')),

		4=>array(
			'abilities'=>array(
				'action'=>'Strong Swipe'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Goblin',
				'guild'=>'Fighter',
				'size'=>'Small'
			),
			'training'=>array(
				'move'=>'Advanced Mobility'
			),
			'id'=>4,'name'=>'Goblin Skirmisher','guild'=>'Fighter','conditions'=>array('base'=>array('race'=>'Goblin','training'=>'Basic Fighter'),'action'=>array('training'=>'Strong Swipe')),'items'=>array('attack'=>array('left-hand'=>'Crude Longsword','right-hand'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Goblin'),'spoken-language'=>'Goblin')),

		5=>array(
			'abilities'=>array(
				'magic'=>'Fire Bolt'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Wizard',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'defense'=>'Basic Dodging',
				'magic'=>'Basic Incantations',
				'move'=>'Basic Mobility'
			),
			'id'=>5,'name'=>'Human Pyromancer','guild'=>'Wizard','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Wizard'),'magic'=>array('training'=>'Fire Bolt')),'items'=>array('attack'=>array('left-hand'=>'Oak Staff','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Cloth Shirt','hands'=>'','head'=>'')),'preference'=>array('action'=>5,'attack'=>10,'magic'=>15,'use-item'=>0),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		7=>array(
			'general'=>array(
				'gender'=>'Unknown',
				'race'=>'Human',
				'guild'=>'Fighter',
				'size'=>'Average'
			),
			'training'=>array(
			),
			'id'=>7,'name'=>'Drowned Fisherman','guild'=>'Fighter','communication'=>array('known-languages'=>array(''),'spoken-language'=>''),'move'=>array('can-hide'=>false)),

		8=>array(
			'abilities'=>array(
				'action'=>'Ground Pound'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Troll',
				'guild'=>'Fighter',
				'size'=>'Very Large'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'defense'=>'Basic Defense',
				'move'=>'Basic Mobility'
			),
			'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),
		'id'=>8,'name'=>'Mean Troll','guild'=>'Fighter','conditions'=>array('base'=>array('race'=>'Troll','training'=>'Advanced Fighter'),'action'=>array('training'=>'Ground Pound')),'items'=>array('attack'=>array('left-hand'=>'Stalagmite','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Leather Tunic','hands'=>'','head'=>''))),

		9=>array(
			'abilities'=>array(
				'action'=>'Fierce Growl'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Dog',
				'guild'=>'Ranger',
				'size'=>'Small'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'defense'=>'Basic Defense',
				'move'=>'Advanced Mobility'
			),
			'id'=>9,'name'=>'Grey Wolf','guild'=>'Ranger','defense'=>array('behavior'=>'protect-group'),'conditions'=>array('base'=>array('race'=>'Dog','training'=>'Basic Animal'),'action'=>array('training'=>'Fierce Growl')),'items'=>array('attack'=>array('left-hand'=>'Claws','right-hand'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Animal'),'spoken-language'=>'Animal')),

		10=>array(
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Bat',
				'guild'=>'Wizard',
				'size'=>'Very Small'
			),
			'training'=>array(
				'defense'=>'Basic Dodging',
				'move'=>'Advanced Mobility'
			),
			'id'=>10,'name'=>'Black Bat','guild'=>'Wizard','conditions'=>array('base'=>array('race'=>'Bat','training'=>'Basic Animal')),'items'=>array('attack'=>array('left-hand'=>'Fangs','right-hand'=>'')),'preference'=>array('action'=>0,'attack'=>15,'magic'=>5,'use-item'=>10),'communication'=>array('known-languages'=>array('Animal'),'spoken-language'=>'Animal')),

		11=>array(
			'abilities'=>array(
				'action'=>'Fierce Growl'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Bear',
				'guild'=>'Fighter',
				'size'=>'Large'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'defense'=>'Basic Defense',
				'move'=>'Basic Mobility'
			),
			'id'=>11,'name'=>'Black Bear','guild'=>'Fighter','defense'=>array('behavior'=>'protect-group'),'conditions'=>array('base'=>array('race'=>'Bear','training'=>'Advanced Animal'),'action'=>array('training'=>'Fierce Growl')),'items'=>array('attack'=>array('left-hand'=>'Claws','right-hand'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Animal'),'spoken-language'=>'Animal')),

		12=>array(
			'abilities'=>array(
				'action'=>'Charm Animal'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Ranger',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Blocking',
				'move'=>'Basic Mobility'
			),
			'id'=>12,'name'=>'Human Tamer','guild'=>'Ranger','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Ranger'),'action'=>array('training'=>'Charm Animal')),'items'=>array('attack'=>array('left-hand'=>'Oak Staff','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Leather Tunic','hands'=>'','head'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		13=>array(
			'abilities'=>array(
				'action'=>'Assassinate'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Rogue',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Tracking',
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Dodging',
				'move'=>'Basic Mobility'
			),
			'id'=>13,'name'=>'Human Assassin','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Rogue'),'action'=>array('training'=>'Assassinate')),'items'=>array('attack'=>array('left-hand'=>'Poison-Tipped Dagger','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Leather Tunic','hands'=>'','head'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		14=>array(
			'general'=>array(
				'gender'=>'Unknown',
				'race'=>'Spider',
				'guild'=>'Rogue',
				'size'=>'Very Small'
			),
			'items'=>array(
				'defense'=>array('legs'=>'Multiple Legs','torso'=>'Toughened Carapace','hands'=>'','head'=>''),
				'move'=>array('face'=>'Spider Eyes','feet'=>'','waist'=>'')
			),
			'id'=>14,'name'=>'Weak Giant Spider','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Spider','training'=>'Basic Rogue')),'preference'=>array('action'=>10,'attack'=>15,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Insect'),'spoken-language'=>'Insect')),

		15=>array(
			'general'=>array(
				'gender'=>'Unknown',
				'race'=>'Rat',
				'guild'=>'Rogue',
				'size'=>'Small'
			),
			'id'=>15,'name'=>'Weak Giant Rat','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Rat','training'=>'Basic Rogue')),'preference'=>array('action'=>10,'attack'=>15,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Vermin'),'spoken-language'=>'Vermin')),

		16=>array(
			'abilities'=>array(
				'action'=>'Throw Dirt'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Rogue',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Tracking',
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Dodging',
				'move'=>'Basic Mobility'
			),
			'id'=>16,'name'=>'Human Brigand','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Rogue'),'action'=>array('training'=>'Throw Dirt')),'items'=>array('attack'=>array('left-hand'=>'Cedar Shortbow','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Cloth Shirt','hands'=>'','head'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		17=>array(
			'abilities'=>array(
				'action'=>'Throw Dirt'
			),
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Rogue',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Tracking',
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Dodging',
				'move'=>'Basic Mobility'
			),
			'id'=>17,'name'=>'Human Thief','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Rogue'),'action'=>array('training'=>'Throw Dirt')),'items'=>array('attack'=>array('left-hand'=>'Bronze Dagger','right-hand'=>''),'defense'=>array('legs'=>'','torso'=>'Leather Tunic','hands'=>'','head'=>'')),'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')),

		18=>array(
			'general'=>array(
				'gender'=>'Unknown',
				'race'=>'Spider',
				'guild'=>'Rogue',
				'size'=>'Very Small'
			),
			'items'=>array(
				'attack'=>array('left-hand'=>'Fangs','right-hand'=>''),
				'defense'=>array('legs'=>'Multiple Legs','torso'=>'Toughened Carapace','hands'=>'','head'=>''),
				'move'=>array('face'=>'Spider Eyes','feet'=>'','waist'=>'')
			),
			'id'=>18,'name'=>'Vile Giant Spider','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Spider','training'=>'Basic Rogue')),'preference'=>array('action'=>10,'attack'=>15,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Insect'),'spoken-language'=>'Insect')),

		19=>array(
			'general'=>array(
				'gender'=>'Unknown',
				'race'=>'Rat',
				'guild'=>'Rogue',
				'size'=>'Very Small'
			),
			'items'=>array(
				'attack'=>array('left-hand'=>'Fangs','right-hand'=>''),
			),
			'id'=>19,'name'=>'Rabid Giant Rat','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Rat','training'=>'Basic Rogue')),'preference'=>array('action'=>10,'attack'=>15,'magic'=>0,'use-item'=>5),'communication'=>array('known-languages'=>array('Vermin'),'spoken-language'=>'Vermin')),

		20=>array(
			'abilities'=>array(
				'action'=>'Poison Spit',
				'attack'=>'Poison Tip'
			),
			'general'=>array(
				'gender'=>'Female',
				'race'=>'Spider',
				'guild'=>'Rogue',
				'size'=>'Average'
			),
			'items'=>array(
				'attack'=>array('left-hand'=>'Sharp Fangs','right-hand'=>''),
				'defense'=>array('legs'=>'Multiple Legs','torso'=>'Hard Carapace','hands'=>'','head'=>''),
				'move'=>array('face'=>'Spider Eyes','feet'=>'','waist'=>'')
			),
			'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),
			'id'=>20,'name'=>'Giant Spider Queen','guild'=>'Rogue','defense'=>array('behavior'=>'stay-back'),'conditions'=>array('base'=>array('race'=>'Spider','training'=>'Basic Rogue')),'communication'=>array('known-languages'=>array('Insect'),'spoken-language'=>'Insect')),

		21=>array(
			'id'=>21,
			'name'=>'Human Pikeman',
			'guild'=>'Fighter',
			'general'=>array(
				'gender'=>'Male',
				'race'=>'Human',
				'guild'=>'Fighter',
				'size'=>'Average'
			),
			'training'=>array(
				'action'=>'Basic Endurance',
				'attack'=>'Basic Melee Weapons',
				'defense'=>'Basic Blocking',
				'move'=>'Basic Mobility'
			),
			'abilities'=>array(
				'action'=>'Lance Jab'
			),
			'items'=>array(
				'attack'=>array('left-hand'=>'Bronze Lance','right-hand'=>''),
				'defense'=>array('legs'=>'','torso'=>'Bronze Plate','hands'=>'','head'=>''),
				'move'=>array('face'=>'','feet'=>'','waist'=>'Lancing Girdle')
			),
			'preference'=>array('action'=>15,'attack'=>10,'magic'=>0,'use-item'=>5),
			'defense'=>array('behavior'=>'protect-group'),
			'conditions'=>array('base'=>array('race'=>'Human','training'=>'Basic Fighter')),
			'communication'=>array('known-languages'=>array('Common'),'spoken-language'=>'Common')
		)


	);

	function Online(){}
}
?>