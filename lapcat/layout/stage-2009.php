<!--//                //-->
<!--// stage-2009.php //-->
<!--//                //-->
<!--// DISPLAYS - Join //-->
<div id="join|lapcat" style="display:none; overflow:hidden; position:absolute; top:0px; visibility:hidden; z-index:-8;">
	<table style="height:460px; width:100%;"><tr>
		<td style="height:auto; vertical-align:top; width:auto;">
			<table cellspacing="0" cellpadding="0" style="height:auto; margin-top:2px; width:100%;"><tr>
				<td style="padding-left:8px; width:100%;"></td>
			</tr></table>
		</td>
	</tr></table>
</div>

<!--// DISPLAYS - Content //-->
<div id="DT|holder" style="overflow:hidden; position:absolute; top:0px; visibility:hidden; z-index:-8;">
	<table style="height:460px; width:100%;"><tr>
		<td style="height:auto; vertical-align:top; width:auto;">
			<table cellspacing="0" cellpadding="0" style="height:auto; margin-top:2px; width:100%;"><tr>
				<td class="" id="line|data" style="vertical-align:top; width:378px;"></td>
				<td id="OL|data" style="vertical-align:top; width:auto;"></td>
				<td style="width:4px;"></td>
			</tr></table>
		</td>
	</tr></table>
</div>

<!--// CONTENT - Line //-->
<div id="L|holder" style="display:none; overflow:hidden; position:absolute; top:0px; visibility:hidden; z-index:-10;">
	<div id="OLL|replace-ID" style="height:auto; width:100%;">
		<table cellpadding="0" cellspacing="0" style="height:40px; margin-top:2px; margin-bottom:2px; width:100%;"><tr>
			<td class="line" id="OLi|replace-ID" onclick="" style="height:41px; vertical-align:top; width:auto;">
				<div id="OLLi|replace-ID" style="float:left; overflow:hidden; width:auto;"></div>
			</td>
		</tr><tr>
			<td id="OL|replace-ID" style="height:auto;"></td>
		</tr></table>
		<span id="OLD|replace-ID" style="display:none; visibility:hidden;"></span>
	</div>
</div>

<!--// DOCKABLES //-->

<!--// Dockable - Base //-->
<div id="dockable|base" style="height:auto; width:auto; top:0px; left:0px; z-index:12;"></div>

<!--// Dockable - Template (Opened) //-->
<div id="dockable|template" style="height:auto; width:auto; top:0px; left:0px; z-index:-12;">
	<div id="dockable|replace-ID|HTML" class="darkest" style="height:100%; position:absolute; top:0px; left:0px; width:100%; z-index:-11;">
		<center>
		<div class="border-strong-1" style="background-color:rgba(0,0,0,1.0); height:600px; margin-top:8px; width:804px;">
			<div class="border-bot-dark-1" style="height:20px; text-align:right; vertical-align:middle;">
				<div style="float:left; margin-left:6px;"><font style="font-size:14px; font-weight:bold;">LAPCAT</font>&nbsp;<font class="grey">&trade;</font></div>
				<div id="dockable|replace-ID|options" style="margin-right:4px;"></div>
			</div>
			<iframe class="border-dark-2" id="dockable|replace-ID|content" src="" style="height:576px; visibility:hidden; width:800px;"></iframe>
		</div>
		</center>
	</div>
</div>

<!--// Dockable - Option (Close) //-->
<div id="dockable|option|2"><a href="javascript:F_PD(replace-ID,2);" onfocus="javascript:this.blur();"><img class="C-X" src="/lapcat/layout/icons/21-21-14.png" /></a></div>

<!--// Dockable - Option (Dock) //-->
<div id="dockable|option|3"><a href="javascript:F_PD(replace-ID,3);" onfocus="javascript:this.blur();"><img class="C-dock" src="/lapcat/layout/icons/21-21-10.png" /></a></div>

<!--// Dockable - Option (New Window) //-->
<div id="dockable|option|6"><a href="javascript:F_PD(replace-ID,6);" onfocus="javascript:this.blur();"><img class="C-new-window" src="/lapcat/layout/icons/21-21-12.png" /></a></div>

<!--// Dockable - Template (Docked) //-->
<div id="dockable|dockable-ID|hotkey" style="visibility:hidden; top:0px; z-index:-12;">
	<div class="option-all" id="bar-hotkey-link-CD" onclick="" onfocus="javascript:this.blur();" style="float:right; margin-right:6px;">
		<div class="option-black" style="height:52px; width:52px;">
			<a href="javascript:F_PD(dockable-ID,4);" onfocus="javascript:this.blur();">
				<img id="bar-hotkey|dockable-ID|CD" src="/lapcat/images/42-42-1200.png" style="height:42px; margin:5px; width:42px;"/></a>
		</div>
	</div>
</div>

<!--// AJAX - Throbber //-->
<div id="ajax|throbber" style="display:none; visibility:hidden;"><img src="/lapcat/images/loading-dots.gif" style="height:auto; width:auto;"/></div>

<!--// OPEN-LINE - News //-->
<div id="OL|news|holder" style="display:none; height:100%; position:absolute; visibility:hidden; width:100%; z-index:-14;">
	<div class="border-main-1 color-off fred" style="float:left; height:452px; width:100%;">
		<div class="shine-less" style="height:452px; width:auto;">
			<div class="light-down" id="inside|data" style="height:452px; width:100%;">

				<div style="float:left; height:30px; overflow:hidden; width:100%;">
					<div id="OL|group-icons" style="float:left; padding-left:5px; width:35px;"></div>
					<div class="dark OL-fred" style="height:20px; margin:4px; padding:2px;"><font id="OL|tags"></font></div>
				</div>

				<div style="float:left; height:7px; width:100%;"></div>

				<div style="float:left; height:20px; width:100%;">
					<div style="float:left;"><font class="white" id="OL|name" style="font-size:14px; margin-left:8px;"></font></div>
					<div style="float:right;"><font class="white" id="OL|total-views">0</font>
						<font class="white" style="font-size:10px; margin-right:6px;"> views</font></div>
				</div>

				<div style="float:left; width:100%;">

					<div style="height:348px; width:auto; margin:4px;">

						<div class="dark OL-fred" style="height:348px; width:auto;">
							<div style="height:20px; overflow:hidden; width:auto;">

								<font class="dark-grey" style="margin-left:8px;">by</font>
								<font class="gold" id="OL|username" style="margin-left:3px;"></font>
								<font class="dark-grey" style="margin-left:3px;">on</font>
								<font id="OL|entered-on-words" style="margin-left:3px;"></font>

							</div>

							<div class="scrollbar-hidden" id="OL|scrollbar" style="height:324px; padding-left:6px; padding-right:6px; width:auto;">
								<font id="OL|description"><font style="font-size:14px;">...</font></font>
							</div>

						</div>

						<div id="OL|options" style="float:left; padding-top:4px; margin-top:6px; width:auto;"></div>

						<div id="OL|more-info" style="float:right; margin-top:6px; padding-right:6px; padding-top:2px; overflow:hidden; text-align:right; width:auto;">
							<span class="option-black fg-button ui-corner-all" onclick="javascript:F_OpenDockable(0);" style="float:right; margin-right:8px; padding:2px; width:70px;"><a class="white">More Info</a></span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// OPEN-LINE - Events //-->
<div id="OL|events|holder" style="display:none; height:100%; position:absolute; visibility:hidden; width:100%; z-index:-14;">
	<div class="border-main-1 color-off fred" style="float:left; height:452px; width:100%;">
		<div class="shine-less" style="height:452px; width:auto;">
			<div class="light-down" id="inside|data" style="height:452px; width:100%;">

				<div style="float:left; height:30px; overflow:hidden; width:100%;">
					<div id="OL|group-icons" style="float:left; padding-left:5px; width:35px;"></div>
					<div class="dark OL-fred" style="height:20px; margin:4px; padding:2px;"><font id="OL|tags"></font></div>
				</div>

				<div id="OL|progress-bar" style="float:left; padding-left:5px; padding-right:5px; padding-top:3px; width:100%;"></div>

				<div style="float:left; height:20px; width:100%;">
					<div style="float:left;"><font class="white" id="OL|name" style="font-size:14px; margin-left:8px;"></font></div>
				</div>

				<div style="float:left; width:100%;">

					<div style="height:348px; width:auto; margin:4px;">

						<div class="dark OL-fred" style="height:348px; width:auto;">
							<div style="height:20px; overflow:hidden; width:auto;">

								<font class="dark-grey" style="margin-left:8px;">on</font>
								<font id="OL|o-date" style="margin-left:3px;"></font>
								<font class="dark-grey" style="margin-left:3px;">at</font>
								<font id="OL|start" style="margin-left:3px;"></font>
								<font class="dark-grey" style="font-size:10px; margin-left:3px;">-</font>
								<font id="OL|end" style="margin-left:3px;">???</font>

							</div>

							<div style="height:18px; width:auto;">
								<font class="dark-grey" style="margin-left:8px;">at</font>
								<font class="text-font" style="font-size:14px; font-weight:bold;"> - </font>
								<font id="OL|library" style="margin-left:3px;"></font>
							</div>

							<div style="height:324px; overflow:hidden; padding-left:6px; padding-right:6px; width:auto;">
								<font id="OL|description"><font style="font-size:14px;">...</font></font>
							</div>

						</div>

						<div id="OL|options" style="float:left; padding-top:4px; margin-top:6px; width:auto;"></div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!--// OPEN-LINE - Materials //-->
<div id="OL|materials|holder" style="height:100%; position:absolute; visibility:hidden; width:100%; z-index:-14;">
	<div class="border-main-1 color-off fred" style="float:left; height:452px; width:100%;">
		<div class="shine-less" style="height:452px; width:auto;">
			<div class="light-down" id="inside|data" style="height:452px; width:100%;">

				<div style="float:left; height:30px; overflow:hidden; width:100%;">
					<div id="OL|group-icons" style="float:left; padding-left:5px; width:35px;"></div>
					<div class="dark OL-fred" style="height:20px; margin:4px; padding:2px;"><font id="OL|tags"></font></div>
				</div>

				<div style="float:left; height:7px; width:100%;"></div>

				<div style="float:left; height:18px; overflow:hidden; width:100%;">
					<font class="white" id="OL|name" style="float:left; font-size:14px; margin-left:8px;"></font>
					<font class="white" id="OL|sub-name" style="float:left; font-size:10px; margin-left:3px;"></font>
				</div>

				<table style="float:left; width:100%;"><tr>
					<td rowspan="2" style="vertical-align:top; width:87px;">
						<div id="OL|cover-image" style="float:left; height:124px; padding-top:4px; padding-left:5px; vertical-align:bottom; width:83px;"><img src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></div>
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
									<div style="float:left; height:20px; width:70px;"><span id="OL|star-rating"></span></div>
									<div style="float:left; height:20px; width:120px;"></div>
									<div style="float:left; height:20px; width:70px;">
										<div class="hidden" id="stars-my-rating" onmouseover="javascript:F_ToggleStars(0);" style="height:14px; position:absolute; vertical-align:bottom; width:70px;"><span id="OL|my-star-rating">Stars</span></div>
										<div class="hidden" id="stars-select" onmouseout="javascript:F_ToggleStars(1);" onclick="javascript:F_CountStars();" style="cursor:pointer; float:right; height:14px; position:absolute; vertical-align:bottom; width:70px;"><div class="star-sky" id="OL-sky|0" onmouseout="javascript:A_Sky[0]=0;" onmouseover="javascript:A_Sky[0]=1;" style="height:14px; position:relative; width:70px;"><div class="star-sky" id="OL-sky|1" onmouseout="javascript:A_Sky[1]=0;" onmouseover="javascript:A_Sky[1]=1;" style="height:14px; left:14px; position:relative; width:56px;"><div class="star-sky" id="OL-sky|2" onmouseout="javascript:A_Sky[2]=0;" onmouseover="javascript:A_Sky[2]=1;" style="height:14px; left:14px; position:relative; width:42px;"><div class="star-sky" id="OL-sky|3" onmouseout="javascript:A_Sky[3]=0;" onmouseover="javascript:A_Sky[3]=1;" style="height:14px; left:14px; position:relative; width:28px;"><div class="star-sky" id="OL-sky|4" onmouseout="javascript:A_Sky[4]=0;" onmouseover="javascript:A_Sky[4]=1;" style="height:14px; left:14px; position:relative; width:14px;"></div></div></div></div></div></div>
									</div>
								</div>

						</div></div></div>
					</td>
				</tr><tr>
					<td style="vertical-align:top; width:auto;">
					<div style="vertical-align:top; width:auto;">
						<div style="height:20px; vertical-align:bottom; width:auto;">
							<font class="white" style="font-size:10px;">Availability</font></div>
						<table style="height:16px; width:300px;">
                        <tr>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Main" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|0" style="font-size:12px;">Main Library</font></div>
							</div>
						</td>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Coolspring" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|1" style="font-size:12px;">Coolspring</font></div>
							</div>
						</td>
						</tr>
						<tr>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Fish" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|2" style="font-size:12px;">Fish Lake</font></div>
							</div>
						</td>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Hanna" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|3" style="font-size:12px;">Hanna</font></div>
							</div>
						</td>
						</tr>
						<tr>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Kingsford" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|4" style="font-size:12px;">Kingsford Heights</font></div>
							</div>
						</td>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Rolling" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|5" style="font-size:12px;">Rolling Prairie</font></div>
							</div>
						</td>
						</tr>
						<tr>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Union" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|6" style="font-size:12px;">Union Mills</font></div>
							</div>
						</td>
						<td style="height:16px; overflow:hidden; width:150px;">
							<div style="height:16px; overflow:hidden; position:relative; width:150px;">
								<div id="OL-M|Bookmobile" style="float:left; text-align:right; width:40px;">&nbsp;</div>
								<div style="float:left; width:110px;"><font class="white" id="home-library|7" style="font-size:12px;">Mobile Library</font></div>
							</div>
						</td>
						</tr>
						</table>
					<div style="height:0px; overflow:hidden; visibility:hidden; width:0px;"><span class="" id="OL-M|ISBNorSN" title=""></span></div>
					</td></tr>
				</table>

				<div style="float:left; width:100%;">

					<div style="height:218px; width:auto; margin:4px;">

						<div class="dark OL-fred" style="height:218px; width:auto;">
							<div style="height:40px; overflow:hidden; width:auto;">

								<div style="float:left; height:20px; overflow:hidden; width:100%;"><font class="dark-grey" id="OL|credit">...</font></div>
								<div style="float:left; height:20px; overflow:hidden; width:100%;"><font class="dark-grey" style="margin-left:16px;">year</font><font class="text-font" style="font-size:14px; font-weight:bold;"> - </font><font id="OL|year" style="margin-left:3px;"></font></div>

							</div>

							<div style="height:174px; overflow:hidden; padding-left:6px; padding-right:6px; width:auto;">
								<font id="OL|featured-review"><font style="font-size:14px;">User reviews will be coming soon.</font></font>
							</div>

						</div>

						<div id="OL|options" style="float:left; padding-top:4px; margin-top:6px; width:auto;"></div>

						<div id="OL|more-info" style="float:right; margin-top:6px; padding-right:6px; padding-top:4px; overflow:hidden; text-align:right; width:auto;">
							<span class="option-black fg-button ui-corner-all" onclick="javascript:F_OpenDockable(0);" style="float:right; margin-right:8px; padding:2px; width:70px;"><a class="white">More Info</a></span>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!--// OPEN-LINE - Databases //-->
<div id="OL|databases|holder" style="display:none; height:100%; position:absolute; visibility:hidden; width:100%; z-index:-14;">
	<div class="border-main-1 color-off fred" style="float:left; height:452px; width:100%;">
		<div class="shine-less" style="height:452px; width:auto;">
			<div class="light-down" id="inside|data" style="height:452px; width:100%;">

				<div style="float:left; height:30px; overflow:hidden; width:100%;">
					<div id="OL|group-icons" style="float:left; padding-left:5px; width:35px;"></div>
					<div class="dark OL-fred" style="height:20px; margin:4px; padding:2px;"><font id="OL|tags"></font></div>
				</div>

				<div style="float:left; height:7px; width:100%;"></div>

				<div style="float:left; height:20px; width:100%;">
					<div style="float:left;"><font class="white" id="OL|name" style="font-size:14px; margin-left:8px;"></font></div>
				</div>

				<table style="float:left; width:100%;"><tr>
					<td style="vertical-align:top; width:87px;">
						<div id="OL|database-image" style="float:left; height:124px; padding-top:4px; padding-left:5px; vertical-align:bottom; width:83px;"><img src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></div>
					</td></tr>
				</table>

				<div style="float:left; width:100%;">

					<div style="height:218px; width:auto; margin:4px;">

						<div class="dark OL-fred" style="height:218px; width:auto;">

							<div style="height:174px; overflow:hidden; padding-left:6px; padding-right:6px; width:auto;">
								<font id="OL|description"><font style="font-size:14px;">...</font></font>
							</div>

						</div>

						<div id="OL|options" style="float:left; padding-top:4px; margin-top:6px; width:auto;"></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// OPEN-LINE - Hours //-->
<div id="OL|hours|holder" style="display:none; height:100%; position:absolute; visibility:hidden; width:100%; z-index:-14;">
	<div class="border-main-1 color-off fred" style="float:left; height:452px; width:100%;">
		<div class="shine-less" style="height:452px; width:auto;">
			<div class="light-down" id="inside|data" style="height:452px; width:100%;">

				<div style="float:left; height:30px; overflow:hidden; width:100%;">
					<div id="OL|group-icons" style="float:left; padding-left:5px; width:35px;"></div>
					<div class="dark OL-fred" style="height:20px; margin:4px; padding:2px;"><font id="OL|tags"></font></div>
				</div>

				<div style="float:left; height:7px; width:100%;"></div>

				<div style="float:left; height:20px; width:100%;">
					<div style="float:left;"><font class="white" id="replace-library-name" style="font-size:14px; margin-left:8px;"></font></div>
				</div>

				<table style="float:left; width:100%;"><tr>
					<td style="vertical-align:top; width:154px;">
						<div id="OL|location-image" style="float:left; height:124px; padding-top:4px; padding-left:5px; vertical-align:bottom; width:83px;"><img src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></div>
					</td><td style="vertical-align:top; width:auto;">
						<div style="float:left; padding-left:6px; width:240px;">
							<div style="float:left; width:240px;"><font class="med-grey" style="font-size:10px;">Address</font></div>
							<div style="float:left; width:240px;"><font class="opposite" id="replace-street" style="font-size:12px;"></font></div>
							<div style="float:left; width:240px;"><font class="opposite" id="replace-city-state" style="font-size:12px;"></font></div>
							<div style="float:left; width:240px;"><font class="opposite" id="replace-zip" style="font-size:12px;"></font></div>
							<div style="float:left; width:240px;"><font class="med-grey" style="font-size:10px;">Phone</font></div>
							<div style="float:left; width:240px;"><font class="opposite" id="replace-phone" style="font-size:12px;"></font></div>
						</div>
					</td></tr>
				</table>

				<div style="float:left; width:100%;">

					<div style="height:218px; width:auto; margin:4px;">

						<div id="OL|location|hours" class="dark OL-fred" style="height:218px; width:auto;">

							<div style="float:left; padding-left:6px; width:190px;">
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Sunday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|0|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|0|end" style="font-size:12px;">...</font></div>
								</div>
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Monday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|1|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|1|end" style="font-size:12px;">...</font></div>
								</div>
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Tuesday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|2|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|2|end" style="font-size:12px;">...</font></div>
								</div>
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Wednesday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|3|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|3|end" style="font-size:12px;">...</font></div>
								</div>
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Thursday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|4|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|4|end" style="font-size:12px;">...</font></div>
								</div>
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Friday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|5|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|5|end" style="font-size:12px;">...</font></div>
								</div>
								<div style="width:auto;">
									<div style="float:left; width:70px;"><font class="white" style="font-size:12px;">Saturday</font></div>
									<div style="float:left; width:auto;"><font class="opposite" id="day|6|start" style="font-size:12px;">...</font></div>
									<div style="float:left; width:10px;"><font class="grey" style="font-size:12px;">&nbsp;-</font></div>
									<div style="float:left; width:50px;"><font class="opposite" id="day|6|end" style="font-size:12px;">...</font></div>
								</div>
							</div>

						</div>

						<div id="OL|options" style="float:left; padding-top:4px; margin-top:6px; width:auto;"></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--// Part - OL Checkmark //-->
<div class="stage" id="stage|OL-checkmark"><div class="checkmark" style="float:right; height:10px; width:10px;"></div></div>

<!--// Part - OL Star //-->
<div class="stage" id="stage|OL-star"><div class="star-empty" id="OL-star|replace-ID" onclick="javascript:replace-0;" style="cursor:pointer; float:left; height:14px; padding:2px; width:14px;"></div></div>

<!--// Part - OL Option Normal //-->
<div class="stage" id="stage|OL-option|normal"><span id="OL-option|replace-ID" class="replace-3 fg-button ui-corner-all" onclick="javascript:replace-1;" style="float:left; margin-left:8px; padding:2px; width:60px;"><a class="replace-2">replace-0</a></span></div>

<!--// Part - OL Option Small //-->
<div class="stage" id="stage|OL-option|small"><span id="OL-option|replace-ID" class="replace-3 fg-button ui-corner-all" onclick="javascript:replace-1;" style="float:left; margin-left:8px; padding:2px; width:16px;"><a class="replace-2">replace-0</a></span></div>

<!--// Part - Menu Line //-->
<div id="menu-line|holder" style="display:none; visibility:hidden;"><div style="height:18px; width:100%;"><a class="opposite" href="javascript:F_LMTA('change-tag',replace-ID,true);" onfocus="javascript:this.blur();" style="font-size:12px;">replace-name</a></div></div>

<!--// Part - Search //-->
<div id="search|holder" style="display:none; visibility:hidden;"><div id="search|replace-ID" class="OL-fred" onclick="javascript:F_MR('/materials/similar/replace-title/ajax',true);" style="cursor:pointer; height:18px; text-align:center; width:18px;"><img src="/lapcat/layout/icons/18-12-18.png" style="height:9px; width:12px; vertical-align:middle;" /></div></div>

<!--// Part - Search (Possible) //-->
<div id="possible|holder" style="display:none; visibility:hidden;"><div id="search|replace-ID" class="OL-fred" onclick="javascript:F_MR('/events/similar/replace-title/ajax',true);" style="cursor:pointer; height:18px; text-align:center; width:18px;"><img src="/lapcat/layout/icons/18-12-18.png" style="height:9px; width:12px; vertical-align:middle;" /></div></div>

<!--// SUGGESTIONS - Holder //-->
<div id="suggestion|holder" style="display:none; visibility:hidden;"><div style="height:200px;"><div style="height:20px; min-width:500px;"><font class="gold" id="suggestion|replace-ID|header" style="font-size:14px;"></font></div><div id="suggestion|replace-ID|box" style="height:180px; min-width:500px;"></div></div></div>

<!--// SUGGESTIONS - Events //-->
<div id="suggestion|events" style="display:none; visibility:hidden;">
	<div id="suggestion|replace-ID" style="float:left; height:auto; margin-left:6px; text-align:center; width:140px;">
		<div style="height:36px; margin-left:6px; overflow:hidden; text-align:center; width:140px;"><font style="font-size:14px;">replace-name</font></div>
		<center>
			<table style="width:100%;"><tr><td style="text-align:center; vertical-align:top;">
				<div style="float:left; text-align:center; padding-top:4px; width:120px;"><font style="font-size:14px;">replace-o-date</font></div>
				<div id="possible|replace-ID|search" style="float:left; height:18px; width:18px;"></div>
			</td></tr></table>
		</center>
	</div>
</div>

<!--// SUGGESTIONS - Materials //-->
<div id="suggestion|materials" style="display:none; visibility:hidden;">
	<div id="suggestion|replace-ID" style="float:left; height:auto; margin-left:6px; text-align:center; width:140px;">
		<div style="height:36px; margin-left:6px; overflow:hidden; text-align:center; width:140px;"><font style="font-size:14px;">replace-title</font></div>
		<center>
			<table style="width:100%;"><tr><td style="vertical-align:top;">
				<div id="suggestion|replace-ID|cover-image" style="float:right; height:124px; padding-left:5px; vertical-align:bottom; width:83px;">
					<img src="/lapcat/images/82-114-1.png" style="border:0; height:auto; width:auto;"/></div>
			</td><td style="vertical-align:top;">
				<div id="suggestion|replace-ID|search" style="float:left; height:18px; width:18px;"></div>
				<div id="suggestion|replace-ID|home" style="float:left; height:18px; width:18px;"></div>
			</td></tr></table>
		</center>
		<div style="height:0px; overflow:hidden; visibility:hidden; width:0px;"><span class="" id="suggestion|replace-ID|ISBNorSN" title=""></span></div>
	</div>
</div>

<!--// LINE - Previous Page (Link) //-->
<div class="hidden" id="OL|previous-page|link"><div class="next-button OL-fred" id="option|up|visibility" onclick="javascript:F_PDU(false);" onfocus="javascript:this.blur();" style="float:left; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" />Previous</font></div></div>

<!--// LINE - Next Page (Link) //-->
<div class="hidden" id="OL|next-page|link"><div class="next-button OL-fred" id="option|down|visibility" onclick="javascript:F_PDU(true);" onfocus="javascript:this.blur();" style="float:right; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:60px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;">Next<img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div></div>

<!--// LINE - Previous Record (Link) //-->
<div class="hidden" id="OL|previous-record|link"><div class="next-button OL-fred" id="option|left|visibility" onclick="javascript:F_RLR(false);" onfocus="javascript:this.blur();" style="float:left; margin-left:4px; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-2.png" style="margin-right:3px;" /></font></div></div>

<!--// LINE - Next Record (Link) //-->
<div class="hidden" id="OL|next-record|link"><div class="next-button OL-fred" id="option|right|visibility" onclick="javascript:F_RLR(true);" onfocus="javascript:this.blur();" style="float:right; margin-right:4px; margin-top:1px; height:12px; text-align:center; vertical-align:top; width:12px;"><font class="white" style="font-weight:bold; vertical-align:top; font-size:10px;"><img src="/lapcat/layout/icons/4-7-1.png" style="margin-left:3px;" /></font></div></div>

<!--// OPEN-LINE - More Info (Link) //-->
<div class="hidden" id="OL|more-info|link"><span class="option-black fg-button ui-corner-all" onclick="javascript:F_OpenDockable(0);" style="float:right; margin-right:8px; padding:2px; width:70px;"><a class="white">More Info</a></span></div>

<!--// OPEN-LINE - More Info (Link) //-->
<div class="hidden" id="OL|less-info|link"><span class="option-red fg-button ui-corner-all" onclick="javascript:F_OpenDockable(1);" style="float:right; margin-right:8px; padding:2px; width:70px;"><a class="dark-red">More Info</a></span></div>

<!--// FORM - Events (Change Search) //-->
<div id="DB|events|change-search|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Show</font>
		<font class="opposite" id="DB|events|change-search|current" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;">All Events</font>
	</div>
	<div style="float:left; height:auto; width:auto;">
		<form id="DB|events|change-search|action" action="javascript:F_SBMTA('change-search');" method="get">
			<select class="dropdown" id="DB|events|change-search" style="margin-top:4px; width:120px;" type="text" value="">
				<option id="DB|events|change-search|0" selected="selected" value="0">All Events</option>
				<option id="DB|events|change-search|1" value="1">Main Library</option>
				<option id="DB|events|change-search|2" value="2">Coolspring</option>
				<option id="DB|events|change-search|3" value="3">Fish Lake</option>
				<option id="DB|events|change-search|4" value="4">Hanna</option>
				<option id="DB|events|change-search|5" value="5">Kingsford Heights</option>
				<option id="DB|events|change-search|6" value="6">Rolling Prairie</option>
				<option id="DB|events|change-search|7" value="7">Union Mills</option>
				<option id="DB|events|change-search|8" value="8">Mobile Library</option>
			</select>
			<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			<input id="DB|events|change-search|oo" type="hidden"></input>
		</form>
	</div>
</div>

<!--// FORM - Materials (Change Search) //-->
<div id="DB|materials|change-search|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Show</font>
		<font class="opposite" id="DB|materials|change-search|current" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;">All Materials</font>
	</div>
	<div style="float:left; height:auto; width:auto;">
		<form id="DB|materials|change-search|action" action="javascript:F_SBMTA('change-search');" method="get">
			<select class="dropdown" id="DB|materials|change-search" style="margin-top:4px; width:120px;" type="text" value="">
				<option id="DB|materials|change-search|0" selected="selected" value="0">All Materials</option>
				<option id="DB|materials|change-search|1" value="1">Books</option>
				<option id="DB|materials|change-search|2" value="2">Music</option>
				<option id="DB|materials|change-search|3" value="3">Movies</option>
				<option id="DB|materials|change-search|4" value="4">Video Games</option>
				<option id="DB|materials|change-search|5" value="5">Television Shows</option>
				<option id="DB|materials|change-search|23" value="23">Audio Books</option>
				<option id="DB|materials|change-search|32" value="32">Graphic Novels</option>
				<option id="DB|materials|change-search|50" value="50">Large Print Books</option>
				<option id="DB|materials|change-search|75" value="75">Digital Audio Players</option>
				<option id="DB|materials|change-search|24" value="24">Downloadable Books</option>
				<option id="DB|materials|change-search|159" value="159">Downloadable Audio Books</option>
			</select>
			<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			<input id="DB|materials|change-search|oo" type="hidden"></input>
		</form>
	</div>
</div>

<!--// FORM - Databases (Change Sort) //-->
<div id="DB|databases|change-sort|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Sort</font>
		<font class="opposite" id="DB|databases|change-sort|current" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;">Rating</font>
	</div>
	<div style="float:left; height:auto; width:auto;">
		<form id="DB|databases|change-sort|action" action="javascript:F_SBMTA('change-sort');" method="get">
			<select class="dropdown" id="DB|databases|change-sort" style="margin-top:4px; width:120px;" type="text" value="">
				<option id="DB|databases|change-sort|0" selected="selected" value="0">A-Z</option>
				<option id="DB|databases|change-sort|1" value="1">Z-A</option>
			</select>
			<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			<input id="DB|databases|change-sort|oo" type="hidden"></input>
		</form>
	</div>
</div>

<!--// FORM - Events (Change Sort) //-->
<div id="DB|events|change-sort|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Sort</font>
		<font class="opposite" id="DB|events|change-sort|current" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;">Date</font>
	</div>
	<div style="float:left; height:auto; width:auto;">
		<form id="DB|events|change-sort|action" action="javascript:F_SBMTA('change-sort');" method="get">
			<select class="dropdown" id="DB|events|change-sort" style="margin-top:4px; width:120px;" type="text" value="">
				<option id="DB|events|change-sort|0" selected="selected" value="0">Date</option>
				<option id="DB|events|change-sort|1" value="1">Anticipation</option>
				<option id="DB|events|change-sort|2" value="2">A-Z</option>
				<option id="DB|events|change-sort|3" value="3">Z-A</option>
			</select>
			<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			<input id="DB|events|change-sort|oo" type="hidden"></input>
		</form>
	</div>
</div>

<!--// FORM - Materials (Change Sort) //-->
<div id="DB|materials|change-sort|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Sort</font>
		<font class="opposite" id="DB|materials|change-sort|current" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;">Rating</font>
	</div>
	<div style="float:left; height:auto; width:auto;">
		<form id="DB|materials|change-sort|action" action="javascript:F_SBMTA('change-sort');" method="get">
			<select class="dropdown" id="DB|materials|change-sort" style="margin-top:4px; width:120px;" type="text" value="">
				<option id="DB|materials|change-sort|0" selected="selected" value="0">Year</option>
				<option id="DB|materials|change-sort|1" value="1">Rating</option>
				<option id="DB|materials|change-sort|2" value="2">A-Z</option>
				<option id="DB|materials|change-sort|3" value="3">Z-A</option>
			</select>
			<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			<input id="DB|materials|change-sort|oo" type="hidden"></input>
		</form>
	</div>
</div>

<!--// FORM - News (Change Sort) //-->
<div id="DB|news|change-sort|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Sort</font>
		<font class="opposite" id="DB|news|change-sort|current" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;">Date</font>
	</div>
	<div style="float:left; height:auto; width:auto;">
		<form id="DB|news|change-sort|action" action="javascript:F_SBMTA('change-sort');" method="get">
			<select class="dropdown" id="DB|news|change-sort" style="margin-top:4px; width:120px;" type="text" value="">
				<option id="DB|news|change-sort|0" selected="selected" value="0">Date</option>
				<option id="DB|news|change-sort|1" value="1">A-Z</option>
				<option id="DB|news|change-sort|2" value="2">Z-A</option>
			</select>
			<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:35px;"><span><img src="/lapcat/layout/icons/7-4-0.png" style="height:4px; width:7px;" /></span></button>
			<input id="DB|news|change-sort|oo" type="hidden"></input>
		</form>
	</div>
</div>

<!--// FORM - Events (Calendar) //-->
<div id="DB|events|calendar|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;">
	<div style="height:12px; vertical-align:bottom; width:auto;">
		<font class="med-grey" style="float:left; font-size:10px; margin-top:3px;">Calendar</font>
		<font class="opposite" id="calendar|month" style="float:right; font-size:10px; margin-right:4px; margin-top:3px;"></font>
	</div>
	<div style="float:left; height:auto; padding-left:12px; padding-right:12px; width:auto;">
		<font style="text-align:center; vertical-align:middle;">
			<div class="option-theme" id="calendar|1" name="calendar|sunday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|2" name="calendar|monday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|3" name="calendar|tuesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|4" name="calendar|wednesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|5" name="calendar|thursday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|6" name="calendar|friday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|7" name="calendar|saturday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|8" name="calendar|sunday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|9" name="calendar|monday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|10" name="calendar|tuesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|11" name="calendar|wednesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|12" name="calendar|thursday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|13" name="calendar|friday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|14" name="calendar|saturday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|15" name="calendar|sunday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|16" name="calendar|monday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|17" name="calendar|tuesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|18" name="calendar|wednesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|19" name="calendar|thursday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|20" name="calendar|friday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|21" name="calendar|saturday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|22" name="calendar|sunday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|23" name="calendar|monday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|24" name="calendar|tuesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|25" name="calendar|wednesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|26" name="calendar|thursday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|27" name="calendar|friday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|28" name="calendar|saturday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|29" name="calendar|sunday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|30" name="calendar|monday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|31" name="calendar|tuesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|32" name="calendar|wednesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|33" name="calendar|thursday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|34" name="calendar|friday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|35" name="calendar|saturday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|36" name="calendar|sunday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|37" name="calendar|monday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|38" name="calendar|tuesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|39" name="calendar|wednesday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|40" name="calendar|thursday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|41" name="calendar|friday" style="float:left; height:14px; width:18px;"></div>
			<div class="option-theme" id="calendar|42" name="calendar|saturday" style="float:left; height:14px; width:18px;"></div>
		</font>
	</div>
</div>

<!--// FORM - Materials (Actor Auto-Complete) //-->
<div id="DB|materials|actor|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Actor</font><font class="opposite" id="DB|materials|actor|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|actor|action" action="javascript:F_SBMTA('actor');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|actor" onkeyup="javascript:F_SBAC('actor');" type="text" value="" style="width:160px;"></input><input id="DB|materials|actor|oo" type="hidden"></input></form></div><div id="DB|materials|actor|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - Materials (Artist Auto-Complete) //-->
<div id="DB|materials|artist|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Artist</font><font class="opposite" id="DB|materials|artist|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|artist|action" action="javascript:F_SBMTA('artist');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|artist" onkeyup="javascript:F_SBAC('artist');" type="text" value="" style="width:160px;"></input><input id="DB|materials|artist|oo" type="hidden"></input></form></div><div id="DB|materials|artist|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - Materials (Author Auto-Complete) //-->
<div id="DB|materials|author|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Author</font><font class="opposite" id="DB|materials|author|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|author|action" action="javascript:F_SBMTA('author');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|author" onkeyup="javascript:F_SBAC('author');" type="text" value="" style="width:160px;"></input><input id="DB|materials|author|oo" type="hidden"></input></form></div><div id="DB|materials|author|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - Materials (Console Name Auto-Complete) //-->
<div id="DB|materials|console-name|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Console Name</font><font class="opposite" id="DB|materials|console-name|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|console-name|action" action="javascript:F_SBMTA('console-name');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|console-name" onkeyup="javascript:F_SBAC('console-name');" type="text" value="" style="width:160px;"></input><input id="DB|materials|console-name|oo" type="hidden"></input></form></div><div id="DB|materials|console-name|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - Materials (Musical Artist Auto-Complete) //-->
<div id="DB|materials|m-artist|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Musical Artist</font><font class="opposite" id="DB|materials|m-artist|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|m-artist|action" action="javascript:F_SBMTA('m-artist');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|m-artist" onkeyup="javascript:F_SBAC('m-artist');" type="text" value="" style="width:160px;"></input><input id="DB|materials|m-artist|oo" type="hidden"></input></form></div><div id="DB|materials|m-artist|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - Materials (Narrator Auto-Complete) //-->
<div id="DB|materials|narrator|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Narrator</font><font class="opposite" id="DB|materials|narrator|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|narrator|action" action="javascript:F_SBMTA('narrator');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|narrator" onkeyup="javascript:F_SBAC('narrator');" type="text" value="" style="width:160px;"></input><input id="DB|materials|narrator|oo" type="hidden"></input></form></div><div id="DB|materials|narrator|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - Materials (Writer Auto-Complete) //-->
<div id="DB|materials|writer|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Writer</font><font class="opposite" id="DB|materials|writer|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|materials|writer|action" action="javascript:F_SBMTA('writer');" autocomplete="off" method="get"><input class="dropdown" id="DB|materials|writer" onkeyup="javascript:F_SBAC('writer');" type="text" value="" style="width:160px;"></input><input id="DB|materials|writer|oo" type="hidden"></input></form></div><div id="DB|materials|writer|AC" style="vertical-align:bottom;"></div></div>

<!--// FORM - All (Change Tag Auto-Complete) //-->
<div id="DB|all|change-tag|drop" style="overflow:hidden; visibility:hidden; position:absolute; z-index:-16;"><div style="height:12px; padding-top:3px; vertical-align:bottom; width:auto;"><font class="med-grey" style="float:left; font-size:10px;">Tag</font><font class="gold" id="DB|all|change-tag|current" style="float:right; font-size:10px; margin-right:4px;"></font></div><div style="height:auto; width:auto;"><form id="DB|all|change-tag|action" action="javascript:F_SBMTA('change-tag',true);" autocomplete="off" method="get"><input class="dropdown-main" id="DB|all|change-tag" onkeyup="javascript:F_SBAC('change-tag');" onblur="javascript:if(this.value==''){this.value='search here';}"  onfocus="javascript:this.value='';" type="text" value="search here" style="width:160px;"></input><input id="DB|all|change-tag|oo" type="hidden"></input></form></div><div id="DB|all|change-tag|AC" style="vertical-align:bottom;"></div></div>