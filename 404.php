<?
require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/php-functions.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/aval.php';

$A_URL=array_splice(explode('/',strtolower($_SERVER['REQUEST_URI'])),0,6);
array_shift($A_URL);
$V_Area='';
$V_Command='';
$V_Fresh=true;
$V_JSON='';
$V_Clear='fresh';
$V_Main='';
$V_MessagesOn=false;
$V_Secondary='';
$V_ServerRoot=$_SERVER['DOCUMENT_ROOT'];
$V_UserID=0;

if($A_URL[0]==''){
	$V_Area='home';
}else{
	foreach($A_URL as $v_Key=>$v_Text){
		switch($v_Key){
			case 0:if($v_Text=='quick'||$v_Text=='fresh'){$V_Clear=$v_Text;$V_Fresh=false;}break;
			case 1:$V_Area=$v_Text;break;
			case 2:$V_Command=$v_Text;break;
			case 3:$V_Main=$v_Text;break;
			case 4:$V_Secondary=$v_Text;break;
			default:break;
		}
	}
}

function F_URLNF(){header('HTTP/1.0 404 Not Found');header('Status: 404 Not Found');echo '404 Error';}
function F_HR($v_JSON){header('HTTP/1.1 200 OK');header('Status: 200 OK');die($v_JSON);}

if(isset($_SESSION['user'])){$o_User=unserialize($_SESSION['user']);}else{$o_User=new User();}
if(isset($_SESSION['LAPCAT'])){$o_LAPCAT=unserialize($_SESSION['LAPCAT']);}else{$o_LAPCAT=new LAPCAT($V_UserID,$_SERVER['REMOTE_ADDR'],$V_MessagesOn);}
// V_Area, V_Command, V_Main, V_Secondary
if(!$V_Fresh){
	switch($V_Area){
		case 'request-view':$V_JSON=$o_LAPCAT->F_GetMonthView(false,explode('-',$V_Command));break;
		case 'month-view':$V_JSON=$o_LAPCAT->F_GetMonthView(true,explode('-',$o_LAPCAT->F_CurrentDate()));break;
		case 'popular-tags':$V_JSON=$o_LAPCAT->F_GetPopularTags();break;

		case 'home':case 'databases':case 'events':case 'materials':case 'news':
			switch($V_Command){
				case 'search':case 'suggest':
				case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':
				case 'change-page':
				case 'open-line':
					$V_JSON=$o_LAPCAT->F_PerformRequest($V_Clear,$V_Area,$V_Command,$V_Main,$V_Secondary);
					break;
				default:
					break;
			}
			break;
		/*
		case 'databases':case 'events':case 'home':case 'materials':case 'news':
			switch($V_Command){
				case 'in-list':
				case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':
				case 'similar':
				case 'next-page':case 'next-line':case 'page':case 'previous-page':case 'previous-line':
				case 'browse':case 'specific':case 'suggest':
				case 'open-line':
				case 'reset':
					$V_JSON=$o_LAPCAT->F_PerformCommand($V_Area,$V_Command,$V_Main,$V_Secondary);
					break;
				default:
					break;
			}
			break;
		*/
		/*
		case 'popular-tags':
			$V_JSON=$o_LAPCAT->F_GetPopularTags();
			break;
		case 'home':case 'news':
			switch($V_Command){
				case 'get-html':
					switch($V_Main){
						case 'materials':default:$v_Page=100;break;
						case 'databases':$v_Page=500;break;
						case 'events':$v_Page=200;break;
						case 'news':$v_Page=300;break;
						case 'browse':
							switch($V_Area){
								case 'databases':$v_Page=400;break;
								case 'events':$v_Page=400;break;
								case 'materials':$v_Page=400;break;
								case 'news':$v_Page=400;break;
								default:
									break;
							}
					}
					$V_JSON=json_encode(array(
						'pointer'=>$V_Area,
						'type'=>$V_Command,
						'cell'=>$V_Main,
						'data'=>file_get_contents($V_ServerRoot.'/lapcat/layout/display-html-'.$v_Page.'.html')
					));
					break;
				case 'reset':
					$o_LAPCAT->F_PerformCommand($V_Area,'reset');
				default:case 'browse':case 'change-date':case 'change-sort':case 'change-tag':case 'open-line':case 'specific':case 'suggest':
					$V_JSON=$o_LAPCAT->F_PerformCommand($V_Area,$V_Command,$V_Main,$V_Secondary);
					break;
			}
			break;
		*/
		default:break;
	}
}else{
	$o_LAPCAT->F_PerformQuickCommand($V_Area,'reset');
}

if(isset($o_LAPCAT)){$_SESSION['LAPCAT']=serialize($o_LAPCAT);}
if(isset($o_User)){$_SESSION['user']=serialize($o_User);}

if($V_Fresh){
	header('HTTP/1.1 200 OK');
	header('Status: 200 OK');
}else{
	header('Content-type: application/json');
	F_HR($V_JSON);
}



/*
$A_URLE=explode('/',strtolower($_SERVER['REQUEST_URI']));
$V_LI=false;
$V_SR=$_SERVER['DOCUMENT_ROOT'];
$V_URLE='';
function F_URLNF(){header('HTTP/1.0 404 Not Found');header('Status: 404 Not Found');echo '404 Error';}
function F_HR($v_XML){header('HTTP/1.1 200 OK');header('Status: 200 OK');die($v_XML);}
$a_XML=array();
if(isset($_SESSION['user'])){$o_U=unserialize($_SESSION['user']);}else{$o_U=new User();}
// Variable - Load All Parts
if(in_array('ajax',$A_URLE)){$v_LAP=false;}else{$v_LAP=true;$o_U->A_U['tag']=0;}
$v_LogXML='';
$response=array('achievements'=>array());
// Variable - Simple
$V_Simple=false;
$V_JSON=false;
if(in_array('simple',$A_URLE)||in_array('json',$A_URLE)){
	if(in_array('json',$A_URLE)){$V_JSON=true;}
	$V_Simple=true;
}
if(!$V_Simple){
	if($o_U->A_U['logged-in']>2){
		$V_LI=true;
		$v_LogXML='<logged-in></logged-in>';
		if($V_LI!==$o_U->V_LI){$o_U->V_LI=$V_LI;}
	}else{
		$v_LogXML='<logged-out></logged-out>';
		if($V_LI!==$o_U->V_LI){$o_U->V_LI=$V_LI;}
	}
}
array_shift($A_URLE);
if(is_null($A_URLE[0])||strlen($A_URLE[0])==0){$A_URLE=explode('/',((!$V_LI)?'join/clear':'my-library/clear'));}
$V_Area=array_shift($A_URLE);
if(isset($_SESSION['tag'])){$o_CT=unserialize($_SESSION['tag']);}else{$o_CT=new Tag();}
// User ID
$V_UserID=$o_U->A_U['user-ID'];
// Tag ID
$V_TagID=$o_U->A_U['tag'];
// Tag Name
$V_TagName='';
$V_MessagesOn=true;
$V_TargetID=0;
*/
/* new code */
//if(isset($_SESSION['LAPCAT'])){$o_LAPCAT=unserialize($_SESSION['LAPCAT']);}else{$o_LAPCAT=new LAPCAT($V_UserID,$_SERVER['REMOTE_ADDR'],$V_MessagesOn);}
/* end new code */
/*

if($V_Area=='multi'){$V_Area.='-'.$A_URLE[0];}
if($V_Simple){

	$V_Command=$A_URLE[0];
	$V_Optional=$A_URLE[1];

// Simple
switch($V_Area){
	// Month View
	case 'month-view':
		$a_XML[]=$o_LAPCAT->F_GetMonthView(explode('-',$o_LAPCAT->F_CurrentDate()));
		break;

	// Refresh
	case 'refresh':
		// Refresh
		$o_LAPCAT->F_Refresh();break;

	// Popular Tags
	case 'popular-tags':
		// Get Popular Tags
		$a_XML[]=$o_LAPCAT->F_GetPopularTags();
		break;

	// My Library
	case 'home':case 'my-library':
		switch($A_URLE[0]){
			// Change Tag
			case 'change-tag-interests':case 'change-tag-possibles':case 'change-tag-suggestions':
				$A_URLE[0]=str_replace('change-tag-','',$A_URLE[0]);
				$o_LAPCAT->F_ChangeTag($A_URLE[1]);
			// Get Data
			case 'interests':case 'possibles':case 'suggestions':$a_XML[]=$o_LAPCAT->F_GetData($V_Area,$A_URLE[0],$A_URLE[1]);break;

			case 'suggest-materials':$a_XML[]=$o_LAPCAT->F_PerformCommand($V_Area,$V_Command);break;

			default:break;
		}
		break;

	// Events, News
	case 'events':case 'news':
		switch($A_URLE[0]){
			// Change Tag
			case 'change-tag':
				$o_LAPCAT->F_ChangeTag($A_URLE[1]);
			// Get Data
			case 'article':case 'event':
			case 'browse':
			case 'calendar':case 'change-search':case 'change-sort':
			case 'favorites':
			case 'next-page':case 'previous-page':
			case 'open-line':
			case 'page':
			case 'reset':
				$a_XML[]=$o_LAPCAT->F_GetData($V_Area,$A_URLE[0],$A_URLE[1]);
				break;
			default:break;
		}
		break;




	// All
	case 'all':switch($A_URLE[0]){case 'change-tag-ac':if(isset($A_URLE[1])){$a_XML[]=$o_CT->F_AC($V_UserID,$A_URLE[1]);}break;default:break;}break;

	// Available (material availability - parse the catalog and determine if material is available)
	case 'available':
		if(array_key_exists(0,$A_URLE)){$a_XML[]=FF_CATXML(makeCoolXMLStuff(avalByisbn($A_URLE[0])),$V_Area);}
		break;

	// Promotions List
	case 'promotions-list':$a_XML=array();$a_XML[]=$o_U->F_GetPromotionsXML();break;
	
	// Information
	case 'information':
		switch($A_URLE[0]){
			case 'points':
				$a_XML[]=$o_U->F_GetPointsInformation($V_UserID);
				break;
			default:break;
		}
		break;

	case 'events':
		if(isset($_SESSION['events'])){$o_E=unserialize($_SESSION['events']);}else{$o_E=new Events($V_UserID,$o_U->A_U['tag']);}
		switch($A_URLE[0]){
			// Add XML
			case 'anticipate':case 'favorite':$a_XML[]=$o_E->F_PerformAction($V_UserID,$A_URLE[0],$V_MessagesOn);break;
			// Add XML
			case 'thin-line':if(array_key_exists(1,$A_URLE)){$a_XML[]=$o_E->F_GetOpenLine($V_UserID,$A_URLE[1],'thin');}break;
			default:break;
		}
		if(isset($o_E)){$_SESSION['events']=serialize($o_E);}
		break;

	case 'materials':
		if(isset($_SESSION['materials'])){$o_M=unserialize($_SESSION['materials']);}else{$o_M=new Materials($V_UserID,$o_U->A_U['tag']);}
		switch($A_URLE[0]){
			// Add XML
			case 'collection':case 'watch':case 'favorite':$a_XML[]=$o_M->F_PerformAction($V_UserID,$A_URLE[0],$V_MessagesOn);break;
			// Add XML
			case 'thin-line':if(array_key_exists(1,$A_URLE)){$a_XML[]=$o_M->F_GetOpenLine($V_UserID,$A_URLE[1],'thin');}break;
			default:break;
		}
		if(isset($o_M)){$_SESSION['materials']=serialize($o_M);}
		break;

	case 'databases':
		if(isset($_SESSION['databases'])){$o_D=unserialize($_SESSION['databases']);}else{$o_D=new Databases($V_UserID,$o_U->A_U['tag']);}
		switch($A_URLE[0]){
			// Add XML
			case 'thin-line':if(array_key_exists(1,$A_URLE)){$a_XML[]=$o_D->F_GetOpenLine($V_UserID,$A_URLE[1],'thin');}break;
			default:break;
		}
		if(isset($o_D)){$_SESSION['databases']=serialize($o_D);}
		break;
	
	case 'hours':
		if(isset($_SESSION['hours'])){$o_H=unserialize($_SESSION['hours']);}else{$o_H=new Hours($V_UserID,$o_U->A_U['tag']);}
		switch($A_URLE[0]){
			case 'home':
				$a_XML[]=$o_H->F_PerformAction($V_UserID,$A_URLE[0],$V_MessagesOn);
				$o_U->A_U['library-ID']=$A_URLE[1];
				$o_U->A_P['library-ID']=$A_URLE[1];
				break;
			// Add XML
			case 'thin-line':if(array_key_exists(1,$A_URLE)){$a_XML[]=$o_H->F_GetOpenLine($V_UserID,$A_URLE[1],'thin');}break;
			default:break;
		}
		if(isset($o_H)){$_SESSION['hours']=serialize($o_H);}
		break;

	default:break;
}

}else{

// Full
switch($V_Area){

	// Promotions
	case 'promotions':
		break;

	case 'log-out':
		$_SESSION=array();
		F_HR('');
		break;

	// Validate Email Address
	case 'valid':if(!$o_U->A_U['validated']){$a_XML[]='<area-info><area-ID>2</area-ID></area-info>';$a_XML[]='<join></join>';$a_XML[]='<validated>26</validated>';$o_U->F_ACC($A_URLE[0],$A_URLE[1]);}break;

	case 'home':
		// Home
		if($V_LI){$V_Area='my-library';}else{$V_Area='join';}
	case 'join':case 'my-library':
		if($v_LAP||($V_Area=='join'&&$o_U->A_U['area-ID']!=2)||($V_Area=='my-library'&&$o_U->A_U['area-ID']!=3)){
			switch($V_Area){case 'join':$o_U->A_U['area-ID']=2;break;default:$o_U->A_U['area-ID']=3;break;}
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		if(isset($_SESSION['my-library'])){$o_ML=unserialize($_SESSION['my-library']);}else{$o_ML=new Mylibrary($V_UserID);}
		if(!array_key_exists(0,$A_URLE)){$A_URLE[0]='reset';}
		switch($A_URLE[0]){
			case 'browse':
			case 'clear':case 'reset':case 'suggest':
			case 'change-tag':
				switch($A_URLE[0]){
					case 'browse':
						$o_ML->F_ChangeTag($V_UserID,$o_U->A_U['tag']);
						break;
					case 'clear':
						// Clear
						$o_ML->F_Clear();
						// Change Tag [change-tag]
						$o_ML->F_ChangeTag($V_UserID,$o_U->A_U['tag']);
					case 'reset':
						// Reset
						$o_ML->F_Reset($V_UserID);

					case 'change-tag':
						switch($A_URLE[0]){
							case 'change-tag':
								if(array_key_exists(1,$A_URLE)){
									// Convert Tag (ID, name)
									$a_CT=$o_CT->F_CT($V_UserID,$A_URLE[1]);
									$o_U->A_U['tag']=$a_CT['tag_ID'];
									// Popular Tag
									$o_CT->F_PopularTag($a_CT['tag_ID'],$_SERVER['REMOTE_ADDR']);
									// Change Tag [change-tag]
									$o_ML->F_ChangeTag($V_UserID,$o_U->A_U['tag']);
									$a_XML[]=FF_TagSelectXML($o_U->A_U['tag'],$a_CT['tag_name']);
								}
								break;
							default:break;
						}
						break;

					default:break;}

			default:
				$a_XML[]=$o_ML->F_MakeSuggestions($V_UserID);
				$a_XML[]=$o_CT->F_GetPopularTags($V_UserID,$v_LAP);
				break;
		}
		// Close My Library
		if(isset($o_ML)){$_SESSION['my-library']=serialize($o_ML);}
		break;

	case 'news':
		if($v_LAP||$o_U->A_U['area-ID']!=131){
			$o_U->A_U['area-ID']=131;
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		if(isset($_SESSION['news'])){$o_N=unserialize($_SESSION['news']);}else{$o_N=new News($V_UserID,$o_U->A_U['tag']);}
		if(!array_key_exists(0,$A_URLE)){$A_URLE[0]='reset-search';}
		switch($A_URLE[0]){
			case 'browse':
			case 'back':case 'similar':
			case 'clear-search':case 'reset-search':
			case 'change-filter':case 'calendar':case 'change-sort':case 'change-tag':
				$o_N->F_FirstPage($V_UserID);
			case 'next':case 'page':case 'previous':
				if($o_N->F_Similar($V_UserID)){$o_N->F_ResetSearch($V_UserID);}
				switch($A_URLE[0]){
					case 'change-filter':case 'calendar':case 'change-sort':if(array_key_exists(1,$A_URLE)){$o_N->F_ChangeSearch($V_UserID,$A_URLE[0],$A_URLE[1]);}break;
					case 'change-tag':
						if(array_key_exists(1,$A_URLE)){
							$a_CT=$o_CT->F_CT($V_UserID,$A_URLE[1]);
							$V_TagID=$a_CT['tag_ID'];
							$V_TagName=$a_CT['tag_name'];
							$o_U->A_U['tag']=$V_TagID;
							$o_CT->F_PopularTag($V_TagID,$_SERVER['REMOTE_ADDR']);
							$o_N->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
							// Add XML
							$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);
						}
						break;
					case 'next':$o_N->F_NextPage($V_UserID);break;
					case 'page':if(array_key_exists(1,$A_URLE)){$o_N->F_GoToPage($V_UserID,$A_URLE[1]);}break;
					case 'previous':$o_N->F_PreviousPage($V_UserID);break;
					case 'back':
						$o_N->F_LoadPreviousSearch($V_UserID);
						$V_TargetID=$o_N->F_GetTarget($V_UserID);
						$V_TagID=$o_N->F_GetTagID($V_UserID);
						$V_TagName=$o_N->F_GetTagName($V_UserID);
						$o_U->A_U['tag']=$V_TagID;
						// Add XML
						$a_XML[]='<back></back>';
						// Add XML
						$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);
						break;
					case 'clear-search':
						$o_N->F_ResetSearch($V_UserID);
						$o_N->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
						break;
					case 'browse':case 'similar':
						switch($A_URLE[0]){
							case 'browse':
								if(array_key_exists(1,$A_URLE)){
									$V_TargetID=$A_URLE[1];
									$a_XML[]=$o_CT->F_GetPopularTags($V_UserID,$v_LAP);
								}
								break;
							case 'similar':
								if(array_key_exists(1,$A_URLE)){
									$o_N->F_SavePreviousSearch($V_UserID);
									$o_N->F_SetSimilar($V_UserID,true,$A_URLE[1]);
									unset($V_TargetID);
									$V_TargetID=$o_N->F_GetTarget($V_UserID);
								}
								break;
							default:
								break;
						}
					case 'reset-search':
						if(!$o_N->F_Similar()){$o_N->F_ResetSearch($V_UserID);}
						$o_U->A_U['tag']=0;
						$V_TagID=0;
						$V_TagName='';
						$o_N->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
						// Add XML
						$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);
					default:break;
				}
			default:
				if($V_TagID>0&&$o_N->F_GetTagName($V_UserID)==''){
					$a_CT=$o_CT->F_CT($V_UserID,$V_TagID);
					$V_TagName=$a_CT['tag_name'];
					$o_N->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
				}
				// Add XML
				$v_DC=db::getInstance();
				$a_XML[]=$o_N->F_PerformSearch($V_UserID,$V_TargetID);
				break;}
		if(isset($o_N)){$_SESSION['news']=serialize($o_N);}
		break;

	case 'events':
		if($v_LAP||$o_U->A_U['area-ID']!=28){
			$o_U->A_U['area-ID']=28;
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		if(isset($_SESSION['events'])){$o_E=unserialize($_SESSION['events']);}else{$o_E=new Events($V_UserID,$o_U->A_U['tag']);}
		if(!array_key_exists(0,$A_URLE)){$A_URLE[0]='reset-search';}
		switch($A_URLE[0]){
			case 'browse':
			case 'back':case 'similar':
			case 'clear-search':case 'reset-search':
			case 'change-filter':case 'calendar':case 'change-search':case 'change-sort':case 'change-tag':case 'library-search':
				$o_E->F_FirstPage($V_UserID);
			case 'next':case 'page':case 'previous':
				if($o_E->F_Similar($V_UserID)){$o_E->F_ResetSearch($V_UserID);}
				switch($A_URLE[0]){
					case 'library-search':
						if(array_key_exists(1,$A_URLE)){
							$o_U->A_U['tag']=0;
							$o_E->F_ChangeTag($V_UserID,0,'');
							// Add XML
							$a_XML[]=FF_TagSelectXML(0,'');
							$o_E->F_ChangeSearch($V_UserID,'change-search',$A_URLE[1]);
						}break;
					case 'calendar':case 'change-filter':case 'change-sort':case 'change-search':
						if(array_key_exists(1,$A_URLE)){$o_E->F_ChangeSearch($V_UserID,$A_URLE[0],$A_URLE[1]);}break;
					case 'change-tag':
						if(array_key_exists(1,$A_URLE)){
							$a_CT=$o_CT->F_CT($V_UserID,$A_URLE[1]);
							$V_TagID=$a_CT['tag_ID'];
							$V_TagName=$a_CT['tag_name'];
							$o_U->A_U['tag']=$V_TagID;
							$o_CT->F_PopularTag($V_TagID,$_SERVER['REMOTE_ADDR']);
							$o_E->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
							// Add XML
							$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);}break;
					case 'next':$o_E->F_NextPage($V_UserID);break;
					case 'page':if(array_key_exists(1,$A_URLE)){$o_E->F_GoToPage($V_UserID,$A_URLE[1]);}break;
					case 'previous':$o_E->F_PreviousPage($V_UserID);break;
					case 'back':
						$o_E->F_LoadPreviousSearch($V_UserID);
						$V_TargetID=$o_E->F_GetTarget($V_UserID);
						$V_TagID=$o_E->F_GetTagID($V_UserID);
						$V_TagName=$o_E->F_GetTagName($V_UserID);
						$o_U->A_U['tag']=$V_TagID;
						// Add XML
						$a_XML[]='<back></back>';
						// Add XML
						$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);
						break;
					case 'clear-search':
						$o_E->F_ResetSearch($V_UserID);
						$o_E->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
						break;
					case 'browse':case 'similar':
						switch($A_URLE[0]){
							case 'browse':
								if(array_key_exists(1,$A_URLE)){
									$V_TargetID=$A_URLE[1];
									$a_XML[]=$o_CT->F_GetPopularTags($V_UserID,$v_LAP);
								}
								break;
							case 'similar':
								if(array_key_exists(1,$A_URLE)){
									$o_E->F_SavePreviousSearch($V_UserID);
									$o_E->F_SetSimilar($V_UserID,true,$A_URLE[1]);
									unset($V_TargetID);
									$V_TargetID=$o_E->F_GetTarget($V_UserID);
								}
								break;
							default:
								break;
						}
					case 'reset-search':
						if(!$o_E->F_Similar()){$o_E->F_ResetSearch($V_UserID);}
						$o_U->A_U['tag']=0;
						$V_TagID=0;
						$V_TagName='';
						$o_E->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
						// Add XML
						$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);
					default:break;
				}
			default:
				if($V_TagID>0&&$o_E->F_GetTagName($V_UserID)==''){
					$a_CT=$o_CT->F_CT($V_UserID,$V_TagID);
					$V_TagName=$a_CT['tag_name'];
					$o_E->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
				}
				// Add XML
				$a_XML[]=$o_E->F_PerformSearch($V_UserID,$V_TargetID);
				break;}
		if(isset($o_E)){$_SESSION['events']=serialize($o_E);}
		break;

	case 'materials':
		if($v_LAP||$o_U->A_U['area-ID']!=34){
			$o_U->A_U['area-ID']=34;
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		if(isset($_SESSION['materials'])){$o_M=unserialize($_SESSION['materials']);}else{$o_M=new Materials($V_UserID,$o_U->A_U['tag']);}
		if(!array_key_exists(0,$A_URLE)){$A_URLE[0]='reset-search';}
		switch($A_URLE[0]){
			case 'actor':case 'artist':case 'author':case 'console-name':case 'm-artist':case 'narrator':case 'writer':
				if(array_key_exists(1,$A_URLE)){$o_M->F_ChangeCreditSearch($V_UserID,$A_URLE[0],$A_URLE[1]);}
			case 'browse':
			case 'back':case 'similar':
			case 'clear-search':case 'reset-search':
			case 'change-filter':case 'change-search':case 'change-sort':case 'change-tag':
				$o_M->F_FirstPage($V_UserID);
			case 'next':case 'page':case 'previous':
				if($o_M->F_Similar($V_UserID)){$o_M->F_ResetSearch($V_UserID);}
				switch($A_URLE[0]){
					case 'change-filter':case 'change-sort':case 'change-search':if(array_key_exists(1,$A_URLE)){$o_M->F_ChangeSearch($V_UserID,$A_URLE[0],$A_URLE[1]);}break;
					case 'change-tag':
						if(array_key_exists(1,$A_URLE)){
							$a_CT=$o_CT->F_CT($V_UserID,$A_URLE[1]);
							$V_TagID=$a_CT['tag_ID'];
							$V_TagName=$a_CT['tag_name'];
							$o_U->A_U['tag']=$V_TagID;
							$o_CT->F_PopularTag($V_TagID,$_SERVER['REMOTE_ADDR']);
							$o_M->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
							// Add XML
							$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);}break;
					case 'next':$o_M->F_NextPage($V_UserID);break;
					case 'page':if(array_key_exists(1,$A_URLE)){$o_M->F_GoToPage($V_UserID,$A_URLE[1]);}break;
					case 'previous':$o_M->F_PreviousPage($V_UserID);break;
					case 'back':
						$o_M->F_LoadPreviousSearch($V_UserID);
						$V_TargetID=$o_M->F_GetTarget($V_UserID);
						$V_TagID=$o_M->F_GetTagID($V_UserID);
						$V_TagName=$o_M->F_GetTagName($V_UserID);
						$o_U->A_U['tag']=$V_TagID;
						// Add XML
						$a_XML[]='<back></back>';
						// Add XML
						$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);
						break;
					case 'clear-search':
						$o_M->F_ResetSearch($V_UserID);
						$o_M->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
						break;
					case 'similar':
						if(array_key_exists(1,$A_URLE)){
							$o_M->F_SavePreviousSearch($V_UserID);
							$o_M->F_SetSimilar($V_UserID,true,$A_URLE[1]);
							$V_TargetID=$o_M->F_GetTarget($V_UserID);}
					case 'reset-search':
						if(!$o_M->F_Similar()){$o_M->F_ResetSearch($V_UserID);}
						$o_U->A_U['tag']=0;
						// Add XML
						$a_XML[]=FF_TagSelectXML(0,'');
					default:break;
				}
			default:
				if($V_TagID>0&&$o_M->F_GetTagName($V_UserID)==''){
					$a_CT=$o_CT->F_CT($V_UserID,$V_TagID);
					$V_TagName=$a_CT['tag_name'];
					$o_M->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
				}
				// Add XML
				$a_XML[]=$o_M->F_PerformSearch($V_UserID,$V_TargetID);
				break;
			case 'rate':
				// Add XML
				if(array_key_exists(1,$A_URLE)){
					$a_XML[]=$o_M->F_Rate($V_UserID,$A_URLE[1]);
					if($V_MessagesOn){$a_XML[]=FF_Message('Message','You have rated this material.',0);}
				}break;
			case 'actor-AC':case 'artist-AC':case 'author-AC':case 'console-name-AC':case 'm-artist-AC':case 'narrator-AC':case 'writer-AC':
				// Add XML
				if(array_key_exists(1,$A_URLE)){$a_XML[]=$o_M->F_AutoComplete($V_UserID,$A_URLE[0],$A_URLE[1]);}break;}
		if(isset($o_M)){$_SESSION['materials']=serialize($o_M);}
		break;

	case 'databases':
		if($v_LAP||$o_U->A_U['area-ID']!=10){
			$o_U->A_U['area-ID']=10;
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		if(isset($_SESSION['databases'])){$o_D=unserialize($_SESSION['databases']);}else{$o_D=new Databases($V_UserID,$o_U->A_U['tag']);}
		if(!array_key_exists(0,$A_URLE)){$A_URLE[0]='reset-search';}
		$v_IP=$_SERVER['REMOTE_ADDR'];
		if(in_array($v_IP,array('75.150.196.1','75.150.196.2','75.150.196.3','75.150.196.4','75.150.196.5','75.150.196.6','75.150.196.9','75.150.196.10','75.150.196.11','75.150.196.12','75.150.196.13','75.150.196.14','75.150.196.17','75.150.196.18','75.150.196.19','75.150.196.20','75.150.196.21','75.150.196.22','75.150.211.249','75.150.211.250','75.150.211.251','75.150.211.252','75.150.211.253','75.150.211.254','70.91.251.193','70.91.251.194','70.91.251.195','70.91.251.196','70.91.251.197','70.91.251.198','75.145.130.225','75.145.130.226','75.145.130.227','75.145.130.228','75.145.130.229','75.145.130.230','75.149.222.209','75.149.222.210','75.149.222.211','75.149.222.212','75.149.222.213','75.149.222.214'))||substr($v_IP,0,5)=='10.1.'){$o_D->F_Validate($V_UserID,true);}else{$o_D->F_Validate($V_UserID,false);}
		switch($A_URLE[0]){
			case 'browse':
			case 'clear-search':case 'reset-search':
			case 'change-sort':case 'change-tag':
				$o_D->F_FirstPage($V_UserID);
			case 'next':case 'page':case 'previous':
				switch($A_URLE[0]){
					case 'change-sort':if(array_key_exists(1,$A_URLE)){$o_D->F_ChangeSearch($V_UserID,$A_URLE[0],$A_URLE[1]);}break;
					case 'change-tag':
						if(array_key_exists(1,$A_URLE)){
							$a_CT=$o_CT->F_CT($V_UserID,$A_URLE[1]);
							$V_TagID=$a_CT['tag_ID'];
							$V_TagName=$a_CT['tag_name'];
							$o_U->A_U['tag']=$V_TagID;
							$o_CT->F_PopularTag($V_TagID,$_SERVER['REMOTE_ADDR']);
							$o_D->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
							// Add XML
							$a_XML[]=FF_TagSelectXML($V_TagID,$V_TagName);}break;
					case 'next':$o_D->F_NextPage($V_UserID);break;
					case 'page':if(array_key_exists(1,$A_URLE)){$o_D->F_GoToPage($V_UserID,$A_URLE[1]);}break;
					case 'previous':$o_D->F_PreviousPage($V_UserID);break;
					case 'clear-search':
						$o_D->F_ResetSearch($V_UserID);
						$o_D->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
						break;
					case 'reset-search':
						$o_U->A_U['tag']=0;
						// Add XML
						$a_XML[]=FF_TagSelectXML(0,'');
					default:break;
				}
			default:
				if($V_TagID>0&&$o_D->F_GetTagName($V_UserID)==''){
					$a_CT=$o_CT->F_CT($V_UserID,$V_TagID);
					$V_TagName=$a_CT['tag_name'];
					$o_D->F_ChangeTag($V_UserID,$V_TagID,$V_TagName);
				}
				// Add XML
				$a_XML[]=$o_D->F_PerformSearch($V_UserID,$V_TargetID);
				break;
			case 'open-line':if(array_key_exists(1,$A_URLE)){
				// Add XML
				$a_XML[]=$o_D->F_GetOpenLine($V_UserID,$A_URLE[1]);}break;}
		if(isset($o_D)){$_SESSION['databases']=serialize($o_D);}
		break;

	case 'hours':
		if($v_LAP||$o_U->A_U['area-ID']!=8){
			$o_U->A_U['area-ID']=8;
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		if(isset($_SESSION['hours'])){$o_H=unserialize($_SESSION['hours']);}else{$o_H=new Hours($V_UserID,$o_U->A_U['library-ID']);}
		if(!array_key_exists(0,$A_URLE)){$A_URLE[0]='browse';}
		switch($A_URLE[0]){
			case 'browse':
			case 'home-library':
			case 'next':case 'page':case 'previous':
				switch($A_URLE[0]){
					case 'home-library':
						$V_TargetID=$o_H->F_GetHomeLibrary($V_UserID);
						break;
					case 'next':$o_H->F_NextPage($V_UserID);break;
					case 'page':if(array_key_exists(1,$A_URLE)){$o_H->F_GoToPage($V_UserID,$A_URLE[1]);}break;
					case 'previous':$o_H->F_PreviousPage($V_UserID);break;
					default:break;}
			default:
				// Add XML
				$a_XML[]=$o_H->F_PerformSearch($V_UserID,$V_TargetID);
				break;
			case 'home':
				// Add XML
				$a_XML[]=$o_H->F_PerformAction($V_UserID,$A_URLE[0],$V_MessagesOn);
				$o_U->A_U['library-ID']=$A_URLE[1];
				break;
		}

		if(isset($o_H)){$_SESSION['hours']=serialize($o_H);}
		break;

	case 'jobs':
		if($v_LAP||$o_U->A_U['area-ID']!=99){
			$o_U->A_U['area-ID']=99;
			// Add XML
			$a_XML[]=$o_U->F_GPI();
			// Add XML
			$a_XML[]=FF_AreaXML($o_U->A_U['area-ID']);
		}
		break;

	default:
		if(FF_PageExists($V_UserID,$V_Area)){$a_XML[]=FF_LoadPage($V_UserID,$V_Area);}
		break;
}

}
if(isset($o_LAPCAT)){$_SESSION['LAPCAT']=serialize($o_LAPCAT);}

if(!empty($a_XML)){
	if(!$V_Simple){
		$a_XML[]=$v_LogXML;
		$o_U->A_U['XML']=implode($a_XML,'<boom>');
	}
}else{
	F_URLNF();
}
if(isset($o_CT)){$_SESSION['tag']=serialize($o_CT);}
if(isset($o_U)){$_SESSION['user']=serialize($o_U);}
if($v_LAP){
	header('HTTP/1.1 200 OK');
	header('Status: 200 OK');
}else{
	if($V_JSON){header('Content-type: application/json');}
	F_HR(implode($a_XML,'<boom>'));
}
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="border-off-2 color-off">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/lapcat/css/nebula.css" />
		<link id="index-css-theme" rel="stylesheet" type="text/css" href="/lapcat/css/themes/theme-generator.php?theme=<?=$o_User->V_TS;?>" />
		<script src="/lapcat/java/get-all-tags.php" type="text/javascript"></script>
		<script defer src="/lapcat/java/pngfix.js" type="text/javascript"></script>
		<script src="http://cdn1.lapcat.org/js/jquery-1.4.1.min.js" type="text/javascript"></script>
		<!--//<script src="http://cdn1.lapcat.org/js/jquery-1.3.2.min.js" type="text/javascript"></script>//-->
		<script type="text/javascript">if(jQuery.browser.msie){document.write('<link rel="stylesheet" type="text/css" href="/lapcat/css/IE.css" />');}</script>
		<script src="/lapcat/java/combine.php"></script>
	</head>
	<body class="color-off" style="width:auto;">
		<script type="text/javascript">if(jQuery.browser.msie){window.innerWidth-16;}else{document.body.offsetWidth-20;}</script>
		<?
		//include_once $V_SR.'/lapcat/layout/layout-2009.php';
		include_once $V_ServerRoot.'/lapcat/layout/live-test-2009.php';
		flush();
		?>
	</body>
</html>