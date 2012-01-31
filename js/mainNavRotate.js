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
$.each(mainNavagationRotate.data,function(i,item){
	var tplClone = templ.clone();
	
	middleSection
		.append(
			$("<a/>",{"class":"middleSection smoothAnimate"}).css({"background-image":"url("+item.image+")","padding":0}).attr({"href":item.link,"title":item.title})
		)
	container
		.append(
			tplClone
				.attr("data-move",totalLinks*-260)
				.click(function(){
					newTop = $(this).attr("data-move");
					middleSection
						.css({"top":newTop+"px"})
				})
		);
		totalLinks ++;
});


$("#middleScrollContainer :first-child").trigger("click");

