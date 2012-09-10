{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Downloads)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="About the Library" backgroundImage="images/LaPorte_County_Public_Library.jpg"}			
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/missionVision.tpl"}
				<section class="grid_8" style="margin-left:0px;">
				  {include file="../sections/libraryServices.tpl"}
				</section>
				<section class="grid_8 " style="margin-right:0px;">
				  {include file="../sections/libraryDownloads.tpl"}  
        </section>
			</section>
			<aside class="grid_8">
        {include file="../sections/closedDates.tpl"}
				{include file="../sections/searchSite.tpl"}
			</aside>
			<div class="clear"></div>
			<section class="grid_24" style="margin-top:10px;margin-right:auto;">
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

	<script defer src="js/downloads.js"></script>
</body>
</html> 