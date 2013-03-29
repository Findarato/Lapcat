<div class="box blogBox roundAll3">
  <div class="boxTitle roundAll3 titleElement color3">
    <h2>
    <a href="http://twitter.com/lpcpls">Twitter</a>
    </h2>
  </div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" style="padding-left:10px;">
    <?php if ($rows): ?>
      <div class="view-content <?php print $classes; ?>">
        <?php print $rows; ?>
      </div>
    <?php elseif ($empty): ?>
      <div class="view-empty">
        <?php print $empty; ?>
      </div>
    <?php endif; ?>
  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>    
  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>
  </div> 
</div>


   