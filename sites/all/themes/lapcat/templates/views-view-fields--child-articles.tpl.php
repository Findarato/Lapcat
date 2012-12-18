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
  .articleBox,.articleContainerBox,.containerBox,.bookBox{
  position:relative;
  background:#FFF;
  min-height:100px;
}
.articleContainerBox li{
  display:block;
}
.articleEntryDescription a{
  white-space:nowrap;
}
.articleEntryDescription iframe{
  display:none;
}
.articleEntryDescription a[href*="catalog.lapcat.org"]:after,.rssDescription a[href*="catalog.lapcat.org"]:after{
  font-size:10px;
  content:"";
  font-family: 'IconicFill';
}
.articleEntryDescription .noAfterImage:after {content:""}

.articleContainerBox,.deliciousContainer,.containerBox{
  padding:30px 5px 5px 5px;
}
.articleItem{
  width:100%;
  padding:3px;
}
.articleItem div{
  width: 100%;
}
.articleEntryTitle{
  font-size:20px;
  min-width:250px;
  max-width:500px;
  border-bottom:rgba(0,0,0,.2) solid 1px;
  margin-bottom:3px;
  
}
.articleEntryTitle a{
  color:#0C717A;
}
.articleEntryTitle a:hover{text-decoration:none;}
.articleEntryAuthor{
  font-size:10px;
  color:#999;
  img{
    height:24px;
    width:24px;
  }
}
.articleEntryDescription{
  width:600px;
  overflow:hidden;
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
          <div data-href="{$b.link}" data-size="small" class="g-plusone"></div>
        </div>
        <div>
          <div class="fb-like" data-href="{$b.link}?spref=fb" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>
        </div>
      </div>
    </div>


