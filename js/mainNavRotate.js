/*
 * This will contain the rotating information for the main navagation middle area
 * 
 */

newWidth = $(".mediumSection").width();
$(window).load(function(){
	$('.flexslider').flexslider({
		controlNav: true,
		directionNav: false,
		controlsContainer: ".flexControll",
		slideshowSpeed: 7000
	});
});
