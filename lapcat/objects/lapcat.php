<?
class LAPCAT{
	private $A_PreviousPush=array('materials'=>0,'events'=>0,'news'=>0,'databases'=>0);
	private $A_PreviousArea='';
	// Function - Perform Request
	function f_PerformRequest($v_Clear='fresh',$v_Cell='home',$v_Request='suggest',$v_Main='',$v_Secondary=''){
		$v_SameSearch=true;
		switch($v_Request){
			case 'change-date':
				$this->F_Page(1);
				$this->F_ChangeDate($v_Cell,$v_Main);
				break;
			case 'change-search':
				$this->F_Page(1);
				$this->F_ChangeSearch($v_Cell,$v_Main);
				break;
			case 'change-sort':
				$this->F_Page(1);
				$this->F_ChangeSort($v_Cell,$v_Main);
				break;
			case 'change-popular':case 'change-tag':
				$this->F_ChangeAllCurrentPages();
				$this->F_ChangeTag($v_Main);
				$v_SameSearch=false;
				break;
			case 'change-page':
				$this->F_Page($v_Cell,$v_Main);
				break;
			default:
				$v_SameSearch=false;
				break;
		}
		switch($v_Request){
			case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':
			case 'change-page':
			case 'suggest':
				switch($v_Cell){
					default:break;
					case 'databases':case 'events':case 'materials':case 'news':
						if($v_SameSearch){return $this->F_PushData($v_Cell,$this->A_PreviousPush[$v_Cell]);}
						return $this->F_PushData($v_Cell);
						break;
				}
				break;
			default:break;
		}
	}
	//
	// Function - Push Data
	function F_PushData($v_Cell='materials',$v_Select=0){
		$v_DC=db::getInstance();
		$a_Data=array();
		switch($v_Cell){
			default:break;
			case 'databases':
				$a_SQL=array(
					'select'=>'SELECT hd.ID, hd.name, hd.description, hd.link_in, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
					'from'=>' FROM hex_databases AS hd LEFT JOIN hex_tags_by_database AS htbd ON (htbd.ID=hd.ID) LEFT JOIN hex_tags AS ht ON (htbd.tag_ID=ht.ID)',
					'where'=>' WHERE'.$this->F_CreatePushList($v_Cell,$v_Select),
					'group'=>' GROUP BY hd.ID',
					'order'=>' ORDER BY RAND()',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->F_CalculateLimit($v_Cell).';'
				);
				$v_SQL='SELECT COUNT(hd.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				break;
			case 'news':
				$a_SQL=array(
					'select'=>'SELECT vn.ID, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%W, %M %D") AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
					'from'=>' FROM viewable_news AS vn LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID) LEFT JOIN hex_tags AS ht ON (htba.tag_ID=ht.ID)',
					'where'=>' WHERE'.$this->F_CreatePushList($v_Cell,$v_Select),
					'group'=>' GROUP BY vn.ID',
					'order'=>' ORDER BY vn.entered_on DESC',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->F_CalculateLimit($v_Cell).';'
				);
				$v_SQL='SELECT COUNT(vn.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				switch($this->A_Search['news']['sort']['value']){
					case 1:$a_SQL['order']=' ORDER BY vn.name ASC';break;
					case 2:$a_SQL['order']=' ORDER BY vn.name DESC';break;
					default:break;
				}
				break;
			case 'events':
				$a_SQL=array(
					'select'=>'SELECT ve.ID, ve.name, ve.o_place AS library_ID, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%W, %M %D") AS `date-words`, ve.start, ht.ID AS `tag-ID`, IFNULL(ht.name, "") AS `tag-name`, ve.summer, ve.slider, ve.tournament',
					'from'=>' FROM viewable_events AS ve LEFT JOIN hex_tags_by_event AS htbe ON (htbe.ID=ve.ID) LEFT JOIN hex_tags AS ht ON (htbe.tag_ID=ht.ID)',
					'where'=>' WHERE'.$this->F_CreatePushList($v_Cell,$v_Select),
					'group'=>' GROUP BY ve.ID',
					'order'=>' ORDER BY ve.o_date ASC, ve.start ASC, ve.counted DESC',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->F_CalculateLimit($v_Cell).';'
				);
				$v_SQL='SELECT COUNT(ve.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				switch($this->A_Search['events']['sort']['value']){
					case 1:$a_SQL['order']=' ORDER BY ve.counted DESC, ve.o_date ASC, ve.start ASC';break;
					case 2:$a_SQL['order']=' ORDER BY ve.name ASC, ve.o_date ASC, ve.start ASC';break;
					case 3:$a_SQL['order']=' ORDER BY ve.name DESC, ve.o_date ASC, ve.start ASC';break;
					default:break;
				}
				if($this->A_Search['events']['search']['on']){
					switch($this->A_Search['events']['search']['value']){
						case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:
							$a_SQL['where'].=' AND ve.o_place='.($this->A_Search['events']['search']['value']-1);break;
						default:break;
					}
				}
				break;
			case 'materials':
				$a_SQL=array(
					'select'=>'SELECT vm.ID, vm.ISBNorSN, vm.name, vm.sub_name AS `sub-name`, vm.rating, vm.year AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name`',
					'from'=>' FROM viewable_materials AS vm LEFT JOIN hex_tags_by_material AS htbm ON (htbm.ID=vm.ID) LEFT JOIN hex_tags AS ht ON (htbm.tag_ID=ht.ID)',
					'where'=>' WHERE htbm.tag_ID IN ('.$this->F_CreatePushList($v_Cell,$v_Select).')',
					'group'=>' GROUP BY vm.ID',
					'order'=>' ORDER BY RAND()',
					'limit'=>' LIMIT',
					'limit-extra'=>' '.$this->F_CalculateLimit($v_Cell).';'
				);
				$v_SQL='SELECT COUNT(vm.ID) AS total'.$a_SQL['from'].$a_SQL['where'];
				switch($this->A_Search['materials']['sort']['value']){
					case 1:$a_SQL['order']=' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC';break;
					case 2:$a_SQL['order']=' ORDER BY vm.rating DESC, vm.year DESC, vm.name ASC';break;
					case 3:$a_SQL['order']=' ORDER BY vm.name ASC, vm.year DESC, vm.rating DESC';break;
					case 4:$a_SQL['order']=' ORDER BY vm.name DESC, vm.year DESC, vm.rating DESC';break;
					default:break;
				}
				break;
		}
		$v_DC->Query(implode('',$a_SQL),true);
		$a_Data=$v_DC->Format('assoc_array');
		$v_DC->Query($v_SQL,true);
		$a_Page=$v_DC->Fetch('assoc');
		$this->A_Search[$v_Cell]['total-records']=$a_Page['total'];
		$this->A_Search[$v_Cell]['total-pages']=FF_CalculateTotal($a_Page['total'],$this->A_Search[$v_Cell]['maximum-records']);
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>$v_Cell,
				'switch'=>'failed',
				'header'=>$this->A_Search[$v_Cell]['header']
			));
		}else{
			$a_OpenLineData=array();
			$a_RowIDs=array();
			foreach($a_Data as $v_Key=>$a_Line){
				$a_Data[$v_Key]['counter']=$v_Key;
				$a_RowIDs[$v_Key]=$a_Line['ID'];
				//$a_OpenLineData[$v_Key]=$this->F_GetOpenLine($v_Cell,$a_Data[$v_Key]['ID']);
			}
			if($v_Cell=='materials'){
				$v_DC->Query('SELECT author, act1, act2, act3, artist, writer, narrator, m_artist, developer FROM viewable_materials WHERE ID IN('.implode(',',$a_RowIDs).') ORDER BY FIELD(ID, '.implode(',',$a_RowIDs).');');
				$a_IDs=$v_DC->Fetch('assoc_array');
				foreach($a_Data as $v_Key=>$a_Line){
					$a_Credits=$this->F_ReturnCredits($a_IDs[$v_Key]);
					$a_Data[$v_Key]['credit-name']=$a_Credits['credit-name'];
					$a_Data[$v_Key]['credit-word']=$this->F_GetCreditWord($a_Credits['credit-type']);
					$a_Data[$v_Key]['credit-type']=$a_Credits['credit-type'];
				}
			}
			return json_encode(array(
				'alias'=>$v_Cell,
				'switch'=>'data',
				'data'=>$a_Data,
				//'open-line-data'=>$a_OpenLineData,
				'header'=>$this->A_Search[$v_Cell]['header'],
				'page'=>$this->F_GetPageInformation($v_Cell)
			));
		}
	}
	// Function - Get Credit Word
	function F_GetCreditWord($v_Type){$a_Words=array('act1'=>'starring','act2'=>'starring','act3'=>'starring','artist'=>'drawn by','author'=>'written by','developer'=>'published by','m_artist'=>'by','narrator'=>'narrated by');return ((array_key_exists($v_Type,$a_Words))?$a_Words[$v_Type]:'by');}
	// Function - Return Credits
	function F_ReturnCredits($a_Row){
		foreach($a_Row as $v_Key=>$v_Credit){if($v_Credit!==''){return array('credit-type'=>$v_Key,'credit-name'=>$v_Credit);;}}
		return array('credit-type'=>0,'credit-name'=>'unknown');
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
			'where-base'=>' DATE(ve.o_date)>="'.$this->F_CurrentDate().'"',
			'where-tag'=>'',
			'where-search'=>'',
			'where-date'=>'',
			'where-specific'=>'',
			'where-similar'=>'',
			'group-by'=>' GROUP BY ve.ID',
			'order-start'=>' ORDER BY',
			'order-base'=>' ve.o_date ASC, ve.start ASC, ve.counted DESC',
			'limit-start'=>' LIMIT',
			'limit-base'=>' '.$this->F_CalculateLimit('events').';'
		);
		// SQL - Where
		if($this->A_Search['tag']['on']){
			$v_SQL='SELECT DISTINCT(htbe.ID) FROM hex_tags_by_event AS htbe WHERE htbe.tag_ID='.$this->A_Search['tag']['ID'].';';
			$v_DC->Query($v_SQL,true);
			if($v_DC->Count_res()>0){
				$a_SQL['where-tag']=' AND ve.ID IN ('.implode(',',$v_DC->Format('row_array')).')';
			}else{
				$a_SQL['where-tag']=' AND ve.ID IN (0)';
			}
		}
		if($this->A_Search['events']['calendar']['on']){$a_SQL['where-date']=' AND DATE(ve.o_date)="'.$this->A_Search['events']['calendar']['date'].'"';}
		if($this->A_Search['events']['specific']['on']){$a_SQL['where-specific']=' AND ve.ID="'.$this->A_Search['events']['specific']['ID'].'"';
		}elseif($this->A_Search['events']['similar']['on']){$a_SQL['where-similar']=' AND ve.name="'.$this->A_Search['events']['similar']['name'].'"';}
		if($this->A_Search['events']['search']['on']){
			switch($this->A_Search['events']['search']['value']){
				case 0:default:$a_SQL['where-search']='';break;
				case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:$a_SQL['where-search']=' AND ve.o_place='.($this->A_Search['events']['search']['value']-1);break;
			}
		}
		// SQL - Order
		switch($this->A_Search['events']['sort']['value']){
			case 0:default:$a_SQL['order-base']=' ve.o_date ASC, ve.start ASC, ve.counted DESC';break;
			case 1:$a_SQL['order-base']=' ve.counted DESC, ve.o_date ASC, ve.start ASC';break;
			case 2:$a_SQL['order-base']=' ve.name ASC, ve.o_date ASC, ve.start ASC';break;
			case 3:$a_SQL['order-base']=' ve.name DESC, ve.o_date ASC, ve.start ASC';break;
		}
		if($v_SQLRequest){
			$a_SQL['select-base']=' ve.ID, ve.name, ve.description AS comment, ve.library AS location_name, DAY(ve.o_date) AS day, ve.start AS start_time, ve.end AS end_time, ve.o_place AS location_id';
			$a_SQL['where-base']=' YEAR(ve.o_date)='.$a_Date[0].' AND MONTH(ve.o_date)='.$a_Date[1];
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
		// Search Results Total
		$a_SQL['select-base']=' COUNT(ve.ID) AS total';
		$v_DC->Query(implode('',$a_SQL),true);
		if($v_DC->Count_res()>0){
			$a_Page=$v_DC->Fetch('assoc');
			$this->A_Search['events']['total-records']=$a_Page['total'];
			$this->A_Search['events']['total-pages']=FF_CalculateTotal($a_Page['total'],$this->A_Search['events']['maximum-records']);
		}
		$this->A_Search['events']['header']=$this->F_ConstructEventsHeader();
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>$v_Cell,
				'switch'=>'failed',
				'header'=>$this->A_Search['events']['header']
			));
		}else{
			$a_OpenLineData=array();
			foreach($a_Data as $v_Key=>$a_Line){$a_OpenLineData[$v_Key]=$this->F_GetOpenLine('events',$a_Data[$v_Key]['ID']);}
			return json_encode(array(
				'alias'=>'events',
				'switch'=>'data',
				'data'=>$a_Data,
				'open-line-data'=>$a_OpenLineData,
				'header'=>$this->A_Search['events']['header'],
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
			'where-base'=>' (DATE_ADD(vn.entered_on, INTERVAL vn.duration DAY)>="'.$this->F_CurrentDate().'" OR vn.duration=0)',
			'where-tag'=>'',
			'where-date'=>'',
			'where-person'=>'',
			'where-specific'=>'',
			'where-similar'=>'',
			'group-by'=>' GROUP BY vn.ID',
			'order-start'=>' ORDER BY',
			'order-base'=>' vn.duration DESC, vn.entered_on DESC',
			'limit-start'=>' LIMIT',
			'limit-base'=>' '.$this->F_CalculateLimit('news').';'
		);
		// SQL - Where
		if($this->A_Search['tag']['on']){
			$v_SQL='SELECT DISTINCT(htba.ID) FROM hex_tags_by_article AS htba WHERE htba.tag_ID='.$this->A_Search['tag']['ID'].';';
			$v_DC->Query($v_SQL,true);
			if($v_DC->Count_res()>0){
				$a_SQL['where-tag']=' AND vn.ID IN ('.implode(',',$v_DC->Format('row_array')).')';
			}else{
				$a_SQL['where-tag']=' AND vn.ID IN (0)';
			}
		}
		if($this->A_Search['news']['calendar']['on']){$a_SQL['where-date']=' AND DATE(vn.entered_on)="'.$this->A_Search['news']['calendar']['date'].'"';}
		if($this->A_Search['news']['person']['on']){$a_SQL['where-person']=' AND vn.entered_by_ID='.$this->A_Search['news']['person']['ID'];}
		if($this->A_Search['news']['specific']['on']){$a_SQL['where-specific']=' AND vn.ID="'.$this->A_Search['news']['specific']['ID'].'"';
		}elseif($this->A_Search['news']['similar']['on']){$a_SQL['where-similar']=' AND vn.name="'.$this->A_Search['news']['similar']['name'].'"';}
		// SQL - Order
		switch($this->A_Search['news']['sort']['value']){
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
		// Search Results Total
		$a_SQL['select-base']=' COUNT(vn.ID) AS total';
		$v_DC->Query(implode('',$a_SQL),true);
		if($v_DC->Count_res()>0){
			$a_Cell=$v_DC->Fetch('assoc');
			$this->A_Search['news']['total-records']=$a_Cell['total'];
			$this->A_Search['news']['total-pages']=FF_CalculateTotal($a_Cell['total'],$this->A_Search['news']['maximum-records']);
		}
		$this->A_Search['news']['header']=$this->F_ConstructNewsHeader();
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>'news',
				'switch'=>'failed',
				'header'=>$this->A_Search['news']['header']
			));
		}else{
			$a_OpenLineData=array();
			foreach($a_Data as $v_Key=>$a_Line){$a_OpenLineData[$v_Key]=$this->F_GetOpenLine('news',$a_Data[$v_Key]['ID']);}
			return json_encode(array(
				'alias'=>'news',
				'switch'=>'data',
				'data'=>$a_Data,
				'open-line-data'=>$a_OpenLineData,
				'header'=>$this->A_Search['news']['header'],
				'page'=>$this->F_GetPageInformation('news')
			));
		}
	}
	//
	// H e a d e r s
	// *******************************************************************************
	//
	// Function - Construct Events Header
	function F_ConstructEventsHeader(){
		$a_Description=array(
			'description-favorite'=>(($this->A_Search['events']['favorites']['on'])?'my favorite ':''),
			'description-base'=>'events',
			'description-search'=>'',
			'description-calendar'=>(($this->A_Search['events']['calendar']['on'])?' on '.$this->A_Search['events']['calendar']['date']:''),
			'description-tag'=>(($this->A_Search['tag']['on'])?' tagged as '.$this->A_Search['tag']['name']:''),
			'description-similar'=>'',
			'description-specific'=>'',
			'order-by'=>' sorted by date.'
		);
		if($this->A_Search['events']['specific']['on']){
			$a_Description['description-specific']=' titled "'.$this->A_Search['events']['specific']['name'].'"';
		}elseif($this->A_Search['events']['similar']['on']){
			$a_Description['description-similar']=' titled "'.$this->A_Search['events']['similar']['name'].'"';
		}
		if($this->A_Search['events']['search']['on']){
			switch($this->A_Search['events']['search']['value']){
				case 0:default:
					$a_Description['description-search']='';
					break;
				case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:
					$a_Description['description-search']=' at '.F_GetLibraryName($this->A_Search['events']['search']['value']);
					break;
			}
		}
		switch($this->A_Search['events']['sort']['value']){
			case 0:default:$a_Description['order-by']=' sorted by date.';break;
			case 1:$a_Description['order-by']=' sorted by anticipation.';break;
			case 2:$a_Description['order-by']=' sorted alphabetically.';break;
			case 3:$a_Description['order-by']=' sorted alphabetically in reverse order.';break;
		}
		return ucfirst(implode('',$a_Description));
	}
	//
	// Function - Construct News Header
	function F_ConstructNewsHeader(){
		$a_Description=array(
			20=>(($this->A_Search['news']['favorites']['on'])?'my favorite ':''),
			30=>'articles',
			40=>(($this->A_Search['news']['calendar']['on'])?' released on '.$this->A_Search['news']['calendar']['date']:''),
			50=>(($this->A_Search['tag']['on'])?' tagged as '.$this->A_Search['tag']['name']:''),
			60=>'',
			70=>' sorted by date.'
		);
		if($this->A_Search['news']['specific']['on']){
			$a_Description[60]=' titled "'.$this->A_Search['news']['specific']['name'].'"';
		}elseif($this->A_Search['news']['similar']['on']){
			$a_Description[60]=' titled "'.$this->A_Search['news']['similar']['name'].'"';
		}
		switch($this->A_Search['news']['sort']['value']){
			case 0:default:$a_Description[70]=' sorted by date.';break;
			case 1:$a_Description[70]=' sorted alphabetically.';break;
			case 2:$a_Description[70]=' sorted alphabetically in reverse order.';break;
		}
		return ucfirst(implode('',$a_Description));
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
		$this->A_Paremters['message-filter']=$v_MessageFilter;
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
		$this->A_Parameters['featured-database']=$a_Data[0];
	}
	//
	// Function - Get Featured Article
	function F_GetFeaturedArticle(){
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT hfa.article_ID FROM hex_featured_article AS hfa LIMIT 1;');
		$a_Data=$v_DC->Format('row_array');
		$this->A_Parameters['featured-article']=$a_Data[0];
	}
	//
	// Array - Features
	private $A_Features=array(
		'databases'=>0,
		'events'=>0,
		'materials'=>0,
		'news'=>0
	);

	//
	// Functions

	//
	// Function - Change All Current Pages
	function F_ChangeAllCurrentPages(){
		foreach($this->A_Search as $v_SearchKey=>$a_Search){if(array_key_exists('current-page',$a_Search)){$this->F_Page($v_SearchKey,1);}}
	}
	//
	// Function - Change All Dates
	function F_ChangeAllDates(){foreach($this->A_Search as $v_SearchKey=>$a_Search){if(array_key_exists('calendar',$a_Search)){$this->F_ChangeDate($v_SearchKey,'');}}}
	//
	// Function - Change All Searches
	function F_ChangeAllSearches(){foreach($this->A_Search as $v_SearchKey=>$a_Search){if(array_key_exists('search',$a_Search)){$this->F_ChangeSearch($v_SearchKey,0);}}}
	//
	// Function - Change All Similars
	function F_ChangeAllSimilars(){foreach($this->A_Search as $v_SearchKey=>$a_Search){if(array_key_exists('similar',$a_Search)){$this->F_ChangeSimilar($v_SearchKey,'');}}}
	//
	// Function - Change All Sorts
	function F_ChangeAllSorts(){foreach($this->A_Search as $v_SearchKey=>$a_Search){if(array_key_exists('sort',$a_Search)){$this->F_ChangeSort($v_SearchKey,0);}}}
	//
	// Function - Change Date
	function F_ChangeDate($v_Area='news',$v_Secondary=''){$this->A_Search[$v_Area]['calendar']=array('on'=>(($v_Secondary!=='')?true:false),'date'=>$v_Secondary);}
	//
	// Function - Change Specific
	function F_ChangeSpecific($v_Area='news',$v_Secondary=''){
		$this->A_Search[$v_Area]['specific']=array(
			'on'=>(($v_Secondary>0)?true:false),
			'ID'=>$v_Secondary,
			'name'=>(($v_Secondary>0)?$this->F_GetName($v_Area,$v_Secondary):'')
		);
	}
	//
	// Function - Change Search
	function F_ChangeSearch($v_Area='news',$v_Secondary=0){$this->A_Search[$v_Area]['search']=array('on'=>(($v_Secondary>0)?true:false),'value'=>$v_Secondary);}
	//
	// Function - Change Sort
	function F_ChangeSort($v_Area='news',$v_Secondary=0){$this->A_Search[$v_Area]['sort']=array('on'=>(($v_Secondary>0)?true:false),'value'=>$v_Secondary);}
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
		if(!$this->A_Search[$v_Area]['similar']['on']&&$v_Name!==''){
			$this->A_Search[$v_Area]['similar']=array('on'=>true,'name'=>$v_Name);
		}else{
			$this->A_Search[$v_Area]['similar']=array('on'=>false,'name'=>'');
		}
	}
	// Variable - Quick Return
	private $V_QuickReturn=false;
	// Function - Perform Quick Command
	function F_PerformQuickCommand($v_Area='home',$v_Command='reset'){$this->V_QuickReturn=true;$this->F_PerformCommand($v_Area,$v_Command);}
	// Function - Perform Command
	function F_PerformCommand($v_Area='home',$v_Command='suggest',$v_Main='',$v_Secondary=''){
		// Moved
		if($this->V_Area!==$v_Area){
			$this->V_Area=$v_Area;
			$this->F_ChangeAllCurrentPages();
			$this->F_ChangeAllSimilars();
			$this->F_ChangeSpecific($v_Area,0);
		}
		// Perform Command I
		switch($v_Command){
			case 'page':$this->F_Page($v_Area,$v_Main);break;
			case 'browse':case 'suggest':$this->A_Search[$v_Area]['current-target']=0;break;
			case 'in-list':$this->A_Search[$v_Area]['current-target']=$v_Secondary;break;
			case 'specific':$this->F_ChangeSpecific($v_Area,$v_Secondary);break;
			case 'similar':$this->F_ChangeSimilar($v_Area,$this->F_GetName($v_Area,$v_Secondary));break;
			case 'change-date':$this->F_ChangeDate($v_Area,$v_Secondary);break;
			case 'change-popular':case 'change-tag':
				$this->F_ChangeAllCurrentPages();
				$this->F_ChangeTag($v_Secondary);break;
			case 'change-search':$this->F_ChangeSearch($v_Area,$v_Secondary);break;
			case 'change-sort':$this->F_ChangeSort($v_Area,$v_Secondary);break;
			case 'reset':
				$this->F_ChangeSpecific($v_Area,0);
				$this->F_ChangeTag(0);
				$this->F_ChangeAllSearches();
				$this->F_ChangeAllSimilars();
				$this->F_ChangeAllSorts();
				$this->F_ChangeAllDates();
				$this->F_ChangeAllCurrentPages();
				if($this->V_QuickReturn){$this->V_QuickReturn=false;return;}
				break;
			default:break;
		}
		// Perform Command II
		switch($v_Command){
			case 'similar':
				$this->F_ChangeAllCurrentPages();
			case 'reset':
			case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':case 'specific':
			case 'page':
				$this->A_Search[$v_Area]['current-target']=0;
			case 'in-list':
				$v_Command='browse';
			case 'browse':case 'suggest':
				switch($v_Area){
					default:
						break;
					case 'home':return $this->F_PushHome($v_Main);break;
					case 'news':return $this->F_PushNews($v_Command,false,true);break;
					case 'events':return $this->F_PushEvents($v_Command,false,true);break;
					case 'materials':return $this->F_PushMaterials($v_Command,false,true);break;
					case 'databases':return $this->F_PushDatabases($v_Command,false,true);break;
				}
				break;
			case 'open-line':
				return json_encode(array(
					'alias'=>'browse',
					'pointer'=>$v_Area,
					'switch'=>'open-line',
					'open-line-data'=>$this->F_GetOpenLine($v_Area,$v_Secondary)
				));
				break;
			default:
				break;
		}
	}
	//
	// Function - Set Specific Tag
	function F_SetSpecificTag($v_TagID=0,$v_TagName=''){$this->A_Search['tag']=array('on'=>(($v_TagID>0)?true:false),'ID'=>$v_TagID,'name'=>$v_TagName);}
	//
	// Function - Set Unknown Tag
	function F_SetUnknownTag($v_TagID=0){$v_DC=db::getInstance();$v_DC->Query('SELECT name FROM hex_tags WHERE ID='.$v_TagID.';');$a_Data=$v_DC->Format('assoc');$this->F_SetSpecificTag($v_TagID,$a_Data['name']);}

	//
	// Array - Parameters
	private $A_Parameters=array(
		'featured-article'=>0,
		'featured-database'=>0,
		'message-filter'=>false
	);
	//
	// Array - Search
	private $A_Search=array(
		'news'=>array(
			'calendar'=>array(
				'on'=>false,
				'date'=>''
			),
			'current-page'=>1,
			'current-target'=>0,
			'favorites'=>array(
				'initialized'=>false,
				'on'=>false,
				'data'=>array()
			),
			'header'=>'',
			'maximum-records'=>10,
			'person'=>array(
				'on'=>false,
				'ID'=>0
			),
			'similar'=>array(
				'name'=>'',
				'on'=>false
			),
			'sort'=>array(
				'on'=>false,
				'value'=>0
			),
			'specific'=>array(
				'ID'=>0,
				'on'=>false
			),
			'total-pages'=>0,
			'total-records'=>0
		),
		'events'=>array(
			'calendar'=>array(
				'on'=>false,
				'date'=>''
			),
			'current-page'=>1,
			'current-target'=>0,
			'favorites'=>array(
				'initialized'=>false,
				'on'=>false,
				'data'=>array()
			),
			'header'=>'',
			'maximum-records'=>10,
			'similar'=>array(
				'name'=>'',
				'on'=>false
			),
			'search'=>array(
				'on'=>false,
				'value'=>0
			),
			'sort'=>array(
				'on'=>false,
				'value'=>0
			),
			'specific'=>array(
				'ID'=>0,
				'on'=>false
			),
			'total-pages'=>0,
			'total-records'=>0
		),
		'materials'=>array(
			'calendar'=>array(
				'on'=>false,
				'date'=>''
			),
			'current-page'=>1,
			'current-target'=>0,
			'favorites'=>array(
				'initialized'=>false,
				'on'=>false,
				'data'=>array()
			),
			'header'=>'',
			'maximum-records'=>10,
			'person'=>array(
				'on'=>false,
				'ID'=>0
			),
			'similar'=>array(
				'name'=>'',
				'on'=>false
			),
			'sort'=>array(
				'on'=>false,
				'value'=>0
			),
			'specific'=>array(
				'ID'=>0,
				'on'=>false
			),
			'total-pages'=>0,
			'total-records'=>0
		),
		'databases'=>array(
			'calendar'=>array(
				'on'=>false,
				'date'=>''
			),
			'current-page'=>1,
			'current-target'=>0,
			'favorites'=>array(
				'initialized'=>false,
				'on'=>false,
				'data'=>array()
			),
			'header'=>'',
			'maximum-records'=>10,
			'person'=>array(
				'on'=>false,
				'ID'=>0
			),
			'similar'=>array(
				'name'=>'',
				'on'=>false
			),
			'sort'=>array(
				'on'=>false,
				'value'=>0
			),
			'specific'=>array(
				'ID'=>0,
				'on'=>false
			),
			'total-pages'=>0,
			'total-records'=>0
		),
		'tag'=>array(
			'on'=>false,
			'ID'=>0,
			'name'=>''
		)
	);
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
	// Function - Current Date
	function F_CurrentDate(){return date('Y-m-d',time());}
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
		$this->A_Search[$v_Key]['current-target']=$v_OpenLineID;
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
			$a_Record['similar']=$this->A_Search[$v_Key]['similar']['on'];
			$a_Record['specific']=$this->A_Search[$v_Key]['specific']['on'];
			return $a_Record;
		}
		
	}
	//
	// Function - Get Page Information
	function F_GetPageInformation($v_Key='news'){
		return array(
			'current-page'=>$this->A_Search[$v_Key]['current-page'],
			'total-pages'=>$this->A_Search[$v_Key]['total-pages'],
			'total-records'=>$this->A_Search[$v_Key]['total-records']
		);
	}
	//
	// Function - Page
	function F_Page($v_Key='news',$v_PageNumber=1){
		if($this->F_SearchKeyExists($v_Key)){
			if($v_PageNumber<=$this->A_Search[$v_Key]['total-pages']){
				$this->A_Search[$v_Key]['current-page']=$v_PageNumber;
			}
		}
	}
	//
	// Function - Next Page
	function F_NextPage($v_Key='news'){if($this->F_SearchKeyExists($v_Key)){if($this->A_Search[$v_Key]['current-page']<$this->A_Search[$v_Key]['total-pages']){$this->A_Search[$v_Key]['current-page']++;}}}
	//
	// Function - Previous Page
	function F_PreviousPage($v_Key='news'){if($this->F_SearchKeyExists($v_Key)){if($this->A_Search[$v_Key]['current-page']>1){$this->A_Search[$v_Key]['current-page']--;}}}
	//
	// Function - Refresh
	function F_Refresh(){$this->F_SetSpecificTag();foreach(array('news','events','materials','databases') as $v_Key){$this->F_ResetArea($v_Key);}}
	//
	// Function - Reset Area
	function F_ResetArea($v_Key='news'){
		if($this->F_SearchKeyExists($v_Key)){
			$this->A_Search[$v_Key]['calendar']=array('on'=>false,'date'=>'');
			$this->A_Search[$v_Key]['search']=array('on'=>false,'value'=>'');
			$this->A_Search[$v_Key]['sort']=array('on'=>false,'value'=>'');
			$this->A_Search[$v_Key]['similar']=array('on'=>false,'name'=>'');
			$this->A_Search[$v_Key]['specific']=array('ID'=>0,'on'=>false,'name'=>'');
			$this->A_Search[$v_Key]['current-page']=1;
			$this->A_Search[$v_Key]['current-target']=0;
		}
	}
	//
	// Function - Search Key Exists
	function F_SearchKeyExists($v_Key=''){return array_key_exists($v_Key,$this->A_Search);}
	//
	// Function - Set IP
	function F_SetIP($v_IP=''){$a_IP=$v_IP.explode('.',$v_IP,4);$this->A_User['IP']=(intval($a_IP[0])*pow(2,24))+(intval($a_IP[1])*pow(2,16))+(intval($a_IP[2])*pow(2,8))+intval($a_IP[3]);}
	//
	// Function - Toggle Key
	function F_ToggleKey($v_Key='news',$v_Type='favorites'){if($this->F_SearchKeyExists($v_Key)){$this->A_Search[$v_Key][$v_Type]=0;}else{$this->A_Search[$v_Key][$v_Type]=1;}}

	//
	// Data Push

	//
	// Function - Create Push List
	function F_CreatePushList($v_Main='materials',$v_Select=0){
		if($v_Select>0){
			$v_PushType=$v_Select;
		}else{
			//$v_Featured=$this->A_Features[$v_Main];
			switch($v_Main){
				default:return;
					break;
				case 'news':
					$v_PushType=(($this->A_Search['tag']['on'])?100:110);
					//$v_PushType=(($this->A_Search['tag']['on'])?100:(($v_Featured==0)?111:110));
					//if($v_Featured>2){$v_Featured=0;}else{$v_Featured++;}
					break;
				case 'events':
					$v_PushType=(($this->A_Search['tag']['on'])?200:210);
					break;
				case 'databases':
					$v_PushType=(($this->A_Search['tag']['on'])?400:410);
					break;
				case 'materials':
					$v_PushType=$this->F_SelectMaterialsPush();
					break;
			}
			//$this->A_Features[$v_Main]=$v_Featured;
		}
		$this->A_PreviousPush[$v_Main]=$v_PushType;
		$v_DC=db::getInstance();
		switch($v_PushType){
			default:
				break;
			case 100: // Suggest Articles I (Tag Search)
				$this->A_Search[$v_Main]['header']='Articles tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$this->A_Search['tag']['ID'].'" name="tag/drop" style="font-size:14px;">'.$this->A_Search['tag']['name'].'</a>.';
				return ' ht.ID='.$this->A_Search['tag']['ID'];
				break;
			case 110: // Suggest Articles II
				$this->A_Search[$v_Main]['header']='Recent news and articles.';
				return ' vn.entered_on<=NOW()';
				break;
			case 111: // Suggest Articles III
				$this->A_Search[$v_Main]['header']='Featured Article';
				return ' va.ID='.$this->A_Parameters['featured-article'];
				break;
			case 200: // Suggest Events I (Tag Search)
				$this->A_Search[$v_Main]['header']='Events tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$this->A_Search['tag']['ID'].'" name="tag/drop" style="font-size:14px;">'.$this->A_Search['tag']['name'].'</a>.';
				return ' ht.ID='.$this->A_Search['tag']['ID'];
				break;
			case 210: // Suggest Events II
				$this->A_Search[$v_Main]['header']='Upcoming events.';
				return ' ve.o_date>=CURDATE() AND ve.o_date<="'.date('Y-m-d',strtotime('today + 14 days')).'"';
				break;
			case 300: // Suggest Materials I (Tag Search)
				$this->A_Search[$v_Main]['header']='Materials tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$this->A_Search['tag']['ID'].'" name="tag/drop" style="font-size:14px;">'.$this->A_Search['tag']['name'].'</a>.';
				return $this->A_Search['tag']['ID'];
			case 310: // Suggest Materials II
				$v_DC->Query('SELECT ht.ID, ht.name FROM hex_tags AS ht LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID=ht.ID) GROUP BY htbm.tag_ID ORDER BY RAND() LIMIT 1');
				$a_Data=$v_DC->Format('assoc');
				$this->A_Search[$v_Main]['header']='Materials tagged as <a class="tag-change fake-link font-bold font-L" ID="value-'.$a_Data['ID'].'" name="tag/drop" style="font-size:14px;">'.$a_Data['name'].'</a>.';
				return $a_Data['ID'];
				break;
			case 400: // Suggest Databases I (Tag Search)
				$this->A_Search[$v_Main]['header']='Related Database';
				return ' ht.ID='.$this->A_Search['tag']['ID'];
				break;
			case 410: // Suggest Databases II
				$this->A_Search[$v_Main]['header']='Featured Database';
				return ' hd.ID='.$this->A_Parameters['featured-database'];
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
				$v_SQL='SELECT hd.ID, hd.name, hd.description, hd.link_in, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM hex_databases AS hd LEFT JOIN hex_tags_by_database AS htbd ON (htbd.ID=hd.ID) LEFT JOIN hex_tags AS ht ON (htbd.tag_ID=ht.ID) WHERE'.$this->F_CreatePushList($v_Main,$v_Select).' GROUP BY hd.ID ORDER BY RAND() LIMIT 1;';
				break;
			case 'news':
				$v_SQL='SELECT vn.ID, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%W, %M %D") AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM viewable_news AS vn LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID) LEFT JOIN hex_tags AS ht ON (htba.tag_ID=ht.ID) WHERE'.$this->F_CreatePushList($v_Main,$v_Select).' GROUP BY vn.ID ORDER BY vn.entered_on DESC LIMIT 6;';
				break;
			case 'events':
				$v_SQL='SELECT ve.ID, ve.name, ve.o_place AS library_ID, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%W, %M %D") AS `date-words`, ve.start, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM viewable_events AS ve LEFT JOIN hex_tags_by_event AS htbe ON (htbe.ID=ve.ID) LEFT JOIN hex_tags AS ht ON (htbe.tag_ID=ht.ID) WHERE'.$this->F_CreatePushList($v_Main,$v_Select).' ORDER BY RAND() LIMIT 6;';
				break;
			case 'materials':
				$v_SQL='SELECT vm.ID, vm.ISBNorSN, vm.name AS title FROM hex_tags_by_material AS htbm LEFT JOIN viewable_materials AS vm ON (vm.ID=htbm.ID) WHERE htbm.tag_ID IN ('.$this->F_CreatePushList($v_Main,$v_Select).') ORDER BY RAND() LIMIT 5;';
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
				'header'=>$this->A_Search[$v_Main]['header']
			));
		}else{
			return json_encode(array(
				'alias'=>$v_Main,
				'pointer'=>$this->V_Area,
				'switch'=>'data',
				'data'=>$a_Data,
				'header'=>$this->A_Search[$v_Main]['header']
			));
		}
	}
	//
	// Function - Select Materials Push
	function F_SelectMaterialsPush(){
		// Suggestions II
		$v_MaterialPush=310;
		if($this->A_Search['tag']['on']){
			// Suggestions I
			$v_MaterialPush=300;
		}
		return $v_MaterialPush;
	}

	//
	// Search
	
	//
	// Function - Calculate Limit
	function F_CalculateLimit($v_Key='news'){
		return (($this->A_Search[$v_Key]['current-page']-1)*$this->A_Search[$v_Key]['maximum-records']).','.$this->A_Search[$v_Key]['maximum-records'];
	}
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
			20=>(($this->A_Search['databases']['favorites']['on'])?' my favorite':''),
			30=>' databases and services',
			50=>(($this->A_Search['tag']['on'])?' tagged as '.$this->A_Search['tag']['name']:''),
			60=>'',
			70=>' sorted by alphabetically.'
		);
		switch($this->A_Search['news']['sort']['value']){
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
			'limit-base'=>' '.$this->F_CalculateLimit('databases').';'
		);
		// SQL - Where
		if($this->A_Search['tag']['on']){
			$v_SQL='SELECT DISTINCT(htbd.ID) FROM hex_tags_by_database AS htbd WHERE htbd.tag_ID='.$this->A_Search['tag']['ID'].';';
			$v_DC->Query($v_SQL,true);
			if($v_DC->Count_res()>0){
				$a_SQL['where-tag']=' AND hd.ID IN ('.implode(',',$v_DC->Format('row_array')).')';
			}else{
				$a_SQL['where-tag']=' AND hd.ID IN (0)';
			}
		}
		// SQL - Order
		switch($this->A_Search['databases']['sort']['value']){
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
			$this->A_Search['databases']['total-records']=$a_Cell['total'];
			$this->A_Search['databases']['total-pages']=FF_CalculateTotal($a_Cell['total'],$this->A_Search['databases']['maximum-records']);
		}
		$this->A_Search['databases']['header']=$this->F_ConstructDatabasesHeader();
		if(empty($a_Data)){
			return json_encode(array(
				'alias'=>$v_Cell,
				'pointer'=>$this->V_Area,
				'switch'=>'failed',
				'header'=>$this->A_Search['databases']['header']
			));
		}else{
			return json_encode(array(
				'alias'=>$v_Cell,
				'pointer'=>$this->V_Area,
				'switch'=>'data',
				'data'=>$a_Data,
				'header'=>$this->A_Search['databases']['header'],
				'open-line-data'=>$this->F_GetOpenLine('databases',(($this->A_Search['databases']['current-target']>0)?$this->A_Search['databases']['current-target']:$a_Data[0]['ID'])),
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