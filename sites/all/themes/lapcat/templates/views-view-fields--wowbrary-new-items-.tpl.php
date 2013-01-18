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

$wowbraryClickThough = "http://www.wowbrary.org/l.aspx?l=8711&c=".$linkArray["c"]."&i=".$linkArray["i"]."&u=".$linkArray["u"]."&t=".$linkArray["t"]."&website";
?>

    
      <article class="articleItem">
        <div class="t">
          <div class="bookCoverImage td">
            <a style="margin-right:10px;display:inline-block;" href="<?php print $wowbraryClickThough; ?>" title="View Catalog record">
              <img alt="coverImage" style="border:none;" src="http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn=<?php print $isbn; ?>&size=S">
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
          <ul class="socialLinks webSymbols" data-url="http://laportelibrary.org" data-counts="true" data-share-text="Google is a search engine">
            <li class="facebook "><a href="https://www.facebook.com/sharer/sharer.php?u=http://catalog.lapcat.org/record=b<?Php print $linkArray["c"];?>" title="Share on Facebook">f</a></li>
            <li class="twitter "><a href="https://twitter.com/intent/tweet?text=http://catalog.lapcat.org/record=b<?Php print $linkArray["c"];?>" title="Share on Twitter">t</a></li>
            <li class="googleplus"><a href="https://plus.google.com/share?url=http://catalog.lapcat.org/record=b<?Php print $linkArray["c"];?>" title="Share on Google Plus">g</a></li>
          </ul>
        </div>
      </article>    
    