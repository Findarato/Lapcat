<header>
  <div class="masterHeader">
    <a class="masterHeaderLogo" href="/" alt="Logo" title="La Porte County Public Library">
      <!--<img class="logoImage" src="/sites/all/themes/laporteLibrary/assets/images/2014logo_notext.svg" alt="logo" title="Logo" id="logo" />-->
      <?Php include($_SERVER['DOCUMENT_ROOT']."/sites/all/themes/laporteLibrary/assets/images/2014logo_notext.svg");  ?>
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
  <!-- Catalog Search-->
  <?php if ($page['search']): ?>
   <?php print render($page['search']); ?>
  <?php endif; ?> 
  <!-- End Catalog Search-->
<div class="colorWave"></div>
      <?php if ($messages): ?>
      <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
  <main class="mainArea" id="main" role="main">
    <div class="shadowColors">
      <div class="banner">
       <?php if ($page['featured_slider']): ?>
        <div id="featured-slider" class="">
          <?php print render($page['featured_slider']); ?>
        </div> <!-- End Featured Slider-->
      <?php endif; ?>
      </div>
    </div>
    <div class="newArticles">
      <h1>What's New @ the Library</h1> 
      <div class="tagRow">
        <a href="/taxonomy/term/76">Arts</a>
        <a href="/taxonomy/term/77">Books, Movies, Music</a>
        <a href="/taxonomy/term/8">Children</a>
        <a href="/taxonomy/term/85">Community</a>
        <a href="/taxonomy/term/11">History</a>
        <a href="/taxonomy/term/78">Home</a>
        <a href="/taxonomy/term/79">Library News</a>
        <a href="/taxonomy/term/80">Parents and Educators</a>
        <a href="/taxonomy/term/81">Technology</a>
        <a href="/taxonomy/term/50">Teens</a>
        <a href="/taxonomy/term/82">Work</a>
      </div>
      <div class="newArticlesContainer">
        <?php if ($page['articleHighlight']): ?>
           <div id="articleHighlight" class="articleHighlight"><?php print render($page['articleHighlight']); ?></div>
        <?php endif; ?>
        <?php if ($page['articleBlocks']): ?>
           <div id="articleBlocks" class="articleBlocks"><?php print render($page['articleBlocks']); ?></div>
        <?php endif; ?>
      </div>
    </div>
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