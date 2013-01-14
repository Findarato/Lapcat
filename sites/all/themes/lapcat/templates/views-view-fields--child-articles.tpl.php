<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates

 
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
 * 
 * 
 * 
<?php print $fields["picture"]->content ?>
<?php print $fields["created"]->content ?>
<?php print $fields["name"]->content ?>
<?php print $fields["body"]->content ?>
<?php print $fields["field_tags"]->content ?>
 *  */

?>
<style>
.articleItem{
  width:100%;
  padding:3px;
}
.articleItem div{
  width: 100%;
}

</style>



    <div style="display:table">
      <article class="articleItem" style="display:table-cell">
        <div>
          <div>
            <div style="height:30px;width:30px;" class="td">
              <?php print $fields["picture"]->content ?>
            </div>
            <div " class="td">
              <div class="articleEntryTitle">
                <?php print $fields["title"]->content ?>
              </div>
              <div class="articleEntryAuthor">
                <span>By <?php print $fields["name"]->content ?> on <?php print $fields["created"]->content ?></span>
              </div>  
            </div>
            
          </div>
          <div class="articleEntryDescription">
            <?php print $fields["body"]->content ?>
            
          </div>
          <?php print $fields["field_tags"]->content ?>
        </div>
      </article>
      <div id="socialMediaContainer" style="width:50px;right:5px;top:5px;display:table-cell">
        <div >
          <div data-href="<?php print $fields["path"]->content ?>?spref=gp" data-size="small" class="g-plusone"></div>
        </div>
        <div>
          <div class="fb-like" data-href="<?php print $fields["path"]->content ?>?spref=fb" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
        </div>
      </div>
    </div>


