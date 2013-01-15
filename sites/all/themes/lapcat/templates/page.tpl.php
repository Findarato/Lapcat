<style>
  .subPageHeader{
    background-image: url('<?php print $base_path . $directory .'/images/LaPorte_County_Public_Library.jpg'; ?>');
    background-repeat:no-repeat;
  }
  .helpHeader{
    background-image: url('<?php print $base_path . $directory .'/images/tree.svg'; ?>');
    background-repeat:no-repeat;
  }
  .hoursHeader{
    background-image:url(http://maps.googleapis.com/maps/api/staticmap?center=41.609126,-86.721036&zoom=10&size=560x85&scale=2&sensor=false);
    background-repeat:no-repeat;
  }
</style>


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
        
        <?php print $feed_icons; ?>
      </aside>
       <div class="clear"></div>
    </div> <!-- end of main content-->
    <footer class="grid_24" style="margin-top:10px;margin-right:0px">
      <?php if ($page['pageFooter']): ?>
        <div id="pageFooter"><?php print render($page['pageFooter']); ?></div>
      <?php endif; ?>
        <div id="MainContainerBox" class="t" >
          <div class="td">
            <div class="t">
              <div class="list td">
                <a href="/employment">Employment</a>
                <a href="/about">About</a>
                <a href="/hours">Hours and Locations</a>
                <a href="/help">Ask a Librarian</a>
                <a href="greatpicks.php">Great Picks</a>
                <a href="http://genealogy.lapcat.org">Genealogy</a>
                <a href="http://catalog.lapcat.org/">Catalog</a>
                <a href="/request">Request a Purchase</a>
                <a href="https://catalog.lapcat.org/webapp/iii/ecom/donate.do">Donate</a>
                <a href="/friends">Friends of The Library</a>
                <a href="/educators">Educators</a>
                <div class="copyright">Copyright © 2012 La Porte County Public Library System</div>
              </div>
            </div>
          </div>
          <div class="td">
            
          </div>
        </div>
    </footer> 
  </div>