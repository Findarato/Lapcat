<div class="box blogBox roundAll3">
  <div class="twitterFeedTitle roundAll3 titleElement color3 font1">Teen Articles</div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
    <?php if ($rows): ?>
      <div class="view-content">
        <?php print $rows;?>
        
      </div>
    <?php elseif ($empty): ?>
      <div class="view-empty">
        <?php print $empty; ?>
      </div>
    <?php endif; ?>
  </div>
</div>