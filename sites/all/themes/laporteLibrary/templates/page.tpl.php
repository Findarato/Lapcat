<header>
  <div class="masterHeader">
    <a class="masterHeaderLogo" href="/" alt="Logo" title="La Porte County Public Library">
      <img class="logoImage" src="/sites/all/themes/laporteLibrary/assets/images/2014logo_notext.svg" alt="logo" title="Logo" id="logo" />
    </a>
    <a class="masterHeaderTitle" href="/" alt="Logo" title="La Porte County Public Library">
      <h1><?Php print $site_name; ?></h1>
    </a>
    
    <div class="topHeaderMenu">
      <label for="menuToggle" class="icon-menu menuToggleButton"></label>
      <a class="socialLinks" href="https://www.facebook.com/laportelibrary" alt="Facebook">
        <img src="/sites/all/themes/laporteLibrary/assets/images/socialMedia/facebook.svg" alt="Facebook">
      </a>
      <a class="socialLinks" href="https://twitter.com/lpcpls" alt="Twitter">
        <img src="/sites/all/themes/laporteLibrary/assets/images/socialMedia/twitter.svg" alt="Twitter">
      </a>
      <a class="socialLinks" href="https://plus.google.com/101643741377376006619" alt="Google+">
        <img src="/sites/all/themes/laporteLibrary/assets/images/socialMedia/plus.svg" alt="Google+">
      </a>
      <a class="socialLinks" href="http://www.youtube.com/user/LaporteCoLibrary" alt="YouTube">
        <img src="/sites/all/themes/laporteLibrary/assets/images/socialMedia/youtube.svg" alt="YouTube">
      </a>
      <a class="socialLinks" href="http://instagram.com/laportelibrary" alt="Instagram">
        <img src="/sites/all/themes/laporteLibrary/assets/images/socialMedia/instagram.svg" alt="Instagram">
      </a>
      <a class="socialLinks" href="http://www.flickr.com/photos/laportelibrary" alt="Flickr">
        <img src="/sites/all/themes/laporteLibrary/assets/images/socialMedia/flickr.svg" alt="Flicky">
      </a>
    </div>
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
</header>
<div class="colorWave"></div>
  <?php if ($messages): ?><div id="console"><?php print $messages; ?></div><?php endif; ?>
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
  <main class="mainArea" id="main" role="main">
    <section id="breadCrumbs" class="breadCrumbs">
      <?php print render($page['breadCrumbs']); ?>
    </section>
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
  <footer> 
    <div class="t" style="width:100%;bottom:0px;position:relative">
     <?php if ($page['pageLinks']): ?>
      <div>
        <div id="pageLinks" ><?php print render($page['pageLinks']); ?></div>
      </div>
      <?php endif; ?>
      <?php if ($page['search']): ?>
      <div>
       <div id="search"><?php print render($page['search']); ?></div>
      </div>
      <?php endif; ?> 
    </div>
  </footer>