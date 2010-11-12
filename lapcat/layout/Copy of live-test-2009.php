<!--//                    //-->
<!--// live-test-2009.php //-->
<!--//                    //-->
<div class="color-X-1 corners-top-3 corners-bottom-3" id="notes-box" style="display:none; height:512px; padding:2px; position:fixed; top:20px; left:0.5%; width:99%; z-index:10;">
	<div class="border-all-Z-1 corners-top-2 corners-bottom-2 light-up" style="height:500px; padding:4px; width:auto;">
		<div id="notes" style="float:left; height:492px; overflow:hidden; width:98%; margin-left:0.5%; padding:4px;">
			<div class="color-A-4 font-fake font-Y" style="height:16px; width:100%;">Notes</div>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-major-fixes" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-major-fixes-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-major-fixes-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Major Fixes</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-major-fixes" style="display:none; float:left; width:90%;">
									<li type="disc">Open lines now showing while in a specific area.</li>
									<li type="disc">Using tab movement now shows the correct display.</li>
									<li type="disc">Expanded events on the large calendar view now shrink when zooming out or moving to Home.</li>
									<li type="disc">Changed the hard-coded value for record limits to be customizable - materials area now shows 2 full rows in image view.</li>
									<li type="disc">Materials open line is back to working. Availability has been shrunk and a request button has been added with it - this button takes you to the request page for that item in the catalog (unless the user is not signed into the catalog, then it first prompts the user to sign into the catalog.)</li>
									<li type="disc">URL navigation is back to working. The following words can follow "http://dev.lapcat.org/": catalog, give, account, (any area, i.e., home) or (any tag name, i.e., golf). Navigation via the URL bar is not necessary to navigate within LAPCAT.</li>
									<li type="disc">Browse searching (clicking on an author's name, library location, date, etc.) back to working. This should now be working for both adding to and removing from a search.</li>
									<li type="disc">Start-Up/Help message box is now anchored to the bottom of the page (like Facebook) and is more robust and intuitive than before. The status log message box (right-side) is for development purposes only.</li>
									<li type="disc">The IE bug that prevented displays from showing data has inadvertently been fixed.</li>
									<li type="disc">The IE bug that prevented material cover images from showing has inadvertently been fixed.</li>
									<li type="disc">Tweaked the Start box (formerly Start-Up/Help) to include a LAPCAT suggestion as to what you should do. By default, LAPCAT will suggest you log in or create an account. Also included in the Start box are several common catalog-related links as well as a simple search for the catalog. Once logged-in, the suggestions and links will change.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-minor-fixes" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-minor-fixes-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-minor-fixes-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Minor Fixes</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-minor-fixes" style="display:none; float:left; width:100%;">
									<li type="disc">Added notes.</li>
									<li type="disc">Corrected the position of the list view icon at Events.</li>
									<li type="disc">Hours and locations no longer show on the splash page.</li>
									<li type="disc">All open lines now disappear when moving to Home.</li>
									<li type="disc">The blue box around the open line has been removed.</li>
									<li type="disc">Automatic refresh is back to working.</li>
									<li type="disc">Next and Previous material type buttons are back to working.</li>
									<li type="disc">Changed background color of entire page to be black or white, based off of theme. This is only visible when the page is being distorted somehow or when viewing on a monitor with a resolution greater than 1680x1050.</li>
									<li type="disc">Made sure the open line would show when you changed views from one without an open line to one with an open line. This only affects specific areas.</li>
									<li type="disc">Expand button is back to working.</li>
									<li type="disc">The displays are better maintaining their expanded open line status. Switching between areas and returning to Home should no longer break previous viewed displays.</li>
									<li type="disc">Fixed a bug where multiple lines in the same list were being highlighted.</li>
									<li type="disc">Fixed a bug where next and previous material type buttons were defaulting to wrong type when first clicked.</li>
									<li type="disc">Home library highlight (home library's name in green with different building icon) back to working for Events.</li>
									<li type="disc">Moved Start (formerly Start-Up/Help) button to top left corner.</li>
									<li type="disc">Added a black LAPCAT (text) image.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-need-to-fix" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-need-to-fix-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-need-to-fix-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Need To Fix</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-need-to-fix" style="display:none; width:100%;">
									<li type="disc">Major bug - When re-requesting data for the calendar, the old data is still being displayed along with the newly requested data.</li>
									<li type="disc">Minor Firefox bug - Expanded events on the large calendar view have NaN:NaN for time.</li>
									<li type="disc">Minor bug - Automatic refresh for materials sometimes changes the search's material type. This seems to happen the first time it is triggered.</li>
									<li type="disc">Minor bug - At any area and when changing views, the open line does not show unless it had been triggered before.</li>
									<li type="disc">Minor bug - Splash page height is being distorted. Need to double check the construct heights.</li>
									<li type="disc">Minor bug - In several spots, like headers and material sub-titles, the "overflow" CSS property is not working correctly.<br/>Example: Materials - Audio Books - The Poet's Corner</li>
									<li type="disc">Minor bug - When navigating via the URL (i.e., "http://dev.lapcat.org/golf"), the tag search does not appear in the search menu (left-hand side).</li>
									<li type="disc">Minor bug - Depending on how fast a user repeatedly clicks the next material type or previous material type button, the data that is displayed may not match the header. This issue should resolve itself once suggestions for searches that return no results is back to working.</li>
									<li type="disc">Minor IE bug - Certain areas of text do not fit in their containers.<br/>Example: Second panel in Start-Up/Help window.</li>
									<li type="disc">Minor catalog bug - There is no default background color set for the online sign-up page.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-need-to-re-implement" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-need-to-re-implement-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-need-to-re-implement-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Need To Re-Implement</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-need-to-re-implement" style="display:none; width:100%;">
									<li type="disc">Major - Open line options (i.e., Expand, Favorite, Collect, etc.)</li>
									<li type="disc">Major - List view page buttons</li>
									<li type="disc">Major - Search menu (left-hand side).</li>
									<li type="disc">Major - Account page (formerly Options).</li>
									<li type="disc">Major - Featured view for News and Databases.</li>
									<li type="disc">Minor - Suggestions for searches that return no results.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-need-to-add" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-need-to-add-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-need-to-add-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Need To Add</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-need-to-add" style="display:none; width:100%;">
									<li type="disc">Major - New material type - Downloadable Audio Books.</li>
									<li type="disc">Major - The following tags should be added: culture, fashion, international, myth, school, sociology and story.</li>
									<li type="disc">Major - The following tags should be removed: divorce, patron and treatment.</li>
									<li type="disc">Minor - R&amp;B needs to be changed to rhythm and blues.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-like-to-work-more-on" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-like-to-work-more-on-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-like-to-work-more-on-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Like To Work More On</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-like-to-work-more-on" style="display:none; width:100%;">
									<li type="disc">Major - Themes.</li>
									<li type="disc">Minor - Cat icon. The cat icon for Material links to the catalog kinda' looks like a gopher.</li>
									<li type="disc">Minor - Need to replace the stop auto-refresh icon (red cross) with a custom-made icon - probably the auto-refresh icon (circular arrow) with a small "x" on it. Currently it looks like it should close something.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
				<ol class="font-fake font-X">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:20px;">
								<div class="fake-link toggle-notes" name="notes-like-to-add" style="float:left; height:16px; width:16px;" title="Click to expand this section."><img id="notes-like-to-add-add" src="http://cdn1.lapcat.org/famfamfam/silk/add.png"/><img id="notes-like-to-add-delete" src="http://cdn1.lapcat.org/famfamfam/silk/delete.png" style="display:none;"/></div>
							</td>
							<td style="width:auto;">
								<div class="font-bold" style="float:left; width:90%;">Like To Add</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="width:20px;">
								<div id="notes-like-to-add" style="display:none; width:100%;">
									<li type="disc">Major - Facebook (and/or other third party sites) links for News and Events.</li>
									<li type="disc">Minor - User customization buttons to increase list view line limits by +/-2. Also, this could add another row of materials in the image view at materials.</li>
									<li type="disc">Minor - A more robust URL navigation system allowing for deeper navigation. For example, "http://dev.lapcat.org/materials/golf" would start the user at the materials area with a golf tag search.</li>
									<li type="disc">Minor - More Start menu choices and links.</li>
								</div>
							</td>
						</tr>
					</table>
				</ol>
			</div>
		</div>
	</div>
</div>

<!--// Account Box //-->
<div class="color-K-1 corners-top-3 corners-bottom-3" id="anchored-account-box" style="padding:2px; position:fixed; bottom:-120px; left:2%; width:96%; z-index:10;">
	<div class="border-all-Z-1 corners-top-2 corners-bottom-2 light-up" style="height:90px; padding:4px; width:auto;">
		<table cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				<td style="width:auto;">
					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:left; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:88px;">
							<div style="margin-top:23px;"><font class="font-G" style="margin-right:2px;">My<br/>Account</font></div>
						</div>
					</div>
				</td>
				<td style="width:16px; vertical-align:top;"><img class="fake-link close-anchored-account" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="height:16px; width:16px;" title="Click to close this message box."/></td>
			</tr>
		</table>
	</div>
</div>

<!--// Anchored Message Box //-->
<div class="color-K-1 corners-top-3 corners-bottom-3" id="anchored-message-box" style="padding:2px; position:fixed; bottom:-120px; left:2%; width:96%; z-index:10;">
	<div class="border-all-Z-1 corners-top-2 corners-bottom-2 light-up" style="height:90px; padding:4px; width:auto;">
		<table cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				<td style="width:auto;">
					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:left; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="background-image:url(/lapcat/layout/images/44-44-0.png); background-repeat:no-repeat; background-position:10px 42px; height:88px; width:88px;">
							<font class="font-G" style="margin-right:2px;">Welcome to <font class="font-bold font-G" style="font-size:18px;">LAPCAT</font></font>
							<br/>
							<div style="float:right; margin-right:2px;"><font class="font-G" style="font-size:11px;">Start</font></div>
						</div>
					</div>

					<div style="float:left; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:left; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:88px;">
							<div style="line-height:65%; padding:2px;"><font class="font-G" style="font-size:11px;">Enter your Library Card Number and PIN.<br/><br/><font class="font-L" style="font-size:11px;">No Account?</font><br/>One will be created for you!</font></div>
						</div>
					</div>

					<div style="float:left; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:left; height:90px; text-align:center; width:130px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:128px;">
							<div id="top-link-log-in" style="display:none; float:left; vertical-align:bottom; padding-top:1px; visibility:visible;">
								<form id="account-log-in" method="post">
									<input autocomplete="OFF" class="corners-bottom-1 corners-top-1 dropdown-A-1 image-lines" name="username" type="text" style="height:18px; margin-left:3px; margin-top:10px; width:118px;" value="library card number">
									<input autocomplete="OFF" class="dropdown-A-1 image-lines" name="password" type="password" style="height:18px; margin-left:3px; margin-top:4px; width:118px;" value="password">
									<input name="submitted" type="hidden" value="0">
								</form>
							</div>
							<div class="fake-link button-blue light-up" onfocus="javascript:this.blur();" onclick="javascript:F_LogInOrSomething();" style="float:left; height:16px; margin-left:38px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to perform the search."><font class="font-G" style="vertical-align:top; font-size:14px;">submit</font></div>
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
							<div class="browse-link fake-link button-accent light-up" name="http://old.lapcat.org/signup.html" onfocus="javascript:this.blur();" style="float:right; height:63px; margin-right:2px; margin-top:2px; padding-left:3px; padding-right:3px; text-align:center; width:76px;" title="Click to sign-up online for a library card."><font class="font-Y" style="font-size:14px;">sign-up<br/>for a<br/>library card</font></div>
						</div>
					</div>

					<div style="float:right; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_previous.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:right; height:90px; text-align:center; width:90px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:88px;">
							<div class="browse-link fake-link button-blue light-up" name="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:2px; margin-top:2px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to ."><font class="font-G" style="vertical-align:top; font-size:14px;">catalog</font></div>
							<div class="browse-link fake-link button-blue light-up" name="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:2px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to show the catalog."><font class="font-G" style="vertical-align:top; font-size:14px;">renew items</font></div>
							<div class="browse-link fake-link button-blue light-up" name="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:2px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to show the fine payment page in the catalog."><font class="font-G" style="vertical-align:top; font-size:14px;">pay fines</font></div>
							<div class="give-link fake-link button-green light-up" id="give-link" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:3px; margin-top:4px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:76px;" title="Click to..."><font class="font-G" style="vertical-align:top; font-size:14px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/world.png" style="height:12px; margin-right:2px; width:12px;" />give</font></div>
						</div>
					</div>

					<div style="float:right; margin-right:4px; margin-left:4px; margin-top:42px;"><font class="font-L" style="font-size:18px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/resultset_previous.png" style="height:16px; width:16px;"/></font></div>

					<div class="corners-bottom-3 corners-top-3 color-E-1" style="float:right; height:90px; text-align:center; width:130px;">
						<div class="border-all-Z-1 corners-bottom-2 corners-top-2" style="height:88px; width:128px;">
							<div id="catalog-search-box" style="float:left; vertical-align:bottom; padding-top:1px;">
								<form action="javascript:F_SearchCatalog();" id="form-catalog-search" method="get">
									<input class="dropdown-A-2" type="text" name="SEARCH" id="form-catalog-search-text" value="catalog search" style="height:18px; margin-left:3px; margin-top:22px; width:116px;"/>
									<input type="hidden" id="form-catalog-search-hidden"/>
								</form>
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


<div class="color-F-1 corners-top-3 corners-bottom-3" id="message-box" style="display:none; padding:2px; position:absolute; overflow:hidden; z-index:10;">
	<div class="border-all-Z-1 corners-top-2 corners-bottom-2 light-up" id="message-text" style="padding:4px;"></div>
</div>
<div id="information-box" style="position:absolute; z-index:10; right:6px; top:17px;"></div>
<div id="image-holder" style="position:absolute; z-index:-100;"></div>
<div id="data-div-A" style="display:none;">
	<div class="replace-class-A fake-link effect-hover-Z-2 font-G" name="construct|replace-construct_key|replace-key_value|replace-value_text|replace-text" style="font-size:14px; height:18px; margin:1px; padding-left:3px; width:auto;">replace-text</div>
</div>
<div id="checkmark-green" style="display:none;"><div id="available" style="background-image:url(/lapcat/layout/icons/16-12-11.png); height:12px; width:16px;"></div></div>
<div id="checkmark-grey" style="display:none;"><div id="available" style="background-image:url(/lapcat/layout/icons/16-12-10.png); height:12px; width:16px;"></div></div>

<div id="materials-header" style="display:none;">
	<table cellpadding="0" cellspacing="0" style="height:16px; width:100%;">
	    <tr>
			<td style="height:16px; width:auto; overflow:hidden;">
				<div style="float:left; height:16px; padding-top:2px; width:24px;"><img class="fake-link float-left previous-materials" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_previous.png" style="height:12px; width:12px;" title="Click to change material type for this search."/><img class="fake-link float-left next-materials" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="height:12px; width:12px;" title="Click to change material type for this search."/></div>
				<font class="font-X" id="header">loading...</font>
			</td>
	    	<td id="icons" style="height:16px; width:120px;">
				<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
				<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:none; height:16px; width:16px;" title="Click to shrink this display."/>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<div class="fake-link float-right view-click" id="image-view" style="background-image:url(http://cdn1.lapcat.org/famfamfam/silk/images.png); display:none; height:16px; width:16px;" title="Click to show this information with images."></div>
				<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="height:16px; width:16px;" title="Click to show this information in a list." />
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right stop-refresh-click" id="stop-refresh" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="display:none; height:16px; width:16px;" title="Click to disable automatic refresh for this display." />
				<div class="fake-link float-right auto-refresh-click" id="auto-refresh" style="background-image:url(http://cdn1.lapcat.org/famfamfam/silk/arrow_rotate_clockwise.png); height:16px; width:16px;" title="Click to enable automatic refresh for this display."></div>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right remove-search-click" id="search-on-search" src="http://cdn1.lapcat.org/famfamfam/silk/user_delete.png" style="display:none; height:16px; margin-right:2px; width:16px;" title="Click to remove the username from this search." />
				<img class="fake-link float-right remove-search-click" id="search-on-date" src="http://cdn1.lapcat.org/famfamfam/silk/date_delete.png" style="display:none; height:16px; margin-right:2px; width:16px;" title="Click to remove the date from this search." />
		</td></tr>
	</table>
</div>

<div id="events-header" style="display:none;">
	<table cellpadding="0" cellspacing="0" style="height:16px; width:100%;">
	    <tr>
			<td style="height:16px; width:auto; overflow:hidden;">
				<font class="font-X" id="header">loading...</font>
			</td>
	    	<td id="icons" style="height:16px; width:120px;">
				<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
				<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:none; height:16px; width:16px;" title="Click to shrink this display."/>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="display:none; height:16px; width:16px;" title="Click to show this information in a list." />
				<img class="fake-link float-right view-click" id="month-view" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" title="Click to show this information in a calendar."/>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right remove-search-click" id="search-on-search" src="http://cdn1.lapcat.org/famfamfam/silk/building_delete.png" style="display:none; height:16px; margin-right:2px; width:16px;" title="Click to remove the location from this search." />
				<img class="fake-link float-right remove-search-click" id="search-on-date" src="http://cdn1.lapcat.org/famfamfam/silk/date_delete.png" style="display:none; height:16px; margin-right:2px; width:16px;" title="Click to remove the date from this search." />
			</td>
        </tr>
	</table>
</div>

<div id="news-header" style="display:none;">
	<table cellpadding="0" cellspacing="0" style="height:16px; width:100%;">
	    <tr>
			<td style="height:16px; width:auto; overflow:hidden;">
				<font class="font-X" id="header">loading...</font>
			</td>
	    	<td id="icons" style="height:16px; width:120px;">
				<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
				<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:none; height:16px; width:16px;" title="Click to shrink this display."/>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="height:16px; width:16px;" title="Click to show this information in a list."/>
				<img class="fake-link float-right view-click" id="featured-view" src="http://cdn1.lapcat.org/famfamfam/silk/layout_content.png" style="display:none; height:16px; width:16px;" title="Click to show the featured article."/>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right remove-search-click" id="search-on-search" src="http://cdn1.lapcat.org/famfamfam/silk/user_delete.png" style="display:none; height:16px; margin-right:2px; width:16px;" title="Click to remove the username from this search." />
				<img class="fake-link float-right remove-search-click" id="search-on-date" src="http://cdn1.lapcat.org/famfamfam/silk/date_delete.png" style="display:none; height:16px; margin-right:2px; width:16px;" title="Click to remove the date from this search." />
			</td>
        </tr>
	</table>
</div>

<div id="databases-header" style="display:none;">
	<table cellpadding="0" cellspacing="0" style="height:16px; width:100%;">
	    <tr>
			<td style="height:16px; width:auto; overflow:hidden;">
				<font class="font-X" id="header">loading...</font>
			</td>
	    	<td id="icons" style="height:16px; width:120px;">
				<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
				<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:none; height:16px; width:16px;" title="Click to shrink this display."/>
				<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
				<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="height:16px; width:16px;" title="Click to show this information in a list."/>
				<img class="fake-link float-right view-click" id="featured-view" src="http://cdn1.lapcat.org/famfamfam/silk/layout_content.png" style="display:none; height:16px; width:16px;" title="Click to show the featured database."/>
			</td>
        </tr>
	</table>
</div>

<div id="hours-header" style="display:none;">
	<table cellpadding="0" cellspacing="0" style="height:16px; width:100%;">
	    <tr>
			<td style="height:16px; width:auto; overflow:hidden;">
				<font class="font-X" id="header">loading...</font>
			</td>
	    	<td id="icons" style="height:16px; width:120px;">
				<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
				<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:none; height:16px; width:16px;" title="Click to shrink this display."/>
			</td>
        </tr>
	</table>
</div>




<!--/* Line HTML - 100 */-->
<!--/* Primary Use: Materials */-->
<div id="line-HTML-100" style="display:none;">
	<div style="float:left; height:187px; text-align:center; width:133px;">
		<div class="corners-bottom-3 corners-top-3" style="height:22px; padding:1px; width:auto;">
			<div class="corners-bottom-2 corners-top-2 fake-link line-click effect-hover-Z-2" id="materials-replace-ID" name="counter-replace-counter" style="height:22px; overflow:hidden; text-align:center; width:100%;">
				<font class="font-X" style="font-size:12px;">replace-name</font>
			</div>
		</div>
		<div style="height:114px; overflow:hidden; text-align:center; width:100%;">
			<table style="height:114px; width:100%;"><tr><td style="vertical-align:top; width:auto;">
				<div style="height:114px; vertical-align:bottom; padding-right:5px;"><div class="fake-link browse-link" name="http://catalog.lapcat.org/search/ireplace-ISBNorSN" id="catalog-ISBN-link-replace-ID" onfocus="javascript:this.blur();" style="float:right;"><img id="on-screen-image-cover-replace-counter" style="border:0; height:auto; width:auto;" src="/lapcat/layout/images/1-1-999.png"/></div></div>
			</td><td style="vertical-align:top; width:20px;">
				<div id="suggestion-replace-ID-search" style="height:18px; width:18px;"><div class="browse-link fake-link" name="http://catalog.lapcat.org/search/ireplace-ISBNorSN" id="catalog-ISBN-link-replace-ID" onfocus="javascript:this.blur();" title="Click to show this material in the catalog."><img src="/lapcat/layout/icons/cat-2.png"/></div></div>
				<div id="suggestion-replace-ID-catalog-link" style="height:18px; margin-top:2px; width:18px;"><img class="fake-link line-click" id="materials-replace-ID" name="counter-replace-counter" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier.png"/></div>
				<div name="available-at-home" style="height:18px; margin-top:2px; width:18px;">replace-available-home</div>
				<div name="available-at-other" style="height:18px; margin-top:2px; width:18px;">replace-available-other</div>
			</td></tr></table>
		</div>
	</div>
</div>
<!--/* Line HTML - 200 */-->
<!--/* Primary Use: Events */-->
<div id="line-HTML-200" style="display:none;">
	<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link effect-hover-Z-2 light-up line-click" id="events-replace-ID" name="counter-replace-counter" style="float:left; height:42px; margin-top:4px; text-align:center; width:100%;" title="Click to expand this display.">
		<div class="border-sides-C-1 border-top-C-1 corners-top-2" style="height:19px; overflow:hidden; text-align:left; width:auto;">
			<table style="height:18px; width:100%;">
				<tr>
					<td style="height:18px; overflow:hidden; vertical-align:top; width:auto;">
						<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
					</td>
					<td style="float:right; height:19px; text-align:right; width:auto;">
						<a class="add-to-all-searches fake-link font-bold font-L" name="construct|construct-2_key|tag_value|replace-tag-ID_text|replace-tag-name" style="margin-right:3px;">replace-tag-name</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="background-alpha-5 border-sides-C-1 border-bottom-C-1 corners-bottom-2" style="height:21px; overflow:hidden; width:auto;">
			<div style="width:100%;">
				<div class="light-up corners-top-right-3" style="float:left; margin-left:1px; vertical-align:top; width:210px;">
					<div style="margin:1px; text-align:left; width:auto;">
						<font class="font-X" style="font-size:10px; margin-left:12px;">at</font>
						<font class="add-to-search library-link-1 font-X location-replace-library-ID date-replace-o-date" name="construct|construct-2_key|search_value|replace-library-ID_text|replace-library" style="font-size:12px; margin-right:3px;">replace-library</font>
					</div>
				</div>
				<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
					<font class="add-to-search font-X" name="construct|construct-2_key|date_value|1_text|replace-o-date" style="font-size:12px; margin-right:3px;">replace-date-words</font>
				</div>
				<div id="anticipation-bar-replace-ID" style="float:left; height:4px; padding-left:5px; padding-right:5px; width:100%;"></div>
			</div>
		</div>
	</div>
</div>
<!--/* Line HTML - 300 */-->
<!--/* Primary Use: News */-->
<div id="line-HTML-300" style="display:none;">
	<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link effect-hover-Z-2 light-up line-click" id="news-replace-ID" name="counter-replace-counter" style="float:left; height:42px; margin-top:4px; text-align:center; width:100%;" title="Click to expand this display.">
		<div class="border-sides-C-1 border-top-C-1 corners-top-2" style="height:19px; overflow:hidden; text-align:left; width:auto;">
			<table style="height:18px; width:100%;">
				<tr>
					<td style="height:18px; overflow:hidden; vertical-align:top; width:auto;">
						<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
					</td>
					<td style="float:right; height:19px; text-align:right; width:auto;">
						<a class="add-to-all-searches fake-link font-bold font-L" name="construct|construct-3_key|tag_value|replace-tag-ID_text|replace-tag-name" style="margin-right:3px;">replace-tag-name</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="background-alpha-5 border-sides-C-1 border-bottom-C-1 corners-bottom-2" style="height:21px; overflow:hidden; width:auto;">
			<div style="width:100%;">
				<div class="light-up corners-top-right-3" style="float:left; margin-left:1px; vertical-align:top; width:210px;">
					<div style="margin:1px; text-align:left; width:auto;">
						<font class="font-X" style="font-size:10px; margin-left:12px;">by</font>
						<font class="add-to-search user-link-1 font-X" name="construct|construct-3_key|search_value|replace-username_text|replace-entered-by-id" style="font-size:12px; margin-right:3px;">replace-username</font>
					</div>
				</div>
                <div id="icons" style="float:left;">
					<div id="line-group-icons-replace-ID" style="height:21px; overflow:hidden; width:auto;">
<!--//Sun//-->
<img id="icon-replace-ID-10" src="/lapcat/images/31-31-10.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Summer Reading Program" />
<!--//Slider//-->
<img id="icon-replace-ID-11" src="/lapcat/images/31-31-11.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Patron Plus" />
<!--//Eye//-->
<img id="icon-replace-ID-0" src="/lapcat/images/31-31-0.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Watching" />
<!--//Heart//-->
<img id="icon-replace-ID-92" src="/lapcat/images/31-31-92.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="A Favorite" />
<!--//LAPCAT Points//-->
<img id="icon-replace-ID-94" src="/lapcat/images/31-31-94.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Points" />
					</div>
				</div>
				<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
					<font class="add-to-search font-X" name="construct|construct-3_key|date_value|replace-o-date_text|replace-date-words" style="font-size:12px; margin-right:3px;">replace-date-words</font>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/* Line HTML - 400 */-->
<!--/* Primary Use: Materials */-->
<div id="line-HTML-400" style="display:none;">
	<table cellpadding="0" cellspacing="0" style="margin-top:4px; width:100%;">
		<tr>
			<td style="text-align:center; height:42px; width:38px;">
				<img id="on-screen-list-cover-replace-counter" src="/lapcat/layout/images/1-1-999.png"/>
			</td>
			<td style="width:auto;">
				<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link float-left effect-hover-Z-2 light-up line-click" id="materials-replace-ID" name="counter-replace-counter" style="height:42px; text-align:center; width:100%;" title="Click to expand this display.">
					<div class="border-all-C-1 corners-bottom-2 corners-top-2" style="height:40px; overflow:hidden; text-align:left; width:auto;">
						<table cellpadding="0" cellspacing="0" style="height:40px; width:100%;">
							<tr>
								<td style="height:21px; vertical-align:top; width:auto;">
									<div style="height:20px; overflow:hidden; width:100%;">
										<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
										<font class="font-L" style="float:left; font-size:12px; margin-left:6px; vertical-align:top;">replace-sub-name</font>
									</div>
								</td>
								<td style="height:21px; min-width:90px; text-align:right; width:120px;">
									<a class="add-to-all-searches fake-link font-bold font-L" name="construct|construct-1_key|tag_value|replace-tag-ID_text|replace-tag-name" style="margin-right:3px;">replace-tag-name</a>
								</td>
							</tr>
							<tr>
								<td style="height:21px; overflow:hidden; vertical-align:top; width:auto;">
									<div class="light-up corners-top-right-3 replace-class-A" style="float:left; height:21px; vertical-align:top; width:210px;">
										<div style="height:20px; text-align:left; vertical-align:top; width:auto;">
											<font class="font-X" style="font-size:10px; margin-left:6px;">replace-credit-word</font>
											<font class="add-to-search user-link-1 font-X" name="construct|construct-1_key|search_value|replace-credit-name_text|replace-credit-name" style="font-size:12px; margin-right:3px;">replace-credit-name</font>
										</div>
									</div>
					                <div id="icons" style="float:left;">
										<div id="line-group-icons-replace-ID" style="height:21px; overflow:hidden; width:auto;">
<!--//Gold Award//-->
<img id="icon-replace-ID-33" src="/lapcat/images/31-31-33.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Gold Award" />
<!--//Silver Award//-->
<img id="icon-replace-ID-50" src="/lapcat/images/31-31-50.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Silver Award" />
<!--//Copper Award//-->
<img id="icon-replace-ID-51" src="/lapcat/images/31-31-51.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Copper Award" />
<!--//Sun//-->
<img id="icon-replace-ID-10" src="/lapcat/images/31-31-10.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Summer Reading Program" />
<!--//Slider//-->
<img id="icon-replace-ID-11" src="/lapcat/images/31-31-11.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Patron Plus" />
<!--//Eye//-->
<img id="icon-replace-ID-0" src="/lapcat/images/31-31-0.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Watching" />
<!--//Heart//-->
<img id="icon-replace-ID-92" src="/lapcat/images/31-31-92.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="A Favorite" />
<!--//LAPCAT Points//-->
<img id="icon-replace-ID-94" src="/lapcat/images/31-31-94.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Points" />
										</div>
									</div>
								</td>
								<td style="height:21px; width:120px;">
									<div style="float:right; vertical-align:top; width:auto;">
										<font class="add-to-search font-X" name="construct|construct-1_key|date_value|replace-date-words_text|replace-date-words" style="font-size:12px; margin-right:3px;">replace-date-words</font>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<!--// Line HTML - 500 //-->
<div id="line-HTML-500" style="display:none;">
	<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link effect-hover-Z-2 light-up line-click" id="news-replace-ID" name="counter-replace-counter" style="float:left; height:42px; margin-top:4px; text-align:center; width:100%;" title="Click to expand this display.">
		<div class="border-sides-C-1 border-top-C-1 corners-top-2" style="height:19px; overflow:hidden; text-align:left; width:auto;">
			<table style="height:18px; width:100%;">
				<tr>
					<td style="height:18px; overflow:hidden; vertical-align:top; width:auto;">
						<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
					</td>
					<td style="float:right; height:19px; text-align:right; width:auto;">
						<a class="add-to-all-searches fake-link font-bold font-L" name="construct|construct-3_key|tag_value|replace-tag-ID_text|replace-tag-name" style="margin-right:3px;">replace-tag-name</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="background-alpha-5 border-sides-C-1 border-bottom-C-1 corners-bottom-2" style="height:21px; overflow:hidden; width:auto;">
			<div style="width:100%;">
				<div class="light-up corners-top-right-3" style="float:left; margin-left:1px; vertical-align:top; width:210px;">
					<div style="margin:1px; text-align:left; width:auto;">
						<font class="font-X" style="font-size:10px; margin-left:12px;">by</font>
						<font class="add-to-search user-link-1 font-X" name="construct|construct-3_key|search_value|replace-username_text|replace-entered-by-id" style="font-size:12px; margin-right:3px;">replace-username</font>
					</div>
				</div>
				<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
					<font class="add-to-search font-X" name="construct|construct-3_key|date_value|replace-o-date_text|replace-date-words" style="font-size:12px; margin-right:3px;">replace-date-words</font>
				</div>
			</div>
		</div>
	</div>
	<div class="color-X-3 corners-bottom-3 corners-top-3" style="float:left; height:230px; margin-right:1px; margin-top:2px; min-width:155px; text-align:center; width:100%;">
		<div class="border-all-C-1 corners-bottom-2 corners-top-2" style="height:226px; overflow:auto; text-align:left; width:auto;">
			<table style="height:226px; width:100%;">
				<tr>
					<td style="height:226px; overflow:hidden; vertical-align:top; text-align:left; width:auto;">
						<font class="font-X" id="general-font-size" style="float:left; font-size:15px; padding:2px; padding-left:6px; padding-right:6px; vertical-align:top;">replace-description</font>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<!--// Line HTML - 600 //-->
<div id="line-HTML-600" style="display:none;">
	<div style="float:left; height:4px; width:100%;"></div>
	<table cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
			<td style="width:42px;">
				<div class="browse-link fake-link" name="http://catalog.lapcat.org/search/ireplace-ISBNorSN" id="catalog-ISBN-link-replace-ID" onfocus="javascript:this.blur();" style="float:left; width:44px; height:auto; padding-left:2px; position:0 0;"><img id="suggestions-replace-ISBNorSN-cover" src="http://cdn1.lapcat.org/famfamfam/silk/image.png" name="image-replace-counter" style="border:0; height:auto; width:auto;"/></div>
			</td>
			<td style="width:auto;">
	<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link effect-hover-Z-2 light-up line-click" id="materials-replace-ID" name="counter-replace-counter" style="float:left; height:42px; text-align:center; width:100%;">
		<div class="border-sides-C-1 border-top-C-1 corners-top-2" style="height:19px; overflow:hidden; text-align:left; width:auto;">
			<table style="height:18px; width:100%;">
				<tr>
					<td style="height:18px; overflow:hidden; vertical-align:top; width:auto;">
						<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
					</td>
					<td style="float:right; height:19px; width:auto;">
						<a class="tag-change fake-link font-bold font-L" id="value-replace-tag-ID" name="tag/drop" style="margin-right:3px;">replace-tag-name</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="background-alpha-5 border-sides-C-1 border-bottom-C-1 corners-bottom-2" style="height:21px; overflow:hidden; width:auto;">
			<div style="width:100%;">
				<div class="light-up corners-top-right-3" style="float:left; margin-left:1px; vertical-align:top; width:210px;">
					<div style="margin:1px; text-align:left; width:auto;">
						<font class="font-H" style="font-size:10px; margin-left:12px;">replace-credit-word</font>
						<font class="user-click user-link-1 font-Z" style="font-size:12px;">replace-credit-name</font>
					</div>
				</div>
                <div id="icons" style="float:left;">
					<div id="line-group-icons-replace-ID" style="height:21px; overflow:hidden; width:auto;">
<!--//Gold Award//-->
<img id="icon-replace-ID-33" src="/lapcat/images/31-31-33.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Gold Award" />
<!--//Silver Award//-->
<img id="icon-replace-ID-50" src="/lapcat/images/31-31-50.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Silver Award" />
<!--//Copper Award//-->
<img id="icon-replace-ID-51" src="/lapcat/images/31-31-51.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Copper Award" />
<!--//Sun//-->
<img id="icon-replace-ID-10" src="/lapcat/images/31-31-10.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Summer Reading Program" />
<!--//Slider//-->
<img id="icon-replace-ID-11" src="/lapcat/images/31-31-11.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Patron Plus" />
<!--//Eye//-->
<img id="icon-replace-ID-0" src="/lapcat/images/31-31-0.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Watching" />
<!--//Heart//-->
<img id="icon-replace-ID-92" src="/lapcat/images/31-31-92.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="A Favorite" />
<!--//LAPCAT Points//-->
<img id="icon-replace-ID-94" src="/lapcat/images/31-31-94.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="LAPCAT Points" />
					</div>
				</div>
				<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
					<a class="date-click fake-link font-X" id="replace-o-date" name="news" style="font-size:12px;">replace-date-words</a>
				</div>
			</div>
		</div>
	</div>
            </td>
		</tr>
    </table>
</div>
<!--// Line HTML - 700 //-->
<div id="line-HTML-700" style="display:none;">
	<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link effect-hover-Z-1 light-up line-click" id="databases-replace-ID" name="counter-replace-counter" style="float:left; height:42px; margin-top:4px; text-align:center; min-width:195px; width:100%;" title="Click to expand this display.">
		<div class="border-all-C-1 corners-bottom-2 corners-top-2" style="height:40px; overflow:hidden; text-align:left; width:auto;">
			<table style="height:40px; width:100%;">
				<tr>
					<td style="height:40px; overflow:hidden; vertical-align:top; width:auto;">
						<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<!--// Line HTML - 800 //-->
<div id="line-HTML-800" style="display:none;">
	<div class="button-blue effect-hover-Z-1 light-up" id="news-replace-ID" name="counter-replace-counter" style="float:left; height:40px; margin-top:4px; min-width:193px; text-align:center;" title="Click to use this database.">
		<div class="database-dockable fake-link" name="replace-link-in" style="height:40px; width:100%;">
			<div style="height:40px; text-align:left; width:auto;">
				<table style="height:40px; width:100%;">
					<tr>
						<td style="height:40px; overflow:hidden; vertical-align:top; width:100%;">
							<font class="font-G" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="color-X-3 corners-bottom-3 corners-top-3" style="float:left; height:230px; margin-top:2px; min-width:195px; text-align:center; width:100%;">
		<div class="border-all-C-1 corners-bottom-2 corners-top-2" style="height:226px; min-width:195px; overflow:auto; text-align:left; width:auto;">
			<table style="height:228px; width:100%;">
				<tr>
					<td style="height:228px; overflow:hidden; vertical-align:top; text-align:left; width:auto;">
						<font class="font-X" id="general-font-size" style="float:left; font-size:15px; padding:2px; padding-left:6px; padding-right:6px; vertical-align:top;">replace-description</font>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<!--/* Line HTML - 900 */-->
<!--/* Primary Use: Hours */-->
<div id="line-HTML-900" style="display:none;">
	<div class="color-X-3 corners-bottom-3 corners-top-3 fake-link effect-hover-Z-2 light-up line-click" id="events-replace-ID" name="counter-replace-counter" style="float:left; height:42px; margin-top:4px; text-align:center; width:100%;" title="Click to expand this display.">
		<div class="border-sides-C-1 border-top-C-1 corners-top-2" style="height:19px; overflow:hidden; text-align:left; width:auto;">
			<table style="height:40px; width:100%;">
				<tr>
					<td style="height:40px; overflow:hidden; vertical-align:top; width:auto;">
						<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
					</td>
				</tr>
			</table>
		</div>
		<div class="background-alpha-5 border-sides-C-1 border-bottom-C-1 corners-bottom-2" style="height:21px; overflow:hidden; width:auto;">
			<div style="width:100%;">
                <div id="icons" style="float:left;">
					<div id="line-group-icons-replace-ID" style="height:21px; overflow:hidden; width:auto;">
<!--/* Open */-->
<img id="icon-replace-ID-open" src="/lapcat/images/31-31-94.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Open" />
<!--/* Closed */-->
<img id="icon-replace-ID-close" src="/lapcat/images/31-31-94.png" style="display:none; float:left; height:16px; width:16px; margin-right:3px;" title="Closed" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// Stage - Play //-->
<div class="color-A-1" id="stage-play" style="height:100%; width:100%;">
	<div class="image-background" id="background-alignment" style="height:1050px; width:auto;">
		<div class="background-special-1 border-bottom-B-1" style="height:21px; width:100%;">
			<div class="fake-link button-black light-up" onclick="javascript:F_OpenHelp();" onfocus="javascript:this.blur();" style="float:left; height:16px; margin-left:2px; margin-top:1px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to show/hide the Start menu."><font class="font-G" style="vertical-align:top; font-size:14px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/lightning.png" style="height:12px; margin-right:2px; width:12px;" />start</font></div>
			<!--// LINK - Account //-->
			<div id="top-link-account" style="display:none; float:left; margin-left:6px; padding-top:1px;">
				<div class="fake-link button-blue light-up" onclick="javascript:F_OpenAccount();" onfocus="javascript:this.blur();" style="float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to show my account information."><font class="font-G" style="vertical-align:top; font-size:14px;">account</font></div>
			</div>
			<div style="float:left; width:285px; height:19px;"><a class="library-link-1 font-X" onfocus="javascript:this.blur();" style="font-size:14px; margin-left:6px; margin-top:1px;">La Porte County Public Library System</a></div>

			<div class="fake-link button-accent light-up" onclick="javscript:F_OpenNotes();" onfocus="javascript:this.blur();" style="float:right; height:16px; margin-right:12px; margin-top:1px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to show/hide the notes window."><font class="font-G" style="vertical-align:top; font-size:14px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/script.png" style="height:12px; margin-right:2px; width:12px;" />notes</font></div>

			<!--// Interface - Dockables //-->
			<div id="interface-dockables" style="float:right;"></div>

			<!--// LINK - Log out //-->
			<div id="top-link-log-out" style="display:none; float:right; margin-right:12px; padding-top:1px;">
				<div class="fake-link button-theme log-out-click light-up" onfocus="javascript:this.blur();" style="float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to log out of LAPCAT."><font class="font-G" style="vertical-align:top; font-size:14px;">Log Out</font></div>
			</div>

			<!--// LINK - Give //-->
			<div style="float:right; margin-right:12px; padding-top:1px;">
				<div class="give-link fake-link button-green light-up" id="give-link" onfocus="javascript:this.blur();" style="float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to..."><font class="font-G" style="vertical-align:top; font-size:14px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/world.png" style="height:12px; margin-right:2px; width:12px;" />give</font></div>
			</div>

			<!--// LINK - Catalog //-->
			<div style="float:right; margin-right:12px; padding-top:1px;">
				<div class="browse-link fake-link button-blue light-up" name="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to show the catalog."><font class="font-G" style="vertical-align:top; font-size:14px;">catalog</font></div>
			</div>

			<!--// LINK - Close //-->
			<div id="dockable-close-link" style="display:none; float:right; margin-right:12px; padding-top:1px;">
				<div class="close-dockable button-red light-up" onfocus="javascript:this.blur();" style="float:left; height:17px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:auto;" title="Click to close the window."><font class="font-G" id="dockable-close" style="vertical-align:top; font-size:14px;">close</font></div>
			</div>

		</div>

		<div style="float:left; height:60px; width:100%;">

			<!--// Stage - LAPCAT Logo //-->
			<div style="float:left; height:60px; margin-left:8px; width:101px;">
				<a href="" onfocus="javascript:this.blur();"><img src="/lapcat/images/101-58-1.png" style="height:58px; width:101px;"/></a>
			</div>
			<div style="float:left; height:60px; width:179px;">
				<div class="LAPCAT-image" style="float:left; height:18px; margin-top:14px; width:100px;"></div>
				<font class="font-I" style="float:left; margin-left:2px; margin-top:14px;">&trade;</font>
				<br/><font class="font-X" style="float:left; font-size:14px;">My Library, Online</font>
			</div>

			<!--// Stage - Hotkey Holder //-->
			<div id="hotkey-holder" style="display:none; float:right; width:auto;"></div>

		</div>

		<div style="float:left; width:100%;">
			<!--// Interface - Main Menu //-->
			<div id="interface-main-menu" style="float:left;">
				<!--// Home //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-home" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:6px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/house.png" style="height:16px; margin-left:4px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Home</font></div>
				<!--// News //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-news" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/newspaper.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">News</font></div>
				<!--// Events //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-events" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Events</font></div>
				<!--// Materials //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-materials" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/book_open.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Materials</font></div>
				<!--// Databases //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-databases" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/database.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Databases</font></div>
				<!--// Hours //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-hours" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/time.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Hours</font></div>
				<!--// Hiring //-->
				<div class="border-left-E-1 border-right-E-1 border-top-D-1 menu-normal corners-top-2 effect-hover-Z-1 menu-move-click" id="menu-hiring" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:18px; margin-left:1px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/user_suit.png" style="height:16px; margin-left:4px; margin-top:2px; width:16px;" /><font class="font-G" style="font-size:14px; margin-left:2px; margin-right:4px; vertical-align:top;">Hiring</font></div>
			</div>
		</div>

		<div style="float:left; vertical-align:top; width:100%;">

			<!--// Dockable Window //-->
			<!--// *************** //-->
			<div class="border-top-B-1 color-D-2" id="dockable-window" style="float:left; height:1022px; position:absolute; top:21px; left:0px; width:100%; vertical-align:top; visibility:hidden; z-index:21;"><iframe id="dockable-content" src="" style="border:0; height:1022px; visibility:hidden; width:100%; z-index:21;"></iframe></div>
			<!--// *************** //-->

			<!--// LAPCAT - Normal Display //-->
			<div style="float:left; height:555px; vertical-align:top; width:auto;">
				<div style="float:left; height:100%; position:aboslute; vertical-align:top; width:100%;"></div>

				<!--// DISPLAY - Displays //-->
				<div style="float:left; position:absolute; width:100%;">

						<table cellpadding="0" cellspacing="0" class="border-top-A-1" style="height:552px; width:100%;">
							<tr>
								<td rowspan="2" style="height:553px; vertical-align:top; width:180px;">
									<table cellpadding="0" cellspacing="0" class="background-special-1 border-bottom-B-1" style="background-position:0px -101px; height:553px; vertical-align:top; width:180px;">
										<tr><td class="shine-less" style="vertical-align:top; width:180px;">
											<div style="height:269px; float:left; overflow:hidden; vertical-align:top; width:180px;">
												<div style="float:left; width:180px;">
													<div id="interface-tiny-menu" style="height:16px; width:180px;">
														<div id="interface-tiny-main-option" style="float:left; padding-top:4px; height:16px; width:auto;">
															<!--// Button - Reset //-->
															<div class="simple-click toggle-button" id="button-reset" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; margin-left:3px; text-align:center; vertical-align:top; width:60px;" title="Reset this search."><font class="font-G" style="font-weight:bold; vertical-align:top; font-size:10px;">reset</font></div>
															<!--// Button - Random //-->
															<div class="simple-click toggle-button" id="button-random" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; margin-left:3px; text-align:center; vertical-align:top; width:60px;" title="Randomize this search."><font class="font-G" style="font-weight:bold; vertical-align:top; font-size:10px;">random</font></div>
														</div>
														<div id="interface-tiny-options" style="float:left; padding-top:4px; width:auto;">
															<!--// Button - Favorites //-->
															<div class="simple-click toggle-button" id="button-favorites" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show my favorites."><img src="/lapcat/images/31-31-92.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Anticipated //-->
															<div class="simple-click toggle-button" id="button-anticipated" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show my anticipated events."><img src="/lapcat/images/31-31-0.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Summer //-->
															<div class="simple-click toggle-button" id="button-summer" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show Summer Reading Program events."><img src="/lapcat/images/31-31-10.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Slider //-->
															<div class="simple-click toggle-button" id="button-slider" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show LAPCAT Slider events."><img src="/lapcat/images/31-31-11.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
															<!--// Button - Collected //-->
															<div class="simple-click toggle-button" id="button-collected" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; padding-left:4px; margin-left:3px; width:16px;" title="Show my collection."><img src="/lapcat/images/31-31-94.png" style="float:left; height:13px; position:absolute; width:13px;" /></div>
														</div>
													</div>
												</div>
												<div id="interface-search-options" style="float:left; vertical-align:top; width:180px;">
	<!--// ********** //-->
	<!--// Change Tag //-->
	<div class="drops-out-top" id="container-change-tag" style="display:none; float:left; height:24px; padding-left:3px; padding-top:6px; width:176px;">
		<font>
			<div class="dropdown drops-out" id="change-tag-drops-lines" name="tag/drop" style="display:none; margin-top:24px; margin-left:1px; position:absolute; width:175px; z-index:10;"></div>
		</font>
		<div style="float:left; width:33px;">
			<div id="change-tag-RSS" style="float:left; height:15px; visibility:hidden; width:17px;"><a href="" id="change-tag-RSS-link" style="float:left;"><img src="http://cdn1.lapcat.org/famfamfam/silk/feed.png" id="rss-feed-image" style="float:left; height:16px; margin-top:3px; width:16px;" height="16px" width="16px" title=""/></a></div>
			<div style="float:right; height:15px; width:16px;"><font class="font-X" style="font-size:9px;">Tag</font></div>
		</div>
		<div style="float:left; width:128px;">
			<form id="change-tag-action" action="javascript:$(this).find('#change-tag-master').keyup();" autocomplete="off" method="get" style="float:left; height:20px; margin-left:3px; text-align:center; width:126px;" title="Click then type to change tags.">
				<input class="dropdown-A-1 tag-box image-lines" id="change-tag-master" type="text" value="tag search" style="height:18px; width:126px;">
			</form>
		</div>
		<div style="float:left; width:14px;">
			<div id="tag-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:6px; width:10px;">
				<img class="remove-from-all-searches fake-link" id="remove-tag" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this tag from the search." />
			</div>
		</div>
		
	</div>

	<!--// ********** //-->
	<!--// Change Popular (Tag Search) //-->
	<div class="drops-out-top" id="container-change-popular" style="display:none; float:left; height:24px; padding-left:3px; padding-top:6px; width:176px;">
		<font>
			<div class="dropdown drops-out" id="change-popular-drops-lines" name="popular/drop" style="display:none; margin-top:24px; margin-left:1px; position:absolute; width:175px; z-index:10;"></div>
		</font>
		<div style="float:left; width:33px;">
			<div style="float:right; height:15px;"><font class="font-X" style="font-size:9px;">Popular</font></div>
		</div>
		<div style="float:left; width:128px;">
			<div class="drops dropdown fake-link" id="change-popular-drops" onfocus="javascript:this.blur();" style="float:left; height:20px; margin-left:3px; text-align:center; width:126px;" title="Click to change tags."><font class="font-G" id="change-popular-master" style="float:left; font-size:14px; margin-left:3px; margin-top:2px;">loading...</font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; margin-top:2px;">+</font></div>
		</div>
		<div style="float:left; width:14px;">
			<div id="popular-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:4px; width:10px;">
				<img class="remove-from-all-searches fake-link" id="remove-popular" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this tag from the search." />
			</div>
		</div>
	</div>

	<!--// ********** //-->
	<!--// Change Type //-->
	<div class="drops-out-top" id="container-change-type" style="display:none; float:left; height:24px; padding-left:3px; padding-top:6px; width:176px;">
		<font>
		<div class="dropdown drops-out" id="change-type-drops-lines" style="display:none; margin-top:24px; margin-left:1px; position:absolute; width:175px; z-index:10;"></div>
		</font>
		<div style="float:left; width:33px;">
			<div style="float:right; height:15px;"><font class="font-X" style="font-size:9px;">Type</font></div>
		</div>
		<div style="float:left; width:128px;">
			<div class="drops dropdown fake-link" id="change-type-drops" onfocus="javascript:this.blur();" style="float:left; height:20px; margin-left:3px; text-align:center; width:126px;" title="Click to change locations."><font class="font-G" id="change-type-master" style="float:left; font-size:14px; margin-left:3px; margin-top:2px;"></font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; margin-top:2px;">+</font></div>
		</div>
		<div style="float:left; width:14px;">
			<div id="type-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:4px; width:10px;">
				<img class="remove-from-search fake-link" id="remove-type" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this criteria from the search." />
			</div>
		</div>
	</div>

	<!--// ********** //-->
	<!--// Change Search //-->
	<div class="drops-out-top" id="container-change-search" style="display:none; float:left; height:24px; padding-left:3px; padding-top:6px; width:176px;">
		<font>
		<div class="dropdown drops-out" id="change-search-drops-lines" style="display:none; margin-top:24px; margin-left:1px; position:absolute; width:175px; max-height:200px; overflow:auto; z-index:10;"></div>
		</font>
		<div style="float:left; width:33px;">
			<div style="float:right; height:15px;"><font class="font-X" style="font-size:9px;">Search</font></div>
		</div>
		<div style="float:left; width:128px;">
			<div class="drops dropdown fake-link" id="change-search-drops" onfocus="javascript:this.blur();" style="float:left; height:20px; margin-left:3px; text-align:center; width:126px;" title="Click to change locations."><font class="font-G" id="change-search-master" style="float:left; font-size:14px; margin-left:3px; margin-top:2px;"></font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; margin-top:2px;">+</font></div>
		</div>
		<div style="float:left; width:14px;">
			<div id="search-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:4px; width:10px;">
				<img class="remove-from-search fake-link" id="remove-search" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this criteria from the search." />
			</div>
		</div>
	</div>

	<!--// ********** //-->
	<!--// Change Sort //-->
	<div class="drops-out-top" id="container-change-sort" style="display:none; float:left; height:24px; padding-left:3px; padding-top:6px; width:176px;">
		<font>
		<div class="dropdown drops-out" id="change-sort-drops-lines" style="display:none; margin-top:24px; margin-left:1px; position:absolute; width:175px; z-index:10;"></div>
		</font>
		<div style="float:left; width:33px;">
			<div style="float:right; height:15px;"><font class="font-X" style="font-size:9px;">Sort</font></div>
		</div>
		<div style="float:left; width:128px;">
			<div class="drops dropdown fake-link" id="change-sort-drops" onfocus="javascript:this.blur();" style="float:left; height:20px; margin-left:3px; text-align:center; width:126px;" title="Click to change sorting."><font class="font-G" id="change-sort-master" style="float:left; font-size:14px; margin-left:3px; margin-top:2px;"></font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; margin-top:2px;">+</font></div>
		</div>
		<div style="float:left; width:14px;">
			<div id="sort-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:4px; width:10px;">
				<img class="remove-from-search fake-link" id="remove-sort" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this criteria from the search." />
			</div>
		</div>
	</div>

	<!--// ********** //-->
	<!--// Change Date //-->
	<div id="container-date-selector" style="display:none; float:left; height:24px; padding-left:3px; padding-top:6px; width:176px;">
		<font>
		<div class="dropdown drops-out" id="change-date-drops-lines" style="display:none; margin-top:24px; margin-left:1px; position:absolute; width:175px; z-index:10;"></div>
		</font>
		<div style="float:left; width:33px;">
			<div style="float:right; height:15px;"><font class="font-X" style="font-size:9px;">Date</font></div>
		</div>
		<div style="float:left; width:128px;">
			<div class="drops dropdown fake-link" id="button-date-selector" onfocus="javascript:this.blur();" style="float:left; height:20px; margin-left:3px; text-align:center; width:126px;" title="Click to change date."><font class="font-G" id="change-date-master" style="float:left; font-size:14px; margin-left:3px; margin-top:2px;">select day</font><font class="font-G" style="float:right; font-size:14px; margin-right:3px; margin-top:2px;">+</font></div>
		</div>
		<div style="float:left; width:14px;">
			<div id="date-selected" style="display:none; float:right; height:15px; padding-left:3px; padding-top:4px; width:10px;">
				<img class="remove-from-search fake-link" id="remove-date" src="http://cdn1.lapcat.org/famfamfam/silk/cross.png" style="float:left; width:12px; height:12px;" title="Click to remove this criteria from the search." />
			</div>
		</div>
	</div>

												</div>
												<div id="interface-list-menu" style="float:left; vertical-align:top; overflow:hidden; width:180px;"></div>
												<div id="interface-left-menu" style="float:left; vertical-align:top; overflow:hidden; width:180px;"></div>
											</div>
										</td></tr>
										<tr><td style="height:220px;">
											<div class="border-all-E-1 color-K-1" style="float:left; height:214px; margin-bottom:2px; vertical-align:bottom; text-align:center; width:180px;"><img id="interface-promotions" src="" /></div>
										</td></tr>
									</table>
								</td>
								<td class="background-special-1" style="height:24px; background-position:-182px -101px; vertical-align:top; width:auto;">
									<div class="shine-less" style="float:right; height:24px; width:100%;">
										<div id="interface-screen-buttons" style="float:left; padding-top:5px; width:379px;">
											<!--// Button - Previous Page //-->
											<div class="simple-click toggle-button" id="button-previous-page" onfocus="javascript:this.blur();" style="float:left; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:60px;"><font class="font-G" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" />previous</font></div>
											<!--// Button - Previous Record //-->
											<div class="simple-click toggle-button" id="button-previous-record" onfocus="javascript:this.blur();" style="float:left; margin-left:4px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="font-G" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" /></font></div>
											<!--// Button - Page List //-->
											<div id="button-page-list" onfocus="javascript:this.blur();" style="display:none; float:left; height:12px; margin-left:3px; padding-left:12px; text-align:center; width:190px;"></div>
											<!--// Button - Next Page //-->
											<div class="simple-click toggle-button" id="button-next-page" onfocus="javascript:this.blur();" style="float:right; height:12px; text-align:center; visibility:hidden; width:60px;"><font class="font-G" style="font-weight:bold; font-size:10px; vertical-align:top;">next<img src="/lapcat/layout/icons/4-7-1.png" style="height:7px; margin-left:3px; width:4px;" /></font></div>
											<!--// Button - Next Record //-->
											<div class="simple-click toggle-button" id="button-next-record" onfocus="javascript:this.blur();" style="float:right; margin-right:4px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="font-G" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div>
										</div>
										<div id="interface-other-buttons" style="float:right; width:379px; padding-right:3px; padding-top:3px;">
											<!--// Button - Log Out //-->
											<div class="toggle-button simple-click" id="button-log-out" onfocus="javascript:this.blur();" style="display:none; float:right; height:15px; margin-right:3px; text-align:center; width:60px;"><font class="font-G" style="font-weight:bold; font-size:10px; vertical-align:top;">log out</font></div>
											<!--// Button - Decrease Font //-->
											<img class="fake-link float-right decrease-font-click" id="decrease-font" src="http://cdn1.lapcat.org/famfamfam/silk/font_delete.png" style="height:16px; width:16px;" title="Click to decrease the font size."/>
											<!--// Button - Increase Font //-->
											<img class="fake-link float-right increase-font-click" id="increse-font" src="http://cdn1.lapcat.org/famfamfam/silk/font_add.png" style="height:16px; width:16px;" title="Click to increase the font size."/>
										</div>
									</div>
								</td>
							</tr><tr>
								<td class="border-top-B-1" style="height:527px; vertical-align:top; width:100%;">
									<div class="border-left-B-1" style="padding:1px; height:525px; width:auto;">
										<div id="interface-content-displays" style="height:519px; vertical-align:top; width:100%;">
											<div id="destination-content" style="float:left; width:820px;"></div>
									</div>
								</td>
							</tr>
						</table>

				</div>
			</div>

		</div>

    	<!--// FOOTER - Information //-->
		<div id="lapcat|footer" style="float:left; margin-left:0.5%; margin-right:0.5%; margin-top:280px; width:99%;">
			<div style="width:100%;"><font class="font-X">By your continued use of this site, you agree to be bound by and abide by the <a class="font-L" href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a>.<br>Copyright 2007-2010, La Porte County Public Library System.<br><a class="font-L" href="/lapcat/files/Mission.pdf" target="_blank">About Us</a> | <a class="font-L" href="/lapcat/files/Meeting.pdf" target="_blank">Meeting Room Policy</a> | <a class="font-L" href="/lapcat/files/WebsiteUserGuidelines.pdf" target="_blank">Guidelines</a> | <a class="font-L" href="/lapcat/files/WebsitePrivacyPolicy.pdf" target="_blank">Privacy Policy</a> | <a class="font-L" href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a><br>LAPCAT <font class="font-X" style="font-size:10px;">&trade;</font> databases running MySQL are professionally monitored and managed by La Porte County Public Library System staff.</font></div>
			<div style="margin-top:8px; width:100%;"><a class="font-L" href="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="font-size:14px;" target="_blank" title="Open catalog in a new window.">Open the catalog in a new window.</a></div>
		</div>

	</div>

</div>

<!--// STAGE - List 100 //-->
<div id="list-HTML-100" style="display:none; width:100%;">
	<table cellpadding="0" cellspacing="0" id="container" style="float:left; height:auto; margin-left:3px; overflow:hidden; width:auto;">
		<tr>
			<td style="height:14px; width:100%;">
				<font class="font-X" id="header" style="font-size:14px; overflow:hidden; padding-left:4px;"></font>
			</td>
		</tr>
		<tr>
			<td id="data" style="height:auto; overflow:hidden; vertical-align:top; width:100%;"></td>
		</tr>
		<tr>
			<td id="open-line-data" style="width:100%;"></td>
		</tr>
	</table>
</div>

<!--// STAGE - List 300 //-->
<div id="list-HTML-300" style="display:none;">
	<table cellpadding="0" cellspacing="0" id="container" style="float:left; height:auto; min-width:322px; width:100%;">
		<tr>
			<td colspan="2" style="height:14px; width:100%;">
				<font class="font-X" id="header" style="float:left; position:relative; font-size:14px; padding-left:7px; top:6px;"></font>
				<img class="fake-link float-right magnifier-click" id="replace-master" name="magnify" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="display:none; height:16px; position:relative; padding-right:4px; top:7px; width:16px;">
			</td>
		</tr>
		<tr>
			<td id="data" style="height:auto; min-width:318px; overflow:hidden; padding:3px; vertical-align:top; width:100%;"></td>
			<td id="open-line-data" style="width:auto;"></td>
		</tr>
	</table>
</div>


<!--// Stage - Open Line 10 //-->
<div id="open-line-HTML-10" style="display:none; width:100%;">
	<div class="corners-top-2 corners-bottom-2" id="part-open-line" style="width:100%;">
		<div class="color-X-3 background-special-1" style="float:left; height:483px; width:100%;">
			<div class="border-all-C-1 corners-top-1 corners-bottom-1 shine-less" style="height:482px; position:relative; width:auto;">
				<div style="float:left; position:absolute; margin-top:20px; z-index:5; width:100%;">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:4px;"></td>
							<td class="background-alpha-3 border-all-D-1" style="width:auto;">
								<div id="content-open-line" style="height:431px; width:100%;"></div>
							</td>
							<td style="width:4px;"></td>
						</tr>
					</table>
				</div>
				<div class="light-down" id="content-graphics-line" style="height:482px; width:100%; z-index:4;">
					<div id="open-line-tags" style="width:100%; z-index:6;"></div>
					<div id="open-line-options" style="padding-top:437px; width:100%; z-index:6;">
						<!--// LINK - Expand //-->
						<div class="option-click fake-link button-black" name="" id="option-expand" onfocus="javascript:this.blur();" style="display:none; float:right; height:16px; margin-right:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Expand"><font class="font-G" id="font-expand" style="vertical-align:top; font-size:14px;">Expand</font></div>
						<!--// LINK - Favorite //-->
						<div class="option-click fake-link button-black" name="" id="option-favorite" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Favorite"><font class="font-G" id="font-favorite" style="vertical-align:top; font-size:14px;">Favorite</font></div>
						<!--// LINK - Anticipate //-->
						<div class="option-click fake-link button-black" name="" id="option-watched" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Anticipate"><font class="font-G" id="font-watched" style="vertical-align:top; font-size:14px;">Anticipate</font></div>
						<!--// LINK - Watch //-->
						<div class="option-click fake-link button-black" name="" id="option-watchlist" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Watch"><font class="font-G" id="font-watchlist" style="vertical-align:top; font-size:14px;">Watch</font></div>
						<!--// LINK - Collect //-->
						<div class="option-click fake-link button-black" name="" id="option-collect" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Collect"><font class="font-G" id="font-collect" style="vertical-align:top; font-size:14px;">Collect</font></div>
						<!--// LINK - Similar //-->
						<div class="option-click fake-link button-accent" name="" id="option-similar" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Similar"><font class="font-G" id="font-similar" style="vertical-align:top; font-size:14px;">Similar</font></div>
					</div>
        	    </div>
			</div>
		</div>
	</div>
</div>

<!--// Stage - Open Line 20 //-->
<div id="open-line-HTML-20" style="display:none; width:100%;">
	<div class="corners-top-2 corners-bottom-2" id="part-open-line" style="margin:2px; vertical-align:top; width:100%;">
		<div class="color-X-3 background-special-1" style="float:left; height:462px; width:100%;">
			<div class="border-all-D-1 corners-top-1 corners-bottom-1 shine-less" style="height:458px; position:relative; vertical-align:top; width:auto;">
				<div style="float:left; position:absolute; margin-top:20px; z-index:5; width:100%;">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:4px;"></td>
							<td style="width:auto;">
								<div class="background-alpha-3 border-all-E-1 corners-bottom-2 corners-top-2" style="height:400px; width:auto;">
									<div id="content-open-line" style="height:400px; width:99%; margin-left:0.5%;"></div>
								</div>
							</td>
							<td style="width:4px;"></td>
						</tr>
					</table>
				</div>
				<div id="content-graphics-line" style="height:460px; width:100%; z-index:4;">
					<div id="open-line-tags" style="width:100%; z-index:6;"></div>
					<div id="open-line-options" style="padding-top:430px; width:100%; z-index:6;">
						<!--// Button - Expand //-->
						<div class="button-black light-up option-click" id="option-expand" style="float:left; margin-left:4px; width:60px; text-align:center;" title="Click to expand the open line."><font class="font-G" style="font-size:14px;">expand</font></div>
						<!--// Button - Favorite //-->
						<div class="button-black light-up option-click" id="option-favorite" style="float:left; margin-left:4px; width:60px; text-align:center;" title="Click to expand the open line."><font class="font-G" style="font-size:14px;">favorite</font></div>
						<!--// Third Party Button - Facebook //-->
						<div id="third-party-facebook" style="display:none; float:right; margin-right:4px;">
							<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
							<a name="fb_share" type="icon_link" href="http://www.facebook.com/sharer.php">Share</a>
						</div>
						<!--// LINK - Expand //-->
						<div class="option-click fake-link button-black" name="" id="option-expand2" onfocus="javascript:this.blur();" style="display:none; float:right; height:16px; margin-right:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Expand"><font class="font-G" id="font-expand" style="vertical-align:top; font-size:14px;">Expand</font></div>
						<!--// LINK - Favorite //-->
						<div class="option-click fake-link button-black" name="" id="option-favorite" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Favorite"><font class="font-G" id="font-favorite" style="vertical-align:top; font-size:14px;">Favorite</font></div>
						<!--// LINK - Anticipate //-->
						<div class="option-click fake-link button-black" name="" id="option-watched" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Anticipate"><font class="font-G" id="font-watched" style="vertical-align:top; font-size:14px;">Anticipate</font></div>
						<!--// LINK - Watch //-->
						<div class="option-click fake-link button-black" name="" id="option-watchlist" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Watch"><font class="font-G" id="font-watchlist" style="vertical-align:top; font-size:14px;">Watch</font></div>
						<!--// LINK - Collect //-->
						<div class="option-click fake-link button-black" name="" id="option-collect" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Collect"><font class="font-G" id="font-collect" style="vertical-align:top; font-size:14px;">Collect</font></div>
						<!--// LINK - Similar //-->
						<div class="option-click fake-link button-accent" name="" id="option-similar" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Similar"><font class="font-G" id="font-similar" style="vertical-align:top; font-size:14px;">Similar</font></div>
					</div>
        	    </div>
			</div>
		</div>
	</div>
</div>

<!--// Stage - Open Line 30 //-->
<div id="open-line-HTML-30" style="display:none; width:100%;">
	<div class="corners-top-2 corners-bottom-2" id="part-open-line" style="margin:2px; vertical-align:top; width:100%;">
		<div class="color-X-3 background-special-1" style="float:left; height:464px; width:100%;">
			<div class="border-all-C-1 corners-top-1 corners-bottom-1 shine-less" style="height:460px; position:relative; vertical-align:top; width:auto;">
				<div style="float:left; position:absolute; margin-top:20px; z-index:5; width:100%;">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:4px;"></td>
							<td class="background-alpha-3 border-all-D-1" style="width:auto;">
								<div id="content-open-line" style="height:231px; width:100%;"></div>
							</td>
							<td style="width:4px;"></td>
						</tr>
					</table>
				</div>
				<div class="light-down" id="content-graphics-line" style="height:460px; width:100%; z-index:4;">
					<div id="open-line-tags" style="width:100%; z-index:6;"></div>
					<div id="open-line-options" style="padding-top:437px; width:100%; z-index:6;">
						<!--// LINK - Favorite //-->
						<div class="option-click fake-link button-black" name="" id="option-favorite" onfocus="javascript:this.blur();" style="display:none; float:left; height:16px; margin-left:3px; padding-left:3px; padding-right:3px; text-align:center; vertical-align:top; width:60px;" title="Favorite"><font class="font-G" id="font-favorite" style="vertical-align:top; font-size:14px;">Favorite</font></div>
					</div>
        	    </div>
			</div>
		</div>
	</div>
</div>

<!--// Stage - Special Line 1 //-->
<div id="special-line-HTML-1" style="display:none; width:100%;">
	<table cellpadding="0" cellspacing="0" style="height:482px; width:100%;">
		<tr>
			<td style="height:19px; width:100%;">
				<font class="font-bold font-X" id="special-line-header" style="float:left; margin-bottom:3px; position:relative; font-size:14px; padding-left:7px;"></font>
				<font class="font-H font-italic" id="special-line-sub-title" style="float:left; margin-top:1px; position:relative; font-size:12px;"></font>
			</td>
		</tr>
		<tr>
			<td style="height:auto; width:auto;">
				<table cellpadding="0" cellspacing="0" style="height:463px; width:100%;">
					<tr>
						<td style="height:auto; min-width:242px; vertical-align:top; width:auto;">
							<div style="float:left; height:auto; position:relative; min-width:242px; text-align:center; width:auto;">
								<img id="special-line-cover" style="border:0; height:auto; max-height:auto; max-width:240px; width:auto;"/>
							</div>
						</td>
						<td class="background-alpha-3 border-all-D-1" style="width:100%;"><div id="content-open-line" style="height:271px; width:100%;"></div></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<!--// Stage - Events Content //-->
<div id="stage-events-content" style="display:none;">
	<div class="color-Z-2 light-up" style="float:left; height:20px; width:100%;">
		<font style="font-size:16px; margin-left:8px;">replace-name</font>
	</div>
	<div style="float:left; width:100%;">
		<div style="height:374px; width:auto;">
			<div style="height:374px; width:auto;">
				<div style="height:20px; width:auto;">
					<div class="fake-link" style="float:left; vertical-align:top; width:auto;">
						<font class="font-X" style="font-size:10px; margin-left:12px;">at</font>
						<font class="add-to-search library-link-1 font-X location-replace-library-ID date-replace-o-date" name="construct|construct-2_key|search_value|replace-library-ID_text|replace-library" style="font-size:12px; margin-right:3px;">replace-library</font>
					</div>
					<div class="fake-link" style="float:right; vertical-align:top; width:auto;">
						<font class="add-to-search font-X" name="construct|construct-2_key|date_value|replace-o-date_text|replace-date-words" style="font-size:12px; margin-right:3px;">replace-date-words</font>
					</div>
				</div>
				<div style="height:383px; overflow:auto; width:100%;">
					<div class="border-bottom-C-1" style="float:left; height:1px; width:100%;"></div>
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:6px;"></td>
							<td style="width:auto;"><font id="open-line-description-font" style="font-size:12px;">replace-description</font></td>
							<td style="width:6px;"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// Stage - News Content //-->
<div id="stage-news-content" style="display:none;">
	<div style="float:left; height:380px; width:100%;">
		<table cellpadding="0" cellspacing="0" style="height:380px; vertical-align:top; width:100%;">
			<tr>
				<td style="height:36px; padding:1px; vertical-align:top; width:100%;"><div class="corners-bottom-2 color-Z-2 corners-top-2" style="height:36px; padding:1px; width:auto;"><div class="border-all-Z-1 corners-bottom-2 corners-top-2 database-dockable effect-hover-Z-1 fake-link light-down" name="replace-link-in" style="height:34px; width:auto;" title="Click to show this material in the catalog."><div style="height:32px; line-height:90%; padding-top:2px; text-align:center; width:100%;"><div style="height:32px; width:100%;"><a class="font-bold font-G fake-click" id="materials" onfocus="javascript:this.blur();" style="font-size:14px; height:32px;">replace-name</a></div></div></div></div></td>
			</tr>
			<tr>
				<td style="height:338px; overflow:hidden; padding-left:6px; padding-right:6px; vertical-align:top;">
				<div class="border-bottom-C-1" style="float:left; height:1px; width:100%;"></div>
				<font class="font-X" id="general-font-size" style="float:left; font-size:15px; overflow:auto; padding:2px; padding-left:6px; padding-right:6px; vertical-align:top;">replace-description</font>
				</td>
			</tr>
		</table>
	</div>
</div>
<!--/* Stage - Hours Content */-->
<div id="stage-hours-content" style="display:none;">
	<div class="color-Z-2 light-up" style="float:left; height:20px; width:100%;">
		<font style="font-size:16px; margin-left:8px;">replace-name</font>
	</div>
	<div style="float:left; width:100%;">
		<div style="height:374px; width:auto;">
			<div style="height:374px; width:auto;">
				<div style="height:370px; overflow:auto; width:100%;">
					<div class="border-bottom-C-1" style="float:left; height:1px; width:100%;"></div>
					<div id="current-day-of-week" style="display:none;">replace-current-day-of-week</div>
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="height:106px; width:156px; padding:3px;">
								<div class="corners-bottom-2 corners-top-2"><div class="border-all-F-1 corners-bottom-2 corners-top-2" style="background-image:url(/lapcat/layout/library/150-100-replace-counter.png); height:100px; width:150px;"></div></div>
							</td>
							<td style="vertical-align:top; width:auto;">
								<font class="font-X">replace-street</font><br/>
								<font class="font-X">replace-city-state</font><br/>
								<font class="font-X">replace-zip</font><br/>
								<font class="font-X">replace-phone</font>
							</td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="width:6px;"></td>
							<td style="width:auto;">
								<table cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td style="width:6px;"><img id="current-day-0" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-0" style="height:30px; text-align:center; width:40px;"><font class="font-X">Sun</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-0" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-0" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; widht:16px;" title="Click to search for events at replace-name on replace-date-words-0."/></td>
										<td style="width:auto;"><font id="current-day-time-0" class="font-X">replace-time-0</font></td>
									</tr>
									<tr>
										<td style="width:6px;"><img id="current-day-1" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-1" style="height:30px; text-align:center; width:40px;"><font class="font-X">Mon</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-1" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-1" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" title="Click to search for events at replace-name on replace-date-words-1."/></td>
										<td style="width:auto;"><font id="current-day-time-1" class="font-X">replace-time-1</font></td>
									</tr>
									<tr>
										<td style="width:6px;"><img id="current-day-2" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-2" style="height:30px; text-align:center; width:40px;"><font class="font-X">Tue</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-2" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-2" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" title="Click to search for events at replace-name on replace-date-words-2."/></td>
										<td style="width:auto;"><font id="current-day-time-2" class="font-X">replace-time-2</font></td>
									</tr>
									<tr>
										<td style="width:6px;"><img id="current-day-3" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-3" style="height:30px; text-align:center; width:40px;"><font class="font-X">Wed</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-3" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-3" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" title="Click to search for events at replace-name on replace-date-words-3."/></td>
										<td style="width:auto;"><font id="current-day-time-3" class="font-X">replace-time-3</font></td>
									</tr>
									<tr>
										<td style="width:6px;"><img id="current-day-4" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-4" style="height:30px; text-align:center; width:40px;"><font class="font-X">Thu</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-4" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-4" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" style="height:16px; width:16px;" title="Click to search for events at replace-name on replace-date-words-4."/></td>
										<td style="width:auto;"><font id="current-day-time-4" class="font-X">replace-time-4</font></td>
									</tr>
									<tr>
										<td style="width:6px;"><img id="current-day-5" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-5" style="height:30px; text-align:center; width:40px;"><font class="font-X">Fri</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-5" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-5" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" title="Click to search for events at replace-name on replace-date-words-5."/></td>
										<td style="width:auto;"><font id="current-day-time-5" class="font-X">replace-time-5</font></td>
									</tr>
									<tr>
										<td style="width:6px;"><img id="current-day-6" src="http://cdn1.lapcat.org/famfamfam/silk/resultset_next.png" style="display:none; height:16px; width:16px;"/></td>
										<td style="width:40px; padding:2px;"><div class="corners-bottom-2 corners-top-2"><div class="border-all-Z-1 corners-bottom-1 corners-top-1" id="current-day-cell-6" style="height:30px; text-align:center; width:40px;"><font class="font-X">Sat</font></div></div></td>
										<td style="width:20px;"><img class="fake-link multiple-add-to-search" id="current-day-search-6" name="construct:construct-2,search:replace-ID|replace-name,date:1|replace-date-6" src="http://cdn1.lapcat.org/famfamfam/silk/calendar.png" style="height:16px; width:16px;" title="Click to search for events at replace-name on replace-date-words-6."/></td>
										<td style="width:auto;"><font id="current-day-time-6" class="font-X">replace-time-6</font></td>
									</tr>
								</table>
							</td>
							<td style="width:6px;"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// Stage - Materials Content //-->
<div id="stage-materials-content" style="display:none;">
	<div style="float:left; height:380px; width:100%;">
		<table cellpadding="0" cellspacing="0" style="height:380px; vertical-align:top; width:100%;">
			<tr>
				<td style="height:36px; padding:1px; vertical-align:top; width:auto;">
					<div class="button-blue effect-hover-Z-1 light-up" id="materials-replace-ID" name="counter-replace-counter" style="float:left; height:40px; margin-top:4px; width:100%; text-align:center;" title="Click to show this material in the catalog.">
						<div class="browse-link fake-link" name="http://catalog.lapcat.org/search/ireplace-ISBNorSN" style="height:40px; width:100%;">
							<div style="height:40px; text-align:left; width:auto;">
								<table style="height:40px; width:100%;">
									<tr>
										<td style="height:20px; overflow:hidden; vertical-align:top; width:auto;">
											<font class="font-G" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
										</td>
									</tr>
									<tr>
										<td style="height:20px; overflow:hidden; vertical-align:top; width:auto;">
											<font class="font-L" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-sub-name</font>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</td>
				<td style="height:auto; overflow:hidden; vertical-align:top; width:64px;">
					<div name="available-at-home" style="float:left; margin-left:16px; margin-top:4px; width:18px;">replace-available-home</div>
					<div name="available-at-other" style="float:left; margin-top:4px; width:18px;">replace-available-other</div>
					<div class="button-blue effect-hover-Z-1 light-up" style="float:left; margin-top:5px; margin-left:4px; width:60px; text-align:center;" title="Click to show this material's request page in the catalog."><font class="browse-link font-G" name="https://catalog.lapcat.org:443/patroninfo~S12?/0/redirect=/search%7ES12?/ireplace-ISBNorSN/ireplace-ISBNorSN/1%2C1%2C1%2CE/request&FF=ireplace-ISBNorSN&1%2C1%2C" style="font-size:14px;">request</font></div>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="height:338px; overflow:hidden; padding-left:6px; padding-right:6px; vertical-align:top;">
				<div class="border-bottom-C-1" style="float:left; height:1px; width:100%;"></div>
				<font class="font-X" id="general-font-size" style="float:left; font-size:15px; overflow:hidden; padding:2px; padding-left:6px; padding-right:6px; vertical-align:top;">replace-summary</font>
				</td>
			</tr>
		</table>
	</div>
</div>

<!--// Stage - Databases Content //-->
<div id="stage-databases-content" style="display:none;">
	<div style="float:left; width:100%;">
		<div style="height:374px; width:auto;">
			<div style="height:374px; width:auto;">
				<div style="height:374px; width:auto;">
				<table cellpadding="0" cellspacing="0" style="height:374px; vertical-align:top; width:100%;">
					<tr>
						<td style="height:36px; padding:1px; vertical-align:top; width:100%;">
							<div class="button-blue effect-hover-Z-1 light-up" id="news-replace-ID" name="counter-replace-counter" style="float:left; height:40px; margin-top:4px; min-width:396px; text-align:center;" title="Click to use this database.">
								<div class="database-dockable fake-link" name="replace-link-in" style="height:40px; width:100%;">
									<div style="height:40px; text-align:left; width:auto;">
										<table style="height:40px; width:100%;">
											<tr>
												<td style="height:40px; overflow:hidden; vertical-align:top; width:100%;">
													<font class="font-G" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">replace-name</font>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
                        </td>
					</tr>
					<tr>
						<td style="height:338px; overflow:hidden; padding-left:6px; padding-right:6px; vertical-align:top;">
							<div class="border-bottom-C-1" style="float:left; height:1px; width:100%;"></div>
							<font class="font-X" style="font-size:12px; margin-left:6px;">replace-description</font>
						</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>