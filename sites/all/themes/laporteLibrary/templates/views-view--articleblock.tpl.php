<div class="">
    <div class="">
    <?php if ($rows): ?>
      <div class="view-content <?php print $classes; ?>">
        <?php print $rows; ?>
      </div>
    <?php elseif ($empty): ?>
      <div class="view-empty">
        <?php print $empty; ?>
      </div>
    <?php endif; ?>
  </div>
</div>