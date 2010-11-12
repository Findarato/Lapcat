<?
/* Function - Get Library Information */
function F_GetLibraryInformation($v_LibraryID=0){
	switch($v_LibraryID){
		case 0:return array('street'=>'904 Indiana Avenue','city-state'=>'La Porte, IN','zip'=>'46350','phone'=>'(219) 362-6156');break;
		case 1:return array('street'=>'7089 West 400 North','city-state'=>'Michigan City, IN','zip'=>'46360','phone'=>'(219) 879-3272');break;
		case 2:return array('street'=>'7981 E. St. Rd. 4 (P.O. Box 125)','city-state'=>'Walkerton, IN','zip'=>'46574','phone'=>'(219) 369-1337');break;
		case 3:return array('street'=>'202 North Thompson St. (P.O. Box 78)','city-state'=>'Hanna, IN','zip'=>'46340','phone'=>'(219) 797-4735');break;
		case 4:return array('street'=>'436 Evanston (P.O. Box 219)','city-state'=>'Kingsford Heights, IN','zip'=>'46346','phone'=>'(219) 393-3280');break;
		case 5:return array('street'=>'#1 East Michigan Avenue (P.O. Box 157)','city-state'=>'Rolling Prairie, IN','zip'=>'46371','phone'=>'(219) 778-2390');break;
		case 6:return array('street'=>'3727 West 800 South (P.O. Box 98)','city-state'=>'Union Mills, IN','zip'=>'46382','phone'=>'(219) 767-2604');break;
		case 7:return array('street'=>'','city-state'=>'','zip'=>'','phone'=>'(219) 362-6156');break;
		case 8:default:return array();break;
	}
}
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
		$v_RunQuery=true;
		switch($v_ID){
			case 1:$a_Data['query']='SELECT oc.id, (SELECT COUNT(*) FROM hex_markers AS hm WHERE hm.calendar_id=oc.id) AS counted, oc.name AS title, oc.o_date, oc.o_place, oc.o_endtime, oc.o_starttime, oc.o_text AS text, oc.type, oc.pPlus, oc.tournament, oc.summer FROM obj_calendar AS oc WHERE oc.o_date>=NOW();';break;
			case 2:case 3:case 4:case 5:case 6:case 7:case 8:
				$a_Data['query']='SELECT oc.id, (SELECT COUNT(*) FROM hex_markers AS hm WHERE hm.calendar_id=oc.id) AS counted, oc.name AS title, oc.o_date, oc.o_place, oc.o_endtime, oc.o_starttime, oc.o_text AS text, oc.type, oc.pPlus, oc.tournament, oc.summer FROM obj_calendar AS oc WHERE oc.o_date>=NOW() AND oc.o_place='.($v_ID-2).';';
				break;
			/*
				// materials by material type
				$a_TagIDs=array(9=>1,10=>2,11=>3,12=>4,13=>5,14=>23,15=>24);
				$a_Data['query']='SELECT * FROM lapcat_materials WHERE (tag1_id='.$a_TagIDs[$v_ID].' OR tag2_id='.$a_TagIDs[$v_ID].' OR tag3_id='.$a_TagIDs[$v_ID].' OR tag4_id='.$a_TagIDs[$v_ID].');';
				break;
			*/
			case 9:case 64:
				$a_TagIDs=array(9=>'3,4',64=>'1,343');
				$a_Data['query']='SELECT * FROM lapcat_materials WHERE author_id IN('.$a_TagIDs[$v_ID].');';
				break;
			case 10:
				$a_TagIDs=array(10=>'3,7');
				$a_Data['query']='SELECT * FROM lapcat_materials WHERE platform_id IN('.$a_TagIDs[$v_ID].');';
				break;
			case 11:case 41:case 42:case 43:case 44:case 45:case 46:case 47:case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 58:case 59:case 60:case 61:
				$a_TagIDs=array(11=>32,41=>13,42=>24,43=>23,44=>22,45=>20,46=>21,47=>25,48=>26,49=>27,50=>28,51=>29,52=>30,53=>31,54=>32,55=>33,56=>34,57=>35,58=>36,59=>37,60=>38,61=>39);
				$a_Data['query']='SELECT * FROM hex_databases WHERE id IN('.$a_TagIDs[$v_ID].');';
				break;
			case 12:$a_Data['query']='SELECT * FROM hex_databases;';break;
			case 13:// Tickets
				$v_RunQuery=false;
				$a_Data['records']=array(0=>array('id'=>0,'title'=>'Tickets','link_in'=>'/tickets'));
				break;
			case 14:$a_Data['query']='SELECT name AS title, ID AS id, text, username FROM viewable_news ORDER BY entered_on DESC;';break;
			case 65:
				$a_Users=array(65=>'1321');
				$a_Data['query']='SELECT name AS title, ID AS id, text, username FROM viewable_news WHERE entered_by_ID='.$a_Users[$v_ID].' ORDER BY entered_on DESC;';break;
			// Hours and Locations
			case 15:$a_Data['query']='SELECT ID AS id, name AS title FROM hex_library_names WHERE id<7;';break;
			// Employment Opportunities
			case 16:$a_Data['query']='SELECT *, name AS title FROM hex_library_jobs;';break;
			case '':default:
				break;
		}
		if($v_RunQuery){
			$v_DC->Query($a_Data['query']);
			if($v_DC->Count_res()>0){
				$a_Data['records']=$v_DC->Format('assoc_array',false,false);
				$a_Data['total-records']=count($a_Data['records']);
			}
		}
		switch($v_ID){
			case 15:
				// Hours and Locations
				foreach($a_Data['records'] as $v_Key=>$a_Record){
					$v_DC->Query('SELECT day_of_week, time_start, time_end FROM hex_libraries WHERE library_ID='.$a_Record['id'].';');
					$a_HoursOfOperation=$v_DC->Format('assoc_array');
					foreach($a_HoursOfOperation as $v_SubKey=>$a_Day){
						$a_Data['records'][$v_Key][$a_Day['day_of_week'].'_start']=(($a_Day['time_start']=='00:00:00')?'Closed':date('g:i:s a',strtotime($a_Day['time_start'])));
						$a_Data['records'][$v_Key][$a_Day['day_of_week'].'_end']=(($a_Day['time_end']=='00:00:00')?'':date('g:i:s a',strtotime($a_Day['time_end'])));
					}
					$a_Data['records'][$v_Key]=array_merge($a_Data['records'][$v_Key],F_GetLibraryInformation($a_Record['id']));
				}
				break;
			case '':default:
				break;
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