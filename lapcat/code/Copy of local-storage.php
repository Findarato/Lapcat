<?
class Storage{
	// Function - Request
	function f_Request($v_ID,$v_Stamp){
		$a_Data=array(
			'error'=>'',
			'query'=>'',
			'records'=>array(),
			'stamp'=>time(),
			'total-records'=>0
		);
		$v_DC=db::getInstance();
		switch($v_ID){
			case 1:$a_Data['query']='SELECT oc.id, (SELECT COUNT(*) FROM hex_markers AS hm WHERE hm.calendar_id=oc.id) AS counted, oc.name AS title, oc.o_date, oc.o_place, oc.o_endtime, oc.o_starttime, oc.o_text, oc.type, oc.pPlus, oc.tournament, oc.summer FROM obj_calendar AS oc WHERE oc.o_date>=NOW();';break;
			case 2:case 3:case 4:case 5:case 6:case 7:case 8:
				$a_Data['query']='SELECT oc.id, (SELECT COUNT(*) FROM hex_markers AS hm WHERE hm.calendar_id=oc.id) AS counted, oc.name AS title, oc.o_date, oc.o_place, oc.o_endtime, oc.o_starttime, oc.o_text, oc.type, oc.pPlus, oc.tournament, oc.summer FROM obj_calendar AS oc WHERE oc.o_date>=NOW() AND oc.o_place='.($v_ID-2).';';
				break;
			/*
				// materials by material type
				$a_TagIDs=array(9=>1,10=>2,11=>3,12=>4,13=>5,14=>23,15=>24);
				$a_Data['query']='SELECT * FROM lapcat_materials WHERE (tag1_id='.$a_TagIDs[$v_ID].' OR tag2_id='.$a_TagIDs[$v_ID].' OR tag3_id='.$a_TagIDs[$v_ID].' OR tag4_id='.$a_TagIDs[$v_ID].');';
				break;
			*/
			case 9:
				$a_TagIDs=array(9=>'3,4');
				$a_Data['query']='SELECT * FROM lapcat_materials WHERE author_id IN('.$a_TagIDs[$v_ID].');';
				break;
			case 10:
				$a_TagIDs=array(10=>'4,11');
				$a_Data['query']='SELECT * FROM lapcat_materials WHERE platform_id IN('.$a_TagIDs[$v_ID].');';
				break;
			case 11:
				$a_TagIDs=array(11=>32);
				$a_Data['query']='SELECT * FROM hex_databases WHERE id IN('.$a_TagIDs[$v_ID].');';
				break;
			case 12:$a_Data['query']='SELECT * FROM hex_databases;';break;
			case 14:$a_Data['query']='SELECT *, name AS title FROM hex_articles ORDER BY entered_on DESC;';break;
			case 15:$a_Data['query']='SELECT *, name AS title FROM hex_library_names WHERE id<8;';break;
			case 16:$a_Data['query']='SELECT *, name AS title FROM hex_library_jobs;';break;
			case '':default:
				break;
		}
		$v_DC->Query($a_Data['query']);
		if($v_DC->Count_res()>0){
			$a_Data['records']=$v_DC->Format('assoc_array');
			$a_Data['total-records']=count($a_Data['records']);
		}
		unset($a_Data['query']);
		return json_encode($a_Data);
	}


	// Function - Pull
	function f_Pull($v_AreaName,$v_Type,$v_Stamp){
		$a_Data=array(
			'area'=>$v_AreaName,
			'stamp'=>time(),
			'items'=>array(),
			'query'=>'',
			'error'=>''
		);
		$a_GroupedData=array();
		$a_ReturnData=array();
		switch($v_Type){
			case 'hotkeys':
				$v_UserID=1288;
				$a_Data['query']='SELECT title, code, description, requires FROM hex_hotkeys WHERE user_id='.$v_UserID.';';
				break;
			case 'actor':case 'author':
				$a_Data['query']='SELECT id, name FROM lapcat_'.$v_Type.' WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case 'actors':
				$a_Data['query']='SELECT material_id, actor_id FROM lapcat_materials_by_actor WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case 'data':
				switch($v_AreaName){
					case 'events':
						$a_Data['query']='SELECT oc.id, (SELECT COUNT(*) FROM hex_markers AS hm WHERE hm.calendar_id=oc.id) AS counted, oc.name AS title, oc.o_date, oc.o_place, oc.o_endtime, oc.o_starttime, oc.o_text, oc.type, oc.pPlus, oc.tournament, oc.summer FROM obj_calendar AS oc WHERE oc.o_date>=NOW() AND `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
						break;
					case 'materials':
						$a_Data['query']='SELECT * FROM lapcat_'.$v_AreaName.' WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
						break;
					case '':default:
						break;
				}
				break;
			case 'list':
				$a_Data['query']='SELECT id, name, description FROM hex_lists WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'" AND `type` = "list" AND `locked` = 2;';
				break;

			case 'by-list':
				$a_Data['query']='SELECT `material-ID`,`list-ID` FROM hex_lists_of_IDs WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case 'by-actor':
				$a_Data['query']='SELECT material_id, '.str_replace('by-','',$v_Type).'_id FROM lapcat_'.$v_AreaName.'_by_'.str_replace('by-','',$v_Type).' WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case 'by-director':case 'by-label':case 'by-platform':case 'by-publisher':case 'by-rating':case 'by-studio':
				$a_Data['query']='SELECT id, '.str_replace('by-','',$v_Type).'_id FROM lapcat_'.$v_AreaName.' WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case 'by-tag':
				$a_Data['query']='SELECT id, tag1_id, tag2_id, tag3_id, tag4_id FROM lapcat_'.$v_AreaName.' WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case 'director':case 'label':case 'platform':case 'publisher':case 'rating':case 'studio':case 'tag':
				$a_Data['query']='SELECT id, name FROM lapcat_'.$v_Type.' WHERE `modified_on` > "'.date('Y-m-d H:i:s',$v_Stamp).'";';
				break;
			case '':default:
				break;
		}
		$v_DC=db::getInstance();
		$v_DC->Query($a_Data['query']);
		if($v_DC->Count_res()>0){
			switch($v_Type){
				case 'actor':case 'actors':case 'author':case 'data':case 'hotkeys':
					$a_Data['items']=$v_DC->Format('assoc_array');
					break;
				case 'list':
					$a_ReturnData=$v_DC->Format('assoc_array');
					$v_DC->Query('SELECT `list-ID`,`material-ID` FROM hex_lists_of_IDs;');
					$a_GroupedData=F_GroupByID($v_DC->Format('row_array'));
					$a_Data['items']=F_JoinGroupedDataByID($a_ReturnData,$a_GroupedData);
					break;

				case 'by-actor':case 'by-list':
					$a_Data['items']=F_ConvertActorArray($v_DC->Format('row_array'));
					break;
				case 'by-director':case 'by-label':case 'by-platform':case 'by-publisher':case 'by-rating':case 'by-studio':case 'by-tag':
					$a_Data['items']=F_ConvertTagArray($v_DC->Format('row_array'));
					break;
				case 'director':case 'label':case 'platform':case 'publisher':case 'rating':case 'studio':case 'tag':
					$a_Data['items']=F_ConvertArray($v_DC->Format('row_array'));
					break;
				case '':default:
					break;
			}
		}
		$a_Data['error']=$v_DC->Error;
		unset($a_Data['query']);
		unset($a_Data['error']);
		return json_encode($a_Data);
	}
	
}
function F_JoinGroupedDataByID($a_ReturnData,$a_Groups){
	foreach($a_ReturnData as $v_Key=>$a_Item){
		$v_ID=$a_ReturnData[$v_Key]['id'];
		if(array_key_exists($v_ID,$a_Groups)){
			$a_ReturnData[$v_Key]['group']=$a_Groups[$v_ID];
		}
	}
	return $a_ReturnData;
}
function F_GroupByID($a_Data){
	$a_Groups=array();
	foreach($a_Data as $v_Key=>$a_Item){
		$v_ID=$a_Item[0];
		if(!array_key_exists($v_ID,$a_Groups)){$a_Groups[$v_ID]=array();}
		$a_Groups[$v_ID][]=$a_Item[1];
	}
	return $a_Groups;
}




function F_ConvertArray($a_Items){$a_Data=array();foreach($a_Items as $v_Key=>$a_Item){$a_Data[$a_Item[0]]=$a_Item[1];}return $a_Data;}
function F_ConvertActorArray($a_Items){
	$a_Data=array();
	foreach($a_Items as $v_Key=>$a_Item){
		$v_ID=$a_Item[0];
		$v_ActorID=$a_Item[1];
		if(!array_key_exists($v_ActorID,$a_Data)){$a_Data[$v_ActorID]=array();}
		$a_Data[$v_ActorID][]=$v_ID;
	}
	return $a_Data;
}
function F_ConvertTagArray($a_Items){
	$a_Data=array();
	foreach($a_Items as $v_Key=>$a_Item){
		$v_ID=$a_Item[0];
		for($v_Counter=1;$v_Counter<count($a_Item);$v_Counter++){
			$v_TagID=$a_Item[$v_Counter];
			if($v_TagID>0){
				if(!array_key_exists($v_TagID,$a_Data)){$a_Data[$v_TagID]=array();}
				$a_Data[$v_TagID][]=$v_ID;
			}
		}
	}
	return $a_Data;
}
?>