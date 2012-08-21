{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Ask)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground roundAll3" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Ask A Librarian"}
			{* {include file="../sections/soonCalendar.tpl"} *} <div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/askALibrarian.tpl"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
				{include file="../sections/twitter.tpl"}
				{include file="../sections/delicious.tpl"}
				{include file="../sections/searchSite.tpl"}
			</aside>
			<div class="clear"></div>
		</div>
		<footer class="grid_24" style="margin-top:10px;margin-right:auto;">
			{include file="../sections/sitemap.tpl"}
		</footer>
	</div>
	<!--! end of #container -->
	{include file="../sections/footerjs.tpl"} <script src="js/libs/Flux-Slider/js/flux.min.js" type="text/javascript" charset="utf-8"></script>
	<script defer src="js/downloads.js"></script>
</body>
</html> 