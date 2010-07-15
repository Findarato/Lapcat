			<div id="static-open-line-HTML-20" style="display:block; vertical-align:top; width:100%;height:100%">
				<div class="corners-top-2 corners-bottom-2" id="part-open-line" style="margin:2px; vertical-align:top; width:100%;">
					<div style="float:left; height:462px; width:100%;">
						<div class="corners-top-1 corners-bottom-1 shadow-or-light-up" style="height:458px; position:relative; vertical-align:top; width:auto;">
							<a class="font-Z clicked-reset-search" href="/{$area}" style="float:right;">Reset Search</a>
							<div style="float:left; position:absolute; margin-top:20px; width:100%;">
								<table cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td style="width:4px;"></td>
										<td style="width:auto;">
											<div class="background-alpha-3 border-all-E-1 corners-bottom-2 corners-top-2" style="height:450px; width:auto;;">
												<div id="content-open-line" style="height:400px; width:99%; margin-left:0.5%;">
													<div style="float:left; height:460px; width:100%;">
														<div style="height:15px;">
															<a class="add-to-all-searches fake-link font-bold font-L" href="/{$area}?item={$item}&date={$date}&tag={$V_openLineData.tag_0_ID}" style="float:left; margin-left:10px;">{$V_openLineData.tag_0_name}</a>
															<a class="add-to-all-searches fake-link font-bold font-L" href="/{$area}?item={$item}&date={$date}&tag={$V_openLineData.tag_1_ID}" style="float:left; margin-left:10px;">{$V_openLineData.tag_1_name}</a>
															<a class="add-to-all-searches fake-link font-bold font-L" href="/{$area}?item={$item}&date={$date}&tag={$V_openLineData.tag_2_ID}" style="float:left; margin-left:10px;">{$V_openLineData.tag_2_name}</a>
															<a class="add-to-all-searches fake-link font-bold font-L" href="/{$area}?item={$item}&date={$date}&tag={$V_openLineData.tag_3_ID}" style="float:left; margin-left:10px;">{$V_openLineData.tag_3_name}</a>
														</div>
														<table cellpadding="0" cellspacing="0" style="height:460px; vertical-align:top; width:100%;">
															<tr>
																<td style="height:46px; padding:1px; vertical-align:top; width:100%;">
																	<div class="button-Y-fake" style="float:left; height:40px; margin-top:4px; width:100%; text-align:center;">
																	{if $Areapage=="databases"}
																		<div class="font-fake button-blue database-dockable font-G shadow-or-light-X-up" style="height:40px; width:100%;">
																	{else}
																		<div class="font-fake font-G shadow-or-light-X-up" style="height:40px; width:100%;">
																	{/if}
																			<table style="height:40px; width:100%;">
																				<tr>
																					<td style="height:20px; overflow:hidden; vertical-align:top; width:auto;">
																						{if $Areapage=="databases"}
																							<a target="databases" href="{$V_openLineData.link_in}">
																								<font class="font-Y" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">{$V_openLineData.name}</font>
																							</a>
																						{else}
																							<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;">{$V_openLineData.name}</font>
																						{/if}
																					</td>
																				</tr>
																			</table>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
																<td style="height:390px; overflow:hidden; padding-left:6px; padding-right:6px; vertical-align:top; width:100%;">
																<div class="border-bottom-C-1" style="float:left; height:1px; width:100%;"></div>
																<div class="shadow-or-light-X-up" style="height:20px; text-align:left; vertical-align:top; width:100%;">
																	{if $Areapage == "news"} 
																	<span class="font-I" style="font-size:10px; margin-left:12px;">by</span>
																	<a class="add-to-search user-link-1 font-X" href="/{$area}?item={$item}&date={$date}&tag={$tag}&user={$V_openLineData.entered_by_id}" style="font-size:12px; margin-right:3px;">{$V_openLineData.username}</a>
																	{/if}
																	{if $Areapage == "events"} 
																	<span class="font-I" style="font-size:10px; margin-left:12px;float:left;">at</span>
																	<a class="add-to-search library-link-1 font-X" href="/{$area}?item={$item}&date={$date}&tag={$tag}&user={$V_openLineData.library_ID}" style="font-size:12px; margin-right:3px;;float:left;">{$V_openLineData.library}</a>
																	<div class="font-I" style="font-size:10px; margin-left:12px;float:left;">starts at</div>
																	<div style="font-size:12px; margin-left:3px;float:left;"> {$V_openLineData.start|date_format:'%I:%M %p'}</div>
																	{/if}

																</div>
																<div style="float:left; overflow:hidden; overflow:auto; height:360px; width:100%;"><font class="font-X post-title" id="general-font-size" style="float:left; font-size:15px; margin-top:12px; padding:2px; padding-left:6px; padding-right:6px; vertical-align:top;">{$V_openLineData.description}</font></div>
																</td>
															</tr>
															<tr>
																<td style="height:24px; overflow:hidden; vertical-align:top; width:100%;">
																<!--// Button - Facebook Share //-->
																{if $Areapage == "news"} 
																<div class="button-black light-up" id="option-share" style="display:block; float:right; height:19px; width:68px; text-align:center;" title="Click to share this article on Facebook."><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script><a class="font-G" name="fb_share" type="icon_link" share_url="http://dev.lapcat.org/news/specific/replace-ID" href="http://www.facebook.com/sharer.php" style="font-size:14px;" target="_blank">share</a></div>
																{/if}
																{if $Areapage == "materials" || $Areapage == "databases" ||$Areapage == "events"} 
																<fb:like href="{$tld}/{$area}{$fblink}" font="arial"></fb:like>
																<!--<iframe src="http://www.facebook.com/widgets/like.php?href={$area}{$fblink}" scrolling="no" frameborder="0" style="border:none; width:450px; height:80px"></iframe>-->
																<!--<div class="button-black light-up" id="option-share" style="display:block; float:right; height:19px; width:68px; text-align:center;" title="Click to share this article on Facebook."><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script><a class="font-G" name="fb_share" type="icon_link" share_url="http://dev.lapcat.org/news/specific/replace-ID" href="http://www.facebook.com/sharer.php" style="font-size:14px;" target="_blank">share</a></div>-->
																{/if}
																</td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</td>
										<td style="width:4px;"></td>
									</tr>
								</table>
							</div>
							<div id="static-content-graphics-line" style="position:absolute; height:0px; width:100%;">
								<div id="open-line-options" style="float:right; overflow:hidden; margin-top:94px; padding-right:5px; width:100%;">
									<!--// Button - Favorite //-->
									<div class="button-blue-2 light-up option-click" id="option-favorite" style="display:none; float:right; height:19px; margin-right:4px; width:68px; text-align:center;" title="Click to make this item a favorite."><font class="font-G" style="font-size:14px;">favorite</font></div>
									<!--// Button - Anticipate //-->
									<div class="button-blue-2 light-up option-click" id="option-watched" style="display:none; float:right; height:19px; margin-right:4px; width:68px; text-align:center;" title="Click to anticipate this event."><font class="font-G" style="font-size:14px;">anticipate</font></div>
									<!--// Button - Watch //-->
									<div class="button-blue-2 light-up option-click" id="option-watchlist" style="display:none; float:right; height:19px; margin-right:4px; width:68px; text-align:center;" title="Click to add this material to your watch list."><font class="font-G" style="font-size:14px;">watch</font></div>
									<!--// Button - Collect //-->
									<div class="button-blue-2 light-up option-click" id="option-collect" style="display:none; float:right; height:19px; margin-right:4px; width:68px; text-align:center;" title="Click to add this material to your collection."><font class="font-G" style="font-size:14px;">collect</font></div>
									<!--// Button - Expand //-->
									<div class="button-X-35 light-up option-click" id="option-expand" style="display:none; float:right; height:19px; margin-right:4px; width:68px; text-align:center;" title="Click to expand the open line."><font class="font-G" style="font-size:14px;">expand</font></div>
									<!--// Button - Similar //-->
									<div class="button-X-35 light-up option-click" id="option-similar" style="display:none; float:right; height:19px; margin-right:4px; width:68px; text-align:center;" title="Click to show a list of similar items."><font class="font-G" style="font-size:14px;">similar</font></div>
								</div>
			        	    </div>
						</div>
					</div>
				</div>
			</div>