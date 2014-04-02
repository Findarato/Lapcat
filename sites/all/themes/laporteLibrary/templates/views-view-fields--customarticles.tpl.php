<article class="articleItem">
  <div style="width:100%;">
    <div class="t">
      <div class="td" style="height:30px;width:30px;padding:5px;"><?php print $fields["picture"]->content ?></div>
      <div class="td" style="width:100%;">
        <div class="articleEntryTitle" style="width:100%;"><?php print $fields["title"]->content ?></div>
        <div class="articleEntryAuthor">
          By <?php print $fields["name"]->content ?> on <?php print $fields["created"]->content ?>
        </div>  
      </div>
    </div>
    <div class="articleEntryDescription">
      <?php print $fields["body"]->content ?>
    </div>
    <?php print $fields["field_tags"]->content ?>
    <div class="joeiscool" style="height:100px;width:100px;overflow:hidden;">
      <?php print $fields["field_image"]->content ?>
    </div>
</article>
