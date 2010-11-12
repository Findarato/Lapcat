<?
//
// Function - Achievements
function F_Achievements($v_UserID=0,$v_AchievementID=0){
	$v_DC=db::getInstance();
	$v_Pass=false;
	switch($v_AchievementID){
		case 0:default:
			return false;
			break;
		case 1:case 2:case 3:case 4:
			$v_DC->Query('SELECT COUNT(id) FROM tickets.tickets WHERE created_by_id='.$v_UserID.';');
			$v_Result=$v_DC->Fetch('row');
			$a_Check=array(1=>1,2=>10,3=>25,4=>100);
			$a_Body=array(
				1=>'You have created your first ticket!',
				2=>'You have created ten tickets!',
				3=>'You have created twenty-five tickets!',
				4=>'You have created one-hundred tickets!'
			);
			if($v_Result>=$a_Check[$v_AchievementID]){
				$v_Body=$a_Body[$v_AchievementID];
				$v_Pass=true;
			}
			break;
		case 5:
			break;
	}
	return (($v_Pass)?$v_Body:false);
}
?>