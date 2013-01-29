<div class="box blogBox roundAll3">
  <div class="boxTitle roundAll3 titleElement color3">
    <?php if ($view->get_title()): ?>
      <?php print $view->get_title(); ?>
    <?php endif; ?>
  </div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" style="padding-left:10px;padding-bottom:0;">
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