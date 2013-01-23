<style>
  .bookCoverImage a{
    min-width:75px;
    min-height:100px;
    display:inline-block;  
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
        <h3 class="logoSubtitle"><?php if ($site_slogan): ?><?Php print $site_slogan;?><?php endif; ?></h3> 
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
        <div class="grid_20 push_4" style="position:relative">
          <div class="mainCatalogSearch">
            <form method="get" action="http://catalog.lapcat.org/search/X?" class="catalogNav smoothAnimate">
                <select class="smoothAnimate" name="searchtype">
                  <option value="X" >KEYWORD</option>
                  <option value="t" selected="selected">TITLE</option>
                  <option value="a">AUTHOR</option>
                  <option value="d">SUBJECT</option>
                </select>
                <input type="search" name="searcharg" size="20" maxlength="75" value="" placeholder="Search the Catalog" >
                <input class="insideBoxShadow smoothAnimate" type="submit" value="GO!">
              </form>
          </div>
          <!-- Middle Colmn -->
          <div id="middleSectionContainer" class="banner roundAll3">
             <?php if ($page['featured_slider']): ?>
              <div id="featured-slider" class="roundAll3">
                <?php print render($page['featured_slider']); ?>
              </div> <!-- End Featured Slider-->
            <?php endif; ?>
          </div>
        </div>
        <div class="navBoxGroup grid_4 pull_20" style="" >
          <!-- Right Colmn -->
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="askNav smoothAnimate" href="help" >Help</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="aboutNav smoothAnimate" href="about" >About Us</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="hoursNav smoothAnimate" href="hours" >Hours</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="greatPicksNav smoothAnimate" href="greatpicks">Great Picks!</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="genealogyNav smoothAnimate" href="http://genealogy.lapcat.org">Genealogy</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="genealogyNav smoothAnimate" href="http://genealogy.lapcat.org">Newsletter</a>
          </div>        
        </div>        
      </nav>  
      <!--/Page Header-->

      <div class="clear"></div>   
      <section id="mainContent" class="grid_16">
        <?php if ($messages): ?>
        <div id="console" class="clearfix"><?php print $messages; ?></div>
        <?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <div class="box blogBox roundAll3">
          <div class="twitterFeedTitle roundAll3 titleElement color3 icon-twitter-bird font1"><span style="padding-left:3px;height:100%;width:100%">Newst Material</span></div>
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