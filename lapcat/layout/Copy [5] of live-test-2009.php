<div class="button-Y-35 font-fake font-X" id="single-template" style="display:none; height:48px; position:relative; margin-top:2px; width:auto; z-index:50;">
	<div id="replace-title" name="normal" style="font-size:17px; height:40px; overflow:hidden; padding-left:4px; padding-top:12px; text-align:center; width:100%;"></div>
</div>
<div class="button-Y-35 font-fake font-X" id="cell-template" style="display:none; height:24px; position:relative; margin-top:2px; width:auto; z-index:50;">
	<div id="replace-title" name="normal" style="font-size:17px; height:20px; overflow:hidden; padding-left:4px; width:100%;"></div>
</div>
<!--// HOTKEY Template //-->
<div class="button-Y-35 border-all-Y-1 font-fake font-Y" id="hotkey-template" style="cursor:default; display:none; float:left; height:195px; position:relative; margin-left:14px; margin-top:12px; width:300px; z-index:50;">
	<div class="border-bottom-I-1 corners-all-1" id="color" style="height:21px; margin-left:1px; margin-top:1px; width:296px; z-index:51;">
		<img id="icon-materials" src="http://cdn1.lapcat.org/fugue/icons/books.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
		<img id="icon-databases" src="http://cdn1.lapcat.org/fugue/icons/databases.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
		<img id="icon-news" src="http://cdn1.lapcat.org/fugue/icons/newspaper.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
		<img id="icon-events" src="http://cdn1.lapcat.org/fugue/icons/calendar-blue.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
		<div class="corners-all-1" id="title" style="font-size:17px; float:left; height:20px; text-align:center; width:256px;"></div>
	</div>
	<div class="corners-all-1" style="height:136px; margin-left:2px; width:256px;">
		<div class="shadow-or-light-X-up" style="height:118px; overflow:hidden; width:256px;">
	        <div id="content" style="font-size:17px; height:auto; margin-left:2px; margin-right:2px; padding-top:2px; width:252px;"></div>
		</div>
	</div>
</div>
<!--// CATALOG Template //-->
<div class="button-Y-35 font-fake font-Y" id="catalog-template" style="background-color:rgba(0,13,52,0.80); cursor:default; display:none; float:left; height:195px; position:relative; margin-left:14px; margin-top:12px; width:300px; z-index:50;">
	<div class="button-blue" style="height:21px; margin-left:1px; margin-top:1px; position:relative; width:256px; z-index:51;">
		<div class="corners-all-1" style="font-size:17px; float:left; height:20px; text-align:center; width:254px;">Catalog</div>
	</div>
	<div class="corners-all-1" style="height:auto; margin-left:2px; width:256px;">

		<div class="corners-all-2" style="background-image:url(/lapcat/layout/screenshots/240-151-1.png); height:151px; margin-left:8px; margin-top:10px; position:absolute; top:0px; width:240px; z-index:49;"></div>

		<div class="corners-all-2 shadow-or-light-Y-up" style="height:162px; margin-top:1px; position:relative; top:0px; width:256px; z-index:51;">
	        <div id="content" style="font-size:17px; height:auto; margin-left:2px; margin-right:2px; padding-top:2px; width:252px;">

				<table cellpading="0" cellspacing="0" style="height:auto; margin-top:2px; text-align:center; width:100%;">
					<tr>
						<td style="padding-left:12px; vertical-align:top; width:auto;">
							<div id="catalog-search-box" style="float:left; vertical-align:bottom; padding-top:1px;">
								<form action="javascript:F_SearchCatalog();" id="form-catalog-search" method="get" style="padding:3px;"><input class="dropdown-A-1" type="text" name="SEARCH" id="form-catalog-search-text" value="" style="height:24px; width:154px;"/><input type="hidden" id="form-catalog-search-hidden"/></form>
							</div>
							<div class="fake-link button-blue light-up" onfocus="javascript:this.blur();" onclick="javascript:F_SearchCatalog();" style="float:left; height:20px; margin-left:28px; margin-top:4px; padding-left:3px; padding-right:4px; padding-top:2px; text-align:center; vertical-align:top; width:98px;" title="Click to perform the search."><font class="font-G" style="vertical-align:top; font-size:14px;">search</font></div>
						</td>
					</tr>
				</table>

			</div>
		</div>
	</div>
</div>





<div class="button-Y-35 font-fake font-X" id="line-template" style="display:none; height:40px; position:relative; margin-top:2px; width:auto; z-index:50;">
	<div id="replace-A" name="normal" style="font-size:17px; height:20px; padding-left:4px; width:100%;"></div>
	<div class="font-I" id="replace-B" name="credit-word" style="float:left; font-size:11px; height:20px; padding-left:4px; width:auto;"></div>
	<img id="replace-C" name="credit-icon" src="http://cdn1.lapcat.org/fugue/icons/user-small.png" style="display:none; float:left; height:16px; margin-left:2px; margin-bottom:2px; width:16px;" />
	<div id="replace-D" name="credit-name" style="float:left; height:20px; margin-left:4px; width:auto;"></div>
	<div class="font-H" id="replace-E" name="normal" style="float:right; height:20px; padding-right:4px; width:auto;"></div>
</div>
<div class="font-fake font-X" id="construct-template" style="display:none; float:left; font-size:13px; overflow:hidden; margin-bottom:0px; position:relative; z-index:45;">
	<div class="color-X-4 corners-all-3 shadow-or-light-X-down" style="background-position:0px 2px; height:20px; width:100%;">
		<div class="corners-all-3 shadow-or-light-Y-down" style="height:20px; width:100%;">
			<img id="header-area-icon-materials" src="http://cdn1.lapcat.org/fugue/icons/books.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
			<img id="header-area-icon-databases" src="http://cdn1.lapcat.org/fugue/icons/databases.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
			<img id="header-area-icon-news" src="http://cdn1.lapcat.org/fugue/icons/newspaper.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
			<img id="header-area-icon-events" src="http://cdn1.lapcat.org/fugue/icons/calendar-blue.png" style="display:none; float:left; height:16px; margin-left:1px; margin-top:1px; margin-right:3px; width:16px;" />
			<div id="list-button" style="float:left;">
				<div class="corners-all-3 shadow-or-light-X-up" style="float:left; height:20px; width:59px;">
					<div id="button-lists" style="display:none;">
						<img class="fake-link" id="button-list-previous" src="http://cdn1.lapcat.org/fugue/icons/control-180-small.png" style="float:left; height:16px; margin-left:1px; margin-top:1px; width:16px;" />
						<div class="button-gold shadow-or-light-Y-down" id="button-list-selector" style="float:left; font-size:11px; height:13px; margin-top:1px; padding-left:4px; width:20px;">List</div>
						<img class="fake-link" id="button-list-next" src="http://cdn1.lapcat.org/fugue/icons/control-000-small.png" style="float:left; height:16px; margin-top:1px; width:16px;" />
					</div>
				</div>
			</div>
			<div style="float:left; height:20px; width:auto;">
				<div class="font-bold" id="header-area-name" style="float:left; height:20px; margin-left:4px; padding-top:1px; width:auto;"></div>
				<div id="header-text-on" style="float:left; height:20px; padding-top:1px; width:auto;">
					<div class="font-X" style="float:left; height:20px; margin-left:3px; padding-top:1px; width:auto;">&mdash;</div>
					<div id="header-text" style="float:left; height:20px; margin-left:3px; padding-top:1px; width:auto;"></div>
				</div>
			</div>
			<div class="corners-all-3 shadow-or-light-X-up" id="control-icons" style="display:none; float:right; height:20px; width:92px;">
				<div class="border-all-I-1 color-Z-4 corners-all-2 font-fake font-X" id="list-populator" style="float:right; height:12px; margin-right:3px; margin-top:2px;">
					<div id="list-population" style="float:left; font-size:11px; height:12px; margin-left:3px; width:auto;"></div>
					<div class="font-I" style="float:left; font-size:11px; margin-left:1px; width:auto;">/</div>
					<div id="list-population-total" style="float:left; font-size:11px; margin-left:2px; margin-right:3px; width:auto;"></div>
				</div>
				<img class="fake-link" id="control-expand" src="http://cdn1.lapcat.org/fugue/icons/magnifier-zoom-in.png" style="display:none; float:right; height:16px; margin-right:4px; margin-top:1px; width:16px;" />
				<img class="fake-link" id="control-shrink" src="http://cdn1.lapcat.org/fugue/icons/magnifier-zoom-out.png" style="display:none; float:right; height:16px; margin-right:4px; margin-top:1px; width:16px;" />
				<img class="fake-link" id="control-views" src="http://cdn1.lapcat.org/fugue/icons/document-convert.png" style="display:none; float:right; height:16px; margin-right:4px; margin-top:1px; width:16px;" />
			</div>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
			<td id="open-line-left" style="overflow:hidden; width:100%;">
				<div id="hotkeys-data" style="height:480px; position:relative; vertical-align:top; width:100%;"></div>
				<div id="list-data" style="height:480px; position:relative; vertical-align:top; width:100%;"></div>
				<div id="images-data" style="height:480px; position:relative; vertical-align:top; width:100%;"></div>
			</td>
			<td id="open-line-right" style="padding-left:3px; vertical-align:top; width:0px;"></td>
		</tr>
	</table>
</div>
<!--// Page Buttons //-->
<div style="position:absolute; padding-left:3px; top:71px; width:400px; z-index:50;"><div class="font-fake" id="button-page-list" style="display:none; float:left; font-size:11px; width:auto;"></div></div>
<!--// Anchored Message Box //-->
<!--//
<div class="color-X-1 corners-top-3 corners-bottom-3 shadow-or-light-X-up" id="anchored-message-box" style="background-position:0px 2px; max-width:980px; position:fixed; bottom:-114px; padding-left:0.5%; padding-right:0.5%; text-align:center; width:99%; z-index:100;">
	<div class="color-Y-4 corners-bottom-3 corners-top-3" style="bottom:-3px; left:1px; right:1px; height:106px; position:absolute; width:100%; z-index:-1;"></div>
	<div style="position:absolute; bottom:0px; left:426px; text-align:center; width:auto; z-index:2;"><font class="fake-link" style="color:rgb(0,0,255); font-size:11px; text-decoration:underline;"><a class="font-L" href="/lapcat/files/Mission.pdf" target="_blank">About Us</a> / <a class="font-L" href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">Terms of Use</a></font></div>
	<div class="color-X-1 border-all-I-1 corners-top-2 corners-bottom-2 shadow-or-light-X-up" style="height:90px; padding:4px; width:auto;">
		<table cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				<td style="width:auto;">

					<div class="corners-bottom-3 corners-top-3 color-E-1" id="start-menu-not-logged-in" style="float:left; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="background-image:url(/lapcat/layout/images/44-44-0.png); background-repeat:no-repeat; background-position:10px 42px; height:88px; width:88px;">
							<font class="font-G" style="margin-right:2px;">Welcome to <font class="font-bold font-G" style="font-size:18px;">LAPCAT</font></font>
							<br/>
							<div style="float:right; margin-right:2px;"><font class="font-G" style="font-size:11px;">Start</font></div>
						</div>
					</div>

					<div id="start-menu-arrow-1" style="float:left; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" id="start-menu-not-logged-in" style="float:left; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:88px;">
							<div style="line-height:65%; padding:2px;"><font class="font-G" style="font-size:11px;">Enter your Library Card Number and PIN.<br/><br/><font class="font-L" style="font-size:11px;">No Account?</font><br/>One will be created for you!</font></div>
						</div>
					</div>

					<div id="start-menu-arrow-2" style="float:left; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" id="start-menu-not-logged-in" style="float:left; height:90px; width:130px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:128px;">
							<div id="top-link-log-in" style="display:none; float:left; vertical-align:bottom; padding-top:1px; visibility:visible;">
								<form id="account-log-in" method="post" style="padding:3px;">
									<input autocomplete="OFF" class="corners-bottom-1 corners-top-1 dropdown-A-1" name="username" type="text" style="height:18px; margin-top:4px; width:118px;" value="library card number">
									<input autocomplete="OFF" class="dropdown-A-1" name="password" type="password" style="height:18px; margin-top:4px; width:118px;" value="LCPL">
									<input name="submitted" type="hidden" value="0">
								</form>
							</div>
							<div class="fake-link button-black light-up" onfocus="javascript:this.blur();" onclick="javascript:F_LogInOrCreateAccount();" style="float:left; height:16px; margin-left:38px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to perform the search."><font class="font-G" style="vertical-align:top; font-size:14px;">submit</font></div>
						</div>
					</div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" id="start-menu-logged-in" style="display:none; float:left; height:90px; width:130px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:128px;">
							<div style="float:right; height:63px; margin-right:2px; margin-top:2px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:116px;"><font class="font-G" style="font-size:12px;">Anticipated Events</font><div id="anticipated-events-list"></div></div>
						</div>
					</div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="display:none; float:right; height:90px; text-align:left; width:270px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; overflow:hidden; padding-left:2px; width:266px;">
							<font class="font-G" id="anchored-message-text" style="font-size:11px;"></font>
						</div>
					</div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:right; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; overflow:hidden; width:88px;">
							<font class="font-L" id="catalog-new-sign-up" style="font-size:11px;">No Library Card?</font>
							<div class="browse-link fake-link button-blue light-up" name="http://old.lapcat.org/signup.html" onfocus="javascript:this.blur();" style="float:right; height:63px; margin-right:2px; margin-top:2px; padding-left:3px; padding-right:3px; text-align:center; width:76px;" title="Click to sign-up online for a library card."><font class="font-G" style="font-size:14px;">sign-up<br/>for a<br/>library card</font></div>
						</div>
					</div>

					<div style="float:right; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_previous.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:right; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:88px;">
							<div class="browse-link fake-link button-blue light-up" name="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:2px; margin-top:2px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to."><font class="font-G" style="vertical-align:top; font-size:14px;">catalog</font></div>
							<div class="browse-link fake-link button-blue light-up" name="https://catalog.lapcat.org/patroninfo~S12/1060648/items" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:2px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to show the catalog."><font class="font-G" style="vertical-align:top; font-size:14px;">renew items</font></div>
							<div class="browse-link fake-link button-blue light-up" name="https://catalog.lapcat.org/patroninfo~S12/1060648/fines" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:2px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to show the fine payment page in the catalog."><font class="font-G" style="vertical-align:top; font-size:14px;">pay fines</font></div>
							<div class="give-link fake-link button-green light-up" id="give-link" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:3px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to make a contribution to my library."><font class="font-G" style="vertical-align:top; font-size:14px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/world.png" style="height:12px; margin-right:2px; width:12px;" />give</font></div>
						</div>
					</div>

					<div style="float:right; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_previous.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:right; height:90px; text-align:center; width:130px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:128px;">
							<div id="catalog-search-box" style="float:left; vertical-align:bottom; padding-top:1px;">
								<form action="javascript:F_SearchCatalog();" id="form-catalog-search" method="get" style="padding:3px;"><input class="dropdown-A-1" type="text" name="SEARCH" id="form-catalog-search-text" value="catalog search" style="height:18px; margin-top:22px; width:118px;"/><input type="hidden" id="form-catalog-search-hidden"/></form>
							</div>
							<div class="fake-link button-blue light-up" onfocus="javascript:this.blur();" onclick="javascript:F_SearchCatalog();" style="float:left; height:16px; margin-left:38px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to perform the search."><font class="font-G" style="vertical-align:top; font-size:14px;">submit</font></div>
						</div>
					</div>

				</td>
				<td style="width:16px; vertical-align:top;"><img class="fake-link close-anchored-message" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="height:16px; width:16px;" title="Click to close this message box."/></td>
			</tr>
		</table>
	</div>
</div>
<div id="image-holder" style="position:absolute; top:-200px; z-index:-200;"></div>
<div class="button-Y-35 font-fake font-X" id="line-template" style="display:none; height:40px; position:relative; margin-top:2px; width:auto; z-index:50;">
	<div id="replace-one" name="normal" style="font-size:17px; height:20px; padding-left:4px; width:100%;"></div>
	<div class="font-I" id="replace-two" name="normal" style="float:left; font-size:11px; height:20px; padding-left:4px; width:auto;"></div>
	<img id="replace-three" name="credit-icon" src="http://cdn1.lapcat.org/fugue/icons/user-small.png" style="display:none; float:left; height:16px; margin-left:2px; margin-bottom:2px; width:16px;" />
	<div id="replace-three" name="normal" style="float:left; height:20px; margin-left:4px; width:auto;"></div>
	<div id="replace-four" name="normal" style="float:right; height:20px; padding-right:4px; width:auto;"></div>
</div>
<div class="button-Y-35 font-fake font-X" id="image-template" style="display:none; height:140px; position:relative; margin-top:2px; width:auto; z-index:50;">
	<span style="float:left; vertical-align:top;"><div id="replace-two" name="image-S"></div></span>
</div>
<div class="font-fake font-G" id="open-line-template" style="display:none; height:40px; position:relative; margin-top:2px; width:auto; z-index:50;">
	<div class="button-blue-2" id="replace-one" name="normal" style="float:left; font-size:17px; height:40px; padding-left:4px; width:84%;"></div>
	<div class="button-blue-2" id="replace-nine" name="show" style="display:none; float:left; font-size:10px; height:18px; margin-left:4px; padding-top:2px; text-align:center; width:12%;">request</div>
	<img id="replace-seven" name="fade-on-zero" src="http://cdn1.lapcat.org/fugue/icons/tick-white.png" style="display:none; float:left; height:16px; margin-left:10px; margin-top:2px; width:16px;" />
	<img id="replace-eight" name="fade-on-zero" src="http://cdn1.lapcat.org/fugue/icons/tick-small-white.png" style="display:none; float:left; height:16px; margin-left:2px; margin-top:2px; width:16px;" />
	<div class="border-bottom-I-1 corners-bottom-3 font-X shadow-or-light-X-down" style="background-position:0px 7px; float:left; height:20px; padding-top:4px; width:378px;">
		<div class="font-I" id="replace-four" name="normal" style="float:left; font-size:11px; height:20px; padding-left:4px; width:auto;"></div>
		<img id="replace-five" name="credit-icon" src="http://cdn1.lapcat.org/fugue/icons/user-small.png" style="display:none; float:left; height:16px; margin-left:2px; margin-bottom:2px; width:16px;" />
		<div id="replace-five" name="normal" style="float:left; height:20px; margin-left:4px; width:auto;"></div>
		<div id="replace-six" name="normal" style="float:right; height:20px; padding-right:4px; width:auto;"></div>
	</div>
	<div style="float:left; width:378px;">
		<div class="border-top-I-1 corners-top-3 shadow-or-light-X-up" style="float:left; height:16px; position:absolute; width:378px;"></div>
		<div style="margin-top:6px; padding-right:6px; position:absolute; vertical-align:top; white-space:normal;">
			<span style="float:left; margin-left:6px; margin-right:6px; max-height:337px; max-width:237px; vertical-align:top;"><div id="replace-two" name="image-L"></div></span>
			<div class="font-gold" style="font-size:12px; margin-left:6px; vertical-align:top;">Summary<br/></div>
			<div class="font-I" id="replace-three" name="normal-blank" style="font-size:15px; margin-left:6px; vertical-align:top;">No summary is available.</div>
		</div>
	</div>
</div>
//-->