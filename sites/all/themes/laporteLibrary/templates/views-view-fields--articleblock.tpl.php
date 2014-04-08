<article class="articlePicture">
  <div>
    <div>
      <?php print $fields["field_tags"]->content ?>
      <div class="picture">
        <?Php  print $fields["field_image"]->content ?>
      </div>
      <div class="title" style="width:100%;"><?php print $fields["title"]->content ?></div>
    </div>
    <div class="articleEntryDescription">
      <?php if(isset($fields["body"]))print $fields["body"]->content; ?>
    </div>
</article>