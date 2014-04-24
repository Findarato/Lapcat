<div class="bookBox <?Php print $css_class; ?>">
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
      <div class="view-content <?php print str_replace($css_class,'',$classes); ?>">
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
<?Php
  //print '<pre>';
  
  //print '</pre>';
?>
<?Php
//  print '<pre>';
 // var_dump(get_defined_vars());
//print '</pre>';
?>