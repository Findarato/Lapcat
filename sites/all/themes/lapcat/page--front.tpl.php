<header class="topHeader" style="margin:0;padding:0;">
  <nav title="top Navagation" class="firstNav color1 " style="text-align: center;top:0;left:0;position:relative">
    <div class="t topNav " style="max-width:940px;text-align:center;margin:0 auto;">
      <div class="td">
        <a href="/">
           <?php if ($logo): ?>
              <img height=75px width=68px src="<?php print $logo ?>" alt="learn, enrich, enjoy" title="learn, enrich, enjoy" id="logo" />
            <?php endif; ?>
         </a>
      </div>
      <div class="td">
        <h1><a href="/" class="logoTitle">La Porte County Public Library System</a></h1>
        <h3 class="logoSubtitle">learn, enrich, enjoy</h3> 
      </div>
    </div>
  </nav>
  <nav class="secondNav color2" style="width:100%">
    <div class="topNav" style="text-align:center;margin:0 auto;">
      <?php if ($page['menuHeader']): ?>
          <div id="menuHeader"><?php print render($page['menuHeader']); ?></div>
        <?php endif; ?>
    </div>
  </nav>
</header>  
  <div id="" style="" class="container_24">
    <div class="mainArea grid_24 roundAll3" id="main" role="main">
      <!--Page Header-->
      <nav class="navDisplay">
        <div class="grid_20">
          <!-- Middle Colmn -->
          <div id="middleSectionContainer" class="banner " style="position:relative;">
             <?php if ($page['featured_slider']): ?>
              <div id="featured-slider">
                <?php print render($page['featured_slider']); ?>
              </div> <!-- End Featured Slider-->
            <?php endif; ?>
          </div>
        </div>
        <div class="grid_4" >
          <!-- Right Colmn -->
          <div class="navBoxes" style="background-image: url(<?php print $base_path . $directory .'/images/stock-photo-14816819-internet-reservation.jpg'; ?>)">
            <a class="askNav smoothAnimate fixMargin" href="help" ></a>
            <a href="help">Help</a>
          </div>
          <div class="navBoxes research" style="background-image: url(<?php print $base_path . $directory .'/images/stock-illustration-19686860-calendar-icon.jpg'; ?>)">
            <a class="aboutNav smoothAnimate fixMargin" href="about" ></a>
            <a href="about"> About Us</a>
          </div>
          <div class="navBoxes research" style="background-image: url(<?php print $base_path . $directory .'/images/stock-illustration-8034749-job-searching-effects.jpg'; ?>)">
            <a class="employmentNav smoothAnimate fixMargin" href="employment" ></a>
            <a href="employment">Employment</a>
          </div>
          <div class="navBoxes hours" style="background-image: url(http://maps.googleapis.com/maps/api/staticmap?center=41.609126,-86.721036&zoom=9&size=230x100&sensor=false)">
            <a class="hoursNav smoothAnimate fixMargin" href="hours" ></a>
            <a href="hours">Hours</a>
          </div>
          <div class="navBoxes greatPicks" style="background-image: url(<?php print $base_path . $directory .'/images/stock-illustration-18812296-green-book-stack.jpg'; ?>)">
            <a class="greatPicksNav smoothAnimate fixMargin" href="greatpicks"></a>
            <a href="greatpicks">Great Picks!</a>
          </div>
          <div class="navBoxes genealogy" style="background-image: url(<?php print $base_path . $directory .'/images/stock-illustration-5700289-green-man.jpg'; ?>)">
            <a class="genealogyNav smoothAnimate fixMargin" href="http://genealogy.lapcat.org"></a>
            <a href="http://genealogy.lapcat.org/">Genealogy</a>
          </div>
        </div>
      </nav>  
      <!--/Page Header-->

      <div class="clear"></div>   
      <section id="mainContent" class="grid_16">
        <div class="element-invisible"><a id="main-content"></a></div>
          <?php if ($messages): ?>
          <div id="console" class="clearfix"><?php print $messages; ?></div>
          <?php endif; ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            <div class="box blogBox roundAll3">
              <div class="twitterFeedTitle roundAll3 titleElement color3 icon-twitter-bird font1"><span style="padding-left:3px;height:100%;width:100%">Blog</span></div>
              <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
                <?php print render($page['content']); ?>      
              </div>
            </div>
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
        
        <?php print $feed_icons; ?>
      </aside>
       <div class="clear"></div>
    </div> <!-- end of main content-->
    <footer class="grid_24" style="margin-top:10px;margin-right:auto;">
      <?php if ($page['pageFooter']): ?>
        <div id="pageFooter"><?php print render($page['pageFooter']); ?></div>
      <?php endif; ?>
    </footer> 
  </div>
  <link rel="stylesheet" href="/js/libs/FlexSlider/flexslider.css" type="text/css">
  <script src="js/libs/FlexSlider/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
  <script defer src="js/mainNavRotate.js"></script>