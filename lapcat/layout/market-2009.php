<!--//                 //-->
<!--// market-2009.php //-->
<!--//                 //-->
<!--// FIXED //-->
<div id="fixed|market" style="width:100%;">

	<!--// CONTAINER //-->
	<div id="container|market" style="background-color:rgb(0,0,0); height:auto; width:auto;">

		<!--// HEADER - Top //-->
		<div class="color-off" id="header-top|market" style="height:20px;">
			<div id="main-menu|market" style="height:20px; vertical-align:top; width:100%;">
				<div style="float:left; width:90px;"><font style="font-weight:bold; font-size:14px; margin-left:6px;">Market</font></div>
				<div style="float:right;">
					<a href="javascript:F_MakeR('/lapcat/code/market.php?url=manage-hotkeys/ajax');" onfocus="javascript:this.blur();" style="margin-right:12px;">Manage Hotkeys</a></div>
				<div style="float:right;">
					<a href="javascript:F_MakeR('/lapcat/code/market.php?url=browse/hotkeys/ajax');" onfocus="javascript:this.blur();" style="margin-right:12px;">Preconstructed Hotkeys</a></div>
				<div style="float:right;">
					<a href="javascript:F_MakeR('/lapcat/code/market.php?url=create-hotkey/ajax');" onfocus="javascript:this.blur();" style="margin-right:12px;">Create A Hotkey</a></div>
			</div>
		</div>

		<!--// CENTER - Display //-->
		<div class="border-main-1 display-lines" id="D|market">
			<div class="color-heavy" id="container-main|market" style="height:536px; padding:4px; width:99.5%;"></div>
		</div>
	</div>

</div>

<div id="market|hotkey|header" style="display:none; visibility:hidden;">
	<div style="float:left; width:100%;">
		<font class="white" style="font-weight:bold;">Prebuilt Hotkeys</font><font style="margin-left:10px; font-size:12px;">Click to Purchase</font></div>
</div>

<div id="market|manage|hotkeys|header" style="display:none; visibility:hidden;">
	<div style="float:left; width:100%;"><font class="white" style="font-weight:bold;">Manage Hotkeys</font></div>
</div>

<div id="market|manage|hotkeys|template" style="display:none; visibility:hidden;">
	<div class="ui-corner-all color-main" style="float:left; height:100px; margin:2px; padding:1px; width:150px;">
		<div class="option-all" id="manage|hotkeys|replace-position" style="float:left; margin-right:8px; margin-top:1px; width:52px;">
			<div class="hotkey OL-fred" id="manage|hotkeys|link|replace-position" onclick="replace-link-values" onfocus="javascript:this.blur();" style="cursor:pointer; height:50px; width:52px;">
				<img id="manage|hotkeys|replace-position" src="/lapcat/images/42-42-replace-hotkey-image.png" style="height:42px; padding-top:4px; width:42px;"/></div>
			<div class="darker OL-fred" style="margin-top:2px; height:18px; width:52px;">
				<font class="opposite" style="font-size:12px;"><span id="manage|hotkeys|info|replace-position">-</span></font></div>
		</div>
		<div style="float:left; width:90px;"><font class="white" style="font-size:12px;">replace-sub-name</font></div>
	</div>
</div>

<div id="market|hotkey|template" style="display:none; visibility:hidden;">
	<div class="hotkey ui-corner-all color-main" id="market|hotkey-line|replace-portal-ID" onclick="javascript:F_MakeR('/lapcat/code/market.php?url=purchase/replace-portal-ID/ajax');" style="float:left; height:120px; margin:4px; padding-left:2px; padding-right:2px; width:160px;">
		<div style="float:left; width:160px;"><font class="opposite" style="font-size:12px;">replace-name</font></div>
		<div style="float:left; width:160px;"><font class="opposite">replace-op-cost</font><img src="/lapcat/layout/icons/21-21-30.png" style="height:12px; margin-left:2px; margin-right:2px; width:12px;" title="LAPCAT Points" /></div>
		<div class="color-off border-dark-1 ui-corner-all" style="float:left; height:76px; margin-left:6px; width:146px;">
			<div style="width:52px;"><img id="bar-hotkey-3" src="/lapcat/images/42-42-replace-portal-ID.png" style="height:42px; float:left; margin:2px; width:42px;"/></div>
			<div style="float:left; width:100px; line-height:12px;"><font class="opposite" style="font-size:12px;">replace-description</font></div>
		</div>
	</div>
	<div class="hotkey ui-corner-all color-main" id="market|hotkey-line|replace-portal-ID" onclick="javascript:F_MakeR('/lapcat/code/market.php?url=purchase/replace-portal-ID/ajax');" style="float:left; height:120px; margin:4px; padding-left:2px; padding-right:2px; width:160px;"></div>
</div>

<div id="stage|create-hotkey" style="display:none; visibility:hidden;">
	<div style="height:20px; width:100%;"><font class="white" style="margin-left:5px;">Create A Hotkey</font></div>
	<div style="float:left; width:100%; padding-top:10px;"><font class="white" style="font-size:12px; margin-left:5px;">This hotkey will cost <font class="white" style="font-size:14px;">80</font><img src="/lapcat/layout/icons/21-21-30.png" style="height:12px; margin-left:2px; margin-right:2px; width:12px;" title="LAPCAT Points" /> to create.</font></div>
	<div style="float:left; width:100%; padding-top:10px;">
		<font class="white" style="font-size:12px; margin-left:5px;">Once created, this hotkey will &quot;replace-description&quot;</font>
	</div>
	<div style="float:left; width:100%;">
		<div style="float:left; width:100%;">
			<font class="white" style="font-size:12px; margin-left:5px;">Additionally, this hotkey will display the following information about the search.</font>
		</div>
		<div id="HT|events|holder" style="">
			<div style="float:left; width:100%;">
				<font class="white" style="font-size:12px; margin-left:5px;">The total number of events that are...</font>
			</div>
			<form id="HT" action="javascript:F_AddHotkey('events');" method="get">
				<select class="dropdown" id="HT|events" style="margin-top:4px; width:160px;" type="text" value="">
					<option id="HT|events|0" selected="selected" value="0">Occurring This Month</option>
					<option id="HT|events|1" value="1">Occurring This Week</option>
					<option id="HT|events|2" value="2">Occurring Today</option>
					<option id="HT|events|3" value="3">In My Anticipation List</option>
					<option id="HT|events|4" value="4">In The Summer Reading Program List</option>
				</select>
				<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:70px;"><span>Create</span></button>
				<input id="HT|events|oo" type="hidden"></input>
			</form>
		</div>
		<div id="HT|materials|holder" style="">
			<div style="float:left; width:100%;">
				<font class="white" style="font-size:12px; margin-left:5px;">The total number of materials that are...</font>
			</div>
			<form id="HT" action="javascript:F_AddHotkey('materials');" method="get">
				<select class="dropdown" id="HT|materials" style="margin-top:4px; width:160px;" type="text" value="">
					<option id="HT|materials|0" selected="selected" value="0">New This Year</option>
					<option id="HT|materials|1" value="1">New This Month</option>
					<option id="HT|materials|2" value="2">In My Watch List</option>
					<option id="HT|materials|3" value="3">Not In My Collection List</option>
				</select>
				<button class="dropbutton shadow-down" type="submit" onfocus="javascript:this.blur();" style="margin-left:4px; width:70px;"><span>Create</span></button>
				<input id="HT|materials|oo" type="hidden"></input>
			</form>
		</div>
	</div>
</div>