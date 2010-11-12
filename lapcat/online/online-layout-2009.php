<!--//                        //-->
<!--//                        //-->
<!--//                        //-->
<div class="color-F-4 corners-top-2 corners-bottom-2" id="new-window" style="display:none; height:168px; padding:2px; position:absolute; overflow:hidden; width:248px; z-index:25;">
	<div class="color-Y-2 border-all-gold-1 corners-top-2 corners-bottom-2 light-up font-fake" style="height:156px; padding:4px;">
		<div class="font-fake font-Y" style="font-size:12px; margin-top:6px; text-align:center; width:100%;"></div>
		<div id="new-window-list" style="margin-top:6px; width:100%;"></div>
	</div>
</div>


<!--//                        //-->
<!--//                        //-->
<!--//                        //-->



<div class="color-Y-3" id="background-screen" style="display:none; position:absolute; height:100%; width:100%; z-index:14;"><div style="padding:auto; width:100%;"></div></div>
<div class="color-Y-3 close-approval-to-buy-click" id="background-screen-2" style="display:none; position:absolute; height:100%; width:100%; z-index:24;"><div style="padding:auto; width:100%;"></div></div>

<div class="color-Y-3" id="statistics-screen" style="display:none; position:absolute; height:100%; width:100%; z-index:14;">
	<div style="padding:auto; height:100%; width:100%;">
		<div class="border-all-I-1-35 color-Y-1 corners-bottom-2 corners-top-2" style="margin-left:12px; margin-top:48px; height:578px; width:972px;">
			<table class="font-fake font-Y" cellpadding="0" cellspacing="0" style="font-size:11px; width:100%;"><tr>
				<td class="font-bold font-gold" colspan="2" style="font-size:15px; height:28px; padding-left:6px; padding-right:6px; padding-top:2px;">
					<div style="float:left; height:18px; margin-top:8px;">Results</div>
					<div class="button-green font-fake font-Y font-bold light-up start-test-click" id="test-quest-repeat" style="float:right; height:24px; text-align:center; width:80px;"><div class="font-Q" style="font-size:8px; height:8px; width:100%;">Repeat</div><div style="width:100%;">Quest</div></div>
				</td>
			<tr></tr>
				<td class="font-I" colspan="2" style="font-size:11px; height:18px; padding-left:6px;">
					<div style="float:left; padding-left:6px; width:auto;">(</div>
					<div class="font-Y" id="replace-morale-level" data="hide-on-zero" style="float:left; font-size:13px; padding-left:3px; width:auto;"></div>
					<div style="float:left; padding-left:3px; width:auto;">)</div>
					<div class="font-Q" id="replace-party|success" data="show-or-hide" style="float:left; font-size:13px; padding-left:3px; width:auto;">Success</div>
					<div class="font-Y" id="replace-party|tied" data="show-or-hide" style="float:left; font-size:13px; padding-left:3px; width:auto;">Tie</div>
					<div class="font-R" id="replace-party|failure" data="show-or-hide" style="float:left; font-size:13px; padding-left:3px; width:auto;">Failure</div>
					<div style="float:left; font-size:13px; padding-left:3px; width:auto;">&mdash;</div>
					<div class="font-Y" id="replace-total-time" data="normal" style="float:left; font-size:13px; padding-left:6px; width:auto;"></div>
					<div style="float:left; padding-left:6px; width:auto;">(</div>
					<div class="font-Y" id="replace-total-turns" data="normal" style="float:left; font-size:13px; padding-left:3px; width:auto;"></div>
					<div class="font-Y" style="float:left; font-size:13px; padding-left:3px; width:auto;"> Turns</div>
					<div style="float:left; padding-left:3px; width:auto;">)</div>
				</td>
			<tr></tr>
				<td style="height:auto; padding-left:6px; vertical-align:top; width:50%;">

					<div class="font-Y" style="float:left; font-size:12px; width:100%;">Party</div>

					<!--/* Party - Damage Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-Q" id="replace-party|damage-inflicted-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Damage</td></tr></table>
					<!--/* Party - Kills Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-Q" id="replace-party|kills-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Kills</td></tr></table>
					<!--/* Party - Deaths Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-R" id="replace-party|deaths-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Deaths</td></tr></table>
					<!--/* Party - Cost Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-gold" id="replace-party|cost-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Cost</td></tr></table>

					<div class="font-H" style="float:left; font-size:10px; margin-top:4px; width:100%;">
						<div style="float:left; width:38px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/coins.png" style="height:16px; margin-left:11px; width:16px;" /></div>
						<div style="float:left; width:150px;">Characters</div>
						<div style="float:left; text-align:center; width:28px;">Kills</div>
						<div style="float:left; text-align:center; width:28px;">Dmg</div>
						<div style="float:left; text-align:center; width:18px;">HP</div>
						<div style="float:left; text-align:center; width:18px;">SP</div>
						<div style="float:left; text-align:center; width:18px;">MP</div>
						<div style="float:left; text-align:center; width:28px;">BP</div>
						<div style="float:left; text-align:center; width:28px;">EP</div>
						<div style="float:left; text-align:center; width:28px;">CP</div>
						<div style="float:left; text-align:center; width:18px;">Un</div>
						<div style="float:left; text-align:center; width:18px;">Ex</div>
						<div style="float:left; text-align:center; width:18px;">Cn</div>
					</div>
					<!--/* Party - Cost */-->
					<div class="font-gold" id="replace-party|cost-by-character" data="word-list" style="float:left; font-size:12px; text-align:center; width:38px;"></div>
					<!--/* Party - Characters */-->
					<div class="font-Y" id="replace-party|characters" data="word-list" style="float:left; font-size:12px; width:150px;"></div>
					<!--/* Party - Kills */-->
					<div class="font-Q" id="replace-party|kills-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Party - Damage */-->
					<div class="font-Q" id="replace-party|damage-inflicted-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Party - Health Loss */-->
					<div class="font-R" id="replace-party|health-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Party - Stamina Loss */-->
					<div class="font-R" id="replace-party|stamina-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Party - Mana Loss */-->
					<div class="font-R" id="replace-party|mana-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Party - Blood Loss */-->
					<div class="font-R" id="replace-party|blood-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Party - Energy Loss */-->
					<div class="font-R" id="replace-party|energy-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Party - Concentration Loss */-->
					<div class="font-R" id="replace-party|concentration-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Party - Unconscious */-->
					<div class="font-R" id="replace-party|unconscious-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Party - Exhausted */-->
					<div class="font-R" id="replace-party|exhausted-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Party - Confounded */-->
					<div class="font-R" id="replace-party|confounded-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>

					<div class="font-H" style="float:left; font-size:10px; margin-top:12px; width:100%;">
						<div style="float:left; margin-left:38px; width:150px;">Type Of Damage</div>
						<div style="float:left; width:28px;">Kills</div>
						<div style="float:left; width:28px;">DMG</div>
					</div>
					<!--/* Party - Types Of Damage */-->
					<div class="font-Y" style="float:left; font-size:12px; margin-left:38px; width:150px;">
						<div style="float:left; width:100%;">Acid</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Blunt</div>
						<div style="float:left; width:100%;">Cold</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Electrical</div>
						<div style="float:left; width:100%;">Heat</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Piercing</div>
						<div style="float:left; width:100%;">Poison</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Slashing</div>
						<div style="float:left; width:100%;">Sonic</div>
						<div class="font-italic font-I" style="background-color:rgb(15,15,15); float:left; width:100%;">Other</div>
					</div>
					<!--/* Party - Kills */-->
					<div class="font-Q" id="replace-party|kills-by-type" data="number-list" style="float:left; font-size:12px; width:28px;"></div>
					<!--/* Party - Damage */-->
					<div class="font-Q" id="replace-party|damage-inflicted-by-type" data="number-list" style="float:left; font-size:12px; width:28px;"></div>

					<div class="font-H" style="float:left; font-size:10px; margin-left:38px; margin-top:12px; width:100%;">
						<div style="float:left; width:180px;">Awards</div>
						<!--/* Party - Awards */-->
						<div class="font-gold" id="replace-party|awards-by-character" data="word-list" style="float:left; font-size:12px; text-align:left; width:100%;"></div>
					</div>
					<div class="font-H" style="float:left; font-size:10px; margin-left:38px; margin-top:12px; width:100%;">
						<div style="float:left; width:180px;">Loot Recovered</div>
						<div class="font-gold" id="replace-party|recovered-loot" data="word-list" style="float:left; font-size:12px; text-align:left; width:100%;"></div>
					</div>

				</td>
				<td style="height:auto; padding-left:6px; vertical-align:top; width:50%;">

					<div class="font-Y" style="float:left; font-size:12px; width:100%;">Quest</div>

					<!--/* Quest - Damage Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-Q" id="replace-quest|damage-inflicted-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Damage</td></tr></table>
					<!--/* Quest - Kills Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-Q" id="replace-quest|kills-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Kills</td></tr></table>
					<!--/* Quest - Deaths Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-R" id="replace-quest|deaths-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Deaths</td></tr></table>
					<!--/* Quest - Cost Total */-->
					<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:36px;"><div class="font-gold" id="replace-quest|cost-total" data="normal" style="float:left; font-size:12px; padding-right:3px; text-align:center; width:100%;"></div></td><td class="font-Y" style="font-size:11px; padding-left:3px; width:auto;">Total Cost</td></tr></table>

					<div class="font-H" style="float:left; font-size:10px; margin-top:4px; width:100%;">
						<div style="float:left; width:38px;"><img src="http://cdn1.lapcat.org/famfamfam/silk/coins.png" style="height:16px; margin-left:11px; width:16px;" /></div>
						<div style="float:left; width:150px;">Characters</div>
						<div style="float:left; text-align:center; width:28px;">Kills</div>
						<div style="float:left; text-align:center; width:28px;">Dmg</div>
						<div style="float:left; text-align:center; width:18px;">HP</div>
						<div style="float:left; text-align:center; width:18px;">SP</div>
						<div style="float:left; text-align:center; width:18px;">MP</div>
						<div style="float:left; text-align:center; width:28px;">BP</div>
						<div style="float:left; text-align:center; width:28px;">EP</div>
						<div style="float:left; text-align:center; width:28px;">CP</div>
						<div style="float:left; text-align:center; width:18px;">Un</div>
						<div style="float:left; text-align:center; width:18px;">Ex</div>
						<div style="float:left; text-align:center; width:18px;">Cn</div>
					</div>
					<!--/* Quest - Cost */-->
					<div class="font-gold" id="replace-quest|cost-by-character" data="word-list" style="float:left; font-size:12px; text-align:center; width:38px;"></div>
					<!--/* Quest - Characters */-->
					<div class="font-Y" id="replace-quest|characters" data="word-list" style="float:left; font-size:12px; width:150px;"></div>
					<!--/* Quest - Kills */-->
					<div class="font-Q" id="replace-quest|kills-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Quest - Damage */-->
					<div class="font-Q" id="replace-quest|damage-inflicted-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Quest - Health Loss */-->
					<div class="font-R" id="replace-quest|health-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Quest - Stamina Loss */-->
					<div class="font-R" id="replace-quest|stamina-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Quest - Mana Loss */-->
					<div class="font-R" id="replace-quest|mana-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Quest - Blood Loss */-->
					<div class="font-R" id="replace-quest|blood-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Quest - Energy Loss */-->
					<div class="font-R" id="replace-quest|energy-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Quest - Concentration Loss */-->
					<div class="font-R" id="replace-quest|concentration-loss-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:28px;"></div>
					<!--/* Quest - Unconscious */-->
					<div class="font-R" id="replace-quest|unconscious-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Quest - Exhausted */-->
					<div class="font-R" id="replace-quest|exhausted-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>
					<!--/* Quest - Confounded */-->
					<div class="font-R" id="replace-quest|confounded-by-character" data="number-list" style="float:left; font-size:12px; text-align:center; width:18px;"></div>

					<div class="font-H" style="float:left; font-size:10px; margin-top:12px; width:100%;">
						<div style="float:left; margin-left:38px; width:150px;">Type Of Damage</div>
						<div style="float:left; width:28px;">Kills</div>
						<div style="float:left; width:28px;">DMG</div>
					</div>
					<!--/* Quest - Types Of Damage */-->
					<div class="font-Y" style="float:left; font-size:12px; margin-left:38px; width:150px;">
						<div style="float:left; width:100%;">Acid</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Blunt</div>
						<div style="float:left; width:100%;">Cold</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Electrical</div>
						<div style="float:left; width:100%;">Heat</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Piercing</div>
						<div style="float:left; width:100%;">Poison</div>
						<div style="background-color:rgb(15,15,15); float:left; width:100%;">Slashing</div>
						<div style="float:left; width:100%;">Sonic</div>
						<div class="font-italic font-I" style="background-color:rgb(15,15,15); float:left; width:100%;">Other</div>
					</div>
					<!--/* Quest - Kills */-->
					<div class="font-Q" id="replace-quest|kills-by-type" data="number-list" style="float:left; font-size:12px; width:28px;"></div>
					<!--/* Quest - Damage */-->
					<div class="font-Q" id="replace-quest|damage-inflicted-by-type" data="number-list" style="float:left; font-size:12px; width:28px;"></div>

					<div class="font-H" style="float:left; font-size:10px; margin-left:38px; margin-top:12px; width:100%;">
						<div style="float:left; width:180px;">Awards</div>
						<!--/* Quest - Awards */-->
						<div class="font-gold" id="replace-quest|awards-by-character" data="word-list" style="float:left; font-size:12px; text-align:left; width:100%;"></div>
					</div>

					<div class="font-H" style="float:left; font-size:10px; margin-left:38px; margin-top:12px; width:100%;">
						<div style="float:left; width:180px;">Loot Recovered</div>
						<div class="font-gold" id="replace-quest|recovered-loot" data="word-list" style="float:left; font-size:12px; text-align:left; width:100%;"></div>
					</div>

				</td>
			</tr></table>
		</div>
	</div>
</div>

<div class="color-F-4 corners-top-2 corners-bottom-2" id="approval-to-buy-box" style="display:none; height:68px; padding:2px; position:absolute; overflow:hidden; width:148px; z-index:25;">
	<div class="color-Y-2 border-all-gold-1 corners-top-2 corners-bottom-2 light-up font-fake" style="height:56px; padding:4px;">
		<div class="font-fake font-Y" style="font-size:12px; margin-top:6px; text-align:center; width:100%;">Are you sure?</div>
		<div style="margin-top:6px; width:100%;">
			<div class="button-gold font-fake font-K light-up approval-to-buy-click" style="float:left; font-size:12px; height:15px; margin-left:15px; margin-bottom:1px; text-align:center; width:36px;">
				<div style="width:100%;">Yes</div>
			</div>
			<div class="button-red font-fake font-G light-up close-approval-to-buy-click" style="float:right; font-size:12px; height:15px; margin-right:15px; margin-bottom:1px; text-align:center; width:36px;">
				<div style="width:100%;">No</div>
			</div>
		</div>
	</div>
</div>
<div class="color-F-4 corners-top-2 corners-bottom-2" id="assemble-box" style="display:none; height:168px; padding:2px; position:absolute; overflow:hidden; width:248px; z-index:25;">
	<div class="color-Y-2 border-all-gold-1 corners-top-2 corners-bottom-2 light-up font-fake" style="height:156px; padding:4px;">
		<div class="font-fake font-Y" style="font-size:12px; margin-top:6px; text-align:center; width:100%;">Assemble</div>
		<div id="assemble-text" style="margin-top:6px; width:100%;"></div>
	</div>
</div>
<div class="color-S-4 corners-top-2 corners-bottom-2" id="action-message-box" style="display:none; padding:2px; position:absolute; overflow:hidden; z-index:25;">
	<div class="color-Y-2 border-all-S-1 corners-top-2 corners-bottom-2 light-up font-fake" id="action-message-text" style="padding:4px;"></div>
</div>
<div class="color-R-4 corners-top-2 corners-bottom-2" id="attack-message-box" style="display:none; padding:2px; position:absolute; overflow:hidden; z-index:25;">
	<div class="color-Y-2 border-all-R-1 corners-top-2 corners-bottom-2 light-up font-fake" id="attack-message-text" style="padding:4px;"></div>
</div>
<div class="color-Z-4 corners-top-2 corners-bottom-2" id="magic-message-box" style="display:none; padding:2px; position:absolute; overflow:hidden; z-index:25;">
	<div class="color-Y-2 border-all-Z-1 corners-top-2 corners-bottom-2 light-up font-fake" id="magic-message-text" style="padding:4px;"></div>
</div>


<table class="border-all-I-1 color-X-1" cellpadding="0" cellspacing="0" id="top-left" style="width:100%; position:absolute; z-index:10;">
	<tr>
		<td class="color-Y-2 light-down" style="height:20px; width:100%;"></td>
	</tr>
</table>

<table class="color-Y-1 light-up" cellpadding="0" cellspacing="0" style="width:100%; position:absolute; top:22px; z-index:10;">
	<tr>
		<td class="light-up" style="background-position:0px 2px; height:12px; width:100%;"></td>
	</tr>
</table>

<div style="background-position:0px -6px; height:24px; position:absolute; top:5px; width:100%; z-index:20;">
	<table class="corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:left; height:38px; margin-left:28px; margin-top:2px; width:86px;">
		<tr><td class="border-left-I-1 border-right-I-1 border-bottom-H-1 color-J-1 corners-bottom-2 corners-top-2 shadow-down" style="vertical-align:top; padding-left:4px; padding-right:5px; width:96px;">
			<div class="button-gold font-fake font-X font-bold light-up menu-click" id="click-home" style="height:24px; margin-left:2px; margin-top:5px; text-align:center; width:80px;">
				<div class="font-R" style="font-size:8px; height:8px; width:100%;">Questlancer</div>
				<div style="width:100%;">Quests</div>
			</div>
		</td></tr>
	</table>
</div>
<div class="light-up" style="background-position:0px -6px; height:24px; position:absolute; top:5px; width:100%; z-index:10;">
	<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-left:142px; margin-top:2px; width:76px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:86px;"><div class="menu-X-65 font-fake font-G light-up menu-click" id="click-Market" style="font-size:15px; height:19px; margin-left:2px; margin-right:2px; padding-top:2px; text-align:center; width:76px;">Market</div></td></tr></table>

	<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-left:7px; margin-top:2px; width:76px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:86px;"><div class="menu-X-65 font-fake font-G light-up menu-click" id="click-Seer" style="font-size:15px; height:19px; margin-left:2px; margin-right:2px; padding-top:2px; text-align:center; width:76px;">Seer</div></td></tr></table>

	<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-left:7px; margin-top:2px; width:76px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:86px;"><div class="menu-X-65 font-fake font-G light-up menu-click" id="click-Tavern" style="font-size:15px; height:19px; margin-left:2px; margin-right:2px; padding-top:2px; text-align:center; width:76px;">Tavern</div></td></tr></table>

</div>

<div class="shadow-up" style="background-position:0px 2px; height:auto; position:absolute; top:34px; width:100%; z-index:10;">
	<div class="corners-bottom-2" style="background-position:0px 2px; height:auto; margin-top:8px; overflow:auto; vertical-align:top; width:100%;">
		<table cellpadding="0" cellspacing="0" style="height:auto; width:100%;">
			<tr>
				<td id="side-menu" style="vertical-align:top; min-width:160px; width:160px;">

					<div id="side-menu-cell-home" style="display:none; height:auto; padding-left:12px; padding-right:12px; width:136px;">
						<div class="border-bottom-I-1-65 corners-top-2 corners-bottom-2" style="float:left; margin-top:6px; width:130px;"><font class="font-fake font-L shadow-down" style="float:left; font-size:12px; margin-top:2px; text-align:center; width:130px;">Hired Mercenaries</font></div>
						<!--/* Barracks */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Barracks" style="font-size:13px; height:19px; margin-left:2px; margin-right:2px; padding-top:2px; text-align:center; width:124px;">Barracks</div></td></tr></table>

						<div class="border-bottom-I-1-65 corners-top-2 corners-bottom-2" style="float:left; margin-top:12px; width:130px;"><font class="font-fake font-L shadow-down" style="float:left; font-size:12px; margin-top:2px; text-align:center; width:130px;">New Recruits</font></div>
						<!--/* Beast */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Beast" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Beast</div></td></tr></table>

						<!--/* Cleric */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:right; height:24px; margin-right:5px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Cleric" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Cleric</div></td></tr></table>

						<!--/* Fighter */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Fighter" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Fighter</div></td></tr></table>

						<!--/* Ranger */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:right; height:24px; margin-right:5px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Ranger" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Ranger</div></td></tr></table>

						<!--/* Rogue */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Rogue" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Rogue</div></td></tr></table>

						<!--/* Wizard */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:right; height:24px; margin-right:5px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Wizard" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Wizard</div></td></tr></table>

						<!--/* Holy */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Holy" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Holy</div></td></tr></table>

						<!--/* Unholy */-->
						<table class="color-Y-4 corners-bottom-2 corners-top-2 shadow-up" cellpadding="0" cellspacing="0" style="float:right; height:24px; margin-right:5px; margin-top:4px; width:60px;"><tr><td class="corners-bottom-2 corners-top-2 light-down" style="width:60px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="guild-Unholy" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:54px;">Unholy</div></td></tr></table>

					</div>

					<div class="font-I" style="float:left;"></div>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="main-content" style="position:absolute; left:152px; top:32px; vertical-align:top; z-index:10;"></div>

<div class="border-all-Z-1 color-Y-3 corners-top-2 corners-bottom-2" id="narrator-log" style="display:none; height:120px; top:4px; right:4px; padding-left:3px; position:fixed; width:300px; vertical-align:top; z-index:5;"></div>

<div id="anchored-window" style="bottom:-640px; position:fixed; vertical-align:top; margin-left:0.5%; width:99%; z-index:15;">
	<table cellpadding="0" cellspacing="0" style="width:100%; z-index:15;">
		<tr>
			<td style="width:100%;">
				<div class="color-Y-4 corners-bottom-3 corners-top-3" style="height:620px; padding:4px;">
				<div class="border-all-I-1-65 color-J-1 corners-bottom-2 corners-top-2 light-up" style="height:620px; margin-bottom:6px; padding-right:1px; width:auto;">
					<table cellpadding="0" cellspacing="0" style="height:620px; width:100%;">
						<tr>
							<td style="vertical-align:top; width:26px;">
								<div class="button-red shadow-up close-window" style="float:left; height:14px; margin-left:2px; margin-bottom:2px; margin-top:21px; width:20px;">
									<img src="http://cdn1.lapcat.org/fugue/icons/cross.png" style="float:right; height:12px; margin-top:2px; margin-right:4px; width:12px;" />
								</div>
								<!--/* Beast */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Beast" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">B</div></td></tr></table>
								<!--/* Cleric */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Cleric" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">C</div></td></tr></table>
								<!--/* Fighter */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Fighter" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">F</div></td></tr></table>
								<!--/* Ranger */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Ranger" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">R</div></td></tr></table>
								<!--/* Rogue */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Rogue" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">R</div></td></tr></table>
								<!--/* Wizard */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Wizard" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">W</div></td></tr></table>
								<!--/* Holy */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Holy" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">H</div></td></tr></table>
								<!--/* Unholy */-->
								<table cellpadding="0" cellspacing="0" style="float:left; height:24px; margin-top:4px; width:24px;"><tr><td style="width:24px;"><div class="menu-X-65 font-fake font-G light-up guild-window-click" id="alternate-guild-Unholy" style="font-size:13px; height:19px; margin-left:2px; padding-top:2px; text-align:center; width:22px;">U</div></td></tr></table>
							</td>
							<td style="width:auto;">
								<div class="border-all-I-1 color-Y-4 corners-bottom-2 corners-top-2" style="height:612px; padding-right:3px; padding-top:2px; width:auto;">
									<table class="shadow-up" cellpadding="0" cellspacing="0" style="background-position:0px 2px; width:100%;">
										<tr>
											<td class="shadow-up" style="background-position:0px 3px; vertical-align:top; width:190px;">
												<div class="color-J-4 corners-bottom-2 shadow-down" id="anchored-window-data" style="height:612px; position:absolute; width:184px; z-index:25;"></div>
												<div id="anchored-window-data" style="background-image:url(http://dev.lapcat.org/lapcat/layout/tiled-images/18-18-103.png); background-repeat:repeat; height:612px; position:absolute; width:946px; z-index:20;"></div>
												<div class="border-all-I-1-35 color-K-1 corners-bottom-2 corners-top-2 font-fake font-G shadow-down" id="show-character-description" style="display:none; font-size:13px; height:509px; padding:4px; position:absolute; left:226px; top:93px; width:348px; z-index:35;"></div>
											</td>
											<td style="vertical-align:top; width:auto;">
												<div class="border-all-Y-1 color-Y-1 corners-bottom-2 corners-top-2 light-up" style="height:602px; padding:3px; width:auto;">
													<div id="anchored-window-open-line" style="width:100%;"></div>
												</div>
											</td>
										</tr>
									</table>
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




<table id="quick-sheet-table-master" cellpadding="0" cellspacing="0" style="display:none; width:100%;">
	<tr>
		<td style="vertical-align:top; width:78px;">
			<div style="padding:1px;">
				<div id="replace-training|basic" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-training|minor" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-training|major" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-training|specialization" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
			</div>
		</td>
		<td style="vertical-align:top; width:118px;">
			<div style="padding:1px;">
				<div id="replace-items|left-hand" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|right-hand" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
			</div>
		</td>
		<td style="vertical-align:top; width:118px;">
			<div style="padding:1px;">
				<div id="replace-items|head" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|torso" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|hands" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|legs" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|feet" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
			</div>
		</td>
		<td style="vertical-align:top; width:auto;">
			<div style="padding:1px;">
				<div id="replace-items|face" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|neck" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|finger" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
				<div id="replace-items|waist" data="normal-blank" style="font-size:11px; height:17px; width:100%;"></div>
			</div>
		</td>
	</tr>
</table>
<table id="character-sheet-table-master" cellpadding="0" cellspacing="0" style="display:none; width:748px;">
	<tr>
		<td class="corners-top-2 color-Y-1 light-up" style="height:18px; width:100%;">
			<div style="display:table; height:17px; text-align:left; width:100%;">

				<img class="show-character-description" src="http://cdn1.lapcat.org/fugue/icons/information-button.png" style="cursor:pointer; float:left; height:16px; margin-left:4px; margin-top:1px; width:16px;" />
				<!--/* Mercenary Name */-->
				<div class="font-Y font-bold" id="replace-name" data="normal" style="float:left; font-size:15px; margin-left:4px; min-width:300px;"></div>

				<div class="button-X-35" id="clicked-CS-group" style="display:table-cell; height:17px; padding-left:2px; padding-right:2px; width:60px;">
					<div class="font-Y" style="float:left; font-size:12px;">freedom</div>
					<div class="font-bold font-H" style="float:right; font-size:12px;">+</div>
				</div>

				<div style="display:table-cell; width:12px;"></div>

				<div class="button-X-35" id="clicked-CS-range" style="display:table-cell; height:17px; padding-left:2px; padding-right:2px; width:60px;">
					<div class="font-Y" style="float:left; font-size:12px;">range</div>
					<div class="font-bold font-H" style="float:right; font-size:12px;">+</div>
				</div>

				<div style="display:table-cell; width:12px;"></div>

				<div class="button-X-35" id="clicked-CS-perform" style="display:table-cell; height:17px; padding-left:2px; padding-right:2px; width:60px;">
					<div class="font-Y" style="float:left; font-size:12px;">perform</div>
					<div class="font-bold font-H" style="float:right; font-size:12px;">+</div>
				</div>

			</div>
		</td>
	</tr>
	<tr>
		<td class="corners-bottom-2 light-down" style="height:18px; padding-top:6px; width:auto;">
			<div id="replace-team-name" data="hide-on-barracks" style="width:auto;">
				<div class="button-gold font-fake font-K light-up buy-guild-member-click" style="float:left; font-size:12px; height:15px; margin-left:5px; margin-bottom:1px; text-align:center; width:36px;">
					<div style="width:100%;">Hire</div>
				</div>
			</div>
			<img src="http://cdn1.lapcat.org/famfamfam/silk/coins.png" style="float:left; height:16px; margin-left:6px; width:16px;" />
			<div class="font-gold" id="replace-hire-rate-per-hour" data="normal" style="float:left; font-size:12px; margin-left:3px; width:auto;"></div>
			<div class="font-Y" style="float:left; font-size:11px; margin-left:3px; text-align:left; width:auto;">gold pieces per hour.</div>
			<div style="float:right; width:auto;">
				<div class="font-I" id="replace-can-action" data="flip" style="float:left; font-size:12px; text-align:center; width:40px;">Act</div>
				<div class="font-I" id="replace-can-attack" data="flip" style="float:left; font-size:12px; text-align:center; width:40px;">Attack</div>
				<div class="font-I" id="replace-can-magic" data="flip" style="float:left; font-size:12px; text-align:center; width:40px;">Cast</div>
				<div class="font-I" id="replace-can-communicate" data="flip-neon" style="float:left; font-size:12px; text-align:center; width:90px;">Communicate</div>
				<div class="font-I" id="replace-can-detect" data="flip-neon" style="float:left; font-size:12px; text-align:center; width:40px;">Detect</div>
				<div class="font-I" id="replace-can-hide" data="flip-neon" style="float:left; font-size:12px; text-align:center; width:40px;">Hide</div>
				<div class="font-I" id="replace-can-move" data="flip-neon" style="float:left; font-size:12px; text-align:center; width:40px;">Move</div>
				<div class="font-I" id="replace-can-see" data="flip-neon" style="float:left; font-size:12px; text-align:center; width:40px;">See</div>
				<div class="font-I" id="replace-can-understand" data="flip-neon" style="float:left; font-size:12px; text-align:center; width:80px;">Understand</div>
			</div>
		</td>
	</tr>
<!--/*
	<tr>
		<td class="corners-bottom-3 light-down" style="background-position:0px 1px; height:18px; padding-top:6px; width:auto;">
			<div class="font-H" id="replace-keywords" data="normal" style="float:left; font-size:11px; padding-left:3px; text-align:left; width:100%;"></div>
		</td>
	</tr>
*/-->
	<tr>
		<td class="corners-top-2 light-up" style="background-position:0px 1px; height:18px; padding-top:6px; width:100%;">
			<div class="font-H" style="float:left; font-size:11px; position:absolute; left:4px; width:auto;">
				<!--/* Alive */-->
				<div id="replace-Alive" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Alive</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Awe-Inspiring */-->
				<div id="replace-Awe-Inspiring" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Awe-Inspiring</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Ethereal */-->
				<div id="replace-Ethereal" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Ethereal</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Fearful */-->
				<div id="replace-Fearful" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Fearful</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Fearless */-->
				<div id="replace-Fearless" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Fearless</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Flying */-->
				<div id="replace-Flying" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Flying</div>
					<div style="float:left; text-align:left; width:auto;">,</div>
				</div>
				<!--/* Hover */-->
				<div id="replace-Hover" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Hover</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Heat Immunity */-->
				<div id="replace-Heat Immunity" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Heat Immunity</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Piercing Immunity */-->
				<div id="replace-Piercing Immunity" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Piercing Immunity</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Poison Immunity */-->
				<div id="replace-Poison Immunity" data="show-or-hide" style="float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Poison Immunity</div>
					<div style="float:left; text-align:left;">,</div>
				</div>
				<!--/* Size */-->
				<div id="replace-Tiny-Size" data="show-or-hide" style="display:none; float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Tiny</div>
				</div>
				<div id="replace-Small-Size" data="show-or-hide" style="display:none; float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Small</div>
				</div>
				<div id="replace-Medium-Size" data="show-or-hide" style="display:none; float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Medium</div>
				</div>
				<div id="replace-Large-Size" data="show-or-hide" style="display:none; float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Large</div>
				</div>
				<div id="replace-Giant-Size" data="show-or-hide" style="display:none; float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Gigantic</div>
				</div>
				<div id="replace-Tower-Size" data="show-or-hide" style="display:none; float:left;">
					<div class="font-gold" style="float:left; font-size:12px; margin-left:3px;">Towering</div>
				</div>
			</div>

			<img class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" id="replace-defense|images|head" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="float:right; height:20px; margin-right:12px; width:20px;" />
			<img class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" id="replace-defense|images|torso" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="float:right; height:20px; margin-right:2px; width:20px;" />
			<img class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" id="replace-defense|images|hands" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="float:right; height:20px; margin-right:2px; width:20px;" />
			<img class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" id="replace-defense|images|legs" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="float:right; height:20px; margin-right:2px; width:20px;" />
			<img class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" id="replace-defense|images|feet" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="float:right; height:20px; margin-right:2px; width:20px;" />
			<div class="font-H" style="float:right; font-size:11px; margin-right:14px; text-align:right; width:20px;">Armor</div>

			<div class="button-X-35" id="clicked-CS-equipment" style="float:right; height:17px; margin-right:14px; padding-left:2px; padding-right:2px; width:88px;">
				<div class="font-Y" style="float:left; font-size:12px;">equipment</div>
				<div class="font-bold font-H" style="float:right; font-size:12px;">+</div>
			</div>

			<div class="button-X-35" id="clicked-CS-training" style="float:right; height:17px; margin-right:14px; padding-left:2px; padding-right:2px; width:88px;">
				<div class="font-Y" style="float:left; font-size:12px;">training</div>
				<div class="font-bold font-H" style="float:right; font-size:12px;">+</div>
			</div>

		</td>
	</tr>
	<tr>
		<td style="padding-top:8px; padding-left:6px; padding-right:6px; width:100%;">

			<table cellspacing="0" cellpadding="0" style="vertical-align:top; width:100%;">
				<tr>
					<td style="padding-top:5px; vertical-align:top; width:158px;">

						<!--/* Mercenary Image (base 200x300) */-->
						<div style="float:left; padding-top:20px;">
							<div id="character-image" style="float:left; height:210px; vertical-align:top; width:150px;">
								<div style="float:left; height:180px; width:122px; z-index:20;"><img class="corners-bottom-2 corners-top-2" id="replace-race-image" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="height:180px; width:120px;" /></div>
							</div>
						</div>

						<div class="font-I" style="font-size:13px; margin-top:16px; padding-left:12px; width:100%;">Protection</div>
						<!--/* Defense - Protection */-->
						<table cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-protection-BC" style="height:25px; width:100%;">
									<!--/* Defense - Protection Chances */-->
									<div id="replace-defense|protection|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Defense - Protection Boost */-->
									<div id="replace-defense|protection|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Counter</td>
						</tr></table>

						<div class="font-I" style="font-size:13px; margin-top:3px; padding-left:12px; width:100%;">Resistance</div>
						<!--/* Resistance - Slashing */-->
						<table id="replace-defense|Slashing|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Slashing" style="height:25px; width:100%;">
									<!--/* Resistance - Slashing Chances */-->
									<div id="replace-defense|Slashing|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Slashing Boost */-->
									<div id="replace-defense|Slashing|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Slashing</td>
						</tr></table>
						<!--/* Resistance - Piercing */-->
						<table id="replace-defense|Piercing|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Piercing" style="height:25px; width:100%;">
									<!--/* Resistance - Piercing Chances */-->
									<div id="replace-defense|Piercing|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Piercing Boost */-->
									<div id="replace-defense|Piercing|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Piercing</td>
						</tr></table>
						<!--/* Resistance - Blunt */-->
						<table id="replace-defense|Blunt|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Blunt" style="height:25px; width:100%;">
									<!--/* Resistance - Blunt Chances */-->
									<div id="replace-defense|Blunt|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Blunt Boost */-->
									<div id="replace-defense|Blunt|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Blunt</td>
						</tr></table>
						<!--/* Resistance - Cold */-->
						<table id="replace-defense|Cold|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Cold" style="height:25px; width:100%;">
									<!--/* Resistance - Cold Chances */-->
									<div id="replace-defense|Cold|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Cold Boost */-->
									<div id="replace-defense|Cold|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Cold</td>
						</tr></table>
						<!--/* Resistance - Heat */-->
						<table id="replace-defense|Heat|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Heat" style="height:25px; width:100%;">
									<!--/* Resistance - Heat Chances */-->
									<div id="replace-defense|Heat|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Heat Boost */-->
									<div id="replace-defense|Heat|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Heat</td>
						</tr></table>
						<!--/* Resistance - Electrical */-->
						<table id="replace-defense|Electrical|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Electrical" style="height:25px; width:100%;">
									<!--/* Resistance - Electrical Chances */-->
									<div id="replace-defense|Electrical|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Electrical Boost */-->
									<div id="replace-defense|Electrical|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Electrical</td>
						</tr></table>
						<!--/* Resistance - Sonic */-->
						<table id="replace-defense|Sonic|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Sonic" style="height:25px; width:100%;">
									<!--/* Resistance - Sonic Chances */-->
									<div id="replace-defense|Sonic|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Sonic Boost */-->
									<div id="replace-defense|Sonic|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Sonic</td>
						</tr></table>
						<!--/* Resistance - Poison */-->
						<table id="replace-defense|Poison|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Poison" style="height:25px; width:100%;">
									<!--/* Resistance - Poison Chances */-->
									<div id="replace-defense|Poison|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Poison Boost */-->
									<div id="replace-defense|Poison|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Poison</td>
						</tr></table>
						<!--/* Resistance - Acid */-->
						<table id="replace-defense|Acid|can-be-hit" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
							<td style="padding-left:2px; width:76px;">
								<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 defense-hover-show-resistance-BC" id="resistance-Acid" style="height:25px; width:100%;">
									<!--/* Resistance - Acid Chances */-->
									<div id="replace-defense|Acid|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
									<!--/* Resistance - Acid Boost */-->
									<div id="replace-defense|Acid|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
								</div>
							</td>
							<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Acid</td>
						</tr></table>

					</td>
					<td style="vertical-align:top; width:198px;">

						<div class="font-L" style="height:208px; vertical-align:top; margin-top:1px; width:100%;">

							<!--/* Initiative */-->
							<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-text" id="replace-initiative" data="gold-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Initiative</td></tr></table>

							<!--/* Range Of View */-->
							<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-text" id="replace-range-of-view" data="gold-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Vision Range</td></tr></table>

							<!--/* Range Of Sense */-->
							<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-text" id="replace-range-of-sense" data="gold-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Detection Range</td></tr></table>

							<!--/* Weight */-->
							<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-text" id="replace-carrying-weight" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Weight</td></tr></table>

							<!--/* Health */-->
							<table id="replace-can-lose-health" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
								<td style="padding-left:2px; width:76px;">
									<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:25px; width:100%;">
										<!--/* Health - Soft Maximum */-->
										<div id="replace-health|soft-maximum" data="purple-bar" style="float:left; padding-left:3px; width:auto;"></div>
										<!--/* Health - Regeneration */-->
										<div id="replace-health|regeneration" data="test-bar" style="float:left; padding-left:3px; width:auto;"></div>
									</div>
								</td>
								<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Health</td>
							</tr></table>
							<!--/* Blood */-->
							<table cellpadding="0" cellspacing="0" id="replace-can-lose-blood" data="show-or-hide" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div id="replace-blood|regeneration" data="test-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Blood</td></tr></table>
							<!--/* Stamina */-->
							<table id="replace-can-lose-stamina" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
								<td style="padding-left:2px; width:76px;">
									<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:25px; width:100%;">
										<!--/* Stamina - Soft Maximum */-->
										<div id="replace-stamina|soft-maximum" data="purple-bar" style="float:left; padding-left:3px; width:auto;"></div>
										<!--/* Stamina - Regeneration */-->
										<div id="replace-stamina|regeneration" data="test-bar" style="float:left; padding-left:3px; width:auto;"></div>
									</div>
								</td>
								<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Stamina</td>
							</tr></table>
							<!--/* Energy */-->
							<table cellpadding="0" cellspacing="0" id="replace-can-lose-energy" data="show-or-hide" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div id="replace-energy|regeneration" data="test-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Energy</td></tr></table>
							<!--/* Mana */-->
							<table id="replace-can-lose-mana" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
								<td style="padding-left:2px; width:76px;">
									<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:25px; width:100%;">
										<!--/* Mana - Soft Maximum */-->
										<div id="replace-mana|soft-maximum" data="purple-bar" style="float:left; padding-left:3px; width:auto;"></div>
										<!--/* Mana - Regeneration */-->
										<div id="replace-mana|regeneration" data="test-bar" style="float:left; padding-left:3px; width:auto;"></div>
									</div>
								</td>
								<td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Mana</td>
							</tr></table>

							<!--/* Concentration */-->
							<table cellpadding="0" cellspacing="0" id="replace-can-lose-concentration" data="show-or-hide" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div id="replace-concentration|regeneration" data="test-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Concentration</td></tr></table>

						</div>


						<div class="font-I" style="font-size:10px; padding-left:12px; width:100%;">Personal</div>
						<!--/* Skills - Accuracy */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Accuracy" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Accuracy</td></tr></table>
						<!--/* Skills - Balance */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Balance" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Balance</td></tr></table>
						<!--/* Skills - Block */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Block" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Block</td></tr></table>
						<!--/* Skills - Communication */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Communication" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Communication</td></tr></table>
						<!--/* Skills - Detection */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Detection" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Detection</td></tr></table>
						<!--/* Skills - Dodge */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Dodge" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Dodge</td></tr></table>
						<!--/* Skills - Intellect */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Intellect" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Intellect</td></tr></table>
						<!--/* Skills - Stealth */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Stealth" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Stealth </td></tr></table>
						<!--/* Skills - Strength */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Strength" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Strength</td></tr></table>
						<!--/* Skills - Understanding */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Understanding" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Understanding</td></tr></table>
						<!--/* Skills - Vision */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Vision" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Vision</td></tr></table>

						<div class="font-I" style="font-size:10px; padding-left:12px; width:100%;">Derived</div>
						<!--/* Skills - Arcane Focus */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Arcane Focus" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Arcane Focus</td></tr></table>
						<!--/* Skills - Battle Focus */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Battle Focus" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Battle Focus</td></tr></table>
						<!--/* Skills - Evasion */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Evasion" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Evasion</td></tr></table>
						<!--/* Skills - Footing */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Footing" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Footing</td></tr></table>
						<!--/* Skills - Observation */-->
						<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr><td style="padding-left:2px; width:76px;"><div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="height:13px; width:100%;"><div class="skills-hover-show-challenge" id="replace-skills|Observation" data="blue-bar" style="float:left; padding-left:3px; width:auto;"></div></div></td><td class="font-Y" style="font-size:11px; padding-left:6px; width:auto;">Observation</td></tr></table>

					</td>
					<td rowspan="2" style="vertical-align:top; min-width:354px; width:auto;">

						<!--/* A c t i o n */-->
						<div class="border-all-I-1-35 corners-bottom-2 corners-top-2" style="height:162px; margin-top:2px; padding-bottom:1px; padding-left:1px; padding-right:1px; width:100%;">

							<div class="corners-bottom-2 shadow-down" style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<div class="font-I" style="font-size:11px; height:13px; padding-left:3px; width:100%;">Action</div>
								</div>

								<div id="replace-can-action" data="show-or-hide" style="display:table-cell; vertical-align:top; width:100%;">
									<!--/* Action - Area Of Effect */-->
									<div class="font-gold" id="replace-action|area" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Area</div>
									<!--/* Action - No Target */-->
									<div class="font-gold" id="replace-action|area" data="show-or-hide-reverse" style="display:none; float:right; width:auto;"><div class="font-gold" id="replace-action|has-target" data="show-or-hide-reverse" style="display:none; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Free-Form</div></div>
									<!--/* Action - Targeted */-->
									<div class="font-gold" id="replace-action|has-target" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Target</div>
									<!--/* Action - Instant */-->
									<div class="font-gold" id="replace-action|instant" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Instant,</div>
									<!--/* Action - Sneaking */-->
									<div class="font-gold" id="replace-action|sneaking" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Sneaking,</div>
									<!--/* Action - Projectile */-->
									<div class="font-gold" id="replace-action|projectile" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Projectile,</div>
									<!--/* Action - Hostile */-->
									<div class="font-gold" id="replace-action|hostile" data="show-or-hide-reverse" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Friendly,</div>
									<!--/* Action - Hostile */-->
									<div class="font-gold" id="replace-action|hostile" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Hostile,</div>
									<!--/* Action - Blessed */-->
									<div class="font-gold" id="replace-action|blessed" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Blessed,</div>
									<!--/* Action - Damage Type */-->
									<div class="font-gold" id="replace-action|deal-damage" data="show-or-hide" style="display:none; float:right; font-size:10px; width:auto;"><div class="font-gold" id="replace-action|damage|type" data="normal" style="float:left; padding-left:6px; width:auto;"></div>,</div>
								</div>

							</div>
							<div class="border-all-S-1 color-S-4 corners-bottom-2 corners-top-2" id="replace-can-action" data="show-or-hide" style="background-image:url(http://dev.lapcat.org/lapcat/layout/tiled-images/18-18-103.png); background-repeat:repeat; height:148px; margin-left:4px; width:372px; z-index:10;">

							<!--/* Name / Range */-->
							<div class="color-S-4 corners-bottom-2 corners-top-2 shadow-down" style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<div class="font-bold" id="replace-abilities|action" data="normal" style="float:left; font-size:15px; height:17px; padding-left:3px; width:100%;"></div>
								</div>
								<div class="font-gold" style="display:table-cell; height:14px; padding-right:3px; vertical-align:middle; max-width:147px;">
									<div id="replace-action|range-end" data="hide-on-blank" style="float:right; font-size:10px;">
										<div id="replace-action|range-end" data="normal" style="float:right; font-size:10px;"></div>
										<div class="font-I" style="float:right; font-size:10px;">&mdash;</div>
									</div>
									<div id="replace-action|range-start" data="normal" style="float:right; font-size:10px;"></div>
								</div>
							</div>

							<!--/* Damage Type / Challenge / Recovery / Cost */-->
							<table class="corners-top-2 shadow-up" cellpading="0" cellspacing="0" style="height:18px; vertical-align:top; width:100%;"><tr>
								<td style="vertical-align:bottom; width:auto;">
									<div id="replace-action|advanced-challenge" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-action|attacker|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-action|attacker|level" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										</div>
										<div id="replace-action|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										<div class="font-R" id="replace-action|defender|skill" data="hide-on-blank" style="float:left; font-size:11px; padding-left:5px; width:auto;">vs.</div>
										<div id="replace-action|defender|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-action|defender|level" data="normal" style="float:left; font-size:11px; width:auto;"></div>
										</div>
										<div id="replace-action|defender|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
									<div id="replace-action|enchantment" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-action|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
									<div id="replace-action|challenge" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-action|attacker|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-action|attacker|level" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										</div>
										<div id="replace-action|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										<div class="font-R" id="replace-action|defender|skill" data="hide-on-blank" style="float:left; font-size:11px; padding-left:5px; width:auto;">vs.</div>
										<div id="replace-action|defender|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-action|defender|level" data="normal" style="float:left; font-size:11px; width:auto;"></div>
										</div>
										<div id="replace-action|defender|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
								</td>
								<td style="vertical-align:top; width:128px;">
									<!--/* Action - Cost */-->
									<div id="replace-action|cost" data="hide-on-zero" style="float:right; width:49px;">
										<div class="font-G" style="float:right; font-size:10px; margin-left:3px; padding-top:1px; width:46px;">
										Stamina</div>
									</div>
									<div id="replace-action|cost" data="hide-on-zero" class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="float:right; height:15px; margin-top:1px; width:76px;">
										<div style="height:13px; width:100%;"><div id="replace-action|cost" data="purple-bar" style="float:left; padding-left:3px; width:auto;"></div></div>
									</div>
								</td>
							</tr></table>


							<div style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<!--/* Action - Damage-Dealing */-->
									<div style="height:auto; padding-top:2px; width:100%;">

										<!--/* Action - Information */-->
										<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr>
											<td style="vertical-align:top; width:auto;">
												<!--/* Action - Challenge */-->
												<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 action-hover-show-challenge-BC" id="replace-action|enchantment" data="show-or-hide-reverse" style="height:15px; margin-left:3px; width:76px;">
													<!--/* Action - Attacker Skill */-->
													<div style="height:11px; width:100%;"><div id="replace-action|attacker|skill" data="blue-bar-skill" style="float:left; padding-left:3px; width:auto;"></div></div>
												</div>
											</td>
											<td style="vertical-align:top; width:128px;">
												<!--/* Action - Recover */-->
												<div id="replace-action|re-use" data="hide-on-zero" style="float:right; width:50px;">
													<div class="font-G" style="float:right; font-size:10px; margin-left:3px; padding-top:1px; width:46px;">Recover</div>
												</div>
												<div id="replace-action|re-use" data="hide-on-zero" class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="float:right; height:15px; margin-top:1px; width:76px;">
													<div style="height:13px; width:100%;"><div id="replace-action|re-use" data="grey-bar" style="float:left; padding-left:3px; width:auto;"></div></div>
												</div>
											</td>
										</tr></table>

										<!--/* Container */-->
										<table cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
											<td style="vertical-align:top; width:60px;">

												<img class="border-all-S-1 color-Y-2 corners-bottom-2 corners-top-2" id="replace-action|image" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="height:52px; margin-left:5px; width:52px;" />

											</td>
											<td style="vertical-align:top; width:auto;">

												<!--/* Action - Effect (Advanced Challenge) */-->
												<table id="replace-action|advanced-challenge" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
													<td style="padding-left:2px; width:76px;">
														<!--/* Action - Advanced Challenge */-->
														<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 action-hover-show-effect-BC" id="replace-action|advanced-challenge" data="show-or-hide" style="height:25px; width:100%;">
															<!--/* Action - Effect Chances */-->
															<div id="replace-action|effect|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
															<!--/* Action - Effect Boost */-->
															<div id="replace-action|effect|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
														</div>
													</td>
													<!--/* Action - Effect Name / Duration */-->
													<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
														<div class="font-Y action-hover-show-effect" id="replace-action|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
														<div id="replace-action|effect|duration" data="hide-on-zero">
															<div id="replace-action|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
															<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
															<div id="replace-action|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
														</div>
													</td>
												</tr></table>

												<!--/* Action - Effect (Challenge) */-->
												<table id="replace-action|advanced-challenge" data="show-or-hide-reverse" cellpadding="0" cellspacing="0" style="height:84px; width:100%;"><tr>
													<td style="height:25px; padding-left:2px; vertical-align:top; width:76px;"></td>
													<!--/* Action - Effect Name / Duration */-->
													<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
														<div class="font-Y action-hover-show-effect" id="replace-action|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
														<div id="replace-action|effect|duration" data="hide-on-zero" style="float:left;">
															<div id="replace-action|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
															<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
															<div id="replace-action|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
														</div>
													</td>
												</tr></table>

												<!--/* Action - Critical (Advanced Challenge) */-->
												<table id="replace-action|advanced-challenge" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
													<td style="padding-left:2px; width:76px;">
														<!--/* Action - Advanced Challenge */-->
														<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 action-hover-show-critical-BC" style="height:25px; width:100%;">
															<!--/* Action - Critical Chances */-->
															<div id="replace-action|critical|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
															<!--/* Action - Critical Boost */-->
															<div id="replace-action|critical|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
														</div>
													</td>
													<!--/* Action - Effect Name / Duration */-->
													<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
														<div class="font-Y action-hover-show-critical" id="replace-action|critical|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
														<div id="replace-action|critical|duration" data="hide-on-zero" style="float:left;">
															<div id="replace-action|critical|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
															<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
															<div id="replace-action|critical|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
														</div>
													</td>
												</tr></table>

												<!--/* Action - Damage */-->
												<table id="replace-action|deal-damage" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
													<td style="padding-left:2px; width:76px;">
														<!--/* Action - Advanced Challenge */-->
														<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 action-hover-show-damage-BC" id="replace-action|advanced-challenge" data="show-or-hide" style="height:25px; width:100%;">
															<!--/* Action - Damage Chances */-->
															<div id="replace-action|damage|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
															<!--/* Action - Damage Boost */-->
															<div id="replace-action|damage|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
														</div>
													</td>
													<!--/* Action - Damage */-->
													<td class="font-R" style="font-size:12px; padding-left:6px; width:auto;">Wound</td>
												</tr></table>

													</td>
												</tr></table>

											</div>

										</div>
									</div>
								</div>

						</div>
	
						<!--/* A t t a c k */-->
						<div class="border-all-I-1-35 corners-bottom-2 corners-top-2" style="height:162px; margin-top:12px; padding-bottom:1px; padding-left:1px; padding-right:1px; width:100%;">

						<div class="corners-bottom-2 shadow-down" style="display:table; height:auto; vertical-align:top; width:100%;">
							<div style="display:table-cell; vertical-align:top; width:auto;">
								<div class="font-I" style="font-size:11px; height:13px; padding-left:3px; width:100%;">Attack</div>
							</div>

							<div id="replace-can-attack" data="show-or-hide" style="display:table-cell; vertical-align:top; width:100%;">
								<!--/* Attack - Area Of Effect */-->
								<div class="font-gold" id="replace-attack|area" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Area</div>
								<!--/* Attack - No Target */-->
								<div class="font-gold" id="replace-attack|area" data="show-or-hide-reverse" style="display:none; float:right; width:auto;"><div class="font-gold" id="replace-attack|has-target" data="show-or-hide-reverse" style="display:none; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Free-Form</div></div>
								<!--/* Attack - Targeted */-->
								<div class="font-gold" id="replace-attack|has-target" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Target</div>
								<!--/* Attack - Instant */-->
								<div class="font-gold" id="replace-attack|instant" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Instant,</div>
								<!--/* Attack - Sneaking */-->
								<div class="font-gold" id="replace-attack|sneaking" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Sneaking,</div>
								<!--/* Attack - Projectile */-->
								<div class="font-gold" id="replace-attack|projectile" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Projectile,</div>
								<!--/* Attack - Hostile */-->
								<div class="font-gold" id="replace-attack|hostile" data="show-or-hide-reverse" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Friendly,</div>
								<!--/* Attack - Hostile */-->
								<div class="font-gold" id="replace-attack|hostile" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Hostile,</div>
								<!--/* Attack - Blessed */-->
								<div class="font-gold" id="replace-attack|blessed" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Blessed,</div>
								<!--/* Attack - Damage Type */-->
								<div class="font-gold" id="replace-attack|deal-damage" data="show-or-hide" style="display:none; float:right; font-size:10px; width:auto;"><div class="font-gold" id="replace-attack|damage|type" data="normal" style="float:left; padding-left:6px; width:auto;"></div>,</div>
							</div>

						</div>

						<div class="border-all-R-1 color-R-4 corners-bottom-2 corners-top-2" id="replace-can-attack" data="show-or-hide" style="background-image:url(http://dev.lapcat.org/lapcat/layout/tiled-images/18-18-103.png); background-repeat:repeat; height:148px; margin-left:4px; width:372px; z-index:10;">

							<!--/* Name / Range */-->
							<div class="color-R-4 corners-bottom-2 corners-top-2 shadow-down" style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<div id="replace-lootable-items|left-hand" data="hide-on-blank"><div class="font-bold" id="replace-lootable-items|left-hand" data="normal" style="float:left; font-size:15px; height:17px; padding-left:3px; width:100%;"></div></div>
									<div id="replace-lootable-items|left-hand" data="hide-on-blank-reverse"><div class="font-bold" id="replace-items|left-hand" data="normal" style="float:left; font-size:15px; height:17px; padding-left:3px; width:100%;"></div></div>
								</div>
								<div class="font-gold" style="display:table-cell; height:14px; padding-right:3px; vertical-align:middle; max-width:147px;">
									<div id="replace-attack|range-end" data="hide-on-blank" style="float:right; font-size:10px;">
										<div id="replace-attack|range-end" data="normal" style="float:right; font-size:10px;"></div>
										<div class="font-I" style="float:right; font-size:10px;">&mdash;</div>
									</div>
									<div id="replace-attack|range-start" data="normal" style="float:right; font-size:10px;"></div>
								</div>
							</div>

							<!--/* Damage Type / Challenge / Recovery / Cost */-->
							<table class="corners-top-2 shadow-up" cellpading="0" cellspacing="0" style="height:18px; vertical-align:top; width:100%;"><tr>
								<td style="vertical-align:bottom; width:auto;">
									<div id="replace-attack|advanced-challenge" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-attack|attacker|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-attack|attacker|level" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										</div>
										<div id="replace-attack|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										<div class="font-R" id="replace-attack|defender|skill" data="hide-on-blank" style="float:left; font-size:11px; padding-left:5px; width:auto;">vs.</div>
										<div id="replace-attack|defender|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-attack|defender|level" data="normal" style="float:left; font-size:11px; width:auto;"></div>
										</div>
										<div id="replace-attack|defender|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
									<div id="replace-attack|enchantment" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-attack|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
									<div id="replace-attack|challenge" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-attack|attacker|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-attack|attacker|level" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										</div>
										<div id="replace-attack|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										<div class="font-R" id="replace-attack|defender|skill" data="hide-on-blank" style="float:left; font-size:11px; padding-left:5px; width:auto;">vs.</div>
										<div id="replace-attack|defender|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-attack|defender|level" data="normal" style="float:left; font-size:11px; width:auto;"></div>
										</div>
										<div id="replace-attack|defender|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
								</td>
								<td style="vertical-align:top; width:128px;">
									<!--/* Attack - Cost */-->
									<div id="replace-attack|cost" data="hide-on-zero" style="float:right; width:49px;">
										<div class="font-G" style="float:right; font-size:10px; margin-left:3px; padding-top:1px; width:46px;">
										Energy</div>
									</div>
									<div id="replace-attack|cost" data="hide-on-zero" class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="float:right; height:15px; margin-top:1px; width:76px;">
										<div style="height:13px; width:100%;"><div id="replace-attack|cost" data="purple-bar" style="float:left; padding-left:3px; width:auto;"></div></div>
									</div>
								</td>
							</tr></table>

							<div style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<!--/* Attack - Damage-Dealing */-->
									<div style="height:auto; padding-top:2px; vertical-align:top; width:100%;">

										<!--/* Attack - Information */-->
										<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr>
											<td style="vertical-align:top; width:auto;">
												<!--/* Attack - Challenge */-->
												<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 attack-hover-show-challenge-BC" id="replace-attack|enchantment" data="show-or-hide-reverse" style="height:15px; margin-left:3px; width:76px;">
													<!--/* Attack - Attacker Skill */-->
													<div style="height:11px; width:100%;"><div id="replace-attack|attacker|skill" data="blue-bar-skill" style="float:left; padding-left:3px; width:auto;"></div></div>
												</div>
											</td>
											<td style="vertical-align:top; width:128px;">
												<!--/* Attack - Recover */-->
												<div id="replace-attack|re-use" data="hide-on-zero" style="float:right; width:50px;">
													<div class="font-G" style="float:right; font-size:10px; margin-left:3px; padding-top:1px; width:46px;">Recover</div>
												</div>
												<div id="replace-attack|re-use" data="hide-on-zero" class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="float:right; height:15px; margin-top:1px; width:76px;">
													<div style="height:13px; width:100%;"><div id="replace-attack|re-use" data="grey-bar" style="float:left; padding-left:3px; width:auto;"></div></div>
												</div>
											</td>
										</tr></table>

										<!--/* Container */-->
										<table cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
											<td style="vertical-align:top; width:60px;">

												<img class="border-all-R-1 color-Y-2 corners-bottom-2 corners-top-2" id="replace-attack|images|left-hand" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="height:52px; margin-left:5px; width:52px;" />
												<img class="border-all-R-1 color-Y-2 corners-bottom-2 corners-top-2" id="replace-attack|images|right-hand" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="float:left; height:27px; margin-left:5px; width:27px;" />

											</td>
											<td style="vertical-align:top; width:auto;">

										<!--/* Attack - Effect */-->
										<table cellpadding="0" cellspacing="0" id="replace-attack|advanced-challenge" data="show-or-hide" style="height:28px; width:100%;"><tr>
											<td style="padding-left:2px; width:76px;">
												<!--/* Attack - Advanced Challenge */-->
												<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 attack-hover-show-effect-BC" style="height:25px; width:100%;">
													<!--/* Attack - Effect Chances */-->
													<div id="replace-attack|effect|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
													<!--/* Attack - Effect Boost */-->
													<div id="replace-attack|effect|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
												</div>
											</td>
											<!--/* Attack - Effect Name / Duration */-->
											<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
												<div class="font-Y attack-hover-show-effect" id="replace-attack|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
												<div id="replace-attack|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
												<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
												<div id="replace-attack|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
											</td>
										</tr></table>

										<!--/* Attack - Effect (Challenge) */-->
										<table id="replace-attack|advanced-challenge" data="show-or-hide-reverse" cellpadding="0" cellspacing="0" style="height:84px; width:100%;"><tr>
											<td style="height:25px; padding-left:2px; vertical-align:top; width:76px;"></td>
											<!--/* Attack - Effect Name / Duration */-->
											<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
												<div class="font-Y attack-hover-show-effect" id="replace-attack|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
												<div id="replace-attack|effect|duration" data="hide-on-zero" style="float:left;">
													<div id="replace-attack|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
													<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
													<div id="replace-attack|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
												</div>
											</td>
										</tr></table>

										<!--/* Attack - Critical */-->
										<table cellpadding="0" cellspacing="0" id="replace-attack|advanced-challenge" data="show-or-hide" style="height:28px; width:100%;"><tr>
											<td style="padding-left:2px; width:76px;">
												<!--/* Attack - Advanced Challenge */-->
												<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 attack-hover-show-critical-BC" style="height:25px; width:100%;">
													<!--/* Attack - Critical Chances */-->
													<div id="replace-attack|critical|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
													<!--/* Attack - Critical Boost */-->
													<div id="replace-attack|critical|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
												</div>
											</td>
											<!--/* Attack - Critical Name / Duration */-->
											<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
												<div class="font-Y attack-hover-show-critical" id="replace-attack|critical|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
												<div id="replace-attack|critical|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
												<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
												<div id="replace-attack|critical|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
											</td>
										</tr></table>

										<!--/* Attack - Damage */-->
										<table id="replace-attack|deal-damage" data="show-or-hide" cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
											<td style="padding-left:2px; width:76px;">
												<!--/* Attack - Advanced Challenge */-->
												<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 attack-hover-show-damage-BC" id="replace-attack|advanced-challenge" data="show-or-hide" style="height:25px; width:100%;">
													<!--/* Attack - Damage Chances */-->
													<div id="replace-attack|damage|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
													<!--/* Attack - Damage Boost */-->
													<div id="replace-attack|damage|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
												</div>
											</td>
											<!--/* Attack - Damage */-->
											<td class="font-R" style="font-size:12px; padding-left:6px; width:auto;">Wound</td>
										</tr></table>

											</td>
										</tr></table>

									</div>

								</div>
							</div>
						</div>

						</div>

						<!--/* M a g i c */-->
						<div class="border-all-I-1-35 corners-bottom-2 corners-top-2" style="height:162px; margin-top:12px; padding-bottom:1px; padding-left:1px; padding-right:1px; width:100%;">

							<div class="corners-bottom-2 shadow-down" style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<div class="font-I" style="font-size:11px; height:13px; padding-left:3px; width:100%;">Magic</div>
								</div>

								<div id="replace-can-magic" data="show-or-hide" style="display:table-cell; vertical-align:top; width:100%;">
									<!--/* Magic - Area Of Effect */-->
									<div class="font-gold" id="replace-magic|area" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Area</div>
									<!--/* Magic - No Target */-->
									<div class="font-gold" id="replace-magic|area" data="show-or-hide-reverse" style="display:none; float:right; width:auto;"><div class="font-gold" id="replace-magic|has-target" data="show-or-hide-reverse" style="display:none; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Free-Form</div></div>
									<!--/* Magic - Targeted */-->
									<div class="font-gold" id="replace-magic|has-target" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; padding-right:6px; width:auto;">Target</div>
									<!--/* Magic - Instant */-->
									<div class="font-gold" id="replace-magic|instant" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Instant,</div>
									<!--/* Magic - Sneaking */-->
									<div class="font-gold" id="replace-magic|sneaking" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Sneaking,</div>
									<!--/* Magic - Projectile */-->
									<div class="font-gold" id="replace-magic|projectile" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Projectile,</div>
									<!--/* Magic - Hostile */-->
									<div class="font-gold" id="replace-magic|hostile" data="show-or-hide-reverse" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Friendly,</div>
									<!--/* Magic - Hostile */-->
									<div class="font-gold" id="replace-magic|hostile" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Hostile,</div>
									<!--/* Magic - Blessed */-->
									<div class="font-gold" id="replace-magic|blessed" data="show-or-hide" style="display:none; float:right; font-size:10px; padding-left:6px; width:auto;">Blessed,</div>
									<!--/* Magic - Damage Type */-->
									<div class="font-gold" id="replace-magic|deal-damage" data="show-or-hide" style="display:none; float:right; font-size:10px; width:auto;"><div class="font-gold" id="replace-magic|damage|type" data="normal" style="float:left; padding-left:6px; width:auto;"></div>,</div>
								</div>

							</div>
							<div class="border-all-Z-1 color-Z-4 corners-bottom-2 corners-top-2" id="replace-can-magic" data="show-or-hide" style="background-image:url(http://dev.lapcat.org/lapcat/layout/tiled-images/18-18-103.png); background-repeat:repeat; height:148px; margin-left:4px; width:372px;  z-index:10;">

							<!--/* Name / Range */-->
							<div class="color-Z-4 corners-bottom-2 corners-top-2 shadow-down" style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<div class="font-bold" id="replace-abilities|magic" data="normal" style="float:left; font-size:15px; height:17px; padding-left:3px; width:100%;"></div>
								</div>
								<div class="font-gold" style="display:table-cell; height:14px; padding-right:3px; vertical-align:middle; max-width:147px;">
									<div id="replace-magic|range-end" data="hide-on-blank" style="float:right; font-size:10px;">
										<div id="replace-magic|range-end" data="normal" style="float:right; font-size:10px;"></div>
										<div class="font-I" style="float:right; font-size:10px;">&mdash;</div>
									</div>
									<div id="replace-magic|range-start" data="normal" style="float:right; font-size:10px;"></div>
								</div>
							</div>

							<!--/* Damage Type / Challenge / Recovery / Cost */-->
							<table class="corners-top-2 shadow-up" cellpading="0" cellspacing="0" style="height:18px; vertical-align:top; width:100%;"><tr>
								<td style="vertical-align:bottom; width:auto;">
									<div id="replace-magic|advanced-challenge" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-magic|attacker|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-magic|attacker|level" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										</div>
										<div id="replace-magic|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										<div class="font-R" id="replace-magic|defender|skill" data="hide-on-blank" style="float:left; font-size:11px; padding-left:5px; width:auto;">vs.</div>
										<div id="replace-magic|defender|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-magic|defender|level" data="normal" style="float:left; font-size:11px; width:auto;"></div>
										</div>
										<div id="replace-magic|defender|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
									<div id="replace-magic|enchantment" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-magic|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
									<div id="replace-magic|challenge" data="show-or-hide" style="display:table; width:auto;">
										<div id="replace-magic|attacker|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-magic|attacker|level" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										</div>
										<div id="replace-magic|attacker|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
										<div class="font-R" id="replace-magic|defender|skill" data="hide-on-blank" style="float:left; font-size:11px; padding-left:5px; width:auto;">vs.</div>
										<div id="replace-magic|defender|level" data="hide-on-blank" style="display:table; float:left; width:auto;">
											<div id="replace-magic|defender|level" data="normal" style="float:left; font-size:11px; width:auto;"></div>
										</div>
										<div id="replace-magic|defender|skill" data="normal" style="float:left; font-size:11px; padding-left:5px; width:auto;"></div>
									</div>
								</td>
								<td style="vertical-align:top; width:128px;">
									<!--/* Magic - Cost */-->
									<div id="replace-magic|cost" data="hide-on-zero" style="float:right; width:49px;">
										<div class="font-G" style="float:right; font-size:10px; margin-left:3px; padding-top:1px; width:46px;">
										Mana</div>
									</div>
									<div id="replace-magic|cost" data="hide-on-zero" class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="float:right; height:15px; margin-top:1px; width:76px;">
										<div style="height:13px; width:100%;"><div id="replace-magic|cost" data="purple-bar" style="float:left; padding-left:3px; width:auto;"></div></div>
									</div>
								</td>
							</tr></table>


							<div style="display:table; height:auto; vertical-align:top; width:100%;">
								<div style="display:table-cell; vertical-align:top; width:auto;">
									<!--/* Magic - Damage-Dealing */-->
									<div style="height:auto; padding-top:2px; width:100%;">

										<!--/* Magic - Information */-->
										<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;"><tr>
											<td style="vertical-align:top; width:auto;">
												<!--/* Magic - Challenge */-->
												<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 magic-hover-show-challenge-BC" id="replace-magic|enchantment" data="show-or-hide-reverse" style="height:15px; margin-left:3px; width:76px;">
													<!--/* Magic - Attacker Skill */-->
													<div style="height:11px; width:100%;"><div id="replace-magic|attacker|skill" data="blue-bar-skill" style="float:left; padding-left:3px; width:auto;"></div></div>
												</div>
											</td>
											<td style="vertical-align:top; width:128px;">
												<!--/* Magic - Recover */-->
												<div id="replace-magic|re-use" data="hide-on-zero" style="float:right; width:50px;">
													<div class="font-G" style="float:right; font-size:10px; margin-left:3px; padding-top:1px; width:46px;">Recover</div>
												</div>
												<div id="replace-magic|re-use" data="hide-on-zero" class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2" style="float:right; height:15px; margin-top:1px; width:76px;">
													<div style="height:13px; width:100%;"><div id="replace-magic|re-use" data="grey-bar" style="float:left; padding-left:3px; width:auto;"></div></div>
												</div>
											</td>
										</tr></table>

										<!--/* Container */-->
										<table cellpadding="0" cellspacing="0" style="height:28px; width:100%;"><tr>
											<td style="vertical-align:top; width:60px;">

												<img class="border-all-Z-1 color-Y-2 corners-bottom-2 corners-top-2" id="replace-magic|image" data="set-image" src="/lapcat/online/item-images/empty_icon.png" style="height:52px; margin-left:5px; width:52px;" />

											</td>
											<td style="vertical-align:top; width:auto;">

												<!--/* Magic - Effect (Advanced Challenge) */-->
												<table id="replace-magic|advanced-challenge" data="show-or-hide" cellpadding="0" cellspacing="0" style="display:none; height:28px; width:100%;"><tr>
													<td style="padding-left:2px; width:76px;">
														<!--/* Magic - Advanced Challenge */-->
														<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 magic-hover-show-effect-BC" id="replace-magic|advanced-challenge" data="show-or-hide" style="height:25px; width:100%;">
															<!--/* Magic - Effect Chances */-->
															<div id="replace-magic|effect|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
															<!--/* Magic - Effect Boost */-->
															<div id="replace-magic|effect|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
														</div>
													</td>
													<!--/* Magic - Effect Name / Duration */-->
													<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
														<div class="font-Y magic-hover-show-effect" id="replace-magic|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
														<div id="replace-magic|effect|duration" data="hide-on-zero" style="float:left;">
															<div id="replace-magic|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
															<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
															<div id="replace-magic|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
														</div>
													</td>
												</tr></table>

												<!--/* Magic - Effect (Challenge) */-->
												<table id="replace-magic|advanced-challenge" data="show-or-hide-reverse" cellpadding="0" cellspacing="0" style="display:none; height:84px; width:100%;"><tr>
													<td style="height:25px; padding-left:2px; vertical-align:top; width:76px;"></td>
													<!--/* Magic - Effect Name / Duration */-->
													<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
														<div class="font-Y magic-hover-show-effect" id="replace-magic|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
														<div id="replace-magic|effect|duration" data="hide-on-zero" style="float:left;">
															<div id="replace-magic|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
															<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
															<div id="replace-magic|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
														</div>
													</td>
												</tr></table>

												<!--/* Magic - Critical (Advanced Challenge) */-->
												<table id="replace-magic|advanced-challenge" data="show-or-hide" cellpadding="0" cellspacing="0" style="display:none; height:28px; width:100%;"><tr>
													<td style="padding-left:2px; width:76px;">
														<!--/* Magic - Advanced Challenge */-->
														<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 magic-hover-show-critical-BC" id="replace-magic|advanced-challenge" data="show-or-hide" style="height:25px; width:100%;">
															<!--/* Magic - Critical Chances */-->
															<div id="replace-magic|critical|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
															<!--/* Magic - Critical Boost */-->
															<div id="replace-magic|critical|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
														</div>
													</td>
													<!--/* Magic - Effect Name / Duration */-->
													<td class="font-S" style="font-size:10px; padding-top:6px; vertical-align:top; width:auto;">
														<div class="font-Y magic-hover-show-effect" id="replace-magic|effect|name" data="normal" style="float:left; font-size:12px; padding-left:6px;"></div>
														<div id="replace-magic|effect|duration" data="hide-on-zero" style="float:left;">
															<div id="replace-magic|effect|duration" data="normal" style="float:left; padding-left:6px; padding-top:2px;"></div>
															<div style="float:left; padding-left:2px; padding-top:2px;">Turn</div>
															<div id="replace-magic|effect|duration" data="hide-on-one" style="float:left; padding-top:2px;">s</div>
														</div>
													</td>
												</tr></table>

												<!--/* Magic - Damage */-->
												<table id="replace-magic|deal-damage" data="show-or-hide" cellpadding="0" cellspacing="0" style="display:none; height:28px; width:100%;"><tr>
													<td style="padding-left:2px; width:76px;">
														<!--/* Magic - Advanced Challenge */-->
														<div class="border-all-I-1-35 color-Y-2 corners-bottom-2 corners-top-2 magic-hover-show-damage-BC" id="replace-magic|advanced-challenge" data="show-or-hide" style="height:25px; width:100%;">
															<!--/* Magic - Damage Chances */-->
															<div id="replace-magic|damage|chances" data="yellow-bar" style="float:left; padding-left:3px; width:auto;"></div>
															<!--/* Magic - Damage Boost */-->
															<div id="replace-magic|damage|boost" data="green-bar" style="float:left; padding-left:3px; width:auto;"></div>
														</div>
													</td>
													<!--/* Magic - Damage */-->
													<td class="font-R" style="font-size:12px; padding-left:6px; width:auto;">Wound</td>
												</tr></table>

													</td>
												</tr></table>

											</div>

										</div>
									</div>
								</div>

						</div>
	

					</td>
					<td rowspan="2" style="vertical-align:top; width:auto;"></td>
				</tr>
				<tr>
					<td colspan="2" style="vertical-align:top; width:296px;">

						<div style="display:none;">
							<div id="CS-weights-group" style="padding:1px;">
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div style="display:table-cell; width:10px;"></div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">close</div>
									<div id="clicked-line-1-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-2-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">short</div>
									<div id="clicked-line-2-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-3-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">long</div>
									<div id="clicked-line-3-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-4-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">distant</div>
									<div style="display:table-cell; width:10px;"></div>
								</div>
							</div>
							<div id="CS-weights-range" style="padding:1px;">
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div style="display:table-cell; width:10px;"></div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">close</div>
									<div id="clicked-line-1-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-2-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">short</div>
									<div id="clicked-line-2-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-3-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">long</div>
									<div id="clicked-line-3-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-4-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">distant</div>
									<div style="display:table-cell; width:10px;"></div>
								</div>
							</div>

							<div id="CS-weights-perform" style="padding:1px;">
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div style="display:table-cell; width:10px;"></div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">action</div>
									<div id="clicked-line-1-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-2-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">magic</div>
									<div id="clicked-line-2-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-3-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">attack</div>
									<div id="clicked-line-3-down" style="display:table-cell; font-size:11px; text-align:center; width:10px;">-</div>
								</div>
								<div class="button-X" style="display:table; height:17px; width:100%;">
									<div id="clicked-line-4-up" style="display:table-cell; font-size:11px; text-align:center; width:10px;">+</div>
									<div style="display:table-cell; font-size:11px; text-align:center; width:auto;">use item</div>
									<div style="display:table-cell; width:10px;"></div>
								</div>
							</div>

							<!--/* Training */-->
							<div id="CS-weights-training" style="padding:1px;">
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:38px;">Basic</div>
									<div id="replace-training|basic" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:38px;">Minor</div>
									<div id="replace-training|minor" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:38px;">Major</div>
									<div id="replace-training|major" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:38px;">Special</div>
									<div id="replace-training|specialization" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
							</div>

							<!--/* Equipment */-->
							<div id="CS-weights-equipment" style="padding:1px;">
								<div class="color-Y-1 corners-top-2 font-gold font-italic" style="font-size:12px; width:100%;">Offensive</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Left</div>
									<div id="replace-items|left-hand" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1 corners-bottom-2" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Right</div>
									<div id="replace-items|right-hand" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1 corners-top-2 font-gold font-italic" style="font-size:12px; margin-top:2px; width:100%;">Defensive</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Head</div>
									<div id="replace-items|head" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Torso</div>
									<div id="replace-items|torso" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Hands</div>
									<div id="replace-items|hands" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Legs</div>
									<div id="replace-items|legs" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1 corners-bottom-2" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Feet</div>
									<div id="replace-items|feet" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1 corners-top-2 font-gold font-italic" style="font-size:12px; margin-top:2px; width:100%;">Accessory</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Face</div>
									<div id="replace-items|face" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Neck</div>
									<div id="replace-items|neck" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Finger</div>
									<div id="replace-items|fingers" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
								<div class="color-Y-1" style="display:table; height:17px; width:100%;">
									<div class="font-I" style="display:table-cell; font-size:10px; padding-right:3px; text-align:right; width:33px;">Waist</div>
									<div id="replace-items|waist" data="normal-blank" style="display:table-cell; font-size:11px; width:auto;"></div>
								</div>
							</div>

						</div>

					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>

<div id="new-recruits-master" class="corners-bottom-3 shadow-down" style="display:none; background-position:0px -1px; height:18px; padding-top:6px; width:100%;">
	<div style="display:table; height:17px; width:100%;">
		<div style="display:table-cell; font-size:11px; text-align:right; vertical-align:top; width:38px;">Member 1 Test</div>
		<div id="replace-member-ID" data="normal" style="display:table-cell; padding-left:6px; width:auto;"></div>
	</div>
</div>