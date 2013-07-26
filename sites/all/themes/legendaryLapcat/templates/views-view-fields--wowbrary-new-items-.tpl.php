<?Php
  $linkArray = array();
  $jsonString = strip_tags(urldecode($fields["field_wowbrary_link"]->content));
  $linkArray = json_decode($jsonString,true);
  if($linkArray["i"]=="")
    if($linkArray["u"]=="")
      $isbn = $linkArray["i"];
    else
      $isbn = $linkArray["u"];
  else
    $isbn = $linkArray["i"];
//  print "itemRecord:".$linkArray["c"];
//  print "Isbn:".$linkArray["i"];
//  print "SN:".$linkArray["u"];
$catalogLink = "http://catalog.lapcat.org/record=b".$linkArray["c"];
$wowbraryClickThough = "http://www.wowbrary.org/l.aspx?l=8711&c=".$linkArray["c"]."&i=".$linkArray["i"]."&u=".$linkArray["u"]."&t=".$linkArray["t"]."&website";
?>
<div class="span4">
  <div class="mask2"> <a class="bookHeader" href="http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=<?php print $isbn; ?>&size=L" rel="prettyPhoto" style="background-image:url(http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=<?php print $isbn; ?>&size=L)"></a></div>
  <div class="inside">
    <hgroup>
      <h2><?php print $fields["title"]->content; ?></h2>
    </hgroup>
    <div class="entry-content">
      <?php print $fields["field_description"]->content; ?>
      <a class="more-link" href="<?php print $catalogLink; ?>">view in catalog</a> </div>
  </div>
  <!-- /.inside -->
</div>
          

<!--
  
  <div class="socialMediaContainer" id="socialMediaContainer">
          <div style="position: relative;">
            <span class="tagStyle">Share</span>
            <ul class="socialLinks" data-url="http://laportelibrary.org" data-counts="true" data-share-text="Google is a search engine" style="">
              <li class="facebook "><a class="icon-facebookalt" href="https://www.facebook.com/sharer/sharer.php?u=<?php print $catalogLink; ?>" title="Share on Facebook"></a></li>
              <li class="twitter "><a class="icon-twitter" href="https://twitter.com/intent/tweet?text=<?php print $catalogLink;?>" title="Share on Twitter"></a></li>
              <li class="googleplus"><a class="icon-googleplus" href="https://plus.google.com/share?url=<?php print $catalogLink; ?>" title="Share on Google Plus"></a></li>
            </ul>  
          </div>
        </div>
  -->