<?php /* Smarty version 2.6.24, created on 2010-05-27 17:06:22
         compiled from header.tpl */ ?>
			<!--// Interface - Main Menu //-->
			<div class="shadow-up" id="interface-main-menu" style="float:left; height:20px; width:100%;">
				<div class="shadow-up" style="background-position:0px 2px; height:20px; width:100%;">

				<!--// Home //-->
				<a class="menu-Y-65 font-X shadow-or-light-Y-up menu-move-click" href="/" id="menu-home" style="cursor:pointer; display:block; float:left; height:18px; margin-left:6px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/house.png" style="height:16px; margin-left:4px; width:16px;" /><font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Home</font></a>
				<!--// News //-->
				<a class="menu-Y-65 font-X shadow-or-light-Y-up menu-move-click" href="/new/news" id="menu-news" style="cursor:pointer; display:block; float:left; height:18px; margin-left:6px;">
					<img src="http://cdn1.lapcat.org/famfamfam/silk/newspaper.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" />
					<font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">News</font>
				</a>
				<!--// Events //-->
				<div class="menu-Y-65 font-X menu-move-click shadow-or-light-Y-up" id="menu-events" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:3px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Events</font></div>
				<!--// Materials //-->
				<a class="menu-Y-65 font-X shadow-or-light-Y-up menu-move-click" href="/new/materials" id="menu-materials" style="cursor:pointer; display:block; float:left; height:18px; margin-left:6px;">
					<img src="http://cdn1.lapcat.org/famfamfam/silk/book_open.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" />
					<font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Materials</font>
				</a>
				<!--// Databases //-->
				<a class="menu-Y-65 font-X shadow-or-light-Y-up menu-move-click" href="/new/databases" id="menu-databases" style="cursor:pointer; display:block; float:left; height:18px; margin-left:6px;">
					<img src="http://cdn1.lapcat.org/famfamfam/silk/database.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" />
					<font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Databases</font>
				</a>
				<!--// Hours //-->
				<a class="menu-Y-65 font-X shadow-or-light-Y-up menu-move-click" href="/new/hours" id="menu-hours" style="cursor:pointer; display:block; float:left; height:18px; margin-left:6px;">
					<img src="http://cdn1.lapcat.org/famfamfam/silk/time.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" />
					<font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Hours</font>
				</a>
				<!--// Hiring //-->
				<div class="menu-Y-65 font-X menu-move-click shadow-or-light-Y-up" id="menu-hiring" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:3px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/user_suit.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="color:inherit; font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Hiring</font></div>

				<!--// Change Tag //-->
				<div class="drops-out-top" id="container-change-tag" style="display:none; float:left; height:18px; margin-left:24px; width:115px;">

					<div style="float:left; position:absolute; width:33px; top:28px; text-align:left;"><div style="height:15px; margin-left:7px;"><font class="font-X" style="font-size:9px;">Tag</font></div></div>

					<div class="corners-bottom-2 shadow-up" style="background-position:0px 2px; float:left; width:101px;"><form id="change-tag-action" action="javascript:$(this).find('#change-tag-master').keyup();" autocomplete="off" method="get" style="float:left; height:18px; margin-left:2px; text-align:center; width:98px;" title="Click then type to change tags for all searches."><input class="drops corners-bottom-2 dropdown-A-1 tag-box fake-link" id="change-tag-master" type="text" value="tag search" style="border-top:0; height:17px; padding-left:4px; width:88px;"></form></div>

					<div style="float:left; width:14px;"><div id="tag-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:3px; width:10px;"><img class="remove-from-all-searches fake-link" id="remove-tag" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this tag from the search." /></div></div>

					<div class="dropdown drops-out font-fake" id="change-tag-drops-lines" style="display:none; margin-top:17px; position:relative; right:52px; width:175px; z-index:10;"></div>

				</div>

				<!--// Change Type //-->
				<div class="drops-out-top" id="container-change-type" style="display:none; float:left; height:19px; width:115px;">

					<div style="float:left; position:absolute; width:33px; top:28px; text-align:left;"><div style="height:15px; margin-left:7px;"><font class="font-X" style="font-size:9px;">Type</font></div></div>

					<div class="corners-bottom-2" style="float:left; width:98px;"><div class="drops corners-bottom-2 dropdown fake-link" id="change-type-drops" onfocus="javascript:this.blur();" style="border-top:0; float:left; height:19px; margin-left:3px; text-align:center; width:96px;" title="Click to change material type."><font class="font-G" id="change-type-master" style="float:left; font-size:14px; height:19px; margin-left:3px; overflow:hidden; text-align:left; width:80px;"></font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; width:10px;">+</font></div></div>

					<div style="float:left; width:14px;"><div id="type-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:3px; width:10px;"><img class="remove-from-search fake-link" id="remove-type" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this criteria from the search." /></div></div>

					<div class="dropdown drops-out font-fake" id="change-type-drops-lines" style="display:none; margin-top:18px; position:relative; right:52px; width:175px; z-index:10;"></div>

				</div>

				<!--// Change Search //-->
				<div class="drops-out-top" id="container-change-search" style="display:none; float:left; height:19px; width:115px;">

					<div style="float:left; position:absolute; width:33px; top:28px; text-align:left;"><div style="height:15px; margin-left:7px;"><font class="font-X" style="font-size:9px;">Show</font></div></div>

					<div class="corners-bottom-2" style="float:left; width:98px;"><div class="drops corners-bottom-2 dropdown fake-link" id="change-search-drops" onfocus="javascript:this.blur();" style="border-top:0; float:left; height:19px; margin-left:3px; text-align:center; width:96px;" title="Click to change the search criteria."><font class="font-G" id="change-search-master" style="float:left; font-size:14px; height:19px; margin-left:3px; overflow:hidden; text-align:left; width:80px;"></font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; width:10px;">+</font></div></div>

					<div style="float:left; width:14px;"><div id="search-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:3px; width:10px;"><img class="remove-from-search fake-link" id="remove-search" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this criteria from the search." /></div></div>

					<div class="dropdown drops-out font-fake" id="change-search-drops-lines" style="display:none; margin-top:18px; position:relative; right:52px; width:175px; z-index:10;"></div>

				</div>

				</div>
			</div>