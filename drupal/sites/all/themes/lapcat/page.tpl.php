
  <div id="branding" class="clearfix">
    <?php print $breadcrumb; ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1 class="page-title"><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php print render($primary_local_tasks); ?>
  </div>

  <div id="page">


  




<body>
  <div id="container" style="" class="container_24">
    
    <div class="mainArea grid_24 roundAll3" id="main" role="main">

      <div class="clear"></div>
      <section class="grid_16">
        <div class="blogBox roundAll3">
          <div class="blogTitle roundAll3 titleElement color3 icon-vkontakte-rect font1">
            <a href="http://laportelibrary.blogspot.com/">Latest From Blog</a>
          </div>
          <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
              <div id="content" class="clearfix">
                <div class="element-invisible"><a id="main-content"></a></div>
                <?php if ($messages): ?>
                  <div id="console" class="clearfix"><?php print $messages; ?></div>
                <?php endif; ?>
                <?php if ($page['help']): ?>
                  <div id="help">
                    <?php print render($page['help']); ?>
                  </div>
                <?php endif; ?>
                <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                <?php print render($page['content']); ?>
              </div>
              <div id="footer">
                <?php print $feed_icons; ?>
              </div>
            </div>
          </div>
        </div>

      </section>
      <aside class="grid_8">
      </aside>
      <div class="clear"></div>
    </div>
    <footer class="grid_24" style="margin-top:10px;margin-right:auto;">

    </footer> 
  </div>
  <!--! end of #container -->
  

  <link rel="stylesheet" href="/js/libs/FlexSlider/flexslider.css" type="text/css">
  <script src="js/libs/FlexSlider/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
  <script defer src="js/mainNavRotate.js"></script>


