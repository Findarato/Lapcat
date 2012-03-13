<nav class="navDisplay">
	<div class="grid_6 leftNav" >
		<!-- Left Colmn -->
		<div class="smallSection events">
			<a class="eventsNav smoothAnimate fixMargin" href="http://engagedpatrons.org/Events.cfm?SiteID=9267" ></a>
			<div class="sectionText">
				Events
			</div>
		</div>
		<div class="smallSection hours">
			<a class="hoursNav smoothAnimate fixMargin" href="hours.php" ></a>
			<div class="sectionText">
				Hours
			</div>
		</div>
		<div class="smallSection research">
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
		<div id="middleSectionContainer" class="middleSection " style="position:relative;">
			<div class="" id="middleSectionScrollContainer" style="position:absolute;top:0px;left:0px;width:100%"></div>
			<div class="smoothAnimate flexslider" id="middleScrollContainer">
				<ul class="slides">
					<li>
						<a href="http://laportelibrary.org"><img src="/images/rotate1.jpg" alt="" title="Cool 1"/></a>
						 <p class="flex-caption">Let the Dark Side control you!</p>
					</li>
					<li>
						<a href="http://laportelibrary.org"><img src="/images/rotate2.jpg" alt="" title="Cool 2"/></a>
						<p class="flex-caption">Caption 2!</p>		
					</li>
					<li>
						<a href="http://laportelibrary.org"><img src="/images/rotate3.jpg" alt="" title="Cool 3"/></a>		
					</li>
					<li>
						<a href="http://www.google.com"><img src="/images/rotate4.jpg" alt="" title="Cool 4"/></a>		
					</li>
					<li>
						<a href="http://www.google.com"><img src="/images/rotate5.jpg" alt="" title="Cool 5"/></a>		
					</li>
				</ul>
				<div id="flexControlls" class="flexControlls"></div>				
			</div>
		</div>
	</div>
	<div class="grid_6 rightNav" >
		<!-- Right Colmn -->
		<div class="smallSection genealogy">
			<a class="genealogyNav smoothAnimate fixMargin" href="genealogy.php" ></a>
			<div class="sectionText">
				Genealogy
			</div>
		</div>
		<div class="smallSection Downloads">
			<a class="downloadsNav smoothAnimate fixMargin" href="downloads.php" ></a>
			<div class="sectionText">
				Downloads
			</div>
		</div>
		<div class="smallSection greatPicks">
			<a class="greatPicksNav smoothAnimate fixMargin" href="greatpicks.php"></a>
			<div class="sectionText">
				Great Picks!
			</div>
		</div>		
	</div>
</nav>

{*
<div class="t navDisplay" style="width:auto;height:300px;margin:0 auto;">
	<div class="tr"></div>
</div>
*}