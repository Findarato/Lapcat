<!--Children Page-->

<style>
.childrenTree{
  background-image: url('<?php print $base_path . $directory .'/images/tree.svg'; ?>');
  background-repeat:no-repeat;
}
.childrenSun{
  background-image: url('<?php print $base_path . $directory .'/images/sun.svg'; ?>');
  background-repeat:no-repeat;
}
.childrenGrass{
  background-image: url('<?php print $base_path . $directory .'/images/img.png'; ?>');
  background-position: 0 -427px;
}
.subPageHeader{
  background:rgba(250,250,250,.6); 
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
        <h3 class="logoSubtitle">learn, enrich, enjoy stuff</h3> 
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
  <div class="childWholePage" style="overflow: hidden;">
    <div class="childrenSun"></div>
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
              <?php print render($page['help']); ?>test
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
          <div class="childrenGrass">
        <div class="childrenTree linearAnimate"></div>
      </div>
  </div>