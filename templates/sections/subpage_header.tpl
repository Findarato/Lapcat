<div class=" " style="margin-bottom:10px;width:100%;height:100%;position:relative;overflow:hidden" title="Subpage Header">
	<div class="roundAll3 insideBoxShadow subPageHeader color5Soft" style="{if $backgroundImage ne ""}background:url({$backgroundImage}) no-repeat scroll{/if};opacity:.75;background-position: 0"></div>
	<div class="color4 roundRight4 outSideBoxShadow" style="position: absolute;top:25%; left:5px;auto;">
	   <h1 style="text-align:right;padding:0 10px 0 5px;height:100%;width:100%">{$pageTitle}</h1>
	</div>
	<div class="subPageCatalogSearch outSideBoxShadow mainBackground" style="">
		<form method="get" action="http://catalog.lapcat.org/search/~/a?a" class="smoothAnimate">
			<select name="searchtype">
				<option value="X" selected="selected">KEYWORD</option>
				<option value="t">TITLE</option>
				<option value="a">AUTHOR</option>
				<option value="d">SUBJECT</option>
			</select>
			<input type="search" name="searcharg" size="20" maxlength="75" value="" placeholder="Search the Catalog">
			<input type="submit" value="GO!" style="position:absolute;bottom:28px; left:348px;padding:4px;display:none;"/>
		</form>
	</div>
</div>
