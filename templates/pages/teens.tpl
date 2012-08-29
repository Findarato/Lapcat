{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Teens)"}
<body>
  <div class="wholePage" style="overflow: hidden;">
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground roundAll3" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Teens" backgroundImage="images/teen.png"}
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/blog.tpl"}
				{include file="../sections/flicker.tpl" flickerTitle="Community Art" flickerLink="http://www.flickr.com/photos/laportelibrary/tags/teens/"}
			</section>
			<aside class="grid_8">
				{include file="../sections/newBooks.tpl"}
				{include file="../sections/socialMedia.tpl"}
				{include file="../sections/searchSite.tpl"}
			</aside>
			<div class="clear"></div>
		</div>
		<footer class="grid_24" style="margin-top:10px;">
			{include file="../sections/sitemap.tpl"}
		</footer>
		<div id="testStuff"></div>
	</div>
		<div class="childrenGrass">
			<div class="childrenTree linearAnimate"></div>
		</div>
	</div>
	<!--! end of #container -->
	{include file="../sections/footerjs.tpl"}
	<link rel="stylesheet" href="/js/libs/FlexSlider/flexslider.css" type="text/css">
	<script src="js/libs/FlexSlider/jquery.flexslider-min.js" type="text/javascript" charset="utf-8"></script>
	<script defer src="js/teen.js"></script>
</body>
</html> 