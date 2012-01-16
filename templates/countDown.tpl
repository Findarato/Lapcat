<link rel="stylesheet" href="css/fonts/hungergames/stylesheet.css">
<style>
.countDownBox{
	height:150px;
	width:310px;
	background-image:url("/images/the-hunger-games-book-cover2.jpg");
	background-size:100% 100%;
}
.countDownDays,.countDownHours,.countDownMinutes,.countDownSeconds{
	margin-left:60%;
	padding:3px;
	color:#FFF;
	white-space:nowrap;
	font-family: 'Hunger Games' , arial, serif; 
	font-size:16px;
	font-weight:100;
}
.countDownDays{
	padding-top:10px;
}
</style>
<script defer src="js/countdown.js"></script>
<script language="JavaScript">
TargetDate = "03/23/2012 1:52 AM";
BackColor = "palegreen";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
FinishMessage = "It is finally here!";
DisplayFormat = "<div class='countDownBox insideBoxShadow roundAll3'><div class='countDownDays'>%%D%% Days</div><div class='countDownHours'>%%H%% Hours</div><div class='countDownMinutes'>%%M%% Minutes</div><div class='countDownSeconds'>%%S%% Seconds</div><div>";
</script>

<div class="thirtyPercent roundAll3" id="cntdwn"></div>