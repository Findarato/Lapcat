<?Php
  header("Content-Type: text/xml");                      // Set the content type appropriately
  '<?xml version="1.0" encoding="UTF-8"?>';
  $id="179214365429882";//Default value to get 
  if(isset($_GET["id"])){
    $id=$_GET["id"];
  }else{
    $id=FALSE;
  }
 $url = "https://www.facebook.com/feeds/page.php?id=".$id."&format=json";
 $rss = array();
function getHTTPS($url){
  $browsers = array("Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.3) Gecko/2008092510 Ubuntu/8.04 (hardy) Firefox/3.0.3", "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1) Gecko/20060918 Firefox/2.0", "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3", "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.0.04506)");
  $referers = array("google.com", "yahoo.com", "msn.com", "ask.com", "live.com");
  $choice2 = array_rand($browsers);
  $agent = $browsers[$choice2];
  $choice = array_rand($referers);
  $referer = "http://" . $referers[$choice] . "";
  
  $curl = curl_init($url); 
  curl_setopt($curl, CURLOPT_USERAGENT, $agent);
  curl_setopt($curl, CURLOPT_REFERER, $referer);
  curl_setopt($curl, CURLOPT_VERBOSE, true);
  curl_setopt($curl, CURLOPT_FAILONERROR, true); 
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   
  $result = curl_exec($curl);
  return $result;

}

$items = json_decode(getHTTPS($url));
//print_r($items);  
?>
<rss xmlns:book="http://catalog.lapcat.org/books" version="2.0">
  <channel>
    <title><? print $items->title; ?></title>
    <link><? print urlencode($items->self); ?></link>
    <description>This feed shows you the La Porte County Public Library</description>
    <copyright>(c) 2013 La Porte County Public Library</copyright>
    <ttl>0</ttl>
<?Php 
//http://www.wowbrary.org/rss.aspx?l=8711&c=TEE



date_default_timezone_set('America/Chicago');

foreach ($items->entries as $key => $value) {
	$rss[$key]["title"] = $value->title;
  //$rss[$key]["description"] = $value->content;
  $rss[$key]["link"] = urlencode($value->alternate);
  $rss[$key]["category"] = urlencode(join(",",$item->categories));
  $rss[$key]["pubdate"] = $value->published;
}
foreach($rss as $item){
  echo "<item>";
  foreach($item as $k=>$i){
    echo "<".$k.">".$i."</".$k.">";
  }
  echo "</item>";
}
?>
</channel></rss>