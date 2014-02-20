<style>
  .bookCoverImage a{
    min-width:75px;
    min-height:100px;
    display:inline-block;  
  }
</style>

<header>
  <div class="masterHeader">
    <a href="/" alt="Logo" title="La Porte County Public Library"><?php if ($logo):?><img class="logoImage" src="<?php print $logo ?>" alt="logo" title="Logo" id="logo" /><?php endif; ?></a>
  </div>
  <nav class="masterHeaderMenu">
    <?php if ($page['menuHeader']): ?>
      <input class="menuToggle" type="checkbox" id="menuToggle">
      <div id="menuHeader">
        <?php print render($page['menuHeader']); ?>
      </div>
      <?php endif; ?>
  </nav>
  
      


      <div class="spc-Search">
        <div class="catalog ">
          <form method="get" action="https://catalog.lapcat.org/search/~/a?a">
            <div class="t">
              <div class="spc-Type td" style="display:none;">
                <select name="searchtype" >
                  <option value="X" selected="selected">KEYWORD</option>
                  <option value="t">TITLE</option>
                  <option value="a">AUTHOR</option>
                  <option value="d">SUBJECT</option>
                </select>
              </div>
              <div class="spc-SearchBox td" >
                <input class="insideBoxShadow" type="search" name="searcharg" placeholder="Search the Catalog">
              </div>
              <div class="spc-Submit td" >
                <input type="submit" value="GO!"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php if ($page['pageTopMenu']): ?>
    <div id="pageTopMenu">
      <?php print render($page['pageTopMenu']); ?>
    </div>
    <?php endif; ?>
</header>
<div class="colorWave"></div>








  <main class="mainArea" id="main" role="main">
    <!--Page Header-->
    <nav class="navDisplay">
      <div class="" style="position:relative">
        
        <!-- Middle Colmn -->
        <div id="middleSectionContainer" class="banner roundAll3">
           <?php if ($page['featured_slider']): ?>
            <div id="featured-slider" class="roundAll3">
              <?php print render($page['featured_slider']); ?>
            </div> <!-- End Featured Slider-->
          <?php endif; ?>
        </div>
      </div>
      <div class="navBoxGroup" style="" >
        <!-- Right Column -->
        <div class="navBoxes insideBoxShadow lifted" >
          <a href="hours">Hours</a>
        </div> 
        <div class="navBoxes insideBoxShadow lifted" >
          <a href="http://engagedpatrons.org/Events.cfm?SiteID=9267">Events</a>
        </div> 
        <div class="navBoxes insideBoxShadow lifted" >
          <a href="greatpicks">Great Picks</a>
        </div>
        <div class="navBoxes insideBoxShadow lifted" >
          <a href="genealogy">Genealogy</a>
        </div>
        <div class="navBoxes insideBoxShadow lifted" >
          <a href="employment">Employment</a>
        </div>
        <div class="navBoxes insideBoxShadow lifted" >
          <a href="local">Community</a>
        </div>
        <!--
          <div class="navBoxes insideBoxShadow lifted" >
            <a href="educators">Educators</a>
          </div>
-->
      </div>        
    </nav>  
    <!--/Page Header-->

    <div class="clear"></div>   
    <section id="mainContent" class="">
      <?php if ($messages): ?>
      <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php print render($page['content']); ?>      
    </section>
    <aside id="side" class="">
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
  </main> <!-- end of main content-->
  <footer> 
    <div class="t" style="width:100%;bottom:0px;position:relative">
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