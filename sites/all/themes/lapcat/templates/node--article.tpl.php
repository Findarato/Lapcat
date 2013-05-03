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
<div class="box blogBox roundAll3 <?php print $classes; ?>" id="node-<?php print $node -> nid; ?>" <?php print $attributes; ?>>
  <div class="roundAll3 titleElement color3 font1"><span style="padding-left:3px;height:100%;width:100%">Article</span></div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
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
    <div class="clearfix">
      <?php if (!empty($content['links'])): ?>
      <div class="content clearfix"<?php print $content_attributes; ?>>
        <?php
          // We hide the comments and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          print render($content);
        ?>
      </div>
        <div class="links"><?php print render($content['links']); ?></div>
      <?php endif; ?>
      <?php print render($content['comments']); ?>
    </div>
  </div>
</div>