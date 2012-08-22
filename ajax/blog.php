<?php
date_default_timezone_set( 'America/Chicago' );
include "simplepie.php";
$feed = new SimplePie();

$feed -> set_feed_url('http://laportelibrary.blogspot.com/feeds/posts/default');
$feed -> set_item_limit(10);
$feed -> enable_cache(false);
$feed -> init();
$feed -> handle_content_type();
$b = array();
$count = 0;
foreach($feed->get_items(0,0) as $item) {
  if($count=1) break;
$categories = $item -> get_categories();
  foreach($categories as $cate){
    $b[$count]["cate"][] = $cate ->get_term();
  }
  if(!in_array("teen",$b[$count]["cate"])){
    $b[$count]["contents"] = $item -> get_content();
    $b[$count]["link"] = $item -> get_link();
    $b[$count]["title"] = $item -> get_title();
    $b[$count]["date"] = $item->get_date($date_format = 'j F Y, g:i a');
    $tempAuthor = $item->get_authors();
    $b[$count]["author"]["name"] = $tempAuthor[0]->get_name();
    $b[$count]["author"]["link"] = $tempAuthor[0]->get_link();  
  }
  $count++;
}
print_r($b);
?>