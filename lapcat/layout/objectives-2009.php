<!--//                 //-->
<!--// objectives-2009.php //-->
<!--//                 //-->
<!--// FIXED //-->
<div id="fixed|objectives" style="width:100%;">

	<!--// CONTAINER //-->
	<div class="image-background" id="container|objectives" style="height:auto; width:auto;">

		<!--// HEADER - Top //-->
		<div class="color-off" id="header-top|objectives" style="height:20px;">
			<div id="main-menu|objectives" style="height:20px; vertical-align:top; width:100%;">
				<div style="float:left; width:90px;"><font style="font-weight:bold; font-size:14px; margin-left:6px;">Objectives</font></div>
				<div style="float:left;"><font id="objective-tab"><?=$V_OT;?></font></div>
<?
if($V_LI){
echo '
				<div style="float:right; margin-right:15px;"><a class="white" href="javascript:Fu_MR(\'/lapcat/code/objectives.php?url=work/ajax\');" onfocus="javascript:this.blur();" onclick="javascript:F_MEHTML(\'objective-tab\',this.innerHTML);">Work</a></div>
				<div style="float:right; margin-right:15px;"><a class="white" href="javascript:Fu_MR(\'/lapcat/code/objectives.php?url=general/ajax\');" onfocus="javascript:this.blur();" onclick="javascript:F_MEHTML(\'objective-tab\',this.innerHTML);">General</a></div>
				<div style="float:right; margin-right:15px;"><a class="white" href="javascript:Fu_MR(\'/lapcat/code/objectives.php?url=start/ajax\');" onfocus="javascript:this.blur();" onclick="javascript:F_MEHTML(\'objective-tab\',this.innerHTML);">'.$V_AN.'</a></div>
';}
?>
			</div>
		</div>

		<!--// CENTER - Display //-->
		<div class="border-main-1 display-lines" id="D|objectives">
			<div class="color-heavy" id="container-main|objectives" style="height:544px; width:100%;"></div>
		</div>
	</div>

</div>
<div id="tinymce" style="display:none; visibility:hidden; margin-top:300px;"><textarea class="dropdown" name="objective-data-replace-part-ID" id="objective-data-replace-part-ID"></textarea></div>