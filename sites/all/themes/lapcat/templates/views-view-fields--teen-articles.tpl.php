<article class="articleItem">
  <div style="width:100%;">
    <div class="t">
      <div class="td" style="height:30px;width:30px;padding:5px;">
        <?php print $fields["picture"]->content ?>
      </div>
      <div class="td" style="width:100%;">
        <div class="articleEntryTitle" style="width:100%;">
          <?php print $fields["title"]->content ?>
        </div>
        <div class="articleEntryAuthor" style="width:100%;">
          <span>By <?php print $fields["name"]->content ?> on <?php print $fields["created"]->content ?></span>
        </div>  
      </div>
      
    </div>
    <div class="articleEntryDescription">
      <?php print $fields["body"]->content ?>
    </div>
    <?php print $fields["field_tags"]->content ?>
  </div>
  <div class="socialMediaContainer" id="socialMediaContainer">
    <ul class="socialLinks webSymbols" data-url="<?php print $fields["path"]->content ?>">
      <li class="facebook "><a href="https://www.facebook.com/sharer/sharer.php?u=<?php print $fields["path"]->content ?>" title="Share on Facebook">f</a></li>
      <li class="twitter "><a href="https://twitter.com/intent/tweet?text=<?php print $fields["path"]->content ?>" title="Share on Twitter">k</a></li>
      <li class="googleplus"><a href="https://plus.google.com/share?url=<?php print $fields["path"]->content ?>" title="Share on Google Plus">g</a></li>
    </ul>
  </div>
</article>