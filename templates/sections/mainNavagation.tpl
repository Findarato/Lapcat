<nav class="navDisplay">
  <div class="grid_6 leftNav" >
    <!-- Left Colmn -->
    <div class="smallSection hours">
      <a class="hoursNav smoothAnimate fixMargin" href="hours.php" ></a>
      <div class="sectionText">
        <a href="hours.php">Hours</a>
      </div>
    </div>
    <div class="smallSection greatPicks">
      <a class="greatPicksNav smoothAnimate fixMargin" href="greatpicks.php"></a>
      <div class="sectionText">
        <a href="greatpicks.php">Great Picks!</a>
      </div>
    </div>
    <div class="smallSection genealogy">
      <a class="genealogyNav smoothAnimate fixMargin" href="genealogy.php" ></a>
      <div class="sectionText">
        <a href="genealogy.php">Genealogy</a>
      </div>
    </div>
  </div>
  <div class="grid_12">
    <div class="mediumSection">
      <div class="fixMargin">
        <form method="get" action="http://catalog.lapcat.org/search/X?" class="catalogNav smoothAnimate">
          <select class="" name="searchtype">
            <option value="X" selected="selected">KEYWORD</option>
            <option value="t">TITLE</option>
            <option value="a">AUTHOR</option>
            <option value="d">SUBJECT</option>
          </select>
          <input type="search" name="searcharg" size="20" maxlength="75" value="" placeholder="Search the Catalog" >
          <input class="insideBoxShadow" type="submit" value="GO!">
        </form>
      </div>
    </div>
    <!-- Middle Colmn -->
    <div id="middleSectionContainer" class="middleSection " style="position:relative;">
      <div class="smoothAnimate flexslider" id="middleScrollContainer">
        <ul class="slides">
          <li>
            <a href="http://laportelibrary.org"><img src="/images/rotate2.jpg" alt="" title="Cool 2"/></a>
            <p class="flex-caption">Caption 2!</p>
          </li>
          <li>
            <a href="http://laportelibrary.org"><img src="/images/rotate3.jpg" alt="" title="Cool 3"/></a>
            <p class="flex-caption">Cool 3</p>
          </li>
          <li>
            <a href="http://www.google.com"><img src="/images/rotate4.jpg" alt="" title="Cool 4"/></a>
            <p class="flex-caption">Cool 4</p>
          </li>
        </ul>
        <div id="flexControlls" class="flexControlls"></div>
      </div>
    </div>
  </div>
  <div class="grid_6 rightNav" >
    <!-- Right Colmn -->
    <div class="smallSection events">
      <a class="askNav smoothAnimate fixMargin" href="ask.php" ></a>
      <div class="sectionText">
        <a href="ask.php">Ask A Librarain</a>
      </div>
    </div>
    <div class="smallSection research">
      <a class="aboutNav smoothAnimate fixMargin" href="about.php" ></a>
      <div class="sectionText">
        <a href="about.php"> About Us</a>
      </div>
    </div>
    <div class="smallSection research">
      <a class="employmentNav smoothAnimate fixMargin" href="jobs.php" ></a>
      <div class="sectionText">
        <a href="jobs.php">Employment</a>
      </div>
    </div>
  </div>
</nav>

{*
<div class="t navDisplay" style="width:auto;height:300px;margin:0 auto;">
  <div class="tr"></div>
</div>
*}