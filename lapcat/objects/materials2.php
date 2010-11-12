<?
class Materials2{
	private $A_H=array();
	private $A_L=array('length'=>10,'search'=>0,'sort'=>0,'screen'=>1,'total'=>0,'target'=>0,'similar'=>false);
	private $A_PreviousSearch=array();
	private $A_Search=array('change-search'=>0,'change-sort'=>0,'change-tag'=>0,'calendar'=>0);
	private $A_CreditSearch=array('actor'=>'','artist'=>'','author'=>'','console-name'=>'','m-artist'=>'','narrator'=>'','writer'=>'');
	private $A_SQL=array();
	private $A_T=array();
	private $V_SQL='';
	//
	// FUNCTIONS
	//
	// SQL - Viewable Materials
	// SELECT hm.ID, hm.name, hm.sub_name, hm.author, hm.ISBNorSN, hm.year, hm.act1, hm.act2, hm.act3, hm.artist, hm.writer, hm.narrator, hm.m_artist, hm.developer, hm.console, hcn.name AS console_name, hm.entered_by_ID, (SELECT AVG(rating) FROM hex_ratings_by_material AS hrbm2 WHERE hrbm2.material_ID=hm.ID) AS rating, (SELECT COUNT(*) FROM hex_ratings_by_material AS hrbm WHERE hrbm.material_ID=hm.ID) AS total_rating FROM hex_materials AS hm LEFT JOIN hex_console_names AS hcn ON (hcn.ID=hm.console) WHERE hm.locked=2;

	//
	// Function - Save Previous Search
	function F_SavePreviousSearch(){
		$this->A_PreviousSearch=array(
			'A_H'=>$this->A_H,
			'A_L'=>$this->A_L,
			'A_Search'=>$this->A_Search,
			'A_CreditSearch'=>$this->A_CreditSearch,
			'A_SQL'=>$this->A_SQL,
			'A_T'=>$this->A_T,
			'V_SQL'=>$this->V_SQL
		);
	}
	// Function - Load Previous Search
	function F_LoadPreviousSearch(){
		if(!empty($this->A_PreviousSearch)){
			$this->A_H=$this->A_PreviousSearch['A_H'];
			$this->A_L=$this->A_PreviousSearch['A_L'];
			$this->A_Search=$this->A_PreviousSearch['A_Search'];
			$this->A_CreditSearch=$this->A_PreviousSearch['A_CreditSearch'];
			$this->A_SQL=$this->A_PreviousSearch['A_SQL'];
			$this->A_T=$this->A_PreviousSearch['A_T'];
			$this->V_SQL=$this->A_PreviousSearch['V_SQL'];
			$this->A_PreviousSearch=array();
		}
	}
	//
	// Function - Get Tag
	function F_GetTag(){return $this->A_Search['change-tag'];}
	//
	// Function - Get Target
	function F_GetTarget(){return $this->A_L['target'];}
	//
	// Function - Materials (Object Initialization)
	function Materials($v_UID=0,$v_T=0){$this->F_ResetSearch();$this->F_ChangeTag($v_UID,$v_T);}
	//
	// Function - Search (Specific Item)
	function F_Search($v_UID=0,$v_Search=''){
		$this->F_ResetSearch();
		$this->F_ChangeTag($v_UID,0);
		if($v_Search!=''){$this->F_S($v_UID,'search',$v_Search);}
	}
	//
	// Function - Auto-Complete
	function F_AC($v_UID=0,$v_T='',$v_V=''){
		$v_R=str_replace('-','_',str_replace('-AC','',$v_T));
		switch($v_R){
			default:return '';break;
			case 'artist':case 'author':case 'console_name':case 'm_artist':case 'narrator':case 'writer':
				$v_SQL='SELECT vm.'.$v_R.' AS result FROM viewable_materials AS vm WHERE vm.'.$v_R.' LIKE "'.$v_V.'%" GROUP BY vm.'.$v_R.' ORDER BY vm.'.$v_R.' ASC;';break;}
		$a_R=array();
		$v_DC=db::getInstance();
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			return FF_CATXML($a_R,$v_T);
		}else{return '<'.$v_T.'></'.$v_T.'>';}
	}
	//
	// Function - Change Search
	function F_ChangeSearch($v_UID=0,$v_V=0){
		$this->A_Search['change-search']=$v_V;
		switch($v_V){
			case 0:default:$this->A_SQL['material-type']='>0';$this->A_SQL['where-A']=' WHERE htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75)';$this->A_H[1]=' materials';break;
			case 1:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' books';break;
			case 2:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' music';break;
			case 3:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' movies';break;
			case 4:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' video games';break;
			case 5:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' television shows';break;
			case 23:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' audio books';break;
			case 24:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' downloadable audio books';break;
			case 32:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' graphic novels';break;
			case 50:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' large print books';break;
			case 75:$this->A_SQL['material-type']='='.$v_V;$this->A_SQL['where-A']=' WHERE htbm.tag_ID='.$v_V;$this->A_H[1]=' digital audio players';break;
		}
		$this->F_TSQL();
	}
	//
	// Function - Change Sort
	function F_ChangeSort($v_UID=0,$v_V=0){
		$this->A_Search['change-sort']=$v_V;
		switch($v_V){
			case 0:default:$this->A_SQL['order-by']=' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC';$this->A_H[3]=' sorted by year.';break;
			case 1:$this->A_SQL['order-by']=' ORDER BY vm.rating DESC, vm.year DESC, vm.name ASC';$this->A_H[3]=' sorted by rating.';break;
			case 2:$this->A_SQL['order-by']=' ORDER BY vm.name ASC, vm.year DESC, vm.rating DESC';$this->A_H[3]=' sorted alphabetically.';break;
			case 3:$this->A_SQL['order-by']=' ORDER BY vm.name DESC, vm.year DESC, vm.rating DESC';$this->A_H[3]=' sorted alphabetically in reverse order.';break;
		}
	}
	//
	// Function - Change Tag
	function F_ChangeTag($v_UID=0,$v_V=0){
		$this->A_Search['change-tag']=$v_V;
		switch($v_V){
			case 0:$this->A_SQL['where-C']='';$this->A_SQL['SQL-E']=')';break;
			default:$this->A_SQL['where-C']=' AND htbma.tag_ID='.$v_V;$this->A_SQL['SQL-E']=') LEFT JOIN hex_tags_by_material AS htbma ON (htbma.ID=htbm.ID)';break;
		}
		$this->F_TSQL();
	}
	//
	// Function - Get Materials
	function F_GetMaterials($v_UID=0,$v_Target=0){
		$this->A_SQL['user-ID-A']=$v_UID;
		$this->A_SQL['limit']=' LIMIT '.(($this->A_L['screen']-1)*$this->A_L['length']).','.$this->A_L['length'].';';
		$a_R=array();
		$a_LT=array();
		$v_DC=db::getInstance();
		$v_DC->Query($this->V_SQL);
		if($v_DC->Count_res()>0){$a_LT=$v_DC->Format('assoc');$this->A_L['total']=$a_LT['total'];}
		$v_DC->Query(implode('',$this->A_SQL));
		//print_r($v_DC->Lastsql);die();
		$v_H='I am browsing'.implode('',$this->A_H);
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc_array'));
			$a_I=array();
			$a_I['total']=$this->A_L['total'];
			$a_I['screen']=$this->A_L['screen'];
			$a_I['header']=$v_H;
			//if($this->A_Search['change-tag']>0){print_r($v_DC->Lastsql);die();}
			return FF_CATXML($a_I,'materials-info').'<boom>'.FF_CATXML($this->F_GetSearchInformation(),'search-information').'<boom>'.FF_CATXML($a_R,'materials',true,'material').'<boom>'.$this->F_GetOpenLine($v_UID,(($v_Target>0)?$v_Target:$a_R[0]['ID']));
		}else{return '<no-materials><total>0</total><screen>1</screen><header>'.$v_H.'</header></no-materials><boom>'.FF_CATXML($this->F_GetSearchInformation(),'search-information');}
	}
	//
	// Function - Similar
	function F_Similar(){return $this->A_L['similar'];}
	//
	// Function - Similar
	function F_SimilarXML(){if($this->A_L['similar']){return '<similar></similar><boom>';}}
	//
	// Function - Set Similar
	function F_SetSimilar($v_Similar){$this->A_L['similar']=$v_Similar;}
	//
	// Function - Get Search Information
	function F_GetSearchInformation(){return array_merge($this->A_Search,$this->A_CreditSearch);}
	//
	// Function - Get Open Line
	function F_GetOpenLine($v_UID=0,$v_Target=0){
		$a_R=array();
		$v_DC=db::getInstance();
		$this->A_L['target']=$v_Target;
		$v_SQL='SELECT vm.ID, vm.name, vm.author, vm.console, vm.console_name, vm.m_artist, vm.writer, vm.narrator, vm.artist, vm.ISBNorSN, vm.sub_name, vm.rating, vm.year, hc.material_ID AS collected, hwl.user_ID AS watchlist, COUNT(*) AS total_collected, htbm.tag_ID AS type, hf.content_ID AS favorite, hrbm.rating AS my_rating, hu.username AS is_me FROM hex_tags_by_material AS htbm LEFT JOIN hex_ratings_by_material AS hrbm ON (hrbm.material_ID=htbm.ID AND hrbm.user_ID='.$v_UID.') LEFT JOIN viewable_materials AS vm ON (htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75) AND vm.ID=htbm.ID) LEFT JOIN hex_users AS hu ON (hu.ID=vm.entered_by_ID) LEFT JOIN hex_watch_list AS hwl ON (hwl.user_ID='.$v_UID.' AND hwl.material_ID=vm.ID) LEFT JOIN hex_collections AS hc ON (hc.material_ID=vm.ID AND hc.user_ID='.$v_UID.') LEFT JOIN hex_collections AS hco ON (hco.material_ID=vm.ID) LEFT JOIN hex_favorites AS hf ON (hf.user_ID='.$v_UID.' AND hf.favorite_type=2 AND hf.content_ID=vm.ID) WHERE vm.ID='.$v_Target.' GROUP BY vm.ID;';
		$v_DC->Query($v_SQL);
		//print_r($v_DC->Error);die();
		if($v_DC->Count_res()>0){
			$a_R=FF_RAN($v_DC->Format('assoc'));
			$a_R['tag-set']=FF_GE($v_Target,'material');
			$a_R['description']='';
			return $this->F_SimilarXML().FF_CATXML($a_R,'open-line');
		}else{return '<open-line/>';}
	}
	//
	// Function - Reset Search
	function F_ResetSearch(){
		$this->A_H=array(' all',' materials','',' sorted by year.');
		$this->A_L=array('length'=>10,'search'=>0,'screen'=>1,'total'=>0,'target'=>0,'similar'=>$this->A_L['similar']);
		$this->A_Search=array('change-search'=>0,'change-sort'=>0,'change-tag'=>$this->A_Search['change-tag'],'calendar'=>0);
		$this->A_CreditSearch=array('actor'=>'','artist'=>'','author'=>'','console-name'=>'','m-artist'=>'','narrator'=>'','writer'=>'');
		$this->F_ASQL();
		$this->F_TSQL();
	}
	//
	// Function - Area SQL
	function F_ASQL(){
		$this->A_SQL=array(
			'SQL-A'=>'SELECT vm.ID, vm.name, vm.ISBNorSN, vm.rating, vm.total_rating, vm.year, vm.act1, vm.act2, vm.act3, vm.developer, hwl.material_ID AS watchlist, htbm.tag_ID AS type FROM viewable_materials AS vm LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID',
			'material-type'=>'>0',
			'SQL-C'=>' AND vm.ID=htbm.ID)',
			'SQL-D'=>' LEFT JOIN hex_watch_list AS hwl ON (hwl.material_ID=vm.ID AND hwl.user_ID=',
			'user-ID-A'=>0,
			'SQL-E'=>')',
			'where-A'=>' WHERE htbm.tag_ID IN(1,2,3,4,5,23,24,32,50,75)',
			'where-B'=>'',
			'where-C'=>'',
			'order-by'=>' ORDER BY vm.year DESC, vm.rating DESC, vm.name ASC',
			'limit'=>'');
	}
	//
	// Function - Total SQL
	function F_TSQL(){$this->V_SQL='SELECT COUNT(*) AS total FROM viewable_materials AS vm LEFT JOIN hex_tags_by_material AS htbm ON (htbm.tag_ID'.$this->A_SQL['material-type'].' AND vm.ID=htbm.ID'.$this->A_SQL['SQL-E'].$this->A_SQL['where-A'].$this->A_SQL['where-B'].$this->A_SQL['where-C'];}
	//
	// Function - Next Page
	function F_NextPage(){if($this->A_L['screen']<$this->A_L['total']){$this->A_L['screen']++;}}
	//
	// Function - Previous Page
	function F_PreviousPage(){if($this->A_L['screen']>1){$this->A_L['screen']--;}}
	//
	// Function - Page
	function F_GoToPage($v_V=0){if($v_V<1){$this->A_L['screen']=1;}elseif($v_V>$this->A_L['total']){$this->A_L['screen']=$this->A_L['total'];}else{$this->A_L['screen']=$v_V;}}
	//
	// Function - First Page
	function F_FirstPage(){$this->A_L['screen']=1;}
	//
	// Function - Search
	function F_S($v_UID=0,$v_Type='',$v_Search=''){
		$v_Search=str_replace('%20',' ',$v_Search);
		$v_Search=str_replace('%27','\'',$v_Search);
		switch($v_Type){
			case 'search':$this->A_SQL['where-B']=' AND vm.name="'.$v_Search.'"';$this->A_H[2]=' titled '.$v_Search;break;
			
			case 'actor':$this->A_SQL['where-B']=' AND (vm.act1="'.$v_Search.'" OR vm.act2="'.$v_Search.'" OR vm.act3="'.$v_Search.'")';$this->A_H[2]=' starring '.$v_Search;break;
			case 'artist':$this->A_SQL['where-B']=' AND vm.artist="'.$v_Search.'"';$this->A_H[2]=' illustrated by '.$v_Search;break;
			case 'author':$this->A_SQL['where-B']=' AND vm.author="'.$v_Search.'"';$this->A_H[2]=' by '.$v_Search;break;
			case 'console-name':$this->A_SQL['where-B']=' AND vm.console_name="'.$v_Search.'"';$this->A_H[2]=' on '.$v_Search;break;
			case 'm-artist':$this->A_SQL['where-B']=' AND vm.m_artist="'.$v_Search.'"';$this->A_H[2]=' by '.$v_Search;break;
			case 'narrator':$this->A_SQL['where-B']=' AND vm.narrator="'.$v_Search.'"';$this->A_H[2]=' narrated by '.$v_Search;break;
			case 'writer':$this->A_SQL['where-B']=' AND vm.writer="'.$v_Search.'"';$this->A_H[2]=' written by '.$v_Search;break;
			default:$this->A_SQL['where-B']='';$this->A_H[2]='';break;
		}
		if($v_Search==''){$this->A_SQL['where-B']='';$this->A_H[2]='';}
		if(array_key_exists($v_Type,$this->A_CreditSearch)){$this->A_CreditSearch[$v_Type]=$v_Search;}
		$this->F_TSQL();
	}
	//
	// Function - Collect Target
	function F_CollectTarget($v_UID=0,$v_Ta=0){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='SELECT hc.user_ID FROM hex_collections AS hc WHERE hc.user_ID='.$v_UID.' AND hc.material_ID='.$this->A_L['target'].';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){$v_SQL='DELETE FROM hex_collections WHERE user_ID='.$v_UID.' AND material_ID='.$this->A_L['target'].';';$v_DC->Query($v_SQL);
		}else{$v_SQL='INSERT INTO hex_collections (user_ID,material_ID) VALUES ('.$v_UID.','.$this->A_L['target'].');';$v_DC->Query($v_SQL);}
		return $this->F_GetOpenLine($v_UID,$this->A_L['target']);
	}
	//
	// Function - Favorite Target
	function F_FavoriteTarget($v_UID=0,$v_Ta=0){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='SELECT user_ID FROM hex_favorites WHERE user_ID='.$v_UID.' AND favorite_type=2 AND content_ID='.$this->A_L['target'].';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){$v_DC->Query('DELETE FROM hex_favorites WHERE user_ID='.$v_UID.' AND favorite_type=2 AND content_ID='.$this->A_L['target'].';');
		}else{$v_DC->Query('INSERT INTO hex_favorites (user_ID,favorite_type,content_ID) VALUES ('.$v_UID.',2,'.$this->A_L['target'].');');}
		return $this->F_GetOpenLine($v_UID,$this->A_L['target']);
	}
	//
	// Function - Watch Target
	function F_WatchTarget($v_UID=0,$v_Ta=0){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='SELECT hwl.user_ID FROM hex_watch_list AS hwl WHERE hwl.user_ID='.$v_UID.' AND hwl.material_ID='.$this->A_L['target'].';';
		$v_DC->Query($v_SQL);
		if($v_DC->Count_res()>0){$v_SQL='DELETE FROM hex_watch_list WHERE user_ID='.$v_UID.' AND material_ID='.$this->A_L['target'].';';$v_DC->Query($v_SQL);
		}else{$v_SQL='INSERT INTO hex_watch_list (user_ID,material_ID) VALUES ('.$v_UID.','.$this->A_L['target'].');';$v_DC->Query($v_SQL);}
		return $this->F_GetOpenLine($v_UID,$this->A_L['target']);
	}
	//
	// Function - Rate Target
	function F_RateTarget($v_UID=0,$v_Rating=0){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_SQL='DELETE FROM hex_ratings_by_material WHERE user_ID='.$v_UID.' AND material_ID='.$this->A_L['target'].';';
		$v_DC->Query($v_SQL);
		$v_SQL='INSERT INTO hex_ratings_by_material (user_ID,material_ID,rating) VALUES ('.$v_UID.','.$this->A_L['target'].','.$v_Rating.');';
		$v_DC->Query($v_SQL);
		return $this->F_GetOpenLine($v_UID,$this->A_L['target']);
	}
}
?>