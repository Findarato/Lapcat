{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Downloads)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Downloads"}
			{* {include file="../sections/soonCalendar.tpl"} *} 
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/newestItems.tpl"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
				{include file="../sections/topBooks_teen.tpl"}
				{include file="../sections/delicious.tpl"}
					<a href="../about/meetingroomform.pdf">meeting room reservation form</a>
	<a href="../about/mission.html">mission statement</a>
	<a href="about/mobilelibraryschedule.pdf">mobile library</a>
	<a href="../about/vision.html">vision</a>
	<a href="../about/librarybrochure.pdf">welcome brochure</a>
		<a href="../about/Meeting.pdf">meeting room policy</a>
			<a href="../about/applicationform.pdf">employment application form</a>
	<a href="../about/membership form.pdf">friends application form</a>
	<a href="../about/material.html">material selection policy</a>
				<div class="geekOfTheWeek insideBoxShadow roundAll3">
					Geek of the Week Photo
				</div>
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
	<script defer src="js/downloads.js"></script>
</body>
</html> 