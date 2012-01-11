<!doctype html> <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="La Porte County Public Library">
		<meta name="author" content="La Porte County Public Library">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-- CSS concatenated and minified via ant build script-->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/oldStyle.css">
		<link rel="stylesheet" href="css/roundCorners.css">
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Buda:light' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css' />
		<!-- end CSS-->
		<script src="js/libs/modernizr-2.0.6.min.js"></script> 
	</head>
	<body>
		<div id="container" style="">
			{include file="header.tpl"}
			<div class="mainArea" id="main" role="main">
				{include file="mainNavagation.tpl"}
				{include file="soonCalendar.tpl"}
				{include file="countDown.tpl"}
			</div>
			<footer>
				<!--{include file="footer.tpl"}-->
			</footer>
		</div>
		<!--! end of #container -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
		<!-- scripts concatenated and minified via ant build script-->
		<script defer src="js/plugins.js"></script>
		<script defer src="js/script.js"></script>
		
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	

		<!-- end scripts-->
		<script>
			// Change UA-XXXXX-X to be your site's ID
			window._gaq = [['_setAccount', 'UA80672081'], ['_trackPageview'], ['_trackPageLoadTime']];
			Modernizr.load({
				load : ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
			});
			$("a").live("click", function () { 
			var uri = $(this).attr("href");
			_gaq.push(['_trackEvent', 'pages', 'click', uri]);
			});
		</script>
	</body>
</html>
