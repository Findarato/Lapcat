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
        list($key, $val) = explode('=', $elems_ar[$i]);
        $ret_ar[urldecode($key)] = urldecode($val);
      }
    }
   //$returnVal = json_encode($ret_ar);
   $returnVal = $ret_ar;
  return $returnVal;  
}
$c="TEE";//Default value to get 
if(isset($_GET["c"])){
  $c=$_GET["c"];
}
date_default_timezone_set('America/Chicago');
include "simplepie.php";
$feed = new SimplePie();

$feed -> set_feed_url('http://dev.lapcat.org/tweeks/wowbrarySlider.php?c='.$c);
$feed -> enable_cache(false);
$feed -> init();
$feed->handle_content_type('text/plain');
$count = 0;

//$item = $feed->get_item(0);
//print_r($item);
//print_r($item->get_item_tags('http://catalog.lapcat.org/book', 'book'));
foreach($feed->get_items(0) as $item) {
  //print_r($item->get_item_tags('http://catalog.lapcat.org/books', 'image')); 
  if($value = $item->get_item_tags('http://catalog.lapcat.org/books', 'image')){
    echo $value[0]["data"]."\n"; 
  }
}
