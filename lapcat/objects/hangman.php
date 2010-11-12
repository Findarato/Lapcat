<?
class Hangman{
	private $A_Alphabet=array();
	private $A_Guesses_By_Key=array();
	private $A_Puzzle=array();
	private $A_Puzzle_Info=array();
	private $A_Puzzle_Word_Count=array();
	private $A_XML=array();
	private $V_Puzzle_Type='name';
	private $V_Total_Guesses=0;
	private $V_XML='';
	//
	// Function - Hangman (Object Initialization)
	function Hangman(){$this->F_RG();}
	//
	// Function - Continue
	function F_C($v_UID=0){
		return $this->V_XML;
	}
	//
	// Function - Create Puzzle
	function F_Create_Puzzle(){
		$v_Puzzle=$this->A_Puzzle_Info[$this->V_Puzzle_Type];
		$this->A_Puzzle_Word_Count=str_word_count($v_Puzzle,2);
		$this->A_Puzzle=array();
		foreach($this->A_Puzzle_Word_Count as $v_K=>$v_W){
			if($v_K>0){$this->A_Puzzle[]='';}
			for($v_LL=0;$v_LL<strlen($v_W);$v_LL++){$this->A_Puzzle[]=substr($v_W,$v_LL,1);}}
		$this->A_XML=array();
		foreach($this->A_Puzzle as $v_K=>$v_P){
			$this->A_XML[$v_K]=array('letter'=>$v_P,'revealed'=>3);}
		$this->F_Get_Puzzle_Pieces();
	}
	//
	// Function - Get Puzzle Pieces
	function F_Get_Puzzle_Pieces(){
		// Variable - HTML
		$v_HTML='<puzzle>';
		foreach($this->A_XML as $v_K=>$a_P){
			$v_HTML.='<tile>';
			if($a_P['letter']==''){$v_HTML.='<key>'.$v_K.'</key><letter></letter><revealed>4</revealed>';
			}elseif($a_P['revealed']==3){$v_HTML.='<key>'.$v_K.'</key><letter></letter><revealed>3</revealed>';
			}else{$v_HTML.='<key>'.$v_K.'</key><letter>'.$a_P['letter'].'</letter><revealed>'.$a_P['revealed'].'</revealed>';}
			$v_HTML.='</tile>';
		}
		$v_HTML.='</puzzle>';
		$this->V_XML=$v_HTML;
	}
	//
	// Function - Reset Game
	function F_RG(){
		$this->A_Alphabet=explode('|','a|b|c|d|e|f|g|h|i|j|k|l|m|n|o|p|q|r|s|t|u|v|w|x|y|z');
		$v_DC=db::getInstance();
		$v_DC->Query('SELECT * FROM viewable_materials ORDER BY RAND() LIMIT 1;');
		$this->A_Puzzle_Info=$v_DC->Format('assoc');
		$this->F_Create_Puzzle();
	}
}
?>