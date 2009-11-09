<!--//                 //-->
<!--// layout-2009.php //-->
<!--//                 //-->
<!--// FIXED //-->
<div id="fixed-online" style="width:100%;">

	<!--// CONTAINER //-->
	<div id="container-online" style="height:auto; width:auto;">

		<!--// HEADER - Top //-->
		<div id="header-online" style="height:28px; margin-bottom:4px;">
			<div id="main-menu-online" style="background-color:rgb(0,0,0); height:30px; vertical-align:top; width:100%;">
				<div style="float:left; width:auto;"><font style="font-family:Arial; color:rgb(255,255,255); font-size:18px; font-weight:bold; margin-left:6px;">Online Adventures</font></div>
				<div id="header-container-online" style="float:left; width:auto;"></div>
			</div>
		</div>

		<!--// CENTER - Display 0 //-->
		<div id="D|0">
			<div id="D|map" style="float:left; height:510px; width:256px;">
            	<div style="background-color:rgb(35,35,35); border:1px solid rgb(0,0,0); float:left; height:240px; padding:1px; width:18px;">
					<div style="background-color:rgb(135,135,135); border:1px solid rgb(0,0,0); height:118px; width:16px;">
						<div style="float:left; height:18px; margin-left:4px; width:10px;"><span class="white">D</span></div>
						<div id="D|D|1" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|D|2" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|D|3" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|D|4" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|D|5" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|D|6" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
					</div>
					<div style="background-color:rgb(135,135,135); border:1px solid rgb(0,0,0); height:118px; width:16px;">
						<div style="float:left; height:18px; margin-left:4px; width:10px;"><span class="white">T</span></div>
						<div id="D|T|1" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|T|2" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|T|3" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|T|4" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|T|5" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
						<div id="D|T|6" style="background-color:rgb(255,255,255); border:1px solid rgb(0,0,0); float:left; height:10px; margin:2px; width:10px;"></div>
					</div>
				</div>
            	<div style="background-color:rgb(135,135,135); border:3px solid rgb(0,0,0); float:left; height:238px; margin-left:2px; width:220px;">
					<div style="color:rgb(0,0,0); height:18px; margin-left:2px;"><span id="D|map|level" class="white"></span></div>
					<!--//<div style="color:rgb(0,0,0); height:18px; margin-left:2px;"><span class="white">Map</span></div>//-->
					<div id="D|map|layer" style="padding:2px; width:220px;"></div>
				</div>
				<div id="D|actions" style="background-color:rgb(135,135,135); border:3px solid rgb(0,0,0); float:left; height:72px; margin-top:2px; padding:2px; width:246px;"></div>
				<div id="D|map|movement-type" style="float:left; height:72px; margin-top:5px; padding:2px; width:44px;">

					<!--// Movement Type - Walk //-->
					<div class="navigation-button-type" onclick="javascript:F_SetMovement(3);" id="N|3" onfocus="javascript:this.blur();" style="display:none; float:right; margin:1px; text-align:center; width:40px;" title="Change your movement type to Walk."><span class="white">Walk</span></div>

					<!--// Movement Type - Run //-->
					<div class="navigation-button-type" onclick="javascript:F_SetMovement(4);" id="N|4" onfocus="javascript:this.blur();" style="display:none; float:right; margin:1px; text-align:center; width:40px;" title="Change your movement type to Run."><span class="white">Run</span></div>

					<!--// Movement Type - Sprint //-->
					<div class="navigation-button-type" onclick="javascript:F_SetMovement(5);" id="N|5" onfocus="javascript:this.blur();" style="display:none; float:right; margin:1px; text-align:center; width:40px;" title="Change your movement type to Sprint."><span class="white">Sprint</span></div>

				</div>
				<div id="D|map|movement" style="background-color:rgb(135,135,135); border:3px solid rgb(0,0,0); float:left; height:72px; margin-top:2px; padding:2px; width:78px;">
					<div style="height:24px; width:78px;">

						<!--// Navigation - Up //-->
						<div class="navigation-button-secondary" onclick="javascript:F_Move(1);" id="N|up" onfocus="javascript:this.blur();" style="float:left; margin:1px; text-align:center; width:22px;"><span class="white">U</span></div>

						<!--// Navigation - North //-->
						<div class="navigation-button-main" onclick="javascript:F_Move(2);" id="N|north" onfocus="javascript:this.blur();" style="float:left; margin:1px; text-align:center; width:22px;"><span class="bold white">N</span></div>

						<div style="float:left; width:26px;">&nbsp;</div>

					</div>
					<div style="height:24px; width:78px;">

						<!--// Navigation - West //-->
						<div class="navigation-button-main" onclick="javascript:F_Move(3);" id="N|west" onfocus="javascript:this.blur();" style="float:left; margin:1px; text-align:center; width:22px;"><span class="bold white">W</span></div>

						<div style="float:left; width:26px;">&nbsp;</div>

						<!--// Navigation - East //-->
						<div class="navigation-button-main" onclick="javascript:F_Move(4);" id="N|east" onfocus="javascript:this.blur();" style="float:left; margin:1px; text-align:center; width:22px;"><span class="bold white">E</span></div>

					</div>
					<div style="height:24px; width:78px;">

						<div style="float:left; width:26px;">&nbsp;</div>

						<!--// Navigation - South //-->
						<div class="navigation-button-main" onclick="javascript:F_Move(5);" id="N|south" onfocus="javascript:this.blur();" style="float:left; margin:1px; text-align:center; width:22px;"><span class="bold white">S</span></div>

						<!--// Navigation - Down //-->
						<div class="navigation-button-secondary" onclick="javascript:F_Move(6);" id="N|down" onfocus="javascript:this.blur();" style="float:left; margin:1px; text-align:center; width:22px;"><span class="white">D</span></div>

					</div>
				</div>
				<div id="D|player|health" style="float:left; height:78px; width:246px;">
					<div id="D|health" style="float:left; height:124px; padding:2px; width:246px;">
	    	        	<div style="background-color:rgb(35,35,35); border:1px solid rgb(0,0,0); float:left; height:20px; padding:1px; margin-right:3px; width:118px;">
							<div style="background-color:rgb(135,135,135); border:1px solid rgb(0,0,0); height:18px; width:116px;">
								<div style="float:left; height:18px; margin-left:4px; width:10px;"><span class="white">N</span></div>
								<div class="natural-health-free" id="D|N|1" style="margin-top:5px;"></div>
								<div class="natural-health-free" id="D|N|2" style="margin-top:5px;"></div>
								<div class="natural-health-free" id="D|N|3" style="margin-top:5px;"></div>
								<div class="natural-health-free" id="D|N|4" style="margin-top:5px;"></div>
								<div class="natural-health-free" id="D|N|5" style="margin-top:5px;"></div>
								<div class="natural-health-free" id="D|N|6" style="margin-top:5px;"></div>
							</div>
						</div>
	    	        	<div style="background-color:rgb(35,35,35); border:1px solid rgb(0,0,0); float:left; height:20px; padding:1px; margin-right:3px; margin-top:2px; width:118px;">
							<div style="background-color:rgb(135,135,135); border:1px solid rgb(0,0,0); height:18px; width:116px;">
								<div style="float:left; height:18px; margin-left:4px; width:10px;"><span class="white">P</span></div>
								<div class="physical-health-free" id="D|P|1" style="margin-top:5px;"></div>
								<div class="physical-health-free" id="D|P|2" style="margin-top:5px;"></div>
								<div class="physical-health-free" id="D|P|3" style="margin-top:5px;"></div>
								<div class="physical-health-free" id="D|P|4" style="margin-top:5px;"></div>
								<div class="physical-health-free" id="D|P|5" style="margin-top:5px;"></div>
								<div class="physical-health-free" id="D|P|6" style="margin-top:5px;"></div>
							</div>
						</div>
	    	        	<div style="background-color:rgb(35,35,35); border:1px solid rgb(0,0,0); float:left; height:20px; padding:1px; margin-right:3px; margin-top:2px; width:118px;">
							<div style="background-color:rgb(135,135,135); border:1px solid rgb(0,0,0); height:18px; width:116px;">
								<div style="float:left; height:18px; margin-left:4px; width:10px;"><span class="white">M</span></div>
								<div class="mental-health-free" id="D|M|1" style="margin-top:5px;"></div>
								<div class="mental-health-free" id="D|M|2" style="margin-top:5px;"></div>
								<div class="mental-health-free" id="D|M|3" style="margin-top:5px;"></div>
								<div class="mental-health-free" id="D|M|4" style="margin-top:5px;"></div>
								<div class="mental-health-free" id="D|M|5" style="margin-top:5px;"></div>
								<div class="mental-health-free" id="D|M|6" style="margin-top:5px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="display-container-online" style="background-color:rgb(255,255,255); float:left; height:510px; width:auto;">

				<!--// RIGHT - Display //-->
				<div id="display-container-right" style="background-color:rgb(255,255,255); float:right; height:510px; width:46px;">
					<div style="float:left; height:20px; width:246px;"><span class="black">Conditions - Location</span></div>
					<div id="D|conditions" style="background-color:rgb(135,135,135); border:3px solid rgb(0,0,0); float:left; height:72px; padding:2px; width:246px;"></div>
					<div style="float:left; height:20px; width:246px;"><span class="black">Conditions - Player</span></div>
					<div id="D|player-conditions" style="background-color:rgb(135,135,135); border:3px solid rgb(0,0,0); float:left; height:72px; margin-top:2px; padding:2px; width:246px;"></div>
				</div>

				<!--// Center - Display //-->
				<div id="display-container-center" style="background-color:rgb(255,255,255); float:right; width:492px;"></div>

			</div>
		</div>

		<!--// CENTER - Display //-->
		<div id="E|mow">
			<div id="display-messages-online" style="background-color:rgb(0,0,0); float:left; height:30px; width:100%;"></div>
		</div>

		<!--// CENTER - Display //-->
		<div id="F|mow">
			<div id="display-line-online" style="background-color:rgb(0,0,0); float:left; height:30px; width:100%;"></div>
		</div>

	</div>

</div>

<!--// STAGE - 0 (Location - Open) //-->
<div id="stage|0" style="display:none; visibility:hidden;">
	<div class="location-open" id="replace-Z|replace-Y|replace-X"></div>
</div>

<!--// STAGE - 1 (Location - Solid) //-->
<div id="stage|1" style="display:none; visibility:hidden;">
	<div class="location-solid" id="replace-Z|replace-Y|replace-X"></div>
</div>

<!--// STAGE - 2 (Condition - Base) //-->
<div id="stage|2" style="display:none; visibility:hidden;">
	<div class="condition-base" id="condition-replace-ID" title="replace-description" style="float:left; margin:1px;"><span class="white">replace-name</span></div>
</div>

<!--// STAGE - 3 (Action - Base) //-->
<div id="stage|3" style="display:none; visibility:hidden;">
	<div class="action-base" id="action-replace-ID" onclick="javasccript:F_PerformAction(replace-ID,'replace-name');" style="float:left; margin:1px;"><span class="white">replace-name</span></div>
</div>