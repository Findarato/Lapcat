<?Php
  header("Content-Type: text/xml");                      // Set the content type appropriately
  '<?xml version="1.0" encoding="UTF-8"?>';
  $c="TEE";//Default value to get 
  if(isset($_GET["c"])){
    $c=$_GET["c"];
  }else{
    $c=FALSE;
  }
  $base64Test = false;
?>
<rss xmlns:book="http://catalog.lapcat.org/books" version="2.0"><channel><title>Parsed Wowbrary items to make sence</title><link>http://www.wowbrary.org/nu.aspx?p=8711--<?Php print $c;?></link><description>This feed shows you each week's teen books in the La Porte County Public Library</description><copyright>(c) 2013, Wowbrary. All rights reserved.</copyright><ttl>0</ttl><image><title>Wowbrary: Latest Teen Books in the La Porte County Public Library</title><url>http://www.wowbrary.org/images/wowlogob.gif</url><link>http://www.wowbrary.org/nu.aspx?p=8711--<?Php print $c;?></link><width>154</width><height>57</height><description>Click here to provide feedback and ask questions about this RSS feed</description></image>
<?Php 
//http://www.wowbrary.org/rss.aspx?l=8711&c=TEE


function wowbraryUrlParse($field){
  $url =$field;
    $ret_ar = array();
    if (($pos = strpos($url, '?')) !== false)
      $url = substr($url, $pos + 1);
    if (substr($url, 0, 1) == '&')
      $url = substr($url, 1);
    $elems_ar = explode('&', $url);
    for ($i = 0; $i < count($elems_ar); $i++) {
      if(isset($elems_ar[$i])){
        @list($key, $val) = explode('=', $elems_ar[$i]);
        $ret_ar[urldecode($key)] = urldecode($val);
      }
    }
   //$returnVal = json_encode($ret_ar);
   $returnVal = $ret_ar;
  return $returnVal;  
}

date_default_timezone_set('America/Chicago');
include "simplepie.php";
$feed = new SimplePie();
if($c){
  $feed -> set_feed_url('http://www.wowbrary.org/rss.aspx?l=8711&c='.$c);  
}else{
  $feed -> set_feed_url('http://www.wowbrary.org/rss.aspx?l=8711');
}

$feed -> enable_cache(false); 
$feed -> init();
$feed -> handle_content_type();
$count = 0;
foreach($feed->get_items(0) as $item) {
  //the right set
  $parsedLink = wowbraryUrlParse($item -> get_link());
  $b[$count]["book:sn"] = $parsedLink["amp;i"];

    $b[$count]["title"] = $item -> get_title();
    $b[$count]["description"] = str_replace(array("&rsquo;","&mdash;","&ldquo;","&rdquo;","&"),array("'","-",'"','"',"&amp;"),html_entity_decode(strip_tags($item -> get_description())));
    $b[$count]["link"] = $item -> get_link();
    $b[$count]["book:itemRecord"] = $parsedLink["amp;c"];
  
  
    //Place your own cover image solution here
    $b[$count]["book:image"] = urlencode("http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=".$b[$count]["book:sn"]."&size=S");
    $b[$count]["book:images"] = urlencode("http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=".$b[$count]["book:sn"]."&size=S");
    $b[$count]["book:imagel"] = urlencode("http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=".$b[$count]["book:sn"]."&size=L");
    $b[$count]["book:imagem"] = urlencode("http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=".$b[$count]["book:sn"]."&size=M");
    $b[$count]["category"] = $item->get_category();
    $b[$count]["pubdate"] = $item->get_date();
       

  $count++; 
 
}
foreach($b as $item){
  echo "<item>";
    foreach($item as $k=>$i){
      echo "<".$k.">".$i."</".$k.">";
    }
  echo "</item>";
}
?>
</channel></rss>