<div class="bookBox">
  <div class="bookTitle">
    <h2><a href="http://wowbrary.org/nu.aspx?p=8711--GEN&more">
    <?php if ($view->get_title()): ?>
      <?php print $view->get_title(); ?>
    <?php endif; ?></a></h2>
  </div>
  <div class="bookContainer" style="padding-left:10px;">
    <?php if ($rows): ?>
      <div class="view-content <?php print $classes; ?> coverSlider" style="overflow:hidden;height:300px">
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
  <div class="t">
    <div class="td">
      <div class="scrollerBack"><a href="#">BACK</a></div>  
    </div>
    <div class="td" style="width:.5em;"></div>
    <div class="td">
      <div class="scrollerNext"><a href="#">NEXT</a></div>  
    </div>
  </div>
  
  </div>
</div>