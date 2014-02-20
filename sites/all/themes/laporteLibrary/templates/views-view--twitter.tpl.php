<div class="bookBox">
  <div class="bookTitle">
    <h2><a href="http://twitter.com/lpcpls">Twitter</a></h2>
  </div>
  <div class="bookContainer" style="padding-left:10px;">
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


   