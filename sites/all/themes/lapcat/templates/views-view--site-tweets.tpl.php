<div class="box blogBox roundAll3">
  <div class="twitterFeedTitle roundAll3 titleElement color3 icon-twitter-bird font1"><a href="http://twitter.com/lpcpls/" style="padding-left:3px;height:100%;width:100%">Tweets</a></div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
    <?php if ($rows): ?>
      <div class="view-content">
        <?php print $rows; ?>
      </div>
    <?php elseif ($empty): ?>
      <div class="view-empty">
        <?php print $empty; ?>
      </div>
    <?php endif; ?>
  </div>
</div>