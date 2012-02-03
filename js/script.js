/* Author: 

*/
// Just because I know people are going to ask for it
var weekday=new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";

var locations={
      "MA":{
         "ID":1,
         "name":"Main Library",
         "time0":"Closed",
         "time1":"9:00 AM - 8:00 PM",
         "time2":"9:00 AM - 8:00 PM",
         "time3":"9:00 AM - 8:00 PM",
         "time4":"9:00 AM - 8:00 PM",
         "time5":"9:00 AM - 6:00 PM",
         "time6":"9:00 AM - 5:00 PM",
         "counter":0,
         "street":"904 Indiana Avenue",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156",
         "email":"reference@lapcat.org"
      },
      "CS":{
         "ID":2,
         "name":"Coolspring",
         "time0":"Closed",
         "time1":"10:00 AM - 7:00 PM",
         "time2":"10:00 AM - 7:00 PM",
         "time3":"10:00 AM - 7:00 PM",
         "time4":"10:00 AM - 7:00 PM",
         "time5":"10:00 AM - 6:00 PM",
         "time6":"9:00 AM - 5:00 PM",
         "counter":1,
         "street":"7089 West 400 North",
         "cityState":"Michigan City, IN",
         "zip":"46360",
         "phone":"(219) 879-3272",
         "email":"coolspring@lapcat.org"
      },
      "FL":{
         "ID":3,
         "name":"Fish Lake",
         "time0":"Closed",
         "time1":"Closed",
         "time2":"11:00 AM - 7:00 PM",
         "time3":"2:00 PM - 6:00 PM",
         "time4":"2:00 PM - 7:00 PM",
         "time5":"2:00 PM - 6:00 PM",
         "time6":"10:00 AM - 2:00 PM",
         "counter":2,
         "street":"7981 E. St. Rd. 4",
         "cityState":"Walkerton, IN",
         "zip":"46574",
         "phone":"(219) 369-1337",
         "email":"fishlake@lapcat.org"
      },
      "HA":{
         "ID":4,
         "name":"Hanna",
         "time0":"Closed",
         "time1":"12:00 PM - 6:00 PM",
         "time2":"Closed",
         "time3":"1:00 PM - 7:00 PM",
         "time4":"1:00 PM - 6:00 PM",
         "time5":"1:00 PM - 6:00 PM",
         "time6":"9:00 AM - 1:00 PM",
         "counter":3,
         "street":"202 North Thompson St. (P.O. Box 78)",
         "cityState":"Hanna, IN",
         "zip":"46340",
         "phone":"(219) 797-4735",
         "email":"hanna@lapcat.org"
      },
      "KH":{
         "ID":5,
         "name":"Kingsford Heights",
         "time0":"Closed",
         "time1":"1:00 PM - 7:00 PM",
         "time2":"Closed",
         "time3":"1:00 PM - 7:00 PM",
         "time4":"1:00 PM - 7:00 PM",
         "time5":"1:00 PM - 6:00 PM",
         "time6":"9:00 AM - 2:00 PM",
         "counter":4,
         "street":"436 Evanston (P.O. Box 219)",
         "cityState":"Kingsford Heights, IN",
         "zip":"46346",
         "phone":"(219) 393-3280",
         "email":"kingsford@lapcat.org"
      },
      "RP":{
         "ID":6,
         "name":"Rolling Prairie",
         "time0":"Closed",
         "time1":"Closed",
         "time2":"11:00 AM - 6:00 PM",
         "time3":"1:00 PM - 6:00 PM",
         "time4":"1:00 PM - 7:00 PM",
         "time5":"1:00 PM - 6:00 PM",
         "time6":"9:00 AM - 1:00 PM",
         "counter":5,
         "street":"1 East Michigan Avenue (P.O. Box 157)",
         "cityState":"Rolling Prairie, IN",
         "zip":"46371",
         "phone":"(219) 778-2390",
         "email":"rolling@lapcat.org"
      },
      "UM":{
         "ID":7,
         "name":"Union Mills",
         "time0":"Closed",
         "time1":"12:00 PM - 7:00 PM",
         "time2":"1:00 PM - 6:00 PM",
         "time3":"1:00 PM - 7:00 PM",
         "time4":"Closed",
         "time5":"1:00 PM - 6:00 PM",
         "time6":"9:00 AM - 2:00 PM",
         "counter":6,
         "street":"3727 West 800 South (P.O. Box 98)",
         "cityState":"Union Mills, IN",
         "zip":"46382",
         "phone":"(219) 767-2604",
         "email":"union@lapcat.org"
      },
      "ML":{
         "ID":8,
         "name":"Mobile Library",
         "counter":7,
         "street":"",
         "cityState":"",
         "zip":"",
         "phone":"(219) 362-6156"
      }
};
var totalRssItems = 0;
var currentRss = 0;
function getDomain(url) {
return url.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/)[2];
}
function displayLocation(locationCode,domElementSelector){
	var today = new Date();
	var dayOfWeek = today.getDay();
	
	domElementSelector
		.empty()
		.append(
			$("<div/>",{css:{"text-align":"left","width":"200px", "height":"auto", "float":"left"}})
			.append(
				$("<div/>")
					.html(
						$("<div/>",{title:locations[locationCode].name}).html(locations[locationCode].name)	
					)
				)
				.append(
					$("<div/>")
						.html(
							$("<div/>",{title:"address"}).html(locations[locationCode].street)	
						)
				)
				.append(
					$("<div/>")
						.html(
							$("<div/>",{title:"city state"}).html(locations[locationCode].cityState)	
						)
				)
				.append(
					$("<div/>")
						.html(
							$("<div/>",{title:"zip code"}).html(locations[locationCode].zip)	
						)
				)
				.append(
					$("<div/>")
						.html(
							$("<div/>",{title:"phone number"}).html(locations[locationCode].phone)	
						)
				)
				.append(
					$("<div/>")
						.html(
							$("<div/>",{title:"email address"}).html(locations[locationCode].email)	
						)
				)
		)
		
		
		for(var a=0;a<7;a++){
			domElementSelector
				.append(
					$("<div/>",{css:{"text-align":"left","width":"300px","float":"left"}})
					.append(
						function(){
							if(dayOfWeek == a){
								return $("<div/>")
									.html(
										$("<div/>",{title:"Hours"}).html(weekday[a]+" "+locations[locationCode]["time"+a]).css("font-weight","bold")
									)
							}else{
								return $("<div/>")
									.html(
										$("<div/>",{title:"Hours"}).html(weekday[a]+" "+locations[locationCode]["time"+a])	
									)
							}
						}
					)
				);
		}
}
function getDeliciousFeed(uri){
	var sCC = $("#deliciousContainer")
	$.get("ajax/rss.php",{"url":uri},function(d){
		$(d).find('item').each(function() {
 			totalRssItems++;
			//name the current found item this for this particular loop run
			var item = $(this);
			// grab the post title
			var title = item.find('title').text();
			// grab the post's URL
			var link = item.find('link').text();
			// next, the description
			var description = item.find('description').text();
			//don't forget the pubdate
			var pubDate = item.find('dc_date').text();
 
			// now create a var 'html' to store the markup we're using to output the feed to the browser window
			html = $("<div/>",{"class":"delItem",css:{}})
				.html(
					$("<div/>",{css:{"display":"block"}})
						.html(
							$("<div/>",{"class":"delItem"})
								.html(
									$("<img/>",{"class":"delFavIcon","src":"http://"+getDomain(link)+"/favicon.ico","alt":"Website Favorite Icon"})
									.error(function(){
										$(this).attr("src","http://delicious.com/favicon.ico");
									})
								)
								.append(
									$("<a/>",{"href":link,"html":title,"target":"_blank",css:{"height":"16px"}})
								)
						)
				)
				
				
			//put that feed content on the screen!
			sCC.append(html);  
		});
	})
	
}
function get_rss_feed() {
	var sCC = $("#soonCalendarContainer")
	//clear the content in the div for the next feed.
	sCC.empty();
 
	//use the JQuery get to grab the URL from the selected item, put the results in to an argument for parsing in the inline function called when the feed retrieval is complete
	$.get("ajax/rss.php",{"url":"http://engagedpatrons.org/RSS4LE.cfm?SiteID=9267&BranchID="}, function(d) {
 
		//find each 'item' in the file and parse it
		$(d).find('item').each(function() {
 			totalRssItems++;
			//name the current found item this for this particular loop run
			var $item = $(this);
			// grab the post title
			var title = $item.find('title').text();
			// grab the post's URL
			var link = $item.find('link').text();
			// next, the description
			var description = $item.find('description').text();
			//don't forget the pubdate
			var pubDate = $item.find('dc\:date').text();
 
			// now create a var 'html' to store the markup we're using to output the feed to the browser window
			html = $("<div/>",{"class":"rssItem",css:{}})
				.html(
					$("<div/>",{css:{"overflow":"hidden","width":"690px"}})
						.html(
							$("<div/>",{"class":"rssTitle"})
								.html(
									$("<a/>",{"href":link,"html":title,"target":"_blank"})
								)
						)
						.append(
							$("<date/>",{"class":"rssDate",html:pubDate})
						)
						.append(
							$("<span/>",{"class":"rssDescription",html:description.replace(/<(a|img){1}.*>/i,'')})
						)
				)
				
			//put that feed content on the screen!
			sCC.append(html);  
		});
	});
	$(".soonCalendarNext").click(function(){
		var position = 0
		currentRss--;
		position = (740*currentRss)+40;
		sCC.css({"left": position}); 
	});
	$(".soonCalendarBack").click(function(){
		var position = 0
		currentRss++;
		position = (740*currentRss)+40;
		sCC.css({"left": position}); 
	});	
};
function get_blog_feed() {
	var blogWindow = $("#blogContainerBox");
	//clear the content in the div for the next feed.
	blogWindow.empty();
	totalDisplay = 5;
 	totalBlogItems = 0;
	//use the JQuery get to grab the URL from the selected item, put the results in to an argument for parsing in the inline function called when the feed retrieval is complete
	$.get("ajax/rss.php",{"url":"http://laportelibrary.blogspot.com/feeds/posts/default"}, function(d) {
 
		//find each 'item' in the file and parse it
		$(d).find('entry').each(function() {
 			if(totalBlogItems == totalDisplay){return false;}
 			
			//name the current found item this for this particular loop run
			var item = $(this);
			// grab the post title
			var title = item.find('title').text();
			// grab the post's URL
			var link = item.find('link[rel=alternate]').attr("href");
			//alert(link);
			// next, the description
			var description = item.find('content').text();
			//don't forget the pubdate
			var pubDate = new Date(item.find('published').text()).toDateString();
			
			var authorName = item.find("author").find("name").text();
			
			var authorProfile = item.find("author").find("uri").text();
			
			var authorImage = item.find("author").find("gd_image").attr("src");
			
			//alert(authorImage);
 
			// now create a var 'html' to store the markup we're using to output the feed to the browser window
			html = $("<article/>",{"class":"blogItem",css:{}})
				.html(
					$("<div/>",{})
						.html(
							$("<div/>",{"class":"blogEntryTitle"})
								.html(
									$("<a/>",{"href":link,"html":title,"target":"_blank"})
								)								
						)
						.append(
							$("<div/>",{"class":"blogEntryAuthor"})
								.append(
									$("<span/>").html("By ")
										.append($("<img/>",{"src":authorImage}))
										.append($("<a/>",{html:authorName,"href":authorProfile}))
										.append(" on "+ pubDate)
								)
						)
						.append(
							$("<div/>",{"class":"blogEntryDescription",html:description})
						)
						
				)
				
			//put that feed content on the screen!
			blogWindow.append(html);
			totalBlogItems++;
		});
		
		
		$.each($(".blogEntryDescription").find('a>img'),function(i,item){
			var parent =$(item).parent();
			if($(item).attr("src")==parent.attr("href")){
				parent.addClass("noAfterImage");
			}
		});
	});	
};
function loadFlicker( queryString ){
	
	$('#flickerPictureBox').jflickrfeed({
		limit: 15,
		qstrings: {
			id: queryString
		},
		itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	});
	/*
	$('#cbox').jflickrfeed({
		limit: 14,
		qstrings: {
			id: queryString
		},
		itemTemplate: '<li>'+
						'<a rel="colorbox" href="{{image}}" title="{{title}}">' +
							'<img src="{{image_s}}" alt="{{title}}" />' +
						'</a>' +
					  '</li>'
	}, function(data) {
		$('#cbox a').colorbox();
	});
	*/
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

$(document).ready(function(){
	//$(".shadowBox").css("display","block"); 
	$(".locationHover")
		.mouseenter(
			function(){
				displayLocation($(this).attr("id"),$("#locationDisplay"));
			}
		)
		.mouseleave(
			function(){
				displayLocation("MA",$("#locationDisplay"));
			}
		);
		if($("#soonCalendarContainer")){get_rss_feed();}
		if($("#blogBox")){get_blog_feed();}
		getDeliciousFeed("http://www.delicious.com/v2/rss/laportecolibrary");
		$("#MA").trigger("mouseenter");
		
        $("#twitterContainer").tweet({
            "username": "lpcpls",
            "join_text": "auto",
            "avatar_size": 32,
            "count": 5,
            "auto_join_text_default": "",
            "auto_join_text_ed": "",
            "auto_join_text_ing": "",
            "auto_join_text_reply": "",
            "auto_join_text_url": "",
            "loading_text": ""
        });
        loadFlicker("62092835@N08");     
});












