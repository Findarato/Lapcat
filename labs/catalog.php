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
  if(strlen($marc["subTitle"])>1){
    $marc["subTitle"] = " : ".$marc["subTitle"];
  }else{$marc["subTitle"] = "";}
  
 if(count($marc["numbers"])==1){
   $numbers = $marc["numbers"];
 }else{$numbers = $marc["numbers"][0];}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title><?=$marc["title"];?></title>
    <meta property="og:title" content="<?=$marc["title"];?><?=$marc["subTitle"];?>"/>
    <meta property="og:url" content="http://www.lapcat.org/labs/catalog.php?item=<?=$numbers;?>&redirect=1&fb"/>
    <meta property="og:image" content="http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn=<?=$numbers;?>&size=S"/>
    <meta property="og:site_name" content="LAPCAT Catalog"/>
    <meta property="fb:admins" content="joseph.harry"/>
    <meta property="og:description" content="<?=$marc["description"];?>"/>
  </head>
  <body style="height:100px;width:200px;">
  <?php
  if(isset($_GET["redirect"]) && $_GET["redirect"]==1){
    ?>
    <script>window.location="http://catalog.lapcat.org/search/i<?=$numbers;?>";</script>
  <?}else{
    ?>
    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <script>
      FB.init({
        appId  : '174063745959859',
        status : true, // check login status
        cookie : true, // enable cookies to allow the server to access the session
        xfbml  : true  // parse XFBML
      });
    </script>
  <div id="fb-root"></div>    
  <fb:like href="http://www.lapcat.org/labs/catalog.php?item=<?=$numbers;?>" show_faces="true" width="450"></fb:like>
  <?}?>  
  </body>
</html>