<div class=" " style="margin-bottom:10px;width:100%;height:100%;position:relative;overflow:hidden">
  <div class="roundAll3 insideBoxShadow subPageHeader" style="{if $backgroundImage ne ""}background:#fff url({$backgroundImage}) no-repeat scroll{/if};opacity:.75;background-position: 0"></div>
  <div class="color4 roundRight4 outSideBoxShadow" style="position: absolute;top:25%; left:5px;auto;">
    <h1 style="text-align:right;padding:0 10px 0 5px;height:100%;width:100%">{$pageTitle}</h1>
  </div>
  <div class="subPageCatalogSearch insideBoxShadow">
    <div class="catalog ">
      <form method="get" action="http://catalog.lapcat.org/search/~/a?a">
        <div style="display:table">
          <div style="display:table-cell">
            <select name="searchtype">
              <option value="X" selected="selected">KEYWORD</option>
              <option value="t">TITLE</option>
              <option value="a">AUTHOR</option>
              <option value="d">SUBJECT</option>
            </select>
          </div>
          <div style="display:table-cell">
            <input type="search" name="searcharg" size="20" maxlength="75" placeholder="Search the Catalog">
            <input type="submit" value="GO!" style="display:none;"/>
          </div>
        </div>
      </form>
    </div>
    <div style="display:inline-block;vertical-align: top;">
      <a alt="Need Help?" class="icon-help fontShadow" href="/help.php"  style="font-size:1.2rem"></a>
    </div>
  </div>
</div>