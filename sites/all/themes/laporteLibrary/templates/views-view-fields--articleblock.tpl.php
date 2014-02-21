<article class="articlePicture">
  <div>
    <div>
      <?php print $fields["field_tags"]->content ?>
      <?php /*print $id*/ ?>
      <div class="picture">
        <?php print $fields["field_image"]->content ?>
      </div>
      <div class="title" style="width:100%;"><?php print $fields["title"]->content ?></div>
    </div>
    <div class="articleEntryDescription">
      <?php print $fields["body"]->content ?>
    </div>
</article>