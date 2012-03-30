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
$(window).load(function(){
	wowbraryImageLinks("http://www.wowbrary.org/rss.aspx?l=8711&c=TEE",$("#topBooks").find(".slides"),true,"Newest Teen Books",10); 
});