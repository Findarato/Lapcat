{include file="../sections/html_header.tpl"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Teens"}
			{* {include file="../sections/soonCalendar.tpl"} *} 
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/flicker.tpl"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
				{*{include file="../sections/catalogSearch.tpl"}*}				
				{include file="../sections/countDown.tpl"}
				{*{include file="../sections/twitter.tpl"}*}
				{include file="../sections/topBooks_teen.tpl"}
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
	<script src="js/libs/twitter/jquery.tweet.js"></script>
	<script src="https://apis.google.com/js/plusone.js"></script>
	<script src="js/libs/jflickrfeed/jflickrfeed.min.js"></script>
	<script src="js/libs/cycle/jquery.cycle.all.min.js"></script>
	<script defer src="js/plugins.js"></script>
	<script defer src="js/script.js"></script>
	

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