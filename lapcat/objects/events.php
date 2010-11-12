<?
class Events{
	//
	// ARRAYS
	//
	//
	// Array - Libraries
	private $A_Libraries=array(
		1=>'Main Library',
		2=>'Coolspring',
		3=>'Fish Lake',
		4=>'Hanna',
		5=>'Kingsford Heights',
		6=>'Rolling Prairie',
		7=>'Union Mills',
		8=>'Mobile Library'
	);
	//
	// Array - Parameters
	private $A_Parameters=array(
		'current-page'=>1,
		'maximum-records'=>10,
		'search'=>0,
		'similar'=>false,
		'sort'=>0,
		'target'=>0,
		'total-pages'=>0,
		'total-records'=>0
	);
	//
	// Array - Previous Search
	private $A_PreviousSearch=array(
		'parameters'=>array(),
		'search'=>array(),
		'similar-search'=>'',
		'tag-name'=>''
	);
	//
	// Array - Search
	private $A_Search=array(
		'calendar'=>0,
		'change-filter'=>'',
		'change-search'=>0,
		'change-sort'=>0,
		'change-tag'=>0
	);
	//
	// VARIABLES
	//
	//
	// Variable - Similar Search
	private $V_SimilarSearch='';
	//
	// Variable - Tag Name
	private $V_TagName='';
	//
	// FUNCTIONS
	//
	//
	// Function - Events
	function Events($v_UserID=0,$v_TagID=0){
		$this->F_ResetSearch($v_UserID);
		$this->A_Search['change-tag']=$v_TagID;
	}
	//
	// Function - Change Tag
	function F_ChangeTag($v_UserID=0,$v_TagID=0,$v_TagName=''){$this->A_Search['change-tag']=$v_TagID;$this->V_TagName=$v_TagName;}
	//
	// Function - Change Search
	function F_ChangeSearch($v_UserID=0,$v_Key='',$v_Search=0){switch($v_Key){case '':break;default:if(array_key_exists($v_Key,$this->A_Search)){$this->A_Search[$v_Key]=$v_Search;}break;}}
	//
	// Function - Construct Date
	//function F_ConstructDate($v_Day=0){return date('l, F jS',strtotime(date('y-m-'.$v_Day)));}
	//
	// Function - Construct Description
	function F_ConstructDescription($v_UserID=0){
		$a_Description=array(
			'description-A'=>'I am browsing',
			'filter'=>'',
			'search'=>' events',
			'library'=>'',
			'tag'=>'',
			'similar'=>'',
			'date'=>'',
			'order-by'=>' sorted by date.'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'calendar':
					switch($v_Search){
						case '':$a_Description['date']='';break;
						default:$a_Description['date']=' occurring on '.$v_Search;break;
					}break;
				case 'change-filter':
					switch($v_Search){
						case 'anticipated':$a_Description['filter']=' my anticipated';break;
						case 'favorites':$a_Description['filter']=' my favorite';break;
						case 'summer':$a_Description['filter']=' Summer Reading Program';break;
						case 'points':$a_Description['filter']=' LAPCAT Points Program';break;
						default:break;
					}
					break;
				case 'change-search':
					switch($v_Search){
						case 0:default:$a_Description['library']='';break;
						case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:$a_Description['library']=' at '.$this->A_Libraries[$v_Search];break;
					}break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_Description['order-by']=' sorted by date.';break;
						case 1:$a_Description['order-by']=' sorted by anticipation.';break;
						case 2:$a_Description['order-by']=' sorted alphabetically.';break;
						case 3:$a_Description['order-by']=' sorted alphabetically in reverse order.';break;
					}
					break;
				case 'change-tag':
					switch($v_Search){
						case 0:$a_Description['tag']='';break;
						default:$a_Description['tag']=' tagged as '.$this->V_TagName;break;
					}
					break;
			}
		}
		if($this->A_Parameters['similar']){
			switch($this->V_SimilarSearch){
				case '':$a_Description['similar']='';break;
				default:$a_Description['similar']=' titled '.$this->V_SimilarSearch;break;
			}
		}
		return implode('',$a_Description);
	}
	//
	// Function - Construct Hotkey Link
	function F_ConstructHotkeyLink($v_UserID=0,$v_AreaID=0){
		$v_Link='hotkey';
		foreach($this->A_Search as $v_Key=>$v_Data){if($v_Data>0){$v_Link.='/'.$v_Key.'/'.$v_Data;}}
		if($this->A_Search['change-tag']>0){$v_Link.='/tag-name/'.$this->V_TagName;}
		return $v_Link;
	}
	//
	// Function - Construct Search
	function F_ConstructSearch($v_UserID=0,$v_RSS=false){
		$a_SQL=array(
			'SQL-A'=>'SELECT ve.counted, ve.ID,'.(($v_RSS)?' ve.description AS text,':'').' ve.name, ve.o_place, ve.library, ve.o_date, ve.start, ve.end, ve.summer, ve.slider, ve.tournament, hm.user_ID AS watched, hf.content_ID AS favorite FROM viewable_events AS ve LEFT JOIN hex_markers AS hm ON (hm.user_ID=',
			'user-ID-A'=>$v_UserID,
			'SQL-B'=>'&&calendar_ID=ve.ID)',
			'SQL-C'=>'',
			'SQL-D'=>' LEFT JOIN hex_favorites AS hf ON (hf.user_ID=',
			'user-ID-B'=>$v_UserID,
			'SQL-E'=>' AND hf.favorite_type=1 AND hf.content_ID=ve.ID)',
			'SQL-F'=>' WHERE ve.ID>0',
			'where-A'=>'',
			'where-B'=>'',
			'where-C'=>'',
			'where-D'=>'',
			'date'=>'',
			'order-by'=>' ORDER BY ve.o_date ASC, ve.start ASC, ve.counted DESC',
			'limit'=>' LIMIT '.(($this->A_Parameters['current-page']-1)*$this->A_Parameters['maximum-records']).','.$this->A_Parameters['maximum-records'].';'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'calendar':
					switch($v_Search){
						case '':$a_SQL['date']='';break;
						default:$a_SQL['date']=' AND DATE(ve.o_date)="'.$v_Search.'"';break;
					}break;
				case 'change-filter':
					switch($v_Search){
						case 'anticipated':$a_SQL['where-D']=' AND hm.user_ID>0';break;
						case 'favorites':$a_SQL['where-D']=' AND hf.content_ID>0';break;
						case 'points':$a_SQL['where-D']=' AND ve.slider>0';break;
						case 'summer':$a_SQL['where-D']=' AND ve.summer>0';break;
						default:$a_SQL['where-D']='';break;
					}
					break;
				case 'change-search':
					switch($v_Search){
						case 0:default:$a_SQL['where-A']='';break;
						case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:$a_SQL['where-A']=' AND ve.o_place='.($v_Search-1);break;
					}break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_SQL['order-by']=' ORDER BY ve.o_date ASC, ve.start ASC, ve.counted DESC';break;
						case 1:$a_SQL['order-by']=' ORDER BY ve.counted DESC, ve.o_date ASC, ve.start ASC';break;
						case 2:$a_SQL['order-by']=' ORDER BY ve.name ASC, ve.o_date ASC, ve.start ASC';break;
						case 3:$a_SQL['order-by']=' ORDER BY ve.name DESC, ve.o_date ASC, ve.start ASC';break;
					}break;
				case 'change-tag':
					switch($v_Search){
						case 0:$a_SQL['where-B']='';$a_SQL['SQL-C']='';break;
						default:$a_SQL['where-B']=' AND htbev.tag_ID='.$v_Search;$a_SQL['SQL-C']=' LEFT JOIN hex_tags_by_event AS htbev ON (htbev.ID=ve.ID&&htbev.tag_ID='.$v_Search.')';break;
					}break;
			}
		}
		$v_DC=db::getInstance();
		if($this->A_Parameters['similar']){
			switch($this->V_SimilarSearch){
				case '':$a_SQL['where-C']='';break;
				default:$a_SQL['where-C']=' AND ve.name="'.$this->V_SimilarSearch.'"';break;
			}
		}
		$v_DC->Query('SELECT COUNT(*) AS total FROM viewable_events AS ve LEFT JOIN hex_markers AS hm ON (hm.user_ID='.$a_SQL['user-ID-A'].$a_SQL['SQL-B'].$a_SQL['SQL-C'].$a_SQL['SQL-D'].$a_SQL['user-ID-B'].$a_SQL['SQL-E'].$a_SQL['SQL-F'].$a_SQL['where-A'].$a_SQL['where-B'].$a_SQL['where-C'].$a_SQL['where-D'].$a_SQL['date']);
		if($v_DC->Count_res()>0){
			$a_Total=$v_DC->Fetch('assoc');
			$this->A_Parameters['total-records']=$a_Total['total'];
			$this->A_Parameters['total-pages']=FF_CalculateTotal($a_Total['total'],$this->A_Parameters['maximum-records']);
		}
		return implode('',$a_SQL);
	}
	//
	// Function - Create RSS Feed
	function F_CreateRSSFeed($v_UserID=0,$a_GET=array()){
		foreach($a_GET as $v_Key=>$v_Value){
			$this->F_ChangeSearch($v_UserID,$v_Key,$v_Value);
		}
		$v_DC=db::getInstance();
		$v_DC->Query($this->F_ConstructSearch($v_UserID,true,((isset($_GET['user-ID']))?$_GET['user-ID']:0)));
		if($v_DC->Count_res()>0){
			return $v_DC->Format('assoc_array');
		}
	}
	//
	// Function - First Page
	function F_FirstPage($v_UserID=0){$this->A_Parameters['current-page']=1;}
	//
	// Function - Get Thin Line
	function F_GetThinLine($v_UserID=0){
		/*
		$a_Records=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ve.name, ve.counted, hm.user_ID AS watched, hf.content_ID AS favorite FROM viewable_events AS ve LEFT JOIN hex_markers AS hm ON (hm.user_ID='.$v_UserID.'&&calendar_ID=ve.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=1 AND hf.content_ID=ve.ID) WHERE ve.ID='.$this->A_Parameters['target'].';');
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc'));
			return FF_CATXML($a_Records,'thin-line');
		}else{return '<thin-line/>';}
		*/
	}
	//
	// Function - Get Open Line
	function F_GetOpenLine($v_UserID=0,$v_TargetID=0,$v_Open='open'){
		$a_Records=array();
		$v_DC=db::getInstance();
		$this->A_Parameters['target']=$v_TargetID;
		$v_DC->Query('SELECT ve.name, ve.counted, ve.ID, ve.library, ve.o_place, ve.description, ve.o_date, DATE_FORMAT(ve.o_date,"%W, %M %D") AS date_words, ve.start, ve.end, ve.summer, ve.slider, ve.tournament, hm.user_ID AS watched, hf.content_ID AS favorite FROM viewable_events AS ve LEFT JOIN hex_markers AS hm ON (hm.user_ID='.$v_UserID.'&&calendar_ID=ve.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=1 AND hf.content_ID=ve.ID) WHERE ve.ID='.$v_TargetID.';');
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc'));
			$a_Records['end']=FF_ConvertTime($a_Records['end']);
			$a_Records['start']=FF_ConvertTime($a_Records['start']);
			$a_Records['tag-set']=FF_GE($v_TargetID,'event');
			return $this->F_SimilarXML($v_UserID).FF_CATXML($a_Records,$v_Open.'-line');
		}else{return '<'.$v_Open.'-line/>';}
	}
	//
	// Function - Get Search Information
	function F_GetSearchInformation($v_UserID=0){return $this->A_Search;}
	//
	// Function - Get Tag ID
	function F_GetTagID($v_UserID=0){return $this->A_Search['change-tag'];}
	//
	// Function - Get Tag Name
	function F_GetTagName($v_UserID=0){return $this->V_TagName;}
	//
	// Function - Get Target
	function F_GetTarget($v_UserID=0){return $this->A_Parameters['target'];}
	//
	// Function - Go To Page
	function F_GoToPage($v_UserID=0,$v_Page=0){if($v_Page<1){$this->A_Parameters['current-page']=1;}elseif($v_Page>$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']=$this->A_Parameters['total-pages'];}else{$this->A_Parameters['current-page']=$v_Page;}}
	//
	// Function - Load Previous Search
	function F_LoadPreviousSearch($v_UserID=0){$this->A_Parameters=$this->A_PreviousSearch['parameters'];$this->A_Search=$this->A_PreviousSearch['search'];$this->V_SimilarSearch=$this->A_PreviousSearch['similar-search'];$this->V_TagName=$this->A_PreviousSearch['tag-name'];}
	//
	// Function - Next Page
	function F_NextPage($v_UserID=0){if($this->A_Parameters['current-page']<$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']++;}}
	//
	// Function - Perform Action
	function F_PerformAction($v_UserID=0,$v_Action='',$v_MessagesOn=true){
		if($v_UserID>0){
			$v_DC=db::getInstance();
			switch($v_Action){
				case '':default:$v_SQL='';break;
				case 'favorite':$v_SQL='SELECT user_ID FROM hex_favorites WHERE user_ID='.$v_UserID.' AND favorite_type=1 AND content_ID='.$this->A_Parameters['target'].';';break;
				case 'anticipate':$v_SQL='SELECT hm.user_ID FROM hex_markers AS hm WHERE hm.user_ID='.$v_UserID.' AND hm.calendar_ID='.$this->A_Parameters['target'].';';break;
			}
			if($v_SQL!=''){$v_DC->Query($v_SQL);}else{return;}
			$v_Perform='';
			if($v_DC->Count_res()>0){
				switch($v_Action){
					case 'favorite':
						$v_Message='This event has been removed from your favorites list.';
						$v_SQL='DELETE FROM hex_favorites WHERE user_ID='.$v_UserID.' AND favorite_type=1 AND content_ID='.$this->A_Parameters['target'].';';break;
					case 'anticipate':
						$v_Message='This event has been removed from your anticipation list.';
						$v_SQL='DELETE FROM hex_markers WHERE user_ID='.$v_UserID.' AND calendar_ID='.$this->A_Parameters['target'].';';break;
					case '':default:$v_SQL='';break;}
			}else{
				switch($v_Action){
					case 'favorite':
						$v_Message='This event has been added to your favorites list.';
						$v_SQL='INSERT INTO hex_favorites (user_ID,favorite_type,content_ID) VALUES ('.$v_UserID.',1,'.$this->A_Parameters['target'].');';break;
					case 'anticipate':
						$v_Message='This event has been added to your anticipation list.';
						$v_SQL='INSERT INTO hex_markers (user_ID,calendar_ID) VALUES ('.$v_UserID.','.$this->A_Parameters['target'].');';break;
					case '':default:$v_SQL='';break;}
			}
			if($v_SQL!=''){$v_DC->Query($v_SQL);}else{return;}
			return (($v_MessagesOn)?FF_Message('Message',$v_Message,0):'').(($v_Perform!='')?'<boom>'.$v_Perform:'');
		}
	}
	//
	// Function - Perform Search
	function F_PerformSearch($v_UserID=0,$v_TargetID=0){
		$v_DC=db::getInstance();
		$v_DC->Query($this->F_ConstructSearch($v_UserID));
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc_array'));
			$a_Information=array();
			$a_Information['current-page']=$this->A_Parameters['current-page'];
			$a_Information['header']=$this->F_ConstructDescription($v_UserID);
			$a_Information['total-pages']=$this->A_Parameters['total-pages'];
			$a_Information['total-records']=$this->A_Parameters['total-records'];
			return FF_CATXML($a_Information,'events-info').'<boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information').'<boom>'.FF_CATXML($a_Records,'events',true,'event').'<boom>'.$this->F_GetOpenLine($v_UserID,(($v_TargetID>0)?$v_TargetID:$a_Records[0]['ID']));
		}else{
			return '<no-events><total-pages>0</total-pages><current-page>1</current-page><header>'.$this->F_ConstructDescription($v_UserID).'</header></no-events><boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information');}
	}
	//
	// Function - Previous Page
	function F_PreviousPage($v_UserID=0){if($this->A_Parameters['current-page']>1){$this->A_Parameters['current-page']--;}}
	//
	// Function - Reset Search
	function F_ResetSearch($v_UserID=0){
		$this->A_Parameters=array('current-page'=>1,'maximum-records'=>10,'search'=>0,'similar'=>false,'sort'=>0,'target'=>0,'total-pages'=>0,'total-records'=>0);
		$this->A_Search=array('calendar'=>'','change-filter'=>'','change-search'=>0,'change-sort'=>0,'change-tag'=>0);
		$this->V_SimilarSearch='';
		$this->V_TagName='';
	}
	//
	// Function - Save Previous Search
	function F_SavePreviousSearch($v_UserID=0){$this->A_PreviousSearch=array('parameters'=>$this->A_Parameters,'search'=>$this->A_Search,'similar-search'=>$this->V_SimilarSearch,'tag-name'=>$this->V_TagName);}
	//
	// Function - Search (Specific Item)
	function F_Search($v_UserID=0,$v_Search=''){
		$this->F_ResetSearch($v_UserID);
		$this->F_ChangeSearch($v_UserID,'change-tag',0);
		$this->V_SimilarSearch=FF_Clean($v_Search);
	}
	//
	// Function - Set Similar
	function F_SetSimilar($v_UserID=0,$v_Similar=false,$v_SimilarSearch=''){$this->F_ResetSearch($v_UserID);$this->A_Parameters['similar']=$v_Similar;$this->V_SimilarSearch=FF_Clean($v_SimilarSearch);}
	//
	// Function - Similar
	function F_Similar($v_UserID=0){return $this->A_Parameters['similar'];}
	//
	// Function - Similar XML
	function F_SimilarXML($v_UserID=0){if($this->A_Parameters['similar']){return '<similar-on></similar-on><boom>';}else{return '<similar-off></similar-off><boom>';}}
}
?>