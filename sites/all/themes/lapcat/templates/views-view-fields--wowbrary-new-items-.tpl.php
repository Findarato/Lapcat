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
      <article class="articleItem">
        <div class="t">
          <div class="bookCoverImage td">
            <a style="margin-right:10px;display:inline-block;" href="<?php print $wowbraryClickThough; ?>" title="View Catalog record">
              <img alt="coverImage" height=120 width=80 style="border:none;" src="http://cdn.laportelibrary.org/coverCache/imageFetch.php?isbn=<?php print $isbn; ?>&size=S">
            </a>
          </div>
          <div class="td">
            <div class="articleEntryTitle">
              <a style="margin-right:10px;display:inline-block;" href="<?php print $wowbraryClickThough; ?>" title="View Catalog record">
              <?php print $fields["title"]->content; ?>
              </a>
            </div>
            <div >
              <?php print $fields["field_description"]->content; ?>
              <br>
            </div>  
          </div>
        </div>
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
      </article>    
    