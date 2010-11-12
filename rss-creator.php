<?
header ("content-type: text/xml");

require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/no-cache.php';
function __autoload($v_CN) {require_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/objects/'.strtolower($v_CN).'.php';}
include_once $_SERVER['DOCUMENT_ROOT'].'/lapcat/code/php-functions.php';

$v_DB=db::getInstance();

$a_Data=array();
$_GET=$v_DB->Mysql_clean($_GET);
if(isset($_GET['area'])){
	$o_CT=new Tag();
	if(isset($_GET['change-tag'])){$a_CT=$o_CT->F_CT(0,$_GET['change-tag']);}
	switch($_GET['area']){
		case 'Person':
			$o_N=new News();
			$a_Data=$o_N->F_CreateRSSFeed(0,$_GET);
			$v_RSSTitle='RSS Feed for '.$_GET['username'];
			$v_RSSDescription='I am browsing news or articles by '.$_GET['username'].'.';
			$_GET['area']='News';
			break;
		case 'News':
			$o_N=new News();
			$o_N->F_ChangeTag(0,$a_CT['tag_ID'],$a_CT['tag_name']);
			$a_Data=$o_N->F_CreateRSSFeed(0,$_GET);
			$v_RSSTitle='RSS Feed for '.$_GET['area'];
			$v_RSSDescription=$o_N->F_ConstructDescription();
			break;
		case 'Events':
			$o_E=new Events();
			$o_E->F_ChangeTag(0,$a_CT['tag_ID'],$a_CT['tag_name']);
			$a_Data=$o_E->F_CreateRSSFeed(0,$_GET);
			$v_RSSTitle='RSS Feed for '.$_GET['area'];
			$v_RSSDescription=$o_E->F_ConstructDescription();
			break;
		default:
			$v_RSSTitle='RSS Feed';
			$v_RSSDescription='You are awesome!';
			break;
	}
}
echo '
<rss version="2.0">
  <channel>
    <title>'.$v_RSSTitle.'</title>
    <link>http://www.lapcat.org</link>
    <description>'.$v_RSSDescription.'</description>
    <language>en-us</language>
    <pubDate>'.date(DATE_RSS).'</pubDate>
    <ttl>5</ttl>
';
foreach($a_Data as $v_Key=>$a_Record){
	echo '
    	<item>
	      <title>'.$a_Record['name'].'</title>
    	  <link>http://www.lapcat.org/'.$_GET['area'].'/browse/'.$a_Record['ID'].'</link>
	      <description><![CDATA['.substr($a_Record['text'],0,200).'...]]></description>
    	  <pubDate>'.date(DATE_RSS,strtotime($a_Record['entered_on'])).'</pubDate>
	    </item>
   	';
}
echo '
  </channel>
</rss>';
?>