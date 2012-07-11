<?Php
include "smarty.inc.php";
date_default_timezone_set('America/Chicago');
include "ajax/simplepie.php";
$feed = new SimplePie();

$feed -> set_feed_url('http://laportelibrary.blogspot.com/feeds/posts/default');
$feed -> set_item_limit(1);
$feed -> enable_cache(false);
$feed -> init();
$feed -> handle_content_type();
$count = 0;
foreach($feed->get_items(0,1) as $item) {
  $b[$count]["contents"] = $item -> get_content();
  $b[$count]["link"] = $item -> get_link();
  $b[$count]["title"] = $item -> get_title();
  $b[$count]["date"] = $item->get_date($date_format = 'j F Y, g:i a');
  $tempAuthor = $item->get_authors();
  $b[$count]["author"]["name"] = $tempAuthor[0]->get_name();
  $b[$count]["author"]["link"] = $tempAuthor[0]->get_link();
  $count++;
}

$smarty -> assign("blog" , $b);
$smarty -> display('pages/index.tpl');
?>