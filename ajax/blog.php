<?php
date_default_timezone_set( 'America/Chicago' );
include "simplepie.php";
$feed = new SimplePie();

$feed -> set_feed_url('http://laportelibrary.blogspot.com/feeds/posts/default');
$feed -> set_item_limit(1);
$feed -> enable_cache(false);
$feed -> init();
$feed -> handle_content_type();
$b = array();
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
/*  
?>

<article class="blogItem">
  <div>
    <div class="blogEntryTitle">
      <a href="<?=$item->get_link();?>" target="_blank"><?=$item->get_title();?></a>
    </div>
    <div class="blogEntryAuthor">
      <span>By <img src="http://img2.blogblog.com/img/b16-rounded.gif"><a href="<?=$tempAuthor[0]->get_link();?>"><?=$tempAuthor[0]->get_name();?></a> <?=$item -> get_date();?> </span>
    </div>
    <div class="blogEntryDescription">
      <?=$item -> get_content();?>      
    </div>
    <div id="socialMediaContainer">
      <div data-href="<?=$item->get_link();?>" data-size="small" class="g-plusone" id="plusOneDiv0"></div>
      <div class="fb-like" data-href="<?=$item->get_link();?>" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-font="arial"></div>
    </div>
  </div>
</article>


<? */ } 

//$smarty->assign("blog",$b);

print_r($b);
?>