<?
class LAPCAT{
	// Function - LAPCAT
	function LAPCAT($v_ID=0,$v_IP='',$v_MessageFilter=false){
		$this->a_User['ID']=$v_ID;
		$this->a_Parameters['message-filter']=$v_MessageFilter;
		$this->f_GetFeaturedDatabase();
		$this->f_SetIP($v_IP);
	}
	// Array - Add Client Change Search To JSON
	private $a_AddClientChangeSearchToJSON=array();
	// Array - Add Client Client Trigger
	private $a_AddClientTriggers=array();
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
	// Variable - Validated
	private $v_Validated=false;
	// Function - Calculate Limit
	function f_CalculateLimit($v_Area='news'){return (($this->a_Search[$v_Area]['current-page']-1)*$this->a_Search[$v_Area]['maximum-records']).','.$this->a_Search[$v_Area]['maximum-records'];}
	// Function - Change Search
	function f_ChangeSearch($v_Area='news',$v_Key='date',$v_Value=''){$this->a_Search[$v_Area][$v_Key]=array('on'=>(($v_Value!=='')?true:false),'value'=>$v_Value);}
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
					'select'=>'SELECT hd.ID, hd.name, hd.description, hd.link_in AS `link-in`, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
					'from'=>' FROM hex_databases AS hd LEFT JOIN hex_tags_by_database AS htbd ON (htbd.ID=hd.ID) LEFT JOIN hex_tags AS ht ON (htbd.tag_ID=ht.ID)',
					'where'=>'',
					'group'=>' GROUP BY hd.ID',
					'order'=>' ORDER BY hd.name ASC',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->f_CalculateLimit($v_Area).';'
				);
				break;
			case 'events':
				$a_SQL=array(
					'select'=>'SELECT ve.ID, ve.name, (ve.o_place+1) AS `library-ID`, DAY(ve.o_date) AS day, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%b %D") AS `date-words`, ve.start, ve.end, IFNULL(ht.ID, 0) AS `tag-ID`, IFNULL(ht.name, "") AS `tag-name`, ve.summer, ve.slider, ve.tournament',
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
					'select'=>'SELECT vm.ID, vm.ISBNorSN, vm.name, vm.sub_name AS `sub-name`, vm.rating, vm.year AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
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
					'select'=>'SELECT vn.ID, vn.text AS description, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%b %D") AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
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
	function f_GetClientChanges(){$a_Changes=$this->a_AddClientChangeSearchToJSON;$this->a_AddClientChangeSearchToJSON=array();return $a_Changes;}
	// Function - Get Client Triggers
	function f_GetClientTriggers(){$a_Triggers=$this->a_AddClientTriggers;$this->a_AddClientTriggers=array();return $a_Triggers;}
	// Function - Get Credits
	function f_GetCredits($a_Row){foreach($a_Row as $v_Key=>$v_Credit){if($v_Credit!==''&&$v_Credit!==' '){return array('credit-type'=>$v_Key,'credit-name'=>$v_Credit);}}return array('credit-type'=>0,'credit-name'=>'');}
	// Function - Get Credit Word
	function f_GetCreditWord($v_Type){$a_Words=array('act1'=>'starring','act2'=>'starring','act3'=>'starring','artist'=>'drawn by','author'=>'written by','developer'=>'published by','m_artist'=>'by','narrator'=>'narrated by');return ((array_key_exists($v_Type,$a_Words))?$a_Words[$v_Type]:'by');}
	// Function - Get Current Date
	function f_GetCurrentDate(){return date('Y-m-d',time());}
	// Function - Get Featured Database
	function f_GetFeaturedDatabase(){$v_DC=db::getInstance();$v_DC->Query('SELECT hfd.database_ID FROM hex_featured_database AS hfd LIMIT 1;');$a_Data=$v_DC->Format('row_array');$this->a_Parameters['featured-database']=$a_Data[0];}
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
		return array(
			'current-page'=>$this->a_Search[$v_Key]['current-page'],
			'total-pages'=>$this->a_Search[$v_Key]['total-pages'],
			'total-records'=>$this->a_Search[$v_Key]['total-records']
		);
	}
	// Function - Get Popular Tags
	function F_GetPopularTags(){
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
				$this->a_FirstHeader[$v_Area]='Recent news and articles';
				return ' vn.entered_on<=NOW()';
				break;
			case 220: // Suggest Events II
				$this->a_FirstHeader[$v_Area]='Upcoming events';
				return ' ve.o_date>=CURDATE()';
				break;
			case 320: // Suggest Materials III (by Material Type)
				$a_MaterialTypes=array(1=>'books',2=>'music',3=>'movies',4=>'video games',5=>'television shows',23=>'audio books',24=>'digital books',32=>'graphic novels',50=>'large print books',75=>'digital audio players');
				if($this->a_Search['materials']['type']['on']){
					$v_MaterialTag=$this->a_Search['materials']['type']['value'];
				}else{
					$v_Random=rand(0,9);
					$a_MaterialTags=array(1,2,3,4,5,23,24,32,50,75);
					$v_MaterialTag=$a_MaterialTags[$v_Random];
					$this->f_ChangeSearch('materials','type',$v_MaterialTag);
					$this->a_AddClientTriggers[]='show-previous-next';
					$this->a_AddClientChangeSearchToJSON[]=array('area'=>'materials','search'=>'type','value'=>$v_MaterialTag);
				}
				$this->a_FirstHeader[$v_Area]=ucfirst($a_MaterialTypes[$v_MaterialTag]);
				return $v_MaterialTag;
			case 410: // Suggest Databases II
				$this->a_FirstHeader[$v_Area]='Databases';
				break;
			default:
				break;
		}
	}
	// Function - Get Tag Name
	function f_GetTagName($v_TagID=0){$v_DC=db::getInstance();$v_DC->Query('SELECT name FROM hex_tags WHERE ID='.$v_TagID.';');$a_Data=$v_DC->Format('assoc');return $a_Data['name'];}
	// Function - Perform Request
	function f_PerformRequest($v_Type='quick',$v_Area='materials',$v_Command='suggest',$v_Main='',$v_Secondary=''){
		$v_SameSearch=true;
		switch($v_Command){
			case 'change-search':case 'change-type':case 'change-tag':
				switch($v_Command){
					case 'change-search':if($v_Area=='materials'){$v_Main=urldecode($v_Main);}break;
					case 'change-type':case 'change-tag':$v_SameSearch=false;break;
					default:break;
				}
			case 'change-date':case 'change-popular':case 'change-sort':
				$this->f_ChangeSearch($v_Area,str_replace('change-','',$v_Command),$v_Main);break;
			case 'change-page':break;
			default:$v_SameSearch=false;break;
		}
		switch($v_Command){
			case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':case 'change-type':
			case 'change-page':
			case 'suggest':
				switch($v_Area){
					default:break;
					case 'databases':case 'events':case 'materials':case 'news':
						return $this->f_PushData($v_Area,$v_SameSearch);
						break;
				}
				break;
			default:break;
		}
	}
	// Function - Push Data
	function f_PushData($v_Area='materials',$v_SameSearch=false){
		$v_DC=db::getInstance();
		$a_Data=array();
		if($v_SameSearch){
			$a_SQL=$this->a_PreviousSQL[$v_Area];
		}else{
			$a_SQL=$this->f_GetBaseSQL($v_Area);
			$this->a_PreviousSQL[$v_Area]=$a_SQL;
		}
		$v_ExtraHeader='';
		switch($v_Area){
			default:return;break;
			case 'databases':
				$v_SQL='SELECT COUNT(hd.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Tag */
				if($this->a_Search['databases']['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['databases']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_database AS htbd2 ON(htbd2.ID=hd.ID)';
					$a_SQL['where']=' WHERE htbd2.tag_ID IN('.$this->a_Search['databases']['tag']['value'].')';
				}
				break;
			case 'news':
				$v_SQL='SELECT COUNT(vn.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Tag */
				if($this->a_Search['news']['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['news']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_article AS htba2 ON(htba2.ID=vn.ID)';
					$a_SQL['where'].=' AND htba2.tag_ID IN('.$this->a_Search['news']['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search['news']['date']['on']){
					$v_ExtraHeader.=' released on '.$this->a_Search['news']['date']['value'];
					$a_SQL['where'].=' AND  DATE(vn.entered_on)="'.$this->a_Search['news']['date']['value'].'"';
				}
				/* Search */
				if($this->a_Search['news']['search']['on']){
					$v_ExtraHeader.=' by '.$this->a_Search['news']['search']['value'];
					$a_SQL['where'].=' AND vn.username="'.$this->a_Search['news']['search']['value'].'"';
				}
				break;
			case 'events':
				$v_SQL='SELECT COUNT(ve.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Tag */
				if($this->a_Search['events']['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['events']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_event AS htbe2 ON(htbe2.ID=ve.ID)';
					$a_SQL['where'].=' AND htbe2.tag_ID IN('.$this->a_Search['events']['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search['events']['date']['on']){
					$v_ExtraHeader.=' scheduled for '.$this->a_Search['events']['date']['value'];
					$a_SQL['where'].=' AND DATE(ve.o_date)="'.$this->a_Search['events']['date']['value'].'"';
				}
				/* Search */
				switch($this->a_Search['events']['search']['value']){
					case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:case 9:
						$v_ExtraHeader.=' at '.F_GetLibraryName($this->a_Search['events']['search']['value']);
						$a_SQL['where'].=' AND ve.o_place='.($this->a_Search['events']['search']['value']-1);
						break;
					default:
						break;
				}
				break;
			case 'materials':
				$v_SQL='SELECT COUNT(vm.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				switch($this->a_Search['materials']['sort']['value']){
					case 1:$a_SQL['order']=' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC';break;
					case 2:$a_SQL['order']=' ORDER BY vm.rating DESC, vm.year DESC, vm.name ASC';break;
					case 3:$a_SQL['order']=' ORDER BY vm.name ASC, vm.year DESC, vm.rating DESC';break;
					case 4:$a_SQL['order']=' ORDER BY vm.name DESC, vm.year DESC, vm.rating DESC';break;
					default:break;
				}
				/* Search */
				if($this->a_Search['materials']['search']['on']){
					$a_Credits=array('author','act1','act2','act3','artist','writer','narrator','m_artist','developer');
					$a_SQL['where'].=' AND (';
					$v_Counter=0;
					foreach($a_Credits as $v_Key=>$v_CreditType){
						if($v_Counter>0){$a_SQL['where'].=' OR ';}
						$a_SQL['where'].='vm.'.$v_CreditType.'="'.$this->a_Search['materials']['search']['value'].'"';
						$v_Counter++;
					}
					$a_SQL['where'].=')';
				}
				/* Tag */
				if($this->a_Search['materials']['tag']['on']){
					$v_ExtraHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['materials']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_material AS htbm2 ON(htbm2.ID=vm.ID)';
					$a_SQL['where'].=' AND htbm2.tag_ID IN('.$this->a_Search['materials']['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search['materials']['date']['on']){
					$v_ExtraHeader.=' released in '.$this->a_Search['materials']['date']['value'];
					$a_SQL['where'].=' AND vm.year="'.$this->a_Search['materials']['date']['value'].'"';
				}
				break;
		}
		$v_DC->Query(implode('',$a_SQL),true);
		$a_Data=$v_DC->Format('assoc_array');
		$v_DC->Query($v_SQL,true);
		$a_Page=$v_DC->Fetch('assoc');
		$this->a_Search[$v_Area]['total-records']=$a_Page['total'];
		$this->a_Search[$v_Area]['total-pages']=FF_CalculateTotal($a_Page['total'],$this->a_Search[$v_Area]['maximum-records']);
		if(empty($a_Data)){
			$v_ExtraHeader=$this->a_PreviousHeader[$v_Area];
			return json_encode(array(
				'alias'=>$v_Area,
				'client-changes'=>$this->f_GetClientChanges(),
				'client-triggers'=>$this->f_GetClientTriggers(),
				'switch'=>'failed',
				'header'=>$this->a_FirstHeader[$v_Area].$v_ExtraHeader.'.'
			));
		}else{
			$a_OpenLineData=array();
			$a_RowIDs=array();
			foreach($a_Data as $v_Key=>$a_Line){
				$a_Data[$v_Key]['counter']=$v_Key;
				$a_RowIDs[$v_Key]=$a_Line['ID'];
				//$a_OpenLineData[$v_Key]=$this->F_GetOpenLine($v_Area,$a_Data[$v_Key]['ID']);
			}
			if($v_Area=='materials'){
				$v_DC->Query('SELECT author, act1, act2, act3, artist, writer, narrator, m_artist, developer FROM viewable_materials WHERE ID IN('.implode(',',$a_RowIDs).') ORDER BY FIELD(ID, '.implode(',',$a_RowIDs).');');
				$a_IDs=$v_DC->Fetch('assoc_array');
				foreach($a_Data as $v_Key=>$a_Line){
					$a_Credits=$this->f_GetCredits($a_IDs[$v_Key]);
					$a_Data[$v_Key]['credit-name']=$a_Credits['credit-name'];
					$a_Data[$v_Key]['credit-word']=$this->f_GetCreditWord($a_Credits['credit-type']);
					$a_Data[$v_Key]['credit-type']=$a_Credits['credit-type'];
					if($a_Credits['credit-name']==''){$a_Data[$v_Key]['class-A']='hide-username';}
				}
				if($this->a_Search['materials']['search']['on']){
					$v_ExtraHeader=$v_ExtraHeader.' '.$a_Data[0]['credit-word'].' '.ucwords($a_Data[0]['credit-name']);
				}
			}
			$this->a_PreviousHeader[$v_Area]=$v_ExtraHeader;
			return json_encode(array(
				'alias'=>$v_Area,
				'switch'=>'data',
				'data'=>$a_Data,
				'client-changes'=>$this->f_GetClientChanges(),
				'client-triggers'=>$this->f_GetClientTriggers(),
				'header'=>$this->a_FirstHeader[$v_Area].$v_ExtraHeader.'.',
				'page'=>$this->f_GetPageInformation($v_Area)
			));
		}
	}
	// Function - Reset All Searches
	function f_ResetAllSearches(){
		foreach(array('databases','events','news','materials') as $v_Key=>$v_Area){
			$this->a_Search[$v_Area]=array(
				'similar'=>false,
				'specific'=>false,
				'date'=>array('on'=>false,'value'=>''),
				'type'=>array('on'=>false,'value'=>''),
				'popular'=>array('on'=>false,'value'=>''),
				'search'=>array('on'=>false,'value'=>''),
				'sort'=>array('on'=>false,'value'=>''),
				'tag'=>array('on'=>false,'value'=>''),
				'current-page'=>1,
				'current-target'=>0,
				'favorites'=>array('initialized'=>false,'on'=>false,'data'=>array()),
				'maximum-records'=>10,
				'total-pages'=>0,
				'total-records'=>0
			);
		}
	}
	// Function - Set IP
	function f_SetIP($v_IP=''){$a_IP=$v_IP.explode('.',$v_IP,4);$this->A_User['IP']=(intval($a_IP[0])*pow(2,24))+(intval($a_IP[1])*pow(2,16))+(intval($a_IP[2])*pow(2,8))+intval($a_IP[3]);}
	// Function - Validate
	function f_Validate($v_Validated=false){$this->v_Validated=$v_Validated;}
}
//
// Function - Get Library Name
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
?>