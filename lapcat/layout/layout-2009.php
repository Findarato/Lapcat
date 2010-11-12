<!--//                 //-->
<!--// layout-2009.php //-->
<!--//                 //-->

<!--// Curtains //-->
<div id="curtains" style="display:none;"><div id="stage-curtains"></div></div>

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

			<div id="hotkey-holder" style="display:none; float:right; width:auto;">

				<!--// HOTKEY - 1 //-->
				<div class="hidden option-all" id="bar-hotkey-pop-1" style="float:right; margin-right:8px; margin-top:1px; visibility:hidden;">
					<div class="hotkey OL-fred" id="bar-hotkey-link-1" onclick="" onfocus="javascript:this.blur();" style="cursor:pointer; height:50px; width:52px;">
						<img id="bar-hotkey-1" src="/lapcat/layout/images/1-1-0.png" style="height:42px; padding-top:4px; width:42px;"/></div>
					<div class="darker OL-fred" style="margin-top:2px; height:18px; width:52px;">
						<font class="opposite" style="font-size:12px;"><span id="bar-hotkey-info-1"></span></font></div>
				</div>

				<!--// HOTKEY - 2 //-->
				<div class="hidden option-all" id="bar-hotkey-pop-2" style="float:right; margin-right:8px; margin-top:1px; visibility:hidden;">
					<div class="hotkey OL-fred" id="bar-hotkey-link-2" onclick="" onfocus="javascript:this.blur();" style="cursor:pointer; height:50px; width:52px;">
						<img id="bar-hotkey-2" src="/lapcat/layout/images/1-1-0.png" style="height:42px; padding-top:4px; width:42px;"/></div>
					<div class="darker OL-fred" style="margin-top:2px; height:18px; width:52px;">
						<font class="opposite" style="font-size:12px;"><span id="bar-hotkey-info-2"></span></font></div>
				</div>

				<!--// HOTKEY - 3 //-->
				<div class="hidden option-all" id="bar-hotkey-pop-3" style="float:right; margin-right:8px; margin-top:1px; visibility:hidden;">
					<div class="hotkey OL-fred" id="bar-hotkey-link-3" onclick="" onfocus="javascript:this.blur();" style="cursor:pointer; height:50px; width:52px;">
						<img id="bar-hotkey-3" src="/lapcat/layout/images/1-1-0.png" style="height:42px; padding-top:4px; width:42px;"/></div>
					<div class="darker OL-fred" style="margin-top:2px; height:18px; width:52px;">
						<font class="opposite" style="font-size:12px;"><span id="bar-hotkey-info-3"></span></font></div>
				</div>

				<!--// HOTKEY - 4 //-->
				<div class="hidden option-all" id="bar-hotkey-pop-4" style="float:right; margin-right:8px; margin-top:1px; visibility:hidden;">
					<div class="hotkey OL-fred" id="bar-hotkey-link-4" onclick="" onfocus="javascript:this.blur();" style="cursor:pointer; height:50px; width:52px;">
						<img id="bar-hotkey-4" src="/lapcat/layout/images/1-1-0.png" style="height:42px; padding-top:4px; width:42px;"/></div>
					<div class="darker OL-fred" style="margin-top:2px; height:18px; width:52px;">
						<font class="opposite" style="font-size:12px;"><span id="bar-hotkey-info-4"></span></font></div>
				</div>

				<!--// HOTKEY - 5 //-->
				<div class="hidden option-all" id="bar-hotkey-pop-5" style="float:right; margin-right:8px; margin-top:1px; visibility:hidden;">
					<div class="hotkey OL-fred" id="bar-hotkey-link-5" onclick="" onfocus="javascript:this.blur();" style="cursor:pointer; height:50px; width:52px;">
						<img id="bar-hotkey-5" src="/lapcat/layout/images/1-1-0.png" style="height:42px; padding-top:4px; width:42px;"/></div>
					<div class="darker OL-fred" style="margin-top:2px; height:18px; width:52px;">
						<font class="opposite" style="font-size:12px;"><span id="bar-hotkey-info-5"></span></font></div>
				</div>

			</div>

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
														<div id="interface-tiny-main-option" style="float:left; padding-top:4px; height:16px; width:65px;"></div>
														<div id="interface-tiny-options" style="float:left; padding-top:4px; width:auto;"></div>
													</div>
												</div>
												<div id="interface-tiny-menu" style="float:left; vertical-align:top; width:180px;"></div>
												<div id="interface-search-options" style="float:left; vertical-align:top; width:180px;"></div>
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
											<div class="toggle-button fred" id="stage-previous-page-button" onclick="javascript:F_PushButton(0);" onfocus="javascript:this.blur();" style="float:left; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" />previous</font></div>
											<div class="toggle-button fred" id="stage-previous-record-button" onclick="javascript:F_PushButton(1);" onfocus="javascript:this.blur();" style="float:left; margin-left:4px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" /></font></div>
											<div class="toggle-button fred" id="stage-next-page-button" onclick="javascript:F_PushButton(3);" onfocus="javascript:this.blur();" style="float:right; height:12px; text-align:center; visibility:hidden; width:60px;"><font class="white" style="font-weight:bold; font-size:10px; vertical-align:top;">next<img src="/lapcat/layout/icons/4-7-1.png" style="height:7px; margin-left:3px; width:4px;" /></font></div>
											<div class="toggle-button fred" id="stage-next-record-button" onclick="javascript:F_PushButton(2);" onfocus="javascript:this.blur();" style="float:right; margin-right:4px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div>
										</div>
										<div id="interface-other-buttons" style="float:right; width:379px; padding-right:3px; padding-top:5px;">
											<div class="toggle-button fred" id="stage-log-out-button" onclick="javascript:F_PushButton(19);" onfocus="javascript:this.blur();" style="display:none; float:right; height:12px; text-align:center; width:60px;"><font class="white" style="font-weight:bold; font-size:10px; vertical-align:top;">log out</font></div>
										</div>
										<!--//
                                        hotkey
										<div id="lapcat|other-options" style="float:right; height:18px; text-align:left; width:auto;">
											<div id="other-options|create-hotkey" class="hidden" style="width:64px;"><div class="next-button OL-fred" id="option|create-hotkey" onclick="javascript:F_SetDockable(11);" onfocus="javascript:this.blur();" style="float:right; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">Hotkey</font></div></div>
										</div>
										//-->
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
			<!--//<div style="width:100%;"><font>Link<font class="grey">:</font> <span id="area-page-link"></span></font></div>//-->
			<div style="width:100%;"><font>By your continued use of this site, you agree to be bound by and abide by the <a href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a>.<br>Copyright 2007-2009, La Porte County Public Library System.<br><a href="/lapcat/files/Mission.pdf" target="_blank">About Us</a> | <a href="/lapcat/files/Meeting.pdf" target="_blank">Meeting Room Policy</a> | <a href="/lapcat/files/WebsiteUserGuidelines.pdf" target="_blank">Guidelines</a> | <a href="/lapcat/files/WebsitePrivacyPolicy.pdf" target="_blank">Privacy Policy</a> | <a href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a><br>LAPCAT <font style="font-size:10px;">&trade;</font> databases running MySQL are professionally monitored and managed by La Porte County Public Library System staff.</font></div>
			<div style="margin-top:8px; width:100%;"><a href="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="font-size:14px;" target="_blank" title="Open catalog in a new window.">Open the catalog in a new window.</a></div>
		</div>

	</div>

</div>

<!--// Stage //-->

<!--// Stage - Auto Complete //-->
<div id="stage-auto-complete" class="OL-fred color-off" style="display:none; overflow-y:scroll; z-index:7;"></div>
<!--// Stage - Catalog Link //-->
<div id="stage-catalog-link" style="display:none;">
	<a class="catalog-link" href="http://catalog.lapcat.org/search/X?SEARCH=replace-search-name&SORT=D&searchscope=12" id="catalog-link-replace-ID" onfocus="javascript:this.blur();" style="font-size:10px; margin-right:1px;">replace-name</a>
</div>
<!--// Stage - Catalog ISBN Link //-->
<div id="stage-catalog-ISBN-link" style="display:none;">
	<a class="catalog-link" href="http://catalog.lapcat.org/search/ireplace-ISBNorSN" id="catalog-ISBN-link-replace-ID" onfocus="javascript:this.blur();" style="font-size:14px; margin-right:1px;">replace-name</a>
</div>
<!--// Stage - Checkmark //-->
<div id="stage-checkmark" style="display:none;"><img src="http://www.lapcat.org/lapcat/images/10-10-10.png" style="border:0; height:auto; width:auto;"/></div>
<!--// Stage - Dockable Link //-->
<div id="stage-dockable-link" style="display:none;">
	<div style="float:right; margin-right:16px;">
		<a href="javascript:F_SetDockable('replace-ID');" id="dockable-link-replace-ID" onfocus="javascript:this.blur();">replace-ID</a>
	</div>
</div>
<!--// Stage - Header //-->
<div id="stage-header" style="display:none;">
	<div style="float:left; height:20px; min-width:396px;">
		<font class="gold" style="float:left; font-size:14px;">replace-header</font>
	</div>
</div>
<!--// Stage - Possibles List //-->
<div id="stage-possibles-list" style="display:none;">
	<div style="float:left; height:120px; width:396px;">
		<div style="float:left; height:20px; width:396px;">
			<font class="gold" style="float:left; font-size:14px;">replace-header</font>
		</div>
		<div id="replace-types-list-content" style="float:left; height:100px; width:396px;"></div>
	</div>
</div>
<!--// Stage - Icon Button //-->
<div id="stage-icon-button" style="display:none;">
	<div class="toggle-button" id="button-replace-ID" onclick="javascript:F_PushButton(replace-ID);" onfocus="javascript:this.blur();" style="float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="replace-text"><img src="/lapcat/images/31-31-replace-button.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
</div>
<!--// Stage - Interest //-->
<div id="stage-interest" style="display:none;">
	<div class="border-bot-dark-1" id="interest-replace-ID" style="float:left; height:auto; margin-left:6px; text-align:center; width:387px;">
		<div style="height:22px; margin-left:6px; overflow:hidden; text-align:left; width:383px;"><a href="javascript:F_MR('/News/similar/replace-name/ajax');" style="font-size:14px;">replace-name</a></div>
		<div style="height:22px; margin-left:18px; overflow:hidden; text-align:left; vertical-align:bottom; width:367px;">
			<font class="dark-grey" style="font-size:10px; margin-left:3px;">by</font><font class="gold" style="font-size:12px; margin-left:3px;">replace-username</font>
			<font class="dark-grey" style="font-size:10px; margin-left:3px;">on</font><a href="javascript:F_MR('/News/calendar/replace-entered-on/ajax');" style="font-size:12px; margin-left:3px;">replace-date-words</a>
			<a href="javascript:F_ChangeSearch('change-tag',replace-tag-ID);" onfocus="javascript:this.blur();"><font class="gold" style="float:right; font-size:12px;">replace-tag-name</font></a>
		</div>
	</div>
</div>
<!--// Stage - Possible //-->
<div id="stage-possible" style="display:none;">
	<div class="border-bot-dark-1" id="possible-replace-ID" style="float:left; height:auto; margin-left:6px; text-align:center; width:387px;">
		<div style="height:22px; margin-left:6px; overflow:hidden; text-align:left; width:383px;"><a href="javascript:F_MR('/Events/similar/replace-name/ajax');" style="font-size:14px;">replace-name</a></div>
		<div style="height:22px; margin-left:18px; overflow:hidden; text-align:left; width:367px;">
			<font class="dark-grey" style="font-size:10px; margin-left:3px;">at</font><a href="javascript:F_MR('/Events/change-search/'+parseInt(replace-library-ID+1)+'/ajax');" style="font-size:12px; margin-left:3px;">replace-library</a>
			<font class="dark-grey" style="font-size:10px; margin-left:3px;">on</font><a href="javascript:F_MR('/Events/calendar/replace-o-date/ajax');" style="font-size:12px; margin-left:3px;">replace-date-words</a>
			<div id="anticipation-bar-replace-ID" style="float:left; height:4px; padding-left:5px; padding-right:5px; width:300px;"></div>
		</div>
	</div>
</div>
<!--// Stage - Interface Content Displays //-->
<div id="interface-content-displays" style="display:none;">
	<div id="interface-content-0" style="float:left; width:100%;"></div>
	<div style="padding-right:4px; width:auto;">
		<div class="border-bot-off-1 color-hex" id="interface-content-header-1" style="float:left; padding-left:4px; height:17px; width:100%;"></div>
	</div>
	<div id="interface-content-1" style="float:left; height:170px; overflow:hidden; width:100%;"></div>
	<div style="float:left; height:276px; overflow:hidden; width:100%;">
		<div style="float:left; height:276px; width:394px;">
			<div class="border-bot-off-1 color-hex" id="interface-content-header-2" style="float:left; height:17px; padding-left:4px; padding-top:2px; width:394px;"></div>
			<div id="interface-content-2" style="float:left; overflow:hidden; width:100%;"></div>
		</div>
		<div style="float:left; height:276px; width:8px;"></div>
		<div style="float:left; height:276px; width:394px;">
			<div class="border-bot-off-1 color-hex" id="interface-content-header-3" style="float:left; height:17px; padding-left:4px; padding-top:2px; width:394px;"></div>
			<div id="interface-content-3" style="float:left;  overflow:hidden;width:100%;"></div>
		</div>
	</div>
</div>
<!--// Stage - Interface Content //-->
<div id="stage-interface-content" style="display:none;">
	<table style="height:460px; width:100%;"><tr>
		<td style="height:auto; vertical-align:top; width:auto;">
			<table cellspacing="0" cellpadding="0" style="height:auto; margin-top:2px; width:100%;"><tr>
				<td id="content-lines" style="vertical-align:top; padding-top:1px; width:378px;"></td>
				<td style="vertical-align:top; width:auto;">
					<div class="border-main-1 color-dark dark-all fred" style="float:left; height:452px; width:100%;">
						<div class="shine-less" style="height:452px; position:relative; width:auto;">
							<div class="light-down" id="content-graphics-line" style="position:absolute; height:452px; width:100%; z-index:4;"></div>
							<div id="content-open-line" style="position:absolute; height:auto; width:100%; margin-top:20px; z-index:5;"></div>
						</div>
					</div>
				</td>
				<td style="width:4px;"></td>
			</tr></table>
		</td>
	</tr></table>
</div>
<!--// Stage - Line //-->
<div id="stage-line" style="display:none;">
	<div class="line" id="open-line-replace-ID" style="height:40px; float:left; margin-top:3px; margin-bottom:2px; width:369px;">
		<div onclick="javascript:F_OpenLine(replace-ID);" style="height:41px; vertical-align:top; width:100%;">
			<div style="float:left; height:41px; overflow:hidden; width:auto;">
				<div style="float:left; height:21px; overflow:hidden; width:367px;">
					<font style="font-size:10px; padding-left:3px;">replace-key.</font><font style="padding-left:3px;">replace-name</font>
				</div>
				<div id="line-group-icons-replace-ID" style="height:20px; overflow:hidden; width:378px;">
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
<!--// Stage - List Link //-->
<div id="stage-list-link" style="display:none;">
	<div id="list-link-replace-ID" onclick="javascript:F_ChangeSearch('change-tag',replace-ID);" onfocus="javascript:this.blur();" style="cursor:pointer; height:18px; margin-left:1px;"><font class="gold-tag tag tag-replace-ID" style="font-size:12px; margin-left:9px; margin-right:9px;">replace-name</font></div>
</div>
<!--// Stage - Basic Link //-->
<div id="stage-basic-link" style="display:none;">
	<div id="basic-link-replace-ID" style="cursor:pointer; height:18px; margin-left:1px;"><a class="gold-tag tag" href="javascript:F_MR('replace-url');" onfocus="javascript:this.blur();" style="font-size:12px; margin-left:9px;">replace-name</a></div>
</div>
<!--// Stage - Loading Animation //-->
<div id="stage-loading-animation" style="display:none;"><img src="/lapcat/images/loading-dots.gif" style="height:auto; width:auto;"/></div>
<!--// Stage - Main Menu Link //-->
<div id="stage-main-menu-link" style="display:none;">
	<div class="menu-link" id="main-menu-link-replace-ID" onclick="javascript:F_SetMenu('replace-ID');" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:19px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/replace-icon.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font style="font-size:14px; margin-left:2px; margin-right:4px; padding-bottom:2px;">replace-name</font></div>
</div>
<!--// Stage - Materials Cover Image //-->
<div id="stage-materials-cover-image" style="display:none;">
	<a href="javascript:F_SetDockable('Catalog','http://catalog.lapcat.org/search/ireplace-ID');" onfocus="javascript:this.blur();"><img id="D-replace-ID" name="CC_Image" src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></a>
</div>
<!--// Stage - Message //-->
<div id="stage-message" style="display:none;">
	<div id="message-replace-ID" style="height:186px;">
		<font style="font-size:14px; margin-left:9px; margin-right:9px;">replace-text</font>
	</div>
</div>
<!--// Stage - Option //-->
<div id="stage-option" style="display:none;">
	<span class="option-replace-color fg-button round-corners" id="button-replace-name" onclick="javascript:F_PushButton(replace-button);" style="float:right; margin-right:4px;padding:2px; width:70px;"><a id="font-replace-name" class="replace-font">replace-name</a></span>
</div>
<!--// Stage - Possible //-->
<div id="stage-possible" style="display:none;">
	<div id="possible-replace-ID" style="float:left; height:auto; margin-left:6px; text-align:center; width:140px;">
		<div style="height:36px; margin-left:6px; overflow:hidden; text-align:center; width:140px;"><font style="font-size:14px;">replace-name</font></div>
		<center>
			<table style="width:100%;"><tr><td style="text-align:center; vertical-align:top;">
				<div style="float:left; text-align:center; padding-top:4px; width:120px;"><font style="font-size:14px;">replace-o-date</font></div>
				<div id="possible-replace-ID-search" style="float:left; height:18px; width:18px;"></div>
			</td></tr></table>
		</center>
	</div>
</div>
<!--// Stage - Possible Search Link //-->
<div id="stage-possible-search-link" style="display:none;">
	<div id="search-replace-ID" onclick="javascript:F_MR('/events/similar/replace-name/ajax');" style="cursor:pointer; height:16px; text-align:center; width:16px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px; vertical-align:middle;" /></div>
</div>
<!--// Stage - Back Button //-->
<div id="stage-back-button" style="display:none;">
	<div class="toggle-button fred" onclick="javascript:F_PushButton(99);" onfocus="javascript:this.blur();" style="float:left; margin-left:3px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">back</font></div>
</div>
<!--// Stage - Random Button //-->
<div id="stage-random-button" style="display:none;">
	<div class="toggle-button fred" onclick="javascript:F_PushButton(4);" onfocus="javascript:this.blur();" style="float:left; margin-left:3px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">random</font></div>
</div>
<!--// Stage - Reset Button //-->
<div id="stage-reset-button" style="display:none;">
	<div class="toggle-button fred" onclick="javascript:F_PushButton(5);" onfocus="javascript:this.blur();" style="float:left; margin-left:3px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">reset</font></div>
</div>
<!--// Stage - Spacer Button 1 //-->
<div id="stage-spacer-button-1" style="display:none;">
	<div style="float:left; margin-left:4px; margin-top:1px; height:12px; width:58px;"></div>
</div>
<!--// Stage - Spacer Button 2 //-->
<div id="stage-spacer-button-2" style="display:none;">
	<div style="float:right; margin-right:4px; margin-top:1px; height:12px; width:58px;"></div>
</div>
<!--// Stage - Suggestion //-->
<div id="stage-suggestion" style="display:none;">
	<div id="suggestion-replace-ID" style="float:left; height:auto; margin-left:6px; text-align:center; width:140px;">
		<div style="height:40px; margin-left:6px; overflow:hidden; text-align:center; width:140px;">
			<a href="javascript:F_MR('/materials/similar/replace-title/ajax');" onfocus="javascript:this.blur();" style="font-size:14px;">replace-title</a>
		</div>
		<center>
			<table style="width:100%;"><tr><td style="vertical-align:top;">
				<div id="suggestion-replace-ID-cover-image" style="float:right; height:124px; padding-left:5px; vertical-align:bottom; width:83px;">
					<img src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></div>
			</td><td style="vertical-align:top; width:20px;">
				<div id="suggestion-replace-ID-search" style="float:left; height:18px; width:18px;"></div>
				<div id="suggestion-replace-ID-catalog-link" style="float:left; height:18px; margin-top:2px; width:18px;"></div>
				<div id="suggestion-replace-ID-home" style="float:left; height:18px; width:18px;"></div>
			</td></tr></table>
		</center>
		<div style="height:0px; overflow:hidden; visibility:hidden; width:0px;"><span class="" id="suggestion-replace-ID-ISBNorSN" title="">replace-ISBNorSN</span></div>
	</div>
</div>
<!--// Stage - Suggestion Search Link //-->
<div id="stage-suggestion-search-link" style="display:none;">
	<div id="search-replace-ID" onclick="javascript:F_MR('/materials/similar/replace-title/ajax');" style="cursor:pointer; height:16px; text-align:center; width:16px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/book_open.png" style="height:16px; width:16px; vertical-align:middle;" /></div>
</div>
<!--// Stage - Reset Tag //-->
<div id="stage-reset-tag" style="display:none;">
	<a class="dark-red" href="javascript:F_ChangeSearch('replace-search',replace-value);" onfocus="javascript:this.blur();" style="font-size:11px; font-weight:bold;">X</a>
</div>
<!--// Stage - Tag //-->
<div id="stage-tag" style="display:none;">
	<div id="tag-replace-ID" onclick="javascript:F_ChangeSearch('change-tag',replace-tag-ID);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:20px; margin-left:2px; margin-right:4px;"><font class="gold-tag tag tag-replace-tag-ID" style="font-size:12px; font-weight:bold;">replace-name</font></div>
</div>
<!--// Stage - User Status 2 //-->
<div id="stage-user-status-2" style="display:none;">
	<div class="color-dark border-dark-1 fred" style="position:relative; height:64px; padding:2px; float:right; margin-right:6px; text-align:right; width:180px;">
		<div style="position:absolute; width:10px; bottom:3px; left:3px;"></div>
		<a href="/" class="gold" id="LI-username" style="font-size:14px; font-weight:bold; margin-left:4px;">replace-username</a><br/>
		<font><span id="LI-objective-points" style="font-size:12px;">replace-objective-points</span></font><img src="/lapcat/layout/icons/21-21-30.png" style="height:12px; margin-left:2px; margin-right:2px; width:12px;" title="LAPCAT Points" /><br/>
		<font><span id="LI-patron-plus-points" style="font-size:12px;">replace-patron-plus-points</span></font><img src="/lapcat/layout/icons/21-21-31.png" style="height:12px; margin-left:2px; margin-right:2px; width:12px;" title="Patron Plus Points" />
	</div>
</div>
<!--// Stage - User Status 3 //-->
<div id="stage-user-status-3" style="display:none;">
	<div style="float:right; margin-right:6px; width:284px;">
		<form action="/lapcat/code/accounts.php" method="post">
			<div style="float:left; width:220px;">
				<div style="float:right; height:22px; margin-right:6px;">
					<font style="font-size:12px;">Account: </font>
					<input autocomplete="OFF" class="dropdown image-lines" name="username" type="text" style="width:140px;"></div>
				<div style="float:right; height:22px; margin-right:6px;">
					<font style="font-size:12px;">Password: </font>
					<input autocomplete="OFF" class="dropdown image-lines" name="pass" type="password" style="width:140px;"></div>
			</div>
			<div style="float:left; height:44px; width:64px;">
				<div style="float:left; height:22px; margin-top:11px;">
					<button class="option-blue round-corners" type="submit" style="cursor:pointer; padding:2px; width:64px;" title="Log into LAPCAT!"><font class="white">Log In</font></button>
					<input name="submitted" type="hidden" value="0"></div>
			</div>
		</form>
	</div>
</div>
<!--// Stage - Hours Line //-->
<div id="stage-hours-line" style="display:none;">
	<div style="width:auto;">
		<div style="float:left; width:70px;"><font style="font-size:12px;">replace-day-name</font></div>
		<div style="float:left; width:auto;"><font style="font-size:12px;">replace-time-start</font></div>
		<div style="float:left; width:10px;"><font class="dark-grey" style="font-size:12px;">&nbsp;-</font></div>
		<div style="float:left; width:50px;"><font style="font-size:12px;">replace-time-end</font></div>
	</div>
</div>

<!--// Display //-->

<!--// Display - Basic //-->
<div id="stage-basic-display" style="display:none;">
	<div id="part-basic-display" style="float:left; width:auto;">
		<div style="float:left; height:40px; width:100%;">
			<div style="float:left; height:20px; overflow:hidden; width:100%;"><div id="open-line-tags" style="height:16px; margin-left:4px; padding:2px;"></div></div>
		</div>
		<div style="float:left; width:100%;">
			<div style="height:372px; width:auto; margin:4px;">
				<div class="border-off-1 darker fred" style="height:372px; width:auto;"></div>
				<div style="float:left; padding-top:4px; width:auto;"></div>
				<div style="float:right; margin-top:4px; overflow:hidden; text-align:right; width:auto;"></div>
				<div id="open-line-options" style="padding-top:5px; width:auto;">
					<span class="option-black fg-button round-corners" id="button-more-info" onclick="javascript:F_PushButton(98);" style="display:none; float:right; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-more-info" style="font-size:12px;">Expand</a></span>
					<span class="option-black fg-button round-corners" id="button-favorite" onclick="javascript:F_PushButton(9);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-favorite" style="font-size:12px;">Favorite</a></span>
					<span class="option-black fg-button round-corners" id="button-watched" onclick="javascript:F_PushButton(11);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-watched" style="font-size:12px;">Anticipate</a></span>
					<span class="option-black fg-button round-corners" id="button-watchlist" onclick="javascript:F_PushButton(13);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-watchlist" style="font-size:12px;">Watch</a></span>
					<span class="option-black fg-button round-corners" id="button-collection" onclick="javascript:F_PushButton(12);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-collection" style="font-size:12px;">Collect</a></span>
					<span class="option-theme fg-button round-corners" id="button-similar" onclick="javascript:F_PushButton(10);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-similar" style="font-size:12px;">Similar</a></span>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// Display - Alternate //-->
<div id="stage-alternate-display" style="display:none;">
	<div style="float:left; height:40px; width:100%;">
		<div style="float:left; height:20px; overflow:hidden; width:100%;"><div id="open-line-tags" style="height:16px; margin-left:4px; padding:2px;"></div></div>
	</div>
	<div style="float:left; height:136px; width:100%;"></div>
	<div style="float:left; width:100%;">
		<div style="height:236px; width:auto; margin:4px;">
			<div class="border-off-1 darker fred" style="height:236px; width:auto;"></div>
			<div style="float:left; padding-top:4px; width:auto;"></div>
			<div style="float:right; margin-top:4px; overflow:hidden; text-align:right; width:auto;"></div>
			<div id="open-line-options" style="padding-top:5px; width:auto;">
				<span class="option-black fg-button round-corners" id="button-more-info" onclick="javascript:F_PushButton(98);" style="display:none; float:right; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-more-info" style="font-size:12px;">Expand</a></span>
				<span class="option-black fg-button round-corners" id="button-favorite" onclick="javascript:F_PushButton(9);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-favorite" style="font-size:12px;">Favorite</a></span>
				<span class="option-black fg-button round-corners" id="button-watched" onclick="javascript:F_PushButton(11);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-watched" style="font-size:12px;">Anticipate</a></span>
				<span class="option-black fg-button round-corners" id="button-watchlist" onclick="javascript:F_PushButton(13);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-watchlist" style="font-size:12px;">Watch</a></span>
				<span class="option-black fg-button round-corners" id="button-collection" onclick="javascript:F_PushButton(12);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-collection" style="font-size:12px;">Collect</a></span>
				<span class="option-theme fg-button round-corners" id="button-similar" onclick="javascript:F_PushButton(10);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-similar" style="font-size:12px;">Similar</a></span>
				<span class="option-blue fg-button round-corners" id="button-events" onclick="javascript:F_PushButton(96);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-events" style="font-size:12px;">Events</a></span>
				<span class="option-black fg-button round-corners" id="button-home" onclick="javascript:F_PushButton(97);" style="display:none; float:left; margin-right:3px; padding:2px; width:64px;"><a class="white" id="font-home" style="font-size:12px;">Home</a></span>
			</div>
		</div>
	</div>
</div>

<!--// Content //-->

<!--// Stage - Page Content //-->
<div id="stage-page-content" style="display:none;">
	<div id="page-content-display" style="height:460px; width:auto;"></div>
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

<!--// Stage - Events Content //-->
<div id="stage-events-content" style="display:none;">

	<div id="open-line-anticipation-bar" style="float:left; padding-left:5px; padding-right:5px; width:100%;"></div>

	<div style="float:left; height:20px; width:100%;">
		<div style="float:left;"><font style="font-size:16px; margin-left:8px;">replace-name</font></div>
	</div>

	<div style="float:left; width:100%;">
		<div style="height:374px; width:auto; margin:4px; margin-top:0;">
			<div style="height:374px; width:auto;">
				<div style="height:20px; overflow:hidden; width:auto;">
					<font class="dark-grey" style="font-size:12px; margin-left:8px;">on</font>
					<a href="javascript:F_MR('/Events/calendar/replace-o-date/ajax');" style="font-size:14px; margin-left:3px;">replace-date-words</a>
					<font class="dark-grey" style="font-size:12px; margin-left:3px;">at</font>
					<font style="font-size:14px; margin-left:3px;">replace-start</font>
					<font class="dark-grey" style="font-size:14px; margin-left:3px;">-</font>
					<font style="font-size:14px; margin-left:3px;">replace-end</font>
				</div>
				<div style="height:18px; width:auto;">
					<font class="dark-grey" style="font-size:12px; margin-left:8px;">at</font>
					<font class="fake-link library-link" onclick="javascript:F_MR('/Events/change-search/'+parseInt(replace-o-place+1)+'/ajax');" style="font-size:14px; margin-left:3px;">replace-library</font>
				</div>
				<div style="height:324px; margin-right:1px; overflow:auto; padding-left:6px; padding-right:6px; width:auto;">
					<font style="font-size:14px;">replace-description</font>
				</div>
			</div>
		</div>
	</div>

</div>

<!--// Stage - Materials Content //-->
<div id="stage-materials-content" style="display:none;">

	<div style="float:left; height:4px; width:100%;"></div>

	<div style="float:left; height:20px; overflow:hidden; width:100%;">
		<a href="javascript:F_SetDockable('Catalog','http://catalog.lapcat.org/search/ireplace-ISBNorSN');" onfocus="javascript:this.blur();" style="float:left; font-size:16px; margin-left:8px;">replace-name</a>
		<font style="float:left; font-size:12px; margin-left:3px;">replace-sub-name</font>
	</div>

	<table style="float:left; width:100%;"><tr>
		<td rowspan="2" style="padding:6px; vertical-align:top; height:137px; width:87px;">
			<a href="javascript:F_SetDockable('Catalog','http://catalog.lapcat.org/search/ireplace-ISBNorSN');" onfocus="javascript:this.blur();"><img id="D-replace-cover" name="CC_Image" src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></a>
		</td>
		<td style="height:32px; vertical-align:top; width:auto;">
			<div style="float:left; height:32px; width:auto;">
				<div style="float:left; vertical-align:bottom; width:auto;">
					<div id="OL|group-icons" style="float:left; padding-left:5px; width:35px;"></div>

					<div style="height:20px; width:auto;">
						<div style="float:left; height:20px; width:70px;"><font class="grey" style="font-size:10px;">Overall</font></div>
						<div style="float:left; height:20px; width:120px;"></div>
						<div class="hidden" id="stars-my-rating-text" style="float:left; height:20px; width:70px;"><font class="grey" style="font-size:10px;">My Rating</font></div>
					</div>

					<div style="height:20px; width:auto;">
						<div style="float:left; height:20px; width:70px;"><span id="open-line-rating"></span></div>
						<div style="float:left; height:20px; width:120px;"></div>
						<div style="float:left; height:20px; width:70px;">
							<div class="hidden" id="stars-my-rating" onmouseover="javascript:F_ToggleStars(0);" style="height:14px; position:absolute; vertical-align:bottom; width:70px;"></div>
							<div class="hidden" id="stars-select" onmouseout="javascript:F_ToggleStars(1);" onclick="javascript:F_CountStars();" style="cursor:pointer; float:right; height:14px; position:absolute; vertical-align:bottom; width:70px;"><div class="star-sky" onmouseout="javascript:A_Sky[0]=0;" onmouseover="javascript:A_Sky[0]=1;" style="height:14px; position:relative; width:70px;"><div class="star-sky" onmouseout="javascript:A_Sky[1]=0;" onmouseover="javascript:A_Sky[1]=1;" style="height:14px; left:14px; position:relative; width:56px;"><div class="star-sky" onmouseout="javascript:A_Sky[2]=0;" onmouseover="javascript:A_Sky[2]=1;" style="height:14px; left:14px; position:relative; width:42px;"><div class="star-sky" onmouseout="javascript:A_Sky[3]=0;" onmouseover="javascript:A_Sky[3]=1;" style="height:14px; left:14px; position:relative; width:28px;"><div class="star-sky" onmouseout="javascript:A_Sky[4]=0;" onmouseover="javascript:A_Sky[4]=1;" style="height:14px; left:14px; position:relative; width:14px;"></div></div></div></div></div></div>
						</div>
					</div>

			</div></div></div>
		</td>
	</tr><tr>
		<td style="vertical-align:top; width:auto;">
			<div style="vertical-align:top; width:auto;">
				<div style="height:18px; vertical-align:bottom; width:auto;"><font style="font-size:10px;">Availability</font></div>
				<table style="width:300px;">
					<tr>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Main" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-0" style="font-size:12px;">Main Library</font></div>
							</div>
						</td>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Coolspring" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-1" style="font-size:12px;">Coolspring</font></div>
							</div>
						</td>
						</tr>
						<tr>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Fish" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-2" style="font-size:12px;">Fish Lake</font></div>
							</div>
						</td>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Hanna" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-3" style="font-size:12px;">Hanna</font></div>
							</div>
						</td>
						</tr>
						<tr>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Kingsford" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-4" style="font-size:12px;">Kingsford Heights</font></div>
							</div>
						</td>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Rolling" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-5" style="font-size:12px;">Rolling Prairie</font></div>
							</div>
						</td>
						</tr>
						<tr>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Union" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-6" style="font-size:12px;">Union Mills</font></div>
							</div>
						</td>
						<td style="height:18px; overflow:hidden; width:150px;">
							<div style="height:18px; overflow:hidden; position:relative; width:150px;">
								<div id="materials-Bookmobile" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font id="home-library-7" style="font-size:12px;">Mobile Library</font></div>
							</div>
						</td>
						</tr>
						</table>
					<div style="height:0px; overflow:hidden; visibility:hidden; width:0px;"><span class="" id="materials-ISBNorSN" title=""></span></div>
			</td>
	</tr></table>

	<div style="float:left; width:100%;">
		<div style="height:221px; width:auto; margin:4px;">
			<div style="height:221px; width:auto;">
				<div style="height:20px; overflow:hidden; width:auto;">
					<div style="float:left; height:20px; overflow:hidden; width:100%;"><font class="dark-grey" style="font-size:12px; margin-left:8px;">year</font><font class="text-font" style="font-weight:bold;"> - </font><font style="margin-left:3px;">replace-year</font></div>
				</div>
				<div style="height:174px; margin-right:1px; overflow:auto; padding-left:6px; padding-right:6px; width:auto;"><font style="font-size:14px; font-style:italic;">This area is under construction.</font></div>
			</div>
		</div>
	</div>

</div>

<!--// Stage - Databases Content //-->
<div id="stage-databases-content" style="display:none;">

	<div style="float:left; height:4px; width:100%;"></div>

	<div style="float:left; height:20px; width:100%;">
		<div style="float:left;"><a href="replace-link" onfocus="javascript:this.blur();" style="font-size:16px; margin-left:8px;" target="_blank">replace-name</a></div>
	</div>

	<table style="float:left; height:137px; width:100%;"><tr>
		<td rowspan="2" style="padding:6px; vertical-align:top; height:137px; width:87px;">
			<a href="replace-link" onfocus="javascript:this.blur();" target="_blank"><img id="D-replace-cover" name="DB_Image" src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></a>
		</td>
		<td style="height:32px; vertical-align:top; width:auto;"></td>
	</tr><tr>
		<td style="vertical-align:top; width:auto;"></td>
	</tr></table>

	<div style="float:left; width:100%;">
		<div style="height:221px; width:auto; margin:4px; margin-top:0;">
			<div style="height:221px; width:auto;">
				<div class="scrollbar-hidden" style="height:221px; padding-left:6px; padding-right:6px; width:auto;">
					<font style="font-size:14px;">replace-description</font>
				</div>
			</div>
		</div>
	</div>

</div>

<!--// Stage - Hours Content //-->
<div id="stage-hours-content" style="display:none;">

	<div style="float:left; height:4px; width:100%;"></div>

	<div style="float:left; height:20px; width:100%;">
		<div style="float:left;"><font style="font-size:16px; margin-left:8px;">replace-library-name</font></div>
	</div>

	<table style="float:left; width:100%;"><tr>
		<td style="vertical-align:top; width:154px;">
			<div id="OL|location-image" style="float:left; height:124px; padding-top:5px; padding-left:5px; vertical-align:bottom; width:83px;"><img src="/lapcat/layout/library/150-100-replace-ID.png" style="border:0; height:auto; width:auto;"/></div>
		</td><td style="vertical-align:top; width:auto;">
			<div style="float:left; padding-left:6px; width:240px;">
				<div style="float:left; width:240px;"><font class="dark-grey" style="font-size:10px;">Address</font></div>
				<div style="float:left; width:240px;"><font style="font-size:12px;">replace-street</font></div>
				<div style="float:left; width:240px;"><font style="font-size:12px;">replace-city-state</font></div>
				<div style="float:left; width:240px;"><font style="font-size:12px;">replace-zip</font></div>
				<div style="float:left; width:240px;"><font class="dark-grey" style="font-size:10px;">Phone</font></div>
				<div style="float:left; width:240px;"><font style="font-size:12px;">replace-phone</font></div>
			</div>
		</td></tr>
	</table>
    
	<div style="float:left; width:100%;">
		<div style="height:221px; width:auto; margin:4px; margin-top:0;">
			<div style="height:221px; width:auto;">
				<div style="height:25px; overflow:hidden; width:auto;"></div>
				<div class="scrollbar-hidden" style="height:174px; padding-left:6px; padding-right:6px; width:auto;">

					<div style="height:174px; width:auto;">
						<div id="stage-location-hours" style="float:left; padding-left:6px; width:190px;"></div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<!--// FORM //-->

<!--// FORM - Change Tag AC //-->
<div id="form-change-tag" style="display:none;">
	<div style="float:left; height:41px; padding-left:3px; width:176px;">
		<div style="float:left; height:21px; vertical-align:bottom; width:176px;">
			<div style="float:left;"><font class="med-grey" style="font-size:10px;">Tag</font></div>
			<div id="tag-selected" style="float:right; padding-left:3px; width:10px;"></div>
			<div id="change-tag-catalog-link" style="float:right; width:auto;"></div>
		</div>
		<div style="float:left; width:176px;">
			<form id="change-tag-action" action="javascript:F_PushButton(8);" autocomplete="off" method="get" style="float:left;">
				<input class="dropdown image-lines" id="change-tag-input" onkeyup="javascript:F_PushButton(8);" onblur="javascript:this.value=F_CheckDrop('this.value');"  onfocus="javascript:this.value='';" type="text" value="search here" style="float:right; width:150px;">
				<div id="rss-feed-container" style="float:left; visibility:hidden; width:20px;"><a href="" id="rss-feed-link" style="float:left; visibility:hidden; width:20px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/feed.png" id="rss-feed-image" style="float:left; height:16px; margin:2px; width:16px;" height="16px" width="16px" title=""/></a></div>
			</form>
		</div>
	</div>
</div>

<!--// FORM - Change Search AC //-->
<div id="form-change-search" style="display:none;">
	<div style="float:left; height:41px; padding-left:3px; width:176px;">
		<div style="float:left; height:21px; vertical-align:bottom; width:176px;">
			<div style="float:left;"><font class="med-grey" style="font-size:10px;">Search</font></div>
			<div id="search-selected" style="float:right; padding-left:3px; width:10px;"></div>
			<div style="float:right; width:auto;"><font id="change-search-selected" style="font-size:10px;"></font></div>
		</div>
		<div style="float:left; width:176px;">
			<form id="change-search-action" action="javascript:F_PushButton(6);" autocomplete="off" method="get" style="float:left;">
				<select class="dropdown" id="change-search-options" style="width:130px;" value="0"></select>
				<button class="fake-link option-theme round-corners" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			</form>
		</div>
	</div>
</div>

<!--// FORM - Change Sort AC //-->
<div id="form-change-sort" style="display:none;">
	<div style="float:left; height:41px; padding-left:3px; width:176px;">
		<div style="float:left; height:21px; vertical-align:bottom; width:176px;">
			<div style="float:left;"><font class="med-grey" style="font-size:10px;">Sort</font></div>
			<div id="sort-selected" style="float:right; padding-left:3px; width:10px;"></div>
			<div style="float:right; width:auto;"><font id="change-sort-selected" style="font-size:10px;"></font></div>
		</div>
		<div style="float:left; width:176px;">
			<form id="change-sort-action" action="javascript:F_PushButton(7);" autocomplete="off" method="get" style="float:left;">
				<select class="dropdown" id="change-sort-options" style="width:130px;" value="0"></select>
				<button class="fake-link option-theme round-corners" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			</form>
		</div>
	</div>
</div>

<!--// FORM - Option //-->
<div style="display:none;">
	<select id="form-option">
		<option id="replace-ID" value="replace-value" label="replace-name">replace-name</option>
	</select>
</div>