{include file="../sections/html_header.tpl" title="La Porte County Public Library (Research)"}
<body>
	<div id="container" style="" class="container_24">
		{include file="../sections/header.tpl"}
		<div class="mainArea grid_24 mainBackground roundAll3" id="main" role="main">
			{include file="../sections/subpage_header.tpl" pageTitle="Employment" backgroundImage="/images/stock-illustration-8034749-job-searching-effects.jpg"}
			<div class="clear"></div>
			<section class="grid_16">
				{include file="../sections/libraryEmployment.tpl"}
				{include file="../sections/jobsLocalResources.tpl"}
			</section>
			<aside class="grid_8">
				{include file="../sections/jobsResources.tpl"}
				{include file="../sections/twitter.tpl"}
				{include file="../sections/searchSite.tpl"}
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
	<script defer src="js/mylibs/jobs.js"></script>
</body>
</html> 