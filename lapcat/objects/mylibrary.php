<?
class MyLibrary{
	// Function - Get Data
	function F_GetData($v_UserID,$v_Type){
		switch($v_Type){
			case 'interests':
				$this->V_First=0;
				return $this->F_SuggestArticles($v_UserID,rand(0,1),true);
				break;
			case 'suggestions':
				$this->V_First=0;
				return $this->F_SuggestMaterials($v_UserID,rand(0,1),true);
				break;
			case 'possibles':
				$this->V_First=0;
				return $this->F_SuggestEvents($v_UserID,rand(0,1),true);
				break;
			default:break;
		}
	}

	private $A_ArticleTags=array();
	private $A_DatabaseTags=array();
	private $A_EventTags=array();
	private $A_First=array('suggestions','suggestion','more-suggestions','more-suggestion');
	private $A_MaterialTags=array();
	private $A_FavoriteAuthors=array();
	private $A_Search=array('change-search'=>0,'change-sort'=>0,'change-tag'=>0,'calendar'=>0);
	private $A_NotTheseTags=array(15);
	private $A_MaterialTypeTags=array(1,2,3,4,5,23,24,32,50,75,159);
	private $A_MaterialTypeText=array(1=>'books',2=>'music',3=>'movies',4=>'video games',5=>'television shows',23=>'audio books',24=>'downloadable books',32=>'graphic novels',50=>'large print books',75=>'digital audio players',159=>'downloadable audio books');
	private $A_Second=array('possibles','possible','more-possibles','more-possible');
	private $A_Third=array('interests','interest','more-interests','more-interest');
	private $A_WeightedTags=array();
	private $V_First=0;
	private $V_Second=0;
	private $V_Third=0;
	private $V_TagID=0;
	private $V_Title='';
	//
	// FUNCTIONS
	//
	// Function - Change Tag
	function F_ChangeTag($v_UID=0,$v_V=0){$this->A_Search['change-tag']=$v_V;}
	//
	// Function - My Library
	function F_MyLibrary(){
	}
	//
	// Function - Clear
	function F_Clear($v_UID=0){$this->A_Search['change-tag']=0;}
	//
	// Function - Reset
	function F_Reset($v_UID=0,$v_TagID=0){
		$this->A_Search=array('change-search'=>0,'change-sort'=>0,'change-tag'=>$this->A_Search['change-tag'],'calendar'=>0);
		if($v_TagID>0){$this->A_Search['change-tag']=$v_TagID;}
		if($v_UID>0&&empty($this->A_WeightedTags)){$this->F_Favorites($v_UID);}
		$this->V_First=0;
	}
	//
	// Function - Make Suggestions
	function F_MakeSuggestions($v_UID=0){
		$this->V_First=0;
		$a_MaterialXML=$this->F_SuggestMaterials($v_UID,rand(0,1));
		$this->V_First=2;
		$a_EventXML=$this->F_SuggestEvents($v_UID,rand(0,1));
		$this->V_First=4;
		$a_ArticleXML=$this->F_SuggestArticles($v_UID,rand(0,1));
		return FF_CATXML($this->A_Search,'search-information').'<boom>'.$a_MaterialXML.'<boom>'.$a_EventXML.'<boom>'.$a_ArticleXML;
	}
	//
	// Function - Create List
	function F_CreateList($v_UID=0,$v_Type='materials',$v_Random=0,$v_Select=0){
		if($v_Select>0){
			$v_R=$v_Select;
		}else{
			switch($v_Type){
				case 'materials':default:
					if($this->A_Search['change-tag']>0){
						$v_R=99;
					}else if($v_UID==0||empty($this->A_WeightedTags)){
						$v_R=rand(4,5);
					}else{
						$v_R=1;
						if(rand(0,1)==0){$v_R=2;
						}elseif(rand(0,2)==0){$v_R=4;
						}elseif(rand(0,3)==0){$v_R=3;}
					}
					break;
				case 'events':
					if($this->A_Search['change-tag']>0){
						$v_R=89;
					}else if($v_UID>0){
						$v_R=29;
						//if(!empty($this->A_EventTags)){$v_R=28;}else{$v_R=29;}
					}else{
						$v_R=26;
					}
					break;
				case 'news':
					if($this->A_Search['change-tag']>0){
						$v_R=79;
					}else{
						$v_R=131;
					}
					break;
			}
		}
		switch($v_R){
			case 1:case 99:default:
				// Materials tagged as tag.
				switch($v_R){case 1:default:$a_Tags=array_keys($this->A_WeightedTags);$v_TagID=$a_Tags[0];break;case 99:$v_TagID=$this->A_Search['change-tag'];break;}
				$v_DC=db::getInstance();
				$v_DC->Query('SELECT ht.ID, ht.name FROM hex_tags AS ht LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID=ht.ID) WHERE ht.ID='.$v_TagID.';');
				$a_R=$v_DC->Format('assoc');
				$this->V_Title='Materials tagged as <a href="javascript:F_ChangeSearch(\'change-tag\','.$a_R['ID'].');" style="font-size:14px;">'.$a_R['name'].'</a>.';
				return $v_TagID;
				break;
			case 2:
				// Recommended for you.
				$a_Tags=array_keys($this->A_WeightedTags);
				$v_HTML='';
				$this->V_Title='Recommended for you.';
				for($v_C=0;$v_C<4;$v_C++){
					if(array_key_exists($v_C,$a_Tags)){
						if($v_C>0){$v_HTML.=', ';}
						$v_HTML.=$a_Tags[$v_C];
					}
				}
				return $v_HTML;
				break;
			case 3:
				// More to explore.
				$a_Tags=array_keys($this->A_WeightedTags);
				$v_HTML='';
				$a_Tags=array_reverse($a_Tags);
				$this->V_Title='More to explore.';
				for($v_C=0;$v_C<4;$v_C++){
					if(array_key_exists($v_C,$a_Tags)){
						if($v_C>0){$v_HTML.=', ';}
						$v_HTML.=$a_Tags[$v_C];
					}
				}
				return $v_HTML;
				break;
			case 4:
				// Materials you might like.
				$v_TagID=$this->A_MaterialTypeTags[array_rand($this->A_MaterialTypeTags)];
				$this->V_Title='<a href="javascript:F_ChangeSearch(\'change-tag\','.$v_TagID.');" style="font-size:14px;">'.ucfirst($this->A_MaterialTypeText[$v_TagID]).'</a> you might like.';
				return $v_TagID;
				break;
			case 5:
				// Materials tagged as random tag.
				$v_DC=db::getInstance();
				$v_DC->Query('SELECT ht.ID, ht.name FROM hex_tags AS ht LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID=ht.ID) WHERE ht.ID NOT IN('.implode(',',$this->A_MaterialTypeTags).') GROUP BY htbm.tag_ID ORDER BY RAND() LIMIT 1');
				$a_R=$v_DC->Format('assoc');
				$this->V_Title='Materials tagged as <a href="javascript:F_ChangeSearch(\'change-tag\','.$a_R['ID'].');" style="font-size:14px;">'.$a_R['name'].'</a>.';
				return $a_R['ID'];
				break;
			case 26:
				// Upcoming events.
				$this->V_Title='Upcoming events.';
				return ' ve.o_date>=CURDATE() AND ve.o_date<="'.date('Y-m-d',strtotime('today + 14 days')).'"';
				break;
			case 28:
				// Events that might interest you.
				$a_Tags=$this->A_EventTags;
				$v_HTML='';
				$this->V_Title='Events that might interest you.';
				for($v_C=0;$v_C<4;$v_C++){
					if(array_key_exists($v_C,$a_Tags)){
						if($v_C>0){$v_HTML.=', ';}
						$v_HTML.=$a_Tags[$v_C]['tag-ID'];
				}}
				return ' htbe.tag_ID IN ('.$v_HTML.')';
				break;
			case 29:
				// Events at your home library.
				$this->V_Title='Events at your home library.';
				return ' ve.o_place=(SELECT hml.library_ID FROM hex_my_library AS hml WHERE hml.user_ID='.$v_UID.')';
				break;
			case 79:
				// Articles tagged as a specific tag.
				$v_TagID=$this->A_Search['change-tag'];
				$v_DC=db::getInstance();
				$v_DC->Query('SELECT ht.ID, ht.name FROM hex_tags AS ht LEFT JOIN hex_tags_by_article AS htba ON (htba.tag_ID=ht.ID) WHERE ht.ID='.$v_TagID.';');
				$a_R=$v_DC->Format('assoc');
				$this->V_Title='Articles tagged as <a href="javascript:F_ChangeSearch(\'change-tag\','.$a_R['ID'].');" style="font-size:14px;">'.$a_R['name'].'</a>.';
				return ' ht.ID='.$v_TagID;
				break;
			case 89:
				// Events tagged as a specific tag.
				$v_TagID=$this->A_Search['change-tag'];
				$v_DC=db::getInstance();
				$v_DC->Query('SELECT ht.ID, ht.name FROM hex_tags AS ht LEFT JOIN hex_tags_by_event AS htbe ON (htbe.tag_ID=ht.ID) WHERE ht.ID='.$v_TagID.';');
				$a_R=$v_DC->Format('assoc');
				$this->V_Title='Events tagged as <a href="javascript:F_ChangeSearch(\'change-tag\','.$a_R['ID'].');" style="font-size:14px;">'.$a_R['name'].'</a>.';
				return ' ht.ID='.$v_TagID;
				break;
			case 131:
				// Recent articles.
				$this->V_Title='Recent news and articles.';
				return ' vn.entered_on<=NOW()';
				break;
		}
	}
	//
	// Function - Suggest Articles
	function F_SuggestArticles($v_UID=0,$v_Random=0,$v_JSON=false){
		if($v_UID==0){$v_Random=0;}
		$v_DC=db::getInstance();
		$v_SQL='SELECT vn.ID, vn.name, vn.username, DATE_FORMAT(vn.entered_on,"%Y-%c-%e") AS `o-date`, DATE_FORMAT(vn.entered_on,"%W, %M %D") AS `date-words`, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM viewable_news AS vn LEFT JOIN hex_tags_by_article AS htba ON (htba.ID=vn.ID) LEFT JOIN hex_tags AS ht ON (htba.tag_ID=ht.ID) WHERE'.$this->F_CreateList($v_UID,'news',$v_Random).' GROUP BY vn.ID ORDER BY vn.entered_on DESC LIMIT 5;';
		$v_DC->Query($v_SQL,true);
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			if($v_JSON){
				$a_JSON=array('data'=>$a_R);
				$a_JSON['pointer']='interests';
				$a_JSON['header']=$this->V_Title;
				return json_encode($a_JSON);
			}else{
				$a_R['suggestion_title']=$this->V_Title;
				return FF_CATXML($a_R,$this->A_Third[$this->V_Third],true,$this->A_Third[($this->V_Third+1)]);
			}
		}else{
			if($v_JSON){
				return json_encode(array('fail'=>true,'pointer'=>'interests'));
			}else{
				return '<no-'.$this->A_Third[$this->V_Third].'>'.$this->V_Title.'</no-'.$this->A_Third[$this->V_Third].'>';}
			}
	}
	//
	// Function - Suggest Events
	function F_SuggestEvents($v_UID=0,$v_Random=0,$v_JSON=false){
		if($v_UID==0){$v_Random=0;}
		$v_DC=db::getInstance();
		$v_SQL='SELECT ve.ID, ve.name, ve.o_place AS library_ID, ve.library, ve.o_date AS `o-date`, ve.counted, DATE_FORMAT(ve.o_date,"%W, %M %D") AS `date-words`, ve.start, ht.ID AS `tag-ID`, ht.name AS `tag-name` FROM viewable_events AS ve LEFT JOIN hex_tags_by_event AS htbe ON (htbe.ID=ve.ID) LEFT JOIN hex_tags AS ht ON (htbe.tag_ID=ht.ID) WHERE'.$this->F_CreateList($v_UID,'events',$v_Random).' ORDER BY RAND() LIMIT 5;';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			if($v_JSON){
				$a_JSON=array('data'=>$a_R);
				$a_JSON['pointer']='possibles';
				$a_JSON['header']=$this->V_Title;
				return json_encode($a_JSON);
			}else{
				$a_R['suggestion_title']=$this->V_Title;
				return FF_CATXML($a_R,$this->A_Second[$this->V_Second],true,$this->A_Second[($this->V_Second+1)]);
			}
		}else{
			if($v_JSON){
				return json_encode(array('fail'=>true,'pointer'=>'possibles'));
			}else{
				return '<no-'.$this->A_Second[$this->V_Second].'>'.$this->V_Title.'</no-'.$this->A_Second[$this->V_Second].'>';}
			}
	}
	//
	// Function - Suggest Materials
	function F_SuggestMaterials($v_UID=0,$v_Random=0,$v_JSON=false){
		if($v_UID==0||empty($this->A_FavoriteAuthors)||$this->A_Search['change-tag']>0){$v_Random=0;}
		$v_DC=db::getInstance();
		switch($v_Random){
			case 0:default:$v_SQL='SELECT vm.ID, vm.ISBNorSN, vm.name AS title FROM hex_tags_by_material AS htbm LEFT JOIN viewable_materials AS vm ON (vm.ID=htbm.ID) WHERE htbm.tag_ID IN ('.$this->F_CreateList($v_UID,'materials',$v_Random).') ORDER BY RAND() LIMIT 5;';break;
			case 1:
				$v_RandomAuthor=array_rand($this->A_FavoriteAuthors);
				$v_RandomAuthorName=$this->A_FavoriteAuthors[$v_RandomAuthor]['author'];
				$this->V_Title='Materials by '.$v_RandomAuthorName.'.';
				$v_SQL='SELECT vm.ID, vm.ISBNorSN, vm.name AS title FROM viewable_materials AS vm WHERE vm.author="'.$v_RandomAuthorName.'" ORDER BY RAND() LIMIT 5;';
				break;
		}
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Mysql_clean($v_DC->Format('assoc_array'));
			if($v_JSON){
				$a_JSON=array('data'=>$a_R);
				$a_JSON['pointer']='suggestions';
				$a_JSON['header']=$this->V_Title;
				return json_encode($a_JSON);
			}else{
				$a_R['suggestion_title']=$this->V_Title;
				return FF_CATXML($a_R,$this->A_First[$this->V_First],true,$this->A_First[($this->V_First+1)]);
			}
		}else{
			if($v_JSON){
				return json_encode(array('fail'=>true,'pointer'=>'suggestions'));
			}else{
				return '<no-'.$this->A_First[$this->V_First].'>'.$this->V_Title.'</no-'.$this->A_First[$this->V_First].'>';}
			}
	}
	//
	// Function - Favorites
	function F_Favorites($v_UID=0){
		$a_R=array();
		$a_ArticleIDs=array();
		$a_EventIDs=array();
		$a_MaterialIDs=array();
		$a_DatabaseIDs=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT hf.content_ID, hf.favorite_type FROM hex_favorites AS hf WHERE hf.user_ID='.$v_UID.' ORDER BY hf.favorite_type;');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			foreach($a_R as $v_K=>$a_D){
				switch($a_D['favorite_type']){
					// News
					case 0:$a_ArticleIDs[]=$a_D['content_ID'];break;
					case 1:$a_EventIDs[]=$a_D['content_ID'];break;
					case 2:$a_MaterialIDs[]=$a_D['content_ID'];break;
					case 3:$a_DatabaseIDs[]=$a_D['content_ID'];break;
					default:break;
				}
			}
			$a_TagIDs=array();
			if(!empty($a_ArticleIDs)){
				$v_DC->Query('SELECT htba.tag_ID AS `tag-ID` FROM hex_tags_by_article AS htba WHERE htba.ID IN ('.implode(', ',$a_ArticleIDs).');');
				if($v_DC->Count_res()>0){
					$a_TagIDs['article']=$v_DC->Format('assoc_array');
					$this->A_ArticleTags=$a_TagIDs['article'];
			}}
			if(!empty($a_EventIDs)){
				$v_DC->Query('SELECT htbe.tag_ID AS `tag-ID` FROM hex_tags_by_event AS htbe WHERE htbe.ID IN ('.implode(', ',$a_EventIDs).');');
				if($v_DC->Count_res()>0){
					$a_TagIDs['event']=$v_DC->Format('assoc_array');
					$this->A_EventTags=$a_TagIDs['event'];
			}}
			if(!empty($a_MaterialIDs)){
				$v_DC->Query('SELECT htbm.tag_ID AS `tag-ID` FROM hex_tags_by_material AS htbm WHERE htbm.ID IN ('.implode(', ',$a_MaterialIDs).');');
				if($v_DC->Count_res()>0){
					$a_TagIDs['material']=$v_DC->Format('assoc_array');
					$this->A_MaterialTags=$a_TagIDs['material'];
					$v_DC->Query('SELECT hm.ID, hm.author, (SELECT COUNT(*) FROM hex_materials AS hm2 WHERE hm2.author=hm.author) AS total FROM hex_materials AS hm WHERE hm.ID IN('.implode(', ',$a_MaterialIDs).') AND hm.author!="" GROUP BY hm.author ORDER BY total DESC LIMIT 5;');
					if($v_DC->Count_res()>0){$this->A_FavoriteAuthors=$v_DC->Format('assoc_array');}
			}}
			if(!empty($a_DatabaseIDs)){
				$v_DC->Query('SELECT htbd.tag_ID AS `tag-ID` FROM hex_tags_by_database AS htbd WHERE htbd.ID IN ('.implode(', ',$a_DatabaseIDs).');');
				if($v_DC->Count_res()>0){
					$a_TagIDs['database']=$v_DC->Format('assoc_array');
					$this->A_DatabaseTags=$a_TagIDs['database'];
			}}
			$a_WeightedTags=array();
			foreach($a_TagIDs as $v_K=>$a_D){
				foreach($a_D as $v_Key=>$a_Tag){
					if(array_key_exists($a_Tag['tag-ID'],$a_WeightedTags)){$a_WeightedTags[$a_Tag['tag-ID']]++;}else{$a_WeightedTags[$a_Tag['tag-ID']]=1;}
			}}
			arsort($a_WeightedTags);
			$this->A_WeightedTags=$a_WeightedTags;
		}
	}
}
?>