<?
class Hours{
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
		'parameters'=>array()
	);
	//
	// VARIABLES
	//
	//
	// Variable - 
	private $V_HomeLibraryID=0;
	//
	// FUNCTIONS
	//
	//
	// Function - Hours (Object Initialization)
	function Hours($v_UserID=0,$v_LibraryID=0){
		$this->V_HomeLibraryID=$v_LibraryID;
		$this->F_ResetSearch($v_UserID);
	}
	//
	// Function - Construct Description
	function F_ConstructDescription($v_UserID=0){
		$a_Description=array(
			'description-A'=>'I am browsing',
			'search'=>' hours and locations.'
		);
		return implode('',$a_Description);
	}
	//
	// Function - Construct Hotkey Link
	function F_ConstructHotkeyLink($v_UserID=0,$v_AreaID=0){return 'hotkey/home-library/'.$this->V_HomelibraryID;}
	//
	// Function - Construct Search
	function F_ConstructSearch($v_UserID=0){
		$a_SQL=array(
			'SQL-A'=>'SELECT hln.ID, hln.name FROM hex_library_names AS hln',
			'where-A'=>' WHERE hln.ID<8',
			'order-by'=>' ORDER BY hln.ID',
			'limit'=>' LIMIT '.(($this->A_Parameters['current-page']-1)*$this->A_Parameters['maximum-records']).','.$this->A_Parameters['maximum-records'].';'
		);
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT COUNT(*) AS total FROM hex_library_names AS hln'.$a_SQL['where-A']);
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
	// Function - Get Home Library
	function F_GetHomeLibrary($v_UserID=0){return $this->V_HomeLibraryID;}
	//
	// Function - Get Home Library XML
	function F_GetHomeLibraryXML($v_UserID=0){return '<my-library-ID>'.$this->V_HomeLibraryID.'</my-library-ID>';}
	//
	// Function - Get Open Line
	function F_GetOpenLine($v_UserID=0,$v_TargetID=0,$v_Open='open'){
		if($v_TargetID!=7){
			$a_Records=array();
			$v_DC=db::getInstance();
			$this->A_Parameters['target']=$v_TargetID;
			$v_DC->Query('SELECT hl.day_of_week, hl.time_start, hl.time_end FROM hex_libraries AS hl WHERE hl.library_ID='.$v_TargetID.' ORDER BY hl.day_of_week;');
			if($v_DC->Count_res()>0){
				$a_Days=FF_RAN($v_DC->Format('assoc_array'));
				foreach($a_Days as $v_Key=>$a_Day){
					$a_Days[$v_Key]['time_start']=date('g:i A',strtotime($a_Day['time_start']));
					$a_Days[$v_Key]['time_end']=date('g:i A',strtotime($a_Day['time_end']));
					if($a_Days[$v_Key]['time_start']=='12:00 AM'){$a_Days[$v_Key]['time_start']='Closed';}
					if($a_Days[$v_Key]['time_end']=='12:00 AM'){$a_Days[$v_Key]['time_end']='Closed';}
				}
				$a_Records['ID']=$v_TargetID;
				$a_Records=array_merge($a_Records,$this->F_GetLibraryInformation($v_TargetID));
				return '<'.$v_Open.'-line>'.FF_CATXML($a_Days,'days',true,'day').FF_CATXML($a_Records,'').'</'.$v_Open.'-line>';
			}else{return '<'.$v_Open.'-line/>';}
		}else{return FF_CATXML(array_merge(array('ID'=>$v_TargetID),$this->F_GetLibraryInformation($v_TargetID)),$v_Open.'-line');}
	}
	//
	// Function - Get Target
	function F_GetTarget($v_UserID=0){return $this->A_Parameters['target'];}
	//
	// Function - Go To Page
	function F_GoToPage($v_UserID=0,$v_Page=0){if($v_Page<1){$this->A_Parameters['current-page']=1;}elseif($v_Page>$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']=$this->A_Parameters['total-pages'];}else{$this->A_Parameters['current-page']=$v_Page;}}
	//
	// Function - Library Information
	function F_GetLibraryInformation($v_LibraryID=0){
		switch($v_LibraryID){
			case 0:return array('library-name'=>'Main Library','street'=>'904 Indiana Avenue','city-state'=>'La Porte, IN','zip'=>'46350','phone'=>'(219) 362-6156');break;
			case 1:return array('library-name'=>'Coolspring','street'=>'7089 West 400 North','city-state'=>'Michigan City, IN','zip'=>'46360','phone'=>'(219) 879-3272');break;
			case 2:return array('library-name'=>'Fish Lake','street'=>'7981 E. St. Rd. 4 (P.O. Box 125)','city-state'=>'Walkerton, IN','zip'=>'46574','phone'=>'(219) 369-1337');break;
			case 3:return array('library-name'=>'Hanna','street'=>'202 North Thompson St. (P.O. Box 78)','city-state'=>'Hanna, IN','zip'=>'46340','phone'=>'(219) 797-4735');break;
			case 4:return array('library-name'=>'Kingsford Heights','street'=>'436 Evanston (P.O. Box 219)','city-state'=>'Kingsford Heights, IN','zip'=>'46346','phone'=>'(219) 393-3280');break;
			case 5:return array('library-name'=>'Rolling Prairie','street'=>'1 East Michigan Avenue (P.O. Box 157)','city-state'=>'Rolling Prairie, IN','zip'=>'46371','phone'=>'(219) 778-2390');break;
			case 6:return array('library-name'=>'Union Mills','street'=>'3727 West 800 South (P.O. Box 98)','city-state'=>'Union Mills, IN','zip'=>'46382','phone'=>'(219) 767-2604');break;
			case 7:return array('library-name'=>'Mobile Library','street'=>'','city-state'=>'','zip'=>'','phone'=>'(219) 362-6156');break;
			case 8:default:return array();break;
		}
	}
	//
	// Function - Next Page
	function F_NextPage($v_UserID=0){if($this->A_Parameters['current-page']<$this->A_Parameters['total-pages']){$this->A_Parameters['current-page']++;}}
	//
	// Function - Perform Action
	function F_PerformAction($v_UserID=0,$v_Action='',$v_MessagesOn=true){
		if($v_UserID>0){
			$v_DC=db::getInstance();
			switch($v_Action){
				case 'home':
					$v_SQL='DELETE FROM hex_my_library WHERE user_ID='.$v_UserID.';';break;
				case '':default:$v_SQL='';break;}
			if($v_SQL!=''){$v_DC->Query($v_SQL);}else{return;}
			$v_Perform='';
			switch($v_Action){
				case 'home':
					$this->V_HomeLibraryID=$this->A_Parameters['target'];
					$v_Message='This library has been marked as your home library.';
					$v_SQL='INSERT INTO hex_my_library (user_ID,library_ID) VALUES ('.$v_UserID.','.$this->A_Parameters['target'].');';
					$v_Perform=$this->F_GetHomeLibraryXML($v_UserID);
					break;
				case '':default:$v_SQL='';break;}
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
			return FF_CATXML($a_Information,'hours-info').'<boom><search-information></search-information><boom>'.FF_CATXML($a_Records,'locations',true,'location').'<boom>'.$this->F_GetOpenLine($v_UserID,(($v_TargetID>0)?$v_TargetID:$a_Records[0]['ID']));
		}else{return '<no-hours><total-pages>0</total-pages><current-page>1</current-page><header>'.$this->F_ConstructDescription($v_UserID).'</header></no-hours><boom><search-information></search-information>';}
	}
	//
	// Function - Previous Page
	function F_PreviousPage($v_UserID=0){if($this->A_Parameters['current-page']>1){$this->A_Parameters['current-page']--;}}
	//
	// Function - Reset Search
	function F_ResetSearch($v_UserID=0){$this->A_Parameters=array('current-page'=>1,'maximum-records'=>10,'search'=>0,'sort'=>0,'target'=>0,'total-pages'=>0,'total-records'=>0);}
}
?>