<?
class LAPCAT{
	// Array - Search
	private $a_Search=array();
	// Array - Prevoius Header
	private $a_PreviousHeader=array('materials'=>'','events'=>'','news'=>'','databases'=>'');
	/* Array - Parameters */
	private $a_Parameters=array('featured-article'=>0,'featured-database'=>0,'message-filter'=>false);
	// Array - Prevoius SQL
	private $a_PreviousSQL=array('materials'=>'','events'=>'','news'=>'','databases'=>'');
	// Array - Add Client Change Search To JSON
	private $a_AddClientChangeSearchToJSON=array();
	// Array - Add Client Client Trigger
	private $a_AddClientTriggers=array();
	// Function - Calculate Limit
	function f_CalculateLimit($v_Area='news'){return (($this->a_Search[$v_Area]['current-page']-1)*$this->a_Search[$v_Area]['maximum-records']).','.$this->a_Search[$v_Area]['maximum-records'];}
	// Function - Change Search
	function f_ChangeSearch($v_Area='news',$v_Key='date',$v_Value=''){$this->a_Search[$v_Area][$v_Key]=array('on'=>(($v_Value!=='')?true:false),'value'=>$v_Value);}
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
					'select'=>'SELECT ve.ID, ve.name, (ve.o_place+1) AS `library-ID`, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%b %D") AS `date-words`, ve.start, IFNULL(ht.ID, 0) AS `tag-ID`, IFNULL(ht.name, "") AS `tag-name`, ve.summer, ve.slider, ve.tournament',
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
					'select'=>'SELECT vn.ID, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%b %D") AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
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
				$this->a_Search['news']['header']='Recent news and articles';
				return ' vn.entered_on<=NOW()';
				break;
			case 220: // Suggest Events II
				$this->a_Search['events']['header']='Upcoming events';
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
				$this->a_Search['materials']['header']=ucfirst($a_MaterialTypes[$v_MaterialTag]);
				return $v_MaterialTag;
			case 410: // Suggest Databases II
				$this->a_Search['databases']['header']='Databases';
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
		$v_FirstHeader=$this->a_Search[$v_Area]['header'];
		$v_SecondHeader='';
		switch($v_Area){
			default:return;break;
			case 'databases':
				$v_SQL='SELECT COUNT(hd.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Tag */
				if($this->a_Search['databases']['tag']['on']){
					$v_SecondHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['databases']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_database AS htbd2 ON(htbd2.ID=hd.ID)';
					$a_SQL['where']=' WHERE htbd2.tag_ID IN('.$this->a_Search['databases']['tag']['value'].')';
				}
				break;
			case 'news':
				$v_SQL='SELECT COUNT(vn.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Tag */
				if($this->a_Search['news']['tag']['on']){
					$v_SecondHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['news']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_article AS htba2 ON(htba2.ID=vn.ID)';
					$a_SQL['where'].=' AND htba2.tag_ID IN('.$this->a_Search['news']['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search['news']['date']['on']){
					$v_SecondHeader.=' released on '.$this->a_Search['news']['date']['value'];
					$a_SQL['where'].=' AND  DATE(vn.entered_on)="'.$this->a_Search['news']['date']['value'].'"';
				}
				/* Search */
				if($this->a_Search['news']['search']['on']){
					$v_SecondHeader.=' by '.$this->a_Search['news']['search']['value'];
					$a_SQL['where'].=' AND vn.username="'.$this->a_Search['news']['search']['value'].'"';
				}
				break;
			case 'events':
				$v_SQL='SELECT COUNT(ve.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				/* Tag */
				if($this->a_Search['events']['tag']['on']){
					$v_SecondHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['events']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_event AS htbe2 ON(htbe2.ID=ve.ID)';
					$a_SQL['where'].=' AND htbe2.tag_ID IN('.$this->a_Search['events']['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search['events']['date']['on']){
					$v_SecondHeader.=' scheduled for '.$this->a_Search['events']['date']['value'];
					$a_SQL['where'].=' AND DATE(ve.o_date)="'.$this->a_Search['events']['date']['value'].'"';
				}
				/* Search */
				switch($this->a_Search['events']['search']['value']){
					case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:case 9:
						$v_SecondHeader.=' at '.F_GetLibraryName($this->a_Search['events']['search']['value']);
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
					$v_SecondHeader.=' tagged as '.$this->f_GetTagName($this->a_Search['materials']['tag']['value']);
					$a_SQL['from'].=' LEFT JOIN hex_tags_by_material AS htbm2 ON(htbm2.ID=vm.ID)';
					$a_SQL['where'].=' AND htbm2.tag_ID IN('.$this->a_Search['materials']['tag']['value'].')';
				}
				/* Date */
				if($this->a_Search['materials']['date']['on']){
					$v_SecondHeader.=' released in '.$this->a_Search['materials']['date']['value'];
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
			$v_SecondHeader=$this->a_PreviousHeader[$v_Area];
			return json_encode(array(
				'alias'=>$v_Area,
				'client-changes'=>$this->f_GetClientChanges(),
				'client-triggers'=>$this->f_GetClientTriggers(),
				'switch'=>'failed',
				'header'=>$v_FirstHeader.$v_SecondHeader.'.'
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
					$v_SecondHeader=$v_SecondHeader.' '.$a_Data[0]['credit-word'].' '.ucwords($a_Data[0]['credit-name']);
				}
			}
			$this->a_PreviousHeader[$v_Area]=$v_SecondHeader;
			return json_encode(array(
				'alias'=>$v_Area,
				'switch'=>'data',
				'data'=>$a_Data,
				'client-changes'=>$this->f_GetClientChanges(),
				'client-triggers'=>$this->f_GetClientTriggers(),
				'header'=>$v_FirstHeader.$v_SecondHeader.'.',
				'page'=>$this->F_GetPageInformation($v_Area)
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
				'header'=>'',
				'maximum-records'=>10,
				'total-pages'=>0,
				'total-records'=>0
			);
		}
	}






















	//
	// Function - Push Events
	function F_PushEvents($v_Cell='browse',$v_RSS=false,$v_Tags=false,$v_SQLRequest=false,$a_Date=array(0,0,0)){
	$v_DC=db::getInstance();
		$a_SQL=array(
			'select-start'=>'SELECT',
			'select-base'=>' "'.$this->V_Area.'" AS area, ve.counted, ve.ID,'.(($v_RSS)?' ve.description AS text,':'').' ve.name, ve.o_place, ve.library, ve.o_date, ve.start, ve.end, ve.summer, ve.slider, ve.tournament, DATE_FORMAT(ve.o_date,"%W, %M %D") AS `date-words` ',
			'from-start'=>' FROM',
			'from-base'=>' viewable_events AS ve',
			'where-start'=>' WHERE',
			'where-base'=>' DATE(ve.o_date)>="'.$this->f_GetCurrentDate().'"',
			'where-tag'=>'',
			'where-search'=>'',
			'where-date'=>'',
			'where-specific'=>'',
			'where-similar'=>'',
			'group-by'=>' GROUP BY ve.ID',
			'order-start'=>' ORDER BY',
			'order-base'=>' ve.o_date ASC, ve.start ASC, ve.counted DESC'
		);
		// SQL - Where
		if($this->a_Search['events']['tag']['on']){
			$v_SQL='SELECT DISTINCT(htbe.ID) FROM hex_tags_by_event AS htbe WHERE htbe.tag_ID='.$this->a_Search['events']['tag']['ID'].';';
			$v_DC->Query($v_SQL,true);
			if($v_DC->Count_res()>0){
				$a_SQL['where-tag']=' AND ve.ID IN ('.implode(',',$v_DC->Format('row_array')).')';
			}else{
				$a_SQL['where-tag']=' AND ve.ID IN (0)';
			}
		}
		if($this->a_Search['events']['date']['on']){$a_SQL['where-date']=' AND DATE(ve.o_date)="'.$this->a_Search['events']['date']['value'].'"';}
		//if($this->a_Search['events']['specific']['on']){$a_SQL['where-specific']=' AND ve.ID="'.$this->a_Search['events']['specific']['ID'].'"';
		//}elseif($this->a_Search['events']['similar']['on']){$a_SQL['where-similar']=' AND ve.name="'.$this->a_Search['events']['similar']['name'].'"';}
		if($this->a_Search['events']['search']['on']){
			switch($this->a_Search['events']['search']['value']){
				case 0:default:$a_SQL['where-search']='';break;
				case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:$a_SQL['where-search']=' AND ve.o_place='.($this->a_Search['events']['search']['value']-1);break;
			}
		}
		// SQL - Order
		switch($this->a_Search['events']['sort']['value']){
			case 0:default:$a_SQL['order-base']=' ve.o_date ASC, ve.start ASC, ve.counted DESC';break;
			case 1:$a_SQL['order-base']=' ve.counted DESC, ve.o_date ASC, ve.start ASC';break;
			case 2:$a_SQL['order-base']=' ve.name ASC, ve.o_date ASC, ve.start ASC';break;
			case 3:$a_SQL['order-base']=' ve.name DESC, ve.o_date ASC, ve.start ASC';break;
		}
		if($v_SQLRequest){
			$a_SQL['select-base']=' ve.ID, ve.name, ve.description AS comment, ve.library AS location_name, DAY(ve.o_date) AS day, ve.start AS start_time, ve.end AS end_time, ve.o_place AS location_id';
			//$a_SQL['where-base']=' YEAR(ve.o_date)='.$a_Date[0].' AND MONTH(ve.o_date)='.$a_Date[1];
			return implode('',$a_SQL);
		}
		$v_SQL='';
		$v_DC->Query(implode('',$a_SQL),true);
		$a_Data=$v_DC->Format('assoc_array');
		if($v_Tags&&!empty($a_Data)){
			foreach($a_Data as $v_Key=>$a_Cell){
				if($a_Cell['ID']){$a_Data[$v_Key]['tag-set']=$this->F_GetTags($a_Cell['ID'],'event');}
			}
		}
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>$v_Cell,
				'switch'=>'failed',
				'header'=>$this->a_Search['events']['header']
			));
		}else{
			$a_OpenLineData=array();
			foreach($a_Data as $v_Key=>$a_Line){$a_OpenLineData[$v_Key]=$this->F_GetOpenLine('events',$a_Data[$v_Key]['ID']);}
			return json_encode(array(
				'alias'=>'events',
				'switch'=>'data',
				'data'=>$a_Data,
				'open-line-data'=>$a_OpenLineData,
				'header'=>$this->a_Search['events']['header'],
				'page'=>$this->F_GetPageInformation('events')
			));
		}
	}
	//
	// Function - Push News
	function F_PushNews($v_RSS=false,$v_Tags=false){
		$v_DC=db::getInstance();
		$a_SQL=array(
			'select-start'=>'SELECT',
			'select-base'=>' "'.$this->V_Area.'" AS area, vn.ID, vn.name,'.(($v_RSS)?' vn.text,':'').' vn.duration, vn.library_ID, vn.entered_by_ID, vn.entered_on, vn.username, vn.image_path, DATE_FORMAT(vn.entered_on,"%W, %M %D") AS `date-words`, ht.name AS `tag-name`',
			'from-start'=>' FROM',
			'from-base'=>' viewable_news AS vn LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID) LEFT JOIN hex_tags AS ht ON (htba.tag_ID=ht.ID)',
			'where-start'=>' WHERE',
			'where-base'=>' (DATE_ADD(vn.entered_on, INTERVAL vn.duration DAY)>="'.$this->f_GetCurrentDate().'" OR vn.duration=0)',
			'where-tag'=>'',
			'where-date'=>'',
			'where-person'=>'',
			'where-specific'=>'',
			'where-similar'=>'',
			'group-by'=>' GROUP BY vn.ID',
			'order-start'=>' ORDER BY',
			'order-base'=>' vn.duration DESC, vn.entered_on DESC',
			'limit-start'=>' LIMIT',
			'limit-base'=>' '.$this->f_CalculateLimit('news').';'
		);
		// SQL - Where
		if($this->a_Search['tag']['on']){
			$v_SQL='SELECT DISTINCT(htba.ID) FROM hex_tags_by_article AS htba WHERE htba.tag_ID='.$this->a_Search['tag']['ID'].';';
			$v_DC->Query($v_SQL,true);
			if($v_DC->Count_res()>0){
				$a_SQL['where-tag']=' AND vn.ID IN ('.implode(',',$v_DC->Format('row_array')).')';
			}else{
				$a_SQL['where-tag']=' AND vn.ID IN (0)';
			}
		}
		if($this->a_Search['news']['calendar']['on']){$a_SQL['where-date']=' AND DATE(vn.entered_on)="'.$this->a_Search['news']['calendar']['date'].'"';}
		if($this->a_Search['news']['person']['on']){$a_SQL['where-person']=' AND vn.entered_by_ID='.$this->a_Search['news']['person']['ID'];}
		if($this->a_Search['news']['specific']['on']){$a_SQL['where-specific']=' AND vn.ID="'.$this->a_Search['news']['specific']['ID'].'"';
		}elseif($this->a_Search['news']['similar']['on']){$a_SQL['where-similar']=' AND vn.name="'.$this->a_Search['news']['similar']['name'].'"';}
		// SQL - Order
		switch($this->a_Search['news']['sort']['value']){
			case 0:default:$a_SQL['order-base']=' vn.duration DESC, vn.entered_on DESC, vn.name ASC';break;
			case 1:$a_SQL['order-base']=' vn.name ASC, vn.duration DESC, vn.entered_on DESC';break;
			case 2:$a_SQL['order-base']=' vn.name DESC, vn.duration DESC, vn.entered_on DESC';break;
		}
		$v_SQL='';
		$v_DC->Query(implode('',$a_SQL),true);
		$a_Data=$v_DC->Format('assoc_array');
		if($v_Tags&&!empty($a_Data)){
			foreach($a_Data as $v_Key=>$a_Cell){
				if($a_Cell['ID']){$a_Data[$v_Key]['tag-set']=$this->F_GetTags($a_Cell['ID'],'article');}
			}
		}
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>'news',
				'switch'=>'failed',
				'header'=>$this->a_Search['news']['header']
			));
		}else{
			$a_OpenLineData=array();
			foreach($a_Data as $v_Key=>$a_Line){$a_OpenLineData[$v_Key]=$this->F_GetOpenLine('news',$a_Data[$v_Key]['ID']);}
			return json_encode(array(
				'alias'=>'news',
				'switch'=>'data',
				'data'=>$a_Data,
				'open-line-data'=>$a_OpenLineData,
				'header'=>$this->a_Search['news']['header'],
				'page'=>$this->F_GetPageInformation('news')
			));
		}
	}

	//
	// Variable - Validated
	private $V_Validated=false;
	//
	// Initialize

	//
	// Function - LAPCAT
	function LAPCAT($v_ID=0,$v_IP='',$v_MessageFilter=false){
		$this->A_User['ID']=$v_ID;
		$this->a_Parameters['message-filter']=$v_MessageFilter;
		$this->F_GetFeaturedDatabase();
		$this->F_GetFeaturedArticle();
		$this->F_SetIP($v_IP);
	}
	//
	// Function - Get Featured Database
	function F_GetFeaturedDatabase(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT hfd.database_ID FROM hex_featured_database AS hfd LIMIT 1;');
		$a_Data=$v_DC->Format('row_array');
		$this->a_Parameters['featured-database']=$a_Data[0];
	}
	//
	// Function - Get Featured Article
	function F_GetFeaturedArticle(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT hfa.article_ID FROM hex_featured_article AS hfa LIMIT 1;');
		$a_Data=$v_DC->Format('row_array');
		$this->a_Parameters['featured-article']=$a_Data[0];
	}

	//
	// Functions

	//
	// Function - Change All Current Pages
	function F_ChangeAllCurrentPages(){
		foreach($this->a_Search as $v_SearchKey=>$a_Search){if(array_key_exists('current-page',$a_Search)){$this->F_Page($v_SearchKey,1);}}
	}
	//
	// Function - Change All Dates
	function F_ChangeDate($v_Area='news',$v_Secondary=''){$this->a_Search[$v_Area]['calendar']=array('on'=>(($v_Secondary!=='')?true:false),'date'=>$v_Secondary);}
	function F_ChangeAllDates(){foreach($this->a_Search as $v_SearchKey=>$a_Search){if(array_key_exists('calendar',$a_Search)){$this->F_ChangeDate($v_SearchKey,'');}}}
	//
	// Function - Change All Searches
	function F_ChangeAllSearches(){foreach($this->a_Search as $v_SearchKey=>$a_Search){if(array_key_exists('search',$a_Search)){$this->F_ChangeSearch222($v_SearchKey,0);}}}
	//
	// Function - Change All Similars
	function F_ChangeAllSimilars(){foreach($this->a_Search as $v_SearchKey=>$a_Search){if(array_key_exists('similar',$a_Search)){$this->F_ChangeSimilar($v_SearchKey,'');}}}
	//
	// Function - Change All Sorts
	function F_ChangeAllSorts(){foreach($this->a_Search as $v_SearchKey=>$a_Search){if(array_key_exists('sort',$a_Search)){$this->F_ChangeSort($v_SearchKey,0);}}}
	//
	// Function - Change Specific
	function F_ChangeSpecific($v_Area='news',$v_Secondary=''){
		$this->a_Search[$v_Area]['specific']=array(
			'on'=>(($v_Secondary>0)?true:false),
			'ID'=>$v_Secondary,
			'name'=>(($v_Secondary>0)?$this->F_GetName($v_Area,$v_Secondary):'')
		);
	}
	//
	// Function - Change Search
	function F_ChangeSearch222($v_Area='news',$v_Secondary=0){$this->a_Search[$v_Area]['search']=array('on'=>(($v_Secondary>0)?true:false),'value'=>$v_Secondary);}
	//
	// Function - Change Sort
	function F_ChangeSort($v_Area='news',$v_Secondary=0){$this->a_Search[$v_Area]['sort']=array('on'=>(($v_Secondary>0)?true:false),'value'=>$v_Secondary);}
	//
	// Function - Change Tag
	function F_ChangeTag($v_TagID=0){
		if($v_TagID>0){
			// Set Tag
			$this->F_SetUnknownTag($v_TagID);
			// Add Tag To Popular Tags
			$a_Date=explode('-',date('d-m-Y'));
			$v_DC=db::getInstance();
			$v_DC->Query('SELECT COUNT(*) AS total FROM hex_popular_tags WHERE tag_ID='.$v_TagID.' AND ip_address='.$this->A_User['IP'].' AND DAY(time_stamp)='.$a_Date[0].' AND MONTH(time_stamp)='.$a_Date[1].' AND YEAR(time_stamp)='.$a_Date[2].';');
			$a_Data=$v_DC->Format('assoc');
			if($a_Data['total']==0){$v_DC->Query('INSERT INTO hex_popular_tags (tag_ID,ip_address) VALUES ('.$v_TagID.','.$this->A_User['IP'].');');}
		}else{
			// Clear Tag
			$this->F_SetSpecificTag();
		}
	}
	//
	// Function - Get Name
	function F_GetName($v_Area='home',$v_Secondary){
		switch($v_Area){
			case 'home':default:return '';break;
			case 'news':$v_SQL='SELECT vn.name FROM viewable_news AS vn WHERE vn.ID='.$v_Secondary.';';break;
			case 'events':$v_SQL='SELECT ve.name FROM viewable_events AS ve WHERE ve.ID='.$v_Secondary.';';break;
		}
		$v_DC=db::getInstance();
		$v_DC->Query($v_SQL);
		$a_Data=$v_DC->Format('row_array');
		return $a_Data[0];
	}
	//
	// Function - Get Popular Tags
	function F_GetPopularTags(){
		$a_PopularTags=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ht.ID, ht.name, (SELECT COUNT(*) FROM hex_popular_tags AS hpt2 WHERE hpt2.tag_ID=hpt.tag_ID AND DATE(hpt2.time_stamp)=CURDATE()) AS total FROM hex_popular_tags AS hpt LEFT JOIN hex_tags AS ht ON (ht.ID=hpt.tag_ID) WHERE DATE(hpt.time_stamp)=CURDATE() GROUP BY ht.ID ORDER BY total DESC LIMIT 10;');
		if($v_DC->Count_res()>0){
			$this->A_PopularTags=$v_DC->Format('assoc_array');
			return json_encode(array(
				'failed'=>false,
				'pointer'=>'popular-tags',
				'data'=>$this->A_PopularTags
			));
		}else{
			return json_encode(array(
				'failed'=>true,
				'pointer'=>'popular-tags'
			));
		}
	}
	//
	// Function - Change Simliar
	function F_ChangeSimilar($v_Area,$v_Name=''){
		if(!$this->a_Search[$v_Area]['similar']['on']&&$v_Name!==''){
			$this->a_Search[$v_Area]['similar']=array('on'=>true,'name'=>$v_Name);
		}else{
			$this->a_Search[$v_Area]['similar']=array('on'=>false,'name'=>'');
		}
	}
	// Variable - Quick Return
	private $V_QuickReturn=false;

	//
	//
	// Array - Search

	//
	// Array - Popular Tags
	private $A_PopularTags=array();
	//
	// Array - User
	private $A_User=array(
		'on'=>false,
		'ID'=>0,
		'IP'=>0
	);
	//
	// Variable - Area
	private $V_Area='home';
	//
	// Function - Initialize
	function F_Initialize(){
		if($A_User['on']){
			// Get favorites
		}
	}

	//
	// Functions

	//
	//
	// Function - Get All Tags
	function F_GetAllTags(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ID, name FROM hex_tags WHERE locked=2 ORDER BY name ASC;');
		return $v_DC->Format('assoc');
	}
	//
	// Function - Get Open Line
	function F_GetOpenLine($v_Key='news',$v_OpenLineID=0){
		$a_Record=array();
		$a_Total=array();
		$v_DC=db::getInstance();
		$this->a_Search[$v_Key]['current-target']=$v_OpenLineID;
		switch($v_Key){
			case 'databases':$v_SQL='SELECT hd.ID, hd.name, hd.description, hd.at_home, hd.link_in, hd.link_out, hf.content_ID AS favorite, (SELECT COUNT(*) FROM hex_databases AS hd2 WHERE hd2.name=hd.name) AS similar_named FROM hex_databases AS hd LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$this->A_User['ID'].' AND hf.favorite_type=3 AND hf.content_ID=hd.ID) WHERE hd.ID='.$v_OpenLineID.' GROUP BY hd.ID;';break;
			case 'events':
				$v_SQL='SELECT ve.name, ve.counted, ve.ID, ve.library, ve.o_place, ve.description, ve.o_date, DATE_FORMAT(ve.o_date,"%W, %M %D") AS date_words, ve.start, ve.end, ve.summer, ve.slider, ve.tournament, hm.user_ID AS watched, hf.content_ID AS favorite, (SELECT COUNT(*) FROM viewable_events AS ve2 WHERE ve2.name=ve.name) AS similar_named FROM viewable_events AS ve LEFT JOIN hex_markers AS hm ON (hm.user_ID='.$this->A_User['ID'].'&&calendar_ID=ve.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$this->A_User['ID'].' AND hf.favorite_type=1 AND hf.content_ID=ve.ID) WHERE ve.ID='.$v_OpenLineID.';';
				break;
			case 'news':
				$v_SQL='SELECT vn.ID, vn.name, vn.text AS description, vn.library_ID, vn.duration, vn.entered_by_ID, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS entered_on, vn.username, vn.image_path, hvba.article_ID, hfba.article_ID AS flagged, hf.content_ID AS favorite, hu.username AS is_me, (SELECT COUNT(*) FROM viewable_news AS vn2 WHERE vn2.name=vn.name) AS similar_named FROM viewable_news AS vn LEFT JOIN hex_users AS hu ON (hu.ID=vn.entered_by_ID) LEFT JOIN hex_views_by_article AS hvba ON (hvba.article_ID='.$v_OpenLineID.' AND hvba.user_ID='.$this->A_User['ID'].') LEFT JOIN hex_flags_by_article AS hfba ON (hfba.article_ID='.$v_OpenLineID.' AND hfba.user_ID='.$this->A_User['ID'].') LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$this->A_User['ID'].' AND hf.favorite_type=0 AND hf.content_ID=vn.ID) WHERE vn.ID='.$v_OpenLineID.';';
				break;
			case 'materials':
				$v_SQL='SELECT vm.ID, vm.name, vm.author, vm.console, vm.console_name, vm.m_artist, vm.writer, vm.narrator, vm.artist, vm.ISBNorSN, vm.sub_name, vm.rating, vm.year, hc.material_ID AS collected, hwl.user_ID AS watchlist, COUNT(*) AS total_collected, htbm.tag_ID AS type, hf.content_ID AS favorite, hrbm.rating AS my_rating, hu.username AS is_me FROM hex_tags_by_material AS htbm LEFT JOIN hex_ratings_by_material AS hrbm ON (hrbm.material_ID=htbm.ID AND hrbm.user_ID='.$this->A_User['ID'].') LEFT JOIN viewable_materials AS vm ON (htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75) AND vm.ID=htbm.ID) LEFT JOIN hex_users AS hu ON (hu.ID=vm.entered_by_ID) LEFT JOIN hex_watch_list AS hwl ON (hwl.user_ID='.$this->A_User['ID'].' AND hwl.material_ID=vm.ID) LEFT JOIN hex_collections AS hc ON (hc.material_ID=vm.ID AND hc.user_ID='.$this->A_User['ID'].') LEFT JOIN hex_collections AS hco ON (hco.material_ID=vm.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$this->A_User['ID'].' AND hf.favorite_type=2 AND hf.content_ID=vm.ID) WHERE vm.ID='.$v_OpenLineID.' GROUP BY vm.ID;';
				break;
			default:
				break;
		}
		$v_DC->Query($v_SQL);
		// Remove Nulls
		//$a_Record=FF_RAN($v_DC->Format('assoc'));
		$a_Record=$v_DC->Format('assoc');
		if($v_DC->Count_res()>0){
			// Add View
			switch($v_Key){
				case 'news':
					$v_Type='article';
					if($a_Record['article_ID']!=$v_OpenLineID&&$this->A_User['ID']>0){
						$v_DC->Query('INSERT INTO hex_views_by_article (article_ID,user_ID) VALUES ('.$v_OpenLineID.','.$this->A_User['ID'].');');
					}else{
						$v_DC->Query('INSERT INTO hex_unknown_views_by_news (article_ID,unknown_total_views) VALUES ('.$v_OpenLineID.',1) ON DUPLICATE KEY UPDATE unknown_total_views=unknown_total_views+1;');
					}
					// Get Total Views
					$v_DC->Query('SELECT COUNT(*) AS total_views FROM hex_views_by_article WHERE article_ID='.$v_OpenLineID.';');
					$a_Total=$v_DC->Format('assoc');
					$a_Record['total-views']=$a_Total['total_views'];
					$v_DC->Query('SELECT unknown_total_views FROM hex_unknown_views_by_news WHERE article_ID='.$v_OpenLineID.';');
					$a_Total=$v_DC->Format('assoc');
					$a_Record['total-views']+=$a_Total['unknown_total_views'];
					// Modify Date
					if(array_key_exists('entered_on',$a_Record)){$a_Record['date-words']=FF_CDate($a_Record['entered_on']);}
					break;
				case 'events':
					$v_Type='event';
					// Modify Date
					if(array_key_exists('o_date',$a_Record)){$a_Record['date-words']=FF_CDate($a_Record['o_date']);}
					break;
				case 'materials':
					$v_Type='material';
					break;
				case 'databases':
					$v_Type='database';
					break;
				default:break;
			}
			// Get Tags
			$a_Record['tag-set']=FF_GetTags($v_OpenLineID,$v_Type);
			$a_Record['similar']=$this->a_Search[$v_Key]['similar']['on'];
			$a_Record['specific']=$this->a_Search[$v_Key]['specific']['on'];
			return $a_Record;
		}
		
	}
	//
	// Function - Get Page Information
	function F_GetPageInformation($v_Key='news'){
		return array(
			'current-page'=>$this->a_Search[$v_Key]['current-page'],
			'total-pages'=>$this->a_Search[$v_Key]['total-pages'],
			'total-records'=>$this->a_Search[$v_Key]['total-records']
		);
	}
	//
	// Function - Page
	function F_Page($v_Key='news',$v_PageNumber=1){
		if($this->F_SearchKeyExists($v_Key)){
			if($v_PageNumber<=$this->a_Search[$v_Key]['total-pages']){
				$this->a_Search[$v_Key]['current-page']=$v_PageNumber;
			}
		}
	}
	//
	// Function - Next Page
	function F_NextPage($v_Key='news'){if($this->F_SearchKeyExists($v_Key)){if($this->a_Search[$v_Key]['current-page']<$this->a_Search[$v_Key]['total-pages']){$this->a_Search[$v_Key]['current-page']++;}}}
	//
	// Function - Previous Page
	function F_PreviousPage($v_Key='news'){if($this->F_SearchKeyExists($v_Key)){if($this->a_Search[$v_Key]['current-page']>1){$this->a_Search[$v_Key]['current-page']--;}}}
	//
	// Function - Refresh
	function F_Refresh(){
		$this->F_SetSpecificTag();
		return;
		foreach(array('news','events','materials','databases') as $v_Key){$this->F_ResetArea($v_Key);}
	}
	//
	// Function - Reset Area
	function F_ResetArea($v_Key='news'){
		if($this->F_SearchKeyExists($v_Key)){
			$this->a_Search[$v_Key]['date']=array('on'=>false,'value'=>'');
			$this->a_Search[$v_Key]['search']=array('on'=>false,'value'=>'');
			$this->a_Search[$v_Key]['sort']=array('on'=>false,'value'=>'');
			$this->a_Search[$v_Key]['similar']=false;
			$this->a_Search[$v_Key]['specific']=false;
			$this->a_Search[$v_Key]['current-page']=1;
			$this->a_Search[$v_Key]['current-target']=0;
		}
	}
	//
	// Function - Search Key Exists
	function F_SearchKeyExists($v_Key=''){return array_key_exists($v_Key,$this->a_Search);}
	//
	// Function - Set IP
	function F_SetIP($v_IP=''){$a_IP=$v_IP.explode('.',$v_IP,4);$this->A_User['IP']=(intval($a_IP[0])*pow(2,24))+(intval($a_IP[1])*pow(2,16))+(intval($a_IP[2])*pow(2,8))+intval($a_IP[3]);}
	//
	// Function - Toggle Key
	function F_ToggleKey($v_Key='news',$v_Type='favorites'){if($this->F_SearchKeyExists($v_Key)){$this->a_Search[$v_Key][$v_Type]=0;}else{$this->a_Search[$v_Key][$v_Type]=1;}}

	//
	// Data Push

	//
	// Function - Create Push List
	function f_GetPushList22222($v_Area='materials',$v_Select=0){
		if($v_Select>0){
			$v_PushType=$v_Select;
		}else{
			//$v_Featured=$this->A_Features[$v_Area];
			switch($v_Area){
				default:return;
					break;
				case 'news':
					$v_PushType=(($this->a_Search[$v_Area]['tag']['on'])?100:110);
					//$v_PushType=(($this->a_Search['tag']['on'])?100:(($v_Featured==0)?111:110));
					//if($v_Featured>2){$v_Featured=0;}else{$v_Featured++;}
					break;
				case 'events':
					$v_PushType=(($this->a_Search[$v_Area]['tag']['on'])?200:210);
					break;
				case 'databases':
					$v_PushType=(($this->a_Search[$v_Area]['tag']['on'])?400:410);
					break;
				case 'materials':
					$v_PushType=$this->F_SelectMaterialsPush();
					break;
			}
			//$this->A_Features[$v_Area]=$v_Featured;
		}
		$v_DC=db::getInstance();
		switch($v_PushType){
			default:
				break;
			case 100: // Suggest Articles I (Tag Search)
				$this->a_Search[$v_Area]['header']='Articles tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$this->a_Search['tag']['ID'].'" name="tag/drop" style="font-size:14px;">'.$this->a_Search['tag']['name'].'</a>.';
				return ' ht.ID='.$this->a_Search['tag']['ID'];
				break;
			case 110: // Suggest Articles II
				$this->a_Search[$v_Area]['header']='Recent news and articles.';
				return ' vn.entered_on<=NOW()';
				break;
			case 111: // Suggest Articles III
				$this->a_Search[$v_Area]['header']='Featured Article';
				return ' va.ID='.$this->a_Parameters['featured-article'];
				break;
			case 200: // Suggest Events I (Tag Search)
				$this->a_Search[$v_Area]['header']='Events tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$this->a_Search['tag']['ID'].'" name="tag/drop" style="font-size:14px;">'.$this->a_Search['tag']['name'].'</a>.';
				return ' ht.ID='.$this->a_Search['tag']['ID'];
				break;
			case 210: // Suggest Events II
				$this->a_Search[$v_Area]['header']='Upcoming events.';
				return ' ve.o_date>=CURDATE() AND ve.o_date<="'.date('Y-m-d',strtotime('today + 14 days')).'"';
				break;
			case 300: // Suggest Materials I (Tag Search)
				$this->a_Search[$v_Area]['header']='Materials tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$this->a_Search['tag']['ID'].'" name="tag/drop" style="font-size:14px;">'.$this->a_Search['tag']['name'].'</a>.';
				return $this->a_Search['tag']['ID'];
			case 310: // Suggest Materials II
				$v_DC->Query('SELECT ht.ID, ht.name FROM hex_tags AS ht LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID=ht.ID) GROUP BY htbm.tag_ID ORDER BY RAND() LIMIT 1');
				$a_Data=$v_DC->Format('assoc');
				$this->a_Search[$v_Area]['header']='Materials tagged as <a class="add-to-all-searches fake-link font-bold font-L" name="construct|construct-1_key|search_value|'.$a_Data['ID'].'_text|'.$a_Data['name'].'" style="font-size:14px;">'.$a_Data['name'].'</a>.';
				return $a_Data['ID'];
				break;
			case 320: // Suggest Materials III (All Materials)
				$v_Random=rand(0,9);
				$a_MaterialTags=array(1,2,3,4,5,23,24,32,50,75);
				$a_MaterialTypes=array('books','music','movies','video games','television shows','audio books','digital books','graphic novels','large print books','digital audio players');
				$this->a_Search[$v_Area]['header']=ucfirst($a_MaterialTypes[$v_Random]);
				return $a_MaterialTags[$v_Random];
			case 400: // Suggest Databases I (Tag Search)
				$this->a_Search[$v_Area]['header']='Related Database';
				return ' ht.ID='.$this->a_Search['tag']['ID'];
				break;
			case 410: // Suggest Databases II
				$this->a_Search[$v_Area]['header']='Featured Database';
				return ' hd.ID='.$this->a_Parameters['featured-database'];
				break;
		}
	}
	//
	// Function - Push Home
	function F_PushHome($v_Main='materials',$v_EmptyCheck=true,$v_Select=0){
		$v_DC=db::getInstance();
		$a_Data=array();
		switch($v_Main){
			default:
				break;
			case 'databases':
				$v_SQL='SELECT hd.ID, hd.name, hd.description, hd.link_in, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM hex_databases AS hd LEFT JOIN hex_tags_by_database AS htbd ON (htbd.ID=hd.ID) LEFT JOIN hex_tags AS ht ON (htbd.tag_ID=ht.ID) WHERE'.$this->f_GetPushList($v_Main,$v_Select).' GROUP BY hd.ID ORDER BY RAND() LIMIT 1;';
				break;
			case 'news':
				$v_SQL='SELECT vn.ID, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%W, %M %D") AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM viewable_news AS vn LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID) LEFT JOIN hex_tags AS ht ON (htba.tag_ID=ht.ID) WHERE'.$this->f_GetPushList($v_Main,$v_Select).' GROUP BY vn.ID ORDER BY vn.entered_on DESC LIMIT 6;';
				break;
			case 'events':
				$v_SQL='SELECT ve.ID, ve.name, ve.o_place AS library_ID, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%W, %M %D") AS `date-words`, ve.start, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM viewable_events AS ve LEFT JOIN hex_tags_by_event AS htbe ON (htbe.ID=ve.ID) LEFT JOIN hex_tags AS ht ON (htbe.tag_ID=ht.ID) WHERE'.$this->f_GetPushList($v_Main,$v_Select).' ORDER BY RAND() LIMIT 6;';
				break;
			case 'materials':
				$v_SQL='SELECT vm.ID, vm.ISBNorSN, vm.name AS title FROM hex_tags_by_material AS htbm LEFT JOIN viewable_materials AS vm ON (vm.ID=htbm.ID) WHERE htbm.tag_ID IN ('.$this->f_GetPushList($v_Main,$v_Select).') ORDER BY RAND() LIMIT 5;';
				break;
		}
		$v_DC->Query($v_SQL,true);
		$a_Data=$v_DC->Format('assoc_array');
		if(empty($a_Data)){
			if($v_EmptyCheck&&$v_Main=='databases'){
				return $this->F_PushHome($v_Main,false,410);
				break;
			}
			return json_encode(array(
				'alias'=>$v_Main,
				'pointer'=>$this->V_Area,
				'switch'=>'failed',
				'header'=>$this->a_Search[$v_Main]['header']
			));
		}else{
			return json_encode(array(
				'alias'=>$v_Main,
				'pointer'=>$this->V_Area,
				'switch'=>'data',
				'data'=>$a_Data,
				'header'=>$this->a_Search[$v_Main]['header']
			));
		}
	}
	//
	// Function - Select Materials Push
	function F_SelectMaterialsPush(){
		// Suggestions III
		$v_MaterialPush=320;
		if($this->a_Search['materials']['tag']['on']){
			// Suggestions I
			$v_MaterialPush=300;
		}
		return $v_MaterialPush;
	}

	//
	// Search
	
	//
	// Function - Calculate Limit
	//
	// Function - Get Tags
	function F_GetTags($v_ID=0,$v_Table='article'){
		if($v_ID>0){
			$v_DC=db::getInstance();
			$v_SQL='SELECT ht.ID, ht.name FROM hex_tags_by_'.$v_Table.' AS htbb LEFT JOIN hex_tags AS ht ON (ht.ID=htbb.tag_ID) WHERE htbb.ID='.$v_ID.';';
			$v_DC->Query($v_SQL);
			if($v_DC->Count_res()>0){
				return $v_DC->Format('assoc_array');
			}
		}
	}
	//
	// Function - Get Month View
	function F_GetMonthView($v_IncludeColors=false,$a_Date=array(0,0,0)){
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
		$v_SQL=$this->F_PushEvents('browse',false,false,true,$a_Date);
		$v_DC->Query($v_SQL,true);
		if($v_DC->Count_res()>0){
			foreach($v_DC->Format('assoc_array') as $v_Key=>$a_Cell){
				$a_Data['calendar'][$a_Date[0]][$a_Date[1]][$a_Cell['day']][]=array('location_name'=>$a_Cell['location_name'],'comment'=>$a_Cell['comment'],'name'=>$a_Cell['name'],'id'=>$a_Cell['ID'],'location_id'=>$a_Cell['location_id'],'timeS'=>$a_Cell['start_time'],'timeE'=>$a_Cell['end_time']);             
			}
		}
		return json_encode($a_Data);
	}
	
	
	//
	// Function - Construct Databases Header
	function F_ConstructDatabasesHeader(){
		$a_Description=array(
			'description-A'=>'I am browsing',
			20=>(($this->a_Search['databases']['favorites']['on'])?' my favorite':''),
			30=>' databases and services',
			50=>(($this->a_Search['tag']['on'])?' tagged as '.$this->a_Search['tag']['name']:''),
			60=>'',
			70=>' sorted by alphabetically.'
		);
		switch($this->a_Search['news']['sort']['value']){
			case 0:default:$a_Description[70]=' sorted alphabetically.';break;
			case 1:$a_Description[70]=' sorted alphabetically in reverse order.';break;
		}
		return implode('',$a_Description);
	}
	//
	// Function - Push Databases
	function F_PushDatabases($v_Cell='browse',$v_RSS=false,$v_Tags=false){
		$v_DC=db::getInstance();
		$a_SQL=array(
			'select-start'=>'SELECT',
			'select-base'=>' "'.$this->V_Area.'" AS area, hd.ID, hd.name,'.(($v_RSS)?' hd.description,':'').' hd.at_home, '.(($this->V_Validated)?'hd.link_in':'hd.link_out').' AS link',
			'from-start'=>' FROM',
			'from-base'=>' hex_databases AS hd',
			'where-start'=>' WHERE',
			'where-base'=>' hd.locked=2',
			'where-tag'=>'',
			'order-start'=>' ORDER BY',
			'order-base'=>' hd.name ASC',
			'limit-start'=>' LIMIT',
			'limit-base'=>' '.$this->f_CalculateLimit('databases').';'
		);
		// SQL - Where
		if($this->a_Search['tag']['on']){
			$v_SQL='SELECT DISTINCT(htbd.ID) FROM hex_tags_by_database AS htbd WHERE htbd.tag_ID='.$this->a_Search['tag']['ID'].';';
			$v_DC->Query($v_SQL,true);
			if($v_DC->Count_res()>0){
				$a_SQL['where-tag']=' AND hd.ID IN ('.implode(',',$v_DC->Format('row_array')).')';
			}else{
				$a_SQL['where-tag']=' AND hd.ID IN (0)';
			}
		}
		// SQL - Order
		switch($this->a_Search['databases']['sort']['value']){
			case 0:default:$a_SQL['order-base']=' hd.name ASC';break;
			case 1:$a_SQL['order-base']=' hd.name DESC';break;
		}
		$v_SQL='';
		$v_DC->Query(implode('',$a_SQL),true);
		$a_Data=$v_DC->Format('assoc_array');
		if($v_Tags&&!empty($a_Data)){
			foreach($a_Data as $v_Key=>$a_Cell){
				if($a_Cell['ID']){$a_Data[$v_Key]['tag-set']=$this->F_GetTags($a_Cell['ID'],'database');}
			}
		}
		// Search Results Total
		$a_SQL['select-base']=' COUNT(hd.ID) AS total';
		$v_DC->Query(implode('',$a_SQL),true);
		if($v_DC->Count_res()>0){
			$a_Cell=$v_DC->Fetch('assoc');
			$this->a_Search['databases']['total-records']=$a_Cell['total'];
			$this->a_Search['databases']['total-pages']=FF_CalculateTotal($a_Cell['total'],$this->a_Search['databases']['maximum-records']);
		}
		$this->a_Search['databases']['header']=$this->F_ConstructDatabasesHeader();
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>$v_Cell,
				'pointer'=>$this->V_Area,
				'switch'=>'failed',
				'header'=>$this->a_Search['databases']['header']
			));
		}else{
			return json_encode(array(
				'alias'=>$v_Cell,
				'pointer'=>$this->V_Area,
				'switch'=>'data',
				'data'=>$a_Data,
				'header'=>$this->a_Search['databases']['header'],
				'open-line-data'=>$this->F_GetOpenLine('databases',(($this->a_Search['databases']['current-target']>0)?$this->a_Search['databases']['current-target']:$a_Data[0]['ID'])),
				'page'=>$this->F_GetPageInformation('databases')
			));
		}
	}
	//
	// Function - Validate
	function F_Validate($v_Validated=false){$this->V_Validated=$v_Validated;}
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