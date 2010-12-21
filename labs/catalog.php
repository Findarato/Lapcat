<?php
  /***
   * An atempt to enable a facebook like button on each of the catalog records.   
   * paramaters item=ISBN
   */
  include_once("db.php");  
  include ("marc_parse.php");
  $db = db::getInstance();
  $_GET = $db->Clean($_GET);
  $marc = parseMarc($_GET["item"]);
 // print_r(parseMarc($_GET["item"]));
?>

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title><?=$marc["title"];?></title>
    <meta property="og:title" content="<?=$marc["title"];?>"/>
    <? //<meta property="og:type" content="movie"/> ?>
    <meta property="og:url" content="http://catalog.lapcat.org/search~S12?/i<?=$marc["numbers"][0];?>/"/>
    <meta property="og:image" content="http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn=<?=$marc["numbers"][0];?>&size=S"/>
    <meta property="og:site_name" content="LAPCAT Catalog"/>
<?/*
    <meta property="og:description"
          content="A group of U.S. Marines, under command of
                   a renegade general, take over Alcatraz and
                   threaten San Francisco Bay with biological
                   weapons."/>*/?>
  </head>
</html>