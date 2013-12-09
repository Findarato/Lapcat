Array.prototype.getUnique = function(){
   var u = {}, a = [];
   for(var i = 0, l = this.length; i < l; ++i){
      if(this[i] in u)
         continue;
      a.push(this[i]);
      u[this[i]] = 1;
   }
   return a;
};

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
    );
    
    
    for(var a=1;a<=6;a++){
      var timeHolder = $("#timeContainer"+a);
      timeHolder.html(locations[locationCode]["time"+a]);
        if(dayOfWeek == a){
          $("#dayBox"+a).addClass("color1").removeClass("color4");
        }
    }
    
}


jQuery(document).ready(function(){
  var jsPath = "/sites/all/themes/lapcat/assets/js/";
  
    //if($("#blogBox")){get_blog_feed();}
    uri = window.location.toString();
    if(
      uri.search(/children/i)>0 || 
      uri.search(/greatpicks/i)>0 ||
      uri.search(/downloads/i)>0 ||
      uri.search(/teens/i)>0
      ){// this is the research page
      jQuery.getScript(jsPath+"formatNewest.js");
    }
    if(
      uri.search(/research/i)>0 || 
      uri.search(/educators/i)>0 ||
      uri.search(/genealogy/i)>0 ||
      uri.search(/greatpicks/i)>0 ||
      uri.search(/teens/i)>0
      ){// this is the research page
      jQuery.getScript(jsPath+"research.js");
    }
    
    /*Loading Custom scripts*/
    if(uri.search(/research/i)>0 || uri.search(/educators/i)>0){// this is the research page
    }else{
      if(uri.search(/teens/i)>0){// this is the teens page 
        jQuery.getScript(jsPath+"flicker.js");
      }else{
        if(uri.search(/children/i)>0){// this is the teens page
        }else{
          if(uri.search(/greatpicks/i)>0){// this is the teens page
          }else{//if all else fails lets just load a local rss feed
            if(uri.search(/educators/i)>0){// this is the teens page
            }else{//if all else fails lets just load a local rss feed
            	if(uri.search(/genealogy/i)>0){// this is the teens page
            	}else{//if all else fails lets just load a local rss feed
            		if(uri.search(/help/i)>0){// this is the about page
             			jQuery.getScript(jsPath+"contactUs.js");
            		}else{
            			jQuery.getScript(jsPath+"locations.js");
            		}
            	}
            }
          }
        } 
      }
    }
  

    //Getting fav icons for all the links that have the class linkIcon
  jQuery(".linkIcon a[href^='http'] ").each(function() {
      jQuery(this)
      .css({
          background: "url(http://g.etfv.co/" + this.href + ") left center no-repeat",
          "padding-left": "20px",
          "background-size":"16px 16px"
      });
  });
});


