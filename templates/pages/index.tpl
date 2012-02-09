{include file="../sections/html_header.tpl"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24" id="main" role="main">
			{include file="../sections/mainNavagation.tpl"}
			{include file="../sections/soonCalendar.tpl"} 
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/blog.tpl"}
			</section>
			<aside class="grid_8">
				{include file="../sections/twitter.tpl"}
				{include file="../sections/delicious.tpl"}
				<div class="geekOfTheWeek insideBoxShadow roundAll3">
					Geek of the Week Photo
				</div>
			</aside>
			<div class="clear"></div>
			<footer class="grid_24" style="margin-top:10px;margin-right:auto;">
				{include file="../sections/footer.tpl"}
			</footer>
		</div>
		<nav class="grid_24" style="margin-top:10px;margin-right:auto;">
			{include file="../sections/sitemap.tpl"}
		</nav>	
	</div>
	<!--! end of #container -->
	{include file="../sections/footerjs.tpl"}
</body>
</html> 