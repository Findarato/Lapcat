/* Author: Joseph Harry

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

Array.prototype.getUnique = function(){
   var u = {}, a = [];
   for(var i = 0, l = this.length; i < l; ++i){
      if(this[i] in u)
         continue;
      a.push(this[i]);
      u[this[i]] = 1;
   }
   return a;
}

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
function getDeliciousFeed(uri,target){
	if(target===undefined)
		var sCC = $("#deliciousContainer")
	else
		var sCC = target;
	
	$.get("ajax/rss.php",{"url":uri},function(d){
		$(d).find('item').each(function() {
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
									$("<img/>",{"class":"delFavIcon","src":"http://delicious.com/favicon.ico","alt":"Website Favorite Icon"})
									/*
									$("<img/>",{"class":"delFavIcon","src":"http://"+getDomain(link)+"/favicon.ico","alt":"Website Favorite Icon"})
									.error(function(){
										$(this).attr("src","http://delicious.com/favicon.ico");
									})
									*/
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
function wowbraryImageLinks(url,target){
	
	if(target===undefined)
		return -1;

 	if(uri===undefined)
 		uri="http://www.wowbrary.org/rss.aspx?l=8711&c=GEN";


	target.empty();
	//use the JQuery get to grab the URL from the selected item, put the results in to an argument for parsing in the inline function called when the feed retrieval is complete
	$.get("ajax/rss.php",{"url":uri}, function(d) {
 		
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
			
 			var contentEncoded = $item.find('content_encoded').text();
 			
			// now create a var 'html' to store the markup we're using to output the feed to the browser window
			html = $("<div/>",{"class":"rssItem",css:{}})
				.html(
					function(){ 
						if(contentEncoded.length>1){
							contentEncoded = $(contentEncoded);
							contentEncoded.find(".NUBUTTON").removeClass("NUBUTTON").addClass("roundAll3 insideBoxShadow color560").css({"text-decoration":"none","display":"inline-block","margin":"2px","padding":"5px"});
							contentEncoded.find('a').not('a[href^="http:"],a[href^="https:"]').replaceWith("");
							
							contentEncoded.find('a').find("img").each(function(i,links){
								alert(links.src)

							})
							
							
							return $("<span/>",{"class":"rssDescription",html:contentEncoded})
							
						}else{
							return 	$("<div/>",{css:{"overflow":"hidden"}})
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
						}
						
					}
					
				)
				
			//put that feed content on the screen!
			sCC.append(html);  
		});
	});
}
function get_rss_feed(uri,target) {
	if(target===undefined)
		var sCC = $("#soonCalendarContainer")
	else
		var sCC = target;

	//clear the content in the div for the next feed.
	sCC.empty();
 	if(uri===undefined){
 		uri="http://engagedpatrons.org/RSS4LE.cfm?SiteID=9267&BranchID=";
 	}
	//use the JQuery get to grab the URL from the selected item, put the results in to an argument for parsing in the inline function called when the feed retrieval is complete
	$.get("ajax/rss.php",{"url":uri}, function(d) {
 		
		//find each 'item' in the file and parse it
		$(d).find('item').each(function() {
 			
			//name the current found item this for this particular loop run
			var $item = $(this);
 			var contentEncoded = $item.find('content_encoded').text();
 			
			// now create a var 'html' to store the markup we're using to output the feed to the browser window
			html = $("<div/>",{"class":"rssItem",css:{}})
				.html(
					function(){ 
						if(contentEncoded.length>1){
							contentEncoded = $(contentEncoded);
							contentEncoded.find('a').not('a[href^="http:"],a[href^="https:"]').replaceWith("");
													
							
							return $("<span/>",{"class":"rssDescription",html:contentEncoded})
							
						}else{
							return 	$("<div/>",{css:{"overflow":"hidden"}})
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
						}
						
					}
					
				)
				
			//put that feed content on the screen!
			sCC.append(html);  
		});
	});
};
function get_blog_feed() {
	var blogWindow = $("#blogContainerBox");
	//clear the content in the div for the next feed.
	blogWindow.empty();
	totalDisplay = 3;
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
		
		$(".blogEntryDescription a").css({"display":"inline"})
		$.each($(".blogEntryDescription").find('a>img'),function(i,item){
			me = $(item);
			var parent = me.parent();
			me.css("margin","5px")
			if(me.attr("src")==parent.attr("href")){
				parent.addClass("noAfterImage");
			}
		});
/*
		$.each($(".blogEntryDescription").find('a[href*="catalog.lapcat.org"]'),function(h,card){
			me = $(card);
			newData = "";
			dataHtml = $("<div/>")
			//dataHtml = '<div>This is default text<div><a href="http://catalog.lapcat.org">more info</a></div></div>'
			var dataImg;
			dataHtml.load("ajax/catalogLoad.php",{"url":me.attr("href")})
			//$.getJSON("ajax/catalogLoad.php",{"url":me.attr("href")},function(json){
			//	dataHtml = json[0]+dataHtml
			//});
			//if(dataHtml === "" || dataHtml === null){dataHtml = "There was an error parsing the catalog details"}
			
			if(dataImg == "" || dataImg == null){dataImg = "images/tree.png";}
			me.hovercard({"detailsHTML":dataHtml.html(),"width":"400px","cardImgSrc":dataImg})
			//html.load("ajax/catalogLoad.php",{"url":"http://catalog.lapcat.org"});
			
			//
		});
		*/		
	});
	
};

$(document).ready(function(){
		if($("#blogBox")){get_blog_feed();}
		uri = window.location.toString();
		if(uri.search(/research/i)>0){// this is the research page
			getDeliciousFeed("http://www.delicious.com/v2/rss/laportecolibrary");
		}else{
			if(uri.search(/teens/i)>0){// this is the teens page
				getDeliciousFeed("http://www.delicious.com/v2/rss/laportecoteens");
			}else{
				if(uri.search(/greatpicks/i)>0){// this is the teens page
					get_rss_feed("http://www.wowbrary.org/rss.aspx?l=8711&c=GEN",$("#greatPicksContainerBox"))
					getDeliciousFeed("http://www.delicious.com/v2/rss/laportereaders");
				}else{//if all else fails lets just load a local rss feed
					getDeliciousFeed("http://www.delicious.com/v2/rss/laportelocal");	
					
				}
					
			}
				
		}
		
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
            
});












