<div class=" " style="width:100%;height:100%;position:relative">
	<div class="roundAll3 insideBoxShadow subPageHeader secondNav" style="background:url({$backgroundImage}) no-repeat scroll,rgba(0,0,0,.6) 100% 100% ;opacity:.75"></div>
	<h2 style="position:absolute;left:100px;right:100px;top:10px;opacity:1;z-index: 10">{$pageTitle}</h2>
	<div class="subPageCatalogSearch outSideBoxShadow mainBackground" style="">
		<form method="get" action="http://catalog.lapcat.org/search/~/a?a" class="smoothAnimate">
			<select name="searchtype">
				<option value="X" selected="selected">KEYWORD</option>
				<option value="t">TITLE</option>
				<option value="a">AUTHOR</option>
				<option value="d">SUBJECT</option>
			</select>
			<input type="text" name="searcharg" size="20" maxlength="75" value="" placeholder="Search the Catalog">
			<input type="submit" value="GO!" style="position:absolute;bottom:28px; left:348px;padding:4px;display:none;"/>
		</form>
	</div>
</div>
