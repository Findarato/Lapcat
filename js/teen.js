//loadFlicker("62092835@N08");
$("#cntDwn")
	.countdown(
		{
			"until": new Date(2012,3,23), 
			"format":'yODHMS',
			"layout": "<div class='countDownDays'>{dn} {dl}</div><div class='countDownHours'>{hn} {hl}</div><div class='countDownMinutes'>{mn} {ml}</div><div class='countDownSeconds'>{sn} {sl}</div>"
		}
	);
	
$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
  {
	id: '62092835@N08',
    format: "json"
  },
  function(data) {
  	$.each(data.items, function(i,item){
      $("<a/>").css({"background-image":"url("+item.media.m+")"}).attr("href", item.link).appendTo("#flickerPictureBox");
      if ( i == 14 ) return false;
    });
  });
