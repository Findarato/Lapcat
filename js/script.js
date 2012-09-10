/* Author: Joseph Harry

*/
// Just because I know people are going to ask for it
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
var totalRssItems = 0;
var currentRss = 0;


function displayLocation(locationCode,domElementSelector){
  alert("badf");
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

function getDomain(url) {
  return url.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/)[2];
}
function displayLocation(locationCode,domElementSelector){
	var today = new Date();
	var dayOfWeek = today.getDay();
	domElementSelector
		.empty()
		.append(
			$("<div/>",{css:{"text-align":"left", "height":"auto", "float":"left"}})
			.append(
				$("<div/>",{css:{margin:0}})
					.html(
						$("<span/>",{title:locations[locationCode].name}).html(locations[locationCode].name)	
					)
				)
				.append(
					$("<div/>",{css:{margin:0}})
						.html(
							$("<span/>",{title:"address"}).html(locations[locationCode].street)	
						)
				)
				.append(
					$("<div/>",{css:{margin:0}})
						.html(
							$("<span/>",{title:"city state"}).html(locations[locationCode].cityState)	
						)
				)
				.append(
					$("<span/>",{css:{margin:0}})
						.html(
							$("<span/>",{title:"zip code"}).html(locations[locationCode].zip)	
						)
				)
				.append(
					$("<div/>",{css:{margin:0}})
						.html(
							$("<span/>",{title:"phone number"}).html(locations[locationCode].phone)	
						)
				)
				.append(
					$("<div/>",{css:{margin:0}})
						.html(
							$("<span/>",{title:"email address"}).html(locations[locationCode].email)	
						)
				)
		)
		
		
		for(var a=1;a<6;a++){
		  var timeHolder = $("#timeContainer"+a)
		  timeHolder.html(locations[locationCode]["time"+a])
        if(dayOfWeek == a){
          $("#dayBox"+a).addClass("color1").removeClass("color4")
        }
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
					
							$("<div/>",{"class":"delItem linkIcon"})
								.html(
									$("<a/>",{"class":"linkIcon","href":link,"html":title,"target":"_blank",css:{"height":"16px"}})
									 .css({background: "url(http://g.etfv.co/" + link + ") left center no-repeat","padding-left": "20px"})
								)
				)
			//put that feed content on the screen!
			sCC.append(html);  
		});
	})
	
}
function getSpreadSheetFeed(area,target){
  if(target===undefined)
    var sCC = $("#deliciousContainer")
  else
    var sCC = target;
  if(area == undefined) area = "adult";
  $.getJSON("ajax/googleDataLinks.php",{"type":area},function(data){
    $.each(data,function(i,item){
        html = $("<div/>",{"class":"delItem",css:{}})
        .html(
              $("<div/>",{"class":"delItem linkIcon"})
                .html(
                  $("<a/>",{"class":"linkIcon","href":item.url,"html":item.title,"target":"_blank",css:{"height":"16px"}})
                   .css({background: "url(http://g.etfv.co/" + item.url + ") left center no-repeat","padding-left": "20px"})
                )
        )
      //put that feed content on the screen!
      sCC.append(html);
    });
  });
}
function wowbraryImageLinks(uri,target,slider,sectionTitle,count){
	var amount = 0;
	if(target==undefined)return -1;
	if(count==undefined)count=20;
 	if(uri==undefined) uri="http://www.wowbrary.org/rss.aspx?l=8711&c=GEN";
  
  $(".bookTitle").html(sectionTitle);
  target.empty();
	$.get("ajax/rss.php",{"url":uri}, function(d) {
 		me = $(d);
 		var feedTitle = me.find("channel").find("title:first").text();
		//find each 'item' in the file and parse it 
		me.find('item').each(function() {
			if(amount == count)
				return -1;
			amount++; 
			var $item = $(this);
			var title = $item.find('title').text();
 			var contentEncoded = $item.find('content_encoded').text();
			html = $("<div/>")
				.html(
					function(){ 
						var returnHtml = $("<li/>");
						var linkCode = $("<a/>");
						if(contentEncoded.length>1){
							contentEncoded = $(contentEncoded);
							contentEncoded.find('a').not('a[href^="http:"],a[href^="https:"]').replaceWith("");
							contentEncoded
								.find('a')
									.find("img")
										.each(function(i,links){
											var links = $(links);
											var parent =  links.parent();
											var isbn = parent.attr("href").match(/\d{10,13}/); 
											linkCode
												.attr({"href":parent.attr("href"),"title":parent.text()})
												.html(
													$("<img/>",{"src":"http://cdn1.lapcat.org/coverCache/imageFetch.php?isbn="+isbn+"&size=L"})
												)
											returnHtml.append(linkCode);
										});
						  return returnHtml;
						}
					}
				);
				
			//put that feed content on the screen!
			target.append(html.html());  
		});
		if(slider){
			$(".flexslider").flexslider({
				animation:"slide",
				controlNav: true,
				useCSS: true,
				touch: true,
				directionNav: false,
				maxItems: 10,
				controlsContainer: ".flexControll",
				animationLoop: true,
				slideshowSpeed: 5000
			});
		}
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
function displayFlickr(flickrTag,flickrId){
	// lets make sure we have some defaults in so that if the user just calls the function it works
	if(flickrTag == undefined)
		flickrTag = "teen";
	if(flickrId == undefined)
		flickrId = '62092835@N08';
		
  	$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
      {
        id: flickrId,
        tags: flickrTag,
        format: "json"
      },
  	function(data) {
  	  	$.each(data.items, function(i,item){
  	    	$("<div/>",{"class":"flickrPicture linearAnimate",css:{"display":"inline-block","position":"relative"}})
  	      		.html(
  	      			$("<div/>",{"class":"flickrPictureOutline roundAll3 linearAnimate"})
  	      				.html(
  		      				$("<a/>",{"html":"&nbsp;"})
  	    	  					.css({"background-image":"url("+item.media.m+")"})
  	      						.attr({"href":item.link,"title":item.title})	
  	      				)
  	      				.append(
  	      					$("<div/>",{"html":item.title,"css":{"position":"relative","top":"106px","left":"3px","width":"96%","font-size":"1em","color":"#000","margin-left:":"2%"}})		
  	      				)
  	      		)
  	      		.appendTo("#flickerPictureBox");
  	    });
  	});
}
$(".linkIcon a[href^='http'] ").each(function() {
    $(this).css({
        background: "url(http://g.etfv.co/" + this.href + ") left center no-repeat",
        "padding-left": "20px"
    });
});
$(document).ready(function(){
		//if($("#blogBox")){get_blog_feed();}
		uri = window.location.toString();
		gapi.plusone.render();
		/* Lets load the correct delicious feed */
		if(uri.search(/research/i)>0){// this is the research page
			//getDeliciousFeed("http://www.delicious.com/v2/rss/laportecolibrary");
			getSpreadSheetFeed("research");
		}else{
			if(uri.search(/teens/i)>0){// this is the teens page
				//getDeliciousFeed("http://www.delicious.com/v2/rss/laportecoteens");
				getSpreadSheetFeed("teens");
			}else{
				if(uri.search(/children/i)>0){// this is the teens page
					//getDeliciousFeed("http://www.delicious.com/v2/rss/laportecochild");
					getSpreadSheetFeed("kids");
				}else{
					if(uri.search(/greatpicks/i)>0){// this is the teens page
						get_rss_feed("http://www.wowbrary.org/rss.aspx?l=8711&c=GEN",$("#greatPicksContainerBox"))
						//getDeliciousFeed("http://www.delicious.com/v2/rss/laportereaders");
						getSpreadSheetFeed("readers");
					}else{//if all else fails lets just load a local rss feed
						if(uri.search(/educators/i)>0){// this is the teens page
              //getDeliciousFeed("http://www.delicious.com/v2/rss/laportereaders");
              getSpreadSheetFeed("educators");
              }else{//if all else fails lets just load a local rss feed
                getSpreadSheetFeed("adult");
              }
					}
				}	
			}
		}
		
        $("#twitterContainer").tweet({
            "username": "lpcpls",
            "join_text": "auto",
            "avatar_size": 32,
            "count": 3,
            "auto_join_text_default": "",
            "auto_join_text_ed": "",
            "auto_join_text_ing": "",
            "auto_join_text_reply": "",
            "auto_join_text_url": "",
            "loading_text": ""
        });
        gapi.plusone.go();
  $(".locationHover")
    .mouseenter(function(){displayLocation($(this).attr("id"),$("#locationDisplay"));})
    .mouseleave(function(){});
  //This makes sure something is being shown
  
  displayLocation($(".locationHover").attr("id"),$("#locationDisplay"));
});

