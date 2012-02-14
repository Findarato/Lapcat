{include file="../sections/html_header.tpl"  title="La Porte County Public Library (Hours and Locations)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Locations" backgroundImage="http://maps.googleapis.com/maps/api/staticmap?center=41.609126,-86.721036&zoom=10&size=560x85&scale=2&sensor=false"}
			{* {include file="../sections/soonCalendar.tpl"} *} 
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/location.tpl" location="coolspring"}
				{include file="../sections/location.tpl" location="fish"}
				{include file="../sections/location.tpl" location="hanna"}
				{include file="../sections/location.tpl" location="kingsford"}
				{include file="../sections/location.tpl" location="main"}
				{include file="../sections/location.tpl" location="rolling"}
				{include file="../sections/location.tpl" location="union"}
				{*{include file="../sections/mainContent.tpl"}*}
			</section>
			<aside class="grid_8">
				{*{include file="../sections/catalogSearch.tpl"}*}
				{include file="../sections/twitter.tpl"}
				{include file="../sections/delicious.tpl"}
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
</body>
</html> 