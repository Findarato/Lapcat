{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Great Picks)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Great Picks"}
			{* {include file="../sections/soonCalendar.tpl"} *} 
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/newestItems.tpl"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
				{include file="../sections/topBooks_teen.tpl"}
				{include file="../sections/delicious.tpl"}
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
	<script src="js/libs/Flux-Slider/js/flux.min.js" type="text/javascript" charset="utf-8"></script>
</body>
</html> 