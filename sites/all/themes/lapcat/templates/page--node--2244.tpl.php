<!--Teens Page-->

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
<div class="teenWholePage" style="overflow: hidden;">
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
        <section id="mainContent" class="grid_12">
          <?php print render($page['content']); ?>      
        </section>
        <aside id="side" class="grid_12">
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