<nav class="navDisplay">
	<div class="grid_6 leftNav" >
		<!-- Left Colmn -->
		<div class="smallSection">
			<a class="downloadsNav smoothAnimate fixMargin" href="downloads.html" ></a>
			<div class="sectionText">
				Downloads
			</div>
		</div>
		<div class="smallSection">
			<a class="greatPicksNav smoothAnimate fixMargin" href="greatpicks.php"></a>
			<div class="sectionText">
				Great Picks!
			</div>
		</div>
		<div class="smallSection">
			<a class="researchNav smoothAnimate fixMargin" href="research.php" ></a>
			<div class="sectionText">
				Research
			</div>
		</div>
	</div>
	<div class="grid_12">
		<div class="mediumSection">
			<div class="fixMargin">
				<form method="get" action="http://catalog.lapcat.org/search/~/a?a" class="catalogNav smoothAnimate">
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
		<!-- Middle Colmn -->
		<div id="middleSectionContainer" class="middleSection smoothAnimate" style="text-align:center;position:relative;overflow:hidden;">
			<div class="smoothAnimate" id="middleSectionScrollContainer" style="position:absolute;top:0px;left:0px;width:100%"></div>
			<div id="middleScrollContainer" style="z-index: 10;position:absolute;padding:5px;bottom:1px;right:4px;background:rgba(0,0,0,.6);text-align:right;"></div>
		</div>
	</div>
	<div class="grid_6 rightNav" >
		<!-- Right Colmn -->
		<div class="smallSection">
			<a class="genealogyNav smoothAnimate fixMargin" href="genealogy.php" ></a>
			<div class="sectionText">
				Genealogy
			</div>
		</div>
		<div class="smallSection">
			<a class="eventsNav smoothAnimate fixMargin" href="http://engagedpatrons.org/Events.cfm?SiteID=9267" ></a>
			<div class="sectionText">
				Events
			</div>
		</div>
		<div class="smallSection">
			<a class="hoursNav smoothAnimate fixMargin" href="hours.php" ></a>
			<div class="sectionText">
				Hours
			</div>
		</div>
	</div>
</nav>
{*
<div class="t navDisplay" style="width:auto;height:300px;margin:0 auto;">
	<div class="tr"></div>
</div>
*}