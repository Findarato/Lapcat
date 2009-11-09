<!--//              //-->
<!--// mow-2009.php //-->
<!--//              //-->
<!--// FIXED //-->
<div id="fixed|mow" style="width:100%;">

	<!--// CONTAINER //-->
	<div id="container|mow" style="height:auto; width:auto;">

		<!--// HEADER - Top //-->
		<div id="header-top|mow" style="height:28px; margin-bottom:4px;">
			<div id="main-menu|mow" style="background-color:#66CC99; border:1px solid rgb(0,0,0); height:28px; vertical-align:top; width:100%;">
				<div style="float:left; width:auto;"><font style="font-size:18px; font-weight:bold; margin-left:6px;">Memory of War</font></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=start/ajax');" onfocus="javascript:this.blur();">Start</a></div>
				<div style="float:left; width:30px; text-align:center;"><font style="font-size:18px; font-weight:bold; margin-left:6px;">|</font></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=list/ajax');" onfocus="javascript:this.blur();">Card List</a></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=ability-list/ajax');" onfocus="javascript:this.blur();">Ability List</a></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=action-list/ajax');" onfocus="javascript:this.blur();">Action List</a></div>
				<div style="float:left; width:30px; text-align:center;"><font style="font-size:18px; font-weight:bold; margin-left:6px;">|</font></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=form/ajax');" onfocus="javascript:this.blur();">Add Card</a></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=ability/ajax');" onfocus="javascript:this.blur();">Add Ability</a></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=action/ajax');" onfocus="javascript:this.blur();">Add Action</a></div>
				<div style="float:left; width:30px; text-align:center;"><font style="font-size:18px; font-weight:bold; margin-left:6px;">|</font></div>
				<div style="float:left; margin-left:12px; width:auto;"><a href="javascript:Fun_MR('/lapcat/code/mow.php?url=update/ajax');" onfocus="javascript:this.blur();">Add Message</a></div>
				<div id="container-main|message" style="float:left; width:auto;"></div>

<?
if($o_MoW->V_LoggedIn==TRUE){
echo '<div style="float:right; margin-right:12px; margin-top:3px; width:auto;"><font>You are currently logged in.</font></div>';
}else{
echo '<div style="float:right; margin-right:12px; margin-top:3px; width:auto;"><font style="color:#FF0000;">You are not currently logged in.</font></div>';
echo '				<div style="float:right; margin-right:12px; margin-top:3px; width:auto;">
					<form action="/lapcat/code/mow.php?url=log/in" method="post">
						<div style="float:left; width:224px;">
							<div style="float:right; height:22px; margin-right:12px;">
								<font>Account: </font><input class="dropdown" name="mow|username" type="text" style="width:140px;"></input></div>
						</div>
						<div style="float:left; width:224px;">
							<div style="float:right; height:22px; margin-right:12px;">
								<font>Password: </font><input class="dropdown" name="mow|password" type="password" style="width:140px;"></input></div>
						</div>
						<div style="float:left; height:44px; width:60px;">
							<div style="float:left; height:22px;">
								<button class="dropbutton shadow-down" type="submit" style="cursor:pointer;"><font>Submit</font></button>
								<input name="mow|submitted" type="hidden" value="0"></input></div>
						</div>
					</form>
				</div>
';}
?>
			</div>
		</div>

		<!--// CENTER - Display //-->
		<div id="D|mow">
			<div id="container-main|mow" style="float:left; width:auto"></div>
		</div>

		<!--// TOP - Display //-->
		<div id="container-top|mow" style="border:1px solid rgb(0,0,0); float:left; margin-bottom:9px; width:495px;">
			<font style="font-size:14px;">Messages</font><br/>
				<div id="messages|mow" style="padding:2px;">
<!--//
			<font>3-24-09 Fixed Add Card</font><br/>
			<font>3-24-09 Added Log-In Box - Please note, logging in does nothing yet, but it is possible.</font><br/>
			<font>3-25-09 Fixed Log-In Message</font><br/>
			<font>3-25-09 Changed Full List to Card List</font><br/>
			<font>3-25-09 Added Ability List</font><br/>
			<font>3-25-09 Added Add Ability form</font><br/>
			<font>3-25-09 Added Action List</font><br/>
			<font>3-25-09 Added Add Action form</font><br/>
			<font>3-25-09 Changed Land to Scroll in the Card Type drop-down box</font>
//-->
			</div>
		</div>

		<!--// TOP - Display //-->
		<div id="container-top|mow" style="border:1px solid rgb(0,0,0); float:left; margin-bottom:9px; width:495px;">
			<font style="font-size:14px;">Current Areas of Work</font><br/>
				<div id="updates|mow" style="padding:2px;">
<!--//
			<font>Need to Add: More cards - hopefully reach 500 in total for testing</font><br/>
			<font>Need to Add: Create Message, Create News Update, Create Current Areas of Work forms</font><br/>
			<font style="color:#00CC00;">Need to Add: Previous and Next buttons for all Lists - All card data is stored, I am just trying to break the list into 20-30 card "pages" so it loads a lot faster.</font><br/>
			<font>In Development: Updating Add-Card to include actions and abilities drop-down boxes. This is being done for testing reasons - each card will have a Total Point Value that will help balance the game as we test it. Each action and ability on a card will need to be turned into an action or ability via the Add Action or Add Ability forms respectively. For now, just best-guess the Point Value of the effect of the action or ability compared to others. Also, this is a precursory step to creating the game's artificial intelligience - we will later use the Total Point Value of a card to help the computer make choices. When making new cards, you may opt to simply use the textbox to write out the game-text like you were doing.</font>
//-->
			</div>
		</div>

		<!--// RIGHT - Display //-->
		<div id="R|mow">
			<div id="container-right|mow" style="border:1px solid rgb(0,0,0); float:left; height:360px; width:240px;"></div>
		</div>

		<!--// RIGHT 2 - Display //-->
		<div id="R2|mow">
			<div id="container-right-2|mow" style="border:1px solid rgb(0,0,0); float:left; height:360px; margin-left:12px; width:240px;"></div>
		</div>

	</div>

</div>

<!--// Card - Template //-->
<div id="card|template" style="display:none; visibility:hidden;">
	<div id="card|replace-X|replace-Y" onMouseOver="javascript:F_SC(replace-X,replace-Y);" style="border:1px solid rgb(0,0,0); float:left; height:80px; margin:2px; width:60px;"></div>
</div>

<!--// Map - Template //-->
<div id="map|template" style="display:none; visibility:hidden;">
	<div id="container-main|map" style=""></div>
</div>

<!--// Messages - Template //-->
<div id="message|template" style="display:none; visibility:hidden;">
	<div id="message|line" style="width:auto;">
		<font style="color:#FFAA00; font-size:12px;">replace-user-name</font>&nbsp;
        <font style="color:#999999; font-size:12px;">replace-CreatedOn</font>&nbsp;
        <font style="font-size:12px;">replace-Message</font>
	</div>
</div>

<!--// List - Header //-->
<div id="list|header" style="display:none; visibility:hidden;">
	<div id="container-main|header" style="width:auto;">
		<table cellpadding="0" cellspacing="0" style="background-color:#CBCBCB; width:100%;">
			<tr>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">ID</font></td>
				<td style="height:20px; width:200px;"><font style="font-size:14px; font-weight:bold;">Name</font></td>
				<td style="height:20px; width:60px;"><font style="font-size:12px; font-weight:bold;">IsUnique</font></td>
				<td style="height:20px; width:80px;"><font style="font-size:12px; font-weight:bold;">Type</font></td>
				<td style="height:20px; width:80px;"><font style="font-size:12px; font-weight:bold;">Class</font></td>
				<td style="height:20px; width:80px;"><font style="font-size:12px; font-weight:bold;">Alignment</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">Star</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">Power</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">Speed</font></td>
				<td style="width:auto;"></td>
			</tr>
			<tr>
				<td colspan="9"><font style="font-size:12px;">GameText</font></td>
			</tr>
		</table>
	</div>
</div>

<!--// List Line - Template //-->
<div id="list|template" style="display:none; visibility:hidden;">
	<div id="container-main|list" style="width:auto;">
		<table cellpadding="0" cellspacing="0" id="list-line|color|replace-ID" style="border-bottom:1px solid #CECECE; width:100%;">
			<tr>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-ID</font></td>
				<td style="height:20px; width:200px;"><font style="font-size:14px; font-weight:bold;">replace-Name</font></td>
				<td style="height:20px; width:60px;"><font style="font-size:12px;">replace-IsUnique</font></td>
				<td style="height:20px; width:80px;"><font style="font-size:12px;">replace-Type</font></td>
				<td style="height:20px; width:80px;"><font style="font-size:12px;">replace-Class</font></td>
				<td style="height:20px; width:80px;"><font style="font-size:12px;">replace-Alignment</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-Star</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-Power</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-Speed</font></td>
				<td style="height:20px; width:40px;"><a href="/lapcat/code/mow.php?url=plus/replace-ID" onfocus="javascript:this.blur();">Add</a></td>
                <td style="height:20px; width:40px;"><a href="/lapcat/code/mow.php?url=minus/replace-ID" onfocus="javascript:this.blur();">Remove</a></td>
				<td style="width:auto;"></td>
			</tr>
			<tr><td colspan="11"><font style="font-size:12px;">replace-GameText</font></td></tr>
		</table>
	</div>
</div>

<!--// List - Header //-->
<div id="ability-list|header" style="display:none; visibility:hidden;">
	<div id="container-main|ability-header" style="width:auto;">
		<table cellpadding="0" cellspacing="0" style="background-color:#CBCBCB; width:100%;">
			<tr>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">ID</font></td>
				<td style="height:20px; width:30px;"><font style="font-size:12px; font-weight:bold;">Type</font></td>
				<td style="height:20px; width:70px;"><font style="font-size:12px; font-weight:bold;">Nature</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">Points</font></td>
				<td style="height:20px;"><font style="font-size:14px; font-weight:bold;">Name</font>&nbsp;(<font style="font-size:12px;">Text</font>)</td>
				<td style="width:auto;"></td>
			</tr>
		</table>
	</div>
</div>

<!--// List Line - Template //-->
<div id="ability-list|template" style="display:none; visibility:hidden;">
	<div id="container-main|ability-list" style="width:auto;">
		<table cellpadding="0" cellspacing="0" id="ability-list-line|color|replace-ID" style="border-bottom:1px solid #CECECE; width:100%;">
			<tr>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-ID</font></td>
				<td style="height:20px; width:30px;"><font style="font-size:12px;">replace-AbilityType</font></td>
				<td style="height:20px; width:70px;"><font style="font-size:12px;">replace-AbilityNature</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-AbilityPointValue</font></td>
				<td style="height:20px;"><font style="font-size:14px; font-weight:bold;">replace-AbilityName</font>&nbsp;(<font style="font-size:12px;">replace-AbilityText</font>)</td>
				<td style="width:auto;"></td>
			</tr>
		</table>
	</div>
</div>

<!--// List - Header //-->
<div id="action-list|header" style="display:none; visibility:hidden;">
	<div id="container-main|action-header" style="width:auto;">
		<table cellpadding="0" cellspacing="0" style="background-color:#CBCBCB; width:100%;">
			<tr>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">ID</font></td>
				<td style="height:20px; width:50px;"><font style="font-size:12px; font-weight:bold;">Type</font></td>
				<td style="height:20px; width:70px;"><font style="font-size:12px; font-weight:bold;">Nature</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px; font-weight:bold;">Points</font></td>
				<td style="height:20px; width:120px;"><font style="font-size:12px; font-weight:bold;">Name</font></td>
				<td style="height:20px;"><font style="font-size:12px;">Cost</font>:&nbsp;<font style="font-size:12px;">Text</font></td>
				<td style="width:auto;"></td>
			</tr>
		</table>
	</div>
</div>

<!--// List Line - Template //-->
<div id="action-list|template" style="display:none; visibility:hidden;">
	<div id="container-main|action-list" style="width:auto;">
		<table cellpadding="0" cellspacing="0" id="action-list-line|color|replace-ID" style="border-bottom:1px solid #CECECE; width:100%;">
			<tr>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-ID</font></td>
				<td style="height:20px; width:50px;"><font style="font-size:12px;">replace-ActionType</font></td>
				<td style="height:20px; width:70px;"><font style="font-size:12px;">replace-ActionNature</font></td>
				<td style="height:20px; width:40px;"><font style="font-size:12px;">replace-ActionPointValue</font></td>
				<td style="height:20px; width:120px;"><font style="font-size:12px;">replace-ActionName</font></td>
				<td style="height:20px;"><font style="font-size:12px;">replace-ActionCost</font>:&nbsp;<font style="font-size:12px;">replace-ActionText</font></td>
				<td style="width:auto;"></td>
			</tr>
		</table>
	</div>
</div>

<!--// Form - Add Card //-->
<div id="form|add-card" style="display:none; visibility:hidden;">
	<font style="font-size:14px; font-weight:bold;">Add a Card</font><br/>
	<form id="add-card" action="http://dev.lapcat.org/lapcat/code/mow.php?url=add-card" method="post">
		<font style="margin-right:12px;">Name</font><input type="text" name="Name" value="" /><br/>
		<font style="margin-right:12px;">IsUnique</font><input type="checkbox" name="IsUnique" value="0" /><br/>
		<font style="margin-right:12px;">Type</font>
		<select name="Type">
			<option value="0">Scroll</option>
			<option value="1">Landmark</option>
			<option value="2">Chest</option>
			<option value="3">Item</option>
			<option value="4">Creature</option>
		</select>
        <br/>
		<font style="margin-right:12px;">Class</font>
		<select name="Class">
			<option value="0">Inanimate</option>
			<option value="1">Beast</option>
			<option value="2">Warrior</option>
			<option value="3">Rogue</option>
			<option value="4">Wizard</option>
			<option value="5">Cleric</option>
			<option value="6">Undead</option>
		</select>
        <br/>
		<font style="margin-right:12px;">Alignment</font>
		<select name="Alignment">
			<option value="0">Neutral</option>
			<option value="1">Good</option>
			<option value="2">Evil</option>
		</select>
        <br/>
		<font style="margin-right:12px;">Star</font><input type="text" name="Star" value="1" /><font style="color:#CCCCCC; margin-left:12px;">1 - 6</font><br/>
		<font style="margin-right:12px;">Power</font><input type="text" name="Power" value="0" /><font style="color:#CCCCCC; margin-left:12px;">0 - ??</font><br/>
		<font style="margin-right:12px;">Speed</font><input type="text" name="Speed" value="0" /><font style="color:#CCCCCC; margin-left:12px;">0 - ??</font><br/>
		<font style="margin-right:12px;">Diplomacy</font><input type="text" name="Diplomacy" value="0" /><font style="color:#CCCCCC; margin-left:12px;">0 - ??</font><br/>
		<font style="margin-right:12px;">Game Text</font><textarea COLS="40" ROWS="5" name="GameText"></textarea><br/>
		<font style="margin-right:12px;">Action A</font><input type="text" name="ActionA" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Action ID from Action List</font><br/>
		<font style="margin-right:12px;">Action B</font><input type="text" name="ActionB" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Action ID from Action List</font><br/>
		<font style="margin-right:12px;">Action C</font><input type="text" name="ActionC" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Action ID from Action List</font><br/>
		<font style="margin-right:12px;">Action D</font><input type="text" name="ActionD" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Action ID from Action List</font><br/>
		<font style="margin-right:12px;">Ability A</font><input type="text" name="AbilityA" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Ability ID from Ability List</font><br/>
		<font style="margin-right:12px;">Ability B</font><input type="text" name="AbilityB" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Ability ID from Ability List</font><br/>
		<font style="margin-right:12px;">Ability C</font><input type="text" name="AbilityC" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Ability ID from Ability List</font><br/>
		<font style="margin-right:12px;">Ability D</font><input type="text" name="AbilityD" value="0" /><font style="color:#CCCCCC; margin-left:12px;">Ability ID from Ability List</font><br/>
		<button type="submit">Submit</button>
	</form>
</div>

<!--// Form - Add Ability //-->
<div id="form|add-ability" style="display:none; visibility:hidden;">
	<font style="font-size:14px; font-weight:bold;">Add A Card Ability</font><br/>
	<form id="add-ability" action="http://dev.lapcat.org/lapcat/code/mow.php?url=add-ability" method="post">
		<font style="margin-right:12px;">Name</font><input type="text" name="AbilityName" value="" /><br/>
		<font style="margin-right:12px;">Ability</font><input type="text" name="AbilityText" value="" /><br/>
		<font style="margin-right:12px;">Point Value</font><input type="text" name="AbilityPointValue" value="0" /><br/>
		<font style="margin-right:12px;">Type</font><font style="color:#999999;">Shows / Hides name of ability on card.</font><br/>
		<select name="AbilityType">
			<option value="0">Show Name</option>
			<option value="1">Do Not Show Name</option>
		</select><br/>
		<font style="margin-right:12px;">Nature</font><font style="color:#999999;">To help the computer make choices. For the most part, moving-based effects are offensive since they tend to lead to battles. If unsure, go with Neutral.</font><br/>
		<select name="AbilityNature">
			<option value="0">Defensive</option>
			<option value="1">Neutral</option>
			<option value="2">Offensive</option>
		</select><br/>
		<button type="submit">Submit</button>
	</form>
</div>

<!--// Form - Add Action //-->
<div id="form|add-action" style="display:none; visibility:hidden;">
	<font style="font-size:14px; font-weight:bold;">Add A Card Action</font><br/>
	<form id="add-action" action="http://dev.lapcat.org/lapcat/code/mow.php?url=add-action" method="post">
		<font style="margin-right:12px;">Name</font><input type="text" name="ActionName" value="" /><br/>
		<font style="margin-right:12px;">Action</font><input type="text" name="ActionText" value="" size="100" /><br/>
		<font style="margin-right:12px;">Point Value</font><input type="text" name="ActionPointValue" value="0" /><br/>
		<font style="margin-right:12px;">ActionCost</font><input type="text" name="ActionCost" value="" /><font style="color:#999999;">Please use [this-card] in replace of card-names for actions. For example, "Destroy Scroll of Doom" becomes "Destroy [this-card]". If the action has no cost, leave this blank.</font><br/>
		<font style="margin-right:12px;">Type</font><font style="color:#999999;">Type of effect. Default is Action, similar to the Tap-based effects in magic.</font><br/>
		<select name="ActionType">
			<option value="0">Action</option>
			<option value="1">Trigger</option>
		</select><br/>
		<font style="margin-right:12px;">Nature</font><font style="color:#999999;">To help the computer make choices. For the most part, moving-based effects are offensive since they tend to lead to battles. If unsure, go with Neutral.</font><br/>
		<select name="ActionNature">
			<option value="0">Defensive</option>
			<option value="1">Neutral</option>
			<option value="2">Offensive</option>
		</select><br/>
		<button type="submit">Submit</button>
	</form>
</div>

<!--// Form - Add Message //-->
<div id="form|add-message" style="display:none; visibility:hidden;">
	<font style="font-size:14px; font-weight:bold;">Add A Message</font><br/>
	<form id="add-message" action="http://dev.lapcat.org/lapcat/code/mow.php?url=add-message" method="post">
		<font style="color:#C9C9C9; margin-right:12px;">Must be logged-in to add a message.</font><br/>
		<font style="margin-right:12px;">Message</font><input type="text" name="Message" value="" size="100" /><br/>
		<button type="submit">Submit</button>
	</form>
</div>