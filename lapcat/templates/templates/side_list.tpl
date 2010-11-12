			<div id="static-HTML-300-{$key}" style="vertical-align:top;display:block;">
				<div style="float:left; height:40px; margin-bottom:3px;max-height:40px; text-align:center; width:100%;">
					<a href="/{$area}?item={$value.ID}&date={$date}&tag={$tag}&page={$pageNum}&user={$user}">
						<div class="{if $item == $value.ID}open-line{else}{if !isset($item) && $smarty.foreach.listLoop.first}open-line{else}button-Y-35 line-click{/if}{/if}" id="{$value.ID}" style="height:40px; width:auto;" title="Click to expand this display.">
							<div style="background-position:0px 1px; height:19px; overflow:hidden; text-align:left; width:100%;">
								<div style="display:table; height:18px; width:100%;">
									<div style="display:table-cell; height:18px; overflow:hidden; vertical-align:top; max-width:100%; width:auto;">
										<div style="width:100%;">
											<font class="font-X" style="float:left; font-size:17px; margin-left:6px; vertical-align:top;">{$value.name}</font>
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
										{if $Areapage == "news"}
											<font class="font-X" style="font-size:10px; margin-left:12px;">by</font>
											<a class="add-to-search user-link-1 font-X" href="/{$area}?item={$item}&date={$date}&tag={$tag}&user={$value.entered_by_id}" style="font-size:12px; margin-right:3px;">{$value.username}</a>
										{/if}
										{if $Areapage == "events"}
											<font class="font-X" style="font-size:10px; margin-left:12px;">at</font>
											<a class="add-to-search user-link-1 font-X" href="/{$area}?item={$item}&date={$date}&tag={$tag}&user={$value.library_ID}" style="font-size:12px; margin-right:3px;">{$value.library}</a>
										{/if}
										</div>
									</div>
									<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
										<a class="add-to-search font-X" href="/{$area}?item={$item}&date={$value.o_date}&tag={$tag}" style="font-size:12px; margin-right:3px;">{$value.date_words}</a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>