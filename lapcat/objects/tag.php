<?
class Tag{
	//
	// ARRAYS
	//
	//
	// Array - Popular Tags
	private $A_PopularTags=array();
	//
	// FUNCTIONS
	//
	//
	// Function - Tag (Object Initialization)
	function Tag(){}
	//
	// Function - Auto-Complete
	function F_AC($v_UID=0,$v_V='',$v_T='change-tag'){
		$a_R=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ht.name AS result, ht.ID AS result_ID FROM hex_tags AS ht WHERE ht.name LIKE "'.$v_V.'%" GROUP BY ht.name ORDER BY ht.name ASC;');
		if($v_DC->Count_res()>0){
			$a_R=$v_DC->Format('assoc_array');
			return FF_CATXML($a_R,$v_T.'-AC');
		}else{return '<'.$v_T.'-AC/>';}
	}
	//
	// Function - Convert Tag
	function F_CT($v_UID=0,$v_V=''){
		if(is_numeric($v_V)&&$v_V==0){return array('tag_ID'=>0,'tag_name'=>'');}
		$a_R=array();
		$v_DC=db::getInstance();
		if(is_numeric($v_V)){$v_DC->Query('SELECT ht.ID AS tag_ID, ht.name AS tag_name FROM hex_tags AS ht WHERE ht.ID='.intval($v_V).';');
		}else if($v_V=='random'){$v_DC->Query('SELECT ht.ID AS tag_ID, ht.name AS tag_name FROM hex_tags AS ht GROUP BY ht.ID ORDER BY RAND() LIMIT 1;');
		}else{$v_DC->Query('SELECT ht.ID AS tag_ID, ht.name AS tag_name FROM hex_tags AS ht WHERE ht.name="'.str_replace('%20',' ',$v_V).'";');}
		if($v_DC->Count_res()>0){$a_R=$v_DC->Format('assoc');return $a_R;}
	}
	//
	// Function - Popular Tag
	function F_PopularTag($v_TagID=0,$v_IP=''){
		$a_IP=$v_IP.split('.',$v_IP,4);
		$v_IP=(intval($a_IP[0])*pow(2,24))+(intval($a_IP[1])*pow(2,16))+(intval($a_IP[2])*pow(2,8))+intval($a_IP[3]);
		$v_DC=db::getInstance();
		if(count($a_IP)!=4&&$v_TagID>0){
			$a_Date=split('-',date('d-m-Y'));
			$v_DC->Query('SELECT COUNT(*) AS total FROM hex_popular_tags WHERE tag_ID='.$v_TagID.' AND ip_address='.$v_IP.' AND DAY(time_stamp)='.$a_Date[0].' AND MONTH(time_stamp)='.$a_Date[1].' AND YEAR(time_stamp)='.$a_Date[2].';');
			$a_R=$v_DC->Format('assoc');
			if($a_R['total']==0){$v_DC->Query('INSERT INTO hex_popular_tags (tag_ID,ip_address) VALUES ('.$v_TagID.','.$v_IP.');');}
		}
	}
	//
	// Function - Get Popular Tags
	function F_GetPopularTags($v_TagID=0,$v_Refresh=false){
		$a_PopularTags=array();
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT ht.ID, ht.name, (SELECT COUNT(*) FROM hex_popular_tags AS hpt2 WHERE hpt2.tag_ID=hpt.tag_ID AND DATE(hpt2.time_stamp)=CURDATE()) AS total FROM hex_popular_tags AS hpt LEFT JOIN hex_tags AS ht ON (ht.ID=hpt.tag_ID) WHERE DATE(hpt.time_stamp)=CURDATE() GROUP BY ht.ID ORDER BY total DESC LIMIT 10;');
		if($v_DC->Count_res()>0){
			$v_Counter=0;
			$a_PopularTags=$v_DC->Format('assoc_array');
			foreach($a_PopularTags as $v_Key=>$a_Tag){
				if(array_key_exists($v_Key,$this->A_PopularTags)){
					if($a_Tag['ID']!=$this->A_PopularTags[$v_Key]['ID']){
						$v_Counter++;
					}
				}else{
					$v_Counter++;
				}
			}
			if(empty($this->A_PopularTags)){$v_Counter++;}
			$this->A_PopularTags=$a_PopularTags;
			if($v_Counter>0||$v_Refresh){
				return FF_CATXML($a_PopularTags,'popular-tags',true,'tag');
			}else{
				return '';
			}
		}
	}
}
?>