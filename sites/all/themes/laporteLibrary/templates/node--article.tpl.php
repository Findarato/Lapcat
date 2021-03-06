<style>
  .userImage img{
    width:64px;
    height:64px;
    margin:0px;
    padding:0px;
  }
  .submitted{
    padding:3px;
  }
</style>
<div class="bookBox <?php print $classes; ?>" id="node-<?php print $node -> nid; ?>" <?php print $attributes; ?>>
  <div class="bookTitle"><h2><?php print $title; ?></h2></div>
  <div class="bookContainer" >
    <div class="t">
      <div class="td" style="height:64px;width:64px;">
        <div class="userImage" style="width:100%;height:100%;border:none;"><?php print $user_picture; ?></div>
      </div>
      <div class="td">
        <div class="blogEntryTitle"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></div>
        <div>        
          <?php if ($display_submitted): ?>
          <span class="blogEntryAuthor"><?php print $submitted ?></span>
          <?php endif; ?>
       </div>
      </div>
    </div> 
  <!-- Comments -->
  
    
  <?php if (!empty($content['links'])): ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      print render($content["body"]);
      print render($content["field_tags"]);
    ?>
  </div>
    <div class="links"><?php print render($content['links']); ?></div>
  <?php endif; ?>
    
  </div>
</div>