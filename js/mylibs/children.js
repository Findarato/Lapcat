//loadFlicker("62092835@N08");
$("#cntDwn")
	.countdown(
		{
			"until": new Date(2012,05,04),  
			"format":'yODHMS',
			"layout": "<div class='countDownContainer'><div class='countDownDays'>{dn} {dl}</div><div class='countDownHours'>{hn} {hl}</div><div class='countDownMinutes'>{mn} {ml}</div><div class='countDownSeconds'>{sn} {sl}</div></div>"
		}
	);
	
$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
  {
	id: '62092835@N08',
    format: "json",
    tags:"children"
  },
  function(data) {
  	$.each(data.items, function(i,item){
      $("<div/>",{"class":"flickrPicture",css:{"display":"inline-block","position":"relative"}})
      	.html(
      		$("<div/>",{
      		"class":"flickrPictureOutline roundAll4",
      	})
      			.html(
      				$("<a/>",{"html":"&nbsp;"})
      					.css({"background-image":"url("+item.media.m+")"})
      					.attr({"href":item.link,"title":item.title})	
      			)
      			.append(
      				$("<div/>",{"html":item.title,"css":{"position":"relative","top":"106px","left":"3px","width":"96%","color":"#000","margin-left:":"2%","vertical-align":"middle"}})		
      			)
      	)
      	.appendTo("#flickerPictureBox");
    });
  });




window.f = new flux.slider('#topBooksTeenContainer', {
					autoplay: true,
					pagination: true,
					captions:false,
					height:400,
					width:295,
					transitions:["dissolve","blocks","swipe","blocks2"]
				});		

