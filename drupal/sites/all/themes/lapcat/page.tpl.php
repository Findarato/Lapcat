  <div id="" style="" class="container_24">
    <div class="mainArea grid_24 roundAll3" id="main" role="main">
        <?php if ($page['page_top']): ?>
          <div id="page_top"><?php print render($page['page_top']); ?></div>
        <?php endif; ?>        
      <section id="mainContent" class="grid_16">
        <div class="element-invisible"><a id="main-content"></a></div>
          <?php if ($messages): ?>
          <div id="console" class="clearfix"><?php print $messages; ?></div>
          <?php endif; ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
      </section>
      <aside id="side" class="grid_8">
        <?php if ($page['rightSide']): ?>
          <div id="rightSide"><?php print render($page['rightSide']); ?></div>
        <?php endif; ?>
        <?php if ($page['help']): ?>
          <div id="help">
            <?php print render($page['help']); ?>
          </div>
        <?php endif; ?>
      </aside>
       <div class="clear"></div>
    </div> <!-- end of main content-->
    <footer class="grid_24" style="margin-top:10px;margin-right:auto;">
      <div id="footer">
        <?php print $feed_icons; ?>
      </div>
    </footer> 
  </div>
  <link rel="stylesheet" href="/js/libs/FlexSlider/flexslider.css" type="text/css">
  <script src="js/libs/FlexSlider/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
  <script defer src="js/mainNavRotate.js"></script>