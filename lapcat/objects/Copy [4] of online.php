<?
class Online{

	/* Array - Statistics */
	private $A_Statistics=array(
		'total-time'=>'',
		'total-turns'=>'',
		'party'=>array(
			'success'=>false,
			'characters'=>array(),
			'health-loss-total'=>0,
			'health-loss-by-character'=>array(),
			'stamina-loss-total'=>0,
			'stamina-loss-by-character'=>array(),
			'mana-loss-total'=>0,
			'mana-loss-by-character'=>array(),
			'blood-loss-total'=>0,
			'blood-loss-by-character'=>array(),
			'energy-loss-total'=>0,
			'energy-loss-by-character'=>array(),
			'focus-loss-total'=>0,
			'focus-loss-by-character'=>array(),
			'unconscious-total'=>0,
			'unconscious-by-character'=>array(),
			'exhausted-total'=>0,
			'exhausted-by-character'=>array(),
			'confounded-total'=>0,
			'confounded-by-character'=>array(),
			'deaths-total'=>0,
			'deaths-by-character'=>array(),
			'kills-total'=>0,
			'kills-by-character'=>array(),
			'kills-by-type'=>array('Blunt'=>0,'Piercing'=>0,'Slashing'=>0,'Cold'=>0,'Heat'=>0,'Electrical'=>0,'Sonic'=>0,'Poison'=>0),
			'cost-total'=>0,
			'cost-by-character'=>array(),
			'damage-inflicted-total'=>0,
			'damage-inflicted-by-type'=>array('Blunt'=>0,'Piercing'=>0,'Slashing'=>0,'Cold'=>0,'Heat'=>0,'Electrical'=>0,'Sonic'=>0,'Poison'=>0),
			'damage-inflicted-by-character'=>array(),
			'health-healed-total'=>0,
			'health-healed-by-character'=>array(),
			'resurrections-total'=>0
		),
		'quest'=>array(
			'success'=>false,
			'characters'=>array(),
			'blood-loss-total'=>0,
			'health-loss-by-character'=>array(),
			'stamina-loss-total'=>0,
			'stamina-loss-by-character'=>array(),
			'mana-loss-total'=>0,
			'mana-loss-by-character'=>array(),
			'blood-loss-total'=>0,
			'blood-loss-by-character'=>array(),
			'energy-loss-total'=>0,
			'energy-loss-by-character'=>array(),
			'focus-loss-total'=>0,
			'focus-loss-by-character'=>array(),
			'unconscious-total'=>0,
			'unconscious-by-character'=>array(),
			'exhausted-total'=>0,
			'exhausted-by-character'=>array(),
			'confounded-total'=>0,
			'confounded-by-character'=>array(),
			'deaths-total'=>0,
			'deaths-by-character'=>array(),
			'kills-total'=>0,
			'kills-by-character'=>array(),
			'kills-by-type'=>array('Blunt'=>0,'Piercing'=>0,'Slashing'=>0,'Cold'=>0,'Heat'=>0,'Electrical'=>0,'Sonic'=>0,'Poison'=>0),
			'cost-total'=>0,
			'cost-by-character'=>array(),
			'damage-inflicted-total'=>0,
			'damage-inflicted-by-type'=>array('Blunt'=>0,'Piercing'=>0,'Slashing'=>0,'Cold'=>0,'Heat'=>0,'Electrical'=>0,'Sonic'=>0,'Poison'=>0),
			'damage-inflicted-by-character'=>array(),
			'health-healed-total'=>0,
			'health-healed-by-character'=>array(),
			'resurrections-total'=>0
		)
	);

	/* Function - Apply Method */
	function f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,$v_EffectName){
		switch($v_EffectName){
			case 'Adrenaline Rush':case 'Bandage':case 'Dazzle':case 'Decay':case 'Focused':case 'Heal':case 'Increased Size':case 'Rejuvenate':case 'Retribution':case 'Stoneskin':
				$a_Parameters=array('','Enchantment','','');
				break;
			case 'Incineration':
				$a_Parameters=array('','Accuracy','','Dodge');
				break;
			case 'Blood Drain':
				$a_Parameters=array('','Strength','','Dodge');
				break;
			case 'Knocked Down':case 'Tripped':
				$a_Parameters=array('','Strength','','Footing');
				break;
			case 'Blind':
			case 'Light Bruising':case 'Heavy Bruising':case 'Black And Blue Bruising':case 'Crushed':
			case 'Shallow Puncture':case 'Deep Puncture':case 'Deadly Puncture':case 'Punctured':
			case 'Shallow Gash':case 'Deep Gash':case 'Deadly Gash':case 'Severed':
			case 'Slightly Frozen':case 'Seriously Frozen':case 'Chilled To The Bone':case 'Frozen':
			case 'Slight Burn':case 'Serious Burn':case 'Third-Degree Burn':case 'Scorched':
			case 'Slight Shock':case 'Serious Shock':case 'Deadly Shock':case 'Electrocuted':
			case 'Slight Daze':case 'Serious Daze':case 'Dazed':case 'Dazed And Confused':
			case 'Weak Poisoning':case 'Moderate Poisoning':case 'Deadly Poisoning':case 'Poisoned':
				$a_Parameters=array('','Battle Focus','','Evasion');
				break;
			case 'Lured':case 'Turn Undead':
				$a_Parameters=array('','Communication','','Intellect');
				break;
			case 'Afraid':
				$a_Parameters=array('','Communication','','Understanding');
				break;
			case '':default:
				$a_Parameters=array('','','','');
				break;
		}
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['effect-name']=$v_EffectName;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']=$a_Parameters[0];
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']=$a_Parameters[1];
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['level']=$a_Parameters[2];
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']=$a_Parameters[3];
	}

	/* Function - Apply Damage Type */
	function f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName='action',$v_DamageType='Blunt',$v_Powerful=false){
		if($v_Powerful){
			$a_DamageTypes=array(
				'Blunt'=>array('critical'=>'Black And Blue Bruising','damage'=>'Crushed','effect'=>'Heavy Bruising'),
				'Piercing'=>array('critical'=>'Deadly Puncture','damage'=>'Punctured','effect'=>'Deep Puncture'),
				'Slashing'=>array('critical'=>'Deadly Gash','damage'=>'Severed','effect'=>'Deep Gash'),
				'Cold'=>array('critical'=>'Chilled To The Bone','damage'=>'Frozen','effect'=>'Seriously Frozen'),
				'Heat'=>array('critical'=>'Third-Degree Burn','damage'=>'Scorched','effect'=>'Serious Burn'),
				'Electrical'=>array('critical'=>'Deadly Shock','damage'=>'Electrocuted','effect'=>'Serious Shock'),
				'Sonic'=>array('critical'=>'Dazed','damage'=>'Dazed And Confused','effect'=>'Serious Daze'),
				'Poison'=>array('critical'=>'Deadly Poisoning','damage'=>'Poisoned','effect'=>'Moderate Poisoning')
			);
		}else{
			$a_DamageTypes=array(
				'Blunt'=>array('critical'=>'Heavy Bruising','damage'=>'Black And Blue Bruising','effect'=>'Light Bruising'),
				'Piercing'=>array('critical'=>'Deep Puncture','damage'=>'Deadly Puncture','effect'=>'Shallow Puncture'),
				'Slashing'=>array('critical'=>'Deep Gash','damage'=>'Deadly Gash','effect'=>'Shallow Gash'),
				'Cold'=>array('critical'=>'Seriously Frozen','damage'=>'Chilled To The Bone','effect'=>'Slightly Frozen'),
				'Heat'=>array('critical'=>'Serious Burn','damage'=>'Third-Degree Burn','effect'=>'Slight Burn'),
				'Electrical'=>array('critical'=>'Serious Shock','damage'=>'Deadly Shock','effect'=>'Slight Shock'),
				'Sonic'=>array('critical'=>'Serious Daze','damage'=>'Dazed','effect'=>'Slight Daze'),
				'Poison'=>array('critical'=>'Moderate Poisoning','damage'=>'Deadly Poisoning','effect'=>'Weak Poisoning')
			);
		}
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type']=$v_DamageType;
		$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,$a_DamageTypes[$v_DamageType]['effect']);
		$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect',$a_DamageTypes[$v_DamageType]['effect']);
		$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'critical',$a_DamageTypes[$v_DamageType]['critical']);
		$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'damage',$a_DamageTypes[$v_DamageType]['damage']);
	}

	/* Function - NEW Apply Component */
	function f_NewApplyComponents($v_TeamName,$v_MemberID,$v_PerformanceName,$a_Components){
		foreach($a_Components as $v_Key=>$v_ComponentName){
			$this->f_NewApplyComponent($v_TeamName,$v_MemberID,$v_PerformanceName,$v_ComponentName);
		}
	}
	/* Function - NEW Apply Component */
	function f_NewApplyComponent($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Component){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];

		switch($v_Component){
		
			/* Attacker */
			case 'Finesse':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Accuracy';break;
			case 'Overpowering':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Strength';break;
			case 'Battle-Oriented':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Battle Focus';break;
			case 'Arcane-Powered':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Arcane Focus';break;
			case 'Powered-By-Will':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Intellect';break;
			case 'Spoken':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Communication';break;

			/* Defender */
			case 'Must Balance':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Balance';break;
			case 'Must Block':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Block';break;
			case 'Must Dodge':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Dodge';break;
			case 'Must Evade':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Evasion';break;
			case 'Must Stand':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Footing';break;
			case 'Must Understand':$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Understanding';break;

			/* Racial Keywords */
			case 'Alive':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-energy']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-focus']=true;
			case 'Almost Alive':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-detect']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-blood']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-stamina']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-mana']=true;
				break;
			case 'Undead':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-stamina']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-mana']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			case 'Bone':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['chances']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Spirit':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-energy']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-focus']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-stamina']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-lose-mana']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=48;
				break;
			case 'Ethereal':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Ethereal']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['can-be-hit']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['can-be-hit']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['can-be-hit']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=96;
				break;
			case 'Poison Immunity':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Poison Immunity']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Poison']['can-be-hit']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=64;
				break;
			case 'Flesh':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=144;
				break;
			case 'Hide':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Dragon Scales':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Cold']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Heat']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Electrical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Sonic']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Poison']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=144;
			case 'Scales':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
			case 'Feathers':
			case 'Fur':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Black Fur':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=16;
				break;
			case 'Thick Hide':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['chances']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['chances']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=14;
				break;

			case 'Inanimate':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=360;
				break;
			case 'Awe-Inspiring':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Awe-Inspiring']=true;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','damage');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Blunt');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Piercing');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Slashing');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Cold');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Heat');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Electrical');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Sonic');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Poison');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=44;
				break;
			case 'Mobile':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-hide']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['speed']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Hover':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Hover']=true;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'defense','protection');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=248;
				break;
			case 'Flying':
				$this->A_Teams[$v_TeamName][$v_MemberID]['Flying']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=480;
			case 'Scurry':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'defense','protection');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;

			/* Miscellaneous */
			case 'Multiple Eyes':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=20;
				break;
			case 'Multiple Legs':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=16;
				break;

			case 'Phonemic':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Stalker':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;

			case 'Perceptive':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['see']['can-see']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-understand']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=20;
				break;
			case 'Unsusceptible':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['see']['can-see']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-understand']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			/* Skills */
			case 'Brutish':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Half-Brutish':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Good Eyesight':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['see']['attacker']['level']='Greater';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Horrible Aiming':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=12;
				break;
			case 'Dumb':
				$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=26;
			case 'Half-Dumb':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;
			case 'Intelligent':
				$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=14;
			case 'Half-Intelligent':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['use']['can-use']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Poor Aiming':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;
			case 'Poor Eyesight':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['see']['attacker']['level']='Lesser';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;
			case 'Good Understanding':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Great Understanding':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Good Perception':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Great Perception':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Good Detection':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Great Detection':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Good Health':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=120;
				break;
			case 'Great Health':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=240;
				break;
			case 'Greater Health':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=360;
				break;
			case 'Greatest Health':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=480;
				break;
			case 'Good Strength':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Great Strength':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Good Vision':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Great Vision':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			case 'Strong Heat Resistance':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Heat');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
			case 'Moderate Heat Resistance':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Heat');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
			case 'Weak Heat Resistance':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Heat');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;


			/* Initiative */
			case 'Quick':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=14;
				break;
			case 'Slow':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=14;
				break;

			/* Regeneration */
			case 'Natural Regeneration':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=240;
				break;
			case 'Supernatural Regeneration':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['regeneration']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=480;
				break;


			/* Size */
			case 'Tiny-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Tiny-Size']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=32;
				break;
			case 'Small-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Small-Size']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=32;
				break;
			case 'Medium-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Medium-Size']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=32;
				break;
			case 'Large-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Large-Size']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=32;
				break;
			case 'Giant-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Giant-Size']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']-=5;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=32;
				break;
			case 'Tower-Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Tower-Size']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=5;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']-=5;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=5;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']-=5;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']-=2;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'defense','protection');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Blunt');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Piercing');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Slashing');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Cold');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Heat');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Electrical');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Sonic');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Poison');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=32;
				break;

			/* Performance Images */
			case 'Fangs Image':case 'Fishing Pole Image':case 'Song Image':case 'Bardiche Image':case 'Bastard Sword Image':case 'Battle Axe Image':case 'Club Image':case 'Crossbow Image':case 'Dagger Image':case 'Falchion Image':case 'Flail Image':case 'Hammer Image':case 'Kite Shield Image':case 'Knife Image':case 'Longbow Image':case 'Longsword Image':case 'Mace Image':case 'Scimitar Image':case 'Shortbow Image':case 'Shortsword Image':case 'Slingshot Image':case 'Small Axe Image':case 'Small Shield Image':case 'Spear Image':case 'Spiked Shield Image':case 'Staff Image':case 'Tower Shield Image':case 'Trident Image':case 'Warhammer Image':case 'Wooden Shield Image':
				$a_Images=array(
					'Fangs Image'=>'vampiric_bite_icon4',
					'Fishing Pole Image'=>'fishing_pole_icon',
					'Song Image'=>'song_icon',
					'Bardiche Image'=>'bardiche_icon',
					'Bastard Sword Image'=>'bastard_sword_icon',
					'Battle Axe Image'=>'battle_axe_icon',
					'Club Image'=>'club_icon',
					'Crossbow Image'=>'crossbow_icon',
					'Dagger Image'=>'dagger_icon',
					'Falchion Image'=>'falchion_icon',
					'Flail Image'=>'flail_icon',
					'Hammer Image'=>'hammer_icon',
					'Kite Shield Image'=>'kite_shield',
					'Knife Image'=>'knife_icon',
					'Longbow Image'=>'longbow_icon',
					'Longsword Image'=>'longsword_icon',
					'Mace Image'=>'mace_icon',
					'Scimitar Image'=>'scimitar_icon',
					'Shortbow Image'=>'shortbow_icon',
					'Shortsword Image'=>'shortsword_icon',
					'Slingshot Image'=>'slingshot_icon',
					'Small Axe Image'=>'small_axe_icon',
					'Small Shield Image'=>'small_shield',
					'Spear Image'=>'spear_icon',
					'Spiked Shield Image'=>'spiked_shield_icon',
					'Staff Image'=>'staff_icon',
					'Tower Shield Image'=>'tower_shield_icon',
					'Trident Image'=>'trident_icon',
					'Warhammer Image'=>'warhammer_icon',
					'Wooden Shield Image'=>'wooden_shield_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['image']=$a_Images[$v_Component];
				if(!array_key_exists('images',$a_Member[$v_PerformanceName])){break;}
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['images'][(($a_Member[$v_PerformanceName]['images']['left-hand']!=='')?'right':'left').'-hand']=$a_Images[$v_Component];
				break;
			/* Defense Images */
			case 'Leather Breastplate Image':case 'Plate Mail Image':case 'Ringmail Image':case 'Robes Image':case 'Scale Mail Image':case 'Splint Mail Image':
				$a_Images=array(
					'Leather Breastplate Image'=>'leather_breastplate_icon',
					'Plate Mail Image'=>'plate_mail_icon',
					'Ringmail Image'=>'ringmail_icon',
					'Robes Image'=>'robes_icon',
					'Scale Mail Image'=>'scale_mail_icon',
					'Splint Mail Image'=>'splint_mail_icon'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['images']['torso']=$a_Images[$v_Component];
				break;

			/* Race Images */
			case 'Elf Image':case 'Goblin Image':case 'Goliath Image':case 'Human Image':case 'Red Dragon Image':case 'Wisp Image':
				$a_Images=array(
					'Elf Image'=>'elf_card',
					'Goblin Image'=>'goblin_card',
					'Goliath Image'=>'goliath_card',
					'Human Image'=>'human_card',
					'Red Dragon Image'=>'red_dragon_card2',
					'Wisp Image'=>'wisp_card'
				);
				$this->A_Teams[$v_TeamName][$v_MemberID]['race-image']=$a_Images[$v_Component];
				break;

			/* Challenge */
			case 'Challenge':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['can-'.$v_PerformanceName]=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['buff']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['challenge']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['deflection']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=16;
				break;

			/* Item Creation - Special */

			/* Armor or Weapons */
			case 'Magical':
				$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			/* Armor */
			case 'Durable':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Well-Built':
				/* This component reduces the weight of the item by one tier. */
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			/* Weapons */
			case 'High-Quality':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Lethal':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'damage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;


			/* Item Creation - Components */

			/* Armor or Weapons */
			case 'Large Metal Spikes':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
			case 'Small Metal Spikes':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Very Reflective':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=2;
			case 'Reflective':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=2;
				break;
			case 'Rune-Covered':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Rune-Lined':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Torchlight':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']-=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;

			/* Armor */
			/* Base / Form */
			case 'Circular Buckler':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Circular Shield':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Rectangular Shield':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=10;
				break;
			/* Materials */
			case 'Black Cloth':
			case 'Black Fur Patches':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Fur Patches':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Cold']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Cloth Of The King':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
			case 'Cloth':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Cotton Padding':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Fleece Lining':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Cold']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Half-Leather Hide':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Leather Hide':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Lizard Skin':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Cold']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Metal Links':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Metal Plates':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Spider-Silk Inserts':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Poison']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Tough Leather Hide':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Slashing');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;

			/* Base Material */
			case 'Knight Helm':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
			case 'Close Helm':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'defense','protection');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Sonic');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']-2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Hood':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Sonic');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Metal Sphere':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Very Large Metal Sphere':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'damage');
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Protective':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Very Protective':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'defense','protection');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			/* Weapons */
			/* Base / Handle */
			case 'Long Bowstaff':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'critical');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Long Carbonite Rod':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['boost']++;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'critical');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Long Wooden Rod':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'critical');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Protected Handle':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Short Bowstaff':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'critical');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Short Wooden Rod':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Wooden Handle':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			/* Type Of Blade */
			case 'Axe Blade':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Thrusting Blade':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			/* Length Of Blade */
			case 'Long Blade':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Short Blade':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Very Long Blade':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			/* Type Of Bowstring */
			case 'Fiber Bowstring':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			/* Length Of Bowstring */
			case 'Long Bowstring':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Short Bowstring':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Very Long Bowstring':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			/* Miscellaneous */
			case 'Leather Cord':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Short Metal Chain':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;

			/* Item Sharpness */
			case 'Sharpest':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
			case 'Sharper':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
			case 'Sharp':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			
			case 'Fearful':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Fearful']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=20;
				break;
			case 'Fearless':
				$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_Component;
				$this->A_Teams[$v_TeamName][$v_MemberID]['Fearless']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=20;
				break;
			case 'Blessed':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['blessed']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			
			/* Item Weight */
			case 'Very Light':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Light':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Heavy':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=14;
				break;
			case 'Very Heavy':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=28;
				break;
			case 'Extremely Heavy':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=40;
				break;

			/* Challenge - Effect */
			case 'Thunder Blast Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Knocked Down');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Knocked Down');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'critical','Deafened');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=36;
				break;
			case 'Lure Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Lured');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Lured');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Blinding Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Blind');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Blind');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Fear Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Afraid');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Afraid');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Knock-Down Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Knocked Down');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Knocked Down');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Turn Undead Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Turn Undead');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Turn Undead');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Trip Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Tripped');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Knocked Down');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Vampiric Effect':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Blood Drain');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Blood Drain');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=48;
				break;

			/* Cost / Recovery */
			case 'Fastest Recovery':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']-=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Faster Recovery':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Fast Recovery':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Slow Recovery':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=2;
				break;
			case 'Slower Recovery':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=4;
				break;
			case 'Slowest Recovery':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;

			case 'Increased Cost':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;
			case 'Very Increased Cost':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=12;
				break;

			case 'Practiced':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']=1;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=0;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use']=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;

			/* Deflection */
			case 'Deflection':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['can-attack']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['can-'.$v_PerformanceName]=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['buff']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['challenge']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['deflection']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;

			/* Deflection - Damage */
			case 'Deadly':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['buff']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['hostile']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['deal-damage']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			/* Power */
			case 'Master Power':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'damage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
			case 'Adept Power':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'critical');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
			case 'Novice Power':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
			case 'Amateur Power':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,'effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			
			/* Sneaking */
			case 'Sneaking':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['sneaking']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=12;
				break;

			/* Attacker - Level */
			case 'Amateur Level':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Amateur';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=12;
				break;
			case 'Lesser Level':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Lesser';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']-=6;
				break;
			case 'Greater Level':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Greater';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Master Level':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['level']='Master';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			/* Enchantment */
			case 'Enchantment':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['can-'.$v_PerformanceName]=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['buff']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['challenge']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['deflection']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			/* Effect / Critical / Damage */
			case 'Powerful Blunt Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=16;
			case 'Blunt Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Blunt',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=16;
				break;

			case 'Powerful Cold Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=22;
			case 'Cold Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Cold',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=22;
				break;

			case 'Powerful Heat Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
			case 'Heat Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Heat',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			case 'Powerful Electrical Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=26;
			case 'Electrical Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Electrical',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=26;
				break;

			case 'Powerful Left-Hand Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
			case 'Left-Hand Damage':
				$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['type'];
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,$v_DamageType,(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			case 'Powerful Piercing Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=20;
			case 'Piercing Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Piercing',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=20;
				break;

			case 'Powerful Poison Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=38;
			case 'Poison Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Poison',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=38;
				break;

			case 'Powerful Slashing Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
			case 'Slashing Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Slashing',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
				break;

			case 'Powerful Sonic Damage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=28;
			case 'Sonic Damage':
				$this->f_ApplyDamageType($v_TeamName,$v_MemberID,$v_PerformanceName,'Sonic',(substr_count($v_Component,'Powerful')>0));
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=28;
				break;

			/* Effect Duration / Critical Duration */
			case 'Elongated Duration':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['duration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Very Elongated Duration':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['duration']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'No-Duration':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['duration']=0;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=36;
				break;


			/* Enchantments */
			case 'Dazzle Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Dazzle');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Dazzle');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Incineration Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Incineration');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Incineration');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=384;
				break;
			case 'Healing Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Heal');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Heal');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Decay Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Decay');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Decay');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;
			case 'Focus Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Focused');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Focused');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Giant Growth Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Increased Size');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Increased Size');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=48;
				break;
			case 'Marksman Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Adrenaline Rush');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Adrenaline Rush');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Physical Resistance Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Stoneskin');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Stoneskin');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Rejuvenate Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Rejuvenate');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Rejuvenate');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Replenish Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Bandage');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Bandage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Retribution Buff':
				$this->f_ApplyMethod($v_TeamName,$v_MemberID,$v_PerformanceName,'Retribution');
				$this->f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,'effect','Retribution');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			/* Instant */
			case 'Instant':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['instant']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=48;
				break;

			/* Range */
			case 'Close Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['close']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Short Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['short']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Long Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['long']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Distant Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['distant']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;

			case 'Adjacency Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['close']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['short']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Near-By Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['short']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['long']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Far-Away Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['long']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['distant']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			case 'All-Ranges':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['close']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
			case 'Short-To-Distant Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['short']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['long']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['distant']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
				break;

			case 'Close-To-Long Range':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['close']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['short']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['range']['long']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
				break;


			/* Target */
			case 'Area':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['has-target']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['area']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=240;
				break;
			case 'Projectile':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['projectile']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['has-target']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['area']=false;
			case 'Fake-Projectile':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['attacker']['skill']='Accuracy';
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['defender']['skill']='Dodge';
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Target':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['has-target']=true;
				break;
			case 'Friendly':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['hostile']=false;
				break;
			case 'Hostile':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['hostile']=true;
				break;

			/* C o m p o n e n t s - Hand Configuration */
			case 'Dual':
				switch($this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']){
					/*  Dual Weapon (Left) - 7 */
					case 0:$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']=7;break;
					/* Dual Weapon (Right) - 10 */
					case 1:case 7:$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['right']=10;break;
					default:break;
				}
				break;
					/*              Shield - 2 */
			case 'Shield':$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['right']=2;break;
					/*         Main Weapon - 1 */
			case 'Main':$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']=1;break;
					/*      Offhand Weapon - 4 */
			case 'Offhand':$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['right']=4;break;
					/*   Two-Handed Weapon - 6 */
			case 'Two-Handed':
				$this->A_Teams[$v_TeamName][$v_MemberID]['hand-use']['left']=6;
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['cost']+=2;
				break;

			case 'Novice Performer':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Adept Performer':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','critical');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Master Performer':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','critical');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'action','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			case 'Novice Archer':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Adept Archer':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Master Archer':
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Archer Champion':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=16;
				break;

			case 'Novice Knight':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Adept Knight':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Master Knight':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
				break;
			case 'Knight Champion':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
				break;

			case 'Novice Gladiator':
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
				break;
			case 'Adept Gladiator':
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Master Gladiator':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Gladiator Champion':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			case 'Novice Battler':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Adept Battler':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','critical');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Master Battler':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','critical');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			case 'Novice Runner':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Adept Runner':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;
			case 'Master Runner':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']++;
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'defense','protection');
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
				break;

			case 'Novice Tracker':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Adept Tracker':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Master Tracker':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			case 'Novice Caster':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
				break;
			case 'Adept Caster':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','critical');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=10;
				break;
			case 'Master Caster':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','critical');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'magic','effect');
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=14;
				break;

			case 'Novice Defender':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Piercing');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
				break;
			case 'Adept Defender':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Cold');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Slashing');
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
				break;
			case 'Master Defender':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Blunt');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Heat');
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['boost']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
				break;

			/* Default */
			case '':default:
				break;
		}
	}







	/* Function - Increase All */
	function f_IncreaseAll($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Key){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Key]['boost']++;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Key]['chances']++;
	}
	/* Function - Increase All Deeper */
	function f_IncreaseAllDeeper($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Key,$v_SecondKey){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Key][$v_SecondKey]['boost']++;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Key][$v_SecondKey]['chances']++;
	}

	/* Function - Apply Conditions To Member */
	function f_ApplyConditionsToMember($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];

		$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['attacker']['skill']='Battle Focus';
		$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['defender']['skill']='Evasion';

		$this->A_Teams[$v_TeamName][$v_MemberID]['see']['attacker']['skill']='Vision';
		$this->A_Teams[$v_TeamName][$v_MemberID]['see']['defender']['skill']='Stealth';

		$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['attacker']['skill']='Communication';
		$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['defender']['skill']='Understanding';

		/* Traits */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['traits'] as $v_Key=>$v_TraitName){

			if($v_TraitName!==''){$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' is a '.$v_TraitName.'.');}

			switch($v_TraitName){
				/* Race */
				case 'Barbarian':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Brutish','Flesh','Good Health','Fearless','Mobile','Large-Size','Unsusceptible'));break;
				case 'Bat':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flying','Black Fur','Great Understanding','Mobile','Perceptive','Quick','Tiny-Size'));break;
				case 'Bear':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Fur','Great Detection','Brutish','Good Health','Hide','Large-Size','Mobile','Perceptive'));break;
				case 'Construct':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Greatest Health','Inanimate','Poison Immunity'));break;
				case 'Hell Hound':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Fearless','Fur','Strong Heat Resistance','Great Perception','Great Detection','Thick Hide','Small-Size','Mobile','Perceptive','Phonemic','Quick','Stalker'));break;
				case 'Dragon':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Red Dragon Image','Alive','Awe-Inspiring','Brutish','Flying','Intelligent','Flesh','Dragon Scales','Fearless','Mobile','Tower-Size','Great Eyesight','Great Detection','Greater Health','Perceptive','Thick Hide'));break;
				case 'Dwarf':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flesh','Brutish','Good Health','Mobile','Perceptive','Small-Size','Good Strength'));break;
				case 'Elf':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Elf Image','Alive','Flesh','Good Understanding','Good Perception','Good Detection','Intelligent','Small-Size','Mobile','Perceptive','Quick'));break;
				case 'Falcon':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flying','Feathers','Great Understanding','Good Strength','Great Vision','Great Perception','Mobile','Perceptive','Quick','Small-Size'));break;
				case 'Ghost':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Flying','Intelligent','Ethereal','Spirit','Medium-Size','Mobile','Poison Immunity','Unsusceptible'));break;
				case 'Giant':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Dumb','Brutish','Flesh','Fearless','Mobile','Giant-Size','Slow','Greatest Health','Poor Eyesight','Unsusceptible','Thick Hide'));break;
				case 'Gnome':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flesh','Intelligent','Small-Size','Mobile','Quick','Perceptive'));break;
				case 'Goblin':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Goblin Image','Alive','Dumb','Fearful','Flesh','Good Detection','Mobile','Perceptive','Quick','Scurry','Small-Size'));break;
				case 'Goliath':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Goliath Image','Alive','Brutish','Flesh','Fearless','Awe-Inspiring','Mobile','Tower-Size','Slow','Greatest Health','Poor Eyesight','Unsusceptible','Thick Hide'));break;
				case 'Half-Ogre':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Half-Dumb','Half-Brutish','Half-Intelligent','Flesh','Mobile','Large-Size','Slow','Good Health','Poor Eyesight','Perceptive','Hide'));break;
				case 'Half-Orc':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flesh','Half-Brutish','Good Health','Good Detection','Half-Intelligent','Mobile','Medium-Size','Perceptive'));break;
				case 'Halfling':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flesh','Good Detection','Half-Intelligent','Quick','Small-Size','Mobile','Perceptive'));break;
				case 'Human':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Human Image','Alive','Flesh','Intelligent','Medium-Size','Mobile','Perceptive'));break;
				case 'Lich':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fearless','Flesh','Intelligent','Poor Aiming','Medium-Size','Mobile','Poor Eyesight','Slow','Natural Regeneration','Poison Immunity','Undead','Unsusceptible'));break;
				case 'Ogre':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Half-Dumb','Brutish','Flesh','Mobile','Large-Size','Very Slow','Great Health','Poor Eyesight','Unsusceptible','Thick Hide'));break;
				case 'Orc':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Brutish','Half-Dumb','Flesh','Fearless','Good Health','Good Detection','Mobile','Large-Size','Unsusceptible'));break;
				case 'Pixie':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Intelligent','Tiny-Size','Mobile','Quick','Perceptive','Hover'));break;
				case 'Rat':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Fur','Good Eyesight','Great Detection','Mobile','Perceptive','Phonemic','Scurry','Tiny-Size'));break;
				case 'Shapeshifter':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Flesh','Brutish','Intelligent','Good Health','Great Perception','Great Vision','Medium-Size','Mobile','Quick','Perceptive'));break;
				case 'Skeleton':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Bone','Fearless','Poor Aiming','Medium-Size','Mobile','Poor Eyesight','Poison Immunity','Quick','Undead','Unsusceptible'));break;
				case 'Spider':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Fur','Mobile','Multiple Eyes','Multiple Legs','Perceptive','Scurry','Tiny-Size'));break;
				case 'Troll':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flesh','Brutish','Fearless','Large-Size','Good Health','Good Eyesight','Mobile','Natural Regeneration','Unsusceptible','Hide'));break;
				case 'Vampire':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Undead','Almost Alive','Fearless','Flesh','Hover','Mobile','Perceptive','Medium-Size','Supernatural Regeneration'));break;
				case 'Wisp':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Wisp Image','Flying','Intelligent','Ethereal','Spirit','Tiny-Size','Mobile','Poison Immunity','Quick','Unsusceptible'));break;
				case 'Wolf':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Fearless','Fur','Good Perception','Great Detection','Hide','Small-Size','Mobile','Perceptive','Phonemic','Quick','Stalker'));break;
				case 'Wyvern':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Alive','Flying','Good Health','Scales','Mobile','Perceptive','Large-Size'));break;
				case 'Zombie':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Almost Alive','Undead','Fearless','Dumb','Flesh','Horrible Aiming','Medium-Size','Mobile','Poor Eyesight','Slow','Natural Regeneration','Unsusceptible'));break;

				/* Guild */
				case 'Beast':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']-=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;
				case 'Ranger':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']--;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;

				case 'Fighter':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']-=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;
				case 'Rogue':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;

				case 'Undead':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;
				case 'Wizard':
					$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']-=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;

				case 'Cleric':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
					$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']-=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;
				case 'Holy':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;

				case '':default:
					break;
			}

		}

		/* Items */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['items'] as $v_ItemSlot=>$v_ItemName){

			if($v_ItemName!==''){$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' equips '.$v_ItemName.'.');}

			switch($v_ItemName){
				/* A r m o r */

			/* Plate Armor (Heavy - Very Heavy) */

				/* Knight Of Zeal Armor */
				case 'Knight Of Zeal Helm':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Knight Helm','Cloth Of The King','Cotton Padding','Leather Hide','Metal Plates','Protective','Very Reflective','Well-Built'));break;
				case 'Knight Of Zeal Platemail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Plate Mail Image','Cloth Of The King','Cotton Padding','Tough Leather Hide','Spider-Silk Inserts','Metal Plates','Very Protective','Reflective','Heavy','Well-Built'));break;
				case 'Knight Of Zeal Gauntlets':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth Of The King','Spider-Silk Inserts','Leather Hide','Metal Plates','Protective','Very Reflective','Well-Built'));break;
				case 'Knight Of Zeal Greaves':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth Of The King','Cotton Padding','Tough Leather Hide','Metal Links','Metal Plates','Very Protective','Reflective','Heavy','Well-Built'));break;
				case 'Knight Of Zeal Boots':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth Of The King','Spider-Silk Inserts','Leather Hide','Metal Plates','Protective','Very Reflective','Well-Built'));break;

				/* Steel Spiked Armor */
				case 'Steel Spiked Helm':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Helm','Cloth','Cotton Padding','Half-Leather Hide','Metal Plates','Large Metal Spikes','Protective','Reflective','Very Heavy'));break;
				case 'Steel Spiked Gauntlets':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Small Metal Spikes','Reflective','Very Heavy'));break;
				case 'Steel Spiked Boots':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Small Metal Spikes','Reflective','Very Heavy'));break;

				/* Iron Spiked Armor */
				case 'Iron Spiked Helm':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Helm','Cotton Padding','Half-Leather Hide','Metal Plates','Small Metal Spikes','Protective','Reflective','Very Heavy'));break;
				case 'Iron Spiked Gauntlets':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Small Metal Spikes','Reflective','Very Heavy'));break;
				case 'Iron Spiked Boots':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Small Metal Spikes','Reflective','Very Heavy'));break;

				/* Fine Steel Armor */
				case 'Fine Steel Helm':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Helm','Cloth','Cotton Padding','Half-Leather Hide','Metal Plates','Protective','Reflective','Well-Built'));break;
				case 'Fine Steel Platemail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Plate Mail Image','Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Heavy','Well-Built'));break;
				case 'Fine Steel Gauntlets':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Well-Built'));break;
				case 'Fine Steel Greaves':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Heavy','Well-Built'));break;
				case 'Fine Steel Boots':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Well-Built'));break;

				/* Steel Armor */
				case 'Steel Helm':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Helm','Cloth','Cotton Padding','Half-Leather Hide','Metal Plates','Protective','Reflective','Heavy'));break;
				case 'Steel Platemail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Plate Mail Image','Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Very Heavy'));break;
				case 'Steel Gauntlets':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Heavy'));break;
				case 'Steel Greaves':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Very Heavy'));break;
				case 'Steel Boots':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Heavy'));break;

				/* Iron Armor */
				case 'Iron Helm':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Helm','Cotton Padding','Half-Leather Hide','Metal Plates','Protective','Reflective','Heavy'));break;
				case 'Iron Platemail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Plate Mail Image','Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Very Heavy'));break;
				case 'Iron Gauntlets':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Heavy'));break;
				case 'Iron Greaves':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Leather Hide','Metal Links','Metal Plates','Protective','Reflective','Very Heavy'));break;
				case 'Iron Boots':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Metal Plates','Protective','Reflective','Heavy'));break;

			/* Chain Armor (Medium - Heavy) */

				/* Fine Steel Armor */
				case 'Fine Steel Mantle':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Half-Leather Hide','Metal Links','Hood','Well-Built','Light'));break;
				case 'Fine Steel Chainmail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Ringmail Image','Cloth','Cotton Padding','Leather Hide','Metal Links','Protective','Well-Built'));break;
				case 'Fine Steel Glovelettes':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Links','Well-Built','Light'));break;
				case 'Fine Steel Leggings':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Leather Hide','Metal Links','Protective','Well-Built'));break;
				case 'Fine Steel Waders':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Links','Well-Built','Light'));break;

				/* Steel Armor */
				case 'Steel Mantle':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Half-Leather Hide','Metal Links','Hood'));break;
				case 'Steel Chainmail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Ringmail Image','Cloth','Cotton Padding','Leather Hide','Metal Links','Protective','Heavy'));break;
				case 'Steel Glovelettes':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Links'));break;
				case 'Steel Leggings':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Leather Hide','Metal Links','Protective','Heavy'));break;
				case 'Steel Waders':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Half-Leather Hide','Metal Links'));break;

				/* Iron Armor */
				case 'Iron Chainmail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Ringmail Image','Cotton Padding','Leather Hide','Metal Links','Protective','Heavy'));break;
				case 'Iron Mantle':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Half-Leather Hide','Metal Links','Hood'));break;
				case 'Iron Glovelettes':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Metal Links'));break;
				case 'Iron Leggings':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Leather Hide','Metal Links','Protective','Heavy'));break;
				case 'Iron Waders':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Metal Links'));break;

			/* Ring Armor (Medium) */

				/* Steel Armor */
				case 'Steel Ringmail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Ringmail Image','Cloth','Cotton Padding','Metal Links','Protective'));break;

				/* Iron Armor */
				case 'Iron Ringmail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Ringmail Image','Cotton Padding','Metal Links','Protective'));break;

			/* Leather Armor (Light - Medium) */

				/* Leather Armor */
				case 'Leather Cloak':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Half-Leather Hide','Hood','Light'));break;
				case 'Leather Tunic':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Leather Breastplate Image','Cloth','Cotton Padding','Leather Hide','Protective'));break;
				case 'Leather Gloves':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Light'));break;
				case 'Leather Pants':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Leather Hide','Protective'));break;
				case 'Leather Shoes':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Half-Leather Hide','Light'));break;

				/* Cotton Armor */
				case 'Cotton Cloak':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Half-Leather Hide','Hood','Light'));break;
				case 'Cotton Tunic':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Leather Breastplate Image','Cotton Padding','Leather Hide','Protective'));break;
				case 'Cotton Gloves':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fleece Lining','Half-Leather Hide','Light'));break;
				case 'Cotton Pants':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Leather Hide','Protective'));break;
				case 'Cotton Shoes':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Half-Leather Hide','Light'));break;

				/* Fishing Suit */
				case 'Fishing Shirt':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Leather Breastplate Image','Cotton Padding','Leather Hide','Light'));break;
				case 'Fishing Pants':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Half-Leather Hide','Light'));break;

			/* Cloth Armor (Very Light - Light) */

				/* Rune-Lined Armor */
				case 'Rune-Lined Hat':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Magical','Rune-Lined','Light'));break;
				case 'Rune-Lined Robe':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Robes Image','Cloth','Cotton Padding','Hood','Magical','Protective','Rune-Lined','Light'));break;
				case 'Rune-Lined Pantaloons':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Magical','Protective','Rune-Lined','Light'));break;

				/* Rune-Covered Armor */
				case 'Rune-Covered Handwraps':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Magical','Rune-Covered','Light'));break;
				case 'Rune-Covered Sandals':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Magical','Rune-Covered','Light'));break;

				/* Lizard-Skin */
				case 'Lizard-Skin Handwraps':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Lizard Skin','Light'));break;

				/* Heavy Cloth Armor */
				case 'Heavy Cloth Hat':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Light'));break;
				case 'Heavy Cloth Shirt':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Robes Image','Cloth','Cotton Padding','Protective','Light'));break;
				case 'Heavy Cloth Handwraps':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Fleece Lining','Light'));break;
				case 'Heavy Cloth Pantaloons':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Protective','Light'));break;
				case 'Heavy Cloth Sandals':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Cotton Padding','Light'));break;

				/* Black Cloth Armor */
				case 'Black Cloth Hat':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Black Cloth','Very Light'));break;
				case 'Black Cloth Shirt':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Robes Image','Black Cloth','Protective','Very Light'));break;
				case 'Black Cloth Handwraps':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Black Cloth','Very Light'));break;
				case 'Black Cloth Pantaloons':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Black Cloth','Protective','Very Light'));break;
				case 'Black Cloth Sandals':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Black Cloth','Very Light'));break;

				/* Cloth Armor */
				case 'Cloth Hat':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Very Light'));break;
				case 'Cloth Shirt':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Robes Image','Cloth','Protective','Very Light'));break;
				case 'Cloth Handwraps':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Very Light'));break;
				case 'Cloth Pantaloons':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Protective','Very Light'));break;
				case 'Cloth Sandals':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cloth','Very Light'));break;

				case 'Crude Shirt':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Cotton Padding','Fur Patches','Very Light'));break;
				case 'Crude Loincloth':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fur Patches','Very Light'));break;

				/* S h i e l d s */
				case 'Fine Steel Tower Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Tower Shield Image','Metal Plates','Very Protective','Rectangular Shield','Shield','Heavy','Well-Built','Reflective'));break;
				case 'Steel Tower Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Tower Shield Image','Metal Plates','Very Protective','Rectangular Shield','Shield','Very Heavy','Reflective'));break;
				case 'Iron Tower Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Tower Shield Image','Metal Plates','Protective','Rectangular Shield','Shield','Very Heavy','Reflective'));break;

				case 'Knight Of Zeal Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Kite Shield Image','Circular Shield','Cloth Of The King','Metal Plates','Very Protective','Shield','Well-Built','Very Reflective'));break;
				case 'Fine Steel Kite Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Kite Shield Image','Circular Shield','Metal Plates','Very Protective','Shield','Well-Built','Reflective'));break;
				case 'Steel Kite Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Kite Shield Image','Circular Shield','Heavy','Metal Plates','Very Protective','Shield','Reflective'));break;
				case 'Iron Kite Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Kite Shield Image','Circular Shield','Heavy','Metal Plates','Protective','Shield','Reflective'));break;

				case 'Steel Spiked Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Spiked Shield Image','Heavy','Circular Shield','Metal Plates','Large Metal Spikes','Protective','Shield','Reflective'));break;
				case 'Iron Spiked Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Spiked Shield Image','Heavy','Circular Shield','Metal Plates','Large Metal Spikes','Shield','Reflective'));break;

				case 'Fine Steel Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Shield Image','Light','Circular Shield','Metal Plates','Protective','Shield','Well-Built','Reflective'));break;
				case 'Steel Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Shield Image','Circular Shield','Metal Plates','Protective','Shield','Reflective'));break;
				case 'Iron Shield':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Shield Image','Circular Shield','Metal Plates','Shield','Reflective'));break;

				case 'Oak Buckler':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Wooden Shield Image','Circular Buckler','Light','Protective','Shield'));break;
				case 'Cedar Buckler':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Wooden Shield Image','Circular Buckler','Light','Shield'));break;


				/* W a n d s */
				case 'Wand Of Fire Bolt':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Heat Damage','Short-To-Distant Range','Deadly','Main','Protective','Very Light','Wooden Handle','Slow Recovery','Arcane-Powered','Lesser Level','Novice Power'));break;
				case 'Wand Of Magic Missile':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Piercing Damage','Near-By Range','Hostile','Main','Protective','Very Light','Wooden Handle','Slow Recovery','Arcane-Powered','Lesser Level','Master Power','Must Block'));break;


				/* W e a p o n s */


				/* Electrical */
				case 'Electrical Jolt':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Adjacency Range','Main','Adept Power','Deadly','Deflection','Electrical Damage','Projectile'));
					break;
				case 'Cold Ghostly Strands':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Close Range','Main','Master Power','Deadly','Deflection','Cold Damage'));
					break;

				/* Piercing Weapons */
				case 'Temple Crossbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Crossbow Image','Deflection','Deadly','Fiber Bowstring','Short Bowstring','Light','Adjacency Range','Short Bowstaff','Blessed','Piercing Damage','Sharp','Two-Handed','Projectile'));break;
				case 'Temple Longsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longsword Image','Deflection','Close Range','Deadly','Heavy','Main','Sharp','Slashing Damage','Very Long Blade','Wooden Handle','Reflective','Blessed'));break;

				case 'Oak Light Crossbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Crossbow Image','Deflection','Deadly','Fiber Bowstring','Short Bowstring','Adjacency Range','Short Bowstaff','Piercing Damage','Projectile','Sharp','Two-Handed'));break;
				case 'Cedar Light Crossbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Crossbow Image','Deflection','Deadly','Fiber Bowstring','Short Bowstring','Adjacency Range','Short Bowstaff','Piercing Damage','Projectile','Two-Handed','Very Light'));break;

				case 'Steel Lance':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Spear Image','Deflection','Adjacency Range','Deadly','Piercing Damage','Thrusting Blade','Sharp','Two-Handed','Very Heavy','Very Long Blade','Wooden Handle','Reflective'));break;
				case 'Iron Lance':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Spear Image','Deflection','Adjacency Range','Deadly','Piercing Damage','Thrusting Blade','Two-Handed','Very Heavy','Very Long Blade','Wooden Handle','Reflective'));break;

				case 'Oak Spear':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Spear Image','Deflection','Adjacency Range','Deadly','Heavy','Long Wooden Rod','Piercing Damage','Sharp','Thrusting Blade','Two-Handed','Very Short Blade'));break;
				case 'Cedar Spear':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Spear Image','Deflection','Adjacency Range','Deadly','Heavy','Long Wooden Rod','Piercing Damage','Thrusting Blade','Two-Handed','Very Short Blade'));break;

				case 'Steel Rapier':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Range','Deflection','Deadly','Light','Long Blade','Main','Piercing Damage','Thrusting Blade','Sharp','Wooden Handle','Reflective'));break;
				case 'Iron Rapier':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Close Range','Deflection','Deadly','Light','Long Blade','Main','Piercing Damage','Thrusting Blade','Wooden Handle','Reflective'));break;


				case 'Poison-Tipped Dagger':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Dagger Image','Deflection','Close Range','Deadly','Dual','Poison Damage','Short Blade','Thrusting Blade','Very Light'));break;
				case 'Black Steel Dagger':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Dagger Image','Deflection','Close Range','Deadly','Dual','Sharp','Short Blade','Thrusting Blade','Very Light','Wooden Handle'));break;
				case 'Steel Dagger':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Dagger Image','Deflection','Close Range','Deadly','Dual','Sharp','Short Blade','Thrusting Blade','Very Light','Wooden Handle','Reflective'));break;
				case 'Iron Dagger':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Dagger Image','Deflection','Close Range','Deadly','Dual','Short Blade','Thrusting Blade','Very Light','Wooden Handle','Reflective'));break;


				case 'Black Steel Knife':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Knife Image','Deflection','Close Range','Deadly','Dual','Piercing Damage','Sharp','Short Blade','Thrusting Blade','Very Light','Wooden Handle'));break;
				case 'Steel Knife':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Knife Image','Deflection','Close Range','Deadly','Dual','Piercing Damage','Sharp','Short Blade','Thrusting Blade','Very Light','Wooden Handle','Reflective'));break;
				case 'Iron Knife':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Knife Image','Deflection','Close Range','Deadly','Dual','Piercing Damage','Short Blade','Thrusting Blade','Very Light','Wooden Handle','Reflective'));break;

				case 'Deadly Fangs':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Deflection','Close Range','Deadly','Piercing Damage','Lethal','Sharpest','Short Blade','Thrusting Blade','Two-Handed','Very Light'));break;
				case 'Razor Fangs':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Deflection','Close Range','Deadly','Piercing Damage','Sharpest','Short Blade','Thrusting Blade','Two-Handed','Very Light'));break;
				case 'Very Sharp Fangs':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Deflection','Close Range','Deadly','Piercing Damage','Sharper','Short Blade','Thrusting Blade','Two-Handed','Very Light'));break;
				case 'Poisonous Fangs':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Deflection','Close Range','Deadly','Poison Damage','Sharp','Short Blade','Thrusting Blade','Two-Handed','Very Light'));break;
				case 'Sharp Fangs':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Deflection','Close Range','Deadly','Piercing Damage','Sharp','Short Blade','Thrusting Blade','Two-Handed','Very Light'));break;
				case 'Fangs':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Deflection','Close Range','Deadly','Piercing Damage','Short Blade','Thrusting Blade','Two-Handed','Very Light'));break;

				case 'Oak Shortbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longbow Image','Deflection','Deadly','Fiber Bowstring','Long Bowstring','Near-By Range','Short Bowstaff','Piercing Damage','Sharp','Two-Handed','Projectile'));break;
				case 'Cedar Shortbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longbow Image','Deflection','Deadly','Fiber Bowstring','Long Bowstring','Near-By Range','Light','Short Bowstaff','Piercing Damage','Two-Handed','Projectile'));break;

				case 'Oak Longbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longbow Image','Deflection','Deadly','Fiber Bowstring','Very Long Bowstring','Far-Away Range','Long Bowstaff','Piercing Damage','Sharp','Two-Handed','Projectile'));break;
				case 'Cedar Longbow':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longbow Image','Deflection','Deadly','Fiber Bowstring','Very Long Bowstring','Far-Away Range','Light','Long Bowstaff','Piercing Damage','Two-Handed','Projectile'));break;

				/* Slashing Weapons */
				case 'Fine Steel Battle Axe':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Battle Axe Image','Deflection','Close Range','Deadly','Heavy','Long Blade','High-Quality','Sharp','Slashing Damage','Two-Handed','Wooden Handle','Axe Blade','Reflective'));break;
				case 'Steel Battle Axe':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Battle Axe Image','Deflection','Close Range','Deadly','Heavy','Long Blade','Sharp','Slashing Damage','Two-Handed','Wooden Handle','Axe Blade','Reflective'));break;
				case 'Iron Battle Axe':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Battle Axe Image','Deflection','Close Range','Deadly','Heavy','Long Blade','Slashing Damage','Two-Handed','Wooden Handle','Axe Blade','Reflective'));break;

				case 'Leather Whip':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Adjacency Range','Deflection','Deadly','Leather Cord','Light','Main','Sharp','Slashing Damage'));break;
				case 'Cotton Whip':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Adjacency Range','Deflection','Deadly','Leather Cord','Main','Slashing Damage','Very Light'));break;

				case 'Fine Steel Longsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longsword Image','Deflection','Close Range','Deadly','Main','Sharp','Slashing Damage','Very Long Blade','Wooden Handle','Reflective','Well-Built'));break;
				case 'Steel Longsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longsword Image','Deflection','Close Range','Deadly','Heavy','Main','Sharp','Slashing Damage','Very Long Blade','Wooden Handle','Reflective'));break;
				case 'Iron Longsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Longsword Image','Deflection','Close Range','Deadly','Heavy','Main','Wooden Handle','Slashing Damage','Very Long Blade','Wooden Handle','Reflective'));break;

				case 'Fine Steel Shortsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Shortsword Image','Deflection','Close Range','Deadly','Dual','Very Light','Sharp','Short Blade','Wooden Handle','Reflective','Well-Built'));break;
				case 'Steel Shortsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Shortsword Image','Deflection','Close Range','Deadly','Dual','Light','Sharp','Short Blade','Wooden Handle','Reflective'));break;
				case 'Iron Shortsword':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Shortsword Image','Deflection','Close Range','Deadly','Dual','Light','Short Blade','Wooden Handle','Reflective'));break;

				case 'Deadly Claws':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Close Range','Deflection','Deadly','Dual','Light','Lethal','Sharpest','Short Blade','Slashing Damage'));break;
				case 'Razor Claws':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Close Range','Deflection','Deadly','Dual','Light','Sharpest','Short Blade','Slashing Damage'));break;
				case 'Very Sharp Claws':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Close Range','Deflection','Deadly','Dual','Light','Sharper','Short Blade','Slashing Damage'));break;
				case 'Sharp Claws':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Close Range','Deflection','Deadly','Dual','Light','Sharp','Short Blade','Slashing Damage'));break;
				case 'Claws':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fangs Image','Close Range','Deflection','Deadly','Dual','Light','Short Blade','Slashing Damage'));break;

				case 'Steel Cutlass':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Scimitar Image','Deflection','Close Range','Deadly','Dual','Long Blade','Protected Handle','Sharp','Slashing Damage','Reflective'));break;
				case 'Iron Cutlass':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Scimitar Image','Deflection','Close Range','Deadly','Dual','Long Blade','Protected Handle','Slashing Damage','Reflective'));break;

				case 'Steel Shuriken':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Axe Image','Deflection','Adjacency Range','Deadly','Very Light','Main','Short Blade','Sharpest','Slashing Damage','Projectile'));break;
				case 'Iron Shuriken':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Axe Image','Deflection','Adjacency Range','Deadly','Very Light','Main','Short Blade','Sharper','Slashing Damage','Projectile'));break;

				case 'Steel Hand-Axe':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Axe Image','Deflection','Adjacency Range','Deadly','Heavy','Main','Long Blade','Sharp','Slashing Damage','Projectile','Wooden Handle','Axe Blade','Reflective'));break;
				case 'Iron Hand-Axe':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Small Axe Image','Deflection','Adjacency Range','Deadly','Main','Long Blade','Slashing Damage','Projectile','Wooden Handle','Axe Blade','Reflective'));break;

				/* Blunt Weapons */
				case 'Stalagmite':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Close Range','Deflection','Deadly','Lethal','Long Carbonite Rod','Powerful Blunt Damage','Protective','Slower Recovery','Sharpest','Two-Handed','Extremely Heavy','Fake-Projectile','Slow Recovery','Overpowering','Lesser Level','Must Dodge'));break;
				case 'Boulder':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Adjacency Range','Deflection','Deadly','Lethal','Very Large Metal Sphere','Powerful Blunt Damage','Two-Handed','Extremely Heavy','Projectile','Overpowering','Lesser Level','Must Dodge'));break;

				case 'Leather Sling':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Slingshot Image','Deflection','Adjacency Range','Blunt Damage','Deadly','Light','Main','Sharp','Projectile'));break;
				case 'Cotton Sling':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Slingshot Image','Deflection','Adjacency Range','Blunt Damage','Deadly','Main','Very Light','Projectile'));break;

				case 'Oak Nunchuck':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Blunt Damage','Deflection','Close Range','Deadly','Short Metal Chain','Main','Sharp','Wooden Handle','Wooden Handle'));break;
				case 'Cedar Nunchuck':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Blunt Damage','Deflection','Close Range','Deadly','Short Metal Chain','Main','Wooden Handle','Wooden Handle'));break;

				case 'Steel Flail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Flail Image','Deflection','Adjacency Range','Blunt Damage','Deadly','Short Metal Chain','Heavy','Main','Metal Sphere','Small Metal Spikes','Sharp','Wooden Handle'));break;
				case 'Iron Flail':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Flail Image','Deflection','Adjacency Range','Blunt Damage','Deadly','Short Metal Chain','Main','Metal Sphere','Small Metal Spikes','Wooden Handle'));break;

				case 'Staff Of Voices':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Staff Image','Deflection','Sonic Damage','Close Range','Deadly','Long Wooden Rod','Protective','Two-Handed','Powered-By-Will','Must Understand'));break;
				case 'Oak Staff':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Staff Image','Deflection','Blunt Damage','Close Range','Deadly','Long Wooden Rod','Protective','Two-Handed'));break;
				case 'Cedar Staff':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Staff Image','Deflection','Blunt Damage','Close Range','Deadly','Long Wooden Rod','Two-Handed'));break;

				case 'Steel Mace':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Mace Image','Deflection','Blunt Damage','Close Range','Light','Deadly','Dual','Short Wooden Rod','Metal Sphere','Protective'));break;
				case 'Iron Mace':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Mace Image','Deflection','Blunt Damage','Close Range','Light','Deadly','Dual','Short Wooden Rod','Metal Sphere'));break;

				case 'Oak Half-Staff':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Blunt Damage','Close Range','Deadly','Dual','Short Wooden Rod','Protective','Very Light','Wooden Handle'));break;
				case 'Cedar Half-Staff':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Blunt Damage','Close Range','Deadly','Dual','Short Wooden Rod','Very Light','Wooden Handle'));break;

				case 'Oak Torch':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Heat Damage','Close Range','Hostile','Dual','Short Wooden Rod','Protective','Very Light','Wooden Handle','Torchlight'));break;
				case 'Cedar Torch':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Heat Damage','Close Range','Hostile','Dual','Short Wooden Rod','Very Light','Wooden Handle','Torchlight'));break;

				/* Fishing Pole */
				case 'Fishing Pole':$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Fishing Pole Image','Deflection','Blunt Damage','Close Range','Deadly','Light','Short Wooden Rod','Two-Handed'));break;

				case '':
					if($v_ItemSlot=='left-hand'||$v_ItemSlot=='right-hand'){
						$this->A_Teams[$v_TeamName][$v_MemberID]['items'][$v_ItemSlot]='Bare Hand';
						/* Bare Hand */
						if($v_ItemSlot=='left-hand'){
							$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Deflection','Blunt Damage','Close Range','Dual','Deadly','Amateur Power','Very Light'));
						}else{
							$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Club Image','Amateur Power','Very Light'));
						}
						break;
					}else if($this->A_Teams[$v_TeamName][$v_MemberID]['traits']['race']!=='Construct'){
						switch($v_ItemSlot){
							case 'feet':case 'hands':case 'head':case 'legs':case 'torso':
								$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Very Light'));
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


		if($this->A_Teams[$v_TeamName][$v_MemberID]['traits']['race']!=='Construct'){
			$v_HandsUsedValue=0;
			foreach($this->A_Teams[$v_TeamName][$v_MemberID]['hand-use'] as $v_Hand=>$v_Value){$v_HandsUsedValue+=$v_Value;}
			switch($v_HandsUsedValue){
				/*               Empty - 0 */
				/*         Main Weapon - 1 */
				/*              Shield - 2 */
				/*      Offhand Weapon - 4 */
				/*   Two-Handed Weapon - 6 */
				/*  Dual Weapon (Left) - 7 */
				/* Dual Weapon (Right) - 10 */

				case 0:/*          Empty / Empty            */
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['right-hand']='Empty';
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['left-hand']='Empty';
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Blunt Damage','Close Range','Deadly','Main'));
					break;
				case 1:/*    Main Weapon / Empty            */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Main / Empty';
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['right-hand']='Empty';
					break;
				case 2:/*          Empty / Shield           */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Empty / Shield';
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['left-hand']='Empty';
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Blunt Damage','Close Range','Deadly','Main'));
					break;
				case 3:/*    Main Weapon / Shield           */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Main / Shield';
					break;
				case 4:/*          Empty / Offhand Weapon   */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Empty / Offhand';
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['left-hand']='Empty';
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Blunt Damage','Close Range','Deadly','Main'));
					break;
				case 5:/*    Main Weapon / Offhand Weapon   */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Main / Offhand';
					break;
				case 6:/*         Two-Handed Weapon         */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Two-Handed';
					break;
				case 7:/*    Dual Weapon / Empty            */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Dual / Empty';
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['right-hand']='Empty';
					break;
				case 8:/*    Main Weapon / Dual Weapon      */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Main / Dual';
					break;
				case 9:/*    Dual Weapon / Shield           */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Dual / Shield';
					break;
				case 10:/*         Empty / Dual Weapon      */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Empty / Dual';
					$this->A_Teams[$v_TeamName][$v_MemberID]['items']['left-hand']='Empty';
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array('Blunt Damage','Close Range','Deadly','Main'));
					break;
				case 11:/*   Dual Weapon / Offhand Weapon   */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Dual / Offhand';
					break;
				case 17:/*   Dual Weapon / Dual Weapon      */
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['style']='Dual / Dual';
					break;

				default:
					break;
			}

		}

		/* Abilities */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['abilities'] as $v_ConditionType=>$v_ConditionName){
			switch($v_ConditionName){

				/* B u f f s - Free-Form */

				/* Area Of Effect */
				case 'Aura Of Decay':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Enchantment','Area','Close Range','Hostile','Practiced','Decay Buff','Slower Recovery','Increased Cost'));
					break;
				case 'Dazzling Aura':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Area','Close Range','Hostile','Practiced','Dazzle Buff'));
					break;
				case 'Healing Circle':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Enchantment','Area','Close Range','Friendly','Practiced','Healing Buff'));
					break;
				case 'Howl':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Area','Close Range','Friendly','Practiced','Marksman Buff'));
					break;
				case 'Song Of The Ages':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Song Image','Area','Close Range','Friendly','Practiced','Rejuvenate Buff'));
					break;
				case 'Word Of Retribution':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Enchantment','Area','Close Range','Hostile','Practiced','Retribution Buff'));
					break;

				/* Target (Self) */
				case 'Rejuvenate':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Close Range','Friendly','Instant','Practiced','Marksman Buff','Elongated Duration','Slow Recovery'));
					break;
				case 'Giant Growth':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Enchantment','Close Range','Friendly','Practiced','Giant Growth Buff','Very Increased Cost','Slower Recovery'));
					break;
				case 'Defensive Boasting':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Close Range','Friendly','Instant','Practiced','Physical Resistance Buff','Elongated Duration','Slow Recovery'));
					break;
				case 'War Cry':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Close Range','Friendly','Instant','Practiced','Marksman Buff','Elongated Duration','Slow Recovery'));
					break;
				case 'Heightened Focus':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Enchantment','Close Range','Friendly','Instant','Practiced','Focus Buff','Elongated Duration','Slow Recovery'));
					break;

				/* Target (Others) */
				case 'Bandage Wound':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Enchantment','Close Range','Friendly','Replenish Buff','Target','Practiced','Novice Power'));
					break;

				/* B u f f s - Challenge */

				/* Area Of Effect */
				case 'Fierce Growl':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Area','Close Range','Hostile','Practiced','Fear Effect'));
					break;
				case 'Ghostly Wail':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Area','Close Range','Hostile','Practiced','Fear Effect','Powered-By-Will'));
					break;
				case 'Ground Pound':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Close Range','Hostile','Area','Practiced','Knock-Down Effect','Slow Recovery'));
					break;
				case 'Incinerate':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Area','Close Range','Hostile','Heat Damage','Practiced','No-Duration','Incineration Buff','Master Level'));
					break;
				case 'Moan And Groan':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Area','Close Range','Hostile','Instant','Practiced','Fast Action Recovery','Fear Effect','Lesser Level'));
					break;
				case 'Throw Dirt':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Close Range','Hostile','Area','Practiced','Blinding Effect','Slow Recovery'));
					break;
				case 'Thunderous Blast':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Challenge','Close Range','Hostile','Area','Practiced','Knock-Down Effect','Lesser Level','Powered-By-Will','Must-Stand'));
					break;

				/* Target */
				case 'Taunt':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Short Range','Hostile','Instant','Lure Effect','Target','Practiced'));
					break;
				case 'Lure':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Near-By Range','Hostile','Lure Effect','Target','Practiced','Slowest Recovery'));
					break;
				case 'Release Soul':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Close Range','Hostile','Turn Undead Effect','Target','Practiced','Amateur Level','Slower Recovery'));
					break;
				case 'Trip':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Close Range','Hostile','Trip Effect','Target','Practiced','Slow Recovery'));
					break;
				case 'Sonic Snap':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Adjacency Range','Practiced','Hostile','Sonic Damage','Target','Novice Power','Fast Recovery'));
					break;
				case 'Vampiric Bite':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Challenge','Fangs Image','Vampiric Effect','Close Range','Hostile','Instant','Practiced','Target'));
					break;

				/* E f f e c t s - Deflection */

				/* Area Of Effect */

				/* Target */
				case 'Back-Stab':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Sneaking','Powerful Left-Hand Damage','Practiced','Target','Slow Recovery','Master Power'));
					break;
				case 'Bite':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Fangs Image','Deflection','Piercing Damage','Close Range','Deadly','Instant','Practiced','Target','Amateur Level','Amateur Power'));
					break;
				case 'Cleave':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Powerful Left-Hand Damage','Practiced','Area','Amateur Power','Increased Cost','Slowest Recovery','Overpowering'));
					break;
				case 'Fire Bolt':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Deflection','Short-To-Distant Range','Deadly','Target','Practiced','Heat Damage','Novice Power','Projectile','Arcane-Powered'));
					break;
				case 'Flamebreath':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Target','Practiced','Heat Damage','Master Power'));
					break;
				case 'Fling Rocks':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Adjacency Range','Hostile','Instant','Target','Practiced','Blunt Damage','Amateur Power','Projectile','Fast Recovery'));
					break;
				case 'Javelin Toss':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Far-Away Range','Deadly','Target','Practiced','Piercing Damage','Adept Power','Projectile','Battle-Oriented','Must Evade'));
					break;
				case 'Throw Poison Flask':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Hostile','Area','Practiced','Poison Damage','Lesser Level','Amateur Power','Finesse','Must Dodge'));
					break;
				case 'Spit Poison':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Short Range','Hostile','Instant','Target','Practiced','Poison Damage','Amateur Level','Amateur Power','Projectile'));
					break;
				case 'Magical Javelin Toss':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Far-Away Range','Deadly','Target','Practiced','Piercing Damage','Novice Power','Projectile','Arcane-Powered','Must Evade'));
					break;
				case 'Magic Missile':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'magic',array('Deflection','Near-By Range','Hostile','Target','Practiced','Piercing Damage','Master Power','Projectile','Arcane-Powered','Must Block'));
					break;
				case 'Pounce':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Instant','Sneaking','Powerful Left-Hand Damage','Practiced','Target','Slower Recovery','Master Power'));
					break;
				case 'Precise Shot':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Near-By Range','Deadly','Instant','Left-Hand Damage','Practiced','Target','Projectile','Greater Level','Novice Power'));
					break;
				case 'Precise Strike':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Instant','Left-Hand Damage','Practiced','Target','Greater Level','Novice Power'));
					break;
				case 'Quick Strike':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Hostile','Instant','Powerful Left-Hand Damage','Practiced','Lesser Level','Target','Novice Power'));
					break;
				case 'Slicing Strike':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Piercing Damage','Close Range','Hostile','Practiced','Target','Amateur Level','Novice Power'));
					break;
				case 'Strong Shot':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Near-By Range','Deadly','Powerful Left-Hand Damage','Practiced','Target','Projectile','Lesser Level','Novice Power','Overpowering'));
					break;
				case 'Strong Strike':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Powerful Left-Hand Damage','Practiced','Target','Increased Cost','Lesser Level','Novice Power','Overpowering'));
					break;
				case 'Talon Swipe':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Deadly','Piercing Damage','Instant','Practiced','Target','Fast Recovery','Greater Level','Novice Power','Must Block'));
					break;
				case 'Unexpected Strike':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'action',array('Deflection','Close Range','Hostile','Instant','Left-Hand Damage','Practiced','Lesser Level','Target','Novice Power','Must Block'));
					break;


				case '':default:
					break;
			}
		}

		/* Training */
		foreach($this->A_Teams[$v_TeamName][$v_MemberID]['training'] as $v_Key=>$v_TrainingName){

			if($v_TrainingName!==''){$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' is a '.$v_TrainingName.'.');}

			switch($v_TrainingName){
				case 'Master Archer':case 'Master Battler':case 'Master Caster':case 'Master Defender':case 'Master Gladiator':case 'Master Knight':case 'Master Performer':case 'Master Runner':case 'Master Tracker':
				case 'Adept Archer':case 'Adept Battler':case 'Adept Caster':case 'Adept Defender':case 'Adept Gladiator':case 'Adept Knight':case 'Adept Performer':case 'Adept Runner':case 'Adept Tracker':
				case 'Novice Archer':case 'Novice Battler':case 'Novice Caster':case 'Novice Defender':case 'Novice Gladiator':case 'Novice Knight':case 'Novice Performer':case 'Novice Runner':case 'Novice Tracker':
				case 'Archer Champion':case 'Knight Champion':case 'Gladiator Champion':
				case 'Strong Heat Resistance':case 'Moderate Heat Resistance':case 'Weak Heat Resistance':
					$this->f_NewApplyComponents($v_TeamName,$v_MemberID,'attack',array($v_TrainingName));
					break;

				case 'Battle Readiness':
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['cost']-=2;
					if($this->A_Teams[$v_TeamName][$v_MemberID]['attack']['cost']<1){$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['cost']=1;}
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
					break;
				case 'Ferocity Of The Hound':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=3;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['attacker']['skill']='Strength';
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;
				case 'Packmaster':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=24;
					break;
				case 'Fearless':
					$this->A_Teams[$v_TeamName][$v_MemberID]['keywords'][]=$v_TrainingName;
					$this->A_Teams[$v_TeamName][$v_MemberID]['Fearless']=true;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=48;
					break;

				case 'Goblin Initiative':
					$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=12;
					break;
				case 'Pixie Agility':
					$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
					break;

				case 'Giant Muscles':
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['damage']['chances']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['chances']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
					break;
				case 'Barbaric Muscles':
					$this->A_Teams[$v_TeamName][$v_MemberID]['action']['damage']['boost']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['boost']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
					break;

				/* Bad-Ass */
				case 'Dragon Claws':
					$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
					$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
					$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=18;
					break;
				case 'Dragon Power':
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['regeneration']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['regeneration']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['regeneration']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=720;
					break;
				case 'Goliath View':
					$this->A_Teams[$v_TeamName][$v_MemberID]['range-of-view']+=3;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=36;
					break;
				case 'Ancient Zeal Order':
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=168;
					break;
				case 'Shapeshifter Adaptability':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=22;
					break;

				case 'Ogre Tactics':
					$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','effect');
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Communication']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=8;
					break;

				case 'Novice Sneak':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']++;break;
				case 'Gnome Stealth':case 'Adept Sneak':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;break;
				case 'Master Sneak':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=3;break;

				case 'Novice Wisdom':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;break;
				case 'Elven Intellect':case 'Adept Wisdom':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']+=2;break;
				case 'Master Wisdom':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']+=3;break;

				case 'Novice Marksman':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']++;break;
				case 'Human Accuracy':case 'Adept Marksman':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+=2;break;
				case 'Master Marksman':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+=3;break;

				case 'Novice Dodger':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;break;
				case 'Halfling Tumbling':case 'Adept Dodger':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;break;
				case 'Master Dodger':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=3;break;

				case 'Novice Blocker':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;break;
				case 'Orc Block':case 'Adept Blocker':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;break;
				case 'Master Blocker':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=3;break;

				case 'Novice Strength':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']++;break;
				case 'Dwarven Strength':case 'Adept Strength':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;break;
				case 'Master Strength':$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=3;break;


				case 'Novice Defense':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=2;
					break;
				case 'Adept Defense':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=4;
					break;
				case 'Master Defense':
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
					$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
					$this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']+=6;
					break;

				case '':default:
					break;
			}
		}

		$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['stamina']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['mana']['soft-maximum'];

		$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['soft-maximum'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['soft-maximum'];

		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Arcane Focus']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Battle Focus']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Evasion']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Footing']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Balance']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength'])/2);
		$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Observation']=round(($this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Detection']+$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision'])/2);

		asort($this->A_Teams[$v_TeamName][$v_MemberID]['keywords']);
		$this->A_Teams[$v_TeamName][$v_MemberID]['keywords']=implode(', ',$this->A_Teams[$v_TeamName][$v_MemberID]['keywords']);

		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate']=round($this->A_Teams[$v_TeamName][$v_MemberID]['hire-value']/10);
		$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate-per-turn']=round($this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate']/12);

	}
	



	/* Function - Add Effect */
	function f_AddEffect($v_TeamName,$v_MemberID,$v_PerformanceName,$v_Type,$v_EffectName){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['name']=$v_EffectName;
		switch($v_EffectName){
			case 'Black And Blue Bruising':case 'Dazed':case 'Deadly Puncture':case 'Deadly Gash':case 'Deadly Shock':case 'Third-Degree Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['duration']=9;
				break;
			case 'Deep Gash':case 'Deep Puncture':case 'Heavy Bruising':case 'Serious Burn':case 'Serious Daze':case 'Serious Shock':case 'Strong Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['duration']=6;
				break;
			case 'Adrenaline Rush':case 'Bandage':case 'Decay':case 'Focused':case 'Heal':case 'Increased Size':case 'Rejuvenate':case 'Retribution':case 'Stoneskin':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['duration']=4;
				break;
			case 'Afraid':case 'Blood Drain':case 'Deafened':case 'Knocked Out':case 'Light Bruising':case 'Moderate Poisoning':case 'Shallow Gash':case 'Shallow Puncture':case 'Slight Burn':case 'Slight Daze':case 'Slight Shock':case 'Chilled To The Bone':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['duration']=3;
				break;
			case 'Blind':case 'Dazzle':case 'Knocked Down':case 'Lured':case 'Seriously Frozen':case 'Tripped':case 'Weak Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['duration']=2;
				break;
			case 'Knocked Off-Balance':case 'Slightly Frozen':case 'Turn Undead':
				$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName][$v_Type]['duration']=1;
				break;
			case '':default:
				break;
		}
	}

	/* Function - Apply Effect */
	function f_ApplyEffect($v_TeamName,$v_MemberID,$v_EffectName,$v_Duration){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];
		$v_Pass=true;
		switch($v_EffectName){
			case 'Tripped':case 'Knocked Out':case 'Knocked Down':case 'Knocked-Off Balance':
				if($a_Member['Flying']||$a_Member['Hover']){$v_Pass=false;}
				break;
			case 'Dazzle':case 'Decay':if(substr_count($a_Member['keywords'],'Alive')==0){$v_Pass=false;}break;
			case'Turn Undead':case 'Retribution':if($a_Member['guild']!=='Undead'){$v_Pass=false;}break;
			case 'Incineration':
				$a_Chances=array(1=>105,2=>100,3=>95,4=>90,5=>85,6=>80,7=>75,8=>70,9=>65,10=>60);

				/* Get Damage Total */
				$v_DamageTotal=$this->f_GetTotal($a_Chances,10,10);

				/* Get Resistance Total */
				$v_ResistanceTotal=$this->f_GetTotal($a_Chances,$a_Member['defense']['resistance']['Heat']['chances'],$a_Member['defense']['resistance']['Heat']['boost']);

				$v_ModifiedDamageTotal=$v_DamageTotal-$v_ResistanceTotal;
				if($v_ModifiedDamageTotal<0){$v_ModifiedDamageTotal=0;}

				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']-=$v_ModifiedDamageTotal;
				if($v_ModifiedDamageTotal=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']<=0){
					//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' is incinerated.');
					return true;
				}else{
					//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' deals '.$v_ModifiedDamageTotal.' Heat damage to '.$v_DefendingMemberLogName.'.');
				}
				return;
				break;
			case 'Afraid':if($a_Member['Fearless']){$v_Pass=false;}break;
			case '':default:
				break;
		}
		/* False = Resist, True = Apply */
		if(!$v_Pass){$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' resists '.$v_EffectName.'.');return false;}

		if(array_key_exists($v_EffectName,$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
			$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_EffectName]['duration']+=$v_Duration;
			$this->A_Log[]=array('color'=>'narrator','team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>'The duration of '.$v_MemberLogName.'\'s '.$v_EffectName.' has increased.');
			return false;
		}else{
			$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_EffectName]=array('name'=>$v_EffectName,'duration'=>$v_Duration);
			switch($v_EffectName){
				case 'Heal':
					$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'health',1);
					break;
				case 'Blood Drain':
					$this->f_DrainPool($v_TeamName,$v_MemberID,true,'blood',8);
					break;
				case '':default:
					break;
			}
		}
		switch($v_EffectName){
			/* Lure */
			case 'Lured':
				$this->A_Teams[$v_TeamName][$v_MemberID]['performance-preference']['move']+=50;
				break;

			case 'Turn Undead':
				$this->A_Log[]=array('color'=>'narrator','team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.'\'s soul has been released.');
				return true;
				break;

			/* Retribution */
			case 'Retribution':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']<=0){
					$this->A_Log[]=array('color'=>'narrator','team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has '.$v_EffectName.'.');
					return true;
				}elseif($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
				}
				break;
			case 'Decay':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']<=0){
					$this->A_Log[]=array('color'=>'narrator','team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has '.$v_EffectName.'.');
					return true;
				}elseif($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
				}
				break;

			/* Buffs */
			case 'Bandage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']+=6;
				break;
			case 'Rejuvenate':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['regeneration']+=2;
				break;
			case 'Adrenaline Rush':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']+=2;
				break;
			case 'Focused':
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','damage');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','effect');
				$this->f_IncreaseAll($v_TeamName,$v_MemberID,'attack','critical');
				break;
			case 'Stoneskin':
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Blunt');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Piercing');
				$this->f_IncreaseAllDeeper($v_TeamName,$v_MemberID,'defense','resistance','Slashing');
				break;

			/* Regeneration */
			case 'Heal':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']+=2;
				break;

			/* Blunt */
			case 'Light Bruising':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;
				break;
			case 'Heavy Bruising':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=6;
				break;
			case 'Black And Blue Bruising':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=8;
				break;

			/* Piercing */
			case 'Blood Drain':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;
				break;

			case 'Shallow Puncture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;
				break;
			case 'Deep Puncture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=3;
				break;
			case 'Deadly Puncture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;
				break;

			/* Slashing */
			case 'Shallow Gash':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=4;
				break;
			case 'Deep Gash':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=6;
				break;
			case 'Deadly Gash':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']+=8;
				break;

			/* Cold */
			case 'Slightly Frozen':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
				break;
			case 'Seriously Frozen':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']-=2;
				break;
			case 'Chilled To The Bone':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']-=3;
				break;

			/* Heat */
			case 'Slight Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=2;
				break;
			case 'Serious Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=3;
				break;
			case 'Third-Degree Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=4;
				break;
			/* Shock */
			case 'Slight Shock':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=2;
				break;
			case 'Serious Shock':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=3;
				break;
			case 'Third-Degree Shock':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']+=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=4;
				break;

			/* Blinding */
			case 'Blind':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=false;
				break;

			/* Disoriented */
			case 'Slight Daze':
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=4;
				break;
			case 'Serious Daze':
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=6;
				break;
			case 'Dazed':
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']+=8;
				break;

			/* Knock-Down */
			case 'Knocked Out':case 'Dazzle':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-understand']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
			case 'Tripped':
			case 'Knocked Down':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-use']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
			case 'Knocked Off-Balance':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']-=2;
				break;


			case 'Increased Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']+=2;
				break;

			/* Poisoning */
			case 'Strong Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
			case 'Moderate Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
			case 'Weak Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']<=0){
					$this->A_Log[]=array('color'=>'narrator','team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has '.$v_EffectName.'.');
					return true;
				}elseif($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
				}
				break;


			case 'Defensive Posture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				break;
			case 'Unconscious':
				$this->A_Teams[$v_TeamName][$v_MemberID]['status']='Unconscious';
				$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;
				break;
			case 'Exhausted':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']+=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;
				break;
			case 'Confounded':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['regeneration']+=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']++;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']++;
				break;
			case 'Afraid':
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=!$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=!$this->A_Teams[$v_TeamName][$v_MemberID]['retreating'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-use']=false;
				break;
			case '':default:
				break;
		}
		$this->A_Log[]=array('color'=>'narrator','team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has '.$v_EffectName.'.');
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
				$this->A_Statistics[$v_TeamName][$v_StatisticName][$v_MemberID]+=$v_DamageTotal;
				$this->A_Statistics[$v_TeamName]['damage-inflicted-by-type'][$v_DamageType]+=$v_DamageTotal;
				$this->A_Statistics[$v_TeamName]['damage-inflicted-total']+=$v_DamageTotal;
				break;
			case '':default:
				break;
		}
	}

	/* Function - Hit Mercenary */
	function f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName='attack'){
		/* Attacker */
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_MemberLogName=$a_Member['name'];
		/* Defender */
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		//$v_DefendingMemberLogName=' [tile:'.$a_DefendingMember['location'].'] [id:'.$v_DefendingMemberID.'] '.$a_DefendingMember['name'];
		$v_DefendingMemberLogName=$a_DefendingMember['name'];

		//if($v_PerformanceName=='action'){print_r($a_Member);die();}

		/* Member Variables */
		$v_Blessed=$a_Member[$v_PerformanceName]['blessed'];
		if($v_Blessed){$v_Blessed=$this->f_IsBlessed($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);}
		$v_Sneaking=$this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
		$v_Name=$a_Member['abilities'][$v_PerformanceName];
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
		
		/* Blessed / Sneaking Bonus */
		if($v_Blessed){$v_DamageChances++;$v_DamageBoost++;$v_EffectChances++;$v_EffectBoost++;$v_CriticalChances++;$v_CriticalBoost++;}
		if($v_Sneaking){$v_DamageChances++;$v_DamageBoost++;$v_EffectChances++;$v_EffectBoost++;$v_CriticalChances++;$v_CriticalBoost++;}

		switch($v_PerformanceName){
			case 'action':$v_Text='performs '.$v_Name.' ';break;
			case 'magic':$v_Text='casts '.$v_Name.' ';break;
			case 'attack':case 'chances':default:$v_Text='attacks ';break;
		}

		/* Defending Member Variables */
		if(array_key_exists($v_DamageType,$a_DefendingMember['defense']['resistance'])){
			$v_DefendingResistanceChances=$a_DefendingMember['defense']['resistance'][$v_DamageType]['chances'];
			$v_DefendingResistanceBoost=$a_DefendingMember['defense']['resistance'][$v_DamageType]['boost']*5;
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

		/* Damage */
		if($v_DealDamage){
			$v_ModifiedDamageTotal=$v_DamageTotal-$v_ResistanceTotal;
			if($v_ModifiedDamageTotal<0){
				$v_ModifiedDamageTotal=0;
			}elseif($v_ModifiedDamageTotal>0){
				$this->f_AddStatistic($v_TeamName,$v_MemberID,'damage-inflicted-by-character',$v_DamageType,$v_ModifiedDamageTotal); /* Statistics */
				$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['health']['current']-=$v_ModifiedDamageTotal;
				if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['health']['current']<=0){
					$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
					//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.(($v_Sneaking)?'sneaks, ':'').$v_Text.'and kills '.$v_DefendingMemberLogName.'.');
					return true;
				}else{
					//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.(($v_Sneaking)?'sneaks, ':'').$v_Text.'and deals '.$v_ModifiedDamageTotal.' '.$v_DamageType.' damage to '.$v_DefendingMemberLogName.'.');
				}
			}else{
				$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.(($v_Sneaking)?'sneaks, ':'').$v_Text.'and deals no damage to '.$v_DefendingMemberLogName.'.');
				if($v_ResistanceTotal>0){
					$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName.'-yellow','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.'\'s armor absorbs '.$v_ResistanceTotal.' point'.(($v_ResistanceTotal==1)?'':'s').' of damage.');
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
				if($v_CounterEffect){
					$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'yellow-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.'\'s armor prevents '.$v_CriticalName.'.');
				}else{
					$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.(($v_Sneaking)?'sneaks, ':'').$v_Text.'and critically wounds '.$v_DefendingMemberLogName.'.');
					$v_Killed=$this->f_ApplyEffect($v_DefendingTeamName,$v_DefendingMemberID,$v_CriticalName,$v_CriticalDuration);
					if($v_Killed){return true;}
				}
			}
		}else{$v_ApplyCritical=false;}
		
		if($v_EffectName!==''&&!$v_Pass){
			/* Get Apply Effect */
			$v_ApplyEffect=$this->f_GetTrueOrFalse($v_EffectChances,$a_Chances,$v_EffectBoost);
			/* Apply Effect */
			if($v_ApplyEffect){
				/* Armor Attempts To Counter Effect */
				$v_CounterEffect=$this->f_GetTrueOrFalse($v_DefendingEffectChances,$a_Chances,$v_DefendingEffectBoost);
				/* Apply Or Counter Effect */
				if($v_CounterEffect){
					$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'yellow-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.'\'s armor prevents '.$v_EffectName.'.');
				}else{
					$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.(($v_Sneaking)?'sneaks, ':'').$v_Text.'and wounds '.$v_DefendingMemberLogName.'.');
					$v_Killed=$this->f_ApplyEffect($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration);
					if($v_Killed){return true;}
				}
			}
		}else{$v_ApplyEffect=false;}

		if(!$v_ApplyEffect&&!$v_ApplyCritical&&$v_ModifiedDamageTotal>0){
			$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.(($v_Sneaking)?'sneaks, ':'').$v_Text.'and barely misses '.$v_DefendingMemberLogName.'.');
		}

		return false;
	}

	/* Function - Is Blessed */
	function f_IsBlessed($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID){
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		if($a_DefendingMember=='Undead'){return true;}
		return false;
	}
	/* Function - Is Sneaking */
	function f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID){
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		foreach($a_DefendingMember['spotted'] as $v_Key=>$a_Range){if(in_array($v_MemberID,$a_Range)){return false;}}
		return true;
	}

	/* Function - Master */
	function f_Master($v_TeamName,$v_MemberID,$v_DamageType,$v_PerformanceName){
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['boost']+=2;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['chances']++;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['boost']+=2;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['effect']['chances']++;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['boost']+=2;
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['critical']['chances']++;
	}




	/* Mercenary */
	private $a_Mercenary=array(
		'id'=>0,
		/* Body Parts */
		'Body-Parts'=>array(
			'Brain'=>false,
			'Exoskeleton'=>false,
			'Feathers'=>false,
			'Flesh'=>false
			'Fur'=>false
			'Hair'=>false,
			'Heart'=>false,
			'Hide'=>false
			'Left-Arm'=>false,'Left-Foot'=>false,'Left-Hand'=>false,'Left-Leg'=>false,'Left-Lung'=>false,'Left-Wing'=>false,
			'Right-Arm'=>false,'Right-Foot'=>false,'Right-Hand'=>false,'Right-Leg'=>false,'Right-Lung'=>false,'Right-Wing'=>false,
			'Stomach'=>false
		),
		'Can-Lose'=>array(
			'Health'=>false,
			'Stamina'=>false,
			'Mana'=>false,
			'Blood'=>false,
			'Energy'=>false,
			'Concentration'=>false
		),
		'Targetable-Body-Parts'=>array(
			'Head'=>false,
			'Left-Arm'=>false,'Left-Leg'=>false,'Left-Wing'=>false,
			'Right-Arm'=>false,'Right-Leg'=>false,'Right-Wing'=>false,
			'Torso'=>false
		),

		/* Morale */
		'Morale-Conditions'=>array(),

		'team-id'=>0,
		'name'=>'',
		'secondary-name'=>'',
		'hire-value'=>100,
		'hire-rate'=>1,
		'hire-rate-per-turn'=>1,
		'unlocked'=>1,
		/* Soldier - Centurion - Legionary - Veteran - Commander */
		'rank'=>'',
		'status'=>'Aware',
		'traits'=>array(
			/* Female, Male, Unknown */
			'gender'=>'',
			/* Cleric, Fighter, Ranger, Rogue, Wizard */
			'guild'=>'',
			/* Animal, Construct, Dwarf, Elf, Goblin, Human, Insect, Orc, Skeleton, Troll, Zombie */
			'race'=>''
		),
		'abilities'=>array('action'=>'','attack'=>'','magic'=>''),
		'training'=>array('basic'=>'','minor'=>'','major'=>'','specialization'=>''),
		'keywords'=>array(),
		/* Stance */
		'stance'=>'',
		/* Performance Preference */
		'performance-preference'=>array('action'=>20,'attack'=>5,'magic'=>15,'move'=>0,'use'=>10),
		/* Range Preference */
		'range-preference'=>array('close'=>15,'short'=>10,'long'=>5,'distant'=>0),
		'race-image'=>'empty_icon',
		/* Special */
		'Awe-Inspiring'=>false,
		'Ethereal'=>false,
		'Fearful'=>false,
		'Fearless'=>false,
		'Flying'=>false,
		'Giant-Size'=>false,
		'Hover'=>false,
		'Large-Size'=>false,
		'Medium-Size'=>false,
		'Poison Immunity'=>false,
		'Small-Size'=>false,
		'Tiny-Size'=>false,
		'Tower-Size'=>false,

		'keyword-list'=>array(),

		/* Primary Life Pools */
		'can-lose-health'=>true,
		'health'=>array('current'=>1,'hard-maximum'=>10,'hard-minimum'=>0,'soft-maximum'=>1,'regeneration'=>0,'drain'=>0),
		'can-lose-mana'=>false,
		'mana'=>array('current'=>1,'hard-maximum'=>10,'hard-minimum'=>0,'soft-maximum'=>1,'regeneration'=>0,'drain'=>0),
		'can-lose-stamina'=>false,
		'stamina'=>array('current'=>1,'hard-maximum'=>10,'hard-minimum'=>0,'soft-maximum'=>1,'regeneration'=>0,'drain'=>0),

		/* Secondary Life Pools */
		'can-lose-blood'=>false,
		'blood'=>array('current'=>1,'hard-maximum'=>100,'hard-minimum'=>0,'soft-maximum'=>100,'regeneration'=>0,'drain'=>0),
		'can-lose-energy'=>false,
		'energy'=>array('current'=>1,'hard-maximum'=>100,'hard-minimum'=>0,'soft-maximum'=>100,'regeneration'=>1,'drain'=>0),
		'can-lose-focus'=>false,
		'focus'=>array('current'=>1,'hard-maximum'=>100,'hard-minimum'=>0,'soft-maximum'=>100,'regeneration'=>1,'drain'=>0),

		/* Skills */
		'skills'=>array(
			/* Personal */
			'Accuracy'=>0,
			'Balance'=>0,
			'Block'=>0,
			'Communication'=>0,
			'Detection'=>0,
			'Dodge'=>0,
			'Intellect'=>0,
			'Stealth'=>0,
			'Strength'=>0,
			'Understanding'=>0,
			'Vision'=>0,
			/* Derived */
			'Arcane Focus'=>0,
			'Battle Focus'=>0,
			'Evasion'=>0,
			'Footing'=>0,
			'Observation'=>0
		),
		
		/* Initiative */
		'initiative'=>3,

		/* Speed */
		'speed'=>0,
		
		/* Range Of View */
		'range-of-view'=>0,

		/* Hand-Use */
		'hand-use'=>array('left'=>0,'right'=>0),
		/* Carrying */
		'carrying'=>array('very-heavy'=>0,'heavy'=>0,'medium'=>0,'light'=>0,'very-light'=>0),
		/* Weight Limits */
		'weight-limits'=>array('very-heavy'=>1,'heavy'=>2,'medium'=>4,'light'=>8,'very-light'=>16),

		/* Location */
		'location'=>0,

		/* Language */
		'language'=>array(),

		'performed-instant'=>false,

		/* Action */
		'can-action'=>false,
		'action'=>array(
			'image'=>'empty_icon',
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','to-inflict'=>0),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','to-inflict'=>0),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt','to-inflict'=>0),
			'to-win-challenge'=>0,
			'buff'=>false,
			'instant'=>false,
			'name'=>'',
			'area'=>false,
			'challenge'=>false,
			'deflection'=>true,
			'projectile'=>false,
			'blessed'=>false,
			'sneaking'=>false,
			'can-action'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,
			'attacker'=>array('effect-name'=>'','level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),'skill'=>'',
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
			'cost'=>0,'pool'=>'stamina',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Attack */
		'can-attack'=>false,
		'attack'=>array(
			'image'=>'empty_icon',
			'images'=>array('left-hand'=>'','right-hand'=>'empty_icon'),
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','to-inflict'=>0),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','to-inflict'=>0),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt','to-inflict'=>0),
			'to-win-challenge'=>0,
			'buff'=>false,
			'instant'=>false,
			'name'=>'',
			'style'=>'',
			'area'=>false,
			'challenge'=>false,
			'deflection'=>true,
			'projectile'=>false,
			'blessed'=>false,
			'sneaking'=>false,
			'can-attack'=>false,'deal-damage'=>false,'has-target'=>true,'hostile'=>false,
			'attacker'=>array('effect-name'=>'','level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),'skill'=>'',
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
			'cost'=>1,'pool'=>'energy',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Magic */
		'can-magic'=>false,
		'magic'=>array(
			'image'=>'empty_icon',
			'critical'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','to-inflict'=>0),
			'effect'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','to-inflict'=>0),
			'damage'=>array('boost'=>1,'chances'=>1,'duration'=>0,'name'=>'','type'=>'Blunt','to-inflict'=>0),
			'to-win-challenge'=>0,
			'buff'=>false,
			'instant'=>false,
			'name'=>'',
			'area'=>false,
			'challenge'=>false,
			'deflection'=>true,
			'projectile'=>false,
			'blessed'=>false,
			'sneaking'=>false,
			'can-magic'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,
			'attacker'=>array('effect-name'=>'','level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),'skill'=>'',
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
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
			'name'=>'',
			'can-move'=>false,'can-hide'=>false,'deal-damage'=>false,'has-target'=>false,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
			'cost'=>0,'pool'=>'energy',
			're-use'=>0,'re-use-timer'=>0
		),
		/* See */
		'can-see'=>false,
		'see'=>array(
			'name'=>'',
			'can-see'=>false,'deal-damage'=>false,'has-target'=>false,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
			'cost'=>0,'pool'=>'focus',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Communicate */
		'can-communicate'=>false,
		'can-understand'=>false,
		'can-detect'=>false,
		'communicate'=>array(
			'name'=>'',
			'can-understand'=>false,'can-communicate'=>false,'can-detect'=>false,'deal-damage'=>false,'has-target'=>false,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
			'cost'=>0,'pool'=>'focus',
			're-use'=>0,'re-use-timer'=>0
		),
		/* Use */
		'can-use'=>false,
		'use'=>array(
			'image'=>'empty_icon',
			'name'=>'',
			'can-use'=>false,'deal-damage'=>false,'has-target'=>false,'hostile'=>false,
			'attacker'=>array('level'=>'','skill'=>''),'defender'=>array('level'=>'','skill'=>''),
			'range'=>array('close'=>false,'short'=>false,'long'=>false,'distant'=>false),
			'cost'=>0,'pool'=>'energy',
			're-use'=>0,'re-use-timer'=>0
		),

		/* Defense */
		'defense'=>array(
			'images'=>array('hands'=>'empty_icon','head'=>'empty_icon','feet'=>'empty_icon','legs'=>'empty_icon','torso'=>'empty_icon'),
			'protection'=>array('boost'=>1,'chances'=>1),
			'resistance'=>array(
				'Blunt'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Cold'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Electrical'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Heat'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Piercing'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Poison'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Slashing'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true),
				'Sonic'=>array('boost'=>1,'chances'=>1,'can-be-hit'=>true)
			)
		),

		/* Items */
		'items'=>array('face'=>'','feet'=>'','fingers'=>'','hands'=>'','head'=>'','left-hand'=>'','legs'=>'','neck'=>'','right-hand'=>'','torso'=>'','waist'=>''),
		
		/* Conditions */
		'conditions'=>array(),
		
		'preferred-targets'=>array(),
		'target'=>array('close'=>-1,'short'=>-1,'long'=>-1,'distant'=>-1),
		'targets'=>array('action'=>array(),'attack'=>array(),'magic'=>array(),'use'=>array()),
		'spotted'=>array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array()),
		'spotted-total'=>0,
		'visible-members'=>array('close'=>array(),'short'=>array(),'long'=>array(),'distant'=>array()),
		'visible-member-total'=>0
	);

	/* Function - Start */
	function f_Start(){
		$this->A_Quest=$this->A_TestQuestData[$this->V_QuestID];
		$this->A_Party['goals']=$this->A_Quest['goals'];
		$this->A_Log[]=array(
			'color'=>'narrator',
			'team'=>'narrator',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>'Started quest ('.$this->A_Quest['name'].').'
		);
		$this->f_LoadMemberData();
		$this->A_Log[]=array(
			'color'=>'narrator',
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

		$this->f_AllMembersRegenerateAndDrain('party');
		$this->f_AllMembersRegenerateAndDrain('quest');

		$this->f_AllMembersCheckTemporaryConditions('party');
		$this->f_AllMembersCheckTemporaryConditions('quest');

		$this->f_AllMembersLookAround('party');
		$this->f_AllMembersLookAround('quest');

		$this->f_AllMembersInformOthers('party');
		$this->f_AllMembersInformOthers('quest');

		$this->f_AllMembersChoosePossibleTargets('party');
		$this->f_AllMembersChoosePossibleTargets('quest');

		$this->f_AllTeamsChooseTargetAndPerform();

		$this->f_CheckTriggers('party');
		$this->f_CheckGoal('party');

		if($this->v_FailSafeCounter>$this->A_Quest['maximum-turns-fail-safe']||$this->A_TeamData['party-has-won']||$this->A_TeamData['quest-has-won']){
			$this->A_Log[]=array('color'=>'narrator','team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>'Finished quest ('.$this->A_Quest['name'].').');
			if($this->A_TeamData['quest-has-won']){
				$this->A_Statistics['quest']['success']=true;
				//array_unshift($this->A_Log,array('color'=>'narrator','team'=>'narrator-bold','turn'=>0,'text'=>'The party never returned.'));
			}else{
				if($this->A_TeamData['party-has-won']){
					$this->A_Statistics['party']['success']=true;
					//array_unshift($this->A_Log,array('color'=>'narrator','team'=>'narrator-bold','turn'=>0,'text'=>'Success! The party returned after '.$this->f_GetTime().' of journeying.'));
				}else{
					//array_unshift($this->A_Log,array('color'=>'narrator','team'=>'narrator-bold','turn'=>0,'text'=>'Failure! The party returned after '.$this->f_GetTime().' of journeying.'));
				}
			}
			//return $this->A_Log;
			$this->A_Statistics['total-turns']=$this->A_TeamData['turn-counter'];
			$this->A_Statistics['total-time']=$this->f_GetTime();
			$this->f_CalculateRate('party');
			$this->f_CalculateRate('quest');
			return $this->A_Statistics; /* Statistics */
		}else{
			return $this->f_Continue();
		}
	}
	
	/* Function - Calculate Rate */
	function f_CalculateRate($v_TeamName){
		$v_TotalTurns=$this->A_TeamData['turn-counter'];
		foreach($this->A_Statistics[$v_TeamName]['characters'] as $v_MemberID=>$v_MemberName){
			$v_CostPerTurn=0;
			if(array_key_exists($v_MemberID,$this->A_Teams[$v_TeamName])){$v_CostPerTurn=$this->A_Teams[$v_TeamName][$v_MemberID]['hire-rate-per-turn'];}
			$v_TotalPay=$v_CostPerTurn*$v_TotalTurns;
			$this->A_Statistics[$v_TeamName]['cost-by-character'][$v_MemberID]=$v_TotalPay;
			$this->A_Statistics[$v_TeamName]['cost-total']+=$v_TotalPay;
		}
	}

	/* Function - All Members Choose Possible Targets */
	function f_AllMembersChoosePossibleTargets($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			if($a_Member['status']=='Aware'){$this->f_ChoosePossibleTargets($v_TeamName,$v_MemberID);}
		}
	}
	/* Function - All Members Inform Others */
	function f_AllMembersInformOthers($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			if($a_Member['status']=='Aware'){$this->f_InformOthers($v_TeamName,$v_MemberID);}
		}
	}
	/* Function - All Members Look Around */
	function f_AllMembersLookAround($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			if($a_Member['status']=='Aware'){$this->f_LookAround($v_TeamName,$v_MemberID);}
		}
	}
	/* Function - All Members Regenerate And Drain */
	function f_AllMembersRegenerateAndDrain($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			$this->A_Teams[$v_TeamName][$v_MemberID]['performed-instant']=false;
			$this->f_IncreaseTimer($v_TeamName,$v_MemberID);
			if($this->A_TeamData['turn-counter']%6){
				$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'health',1);
				$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'stamina',1);
				$this->f_RegeneratePool($v_TeamName,$v_MemberID,true,'mana',1);
			}
			$this->f_RegeneratePool($v_TeamName,$v_MemberID);
			$this->f_DrainPool($v_TeamName,$v_MemberID);
		}
	}
	
	/* Function - Increase Timer */
	function f_IncreaseTimer($v_TeamName,$v_MemberID){
		if($this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use-timer']>0){$this->A_Teams[$v_TeamName][$v_MemberID]['action']['re-use-timer']--;}
		if($this->A_Teams[$v_TeamName][$v_MemberID]['attack']['re-use-timer']>0){$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['re-use-timer']--;}
		if($this->A_Teams[$v_TeamName][$v_MemberID]['magic']['re-use-timer']>0){$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['re-use-timer']--;}
	}
	/* Function - Set Timer */
	function f_SetTimer($v_TeamName,$v_MemberID,$v_PerformanceName){$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use-timer']=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['re-use'];}

	/* Function - All Teams Choose Target And Perform */
	function f_AllTeamsChooseTargetAndPerform(){
		$a_Initiative=$this->f_SortByInitiative();
		foreach($a_Initiative as $v_Initiative=>$a_Members){
			foreach($a_Members as $v_Key=>$a_Member){
				$this->f_ChooseTargetAndPerform($a_Member['team'],$a_Member['id']);
			}
		}
	}


	/* Function - Choose Possible Targets */
	function f_ChoosePossibleTargets($v_TeamName,$v_MemberID){
		$this->f_ResetTargets($v_TeamName,$v_MemberID);
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if($a_Member['spotted-total']==0){return;}
		$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['spotted'] as $v_RangeName=>$a_DefendingMembers){
			foreach($a_DefendingMembers as $v_Key=>$v_DefendingMemberID){
				$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
				$v_DefendingMemberLogName=' [tile:'.$a_DefendingMember['location'].'] [id:'.$v_DefendingMemberID.'] '.$a_DefendingMember['name'];
				foreach($a_Member['performance-preference'] as $v_PerformanceName=>$v_PreferenceWeight){
					if($a_Member['can-'.$v_PerformanceName]&&$a_Member[$v_PerformanceName]['has-target']&&$a_Member[$v_PerformanceName]['range'][$v_RangeName]){
						$v_Pass=true;
						$v_Cost=$a_Member[$v_PerformanceName]['cost'];
						$v_PoolName=$a_Member[$v_PerformanceName]['pool'];
						if($v_Cost>0){if($a_Member[$v_PoolName]['current']<$a_Member[$v_PerformanceName]['cost']){$v_Pass=false;}}
						if($v_Pass){
							$v_TotalWeight=$v_PreferenceWeight+$a_Member['range-preference'][$v_RangeName]+$this->f_GetTotalWeight($v_DefendingTeamName,$v_DefendingMemberID);
							$this->A_Teams[$v_TeamName][$v_MemberID]['targets'][$v_PerformanceName][$v_DefendingMemberID]=$v_TotalWeight;
							/*
							$this->A_Log[]=array(
								'color'=>$v_TeamName,
								'team'=>$v_TeamName.'-grey',
								'turn'=>$this->A_TeamData['turn-counter'],
								'text'=>$v_MemberLogName.' chooses '.$v_DefendingMemberLogName.' as a possible '.$v_PerformanceName.' target - weight ['.$v_TotalWeight.'].'
							);
							*/
						}
					}
				}
			}
		}
	}
	/* Function - Drain Pool */
	function f_DrainPool($v_TeamName,$v_MemberID,$v_Specific=false,$v_DrainFrom='',$v_Amount=0){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];
		$a_Pools=array('health','stamina','mana','blood','energy','focus');
		foreach($a_Pools as $v_Key=>$v_PoolName){
			if($a_Member['can-lose-'.$v_PoolName]){
				$v_Drain=$a_Member[$v_PoolName]['drain'];
				if($v_Specific){
					if($v_DrainFrom==$v_PoolName){
						$v_Drain=$v_Amount;
					}else{
						$v_Drain=0;
					}
				}
				if($v_Drain>0){
					if($a_Member[$v_PoolName]['current']>0){
						if($a_Member[$v_PoolName]['current']-$v_Drain>0){
							$v_ModifiedDrain=$v_Drain;
						}else{
							$v_ModifiedDrain=$a_Member[$v_PoolName]['current'];
						}
						$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']-=$v_ModifiedDrain;
						$this->A_Statistics[$v_TeamName][$v_PoolName.'-loss-by-character'][$v_MemberID]+=$v_ModifiedDrain; /* Statistics */
						//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' is drained of '.$v_ModifiedDrain.' point'.(($v_ModifiedDrain==1)?'':'s').' of '.$v_PoolName.'.');
						if($this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']<=0){
							switch($v_PoolName){
								case 'blood':
									if(!array_key_exists('Unconscious',$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
										$this->f_ApplyEffect($v_TeamName,$v_MemberID,'Unconscious',60);
										$this->A_Statistics[$v_TeamName]['unconscious-total']++; /* Statistics */
										$this->A_Statistics[$v_TeamName]['unconscious-by-character'][$v_MemberID]++; /* Statistics */
									}
									break;
								case 'energy':
									if(!array_key_exists('Exhausted',$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
										$this->f_ApplyEffect($v_TeamName,$v_MemberID,'Exhausted',3);
										$this->A_Statistics[$v_TeamName]['exhausted-total']++; /* Statistics */
										$this->A_Statistics[$v_TeamName]['exhausted-by-character'][$v_MemberID]++; /* Statistics */
									}
									break;
								case 'focus':
									if(!array_key_exists('Confounded',$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
										$this->f_ApplyEffect($v_TeamName,$v_MemberID,'Confounded',6);
										$this->A_Statistics[$v_TeamName]['confounded-total']++; /* Statistics */
										$this->A_Statistics[$v_TeamName]['confounded-by-character'][$v_MemberID]++; /* Statistics */
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
	/* Function - Inform Others */
	function f_InformOthers($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_MemberLogName=$a_Member['name'];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($this->A_Teams[$v_TeamName] as $v_OtherMemberID=>$a_OtherMember){
			if($v_MemberID!==$v_OtherMemberID){
				if($a_Member['location']==$a_OtherMember['location']){
					$v_Language=$this->f_SimilarValue($a_Member['language'],$a_OtherMember['language']);
					if($v_Language!==''){
						$v_OtherMemberLogName=$a_OtherMember['name'];
						foreach($a_Member['spotted'] as $v_RangeName=>$a_Range){
							if($a_Member['initiative']>=$a_OtherMember['initiative']){
								foreach($a_Range as $v_Key=>$v_DefendingMemberID){
									$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
									$v_DefendingMemberLogName=$a_DefendingMember['name'];
									if(!in_array($v_DefendingMemberID,$a_OtherMember['spotted'][$v_RangeName])){
										if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_TeamName,$v_OtherMemberID,'communicate')){
											$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>'In '.$v_Language.', '.$v_MemberLogName.' informs '.$v_OtherMemberLogName.' about '.$v_DefendingMemberLogName.'.');
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
		$v_RangeOfView=$a_Member['range-of-view'];
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
		$v_MemberLogName=$a_Member['name'];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		$a_OthersInRange=array();
		if($v_DistanceFromTile>0){$a_Tiles=array($v_Tile-$v_DistanceFromTile,$v_Tile+$v_DistanceFromTile);}else{$a_Tiles=array($v_Tile);}
		//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName.'-grey','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' looks around ('.$v_RangeName.' range).');
		foreach($this->A_Teams[$v_DefendingTeamName] as $v_DefendingMemberID=>$a_DefendingMember){
			$v_DefendingMemberLogName=$a_DefendingMember['name'];
			foreach($a_Tiles as $v_Key=>$v_Tile){
				if($v_Tile==$a_DefendingMember['location']){
					$v_Pass=false;
					if(array_key_exists($v_DefendingMemberID,$a_Member['spotted'][$v_RangeName])&&!$a_Member['moved-this-turn']&&!$a_DefendingMember['moved-this-turn']){
						$v_Pass=true;
						//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'grey-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' tracks '.$v_DefendingMemberLogName.' ('.$v_RangeName.').');
					}else if(array_key_exists($v_DefendingMemberID,$a_Member['spotted'][$v_RangeName])&&$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'see')){
						$v_Pass=true;
						//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'grey-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' follows '.$v_DefendingMemberLogName.' ('.$v_RangeName.').');
					}elseif(!$a_DefendingMember['can-hide']){
						$v_Pass=true;
						//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' spots '.$v_DefendingMemberLogName.' ('.$v_RangeName.').');
					}else if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'see')){
						$v_Pass=true;
						//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' spots '.$v_DefendingMemberLogName.' ('.$v_RangeName.').');
					}
					if($v_Pass){
						$this->A_Teams[$v_TeamName][$v_MemberID]['spotted-total']++;
						$a_OthersInRange[]=$v_DefendingMemberID;
					}
				}
			}
		}
		return $a_OthersInRange;
	}
	/* Function - Regenerate Pool */
	function f_RegeneratePool($v_TeamName,$v_MemberID,$v_Specific=false,$v_RegenerateTo='',$v_Amount=0){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];
		$a_Pools=array('health','stamina','mana','blood','energy','focus');
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
						$this->A_Log[]=array(
							'color'=>$v_TeamName,
							'team'=>'green-italic',
							'turn'=>$this->A_TeamData['turn-counter'],
							'text'=>$v_MemberLogName.' regenerates '.$v_ModifiedRegeneration.' point'.(($v_ModifiedRegeneration==1)?'':'s').' of '.$v_PoolName.'.'
						);
					}
				}
			}
		}
	}

	/* Function - Get Total Weight */
	function f_GetTotalWeight($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_TotalWeight=0;
		switch($a_Member['stance']){
			case 'protect-group':$v_TotalWeight+=10;break;
			case 'stay-back':break;
			case '':default:$v_TotalWeight+=5;break;
		}
		return $v_TotalWeight;
	}
	/* Function - Reset Targets */
	function f_ResetTargets($v_TeamName,$v_MemberID){$this->A_Teams[$v_TeamName][$v_MemberID]['targets']=array('action'=>array(),'attack'=>array(),'magic'=>array(),'use'=>array());}
	/* Function - Similar Value */
	function f_SimilarValue($a_First=array(),$a_Second=array()){if(!empty($a_First)&&!empty($a_Second)){foreach($a_First as $v_Key=>$v_Value){if(in_array($v_Value,$a_Second)){return $v_Value;}}}return '';}













	function f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceType){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		$v_DefendingMemberLogName=$a_DefendingMember['name'];
		$v_AttackerTotal=0;
		$v_DefenderTotal=0;

		switch($v_PerformanceType){
			case 'notice-attacker':
				$v_AttackerLevel='';
				$v_AttackerSkill='Stealth';
				$v_DefenderLevel='';
				$v_DefenderSkill='Observation';
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
			case '':default:
				break;
		}
		switch($v_AttackerLevel){case 'Amateur':$v_AttackerTotal-=5;break;case 'Lesser':$v_AttackerTotal-=2;break;case 'Greater':$v_AttackerTotal+=2;break;case 'Master':$v_AttackerTotal+=5;break;case '':default:break;}
		if($v_AttackerTotal<-10){$v_AttackerTotal=-10;}

		switch($v_DefenderSkill){
			case 'can-'.$v_PerformanceType:return $a_Member['can-'.$v_PerformanceType];break;
			case 'Accuracy':case 'Balance':case 'Block':case 'Detection':case 'Dodge':case 'Understanding':case 'Intellect':case 'Communication':case 'Stealth':case 'Strength':case 'Vision':
				$v_DefenderTotal=$a_DefendingMember['skills'][$v_DefenderSkill];
				break;
			case 'Evasion':$v_DefenderTotal=round(($a_DefendingMember['skills']['Block']+$a_DefendingMember['skills']['Dodge'])/2);break;
			case 'Footing':$v_DefenderTotal=round(($a_DefendingMember['skills']['Balance']+$a_DefendingMember['skills']['Strength'])/2);break;
			case 'Observation':$v_DefenderTotal=round(($a_DefendingMember['skills']['Detection']+$a_DefendingMember['skills']['Vision'])/2);break;
			case '':default:
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
		//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName.'-grey','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' challenges '.$v_DefendingMemberLogName.' and '.(($v_AttackerRoll>=$v_DefenderRoll)?'wins':'loses').' - '.$v_AttackerRoll.' ('.$v_AttackerMinimum.'/'.$v_AttackerMaximum.') vs. '.$v_DefenderRoll.' ('.$v_DefenderMinimum.'/'.$v_DefenderMaximum.').');

		return $v_AttackerRoll>=$v_DefenderRoll;
	}
	/* Loot */
	private $a_Loot=array(
		'very-heavy'=>array(),
		'heavy'=>array(),
		'medium'=>array(),
		'light'=>array(),
		'very-light'=>array()
	);

	
	
	


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






	/* Function - All Members Check Temporary Conditions */
	function f_AllMembersCheckTemporaryConditions($v_TeamName){
		if($this->A_TeamData[$v_TeamName]['is-empty']){return;}
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){$this->f_CheckTemporaryConditions($v_TeamName,$v_MemberID);}
	}

	/* Function - Choose Target And Perform */
	function f_ChooseTargetAndPerform($v_TeamName,$v_MemberID){
		if(!array_key_exists($v_MemberID,$this->A_Teams[$v_TeamName])){return;}
		if($this->A_Teams[$v_TeamName][$v_MemberID]['status']!=='Aware'){return;}
		$this->A_Teams[$v_TeamName][$v_MemberID]['preferred-targets']=array();
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
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
	/* Function - Remove Cost From Pool */
	function f_RemoveCostFromPool($v_TeamName,$v_MemberID,$v_PoolName,$v_Cost){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName=$a_Member['name'];
		//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' is drained of '.$v_Cost.' '.$v_PoolName.'.');
		$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']-=$v_Cost;
		$this->A_Statistics[$v_TeamName][$v_PoolName.'-loss-by-character'][$v_MemberID]+=$v_Cost; /* Statistics */
		//if($this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']<1){$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' is out of '.$v_PoolName.'.');}
	}
	/* Function - Deal Damage To Pool */
	function f_DealDamageToPool($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PoolName,$v_Damage,$v_DamageType){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_DefendingMemberLogName=' [tile:'.$a_DefendingMember['location'].'] [id:'.$v_DefendingMemberID.'] '.$a_DefendingMember['name'];
		if($v_Damage>0){
			$this->A_Log[]=array(
				'color'=>$v_TeamName,
				'team'=>'red-bold',
				'turn'=>$this->A_TeamData['turn-counter'],
				'text'=>$v_MemberLogName.' deals '.$v_Damage.' '.$v_DamageType.' damage to '.$v_DefendingMemberLogName.'.'
			);
			$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID][$v_PoolName]['current']-=$v_Damage;
			if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID][$v_PoolName]['current']>0){return false;}
			return true;
		}else{
			$this->A_Log[]=array(
				'color'=>$v_TeamName,
				'team'=>'red-bold',
				'turn'=>$this->A_TeamData['turn-counter'],
				'text'=>$v_MemberLogName.' deals no damage to '.$v_DefendingMemberLogName.'.'
			);
			return false;
		}
	}
	/* Function - Member Waits */
	function f_MemberWaits($v_TeamName,$v_MemberID,$v_Test=''){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];
		$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' waits'.$v_Test.'.');
	}
	/* Function - Move */
	function f_Move($v_TeamName,$v_MemberID){
		if(!$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']){$this->f_MemberWaits($v_TeamName,$v_MemberID);return;}
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_MemberLogName=$a_Member['name'];
		$v_CurrentTile=$a_Member['location'];
		$v_MaximumDistanceMoved=$a_Member['speed'];
		$v_MaximumPathLocation=$this->A_Quest['length-of-path'];
		$v_DistanceMoved=$v_MaximumDistanceMoved;
		$v_Retreating=$a_Member['retreating'];
		if(!empty($a_Member['spotted']['close'])||!empty($a_Member['spotted']['short'])){
			if(!array_key_exists('Defensive Posture',$a_Member['conditions'])){
				$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
				foreach($a_Member['spotted'] as $v_RangeName=>$a_DefendingMembers){
					foreach($a_DefendingMembers as $v_Key=>$v_DefendingMemberID){
						if(array_key_exists($v_DefendingMemberID,$this->A_Teams[$v_DefendingTeamName])){
							$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
							switch($v_RangeName){
								case 'short':
									if($a_Member['retreating']!==$a_DefendingMember['retreating']&&$a_Member['facing-right']!==$a_DefendingMember['facing-right']){
										$this->f_ApplyEffect($v_TeamName,$v_MemberID,'Defensive Posture',2);
										$this->f_MemberWaits($v_TeamName,$v_MemberID,' in anticipation');
										return;
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
		if($v_Retreating){
			if($v_CurrentTile-$v_MaximumDistanceMoved<1){
				$v_DistanceMoved=$v_CurrentTile-1;
			}
			$v_Destination=$v_CurrentTile-$v_DistanceMoved;
			if($v_Destination==1){
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=false;
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=true;
				$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'grey-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' stops retreating.');
			}
		}else{
			if($v_CurrentTile+$v_MaximumDistanceMoved>$v_MaximumPathLocation){
				$v_DistanceMoved=$v_MaximumPathLocation-$v_CurrentTile;
			}
			$v_Destination=$v_CurrentTile+$v_DistanceMoved;
			if($v_Destination==$this->A_Quest['length-of-path']){
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=true;
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=false;
				$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'grey-italic','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' begins retreating.');
			}
		}
		$this->A_Teams[$v_TeamName][$v_MemberID]['location']=$v_Destination;
		if($v_DistanceMoved==0){
			$this->f_MemberWaits($v_TeamName,$v_MemberID);
		}else{
			$this->A_Teams[$v_TeamName][$v_MemberID]['moved-this-turn']=true;
			$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' moves '.$v_DistanceMoved.' tile'.(($v_DistanceMoved==1)?'':'s').', stopping on tile '.$v_Destination.'.');
		}
	}
	/* Function - Perform */
	function f_Perform($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_MemberLogName=$a_Member['name'];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['performance-preference'] as $v_PerformanceName=>$v_PreferenceWeight){
			if(!$a_Member[$v_PerformanceName]['has-target']&&$a_Member['can-'.$v_PerformanceName]){
				$v_TotalWeight=$a_Member['performance-preference'][$v_PerformanceName]+25;
				$v_Pass=true;
				/* Stamina / Mana Check */
				switch($v_PerformanceName){
					case 'magic':if($a_Member['mana']['current']<$a_Member[$v_PerformanceName]['cost']){$v_Pass=false;}break;
					case 'action':if($a_Member['stamina']['current']<$a_Member[$v_PerformanceName]['cost']){$v_Pass=false;}break;
					default:break;
				}
				if($v_Pass){
					switch($v_PerformanceName){
						case 'magic':
							switch($a_Member['abilities'][$v_PerformanceName]){
								case 'Healing Circle':
									/* Needs Friendly Wounded Target */
									$v_Pass=$this->f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,'health',1,0);
									break;
								case 'Word Of Retribution':
									/* Needs Hostile Undead Target */
									$v_Pass=false;
									if(!empty($a_Member['spotted']['close'])){
										foreach($a_Member['spotted']['close'] as $v_Key=>$v_PossibleTargetID){
											if(!$v_Pass&&array_key_exists($v_PossibleTargetID,$this->A_Teams[$v_DefendingTeamName])){
												if(substr_count($this->A_Teams[$v_DefendingTeamName][$v_PossibleTargetID]['keywords'],'Undead')>0){$v_Pass=true;}
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
						$a_Member['preferred-targets'][$v_TotalWeight][]=array($v_PerformanceName=>-1);
						/*
						$this->A_Log[]=array(
							'color'=>$v_TeamName,
							'team'=>$v_TeamName,
							'turn'=>$this->A_TeamData['turn-counter'],
							'text'=>$v_MemberLogName.' chooses '.$v_PerformanceName.' as a possibility - weight ['.$v_TotalWeight.'].'
						);
						*/
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
					$v_DefendingMemberLogName=$a_DefendingMember['name'];
				}
				$a_Optional=false;
				switch($v_PerformanceName){
					/* ACTION / MAGIC */
					case 'magic':
						$v_Name=$a_Member['abilities'][$v_PerformanceName];
					case 'action':
						if($a_Member[$v_PerformanceName]['re-use-timer']>0){break;}
						if($a_Member['performed-instant']&&$a_Member[$v_PerformanceName]['instant']){break;}
						$v_Name=$a_Member['abilities'][$v_PerformanceName];
						switch($v_PerformanceName){
							case 'action':$v_Text='performs '.$v_Name.' ';break;
							case 'magic':$v_Text='casts '.$v_Name.' ';break;
							case 'attack':case 'chances':default:$v_Text='attacks ';break;
						}
						$this->f_RemoveCostFromPool($v_TeamName,$v_MemberID,$a_Member[$v_PerformanceName]['pool'],$a_Member[$v_PerformanceName]['cost']);
						$this->f_SetTimer($v_TeamName,$v_MemberID,$v_PerformanceName);

						/* ******************* */
						/* B u f f */
						if($a_Member[$v_PerformanceName]['buff']){

							/* Has Target */
							if($a_Member[$v_PerformanceName]['has-target']){

							/* Area Of Effect */
							}elseif($a_Member[$v_PerformanceName]['area']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Perform */
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
										if($a_TargetMember['location']==$a_Member['location']){
											/* Apply Effect */
											$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
											$v_EffectName=$a_Member[$v_PerformanceName]['attacker']['effect-name'];
											$v_Killed=$this->f_ApplyEffect($v_DefendingTeamName,$v_TargetMemberID,$v_EffectName,$v_EffectDuration);
											if($v_Killed){
												$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
												$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
												$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_TargetMemberID);
											}else{
												/* (If Sneaking) Hide From Defender */
												if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_TargetMemberID)){
													/* (Attempt To Stay Hidden) */
													if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,'notice-attacker')){
														$v_RangeName=$this->f_GetRangeNameFromDistance($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID);
														$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted-total']++;
														$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
														$this->A_Log[]=array('color'=>$v_DefendingTeamName,'team'=>$v_DefendingTeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$a_TargetMember['name'].' notices '.$a_Member['name'].'.');
													}
												}
											}
										}
									}
								/* Friendly */
								}else{
									/* Perform */
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									foreach($this->A_Teams[$v_TeamName] as $v_TargetMemberID=>$a_TargetMember){
										if($a_TargetMember['location']==$a_Member['location']){
											/* Apply Effect */
											$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
											$v_EffectName=$a_Member[$v_PerformanceName]['attacker']['effect-name'];
											$v_Killed=$this->f_ApplyEffect($v_TeamName,$v_TargetMemberID,$v_EffectName,$v_EffectDuration);
											if($v_Killed){
												$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
												$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
												$this->f_RemoveMemberFromTeam($v_TeamName,$v_TargetMemberID);
											}
										}
									}
								}
							/* Free-Form */
							}else{
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Hit Mercenary */
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['attacker']['effect-name'];
									$v_Killed=$this->f_ApplyEffect($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
									}else{
										/* (If Sneaking) Hide From Defender */
										if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID)){
											/* (Attempt To Stay Hidden) */
											if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'notice-attacker')){
												$v_RangeName=$this->f_GetRangeNameFromDistance($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted-total']++;
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
												$this->A_Log[]=array('color'=>$v_DefendingTeamName,'team'=>$v_DefendingTeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.' notices '.$a_Member['name'].'.');
											}
										}
									}
								/* Friendly */
								}else{
									/* Hit Mercenary */
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['attacker']['effect-name'];
									$v_Killed=$this->f_ApplyEffect($v_TeamName,$v_MemberID,$v_EffectName,$v_EffectDuration);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveMemberFromTeam($v_TeamName,$v_MemberID);
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
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									/* Apply Effect */
									$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
									$v_EffectName=$a_Member[$v_PerformanceName]['attacker']['effect-name'];
									$v_Killed=$this->f_ApplyEffect($v_DefendingTeamName,$v_DefendingMemberID,$v_EffectName,$v_EffectDuration);
									if($v_Killed){
										$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
										$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
										$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
									}else{
										/* (If Sneaking) Hide From Defender */
										if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID)){
											/* (Attempt To Stay Hidden) */
											if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'notice-attacker')){
												$v_RangeName=$this->f_GetRangeNameFromDistance($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted-total']++;
												$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
												$this->A_Log[]=array('color'=>$v_DefendingTeamName,'team'=>$v_DefendingTeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.' notices '.$a_Member['name'].'.');
											}
										}
									}
								}else{
									/* Miss Mercenary */
									//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and misses '.$v_DefendingMemberLogName.'.');
								}
							/* Area Of Effect */
							}elseif($a_Member[$v_PerformanceName]['area']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Perform */
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
										if($a_TargetMember['location']==$a_Member['location']){
											/* Challenge Target */
											if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,$v_PerformanceName)){
												/* Apply Effect */
												$v_EffectDuration=$a_Member[$v_PerformanceName]['effect']['duration'];
												$v_EffectName=$a_Member[$v_PerformanceName]['attacker']['effect-name'];
												$v_Killed=$this->f_ApplyEffect($v_DefendingTeamName,$v_TargetMemberID,$v_EffectName,$v_EffectDuration);
												if($v_Killed){
													$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
													$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
													$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_TargetMemberID);
												}else{
													/* (If Sneaking) Hide From Defender */
													if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_TargetMemberID)){
														/* (Attempt To Stay Hidden) */
														if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,'notice-attacker')){
															$v_RangeName=$this->f_GetRangeNameFromDistance($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID);
															$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted-total']++;
															$this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
															$this->A_Log[]=array('color'=>$v_DefendingTeamName,'team'=>$v_DefendingTeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$a_TargetMember['name'].' notices '.$a_Member['name'].'.');
														}
													}
												}
											}else{
												$v_TargetMemberLogName=$a_TargetMember['name'];
												/* Miss Mercenary */
												//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and misses '.$v_TargetMemberLogName.'.');
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
						/* D e f l e c t i o n */
						}if($a_Member[$v_PerformanceName]['deflection']){
							/* Has Target */
							if($a_Member[$v_PerformanceName]['has-target']){
								/* Challenge Target */
								if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName)){
									$v_DamageType=$a_Member[$v_PerformanceName]['damage']['type'];
									if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['defense']['resistance'][$v_DamageType]['can-be-hit']){
										/* Hit Mercenary */
										$v_Killed=$this->f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName);
										if($v_Killed){
											$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
										}else{
											/* (If Sneaking) Hide From Defender */
											if($this->f_IsSneaking($v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID)){
												/* (Attempt To Stay Hidden) */
												if(!$this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,'notice-attacker')){
													$v_RangeName=$this->f_GetRangeNameFromDistance($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID);
													$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted-total']++;
													$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['spotted'][$v_RangeName][]=$v_MemberID;
													$this->A_Log[]=array('color'=>$v_DefendingTeamName,'team'=>$v_DefendingTeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.' notices '.$a_Member['name'].'.');
												}
											}
										}
									}else{
										/* Miss Mercenary */
										$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.' is impervious to '.$v_DamageType.' damage.');
									}
								}else{
									/* Miss Mercenary */
									//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and misses '.$v_DefendingMemberLogName.'.');
								}
							/* Area Of Effect */
							}elseif($a_Member[$v_PerformanceName]['area']){
								/* Hostile */
								if($a_Member[$v_PerformanceName]['hostile']){
									/* Perform */
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' '.$v_Text.'.');
									foreach($this->A_Teams[$v_DefendingTeamName] as $v_TargetMemberID=>$a_TargetMember){
										if($a_TargetMember['location']==$a_Member['location']){
											/* Challenge Target */
											if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,$v_PerformanceName)){
												$v_DamageType=$a_Member[$v_PerformanceName]['damage']['type'];
												if($this->A_Teams[$v_DefendingTeamName][$v_TargetMemberID]['defense']['resistance'][$v_DamageType]['can-be-hit']){
													/* Hit Mercenary */
													$v_Killed=$this->f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_TargetMemberID,$v_PerformanceName);
													if($v_Killed){$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_TargetMemberID);}
												}else{
													/* Miss Mercenary */
													//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$a_TargetMember['name'].' is impervious to '.$v_DamageType.' damage.');
												}
											}else{
												$v_TargetMemberLogName=$a_TargetMember['name'];
												/* Miss Mercenary */
												//$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' performs '.$v_ActionName.' and misses '.$v_DefendingMemberLogName.'.');
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
					case 'attack':
						if($a_Member[$v_PerformanceName]['re-use-timer']>0){break;}
						$v_ActionName=$a_Member['abilities'][$v_PerformanceName];
						$this->f_RemoveCostFromPool($v_TeamName,$v_MemberID,$a_Member[$v_PerformanceName]['pool'],$a_Member[$v_PerformanceName]['cost']);
						$this->f_SetTimer($v_TeamName,$v_MemberID,$v_PerformanceName);

						/* ******************* */

						if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['status']=='Unconscious'){
							$v_DamageType=$this->A_Teams[$v_TeamName][$v_MemberID][$v_PerformanceName]['damage']['type'];
							$this->f_AddStatistic($v_TeamName,$v_MemberID,'kills-by-character',$v_DamageType); /* Statistics */
							$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'red-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' attacks and kills '.$v_DefendingMemberLogName.'.');
							$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);
						}elseif($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName)){
							$v_DamageType=$a_Member[$v_PerformanceName]['damage']['type'];
							if($this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID]['defense']['resistance'][$v_DamageType]['can-be-hit']){
								/* Hit Mercenary */
								$v_Killed=$this->f_HitMercenary($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID,$v_PerformanceName);
								if($v_Killed){$this->f_RemoveMemberFromTeam($v_DefendingTeamName,$v_DefendingMemberID);}
							}else{
								/* Miss Mercenary */
								$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_DefendingMemberLogName.' is impervious to '.$v_DamageType.' damage.');
							}
						}else{
							$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' attacks and misses '.$v_DefendingMemberLogName.'.');
						}
						return;
						break;
					case '':default:
						break;
				}
			}
		}
	}

	/* Function - Remove Temporary Condition */
	function f_RemoveTemporaryCondition($v_TeamName,$v_MemberID,$v_ConditionID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.'] ['.$a_Member['location'].']';
		$v_MemberLogName=$a_Member['name'];
		$v_ConditionName=$a_Member['conditions'][$v_ConditionID]['name'];
		switch($v_ConditionName){
			/* Lure */
			case 'Lured':
				$this->A_Teams[$v_TeamName][$v_MemberID]['performance-preference']['move']-=50;
				break;

			/* Blunt */
			case 'Light Bruising':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;
				break;
			case 'Heavy Bruising':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=6;
				break;
			case 'Black And Blue Bruising':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=8;
				break;

			/* Piercing */
			case 'Shallow Puncture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;
				break;
			case 'Deep Puncture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=3;
				break;
			case 'Deadly Puncture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;
				break;

			/* Slashing */
			case 'Shallow Gash':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=4;
				break;
			case 'Deep Gash':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=6;
				break;
			case 'Deadly Gash':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['drain']-=8;
				break;

			/* Cold */
			case 'Slightly Frozen':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']++;
				break;
			case 'Seriously Frozen':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']+=2;
				break;
			case 'Chilled To The Bone':
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']+=3;
				break;

			/* Heat */
			case 'Slight Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=2;
				break;
			case 'Serious Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=3;
				break;
			case 'Third-Degree Burn':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=4;
				break;

			/* Shock */
			case 'Slight Shock':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=2;
				break;
			case 'Serious Shock':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=3;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=3;
				break;
			case 'Third-Degree Shock':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['drain']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=4;
				break;

			/* Blinding */
			case 'Blind':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=$this->A_Teams[$v_TeamName][$v_MemberID]['see']['can-see'];
				break;

			/* Disoriented */
			case 'Slight Daze':
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=4;
				break;
			case 'Serious Daze':
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=6;
				break;
			case 'Dazed':
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['drain']-=8;
				break;

			/* Knock-Down */
			case 'Knocked Out':case 'Dazzle':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-understand']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-understand'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=$this->A_Teams[$v_TeamName][$v_MemberID]['see']['can-see'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
			case 'Tripped':
			case 'Knocked Down':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-use']=$this->A_Teams[$v_TeamName][$v_MemberID]['use']['can-use'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
			case 'Knocked Off-Balance':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']+=2;
				break;

			case 'Increased Size':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Stealth']+=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Strength']-=2;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']<=0){
					$this->A_Log[]=array('color'=>'narrator','team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has '.$v_EffectName.'.');
					return true;
				}elseif($this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']>$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']){
					$this->A_Teams[$v_TeamName][$v_MemberID]['health']['current']=$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum'];
				}
				break;

			/* Poisoning */
			case 'Strong Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
			case 'Moderate Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
			case 'Retribution':
			case 'Weak Poisoning':
				$this->A_Teams[$v_TeamName][$v_MemberID]['health']['soft-maximum']++;
				break;

			/* Blindness */
			case 'Slight Blindness':
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Vision']++;
				break;

			case 'Defensive Posture':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['protection']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['initiative']--;
				break;
			case 'Unconscious':
				$this->A_Teams[$v_TeamName][$v_MemberID]['status']='Aware';
				break;
			case 'Exhausted':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']-=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Block']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Dodge']--;
				break;
			case 'Confounded':
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['regeneration']-=6;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Intellect']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Understanding']--;
				break;
			case 'Afraid':
				$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right']=!$this->A_Teams[$v_TeamName][$v_MemberID]['facing-right'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['retreating']=!$this->A_Teams[$v_TeamName][$v_MemberID]['retreating'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
				$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate'];
				break;

			/* Buffs */
			case 'Bandage':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']-=6;
				break;
			case 'Rejuvenate':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']-=4;
				$this->A_Teams[$v_TeamName][$v_MemberID]['focus']['regeneration']-=2;
				break;
			case 'Adrenaline Rush':
				$this->A_Teams[$v_TeamName][$v_MemberID]['energy']['regeneration']-=2;
				$this->A_Teams[$v_TeamName][$v_MemberID]['skills']['Accuracy']-=2;
				break;
			case 'Focused':
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['damage']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['effect']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['effect']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['critical']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['critical']['chances']--;
				break;
			case 'Stoneskin':
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Blunt']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Piercing']['chances']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['boost']--;
				$this->A_Teams[$v_TeamName][$v_MemberID]['defense']['resistance']['Slashing']['chances']--;
				break;

			case 'Heal':
				$this->A_Teams[$v_TeamName][$v_MemberID]['blood']['regeneration']-=2;
				break;
			case '':default:
				break;
		}
		unset($this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionID]);
		$this->A_Log[]=array(
			'color'=>$v_TeamName,
			'team'=>'narrator',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>$v_MemberLogName.' no longer has '.$v_ConditionName.'.'
		);
	}
	/* Function - Temporary Condition Check */
	function f_CheckTemporaryConditions($v_TeamName,$v_MemberID){
		if(!empty($this->A_Teams[$v_TeamName][$v_MemberID]['conditions'])){
			foreach($this->A_Teams[$v_TeamName][$v_MemberID]['conditions'] as $v_ConditionID=>$a_Condition){
				$this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionID]['duration']--;
				if($this->A_Teams[$v_TeamName][$v_MemberID]['conditions'][$v_ConditionID]['duration']==0){
					$this->f_RemoveTemporaryCondition($v_TeamName,$v_MemberID,$v_ConditionID);
				}
			}
		}
	}

	/* Function - Set Cans */
	function f_SetCans($v_TeamName,$v_MemberID){
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-action']=$this->A_Teams[$v_TeamName][$v_MemberID]['action']['can-action'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-attack']=$this->A_Teams[$v_TeamName][$v_MemberID]['attack']['can-attack'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-magic']=$this->A_Teams[$v_TeamName][$v_MemberID]['magic']['can-magic'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-understand']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-understand'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-detect']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-detect'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-communicate']=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['can-communicate'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-hide']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-hide'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-move']=$this->A_Teams[$v_TeamName][$v_MemberID]['move']['can-move'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-see']=$this->A_Teams[$v_TeamName][$v_MemberID]['see']['can-see'];
		$this->A_Teams[$v_TeamName][$v_MemberID]['can-use']=$this->A_Teams[$v_TeamName][$v_MemberID]['use']['can-use'];
	}

	/* Function - Get Range Name From Distance */
	function f_GetRangeNameFromDistance($v_TeamName,$v_MemberID,$v_DefendingTeamName,$v_DefendingMemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
		$v_MemberLocation=$a_Member['location'];
		$v_DefendingMemberLocation=$a_DefendingMember['location'];
		$v_Distance=abs($v_DefendingMemberLocation-$v_MemberLocation);
		switch($v_Distance){
			case 3:return 'distant';break;
			case 2:return 'long';break;
			case 1:return 'short';break;
			case 0:return 'close';break;
			default:return false;break;
		}
	}
	/* Function - Members Need More Points In Pool  */
	function f_MembersNeedMorePointsInPool($v_TeamName,$v_MemberID,$v_PoolName,$v_Minimum=1,$v_Amount=0){
		$v_Tile=$this->A_Teams[$v_TeamName][$v_MemberID]['location'];
		$v_Total=0;
		foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
			if($v_Tile==$a_Member['location']){
				if($a_Member[$v_PoolName]['current']<$a_Member[$v_PoolName]['soft-maximum']){
					if($v_Amount>0){
						$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
						$this->A_Teams[$v_TeamName][$v_MemberID][$v_PoolName]['current']+=$v_Amount;
						$this->A_Log[]=array(
							'color'=>$v_TeamName,
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
	function f_SortPreferences($v_TeamName){foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){arsort($this->A_Teams[$v_TeamName][$v_MemberID]['performance-preference']);}}

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




	
	
	function f_PromoteToRank($v_TeamName,$v_MemberID,$v_Rank){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		//$v_MemberLogName=$a_Member['name'].' ['.$v_MemberID.'] ['.$a_Member['location'].']';
		$v_MemberLogName=$a_Member['name'];

		/* Soldier - Centurion - Legionary - Veteran - Commander */
		switch($v_Rank){
			case 'Commander':
			case 'Veteran':
			case 'Legionary':
			case 'Centurion':
				$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has been promoted to '.$v_Rank.'.');
			case 'Soldier':
				$this->A_Teams[$v_TeamName][$v_MemberID]['rank']=$v_Rank;
				break;
			case '':default:
				break;
		}
	}

	
	/* Function - Add Member To Team */
	function f_AddMemberToTeam($v_TeamName,$a_Parameters){
		$v_MemberID=$a_Parameters[0];
		$v_Rank=$a_Parameters[1];
		$v_Tile=$a_Parameters[2];
		$v_NextKey=$this->A_TeamData[$v_TeamName]['next-key'];
		$this->A_TeamData[$v_TeamName]['next-key']++;
		$this->A_Teams[$v_TeamName][$v_NextKey]=$this->a_TestMemberData[$v_MemberID];
		$this->A_Statistics[$v_TeamName]['characters'][$v_NextKey]=$this->a_TestMemberData[$v_MemberID]['name']; /* Statistics */
		$this->A_Statistics[$v_TeamName]['damage-inflicted-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['kills-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['deaths-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['cost-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['health-loss-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['stamina-loss-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['mana-loss-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['blood-loss-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['energy-loss-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['focus-loss-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['unconscious-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['exhausted-by-character'][$v_NextKey]=0; /* Statistics */
		$this->A_Statistics[$v_TeamName]['confounded-by-character'][$v_NextKey]=0; /* Statistics */
		$v_MemberID=$v_NextKey;
		$this->A_Teams[$v_TeamName][$v_MemberID]['location']=$v_Tile;
		$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'purple-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>$this->A_Teams[$v_TeamName][$v_MemberID]['name'].' ['.$v_MemberID.'] has joined the '.$v_TeamName.' on tile '.$v_Tile.'.');
		$this->f_PromoteToRank($v_TeamName,$v_MemberID,$v_Rank);
		$this->f_ApplyConditionsToMember($v_TeamName,$v_MemberID);
		$this->f_SetCans($v_TeamName,$v_MemberID);
		$this->A_TeamData[$v_TeamName]['total-members-added']++;
		$this->f_CheckEmptyStatus($v_TeamName);
	}
	/* Function - Check Empty Status */
	function f_CheckEmptyStatus($v_TeamName){
		$this->A_TeamData[$v_TeamName]['is-empty']=empty($this->A_Teams[$v_TeamName]);
		/*
		$this->A_Log[]=array(
			'color'=>$v_TeamName,
			'team'=>'narrator',
			'turn'=>$this->A_TeamData['turn-counter'],
			'text'=>ucfirst($v_TeamName).' is'.(($this->A_TeamData[$v_TeamName]['is-empty'])?'':' not').' empty.'
		);
		*/
		if($this->A_TeamData['party']['is-empty']){$this->A_TeamData['quest-has-won']=true;}
	}
	/* Function - Remove Member From Team */
	function f_RemoveMemberFromTeam($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName=$a_Member['name'];
		$this->f_AddStatistic($v_TeamName,$v_MemberID,'deaths-by-character');
		$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has left the '.$v_TeamName.'.');
		unset($this->A_Teams[$v_TeamName][$v_MemberID]);
		$this->f_CheckEmptyStatus($v_TeamName);
		if($v_TeamName=='quest'){$this->A_Quest['opposing-members-left']--;}
	}


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

	function f_CheckGoal($v_TeamName){
		$v_Pass=false;
		switch($this->A_Party['goals'][$this->A_Party['current-goal']]){
			case 'no-opposing-members-left':
				if($this->A_Quest['opposing-members-left']<1){
					$v_Pass=true;
					$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator-bold','turn'=>$this->A_TeamData['turn-counter'],'text'=>'All opposing members have been defeated.');
				}
				break;
			case 'one-reached-end':
				foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
					//$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
					$v_MemberLogName=$a_Member['name'];
					if($a_Member['location']==$this->A_Quest['length-of-path']){
						$v_Pass=true;
						$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'purple','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has reached the end.');
					}
				}
				break;
			case 'one-reached-exit':
				foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
					//$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
					$v_MemberLogName=$a_Member['name'];
					if($a_Member['location']==1){
						$v_Pass=true;
						$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'purple','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' has reached the exit.');
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
							$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
							if($a_Member['location']==$a_Event['trigger']['value']){$v_PerformEvent=true;}
						}
						break;
					case 'retreating-one-at-location':
						foreach($this->A_Teams[$v_TeamName] as $v_MemberID=>$a_Member){
							$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
							if($a_Member['location']==$a_Event['trigger']['value']){
								if($this->A_Teams[$v_TeamName][$v_MemberID]['retreating']){
									$v_PerformEvent=true;
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' screams like a little girl when the dead fisherman comes to life.');
								}else{
									$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' notices a dead fisherman.');
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
							$this->f_AddMemberToTeam('quest',array($a_Event['event']['value'],'Soldier',1));
							break;
						case 'add-member-ambush':
							$this->f_AddMemberToTeam('quest',array($a_Event['event']['value'],'Soldier',$this->f_GetTileWithMemberNearEnd('party')));
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
		$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		$a_Weights=array();
		foreach($a_MembersInView as $v_Key=>$v_DefendingMemberID){
			$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
			$a_Weights[$v_DefendingMemberID]=10;
			switch($a_DefendingMember['stance']){
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
			case 'Beast':case 'Cleric':case 'Fighter':case 'Ranger':case 'Rogue':case 'Wizard':case 'Holy':case 'Undead':
				$this->A_Teams[$v_TeamName]=array();
				$this->f_LoadTeam($v_TeamName);
				break;
			case 'party':case 'quest':
				$this->A_Teams[$v_TeamName]=array();
				$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>ucfirst($v_TeamName).' constructed.');
				$this->f_LoadTeam($v_TeamName);
				$this->A_Log[]=array('color'=>$v_TeamName,'team'=>'narrator','turn'=>$this->A_TeamData['turn-counter'],'text'=>ucfirst($v_TeamName).' gathered.');
				$this->f_CheckEmptyStatus($v_TeamName);
				break;
			default:
				break;
		}
	}
	function f_LoadTeam($v_TeamName){
		switch($v_TeamName){
			case 'Beast':case 'Cleric':case 'Fighter':case 'Ranger':case 'Rogue':case 'Wizard':case 'Holy':case 'Undead':
				$this->A_TeamData[$v_TeamName]=array('captain-id'=>-1,'data'=>array(),'is-empty'=>true,'next-key'=>0,'total-members-added'=>0);
				$this->A_TeamData[$v_TeamName]['data']=array();
				foreach($this->A_TestMembers as $v_MemberID=>$a_Member){
					if($a_Member['guild']==$v_TeamName){$this->A_TeamData[$v_TeamName]['data'][]=array($v_MemberID,'Soldier',1);}
				}
				break;
			case 'party':
				if($this->A_Quest['ID']==101){
					$this->A_TeamData['party']['data']=array(0=>array(array_rand($this->A_TestMembers),'Commander',1));
				}elseif($this->A_Quest['ID']==105){
					$this->A_TeamData['party']['data']=array(
						0=>array(array_rand($this->A_TestMembers),'Commander',1),
						1=>array(array_rand($this->A_TestMembers),'Veteran',1),
						2=>array(array_rand($this->A_TestMembers),'Soldier',1),
						3=>array(array_rand($this->A_TestMembers),'Soldier',1),
						4=>array(array_rand($this->A_TestMembers),'Soldier',1),
						5=>array(array_rand($this->A_TestMembers),'Soldier',1)
					);
				}elseif($this->A_Quest['ID']==106){
					$this->A_TeamData['party']['data']=array(
						0=>array(array_rand($this->A_TestMembers),'Commander',1),
						1=>array(array_rand($this->A_TestMembers),'Veteran',1),
						2=>array(array_rand($this->A_TestMembers),'Soldier',1),
						3=>array(array_rand($this->A_TestMembers),'Soldier',1),
						4=>array(array_rand($this->A_TestMembers),'Soldier',1),
						5=>array(array_rand($this->A_TestMembers),'Soldier',1),
						6=>array(array_rand($this->A_TestMembers),'Soldier',1),
						7=>array(array_rand($this->A_TestMembers),'Soldier',1),
						8=>array(array_rand($this->A_TestMembers),'Soldier',1),
						9=>array(array_rand($this->A_TestMembers),'Soldier',1),
						10=>array(array_rand($this->A_TestMembers),'Soldier',1),
						11=>array(array_rand($this->A_TestMembers),'Soldier',1)
					);
				}else{
					$this->A_TeamData[$v_TeamName]['data']=array(
						/* TEAM */
						0=>array(1,'Commander',1),
						1=>array(33,'Veteran',1),
						2=>array(27,'Soldier',1),
						3=>array(13,'Soldier',1),
						4=>array(37,'Soldier',1)
					);
					foreach($this->A_Quest['starting-player-data'] as $v_Key=>$a_Member){
						$this->A_TeamData[$v_TeamName]['data'][]=$a_Member;
					}
				}
				break;
			case 'quest':
				if($this->A_Quest['ID']==100){
					$this->A_TeamData['quest']['data']=$this->A_TeamData['party']['data'];
				}elseif($this->A_Quest['ID']==101){
					$this->A_TeamData['quest']['data']=array(0=>array(array_rand($this->A_TestMembers),'Commander',5));
				}elseif($this->A_Quest['ID']==105){
					$this->A_TeamData['quest']['data']=array(
						0=>array(array_rand($this->A_TestMembers),'Commander',1),
						1=>array(array_rand($this->A_TestMembers),'Veteran',1),
						2=>array(array_rand($this->A_TestMembers),'Soldier',1),
						3=>array(array_rand($this->A_TestMembers),'Soldier',1),
						4=>array(array_rand($this->A_TestMembers),'Soldier',1),
						5=>array(array_rand($this->A_TestMembers),'Soldier',1)
					);
				}elseif($this->A_Quest['ID']==106){
					$this->A_TeamData['quest']['data']=array(
						0=>array(array_rand($this->A_TestMembers),'Commander',1),
						1=>array(array_rand($this->A_TestMembers),'Veteran',1),
						2=>array(array_rand($this->A_TestMembers),'Soldier',1),
						3=>array(array_rand($this->A_TestMembers),'Soldier',1),
						4=>array(array_rand($this->A_TestMembers),'Soldier',1),
						5=>array(array_rand($this->A_TestMembers),'Soldier',1),
						6=>array(array_rand($this->A_TestMembers),'Soldier',1),
						7=>array(array_rand($this->A_TestMembers),'Soldier',1),
						8=>array(array_rand($this->A_TestMembers),'Soldier',1),
						9=>array(array_rand($this->A_TestMembers),'Soldier',1),
						10=>array(array_rand($this->A_TestMembers),'Soldier',1),
						11=>array(array_rand($this->A_TestMembers),'Soldier',1)
					);
				}else{
					$this->A_TeamData['quest']['data']=$this->A_Quest['starting-data'];
				}
				break;
			default:
				return;
				break;
		}
		foreach($this->A_TeamData[$v_TeamName]['data'] as $v_Key=>$a_Parameters){$this->f_AddMemberToTeam($v_TeamName,$a_Parameters);}
	}
	function f_AddInformedMembers($v_TeamName,$v_MemberID,$v_FriendlyMemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		$v_MemberLogName='[tile:'.$a_Member['location'].'] [id:'.$v_MemberID.'] '.$a_Member['name'];
		$a_FriendlyMember=$this->A_Teams[$v_TeamName][$v_FriendlyMemberID];
		$v_FriendlyMemberLogName=$a_FriendlyMember['name'].' ['.$v_FriendlyMemberID.']';
		$v_DefendingTeamName=$this->f_Opposite($v_TeamName);
		foreach($a_Member['visible-members'] as $v_RangeName=>$a_MembersInView){
			if(!empty($a_MembersInView)){
				foreach($a_MembersInView as $v_Key=>$v_DefendingMemberID){
					if(!in_array($v_DefendingMemberID,$this->A_Teams[$v_TeamName][$v_FriendlyMemberID]['visible-members'][$v_RangeName])){
						$a_DefendingMember=$this->A_Teams[$v_DefendingTeamName][$v_DefendingMemberID];
						$v_DefendingMemberLogName=' [tile:'.$a_DefendingMember['location'].'] [id:'.$v_DefendingMemberID.'] '.$a_DefendingMember['name'];
						$this->A_Teams[$v_TeamName][$v_FriendlyMemberID]['visible-members'][$v_RangeName][]=$v_DefendingMemberID;
						$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$v_MemberLogName.' informs '.$v_FriendlyMemberLogName.' about '.$v_DefendingMemberLogName.'.');
					}
				}
			}
		}
	}
	function f_InformTeam($v_TeamName,$v_MemberID){
		$a_Member=$this->A_Teams[$v_TeamName][$v_MemberID];
		if($a_Member['visible-member-total']<=0){return;}
		$v_Language=$this->A_Teams[$v_TeamName][$v_MemberID]['communicate']['spoken-language'];
		foreach($this->A_Teams[$v_TeamName] as $v_FriendlyMemberID=>$a_FriendlyMember){
			if($v_MemberID!==$v_FriendlyMemberID){
				if($a_Member['location']==$a_FriendlyMember['location']){
					if($this->f_ChallengeTarget($v_TeamName,$v_MemberID,$v_TeamName,$a_FriendlyMember,'communicate')){
						if(in_array($v_Language,$a_FriendlyMember['communicate']['known-languages'])){
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
		$this->A_Log[]=array('color'=>$v_TeamName,'team'=>$v_TeamName,'turn'=>$this->A_TeamData['turn-counter'],'text'=>$this->A_Teams[$v_TeamName][$v_MemberID]['name'].' ['.$v_MemberID.'] has been promoted to captain.');
	}
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
		100=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>3,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
			),
			'ID'=>100,
			'name'=>'Broken Mirror',
			'description'=>'Test battle pitting party against themselves.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>5,
			'maximum-turns-fail-safe'=>120,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		101=>array(
			'minimum-team-size'=>1,
			'maximum-team-size'=>1,
			'maximum-team-size-with-others'=>1,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>1,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
			),
			'ID'=>101,
			'name'=>'Colosseum',
			'description'=>'Test battle pitting random mercenary vs. random mercenary.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>5,
			'maximum-turns-fail-safe'=>120,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		102=>array(
			'minimum-team-size'=>1,
			'maximum-team-size'=>1,
			'maximum-team-size-with-others'=>1,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>8,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
				/* QUEST */
				0=>array(7,'Soldier',12),
				1=>array(22,'Soldier',12),
				2=>array(7,'Soldier',8),
				3=>array(7,'Soldier',8),
				4=>array(22,'Soldier',8),
				5=>array(22,'Soldier',6),
				6=>array(22,'Soldier',6),
				7=>array(38,'Commander',6)
			),
			'ID'=>102,
			'name'=>'Undead Slayer',
			'description'=>'Test battle pitting your party vs. eight Undead.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>12,
			'maximum-turns-fail-safe'=>240,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		103=>array(
			'minimum-team-size'=>1,
			'maximum-team-size'=>1,
			'maximum-team-size-with-others'=>1,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>4,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
				/* QUEST */
				0=>array(8,'Commander',8),
				1=>array(8,'Soldier',8),
				2=>array(8,'Soldier',8),
				3=>array(8,'Soldier',8)
			),
			'ID'=>103,
			'name'=>'Against All Odds',
			'description'=>'Test battle pitting the party vs. four Mean Giants.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>12,
			'maximum-turns-fail-safe'=>240,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		104=>array(
			'minimum-team-size'=>1,
			'maximum-team-size'=>1,
			'maximum-team-size-with-others'=>1,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>7,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
				/* QUEST */
				0=>array(30,'Commander',12),
				1=>array(39,'Soldier',12),
				2=>array(31,'Soldier',12),
				3=>array(31,'Soldier',12)
			),
			'ID'=>104,
			'name'=>'A Bloody Battle',
			'description'=>'Test battle pitting the party vs. several orcs and half-orcs.',
			'image'=>0,
			'triggered-events'=>array(
				0=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>30,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>7),
					'triggered'=>false
				),
				1=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>31,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>7),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>39,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>7),
					'triggered'=>false
				),
			),
			'length-of-path'=>12,
			'maximum-turns-fail-safe'=>240,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		105=>array(
			'minimum-team-size'=>1,
			'maximum-team-size'=>1,
			'maximum-team-size-with-others'=>1,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>6,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
			),
			'ID'=>105,
			'name'=>'Colosseum II',
			'description'=>'Test battle pitting six random mercenaries vs. six random mercenaries.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>5,
			'maximum-turns-fail-safe'=>120,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		106=>array(
			'minimum-team-size'=>1,
			'maximum-team-size'=>1,
			'maximum-team-size-with-others'=>1,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>12,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
			),
			'ID'=>106,
			'name'=>'Colosseum III',
			'description'=>'Test battle pitting twelve random mercenaries vs. twelve random mercenaries.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>5,
			'maximum-turns-fail-safe'=>240,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		1=>array(
			'minimum-team-size'=>3,
			'maximum-team-size'=>3,
			'maximum-team-size-with-others'=>5,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>2,

			'starting-player-data'=>array(
			),
			'starting-data'=>array(
				/* QUEST */
				0=>array(14,'Soldier',2),
				1=>array(15,'Soldier',3)
			),
			'ID'=>1,
			'name'=>'Steps Into Darkness',
			'description'=>'Scout the first level of the dungeon.',
			'image'=>0,
			'triggered-events'=>array(),
			'length-of-path'=>5,
			'maximum-turns-fail-safe'=>90,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
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

			'starting-player-data'=>array(
				0=>array(0,'Soldier',1),
				1=>array(0,'Soldier',1)
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
					'trigger'=>array('name'=>'turns-have-passed','value'=>4),
					'triggered'=>false
				),
				1=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>16,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>4),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>16,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>4),
					'triggered'=>false
				)
			),
			'length-of-path'=>10,
			'maximum-turns-fail-safe'=>120,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
			'preset-finish'=>0
		),
		3=>array(
			'minimum-team-size'=>4,
			'maximum-team-size'=>4,
			'maximum-team-size-with-others'=>6,
			'goals'=>array(
				1=>'one-reached-end',
				2=>'no-opposing-members-left',
				3=>'one-reached-exit'
			),
			'opposing-members-left'=>7,

			'starting-player-data'=>array(
				0=>array(0,'Soldier',1),
				1=>array(0,'Soldier',1)
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
					'trigger'=>array('name'=>'one-at-location','value'=>6),
					'triggered'=>false
				),
				1=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>18,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>6),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>14,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>6),
					'triggered'=>false
				),
				3=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>18,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				),
				4=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>18,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				),
				5=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>19,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				),
				6=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>20,'optional'=>false),
					'trigger'=>array('name'=>'one-at-location','value'=>12),
					'triggered'=>false
				)
			),
			'length-of-path'=>12,
			'maximum-turns-fail-safe'=>120,
			'minutes-per-turn'=>5,
			'seconds-per-turn'=>0,
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

			'starting-player-data'=>array(),
			'starting-data'=>array(),
			'ID'=>12,
			'name'=>'Quest I - Part I',
			'description'=>'An unpleasant passing. You must kill 1 Drowned Fisherman to complete this quest.',
			'image'=>4,
			'triggered-events'=>array(
				0=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>7,'optional'=>true),
					'trigger'=>array('name'=>'retreating-one-at-location','value'=>5),
					'triggered'=>false
				)
			),
			'length-of-path'=>10,
			'maximum-turns-fail-safe'=>120,
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
					'trigger'=>array('name'=>'turns-have-passed','value'=>1),
					'triggered'=>false
				),
				2=>array(
					'event'=>array('name'=>'add-member','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>1),
					'triggered'=>false
				),
				3=>array(
					'event'=>array('name'=>'add-member','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>3),
					'triggered'=>false
				),
				4=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>6),
					'triggered'=>false
				),
				5=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>3,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>6),
					'triggered'=>false
				),
				6=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>6),
					'triggered'=>false
				),
				7=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>6),
					'triggered'=>false
				),
				8=>array(
					'event'=>array('name'=>'add-member-ambush','value'=>4,'optional'=>false),
					'trigger'=>array('name'=>'turns-have-passed','value'=>6),
					'triggered'=>false
				)
			),
			'length-of-path'=>10,
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

			'starting-player-data'=>array(),
			'starting-data'=>array(
				0=>array(8,'Soldier',4)
			),
			'ID'=>14,
			'name'=>'One Mean Giant',
			'description'=>'Please slay the fearsome giant. You must kill 1 Mean Giant to complete this quest.',
			'image'=>1,
			'triggered-events'=>array(),
			'length-of-path'=>4,
			'maximum-turns-fail-safe'=>120,
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
			'opposing-members-left'=>9,

			'starting-player-data'=>array(),
			'starting-data'=>array(
				0=>array(10,'Soldier',1),
				1=>array(10,'Soldier',1),
				2=>array(10,'Soldier',2),
				4=>array(10,'Soldier',3),
				5=>array(10,'Soldier',3),
				6=>array(10,'Soldier',4),
				8=>array(10,'Soldier',5),
				9=>array(10,'Soldier',5),
				10=>array(10,'Soldier',6)
			),
			'ID'=>15,
			'name'=>'Bats In The Belfry',
			'description'=>'Please clear out the bat infestation. You must kill 12 Black Bats to complete this quest.',
			'image'=>1,
			'triggered-events'=>array(),
			'length-of-path'=>5,
			'maximum-turns-fail-safe'=>120,
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
			'id'=>0,
			'name'=>'Human Swordsman',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'War Cry'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Fighter'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Battle Readiness','major'=>'Novice Gladiator','specialization'=>'Knight Champion'),
			'stance'=>'protect-group',
			//'items'=>array('left-hand'=>'Steel Longsword','right-hand'=>'Steel Shortsword','feet'=>'Steel Boots','hands'=>'Steel Gauntlets','head'=>'Steel Helm','legs'=>'Steel Greaves','torso'=>'Steel Platemail'),
			'items'=>array('left-hand'=>'Fine Steel Longsword','right-hand'=>'Fine Steel Shortsword','feet'=>'Knight Of Zeal Boots','hands'=>'Knight Of Zeal Gauntlets','head'=>'Knight Of Zeal Helm','legs'=>'Knight Of Zeal Greaves','torso'=>'Knight Of Zeal Platemail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		1=>array(
			'id'=>1,
			'name'=>'Human Cleric',
			'guild'=>'Cleric',
			'abilities'=>array('action'=>'Bandage Wound','magic'=>'Healing Circle'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Cleric'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Novice Dodger','major'=>'Adept Dodger','specialization'=>'Master Dodger'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Steel Mace','feet'=>'Steel Boots','hands'=>'Steel Gauntlets','head'=>'Steel Helm','legs'=>'Steel Greaves','right-hand'=>'Oak Buckler','torso'=>'Steel Platemail'),
			'performance-preference'=>array('action'=>5,'attack'=>15,'magic'=>20,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		2=>array(
			'id'=>2,
			'name'=>'Elven Archer',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Slicing Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Elf','guild'=>'Ranger'),
			'training'=>array('basic'=>'Novice Archer','minor'=>'Adept Archer','major'=>'Master Archer','specialization'=>'Archer Champion'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Oak Longbow','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Elvish')
		),
		3=>array(
			'id'=>3,
			'name'=>'Goblin Rock Flinger',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Fling Rocks'),
			'traits'=>array('gender'=>'Male','race'=>'Goblin','guild'=>'Ranger'),
			'training'=>array('basic'=>'Goblin Initiative','minor'=>'Novice Marksman'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Cotton Sling','hands'=>'Lizard-Skin Handwraps','legs'=>'Crude Loincloth','torso'=>'Crude Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Goblin')
		),
		4=>array(
			'id'=>4,
			'name'=>'Goblin Flailer',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Unexpected Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Goblin','guild'=>'Fighter'),
			'training'=>array('basic'=>'Goblin Initiative','minor'=>'Novice Gladiator'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Iron Flail','hands'=>'Lizard-Skin Handwraps','legs'=>'Crude Loincloth','right-hand'=>'Iron Spiked Shield','torso'=>'Crude Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Goblin')
		),
		5=>array(
			'id'=>5,
			'name'=>'Human Pyromancer',
			'guild'=>'Wizard',
			'abilities'=>array('magic'=>'Fire Bolt'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Wizard'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Novice Caster','major'=>'Adept Caster','specialization'=>'Master Caster'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Wand Of Fire Bolt','feet'=>'Cloth Sandals','hands'=>'Cloth Handwraps','head'=>'Cloth Hat','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>15,'attack'=>10,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Common')
		),
		6=>array(
			'id'=>6,
			'name'=>'Dwarven Axe Thrower',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Strong Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Dwarf','guild'=>'Ranger'),
			'training'=>array('basic'=>'Novice Tracker','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Steel Hand-Axe','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Leather Pants','right-hand'=>'Oak Buckler','torso'=>'Leather Tunic'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Dwarvish')
		),
		7=>array(
			'id'=>7,
			'name'=>'Drowned Fisherman',
			'guild'=>'Undead',
			'abilities'=>array('action'=>'Moan And Groan'),
			'traits'=>array('gender'=>'Male','race'=>'Zombie','guild'=>'Undead'),
			'training'=>array('basic'=>'Novice Blocker'),
			'items'=>array('left-hand'=>'Fishing Pole','legs'=>'Fishing Pants','torso'=>'Fishing Shirt'),
			'performance-preference'=>array('action'=>5,'attack'=>15,'magic'=>20,'move'=>0,'use'=>10)
		),
		8=>array(
			'id'=>8,
			'name'=>'Mean Giant',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Ground Pound'),
			'traits'=>array('gender'=>'Male','race'=>'Giant','guild'=>'Fighter'),
			'training'=>array('basic'=>'Giant Muscles','minor'=>'Novice Gladiator','major'=>'Adept Gladiator','specialization'=>'Master Gladiator'),
			'items'=>array('left-hand'=>'Stalagmite'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10)
		),
		9=>array(
			'id'=>9,
			'name'=>'Grey Wolf',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Fierce Growl'),
			'traits'=>array('gender'=>'Male','race'=>'Wolf','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Runner','minor'=>'Novice Battler'),
			'items'=>array('left-hand'=>'Fangs'),
			'stance'=>'protect-group',
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		10=>array(
			'id'=>10,
			'name'=>'Black Bat',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Bite'),
			'traits'=>array('gender'=>'Unknown','race'=>'Bat','guild'=>'Beast'),
			'items'=>array('left-hand'=>'Fangs'),
			'training'=>array('basic'=>'Novice Marksman'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		11=>array(
			'id'=>11,
			'name'=>'Black Bear',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Strong Strike'),
			'traits'=>array('gender'=>'Unknown','race'=>'Bear','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Strength'),
			'items'=>array('left-hand'=>'Sharp Claws','right-hand'=>'Sharp Claws'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		12=>array(
			'id'=>12,
			'name'=>'Human Villager',
			'guild'=>'Holy',
			'abilities'=>array('action'=>'Throw Dirt'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Holy'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Novice Battler','major'=>'Adept Battler','specialization'=>'Master Battler'),
			'items'=>array('left-hand'=>'Oak Torch','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Leather Pants','torso'=>'Leather Tunic'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		13=>array(
			'id'=>13,
			'name'=>'Human Assassin',
			'guild'=>'Rogue',
			'abilities'=>array('action'=>'Back-Stab'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Rogue'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'items'=>array('left-hand'=>'Steel Knife','feet'=>'Black Cloth Sandals','hands'=>'Black Cloth Handwraps','head'=>'Black Cloth Hat','legs'=>'Black Cloth Pantaloons','right-hand'=>'Steel Dagger','torso'=>'Black Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		14=>array(
			'id'=>14,
			'name'=>'Large Spider',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Bite'),
			'traits'=>array('gender'=>'Unknown','race'=>'Spider','guild'=>'Beast'),
			'items'=>array('left-hand'=>'Fangs'),
			'training'=>array('basic'=>'Novice Marksman'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Insect')
		),
		15=>array(
			'id'=>15,
			'name'=>'Large Rat',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Bite'),
			'traits'=>array('gender'=>'Unknown','race'=>'Rat','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Strength'),
			'items'=>array('left-hand'=>'Fangs'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Vermin')
		),
		16=>array(
			'id'=>16,
			'name'=>'Human Brigand',
			'guild'=>'Rogue',
			'abilities'=>array('action'=>'Throw Dirt'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Rogue'),
			'training'=>array('basic'=>'Novice Dodger','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Novice Gladiator'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Iron Knife','feet'=>'Cotton Shoes','hands'=>'Cotton Gloves','head'=>'Cotton Cloak','legs'=>'Cotton Pants','right-hand'=>'Iron Dagger','torso'=>'Cotton Tunic'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		17=>array(
			'id'=>17,
			'name'=>'Human Thief',
			'guild'=>'Rogue',
			'abilities'=>array('action'=>'Throw Dirt'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Rogue'),
			'training'=>array('basic'=>'Novice Tracker','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Steel Knife','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Leather Pants','right-hand'=>'Steel Dagger','torso'=>'Leather Tunic'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		18=>array(
			'id'=>18,
			'name'=>'Giant Spider',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Bite'),
			'traits'=>array('gender'=>'Unknown','race'=>'Spider','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Novice Performer'),
			'stance'=>'',
			'items'=>array('left-hand'=>'Sharp Fangs'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Insect')
		),
		19=>array(
			'id'=>19,
			'name'=>'Giant Rat',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Bite'),
			'traits'=>array('gender'=>'Unknown','race'=>'Rat','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Novice Survivor'),
			'stance'=>'',
			'items'=>array('left-hand'=>'Sharp Fangs'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Vermin')
		),
		20=>array(
			'id'=>20,
			'name'=>'Giant Spider Queen',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Spit Poison'),
			'traits'=>array('gender'=>'Female','race'=>'Spider','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'items'=>array('left-hand'=>'Poisonous Fangs'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Insect')
		),
		21=>array(
			'id'=>21,
			'name'=>'Elven Pikeman',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Quick Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Elf','guild'=>'Fighter'),
			'training'=>array('basic'=>'Elven Intellect','minor'=>'Battle Readiness','major'=>'Novice Blocker','specialization'=>'Adept Blocker'),
			'items'=>array('left-hand'=>'Steel Lance','feet'=>'Steel Greaves','hands'=>'Steel Glovelettes','head'=>'Steel Mantle','legs'=>'Steel Leggings','right-hand'=>'','torso'=>'Steel Platemail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Elvish')
		),
		22=>array(
			'id'=>22,
			'name'=>'Skeleton Slasher',
			'guild'=>'Undead',
			'abilities'=>array('action'=>'Unexpected Strike'),
			'traits'=>array('gender'=>'Unknown','race'=>'Skeleton','guild'=>'Undead'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Novice Performer','major'=>'Adept Performer'),
			'items'=>array('left-hand'=>'Iron Longsword','feet'=>'Iron Waders','hands'=>'Iron Glovelettes','head'=>'Iron Mantle','legs'=>'Iron Leggings','right-hand'=>'Iron Shield','torso'=>'Iron Chainmail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Undead')
		),
		23=>array(
			'id'=>23,
			'name'=>'Lich King',
			'guild'=>'Undead',
			'abilities'=>array('action'=>'Stench Of Death','magic'=>'Aura Of Decay'),
			'traits'=>array('gender'=>'Male','race'=>'Lich','guild'=>'Undead'),
			'training'=>array('basic'=>'Novice Wisdom','minor'=>'Adept Wisdom','major'=>'Master Wisdom','specialization'=>'Novice Dodger'),
			'items'=>array('left-hand'=>'Staff Of Voices','feet'=>'Rune-Covered Sandals','hands'=>'Rune-Covered Handwraps','head'=>'Rune-Lined Hat','legs'=>'Rune-Lined Pantaloons','torso'=>'Rune-Lined Robe'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Undead')
		),
		/*
		24=>array(
			'id'=>24,
			'name'=>'Small Cedar Cart',
			'guild'=>'Fighter',
			'traits'=>array('gender'=>'None','race'=>'Construct','guild'=>'Market'),
			'performance-preference'=>array('action'=>0,'attack'=>10,'magic'=>5,'move'=>20,'use'=>15),
			'language'=>array('Common')
		),
		*/
		25=>array(
			'id'=>25,
			'name'=>'Grey Wolf Matriarch',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Pounce'),
			'traits'=>array('gender'=>'Female','race'=>'Wolf','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Runner','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Packmaster'),
			'items'=>array('left-hand'=>'Sharp Fangs'),
			'stance'=>'protect-group',
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		26=>array(
			'id'=>26,
			'name'=>'Dwarven Friar',
			'guild'=>'Rogue',
			'abilities'=>array('action'=>'Trip'),
			'traits'=>array('gender'=>'Male','race'=>'Dwarf','guild'=>'Rogue'),
			'training'=>array('basic'=>'Dwarven Strength','minor'=>'Novice Strength','major'=>'Adept Strength','specialization'=>'Master Strength'),
			'items'=>array('left-hand'=>'Oak Half-Staff','feet'=>'Heavy Cloth Sandals','hands'=>'Heavy Cloth Handwraps','head'=>'Heavy Cloth Hat','legs'=>'Heavy Cloth Pantaloons','right-hand'=>'Oak Half-Staff','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Dwarvish')
		),
		27=>array(
			'id'=>27,
			'name'=>'Human Guardian',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Rejuvenate'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Fighter'),
			'training'=>array('basic'=>'Battle Readiness','minor'=>'Novice Defender','major'=>'Adept Defender','specialization'=>'Master Defender'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Steel Longsword','right-hand'=>'Steel Tower Shield','feet'=>'Steel Boots','hands'=>'Steel Gauntlets','head'=>'Steel Helm','legs'=>'Steel Greaves','torso'=>'Steel Platemail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		28=>array(
			'id'=>28,
			'name'=>'Human Beastmaster',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Sonic Snap'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Ranger'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Novice Marksman','major'=>'Adept Marksman','specialization'=>'Master Marksman'),
			'stance'=>'',
			'items'=>array('left-hand'=>'Leather Whip','right-hand'=>'Oak Buckler','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Leather Pants','torso'=>'Leather Tunic'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		29=>array(
			'id'=>29,
			'name'=>'Elven Ninja',
			'guild'=>'Rogue',
			'abilities'=>array('action'=>'Precise Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Elf','guild'=>'Rogue'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Novice Battler','major'=>'Adept Battler','specialization'=>'Master Battler'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Oak Nunchuck','feet'=>'Black Cloth Sandals','hands'=>'Black Cloth Handwraps','head'=>'Black Cloth Hat','legs'=>'Black Cloth Pantaloons','torso'=>'Black Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Elvish')
		),
		30=>array(
			'id'=>30,
			'name'=>'Orcish Slayer',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Taunt'),
			'traits'=>array('gender'=>'Male','race'=>'Orc','guild'=>'Fighter'),
			'training'=>array('basic'=>'Novice Gladiator','minor'=>'Adept Gladiator','major'=>'Master Gladiator'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Iron Longsword','feet'=>'Iron Spiked Boots','hands'=>'Iron Spiked Gauntlets','head'=>'Iron Spiked Helm','legs'=>'Iron Greaves','right-hand'=>'Iron Spiked Shield','torso'=>'Iron Platemail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Orcish')
		),
		31=>array(
			'id'=>31,
			'name'=>'Half-Orcish Spearman',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Quick Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Half-Orc','guild'=>'Ranger'),
			'training'=>array('basic'=>'Novice Strength','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Oak Spear','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Orcish')
		),
		32=>array(
			'id'=>32,
			'name'=>'Grey Wolf Patriarch',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Howl'),
			'traits'=>array('gender'=>'Male','race'=>'Wolf','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Battler','minor'=>'Adept Battler','major'=>'Master Battler','specialization'=>'Packmaster'),
			'items'=>array('left-hand'=>'Very Sharp Fangs'),
			'stance'=>'protect-group',
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		33=>array(
			'id'=>33,
			'name'=>'Elven Bard',
			'guild'=>'Cleric',
			'abilities'=>array('action'=>'Song Of The Ages'),
			'traits'=>array('gender'=>'Male','race'=>'Elf','guild'=>'Cleric'),
			'training'=>array('basic'=>'Fearless','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'items'=>array('left-hand'=>'Oak Shortbow','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'stance'=>'protect-group',
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Elvish')
		),
		34=>array(
			'id'=>34,
			'name'=>'Falcon Hunter',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Talon Swipe'),
			'traits'=>array('gender'=>'Female','race'=>'Falcon','guild'=>'Beast'),
			'items'=>array('left-hand'=>'Sharp Claws'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Adept Marksman','major'=>'Novice Gladiator'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		35=>array(
			'id'=>35,
			'name'=>'Wisp Dancer',
			'guild'=>'Wizard',
			'abilities'=>array('action'=>'Lure'),
			'traits'=>array('gender'=>'Female','race'=>'Wisp','guild'=>'Wizard'),
			'items'=>array('left-hand'=>'Electrical Jolt'),
			'training'=>array('basic'=>'Novice Tracker','minor'=>'Novice Dodging','major'=>'Novice Blocker','specialization'=>'Adept Blocker'),
			'performance-preference'=>array('action'=>15,'attack'=>10,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Wisp')
		),
		36=>array(
			'id'=>36,
			'name'=>'Crimson Wyvern',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Flamebreath'),
			'traits'=>array('gender'=>'Female','race'=>'Wyvern','guild'=>'Beast'),
			'items'=>array('left-hand'=>'Razor Claws'),
			'training'=>array('basic'=>'Novice Marksman','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		37=>array(
			'id'=>37,
			'name'=>'Dwarven Witch Hunter',
			'guild'=>'Holy',
			'abilities'=>array('action'=>'Precise Shot','magic'=>'Word Of Retribution'),
			'traits'=>array('gender'=>'Male','race'=>'Dwarf','guild'=>'Holy'),
			'items'=>array('left-hand'=>'Temple Crossbow','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'training'=>array('basic'=>'Novice Tracker','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'performance-preference'=>array('action'=>10,'attack'=>15,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Dwarvish')
		),
		38=>array(
			'id'=>38,
			'name'=>'Longtooth Vampire',
			'guild'=>'Undead',
			'abilities'=>array('action'=>'Vampiric Bite'),
			'traits'=>array('gender'=>'Male','race'=>'Vampire','guild'=>'Undead'),
			'items'=>array('left-hand'=>'Steel Rapier','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Heavy Cloth Pantaloons','right-hand'=>'Oak Buckler','torso'=>'Heavy Cloth Shirt'),
			'training'=>array('basic'=>'Novice Runner','minor'=>'Novice Strength','major'=>'Adept Strength','specialization'=>'Master Strength'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common','Undead')
		),
		39=>array(
			'id'=>39,
			'name'=>'Orcish Ravager',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Trip'),
			'traits'=>array('gender'=>'Male','race'=>'Orc','guild'=>'Fighter'),
			'training'=>array('basic'=>'Novice Strength','minor'=>'Adept Strength','major'=>'Battle Readiness'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Iron Mace','feet'=>'Iron Spiked Boots','hands'=>'Iron Spiked Gauntlets','head'=>'Iron Spiked Helm','legs'=>'Iron Greaves','right-hand'=>'Iron Mace','torso'=>'Iron Platemail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Orcish')
		),
		40=>array(
			'id'=>40,
			'name'=>'Barbarian Berserker',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Cleave'),
			'traits'=>array('gender'=>'Male','race'=>'Barbarian','guild'=>'Fighter'),
			'training'=>array('basic'=>'Barbaric Muscles','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Fine Steel Battle Axe','feet'=>'Heavy Cloth Sandals','hands'=>'','head'=>'','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		41=>array(
			'id'=>41,
			'name'=>'Halfling Warrior',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Precise Strike'),
			'traits'=>array('gender'=>'Male','race'=>'Halfling','guild'=>'Fighter'),
			'training'=>array('basic'=>'Halfling Tumbling','minor'=>'Novice Battler','major'=>'Adept Battler','specialization'=>'Master Battler'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Steel Knife','feet'=>'Fine Steel Waders','hands'=>'Fine Steel Glovelettes','head'=>'Fine Steel Mantle','legs'=>'Fine Steel Leggings','right-hand'=>'Fine Steel Shield','torso'=>'Fine Steel Chainmail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		42=>array(
			'id'=>42,
			'name'=>'Elven Sorcerer',
			'guild'=>'Wizard',
			'abilities'=>array('magic'=>'Heightened Focus'),
			'traits'=>array('gender'=>'Male','race'=>'Elf','guild'=>'Wizard'),
			'training'=>array('basic'=>'Elven Intellect','minor'=>'Novice Battler','major'=>'Adept Battler','specialization'=>'Master Battler'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Wand Of Magic Missile','feet'=>'Cloth Sandals','hands'=>'Cloth Handwraps','head'=>'Cloth Hat','legs'=>'Heavy Cloth Pantaloons','right-hand'=>'Oak Buckler','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>15,'attack'=>10,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Common','Elvish')
		),
		43=>array(
			'id'=>43,
			'name'=>'Skeleton Penetrator',
			'guild'=>'Wizard',
			'abilities'=>array('magic'=>'Magic Missile'),
			'traits'=>array('gender'=>'Male','race'=>'Skeleton','guild'=>'Wizard'),
			'training'=>array('basic'=>'Novice Wisdom','minor'=>'Adept Wisdom','major'=>'Novice Caster','specialization'=>'Adept Caster'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Cedar Half-Staff','feet'=>'','hands'=>'','head'=>'Cloth Hat','legs'=>'','right-hand'=>'Oak Buckler','torso'=>''),
			'performance-preference'=>array('action'=>15,'attack'=>10,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Common','Elvish')
		),
		44=>array(
			'id'=>44,
			'name'=>'Gnome Infiltrator',
			'guild'=>'Rogue',
			'abilities'=>array('action'=>'Precise Shot'),
			'traits'=>array('gender'=>'Male','race'=>'Gnome','guild'=>'Rogue'),
			'training'=>array('basic'=>'Gnome Stealth','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Steel Shuriken','feet'=>'Black Cloth Sandals','hands'=>'','head'=>'','legs'=>'Black Cloth Pantaloons','torso'=>'Black Cloth Shirt'),
			'performance-preference'=>array('action'=>5,'attack'=>15,'magic'=>20,'move'=>0,'use'=>10),
			'language'=>array('Common','Gnomish')
		),
		45=>array(
			'id'=>45,
			'name'=>'Orcish Bowman',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Strong Shot'),
			'traits'=>array('gender'=>'Male','race'=>'Orc','guild'=>'Ranger'),
			'training'=>array('basic'=>'Novice Performer','minor'=>'Adept Performer','major'=>'Master Performer'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Oak Shortbow','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Orcish')
		),
		46=>array(
			'id'=>46,
			'name'=>'Pixie Duster',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Throw Dirt','magic'=>'Magic Missile'),
			'traits'=>array('gender'=>'Male','race'=>'Pixie','guild'=>'Ranger'),
			'training'=>array('basic'=>'Pixie Agility','minor'=>'Novice Defender','major'=>'Adept Defender','specialization'=>'Master Defender'),
			'stance'=>'',
			'items'=>array('left-hand'=>'Oak Half-Staff','feet'=>'Cloth Sandals','hands'=>'Cloth Handwraps','head'=>'Cloth Hat','legs'=>'Cloth Pantaloons','right-hand'=>'Oak Buckler','torso'=>'Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Pixish')
		),
		47=>array(
			'id'=>47,
			'name'=>'Haunting Ghost',
			'guild'=>'Undead',
			'abilities'=>array('action'=>'Ghostly Wail'),
			'traits'=>array('gender'=>'Female','race'=>'Ghost','guild'=>'Undead'),
			'training'=>array('basic'=>'Novice Wisdom','minor'=>'Novice Caster','major'=>'Adept Caster','specialization'=>'Master Caster'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Cold Ghostly Strands','feet'=>'','hands'=>'','head'=>'','legs'=>'','right-hand'=>'','torso'=>''),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Undead')
		),
		48=>array(
			'id'=>48,
			'name'=>'Vampire Bat',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Vampiric Bite'),
			'traits'=>array('gender'=>'Female','race'=>'Bat','guild'=>'Beast'),
			'items'=>array('left-hand'=>'Very Sharp Fangs'),
			'training'=>array('basic'=>'Novice Strength'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		49=>array(
			'id'=>49,
			'name'=>'Hell Hound Scorcher',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Flamebreath'),
			'traits'=>array('gender'=>'Male','race'=>'Hell Hound','guild'=>'Beast'),
			'training'=>array('basic'=>'Novice Strength','minor'=>'Adept Strength','major'=>'Master Strength','specialization'=>'Ferocity Of The Hound'),
			'items'=>array('left-hand'=>'Deadly Fangs'),
			'stance'=>'protect-group',
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Animal')
		),
		50=>array(
			'id'=>50,
			'name'=>'Ancient Red Dragon',
			'guild'=>'Beast',
			'abilities'=>array('action'=>'Incinerate'),
			'traits'=>array('gender'=>'Male','race'=>'Dragon','guild'=>'Beast'),
			'training'=>array('basic'=>'Dragon Power','minor'=>'Ancient Zeal Order','major'=>'Strong Heat Resistance','specialization'=>'Dragon Claws'),
			'items'=>array('left-hand'=>'Deadly Claws'),
			'stance'=>'',
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Dragon','Ancient')
		),
		51=>array(
			'id'=>51,
			'name'=>'Goliath Warrior',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Ground Pound'),
			'traits'=>array('gender'=>'Male','race'=>'Goliath','guild'=>'Fighter'),
			'training'=>array('basic'=>'Giant Muscles','minor'=>'Ancient Zeal Order','major'=>'Gladiator Champion','specialization'=>'Goliath View'),
			'items'=>array('left-hand'=>'Boulder'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Dragon','Ancient')
		),
		52=>array(
			'id'=>52,
			'name'=>'Twisted Shapeshifter',
			'guild'=>'Wizard',
			'abilities'=>array('action'=>'Precise Strike','magic'=>'Giant Growth'),
			'traits'=>array('gender'=>'Female','race'=>'Shapeshifter','guild'=>'Wizard'),
			'training'=>array('basic'=>'Shapeshifter Adaptability','minor'=>'Ancient Zeal Order','major'=>'Novice Performer','specialization'=>'Adept Performer'),
			'items'=>array('left-hand'=>'Poison-Tipped Dagger'),
			'performance-preference'=>array('action'=>15,'attack'=>10,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Common','Ancient')
		),
		53=>array(
			'id'=>53,
			'name'=>'Ogre Brawler',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Taunt'),
			'traits'=>array('gender'=>'Male','race'=>'Ogre','guild'=>'Fighter'),
			'training'=>array('basic'=>'Novice Gladiator','minor'=>'Adept Gladiator','major'=>'Ogre Tactics'),
			'stance'=>'protect-group',
			'items'=>array('feet'=>'Iron Waders','hands'=>'Iron Glovelettes','head'=>'Iron Mantle','legs'=>'Leather Pants','torso'=>'Iron Ringmail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Ogre')
		),
		54=>array(
			'id'=>54,
			'name'=>'Half-Ogre Shaman',
			'guild'=>'Cleric',
			'abilities'=>array('action'=>'Bandage Wound','magic'=>'Giant Growth'),
			'traits'=>array('gender'=>'Male','race'=>'Half-Ogre','guild'=>'Cleric'),
			'training'=>array('basic'=>'Novice Gladiator','minor'=>'Adept Gladiator','major'=>'Master Gladiator','specialization'=>'Ogre Tactics'),
			'stance'=>'',
			'items'=>array('feet'=>'Iron Waders','hands'=>'Iron Glovelettes','head'=>'Iron Mantle','legs'=>'Iron Leggings','torso'=>'Iron Ringmail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Ogre')
		),
		55=>array(
			'id'=>55,
			'name'=>'Human Paladin',
			'guild'=>'Holy',
			'abilities'=>array('action'=>'Release Soul','magic'=>'Heightened Focus'),
			'traits'=>array('gender'=>'Male','race'=>'Human','guild'=>'Holy'),
			'items'=>array('left-hand'=>'Fine Steel Longsword','right-hand'=>'Fine Steel Shield','feet'=>'Knight Of Zeal Boots','hands'=>'Knight Of Zeal Gauntlets','head'=>'Knight Of Zeal Helm','legs'=>'Knight Of Zeal Greaves','torso'=>'Knight Of Zeal Platemail'),
			'training'=>array('basic'=>'Fearless','minor'=>'Novice Gladiator','major'=>'Adept Gladiator','specialization'=>'Master Gladiator'),
			'performance-preference'=>array('action'=>10,'attack'=>15,'magic'=>20,'move'=>0,'use'=>5),
			'language'=>array('Common')
		),
		56=>array(
			'id'=>56,
			'name'=>'Halfling Knight',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Taunt'),
			'traits'=>array('gender'=>'Male','race'=>'Halfling','guild'=>'Fighter'),
			'training'=>array('basic'=>'Novice Knight','minor'=>'Adept Knight','major'=>'Master Knight','specialization'=>'Knight Champion'),
			'stance'=>'protect-group',
			//'items'=>array('left-hand'=>'Steel Longsword','right-hand'=>'Steel Shortsword','feet'=>'Steel Boots','hands'=>'Steel Gauntlets','head'=>'Steel Helm','legs'=>'Steel Greaves','torso'=>'Steel Platemail'),
			'items'=>array('left-hand'=>'Temple Longsword','right-hand'=>'Knight Of Zeal Shield','feet'=>'Knight Of Zeal Boots','hands'=>'Knight Of Zeal Gauntlets','head'=>'Knight Of Zeal Helm','legs'=>'Knight Of Zeal Greaves','torso'=>'Knight Of Zeal Platemail'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>5,'move'=>0,'use'=>10),
			'language'=>array('Common')
		),
		57=>array(
			'id'=>57,
			'name'=>'Gnome Alchemist',
			'guild'=>'Wizard',
			'abilities'=>array('action'=>'Throw Poison Flask'),
			'traits'=>array('gender'=>'Male','race'=>'Gnome','guild'=>'Wizard'),
			'training'=>array('basic'=>'Gnome Stealth','minor'=>'Novice Performer','major'=>'Adept Performer','specialization'=>'Master Performer'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Oak Staff','feet'=>'Cloth Sandals','hands'=>'Cloth Handwraps','head'=>'Cloth Hat','legs'=>'Heavy Cloth Pantaloons','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>10,'magic'=>15,'move'=>0,'use'=>5),
			'language'=>array('Common','Gnomish')
		),
		58=>array(
			'id'=>58,
			'name'=>'Barbarian Amazon',
			'guild'=>'Ranger',
			'abilities'=>array('action'=>'Javelin Toss'),
			'traits'=>array('gender'=>'Female','race'=>'Barbarian','guild'=>'Ranger'),
			'training'=>array('basic'=>'Barbaric Pain','minor'=>'Novice Marksman','major'=>'Adept Marksman','specialization'=>'Master Marksman'),
			'stance'=>'stay-back',
			'items'=>array('left-hand'=>'Oak Spear','feet'=>'Leather Shoes','hands'=>'Leather Gloves','head'=>'Leather Cloak','legs'=>'Leather Pants','torso'=>'Leather Tunic'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>10,'move'=>0,'use'=>5),
			'language'=>array('Common')
		),
		59=>array(
			'id'=>59,
			'name'=>'Human Swashbuckler',
			'guild'=>'Fighter',
			'abilities'=>array('action'=>'Defensive Boasting'),
			'traits'=>array('gender'=>'Female','race'=>'Human','guild'=>'Fighter'),
			'training'=>array('basic'=>'Human Accuracy','minor'=>'Novice Defender','major'=>'Adept Defender','specialization'=>'Master Defender'),
			'stance'=>'protect-group',
			'items'=>array('left-hand'=>'Steel Rapier','feet'=>'Cloth Sandals','hands'=>'Cloth Handwraps','head'=>'Cloth Hat','legs'=>'Heavy Cloth Pantaloons','right'=>'Oak Buckler','torso'=>'Heavy Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>10,'move'=>0,'use'=>5),
			'language'=>array('Common')
		),
		60=>array(
			'id'=>59,
			'name'=>'Elven Archmage',
			'guild'=>'Wizard',
			'abilities'=>array('action'=>'Magical Javelin Toss','magic'=>'Thunderous Blast'),
			'traits'=>array('gender'=>'Female','race'=>'Elf','guild'=>'Wizard'),
			'training'=>array('basic'=>'Elven Intellect','minor'=>'Novice Wisdom','major'=>'Adept Wisdom','specialization'=>'Master Wisdom'),
			'stance'=>'',
			'items'=>array('left-hand'=>'Oak Staff','feet'=>'Cloth Sandals','hands'=>'Cloth Handwraps','head'=>'Cloth Hat','legs'=>'Cloth Pantaloons','torso'=>'Cloth Shirt'),
			'performance-preference'=>array('action'=>20,'attack'=>15,'magic'=>10,'move'=>0,'use'=>5),
			'language'=>array('Common','Elvish')
		)

	);

	function Online(){}
}
?>