<?
class Online{
	private $A_Barracks=array();
	private $A_Log=array();
	private $A_Quest=array();
	private $A_AssignedToQuest=array();
	private $A_Statistics=array();
	private $A_Teams=array('party'=>array(),'quest'=>array());
	private $V_QuestID=101;
	private $V_TotalTurns=0;
	private $V_WithLog=false;

	/* Function - Add Member */
	function f_AddMember($v_MemberID){
		$v_DC=db::getInstance();
		$v_DC->Query('INSERT INTO OA_barracks (`user-ID`,`character-ID`) VALUES (0,'.$v_MemberID.');');
	}
	/* Function - Add Or Remove Character */
	function f_AddOrRemoveCharacter($v_QuestID,$v_BarracksKey){
		if($this->V_QuestID!==$v_QuestID){
			$this->V_QuestID=$v_QuestID;
			$this->A_Quest=F_GetQuest($this->V_QuestID,((array_key_exists($this->V_QuestID,$this->A_AssignedToQuest))?$this->A_AssignedToQuest[$this->V_QuestID]:array()),$this->A_Barracks);
		}
		if(!array_key_exists($v_QuestID,$this->A_AssignedToQuest)){
			$this->A_AssignedToQuest[$v_QuestID]=array();
		}
		$v_Minimum=$this->A_Quest['minimum'];
		$v_Maximum=$this->A_Quest['maximum'];
		if(array_key_exists($v_BarracksKey,$this->A_AssignedToQuest[$v_QuestID])){
			unset($this->A_AssignedToQuest[$v_QuestID][$v_BarracksKey]);
			if(count($this->A_AssignedToQuest[$v_QuestID])>=$v_Minimum){
				return array('switch'=>'removed-and-ready');
			}else{
				return array('switch'=>'removed');
			}
		}else{
			if(count($this->A_AssignedToQuest[$v_QuestID])>=$v_Maximum){
				return array('switch'=>'no-room-to-add');
			}else{
				$this->A_AssignedToQuest[$v_QuestID][$v_BarracksKey]=$this->A_Barracks[$v_BarracksKey]['ID'];
				if(count($this->A_AssignedToQuest[$v_QuestID])==$v_Maximum){
					return array('switch'=>'added-and-full');
				}elseif(count($this->A_AssignedToQuest[$v_QuestID])>=$v_Minimum){
					return array('switch'=>'added-and-ready');
				}else{
					return array('switch'=>'added');
				}
			}
		}
	}
	/* F u n c t i o n s */
	/* Function - Add Character To Statistics */
	function f_AddCharacterToStatistics($v_TeamName,$v_Key,$v_Name){
		$this->A_Statistics[$v_TeamName]['character-names'][]=$v_Name;
		$v_Counter=0;
		foreach($this->A_Statistics[$v_TeamName]['character-names'] as $v_CharacterKey=>$v_CharacterName){if($v_CharacterName==$v_Name){$v_Counter++;}}
		$this->A_Statistics[$v_TeamName]['characters'][$v_Key]=$v_Name.' <font class="font-J">[</font>'.$v_Counter.'<font class="font-J">]</font>'; /* Statistics */
		$this->A_Statistics[$v_TeamName]['damage-inflicted-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['health-healed-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['kills-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['deaths-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['cost-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['health-loss-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['stamina-loss-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['mana-loss-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['blood-loss-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['energy-loss-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['concentration-loss-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['unconscious-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['exhausted-by-character'][$v_Key]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['confounded-by-character'][$v_Key]=0; /* Statistics */
	}
	/* Function - Add Statistic */
	function f_AddStatistic($v_TeamName,$v_MemberID,$v_StatisticName='',$v_DamageType='',$v_DamageTotal=0){
		switch($v_StatisticName){
			case 'deaths-by-character':
				$this->A_Statistics[$v_TeamName]['deaths-by-character'][$v_MemberID]++;
				$this->A_Statistics[$v_TeamName]['deaths-total']++;
				break;
			case 'kills-by-character':
				$this->A_Statistics[$v_TeamName]['kills-by-character'][$v_MemberID]++;
				$this->A_Statistics[$v_TeamName]['kills-total']++;
				$this->A_Statistics[$v_TeamName]['kills-by-type'][$v_DamageType]++;
				break;
			case 'damage-inflicted-by-character':
				$this->A_Statistics[$v_TeamName]['damage-inflicted-by-character'][$v_MemberID]+=$v_DamageTotal;
				$this->A_Statistics[$v_TeamName]['damage-inflicted-by-type'][$v_DamageType]+=$v_DamageTotal;
				$this->A_Statistics[$v_TeamName]['damage-inflicted-total']+=$v_DamageTotal;
				break;
			case 'health-loss-by-character':
				$this->A_Statistics[$v_TeamName]['health-loss-by-character'][$v_MemberID]+=$v_DamageTotal;
				break;
			case '':default:
				break;
		}
	}
	/* Function - Add Terrain To Quest */
	function f_AddTerrainToQuest(){
		$a_TerrainTypes=array();
		$v_Inside=false;
		switch($this->A_Quest['location']){
			case 'Colosseum':$a_TerrainTypes['dirt']=10;break;
			case '':default:
				break;
		}
		$a_Terrain=array();
		foreach($a_TerrainTypes as $v_TerrainType=>$v_Amount){for($v_Counter=1;$v_Counter<=$v_Amount;$v_Counter++){$a_Terrain[$v_Counter]=$v_TerrainType;}}

		/* Shuffle */
		$a_ShuffledTerrain=array();
		$a_Keys=array_rand($a_Terrain,count($a_Terrain)); 
		foreach($a_Keys as $v_Key=>$v_CurrentKey){$a_ShuffledTerrain[$v_CurrentKey]=$a_Terrain[$v_CurrentKey];}
		/* ******* */

		$a_EnterEffects=array('brush'=>'','dirt'=>'Dust Cloud','forest'=>'','grass'=>'','ice'=>'','lava'=>'','mud'=>'','rocks'=>'','sand'=>'','swamp'=>'','trees'=>'','water'=>'');
		$a_LeaveEffects=array('brush'=>'','dirt'=>'Dust Cloud','forest'=>'','grass'=>'','ice'=>'','lava'=>'','mud'=>'','rocks'=>'','sand'=>'','swamp'=>'','trees'=>'','water'=>'');

		for($v_Counter=1;$v_Counter<=$this->A_Quest['length-of-path'];$v_Counter++){
			$this->A_Quest['tiles'][$v_Counter]['conditions']=array();
			$this->A_Quest['tiles'][$v_Counter]['inside']=$v_Inside;
			$this->A_Quest['tiles'][$v_Counter]['terrain']=$a_Terrain[$v_Counter];
			$this->A_Quest['tiles'][$v_Counter]['on-enter']=$a_EnterEffects[$a_Terrain[$v_Counter]];
			$this->A_Quest['tiles'][$v_Counter]['on-leave']=$a_LeaveEffects[$a_Terrain[$v_Counter]];
			$this->f_AddToLog('narrator','narrator','Tile '.$v_Counter.' is '.$a_Terrain[$v_Counter].'.');
		}
	}
	/* Function - Add To Log */
	function f_AddToLog($v_TeamName,$v_Color,$v_Text){$this->A_Log[]=array('team'=>$v_TeamName,'color'=>$v_Color,'text'=>$v_Text,'turn'=>$this->V_TotalTurns);}
	/* Function - All Characters Inform Others */
	function f_AllCharactersInformOthers($v_TeamName){
		if(empty($this->A_Teams[$v_TeamName])){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($a_Member['status']=='Aware'){$this->f_InformOthers($v_TeamName,$v_MemberID);}}
	}
	/* Function - All Characters Look Around */
	function f_AllCharactersLookAround($v_TeamName){
		if(empty($this->A_Teams[$v_TeamName])){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($a_Member['status']=='Aware'){$this->f_LookAround($v_TeamName,$v_MemberID);}}
	}
	/* Function - All Characters Detect Presences */
	function f_AllCharactersDetectPresences($v_TeamName){
		if(empty($this->A_Teams[$v_TeamName])){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($a_Member['status']=='Aware'){$this->f_DetectPresences($v_TeamName,$v_MemberID);}}
	}
	/* Function - All Characters Regenerate And Drain */
	function f_AllCharactersRegenerateAndDrain($v_TeamName){
		if(empty($this->A_Teams[$v_TeamName])){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			$this->A_Teams[$v_TeamName][$v_MemberID]['performed-instant']=false;
			$this->f_ModifyTimer($v_TeamName,$v_MemberID);
			//if($this->V_TotalTurns%54){$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'health',1);}
			if($this->V_TotalTurns%18){$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'mana',1);}
			if($this->V_TotalTurns%6){$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'stamina',1);}
			$this->f_RegeneratePool($v_TeamName,$v_MemberID);
			$this->f_DrainPool($v_TeamName,$v_MemberID);
		}
	}
	/* Function - All Teams Choose Target And Perform */
	function f_AllTeamsChooseTargetAndPerform(){
		$a_Initiative=$this->f_SortByInitiative();
		foreach($a_Initiative as $v_Initiative=>$a_Members){
			foreach($a_Members as $v_Key=>$a_Member){
				$this->f_ChooseTargetAndPerform($a_Member['team'],$a_Member['id']);
			}
		}
	}
	/* Function - Apply Attack Range To Action */
	function f_ApplyAttackRangeToAction($v_TeamName,$v_MemberID){$this->A_Teams[$v_TeamName][$v_MemberID]['action']['range']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['range'];}
	/* Function - Apply Communicate Range To Action */
	function f_ApplyCommunicateRangeToAction($v_TeamName,$v_MemberID){$this->A_Teams[$v_TeamName][$v_MemberID]['action']['range']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['range'];}
	/* Function - Apply Damage Type To Character */
	function f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName='action',$v_DamageType='Blunt',$v_Powerful=false){
		if($v_DamageType=='Left-Hand'){$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['type'];}
		if($v_Powerful){
			$a_DamageTypes=array(
				'Acid'=>array('critical'=>'Deadly Corrosion','damage'=>'Corroded','effect'=>'Moderate Corrosion'),
				'Blunt'=>array('critical'=>'Black And Blue Bruising','damage'=>'Crushed','effect'=>'Heavy Bruising'),
				'Cold'=>array('critical'=>'Chilled To The Bone','damage'=>'Frozen','effect'=>'Seriously Frozen'),
				'Heat'=>array('critical'=>'Third-Degree Burn','damage'=>'Scorched','effect'=>'Serious Burn'),
				'Electrical'=>array('critical'=>'Deadly Shock','damage'=>'Electrocuted','effect'=>'Serious Shock'),
				'Piercing'=>array('critical'=>'Deadly Puncture','damage'=>'Punctured','effect'=>'Deep Puncture'),
				'Poison'=>array('critical'=>'Strong Poisoning','damage'=>'Poisoned','effect'=>'Moderate Poisoning'),
				'Slashing'=>array('critical'=>'Deadly Gash','damage'=>'Severed','effect'=>'Deep Gash'),
				'Sonic'=>array('critical'=>'Dazed','damage'=>'Dazed And Confused','effect'=>'Serious Daze')
			);
		}else{
			$a_DamageTypes=array(
				'Acid'=>array('critical'=>'Moderate Corrosion','damage'=>'Deadly Corrosion','effect'=>'Weak Corrosion'),
				'Blunt'=>array('critical'=>'Heavy Bruising','damage'=>'Black And Blue Bruising','effect'=>'Light Bruising'),
				'Cold'=>array('critical'=>'Seriously Frozen','damage'=>'Chilled To The Bone','effect'=>'Slightly Frozen'),
				'Electrical'=>array('critical'=>'Serious Shock','damage'=>'Deadly Shock','effect'=>'Slight Shock'),
				'Heat'=>array('critical'=>'Serious Burn','damage'=>'Third-Degree Burn','effect'=>'Slight Burn'),
				'Piercing'=>array('critical'=>'Deep Puncture','damage'=>'Deadly Puncture','effect'=>'Shallow Puncture'),
				'Poison'=>array('critical'=>'Moderate Poisoning','damage'=>'Strong Poisoning','effect'=>'Weak Poisoning'),
				'Slashing'=>array('critical'=>'Deep Gash','damage'=>'Deadly Gash','effect'=>'Shallow Gash'),
				'Sonic'=>array('critical'=>'Serious Daze','damage'=>'Dazed','effect'=>'Slight Daze')
			);
		}
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type']=$v_DamageType;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['name']=$a_DamageTypes[$v_DamageType]['effect'];
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['name']=$a_DamageTypes[$v_DamageType]['critical'];
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['name']=$a_DamageTypes[$v_DamageType]['damage'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_Powerful)?240:120);
	}
	/* Function - Apply Keyword To Character */
	function f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword='',$v_PerformanceName=''){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		switch($v_Keyword){
			/* Characteristics */
			/* Life */
			case 'Health IV':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'health',4);break;
			case 'Health III':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'health',3);break;
			case 'Health II':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'health',2);break;
			case 'Health I':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'health',1);break;
			case 'Mana IV':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'mana',4);break;
			case 'Mana III':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'mana',3);break;
			case 'Mana II':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'mana',2);break;
			case 'Magical':case 'Mana I':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'mana',1);break;
			case 'Stamina IV':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',4);break;
			case 'Stamina III':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',3);break;
			case 'Stamina II':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',2);break;
			case 'Stamina I':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',1);break;
			/* Regeneration */
			case 'Health Regeneration II':$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'health',2);break;
			case 'Health Regeneration I':$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'health',1);break;
			case 'Stamina Regeneration II':$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'stamina',2);break;
			case 'Stamina Regeneration I':$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'stamina',1);break;
			case 'Mana Regeneration II':$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'mana',2);break;
			case 'Mana Regeneration I':$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'mana',1);break;
			/* Regeneration */
			case 'Blood Regeneration II':$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'blood',2);break;
			case 'Blood Regeneration I':$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'blood',1);break;
			case 'Energy Regeneration II':$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'energy',2);break;
			case 'Energy Regeneration I':$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'energy',1);break;
			case 'Concentration Regeneration II':$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'concentration',2);break;
			case 'Concentration Regeneration I':$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'concentration',1);break;
			/* Loudness */
			case 'Loudness 10':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,10);break;
			case 'Loudness 9':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,9);break;
			case 'Loudness 8':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,8);break;
			case 'Loudness 7':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,7);break;
			case 'Loudness 6':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,6);break;
			case 'Loudness 5':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,5);break;
			case 'Loudness 4':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,4);break;
			case 'Loudness 3':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,3);break;
			case 'Loudness 2':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,2);break;
			case 'Loudness 1':$this->f_ModifyLoudness($v_TeamName,$v_MemberID,1);break;
			/* Initiative */
			case 'Initiative IV':$this->f_ModifyInitiative($v_TeamName,$v_MemberID,4);break;
			case 'Initiative III':$this->f_ModifyInitiative($v_TeamName,$v_MemberID,3);break;
			case 'Initiative II':$this->f_ModifyInitiative($v_TeamName,$v_MemberID,2);break;
			case 'Initiative I':$this->f_ModifyInitiative($v_TeamName,$v_MemberID,1);break;
			case 'Range Of View IV':$this->f_ModifyRangeOfView($v_TeamName,$v_MemberID,4);break;
			case 'Range Of View III':$this->f_ModifyRangeOfView($v_TeamName,$v_MemberID,3);break;
			case 'Range Of View II':$this->f_ModifyRangeOfView($v_TeamName,$v_MemberID,2);break;
			case 'Range Of View I':$this->f_ModifyRangeOfView($v_TeamName,$v_MemberID,1);break;
			case 'Range Of Sense IV':$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,4);break;
			case 'Range Of Sense III':$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,3);break;
			case 'Range Of Sense II':$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,2);break;
			case 'Range Of Sense I':$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,1);break;
			/* Skills */
			case 'Accuracy IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',4);break;
			case 'Accuracy III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',3);break;
			case 'Accuracy II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',2);break;
			case 'Accuracy I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',1);break;
			case 'Balance IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',4);break;
			case 'Balance III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',3);break;
			case 'Balance II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',2);break;
			case 'Balance I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',1);break;
			case 'Block IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',4);break;
			case 'Block III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',3);break;
			case 'Block II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',2);break;
			case 'Block I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);break;
			case 'Communication IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Communication',4);break;
			case 'Communication III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Communication',3);break;
			case 'Communication II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Communication',2);break;
			case 'Communication I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Communication',1);break;
			case 'Detection IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Detection',4);break;
			case 'Detection III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Detection',3);break;
			case 'Detection II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Detection',2);break;
			case 'Detection I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Detection',1);break;
			case 'Dodge IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',4);break;
			case 'Dodge III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',3);break;
			case 'Dodge II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',2);break;
			case 'Dodge I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',1);break;
			case 'Intellect IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',4);break;
			case 'Intellect III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',3);break;
			case 'Intellect II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',2);break;
			case 'Intellect I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',1);break;
			case 'Stealth IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',4);break;
			case 'Stealth III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',3);break;
			case 'Stealth II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',2);break;
			case 'Stealth I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',1);break;
			case 'Strength IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',4);break;
			case 'Strength III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',3);break;
			case 'Strength II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',2);break;
			case 'Strength I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',1);break;
			case 'Understanding IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',4);break;
			case 'Understanding III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',3);break;
			case 'Understanding II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',2);break;
			case 'Understanding I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',1);break;
			case 'Vision IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Vision',4);break;
			case 'Vision III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Vision',3);break;
			case 'Vision II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Vision',2);break;
			case 'Vision I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Vision',1);break;
			/* Skills */
			case 'Inaccurate IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',-4);break;
			case 'Inaccurate III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',-3);break;
			case 'Inaccurate II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',-2);break;
			case 'Inaccurate I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Accuracy',-1);break;
			case 'Slowness IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-4);break;
			case 'Slowness III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-3);break;
			case 'Slowness II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-2);break;
			case 'Slowness I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-1);break;
			case 'Noticeability IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-4);break;
			case 'Noticeability III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-3);break;
			case 'Noticeability II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-2);break;
			case 'Noticeability I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-1);break;
			case 'Dumb IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',-4);break;
			case 'Dumb III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',-3);break;
			case 'Dumb II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',-2);break;
			case 'Dumb I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Intellect',-1);break;
			case 'Weak IV':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',-4);break;
			case 'Weak III':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',-3);break;
			case 'Weak II':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',-2);break;
			case 'Weak I':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',-1);break;

			case 'Aura Of Death':
				if($this->A_Teams[$v_TeamName][$v_MemberID]['abilities']['magic']=='Aura Of Decay'){$this->A_Teams[$v_TeamName][$v_MemberID]['abilities']['magic']='Aura Of Death';}
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=960;
				break;

			/* Existence */
			case 'Alive':
				$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Alive',true);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-energy',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-concentration',true,false);
				$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,1);
			case 'Almost Alive':
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,'communicate','can-detect',true,true);
				$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,1);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-blood',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-stamina',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-mana',true,false);
				break;
			case 'Undead':
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-stamina',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-mana',true,false);
				$this->f_ModifyInitiative($v_TeamName,$v_MemberID,1);
				break;

			/* Form */
			case 'Flesh':$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'health',1);$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',1);break;
			case 'Bone':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',2);$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Slashing',2);break;
			case 'Spirit':
				$this->f_ModifyMainRegeneration($v_TeamName,$v_MemberID,'mana',1);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-energy',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-concentration',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-stamina',true,false);
				$this->f_ModifyCan($v_TeamName,$v_MemberID,'can-lose-mana',true,false);
				break;
			case 'Dragon Scales':
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Acid',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Blunt',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Cold',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Electrical',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Heat',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Piercing',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Poison',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Slashing',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Sonic',1);
			case 'Scales':
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);
				break;

			/* Movement */
			case 'Mobile':
				foreach(array('brush','dirt','forest','grass','ice','mud','rocks','swamp','trees') as $v_Key=>$v_TerrainType){$this->f_ModifyAllowedTerrain($v_TeamName,$v_MemberID,$v_TerrainType,true);}
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,'move','can-hide',true,true);
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,'move','can-move',true,true);
				$this->f_ModifySpeed($v_TeamName,$v_MemberID,1);
				break;

			/* Sight */
			case 'Perceptive':
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Detection',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Vision',2);
				$this->f_ModifyRangeOfView($v_TeamName,$v_MemberID,1);
				$this->f_ModifyRangeOfSense($v_TeamName,$v_MemberID,1);
			case 'Unsusceptible':
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,'see','can-see',true,true);
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,'communicate','can-understand',true,true);
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,'communicate','can-communicate',true,true);
				$this->f_ModifyRangeOfView($v_TeamName,$v_MemberID,1);
				break;


			/* Size */
			case 'Tiny-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Tiny-Size']=true;
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',1);
				$this->f_ModifyInitiative($v_TeamName,$v_MemberID,1);
				$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'energy',3);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',-4);
				break;
			case 'Small-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Small-Size']=true;
				$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','protection',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',-2);
				$this->f_ModifyInitiative($v_TeamName,$v_MemberID,1);
				$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'energy',2);
				break;
			case 'Medium-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Medium-Size']=true;
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',1);
				$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',1);
				$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'energy',1);
				break;
			case 'Large-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Large-Size']=true;
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',2);
				$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',2);
				$this->f_ModifyInitiative($v_TeamName,$v_MemberID,-1);
				break;
			case 'Giant-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Giant-Size']=true;
				$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Blunt',1);
				$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Piercing',1);
				$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Slashing',1);
				$this->f_ModifyInitiative($v_TeamName,$v_MemberID,-1);
				$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',2);
				$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'blood',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-4);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-4);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',4);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',-2);
				break;
			case 'Tower-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Tower-Size']=true;
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Acid',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Blunt',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Cold',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Electrical',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Heat',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Piercing',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Poison',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Slashing',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Sonic',1);
				$this->f_ModifyInitiative($v_TeamName,$v_MemberID,-2);
				$this->f_ModifyMaximum($v_TeamName,$v_MemberID,'stamina',2);
				$this->f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,'blood',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-4);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-4);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Strength',6);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',-4);
				break;

			/* Duration / Recovery */
			case 'Effect Duration X':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration IX':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration VIII':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration VII':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration VI':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration V':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration IV':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration III':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration II':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Effect Duration I':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;
			case 'No Effect Duration':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['duration']=0;
			case 'Critical Duration X':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration IX':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration VIII':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration VII':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration VI':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration V':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration IV':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration III':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration II':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
			case 'Critical Duration I':$this->f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);break;
			case 'No Critical Duration':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['duration']=0;
			case 'Recovery X':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery IX':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery VIII':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery VII':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery VI':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery V':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery IV':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery III':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery II':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);
			case 'Recovery I':$this->f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,1);break;
			case 'No Recovery':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']=0;

			/* Practiced */
			case 'Time To Perform IV':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']=4;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=0;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']=9;
				break;
			case 'Time To Perform III':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']=3;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=0;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']=7;
				break;
			case 'Time To Perform II':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']=2;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=0;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']=5;
				break;
			case 'Time To Perform I':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']=1;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=0;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']=3;
				break;

			case 'Blessed':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'blessed',false);break;
			case 'Sneaking':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'sneaking',false);break;

			/* Enchantment / Challenge / Advanced Challenge */
			case 'Enchantment':
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,$v_PerformanceName,'can-'.$v_PerformanceName,true,true);
				$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'enchantment',true);
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Enchantment';
				break;
			case 'Challenge':
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,$v_PerformanceName,'can-'.$v_PerformanceName,true,true);
				$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'challenge',true);
				break;
			case 'Advanced Challenge':
				$this->f_ModifySecondaryCan($v_TeamName,$v_MemberID,$v_PerformanceName,'can-'.$v_PerformanceName,true,true);
				$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'advanced-challenge',true);
				break;

			/* Attacker - Skill */
			case 'Use Accuracy':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Accuracy';break;
			case 'Use Arcane Focus':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Arcane Focus';break;
			case 'Use Battle Focus':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Battle Focus';break;
			case 'Use Communication':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Communication';break;
			case 'Use Intellect':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Intellect';break;
			case 'Use Strength':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Strength';break;
			/* Defender - Skill */
			case 'Anti-Health':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Health';break;
			case 'Anti-Stamina':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Stamina';break;
			case 'Anti-Mana':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Mana';break;
			case 'Anti-Blood':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Blood';break;
			case 'Anti-Energy':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Energy';break;
			case 'Anti-Concentration':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Concentration';break;
			case 'Must Balance':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Balance';break;
			case 'Must Block':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Block';break;
			case 'Must Dodge':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Dodge';break;
			case 'Must Evade':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Evasion';break;
			case 'Must Stand':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Footing';break;
			case 'Must Understand':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Understanding';break;

			/* Attacker - Skill Level */
			case 'Attacker Decrease I':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Lesser';break;
			case 'Attacker Decrease II':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Amateur';break;
			case 'Attacker Increase I':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Greater';break;
			case 'Attacker Increase II':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Master';break;
			/* Defender - Skill Level */
			case 'Defender Decrease I':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['level']='Lesser';break;
			case 'Defender Decrease II':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['level']='Amateur';break;
			case 'Defender Increase I':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['level']='Greater';break;
			case 'Defender Increase II':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['level']='Master';break;

			/* Effect / Critical / Damage */
			case 'Left-Hand II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Left-Hand',true);break;
			case 'Left-Hand I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Left-Hand');break;
			case 'Left-Hand Range':$this->f_ApplyAttackRangeToAction($v_TeamName,$v_MemberID);break;
			case 'Communicate Range':$this->f_ApplyCommunicateRangeToAction($v_TeamName,$v_MemberID);break;
			
			case 'Acid II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Acid',true);break;
			case 'Acid I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Acid');break;
			case 'Blunt II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Blunt',true);break;
			case 'Blunt I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Blunt');break;
			case 'Cold II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Cold',true);break;
			case 'Cold I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Cold');break;
			case 'Electrical II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Electrical',true);break;
			case 'Electrical I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Electrical');break;
			case 'Heat II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Heat',true);break;
			case 'Heat I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Heat');break;
			case 'Piercing II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Piercing',true);break;
			case 'Piercing I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Piercing');break;
			case 'Poison II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Poison',true);break;
			case 'Poison I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Poison');break;
			case 'Slashing II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Slashing',true);break;
			case 'Slashing I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Slashing');break;
			case 'Sonic II':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Sonic',true);break;
			case 'Sonic I':$this->f_ApplyDamageTypeToCharacter($v_TeamName,$v_MemberID,$v_PerformanceName,'Sonic');break;
			case 'Other':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type']='Other';break;

			/* Enchantments */
			case 'Death I':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Death');break;
			case 'Death II':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Tiny Prey');break;
			case 'Retribution I':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Release Soul');break;
			case 'Pacify':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Pacify');break;
			case 'Decay':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Decay');break;
			case 'Dust Cloud':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Dust Cloud');break;
			case 'Fear':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Afraid');break;
			case 'Focus':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Focused');break;
			case 'Healing':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Heal');break;
			case 'Knock-Down':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Knocked Down');break;
			case 'Lure':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Lured');break;
			case 'Marksman':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Adrenaline Rush');break;
			case 'Rejuvenate':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Rejuvenate');break;
			case 'Replenish':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Bandage');break;
			case 'Vampiric Bite':$this->f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'Blood Drain');break;

			/* Range (Cascade) */
			case 'Range 10':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Distant');
			case 'Range 9':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Distant');
			case 'Range 8':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Far');
			case 'Range 7':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Far');
			case 'Range 6':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Long');
			case 'Range 5':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Long');
			case 'Range 4':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Short');
			case 'Range 3':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Short');
			case 'Range 2':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Close');
			case 'Range 1':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Close');break;
			/* Range */
			case 'Range I':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Close');break;
			case 'Range II':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Close');break;
			case 'Range III':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Short');break;
			case 'Range IV':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Short');break;
			case 'Range V':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Long');break;
			case 'Range VI':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Long');break;
			case 'Range VII':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Far');break;
			case 'Range VIII':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Far');break;
			case 'Range IX':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Distant');break;
			case 'Range X':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Distant');break;
			/* Range (First Group) */
			case 'Range A':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Close');$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Close');break;
			case 'Range B':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Short');$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Short');break;
			case 'Range C':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Long');$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Long');break;
			case 'Range D':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Far');$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Far');break;
			case 'Range E':$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Distant');$this->f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,'Very Distant');break;

			/* Area / Projectile / Targeted */
			case 'Area':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'area',true);break;
			case 'Projectile':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'projectile',true);break;
			case 'Targeted':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'has-target',true);break;

			/* Area Range */
			case 'Area Range IV':$this->f_ModifyAreaRange($v_TeamName,$v_MemberID,$v_PerformanceName,4);break;
			case 'Area Range III':$this->f_ModifyAreaRange($v_TeamName,$v_MemberID,$v_PerformanceName,3);break;
			case 'Area Range II':$this->f_ModifyAreaRange($v_TeamName,$v_MemberID,$v_PerformanceName,2);break;
			case 'Area Range I':$this->f_ModifyAreaRange($v_TeamName,$v_MemberID,$v_PerformanceName,1);break;

			/* Instant */
			case 'Instant':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'instant',true);break;

			case 'Hover':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',1);$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Hover',true);break;
			case 'Fearful':$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Fearful',false);break;
			case 'Fearless':$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Fearless',true);break;
			case 'Ethereal':
				$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Ethereal',true);
				$this->f_TurnOffCanBeHit($v_TeamName,$v_MemberID,'Blunt');
				$this->f_TurnOffCanBeHit($v_TeamName,$v_MemberID,'Piercing');
				$this->f_TurnOffCanBeHit($v_TeamName,$v_MemberID,'Slashing');
				break;
			case 'Heat Immunity':
				$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Heat Immunity',true);
				$this->f_TurnOffCanBeHit($v_TeamName,$v_MemberID,'Heat');
				break;
			case 'Poison Immunity':
				$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Poison Immunity',true);
				$this->f_TurnOffCanBeHit($v_TeamName,$v_MemberID,'Poison');
				break;
			case 'Piercing Immunity':
				$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Piercing Immunity',true);
				$this->f_TurnOffCanBeHit($v_TeamName,$v_MemberID,'Piercing');
				break;

			case 'Flying':$this->f_TurnOnSpecial($v_TeamName,$v_MemberID,'Flying',true);
			case 'Protection I':case 'Scurry':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',1);break;
			case 'Protection II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',2);break;

			/* Hand Configuration */
			case 'Dual':
				switch($this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']){
					case 0:$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']=7;break; /*  Dual Weapon (Left) - 7 */
					case 1:case 7:$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['right']=10;break; /* Dual Weapon (Right) - 10 */
					default:break;
				}
				break;
			case 'Shield':$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['right']=2;break; /*              Shield - 2 */
			case 'Main':$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']=1;break; /*         Main Weapon - 1 */
			case 'Offhand':$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['right']=4;break; /*      Offhand Weapon - 4 */
			case 'Two-Handed': /*   Two-Handed Weapon - 6 */
				$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']=6;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']+=2;
				break;

			/* Item Sharpness */
			case 'Sharpest':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
			case 'Sharper':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
			case 'Sharp':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);break;

			/* Length Of Blade */
			case 'Very Long Blade':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
			case 'Long Blade':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
			case 'Short Blade':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Very Short Blade':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;
			case 'Axe Blade':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;

			/* Base / Handle */
			case 'Long Bowstaff':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
			case 'Short Bowstaff':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);break;

			case 'Long Metal Rod':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
			case 'Short Metal Rod':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;
			case 'Short Metal Chain':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);break;
			case 'Long Wooden Rod':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);
			case 'Short Wooden Rod':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);break;

			case 'Long Carbonite Rod':
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
				$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',2);
				break;
			case 'Protected Handle':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','protection',1);break;

			/* (Visual) Light */
			case 'Torchlight':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-3);break;

			/* Hostile / Deadly */
			case 'Deadly':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'deal-damage',true);
			case 'Hostile':$this->f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,'hostile',true);break;

			/* Item Components */
			case 'Cloth Of The King':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Communication',1);
			case 'Cloth':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Blunt',1);break;

			case 'Lizard Skin':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Slashing',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','Cold',1);break;

			case 'Black Cloth':case 'Black Fur Patches':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Blunt',1);$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',1);break;

			case 'Fur Patches':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Cold',1);break;

			case 'Spider-Silk Inserts':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Poison',1);
			case 'Silk Inserts':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Slashing',1);break;

			case 'Tough Leather Hide':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Slashing',1);
			case 'Leather Hide':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','Slashing',1);break;
			case 'Half-Leather Hide':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','Slashing',1);break;

			case 'Metal Plates':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','Piercing',1);break;

			case 'Very Protective':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','protection',1);
			case 'Protective':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','protection',1);break;

			case 'Very Reflective':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-1);
			case 'Reflective':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-1);break;

			case 'Large Metal Spikes':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
			case 'Small Metal Spikes':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);break;

			case 'Cotton Padding':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','Blunt',1);break;

			case 'Fleece Lining':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,'defense','Cold',1);break;

			case 'Very Large Metal Sphere':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',2);

			case 'Hood':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Sonic',1);$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',-1);break;
			case 'Knight Helm':
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Communication',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Stealth',-1);
			case 'Close Helm':
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','protection',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Sonic',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Understanding',-2);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Vision',-2);
				break;

			case 'Master I':
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);
				$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);
				break;

			case 'Critical IV':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',4);break;
			case 'Critical III':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',3);break;
			case 'Critical II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',2);break;
			case 'Critical I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);break;
			case 'Critical Boost II':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',2);break;
			case 'Critical Boost I':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);break;
			case 'Critical Chances II':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',2);break;
			case 'Critical Chances I':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',1);break;
			case 'Damage IV':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',4);break;
			case 'Damage III':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',3);break;
			case 'Damage II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',2);break;
			case 'Damage I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);break;
			case 'Damage Boost II':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',2);break;
			case 'Damage Boost I':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);break;
			case 'Damage Chances II':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',2);break;
			case 'Damage Chances I':case 'Metal Sphere':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',1);break;
			case 'Effect IV':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',4);break;
			case 'Effect III':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',3);break;
			case 'Effect II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',2);break;
			case 'Effect I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;
			case 'Effect Boost II':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',2);break;
			case 'Effect Boost I':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;
			case 'Effect Chances II':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',2);break;
			case 'Effect Chances I':$this->f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',1);break;

			case 'Acid Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Acid',2);break;
			case 'Acid Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Acid',1);break;
			case 'Blunt Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Blunt',2);break;
			case 'Blunt Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Blunt',1);break;
			case 'Cold Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Cold',2);break;
			case 'Cold Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Cold',1);break;
			case 'Electrical Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Electrical',2);break;
			case 'Electrical Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Electrical',1);break;
			case 'Heat Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Heat',2);break;
			case 'Heat Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Heat',1);break;
			case 'Piercing Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Piercing',2);break;
			case 'Piercing Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Piercing',1);break;
			case 'Poison Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Poison',2);break;
			case 'Poison Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Poison',1);break;
			case 'Slashing Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Slashing',2);break;
			case 'Slashing Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Slashing',1);break;
			case 'Sonic Resistance II':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Sonic',2);break;
			case 'Sonic Resistance I':$this->f_ModifyAbility($v_TeamName,$v_MemberID,'defense','Sonic',1);break;

			case 'Rectangular Shield':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','protection',1);
			case 'Circular Shield':$this->f_ModifyAbilityBoost($v_TeamName,$v_MemberID,'defense','protection',1);
			case 'Circular Buckler':$this->f_ModifySkill($v_TeamName,$v_MemberID,'Block',1);break;

			/* This item component reduces the weight of the item by one tier. */
			case 'Well-Built':$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;break;

			/* Item Weight */
			case 'Very Light':
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',1);
				break;
			case 'Light':
				$this->f_ModifyCarryingWeight($v_TeamName,$v_MemberID,-1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',1);
				break;
			case 'Medium':
				$this->f_ModifyCarryingWeight($v_TeamName,$v_MemberID,-2);
				break;
			case 'Extremely Heavy':
				$this->f_ModifyCarryingWeight($v_TeamName,$v_MemberID,-1);
				$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-1);
			case 'Very Heavy':
				$this->f_ModifyCarryingWeight($v_TeamName,$v_MemberID,-1);
				$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Dodge',-1);
			case 'Heavy':
				$this->f_ModifyCarryingWeight($v_TeamName,$v_MemberID,-3);
				$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,1);
				$this->f_ModifySkill($v_TeamName,$v_MemberID,'Balance',-1);
				break;

			case 'Costly IV':$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,4);break;
			case 'Costly III':$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,3);break;
			case 'Costly II':$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,2);break;
			case 'Costly I':$this->f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,1);break;

			/* Performance Images */
			case 'Bardiche Image':case 'Bastard Sword Icon':case 'Battle Axe Image':case 'Club Image':case 'Crossbow Image':case 'Dagger Image':case 'Empty Image':case 'Falchion Image':case 'Fangs Image':case 'Fire Wand Image':case 'Fishing Pole Image':case 'Flail Image':case 'Hammer Image':case 'Kite Shield Image':case 'Knife Image':case 'Longbow Image':case 'Longsword Image':case 'Mace Image':case 'Poison Dagger Image':case 'Scimitar Image':case 'Shortbow Image':case 'Shortsword Image':case 'Slingshot Image':case 'Small Axe Image':case 'Small Shield Image':case 'Song Image':case 'Spear Image':case 'Spiked Shield Image':case 'Staff Image':case 'Torch Image':case 'Tower Shield Image':case 'Trident Image':case 'Vampiric Bite Image':case 'Wand Image':case 'Warhammer Image':case 'Wooden Shield Image':
				$a_Images=array(
					'Bardiche Image'=>'bardiche_icon',
					'Bastard Sword Image'=>'bastard_sword_icon',
					'Battle Axe Image'=>'battle_axe_icon',
					'Club Image'=>'club_icon',
					'Crossbow Image'=>'crossbow_icon',
					'Dagger Image'=>'dagger_icon',
					'Empty Image'=>'empty_icon',
					'Falchion Image'=>'falchion_icon',
					'Fangs Image'=>'vampiric_bite_icon4',
					'Fire Wand Image'=>'fire_wand_icon',
					'Fishing Pole Image'=>'fishing_pole_icon',
					'Flail Image'=>'flail_icon',
					'Hammer Image'=>'hammer_icon',
					'Kite Shield Image'=>'kite_shield',
					'Knife Image'=>'knife_icon',
					'Longbow Image'=>'longbow_icon',
					'Longsword Image'=>'longsword_icon',
					'Mace Image'=>'mace_icon',
					'Poison Dagger Image'=>'poison_dagger_icon',
					'Poison Flask Image'=>'poison_flask_icon',
					'Scimitar Image'=>'scimitar_icon',
					'Shortbow Image'=>'shortbow_icon',
					'Shortsword Image'=>'shortsword_icon',
					'Slingshot Image'=>'slingshot_icon',
					'Small Axe Image'=>'small_axe_icon',
					'Small Shield Image'=>'small_shield',
					'Song Image'=>'song_icon',
					'Spear Image'=>'spear_icon',
					'Spiked Shield Image'=>'spiked_shield_icon',
					'Staff Image'=>'staff_icon',
					'Torch Image'=>'torch_icon',
					'Tower Shield Image'=>'tower_shield_icon',
					'Trident Image'=>'trident_icon',
					'Vampiric Bite Image'=>'vampiric_bite_icon4',
					'Wand Image'=>'wand_icon',
					'Warhammer Image'=>'warhammer_icon',
					'Wooden Shield Image'=>'wooden_shield_icon'
				);
					$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['image']=$a_Images[$v_Keyword];
				if(!array_key_exists('images',$a_Member[$v_PerformanceName])){break;}
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['images'][(($a_Member[$v_PerformanceName]['images']['left-hand']!=='')?'right':'left').'-hand']=$a_Images[$v_Keyword];
				break;
			/* Defense - Finger Images */
			case 'Ring Image':
				$a_Images=array(
					'Ring Image'=>'ring_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['images']['finger']=$a_Images[$v_Keyword];
				break;
			/* Defense - Hands Images */
			case 'Gauntlets Image':case 'Gold Gauntlets Image':
				$a_Images=array(
					'Gauntlets Image'=>'gauntlets_icon',
					'Gold Gauntlets Image'=>'gold_gauntlets_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['images']['hands']=$a_Images[$v_Keyword];
				break;
			/* Defense - Head Images */
			case 'Helm Image':
				$a_Images=array(
					'Helm Image'=>'helm_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['images']['head']=$a_Images[$v_Keyword];
				break;
			/* Defense - Legs Images */
			case 'Leggings Image':
				$a_Images=array(
					'Leggings Image'=>'leggings_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['images']['legs']=$a_Images[$v_Keyword];
				break;
			/* Defense - Torso Images */
			case 'Gold Plate Mail Image':case 'Leather Breastplate Image':case 'Plate Mail Image':case 'Ringmail Image':case 'Robes Image':case 'Scale Mail Image':case 'Splint Mail Image':
				$a_Images=array(
					'Gold Gauntlets Image'=>'gold_gauntlets_icon',
					'Gold Plate Mail Image'=>'gold_plate_mail_icon',
					'Leather Breastplate Image'=>'leather_breastplate_icon',
					'Plate Mail Image'=>'plate_mail_icon',
					'Ringmail Image'=>'ringmail_icon',
					'Robes Image'=>'robes_icon',
					'Scale Mail Image'=>'scale_mail_icon',
					'Splint Mail Image'=>'splint_mail_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['images']['torso']=$a_Images[$v_Keyword];
				break;

			/* Race Images */
			case 'Angel Image':case 'Barbarian Image':case 'Bat Image':case 'Bear Image':case 'Beholder Image':case 'Dragon Image':case 'Dwarf Image':case 'Elf Image':case 'Ghost Image':case 'Giant Image':case 'Goblin Image':case 'Goliath Image':case 'Halfling Image':case 'Human Image':case 'Lich Image':case 'Mummy Image':case 'Nightstalker Image':case 'Ogre Image':case 'Red Dragon Image':case 'Spider Image':case 'Treant Image':case 'Werewolf Image':case 'Wisp Image':case 'Wolf Image':case 'Wraith Image':case 'Zombie Image':
				$a_Images=array(
					'Angel Image'=>'angel2',
					'Barbarian Image'=>'barbarian',
					'Bat Image'=>'bat2',
					'Bear Image'=>'bear',
					'Beholder Image'=>'beholder',
					'Dragon Image'=>'dragon',
					'Dwarf Image'=>'dwarf',
					'Elf Image'=>'elf_card',
					'Ghost Image'=>'ghost',
					'Giant Image'=>'giant',
					'Goblin Image'=>'goblin_card',
					'Goliath Image'=>'goliath_card',
					'Halfling Image'=>'halfling',
					'Human Image'=>'human_card',
					'Lich Image'=>'lich',
					'Mummy Image'=>'mummy',
					'Nightstalker Image'=>'nightstalker',
					'Ogre Image'=>'ogre',
					'Red Dragon Image'=>'red_dragon_card2',
					'Spider Image'=>'spider',
					'Treant Image'=>'treant',
					'Werewolf Image'=>'werewolf',
					'Wisp Image'=>'wisp_card',
					'Wolf Image'=>'wolf',
					'Wraith Image'=>'wraith',
					'Zombie Image'=>'zombie'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['race-image']=$a_Images[$v_Keyword];
				break;

			case '':default:
				break;
		}
	}
	/* Function - Apply Keywords To Character */
	function f_ApplyKeywordsToCharacter($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		/* Race */
		switch($this->A_Teams[$v_TeamName][$v_MemberID]['race']){
			case 'Barbarian':case 'Bat':case 'Bear':case 'Dragon':case 'Dwarf':case 'Elf':case 'Falcon':case 'Ghost':case 'Giant':case 'Gnome':case 'Goblin':case 'Halfling':case 'Half-Orc':case 'Hell Hound':case 'Human':case 'Lich':case 'Orc':case 'Pixie':case 'Rat':case 'Spider':case 'Skeleton':case 'Vampire':case 'Wisp':case 'Wolf':case 'Wyvern':case 'Zombie':
				switch($a_Member['race']){
					case 'Barbarian':$a_Keywords=array('Barbarian Image','Alive','Communication II','Dumb I','Energy Regeneration I','Flesh','Health I','Inaccurate I','Loudness 6','Mobile','Large-Size','Strength II','Unsusceptible');break;
					case 'Bat':$a_Keywords=array('Bat Image','Alive','Energy Regeneration I','Flesh','Flying','Initiative I','Loudness 2','Tiny-Size','Mobile','Perceptive','Range Of Sense IV','Vision III');break;
					case 'Bear':$a_Keywords=array('Bear Image','Alive','Flesh','Health I','Large-Size','Loudness 7','Mobile','Perceptive','Range Of Sense II','Strength III','Vision I');break;
					case 'Dragon':$a_Keywords=array('Dragon Image','Accuracy II','Alive','Balance II','Block II','Communication II','Detection II','Dragon Scales','Flesh','Flying','Health IV','Intellect II','Loudness 10','Mobile','Noticeability II','Perceptive','Slowness II','Strength II','Tower-Size','Understanding II','Vision II');break;
					case 'Dwarf':$a_Keywords=array('Dwarf Image','Alive','Dumb I','Flesh','Health I','Inaccurate I','Loudness 5','Mobile','Small-Size','Perceptive','Strength II');break;
					case 'Elf':$a_Keywords=array('Elf Image','Alive','Flesh','Intellect I','Loudness 4','Mobile','Small-Size','Perceptive','Range Of Sense IV','Range Of View II');break;
					case 'Falcon':$a_Keywords=array('Alive','Energy Regeneration I','Flesh','Flying','Initiative I','Loudness 4','Small-Size','Mobile','Perceptive','Range Of View IV','Vision IV');break;
					case 'Goblin':$a_Keywords=array('Goblin Image','Alive','Detection II','Dumb III','Fearful','Flesh','Initiative I','Loudness 5','Small-Size','Mobile','Perceptive','Range Of View II','Scurry');break;
					case 'Giant':$a_Keywords=array('Giant Image','Alive','Dumb IV','Flesh','Health IV','Inaccurate II','Giant-Size','Loudness 8','Mobile','Perceptive','Strength IV');break;
					case 'Ghost':$a_Keywords=array('Ghost Image','Communication II','Ethereal','Hover','Intellect II','Loudness 3','Mobile','Poison Immunity','Spirit','Tiny-Size','Unsusceptible','Weak III');break;
					case 'Gnome':$a_Keywords=array('Accuracy I','Alive','Block I','Dodge I','Energy Regeneration I','Flesh','Iniative I','Intellect I','Loudness 3','Small-Size','Mobile','Perceptive','Range Of Sense I','Weak II');break;
					case 'Halfling':$a_Keywords=array('Halfling Image','Accuracy I','Alive','Block I','Dodge II','Energy Regeneration II','Flesh','Loudness 3','Small-Size','Mobile','Perceptive','Range Of Sense I','Weak I');break;
					case 'Hell Hound':$a_Keywords=array('Communication I','Alive','Detection III','Flesh','Health I','Initiative II','Loudness 8','Mobile','Small-Size','Perceptive','Range Of Sense III');break;
					case 'Human':$a_Keywords=array('Human Image','Alive','Energy Regeneration I','Flesh','Loudness 5','Medium-Size','Mobile','Perceptive','Range Of Sense II');break;
					case 'Half-Orc':$a_Keywords=array('Alive','Detection I','Dumb II','Energy Regeneration I','Flesh','Health I','Inaccurate II','Loudness 6','Mobile','Medium-Size','Perceptive','Strength I');break;
					case 'Lich':$a_Keywords=array('Lich Image','Fearless','Flesh','Health Regeneration II','Inaccurate II','Intellect II','Medium-Size','Loudness 2','Mobile','Unsusceptible','Undead','Weak IV');break;
					case 'Orc':$a_Keywords=array('Alive','Detection II','Dumb IV','Flesh','Health II','Inaccurate I','Loudness 6','Mobile','Large-Size','Perceptive','Strength II');break;
					case 'Rat':$a_Keywords=array('Alive','Detection I','Energy Regeneration I','Flesh','Initiative I','Loudness 1','Tiny-Size','Mobile','Perceptive','Range Of Sense III','Vision III');break;
					case 'Skeleton':$a_Keywords=array('Bone','Fearless','Medium-Size','Inaccurate I','Loudness 5','Mobile','Piercing Immunity','Unsusceptible','Undead','Weak II');break;
					case 'Spider':$a_Keywords=array('Spider Image','Alive','Detection II','Initiative III','Loudness 1','Tiny-Size','Mobile','Perceptive','Range Of Sense I','Vision III');break;
					case 'Wisp':$a_Keywords=array('Wisp Image','Communication IV','Ethereal','Hover','Intellect I','Loudness 4','Mobile','Poison Immunity','Spirit','Small-Size','Unsusceptible','Weak II');break;
					case 'Pixie':$a_Keywords=array('Pixie Image','Alive','Communication II','Flesh','Flying','Intellect III','Loudness 2','Mobile','Tiny-Size','Unsusceptible');break;
					case 'Wolf':$a_Keywords=array('Wolf Image','Communication II','Alive','Detection II','Energy Regeneration I','Flesh','Initiative III','Loudness 8','Mobile','Small-Size','Perceptive','Range Of Sense IV');break;
					case 'Wyvern':$a_Keywords=array('Alive','Flesh','Flying','Dumb I','Health I','Loudness 3','Medium-Size','Mobile','Scales','Perceptive');break;
					case 'Zombie':$a_Keywords=array('Zombie Image','Fearless','Flesh','Medium-Size','Health I','Health Regeneration I','Inaccurate II','Loudness 3','Mobile','Unsusceptible','Undead','Weak I');break;
					case 'Vampire':$a_Keywords=array('Almost Alive','Energy Regeneration I','Fearless','Flesh','Health I','Health Regeneration II','Hover','Loudness 4','Medium-Size','Mobile','Perceptive','Range Of Sense III','Range Of View III');break;

					case '':default:$a_Keywords=array();break;
				}
				foreach($a_Keywords as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword);}
				break;
			case '':default:
				break;
		}
		/* Guild */
		switch($this->A_Teams[$v_TeamName][$v_MemberID]['guild']){
			case 'Beast':case 'Cleric':case 'Fighter':case 'Holy':case 'Ranger':case 'Rogue':case 'Unholy':case 'Wizard':
				switch($a_Member['guild']){
					case 'Beast':$a_Keywords=array('Detection IV','Dumb IV','Energy Regeneration II','Range Of View I','Stamina II','Strength I','Understanding II');break;
					case 'Cleric':$a_Keywords=array('Mana I','Understanding II','Intellect II','Stamina I','Strength II');break;
					case 'Fighter':$a_Keywords=array('Accuracy II','Energy Regeneration II','Initiative I','Stamina I','Strength II');break;
					case 'Holy':$a_Keywords=array('Accuracy I','Communication II','Energy Regeneration I','Stamina I','Strength I','Range Of View I','Understanding I');break;
					case 'Ranger':$a_Keywords=array('Accuracy I','Detection I','Energy Regeneration I','Initiative II','Strength I','Vision I','Range Of View I');break;
					case 'Rogue':$a_Keywords=array('Accuracy II','Energy Regeneration I','Initiative II','Stealth II','Strength I');break;
					case 'Unholy':$a_Keywords=array('Detection II','Intellect II','Mana I','Stealth I','Understanding II');break;
					case 'Wizard':$a_Keywords=array('Concentration Regeneration I','Intellect II','Mana II','Understanding II','Vision I');break;
					case '':default:$a_Keywords=array();break;
				}
				foreach($a_Keywords as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword);}
				break;
			case '':default:
				break;
		}
		/* Training */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['training'] as $v_TrainingTier=>$v_TrainingName){
			switch($v_TrainingName){
				case 'Accuracy II':case 'Human Accuracy':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Accuracy II');break;
				case 'Accuracy I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Accuracy I');break;
				case 'Balance II':case 'Skeleton Balance':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Balance II');break;
				case 'Balance I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Balance I');break;
				case 'Battle Readiness II':case 'Barbarian Readiness':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Energy Regeneration II');break;
				case 'Battle Readiness I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Energy Regeneration I');break;
				case 'Block II':case 'Zombie Block':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Block II');break;
				case 'Block I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Block I');break;
				case 'Communication II':case 'Pixie Communication':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Communication II');break;
				case 'Communication I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Communication I');break;
				case 'Detection II':case 'Orc Detection':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Detection II');break;
				case 'Detection I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Detection I');break;
				case 'Dodge II':case 'Halfling Dodge':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Dodge II');break;
				case 'Dodge I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Dodge I');break;
				case 'Intellect II':case 'Elf Intellect':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Intellect II');break;
				case 'Intellect I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Intellect I');break;
				case 'Stealth II':case 'Gnome Stealth':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Stealth II');break;
				case 'Stealth I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Stealth I');break;
				case 'Strength II':case 'Dwarf Strength':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Strength II');break;
				case 'Strength I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Strength I');break;
				case 'Understanding II':case 'Troll Understanding':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Understanding II');break;
				case 'Understanding I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Understanding I');break;
				case 'Vision II':case 'Giant Vision':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Vision II');break;
				case 'Vision I':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Vision I');break;

				case 'Bat Protection':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Protection I');break;
				case 'Spider Sense':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Detection I');$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Vision I');break;
				case 'Goblin Initiative':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Initiative I');break;

				case 'Archer III':foreach(array('Accuracy I','Range Of View I','Strength I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Archer II':case 'Hobgoblin Archer':foreach(array('Range Of View I','Strength I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Archer I':foreach(array('Range Of View I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Tracker III':foreach(array('Detection I','Range Of View I','Vision I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Tracker II':case 'Kobold Tracker':foreach(array('Range Of View I','Vision I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Tracker I':foreach(array('Range Of View I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Elementalist III':foreach(array('Damage I','Range Of View I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Elementalist II':case 'Dryad Elementalist':foreach(array('Range Of View I','Damage Boost I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Elementalist I':foreach(array('Range Of View I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;

				case 'Caster III':foreach(array('Intellect II','Range Of View I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Caster II':case 'Half-Elf Caster':foreach(array('Range Of View I','Intellect I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Caster I':foreach(array('Range Of View I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;

				case 'Gladiator III':foreach(array('Accuracy I','Damage I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Gladiator II':case 'Ogre Gladiator':foreach(array('Accuracy I','Damage Chances I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Gladiator I':foreach(array('Damage Boost I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Battler III':foreach(array('Critical Boost II','Effect Chances I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Battler II':case 'Ogre Gladiator':foreach(array('Critical Boost I','Effect Chances I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Battler I':foreach(array('Effect Boost I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Executioner III':foreach(array('Strength I','Critical Chances II') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Executioner II':case 'Goliath Executioner':foreach(array('Strength I','Effect Chances I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Executioner I':foreach(array('Effect Boost I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Performer III':foreach(array('Critical Chances I','Effect I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Performer II':case 'Angel Performer':foreach(array('Critical Boost I','Effect Chances I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Performer I':foreach(array('Effect Boost I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				case 'Runner III':foreach(array('Energy Regeneration I','Iniative I','Strength I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Runner II':case 'Wolf Runner':foreach(array('Iniative I','Energy Regeneration I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Runner I':foreach(array('Energy Regeneration I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Defender III':foreach(array('Protection I','Blunt Resistance I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'defense');}break;
				case 'Defender II':case 'Half-Orc Defender':foreach(array('Block I','Slashing Resistance I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'defense');}break;
				case 'Defender I':foreach(array('Piercing Resistance I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'defense');}break;

				case 'Lich Ruler':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Aura Of Death');break;
				case 'Packmaster':foreach(array('Detection I','Initiative II','Stealth I','Strength I','Vision I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'defense');}break;
				case 'Dragon Claws':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Damage III','attack');break;
				case 'Dragon Power':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Health Regeneration II');break;
				case 'Heat Immunity':$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Heat Immunity');break;
				case 'Ancient Zeal Order':foreach(array('Health I','Stamina I','Mana I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'defense');}break;

				case '':default:
					break;
			}
		}
		$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,'Range '.$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['Loudness'],'communicate');
		/* Abilities */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['abilities'] as $v_PerformanceName=>$v_AbilityName){
			switch($v_AbilityName){
				/* Magic - Area - Friendly */
				case 'Healing Circle':foreach(array('Enchantment','Area','Effect Duration IV','Healing','Time To Perform I','Range I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				/* Magic - Target - Hostile */
				case 'Magic Missile':foreach(array('Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Critical I','Effect II','Piercing I','Projectile','Range B','Range C','Range D','Time To Perform I','Use Arcane Focus','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Fire Bolt':foreach(array('Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Critical I','Effect II','Heat I','Projectile','Range B','Range C','Range D','Time To Perform II','Use Arcane Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Flamebreath':foreach(array('Advanced Challenge','Critical Duration IV','Critical Boost I','Damage Boost II','Deadly','Effect Duration III','Heat I','Range II','Range B','Range C','Range VII','Targeted','Time To Perform II','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Incinerate':foreach(array('Advanced Challenge','Area','Area Range IV','Critical IV','Critical Duration IV','Damage IV','Deadly','Effect Duration III','Effect IV','Heat II','Range I','Time To Perform IV','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				/* Action - Area - Hostile */
				case 'Fierce Growl':foreach(array('Challenge','Area','Area Range IV','Effect Duration II','Fear','Hostile','Range I','Time To Perform I','Recovery IV','Use Communication','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Ghostly Wail':foreach(array('Challenge','Area','Area Range III','Effect Duration II','Fear','Hostile','Range I','Time To Perform I','Recovery III','Use Communication','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Moan And Groan':foreach(array('Challenge','Area','Effect Duration IV','Fear','Hostile','Range I','Time To Perform II','Costly I','Use Communication','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Ground Pound':foreach(array('Challenge','Area','Area Range IV','Effect Duration II','Knock-Down','Hostile','Time To Perform IV','Range I','Recovery II','Use Strength','Must Stand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				/* Action - Target - Hostile */
				case 'Bite':foreach(array('Advanced Challenge','Critical I','Critical Duration IV','Effect I','Effect Duration III','Hostile','Instant','Piercing I','Time To Perform I','Range A','Targeted','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Vampiric Bite':foreach(array('Vampiric Bite Image','Challenge','Critical Duration IV','Effect Duration III','Hostile','Instant','Time To Perform I','Range I','Targeted','Vampiric Bite','Use Strength','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Spit Poison':foreach(array('Advanced Challenge','Critical Duration IV','Effect Duration III','Hostile','Poison I','Range B','Range V','Targeted','Time To Perform II','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Spin Kick':foreach(array('Advanced Challenge','Blunt II','Critical I','Critical Duration III','Deadly','Effect II','Effect Duration II','Instant','Range A','Targeted','Time To Perform II','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Aura Of Decay':foreach(array('Challenge','Area','Area Range II','Effect Duration IV','Hostile','Other','Decay','Range I','Time To Perform III','Use Intellect','Anti-Health') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Death From Above':foreach(array('Challenge','Hostile','Other','Death II','Range A','Targeted','Time To Perform III','Attacker Decrease I','Use Accuracy','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Pacify Beast':foreach(array('Challenge','Hostile','Other','Pacify','Range A','Range III','Targeted','Time To Perform III','Attacker Decrease I','Use Communication','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Aura Of Death':foreach(array('Challenge','Area','Area Range III','Hostile','Death I','Other','Range I','Time To Perform IV','Costly II','Attacker Decrease I','Use Intellect','Anti-Health') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Word Of Retribution':foreach(array('Challenge','Area','Area Range III','Hostile','Other','Range I','Retribution I','Time To Perform II','Attacker Decrease II','Use Intellect','Anti-Health') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Trip':foreach(array('Challenge','Effect Duration II','Knock-Down','Hostile','Targeted','Time To Perform II','Range A','Use Strength','Must Balance') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				/* Action - Friendly */
				case 'War Cry':foreach(array('Enchantment','Effect Duration IV','Instant','Marksman','Time To Perform I','Range I','Recovery I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Heightened Focus':foreach(array('Enchantment','Effect Duration IV','Instant','Focus','Time To Perform I','Range I','Recovery I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'magic');}break;
				case 'Howl':foreach(array('Enchantment','Area','Area Range III','Effect Duration II','Marksman','Time To Perform I','Range I','Recovery I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Song Of The Ages':foreach(array('Enchantment','Area','Area Range IV','Effect Duration III','Rejuvenate','Time To Perform I','Range I','Recovery I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Rejuvenate':foreach(array('Enchantment','Effect Duration IV','Instant','Rejuvenate','Time To Perform I','Range I','Recovery I') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				/* Action - Target - Friendly */
				case 'Bandage Wound':foreach(array('Enchantment','Effect Duration IV','Time To Perform I','Range I','Replenish','Targeted') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				/* Action - Throw Dirt */
				case 'Throw Dirt':foreach(array('Challenge','Area','Area Range II','Effect Duration II','Dust Cloud','Hostile','Range I','Time To Perform I','Recovery II','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				/* Hostile Challenges */
				case 'Trip':foreach(array('Challenge','Effect Duration II','Hostile','Range I','Knock-Down','Targeted','Time To Perform I','Costly I','Use Strength','Must Balance') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Fling Rocks':foreach(array('Challenge','Blunt I','Effect I','Effect Duration IV','Hostile','Range B','Targeted','Time To Perform I','Use Battle Focus','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				case '':default:
					break;
			}
		}
		/* 1 - A */
		/* Lootable Items */
		$a_LootableItems=array('face'=>false,'feet'=>false,'fingers'=>false,'hands'=>false,'head'=>false,'left-hand'=>false,'legs'=>false,'neck'=>false,'right-hand'=>false,'torso'=>false,'waist'=>false);
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['lootable-items'] as $v_ItemSlot=>$v_ItemName){
			$a_LootableItems[$v_ItemSlot]=true;
			switch($v_ItemName){
				case 'Temple Crossbow':foreach(array('Crossbow Image','Advanced Challenge','Blessed','Critical Duration IV','Deadly','Effect Duration III','Medium','Range II','Range B','Range C','Range VII','Sharp','Piercing I','Projectile','Targeted','Two-Handed','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Knight Of Zeal Helm':foreach(array('Cloth Of The King','Knight Helm','Leather Hide','Medium','Metal Plates','Protective','Spider-Silk Inserts','Very Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Knight Of Zeal Platemail':foreach(array('Gold Plate Mail Image','Cloth Of The King','Cotton Padding','Heavy','Metal Plates','Spider-Silk Inserts','Tough Leather Hide','Very Protective','Very Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Knight Of Zeal Gauntlets':foreach(array('Cloth Of The King','Leather Hide','Medium','Metal Plates','Spider-Silk Inserts','Protective','Very Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Knight Of Zeal Greaves':foreach(array('Cloth Of The King','Cotton Padding','Heavy','Metal Links','Metal Plates','Tough Leather Hide','Very Protective','Very Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Knight Of Zeal Boots':foreach(array('Cloth Of The King','Leather Hide','Medium','Metal Plates','Spider-Silk Inserts','Protective','Very Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Helm':foreach(array('Close Helm','Cloth','Cotton Padding','Half-Leather Hide','Medium','Metal Plates','Protective','Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Platemail':foreach(array('Plate Mail Image','Cloth','Cotton Padding','Heavy','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Gauntlets':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Medium','Metal Plates','Protective','Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Greaves':foreach(array('Cloth','Cotton Padding','Heavy','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Boots':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Medium','Metal Plates','Protective','Reflective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Spiked Helm':foreach(array('Close Helm','Cotton Padding','Half-Leather Hide','Metal Plates','Protective','Reflective','Small Metal Spikes','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Spiked Gauntlets':foreach(array('Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Small Metal Spikes','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Spiked Boots':foreach(array('Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Small Metal Spikes','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Chainmail':foreach(array('Ringmail Image','Cloth','Cotton Padding','Heavy','Leather Hide','Metal Links','Protective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Mantle':foreach(array('Cloth','Cotton Padding','Half-Leather Hide','Hood','Medium','Metal Links','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Glovelettes':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Medium','Metal Links','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Leggings':foreach(array('Cloth','Cotton Padding','Heavy','Leather Hide','Metal Links','Protective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Waders':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Medium','Metal Links','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Decaying Hat':foreach(array('Black Cloth','Magical','Rune-Lined','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Decaying Robe':foreach(array('Black Cloth','Magical','Protective','Rune-Lined','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Decaying Pantaloons':foreach(array('Black Cloth','Magical','Protective','Rune-Lined','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Soul-Trapped Handwraps':foreach(array('Black Cloth','Magical','Rune-Covered','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Soul-Trapped Sandals':foreach(array('Black Cloth','Magical','Rune-Covered','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Lizard-Skin Handwraps':foreach(array('Cloth','Lizard Skin','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Lance':foreach(array('Spear Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Heavy','Piercing I','Range B','Reflective','Sharp','Targeted','Long Metal Rod','Thrusting Blade','Two-Handed','Well-Built','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Poison-Tipped Dagger':foreach(array('Dagger Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Poison I','Range I','Reflective','Sharp','Targeted','Short Blade','Thrusting Blade','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Longsword':foreach(array('Longsword Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Main','Medium','Range II','Range III','Reflective','Sharp','Slashing I','Targeted','Very Long Blade','Well-Built','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Stalagmite':foreach(array('Mace Image','Advanced Challenge','Blunt II','Critical Duration VI','Deadly','Effect Duration V','Extremely Heavy','Very Large Metal Sphere','Range II','Range B','Range V','Recover II','Targeted','Use Strength','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Mace':foreach(array('Mace Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Main','Metal Sphere','Protective','Range A','Short Wooden Rod','Targeted','Very Light','Well-Built','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Staff Of Voices':foreach(array('Staff Image','Advanced Challenge','Critical II','Critical Duration V','Effect III','Effect Duration IV','Hostile','Light','Range A','Range B','Long Wooden Rod','Sonic II','Targeted','Two-Handed','Recovery I','Use Intellect','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case '':default:
					$a_LootableItems[$v_ItemSlot]=false;
					break;
			}
		}
		/* 1 - B */
		/* Items */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['items'] as $v_ItemSlot=>$v_ItemName){
			if($a_LootableItems[$v_ItemSlot]||$v_ItemSlot=='right-hand'){$v_ItemName='default';}
			switch($v_ItemName){
				/* Steel Plate Armor */
				case 'Steel Helm':foreach(array('Close Helm','Cloth','Cotton Padding','Half-Leather Hide','Heavy','Metal Plates','Protective','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Platemail':foreach(array('Plate Mail Image','Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Gauntlets':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Heavy','Metal Plates','Protective','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Greaves':foreach(array('Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Boots':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Heavy','Metal Plates','Protective','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Iron Plate Armor */
				case 'Iron Helm':foreach(array('Close Helm','Cloth','Cotton Padding','Half-Leather Hide','Heavy','Metal Plates','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Platemail':foreach(array('Plate Mail Image','Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Reflective','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Gauntlets':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Heavy','Metal Plates','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Greaves':foreach(array('Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Reflective','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Boots':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Heavy','Metal Plates','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Steel Armor */
				case 'Steel Chainmail':foreach(array('Ringmail Image','Cloth','Cotton Padding','Heavy','Leather Hide','Metal Links','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Mantle':foreach(array('Cloth','Cotton Padding','Half-Leather Hide','Hood','Medium','Metal Links') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Glovelettes':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Medium','Metal Links') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Leggings':foreach(array('Cloth','Cotton Padding','Heavy','Leather Hide','Metal Links','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Waders':foreach(array('Cloth','Fleece Lining','Half-Leather Hide','Medium','Metal Links') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Iron Armor */
				case 'Iron Chainmail':foreach(array('Ringmail Image','Cotton Padding','Heavy','Leather Hide','Metal Links','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Mantle':foreach(array('Cotton Padding','Half-Leather Hide','Hood','Medium','Metal Links') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Glovelettes':foreach(array('Fleece Lining','Half-Leather Hide','Medium','Metal Links') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Leggings':foreach(array('Cotton Padding','Heavy','Leather Hide','Metal Links','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Waders':foreach(array('Fleece Lining','Half-Leather Hide','Medium','Metal Links') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Leather Armor */
				case 'Leather Cloak':foreach(array('Cloth','Cotton Padding','Half-Leather Hide','Hood','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Leather Tunic':foreach(array('Leather Breastplate Image','Cloth','Cotton Padding','Leather Hide','Medium','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Leather Gloves':foreach(array('Fleece Lining','Half-Leather Hide','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Leather Pants':foreach(array('Cloth','Cotton Padding','Leather Hide','Medium','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Leather Shoes':foreach(array('Cloth','Cotton Padding','Half-Leather Hide','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Heavy Cloth Armor */
				case 'Heavy Cloth Hat':foreach(array('Cloth','Cotton Padding','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Heavy Cloth Shirt':foreach(array('Robes Image','Cloth','Cotton Padding','Light','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Heavy Cloth Handwraps':foreach(array('Cloth','Fleece Lining','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Heavy Cloth Pantaloons':foreach(array('Cloth','Cotton Padding','Light','Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Heavy Cloth Sandals':foreach(array('Cloth','Cotton Padding','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Black Cloth Armor */
				case 'Black Cloth Hat':foreach(array('Black Cloth','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Black Cloth Shirt':foreach(array('Robes Image','Black Cloth','Protective','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Black Cloth Handwraps':foreach(array('Black Cloth','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Black Cloth Pantaloons':foreach(array('Black Cloth','Protective','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Black Cloth Sandals':foreach(array('Black Cloth','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Cloth Armor */
				case 'Cloth Hat':foreach(array('Cloth','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cloth Shirt':foreach(array('Robes Image','Cloth','Protective','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cloth Handwraps':foreach(array('Cloth','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cloth Pantaloons':foreach(array('Cloth','Protective','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cloth Sandals':foreach(array('Cloth','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Crude Cloth Armor */
				case 'Crude Shirt':foreach(array('Robes Image','Cotton Padding','Fur Patches','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Crude Loincloth':foreach(array('Fur Patches','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Fishing Clothes */
				case 'Fishing Shirt':foreach(array('Leather Breastplate Image','Cotton Padding','Leather Hide','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fishing Pants':foreach(array('Cotton Padding','Half-Leather Hide','Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* W e a p o n s */
				case 'Electrical Jolt':foreach(array('Fangs Image','Advanced Challenge','Damage Boost II','Deadly','Effect I','Effect Duration IV','Electrical I','Range A','Targeted','Two-Handed','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cold Ghostly Strands':foreach(array('Fangs Image','Advanced Challenge','Cold I','Deadly','Effect Duration IV','Range A','Targeted','Two-Handed','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Oak Light Crossbow':foreach(array('Crossbow Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Medium','Range II','Range B','Range C','Range VII','Sharp','Piercing I','Projectile','Targeted','Two-Handed','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Light Crossbow':foreach(array('Crossbow Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Medium','Range II','Range B','Range C','Range VII','Piercing I','Projectile','Targeted','Two-Handed','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Fishing Pole */
				case 'Fishing Pole':foreach(array('Fishing Pole Image','Challenge','Effect Duration IV','Hostile','Light','Long Wooden Rod','Lure','Range B','Range C','Range D','Targeted','Two-Handed','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Lance */
				case 'Steel Lance':foreach(array('Spear Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range B','Reflective','Sharp','Targeted','Long Metal Rod','Thrusting Blade','Two-Handed','Very Heavy','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Lance':foreach(array('Spear Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range B','Reflective','Targeted','Long Metal Rod','Thrusting Blade','Two-Handed','Very Heavy','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Spear */
				case 'Oak Spear':foreach(array('Spear Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range B','Heavy','Reflective','Sharp','Targeted','Long Wooden Rod','Thrusting Blade','Two-Handed','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Spear':foreach(array('Spear Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range B','Heavy','Reflective','Targeted','Long Wooden Rod','Thrusting Blade','Two-Handed','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Dagger */
				case 'Black Steel Dagger':foreach(array('Dagger Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Piercing I','Range I','Sharp','Targeted','Short Blade','Thrusting Blade','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Dagger':foreach(array('Dagger Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Piercing I','Range I','Sharp','Targeted','Short Blade','Thrusting Blade','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Dagger':foreach(array('Dagger Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Piercing I','Range I','Targeted','Short Blade','Thrusting Blade','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Rapier */
				case 'Steel Rapier':foreach(array('Dagger Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Piercing I','Range II','Range III','Sharp','Targeted','Long Blade','Protected Handle','Thrusting Blade','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Rapier':foreach(array('Dagger Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Piercing I','Range II','Range III','Targeted','Long Blade','Protected Handle','Thrusting Blade','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Longsword */
				case 'Steel Longsword':foreach(array('Longsword Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Heavy','Main','Range II','Range III','Reflective','Sharp','Slashing I','Targeted','Very Long Blade','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Longsword':foreach(array('Longsword Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Heavy','Main','Range II','Range III','Reflective','Slashing I','Targeted','Very Long Blade','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Leather Whip':foreach(array('Slingshot Image','Advanced Challenge','Critical Duration IV','Deadly','Effect I','Effect Duration III','Leather Cord','Main','Range B','Sharp','Slashing I','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cotton Whip':foreach(array('Slingshot Image','Advanced Challenge','Critical Duration IV','Deadly','Effect I','Effect Duration III','Leather Cord','Main','Range B','Slashing I','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Steel Shuriken':foreach(array('Small Axe Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Short Blade','Main','Projectile','Range II','Range B','Range C','Reflective','Sharper','Slashing I','Very Light','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Shuriken':foreach(array('Small Axe Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Short Blade','Main','Projectile','Range II','Range B','Range C','Reflective','Sharp','Slashing I','Very Light','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Steel Hand-Axe':foreach(array('Small Axe Image','Advanced Challenge','Axe Blade','Critical Duration IV','Deadly','Effect Duration III','Heavy','Short Blade','Main','Projectile','Range II','Range B','Range C','Reflective','Sharp','Slashing I','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Hand-Axe':foreach(array('Small Axe Image','Advanced Challenge','Axe Blade','Critical Duration IV','Deadly','Effect Duration III','Heavy','Short Blade','Main','Projectile','Range II','Range B','Range C','Reflective','Slashing I','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Steel Battle Axe':foreach(array('Battle Axe Image','Advanced Challenge','Axe Blade','Critical Duration IV','Deadly','Effect Duration III','Long Blade','Range II','Range III','Reflective','Sharp','Slashing I','Targeted','Very Heavy','Use Strength','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Battle-Axe':foreach(array('Battle Axe Image','Advanced Challenge','Axe Blade','Critical Duration IV','Deadly','Effect Duration III','Long Blade','Range II','Range III','Reflective','Slashing I','Targeted','Very Heavy','Use Strength','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Steel Flail':foreach(array('Flail Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Heavy','Main','Metal Sphere','Range II','Range III','Sharp','Short Wooden Rod','Small Metal Spikes','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Flail':foreach(array('Flail Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Heavy','Main','Metal Sphere','Range II','Range III','Short Wooden Rod','Small Metal Spikes','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Oak Nunchuck':foreach(array('Flail Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Main','Medium','Range A','Protective','Short Metal Chain','Short Wooden Rod','Short Wooden Rod','Targeted','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Nunchuck':foreach(array('Flail Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Main','Medium','Range A','Short Metal Chain','Short Wooden Rod','Short Wooden Rod','Targeted','Use Accuracy','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Steel Mace':foreach(array('Mace Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Metal Sphere','Protective','Range A','Short Wooden Rod','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Mace':foreach(array('Mace Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Metal Sphere','Range A','Short Wooden Rod','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Oak Longbow':foreach(array('Longbow Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Medium','Range C','Range D','Range E','Sharp','Piercing I','Projectile','Targeted','Two-Handed','Use Battle Focus','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Longbow':foreach(array('Longbow Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Medium','Range C','Range D','Range E','Piercing I','Projectile','Targeted','Two-Handed','Use Battle Focus','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Oak Shortbow':foreach(array('Shortbow Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Medium','Range B','Range C','Range D','Sharp','Piercing I','Projectile','Targeted','Two-Handed','Use Battle Focus','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Shortbow':foreach(array('Shortbow Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Medium','Range B','Range C','Range D','Piercing I','Projectile','Targeted','Two-Handed','Use Battle Focus','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Leather Sling':foreach(array('Slingshot Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Range B','Sharp','Projectile','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cotton Sling':foreach(array('Slingshot Image','Advanced Challenge','Blunt I','Critical Duration IV','Deadly','Effect Duration III','Light','Main','Range B','Projectile','Targeted','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Deadly Fangs':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Lethal','Piercing II','Range I','Sharpest','Short Blade','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Razor Fangs':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range I','Sharpest','Short Blade','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Very Sharp Fangs':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range I','Sharper','Short Blade','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Poisonous Fangs':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Poison I','Range I','Sharp','Short Blade','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Sharp Fangs':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range I','Sharp','Short Blade','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fangs':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Piercing I','Range I','Short Blade','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Deadly Claws':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Lethal','Range I','Sharpest','Short Blade','Slashing II','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Razor Claws':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Range I','Sharpest','Short Blade','Slashing I','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Very Sharp Claws':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Range I','Sharper','Short Blade','Slashing I','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Sharp Claws':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Range I','Sharp','Short Blade','Slashing I','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Claws':foreach(array('Fangs Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Range I','Short Blade','Slashing I','Targeted','Two-Handed','Very Light','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Oak Torch':foreach(array('Torch Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration V','Heat I','Light','Main','Protective','Range A','Short Wooden Rod','Targeted','Torchlight','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Torch':foreach(array('Torch Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration V','Heat I','Hostile','Light','Main','Range A','Short Wooden Rod','Targeted','Torchlight','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case 'Oak Staff':foreach(array('Staff Image','Challenge','Effect Duration II','Hostile','Knock-Down','Medium','Range A','Long Wooden Rod','Protective','Targeted','Two-Handed','Recovery I','Use Strength','Must Balance') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Staff':foreach(array('Staff Image','Challenge','Effect Duration II','Hostile','Knock-Down','Medium','Range A','Long Wooden Rod','Targeted','Two-Handed','Recovery I','Use Strength','Must Balance') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* W a n d s */
				case 'Wand Of Fire Bolt':foreach(array('Wand Image','Advanced Challenge','Heat I','Critical Duration IV','Deadly','Effect Duration III','Main','Protective','Range B','Range C','Range D','Short Wooden Rod','Targeted','Very Light','Use Arcane Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Wand Of Magic Missile':foreach(array('Wand Image','Advanced Challenge','Critical Duration IV','Deadly','Effect Duration III','Main','Piercing I','Protective','Range B','Range C','Range D','Short Wooden Rod','Targeted','Very Light','Use Arcane Focus','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case '':
					if($v_ItemSlot=='left-hand'){
						$this->A_Teams[$v_TeamName][$v_MemberID]['items'][$v_ItemSlot]='Bare Hand';
						/* Bare Hand */
						foreach(array('Advanced Challenge','Blunt I','Main','Range I','Very Light','Attacker Decrease II','Use Battle Focus','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}
						break;
					}else if($this->A_Teams[$v_TeamName][$v_MemberID]['race']!=='Construct'){
						switch($v_ItemSlot){
							case 'feet':case 'hands':case 'head':case 'legs':case 'torso':
								foreach(array('Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}
								break;
							case '':default:
									break;
						}
					}
					break;

				default:
					break;
			}
		}
		/* 2 - A */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['lootable-items'] as $v_ItemSlot=>$v_ItemName){
			if($a_LootableItems[$v_ItemSlot]){$v_ItemName='';}
			$a_LootableItems[$v_ItemSlot]=true;
			switch($v_ItemName){
				/* Weapons */
				case 'Poison-Tipped Knife':foreach(array('Knife Image','Light','Offhand','Reflective','Sharp','Short Blade','Thrusting Blade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Fine Steel Shortsword':foreach(array('Shortsword Image','Long Blade','Offhand','Range A','Reflective','Sharp','Well-Built','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Oak Spiked Club':foreach(array('Club Image','Medium','Offhand','Protective','Range II','Short Wooden Rod','Small Metal Spikes') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Spiked Club':foreach(array('Club Image','Medium','Offhand','Range II','Short Wooden Rod','Small Metal Spikes') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				/* Shields */
				case 'Fine Steel Tower Shield':foreach(array('Tower Shield Image','Heavy','Metal Plates','Rectangular Shield','Reflective','Shield','Very Protective','Well-Built') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Spiked Shield':foreach(array('Spiked Shield Image','Heavy','Metal Plates','Circular Shield','Large Metal Spikes','Protective','Reflective','Shield') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Spiked Shield':foreach(array('Spiked Shield Image','Heavy','Metal Plates','Circular Shield','Large Metal Spikes','Reflective','Shield') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case '':default:
					$a_LootableItems[$v_ItemSlot]=false;
					break;
			}
		}
		/* 2 - B */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['items'] as $v_ItemSlot=>$v_ItemName){
			if($a_LootableItems[$v_ItemSlot]){$v_ItemName='';}
			switch($v_ItemName){
				/* Weapons */
				case 'Black Steel Knife':foreach(array('Knife Image','Light','Offhand','Sharp','Short Blade','Thrusting Blade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Knife':foreach(array('Knife Image','Light','Offhand','Reflective','Sharp','Short Blade','Thrusting Blade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Knife':foreach(array('Knife Image','Light','Offhand','Reflective','Short Blade','Thrusting Blade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Shortsword':foreach(array('Shortsword Image','Light','Long Blade','Offhand','Range A','Reflective','Sharp') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Shortsword':foreach(array('Shortsword Image','Light','Long Blade','Offhand','Range A','Reflective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Oak Club':foreach(array('Club Image','Light','Short Wooden Rod','Offhand','Protective','Range II') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Club':foreach(array('Club Image','Light','Short Wooden Rod','Offhand','Range II') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				/* Shields */
				case 'Steel Tower Shield':foreach(array('Tower Shield Image','Metal Plates','Rectangular Shield','Reflective','Shield','Very Heavy','Very Protective') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Tower Shield':foreach(array('Tower Shield Image','Metal Plates','Protective','Rectangular Shield','Reflective','Shield','Very Heavy') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Steel Shield':foreach(array('Wooden Shield Image','Circular Shield','Light','Metal Plates','Protective','Reflective','Shield') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Iron Shield':foreach(array('Wooden Shield Image','Circular Shield','Light','Metal Plates','Protective','Reflective','Shield') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Oak Buckler':foreach(array('Small Shield Image','Circular Buckler','Light','Protective','Shield') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case 'Cedar Buckler':foreach(array('Small Shield Image','Circular Buckler','Light','Shield') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;

				case '':
					if($v_ItemSlot=='right-hand'){
						$this->A_Teams[$v_TeamName][$v_MemberID]['items'][$v_ItemSlot]='Bare Hand';
						/* Bare Hand */
						foreach(array('Offhand','Very Light') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}
					}
					break;

				default:
					break;
			}
		}
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['training'] as $v_TrainingTier=>$v_TrainingName){
			switch($v_TrainingName){
				case 'Ferocity Of The Hound':foreach(array('Use Strength') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'attack');}break;
				case '':default:
					break;
			}
		}
		/* Abilities */
		/* Left-Hand */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['abilities'] as $v_PerformanceName=>$v_AbilityName){
			switch($v_AbilityName){
				/* Action - Target - Hostile */
				case 'Back-Stab':foreach(array('Advanced Challenge','Critical I','Critical Duration IV','Damage III','Deadly','Effect I','Effect Duration III','Left-Hand II','Time To Perform III','Recovery I','Range I','Sneaking','Targeted','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Pounce':foreach(array('Advanced Challenge','Critical I','Critical Duration IV','Damage II','Deadly','Effect I','Effect Duration III','Instant','Left-Hand II','Time To Perform III','Costly I','Range A','Sneaking','Targeted','Use Accuracy','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				/* Hostile Challenges */
				case 'Strong Strike':foreach(array('Advanced Challenge','Critical I','Critical Duration IV','Effect II','Effect Duration III','Deadly','Left-Hand II','Left-Hand Range','Time To Perform II','Targeted','Use Strength','Must Dodge') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Unexpected Strike':foreach(array('Advanced Challenge','Critical Duration IV','Effect I','Effect Duration III','Hostile','Instant','Left-Hand I','Left-Hand Range','Time To Perform I','Costly I','Targeted','Use Accuracy','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Quick Strike':foreach(array('Advanced Challenge','Critical I','Critical Duration IV','Effect I','Effect Duration III','Hostile','Instant','Left-Hand II','Left-Hand Range','Time To Perform I','Costly I','Targeted','Use Accuracy','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Precise Strike':foreach(array('Advanced Challenge','Critical Duration IV','Effect Duration III','Deadly','Instant','Left-Hand I','Left-Hand Range','Time To Perform I','Costly I','Targeted','Attacker Increase I','Use Accuracy','Must Block') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Cleave':foreach(array('Advanced Challenge','Area','Area Range II','Critical Duration III','Effect Duration II','Deadly','Left-Hand I','Range I','Time To Perform I','Costly I','Attacker Decrease I','Use Strength','Must Evade') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Taunt':foreach(array('Challenge','Effect Duration II','Hostile','Lure','Communicate Range','Targeted','Time To Perform I','Use Communication','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;
				case 'Lure':foreach(array('Challenge','Effect Duration IV','Hostile','Lure','Communicate Range','Targeted','Time To Perform I','Recovery II','Use Communication','Must Understand') as $v_Key=>$v_Keyword){$this->f_ApplyKeywordToCharacter($v_TeamName,$v_MemberID,$v_Keyword,'action');}break;

				case '':default:
					break;
			}
		}
		/* Morale */
		/* Special */
	}
	/* Function - Prepare Character */
	function f_PrepareCharacter($v_TeamName,$v_MemberID){
		foreach(array('action','attack','communicate','magic') as $v_Key=>$v_PerformanceName){
			$v_FirstRange='';$v_LastRange='';
			foreach($this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range'] as $v_RangeName=>$v_State){if($v_State){if($v_FirstRange!==''){$v_LastRange=$v_RangeName;}else{$v_FirstRange=$v_RangeName;}}}
			$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range-start']=$v_FirstRange;
			$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range-end']=$v_LastRange;
			if($this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']<1){$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']=1;}
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['carrying-weight']+=$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength'];

		$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum'];

		$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['soft-maximum'];

		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Arcane Focus']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Battle Focus']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Evasion']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Footing']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']+$this->A_Teams[$v_TeamName][$v_MemberID]['carrying-weight'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Observation']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision'])/2);
	}
	/* Function - Calculate End Of Quest Morale Conditions */
	function f_CalculateEndOfQuestMoraleConditions($v_TeamName){
		$a_MoraleMax=array();
		$a_MoraleMax['damage-inflicted']=max($this->A_Statistics[$v_TeamName]['damage-inflicted-by-character']);
		$a_MoraleMax['kills']=max($this->A_Statistics[$v_TeamName]['kills-by-character']);
		$a_MoraleMax['stamina-loss']=max($this->A_Statistics[$v_TeamName]['stamina-loss-by-character']);
		$a_MoraleMax['mana-loss']=max($this->A_Statistics[$v_TeamName]['mana-loss-by-character']);
		foreach($a_MoraleMax as $v_MaxName=>$v_MaxValue){
			switch($v_MaxName){
				case 'kills':if($v_MaxValue<=1){unset($a_MoraleMax[$v_MaxName]);}break;
				case 'damage-inflicted':if($v_MaxValue<=3){unset($a_MoraleMax[$v_MaxName]);}break;
				case 'mana-loss':if($v_MaxValue<=6){unset($a_MoraleMax[$v_MaxName]);}break;
				case 'stamina-loss':if($v_MaxValue<=12){unset($a_MoraleMax[$v_MaxName]);}break;
				default:break;
			}
		}
		$a_MoraleConditions=array();
		$a_MoraleConditionNames=array('damage-inflicted'=>'Most Dangerous','kills'=>'Most Deadly','mana-loss'=>'Best Magic','stamina-loss'=>'Best Performance');
		foreach($this->A_Statistics[$v_TeamName]['characters'] as $v_MemberID=>$v_MemberName){
			if($this->A_Statistics[$v_TeamName]['deaths-by-character'][$v_MemberID]<=0){
				foreach($a_MoraleMax as $v_MaxName=>$v_MaxValue){
					if(!array_key_exists($v_MemberID,$a_MoraleConditions)){
						if($this->A_Statistics[$v_TeamName][$v_MaxName.'-by-character'][$v_MemberID]==$v_MaxValue){
							$a_MoraleConditions[$v_MemberID]=$a_MoraleConditionNames[$v_MaxName];
						}
					}
				}
			}
		}
		$a_Morale=array();
		$a_AwardsByCharacter=array();
		foreach($a_MoraleConditions as $v_MemberID=>$v_ConditionName){
			if(!array_key_exists($v_ConditionName,$a_Morale)){
				$a_Morale[$v_ConditionName]=true;
				switch($v_ConditionName){
					case 'Best Magic':case 'Best Performance':case 'Most Dangerous':case 'Most Deadly':
						$a_AwardsByCharacter[$v_MemberID]=$this->A_Statistics[$v_TeamName]['characters'][$v_MemberID].' is awarded a medal for <font class="font-G font-bold">'.$v_ConditionName.'</font>.';
						break;
					default:
						break;
				}
			}
		}
		$this->A_Statistics[$v_TeamName]['awards-by-character']=$a_AwardsByCharacter;
	}
	/* Function - Calculate End Of Quest Rates */
	function f_CalculateEndOfQuestRates($v_TeamName){
		foreach($this->A_Statistics[$v_TeamName]['characters'] as $v_MemberID=>$v_MemberName){
			$v_CostPerTurn=0;
			if(array_key_exists($v_MemberID,$this->A_Teams[$v_TeamName])){$v_CostPerTurn=$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate-per-turn'];}
			$v_TotalPay=round($v_CostPerTurn*$this->V_TotalTurns);
			$this->A_Statistics[$v_TeamName]['cost-by-character'][$v_MemberID]=$v_TotalPay;
			$this->A_Statistics[$v_TeamName]['cost-total']+=$v_TotalPay;
		}
	}
	/* Function - Calculate Rates */
	function f_CalculateRates($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate-per-turn']=$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']/1000;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate-per-hour']=round(120*$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate-per-turn']);
	}
	/* Function - Get Range Name From Distances */
	function f_GetRangeNameFromDistances($v_MemberLocation,$v_DefendingMemberLocation){
		$v_DistanceApart=abs($v_DefendingMemberLocation-$v_MemberLocation);
		switch($v_DistanceApart){
			case 9:return 'Very Distant';break;
			case 8:return 'Distant';break;
			case 7:return 'Very Far';break;
			case 6:return 'Far';break;
			case 5:return 'Very Long';break;
			case 4:return 'Long';break;
			case 3:return 'Short';break;
			case 2:return 'Very Short';break;
			case 1:return 'Close';break;
			case 0:return 'Very Close';break;
			default:return false;break;
		}
	}
	/* Function - Get Attacker Level From Range */
	function f_GetAttackerLevelFromRange($v_RangeName){
		$a_AttackerLevels=array('Very Close'=>'Master','Close'=>'Greater','Very Short'=>'Greater','Short'=>'','Long'=>'','Very Long'=>'','Far'=>'Lesser','Very Far'=>'Lesser','Distant'=>'Amateur','Very Distant'=>'Amateur');
		return $a_AttackerLevels[$v_RangeName];
	}
	/* Function - Get Defender Level From Range */
	function f_GetDefenderLevelFromRange($v_RangeName){
		$a_DefenderLevels=array('Very Close'=>'Amateur','Close'=>'Amateur','Very Short'=>'Lesser','Short'=>'Lesser','Long'=>'','Very Long'=>'','Far'=>'','Very Far'=>'Greater','Distant'=>'Greater','Very Distant'=>'Master');
		return $a_DefenderLevels[$v_RangeName];
	}
	/* Function - Challenge Target */
	function f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceType,$v_StaticValue=0){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if(!array_key_exists($v_DefendingMemberID,$this->A_Teams[$v_DefendingTeamName])){
			echo 'Team: ';
			print_r($v_TeamName);
			echo ' ||| Member ID: ';
			print_r($v_MemberID);
			echo ' ||| Team: ';
			print_r($v_DefendingTeamName);
			echo ' ||| Member ID: ';
			print_r($v_DefendingMemberID);
			echo ' ||| Type: ';
			print_r($v_PerformanceType);die();
		}
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		$v_AttackerTotal=0;
		$v_DefenderTotal=0;

		$v_DistanceToTarget=$this->f_GetRangeNameFromDistances($this->A_Teams[$v_TeamName][$v_MemberID]['location'],$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['location']);

		switch($v_PerformanceType){
			case 'detect':
				/* Stealth vs. Vision */ 
				$v_AttackerSkill='Detection';
				$v_DefenderSkill='Weight';
				$v_AttackerLevel=$this->f_GetAttackerLevelFromRange($v_DistanceToTarget);
				$v_DefenderLevel=$this->f_GetDefenderLevelFromRange($v_DistanceToTarget);
				break;
			case 'track':
				/* Stealth vs. Vision */ 
				$v_AttackerSkill='Stealth';
				$v_DefenderSkill='Vision';
				$v_AttackerLevel=$this->f_GetAttackerLevelFromRange($v_DistanceToTarget);
				$v_DefenderLevel=$this->f_GetDefenderLevelFromRange($v_DistanceToTarget);
				break;
			case 'inform':
				/* Communication vs. Understanding */ 
				$v_AttackerSkill='Communication';
				$v_DefenderSkill='Friendly Understanding';
				$v_AttackerLevel=$this->f_GetAttackerLevelFromRange($v_DistanceToTarget);
				$v_DefenderLevel=$this->f_GetDefenderLevelFromRange($v_DistanceToTarget);
				break;
			case 'notice-attacker':
				$v_AttackerLevel='';$v_AttackerSkill='Stealth';
				$v_DefenderLevel='';$v_DefenderSkill='Observation';
				if($a_Member['location']==$a_DefendingMember['location']){$v_AttackerLevel='Amateur';}
				break;
			case '':default:
				$v_AttackerLevel=$a_Member[$v_PerformanceType]['attacker']['level'];
				$v_AttackerSkill=$a_Member[$v_PerformanceType]['attacker']['skill'];
				$v_DefenderLevel=$a_Member[$v_PerformanceType]['defender']['level'];
				$v_DefenderSkill=$a_Member[$v_PerformanceType]['defender']['skill'];
				break;
		}

		switch($v_AttackerSkill){
			case 'can-'.$v_PerformanceType:return $a_Member['can-'.$v_PerformanceType];break;
			case 'Accuracy':case 'Balance':case 'Block':case 'Detection':case 'Dodge':case 'Understanding':case 'Intellect':case 'Communication':case 'Stealth':case 'Strength':case 'Vision':
				$v_AttackerTotal=$a_Member['skills'][$v_AttackerSkill];
				break;
			case 'Arcane Focus':$v_DefenderTotal=round(($a_DefendingMember['skills']['Accuracy']+$a_DefendingMember['skills']['Intellect'])/2);break;
			case 'Battle Focus':$v_DefenderTotal=round(($a_DefendingMember['skills']['Accuracy']+$a_DefendingMember['skills']['Strength'])/2);break;
			case 'Sound':$v_AttackerTotal=$v_AttackerLevel;break;
			case 0:default:
				break;
		}
		switch($v_AttackerLevel){case 'Amateur':$v_AttackerTotal-=5;break;case 'Lesser':$v_AttackerTotal-=2;break;case 'Greater':$v_AttackerTotal+=2;break;case 'Master':$v_AttackerTotal+=5;break;case '':default:break;}
		if($v_AttackerTotal<-10){$v_AttackerTotal=-10;}

		switch($v_DefenderSkill){
			case 'Friendly Understanding':$v_DefenderTotal=$a_DefendingMember['skills']['Understanding'];if($v_DefenderTotal>0){$v_DefenderTotal=-$v_DefenderTotal;}else{$v_DefenderTotal=abs($v_DefenderTotal);}break;
			case 'can-'.$v_PerformanceType:return $a_Member['can-'.$v_PerformanceType];break;
			case 'Health':$v_DefenderTotal=$a_DefendingMember['health']['current'];break;
			case 'Stamina':$v_DefenderTotal=$a_DefendingMember['stamina']['current'];break;
			case 'Accuracy':case 'Balance':case 'Block':case 'Detection':case 'Dodge':case 'Understanding':case 'Intellect':case 'Communication':case 'Stealth':case 'Strength':case 'Vision':
				$v_DefenderTotal=$a_DefendingMember['skills'][$v_DefenderSkill];
				break;
			case 'Weight':$v_DefenderTotal=$a_DefendingMember['carrying-weight'];break;
			case 'Evasion':$v_DefenderTotal=round(($a_DefendingMember['skills']['Block']+$a_DefendingMember['skills']['Dodge'])/2);break;
			case 'Footing':$v_DefenderTotal=round(($a_DefendingMember['skills']['Balance']+$a_DefendingMember['skills']['Strength'])/2);break;
			case 'Observation':$v_DefenderTotal=round(($a_DefendingMember['skills']['Detection']+$a_DefendingMember['skills']['Vision'])/2);break;
			case 0:default:
				break;
		}
		switch($v_DefenderLevel){case 'Amateur':$v_DefenderTotal-=5;break;case 'Lesser':$v_DefenderTotal-=2;break;case 'Greater':$v_DefenderTotal+=2;break;case 'Master':$v_DefenderTotal+=5;break;case '':default:break;}
		if($v_DefenderTotal<-10){$v_DefenderTotal=-10;}

		$v_AttackerMinimum=$v_AttackerTotal*2;
		$v_AttackerMaximum=50+($v_AttackerTotal*5);
		if($v_AttackerMinimum<0){$v_AttackerMinimum=0;}
		if($v_AttackerMaximum>100){$v_AttackerMaximum=100;}

		$v_DefenderMinimum=$v_DefenderTotal*2;
		$v_DefenderMaximum=50+($v_DefenderTotal*5);
		if($v_DefenderMinimum<0){$v_DefenderMinimum=0;}
		if($v_DefenderMaximum>100){$v_DefenderMaximum=100;}

		$v_AttackerRoll=rand($v_AttackerMinimum,$v_AttackerMaximum);
		$v_DefenderRoll=rand($v_DefenderMinimum,$v_DefenderMaximum);

		//$this->f_AddToLog((($v_AttackerRoll>=$v_DefenderRoll)?'gold-italic':$v_TeamName.'-grey'),$v_TeamName,$a_Member['name'].' challenges '.$a_DefendingMember['name'].' on tile '.$a_Member['location'].' and '.(($v_AttackerRoll>=$v_DefenderRoll)?'succeeds':'fails').' ['.$v_AttackerRoll.' vs. '.$v_DefenderRoll.'].');
		return $v_AttackerRoll>=$v_DefenderRoll;
	}
	/* Function - Change Quest */
	function f_ChangeQuest($v_QuestID=0){$this->V_QuestID=$v_QuestID;}
	/* Function - Character Waits */
	function f_CharacterWaits($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$this->f_AddToLog($v_TeamName,$v_TeamName,$this->A_Teams[$v_TeamName][$v_MemberID]['name'].' waits on tile '.$this->A_Teams[$v_TeamName][$v_MemberID]['location'].'.');
	}
	/* Function - Choose Target And Perform */
	function f_ChooseTargetAndPerform($v_TeamName,$v_MemberID){
		if(!array_key_exists($v_MemberID,$this->A_Teams[$v_TeamName])){return;}
		if($this->A_Teams[$v_TeamName][$v_MemberID]['status']!=='Aware'){return;}
		$this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets']=array();
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['targets'] as $v_PerformanceName=>$a_Targets){
			foreach($a_Targets as $v_DefendingMemberID=>$v_PreferenceWeight){
				if(array_key_exists($v_DefendingMemberID,$this->A_Teams[$v_DefendingTeamName])){
					$this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets'][$v_PreferenceWeight][]=array($v_PerformanceName=>$v_DefendingMemberID);
				}
			}
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;
		if(empty($this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets'])){$this->f_Move($v_TeamName,$v_MemberID);return;}
		$this->f_Perform($v_TeamName,$v_MemberID);
	}
	/* Function - Construct Team */
	function f_ConstructTeam($v_TeamName){
		foreach($this->A_Quest[$v_TeamName]['starting-team'] as $v_Key=>$a_GroupMember){
			$v_NextKey=$this->A_Quest[$v_TeamName]['next-key'];
			$this->A_Teams[$v_TeamName][$v_NextKey]=F_GetCharacter($v_TeamName,$v_NextKey,$a_GroupMember);
			$this->f_AddToLog('purple',$v_TeamName,$this->A_Teams[$v_TeamName][$v_NextKey]['name'].' joins the '.$v_TeamName.' on tile '.$this->A_Teams[$v_TeamName][$v_NextKey]['location'].'.');
			$this->A_Quest[$v_TeamName]['next-key']++;
		}
		if($v_TeamName=='party'){
			foreach($this->A_Quest[$v_TeamName]['assigned-team'] as $v_Key=>$a_GroupMember){
				$v_NextKey=$this->A_Quest[$v_TeamName]['next-key'];
				$this->A_Teams[$v_TeamName][$v_NextKey]=F_GetCharacter($v_TeamName,$v_NextKey,$a_GroupMember,true,$this->A_Barracks);
				$this->f_AddToLog('purple-bold',$v_TeamName,$this->A_Teams[$v_TeamName][$v_NextKey]['name'].' joins the '.$v_TeamName.' on tile '.$this->A_Teams[$v_TeamName][$v_NextKey]['location'].'.');
				$this->A_Quest[$v_TeamName]['next-key']++;
			}
		}
	}
	/* Function - Inform Others */
	function f_InformOthers($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($this->A_Teams[$v_TeamName] as $v_OtherMemberID=>$a_OtherMember){
			if($v_MemberID!==$v_OtherMemberID){
				if($a_Member['location']>$a_OtherMember['location']){$v_Difference=$a_Member['location']-$a_OtherMember['location'];}else{$v_Difference=$a_OtherMember['location']-$a_Member['location'];}
				if($v_Difference<=$a_Member['communicate']['Loudness']){
					$v_Language=$this->f_SimilarValue($a_Member['language'],$a_OtherMember['language']);
					if($v_Language!==''){
						foreach($a_Member['spotted'] as $v_RangeName=>$a_Range){
							if(!empty($a_Range)){
								if($a_Member['initiative']>=$a_OtherMember['initiative']){
									foreach($a_Range as $v_Key=>$v_DefendingMemberID){
										$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
										if(empty($a_OtherMember['spotted'][$v_RangeName])){$a_OtherMember['spotted'][$v_RangeName]=array();}
										if(!in_array($v_DefendingMemberID,$a_OtherMember['spotted'][$v_RangeName])){
											if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_TeamName,$v_OtherMemberID,'inform')){
												$this->A_Teams[$v_TeamName][$v_OtherMemberID]['spotted'][$v_RangeName][]=$v_DefendingMemberID;
												$this->A_Teams[$v_TeamName][$v_OtherMemberID]['spotted-total']++;
												//$this->f_AddToLog($v_TeamName.'-grey',$v_TeamName,'In '.$v_Language.', '.$a_Member['name'].' informs '.$a_OtherMember['name'].' about '.$a_DefendingMember['name'].' on tile '.$a_DefendingMember['location'].'.');
												$this->f_ModifyMorale($v_TeamName,0.01);
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
	}
	/* Function - Detect Presences */
	function f_DetectPresences($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['sensed-total']=0;
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_RangeOfSense=$a_Member['range-of-sense'];
		$v_Tile=$a_Member['location'];
		$a_OthersSensed=array('Very Close'=>array(),'Close'=>array(),'Very Short'=>array(),'Short'=>array(),'Long'=>array(),'Very Long'=>array(),'Far'=>array(),'Very Far'=>array(),'Distant'=>array(),'Very Distant'=>array());
		switch($v_RangeOfSense){
			case 10:$a_OthersSensed['Very Distant']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Very Distant',$v_Tile,9);
			case 9:$a_OthersSensed['Distant']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Distant',$v_Tile,8);
			case 8:$a_OthersSensed['Very Far']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Very Far',$v_Tile,7);
			case 7:$a_OthersSensed['Far']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Far',$v_Tile,6);
			case 6:$a_OthersSensed['Very Long']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Very Long',$v_Tile,5);
			case 5:$a_OthersSensed['Long']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Long',$v_Tile,4);
			case 4:$a_OthersSensed['Short']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Short',$v_Tile,3);
			case 3:$a_OthersSensed['Very Short']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Very Short',$v_Tile,2);
			case 2:$a_OthersSensed['Close']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Close',$v_Tile,1);
			case 1:$a_OthersSensed['Very Close']=$this->f_DetectPresencesAtTile($v_TeamName,$v_MemberID,'Very Close',$v_Tile,0);
			case 0:default:
				break;
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['sensed']=$a_OthersSensed;
	}
	/* Function - Detect Presences At Tile */
	function f_DetectPresencesAtTile($v_TeamName,$v_MemberID,$v_RangeName,$v_Tile,$v_DistanceFromTile){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		$a_OthersInRange=array();
		if($v_DistanceFromTile>0){$a_Tiles=array($v_Tile-$v_DistanceFromTile,$v_Tile+$v_DistanceFromTile);}else{$a_Tiles=array($v_Tile);}
		foreach($this->A_Teams[$v_DefendingTeamName] as $v_DefendingMemberID=>$a_DefendingMember){
			foreach($a_Tiles as $v_Key=>$v_Tile){
				if($v_Tile==$a_DefendingMember['location']){
					$v_Pass=false;
					if((array_key_exists($v_DefendingMemberID,$a_Member['sensed'][$v_RangeName])&&!$a_Member['moved-this-turn']&&!$a_DefendingMember['moved-this-turn'])){
						$v_Word=' is aware of ';
						$v_Pass=true;
					}else if(array_key_exists($v_DefendingMemberID,$a_Member['sensed'][$v_RangeName])&&$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'detect')){
						$v_Word=' detects ';
						$v_Pass=true;
					}else if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'detect')){
						$v_Word=' senses ';
						$v_Pass=true;
					}
					if($v_Pass){
						//$this->f_AddToLog($v_TeamName.'-grey',$v_TeamName,$a_Member['name'].$v_Word.$a_DefendingMember['name'].' on tile '.$a_DefendingMember['location'].'.');
						$this->A_Teams[$v_TeamName][$v_MemberID]['sensed-total']++;
						$a_OthersInRange[]=$v_DefendingMemberID;
					}
				}
			}
		}
		return $a_OthersInRange;
	}
	/* Function - Look Around */
	function f_LookAround($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['spotted-total']=0;
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_RangeOfView=$a_Member['range-of-view'];
		$v_Tile=$a_Member['location'];
		$a_OthersInView=array('Very Close'=>array(),'Close'=>array(),'Very Short'=>array(),'Short'=>array(),'Long'=>array(),'Very Long'=>array(),'Far'=>array(),'Very Far'=>array(),'Distant'=>array(),'Very Distant'=>array());
		switch($v_RangeOfView){
			case 10:$a_OthersInView['Very Distant']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Very Distant',$v_Tile,9);
			case 9:$a_OthersInView['Distant']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Distant',$v_Tile,8);
			case 8:$a_OthersInView['Very Far']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Very Far',$v_Tile,7);
			case 7:$a_OthersInView['Far']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Far',$v_Tile,6);
			case 6:$a_OthersInView['Very Long']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Very Long',$v_Tile,5);
			case 5:$a_OthersInView['Long']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Long',$v_Tile,4);
			case 4:$a_OthersInView['Short']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Short',$v_Tile,3);
			case 3:$a_OthersInView['Very Short']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Very Short',$v_Tile,2);
			case 2:$a_OthersInView['Close']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Close',$v_Tile,1);
			case 1:$a_OthersInView['Very Close']=$this->f_LookAtTile($v_TeamName,$v_MemberID,'Very Close',$v_Tile,0);
			case 0:default:
				break;
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['spotted']=$a_OthersInView;
	}
	/* Function - Look At Tile */
	function f_LookAtTile($v_TeamName,$v_MemberID,$v_RangeName,$v_Tile,$v_DistanceFromTile){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		$a_OthersInRange=array();
		if($v_DistanceFromTile>0){$a_Tiles=array($v_Tile-$v_DistanceFromTile,$v_Tile+$v_DistanceFromTile);}else{$a_Tiles=array($v_Tile);}
		foreach($this->A_Teams[$v_DefendingTeamName] as $v_DefendingMemberID=>$a_DefendingMember){
			foreach($a_Tiles as $v_Key=>$v_Tile){
				if($v_Tile==$a_DefendingMember['location']){
					$v_Pass=false;
					if((array_key_exists($v_DefendingMemberID,$a_Member['spotted'][$v_RangeName])&&!$a_Member['moved-this-turn']&&!$a_DefendingMember['moved-this-turn'])||(!$a_DefendingMember['can-hide'])){
						$v_Word=' tracks ';
						$v_Pass=true;
					}else if(array_key_exists($v_DefendingMemberID,$a_Member['sensed'][$v_RangeName])&&$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'detect')){
						$v_Word=' expects ';
						$v_Pass=true;
					}else if(array_key_exists($v_DefendingMemberID,$a_Member['spotted'][$v_RangeName])&&$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'track')){
						$v_Word=' watches ';
						$v_Pass=true;
					}else if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'track')){
						$v_Word=' spots ';
						$v_Pass=true;
					}
					if($v_Pass){
						//$this->f_AddToLog($v_TeamName.'-grey',$v_TeamName,$a_Member['name'].$v_Word.$a_DefendingMember['name'].' on tile '.$a_DefendingMember['location'].'.');
						$this->A_Teams[$v_TeamName][$v_MemberID]['spotted-total']++;
						$a_OthersInRange[]=$v_DefendingMemberID;
					}
				}
			}
		}
		return $a_OthersInRange;
	}
	/* Function - Get Terrain Type By Tile */
	function f_GetTerrainTypeByTile($v_Tile=0){if(array_key_exists($v_Tile,$this->A_Quest['tiles'])){return $this->A_Quest['tiles'][$v_Tile]['terrain'];}else{return '';}}
	/* Function - Move */
	function f_Move($v_TeamName,$v_MemberID){
		if(!$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']||$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['current']<=0){$this->f_CharacterWaits($v_TeamName,$v_MemberID);return;}
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_CurrentTile=$a_Member['location'];
		$v_MaximumDistanceMoved=$a_Member['speed'];
		$v_MaximumPathLocation=$this->A_Quest['length-of-path'];
		$v_DistanceMoved=$v_MaximumDistanceMoved;
		$v_Retreating=$a_Member['retreating'];
		if($v_Retreating){
			if($v_CurrentTile-$v_MaximumDistanceMoved<1){$v_DistanceMoved=$v_CurrentTile-1;}
			$v_Destination=$v_CurrentTile-$v_DistanceMoved;
			if($v_Destination==1){
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=true;
			}
		}else{
			if($v_CurrentTile+$v_MaximumDistanceMoved>$v_MaximumPathLocation){$v_DistanceMoved=$v_MaximumPathLocation-$v_CurrentTile;}
			$v_Destination=$v_CurrentTile+$v_DistanceMoved;
			if($v_Destination==$this->A_Quest['length-of-path']){
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=false;
			}
		}
		/* Terrain */
		$v_DestinationTerrainType=$this->f_GetTerrainTypeByTile($v_Destination);
		if(!$a_Member['move']['allowed-terrain'][$v_DestinationTerrainType]){$this->f_CharacterWaits($v_TeamName,$v_MemberID);return;}
		/* ******* */
		$this->A_Teams[$v_TeamName][$v_MemberID]['location']=$v_Destination;
		if($v_DistanceMoved==0){
			$this->f_CharacterWaits($v_TeamName,$v_MemberID);
		}else{
			$this->f_RemoveCostFromPool($v_TeamName,$v_MemberID,'energy',1);
			$this->f_AddToLog($v_TeamName,$v_TeamName,$this->A_Teams[$v_TeamName][$v_MemberID]['name'].' moves to tile '.$this->A_Teams[$v_TeamName][$v_MemberID]['location'].'.');
			$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=true;
			$v_Flying=$this->f_IsFlying($v_TeamName,$v_MemberID);
			$v_ConditionName=$this->A_Quest['tiles'][$v_CurrentTile]['on-leave'];
			switch($v_ConditionName){
				case 'Dust Cloud':if(!$v_Flying){$this->f_ApplyConditionToTerrain($v_CurrentTile,$v_ConditionName);}break;
				case '':default:
					break;
			}
			$v_ConditionName=$this->A_Quest['tiles'][$v_CurrentTile]['on-enter'];
			switch($v_ConditionName){
				case 'Dust Cloud':if(!$v_Flying){$this->f_ApplyConditionToTerrain($v_CurrentTile,$v_ConditionName);}break;
				case '':default:
					break;
			}
		}
	}
	/* Function - Modify Morale */
	function f_ModifyMorale($v_TeamName,$v_Amount=0){
		$this->A_Quest['morale-level']+=(($v_TeamName=='party')?$v_Amount:-$v_Amount);
		if($this->A_Quest['morale-level']<0){$this->A_Quest['morale-level']=0;}elseif($this->A_Quest['morale-level']>100){$this->A_Quest['morale-level']=100;}
	}
	/* Function - Remove Character From Team */
	function f_RemoveCharacterFromTeam($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		$v_OnDeathEffect=$a_Member['on-death']['effect']['name'];
		$v_EffectLocation=$a_Member['location'];
		$this->f_AddStatistic($v_TeamName,$v_MemberID,'deaths-by-character');
		$this->f_ModifyMorale($v_TeamName,-2);
		$this->f_AddToLog('purple-bold',$v_TeamName,$a_Member['name'].' has left the '.$v_TeamName.'.');
		foreach($this->A_Teams[$v_TeamName] as $v_TargetMemberID=>$a_TargetMember){
			$v_Difference=abs($a_TargetMember['location']-$a_Member['location']);
			if($v_Difference<=$a_TargetMember['skills']['Vision']){
				$this->f_ModifyMorale($v_TeamName,-0.2);
				if($this->A_Teams[$v_TeamName][$v_MemberID]['Fearful']){$this->f_ApplyConditionToCharacter($v_TeamName,$v_TargetMemberID,'Afraid',2);}
			}
		}
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['lootable-items'] as $v_ItemSlot=>$v_ItemName){
			$this->A_Statistics[$v_DefendingTeamName]['recovered-loot'][]=$v_ItemName;
		}
		unset($this->A_Teams[$v_TeamName][$v_MemberID]);
		if($v_TeamName=='quest'){$this->A_Quest['opposing-characters-remain']--;}
		switch($v_OnDeathEffect){
			case 'Decaying Flesh':$this->f_AddCharacterToTeam($v_TeamName,array(22,'Soldier',$v_EffectLocation));break; /* 22 - Skeleton Slasher */
			case 'Mummy Wrappings':$this->f_AddCharacterToTeam($v_TeamName,array(43,'Soldier',$v_EffectLocation));break; /* 43 - Skeleton Penetrator */

			case '':default:
				break;
		}
		if($v_TeamName=='party'){if(empty($this->A_Teams['party'])){$this->A_Quest['quest-has-won']=true;}}
	}
	/* Function - Character Life Is Low */
	function f_CharacterLifeIsLow($v_TeamName,$v_MemberID,$v_PoolName,$v_Minimum=1){
		$v_Tile=$this->A_Teams[$v_TeamName][$v_MemberID]['location'];
		$v_Total=0;
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($v_Tile==$a_Member['location']){if($a_Member[$v_PoolName]['current']<$a_Member[$v_PoolName]['soft-maximum']){$v_Total++;}}}
		if($v_Total>=$v_Minimum){return true;}
		return false;
	}
	/* Function - Get Friendly Character With Lowest Life */
	function f_GetFriendlyCharacterWithLowestLife($v_TeamName,$v_MemberID,$v_PoolName='health'){
		$v_Tile=$this->A_Teams[$v_TeamName][$v_MemberID]['location'];
		$v_LowestLifeMemberID=-1;
		$v_BiggestDifference=0;
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			if($a_Member['location']==$v_Tile){
				if($a_Member[$v_PoolName]['current']<$a_Member[$v_PoolName]['soft-maximum']){
					$v_Difference=$a_Member[$v_PoolName]['soft-maximum']-$a_Member[$v_PoolName]['current'];
					if($v_Difference>$v_BiggestDifference){
						$v_BiggestDifference=$v_Difference;
						$v_LowestLifeMemberID=$a_Member['team-key'];
					}
				}
			}
		}
		return $v_LowestLifeMemberID;
	}
	/* Function - Perform */
	function f_Perform($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['performance-preference'] as $v_PerformanceName=>$v_PreferenceWeight){
			$v_FriendlyMemberID=-1;
			if($a_Member['can-'.$v_PerformanceName]&&(($a_Member[$v_PerformanceName]['has-target']&&!$a_Member[$v_PerformanceName]['hostile'])||(!$a_Member[$v_PerformanceName]['has-target']))){
				$v_TotalWeight=$a_Member['performance-preference'][$v_PerformanceName]+25;
				$v_Pass=true;
				/* Stamina / Mana Check */
				switch($v_PerformanceName){
					case 'magic':if($a_Member['mana']['current']<$a_Member[$v_PerformanceName]['cost']){$v_Pass=false;}break;
					case 'action':if($a_Member['stamina']['current']<$a_Member[$v_PerformanceName]['cost']){$v_Pass=false;}break;
					case 'move':$a_Member['preferred-targets'][$v_PreferenceWeight][]['move']=-1;break;
					default:break;
				}
				if($v_Pass){
					switch($v_PerformanceName){
						case 'action':case 'magic':
							switch($a_Member['abilities'][$v_PerformanceName]){
								case 'Bandage Wound': /* Needs Friendly Bleeding Target */
									$v_Pass=$this->f_CharacterLifeIsLow($v_TeamName,$v_MemberID,'blood',1);
									if($v_Pass){
										$v_FriendlyMemberID=$this->f_GetFriendlyCharacterWithLowestLife($v_TeamName,$v_MemberID,'blood');
										if($v_FriendlyMemberID<0){$v_Pass=false;}
									}
									break;
								case 'Healing Circle': /* Needs Friendly Wounded Target */
									$v_Pass=$this->f_CharacterLifeIsLow($v_TeamName,$v_MemberID,'health',1);
									break;
								case 'Word Of Retribution': /* Needs Hostile Undead Target */
									$v_Pass=false;
									if(!empty($a_Member['spotted']['close'])){
										foreach($a_Member['spotted']['close'] as $v_Key=>$v_PossibleTargetID){
											if(!$v_Pass&&array_key_exists($v_PossibleTargetID,$this->A_Teams[$v_DefendingTeamName])){
												if($this->A_Teams[$v_DefendingTeamName][$v_PossibleTargetID]['guild']=='Unholy'){$v_Pass=true;}
											}
										}
									}
									break;
								case '':default:
									break;
							}
							break;
						default:break;
					}
					if($v_Pass){
						if($a_Member[$v_PerformanceName]['instant']){$v_TotalWeight+=14;}
						$a_Member['preferred-targets'][$v_TotalWeight][]=array($v_PerformanceName=>$v_FriendlyMemberID);
					}
				}
			}
		}
		krsort($a_Member['preferred-targets']);
		foreach($a_Member['preferred-targets'] as $v_WeightKey=>$a_PreferredTargets){
			foreach($a_PreferredTargets as $v_Key=>$a_PreferredTarget){
				$v_PerformanceName=key($a_PreferredTarget);
				if($a_Member[$v_PerformanceName]['has-target']){
					$v_DefendingMemberID=$a_PreferredTarget[$v_PerformanceName];
					if(!$a_Member[$v_PerformanceName]['hostile']){
						if(!array_key_exists($v_DefendingMemberID,$this->A_Teams[$v_TeamName])){break;}
						$a_DefendingMember=$this->A_Teams[$v_TeamName][$v_DefendingMemberID];
					}else{
						if(!array_key_exists($v_DefendingMemberID,$this->A_Teams[$v_DefendingTeamName])){break;}
						$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
					}
					/* Unconscious Instant-Kill */
					if($a_DefendingMember['status']=='Unconscious'){
						if($a_Member[$v_PerformanceName]['hostile']){
							if($v_PerformanceName=='attack'||$v_PerformanceName=='action'){
								if($a_Member[$v_PerformanceName]['projectile']){$v_Pass=$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName);}else{$v_Pass=true;}
								if($v_Pass){
									$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
									$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
									$this->f_AddToLog('red-bold',$v_TeamName,$a_Member['name'].' eliminates an unconscious '.$a_DefendingMember['name'].'.');
									$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
									if(!$a_Member[$v_PerformanceName]['instant']){return;}
									$this->A_Teams[$v_TeamName][$v_MemberID]['performed-instant']=true;
									break;
								}
							}
						}
					}
				}
				$a_Optional=false;

				switch($v_PerformanceName){
					/* ACTION / MAGIC */
					case 'action':case 'attack':case 'magic':
						if($a_Member[$v_PerformanceName]['re-use-timer']>0){break;}
						if($a_Member['performed-instant']&&$a_Member[$v_PerformanceName]['instant']){break;}
						switch($v_PerformanceName){
							case 'action':$v_Name=$a_Member['abilities'][$v_PerformanceName];$v_Text='performs '.$v_Name.' ';break;
							case 'magic':$v_Name=$a_Member['abilities'][$v_PerformanceName];$v_Text='casts '.$v_Name.' ';break;
							case 'attack':$v_Name=$a_Member['items']['left-hand'];
							default:$v_Text='attacks ';break;
						}
						$this->f_RemoveCostFromPool($v_TeamName,$v_MemberID,$a_Member[$v_PerformanceName]['pool'],$a_Member[$v_PerformanceName]['cost']);
						$this->f_SetTimer($v_TeamName,$v_MemberID,$v_PerformanceName);

						/* ******************* */
						/* E n c h a n t m e n t */
						if($a_Member[$v_PerformanceName]['enchantment']){

							/* Has Target */
							if($a_Member[$v_PerformanceName]['has-target']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
								}else{
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
									$v_Killed=$this->f_ApplyConditionToCharacter($v_TeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration,$v_TeamName,$v_MemberID);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveCharacterFromTeam($v_TeamName,$v_DefendingMemberID);
									}
								}
							/* Area Of Effect */
							}elseif($a_Member[$v_PerformanceName]['area']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Perform */
									foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
										$v_Difference=abs($a_TargetMember['location']-$a_Member['location']);
										if($v_Difference<=$a_Member[$v_PerformanceName]['area-range']){
											/* Apply Effect */
											$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
											$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
											$v_Killed=$this->f_ApplyConditionToCharacter($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration,$v_TeamName,$v_MemberID);
											if($v_Killed){
												$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
												$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
												$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_TargetMemberID);
											}else{
												/* (If Sneaking) Hide From Defender */
												if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_TargetMemberID)){
													/* (Attempt To Stay Hidden) */
													if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,'notice-attacker')){
														$v_RangeName=$this->f_GetRangeNameFromDistances($a_Member['location'],$a_TargetMember['location']);
														$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted-total']++;
														$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
													}
												}
											}
										}
									}
								/* Friendly */
								}else{
									/* Perform */
									foreach($this->A_Teams[$v_TeamName] as $v_TargetMemberID=>$a_TargetMember){
										if($a_TargetMember['location']==$a_Member['location']){
											/* Apply Effect */
											$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
											$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
											$v_Killed=$this->f_ApplyConditionToCharacter($v_TeamName,$v_TargetMemberID,$v_EffectName,$v_EffectDuration);
											if($v_Killed){
												$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
												$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
												$this->f_RemoveCharacterFromTeam($v_TeamName,$v_TargetMemberID);
											}
										}
									}
								}
							/* Free-Form */
							}else{
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Hit Mercenary */
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
									$v_Killed=$this->f_ApplyConditionToCharacter($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration,$v_TeamName,$v_MemberID);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
									}else{
										/* (If Sneaking) Hide From Defender */
										if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID)){
											/* (Attempt To Stay Hidden) */
											if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'notice-attacker')){
												$v_RangeName=$this->f_GetRangeNameFromDistances($a_Member['location'],$a_DefendingMember['location']);
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted-total']++;
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
											}
										}
									}
								/* Friendly */
								}else{
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
									$v_Killed=$this->f_ApplyConditionToCharacter($v_TeamName,$v_MemberID,$v_EffectName,$v_EffectDuration);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveCharacterFromTeam($v_TeamName,$v_MemberID);
									}
								}
							}
							if(!$a_Member[$v_PerformanceName]['instant']){return;}
							$this->A_Teams[$v_TeamName][$v_MemberID]['performed-instant']=true;

						/* ******************* */
						/* C h a l l e n g e */
						}elseif($a_Member[$v_PerformanceName]['challenge']){
							/* Has Target */
							if($a_Member[$v_PerformanceName]['has-target']){
								/* Challenge Target */
								if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName)){
									/* Perform */
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
									$v_Killed=$this->f_ApplyConditionToCharacter($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration,$v_TeamName,$v_MemberID);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
									}else{
										/* (If Sneaking) Hide From Defender */
										if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID)){
											/* (Attempt To Stay Hidden) */
											if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'notice-attacker')){
												$v_RangeName=$this->f_GetRangeNameFromDistances($a_Member['location'],$a_DefendingMember['location']);
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted-total']++;
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
											}
										}
									}
								}
							/* Area Of Effect */
							}elseif($a_Member[$v_PerformanceName]['area']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Perform */
									foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
										$v_Difference=abs($a_TargetMember['location']-$a_Member['location']);
										if($v_Difference<=$a_Member[$v_PerformanceName]['area-range']){
											/* Challenge Target */
											if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,$v_PerformanceName)){
												/* Apply Effect */
												$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
												$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
												$v_Killed=$this->f_ApplyConditionToCharacter($v_DefendingTeamName,$v_TargetMemberID,$v_EffectName,$v_EffectDuration,$v_TeamName,$v_MemberID);
												if($v_Killed){
													$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
													$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
													$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_TargetMemberID);
												}else{
													/* (If Sneaking) Hide From Defender */
													if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_TargetMemberID)){
														/* (Attempt To Stay Hidden) */
														if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,'notice-attacker')){
															$v_RangeName=$this->f_GetRangeNameFromDistances($a_Member['location'],$a_TargetMember['location']);
															$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted-total']++;
															$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
														}
													}
												}
											}
										}
									}
								/* Friendly */
								}else{
								}
							/* Free-Form */
							}else{
							}
							if(!$a_Member[$v_PerformanceName]['instant']){return;}
							$this->A_Teams[$v_TeamName][$v_MemberID]['performed-instant']=true;

						/* ******************* */
						/* A d v a n c e d   C h a l l e n g e */
						}if($a_Member[$v_PerformanceName]['advanced-challenge']){
							/* Has Target */
							if($a_Member[$v_PerformanceName]['has-target']){
								/* Challenge Target */
								if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName)){
									$v_DamageType=$a_Member[$v_PerformanceName]['damage']['type'];
									if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['defense'][$v_DamageType]['can-be-hit']){
										/* Hit Mercenary */
										$v_Killed=$this->f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName);
										if($v_Killed){
											$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
										}else{
											/* (If Sneaking) Hide From Defender */
											if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID)){
												/* (Attempt To Stay Hidden) */
												if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'notice-attacker')){
													$v_RangeName=$this->f_GetRangeNameFromDistances($a_Member['location'],$a_DefendingMember['location']);
													$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted-total']++;
													$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
												}
											}
										}
									}
								}
							/* Area Of Effect */
							}elseif($a_Member[$v_PerformanceName]['area']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Perform */
									foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
										$v_Difference=abs($a_TargetMember['location']-$a_Member['location']);
										if($v_Difference<=$a_Member[$v_PerformanceName]['area-range']){
											/* Challenge Target */
											if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,$v_PerformanceName)){
												$v_DamageType=$a_Member[$v_PerformanceName]['damage']['type'];
												if($this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['defense'][$v_DamageType]['can-be-hit']){
													/* Hit Mercenary */
													$v_Killed=$this->f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,$v_PerformanceName);
													if($v_Killed){$this->f_RemoveCharacterFromTeam($v_DefendingTeamName,$v_TargetMemberID);}
												}
											}
										}
									}
								/* Friendly */
								}else{
								}
							/* Free-Form */
							}else{
							}
							if(!$a_Member[$v_PerformanceName]['instant']){return;}
							$this->A_Teams[$v_TeamName][$v_MemberID]['performed-instant']=true;
						}
						break;
					case 'move':
						$this->f_Move($v_TeamName,$v_MemberID);
						return;
						break;
					case '':default:
						break;
				}
			}
		}
	}
	/* Function - Hit Mercenary */
	function f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName='attack'){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];

		/* Member Variables */
		$v_Blessed=$a_Member[$v_PerformanceName]['blessed'];
		if($v_Blessed){$v_Blessed=$this->f_IsBlessed($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);}
		$v_Sneaking=$this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
		$v_Undetected=$this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,true);
		if($v_PerformanceName!=='attack'){$v_Name=$a_Member['abilities'][$v_PerformanceName];}
		$v_DamageType=$a_Member[$v_PerformanceName]['damage']['type'];
		$v_DamageChances=$a_Member[$v_PerformanceName]['damage']['chances'];
		$v_DamageBoost=$a_Member[$v_PerformanceName]['damage']['boost']*5;
		$v_DealDamage=$a_Member[$v_PerformanceName]['deal-damage'];
		$v_EffectName=$a_Member[$v_PerformanceName]['effect']['name'];
		$v_EffectBoost=$a_Member[$v_PerformanceName]['effect']['boost']*5;
		$v_EffectChances=$a_Member[$v_PerformanceName]['effect']['chances'];
		$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
		$v_CriticalName=$a_Member[$v_PerformanceName]['critical']['name'];
		$v_CriticalBoost=$a_Member[$v_PerformanceName]['critical']['boost']*5;
		$v_CriticalChances=$a_Member[$v_PerformanceName]['critical']['chances'];
		$v_CriticalDuration=$a_Member[$v_PerformanceName]['critical']['duration'];
		
		/* Blessed / Sneaking / Undetected */
		if($v_Blessed){
			$this->f_AddToLog('gold-italic',$v_TeamName,$a_Member['name'].' is blessed.');
			$v_DamageChances++;$v_DamageBoost++;$v_EffectChances++;$v_EffectBoost++;$v_CriticalChances++;$v_CriticalBoost++;
		}
		if($v_Sneaking){
			$this->f_AddToLog('gold-italic',$v_TeamName,$a_Member['name'].' is sneaking.');
			$v_DamageChances++;$v_DamageBoost++;$v_EffectChances++;$v_EffectBoost++;$v_CriticalChances++;$v_CriticalBoost++;
		}
		if($v_Undetected){
			$this->f_AddToLog('gold-italic',$v_TeamName,$a_Member['name'].' is undetected.');
			$v_DamageChances++;$v_DamageBoost++;$v_EffectChances++;$v_EffectBoost++;$v_CriticalChances++;$v_CriticalBoost++;
		}

		switch($v_PerformanceName){
			case 'action':$v_Text='performs '.$v_Name.'.';break;
			case 'magic':$v_Text='casts '.$v_Name.' at '.$a_DefendingMember['name'].'.';break;
			case 'attack':case 'chances':default:$v_Text='attacks '.$a_DefendingMember['name'].'.';break;
		}

		/* Defending Member Variables */
		if(array_key_exists($v_DamageType,$a_DefendingMember['defense'])){
			$v_DefendingResistanceChances=$a_DefendingMember['defense'][$v_DamageType]['chances'];
			$v_DefendingResistanceBoost=$a_DefendingMember['defense'][$v_DamageType]['boost']*5;
		}else{
			$v_DefendingResistanceChances=0;
			$v_DefendingResistanceBoost=0;
		}
		$v_DefendingEffectBoost=$a_DefendingMember['defense']['protection']['boost']*5;
		$v_DefendingEffectChances=$a_DefendingMember['defense']['protection']['chances'];

		/* Chances */
		/*
			Minimum (1)                Middle (5)                 Maximum (10)
			Try  Value  Odds           Try  Value  Odds           Try  Value  Odds
			1    100    1 in 100       1    80     1 in 5         1    55     9 in 20
			2    95     1 in 20        2    75     1 in 4         2    50     1 in 2
			3    90     1 in 10        3    70     3 in 10        3    45     11 in 20
			4    85     3 in 20        4    65     7 in 20        4    40     6 in 10
			5    80     1 in 5         5    60     2 in 5         5    35     13 in 20
			6    75     1 in 4         6    55     9 in 20        6    30     7 in 10
			7    70     3 in 10        7    50     1 in 2         7    25     3 in 4
			8    65     7 in 20        8    45     11 in 20       8    20     4 in 5
			9    60     2 in 5         9    40     6 in 10        9    15     17 in 20
			10   55     9 in 20        10   35     13 in 20       10   10     9 in 10
		*/
		$a_Chances=array(1=>105,2=>100,3=>95,4=>90,5=>85,6=>80,7=>75,8=>70,9=>65,10=>60);

		/* Get Damage Total */
		$v_DamageTotal=$this->f_GetTotal($a_Chances,$v_DamageChances,$v_DamageBoost);

		/* Get Resistance Total */
		$v_ResistanceTotal=$this->f_GetTotal($a_Chances,$v_DefendingResistanceChances,$v_DefendingResistanceBoost);

		$this->f_AddToLog($v_TeamName,$v_TeamName,$a_Member['name'].' '.$v_Text);
		/* Damage */
		if($v_DealDamage){
			$v_ModifiedDamageTotal=$v_DamageTotal-$v_ResistanceTotal;
			if($v_ModifiedDamageTotal<=0){
				$v_ModifiedDamageTotal=0;
				if($v_DamageTotal>0){$this->f_AddToLog('yellow',$v_TeamName,$a_DefendingMember['name'].'\'s resistance prevents '.$v_DamageTotal.' '.$v_DamageType.' damage.');}
			}elseif($v_ModifiedDamageTotal>0){
				$this->f_AddStatistic($v_TeamName,$v_MemberID,'damage-inflicted-by-character',$v_DamageType,$v_ModifiedDamageTotal); /* Statistics */
				$this->f_AddStatistic($v_DefendingTeamName,$v_DefendingMemberID,'health-loss-by-character',$v_DamageType,$v_ModifiedDamageTotal); /* Statistics */
				$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['health']['current']-=$v_ModifiedDamageTotal;
				$this->f_AddToLog('red-bold',$v_TeamName,$a_Member['name'].' deals '.$v_ModifiedDamageTotal.' '.$v_DamageType.' damage to '.$a_DefendingMember['name'].'.');
				$this->f_ModifyMorale($v_TeamName,$v_ModifiedDamageTotal);
				if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['health']['current']<=0){
					$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
					return true;
				}
			}
		}else{
			$v_ModifiedDamageTotal=0;
		}
		
		/* Critical or Effect */
		$v_Pass=false;
		if($v_CriticalName!==''){
			/* Get Apply Critical */
			$v_ApplyCritical=$this->f_GetTrueOrFalse($v_CriticalChances,$a_Chances,$v_CriticalBoost);
			/* Apply Critical */
			if($v_ApplyCritical){
				$v_Pass=true;
				/* Armor Attempts To Counter Effect */
				$v_CounterEffect=$this->f_GetTrueOrFalse($v_DefendingEffectChances,$a_Chances,$v_DefendingEffectBoost);
				/* Apply Or Counter Effect */
				if(!$v_CounterEffect){
					$v_Killed=$this->f_ApplyConditionToCharacter($v_DefendingTeamName,$v_DefendingMemberID,$v_CriticalName,$v_CriticalDuration,$v_TeamName,$v_MemberID);
					if($v_Killed){return true;}
				}
			}else{$this->f_AddToLog($v_TeamName,$v_TeamName.'-yellow',$a_DefendingMember['name'].'\'s defenses prevent '.$v_CriticalName.'.');}
		}else{$v_ApplyCritical=false;}
		
		if($v_EffectName!==''&&!$v_Pass){
			/* Get Apply Effect */
			$v_ApplyEffect=$this->f_GetTrueOrFalse($v_EffectChances,$a_Chances,$v_EffectBoost);
			/* Apply Effect */
			if($v_ApplyEffect){
				/* Armor Attempts To Counter Effect */
				$v_CounterEffect=$this->f_GetTrueOrFalse($v_DefendingEffectChances,$a_Chances,$v_DefendingEffectBoost);
				/* Apply Or Counter Effect */
				if(!$v_CounterEffect){
					$v_Killed=$this->f_ApplyConditionToCharacter($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration,$v_TeamName,$v_MemberID);
					if($v_Killed){return true;}
				}
			}else{$this->f_AddToLog($v_TeamName,$v_TeamName.'-yellow',$a_DefendingMember['name'].'\'s defenses prevent '.$v_EffectName.'.');}
		}else{$v_ApplyEffect=false;}

		return false;
	}
	/* Function - Get Total */
	function f_GetTotal($a_Chances,$v_Chances,$v_Boost){
		$v_Total=0;
		for($v_Counter=1;$v_Counter<=$v_Chances;$v_Counter++){if(array_key_exists($v_Counter,$a_Chances)){if(rand(0,100)+$v_Boost>=$a_Chances[$v_Counter]){$v_Total++;}}}
		return $v_Total;
	}
	/* Function - Get True Or False */
	function f_GetTrueOrFalse($v_Chances,$a_Chances,$v_Boost){
		for($v_Counter=1;$v_Counter<=$v_Chances;$v_Counter++){if(array_key_exists($v_Counter,$a_Chances)){if(rand(0,100)+$v_Boost>=$a_Chances[$v_Counter]){return true;}}}
		return false;
	}
	/* Function - Is Blessed */
	function f_IsBlessed($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID){
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		if($a_DefendingMember['guild']=='Unholy'){return true;}
		return false;
	}
	/* Function - Is Flying */
	function f_IsFlying($v_TeamName,$v_MemberID){return ($this->A_Teams[$v_TeamName][$v_MemberID]['Flying']||$this->A_Teams[$v_TeamName][$v_MemberID]['Hover']);}
	/* Function - Is Sneaking */
	function f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_DetectionInstead=false){
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		foreach($a_DefendingMember[(($v_DetectionInstead)?'sensed':'spotted')] as $v_Key=>$a_Range){if(!empty($a_Range)){if(in_array($v_MemberID,$a_Range)){return false;}}}
		return true;
	}
	/* Function - Remove Cost From Pool */
	function f_RemoveCostFromPool($v_TeamName,$v_MemberID,$v_PoolName,$v_Cost){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']-=$v_Cost;
		$this->A_Statistics[$v_TeamName][$v_PoolName.'-loss-by-character'][$v_MemberID]+=$v_Cost; /* Statistics */
		//$this->f_AddToLog('red-italic',$v_TeamName,$a_Member['name'].' expends '.$v_Cost.' '.$v_PoolName.'.');
	}
	/* Function - Set Timer */
	function f_SetTimer($v_TeamName,$v_MemberID,$v_PerformanceName){$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use'];}
	/* Function - Apply Condition To Character */
	function f_ApplyConditionToCharacter($v_TeamName,$v_MemberID,$v_ConditionName,$v_Duration=1,$v_InflictingTeamName='',$v_InflictingMemberID=-1){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if($v_InflictingMemberID>=0){$a_InflictingMember=$this->A_Teams[$v_InflictingTeamName][$v_InflictingMemberID];}
		$v_Pass=true;
		switch($v_ConditionName){
			case 'Knocked Out':case 'Knocked Down':case 'Knocked-Off Balance':
				$v_Pass=!($a_Member['Flying']||$a_Member['Hover']);
				break;
			case 'Pacify':
				$v_Pass=($a_Member['guild']=='Beast'&&!in_array($a_Member['race'],array('Dragon','Hell Hound','Spider','Wyvern')));
				if($v_Pass){
					$this->f_AddToLog($v_InflictingTeamName,$v_InflictingTeamName,$a_InflictingMember['name'].' attempts to pacify '.$a_Member['name'].' on tile '.$a_Member['location'].'.');
					return $this->f_ChallengeTarget($v_InflictingTeamName,$v_InflictingMemberID,$v_TeamName,$v_MemberID,'action');
				}
				break;
			case 'Tiny Prey':
				$v_Pass=$a_Member['Alive'];
				if($v_Pass){return $this->f_ChallengeTarget($v_InflictingTeamName,$v_InflictingMemberID,$v_TeamName,$v_MemberID,'action');}
				break;
			case 'Decay':case 'Death':
				$v_Pass=$a_Member['Alive'];
				if($v_Pass){return $this->f_ChallengeTarget($v_InflictingTeamName,$v_InflictingMemberID,$v_TeamName,$v_MemberID,'magic');}
				break;
			case 'Turn Undead':case 'Retribution':
				$v_Pass=($a_Member['guild']!=='Unholy');
				if($v_Pass){return $v_ChallengeResult=$this->f_ChallengeTarget($v_InflictingTeamName,$v_InflictingMemberID,$v_TeamName,$v_MemberID,'action');}
				break;
			case 'Afraid':$v_Pass=!$a_Member['Fearless'];break;
			case '':default:
				break;
		}
		if(!$v_Pass){return;}
		if(array_key_exists($v_ConditionName,$a_Member['conditions'])){
			$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionName]['duration']+=$v_Duration;
			$this->f_AddToLog('narrator-italic',$v_TeamName,'The duration of '.$v_ConditionName.' on '.$a_Member['name'].' has increased.');
			return false;
		}else{
			$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionName]=array('name'=>$v_ConditionName,'duration'=>$v_Duration);
			$this->f_AddToLog('narrator-bold',$v_TeamName,$a_Member['name'].' has '.$v_ConditionName.'.');
		}
		switch($v_ConditionName){
			/* Terrain */
			case 'Dust Cloud':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']--;
				break;
			/* Enchantments */
			case 'Adrenaline Rush':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']+=2;$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+=2;break;
			case 'Focused':
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['critical']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['effect']['chances']++;
				break;
			case 'Bandage':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']+=6;break;
			case 'Rejuvenate':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']+=4;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['regeneration']+=2;break;
			case 'Blood Drain':
				$this->f_DrainPool($v_TeamName,$v_MemberID,true,'blood',8);
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;
				break;
			case 'Heal':
				$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'health',1);/* Immediate */
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']+=2;break;
			case 'Lured':
				if($a_Member['facing-right']==$a_InflictingMember['facing-right']){
					if(($a_Member['location']<$a_InflictingMember['location']&&$a_Member['facing-right'])||($a_Member['location']>$a_InflictingMember['location']&&!$a_Member['facing-right'])){
						$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=!$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right'];
					}
				}
				$this->A_Teams[$v_TeamName][$v_MemberID]['performance-preference']['move']+=75;
				break;
			/* Knock-Down */
			case 'Knocked Out':case 'Stunned':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-understand']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
			case 'Knocked Down':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
			case 'Knocked Off-Balance':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
				break;
			/* Blunt */
			case 'Light Bruising':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;break;
			case 'Heavy Bruising':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=6;break;
			case 'Black And Blue Bruising':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=8;break;
			/* Electrical */
			case 'Slight Shock':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=2;break;
			case 'Serious Shock':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=3;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=3;break;
			case 'Deadly Shock':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=4;	break;
			/* Heat */
			case 'Slight Burn':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=2;break;
			case 'Serious Burn':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=3;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=3;break;
			case 'Third-Degree Burn':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=4;break;
			/* Piercing */
			case 'Shallow Puncture':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=2;$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;break;
			case 'Deep Puncture':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=3;$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=3;break;
			case 'Deadly Puncture':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=4;$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;break;
			/* Poison */
			case 'Strong Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
			case 'Moderate Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
			case 'Weak Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']<=0){
					$this->f_AddStatistic($v_InflictingTeamName,$v_InflictingMemberID,'kills-by-character','Poison'); /* Statistics */
					return true;
				}elseif($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
				}
				break;
			/* Sonic */
			case 'Slight Daze':$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=4;break;
			case 'Serious Daze':$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=6;break;
			case 'Dazed':$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']+=8;break;
			/* Other */
			case 'Decay':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']<=0){
					$this->f_AddStatistic($v_InflictingTeamName,$v_InflictingMemberID,'kills-by-character','Other'); /* Statistics */
					return true;
				}elseif($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
				}
				break;

			/* Slashing */
			case 'Shallow Gash':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=4;break;
			case 'Deep Gash':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=6;break;
			case 'Deadly Gash':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=8;break;

			/* Secondary Life */
			case 'Unconscious':$this->A_Teams[$v_TeamName][$v_MemberID]['status']='Unconscious';$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;break;
			case 'Exhausted':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']+=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;
				break;
			case 'Confounded':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['regeneration']+=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']--;
				break;
			case 'Afraid':
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=!$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=!$this->A_Teams[$v_TeamName][$v_MemberID]['retreating'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=false;
				break;

			case '':default:
				break;
		}
	}
	/* Function - Apply Condition To Terrain */
	function f_ApplyConditionToTerrain($v_Tile,$v_ConditionName,$v_Duration=1){
		if(array_key_exists($v_ConditionName,$this->A_Quest['tiles'][$v_Tile]['conditions'])){
			$this->A_Quest['tiles'][$v_Tile]['conditions'][$v_ConditionName]['duration']+=$v_Duration;
			$this->f_AddToLog('narrator-italic','narrator','The duration of '.$v_ConditionName.' on tile '.$v_Tile.' has increased.');
		}else{
			$this->A_Quest['tiles'][$v_Tile]['conditions'][$v_ConditionName]=array('name'=>$v_ConditionName,'duration'=>$v_Duration);
			$this->f_AddToLog('narrator-bold','narrator','Tile '.$v_Tile.' has '.$v_ConditionName.'.');
		}
	}
	/* Function - Check Character Conditions */
	function f_CheckCharacterConditions($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if(!empty($a_Member['conditions'])){
			foreach($a_Member['conditions'] as $v_ConditionName=>$a_Condition){
				$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionName]['duration']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionName]['duration']==0){
					$this->f_RemoveConditionFromCharacter($v_TeamName,$v_MemberID,$v_ConditionName);
				}
			}
		}
		if(!empty($this->A_Quest['tiles'][$a_Member['location']]['conditions'])){
			$a_Tile=$this->A_Quest['tiles'][$a_Member['location']];
			foreach($a_Tile['conditions'] as $v_ConditionName=>$a_Condition){
				switch($v_ConditionName){
					case 'Dust Cloud':$this->f_ApplyConditionToCharacter($v_TeamName,$v_MemberID,'Dust Cloud',$a_Condition['duration']+1);break;
					case '':default:
						break;
				}
			}
		}
	}
	/* Function - Check Tile Conditions */
	function f_CheckTileConditions($v_Tile){
		$a_Tile=$this->A_Quest['tiles'][$v_Tile];
		if(!empty($a_Tile['conditions'])){
			foreach($a_Tile['conditions'] as $v_ConditionName=>$a_Condition){
				$this->A_Quest['tiles'][$v_Tile]['conditions'][$v_ConditionName]['duration']--;
				if($this->A_Quest['tiles'][$v_Tile]['conditions'][$v_ConditionName]['duration']==0){
					$this->f_RemoveConditionFromTile($v_Tile,$v_ConditionName);
				}
			}
		}
	}
	/* Function - Remove Condition From Character */
	function f_RemoveConditionFromCharacter($v_TeamName,$v_MemberID,$v_ConditionName){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		switch($v_ConditionName){
			/* Terrain */
			case 'Dust Cloud':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
				break;
			/* Enchantments */
			case 'Adrenaline Rush':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']-=2;$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']-=2;break;
			case 'Focused':
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['critical']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['critical']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['effect']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['effect']['chances']--;
				break;
			case 'Bandage':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']-=6;break;
			case 'Rejuvenate':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']-=4;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['regeneration']-=2;break;
			case 'Heal':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']-=2;break;
			case 'Lured':$this->A_Teams[$v_TeamName][$v_MemberID]['performance-preference']['move']-=75;break;
			case 'Blood Drain':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;
				break;
			/* Knock-Down */
			case 'Knocked Out':case 'Stunned':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-understand']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-understand'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=$this->A_Teams[$v_TeamName][$v_MemberID]['see']['can-see'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
			case 'Knocked Down':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
			case 'Knocked Off-Balance':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
				break;

			/* Blunt */
			case 'Light Bruising':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;break;
			case 'Heavy Bruising':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=6;break;
			case 'Black And Blue Bruising':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=8;break;
			/* Electrical */
			case 'Slight Shock':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=2;break;
			case 'Serious Shock':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=3;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=3;break;
			case 'Deadly Shock':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=4;	break;
			/* Heat */
			case 'Slight Burn':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=2;break;
			case 'Serious Burn':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=3;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=3;break;
			case 'Third-Degree Burn':$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=4;break;
			/* Piercing */
			case 'Shallow Puncture':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=2;$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;break;
			case 'Deep Puncture':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=3;$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=3;break;
			case 'Deadly Puncture':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=4;$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;break;
			/* Poison */
			case 'Strong Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
			case 'Moderate Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
			case 'Weak Poisoning':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;break;
			/* Other */
			case 'Decay':$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;break;
			/* Slashing */
			case 'Shallow Gash':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=4;break;
			case 'Deep Gash':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=6;break;
			case 'Deadly Gash':$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=8;break;
			/* Sonic */
			case 'Slight Daze':$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=4;break;
			case 'Serious Daze':$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=6;break;
			case 'Dazed':$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['drain']-=8;break;

			/* Secondary Life */
			case 'Unconscious':$this->A_Teams[$v_TeamName][$v_MemberID]['status']='Unconscious';$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;break;
			case 'Exhausted':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']-=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
				break;
			case 'Confounded':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['concentration']['regeneration']-=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
				break;
			case 'Afraid':
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=!$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=!$this->A_Teams[$v_TeamName][$v_MemberID]['retreating'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate'];
				break;

			case '':default:
				break;
		}
		$this->f_AddToLog('narrator-italic',$v_TeamName,$a_Member['name'].' no longer has '.$v_ConditionName.'.');
		unset($this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionName]);
	}
	/* Function - Remove Condition From Tile */
	function f_RemoveConditionFromTile($v_Tile,$v_ConditionName){
		$this->f_AddToLog('narrator-italic','narrator','Tile '.$v_Tile.' no longer has '.$v_ConditionName.'.');
		unset($this->A_Quest['tiles'][$v_Tile]['conditions'][$v_ConditionName]);
	}
	/* Function - All Characters Check Conditions */
	function f_AllCharactersCheckConditions($v_TeamName){
		if(empty($this->A_Teams[$v_TeamName])){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_CheckCharacterConditions($v_TeamName,$v_MemberID);}
	}
	/* Function - All Characters Choose Possible Targets */
	function f_AllCharactersChoosePossibleTargets($v_TeamName){
		if(empty($this->A_Teams[$v_TeamName])){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($a_Member['status']=='Aware'){$this->f_ChoosePossibleTargets($v_TeamName,$v_MemberID);}}
	}
	/* Function - Get Total Weight */
	function f_GetTotalWeight($v_TeamName,$v_MemberID){switch($this->A_Teams[$v_TeamName][$v_MemberID]['stance']){case 'protect-group':return 14;break;case 'stay-back':return 0;break;case '':default:return 7;break;}}
	/* Function - Reset Targets */
	function f_ResetTargets($v_TeamName,$v_MemberID){$this->A_Teams[$v_TeamName][$v_MemberID]['targets']=array('action'=>array(),'attack'=>array(),'magic'=>array());}
	/* Function - Similar Value */
	function f_SimilarValue($a_First=array(),$a_Second=array()){if(!empty($a_First)&&!empty($a_Second)){foreach($a_First as $v_Key=>$v_Value){if(in_array($v_Value,$a_Second)){return $v_Value;}}}return '';}
	/* Function - Choose Possible Targets */
	function f_ChoosePossibleTargets($v_TeamName,$v_MemberID){
		$this->f_ResetTargets($v_TeamName,$v_MemberID);
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if($a_Member['spotted-total']==0){return;}
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['spotted'] as $v_RangeName=>$a_DefendingMembers){
			if(!empty($a_DefendingMembers)){
				foreach($a_DefendingMembers as $v_Key=>$v_DefendingMemberID){
					$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
					foreach($a_Member['performance-preference'] as $v_PerformanceName=>$v_PreferenceWeight){
						if($a_Member['can-'.$v_PerformanceName]&&$a_Member[$v_PerformanceName]['hostile']&&$a_Member[$v_PerformanceName]['has-target']&&$a_Member[$v_PerformanceName]['range'][$v_RangeName]){
							$v_Pass=true;
							$v_Cost=$a_Member[$v_PerformanceName]['cost'];
							$v_PoolName=$a_Member[$v_PerformanceName]['pool'];
							if($v_Cost>0){if($a_Member[$v_PoolName]['current']<$a_Member[$v_PerformanceName]['cost']){$v_Pass=false;}}
							if($v_Pass){
								$v_ExtraWeight=0;
								if($v_PerformanceName!=='attack'){
									switch($a_Member['abilities'][$v_PerformanceName]){
										case 'Pacify Beast':
											$v_Pass=false;
											if($a_DefendingMember['guild']=='Beast'&&$a_DefendingMember['race']!=='Spider'){$v_ExtraWeight=50;$v_Pass=true;}
											if($v_ExtraWeight<=0){$v_Pass=false;}
											break;
										case 'Death From Above':
											$v_Pass=false;
											if($a_DefendingMember['Tiny-Size']){$v_ExtraWeight=50;$v_Pass=true;}
											if($v_ExtraWeight<=0){$v_Pass=false;}
											break;
										case 'Aura Of Death':case 'Aura Of Decay':
											$v_Pass=false;
											if($a_DefendingMember['Alive']){$v_ExtraWeight=50;$v_Pass=true;}
											if($v_ExtraWeight<=0){$v_Pass=false;}
											break;
										case 'Word Of Retribution':
											$v_Pass=false;
											if($a_DefendingMember['guild']=='Unholy'){$v_ExtraWeight=50;$v_Pass=true;}
											if($v_ExtraWeight<=0){$v_Pass=false;}
											break;
										case 'Spit Poison':
											$v_Pass=false;
											if(!$a_DefendingMember['Poison Immunity']){$v_ExtraWeight=5;$v_Pass=true;}
											if($v_ExtraWeight<=0){$v_Pass=false;}
											break;
										default:
											break;
									}
								}
								if($v_Pass){
									$v_TotalWeight=$v_PreferenceWeight+$v_ExtraWeight+$a_Member['range-preference'][$v_RangeName]+$this->f_GetTotalWeight($v_DefendingTeamName,$v_DefendingMemberID);
									$this->A_Teams[$v_TeamName][$v_MemberID]['targets'][$v_PerformanceName][$v_DefendingMemberID]=$v_TotalWeight;
									//$this->f_AddToLog($v_TeamName.'-grey',$v_TeamName,$a_Member['name'].' chooses '.$a_DefendingMember['name'].' on tile '.$a_DefendingMember['location'].' as a possible target.');
								}
							}
						}
					}
				}
			}
		}
	}
	/* Function - All Tiles Check Conditions */
	function f_AllTilesCheckConditions(){foreach($this->A_Quest['tiles'] as $v_Tile=>$a_Tile){$this->f_CheckTileConditions($v_Tile);}}
	/* Function - Opposite */
	function f_Opposite($v_TeamName){return(($v_TeamName=='party')?'quest':'party');}
	/* Function - Continue Quest */
	function f_ContinueQuest(){
		$this->V_TotalTurns++;

		$this->f_AllCharactersRegenerateAndDrain('party');
		$this->f_AllCharactersRegenerateAndDrain('quest');

		$this->f_AllTilesCheckConditions();

		$this->f_AllCharactersCheckConditions('party');
		$this->f_AllCharactersCheckConditions('quest');

		$this->f_AllCharactersDetectPresences('party');
		$this->f_AllCharactersDetectPresences('quest');

		$this->f_AllCharactersLookAround('party');
		$this->f_AllCharactersLookAround('quest');

		$this->f_AllCharactersInformOthers('party');
		$this->f_AllCharactersInformOthers('quest');

		$this->f_AllCharactersChoosePossibleTargets('party');
		$this->f_AllCharactersChoosePossibleTargets('quest');

		$this->f_AllTeamsChooseTargetAndPerform();

		$this->f_CheckTriggers('party');
		$this->f_CheckGoal('party');

		if($this->V_TotalTurns<$this->A_Quest['maximum-turns']&&!$this->A_Quest['party-has-won']&&!$this->A_Quest['quest-has-won']){
			return $this->f_ContinueQuest();
		}else{
			$this->A_Quest['morale-level']=round($this->A_Quest['morale-level']);
			if($this->A_Quest['party-has-won']){
				$this->A_Statistics['party']['success']=true;
			}elseif($this->A_Quest['quest-has-won']){
				$this->A_Statistics['party']['failure']=true;
			}else{
				if($this->A_Quest['morale-level']>50){
					$this->A_Statistics['party']['success']=true;
				}else if($this->A_Quest['morale-level']<50){
					$this->A_Statistics['party']['failure']=true;
				}else{
					$this->A_Statistics['party']['tied']=true;
				}
			}
			$this->f_CalculateEndOfQuestRates('party');
			$this->f_CalculateEndOfQuestRates('quest');
			$this->f_CalculateEndOfQuestMoraleConditions('party');
			$this->f_CalculateEndOfQuestMoraleConditions('quest');
			$this->A_Statistics['total-turns']=$this->V_TotalTurns; /* Statistics */
			$this->A_Statistics['total-time']=$this->f_GetTime(); /* Statistics */
			$this->A_Statistics['morale-level']=$this->A_Quest['morale-level']; /* Statistics */
			$this->f_StoreResults();
			if($this->V_WithLog){return $this->A_Log;}else{return $this->A_Statistics;}
		}
	}
	/* Function - Store Results */
	function f_StoreResults(){
		$v_DC=db::getInstance();
		$a_Statistics=$this->A_Statistics;
		$v_DC->Query('INSERT INTO OA_results (`quest-ID`,`morale-level`,`total-time`,`total-turns`) VALUES ('.$this->A_Quest['ID'].','.$a_Statistics['morale-level'].',"'.$a_Statistics['total-time'].'",'.$a_Statistics['total-turns'].');');
		$v_ResultsID=mysql_insert_id();
		$a_ColumnNames=array('health-loss','stamina-loss','mana-loss','blood-loss','energy-loss','concentration-loss','unconscious','exhausted','confounded','deaths','kills','cost','damage-inflicted','health-healed');
		foreach($a_Statistics['party']['character-names'] as $v_Key=>$v_CharacterName){
			$v_ValuesHTML='';
			foreach($a_ColumnNames as $v_SecondKey=>$v_ColumnName){$v_ValuesHTML.=','.$a_Statistics['party'][$v_ColumnName.'-by-character'][$v_Key];}
			$v_DC->Query('INSERT INTO OA_character_results (`results-ID`,`side`,`name`,`'.implode($a_ColumnNames,'`,`').'`) VALUES ('.$v_ResultsID.',"party","'.$v_CharacterName.'"'.$v_ValuesHTML.');');
		}
		foreach($a_Statistics['quest']['character-names'] as $v_Key=>$v_CharacterName){
			$v_ValuesHTML='';
			foreach($a_ColumnNames as $v_SecondKey=>$v_ColumnName){$v_ValuesHTML.=','.$a_Statistics['quest'][$v_ColumnName.'-by-character'][100+$v_Key];}
			$v_DC->Query('INSERT INTO OA_character_results (`results-ID`,`side`,`name`,`'.implode($a_ColumnNames,'`,`').'`) VALUES ('.$v_ResultsID.',"quest","'.$v_CharacterName.'"'.$v_ValuesHTML.');');
		}
	}
	/* Function - Check Triggers */
	function f_CheckTriggers($v_TeamName){
		foreach($this->A_Quest[$v_TeamName]['triggered-events'] as $v_Key=>$a_Event){
			if(!$a_Event['triggered']){
				$v_PerformEvent=false;
				switch($a_Event['trigger']['name']){
					case 'one-at-location':
						foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
							if($a_Member['location']==$a_Event['trigger']['value']){$v_PerformEvent=true;}
						}
						break;
					case 'retreating-one-at-location':
						foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
							if($a_Member['location']==$a_Event['trigger']['value']){
								if($this->A_Teams[$v_TeamName][$v_MemberID]['retreating']){$v_PerformEvent=true;}
							}
						}
						break;
					case 'turns-have-passed':
						if($this->V_TotalTurns>=$a_Event['trigger']['value']){$v_PerformEvent=true;}
						break;
					default:break;
				}
				if($v_PerformEvent){
					$this->A_Quest[$v_TeamName]['triggered-events'][$v_Key]['triggered']=true;
					switch($a_Event['event']['name']){
						case 'add-member':$this->f_AddCharacterToTeam('quest',array($a_Event['event']['value'],'Soldier',1));break;
						case 'add-member-ambush':$this->f_AddCharacterToTeam('quest',array($a_Event['event']['value'],'Soldier',$this->f_GetTileWithCharacterNearEnd('party')));break;
						default:break;
					}
				}
			}
		}
	}
	/* Function - Get Tile With Character Near End */
	function f_GetTileWithCharacterNearEnd($v_TeamName){
		$v_Tile=1;
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){if($a_Member['location']>$v_Tile){$v_Tile=$a_Member['location'];}}
		return $v_Tile;
	}
	/* Function - Check Goal */
	function f_CheckGoal($v_TeamName){
		$v_Pass=false;
		switch($this->A_Quest['goals'][$this->A_Quest['current-goal']]){
			case 'no-opposing-characters-remain':
				if($this->A_Quest['opposing-characters-remain']<1){
					$this->f_AddToLog('purple',$v_TeamName,'The enemy threat has been eliminated.');
					$v_Pass=true;
				}
				break;
			case 'a-character-reached-right-wall':
				foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
					if($a_Member['location']==$this->A_Quest['length-of-path']){
						$this->f_AddToLog('purple',$v_TeamName,$a_Member['name'].' has reached the end.');
						$v_Pass=true;
					}
				}
				break;
			case 'a-character-reached-left-wall':
				foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
					if($a_Member['location']==1){
						$this->f_AddToLog('purple',$v_TeamName,$a_Member['name'].' has reached the exit.');
						$v_Pass=true;
					}
				}
				break;
			default:
				break;
		}
		if($v_Pass){$this->A_Quest['current-goal']++;}
		if($this->A_Quest['current-goal']>=count($this->A_Quest['goals'])){$this->A_Quest['party-has-won']=true;}
	}
	/* Function - Drain Pool */
	function f_DrainPool($v_TeamName,$v_MemberID,$v_Specific=false,$v_DrainFrom='',$v_Amount=0){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_Pools=array('health','stamina','mana','blood','energy','concentration');
		foreach($a_Pools as $v_Key=>$v_PoolName){
			if($a_Member['can-lose-'.$v_PoolName]){
				$v_Drain=$a_Member[$v_PoolName]['drain'];
				if($v_Specific){if($v_DrainFrom==$v_PoolName){$v_Drain=$v_Amount;}else{$v_Drain=0;}}
				if($v_Drain>0){
					if($a_Member[$v_PoolName]['current']>0){
						if($a_Member[$v_PoolName]['current']-$v_Drain>0){
							$v_ModifiedDrain=$v_Drain;
						}else{
							$v_ModifiedDrain=$a_Member[$v_PoolName]['current'];
						}
						$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']-=$v_ModifiedDrain;
						$this->A_Statistics[$v_TeamName][$v_PoolName.'-loss-by-character'][$v_MemberID]+=$v_ModifiedDrain; /* Statistics */
						$this->f_AddToLog('red-italic',$v_TeamName,$a_Member['name'].' is drained of '.$v_ModifiedDrain.' '.$v_PoolName.'.');
						switch($v_PoolName){case 'health':case 'stamina':case 'mana':$this->f_ModifyMorale($v_TeamName,-0.1);break;default:$this->f_ModifyMorale($v_TeamName,-0.01);break;}
						if($this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']<=0){
							switch($v_PoolName){
								case 'blood':
									if(!array_key_exists('Unconscious',$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
										$this->f_ApplyConditionToCharacter($v_TeamName,$v_MemberID,'Unconscious',12);
										$this->A_Statistics[$v_TeamName]['unconscious-total']++; /* Statistics */
										$this->A_Statistics[$v_TeamName]['unconscious-by-character'][$v_MemberID]++; /* Statistics */
										$this->f_ModifyMorale($v_TeamName,-0.75);
									}
									break;
								case 'energy':
									if(!array_key_exists('Exhausted',$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
										$this->f_ApplyConditionToCharacter($v_TeamName,$v_MemberID,'Exhausted',3);
										$this->A_Statistics[$v_TeamName]['exhausted-total']++; /* Statistics */
										$this->A_Statistics[$v_TeamName]['exhausted-by-character'][$v_MemberID]++; /* Statistics */
										$this->f_ModifyMorale($v_TeamName,-0.50);
									}
									break;
								case 'concentration':
									if(!array_key_exists('Confounded',$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
										$this->f_ApplyConditionToCharacter($v_TeamName,$v_MemberID,'Confounded',6);
										$this->A_Statistics[$v_TeamName]['confounded-total']++; /* Statistics */
										$this->A_Statistics[$v_TeamName]['confounded-by-character'][$v_MemberID]++; /* Statistics */
										$this->f_ModifyMorale($v_TeamName,-0.25);
									}
									break;
								case '':default:
									break;
							}
						}
					}
				}
			}
		}
	}
	/* Function - Get List */
	function f_GetBarracks(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT `character-ID` FROM OA_barracks WHERE `user-ID`=0;');
		$a_CharacterList=$v_DC->Format('assoc_array');
		$this->A_Quest['minutes-per-turn']=0;
		$this->A_Quest['seconds-per-turn']=30;
		$this->A_Teams['Barracks']=array();
		if(!empty($a_CharacterList)){
			foreach($a_CharacterList as $v_Key=>$a_Character){
				foreach($a_Character as $v_SecondKey=>$v_MemberID){
					$this->A_Teams['Barracks'][$v_Key]=F_GetCharacter('Barracks',$v_Key,array($v_MemberID,'Soldier',1));
					$this->f_ApplyKeywordsToCharacter('Barracks',$v_Key);
					$this->f_PrepareCharacter('Barracks',$v_Key);
					$this->f_CalculateRates('Barracks',$v_Key);
					$this->f_SetCans('Barracks',$v_Key);
				}
			}
			$this->A_Barracks=$this->A_Teams['Barracks'];
		}
		return array('data'=>$this->A_Teams['Barracks'],'guild'=>'Barracks');
	}
	/* Function - Get List */
	function f_GetList($v_GuildName){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ID FROM OA_characters WHERE guild="'.$v_GuildName.'" ORDER BY name ASC;');
		$a_CharacterList=$v_DC->Format('assoc_array');
		$this->A_Quest['minutes-per-turn']=0;
		$this->A_Quest['seconds-per-turn']=30;
		$this->A_Teams[$v_GuildName]=array();
		if(!empty($a_CharacterList)){
			foreach($a_CharacterList as $v_Key=>$a_Character){
				foreach($a_Character as $v_SecondKey=>$v_MemberID){
					$this->A_Teams[$v_GuildName][$v_Key]=F_GetCharacter($v_GuildName,$v_Key,array($v_MemberID,'Soldier',1));
					$this->f_ApplyKeywordsToCharacter($v_GuildName,$v_Key);
					$this->f_PrepareCharacter($v_GuildName,$v_Key);
					$this->f_CalculateRates($v_GuildName,$v_Key);
					$this->f_SetCans($v_GuildName,$v_Key);
				}
			}
		}
		return array('data'=>$this->A_Teams[$v_GuildName],'guild'=>$v_GuildName);
	}
	/* Function - Get Quests */
	function f_GetQuests(){
		//$a_QuestList=array(101,102,103,104,105);
		$a_QuestList=array(105);
		$a_Quests=array();
		foreach($a_QuestList as $v_Key=>$v_QuestID){
			$a_Quests[$v_QuestID]=F_GetQuest($v_QuestID,((array_key_exists($v_QuestID,$this->A_AssignedToQuest))?$this->A_AssignedToQuest[$v_QuestID]:array()),$this->A_Barracks);
		}
		return array('quests'=>$a_Quests);
	}
	/* Function - Get Time */
	function f_GetTime(){
		$v_TotalSeconds=$this->V_TotalTurns*(($this->A_Quest['minutes-per-turn']*60)+$this->A_Quest['seconds-per-turn']);
		$v_FailSafeCounter=0;
		$a_TimeInWords=array('day'=>0,'hour'=>0,'minute'=>0);
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
	/* Function - Modify Ability */
	function f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,$v_EffectName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_EffectName]['boost']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_EffectName]['chances']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*8);
	}
	/* Function - Modify Ability All */
	function f_ModifyAbilityAll($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Amount=1){
		$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',$v_Amount);
		$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',$v_Amount);
		$this->f_ModifyAbility($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',$v_Amount);
	}
	/* Function - Modify Ability Boost */
	function f_ModifyAbilityBoost($v_TeamName,$v_MemberID,$v_PerformanceName,$v_EffectName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_EffectName]['boost']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*4);
	}
	/* Function - Modify Ability Chances */
	function f_ModifyAbilityChances($v_TeamName,$v_MemberID,$v_PerformanceName,$v_EffectName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_EffectName]['chances']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*4);
	}
	/* Function - Modify Advanced Challenge */
	function f_ModifyAdvancedChallenge($v_TeamName,$v_MemberID,$v_PerformanceName,$v_State){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['advanced-challenge']=$v_State;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_State)?60:-60);
	}
	/* Function - Modify Ability Duration */
	function f_ModifyAbilityDuration($v_TeamName,$v_MemberID,$v_PerformanceName,$v_PerformanceKey,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_PerformanceKey]['duration']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*24);
	}
	/* Function - Modify Allowed Terrain */
	function f_ModifyAllowedTerrain($v_TeamName,$v_MemberID,$v_TerrainName,$v_State){
		$this->A_Teams[$v_TeamName][$v_MemberID]['move']['allowed-terrain'][$v_TerrainName]=$v_State;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_State)?6:-6);
	}
	/* Function - Modify Area Range */
	function f_ModifyAreaRange($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['area-range']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*60);
	}
	/* Function - Modify Can */
	function f_ModifyCan($v_TeamName,$v_MemberID,$v_CanName,$v_State,$v_Beneficial){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_CanName]=$v_State;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_Beneficial)?120:-120);
	}
	/* Function - Modify Carrying Weight */
	function f_ModifyCarryingWeight($v_TeamName,$v_MemberID,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['carrying-weight']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*2);
	}
	/* Function - Modify Cost */
	function f_ModifyCost($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*2);
	}
	/* Function - Modify Enchantment Effect */
	function f_ModifyEnchantmentEffect($v_TeamName,$v_MemberID,$v_PerformanceName,$v_EffectName){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['name']=$v_EffectName;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=60;
	}
	/* Function - Modify Initiative */
	function f_ModifyInitiative($v_TeamName,$v_MemberID,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*12);
	}
	/* Function - Modify Loudness */
	function f_ModifyLoudness($v_TeamName,$v_MemberID,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['Loudness']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*2);
	}
	/* Function - Modify Maximum */
	function f_ModifyMaximum($v_TeamName,$v_MemberID,$v_PoolName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['soft-maximum']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*120);
	}
	/* Function - Modify Range Of Sense */
	function f_ModifyRangeOfSense($v_TeamName,$v_MemberID,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-sense']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*2);
	}
	/* Function - Modify Range Of View */
	function f_ModifyRangeOfView($v_TeamName,$v_MemberID,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*6);
	}
	/* Function - Modify Recovery */
	function f_ModifyRecovery($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=($v_Amount*2);
	}
	/* Function - Modify Secondary Can */
	function f_ModifySecondaryCan($v_TeamName,$v_MemberID,$v_SecondaryName,$v_CanName,$v_State,$v_Beneficial){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_SecondaryName][$v_CanName]=$v_State;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_Beneficial)?120:-120);
	}
	/* Function - Modify Main Regeneration */
	function f_ModifyMainRegeneration($v_TeamName,$v_MemberID,$v_PoolName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['regeneration']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*120);
	}
	/* Function - Modify Secondary Regeneration */
	function f_ModifySecondaryRegeneration($v_TeamName,$v_MemberID,$v_PoolName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['regeneration']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*6);
	}
	/* Function - Modify Skill */
	function f_ModifySkill($v_TeamName,$v_MemberID,$v_SkillName,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills'][$v_SkillName]+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*2);
	}
	/* Function - Modify Speed */
	function f_ModifySpeed($v_TeamName,$v_MemberID,$v_Amount=1){
		$this->A_Teams[$v_TeamName][$v_MemberID]['speed']+=$v_Amount;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=($v_Amount*12);
	}
	/* Function - Modify Timer */
	function f_ModifyTimer($v_TeamName,$v_MemberID){
		if($this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use-timer']>0){$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use-timer']--;}
		if($this->A_Teams[$v_TeamName][$v_MemberID]['attack']['re-use-timer']>0){$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['re-use-timer']--;}
		if($this->A_Teams[$v_TeamName][$v_MemberID]['magic']['re-use-timer']>0){$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['re-use-timer']--;}
	}
	/* Function - Turn Off Can Be Hit */
	function f_TurnOffCanBeHit($v_TeamName,$v_MemberID,$v_DamageType){
		$this->A_Teams[$v_TeamName][$v_MemberID]['defense'][$v_DamageType]['can-be-hit']=false;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=64;
	}
	/* Function - Turn On */
	function f_TurnOn($v_TeamName,$v_MemberID,$v_PerformanceName,$v_PerformanceKey,$v_Beneficial=false){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_PerformanceKey]=true;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_Beneficial)?20:-20);
	}
	/* Function - Turn On Range */
	function f_TurnOnRange($v_TeamName,$v_MemberID,$v_PerformanceName,$v_PerformanceKey){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range'][$v_PerformanceKey]=true;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
	}
	/* Function - Turn On Special */
	function f_TurnOnSpecial($v_TeamName,$v_MemberID,$v_PerformanceKey,$v_Beneficial=false){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceKey]=true;
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=(($v_Beneficial)?120:-120);
	}
	/* Function - Prepare Team */
	function f_PrepareTeam($v_TeamName){
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			$this->f_AddCharacterToStatistics($v_TeamName,$v_MemberID,$a_Member['name']);
			$this->A_Quest[$v_TeamName]['total-members-added']++;
			$this->f_ApplyKeywordsToCharacter($v_TeamName,$v_MemberID);
			$this->f_PrepareCharacter($v_TeamName,$v_MemberID);
			$this->f_CalculateRates($v_TeamName,$v_MemberID);
			$this->f_SetCans($v_TeamName,$v_MemberID);
		}
	}
	/* Function - Regenerate Pool */
	function f_RegeneratePool($v_TeamName,$v_MemberID,$v_Specific=false,$v_RegenerateTo='',$v_Amount=0){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_Pools=array('health','stamina','mana','blood','energy','concentration');
		foreach($a_Pools as $v_Key=>$v_PoolName){
			if($a_Member['can-lose-'.$v_PoolName]){
				$v_Regeneration=$a_Member[$v_PoolName]['regeneration'];
				if($v_Specific){
					if($v_RegenerateTo==$v_PoolName){
						$v_Regeneration=$v_Amount;
					}else{
						$v_Regeneration=0;
					}
				}
				if($v_Regeneration>0){
					if($a_Member[$v_PoolName]['current']<$a_Member[$v_PoolName]['soft-maximum']){
						if($a_Member[$v_PoolName]['current']+$v_Regeneration<=$a_Member[$v_PoolName]['soft-maximum']){
							$v_ModifiedRegeneration=$v_Regeneration;
						}else{
							$v_ModifiedRegeneration=$a_Member[$v_PoolName]['soft-maximum']-$a_Member[$v_PoolName]['current'];
						}
						$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']+=$v_ModifiedRegeneration;
						$this->f_AddToLog('green-italic',$v_TeamName,$a_Member['name'].' has regenerated '.$v_Regeneration.' '.$v_PoolName.'.');
						switch($v_PoolName){case 'health':case 'stamina':case 'mana':$this->f_ModifyMorale($v_TeamName,0.1);break;default:$this->f_ModifyMorale($v_TeamName,0.01);break;}
					}
				}
			}
		}
	}
	/* Function - Set Cans */
	function f_SetCans($v_TeamName,$v_MemberID){
		foreach(array('action','attack','communicate','magic','move','see') as $v_Key=>$v_CanName){
			$this->A_Teams[$v_TeamName][$v_MemberID]['can-'.$v_CanName]=$this->A_Teams[$v_TeamName][$v_MemberID][$v_CanName]['can-'.$v_CanName];
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-understand']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-understand'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-detect']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-detect'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-hide']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-hide'];
	}
	/* Function - Add Character To Team */
	function f_AddCharacterToTeam($v_TeamName,$a_GroupMember){
		$v_NextKey=$this->A_Quest[$v_TeamName]['next-key'];
		$this->A_Teams[$v_TeamName][$v_NextKey]=F_GetCharacter($v_TeamName,$v_NextKey,$a_GroupMember);
		$this->f_AddToLog('gold',$v_TeamName,$this->A_Teams[$v_TeamName][$v_NextKey]['name'].' has joined the '.$v_TeamName.' on tile '.$this->A_Teams[$v_TeamName][$v_NextKey]['location'].'.');
		$this->A_Quest[$v_TeamName]['next-key']++;
		$this->f_ReadyCharacter($v_TeamName,$v_MemberID);
	}
	/* Function - Ready Character */
	function f_ReadyCharacter($v_TeamName,$v_MemberID){
		$this->f_AddCharacterToStatistics($v_TeamName,$v_MemberID,$a_Member['name']);
		$this->A_Quest[$v_TeamName]['total-members-added']++;
		$this->f_ApplyKeywordsToCharacter($v_TeamName,$v_MemberID);
		$this->f_PrepareCharacter($v_TeamName,$v_MemberID);
		$this->f_CalculateRates($v_TeamName,$v_MemberID);
		$this->f_SetCans($v_TeamName,$v_MemberID);
	}
	/* Function - Sort By Initiative */
	function f_SortByInitiative(){
		$a_Initiative=array();
		foreach($this->A_Teams as $v_TeamName=>$a_Team){
			foreach($a_Team as $v_MemberID=>$a_Member){
				$v_Initiative=$a_Member['initiative'];
				if(!array_key_exists($v_Initiative,$a_Initiative)){$a_Initiative[$v_Initiative]=array();}
				$a_Initiative[$v_Initiative][]=array('id'=>$v_MemberID,'team'=>$v_TeamName);
			}
		}
		krsort($a_Initiative);
		return $a_Initiative;
	}
	/* Function - Start */
	function f_Start($v_WithLog){return $this->f_StartQuest($v_WithLog);}
	/* Function - Start Quest */
	function f_StartQuest($v_WithLog){
		$this->A_Teams=array();
		$this->A_Log=array();
		$this->A_Quest=array();
		$this->V_TotalTurns=0;
		$this->f_ResetStatistics();
		$this->V_WithLog=$v_WithLog;
		$this->A_Quest=F_GetQuest($this->V_QuestID,((array_key_exists($this->V_QuestID,$this->A_AssignedToQuest))?$this->A_AssignedToQuest[$this->V_QuestID]:array()),$this->A_Barracks);
		$this->f_ConstructTeam('party');
		$this->f_ConstructTeam('quest');
		$this->f_PrepareTeam('party');
		$this->f_PrepareTeam('quest');
		$this->f_AddTerrainToQuest();
		return $this->f_ContinueQuest();
	}

	/* Function - Online */
	function Online(){}
	/* Function - Reset Statistics */
	function f_ResetStatistics(){
		$this->A_Statistics=array(
			'morale-level'=>50,
			'total-time'=>'',
			'total-turns'=>0
		);
		foreach(array('party','quest') as $v_Key=>$v_TeamName){
			$this->A_Statistics[$v_TeamName]=array(
				'character-names'=>array(),
				'recovered-loot'=>array(),
				'awards-by-character'=>array(),
				'injuries-by-character'=>array(),
				'success'=>false,
				'failure'=>false,
				'tied'=>false,
				'characters'=>array(),
				'health-loss-total'=>0,'health-loss-by-character'=>array(),
				'stamina-loss-total'=>0,'stamina-loss-by-character'=>array(),
				'mana-loss-total'=>0,'mana-loss-by-character'=>array(),
				'blood-loss-total'=>0,'blood-loss-by-character'=>array(),
				'energy-loss-total'=>0,'energy-loss-by-character'=>array(),
				'concentration-loss-total'=>0,'concentration-loss-by-character'=>array(),
				'unconscious-total'=>0,'unconscious-by-character'=>array(),
				'exhausted-total'=>0,'exhausted-by-character'=>array(),
				'confounded-total'=>0,'confounded-by-character'=>array(),
				'deaths-total'=>0,'deaths-by-character'=>array(),
				'cost-total'=>0,'cost-by-character'=>array(),
				'kills-total'=>0,'kills-by-character'=>array(),
				'kills-by-type'=>array('Acid'=>0,'Blunt'=>0,'Cold'=>0,'Electrical'=>0,'Heat'=>0,'Piercing'=>0,'Poison'=>0,'Slashing'=>0,'Sonic'=>0,'Other'=>0),
				'damage-inflicted-total'=>0,'damage-inflicted-by-character'=>array(),
				'damage-inflicted-by-type'=>array('Acid'=>0,'Blunt'=>0,'Cold'=>0,'Electrical'=>0,'Heat'=>0,'Piercing'=>0,'Poison'=>0,'Slashing'=>0,'Sonic'=>0,'Other'=>0),
				'health-healed-total'=>0,'health-healed-by-character'=>array()
			);
		}
	}
}

/* *********************************************************************************************************************************************************** */

/* Function - Construct Group */
function F_ConstructGroup($v_TeamName,$a_Quest=array(),$a_Assigned=array(),$a_Barracks=array()){
	$v_MemberLimit=$a_Quest['maximum'];
	/* All Characters */
	//$a_PossibleMembers=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26);
	/* User Playable Characters */
	/* 7,8,23,34,46,49 */
	$a_PossibleMembers=array(0,1,2,3,4,5,6,9,10,11,12,13,14,15,16,17,18,19,20,21,22,24,25,26,27,28,29,30,31,32,33,35,36,37,38,39,40,41,42,43,44,45,47,48);
	/* Beast Characters */
	//$a_PossibleMembers=array(9,10,11,14,15,18,19,20,24);
	/* Only Character */
	//$a_PossibleMembers=array();
	$a_Group=array();
	if(!empty($a_Assigned)){
		$v_Counter=0;
		foreach($a_Assigned as $v_BarracksKey=>$v_MemberID){
			if(array_key_exists($v_BarracksKey,$a_Barracks)){
				if($a_Barracks[$v_BarracksKey]['ID']==$v_MemberID){
					$a_Group[$v_Counter]=array($v_BarracksKey,(($v_Counter>0)?'Soldier':'Commander'),1);
					$v_Counter++;
				}
			}
		}
	}else{
		for($v_Counter=0;$v_Counter<$v_MemberLimit;$v_Counter++){
			for($v_FailSafe=0;$v_FailSafe<=10;$v_FailSafe++){
				$v_RandomPossibleMember=array_rand($a_PossibleMembers);
				$v_RandomMemberID=$a_PossibleMembers[$v_RandomPossibleMember];
				//if(!in_array($v_RandomMemberID,$a_Quest['exclusion-list'])){break;}
			}
			$a_Group[$v_Counter]=array($v_RandomMemberID,(($v_Counter>0)?'Soldier':'Commander'),(($v_TeamName=='party')?1:$a_Quest['length-of-path']));
		}
	}
	return $a_Group;
}
/* Function - Get Character */
function F_GetCharacter($v_TeamName,$v_NextKey,$a_GroupMember,$v_FromBarracks=false,$a_Barracks=array()){
	$a_Mercenary=array(
		'ID'=>$a_GroupMember[0],
		'team-key'=>$v_NextKey,
		'team-name'=>$v_TeamName,
		'name'=>'',
		'secondary-name'=>'',
		'hire-value'=>0,
		'hire-rate-per-turn'=>1,
		'hire-rate-per-hour'=>12,
		'unlocked'=>1,
		'guild'=>'Fighter',
		'race'=>'Human',
		'rank'=>$a_GroupMember[1],
		'status'=>'Aware',
		'abilities'=>array('action'=>'','magic'=>''),
		'training'=>array('basic'=>'','minor'=>'','major'=>'','specialization'=>''),
		'morale'=>array('basic'=>'','minor'=>'','major'=>'','specialization'=>''),
		'special'=>array(),
		'stance'=>'',
		'performance-preference'=>array('move'=>5,'attack'=>10,'magic'=>15,'action'=>20),
		'range-preference'=>array('Very Close'=>18,'Close'=>16,'Very Short'=>14,'Short'=>12,'Long'=>10,'Very Long'=>8,'Far'=>6,'Very Far'=>4,'Distant'=>2,'Very Distant'=>0),
		'race-image'=>'empty_icon',
		'Alive'=>false,
		'Awe-Inspiring'=>false,
		'Ethereal'=>false,
		'Fearful'=>false,
		'Fearless'=>false,
		'Flying'=>false,
		'Giant-Size'=>false,
		'Hover'=>false,
		'Large-Size'=>false,
		'Medium-Size'=>false,
		'Heat Immunity'=>false,
		'Piercing Immunity'=>false,
		'Poison Immunity'=>false,
		'Small-Size'=>false,
		'Tiny-Size'=>false,
		'Tower-Size'=>false,
		'keyword-list'=>array(),
		'can-lose-health'=>true,
		'health'=>array('current'=>1,'hard-maximum'=>10,'hard-minimum'=>0,'soft-maximum'=>1,'regeneration'=>0,'drain'=>0),
		'can-lose-mana'=>false,
		'mana'=>array('current'=>1,'hard-maximum'=>10,'hard-minimum'=>0,'soft-maximum'=>1,'regeneration'=>0,'drain'=>0),
		'can-lose-stamina'=>false,
		'stamina'=>array('current'=>1,'hard-maximum'=>10,'hard-minimum'=>0,'soft-maximum'=>1,'regeneration'=>0,'drain'=>0),
		'can-lose-blood'=>false,
		'blood'=>array('current'=>1,'hard-maximum'=>100,'hard-minimum'=>0,'soft-maximum'=>100,'regeneration'=>0,'drain'=>0),
		'can-lose-energy'=>false,
		'energy'=>array('current'=>1,'hard-maximum'=>100,'hard-minimum'=>0,'soft-maximum'=>100,'regeneration'=>1,'drain'=>0),
		'can-lose-concentration'=>false,
		'concentration'=>array('current'=>1,'hard-maximum'=>100,'hard-minimum'=>0,'soft-maximum'=>100,'regeneration'=>0,'drain'=>0),
		'skills'=>array('Accuracy'=>0,'Balance'=>0,'Block'=>0,'Communication'=>0,'Detection'=>0,'Dodge'=>0,'Intellect'=>0,'Stealth'=>0,'Strength'=>0,'Understanding'=>0,'Vision'=>0,'Arcane Focus'=>0,'Battle Focus'=>0,'Evasion'=>0,'Footing'=>0,'Observation'=>0),
		'carrying-weight'=>10, /* Used like a skill. Strength is added to this and item weight is subtracted from this. */
		'initiative'=>3,
		'speed'=>0,
		'range-of-view'=>1,
		'range-of-sense'=>1,
		'hand-use'=>array('left'=>0,'right'=>0),
		'location'=>$a_GroupMember[2],
		'language'=>array(),
		'performed-instant'=>false,
		/* On-Death Effect */
		'on-death'=>array(
			'can-on-death'=>false,
			'image'=>'empty_icon',
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt'),
			'advanced-challenge'=>false,'area'=>false,'blessed'=>false,'enchantment'=>false,'challenge'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,'instant'=>false,'projectile'=>false,'sneaking'=>false,
			'area-range'=>0,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'skill-equivalent'=>'',
			'range'=>array('Very Close'=>false,'Close'=>false,'Very Short'=>false,'Short'=>false,'Long'=>false,'Very Long'=>false,'Far'=>false,'Very Far'=>false,'Distant'=>false,'Very Distant'=>false),
			're-use'=>0,'re-use-timer'=>0
		),
		/* Action */
		'can-action'=>false,
		'action'=>array(
			'can-action'=>false,
			'image'=>'empty_icon',
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt'),
			'advanced-challenge'=>false,'area'=>false,'blessed'=>false,'enchantment'=>false,'challenge'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,'instant'=>false,'projectile'=>false,'sneaking'=>false,
			'area-range'=>0,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'skill-equivalent'=>'',
			'range'=>array('Very Close'=>false,'Close'=>false,'Very Short'=>false,'Short'=>false,'Long'=>false,'Very Long'=>false,'Far'=>false,'Very Far'=>false,'Distant'=>false,'Very Distant'=>false),
			'range-start'=>'','range-end'=>'',
			'cost'=>0,'pool'=>'stamina',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Attack */
		'can-attack'=>false,
		'attack'=>array(
			'can-attack'=>false,
			'images'=>array('left-hand'=>'','right-hand'=>'empty_icon'),
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt'),
			'advanced-challenge'=>false,'area'=>false,'blessed'=>false,'enchantment'=>false,'challenge'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,'instant'=>false,'projectile'=>false,'sneaking'=>false,
			'area-range'=>0,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'skill-equivalent'=>'',
			'range'=>array('Very Close'=>false,'Close'=>false,'Very Short'=>false,'Short'=>false,'Long'=>false,'Very Long'=>false,'Far'=>false,'Very Far'=>false,'Distant'=>false,'Very Distant'=>false),
			'range-start'=>'','range-end'=>'',
			'cost'=>0,'pool'=>'energy',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Magic */
		'can-magic'=>false,
		'magic'=>array(
			'can-magic'=>false,
			'image'=>'empty_icon',
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt'),
			'advanced-challenge'=>false,'area'=>false,'blessed'=>false,'enchantment'=>false,'challenge'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,'instant'=>false,'projectile'=>false,'sneaking'=>false,
			'area-range'=>0,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'skill-equivalent'=>'',
			'range'=>array('Very Close'=>false,'Close'=>false,'Very Short'=>false,'Short'=>false,'Long'=>false,'Very Long'=>false,'Far'=>false,'Very Far'=>false,'Distant'=>false,'Very Distant'=>false),
			'range-start'=>'','range-end'=>'',
			'cost'=>0,'pool'=>'mana',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Move */
		'can-move'=>false,
		'can-hide'=>false,
		'moved-this-turn'=>false,
		'facing-right'=>true,
		'retreating'=>false,
		'move'=>array(
			'can-move'=>false,
			'can-hide'=>false,
			'allowed-terrain'=>array('brush'=>false,'dirt'=>false,'forest'=>false,'grass'=>false,'ice'=>false,'lava'=>false,'mud'=>false,'rocks'=>false,'sand'=>false,'swamp'=>false,'trees'=>false,'water'=>false),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'challenge'=>false,'has-target'=>false,'hostile'=>false,'instant'=>false,
			'cost'=>0,'pool'=>'energy',
			're-use'=>0,'re-use-timer'=>0
		),
		/* See */
		'can-see'=>false,
		'see'=>array(
			'can-see'=>false,
			'can-hide'=>false,
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>''),
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'challenge'=>false,
			'range'=>array('Very Close'=>false,'Close'=>false,'Very Short'=>false,'Short'=>false,'Long'=>false,'Very Long'=>false,'Far'=>false,'Very Far'=>false,'Distant'=>false,'Very Distant'=>false),
			'cost'=>0,'pool'=>'concentration',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Communicate */
		'can-communicate'=>false,
		'can-understand'=>false,
		'can-detect'=>false,
		'communicate'=>array(
			'can-communicate'=>false,
			'can-understand'=>false,
			'can-detect'=>false,
			'Loudness'=>0,
			'range'=>array('Very Close'=>false,'Close'=>false,'Very Short'=>false,'Short'=>false,'Long'=>false,'Very Long'=>false,'Far'=>false,'Very Far'=>false,'Distant'=>false,'Very Distant'=>false),
			'range-start'=>'','range-end'=>'',
			'cost'=>0,'pool'=>'concentration',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Defense */
		'defense'=>array(
			'images'=>array('hands'=>'empty_icon','head'=>'empty_icon','feet'=>'empty_icon','legs'=>'empty_icon','torso'=>'empty_icon'),
			'protection'=>array('boost'=>1,'chances'=>1),
			'Acid'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Blunt'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Cold'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Electrical'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Heat'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Piercing'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Poison'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Slashing'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
			'Sonic'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true)
		),
		'items'=>array('face'=>'','feet'=>'','fingers'=>'','hands'=>'','head'=>'','left-hand'=>'','legs'=>'','neck'=>'','right-hand'=>'','torso'=>'','waist'=>''),
		'lootable-items'=>array('face'=>'','feet'=>'','fingers'=>'','hands'=>'','head'=>'','left-hand'=>'','legs'=>'','neck'=>'','right-hand'=>'','torso'=>'','waist'=>''),
		'conditions'=>array(),
		'preferred-targets'=>array(),
		'target'=>array('Very Close'=>-1,'Close'=>-1,'Very Short'=>-1,'Short'=>-1,'Long'=>-1,'Very Long'=>-1,'Far'=>-1,'Very Far'=>-1,'Distant'=>-1,'Very Distant'=>-1),
		'targets'=>array('action'=>array(),'attack'=>array(),'magic'=>array()),
		'sensed'=>array('Very Close'=>array(),'Close'=>array(),'Very Short'=>array(),'Short'=>array(),'Long'=>array(),'Very Long'=>array(),'Far'=>array(),'Very Far'=>array(),'Distant'=>array(),'Very Distant'=>array()),
		'sensed-total'=>0,
		'spotted'=>array('Very Close'=>array(),'Close'=>array(),'Very Short'=>array(),'Short'=>array(),'Long'=>array(),'Very Long'=>array(),'Far'=>array(),'Very Far'=>array(),'Distant'=>array(),'Very Distant'=>array()),
		'spotted-total'=>0,
		'visible-members'=>array('Very Close'=>array(),'Close'=>array(),'Very Short'=>array(),'Short'=>array(),'Long'=>array(),'Very Long'=>array(),'Far'=>array(),'Very Far'=>array(),'Distant'=>array(),'Very Distant'=>array()),
		'visible-member-total'=>0
	);
	if($v_FromBarracks){
		$a_Character=$a_Barracks[$a_GroupMember[0]];
		return array_merge($a_Mercenary,$a_Character);
	}
	$v_DC=db::getInstance();
	$v_DC->Query('SELECT * FROM OA_characters WHERE ID='.$a_GroupMember[0].';');
	$a_Character=$v_DC->Format('assoc');
	foreach($a_Character as $v_Key=>$v_Data){
		switch($v_Key){
			case 'abilities':case 'items':case 'lootable-items':case 'performance-preference':case 'training':
				$a_Mixed=explode(',',$v_Data);
				foreach($a_Mixed as $v_MixedKey=>$v_MixedData){if($v_MixedKey%2){$a_Mercenary[$v_Key][$a_Mixed[$v_MixedKey-1]]=$v_MixedData;}}
				break;
			case 'language':
				$a_Mercenary[$v_Key]=explode(',',$v_Data);
				break;
			case 'guild':case 'name':case 'race':case 'stance':
				$a_Mercenary[$v_Key]=$v_Data;
				break;
			case '':default:
				break;
		}
	}
	return $a_Mercenary;
}
/* Function - Get Quest */
function F_GetQuest($v_QuestID,$a_Assigned=array(),$a_Barracks=array()){
	$v_DC=db::getInstance();
	$v_DC->Query('SELECT * FROM OA_quests WHERE ID='.$v_QuestID.';');
	$a_Quest=$v_DC->Format('assoc');
	foreach($a_Quest as $v_Key=>$v_Data){
		switch($v_Key){
			case 'wildlife-list':case 'goals':$a_Quest[$v_Key]=explode(',',$v_Data);break;
			case '':default:
				break;
		}
	}
	$a_Quest['party']=array('assigned-team'=>array(),'automatic-events'=>array(),'next-key'=>0,'starting-team'=>array(),'total-members-added'=>0,'triggered-events'=>array());
	$a_Quest['quest']=array('automatic-events'=>array(),'next-key'=>100,'starting-team'=>array(),'total-members-added'=>0,'triggered-events'=>array());
	$a_Quest['current-goal']=0;
	$a_Quest['morale-level']=50;
	$a_Quest['party-has-won']=false;
	$a_Quest['party-has-tied']=false;
	$a_Quest['quest-has-won']=false;
	$a_Quest['tiles']=array();
	if(!empty($a_Assigned)){$a_Quest['party']['assigned-team']=F_ConstructGroup('party',$a_Quest,$a_Assigned,$a_Barracks);}else{$a_Quest['party']['starting-team']=F_ConstructGroup('party',$a_Quest);}
	$a_Quest['quest']['starting-team']=F_ConstructGroup('quest',$a_Quest);
	$v_AssignedTotal=count($a_Quest['party']['assigned-team']);
	$a_Quest['party-has-met-minimum']=(($v_AssignedTotal>=$a_Quest['minimum'])?true:false);
	$a_Quest['party-is-at-maximum']=(($v_AssignedTotal==$a_Quest['maximum'])?true:false);
	return $a_Quest;
}
?>