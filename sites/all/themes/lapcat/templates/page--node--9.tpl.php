<!--Teens Page-->

<style>
  .subPageHeader{
    background-image: url('<?php print $base_path . $directory .'/images/teen.png'; ?>');
    background-repeat:no-repeat;
  }
  .childrenTree{
    background-image: url('<?php print $base_path . $directory .'/images/tree.svg'; ?>');
    background-repeat:no-repeat;
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
    height:100px;
    width:100px;
    display:block;
  }
  .flickrPicture{
    margin:5px;
    padding:3px;
    display:inline-block;
    height:100px;
    width:100px;
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
<div class="teenWholePage" style="overflow: hidden;">
    <div class="childrenSun"></div>
    <div id="" style="" class="container_24">
      <div class="mainArea grid_24 roundAll3" id="main" role="main">
        <?php if ($page['pageHeader']): ?>
          <div id="pageHeader"><?php print render($page['pageHeader']); ?></div>
        <?php endif; ?>
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