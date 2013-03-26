<!--Teens Page-->

<style>
  .subPageHeader{
    background-image: url('<?php print $base_path . $directory .'/images/teenHeader.png'; ?>');
    background-repeat:no-repeat;
  }
  .childrenTree{
    background-image: url('<?php print $base_path . $directory .'/images/tree.svg'; ?>');
    background-repeat:no-repeat;
    bottom:33px;
  }  
  .treeShadow{
    width:10em;
    height:25px;
    position: absolute;
    bottom:26px;
    right:45px;
    z-index:0;
    border-radius: 50%;
    background: -moz-radial-gradient(center, ellipse cover, rgba(0,0,0,0.45) 1%, rgba(0,0,0,0.45) 36%, rgba(0,0,0,0) 77%, rgba(0,0,0,0) 97%); /* FF3.6+ */
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,rgba(0,0,0,0.45)), color-stop(36%,rgba(0,0,0,0.45)), color-stop(77%,rgba(0,0,0,0)), color-stop(97%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
    background: -webkit-radial-gradient(center, ellipse cover, rgba(0,0,0,0.45) 1%,rgba(0,0,0,0.45) 36%,rgba(0,0,0,0) 77%,rgba(0,0,0,0) 97%); /* Chrome10+,Safari5.1+ */
    background: -o-radial-gradient(center, ellipse cover, rgba(0,0,0,0.45) 1%,rgba(0,0,0,0.45) 36%,rgba(0,0,0,0) 77%,rgba(0,0,0,0) 97%); /* Opera 12+ */
    background: -ms-radial-gradient(center, ellipse cover, rgba(0,0,0,0.45) 1%,rgba(0,0,0,0.45) 36%,rgba(0,0,0,0) 77%,rgba(0,0,0,0) 97%); /* IE10+ */
    background: radial-gradient(ellipse at center, rgba(0,0,0,0.45) 1%,rgba(0,0,0,0.45) 36%,rgba(0,0,0,0) 77%,rgba(0,0,0,0) 97%); /* W3C */
  }
  .flickrImageTitle{
    position:absolute;
    bottom:0px;
    background-color:rgba(0,0,0,.6);
    color:#F1F1F1;
    width:100%;
    padding:5px;
  }

  .flickrPicture a{
    height:75px;
    width:75px;
    display:block;
  }
  .flickrPicture{
    margin:5px;
    padding:3px;
    display:inline-block;
    height:75px;
    width:75px;
    background:#fff;
    font-size:.8em;
    color:#000;
    position:absolute;
    -webkit-box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .0);
    -moz-box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .0);
    box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .0);
  }
  .flickrPicture:hover{
    z-index:999;
    overflow:visible;
    -webkit-transform:scale(1.1);
    -moz-transform:scale(1.1);
    -o-transform:scale(1.1);
    -ms-transform:scale(1.1);
    transform:scale(1.1);
    -webkit-box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .2);
    -moz-box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .2);
    box-shadow: 3px 3px 24px 10px rgba(0, 0, 0, .2);
  }
  .mainArea{z-index: 10;position:relative;}
  .childrenGrass{
    background-image: url('<?php print $base_path . $directory .'/images/lowResGrass.png'; ?>');
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
        <div style="display:inline-block;vertical-align: top;">
          <!--<a alt="Need Help?" class="color5Circle helpLink hoverGlowText" href="/help" title="Need Help?">?</a>-->
          <a alt="Need Help?" class="helpLink hoverGlowText" href="/help" title="Need Help?">Help</a>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </nav>
</header>
<div class="teenWholePage" style="overflow: hidden;">
    <div class="childrenSun"></div>
    <div id="" style="" class="container_24">
      <div class="mainArea grid_24 roundAll3" id="main" role="main">
        <?php if ($page['pageHeader']): ?>
          <div id="pageHeader"><?php print render($page['pageHeader']); ?></div>
        <?php endif; ?>
<!-- cool stuff testing-->
        <div class=" " style="margin-bottom:10px;width:100%;height:100%;position:relative;overflow:hidden">
          <div class="roundAll3 insideBoxShadow subPageHeader <?Php print_r($page['pageTitle']["blockify_blockify-page-title"]["#markup"]);?>" ></div>
          <div class="color4 roundRight3 outSideBoxShadow " style="position: absolute;top:25%; left:5px;padding-right:5px;">
            <h1><?Php print_r($page['pageTitle']["blockify_blockify-page-title"]["#markup"]);?></h1>
          </div>
          <div class="subPageCatalogSearch insideBoxShadow">
            <div class="catalog ">
              <form method="get" action="https://catalog.lapcat.org:444/search/~/a?a">
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
                    <input type="submit" value="GO!"/>
                  </div>
                </div>
              </form>
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
    </div>
   <div class="childrenGrass" style="margin-top:150px;">
      <div class="childrenTree linearAnimate"></div>
      <div class="treeShadow"></div>
   </div>
  <footer class="color5" style="margin-top:0px;margin-right:0px;z-index: 10">
    <div class="" style="width:100%;display:table;bottom:0px;position:relative">
      <div class="footerLeft"> <!--Links-->
        <div>
          <?php if ($page['pageLinks']): ?>
            <div id="pageLinks" ><?php print render($page['pageLinks']); ?></div> 
          <?php endif; ?>
        </div>
      </div>
      <div class="footerRight">
        <h2>Social Library</h2>
        <?php if ($page['search']): ?>
          <div id="search"><?php print render($page['search']); ?></div>
        <?php endif; ?> 
      </div>
    </div>
  </footer>  
  </div>