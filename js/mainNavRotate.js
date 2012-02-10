/*
 * This will contain the rotating information for the main navagation middle area
 * 
 */

var mainNavagationRotate = {
	"config":{"time":30},
	"data":[
		{"image":"http://dev.lapcat.org/images/tree.png","link":"http://google.com","title":"this is the title of the link"},
		{"image":"http://laportelibrary.org/images/geek/week2.png","link":"http://google.com","title":"this is the title of the link"},
		{"image":"http://laportelibrary.org/images/geek/week03.png","link":"http://google.com","title":"this is the title of the link"},
		{"image":"http://laportelibrary.org/images/geek/week04.png","link":"http://catalog.lapcat.org","title":"this is the title of the link 2"}
	]
};
var templ = $("<div/>",{"data-link":"","class":"middleSectionScroll"})
var link = $("#middleSectionLink");
var middleSection = $("#middleSectionScrollContainer");
var container = $("#middleScrollContainer");
var totalLinks = 0;
var currentLink = 0;
var sto = 0;
var navloop = 0;
$.each(mainNavagationRotate.data,function(i,item){
	var tplClone = templ.clone();
	
	middleSection
		.append(
			$("<a/>",{"class":"middleSection smoothAnimate"}).css({"background-image":"url("+item.image+")","padding":0}).attr({"href":item.link,"title":item.title})
		)
	container
		.append(
			tplClone
				.attr({"data-move":totalLinks*-260,"title":item.title})
				.click(function(){
					newTop = $(this).attr("data-move");
					middleSection
						.css({"top":newTop+"px"})
					window.clearInterval(navLoop);
					navLoop = window.setInterval(function(){runNavLoop()},10000 );
				})
		);
		totalLinks ++;
});


$("#middleScrollContainer div :first-child ").trigger("click");

//alert(totalLinks * -260)
function runNavLoop(){
	var oldTop = $("#middleSectionScrollContainer").position();
	oldTop = oldTop.top;
	var newTop = oldTop -260;
	var startOverTop = totalLinks * -260;
	if(newTop == startOverTop){
		newTop = 0;
	}
	$("#middleSectionScrollContainer").css("top",newTop);
}
navLoop = window.setInterval(function(){runNavLoop()},10000 );


