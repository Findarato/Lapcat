<div class="box blogBox roundAll3">
  <div class="boxTitle roundAll3 titleElement color3">
    <h2>
    <?php if ($view->get_title()): ?>
      <?php print $view->get_title(); ?>
    <?php endif; ?></h2>
  </div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox">
    <?php if ($header): ?>
      <div class="view-header">
        <?php print $header; ?>
      </div>
    <?php endif; ?>
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