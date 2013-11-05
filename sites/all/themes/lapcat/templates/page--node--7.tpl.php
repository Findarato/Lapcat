<!--Children Page-->

<style>

.subPageHeader{ 
  background:rgba(250,250,250,.6);
  background-image: url('<?php print $base_path . $directory .'/images/kidsHeader.png'; ?>');  
}
 .childrenLinks ul li{display:inline-block;}
 .mainArea{z-index: 10;position:relative;}
 /*sprite Code*/
.sprite{background-image:url("<?php print $base_path . $directory .'/images/csg-511916e61907f.png'; ?>"); display:block;text-indent:100%;overflow:hidden;white-space:nowrap;}
.sprite-Discovery_Kids_logo{ background-position: 0 0; width: 100px; height: 100px; } 
.sprite-Disneydigitalbooks{ background-position: 0 -105px; width: 100px; height: 100px; } 
.sprite-Lego{ background-position: 0 -210px; width: 100px; height: 100px; } 
.sprite-NGLittleKids{ background-position: 0 -315px; width: 100px; height: 100px; } 
.sprite-NickJrLogo{ background-position: 0 -420px; width: 100px; height: 100px; } 
.sprite-PBS_Kids{ background-position: 0 -525px; width: 100px; height: 100px; } 
.sprite-Starfall{ background-position: 0 -630px; width: 100px; height: 100px; } 
.sprite-TumbleBook{ background-position: 0 -735px; width: 100px; height: 98px; } 
.sprite-TumbleBookCloud{ background-position: 0 -838px; width: 100px; height: 98px; } 
.sprite-TumbleBookCloudjr{ background-position: 0 -941px; width: 100px; height: 98px; } 
.sprite-TumbleBook_icon{ background-position: 0 -1044px; width: 100px; height: 100px; } 
.sprite-Yahookids{ background-position: 0 -1149px; width: 100px; height: 100px; } 
.sprite-barbie{ background-position: 0 -1254px; width: 100px; height: 100px; } 
.sprite-cartoon_network{ background-position: 0 -1359px; width: 100px; height: 100px; } 
.sprite-chugginton{ background-position: 0 -1464px; width: 100px; height: 100px; } 
.sprite-coloring_com{ background-position: 0 -1569px; width: 100px; height: 100px; } 
.sprite-disneygames{ background-position: 0 -1674px; width: 104px; height: 104px; } 
.sprite-funbrain{ background-position: 0 -1783px; width: 100px; height: 100px; } 
.sprite-sesamestreet{ background-position: 0 -1888px; width: 100px; height: 100px; } 
.sprite-youtube{ background-position: 0 -1993px; width: 115px; height: 50px; } 
</style>
<header class="hd-top color1" style="width:100%;">
  <nav class=" container_24">
    <a class="hd-logoTitle" href="/"><h2>La Porte County Public Library</h2></a> links will go here
  </nav>
</header>      
<header class="hd-bottom color2" style="width:100%;">
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
      
    </nav>
  </div>
</header>
  <div class="childWholePage" style="overflow: hidden;">
    <div class="childrenSun"></div>
    <div id="" style="" class="container_24">
      <main class="mainArea grid_24 roundAll3" id="main" role="main">
        <?php if ($page['pageHeader']): ?>
          <div id="pageHeader"><?php print render($page['pageHeader']); ?></div>
        <?php endif; ?>
<!-- cool stuff testing-->
        <div class="supPageHeader">
          <div class="roundAll3 insideBoxShadow subPageHeader <?Php print_r($page['pageTitle']["blockify_blockify-page-title"]["#markup"]);?>" ></div>
          <div class="pageTitle color4 roundRight3 outSideBoxShadow " style="position: absolute;top:25%; left:5px;padding-right:5px;">
            <h1><?Php print_r($page['pageTitle']["blockify_blockify-page-title"]["#markup"]);?></h1>
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
      </main> <!-- end of main content--> 
    </div>
   <div class="childrenGrass" style="margin-top:150px;">
      <div style="position: absolute;right: -6em;bottom:-5px;z-index:1">
        <div class="childrenTree linearAnimate"></div>  
      </div>
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
        <h3>Social Library</h3>
        <?php if ($page['search']): ?>
          <div id="search"><?php print render($page['search']); ?></div>
        <?php endif; ?> 
      </div>
    </div>
  </footer>    
  </div>