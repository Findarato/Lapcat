<?
require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
SESSION_START();
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/php-functions.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/aval.php';

$A_URL=array_splice(explode('/',strtolower($_SERVER['REQUEST_URI'])),0,6);
$V_SpecificArea=$A_URL[1];
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
$v_page = "blank.tpl";
$V_Buffer = 1;
$V_UrlString = join("/",$A_URL);
$V_Static = false;
$V_search = "";
if(isset($_SESSION["A_status"])){
	$A_status = unserialize($_SESSION["A_status"]);	
}else{
	$A_status = array();
	$_SESSION["A_status"] = serialize($A_status);
}

define('SMARTY_DIR', '/www/smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/lapcat/templates/templates';
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/lapcat/templates/templates_c';
$smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/lapcat/templates/cache';
$smarty->config_dir = $_SERVER['DOCUMENT_ROOT'].'/lapcat/templates/configs';

if(isset($_SESSION['user'])){$o_User=unserialize($_SESSION['user']);}else{$o_User=new User();}
if(isset($_SESSION['LAPCAT'])){$o_LAPCAT=unserialize($_SESSION['LAPCAT']);}else{$o_LAPCAT=new LAPCAT($V_UserID,$_SERVER['REMOTE_ADDR'],$V_MessagesOn);}

if($A_URL[0]==''){
	$V_Area='home';
}else{
	foreach($A_URL as $v_Key=>$v_Text){
		switch($v_Key){
			case 0:
				if($v_Text=='quick'||$v_Text=='fresh'){$V_Clear=$v_Text;$V_Fresh=false;}
				switch(strtolower($v_Text)){
					case "new":
						//Start of server layout code
						$V_Static = true;
						$smarty->Assign("currentUrl",$V_UrlString);
						$idKey=$V_Buffer+1;
						if(isset($A_URL[$V_Buffer])){
							switch(strtolower($A_URL[$V_Buffer])){
								default:
								case "news": 
									$v_page = "news";
								break;
								case "databases":
									$v_page = "databases";
								break;
							}
						}else{
							$v_page = "news";
						}
						if(isset($A_URL[$idKey])){
							if(isset($A_URL[$idKey+1])){
								$A_status[$A_URL[$idKey]] = $A_URL[$idKey+1];
								$_SESSION["A_status"] = serialize($A_status);
								foreach ($A_status as $key=>$value){	$V_search .= $key."=".$value.",";	} //lets build the search.  Going to need a way to clear them from the search too
								echo $V_search;
								$V_JSON=$o_LAPCAT->f_PerformRequest("quick",$v_page,"search",$V_search,"",false);
							}else{
								$V_JSON=$o_LAPCAT->f_PerformRequest("quick",$v_page,"suggest","","",false);		
							}
						}else{$V_JSON=$o_LAPCAT->f_PerformRequest("quick",$v_page,"suggest","","",false);} //A basic search must happen
						
						
						if(isset($V_JSON["data"])){
							foreach ($V_JSON["data"] as $key=>$value){//loop though the items to work with them
								foreach ($value as $k=>$v){ //fix the values to work better with smarty
									if(!is_array($v)){
										$V_JSON["data"][$key][str_replace("-","_",$k)] = $v;
									}
								}
								//This works only for the article search
								if(isset($A_URL[$idKey]) && $A_URL[$idKey]!="tag"&& $A_URL[$idKey]!="user"&& $A_URL[$idKey]!="date"){
									if($value["ID"]==$A_URL[$idKey]){
										$smarty -> assign("V_openLineData",$V_JSON["data"][$key]);
									}
								}else{//we need to make sure something is always shown
									$smarty -> assign("V_openLineData",$V_JSON["data"][0]);
								}
							}
						}
						//End of server layout code
					break;
				}
			break;
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


// V_Area, V_Command, V_Main, V_Secondary
$a_Share['name']='www.lapcat.org';
$a_Share['text']='LAPCAT';
if(!$V_Fresh){
	switch($V_Area){
		case 'get-anticipated-events':$V_JSON=$o_LAPCAT->f_GetAnticipatedEvents();break;
		case 'log-out':$V_JSON=$o_User->f_LogUserOut();break;
		case 'status':$V_JSON=$o_User->f_GetLoggedInStatus();break;
		case 'promotions':$V_JSON=$o_LAPCAT->f_GetPromotions();break;
		case 'request-calendar':$V_JSON=$o_LAPCAT->f_GetCalendarData($o_LAPCAT->f_GetCurrentDate());break;
		case 'popular-tags':$V_JSON=$o_LAPCAT->f_GetPopularTags();break;

		case 'home':case 'databases':case 'events':case 'materials':case 'news':case 'hours':case 'hiring':
			switch($V_Command){
				case 'specific':
					$V_Command='change-specific';
				case 'collect':case 'favorite':case 'watched':case 'watchlist':
				case 'search':case 'suggest':
				case 'change-date':case 'change-popular':case 'change-search':case 'change-sort':case 'change-tag':case 'change-type':
				case 'change-page':
				case 'open-line':
				case 'reset':
					$V_JSON=$o_LAPCAT->f_PerformRequest($V_Clear,$V_Area,$V_Command,$V_Main,$V_Secondary,true);
					break;
				default:
					
					break;
			}
			break;
		default:break;
	}
}else{
	if($V_Area=='specific'){
		$v_DC=db::getInstance();
		$v_Select='';
		switch($V_SpecificArea){
			case 'news':$v_Select='name AS `name`, text AS `text`';break;
			default:case 'events':$v_Select='name AS `name`, description AS `text`';break;
		}
		$v_DC->Query('SELECT '.$v_Select.' FROM viewable_'.$V_SpecificArea.' WHERE ID='.$V_Command.';');
		$a_Share=$v_DC->Format('assoc');
		$a_Share['text']=strip_tags($a_Share['text']);
		$o_LAPCAT->v_SpecificName=$a_Share['name'];
	}
	$o_LAPCAT->f_ResetAllSearches();
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

//Debug
//print_r($A_status);
//Debug
?>
<!DOCTYPE html> 
<html>
	<head>
		<title><?=$a_Share['name'];?></title>
		<meta name="description" content="<?=strip_tags($a_Share['text']);?>"/>
		<meta http-equiv="X-UA-Compatible" content="IE=100" >
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/lapcat/css/nebula.css" />
		<link id="index-css-theme" rel="stylesheet" type="text/css" href="/lapcat/css/themes/theme-generator.php?theme=<?=$o_User->a_User['theme'];?>" />
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-8067208-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
		
		
		<? if(!$V_Static){ ?>
		<script type="text/javascript">
			var V_Date=new Date();
			var V_TimeStamp=V_Date.getTime();
		</script>
		<script src="/lapcat/java/get-all-tags.php" type="text/javascript"></script>
		<script src="/lapcat/java/get-all-content-providers.php" type="text/javascript"></script>
		<script defer src="/lapcat/java/pngfix.js" type="text/javascript"></script>
		<script src="http://cdn1.lapcat.org/js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script type="text/javascript">if(jQuery.browser.msie){document.write('<link rel="stylesheet" type="text/css" href="/lapcat/css/IE.css" />');}</script>
		<script src="/lapcat/java/combine.php"></script>
		<script type="text/javascript">if(jQuery.browser.msie){window.innerWidth-16;}else{document.body.offsetWidth-20;}</script>
		<?} ?>
	</head>
	<body class="color-X-1" style="height:100%; width:100%;">
		
		<?
		if($v_page =="news" || $v_page =="databases"){
			$smarty -> assign("area","new/".$v_page);
			$smarty -> assign("V_displayData",$V_JSON["data"]);
			$smarty -> assign('content',"news_display.tpl");	
		}else{$smarty -> assign('content',$v_page);}
		
		$smarty -> display('body.tpl');
		include_once $V_ServerRoot.'/lapcat/layout/live-test-2009.php';
		flush();
		?>
	</body>
</html>