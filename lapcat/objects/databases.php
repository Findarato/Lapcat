<?
class Databases{
	//
	// ARRAYS
	//
	//
	// Array - Parameters
	private $A_Parameters=array(
		'current-page'=>1,
		'maximum-records'=>10,
		'search'=>0,
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
		'tag-name'=>''
	);
	//
	// Array - Search
	private $A_Search=array(
		'change-sort'=>0,
		'change-tag'=>0
	);
	//
	// VARIABLES
	//
	//
	// Variable - Tag Name
	private $V_TagName='';
	//
	// Variable - Validated
	private $V_Validated=false;
	//
	// FUNCTIONS
	//
	//
	// Function - Databases
	function Databases($v_UserID=0,$v_TagID=0){
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
	// Function - Construct Description
	function F_ConstructDescription($v_UserID=0){
		$a_Description=array(
			'description-A'=>'I am browsing',
			'search'=>' databases',
			'tag'=>'',
			'order-by'=>' sorted alphabetically.'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_Description['order-by']=' sorted alphabetically.';break;
						case 1:$a_Description['order-by']=' sorted alphabetically in reverse.';break;
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
	function F_ConstructSearch($v_UserID=0){
		$a_SQL=array(
			'SQL-A'=>'SELECT hd.ID, hd.name, hd.at_home, '.(($this->V_Validated)?'hd.link_in':'hd.link_out').' AS link FROM hex_databases AS hd',
			'SQL-B'=>'',
			'where-A'=>' WHERE hd.locked=2',
			'where-B'=>'',
			'order-by'=>' ORDER BY hd.name ASC',
			'limit'=>' LIMIT '.(($this->A_Parameters['current-page']-1)*$this->A_Parameters['maximum-records']).','.$this->A_Parameters['maximum-records'].';'
		);
		foreach($this->A_Search as $v_Key=>$v_Search){
			switch($v_Key){
				default:break;
				case 'change-sort':
					switch($v_Search){
						case 0:default:$a_SQL['order-by']=' ORDER BY hd.name ASC';break;
						case 1:$a_SQL['order-by']=' ORDER BY hd.name DESC';break;
					}break;
				case 'change-tag':
					switch($v_Search){
						case 0:$a_SQL['where-B']='';$a_SQL['SQL-B']='';break;
						default:$a_SQL['where-B']=' AND htbd.tag_ID='.$v_Search;$a_SQL['SQL-B']=' LEFT JOIN hex_tags_by_database AS htbd ON (htbd.ID=hd.ID)';break;
					}break;
			}
		}
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) AS total FROM hex_databases AS hd'.$a_SQL['where-A'].$a_SQL['where-B']);
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
		$v_DC->Query('SELECT hd.ID, hd.name, hd.description, hd.at_home, hd.link_in, hd.link_out FROM hex_databases AS hd WHERE hd.ID='.$v_TargetID.' GROUP BY hd.ID;');
		if($v_DC->Count_res()>0){
			$a_Records=FF_RAN($v_DC->Format('assoc'));
			$a_Records['tag-set']=FF_GE($v_TargetID,'database');
			return FF_CATXML($a_Records,$v_Open.'-line');
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
	function F_LoadPreviousSearch($v_UserID=0){$this->A_Parameters=$this->A_PreviousSearch['parameters'];$this->A_Search=$this->A_PreviousSearch['search'];$this->V_TagName=$this->A_PreviousSearch['tag-name'];}
	//
	// Function - Next Page
	function F_NextPage($v_UserID=0){if($this->A_Parameters['current-page']<$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']++;}}
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
			return FF_CATXML($a_Information,'databases-info').'<boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information').'<boom>'.FF_CATXML($a_Records,'databases',true,'database').'<boom>'.$this->F_GetOpenLine($v_UserID,(($v_TargetID>0)?$v_TargetID:$a_Records[0]['ID']));
		}else{return '<no-databases><total-pages>0</total-pages><current-page>1</current-page><header>'.$this->F_ConstructDescription($v_UserID).'</header></no-databases><boom>'.FF_CATXML($this->F_GetSearchInformation($v_UserID),'search-information');}
	}
	//
	// Function - Previous Page
	function F_PreviousPage($v_UserID=0){if($this->A_Parameters['current-page']>1){$this->A_Parameters['current-page']--;}}
	//
	// Function - Reset Search
	function F_ResetSearch($v_UserID=0){
		$this->A_Parameters=array('current-page'=>1,'maximum-records'=>10,'search'=>0,'sort'=>0,'target'=>0,'total-pages'=>0,'total-records'=>0);
		$this->A_Search=array('change-sort'=>0,'change-tag'=>0);
		$this->V_TagName='';
	}
	//
	// Function - Save Previous Search
	function F_SavePreviousSearch($v_UserID=0){$this->A_PreviousSearch=array('parameters'=>$this->A_Parameters,'search'=>$this->A_Search,'tag-name'=>$this->V_TagName);}
	//
	// Function - Search (Specific Item)
	function F_Search($v_UserID=0,$v_Search=''){
		$this->F_ResetSearch($v_UserID);
		$this->F_ChangeSearch($v_UserID,'change-tag',0);
	}
	//
	// Function - Validate
	function F_Validate($v_UserID=0,$v_Validated=false){$this->V_Validated=$v_Validated;}
}
?>