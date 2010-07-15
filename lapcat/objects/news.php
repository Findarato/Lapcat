<?
class News{
	//
	// Function - Calculate View Rating
	function F_CalculateViewRating($v_Unique,$v_Unknown){
		if($v_Unique>50){$v_Unique=50;}
		$v_Total=0;
		$a_Increments=array(1,12,24,48,96,192,384,768,1536,3072);
		foreach($a_Increments as $v_Key=>$v_Increment){if($v_Unknown>=$v_Increment){$v_Total++;}}
		return ($v_Total*5)+$v_Unique;
	}
	//
	// Function - Get Data
	function F_GetData($v_UserID=0,$v_MessagesOn=false,$v_DataType='',$v_Target=0){
		switch($v_DataType){
			case 'next-page':
				$this->F_NextPage($v_UserID);
				return $this->F_PerformDataSearch($v_UserID);break;
				break;
			case 'previous-page':
				$this->F_PreviousPage($v_UserID);
				return $this->F_PerformDataSearch($v_UserID);break;
				break;
			case 'change-tag':
				$this->A_Search['change-tag']=$v_Target;
				return $this->F_PerformDataSearch($v_UserID);break;
			case 'browse':
				$this->A_Search['change-tag']=0;
				return $this->F_PerformDataSearch($v_UserID);break;
			case 'thin-line':return $this->F_PerformOpenLineSearch($v_UserID,$v_Target);break;
			default:break;
		}
	}
	//
	// Function - Next Page
	function F_NextPage($v_UserID=0){if($this->A_Parameters['current-page']<$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']++;}}
	//
	// Function - Perform Open Line Search
	function F_PerformOpenLineSearch($v_UserID=0,$v_Target=0){
		$a_JSON=array();
		$a_JSON['pointer']='browse';
		$a_JSON['open-line']=$this->F_GetOpenLine($v_UserID,$v_Target,'open',true);
		return json_encode($a_JSON);
	}
	//
	// Function - Previous Page
	function F_PreviousPage($v_UserID=0){if($this->A_Parameters['current-page']>1){$this->A_Parameters['current-page']--;}}
	//
	// Function - Perform Data Search
	function F_PerformDataSearch($v_UserID=0){
		$v_DC=db::getInstance();
		$v_DC->Query($this->F_ConstructSearch($v_UserID));
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Mysql_clean($v_DC->Format('assoc_array'));
			$a_JSON=array('data'=>$a_R);
			$a_JSON['pointer']='browse';
			$a_JSON['header']=$this->F_ConstructDescription($v_UserID);
			$a_JSON['page']=array(
				'current-page'=>$this->A_Parameters['current-page'],
				'total-pages'=>$this->A_Parameters['total-pages'],
				'total-records'=>$this->A_Parameters['total-records']
			);
			$a_JSON['open-line']=$this->F_GetOpenLine($v_UserID,$a_R[0]['ID'],'open',true);
			return json_encode($a_JSON);
		}else{
			return json_encode(array('fail'=>true,'pointer'=>'browse'));
		}
	}


	//
	// ARRAYS
	//
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
		'credited-search'=>'',
		'similar-search'=>'',
		'tag-name'=>''
	);
	//
	// Array - Search
	private $A_Search=array(
		'calendar'=>'',
		'change-filter'=>'',
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
	// Function - News
	function News($v_UserID=0,$v_TagID=0){
		$this->F_ResetSearch($v_UserID);
		$this->A_Search['change-tag']=$v_TagID;
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
	// Function - Change Tag
	function F_ChangeTag($v_UserID=0,$v_TagID=0,$v_TagName=''){$this->A_Search['change-tag']=$v_TagID;$this->V_TagName=$v_TagName;}
	//
	// Function - Change Search
	function F_ChangeSearch($v_UserID=0,$v_Key='',$v_Search=0){switch($v_Key){case '':break;default:if(array_key_exists($v_Key,$this->A_Search)){$this->A_Search[$v_Key]=$v_Search;}break;}}
	//
	// Function - Construct Description
	function F_ConstructDescription($v_UserID=0){
		$a_Description=array(
			'description-A'=>'I am browsing',
			'filter'=>'',
			'search'=>' news and articles',
			'released-on'=>'',
			'tag'=>'',
			'similar'=>'',
			'order-by'=>' sorted by date.'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'calendar':
					switch($v_Search){
						case '':break;
						default:$a_Description['released-on']=' released on '.$v_Search;break;
					}
					break;
				case 'change-filter':
					switch($v_Search){
						case 'favorites':$a_Description['filter']=' my favorite';break;
						default:break;
					}
					break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_Description['order-by']=' sorted by date.';break;
						case 1:$a_Description['order-by']=' sorted alphabetically.';break;
						case 2:$a_Description['order-by']=' sorted alphabetically in reverse order.';break;
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
	function F_ConstructSearch($v_UserID=0,$v_RSS=false,$v_Person=0){
		$a_SQL=array(
			'SQL-A'=>'SELECT vn.ID, vn.name,'.(($v_RSS)?' vn.text,':'').' vn.duration, vn.library_ID, vn.entered_by_ID, vn.entered_on, vn.username, vn.image_path, hfba.article_ID AS flagged, hf.content_ID AS favorite FROM viewable_news AS vn LEFT JOIN hex_favorites AS hf ON (hf.user_ID=',
			'user-ID-A'=>$v_UserID,
			'SQL-B'=>' AND hf.favorite_type=0 AND hf.content_ID=vn.ID)',
			'SQL-C'=>' LEFT JOIN hex_flags_by_article AS hfba ON (hfba.article_ID=vn.ID AND hfba.user_ID=',
			'user-ID-B'=>$v_UserID,
			'SQL-D'=>')',
			'SQL-E'=>'',
			'where-A'=>' WHERE (DATE_ADD(vn.entered_on, INTERVAL vn.duration DAY)>="'.date('Y-m-d',time()).'" OR vn.duration=0)',
			'where-B'=>'',
			'where-C'=>'',
			'where-D'=>(($v_Person>0)?' AND vn.entered_by_ID='.$v_Person:''),
			'where-E'=>'',
			'where-F'=>'',
			'order-by'=>' ORDER BY vn.duration DESC, vn.entered_on DESC',
			'limit'=>' LIMIT '.(($this->A_Parameters['current-page']-1)*$this->A_Parameters['maximum-records']).','.$this->A_Parameters['maximum-records'].';'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'change-filter':
					switch($v_Search){
						case 'favorites':$a_SQL['where-F']=' AND hf.content_ID>0';break;
						default:$a_SQL['where-F']='';break;
					}
					break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_SQL['order-by']=' ORDER BY vn.duration DESC, vn.entered_on DESC, vn.name ASC';break;
						case 1:$a_SQL['order-by']=' ORDER BY vn.name ASC, vn.duration DESC, vn.entered_on DESC';break;
						case 2:$a_SQL['order-by']=' ORDER BY vn.name DESC, vn.duration DESC, vn.entered_on DESC';break;
					}break;
				case 'change-tag':
					switch($v_Search){
						case 0:$a_SQL['where-B']='';$a_SQL['SQL-E']='';break;
						default:$a_SQL['where-B']=' AND htba.tag_ID='.$v_Search;$a_SQL['SQL-E']=' LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID)';break;
					}break;
				case 'calendar':
					switch($v_Search){
						case '':break;
						default:$a_SQL['where-E']=' AND DATE(vn.entered_on)="'.$v_Search.'"';break;
					}break;
			}
		}
		$v_DC=db::getInstance();
		if($this->A_Parameters['similar']){
			switch($this->V_SimilarSearch){
				case '':$a_SQL['where-C']='';break;
				default:$a_SQL['where-C']=' AND vn.name="'.$this->V_SimilarSearch.'"';break;
			}
		}
		$v_DC->Query('SELECT COUNT(*) AS total FROM viewable_news AS vn LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$a_SQL['user-ID-A'].$a_SQL['SQL-B'].$a_SQL['SQL-C'].$a_SQL['user-ID-B'].$a_SQL['SQL-D'].$a_SQL['SQL-E'].$a_SQL['where-A'].$a_SQL['where-B'].$a_SQL['where-C'].$a_SQL['where-E'].$a_SQL['where-F']);
		if($v_DC->Count_res()>0){
			$a_Total=$v_DC->Fetch('assoc');
			$this->A_Parameters['total-records']=$a_Total['total'];
			$this->A_Parameters['total-pages']=FF_CalculateTotal($a_Total['total'],$this->A_Parameters['maximum-records']);
		}
		return implode('',$a_SQL);
	}
	//
	// Function - First Page
	function F_FirstPage($v_UserID=0){$this->A_Parameters['current-page']=1;}
	//
	// Function - Get Open Line
	function F_GetOpenLine($v_UserID=0,$v_TargetID=0,$v_Open='open',$v_JSON=false){
		$a_Records=array();
		$a_Total=array();
		$v_DC=db::getInstance();
		$this->A_Parameters['target']=$v_TargetID;
		$v_DC->Query('SELECT vn.ID, vn.name, vn.text AS description, vn.library_ID, vn.duration, vn.entered_by_ID, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS entered_on, vn.username, vn.image_path, hvba.article_ID, hfba.article_ID AS flagged, hf.content_ID AS favorite, hu.username AS is_me FROM viewable_news AS vn LEFT JOIN hex_users AS hu ON (hu.ID=vn.entered_by_ID) LEFT JOIN hex_views_by_article AS hvba ON (hvba.article_ID='.$v_TargetID.' AND hvba.user_ID='.$v_UserID.') LEFT JOIN hex_flags_by_article AS hfba ON (hfba.article_ID='.$v_TargetID.' AND hfba.user_ID='.$v_UserID.') LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=0 AND hf.content_ID=vn.ID) WHERE vn.ID='.$v_TargetID.';');
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc'));
			if($a_Records['article_ID']!=$v_TargetID&&$v_UserID>0){$v_DC->Query('INSERT INTO hex_views_by_article (article_ID,user_ID) VALUES ('.$v_TargetID.','.$v_UserID.');');
			}else{$v_DC->Query('INSERT INTO hex_unknown_views_by_news (article_ID,unknown_total_views) VALUES ('.$v_TargetID.',1) ON DUPLICATE KEY UPDATE unknown_total_views=unknown_total_views+1;');}
			$v_DC->Query('SELECT COUNT(*) AS total_views FROM hex_views_by_article WHERE article_ID='.$v_TargetID.';');
			$a_Total=$v_DC->Format('assoc');
			$a_Records['total-views']=$a_Total['total_views'];
			$v_DC->Query('SELECT unknown_total_views FROM hex_unknown_views_by_news WHERE article_ID='.$v_TargetID.';');
			$a_Total=$v_DC->Format('assoc');
			//$a_Records['total-views']+=$a_Total['unknown_total_views'];
			$a_Records['total-views']=$this->F_CalculateViewRating($a_Records['total-views'],$a_Total['unknown_total_views']);
			$a_Records['description']=$a_Records['description'];
			if(array_key_exists('entered_on',$a_Records)){$a_Records['date-words']=FF_CDate($a_Records['entered_on']);}
			$a_Records['tag-set']=FF_GetTags($v_TargetID,'article');
			if($v_JSON){
				$a_Records['similar']=$this->A_Parameters['similar'];
				return $a_Records;
			}else{
				return $this->F_SimilarXML($v_UserID).FF_CATXML($a_Records,$v_Open.'-line');
			}
		}else{
			return '<'.$v_Open.'-line/>';}
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
	// Function - Get Thin Line
	function F_GetThinLine($v_UserID=0){
		/*
		$a_Records=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT vn.name, hfba.article_ID AS flagged, hf.content_ID AS favorite, hu.username AS is_me FROM viewable_news AS vn LEFT JOIN hex_users AS hu ON (hu.ID=vn.entered_by_ID) LEFT JOIN hex_flags_by_article AS hfba ON (hfba.article_ID='.$this->A_Parameters['target'].' AND hfba.user_ID='.$v_UserID.') LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=0 AND hf.content_ID=vn.ID) WHERE vn.ID='.$this->A_Parameters['target'].';');
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc'));
			return FF_CATXML($a_Records,'thin-line');
		}else{return '<thin-line/>';}
		*/
	}
	//
	// Function - Go To Page
	function F_GoToPage($v_UserID=0,$v_Page=0){if($v_Page<1){$this->A_Parameters['current-page']=1;}elseif($v_Page>$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']=$this->A_Parameters['total-pages'];}else{$this->A_Parameters['current-page']=$v_Page;}}
	//
	// Function - Load Previous Search
	function F_LoadPreviousSearch($v_UserID=0){$this->A_Parameters=$this->A_PreviousSearch['parameters'];$this->A_Search=$this->A_PreviousSearch['search'];$this->V_SimilarSearch=$this->A_PreviousSearch['similar-search'];$this->V_TagName=$this->A_PreviousSearch['tag-name'];}
	//
	// Function - Perform Action
	function F_PerformAction($v_UserID=0,$v_Action='',$v_MessagesOn=true){
		if($v_UserID>0){
			$v_DC=db::getInstance();
			switch($v_Action){
				case '':default:$v_SQL='';break;
				case 'favorite':$v_SQL='SELECT user_ID FROM hex_favorites WHERE user_ID='.$v_UserID.' AND favorite_type=0 AND content_ID='.$this->A_Parameters['target'].';';break;
				case 'flag':$v_SQL='SELECT user_ID FROM hex_flags_by_article WHERE user_ID='.$v_UserID.' AND article_ID='.$this->A_Parameters['target'].';';break;
			}
			if($v_SQL!=''){$v_DC->Query($v_SQL);}else{return;}
			$v_Perform='';
			if($v_DC->Count_res()>0){
				switch($v_Action){
					case 'favorite':
						$v_Message='This article has been removed from your favorites list.';
						$v_SQL='DELETE FROM hex_favorites WHERE user_ID='.$v_UserID.' AND favorite_type=0 AND content_ID='.$this->A_Parameters['target'].';';break;
					case 'flag':
						$v_Message='This article has been removed from your flagged list.';
						$v_SQL='DELETE FROM hex_flags_by_article WHERE user_ID='.$v_UserID.' AND article_ID='.$this->A_Parameters['target'].';';break;
					case '':default:$v_SQL='';break;}
			}else{
				switch($v_Action){
					case 'favorite':
						$v_Message='This article has been added to your favorites list.';
						$v_SQL='INSERT INTO hex_favorites (user_ID,favorite_type,content_ID) VALUES ('.$v_UserID.',0,'.$this->A_Parameters['target'].');';break;
					case 'flag':
						$v_Message='This article has been added to your flagged list.';
						$v_SQL='INSERT INTO hex_flags_by_article (article_ID,user_ID) VALUES ('.$this->A_Parameters['target'].','.$v_UserID.');';break;
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
			return FF_CATXML($a_Information,'news-info').'<boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information').'<boom>'.FF_CATXML($a_Records,'news',true,'new').'<boom>'.$this->F_GetOpenLine($v_UserID,(($v_TargetID>0)?$v_TargetID:$a_Records[0]['ID']));
		}else{return '<no-news><total-pages>0</total-pages><current-page>1</current-page><header>'.$this->F_ConstructDescription($v_UserID).'</header></no-news><boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information');}
	}
	//
	// Function - Reset Search
	function F_ResetSearch($v_UserID=0){
		$this->A_Parameters=array('current-page'=>1,'maximum-records'=>10,'search'=>0,'similar'=>false,'sort'=>0,'target'=>0,'total-pages'=>0,'total-records'=>0);
		$this->A_Search=array('calendar'=>'','change-filter'=>'','change-sort'=>0,'change-tag'=>0);
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