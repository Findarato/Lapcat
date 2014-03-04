<style>
  .bookCoverImage a{
    min-width:75px;
    min-height:100px;
    display:inline-block;  
  }
</style>

<header>
  <div class="masterHeader">
    <a href="/" alt="Logo" title="La Porte County Public Library">
      <img class="logoImage" src="/sites/all/themes/laporteLibrary/assets/images/2014logo_notext.svg" alt="logo" title="Logo" id="logo" />
      <h1><?Php print $site_name; ?></h1>
    </a>
  </div>
  <nav class="masterHeaderMenu">
    <?php if ($page['menuHeader']): ?>
      <input class="menuToggle" type="checkbox" id="menuToggle">
      <div id="menuHeader">
        <?php print render($page['menuHeader']); ?>
      </div>
      <?php endif; ?>
  </nav>
      <!--
    <?php if ($page['pageTopMenu']): ?>
    <div id="pageTopMenu">
      <?php print render($page['pageTopMenu']); ?>
    </div>
    <?php endif; ?>-->
  <div class="topHeaderMenu">

  </div>
</header>
<div class="colorWave"></div>
  <!-- Catalog Search-->
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
            <input class="" type="search" name="searcharg" placeholder="Search the Catalog">
          </div>
          <div class="spc-Submit td" >
            <input type="submit" value="GO!"/>
          </div>
          <div class="spc-Links td" >
            <a href="https://catalog.lapcat.org:444/patroninfo" alt="My Account Link">My Account</a>
          </div>
          <div class="spc-Links td" >
            <a href="help" alt="get Help">?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End Catalog Search-->
<div class="colorWave"></div>
  <?php if ($messages): ?>
  <div id="console" class="clearfix"><?php print $messages; ?></div>
  <?php endif; ?>
<main class="mainArea" id="main" role="main">
  <div class="clear"></div>
  <section id="mainContent" class="">
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>      
  </section>
  <aside id="side" class="">
    <?php if ($page['rightSide']): ?>
      <div id="rightSide"><?php print render($page['rightSide']); ?></div>
    <?php endif; ?>
    <?php print $feed_icons; ?>
  </aside>
</main> <!-- end of main content-->
  <div class="clear"></div>
  <div class="colorWave"></div>
  <footer> 
    <div class="t" style="width:100%;bottom:0px;position:relative">
      <div class="footerLeft"> <!--Links-->
        <?php if ($page['pageLinks']): ?>
          <div id="pageLinks" ><?php print render($page['pageLinks']); ?></div>
        <?php endif; ?>
      </div>
      <div class="footerRight">
        <?php if ($page['search']): ?>
          <div id="search"><?php print render($page['search']); ?></div>
        <?php endif; ?> 
      </div>
    </div>
  </footer>