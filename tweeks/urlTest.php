<?Php
  $linkArray = array();
  $url = "http://www.wowbrary.org/l.aspx?l=8711&c=1374261&i=9781602858299&u=&t=The%20Other%20Family%20%28Premier%20Fiction%20Series%29&rss";
  //$jsonString = strip_tags(urldecode($fields["field_catalogLink"]->content));
  $jsonString = strip_tags(urldecode($url));
  

  $url = $jsonString;
  $ret_ar = array();
  if (($pos = strpos($url, '?')) !== false)
    $url = substr($url, $pos + 1);
  if (substr($url, 0, 1) == '&')
    $url = substr($url, 1);
  $elems_ar = explode('&', $url);
  for ($i = 0; $i < count($elems_ar); $i++) {
    list($key, $val) = explode('=', $elems_ar[$i]);
    $ret_ar[urldecode($key)] = urldecode($val);
  }

  $linkArray = $ret_ar;
  
  if($linkArray["i"]=="")
    if($linkArray["u"]=="")
      $isbn = $linkArray["i"];
    else
      $isbn = $linkArray["u"];
  else
    $isbn = $linkArray["i"];

  $wowbraryClickThough = $linkArray;
print_r($wowbraryClickThough);

//$catalogLink = "http://catalog.lapcat.org/record=b".$linkArray["c"];
//$wowbraryClickThough = "http://www.wowbrary.org/l.aspx?l=8711&c=".$linkArray["c"]."&i=".$linkArray["i"]."&u=".$linkArray["u"]."&t=".$linkArray["t"]."&website";
?>
      <article class="articleItem">
        <div class="t">
          <div class="bookCoverImage td">
            <a style="margin-right:10px;display:inline-block;" href="<?Php print $wowbraryClickThough; ?>" title="View Catalog record">
              <img alt="coverImage" height=120 width=80 style="border:none;" src="<?Php print $fields["field_book_cover_image_link"]->content;?>">
            </a>
          </div>
          <div class="td">
            <div class="articleEntryTitle">
              <a style="margin-right:10px;display:inline-block;" href="<?Php print $wowbraryClickThough; ?>" title="View Catalog record">
              <?Php print $fields["title"]->content; ?>
              </a>
            </div>
            <div >
              <?Php print $fields["body"]->content; ?>
              <br>
            </div>  
          </div>
        </div>
        <div class="socialMediaContainer" id="socialMediaContainer">
          <div style="position: relative;">
            <span class="tagStyle">Share</span>
            <ul class="socialLinks" data-url="http://laportelibrary.org" data-counts="true" data-share-text="Google is a search engine" style="">
              <li class="facebook "><a class="icon-facebookalt" href="https://www.facebook.com/sharer/sharer.Php?u=<?Php print $catalogLink; ?>" title="Share on Facebook"></a></li>
              <li class="twitter "><a class="icon-twitter" href="https://twitter.com/intent/tweet?text=<?Php print $catalogLink;?>" title="Share on Twitter"></a></li>
              <li class="googleplus"><a class="icon-googleplus" href="https://plus.google.com/share?url=<?Php print $catalogLink; ?>" title="Share on Google Plus"></a></li>
            </ul>  
          </div>
        </div>
      </article>