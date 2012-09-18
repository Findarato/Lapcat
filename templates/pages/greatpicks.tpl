{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Great Picks)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground roundAll3" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Great Picks" backgroundImage="/images/stock-illustration-18812296-green-book-stack.jpg"}
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/newestItems.tpl"}
			</section>
			<aside class="grid_8">
				{include file="../sections/newBooks.tpl"}
				{include file="../sections/searchSite.tpl"}
			</aside>
			<div class="clear"></div>
			<section class="grid_24" style="margin-top:10px;margin-right:auto;">
				{*{include file="../sections/allHours.tpl"}*}
			</section>
		</div>
		<footer class="grid_24" style="margin-top:10px;margin-right:auto;">
			{include file="../sections/sitemap.tpl"}
		</footer>
	</div>
	<!--! end of #container -->
	{include file="../sections/footerjs.tpl"}
	<link rel="stylesheet" href="/js/libs/FlexSlider/flexslider.css" type="text/css">
  <script src="js/libs/FlexSlider/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
	<script>
	  $(window).load(function(){
      wowbraryImageLinks("http://www.wowbrary.org/rss.aspx?l=8711&c=GEN",$("#topBooks").find(".slides"),true,"New This Week",10); 
    });
	</script>
</body>
</html> 