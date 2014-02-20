<div class="bookBox">
  <div class="bookTitle">
    <h2>
    <?php if ($view->get_title()): ?>
      <?php print $view->get_title(); ?>
    <?php endif; ?></h2>
  </div>
  <div class="bookContainer">
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