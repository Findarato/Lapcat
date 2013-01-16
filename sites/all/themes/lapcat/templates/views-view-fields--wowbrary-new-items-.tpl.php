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

    <div class="t">
      <article class="articleItem" class="td">
        <div>
          <div>
            <div class="bookCoverImage td">
              <a style="margin-right:10px;display:inline-block;" href="<?php print $wowbraryClickThough; ?>" title="View Catalog record">
                <img alt="coverImage" style="border:none;" src="http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn=<?php print $isbn; ?>&size=S">
              </a>
            </div>
            <div " class="td">
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
        </div>
      </article>
      <!--
      <div class="td" id="socialMediaContainer" style="width:50px;right:5px;top:5px;opacity:0">
        <div >
          <div data-href="http://catalog.lapcat.org/record=b<?Php print $linkArray["c"];?>?spref=gp" data-size="small" class="g-plusone"></div>
        </div>
        <div>
          <div class="fb-like" data-href="http://catalog.lapcat.org/record=b<?Php print $linkArray["c"];?>?spref=fb" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
        </div>
      </div>
      -->
    </div>