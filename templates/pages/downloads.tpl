{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Downloads)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground roundAll3" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Downloads" backgroundImage="images/LaPorte_County_Public_Library.jpg"}			
			<section class="grid_16">
				{include file="../sections/newestDownloads.tpl"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
			  {include file="../sections/downloadLinks.tpl"}
				{include file="../sections/newBooks.tpl"}
				{include file="../sections/delicious.tpl"}
				{include file="../sections/searchSite.tpl"}
			</aside>
			<section class="grid_24" style="margin-top:10px;margin-right:auto;"></section>
		</div>
		<footer class="grid_24" style="margin-top:10px;margin-right:auto;">
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