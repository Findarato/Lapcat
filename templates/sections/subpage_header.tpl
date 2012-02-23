<div class=" " style="margin-bottom:10px;width:100%;height:100%;position:relative" title="Subpage Header">
	<div class="roundAll3 insideBoxShadow subPageHeader" style="{if $backgroundImage ne ""}background:url({$backgroundImage}) no-repeat scroll{/if};opacity:.75"></div>
	<h1 class="floatingHeader">{$pageTitle}</h1>
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
