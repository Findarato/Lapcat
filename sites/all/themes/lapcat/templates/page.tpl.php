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
              <img height=75px width=68px src="<?php print $logo ?>" alt="logo" title="Logo" id="logo" />
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
        <?php if ($page['pageHeader']): ?>
          <div id="pageHeader"><?php print render($page['pageHeader']); ?></div>
        <?php endif; ?>
        <!-- cool stuff testing-->
        <div class=" " style="margin-bottom:10px;width:100%;height:100%;position:relative;overflow:hidden">
          <div class="roundAll3 insideBoxShadow subPageHeader" ></div>
          <div class="color4 roundRight4 outSideBoxShadow" style="position: absolute;top:25%; left:5px;padding-right:5px;">
            <?php if ($page['pageTitle']): ?><?php print render($page['pageTitle']); ?><?php endif; ?>
          </div>
          <div class="subPageCatalogSearch insideBoxShadow">
            <div class="catalog ">
              <form method="get" action="http://catalog.lapcat.org/search/~/a?a">
                <div style="display:table">
                  <div style="display:table-cell">
                    <select name="searchtype">
                      <option value="X" selected="selected">KEYWORD</option>
                      <option value="t">TITLE</option>
                      <option value="a">AUTHOR</option>
                      <option value="d">SUBJECT</option>
                    </select>
                  </div>
                  <div style="display:table-cell">
                    <input type="search" name="searcharg" size="20" maxlength="75" placeholder="Search the Catalog">
                    <input type="submit" value="GO!" style="display:none;"/>
                  </div>
                </div>
              </form>
            </div>
            <div style="display:inline-block;vertical-align: top;">
              <a alt="Need Help?" class="icon-help fontShadow" href="/help.php"  style="font-size:1.2rem"></a>
            </div>
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
            if(drupal_is_front_page()) {unset($page['content']['system_main']['default_message']);}
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
    </div> <!-- end of main content-->
    <footer class="grid_24" style="margin-top:10px;margin-right:0px">
      <?php if ($page['pageFooter']): ?>
        <div id="pageFooter"><?php print render($page['pageFooter']); ?></div>
      <?php endif; ?>
    </footer> 
  </div>   