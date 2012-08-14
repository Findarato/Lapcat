{include file="../sections/html_header.tpl"  title="La Porte County Public Library"}
<body class="sixteen colgrid">
  <div id="container" class="container">
    <div class="row">
      <div class="sixteen columns">
        {include file="../sections/header.tpl"}
      </div>
    </div>
    <div class="row mainArea">
      <div class="sixteen columns">
        {include file="../sections/mainNavagation.tpl"}
      </div>
    </div>
    <div class="row mainArea" >
      <section class="ten columns" >
        <div style="margin-left:5px">
          {include file="../sections/blog.tpl"}
        </div>
      </section>
      <aside class="six columns">
        <div style="margin-right:5px">
          {include file="../sections/twitter.tpl"}
          {include file="../sections/socialMedia.tpl"}
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
  <script defer src="js/mainNavRotate.js"></script>
</body>
</html> 