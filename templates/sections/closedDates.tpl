<div class="blogBox roundAll3" style="height:auto;">
	<div class="roundAll3 titleElement color3">
		Closed Dates
	</div>
	<div id="containerBox" class="insideBoxShadow roundAll3 containerBox" >
  {foreach from=array(
    "New Year's Day January 2, 2012",
    "President's Day - February 20, 2012",
    "Memorial Day - May 28, 2012",
    "Memorial Day - May 28, 2012",
    "Independence Day - July 4, 2012",
    "Labor Day - September 3, 2012",
    "Veteran's Day November 12, 2012",
    "Thanksgiving Eve - November 23, 2012 Library Closes at 5:00 pm",
    "Thanksgiving Day - November 22, 2012",
    "Christmas Eve - December 24, 2012",
    "Christmas Day - December 25, 2012",
    "New Year's Eve - December 31, 2012 Library Closes at 5:00pm",
    "New Year's Day - January 1, 2013"
    )  item=d}
    <div class="boardMember" style="display:table">
      <!-- Container for date -->
      <div style="display:table-cell;vertical-align: top;">
        <div style="width:100%">
          {$d}
        </div>
      </div>
    </div>	  
  {/foreach}
	</div>
</div>
