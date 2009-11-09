<!--//                    //-->
<!--// live-test-2009.php //-->
<!--//                    //-->

<!--// Stage - Play //-->
<div class="color-background" id="stage-play" style="width:100%;">
	<div class="image-background" id="lapcat|background" style="height:930px; width:auto;">

		<div class="shine-less" style="height:18px; width:100%;">
			<div style="float:left; width:285px;"><a class="" href="javascript:F_SetDockable(0);F_MR('/home/reset/ajax',true);" onfocus="javascript:this.blur();" style="margin-left:6px;">La Porte County Public Library System</a></div>

			<!--// Interface - Dockables //-->
			<div id="interface-dockables" style="float:right;"></div>

			<!--// LINK - Close //-->
			<div style="float:right; margin-right:16px;">
				<a class="dark-red" href="javascript:F_CloseDockable();" id="interface-close-dockable" onfocus="javascript:this.blur();" style="font-weight:bold;"></a>
			</div>

		</div>

		<!--// LOGO - LAPCAT //-->
		<div style="float:left; height:58px; width:100%;">

			<div style="float:left; height:58px; margin-left:8px; width:101px;">
				<a href="javascript:F_MR('/home/reset/ajax',true);" onfocus="javascript:this.blur();"><img src="/lapcat/images/101-58-1.png" style="height:58px; width:101px;"/></a>
			</div>
			<div style="float:left; height:58px; width:179px;">
				<a href="javascript:F_MR('/home/reset/ajax',true);" onfocus="javascript:this.blur();"><img src="/lapcat/images/100-18-0.png" style="height:18px; margin-top:10px; width:100px;"/></a><font class="med-grey" style="margin-left:2px;">&trade;</font><br/><font style="font-size:14px;">My Library, Online</font>
			</div>

			<!--// Stage - User Status //-->
			<div id="stage-user-status" style="float:right; padding-top:6px; width:284px;"></div>

			<!--// Stage - Hotkey Holder //-->
			<div id="hotkey-holder" style="display:none; float:right; width:auto;"></div>

		</div>

		<div style="float:left; width:100%;">
			<!--// AJAX - Throbber //-->
			<div style="float:left; height:20px; margin-left:2px; width:20px;">
				<div id="loading-dots" style="display:none;"><img src="/lapcat/images/loading-dots.gif" style="height:auto; width:auto;"/></div>
			</div>

			<!--// Interface - Main Menu //-->
			<div id="interface-main-menu" style="float:left;">
				<!--// Home //-->
				<div class="menu-link" id="tab-home" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/house.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">Home</font></div>
				<!--// My Library //-->
				<div class="menu-link" id="tab-my-library" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; display:none; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/house.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">My Library</font></div>
				<!--// News //-->
				<div class="menu-link" id="tab-news" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/newspaper.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">News</font></div>
				<!--// Events //-->
				<div class="menu-link" id="tab-events" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">Events</font></div>
				<!--// Materials //-->
				<div class="menu-link" id="tab-materials" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/book_open.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">Materials</font></div>
				<!--// Databases //-->
				<div class="menu-link" id="tab-databases" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/database.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">Databases</font></div>
				<!--// Hours //-->
				<div class="menu-link" id="tab-hours" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/time.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">Hours</font></div>
				<!--// Jobs //-->
				<div class="menu-link" id="tab-jobs" name="tabs" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/user_suit.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">Jobs</font></div>
			</div>

		</div>

		<div style="float:left; vertical-align:top; width:100%;">

			<!--// LAPCAT - Normal Display (Dockables) //-->
			<div class="color-off" id="lapcat-dockable" style="border:0; float:left; height:576px; position:absolute; top:21px; left:0px; width:100%; z-index:-8; vertical-align:top;">
				<iframe id="dockable-content" src="" style="border:0; height:576px; visibility:visible; width:100%;"></iframe>
			</div>

			<!--// LAPCAT - Normal Display //-->
			<div class="border-main-1" style="float:left; height:495px; vertical-align:top; margin-left:0.5%; margin-right:0.5%; width:99%;">

				<!--// DISPLAY - Displays //-->
				<div class="shine-less" style="float:left; width:100%;">

						<table style="height:495px; width:100%;">
							<tr>
								<td rowspan="2" style="height:495px; vertical-align:top; width:180px;">
									<table style="height:495px; vertical-align:top;">
										<tr><td style="vertical-align:top; width:180px;">
											<div style="height:269px; float:left; overflow:hidden; vertical-align:top; width:180px;">
												<div style="float:left; width:180px;">
													<div id="interface-tiny-menu" style="height:16px; width:180px;">
														<div id="interface-tiny-main-option" style="float:left; padding-top:4px; height:16px; width:65px;">
															<!--// Button - Random //-->
															<div class="button-clicks toggle-button fred" id="button-random" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; margin-left:3px; text-align:center; vertical-align:top; width:60px;" title="Randomize this search."><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">random</font></div>
															<!--// Button - Reset //-->
															<div class="button-clicks toggle-button fred" id="button-reset" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; margin-left:3px; text-align:center; vertical-align:top; width:60px;" title="Reset this search."><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">reset</font></div>
														</div>
														<div id="interface-tiny-options" style="float:left; padding-top:4px; width:auto;">
															<!--// Button - Favorites //-->
															<div class="button-clicks toggle-button" id="button-favorites" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show my favorites."><img src="/lapcat/images/31-31-92.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Anticipated //-->
															<div class="button-clicks toggle-button" id="button-anticipated" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show my anticipated events."><img src="/lapcat/images/31-31-0.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Summer //-->
															<div class="button-clicks toggle-button" id="button-summer" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show Summer Reading Program events."><img src="/lapcat/images/31-31-10.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Slider //-->
															<div class="button-clicks toggle-button" id="button-slider" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show LAPCAT Slider events."><img src="/lapcat/images/31-31-11.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Collected //-->
															<div class="button-clicks toggle-button" id="button-collected" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show my collection."><img src="/lapcat/images/31-31-94.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
														</div>
													</div>
												</div>
												<div id="interface-tiny-menu" style="float:left; vertical-align:top; width:180px;"></div>
												<div id="interface-search-options" style="float:left; vertical-align:top; width:180px;">
	<div id="container-change-tag" style="display:none; float:left; height:41px; padding-left:3px; width:176px;">
		<div style="float:left; height:21px; vertical-align:bottom; width:176px;">
			<div style="float:left;"><font class="med-grey" style="font-size:10px;">Tag</font></div>
			<div id="tag-selected" style="float:right; padding-left:3px; width:10px;"></div>
			<div id="change-tag-catalog-link" style="float:right; width:auto;"></div>
		</div>
		<div style="float:left; width:176px;">
			<form id="change-tag-action" action="javascript:F_PushButton(8);" autocomplete="off" method="get" style="float:left;">
				<input class="dropdown image-lines" id="change-tag-input" onkeyup="javascript:F_PushButton(8);" onblur="javascript:this.value=F_CheckDrop('this.value');"  onfocus="javascript:this.value='';" type="text" value="search here" style="float:right; width:150px;">
				<div id="change-tag-RSS" style="float:left; visibility:hidden; width:20px;"><a href="" id="change-tag-RSS-link" style="float:left; width:20px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/feed.png" id="rss-feed-image" style="float:left; height:16px; margin:2px; width:16px;" height="16px" width="16px" title=""/></a></div>
			</form>
		</div>
	</div>
												</div>
												<div id="interface-date-selector" style="display:none; float:left; width:180px;">
													<div style="height:20px; width:180px;">
														<div style="float:left;"><font class="med-grey" style="font-size:10px; padding-left:4px;">Date</font></div>
														<div id="date-selected" style="float:right; padding-left:3px; width:10px;"></div>
														<div style="float:right; width:auto;"><font id="change-date-selected" style="font-size:10px;"></font></div>
													</div>
													<div style="width:180px;">
														<button class="option-theme fg-button round-corners white" id="button-date-selector" style="float:left; font-size:12px; padding:2px; margin-left:3px; width:70px; z-index:7;">Select</button>
													</div>
												</div>
												<div id="interface-list-menu" style="float:left; vertical-align:top; overflow:hidden; width:180px;"></div>
												<div id="interface-left-menu" style="float:left; vertical-align:top; overflow:hidden; width:180px;"></div>
											</div>
										</td></tr>
										<tr><td style="height:224px;">
											<div class="border-dark-1" style="float:left; height:214px; margin-bottom:2px; margin-top:4px; vertical-align:bottom; text-align:center; width:180px;"><img id="interface-promotions" src="" /></div>
										</td></tr>
									</table>
								</td>
								<td style="height:24px; vertical-align:top; width:auto;">
									<div class="border-bot-dark-1" style="float:right; height:24px; width:100%;">
										<div id="interface-screen-buttons" style="float:left; padding-top:5px; width:379px;">
											<!--// Button - Previous Page //-->
											<div class="toggle-button fred button-clicks" id="button-previous-page" onfocus="javascript:this.blur();" style="float:left; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" />previous</font></div>
											<!--// Button - Previous Record //-->
											<div class="toggle-button fred button-clicks" id="button-previous-record" onfocus="javascript:this.blur();" style="float:left; margin-left:4px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" /></font></div>
											<!--// Button - Next Page //-->
											<div class="toggle-button fred button-clicks" id="button-next-page" onfocus="javascript:this.blur();" style="float:right; height:12px; text-align:center; visibility:hidden; width:60px;"><font class="white" style="font-weight:bold; font-size:10px; vertical-align:top;">next<img src="/lapcat/layout/icons/4-7-1.png" style="height:7px; margin-left:3px; width:4px;" /></font></div>
											<!--// Button - Next Record //-->
											<div class="toggle-button fred button-clicks" id="button-next-record" onfocus="javascript:this.blur();" style="float:right; margin-right:4px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div>
										</div>
										<div id="interface-other-buttons" style="float:right; width:379px; padding-right:3px; padding-top:5px;">
											<!--// Button - Log Out //-->
											<div class="toggle-button fred button-clicks" id="button-log-out" onfocus="javascript:this.blur();" style="display:none; float:right; height:12px; text-align:center; width:60px;"><font class="white" style="font-weight:bold; font-size:10px; vertical-align:top;">log out</font></div>
										</div>
									</div>
								</td>
							</tr><tr>
								<td style="height:477px; vertical-align:top; width:100%;">
									<div class="border-dark-1 darker fred" style="padding:2px; height:460px; width:auto;">
										<div class="darker" id="interface-content-displays" style="height:460px; vertical-align:top; width:100%;">
											<div id="destination-content"></div>
										</div>
									</div>
								</td>
							</tr>
						</table>

				</div>
			</div>

		</div>

    	<!--// FOOTER - Information //-->
		<div id="lapcat|footer" style="height:auto; margin-left:0.5%; margin-right:0.5%; vertical-align:bottom; margin-top:6px; width:99%;">
			<div style="width:100%;"><font>By your continued use of this site, you agree to be bound by and abide by the <a href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a>.<br>Copyright 2007-2009, La Porte County Public Library System.<br><a href="/lapcat/files/Mission.pdf" target="_blank">About Us</a> | <a href="/lapcat/files/Meeting.pdf" target="_blank">Meeting Room Policy</a> | <a href="/lapcat/files/WebsiteUserGuidelines.pdf" target="_blank">Guidelines</a> | <a href="/lapcat/files/WebsitePrivacyPolicy.pdf" target="_blank">Privacy Policy</a> | <a href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a><br>LAPCAT <font style="font-size:10px;">&trade;</font> databases running MySQL are professionally monitored and managed by La Porte County Public Library System staff.</font></div>
			<div style="margin-top:8px; width:100%;"><a href="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="font-size:14px;" target="_blank" title="Open catalog in a new window.">Open the catalog in a new window.</a></div>
		</div>

	</div>

</div>

<!--// STAGE - List //-->
<div id="stage-list" style="display:none;">
	<div id="part-parameters" style="float:left; height:0px; overflow:hidden; width:0px;">
		<div class="border-bot-off-1 color-hex" id="part-list-header-cell" style="height:19px; width:100%;">
			<font class="gold" id="part-list-header" style="padding-left:4px;"></font>
		</div>
		<table cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				<td id="part-list-cells" style="height:auto; overflow:hidden; vertical-align:top; width:100%;"></td>
				<td id="part-list-open-line" style="width:auto;"></td>
			</tr>
		</table>
	</div>
</div>

<!--// STAGE - List Cell - Interests //-->
<div id="stage-list-cell-interests" style="display:none;">
	<div class="border-bot-dark-1" id="part-list-line" style="float:left; height:44px; text-align:center; width:100%;">
		<div style="height:22px; overflow:hidden; text-align:left; width:100%;">
			<a class="browse" href="/News/browse/replace-dirty-name/ajax" onfocus="javascript:this.blur();" style="margin-left:6px;">replace-clean-name</a>
		</div>
		<div style="height:22px; overflow:hidden; text-align:left; width:100%;">
			<font class="dark-grey" style="font-size:10px; margin-left:12px;">at</font><font class="gold" style="font-size:12px; margin-left:3px;">replace-username</font>
			<font class="dark-grey" style="font-size:10px;">on</font><a href="/News/calendar/replace-o-date/ajax" style="font-size:12px; margin-left:3px;">replace-date-words</a>
			<a class="basic-tag-link fake-link gold" id="tag-replace-tag-ID" style="float:right; margin-right:3px;">replace-tag-name</a>
		</div>
	</div>
</div>

<!--// STAGE - List Cell - Possibles //-->
<div id="stage-list-cell-possibles" style="display:none;">
	<div class="border-bot-dark-1" id="part-list-line" style="float:left; height:44px; text-align:center; width:100%;">
		<div style="height:22px; overflow:hidden; text-align:left; width:100%;">
			<a class="browse" href="/Events/browse/replace-dirty-name/ajax" onfocus="javascript:this.blur();" style="margin-left:6px;">replace-clean-name</a>
		</div>
		<div style="height:22px; overflow:hidden; text-align:left; width:100%;">
			<font class="dark-grey" style="font-size:10px; margin-left:12px;">at</font><a href="/Events/change-search/replace-library-ID/ajax" style="font-size:12px; margin-left:3px;">replace-library</a>
			<font class="dark-grey" style="font-size:10px;">on</font><a href="/Events/calendar/replace-o-date/ajax" style="font-size:12px; margin-left:3px;">replace-date-words</a>
			<div id="anticipation-bar-replace-ID" style="float:left; height:4px; padding-left:5px; padding-right:5px; width:100%;"></div>
		</div>
	</div>
</div>

<!--// STAGE - List Cell - Suggestions //-->
<div id="stage-list-cell-suggestions" style="display:none;">
	<div id="part-list-line" style="float:left; height:146px; text-align:center; width:159px;">
		<div style="height:22px; overflow:hidden; text-align:center; width:100%;">
			<a class="browse-link" id="replace-dirty-name" name="materials" onfocus="javascript:this.blur();">replace-clean-name</a>
			<!--//<a class="browse" href="/Materials/browse/replace-dirty-name/ajax" onfocus="javascript:this.blur();">replace-clean-name</a>//-->
		</div>
		<div style="height:114px; overflow:hidden; text-align:center; width:100%;">
			<table style="height:114px; width:100%;"><tr><td style="vertical-align:top; width:auto;">
				<center>
					<div style="height:114px; vertical-align:bottom; padding-left:15px;">
						<a class="no-icon-link" href="http://catalog.lapcat.org/search/ireplace-ISBNorSN" id="catalog-ISBN-link-replace-ID" onfocus="javascript:this.blur();"><img id="suggestions-replace-ISBNorSN-cover" src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></a>
					</div>
				</center>
			</td><td style="vertical-align:top; width:20px;">
				<div id="suggestion-replace-ID-search" style="float:left; height:18px; width:18px;">
					<a class="catalog-link" href="http://catalog.lapcat.org/search/ireplace-ISBNorSN" id="catalog-ISBN-link-replace-ID" onfocus="javascript:this.blur();" style="font-size: 14px; margin-right:1px;"></a>
				</div>
				<div id="suggestion-replace-ID-catalog-link" style="float:left; height:18px; margin-top:2px; width:18px;">
					<a class="browse" href="/Materials/browse/replace-dirty-name/ajax" onfocus="javascript:this.blur();"><img src="http://cdn1.lapcat.org/famfamfam/silk/book_open.png" style="border:0; height:auto; width:auto;"/></a>
				</div>
			</td></tr></table>
		</div>
	</div>
</div>
<!--// Stage - List Cell - Browse //-->
<div id="stage-list-cell-browse" style="display:none;">
	<div class="line" id="part-list-line-replace-ID" style="height:40px; margin-top:3px; margin-bottom:2px; width:387px;">
		<div class="open-line-click" id="click-replace-ID" onclick="" style="height:40px; vertical-align:top; width:387px;">
			<div style="float:left; height:41px; overflow:hidden; width:387px;">
				<div style="float:left; height:21px; overflow:hidden; width:387px;">
					<font id="part-list-line-replace-ID-font" style="padding-left:3px;">replace-clean-name</font>
				</div>
				<div id="line-group-icons-replace-ID" style="height:20px; overflow:hidden; width:387px;">
			<img id="icon-replace-ID-33" src="/lapcat/images/31-31-33.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-50" src="/lapcat/images/31-31-50.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-51" src="/lapcat/images/31-31-51.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-10" src="/lapcat/images/31-31-10.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-11" src="/lapcat/images/31-31-11.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-0" src="/lapcat/images/31-31-0.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-92" src="/lapcat/images/31-31-92.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
			<img id="icon-replace-ID-94" src="/lapcat/images/31-31-94.png" style="display:none; float:right; height:16px; width:16px; margin-right:3px;" title="" />
				</div>
			</div>
		</div>
	</div>
</div>
<!--// Stage - Open Line //-->
<div id="stage-open-line" style="display:none;">
	<div class="border-main-1 color-dark dark-all fred" id="part-open-line" style="float:left; height:452px; width:100%;">
		<div class="shine-less" style="height:452px; position:relative; width:auto;">
			<div class="light-down" id="content-graphics-line" style="position:absolute; height:452px; width:100%; z-index:4;">
				<div id="open-line-tags" style="padding:2px; padding-top:6px; width:100%; z-index:6;"></div>
				<div id="open-line-options" style="padding-top:415px; width:100%; z-index:6;">
					<span class="option-black fg-button round-corners option-expand" id="option-expand" onclick="" style="display:none; float:right; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-expand" style="font-size:12px;">Expand</a></span>
					<span class="option-black fg-button round-corners" id="option-favorite" onclick="javascript:F_PushButton(9);" style="display:none; float:left; margin-left:3px; padding:2px; width:64px;"><a class="white" id="font-favorite" style="font-size:12px;">Favorite</a></span>
					<span class="option-black fg-button round-corners" id="option-watched" onclick="javascript:F_PushButton(11);" style="display:none; float:left; margin-left:3px; padding:2px; width:64px;"><a class="white" id="font-watched" style="font-size:12px;">Anticipate</a></span>
					<span class="option-black fg-button round-corners" id="option-watchlist" onclick="javascript:F_PushButton(13);" style="display:none; float:left; margin-left:3px; padding:2px; width:64px;"><a class="white" id="font-watchlist" style="font-size:12px;">Watch</a></span>
					<span class="option-black fg-button round-corners" id="option-collection" onclick="javascript:F_PushButton(12);" style="display:none; float:left; margin-left:3px; padding:2px; width:64px;"><a class="white" id="font-collection" style="font-size:12px;">Collect</a></span>
					<span class="option-theme fg-button round-corners" id="option-similar" onclick="javascript:F_PushButton(10);" style="display:none; float:left; margin-left:3px; padding:2px; width:64px;"><a class="white" id="font-similar" style="font-size:12px;">Similar</a></span>
				</div>
            </div>
			<div id="content-open-line" style="position:absolute; height:auto; width:100%; margin-top:20px; z-index:5;"></div>
		</div>
	</div>
</div>
<!--// Stage - News Content //-->
<div id="stage-news-content" style="display:none;">
	<div style="float:left; height:4px; width:100%;"></div>
	<div style="float:left; height:20px; width:100%;">
		<div style="float:left;"><font style="font-size:16px; margin-left:8px;">replace-name</font></div>
		<div style="float:right;"><font>replace-total-views</font>
		<font class="dark-grey" style="font-size:10px; margin-right:6px;"> VR</font></div>
	</div>
	<div style="float:left; width:100%;">
		<div style="height:374px; width:auto; margin:4px; margin-top:0;">
			<div class="border-off-1 darker" style="height:374px; width:auto;">
				<div style="height:25px; overflow:hidden; width:auto;">
					<font class="dark-grey" style="font-size:12px; margin-left:8px;">by</font>
					<a class="rss-link" href="" id="rss-feed-link-name"><font class="gold" style="font-size:14px; margin-left:3px;">replace-username</font></a>
					<font class="dark-grey" style="font-size:12px; margin-left:3px;">on</font>
					<a href="" id="date-search" style="font-size:14px; margin-left:3px;">replace-date-words</a>
					<div class="increase-font-size" id="button-increase-font" onclick="" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-top:1px; width:16px;" title="Increase Font Size"><img class="fake-link" src="http://cdn1.lapcat.org/famfamfam/silk/add.png" style="float:left; height:16px; position:absolute; width:16px;" /></div>
					<div class="decrease-font-size" id="button-decrease-font" onclick="" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-top:1px; width:16px;" title="Decrease Font Size"><img class="fake-link" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="float:left; height:16px; position:absolute; width:16px;" /></div>
				</div>
				<div style="height:349px; margin-right:1px; overflow:auto; padding-left:6px; padding-right:6px; width:auto;">
					<font id="open-line-description-font" style="font-size:12px;">replace-description</font>
				</div>
			</div>
		</div>
	</div>
</div>