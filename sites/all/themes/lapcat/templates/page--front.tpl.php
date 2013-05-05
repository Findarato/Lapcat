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
      <div class="td logoBlock">
        <a href="/">
           <?php if ($logo): ?>
              <img class="logoImage" src="<?php print $logo ?>" alt="learn, enrich, enjoy" title="learn, enrich, enjoy" id="logo" />
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
      <div id="menuHeader">
        <?php print render($page['menuHeader']); ?>
        <div class="helpLink" style="display:inline-block;vertical-align: top;">
          <!--<a alt="Need Help?" class="color5Circle helpLink hoverGlowText" href="/help" title="Need Help?">?</a>-->
          <!--<a alt="Need Help?" class="helpLink hoverGlowText" href="/help" title="Need Help?">Help</a>-->
        </div>
      </div>
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
            <form method="get" action="https://catalog.lapcat.org:444/search/X?" class="catalogNav smoothAnimate">
                <select class="smoothAnimate" name="searchtype">
                  <option value="X" >KEYWORD</option>
                  <option value="t" selected="selected">TITLE</option>
                  <option value="a">AUTHOR</option>
                  <option value="d">SUBJECT</option>
                </select>
                <input type="search" name="searcharg" size="24" maxlength="75" value="" placeholder="Search the Catalog" >
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
          <!-- Right Column -->
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="smoothAnimate" href="Downloads">Downloads</a>
          </div> 
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="smoothAnimate" href="children" >Children</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="smoothAnimate" href="teens" >Teens</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="smoothAnimate" href="about" >About</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="smoothAnimate" href="greatpicks">Great Picks</a>
          </div>
          <div class="navBoxes insideBoxShadow lifted smoothAnimate" >
            <a class="smoothAnimate" href="genealogy">Genealogy</a>
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
  </div>
  <footer class="color5" style="margin-top:150px;margin-right:0px;z-index: 10;"> 
    <div class="" style="width:100%;bottom:0px;position:relative">
      <div class="footerLeft"> <!--Links-->
        <?php if ($page['pageLinks']): ?>
          <div id="pageLinks" ><?php print render($page['pageLinks']); ?></div>
        <?php endif; ?>
      </div>
      <div class="footerRight">
        <h3>Social Library</h3>
        <?php if ($page['search']): ?>
          <div id="search"><?php print render($page['search']); ?></div>
        <?php endif; ?> 
      </div>
    </div>
  </footer>