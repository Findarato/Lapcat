<?php /* Smarty version 2.6.24, created on 2010-08-20 11:54:49
         compiled from popup.tpl */ ?>
<div class="color-X-1 corners-top-3 corners-bottom-3 shadow-or-light-X-up" id="anchored-message-box" style="background-position:0px 2px; max-width:980px; position:fixed; padding-left:0.5%; padding-right:0.5%; text-align:center; width:99%; z-index:10;">
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
								<form action="http://catalog.lapcat.org/" id="form-catalog-search" method="get" style="padding:3px;"><input class="dropdown-A-1" type="text" name="SEARCH" id="form-catalog-search-text" value="catalog search" style="height:18px; margin-top:22px; width:118px;"/><input type="hidden" id="form-catalog-search-hidden"/></form>
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