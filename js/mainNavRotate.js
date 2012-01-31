/*
 * This will contain the rotating information for the main navagation middle area
 * 
 */

var mainNavagationRotate = {
	"config":{"time":30},
	"data":[
		{"image":"http://laportelibrary.org/images/geek/week1.png","link":"http://google.com","title":"this is the title of the link"},
		{"image":"http://laportelibrary.org/images/geek/week2.png","link":"http://google.com","title":"this is the title of the link"},
		{"image":"http://laportelibrary.org/images/geek/week03.png","link":"http://google.com","title":"this is the title of the link"},
		{"image":"http://laportelibrary.org/images/geek/week04.png","link":"http://catalog.lapcat.org","title":"this is the title of the link 2"}
	]
};

var templ = $("<div/>",{"data-link":"","class":"middleSectionScroll"})

var link = $("#middleSectionLink");
var container = $("#middleScrollContainer")

$.each(mainNavagationRotate.data,function(i,item){
	var tplClone = templ.clone();
	container
		.append(
			tplClone
				.attr({"data-link":item.link,"data-image":item.image,"title":item.title})
				.click(function(){
					link.css({"background-image":"url("+item.image+")"}).attr({"href":item.link,"title":item.title})
				})
		);
});


$("#middleScrollContainer :first-child").trigger("click");
