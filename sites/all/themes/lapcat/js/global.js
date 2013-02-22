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
    
    
    for(var a=1;a<=6;a++){
      var timeHolder = $("#timeContainer"+a);
      timeHolder.html(locations[locationCode]["time"+a]);
        if(dayOfWeek == a){
          $("#dayBox"+a).addClass("color1").removeClass("color4")
        }
    }
    
}
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
          $("<div/>",{"class":"flickrPicture smoothAnimate roundAll3",css:{"display":"inline-block","position":"relative"}})
              .html(
                  $("<a/>",{"html":"&nbsp;","class":"roundAll3"})
                    .css({"background-image":"url("+item.media.m+")"})
                    .attr({"href":item.link,"title":item.title})  
              )
              .appendTo("#flickerPictureBox");
        });
    });
}

$(document).ready(function(){
    //if($("#blogBox")){get_blog_feed();}
    uri = window.location.toString();
  //if(title = $("#page-title").text()){
  //  $(".subPageHeader").addClass(title.replace(/ /g,""));
 // }


  $(".linkIcon a[href^='http'] ").each(function() {
      $(this).css({
          background: "url(http://g.etfv.co/" + this.href + ") left center no-repeat",
          "padding-left": "20px"
      });
  });


    //gapi.plusone.render();
    /* Lets load the correct delicious feed */
    if(uri.search(/research/i)>0){// this is the research page
    }else{
      if(uri.search(/teens/i)>0){// this is the teens page
        displayFlickr("teens");
      }else{
        if(uri.search(/children/i)>0){// this is the teens page
        }else{
          if(uri.search(/greatpicks/i)>0){// this is the teens page
          }else{//if all else fails lets just load a local rss feed
            if(uri.search(/educators/i)>0){// this is the teens page
              }else{//if all else fails lets just load a local rss feed

              }
          }
        } 
      }
    }
});


