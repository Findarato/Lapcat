<!--//                 //-->
<!--// layout2-2009.php //-->
<!--//                 //-->
<div class="color-background" id="lapcat|header" style="position:absolute; width:100%;">
	<div class="image-background" id="lapcat|background" style="height:930px;">

		<div class="shine-less" style="height:18px; width:100%;">
			<div style="float:left; width:285px;"><a class="opposite" href="javascript:F_SetDockable(0);F_MR('/home/reset/ajax',true)" onfocus="javascript:this.blur();" style="margin-left:6px;">La Porte County Public Library System</a></div>

			<!--// LINK - Tickets //-->
			<div id="top-level-tickets" style="display:none; float:right; margin-right:16px;">
				<a class="opposite" href="javascript:F_SetDockable(10);" id="dockable|8" onfocus="javascript:this.blur();">Tickets</a></div>

			<!--// LINK - Hangman //-->
			<!--//
			<div style="float:right; margin-right:16px;">
				<a class="opposite" href="javascript:F_SetDockable(3);" id="dockable|3" onfocus="javascript:this.blur();">Hangman</a></div>
			//-->
<?
if($V_LI){
echo '		<!--// LINK - Market //-->
			<!--//
			<div style="float:right; margin-right:16px;"><a class="opposite" href="javascript:F_SetDockable(9);" id="dockable|7" onfocus="javascript:this.blur();">Market</a></div>
			//-->
';}
?>
			<!--// LINK - Objectives //-->
			<div style="float:right; margin-right:16px;">
				<a class="opposite" href="javascript:F_SetDockable(2);" id="dockable|2" onfocus="javascript:this.blur();">Objectives</a></div>

			<!--// LINK - Options //-->
			<div id="top-level-options" style="display:none; float:right; margin-right:16px;">
				<a class="opposite" href="javascript:F_SetDockable(12);" id="dockable|5" onfocus="javascript:this.blur();">Options</a></div>

			<!--// LINK - Help //-->
			<!--//
			<div style="float:right; margin-right:16px;">
				<a class="opposite" href="javascript:F_SetDockable(8);" id="dockable|6" onfocus="javascript:this.blur();">Help</a></div>
			//-->
			<!--// LINK - Donations //-->
			<div style="float:right; margin-right:16px;">
				<a class="gold" href="javascript:F_SetDockable(6);" id="dockable|4" onfocus="javascript:this.blur();">Donations</a></div>
			<!--// LINK - Catalog //-->
			<div style="float:right; margin-right:16px;">
				<a class="opposite" href="javascript:F_SetDockable(1);" id="dockable|1" onfocus="javascript:this.blur();">Catalog</a></div>

			<!--// LINK - Close //-->
			<div style="float:right; margin-right:16px;">
				<a class="dark-red" href="javascript:F_SetDockable(0);" id="dockable|0" onfocus="javascript:this.blur();" style="font-weight:bold;"></a></div>
		</div>

		<!--// LOGO - LAPCAT //-->
		<div style="float:left; height:58px; width:100%;">

			<div style="float:left; height:58px; margin-left:8px; width:101px;">
				<a href="javascript:F_MR('/home/reset/ajax',true);" onfocus="javascript:this.blur();"><img src="/lapcat/images/101-58-1.png" style="height:58px; width:101px;"/></a>
			</div>
			<div style="float:left; height:58px; width:179px;">
				<a href="javascript:F_MR('/home/reset/ajax',true);" onfocus="javascript:this.blur();"><img src="/lapcat/images/100-18-0.png" style="height:18px; margin-top:10px; width:100px;"/></a><font class="med-grey" style="margin-left:2px;">&trade;</font><br/><font style="font-size:14px;">My Library, Online</font>
			</div>

				<!--// LOG-IN //-->
				<div id="user-status-14" style="display:none; float:right; margin-right:12px; padding-top:6px; width:286px;">
					<form action="/lapcat/code/accounts.php" method="post">
						<div style="float:left; width:224px;">
							<div style="float:right; height:22px; margin-right:12px;">
								<font>Account: </font><input autocomplete="OFF" class="dropdown" name="username" type="text" style="width:140px;"></input></div>
							<div style="float:right; height:22px; margin-right:12px;">
								<font>Password: </font><input autocomplete="OFF" class="dropdown" name="pass" type="password" style="width:140px;"></input></div>
						</div>
						<div style="float:left; height:44px; width:60px;">
							<div style="float:left; height:22px; margin-top:11px;">
								<button class="dropbutton shadow-down" type="submit" style="cursor:pointer;"><font class="white">Submit</font></button>
								<input name="submitted" type="hidden" value="0"></input></div>
						</div>
					</form>
				</div>

				<!--// STATUS //-->
				<div id="user-status-15" style="display:none; float:right; margin-right:8px; margin-top:1px; width:180px;">
					<div class="darker OL-fred" style="position:relative; height:68px; padding:2px; text-align:right;">
						<div style="position:absolute; width:10px; bottom:3px; left:3px;"><a href="javascript:F_LogOut();"><font class="light-grey" style="font-size:10px;">log-out</font></a></div>
						<font class="med-grey" id="LI-usertype" style="font-size:10px;"></font> <a href="/" class="gold" id="LI-username" style="font-size:14px; font-weight:bold; margin-left:4px;"></a><br/>
						<font><span id="LI-objective-points" style="font-size:12px;"></span></font><img src="/lapcat/layout/icons/21-21-30.png" style="height:12px; margin-left:2px; margin-right:2px; width:12px;" title="LAPCAT Points" /><br/>
						<font><span id="LI-patron-plus-points" style="font-size:12px;"></span></font><img src="/lapcat/layout/icons/21-21-31.png" style="height:12px; margin-left:2px; margin-right:2px; width:12px;" title="Patron Plus Points" />
					</div>
				</div>

			<div id="hotkey-holder" style="display:none; float:right;">

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
			<div id="loading-dots" style="float:left; height:20px; margin-left:2px; width:20px;"></div>

<?
if(!$V_LI){
echo '
			<!--// LINK - Home //-->
			<div id="MMS-2" class="menu-link" onclick="javascript:F_MR(\'/join/clear/ajax\',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; height:20px; margin-left:1px;"><font class="gold" style="font-size:14px; margin-left:9px; margin-right:9px;">Home</font></div>
';}else{echo '
			<!--// LINK - My Library //-->
			<div id="MMS-3" class="menu-link" onclick="javascript:F_MR(\'/my-library/clear/ajax\',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">My Library</font></div>
';}
?>
			<!--// LINK - News //-->
			<div id="MMS-131" class="menu-link" onclick="javascript:F_MR('/news/clear-search/ajax',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">News</font></div>

			<!--// LINK - Events //-->
			<div id="MMS-28" class="menu-link" onclick="javascript:F_MR('/events/clear-search/ajax',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">Events</font></div>

			<!--// LINK - Materials //-->
			<div id="MMS-34" class="menu-link" onclick="javascript:F_MR('/materials/clear-search/ajax',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">Materials</font></div>

			<!--// LINK - Databases //-->
			<div id="MMS-10" class="menu-link" onclick="javascript:F_MR('/databases/clear-search/ajax',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">Databases</font></div>

			<!--// LINK - Jobs //-->
			<!--//<div id="MMS-11" class="menu-link" onclick="javascript:F_MR('/jobs/clear-search/ajax',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">Jobs</font></div>//-->

			<!--// LINK - Hours //-->
			<div id="MMS-8" class="menu-link" onclick="javascript:F_MR('/hours/browse/ajax',true);" onfocus="javascript:this.blur();" style="cursor:pointer; float:left; margin-left:1px; height:20px;"><font class="opposite" style="font-size:14px; margin-left:9px; margin-right:9px;">Hours</font></div>

		</div>

		<div style="float:left; vertical-align:top; width:100%;">

			<!--// LAPCAT - Normal Display (Dockables) //-->
			<div class="border-main-1 color-off" id="lapcat|dockable" style="float:left; height:571px; margin-left:6px; position:absolute; top:20px; width:99%; z-index:-8; vertical-align:top;">
				<iframe id="dockable|content" src="" style="border:0; height:571px; visibility:visible; width:100%;"></iframe>
			</div>

			<!--// LAPCAT - Normal Display //-->
			<div class="border-main-1 darkest" style="float:left; height:495px; vertical-align:top; margin-left:6px; width:99%;">

				<!--// DISPLAY - Displays //-->
				<div class="shine-less" style="float:left; width:100%;">

						<table style="width:100%;">
							<tr>
								<td rowspan="2" style="height:495px; vertical-align:top; width:180px;">
									<table style="height:495px; vertical-align:top;">
										<tr><td style="height:auto; vertical-align:top;">

									<div class="hidden" id="layout|join-LAPCAT" style="float:left; height:auto; vertical-align:top; width:180px;">
										<div style="float:left; margin-left:5px; width:93%;">
											<div id="layout|join-LAPCAT-header" style="height:14px; padding-left:2px; width:98%;"><font class="med-grey" style="font-size:10px;">New Users</font></div>
											<div id="layout|join-LAPCAT" style="padding-left:4px; width:98%;"><a class="gold" href="javascript:F_SetDockable(8);" onfocus="javascript:this.blur();" title="Join LAPCAT!">Create An Account</a></div>
										</div>
									</div>

									<div class="shown" id="area-secondary|tag" style="float:left; height:auto; vertical-align:top; width:180px;">
										<div style="float:left; margin-left:5px; width:93%;">
											<div id="area|hotkey|change-tag|drop" style="padding-left:2px; width:98%;"></div>
										</div>
									</div>

									<div class="shown" id="area-secondary|drop" style="float:left; height:auto; vertical-align:top; width:180px;">
										<div style="float:left; margin-left:5px; width:93%;">
											<div id="area|hotkey|change-search|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|change-sort|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|calendar|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|actor|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|artist|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|author|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|console-name|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|developer|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|m-artist|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|narrator|drop" style="padding-left:2px; width:98%;"></div>
											<div id="area|hotkey|writer|drop" style="padding-left:2px; width:98%;"></div>
										</div>
									</div>

									<div class="hidden" id="layout|menu-holder" style="float:left; height:auto; vertical-align:top; width:180px;">
										<div style="float:left; margin-left:5px; width:93%;">
											<div id="layout|menu-header" style="height:14px; padding-left:2px; width:98%;"><font class="med-grey" style="font-size:10px;">Popular Tags</font></div>
											<div id="layout|menu" style="padding-left:4px; width:98%;"></div>
										</div>
									</div>

										</td></tr>
										<tr><td style="height:224px;">
									<div class="border-main-1" style="float:left; height:214px; margin-bottom:2px; margin-top:4px; vertical-align:bottom; text-align:center; width:180px;"><img id="promotions|spot" src="" /></div>
										</td></tr>
									</table>
								</td>
								<td style="height:18px; vertical-align:top; width:379px;">
									<div class="border-bot-dark-1" style="float:right; height:18px; width:100%;">
										<div class="shown" id="lapcat|line-options" style="float:left; width:379px;">
											<div class="next-button OL-fred" id="option|up|visibility" onclick="javascript:F_PDU(false);" onfocus="javascript:this.blur();" style="float:left; margin-top:1px; height:12px; text-align:center; visibility:hidden; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" />Previous</font></div>
											<div class="next-button OL-fred" id="option|left|visibility" onclick="javascript:F_RLR(false);" onfocus="javascript:this.blur();" style="float:left; margin-left:4px; margin-top:1px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" /></font></div>
											<div class="next-button OL-fred" id="option|down|visibility" onclick="javascript:F_PDU(true);" onfocus="javascript:this.blur();" style="float:right; margin-top:1px; height:12px; text-align:center; visibility:hidden; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">Next<img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div>
											<div class="next-button OL-fred" id="option|right|visibility" onclick="javascript:F_RLR(true);" onfocus="javascript:this.blur();" style="float:right; margin-right:4px; margin-top:1px; height:12px; text-align:center; vertical-align:top; visibility:hidden; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div>
										</div>
										<div id="lapcat|other-options" style="float:right; height:18px; text-align:left; width:auto;">
											<div id="other-options|reset" class="hidden" style="width:64px;"><div class="next-button OL-fred" id="option|reset" onclick="javascript:F_Reset();" onfocus="javascript:this.blur();" style="float:right; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">Reset</font></div></div>
										</div>
										<div id="lapcat|other-options" style="float:right; height:18px; text-align:left; width:auto;">
											<div id="other-options|create-hotkey" class="hidden" style="width:64px;"><div class="next-button OL-fred" id="option|create-hotkey" onclick="javascript:F_SetDockable(11);" onfocus="javascript:this.blur();" style="float:right; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">Hotkey</font></div></div>
										</div>
										<div id="lapcat|other-options" style="float:right; height:18px; text-align:left; width:auto;">
											<div id="other-options|random" class="shown" style="width:64px;"><div class="next-button OL-fred" id="option|random" onclick="javascript:F_Clear();" onfocus="javascript:this.blur();" style="float:right; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">Random</font></div></div>
										</div>
									</div>
								</td>
								<td style="width:auto;"></td>
							</tr><tr>
								<td rowspan="2" id="displays-3" style="vertical-align:top; width:100%;"><span id="displays|text" style="font-size:12px;"></span></td>
							</tr>
						</table>

				</div>
			</div>

		</div>

    	<!--// FOOTER - Information //-->
		<div id="lapcat|footer" style="height:auto; margin-left:6px; vertical-align:bottom; margin-top:6px; width:99%;">
			<!--//<div style="width:100%;"><font>Link<font class="grey">:</font> <span id="area-page-link"></span></font></div>//-->
			<div style="width:100%;"><font>By your continued use of this site, you agree to be bound by and abide by the <a href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a>.<br>Copyright 2007-2009, La Porte County Public Library System.<br><a href="/lapcat/files/Mission.pdf" target="_blank">About Us</a> | <a href="/lapcat/files/Meeting.pdf" target="_blank">Meeting Room Policy</a> | <a href="/lapcat/files/WebsiteUserGuidelines.pdf" target="_blank">Guidelines</a> | <a href="/lapcat/files/WebsitePrivacyPolicy.pdf" target="_blank">Privacy Policy</a> | <a href="/lapcat/files/WebsiteTermsOfUse.pdf" target="_blank">User Agreement</a><br>LAPCAT <font style="font-size:10px;">&trade;</font> databases running MySQL are professionally monitored and managed by La Porte County Public Library System staff.</font></div>
			<div style="margin-top:8px; width:100%;"><a class="opposite" href="http://catalog.lapcat.org" onfocus="javascript:this.blur();" style="font-size:14px;" target="_blank" title="Open catalog in a new window.">Open the catalog in a new window.</a></div>
		</div>

	</div>

</div>