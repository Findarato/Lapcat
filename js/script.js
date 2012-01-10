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
function displayLocation(locationCode,domElementSelector){
	var today = new Date();
	var dayOfWeek = today.getDay();
	
	domElementSelector
		.empty()
		.append(
			$("<div/>",{css:{"text-align":"left","width":"250px", "height":"150px", "float":"left"}})
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
					$("<div/>",{css:{"overflow":"hidden","width":"510px"}})
						.html(
						$("<div/>",{html:title,"class":"rssTitle"})
						)
						.append(
							$("<date/>",{"class":"rssDate",html:pubDate})
						)
						.append(
							$("<span/>",{"class":"rssDescription",html:description})
						)
						.append(
							$("<a/>",{"class":"rssReadMore",html:"Read More >>","href":link,"target":"_blank"})
						)
				)
				
			//put that feed content on the screen!
			sCC.append(html);  
		});
	});
	$(".soonCalendarNext").click(function(){
		
		if(currentRss == totalRssItems){ currentRss = -1;}
		var position = (currentRss*40);
		currentRss--;
		alert(currentRss);
		position = position + (currentRss*520);
		//alert(position)
		sCC.css({"left": position});
	});
	$(".soonCalendarBack").click(function(){
		//if(currentRss == 0){ currentRss = (totalRssItems+1);}		
		var position = (currentRss*40);
		currentRss++;
		alert(currentRss+"|back");
		position = position - (currentRss*520);
		sCC.css({"left": position});
	});	
};



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
		
	//This makes sure something is being shown
	
	//displayLocation($(".locationHover").attr("id"),$("#locationDisplay"));
});












