<header class="hd-top color1">
  <nav class=" container_24">
    <a class="hd-logoTitle" href="/"><h2>La Porte County Public Library</h2></a> links will go here
  </nav>
</header>      
<header class="hd-bottom color2">
  <div class="container_24">
    <nav class="">
      <div class="hd-logo" style="float:left;">
        <a href="/"><?php if ($logo):?><img class="logoImage" src="<?php print $logo ?>" alt="logo" title="Logo" id="logo" /><?php endif; ?></a>
      </div>
      <?php if ($page['menuHeader']): ?>
      <div id="menuHeader">
        <?php print render($page['menuHeader']); ?>
      </div>
      <?php endif; ?>
      <div class="spc-Search"  style="float:right;">
        <div class="catalog ">
          <form method="get" action="https://catalog.lapcat.org/search/~/a?a">
            <div class="t" style="width:95%;">
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
    </nav>
  </div>
</header>
  <div id="" style="" class="container_24">
    <main class="mainArea grid_24 roundAll3" id="main" role="main">
        <?php if ($page['pageHeader']): ?>
          <div id="pageHeader"><?php print render($page['pageHeader']); ?></div>
        <?php endif; ?>
        <!-- cool stuff testing-->
        <div class="supPageHeader">
          <div class="roundAll3 insideBoxShadow subPageHeader <?Php print_r($page['pageTitle']["blockify_blockify-page-title"]["#markup"]); ?>" ></div>
          <div class="pageTitle color4 roundRight3 outSideBoxShadow " style="position: absolute;top:25%; left:5px;padding-right:5px;">
            <h1><?Php print_r($page['pageTitle']["blockify_blockify-page-title"]["#markup"]); ?></h1>
          </div>
        </div>
        
        <!--end of cool testing stuff-->
        <div class="clear"></div>   
      <section id="mainContent" class="grid_16">
        <div class="element-invisible"><a id="main-content"></a></div>
          <?php if ($messages): ?>
          <div id="console" class="clearfix"><?php print $messages; ?></div>
          <?php endif; ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php
          if(drupal_is_front_page()) {unset($page['content']['system_main']['default_message']);
          }
          if(render($page['content']) != "") {
          }
          print render($page['content']);
          ?>
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
    </main> <!-- end of main content-->
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