<?
class Options{
	public $A_O=array(
		'background'=>array('r'=>0,'g'=>0,'b'=>0,'a'=>0,'bg'=>0),
		'displays'=>array('r'=>0,'g'=>0,'b'=>0,'a'=>0.5,'bg'=>0),
		'display-bars'=>array('r'=>0,'g'=>0,'b'=>0,'a'=>1,'bg'=>0)
	);
	public $V_AID=88;
	//
	// Function - Get Options
	function F_GO(){return FF_CATXML($this->A_O,'options',true,'option');}
	//
	// Function - Get URL
	function F_GURL($a_G){
		foreach($a_G as $v_K=>$v_D){
			// [1] Area ID, [2] Array, [3] Red, [4] Green, [5] Blue, [6] Transparency, [7] Image
			switch($v_K){
				// Area ID
				case 1:switch($v_D){case 0:break;default:$this->V_AID=$v_D;break;}break;
				// Array
				case 2:
					$a_A=array(1=>'background',2=>'displays',3=>'display-bars');
					switch($v_D){
						case 0:default:break;
						case 1:$this->A_O['background']=array('r'=>$a_G[3],'g'=>$a_G[4],'b'=>$a_G[5],'a'=>$a_G[6],'bg'=>$a_G[7]);break;
						case 2:$this->A_O['displays']=array('r'=>$a_G[3],'g'=>$a_G[4],'b'=>$a_G[5],'a'=>$a_G[6],'bg'=>$a_G[7]);break;
						case 3:$this->A_O['display-bars']=array('r'=>$a_G[3],'g'=>$a_G[4],'b'=>$a_G[5],'a'=>$a_G[6],'bg'=>$a_G[7]);break;
					}break;
				default:break;}}
		return $this->F_GO();
	}
}
?>