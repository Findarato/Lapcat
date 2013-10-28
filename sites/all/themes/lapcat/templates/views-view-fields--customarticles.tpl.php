<article class="articleItem">
  <div style="width:100%;">
    <div class="t">
      <div class="td" style="height:30px;width:30px;padding:5px;"><?php print $fields["picture"]->content ?></div>
      <div class="td" style="width:100%;">
        <div class="articleEntryTitle" style="width:100%;"><?php print $fields["title"]->content ?></div>
        <div class="articleEntryAuthor" style="width:100%;">
          <span>By <?php print $fields["name"]->content ?> on <?php print $fields["created"]->content ?></span>
        </div>  
      </div>
    </div>
    <div class="articleEntryDescription">
      <?php print $fields["body"]->content ?>
        <div class="socialMediaContainer" id="socialMediaContainer">
          <ul class="socialLinks" data-url="http://laportelibrary.org" data-counts="true" data-share-text="Google is a search engine" style="">
            <li class="facebook "><a class="icon-facebookalt" href="https://www.facebook.com/sharer/sharer.Php?u=<?Php print $catalogLink; ?>" title="Share on Facebook"></a></li>
            <li class="twitter "><a class="icon-twitter" href="https://twitter.com/intent/tweet?text=<?Php print $catalogLink;?>" title="Share on Twitter"></a></li>
            <li class="googleplus"><a class="icon-googleplus" href="https://plus.google.com/share?url=<?Php print $catalogLink; ?>" title="Share on Google Plus"></a></li>
          </ul>  
        </div>    
    </div>
    <?php print $fields["field_tags"]->content ?>

</article>
