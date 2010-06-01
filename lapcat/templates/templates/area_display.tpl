<table cellpadding="0" cellspacing="0" width="960px" id="static" style="display:block;">
	<tr>
		<td colspan="2" style="vertical-align:top;">
			<div style="position: absolute; padding-left: 12px; top: 71px;left:10px; width: 400px;">
				<div class="font-bold font-X" style="float: left; font-size: 10px; margin-left: 4px; margin-right: 2px; text-align: center; vertical-align: top; width: auto;">Page:</div>
					<a href="/{$area}?date={$date}&tag={$tag}&page=1">
						<div style="float: left; margin-right: 4px; height: 12px; text-align: center; vertical-align: top; width: 18px;" name="1" id="button-page-1" class="button-blue{if $page == 1}-2{/if}">
							<span style="font-weight: bold; font-size: 10px; vertical-align: top;" class="font-G">1</span>
						</div>
					</a>
				{if $Areapage != "hours"}
				{if $page>3}
					<font style="float: left; font-size: 10px; margin-right: 4px; vertical-align: top; text-align: center; width: 20px;" class="font-bold font-X">...</font>
				{/if}
				{foreach from=$pageData key=key item=value name=pageDisplay}
					{if $page!=1 && $page!=2}
						{if $value == $page || $value==$page-1 || $value==$page+1}
					<a href="/{$area}?date={$date}&tag={$tag}&page={$value}">
						<div style="float: left; margin-right: 4px; height: 12px; text-align: center; vertical-align: top; width: 18px;" name="{$value}" id="button-page-{$value}" class="button-blue{if $value == $page}-2{/if}">
							<span style="font-weight: bold; font-size: 10px; vertical-align: top;" class="font-G">{$value}</span>
						</div>
					</a>
						{/if}
					{else}
						{if $value==2 || $value==3}
					<a href="/{$area}?date={$date}&tag={$tag}&page={$value}">
						<div style="float: left; margin-right: 4px; height: 12px; text-align: center; vertical-align: top; width: 18px;" name="{$value}" id="button-page-{$value}" class="button-blue{if $value == $page}-2{/if}">
							<span style="font-weight: bold; font-size: 10px; vertical-align: top;" class="font-G">{$value}</span>
						</div>
					</a>
						{/if}
					{/if}
				{/foreach}
				{if $smarty.foreach.pageDisplay.total !=$page && $smarty.foreach.pageDisplay.total>3}
					<font style="float: left; font-size: 10px; margin-right: 4px; vertical-align: top; text-align: center; width: 20px;" class="font-bold font-X">...</font>
				{/if}
				{/if}
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
											<div style="height:18px; max-height:18px; overflow:hidden; width:100%;"><font class="font-bold font-X" id="header" style="font-size:14px;">{$area}</font></div>
										</td>
								    	<td id="icons" style="height:18px; width:120px;">
											<div class="corners-top-2 shadow-up" style="float:right; height:16px; max-height:16px; margin-top:1px; width:auto;">
												<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
												<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:block; height:16px; width:16px;" title="Click to shrink this display."/>
												<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
												<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="height:16px; width:16px;" title="Click to show this information in a list."/>
												<img class="fake-link float-right view-click" id="featured-view" src="http://cdn1.lapcat.org/famfamfam/silk/layout_content.png" style="display:block; height:16px; width:16px;" title="Click to show the featured article."/>
												<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
												{if $user != ""}
												<a href="">
													<img class="fake-link float-right remove-search-click" id="search-on-search" src="http://cdn1.lapcat.org/famfamfam/silk/user_delete.png" style="display:block; height:16px; margin-right:2px; width:16px;" title="Click to remove the username from this search." />
												</a>
												{/if}
												{if $date != ""}
												<a href="/{$area}?date=&user={$user}&tag={$tag}&page={$value}">
													<img class="fake-link float-right remove-search-click" id="search-on-date" src="http://cdn1.lapcat.org/famfamfam/silk/date_delete.png" style="display:block; height:16px; margin-right:2px; width:16px;" title="Click to remove the date from this search." />
												</a>
												{/if}
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
		<td style="vertical-align:top;height: 526px; width: 384px;">
			{foreach from=$V_displayData key=key item=value}
			<div id="static-HTML-300-{$key}" style="vertical-align:top;display:block;">
					<div style="float:left; height:42px; margin-top:8px; text-align:center; width:100%;">
						<a href="/{$area}?item={$value.ID}&date={$date}&tag={$tag}&page={$pageNum}&user={$user}">
							<div class="button-Y-35 line-click" id="{$value.ID}" style="height:40px; width:auto;" title="Click to expand this display.">
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
			{/foreach}
		</td>
		<td width="584px" style="vertical-align:top;">
			{if $Areapage != "hours"}
				{include file="main_display.tpl"}
			{else}
				{include file="hours_display.tpl"}
			{/if}
		</td>
	</tr>
</table>