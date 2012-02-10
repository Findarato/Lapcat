function loadFlicker( queryString ){
	
	$('#flickerPictureBox').jflickrfeed({
		limit: 30,
		qstrings: {
			id: queryString
		},
		itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	});
/*
	$('#flickerScrollBox').jflickrfeed({
		limit: 15,
		qstrings: {
			id: queryString
		},
		itemTemplate: '<li><a href="{{image_b}}"><img src="{{image}}" alt="{{title}}" /></a><div class="flickrImageTitle">{{title}}</div></li>'
	}, function(data) {
		$('#flickerScrollBox div').hide();
		$('#flickerScrollBox').cycle({
			timeout: 5000
		});
		$('#flickerScrollBox li').hover(function(){
			$(this).children('div').show();
		},function(){
			$(this).children('div').hide();
		});
	});
	/*
	$('#nocallback').jflickrfeed({
		limit: 4,
		qstrings: {
			id: queryString
		},
		useTemplate: false,
		itemCallback: function(item){
			$(this).append("<li><img src='" + item.image_m + "' alt=''/></li>");
		}
	});
*/
}


loadFlicker("62092835@N08"); 