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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
	<!-- scripts concatenated and minified via ant build script-->
	<script src="js/libs/twitter/jquery.tweet.js" type="text/javascript"></script>
	<script defer src="js/plugins.js"></script>
	<script defer src="js/script.js"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<script src="/js/mainNavRotate.js"></script>
	<!-- end scripts-->
	<script>
		// Change UA-XXXXX-X to be your site's ID
		window._gaq = [['_setAccount', 'UA80672081'], ['_trackPageview'], ['_trackPageLoadTime']];
		Modernizr.load({
			load : ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		});
		$("a").live("click", function() {
			var uri = $(this).attr("href");
			_gaq.push(['_trackEvent', 'pages', 'click', uri]);
		});

	</script>
</body>
</html> 