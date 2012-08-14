{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Downloads)"}
<body class="sixteen colgrid">
  <div id="container" class="container">
    <div class="row">
      <div class="sixteen columns">
        {include file="../sections/header.tpl"}
      </div>
    </div>
    <div class="row mainArea">
      <div class="sixteen columns">
        {include file="../sections/subpage_header.tpl" pageTitle="Downloads" backgroundImage="images/LaPorte_County_Public_Library.jpg"}
      </div>
    </div>
    <div class="row mainArea" >
      <section class="ten columns" >
        <div style="margin-left:5px">
                  {include file="../sections/newestDownloads.tpl"}
        {*{include file="../sections/mainContent.tpl"}*}
        </div>
      </section>
      <aside class="six columns">
        <div style="margin-right:5px">
        {include file="../sections/downloadLinks.tpl"}
        {include file="../sections/newBooks.tpl"}
        {include file="../sections/delicious.tpl"}
        {include file="../sections/searchSite.tpl"}
        </div>
      </aside>
    </div>
    <footer class="row">
      {include file="../sections/sitemap.tpl"}
    </footer>
  </div>
  <!--! end of #container -->
  {include file="../sections/footerjs.tpl"}
  <link rel="stylesheet" href="/js/libs/FlexSlider/flexslider.css" type="text/css">
  <script src="js/libs/FlexSlider/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
  <script defer src="js/downloads.js"></script>
</body>
</html> 