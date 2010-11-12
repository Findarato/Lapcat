<div id="character-information-screen-template" style="display:none; height:100%; position:absolute; z-index:55;">
	<div class="border-right-F-1 color-F-3 corners-right-3 image-lines" style="float:left; height:100%; vertical-align:top; width:5px;">
		<img src="http://cdn1.lapcat.org/fugue/icons/arrow.png" style="height:16px; position:relative; left:-8px; top:69px; width:16px; z-index:60;" />
	</div>
	<div style="float:left; height:100%; text-align:center; vertical-align:top; width:96px;">
		<font class="font-I font-italic" style="font-size:11px;">Options</font>
		<div class="button-green add-character-click" id="add-character-to-team" style="display:none; float:left; margin-left:2px; margin-top:4px; text-align:center; width:90px;">Add</div>
		<div class="button-red remove-character-click" id="remove-character-from-team" style="display:none; float:left; margin-left:2px; margin-top:4px; text-align:center; width:90px;">Remove</div>
	</div>
	<table cellpadding="0" cellspacing="0" style="float:left; width:236px;">
		<tr><td style="height:18px; padding-top:4px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Left-Hand</div>
			<div class="font-G" id="replace-items|left-hand" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
		<tr><td style="height:18px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Right-Hand</div>
			<div class="font-G" id="replace-items|right-hand" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
		<tr><td style="height:18px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Head</div>
			<div class="font-G" id="replace-items|head" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
		<tr><td style="height:18px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Torso</div>
			<div class="font-G" id="replace-items|torso" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
		<tr><td style="height:18px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Hands</div>
			<div class="font-G" id="replace-items|hands" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
		<tr><td style="height:18px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Legs</div>
			<div class="font-G" id="replace-items|legs" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
		<tr><td style="height:18px; width:100%;">
			<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:4px; margin-top:3px; text-align:right; width:55px;">Feet</div>
			<div class="font-G" id="replace-items|feet" data="normal-none-on-blank" style="float:left; font-size:15px; height:18px; margin-left:2px; margin-top:1px;"></div>
		</td></tr>
	</table>
</div>
<div style="height:100%; width:100%; z-index:0;">
	<div class="color-Y-3 image-lines" id="black-screen" style="display:none; height:100%; left:0px; position:absolute; top:0px; width:100%; z-index:50;"></div>
	<div class="border-all-I-1-65 color-F-1 corners-bottom-3 corners-top-3 font-fake font-G" id="character-screen" style="display:none; position:absolute; z-index:55;"></div>
	<div class="border-all-I-1-65 color-K-1 corners-bottom-3 corners-top-3 font-fake font-G" id="character-information-screen" style="display:none; position:absolute; z-index:55;"></div>
	<div class="border-all-I-1-65 color-K-1 corners-bottom-3 corners-top-3 font-fake font-G" id="quest-sheet-template" style="display:none; height:123px; left:186px; position:absolute; top:6px; width:600px; z-index:5;">
		<table cellpadding="0" cellspacing="0" style="height:18px; left:0px; position:relative; top:0px; width:100%;">
			<tr>
				<td style="width:100%;">

					<div id="replace-type" data="choose" style="float:left; font-size:13px; height:16px; padding-left:4px; padding-top:2px; width:60px;">
						<img id="0" src="http://cdn1.lapcat.org/fugue/icons/crown-bronze.png" style="display:none; float:right; height:16px; width:16px;" />
						<div class="font-H" id="0" style="display:none; float:right; font-size:11px; margin-right:2px; margin-top:1px;">Special</div>
						<img id="1" src="http://cdn1.lapcat.org/fugue/icons/crown-silver.png" style="display:none; float:right; height:16px; width:16px;" />
						<div class="font-H" id="1" style="display:none; float:right; font-size:11px; margin-right:2px; margin-top:1px;">Town</div>
						<img id="2" src="http://cdn1.lapcat.org/fugue/icons/crown.png" style="display:none; float:right; height:16px; width:16px;" />
						<div class="font-gold" id="2" style="display:none; float:right; font-size:11px; margin-right:2px; margin-top:1px;">King</div>
					</div>

					<div class="font-G" id="replace-name" data="normal" style="float:left; font-size:15px; height:18px; margin-left:4px; margin-top:1px;"></div>

					<div class="border-left-J-1 border-bottom-J-1 color-F-3 corners-bottom-left-3 corners-top-right-2" id="replace-party-has-met-minimum" data="switch" style="display:none; float:right; font-size:13px; height:16px; padding-left:4px; padding-top:2px; width:90px;">
						<div class="font-Q" style="float:right; font-size:13px;">Ready</div>
						<img src="http://cdn1.lapcat.org/fugue/icons/status.png" style="float:right; height:16px; width:16px;" />
					</div>
					<div class="border-left-J-1 border-bottom-J-1 color-F-3 corners-bottom-left-3 corners-top-right-2" id="replace-party-has-met-minimum" data="switch-reverse" style="display:none; float:right; font-size:13px; height:16px; padding-bottom:2px; padding-left:4px; padding-top:2px; width:90px;">
						<img src="http://cdn1.lapcat.org/fugue/icons/status-offline.png" style="float:left; ; height:16px; width:16px;" />
						<div class="font-I" style="float:left; font-size:13px;">Not Ready</div>
					</div>

					<div style="float:right; width:206px;">
						<div class="font-I" style="float:left; font-size:11px; height:18px; margin-top:3px; width:52px;">Location</div>
						<div class="font-G" id="replace-location" data="normal" style="float:left; font-size:15px; height:18px; margin-top:1px; width:154px;"></div>
					</div>

				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="height:98px; float:left; left:2px; position:relative; top:2px; width:100px;">
			<tr>
				<td class="border-all-I-1-35 color-F-4 corners-bottom-3 corners-top-3 image-lines" style="vertical-align:top; width:100px;">
					<div class="font-I" style="font-size:13px; height:18px; width:100px;">Options</div>
					<div class="assemble-party-click button-blue-2 font-Y" id="replace-ID" data="storage" name="" style="font-size:15px; height:18px; margin-left:2px; margin-top:2px; padding-left:4px; width:90px;">Assign</div>
					<div class="send-party-click button-blue-2 font-Y" id="replace-ID" data="storage" name="" style="font-size:15px; height:18px; margin-left:2px; margin-top:2px; padding-left:4px; width:90px;">Send</div>
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="height:98px; float:left; left:2px; margin-left:4px; position:relative; top:2px; width:100px;">
			<tr>
				<td class="border-all-I-1-35 color-F-4 corners-bottom-3 corners-top-3 image-lines" style="padding-left:2px; vertical-align:top; width:98px;">
					<div class="font-I" style="font-size:13px; height:18px; width:100px;">Information</div>
					<div class="button-blue-2 examine-party-click font-Y" id="replace-ID" data="storage" name="" style="font-size:15px; height:18px; margin-left:2px; margin-top:2px; padding-left:4px; width:90px;">Party</div>
					<div class="button-blue-2 examine-wildlife-click font-Y" id="replace-ID" data="storage" name="" style="font-size:15px; height:18px; margin-left:2px; margin-top:2px; padding-left:4px; width:90px;">Wildlife</div>
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="height:98px; float:right; left:2px; margin-left:4px; position:relative; top:2px; width:126px;">
			<tr>
				<td style="padding-left:2px; padding-top:2px; width:124px;">
					<img id="replace-image" data="quest-image" style="height:90px; width:120px;" />
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="height:98px; float:right; left:2px; margin-left:4px; position:relative; top:2px; width:180px;">
			<tr>
				<td style="padding-left:2px; vertical-align:top; width:178px;">
					<div style="float:left; height:24px; width:178px;">
						<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:2px; margin-top:3px; width:55px;">Max. Time</div>
						<img src="http://cdn1.lapcat.org/fugue/icons/clock.png" style="float:left; height:16px; margin-top:2px; width:16px;" />
						<div class="font-G" id="replace-maximum-turns" data="calculate-time" style="float:left; font-size:11px; height:18px; margin-left:2px; margin-top:3px;"></div>
					</div>
					<div style="float:left; height:24px; width:178px;">
						<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:2px; margin-top:3px; width:55px;">Party Size</div>
						<img src="http://cdn1.lapcat.org/fugue/icons/user-silhouette.png" style="float:left; height:16px; margin-top:2px; width:16px;" />
						<div class="font-G" id="replace-minimum" data="normal-none-on-zero" style="float:left; font-size:11px; height:18px; margin-left:2px; margin-top:3px;"></div>
						<div id="replace-maximum" data="maximum-not-minimum" style="display:none;">
							<div class="font-I" style="float:left; font-size:11px; height:18px; margin-left:2px; margin-top:3px;">-</div>
							<div class="font-G" id="replace-maximum" data="normal-none-on-zero" style="float:left; font-size:11px; height:18px; margin-left:2px; margin-top:3px;"></div>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>