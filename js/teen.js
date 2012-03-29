//loadFlicker("62092835@N08");
$("#cntDwn")
	.countdown(
		{
			"until": new Date(2012,05,04),  
			"format":'yODHMS',
			"layout": "<div class='countDownContainer'><div class='countDownDays'>{dn} {dl}</div><div class='countDownHours'>{hn} {hl}</div><div class='countDownMinutes'>{mn} {ml}</div><div class='countDownSeconds'>{sn} {sl}</div></div>"
		}
	);
	
	displayFlickr("teens",'62092835@N08');
	



/*
window.f = new flux.slider('#topBooksTeenContainer', {
					autoplay: true,
					pagination: true,
					captions:false,
					height:400,
					width:295,
					transitions:["dissolve","blocks","swipe","blocks2"]
				});		

*/