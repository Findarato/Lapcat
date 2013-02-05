<!--Children Page-->

<style>
.childrenTree{
  background-image: url('<?php print $base_path . $directory .'/images/tree.svg'; ?>');
  background-repeat:no-repeat;
}
.childrenSun{
  background-image: url('<?php print $base_path . $directory .'/images/sun.svg'; ?>');
  background-repeat:no-repeat;
  z-index: 2;
}
.childrenGrass{
  background-image: url('<?php print $base_path . $directory .'/images/img.png'; ?>');
  background-position: 0 -427px;
}
.subPageHeader{
  background:rgba(250,250,250,.6); 
}
 .childrenLinks ul li{display:inline-block;}
 .mainArea{z-index: 10;position:relative;}
 /*sprite Code*/
.sprite{background-image:url("<?php print $base_path . $directory .'/images/csg-4f7079e61a6bf.png'; ?>"); display:block;text-indent:-100%;overflow:hidden;white-space:nowrap;}
.sprite-06-magnify{ background-position: 0 0; width: 24px; height: 24px; } 
.sprite-Discovery_Kids_logo{ background-position: 0 -29px; width: 100px; height: 100px; } 
.sprite-Disneydigitalbooks{ background-position: 0 -134px; width: 100px; height: 100px; } 
.sprite-Lego{ background-position: 0 -239px; width: 100px; height: 100px; } 
.sprite-NGLittleKids{ background-position: 0 -344px; width: 100px; height: 100px; } 
.sprite-NickJrLogo{ background-position: 0 -449px; width: 100px; height: 100px; } 
.sprite-PBS_Kids{ background-position: 0 -554px; width: 100px; height: 100px; } 
.sprite-Starfall{ background-position: 0 -659px; width: 100px; height: 100px; } 
.sprite-TumbleBook{ background-position: 0 -764px; width: 100px; height: 98px; } 
.sprite-TumbleBook_icon{ background-position: 0 -867px; width: 100px; height: 100px; } 
.sprite-Yahookids{ background-position: 0 -972px; width: 100px; height: 100px; } 
.sprite-barbie{ background-position: 0 -1077px; width: 100px; height: 100px; } 
.sprite-cartoon_network{ background-position: 0 -1219px; width: 100px; height: 100px; } 
.sprite-chugginton{ background-position: 0 -1324px; width: 100px; height: 100px; } 
.sprite-coloring_com{ background-position: 0 -1429px; width: 100px; height: 100px; } 
.sprite-disneygames{ background-position: 0 -1534px; width: 104px; height: 104px; } 
.sprite-funbrain{ background-position: 0 -1643px; width: 100px; height: 100px; } 
.sprite-sesamestreet{ background-position: 0 -1748px; width: 100px; height: 100px; } 
.sprite-youtube{ background-position: 0 -1853px; width: 115px; height: 50px; } 
  
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
  <div class="childWholePage" style="overflow: hidden;">
    <div class="childrenSun"></div>
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