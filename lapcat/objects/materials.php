<?
class Materials{
	//
	// ARRAYS
	//
	//
	// Array - Credit Search
	private $A_CreditSearch=array(
		'actor'=>'',
		'artist'=>'',
		'author'=>'',
		'console-name'=>'',
		'm-artist'=>'',
		'narrator'=>'',
		'writer'=>''
	);
	//
	// Array - Material Types
	private $A_MaterialTypes=array(
		1=>'books',
		2=>'music',
		3=>'movies',
		4=>'video games',
		5=>'television shows',
		23=>'audio books',
		24=>'downloadable books',
		32=>'graphic novels',
		50=>'large print books',
		75=>'digital audio players',
		159=>'downloadable audio books'
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
		'credit-search'=>array(),
		'parameters'=>array(),
		'search'=>array(),
		'credited-search'=>'',
		'similar-search'=>'',
		'tag-name'=>''
	);
	//
	// Array - Search
	private $A_Search=array(
		'change-filter'=>'',
		'change-search'=>0,
		'change-sort'=>0,
		'change-tag'=>0
	);
	//
	// VARIABLES
	//
	//
	// Variable - Credit Search
	private $V_CreditedSearch='';
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
	// Function - Materials
	function Materials($v_UserID=0,$v_TagID=0){
		$this->F_ResetSearch($v_UserID);
		$this->A_Search['change-tag']=$v_TagID;
	}
	//
	// Function - Auto Complete
	function F_AutoComplete($v_UserID=0,$v_Type='',$v_Text=''){
		$v_Type=str_replace('-','_',str_replace('-AC','',$v_Type));
		switch($v_Type){
			default:return '';break;
			case 'artist':case 'author':case 'console_name':case 'm_artist':case 'narrator':case 'writer':
				$v_SQL='SELECT vm.'.$v_Type.' AS result FROM viewable_materials AS vm WHERE vm.'.$v_Type.' LIKE "'.$v_Text.'%" GROUP BY vm.'.$v_Type.' ORDER BY vm.'.$v_Type.' ASC;';break;}
		$a_Results=array();
		$v_DC=db::getInstance();
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_Results=$v_DC->Format('assoc_array');
			$a_Results=FF_SlimResults($a_Results);
			return FF_CATXML($a_Results,$v_Type.'-AC',true,$v_Type);
		}else{return '<'.$v_Type.'-AC></'.$v_Type.'-AC>';}
	}
	//
	// Function - Change Tag
	function F_ChangeTag($v_UserID=0,$v_TagID=0,$v_TagName=''){$this->A_Search['change-tag']=$v_TagID;$this->V_TagName=$v_TagName;}
	//
	// Function - Change Credit Search
	function F_ChangeCreditSearch($v_UserID=0,$v_Key='',$v_Search=''){switch($v_Key){case '':break;default:if(array_key_exists($v_Key,$this->A_CreditSearch)){$this->V_CreditedSearch=$v_Key;$this->A_CreditSearch[$v_Key]=FF_Clean($v_Search);}break;}}
	//
	// Function - Change Search
	function F_ChangeSearch($v_UserID=0,$v_Key='',$v_Search=0){switch($v_Key){case '':break;default:if(array_key_exists($v_Key,$this->A_Search)){$this->A_Search[$v_Key]=$v_Search;}break;}}
	//
	// Function - Construct Description
	function F_ConstructDescription($v_UserID=0){
		$a_Description=array(
			'description-A'=>'I am browsing',
			'filter'=>'',
			'search'=>' materials',
			'credited'=>'',
			'tag'=>'',
			'similar'=>'',
			'order-by'=>' sorted by year.'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'change-filter':
					switch($v_Search){
						case 'favorites':$a_Description['filter']=' my favorite';break;
						case 'collection':$a_Description['filter']=' my collected';break;
						case 'anticipated':$a_Description['filter']=' my anticipated';break;
						default:break;
					}
					break;
				case 'change-search':
					switch($v_Search){
						case 0:default:$a_Description['search']=' materials';break;
						case 1:case 2:case 3:case 4:case 5:case 23:case 24:case 32:case 50:case 75:case 159:$a_Description['search']=' '.$this->A_MaterialTypes[$v_Search];break;
					}break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_Description['order-by']=' sorted by year.';break;
						case 1:$a_Description['order-by']=' sorted by rating.';break;
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
		}else{
			switch($this->V_CreditedSearch){
					case '':$a_Description['credited']='';break;
					default:
						$v_Search=$this->A_CreditSearch[$this->V_CreditedSearch];
						switch($this->V_CreditedSearch){
							case 'actor':$a_Description['credited']=' starring '.$v_Search;break;
							case 'artist':$a_Description['credited']=' drawn by '.$v_Search;break;
							case 'author':$a_Description['credited']=' written by '.$v_Search;break;
							case 'console-name':$a_Description['credited']=' on '.$v_Search;break;
							case 'm-artist':$a_Description['credited']=' performed by '.$v_Search;break;
							case 'narrator':$a_Description['credited']=' narrated by '.$v_Search;break;
							case 'writer':$a_Description['credited']=' written by '.$v_Search;break;
							default:break;
					}break;
			}
		}
		return implode('',$a_Description);
	}
	//
	// Function - Construct Hotkey Link
	function F_ConstructHotkeyLink($v_UserID=0,$v_AreaID=0){
		$v_Link='hotkey';
		foreach($this->A_Search as $v_Key=>$v_Data){if($v_Data>0){$v_Link.='/'.$v_Key.'/'.$v_Data;}}
		if(array_key_exists($this->V_CreditedSearch,$this->A_CreditSearch)){$v_Link.='/'.$this->V_CreditedSearch.'/'.$this->A_CreditSearch[$this->V_CreditedSearch];}
		if($this->A_Search['change-tag']>0){$v_Link.='/tag-name/'.$this->V_TagName;}
		return $v_Link;
	}
	//
	// Function - Construct Search
	function F_ConstructSearch($v_UserID=0){
		$a_SQL=array(
			'SQL-A'=>'SELECT vm.ID, vm.name, vm.ISBNorSN, vm.rating, vm.total_rating, vm.year, vm.author, vm.artist, vm.writer, vm.narrator, vm.m_artist, vm.console, vm.act1, vm.act2, vm.act3, vm.developer, hc.material_ID AS collection, hf.content_ID AS favorite, hwl.material_ID AS watchlist, htbm.tag_ID AS type FROM viewable_materials AS vm LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID',
			'material-type'=>'>0',
			'SQL-B'=>' AND vm.ID=htbm.ID)',
			'SQL-C'=>' LEFT JOIN hex_watch_list AS hwl ON (hwl.material_ID=vm.ID AND hwl.user_ID=',
			'user-ID-A'=>$v_UserID,
			'SQL-D'=>')',
			'SQL-E'=>' LEFT JOIN hex_collections AS hc ON (hc.material_ID=vm.ID AND hc.user_ID='.$v_UserID.')',
			'SQL-F'=>' LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=2 AND hf.content_ID=vm.ID)',
			'where-A'=>' WHERE htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75,159)',
			'where-B'=>'',
			'where-C'=>'',
			'where-F'=>'',
			'order-by'=>' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC',
			'limit'=>' LIMIT '.(($this->A_Parameters['current-page']-1)*$this->A_Parameters['maximum-records']).','.$this->A_Parameters['maximum-records'].';'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'change-filter':
					switch($v_Search){
						case 'favorites':$a_SQL['where-F']=' AND hf.content_ID>0';break;
						case 'collection':$a_SQL['where-F']=' AND hc.material_ID>0';break;
						case 'anticipated':$a_SQL['where-F']=' AND hwl.material_ID>0';break;
						default:$a_SQL['where-F']='';break;
					}
					break;
				case 'change-search':
					switch($v_Search){
						case 0:default:$a_SQL['material-type']='>0';$a_SQL['where-A']=' WHERE htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75,159)';$a_Description[1]=' materials';break;
						case 1:case 2:case 3:case 4:case 5:case 23:case 24:case 32:case 50:case 75:case 159:
							$a_SQL['material-type']='='.$v_Search;$a_SQL['where-A']=' WHERE htbm.tag_ID='.$v_Search;break;
					}break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_SQL['order-by']=' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC';break;
						case 1:$a_SQL['order-by']=' ORDER BY vm.rating DESC, vm.year DESC, vm.name ASC';break;
						case 2:$a_SQL['order-by']=' ORDER BY vm.name ASC, vm.year DESC, vm.rating DESC';break;
						case 3:$a_SQL['order-by']=' ORDER BY vm.name DESC, vm.year DESC, vm.rating DESC';break;
					}break;
				case 'change-tag':
					switch($v_Search){
						case 0:$a_SQL['where-C']='';$a_SQL['SQL-D']=')';break;
						default:$a_SQL['where-C']=' AND htbma.tag_ID='.$v_Search;$a_SQL['SQL-D']=') LEFT JOIN hex_tags_by_material AS htbma ON (htbma.ID=htbm.ID)';break;
					}break;
			}
		}
		if($this->A_Parameters['similar']){
			switch($this->V_SimilarSearch){
				case '':$a_SQL['where-B']='';break;
				default:$a_SQL['where-B']=' AND vm.name="'.$this->V_SimilarSearch.'"';break;
			}
		}else{
			switch($this->V_CreditedSearch){
					case '':$a_SQL['where-B']='';break;
					default:
						$v_Search=$this->A_CreditSearch[$this->V_CreditedSearch];
						switch($this->V_CreditedSearch){
							case 'actor':$a_SQL['where-B']=' AND (vm.act1="'.$v_Search.'" OR vm.act2="'.$v_Search.'" OR vm.act3="'.$v_Search.'")';break;
							case 'artist':$a_SQL['where-B']=' AND vm.artist="'.$v_Search.'"';break;
							case 'author':$a_SQL['where-B']=' AND vm.author="'.$v_Search.'"';break;
							case 'console-name':$a_SQL['where-B']=' AND vm.console_name="'.$v_Search.'"';break;
							case 'm-artist':$a_SQL['where-B']=' AND vm.m_artist="'.$v_Search.'"';break;
							case 'narrator':$a_SQL['where-B']=' AND vm.narrator="'.$v_Search.'"';break;
							case 'writer':$a_SQL['where-B']=' AND vm.writer="'.$v_Search.'"';break;
							default:$a_SQL['where-B']='';break;
					}break;
			}
		}
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) AS total FROM viewable_materials AS vm LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID'.$a_SQL['material-type'].$a_SQL['SQL-B'].$a_SQL['SQL-C'].$a_SQL['user-ID-A'].$a_SQL['SQL-D'].$a_SQL['SQL-E'].$a_SQL['SQL-F'].$a_SQL['where-A'].$a_SQL['where-B'].$a_SQL['where-C'].$a_SQL['where-F']);
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
	function F_GetOpenLine($v_UserID=0,$v_TargetID=0,$v_Open='open'){
		$a_Records=array();
		$v_DC=db::getInstance();
		$this->A_Parameters['target']=$v_TargetID;
		$v_DC->Query('SELECT vm.ID, vm.name, vm.author, vm.console, vm.console_name, vm.m_artist, vm.writer, vm.narrator, vm.artist, vm.ISBNorSN, vm.ISBNorSN AS cover, vm.sub_name, vm.rating, vm.year, hc.material_ID AS collection, hwl.user_ID AS watchlist, COUNT(*) AS total_collected, htbm.tag_ID AS type, hf.content_ID AS favorite, hrbm.rating AS my_rating, hu.username AS is_me FROM hex_tags_by_material AS htbm LEFT JOIN hex_ratings_by_material AS hrbm ON (hrbm.material_ID=htbm.ID AND hrbm.user_ID='.$v_UserID.') LEFT JOIN viewable_materials AS vm ON (htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75,159) AND vm.ID=htbm.ID) LEFT JOIN hex_users AS hu ON (hu.ID=vm.entered_by_ID) LEFT JOIN hex_watch_list AS hwl ON (hwl.user_ID='.$v_UserID.' AND hwl.material_ID=vm.ID) LEFT JOIN hex_collections AS hc ON (hc.material_ID=vm.ID AND hc.user_ID='.$v_UserID.') LEFT JOIN hex_collections AS hco ON (hco.material_ID=vm.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=2 AND hf.content_ID=vm.ID) WHERE vm.ID='.$v_TargetID.' GROUP BY vm.ID;');
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc'));
			$a_Records['tag-set']=FF_GE($v_TargetID,'material');
			$a_Records['description']='';
			return $this->F_SimilarXML($v_UserID).FF_CATXML($a_Records,$v_Open.'-line');
		}else{return '<'.$v_Open.'-line/>';}
	}
	//
	// Function - Get Search Information
	function F_GetSearchInformation($v_UserID=0){return array_merge($this->A_Search,$this->A_CreditSearch);}
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
		$v_DC->Query('SELECT vm.rating, vm.name, hc.material_ID AS collection, hwl.user_ID AS watchlist, hf.content_ID AS favorite, hrbm.rating AS my_rating, hu.username AS is_me FROM viewable_materials AS vm LEFT JOIN hex_ratings_by_material AS hrbm ON (hrbm.material_ID=vm.ID AND hrbm.user_ID='.$v_UserID.') LEFT JOIN hex_users AS hu ON (hu.ID=vm.entered_by_ID) LEFT JOIN hex_watch_list AS hwl ON (hwl.user_ID='.$v_UserID.' AND hwl.material_ID=vm.ID) LEFT JOIN hex_collections AS hc ON (hc.material_ID=vm.ID AND hc.user_ID='.$v_UserID.') LEFT JOIN hex_collections AS hco ON (hco.material_ID=vm.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UserID.' AND hf.favorite_type=2 AND hf.content_ID=vm.ID) WHERE vm.ID='.$this->A_Parameters['target'].' GROUP BY vm.ID;');
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
	function F_LoadPreviousSearch($v_UserID=0){$this->A_CreditSearch=$this->A_PreviousSearch['credit-search'];$this->A_Parameters=$this->A_PreviousSearch['parameters'];$this->A_Search=$this->A_PreviousSearch['search'];$this->V_CreditedSearch=$this->A_PreviousSearch['credited-search'];$this->V_SimilarSearch=$this->A_PreviousSearch['similar-search'];$this->V_TagName=$this->A_PreviousSearch['tag-name'];}
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
				case 'collection':$v_SQL='SELECT hc.user_ID FROM hex_collections AS hc WHERE hc.user_ID='.$v_UserID.' AND hc.material_ID='.$this->A_Parameters['target'].';';break;
				case 'favorite':$v_SQL='SELECT user_ID FROM hex_favorites WHERE user_ID='.$v_UserID.' AND favorite_type=2 AND content_ID='.$this->A_Parameters['target'].';';break;
				case 'watch':$v_SQL='SELECT hwl.user_ID FROM hex_watch_list AS hwl WHERE hwl.user_ID='.$v_UserID.' AND hwl.material_ID='.$this->A_Parameters['target'].';';break;
			}
			if($v_SQL!=''){$v_DC->Query($v_SQL);}else{return;}
			$v_Perform='';
			if($v_DC->Count_res()>0){
				switch($v_Action){
					case 'collection':
						$v_Message='This material has been removed from your collection.';
						$v_SQL='DELETE FROM hex_collections WHERE user_ID='.$v_UserID.' AND material_ID='.$this->A_Parameters['target'].';';break;
					case 'favorite':
						$v_Message='This material has been removed from your favorites list.';
						$v_SQL='DELETE FROM hex_favorites WHERE user_ID='.$v_UserID.' AND favorite_type=2 AND content_ID='.$this->A_Parameters['target'].';';break;
					case 'watch':
						$v_Message='This material has been removed from your watch list.';
						$v_SQL='DELETE FROM hex_watch_list WHERE user_ID='.$v_UserID.' AND material_ID='.$this->A_Parameters['target'].';';break;
					case '':default:$v_SQL='';break;}
			}else{
				switch($v_Action){
					case 'collection':
						$v_Message='This material has been added to your collection.';
						$v_SQL='INSERT INTO hex_collections (user_ID,material_ID) VALUES ('.$v_UserID.','.$this->A_Parameters['target'].');';break;
					case 'favorite':
						$v_Message='This material has been added to your favorites list.';
						$v_SQL='INSERT INTO hex_favorites (user_ID,favorite_type,content_ID) VALUES ('.$v_UserID.',2,'.$this->A_Parameters['target'].');';break;
					case 'watch':
						$v_Message='This material has been added to your watch list.';
						$v_SQL='INSERT INTO hex_watch_list (user_ID,material_ID) VALUES ('.$v_UserID.','.$this->A_Parameters['target'].');';break;
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
			return FF_CATXML($a_Information,'materials-info').'<boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information').'<boom>'.FF_CATXML($a_Records,'materials',true,'material').'<boom>'.$this->F_GetOpenLine($v_UserID,(($v_TargetID>0)?$v_TargetID:$a_Records[0]['ID']));
		}else{return '<no-materials><total-pages>0</total-pages><current-page>1</current-page><header>'.$this->F_ConstructDescription($v_UserID).'</header></no-materials><boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information');}
	}
	//
	// Function - Previous Page
	function F_PreviousPage($v_UserID=0){if($this->A_Parameters['current-page']>1){$this->A_Parameters['current-page']--;}}
	//
	// Function - Rate
	function F_Rate($v_UserID=0,$v_Rating=0){
		$v_DC=db::getInstance();
		$v_DC->Query('DELETE FROM hex_ratings_by_material WHERE user_ID='.$v_UserID.' AND material_ID='.$this->A_Parameters['target'].';');
		$v_DC->Query('INSERT INTO hex_ratings_by_material (user_ID,material_ID,rating) VALUES ('.$v_UserID.','.$this->A_Parameters['target'].','.$v_Rating.');');
		return $this->F_GetOpenLine($v_UserID,$this->A_Parameters['target']);
	}
	//
	// Function - Reset Search
	function F_ResetSearch($v_UserID=0){
		$this->A_CreditSearch=array('actor'=>'','artist'=>'','author'=>'','console-name'=>'','m-artist'=>'','narrator'=>'','writer'=>'');
		$this->A_Parameters=array('current-page'=>1,'maximum-records'=>10,'search'=>0,'similar'=>false,'sort'=>0,'target'=>0,'total-pages'=>0,'total-records'=>0);
		$this->A_Search=array('change-filter'=>'','change-search'=>0,'change-sort'=>0,'change-tag'=>0);
		$this->V_CreditedSearch='';
		$this->V_SimilarSearch='';
		$this->V_TagName='';
	}
	//
	// Function - Save Previous Search
	function F_SavePreviousSearch($v_UserID=0){$this->A_PreviousSearch=array('credit-search'=>$this->A_CreditSearch,'parameters'=>$this->A_Parameters,'search'=>$this->A_Search,'credited-search'=>$this->V_CreditedSearch,'similar-search'=>$this->V_SimilarSearch,'tag-name'=>$this->V_TagName);}
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