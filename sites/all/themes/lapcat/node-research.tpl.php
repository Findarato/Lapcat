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
    <div class="t topNav" style="text-align:center;margin:0 auto;">
      <div class="td  ">
        <div class="menuSelect smoothAnimate">
          <a alt="Login to make a hold" href="https://catalog.lapcat.org/patroninfo">My Account</a>
        </div>
      </div>
      <div class="td  ">
        <div class="menuSelect smoothAnimate">
          <a alt="Access all of the electronic resources the library has to offer" href="downloads.php">Downloads</a>
        </div>
      </div>
      <div class="td  ">
        <div class="menuSelect smoothAnimate">
          <a alt="What is happening at the Library" href="http://engagedpatrons.org/Events.cfm?SiteID=9267">Events</a>
        </div>
      </div>
    <div class="td  ">
        <div class="menuSelect smoothAnimate">
          <a alt="Looking for that hard to find information?" href="research">Research</a>
        </div>
      </div>
      <div class="td largeNav">
        <div class="menuSelect smoothAnimate">
          <a alt="All of our teen activities" href="teens">Teens</a>
        </div>
      </div>
      <div class="td largeNav">
        <div class="menuSelect smoothAnimate">
          <a alt="See what we offer our youngest members" href="children">Childrens</a>
        </div>
      </div>
    </div>
  </nav>
</header>
research?
  <div id="" style="" class="container_24">
    <div class="mainArea grid_24 roundAll3" id="main" role="main">
        <?php if ($page['pageHeader']): ?>
          <div id="pageHeader"><?php print render($page['pageHeader']); ?></div>
        <?php endif; ?>
        <div class="clear"></div>   
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