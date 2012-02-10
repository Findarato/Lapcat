	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
	<!-- scripts concatenated and minified via ant build script-->
	<script src="/js/libs/twitter/jquery.tweet.js"></script>
	<script src="https://apis.google.com/js/plusone.js"></script>

	<script src="js/plugins.js"></script>
	<script>var inside = false;inside = "{$inside}";</script>
	<script src="js/script.js"></script>
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