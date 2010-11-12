<?
function F_ConstructCharacterList(){
	$a_CharacterList=array();
	return $a_CharacterList;

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

function F_ConstructColosseumTeamData($v_TeamName,$v_LengthOfPath,$v_MemberLimit=1){
	$a_TeamData=array();
	$a_NoColosseumList=array(23,35,50,51,52);
	for($v_Counter=0;$v_Counter<=$v_MemberLimit;$v_Counter++){
		for($v_FailSafe=0;$v_FailSafe<=10;$v_FailSafe++){
			$v_RandomMemberID=array_rand($A_CharacterList);
			if(!in_array($v_RandomMemberID,$a_NoColosseumList)){break;}
		}
		$a_TeamData[$v_Counter]=array($v_RandomMemberID,(($v_Counter>0)?'Veteran':'Commander'),(($v_TeamName=='party')?1:$v_LengthOfPath));
	}
}

function F_LoadTeams($v_QuestID,$v_LengthOfPath=1){
	print_r($A_CharacterList[0]);die();
	F_ConstructCharacterList();
	switch($v_QuestID){
		case 105:
			F_ConstructColosseumTeamData('party',$v_LengthOfPath,1);
			//F_ConstructColosseumTeamData('quest',$v_LengthOfPath,1);
			break;
		case '':default:
			break;
	}
}

function F_ApplyEffectToCharacter($v_TeamName,$v_MemberID){
	//$S_Online->f_IncreaseSkill($v_TeamName,$v_MemberID,'Accuracy');
	//$S_Online->f_IncreaseBoost($v_TeamName,$v_MemberID,'action','effect');
	//$S_Online->f_IncreaseChance($v_TeamName,$v_MemberID,'action','effect');
}
?>