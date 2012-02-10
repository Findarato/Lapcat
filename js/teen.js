//loadFlicker("62092835@N08");
$("#cntDwn")
	.countdown(
		{
			"until": new Date(2012,3,23), 
			"format":'yODHMS',
			"layout": "<div class='countDownDays'>{dn} {dl}</div><div class='countDownHours'>{hn} {hl}</div><div class='countDownMinutes'>{mn} {ml}</div><div class='countDownSeconds'>{sn} {sl}</div>"
		}
	);
	
