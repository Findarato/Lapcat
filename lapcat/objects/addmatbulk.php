<?
/**
 *Cron jobs cant use $_SERVER['DOCUMENT_ROOT'] variable because there is no server.
 * 
 * 
*/
class Addmatbulk{
	public $A_MaterialsByType=array();
	private $V_CSVCount=0;
	//
	// Function - Load CSV Files
	function F_LoadCSVFiles(){
		$v_DH=opendir('/www/dev'.'/mattypes/');
		while(($v_File=readdir($v_DH))!==false){if($v_File!=='..'&&$v_File!=='.'){$this->A_MaterialsByType[]=$v_File;}}
		$this->V_CSVCount=count($this->A_MaterialsByType);
		closedir($v_DH);
	}
	//
	// Function - Process CSV File
	function F_ProcessCSVFile($v_FileName){
		$a_File=array();
		$v_FileKeys=0;
		$v_FirstTag=4;
		$v_ISBNorSN_Modification=0;
		switch($v_FileName){
			case 'ficbook.csv':case 'lprint.csv':case 'music.csv':case 'nfbooks.csv':$a_File=file('/www/dev'.'/mattypes/'.$v_FileName);$v_FileKeys=9;$v_FirstTag=5;break;
			case 'vgames.csv':$a_File=file('/www/dev'.'/mattypes/'.$v_FileName);$v_FileKeys=10;$v_FirstTag=6;$v_ISBNorSN_Modification=1;break;
			case 'audiobooks.csv':case 'daplayer.csv':case 'gnovels.csv':$a_File=file('/www/dev'.'/mattypes/'.$v_FileName);$v_FileKeys=11;$v_FirstTag=5;break;
			case 'daudiobook.csv':$a_File=file('/www/dev'.'/mattypes/'.$v_FileName);$v_FileKeys=10;$v_FirstTag=5;break;
			case 'movies.csv':case 'tvshow.csv':$a_File=file('/www/dev'.'/mattypes/'.$v_FileName);$v_FileKeys=15;$v_FirstTag=5;break;
			case 'dbook.csv':
			default:break;
		}
		if(!empty($a_File)){
			rename('/www/dev'.'/mattypes/'.$v_FileName,'/www/dev'.'/mattypes_backup/'.str_replace('.csv','',$v_FileName).'-'.date('Y-m-d').'.csv');
			foreach($a_File as $v_K=>$v_D){
				$a_D=explode(',',$v_D);
				$v_SQL='';
				$v_DC=db::getInstance();
				if($a_D[4+$v_ISBNorSN_Modification]>0){
					switch($v_FileName){
						// Downloadable Audio Books
						case 'daudiobook.csv':$v_SQL='INSERT INTO hex_materials (name, sub_name, author, year, narrator, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", "'.ucwords(trim($a_D[1])).'", "'.ucwords(trim($a_D[2])).'", '.trim($a_D[3]).', "'.htmlspecialchars(ucwords(trim($a_D[9]))).'", "'.$a_D[4].'", 999, NOW(), 2)';break;
						// Digital Audio Players / Audio Books
						case 'daplayer.csv':case 'audiobooks.csv':$v_SQL='INSERT INTO hex_materials (name, sub_name, author, year, narrator, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", "'.ucwords(trim($a_D[1])).'", "'.ucwords(trim($a_D[2])).'", '.trim($a_D[3]).', "'.htmlspecialchars(ucwords(trim($a_D[10]).' '.trim($a_D[9]))).'", "'.$a_D[4].'", 999, NOW(), 2)';break;
						// Fiction Books / Large Print Books / Non-Fiction Books
						case 'ficbook.csv':case 'lprint.csv':case 'nfbooks.csv':$v_SQL='INSERT INTO hex_materials (name, sub_name, author, year, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", "'.ucwords(trim($a_D[1])).'", "'.ucwords(trim($a_D[2])).'", '.trim($a_D[3]).', "'.$a_D[4].'", 999, NOW(), 2)';break;
						// Graphic Novels
						case 'gnovels.csv':$v_SQL='INSERT INTO hex_materials (name, sub_name, writer, year, artist, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", "'.ucwords(trim($a_D[1])).'", "'.ucwords(trim($a_D[2])).'", '.trim($a_D[3]).', "'.htmlspecialchars(ucwords(trim($a_D[10]).' '.trim($a_D[9]))).'", "'.$a_D[4].'", 999, NOW(), 2)';break;
						// Movies
						case 'movies.csv':case 'tvshow.csv':$v_SQL='INSERT INTO hex_materials (name, sub_name, year, act1, act2, act3, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", "'.ucwords(trim($a_D[1])).'", '.trim($a_D[2]).', "'.htmlspecialchars(ucwords(trim($a_D[10]).' '.trim($a_D[9]))).'", "'.htmlspecialchars(ucwords(trim($a_D[12]).' '.trim($a_D[11]))).'", "'.htmlspecialchars(ucwords(trim($a_D[14]).' '.trim($a_D[13]))).'", "'.$a_D[4].'", 999, NOW(), 2)';break;
						// Music
						case 'music.csv':$v_SQL='INSERT INTO hex_materials (name, sub_name, m_artist, year, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", "'.trim($a_D[1]).'", "'.trim($a_D[2]).'", "'.trim($a_D[3]).'", "'.$a_D[4].'", 999, NOW(), 2)';break;
						// Video Games
						case 'vgames.csv':$v_SQL='INSERT INTO hex_materials (name, console, sub_name, year, developer, ISBNorSN, entered_by_ID, entered_on, locked) VALUES ("'.ucwords(trim($a_D[0])).'", (SELECT ID FROM hex_console_names WHERE name="'.$a_D[1].'"), "'.trim($a_D[2]).'", '.trim($a_D[3]).', "'.trim($a_D[4]).'", "'.$a_D[5].'", 999, NOW(), 2)';break;

						default:break;
					}
				}
				if($v_SQL!=''){
					$v_DC->Query($v_SQL);
					if(count($v_DC->Error)==2){
					}else{
						$v_LID=$v_DC->Lastid;
						$v_SQL='';
						for($v_T=0;$v_T<4;$v_T++){
							if($a_D[$v_T+$v_FirstTag]!=''){
								if($v_SQL!=''){$v_SQL.=', ';}
								$v_SQL.='('.$v_LID.',(SELECT ID FROM hex_tags WHERE name="'.strtolower(trim($a_D[$v_T+$v_FirstTag])).'" AND locked=2))';
							}
						}
						if($v_SQL!=''){$v_SQL='INSERT INTO hex_tags_by_material (ID, tag_ID) VALUES '.$v_SQL.';';$v_DC->Query($v_SQL);}
					}
				}
			}
		}
	}
	//
	// Function - Add Materials Bulk
	function Addmatbulk(){
		$this->F_LoadCSVFiles();
		foreach($this->A_MaterialsByType as $v_Key=>$v_FileName){$this->F_ProcessCSVFile($v_FileName);}
	}
}
?>