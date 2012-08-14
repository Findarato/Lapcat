<nav class=" row">
  <div class="four columns" >
    <div class="smallSection hours">
      <a class="hoursNav smoothAnimate fixMargin" href="hours.php" ></a>
      <div class="sectionText">
        Hours
      </div>
    </div>
    <div class="smallSection greatPicks">
      <a class="greatPicksNav smoothAnimate fixMargin" href="greatpicks.php"></a>
      <div class="sectionText">
        Great Picks!
      </div>
    </div>
    <div class="smallSection genealogy">
      <a class="genealogyNav smoothAnimate fixMargin" href="genealogy.php" ></a>
      <div class="sectionText">
        Genealogy
      </div>
    </div>
  </div>
  <div class="eight columns">
    <div class="mediumSection">
      <div class="fixMargin">
        <form method="get" action="http://catalog.lapcat.org/search/X?" class="catalogNav smoothAnimate">
          <select class="" name="searchtype">
            <option value="X" selected="selected">KEYWORD</option>
            <option value="t">TITLE</option>
            <option value="a">AUTHOR</option>
            <option value="d">SUBJECT</option>
          </select>
          <input type="search" name="searcharg" size="20" maxlength="75" value="" placeholder="Search the Catalog" style="width:250px;margin-left:10px;;">
          <input class="insideBoxShadow" type="submit" value="GO!">
        </form>
      </div>
    </div>
    <!-- Middle Colmn -->
    <div id="middleSectionContainer" class="middleSection " style="position:relative;">
      <div class="" id="middleSectionScrollContainer" style="position:absolute;top:0px;left:0px;width:100%"></div>
      <div class="smoothAnimate flexslider" id="middleScrollContainer">
        <ul class="slides">
          <li>
            <a href="/ask.php"><img src="/images/ConanTheLibrarian.jpg" alt="" title="Ask a Librarian"/></a>
            <p class="flex-caption">
              Have a question? Ask a Librarian!
            </p>
          </li>
          <li>
            <a href="http://laportelibrary.org"><img src="/images/rotate2.jpg" alt="" title="Cool 2"/></a>
            <p class="flex-caption">
              Caption 2!
            </p>
          </li>
          <li>
            <a href="http://laportelibrary.org"><img src="/images/rotate3.jpg" alt="" title="Cool 3"/></a>
          </li>
          <li>
            <a href="http://www.google.com"><img src="/images/rotate4.jpg" alt="" title="Cool 4"/></a>
          </li>
        </ul>
        <div id="flexControlls" class="flexControlls"></div>
      </div>
    </div>
  </div>
  <div class="four columns" >
    <!-- Right Colmn -->
    <div class="smallSection events">
      <a class="eventsNav smoothAnimate fixMargin" href="http://engagedpatrons.org/Events.cfm?SiteID=9267" ></a>
      <div class="sectionText">
        Events
      </div>
    </div>
    
    <div class="smallSection research">
      <a class="aboutNav smoothAnimate fixMargin" href="about.php" ></a>
      <div class="sectionText">
        About Us
      </div>
    </div>
    <div class="smallSection research">
      <a class="employmentNav smoothAnimate fixMargin" href="jobs.php" ></a>
      <div class="sectionText">
        Employment
      </div>
    </div>
  </div>
</nav>