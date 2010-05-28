<?php /* Smarty version 2.6.24, created on 2010-05-27 09:29:44
         compiled from news_display.tpl */ ?>
<table cellpadding="0" cellspacing="0" width="960px" id="static" style="display:none;">
	<tr>
		<td colspan="2" style="vertical-align:top;">
			<div>
				<div style="float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:auto;">Page:</div>
				<?php $_from = $this->_tpl_vars['pageData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
					<a class="corners-bottom-2 corners-top-2 page-click button-blue font-G" href="/<?php echo $this->_tpl_vars['area']; ?>
?date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=<?php echo $this->_tpl_vars['value']; ?>
" style="line-height:8px;display:block;float:left; margin-right:4px; height:12px; text-align:center; vertical-align:top; width:18px;"><?php echo $this->_tpl_vars['value']; ?>
</a>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="vertical-align:top;">
			<div id="news-header" style="display:block;">
				<div class="color-X-4 corners-bottom-2 corners-top-2 shadow-or-light-X-down" style="background-position:0px 2px; width:100%;">
					<div class="corners-bottom-2 corners-top-2 shadow-or-light-Y-up" style="background-position:0px -2px; width:100%;">
						<div class="corners-bottom-2 corners-top-2 shadow-or-light-Y-up" style="margin-left:2px; margin-right:2px; width:auto;">
							<div class="corners-bottom-2 corners-top-2 shadow-or-light-Y-down" style="margin-left:2px; margin-right:2px; width:auto;">
								<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;">
								    <tr>
										<td style="height:18px; width:auto; overflow:hidden;">
											<div style="height:18px; max-height:18px; overflow:hidden; width:100%;"><font class="font-bold font-X" id="header" style="font-size:14px;"><?php echo $this->_tpl_vars['area']; ?>
</font></div>
										</td>
								    	<td id="icons" style="height:18px; width:120px;">
											<div class="corners-top-2 shadow-up" style="float:right; height:16px; max-height:16px; margin-top:1px; width:auto;">
												<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
												<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:block; height:16px; width:16px;" title="Click to shrink this display."/>
												<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
												<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="height:16px; width:16px;" title="Click to show this information in a list."/>
												<img class="fake-link float-right view-click" id="featured-view" src="http://cdn1.lapcat.org/famfamfam/silk/layout_content.png" style="display:block; height:16px; width:16px;" title="Click to show the featured article."/>
												<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
												<?php if ($this->_tpl_vars['user'] != ""): ?>
												<a href="">
													<img class="fake-link float-right remove-search-click" id="search-on-search" src="http://cdn1.lapcat.org/famfamfam/silk/user_delete.png" style="display:block; height:16px; margin-right:2px; width:16px;" title="Click to remove the username from this search." />
												</a>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['date'] != ""): ?>
												<a href="/<?php echo $this->_tpl_vars['area']; ?>
?date=&user=<?php echo $this->_tpl_vars['user']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=<?php echo $this->_tpl_vars['value']; ?>
">
													<img class="fake-link float-right remove-search-click" id="search-on-date" src="http://cdn1.lapcat.org/famfamfam/silk/date_delete.png" style="display:block; height:16px; margin-right:2px; width:16px;" title="Click to remove the date from this search." />
												</a>
												<?php endif; ?>
											</div>
										</td>
							        </tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;">
			<?php $_from = $this->_tpl_vars['V_displayData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<div id="static-HTML-300-<?php echo $this->_tpl_vars['key']; ?>
" style="vertical-align:top;display:block;">
					<div style="float:left; height:42px; margin-top:8px; text-align:center; width:100%;">
						<a href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['value']['ID']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
">
							<div class="button-Y-35 line-click" id="<?php echo $this->_tpl_vars['value']['ID']; ?>
" style="height:40px; width:auto;" title="Click to expand this display.">
								<div style="background-position:0px 1px; height:19px; overflow:hidden; text-align:left; width:100%;">
									<div style="display:table; height:18px; width:100%;">
										<div style="display:table-cell; height:18px; overflow:hidden; vertical-align:top; max-width:100%; width:auto;">
											<div style="width:100%;">
												<font class="font-X" style="float:left; font-size:17px; margin-left:6px; vertical-align:top;"><?php echo $this->_tpl_vars['value']['name']; ?>
</font>
											</div>
										</div>
										<div style="display:table-cell; float:right; height:19px; overflow:hidden; text-align:left; max-width:90px; width:auto;">
											<div id="icons-replace-counter" style="width:100%;">
												<img src="/lapcat/images/31-31-0.png" id="area-condition-eye" style="display:none; height:16px; width:16px;" />
												<img src="/lapcat/images/31-31-91.png" id="area-condition-new" style="display:none; height:16px; width:16px;" />
												<img src="/lapcat/images/31-31-92.png" id="area-condition-heart" style="display:none; height:12px; margin-bottom:2px; width:12px;" />
											</div>
										</div>
									</div>
								</div>
								<div style="height:21px; overflow:hidden; width:auto;">
									<div style="width:100%;">
										<div style="float:left; margin-left:1px; vertical-align:top; width:210px;">
											<div style="margin:1px; text-align:left; width:auto;">
											<?php if ($this->_tpl_vars['page'] == 'news'): ?>
												<font class="font-X" style="font-size:10px; margin-left:12px;">by</font>
												<a class="add-to-search user-link-1 font-X" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&user=<?php echo $this->_tpl_vars['value']['entered_by_id']; ?>
" style="font-size:12px; margin-right:3px;"><?php echo $this->_tpl_vars['value']['username']; ?>
</a>
											<?php endif; ?>
											</div>
										</div>
										<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
											<a class="add-to-search font-X" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['value']['o_date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
" style="font-size:12px; margin-right:3px;"><?php echo $this->_tpl_vars['value']['date_words']; ?>
</a>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		</td>
		<td width="584px">
			<div id="static-open-line-HTML-20" style="display:block; vertical-align:top; width:100%;height:100%">
				<div class="corners-top-2 corners-bottom-2" id="part-open-line" style="margin:2px; vertical-align:top; width:100%;">
					<div style="float:left; height:462px; width:100%;">
						<div class="corners-top-1 corners-bottom-1 shadow-or-light-up" style="height:458px; position:relative; vertical-align:top; width:auto;">
							<div style="float:left; position:absolute; margin-top:20px; width:100%;">
								<table cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td style="width:4px;"></td>
										<td style="width:auto;">
											<div class="background-alpha-3 border-all-E-1 corners-bottom-2 corners-top-2" style="height:450px; width:auto;;">
												<div id="content-open-line" style="height:400px; width:99%; margin-left:0.5%;">
													<div style="float:left; height:460px; width:100%;">
														<div style="height:15px;">
															<a class="add-to-all-searches fake-link font-bold font-L" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['V_openLineData']['tag_0_ID']; ?>
" style="float:left; margin-left:10px;"><?php echo $this->_tpl_vars['V_openLineData']['tag_0_name']; ?>
</a>
															<a class="add-to-all-searches fake-link font-bold font-L" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['V_openLineData']['tag_1_ID']; ?>
" style="float:left; margin-left:10px;"><?php echo $this->_tpl_vars['V_openLineData']['tag_1_name']; ?>
</a>
															<a class="add-to-all-searches fake-link font-bold font-L" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['V_openLineData']['tag_2_ID']; ?>
" style="float:left; margin-left:10px;"><?php echo $this->_tpl_vars['V_openLineData']['tag_2_name']; ?>
</a>
															<a class="add-to-all-searches fake-link font-bold font-L" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['V_openLineData']['tag_3_ID']; ?>
" style="float:left; margin-left:10px;"><?php echo $this->_tpl_vars['V_openLineData']['tag_3_name']; ?>
</a>
														</div>
														<table cellpadding="0" cellspacing="0" style="height:460px; vertical-align:top; width:100%;">
															<tr>
																<td style="height:46px; padding:1px; vertical-align:top; width:100%;">
																	<div class="button-Y-fake" style="float:left; height:40px; margin-top:4px; width:100%; text-align:center;">
																		<div style="height:40px; width:100%;">
																			<table style="height:40px; width:100%;">
																				<tr>
																					<td style="height:20px; overflow:hidden; vertical-align:top; width:auto;">
																						<?php if ($this->_tpl_vars['page'] == 'databases'): ?>
																							<a target="databases" href="<?php echo $this->_tpl_vars['V_openLineData']['link_in']; ?>
">
																								<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;"><?php echo $this->_tpl_vars['V_openLineData']['name']; ?>
</font>
																							</a>
																						<?php else: ?>
																							<font class="font-X" style="float:left; font-size:15px; margin-left:6px; vertical-align:top;"><?php echo $this->_tpl_vars['V_openLineData']['name']; ?>
</font>
																						<?php endif; ?>
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
																	<?php if ($this->_tpl_vars['page'] == 'news'): ?> 
																	<font class="font-X" style="font-size:10px; margin-left:12px;">by</font>
																	<a class="add-to-search user-link-1 font-X" href="/<?php echo $this->_tpl_vars['area']; ?>
/user/<?php echo $this->_tpl_vars['V_openLineData']['entered_by_id']; ?>
" style="font-size:12px; margin-right:3px;"><?php echo $this->_tpl_vars['V_openLineData']['username']; ?>
</a>
																	<?php endif; ?>
																</div>
																<div style="float:left; overflow:hidden; overflow:auto; height:360px; width:100%;"><font class="font-X post-title" id="general-font-size" style="float:left; font-size:15px; margin-top:12px; padding:2px; padding-left:6px; padding-right:6px; vertical-align:top;"><?php echo $this->_tpl_vars['V_openLineData']['description']; ?>
</font></div>
																</td>
															</tr>
															<tr>
																<td style="height:24px; overflow:hidden; vertical-align:top; width:100%;">
																<!--// Button - Facebook Share //-->
																<div class="button-black light-up" id="option-share" style="display:none; float:right; height:19px; width:68px; text-align:center;" title="Click to share this article on Facebook."><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script><a class="font-G" name="fb_share" type="icon_link" share_url="http://dev.lapcat.org/news/specific/replace-ID" href="http://www.facebook.com/sharer.php" style="font-size:14px;" target="_blank">share</a></div>
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
		</td>
	</tr>
</table>