{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Teens)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Teens" backgroundImage="images/teen.png"}
			{* {include file="../sections/soonCalendar.tpl"} *} 
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/flicker.tpl" flickerTitle="Community Art" flickerLink="http://www.flickr.com/photos/laportelibrary/tags/teens/"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
				{*{include file="../sections/catalogSearch.tpl"}*}				
				{include file="../sections/countDown.tpl"}
				{*{include file="../sections/twitter.tpl"}*}
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
		<div id="testStuff"></div>
	</div>
		<div class="childrenGrass">
			<div class="childrenTree linearAnimate"></div>
		</div>	
	<!--! end of #container -->
	{include file="../sections/footerjs.tpl"}
	<script src="js/libs/countdown/jquery.countdown.js"></script>
	<script src="js/libs/Flux-Slider/js/flux.min.js" type="text/javascript" charset="utf-8"></script>
	<script defer src="js/teen.js"></script>
</body>
</html> 