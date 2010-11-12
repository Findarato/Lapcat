<?
class LAPCAT{
	/* Array - Log */
	private $a_Log=array();
	/* Variable - Reset Search Counter */
	private $v_ResetSearchCounter=0;
	/* Function - Reset Log */
	function f_ResetLog(){$this->a_Log=array();}
	
	
	/* Variable - In House */
	private $v_InHouse='in';
	/* Function - Log User In */
	function f_LogUserIn($v_UserID=0){$this->a_User['ID']=$v_UserID;}

	// Function - LAPCAT
	function LAPCAT($v_ID=0,$v_IP='',$v_MessageFilter=false){
		$this->a_User['ID']=$v_ID;
		$this->a_Parameters['message-filter']=$v_MessageFilter;
		$this->f_GetFeaturedDatabase();
		$this->f_SetIP($v_IP);
		if(in_array($v_IP,array('75.150.196.1','75.150.196.2','75.150.196.3','75.150.196.4','75.150.196.5','75.150.196.6','75.150.196.9','75.150.196.10','75.150.196.11','75.150.196.12','75.150.196.13','75.150.196.14','75.150.196.17','75.150.196.18','75.150.196.19','75.150.196.20','75.150.196.21','75.150.196.22','75.150.211.249','75.150.211.250','75.150.211.251','75.150.211.252','75.150.211.253','75.150.211.254','70.91.251.193','70.91.251.194','70.91.251.195','70.91.251.196','70.91.251.197','70.91.251.198','75.145.130.225','75.145.130.226','75.145.130.227','75.145.130.228','75.145.130.229','75.145.130.230','75.149.222.209','75.149.222.210','75.149.222.211','75.149.222.212','75.149.222.213','75.149.222.214'))||substr($v_IP,0,5)=='10.1.'){$this->v_InHouse='in';}else{$this->v_InHouse='out';}
	}
	
	/* Array - ID Storage */
	private $a_IDStorage=array();
	
	/* Variable - Specific Name */
	public $v_SpecificName='';

	
	/* Function - Get Anticipated Events */
	function f_GetAnticipatedEvents(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) FROM hex_markers WHERE user_id='.$this->a_User['ID'].';');
		$v_MarkerTotal=$v_DC->Format('row');
		$v_DC->Query('SELECT calendar_id FROM hex_markers WHERE user_id='.$this->a_User['ID'].' LIMIT 2;');
		$a_Results=$v_DC->Format('row_array');
		if(!empty($a_Results)){
			$v_DC->Query('SELECT id, name FROM viewable_events WHERE id IN('.implode(',',$a_Results).') ORDER BY o_date;');
			$a_Data=$v_DC->Format('assoc_array');
			return json_encode(array('switch'=>'data','data'=>$a_Data,'markers'=>$v_MarkerTotal));
		}else{
			return json_encode(array('switch'=>'failed'));
		}
	}

	/* Function - Get Starting Key (for ID Storage) */
	function f_GetStartingKeyForIDStorage($v_Area){return (($this->a_Search[$v_Area]['current-page']-1)*$this->a_Search[$v_Area]['maximum-records']);}

	/* Function - Push Data (with ID Storage) */
	function f_PushDataWithIDStorage($v_Area,$v_SameSearch){
		$v_DC=db::getInstance();
		$a_Data=array();
		$a_BaseSQL=$this->f_GetBaseSQL($v_Area);
		$v_BaseSQL=$a_BaseSQL['select'];
		$v_Header='';
		if(!$v_SameSearch){
			$this->a_Log[]=array('type'=>'narrator','text'=>'For '.$v_Area.', the same search was NOT performed.');
			$a_Data=$this->f_AlterSQL($v_Area,$a_BaseSQL,true);
			$v_PageSQL=$a_Data['page-SQL'];
			$a_SQL=$a_Data['SQL'];
			$v_Header=$a_Data['header'];
			$v_DC->Query(implode('',$a_SQL));
			$a_Results=$v_DC->Format('assoc_array');
			if(!$v_PageSQL){
				$a_Page['total']=1;
			}else{
				$v_DC->Query($v_PageSQL,true);
				$a_Page=$v_DC->Fetch('assoc');
			}
			$this->a_Search[$v_Area]['current-page']=1;
			$this->a_Search[$v_Area]['total-records']=$a_Page['total'];
			$this->a_Search[$v_Area]['total-pages']=FF_CalculateTotal($a_Page['total'],$this->a_Search[$v_Area]['maximum-records']);
			if(!empty($a_Results)){
				$this->a_IDStorage[$v_Area]=$a_Results;
			}else{
				return json_encode(array(
					'alias'=>$v_Area,
					'switch'=>'failed',
					'client-changes'=>$this->f_GetClientChanges(),
					'triggers'=>$this->f_GetClientTriggers(),
					'header'=>$this->a_FirstHeader[$v_Area].$v_Header.'.',
					'page'=>$this->f_GetPageInformation($v_Area),
					'log'=>$this->a_Log
				));
			}
		}else{
			$this->a_Log[]=array('type'=>'narrator','text'=>'For '.$v_Area.', the same search was performed.');
		}
		$this->a_Log[]=array('type'=>'narrator-bold','text'=>'Searches have been reset '.$this->v_ResetSearchCounter.' times in total.');
		$v_StartingKey=$this->f_GetStartingKeyForIDStorage($v_Area);
		$a_PushIDs=array_slice($this->a_IDStorage[$v_Area],$v_StartingKey,$this->a_Search[$v_Area]['maximum-records']);
		$a_Records=$this->f_GetDataByIDs($v_Area,$v_BaseSQL,$a_PushIDs);
		if(!empty($a_Records)){
			return json_encode(
				array(
					'alias'=>$v_Area,
					'switch'=>'data',
					'data'=>$a_Records,
					'client-changes'=>$this->f_GetClientChanges(),
					'triggers'=>$this->f_GetClientTriggers(),
					'header'=>$this->a_FirstHeader[$v_Area].$v_Header.'.',
					'page'=>$this->f_GetPageInformation($v_Area),
					'log'=>$this->a_Log
				)
			);
		}
	}

	/* Function - Get Tags (by ID) */
	function f_GetTagsByID($v_ID=0,$v_Type='material'){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM hex_tags_by_'.$v_Type.' AS htbx LEFT JOIN hex_tags AS ht ON(htbx.tag_ID=ht.ID) WHERE htbx.ID='.$v_ID.';');
		$a_Data=$v_DC->Format('assoc_array');
		if(empty($a_Data)){return array();}
		return $a_Data;
	}

	/* Function - Get Data (by IDs) */
	function f_GetDataByIDs($v_Area,$v_BaseSQL,$a_IDs){
		$a_Results=array();
		$v_DC=db::getInstance();
		switch($v_Area){
			case 'databases':
				foreach($a_IDs as $v_Key=>$a_ID){
					$a_Results[$v_Key]=array(
						'counter'=>$v_Key
					);
					$v_DC->Query($v_BaseSQL.' FROM hex_databases AS vd WHERE vd.ID='.$a_ID['ID'].';');
					$a_Results[$v_Key]=array_merge($a_Results[$v_Key],$v_DC->Format('assoc'));
	
					$a_Results[$v_Key]['show-similar']=$this->f_GetSimilarNameCount($a_Results[$v_Key]['name'],$v_Area);

					$a_Tags=$this->f_GetTagsByID($a_ID['ID'],'database');
					for($v_Counter=0;$v_Counter<4;$v_Counter++){
						if(!array_key_exists($v_Counter,$a_Tags)){
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=0;
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']='';
						}else{
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=$a_Tags[$v_Counter]['tag-ID'];
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']=$a_Tags[$v_Counter]['tag-name'];
						}
					}
				}
				break;
			case 'news':
				foreach($a_IDs as $v_Key=>$a_ID){
					$a_Results[$v_Key]=array(
						'counter'=>$v_Key
					);
					$v_DC->Query($v_BaseSQL.', IFNULL(hf.content_ID,0) AS `favorite` FROM viewable_news AS vn LEFT JOIN hex_favorites AS hf ON (hf.content_ID=vn.ID AND hf.favorite_type=0 AND hf.user_ID='.$this->a_User['ID'].') WHERE vn.ID='.$a_ID['ID'].';');
					$a_Results[$v_Key]=array_merge($a_Results[$v_Key],$v_DC->Format('assoc'));
	
					$a_Results[$v_Key]['show-similar']=$this->f_GetSimilarNameCount($a_Results[$v_Key]['name'],$v_Area);

					$a_Tags=$this->f_GetTagsByID($a_ID['ID'],'article');
					for($v_Counter=0;$v_Counter<4;$v_Counter++){
						if(!array_key_exists($v_Counter,$a_Tags)){
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=0;
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']='';
						}else{
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=$a_Tags[$v_Counter]['tag-ID'];
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']=$a_Tags[$v_Counter]['tag-name'];
						}
					}
					$a_Results[$v_Key]['credit-word']='by';
				}
				break;
			case 'events':
				foreach($a_IDs as $v_Key=>$a_ID){
					$a_Results[$v_Key]=array(
						'counter'=>$v_Key
					);
					$v_DC->Query($v_BaseSQL.', IFNULL(hm.calendar_id,0) AS `watched`, IFNULL(hf.content_ID,0) AS `favorite` FROM viewable_events AS ve LEFT JOIN hex_markers AS hm ON (hm.calendar_id=ve.ID AND hm.user_ID='.$this->a_User['ID'].') LEFT JOIN hex_favorites AS hf ON (hf.content_ID=ve.ID AND hf.favorite_type=1 AND hf.user_ID='.$this->a_User['ID'].') WHERE ve.ID='.$a_ID['ID'].';');
					$a_Results[$v_Key]=array_merge($a_Results[$v_Key],$v_DC->Format('assoc'));
	
					$a_Results[$v_Key]['show-similar']=$this->f_GetSimilarNameCount($a_Results[$v_Key]['name'],$v_Area);

					$a_Tags=$this->f_GetTagsByID($a_ID['ID'],'event');
					for($v_Counter=0;$v_Counter<4;$v_Counter++){
						if(!array_key_exists($v_Counter,$a_Tags)){
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=0;
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']='';
						}else{
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=$a_Tags[$v_Counter]['tag-ID'];
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']=$a_Tags[$v_Counter]['tag-name'];
						}
					}
					$a_Results[$v_Key]['credit-word']='at';
				}
				break;
			case 'materials':
				foreach($a_IDs as $v_Key=>$a_ID){
					$a_Results[$v_Key]=array(
						'counter'=>$v_Key
					);
					$v_DC->Query($v_BaseSQL.', IFNULL(hf.content_ID,0) AS `favorite` FROM viewable_materials AS vm LEFT JOIN hex_favorites AS hf ON (hf.content_ID=vm.ID AND hf.favorite_type=1 AND hf.user_ID='.$this->a_User['ID'].') WHERE vm.ID='.$a_ID['ID'].';');
					$a_Results[$v_Key]=array_merge($a_Results[$v_Key],$v_DC->Format('assoc'));
	
					$a_Results[$v_Key]['show-similar']=$this->f_GetSimilarNameCount($a_Results[$v_Key]['name'],$v_Area);

					$a_Tags=$this->f_GetTagsByID($a_ID['ID'],'material');
					for($v_Counter=0;$v_Counter<4;$v_Counter++){
						if(!array_key_exists($v_Counter,$a_Tags)){
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=0;
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']='';
						}else{
							$a_Results[$v_Key]['tag-'.$v_Counter.'-ID']=$a_Tags[$v_Counter]['tag-ID'];
							$a_Results[$v_Key]['tag-'.$v_Counter.'-name']=$a_Tags[$v_Counter]['tag-name'];
						}
					}

					$v_DC->Query('SELECT author, act1, act2, act3, artist, writer, narrator, m_artist, console_name FROM viewable_materials WHERE ID='.$a_ID['ID'].';');
					$a_Credits=$this->f_GetCredits($v_DC->Fetch('assoc'));
					$a_Results[$v_Key]=array_merge($a_Results[$v_Key],$a_Credits);
					$a_Results[$v_Key]['credit-word']=$this->f_GetCreditWord($a_Credits['credit-type']);

					$a_LibraryWords=explode(' ',F_GetLibraryName($this->v_HomeLibrary));
					$a_Availability=avalByisbn($a_Results[$v_Key]['ISBNorSN'],strtolower($a_LibraryWords[0]));
					$a_Results[$v_Key]['available-home']=$a_Availability['available-home'];
					$a_Results[$v_Key]['available-other']=$a_Availability['available-other'];
					$a_Results[$v_Key]['summary']=$a_Availability['marc-record'];
				}
				break;
			default:
				break;
		}
		return $a_Results;
	}

	/* Function - Organize IDs */
	function f_OrganizeIDs($a_IDs){$a_OnlyIDs=array();foreach($a_IDs as $v_Key=>$a_Data){$a_OnlyIDs[]=$a_Data['ID'];}return implode(',',$a_OnlyIDs);}

	/* Function - Alter SQL */
	function f_AlterSQL($v_Area='materials',$a_SQL,$v_AllIDs){
		$v_SQL='';
		if($v_AllIDs){
			$a_SQL['select']='SELECT v'.$v_Area[0].'.ID ';
			$a_SQL['limit']='';
			$a_SQL['limit-extra']='';
		}
		$v_ExtraHeader='';
		switch($v_Area){
			case 'databases':
				/* Tag */
				if($this->a_Search[$v_Area]['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search[$v_Area]['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_database AS htbd2 ON(htbd2.ID=vd.ID)';
					$a_SQL['where']=' AND htbd2.tag_ID IN('.$this->a_Search[$v_Area]['tag']['value'].')';
				}
				/* Page SQL */
				$v_SQL='SELECT COUNT(DISTINCT(vd.ID)) AS total'.$a_SQL['from'].$a_SQL['where'];
				break;
			case 'news':
				/* Tag */
				if($this->a_Search[$v_Area]['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search[$v_Area]['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_article AS htba2 ON(htba2.ID=vn.ID)';
					$a_SQL['where'].=' AND htba2.tag_ID IN('.$this->a_Search[$v_Area]['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search[$v_Area]['date']['on']){
					$v_ExtraHeader.=' released on '.$this->a_Search[$v_Area]['date']['value'];
					$a_SQL['where'].=' AND  DATE(vn.entered_on)="'.$this->a_Search[$v_Area]['date']['value'].'"';
				}
				/* Search */
				if($this->a_Search[$v_Area]['search']['on']){
					$v_ExtraHeader.=' by '.$this->a_Search[$v_Area]['search']['value'];
					$a_SQL['where'].=' AND vn.username="'.$this->a_Search[$v_Area]['search']['value'].'"';
				}
				/* Page SQL */
				$v_SQL='SELECT COUNT(DISTINCT(vn.ID)) AS total'.$a_SQL['from'].$a_SQL['where'];
				break;
			case 'events':
				/* Tag */
				if($this->a_Search[$v_Area]['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search[$v_Area]['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_event AS htbe2 ON(htbe2.ID=ve.ID)';
					$a_SQL['where'].=' AND htbe2.tag_ID IN('.$this->a_Search[$v_Area]['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search[$v_Area]['date']['on']){
					$v_ExtraHeader.=' scheduled for '.date('F jS, o',strtotime($this->a_Search[$v_Area]['date']['value']));
					$a_SQL['where'].=' AND DATE(ve.o_date)="'.$this->a_Search[$v_Area]['date']['value'].'"';
				}
				/* Search */
				switch($this->a_Search[$v_Area]['search']['value']){
					case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:case 9:
						$v_ExtraHeader.=' at '.F_GetLibraryName($this->a_Search[$v_Area]['search']['value']);
						$a_SQL['where'].=' AND ve.o_place='.($this->a_Search[$v_Area]['search']['value']-1);
						break;
					default:
						break;
				}
				/* Anticipated */
				if($this->a_Search[$v_Area]['anticipated']){
					$v_ExtraHeader.=' that I am anticipating';
					$a_SQL['from'].=' LEFT JOIN hex_markers AS hm ON (hm.calendar_id=ve.ID AND hm.user_ID='.$this->a_User['ID'].')';
					$a_SQL['where'].=' AND hm.calendar_id>0';
				}
				/* Favorited */
				if($this->a_Search[$v_Area]['favorited']){
					$v_ExtraHeader.=' that I like';
					$a_SQL['from'].=' LEFT JOIN hex_favorites AS hf ON (hf.content_ID=ve.ID AND hf.favorite_type=1 AND hf.user_ID='.$this->a_User['ID'].')';
					$a_SQL['where'].=' AND hf.content_ID>0';
				}
				/* Page SQL */
				$v_SQL='SELECT COUNT(DISTINCT(ve.ID)) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Similar */
				if($this->a_Search[$v_Area]['similar']['on']){
					$v_ExtraHeader.=' containing "'.ucwords($this->a_Search[$v_Area]['similar']['value']).'"';
					$a_SQL['where'].=' AND ve.name LIKE "%'.$this->a_Search[$v_Area]['similar']['value'].'%"';
					$v_SQL='SELECT COUNT(*) AS total FROM viewable_events WHERE name LIKE "%'.$this->a_Search[$v_Area]['similar']['value'].'%";';
				}
				/* Specific */
				if($this->a_Search[$v_Area]['specific']['on']){
					$v_ExtraHeader.=' - "'.$this->v_SpecificName.'"';
					$a_SQL['where'].=' AND ve.ID='.$this->a_Search[$v_Area]['specific']['value'];
					$v_SQL=false;
				}
				break;
			case 'materials':
				switch($this->a_Search[$v_Area]['sort']['value']){
					case 1:$a_SQL['order']=' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC';break;
					case 2:$a_SQL['order']=' ORDER BY vm.rating DESC, vm.year DESC, vm.name ASC';break;
					case 3:$a_SQL['order']=' ORDER BY vm.name ASC, vm.year DESC, vm.rating DESC';break;
					case 4:$a_SQL['order']=' ORDER BY vm.name DESC, vm.year DESC, vm.rating DESC';break;
					default:break;
				}
				/* Search */
				if($this->a_Search[$v_Area]['search']['on']){
					$a_Credits=array('author','act1','act2','act3','artist','writer','narrator','m_artist','console_name');
					$a_SQL['where'].=' AND (';
					$v_Counter=0;
					foreach($a_Credits as $v_Key=>$v_CreditType){
						if($v_Counter>0){$a_SQL['where'].=' OR ';}
						$a_SQL['where'].='vm.'.$v_CreditType.'="'.$this->a_Search[$v_Area]['search']['value'].'"';
						$v_Counter++;
					}
					$a_SQL['where'].=')';
				}
				/* Tag */
				if($this->a_Search[$v_Area]['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search[$v_Area]['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_material AS htbm2 ON(htbm2.ID=vm.ID)';
					$a_SQL['where'].=' AND htbm2.tag_ID IN('.$this->a_Search[$v_Area]['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search[$v_Area]['date']['on']){
					$v_ExtraHeader.=' released in '.$this->a_Search[$v_Area]['date']['value'];
					$a_SQL['where'].=' AND vm.year="'.$this->a_Search[$v_Area]['date']['value'].'"';
				}
				/* Page SQL */
				$v_SQL='SELECT COUNT(DISTINCT(vm.ID)) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Similar */
				if($this->a_Search[$v_Area]['similar']['on']){
					$v_ExtraHeader.=' containing "'.ucwords($this->a_Search[$v_Area]['similar']['value']).'"';
					$a_SQL['where'].=' AND vm.name LIKE "%'.$this->a_Search[$v_Area]['similar']['value'].'%"';
					$v_SQL='SELECT COUNT(*) AS total FROM viewable_materials WHERE name LIKE "%'.$this->a_Search[$v_Area]['similar']['value'].'%";';
				}
				break;
			default:
				break;
		}
		return array(
			'header'=>$v_ExtraHeader,
			'page-SQL'=>$v_SQL,
			'SQL'=>$a_SQL
		);
	}



	// Array - Add Client Change Search To JSON
	private $a_AddClientChangeSearch=array();
	// Array - Add Client Triggers
	private $a_AddClientTriggers=array();
	// Array - Clicked On Tags
	private $a_ClickedOnTags=array();
	// Array - Popular Tags
	private $a_PopularTags=array();
	// Array - First Header
	private $a_FirstHeader=array('materials'=>'','events'=>'','news'=>'','databases'=>'');
	// Array - Prevoius Header
	private $a_PreviousHeader=array('materials'=>'','events'=>'','news'=>'','databases'=>'');
	/* Array - Parameters */
	private $a_Parameters=array('featured-article'=>0,'featured-database'=>0,'message-filter'=>false);
	// Array - Prevoius SQL
	private $a_PreviousSQL=array('materials'=>'','events'=>'','news'=>'','databases'=>'');
	// Array - Search
	private $a_Search=array();
	// Array - User
	private $a_User=array('on'=>false,'ID'=>0,'IP'=>0);
	// Varaible - Home Library
	private $v_HomeLibrary=1;
	// Variable - Validated
	private $v_Validated=false;
	// Function - Calculate Limit
	function f_CalculateLimit($v_Area='news'){return (($this->a_Search[$v_Area]['current-page']-1)*$this->a_Search[$v_Area]['maximum-records']).','.$this->a_Search[$v_Area]['maximum-records'];}
	// Function - Change Search
	function f_ChangeSearch($v_Area='news',$v_Key='date',$v_Value=''){$this->a_Search[$v_Area][$v_Key]=array('on'=>(($v_Value!==''||$v_Value>0)?true:false),'value'=>$v_Value);}
	// Function - Get All Content Providers
	function f_GetAllContentProviders(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT DISTINCT(hu.ID) AS value, hu.username AS name FROM viewable_news AS vn LEFT JOIN hex_users AS hu ON (vn.entered_by_ID=hu.ID) WHERE hu.locked=2 ORDER BY hu.username ASC;');
		$a_Results=array_merge(array(0=>array('value'=>0,'name'=>'all writers')),$v_DC->Format('assoc'));
		return $a_Results;
	}
	// Function - Get All Tags
	function f_GetAllTags(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ID, name FROM hex_tags WHERE locked=2 ORDER BY name ASC;');
		return $v_DC->Format('assoc');
	}
	// Function - Get Base SQL
	function f_GetBaseSQL($v_Area='materials'){
		$a_SQL=array();
		switch($v_Area){
			default:break;
			case 'databases':
				$this->f_GetPushList($v_Area);
				$a_SQL=array(
					'select'=>'SELECT vd.ID, vd.name, vd.description, vd.link_'.$this->v_InHouse.' AS `link-in`, vd.at_home AS `at-home`, "'.$this->v_InHouse.'" AS `in-or-out`',
					'from'=>' FROM hex_databases AS vd LEFT JOIN hex_tags_by_database AS htbd ON (htbd.ID=vd.ID) LEFT JOIN hex_tags AS ht ON (htbd.tag_ID=ht.ID)',
					'where'=>' WHERE vd.locked=2',
					'group'=>' GROUP BY vd.ID',
					'order'=>' ORDER BY vd.name ASC',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->f_CalculateLimit($v_Area).';'
				);
				break;
			case 'events':
				$a_SQL=array(
					'select'=>'SELECT ve.ID, ve.name, ve.description, (ve.o_place+1) AS `library-ID`, DAY(ve.o_date) AS day, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%b %D") AS `date-words`, ve.start, ve.end, ve.summer, ve.slider, ve.tournament',
					'from'=>' FROM viewable_events AS ve LEFT JOIN hex_tags_by_event AS htbe ON (htbe.ID=ve.ID) LEFT JOIN hex_tags AS ht ON (htbe.tag_ID=ht.ID)',
					'where'=>' WHERE'.$this->f_GetPushList($v_Area),
					'group'=>' GROUP BY ve.ID',
					'order'=>' ORDER BY ve.o_date ASC, ve.start ASC, ve.counted DESC',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->f_CalculateLimit($v_Area).';'
				);
				break;
			case 'materials':
				$a_SQL=array(
					'select'=>'SELECT vm.ID, vm.ISBNorSN, vm.name, vm.sub_name AS `sub-name`, vm.rating, vm.year AS `date-words`',
					'from'=>' FROM viewable_materials AS vm LEFT JOIN hex_tags_by_material AS htbm ON (htbm.ID=vm.ID) LEFT JOIN hex_tags AS ht ON (htbm.tag_ID=ht.ID)',
					'where'=>' WHERE htbm.tag_ID IN ('.$this->f_GetPushList($v_Area).')',
					'group'=>' GROUP BY vm.ID',
					'order'=>' ORDER BY RAND()',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->f_CalculateLimit($v_Area).';'
				);
				break;
			case 'news':
				$a_SQL=array(
					'select'=>'SELECT vn.ID, vn.text AS description, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%b %D") AS `date-words`, vn.entered_by_ID AS `entered-by-id`',
					'from'=>' FROM viewable_news AS vn LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID) LEFT JOIN hex_tags AS ht ON (htba.tag_ID=ht.ID)',
					'where'=>' WHERE'.$this->f_GetPushList($v_Area),
					'group'=>' GROUP BY vn.ID',
					'order'=>' ORDER BY vn.entered_on DESC',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->f_CalculateLimit($v_Area).';'
				);
				break;
		}
		return $a_SQL;
	}
	// Function - Get Client Changes
	function f_GetClientChanges(){$a_Changes=$this->a_AddClientChangeSearch;$this->a_AddClientChangeSearch=array();return $a_Changes;}
	// Function - Get Client Triggers
	function f_GetClientTriggers(){$a_Triggers=$this->a_AddClientTriggers;$this->a_AddClientTriggers=array();return $a_Triggers;}
	// Function - Get Credits
	function f_GetCredits($a_Row){foreach($a_Row as $v_Key=>$v_Credit){if($v_Credit!==''&&$v_Credit!==' '){return array('credit-type'=>$v_Key,'credit-name'=>$v_Credit);}}return array('credit-type'=>0,'credit-name'=>'');}
	// Function - Get Credit Word
	function f_GetCreditWord($v_Type){$a_Words=array('act1'=>'starring','act2'=>'starring','act3'=>'starring','artist'=>'drawn by','author'=>'written by','console_name'=>'for','m_artist'=>'by','narrator'=>'narrated by');return ((array_key_exists($v_Type,$a_Words))?$a_Words[$v_Type]:'');}
	// Function - Get Current Date
	function f_GetCurrentDate(){return date('Y-m-d',time());}
	// Function - Get Featured Database
	function f_GetFeaturedDatabase(){$v_DC=db::getInstance();$v_DC->Query('SELECT hfd.database_ID FROM hex_featured_database AS hfd LIMIT 1;');$a_Data=$v_DC->Format('row_array');$this->a_Parameters['featured-database']=$a_Data[0];}
	// Function - Get Calendar Data
	function f_GetCalendarData($v_Date){
		$a_Date=explode('-',$v_Date);
		$v_DC=db::getInstance();
		$a_SQL=$this->f_GetBaseSQL('events');
		$a_SQL['limit']='';
		$a_SQL['limit-extra']='';
		$a_SQL['where'].=' AND MONTH(ve.o_date)="'.$a_Date[1].'"';
		$v_SQL=implode('',$a_SQL);
		$v_DC->Query($v_SQL,true);
		$a_Results=$v_DC->Format('assoc_array');
		return json_encode($a_Results);
	}
	// Function - Get Month View
	function f_GetMonthView($v_IncludeColors=false,$a_Date=array(0,0,0)){
		foreach($a_Date as $v_Key=>$v_Date){$a_Date[$v_Key]=intval($v_Date);}
		$a_Data=array();
		$v_DC=db::getInstance();
		if($v_IncludeColors){
			$v_DC->Query('SELECT hln.month_view_color AS color FROM hex_library_names AS hln ORDER BY hln.id;');
			$a_Data['colors']=$v_DC->Format('row_array');
		}
		$a_Data['calendar']=array();
		$a_Data['calendar'][$a_Date[0]]=array();
		$a_Data['calendar'][$a_Date[0]][$a_Date[1]]=array();
		$a_SQL=$this->f_GetBaseSQL('events');
		$a_SQL['limit']='';
		$a_SQL['limit-extra']='';
		$a_SQL['where'].=' AND MONTH(ve.o_date)="'.$a_Date[1].'"';
		$v_SQL=implode('',$a_SQL);
		$v_DC->Query($v_SQL,true);
		if($v_DC->Count_res()>0){
			foreach($v_DC->Format('assoc_array') as $v_Key=>$a_Cell){
				$a_Data['calendar'][$a_Date[0]][$a_Date[1]][$a_Cell['day']][]=array('location_name'=>$a_Cell['library'],'comment'=>$a_Cell['start'],'name'=>$a_Cell['name'],'id'=>$a_Cell['ID'],'location_id'=>$a_Cell['library-ID'],'timeS'=>$a_Cell['start'],'timeE'=>$a_Cell['end']);             
			}
		}
		return json_encode($a_Data);
	}
	// Function - Get Page Information
	function f_GetPageInformation($v_Key='news'){
		$this->a_Log[]=array('type'=>'narrator','text'=>'Page data for '.$v_Key.' - Current Page: '.$this->a_Search[$v_Key]['current-page'].', Total Records: '.$this->a_Search[$v_Key]['total-records'].', Total Pages: '.$this->a_Search[$v_Key]['total-pages'].'.');
		return array(
			'current-page'=>$this->a_Search[$v_Key]['current-page'],
			'total-pages'=>$this->a_Search[$v_Key]['total-pages'],
			'total-records'=>$this->a_Search[$v_Key]['total-records']
		);
	}
	// Function - Get Popular Tags
	function f_GetPopularTags(){
		$a_PopularTags=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ht.ID, ht.name, (SELECT COUNT(*) FROM hex_popular_tags AS hpt2 WHERE hpt2.tag_ID=hpt.tag_ID AND DATE(hpt2.time_stamp)=CURDATE()) AS total FROM hex_popular_tags AS hpt LEFT JOIN hex_tags AS ht ON (ht.ID=hpt.tag_ID) WHERE DATE(hpt.time_stamp)=CURDATE() GROUP BY ht.ID ORDER BY total DESC LIMIT 10;');
		if($v_DC->Count_res()>0){
			$this->a_PopularTags=$v_DC->Format('assoc_array');
			return json_encode(array(
				'failed'=>false,
				'pointer'=>'popular-tags',
				'data'=>$this->a_PopularTags
			));
		}else{
			return json_encode(array(
				'failed'=>true,
				'pointer'=>'popular-tags'
			));
		}
	}
	// Function - Get Push List
	function f_GetPushList($v_Area='materials'){
		switch($v_Area){
			default:return;break;
			case 'databases':$v_PushType=410;break;
			case 'events':$v_PushType=220;break;
			case 'materials':$v_PushType=320;break;
			case 'news':$v_PushType=110;break;
		}
		$v_DC=db::getInstance();
		switch($v_PushType){
			case 110: // Suggest Articles II
				$this->a_FirstHeader[$v_Area]='Recent news';
				return ' vn.entered_on<=NOW()';
				break;
			case 220: // Suggest Events II
				$this->a_FirstHeader[$v_Area]='Upcoming events';
				return ' ve.o_date>=CURDATE()';
				break;
			case 320: // Suggest Materials III (by Material Type)
				$a_MaterialTypes=array(0=>'all materials',1=>'books',2=>'music',3=>'movies',4=>'video games',5=>'television shows',23=>'audio books',24=>'digital books',32=>'graphic novels',50=>'large print books',75=>'digital audio players',159=>'digital audio books');
				if($this->a_Search['materials']['type']['on']){
					$v_MaterialTag=$this->a_Search['materials']['type']['value'];
				}else{
					$v_Random=rand(1,11);
					//$v_Random=3;
					$a_MaterialTags=array(0,1,2,3,4,5,23,24,32,50,75,159);
					$v_MaterialTag=$a_MaterialTags[$v_Random];
					$this->f_ChangeSearch('materials','type',$v_MaterialTag);
					$this->a_AddClientTriggers[]='trigger-A';
					$this->a_AddClientTriggers[]='trigger-B';
					$this->a_AddClientTriggers[]='trigger-C';
					$this->a_AddClientChangeSearch[]=array('area'=>'materials','key'=>'type','value'=>$v_MaterialTag,'text'=>$a_MaterialTypes[$v_MaterialTag]);
				}
				$this->a_FirstHeader[$v_Area]=ucfirst($a_MaterialTypes[$v_MaterialTag]);
				if($v_MaterialTag==0){
					return '1,2,3,4,5,23,24,32,50,75,159';
				}else{
					return $v_MaterialTag;
				}
				break;
			case 410: // Suggest Databases II
				$this->a_FirstHeader[$v_Area]='Databases';
				break;
			default:
				break;
		}
	}
	/* Function - Get Tag Name */
	function f_GetTagName($v_TagID=0){$v_DC=db::getInstance();$v_DC->Query('SELECT name FROM hex_tags WHERE ID='.$v_TagID.';');$a_Data=$v_DC->Format('assoc');return $a_Data['name'];}
	/* Function - Get Similar Name Count */
	function f_GetSimilarNameCount($v_Name='',$v_Area=''){
		$v_Table='';
		switch($v_Area){
			case 'databases':$v_Table='hex_databases';break;
			case 'events':case 'materials':case 'news':$v_Table='viewable_'.$v_Area;break;
			default:return;break;
		}
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) AS `similar-name-count` FROM '.$v_Table.' WHERE name="'.$v_Name.'";');
		$a_Data=$v_DC->Format('assoc');
		return (($a_Data['similar-name-count']>1)?true:false);
	}
	// Function - Change Page
	function f_ChangePage($v_Area,$v_Page=1){$this->a_Search[$v_Area]['current-page']=$v_Page;}
	// Function - Perform Request
	function f_PerformRequest($v_Type='quick',$v_Area='materials',$v_Command='suggest',$v_Main='',$v_Secondary=''){
		$this->a_Log=array();
		$v_SameSearch=true;
		switch($v_Command){
			case 'change-popular':
				$v_Command='change-tag';
			case 'change-tag':
				$v_SameSearch=false;
				if($v_Main>0){$this->f_SetPopularTag($v_Main);}
			case 'change-search':case 'change-type':
				switch($v_Command){
					case 'change-tag':case 'change-type':$v_SameSearch=false;break;
					case 'change-search':if($v_Area=='materials'){$v_Main=urldecode($v_Main);}break;
					default:break;
				}
			case 'change-specific':
				$v_SameSearch=false;
			case 'change-date':case 'change-sort':
				$this->f_ChangeSearch($v_Area,str_replace('change-','',$v_Command),$v_Main);break;
			case 'change-page':
				$this->f_ChangePage($v_Area,$v_Main);
				$v_SameSearch=true;
				break;
			case 'reset':
				$this->f_ResetSearch($v_Area);
			default:$v_SameSearch=false;break;
		}
		switch($v_Command){
			case 'search':
				if($v_Main!==''){
					$v_Main=str_replace('%20',' ',$v_Main);
					$a_SearchList=explode(',',$v_Main);
					foreach($a_SearchList as $v_SearchKey=>$v_Search){
						$a_Search=explode('=',$v_Search);
						switch($a_Search[0]){
							case 'anticipated':case 'favorited':
								$this->f_ResetSearch($v_Area);
								$this->a_Search[$v_Area][$a_Search[0]]=!$this->a_Search[$v_Area][$a_Search[0]];
								break;
							case 'specific':
								$this->v_SpecificName=$this->f_GetSpecificName($v_Area,$a_Search[1]);
							case 'similar':
							case 'date':case 'search':case 'sort':case 'tag':case 'type':
								$this->f_ChangeSearch($v_Area,$a_Search[0],$a_Search[1]);
								break;
							case '':default:
								break;
						}
					}
					if(substr_count($v_Main,'similar')==0){$this->f_ChangeSearch($v_Area,'similar','');}
				}
			case 'change-specific':
			case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':case 'change-type':
			case 'change-page':
			case 'suggest':
			case 'reset':
				switch($v_Area){
					default:break;
					case 'databases':case 'events':case 'materials':case 'news':
						return $this->f_PushDataWithIDStorage($v_Area,$v_SameSearch);
						break;
					case 'hours':
						return $this->f_PushHours();
						break;
					case 'hiring':
						return $this->f_PushHiring();
						break;
				}
				break;
			case 'collect':break;
			case 'favorite':return $this->f_FavoriteItem($v_Area,$v_Main);break;
			case 'watched':return $this->f_AnticipateEvent($v_Main);break;
			case 'watchlist':break;
			default:break;
		}
	}
	/* Function - Get Specific Name */
	function f_GetSpecificName($v_Area='events',$v_ID=0){
		$v_DC=db::getInstance();
		$v_SQL='SELECT name FROM viewable_'.$v_Area.' WHERE ID='.$v_ID.';';
		$v_DC->Query($v_SQL);
		$v_Name=$v_DC->Format('row');
		if($v_DC->Count_res()>0){return $v_Name;}else{return '';}
	}
	/* Function - Favorite Item */
	function f_FavoriteItem($v_Area='materials',$v_ItemID=0){
		$v_UserID=$this->a_User['ID'];
		if($v_UserID==0){return;}
		$v_DC=db::getInstance();
		$a_FavoriteTypes=array('news'=>0,'events'=>1,'materials'=>2);
		$v_SQL='SELECT hf.user_ID FROM hex_favorites AS hf WHERE hf.user_ID='.$v_UserID.' AND hf.content_ID='.$v_ItemID.';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$v_Inserted=false;
			$v_SQL='DELETE FROM hex_favorites WHERE user_ID='.$v_UserID.' AND content_ID='.$v_ItemID.';';
		}else{
			$v_Inserted=true;
			$v_SQL='INSERT INTO hex_favorites (user_ID,favorite_type,content_ID) VALUES ('.$v_UserID.','.$a_FavoriteTypes[$v_Area].','.$v_ItemID.');';
		}
		$v_DC->Query($v_SQL);
		return json_encode(array('inserted'=>$v_Inserted));
	}
	/* Function - Anticipate Event */
	function f_AnticipateEvent($v_EventID=0){
		$v_UserID=$this->a_User['ID'];
		if($v_UserID==0){return;}
		$v_DC=db::getInstance();
		$v_SQL='SELECT hm.user_ID FROM hex_markers AS hm WHERE hm.user_ID='.$v_UserID.' AND hm.calendar_id='.$v_EventID.';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$v_Inserted=false;
			$v_SQL='DELETE FROM hex_markers WHERE user_ID='.$v_UserID.' AND calendar_id='.$v_EventID.';';
		}else{
			$v_Inserted=true;
			$v_SQL='INSERT INTO hex_markers (user_ID,calendar_id) VALUES ('.$v_UserID.','.$v_EventID.');';
		}
		$v_DC->Query($v_SQL);
		return json_encode(array('inserted'=>$v_Inserted));
	}
	/* Function - Push Hours */
	function f_PushHours(){
		$v_DC=db::getInstance();
		$v_SQL='SELECT hln.ID, hln.name FROM hex_library_names AS hln WHERE hln.ID<8 ORDER BY hln.ID;';
		$v_DC->Query($v_SQL);
		$a_Results=$v_DC->Format('assoc');
		$v_CurrentDayOfWeek=date('w',time());
		foreach($a_Results as $v_Key=>$a_Library){
			$v_SQL='SELECT hl.day_of_week AS `day-of-week`, DATE_FORMAT(hl.time_start,"%l:%i %p") AS `start-time`, DATE_FORMAT(hl.time_end,"%l:%i %p") AS `end-time` FROM hex_libraries AS hl WHERE hl.library_ID='.$a_Library['ID'].' ORDER BY hl.day_of_week;';
			$v_DC->Query($v_SQL);
			$a_Hours=$v_DC->Format('assoc');
			if(is_array($a_Hours)){
				foreach($a_Hours as $v_DayOfWeek=>$a_Data){
					if($a_Data['start-time']=='12:00 AM'){$a_Results[$v_Key]['time-'.$v_DayOfWeek]='Closed';}else{$a_Results[$v_Key]['time-'.$v_DayOfWeek]=$a_Data['start-time'].' - '.$a_Data['end-time'];}
					$a_Results[$v_Key]['date-'.$v_DayOfWeek]=date('Y-m-d',strtotime('+'.($v_DayOfWeek-$v_CurrentDayOfWeek).' days'));
					$a_Results[$v_Key]['date-words-'.$v_DayOfWeek]=date('M jS',strtotime('+'.($v_DayOfWeek-$v_CurrentDayOfWeek).' days'));
				}
			}
			$a_Results[$v_Key]['ID']++;
			$a_Results[$v_Key]['counter']=$v_Key;
			$a_Results[$v_Key]['current-day-of-week']=$v_CurrentDayOfWeek;
			$a_LibraryData=F_GetLibraryInformation();
			$a_Results[$v_Key]['street']=$a_LibraryData['street'];
			$a_Results[$v_Key]['city-state']=$a_LibraryData['city-state'];
			$a_Results[$v_Key]['zip']=$a_LibraryData['zip'];
			$a_Results[$v_Key]['phone']=$a_LibraryData['phone'];
			$a_Results[$v_Key]=array_merge($a_Results[$v_Key],F_GetLibraryInformation($v_Key));
		}
		return json_encode(array(
			'alias'=>'hours',
			'client-changes'=>$this->f_GetClientChanges(),
			'triggers'=>$this->f_GetClientTriggers(),
			'data'=>$a_Results,
			'header'=>'Library hours and locations.',
			'page'=>$this->f_GetPageInformation('hours'),
			'switch'=>'data'
		));
	}
	/* Function - Get Promotions */
	function f_GetPromotions(){
		$a_Files=array();
		$v_Counter=0;
		if($v_Directory=opendir('promotions/')){
			while(false!==($v_File=readdir($v_Directory))){
				if($v_File!= '.'&&$v_File!= '..'){
					if(substr_count($v_File,'.png')>0){
						$a_Files[$v_Counter]=array(
							'counter'=>$v_Counter,
							'file-name'=>$v_File
						);
						$v_Counter++;
					}
				}
    		}
			closedir($v_Directory);
		}
		return json_encode(array('data'=>$a_Files));
	}
	/* Function - Push Hiring */
	function f_PushHiring(){
		$a_Files=array();
		$v_Counter=0;
		if($v_Directory=opendir('lapcat/jobs/')){
			while(false!==($v_File=readdir($v_Directory))){
				if($v_File!= '.'&&$v_File!= '..'){
					if(substr_count($v_File,'.pdf')>0){
						$a_Files[$v_Counter]=array(
							'counter'=>$v_Counter,
							'file-name'=>$v_File,
							'name'=>str_replace('.pdf','',str_replace('-',' ',$v_File))
						);
						$v_Counter++;
					}
				}
    		}
			closedir($v_Directory);
		}
		return json_encode(array(
			'alias'=>'hiring',
			'client-changes'=>$this->f_GetClientChanges(),
			'triggers'=>$this->f_GetClientTriggers(),
			'data'=>$a_Files,
			'header'=>'Employment opportunities.',
			'page'=>$this->f_GetPageInformation('hiring'),
			'switch'=>'data'
		));
	}
	/* Function - Reset Search */
	function f_ResetSearch($v_Area='databases'){
		$this->a_Search[$v_Area]=array(
			'similar'=>array('on'=>false,'value'=>''),
			'specific'=>array('on'=>false,'value'=>''),
			'date'=>array('on'=>false,'value'=>''),
			'type'=>array('on'=>false,'value'=>''),
			'popular'=>array('on'=>false,'value'=>''),
			'search'=>array('on'=>false,'value'=>''),
			'sort'=>array('on'=>false,'value'=>''),
			'tag'=>array('on'=>false,'value'=>''),
			'anticipated'=>false,
			'favorited'=>false,
			'current-page'=>1,
			'current-target'=>0,
			'favorites'=>array('initialized'=>false,'on'=>false,'data'=>array()),
			'maximum-records'=>10,
			'total-pages'=>0,
			'total-records'=>0
		);
		if($v_Area=='materials'){$this->a_Search[$v_Area]['maximum-records']=12;}
	}
	// Function - Reset All Searches
	function f_ResetAllSearches(){
		$this->v_ResetSearchCounter++;
		foreach(array('databases','events','hiring','hours','news','materials') as $v_Key=>$v_Area){
			$this->f_ResetSearch($v_Area);
		}
	}
	// Function - Set IP
	function f_SetIP($v_IP=''){$a_IP=$v_IP.explode('.',$v_IP,4);$this->A_User['IP']=(intval($a_IP[0])*pow(2,24))+(intval($a_IP[1])*pow(2,16))+(intval($a_IP[2])*pow(2,8))+intval($a_IP[3]);}
	// Function - Set Popular Tag
	function f_SetPopularTag($v_TagID=0){
		if(!array_key_exists($v_TagID,$this->a_ClickedOnTags)){
			$this->a_ClickedOnTags[$v_TagID]=true;
			$a_Date=explode('-',date('d-m-Y'));
			$v_DC=db::getInstance();
			$v_DC->Query('SELECT COUNT(*) AS total FROM hex_popular_tags WHERE tag_ID='.$v_TagID.' AND ip_address='.$this->A_User['IP'].' AND DAY(time_stamp)='.$a_Date[0].' AND MONTH(time_stamp)='.$a_Date[1].' AND YEAR(time_stamp)='.$a_Date[2].';');
			$a_Data=$v_DC->Format('assoc');
			if($a_Data['total']==0){$v_DC->Query('INSERT INTO hex_popular_tags (tag_ID,ip_address) VALUES ('.$v_TagID.','.$this->A_User['IP'].');');}
		}
		return;
	}
	// Function - Validate
	function f_Validate($v_Validated=false){$this->v_Validated=$v_Validated;}
}
/* Function - Get Library Name */
function F_GetLibraryName($v_ID=0){
	$a_LibraryNames=array(
		1=>'Main Library',
		2=>'Coolspring',
		3=>'Fish Lake',
		4=>'Hanna',
		5=>'Kingsford Heights',
		6=>'Rolling Prairie',
		7=>'Union Mills',
		8=>'Mobile Library'
	);
	return $a_LibraryNames[$v_ID];
}
/* Function - Get Library Information */
function F_GetLibraryInformation($v_LibraryID=0){
	switch($v_LibraryID){
		case 0:return array('street'=>'904 Indiana Avenue','city-state'=>'La Porte, IN','zip'=>'46350','phone'=>'(219) 362-6156','email'=>'union@lapcat.org');break;
		case 1:return array('street'=>'7089 West 400 North','city-state'=>'Michigan City, IN','zip'=>'46360','phone'=>'(219) 879-3272','email'=>'coolspring@lapcat.org');break;
		case 2:return array('street'=>'7981 E. St. Rd. 4 (P.O. Box 125)','city-state'=>'Walkerton, IN','zip'=>'46574','phone'=>'(219) 369-1337','email'=>'fishlake@lapcat.org');break;
		case 3:return array('street'=>'202 North Thompson St. (P.O. Box 78)','city-state'=>'Hanna, IN','zip'=>'46340','phone'=>'(219) 797-4735','email'=>'hanna@lapcat.org');break;
		case 4:return array('street'=>'436 Evanston (P.O. Box 219)','city-state'=>'Kingsford Heights, IN','zip'=>'46346','phone'=>'(219) 393-3280','email'=>'kingsford@lapcat.org');break;
		case 5:return array('street'=>'1 East Michigan Avenue (P.O. Box 157)','city-state'=>'Rolling Prairie, IN','zip'=>'46371','phone'=>'(219) 778-2390','email'=>'rolling@lapcat.org');break;
		case 6:return array('street'=>'3727 West 800 South (P.O. Box 98)','city-state'=>'Union Mills, IN','zip'=>'46382','phone'=>'(219) 767-2604','email'=>'union@lapcat.org');break;
		case 7:return array('street'=>'','city-state'=>'','zip'=>'','phone'=>'(219) 362-6156');break;
		case 8:default:return array();break;
	}
}
?>