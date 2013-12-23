var weekday = ["Sunday","Monday","Tuesday","Wednesday",'Thursday',"Friday","Saturday"];
var locations={
      "MA":{
         "ID":1,
         "name":"Main Library",
         "time0":"Closed",
         "time1":"9 - 8 ",
         "time2":"9 - 8 ",
         "time3":"9 - 8 ",
         "time4":"9 - 8 ",
         "time5":"9 - 6 ",
         "time6":"9 - 5 ",
         "counter":0,
         "street":"904 Indiana Avenue",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156",
         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.6087073,-86.721373&zoom=18&size=300x145&markers=41.6087073,-86.721373,ol-marker-green",
         "email":"reference@lapcat.org"
      },
      "CS":{
         "ID":2,
         "name":"Coolspring",
         "time0":"Closed",
         "time1":"10 - 7 ",
         "time2":"10 - 7 ",
         "time3":"10 - 7 ",
         "time4":"10 - 7 ",
         "time5":"10 - 6 ",
         "time6":"9 - 5 ",
         "counter":1,
         "street":"7089 West 400 North",
         "cityState":"Michigan City, IN",
         "zip":"46360",
         "phone":"(219) 879-3272",
         "map":"http://dev.laportelibrary.org/sites/all/themes/lapcat/assets/images/coolSpringMap.png",
         "email":"coolspring@lapcat.org"
      },
      "FL":{
         "ID":3,
         "name":"Fish Lake",
         "time0":"Closed",
         "time1":"Closed",
         "time2":"11- 7 ",
         "time3":"2 - 6 ",
         "time4":"2 - 7 ",
         "time5":"2 - 6 ",
         "time6":"10 - 2 ",
         "counter":2,
         "street":"7981 E. St. Rd. 4",
         "cityState":"Walkerton, IN",
         "zip":"46574",
         "phone":"(219) 369-1337",
         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.6087073,-86.721373&zoom=18&size=500x350&markers=41.6087073,-86.721373,ol-marker-green",
         "email":"fishlake@lapcat.org"
      },
      "HA":{
         "ID":4,
         "name":"Hanna",
         "time0":"Closed",
         "time1":"12 - 6 ",
         "time2":"Closed",
         "time3":"1 - 7 ",
         "time4":"1 - 6 ",
         "time5":"1 - 6 ",
         "time6":"9 - 1 ",
         "counter":3,
         "street":"202 North Thompson St. (P.O. Box 78)",
         "cityState":"Hanna, IN",
         "zip":"46340",
         "phone":"(219) 797-4735",
         "map":"http://dev.laportelibrary.org/sites/all/themes/lapcat/assets/images/hannaMap.png",
         "email":"hanna@lapcat.org"
      },
      "KH":{
         "ID":5,
         "name":"Kingsford Heights",
         "time0":"Closed",
         "time1":"1 - 7 ",
         "time2":"Closed",
         "time3":"1 - 7 ",
         "time4":"1 - 7 ",
         "time5":"1 - 6 ",
         "time6":"9 - 2 ",
         "counter":4,
         "street":"436 Evanston (P.O. Box 219)",
         "cityState":"Kingsford Heights, IN",
         "zip":"46346",
         "phone":"(219) 393-3280",
         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.6087073,-86.721373&zoom=18&size=500x350&markers=41.6087073,-86.721373,ol-marker-green",
         "email":"kingsford@lapcat.org"
      },
      "RP":{
         "ID":6,
         "name":"Rolling Prairie",
         "time0":"Closed",
         "time1":"Closed",
         "time2":"11 - 6 ",
         "time3":"1 - 6 ",
         "time4":"1 - 7 ",
         "time5":"1 - 6 ",
         "time6":"9 - 1 ",
         "counter":5,
         "street":"1 East Michigan Avenue (P.O. Box 157)",
         "cityState":"Rolling Prairie, IN",
         "zip":"46371",
         "phone":"(219) 778-2390",
         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.6087073,-86.721373&zoom=18&size=500x350&markers=41.6087073,-86.721373,ol-marker-green",
         "email":"rolling@lapcat.org"
      },
      "UM":{
         "ID":7,
         "name":"Union Mills",
         "time0":"Closed",
         "time1":"12 - 7 ",
         "time2":"1 - 6 ",
         "time3":"1 - 7 ",
         "time4":"Closed",
         "time5":"1 - 6 ",
         "time6":"9 - 2 ",
         "counter":6,
         "street":"3727 West 800 South (P.O. Box 98)",
         "cityState":"Union Mills, IN",
         "zip":"46382",
         "phone":"(219) 767-2604",
         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.6087073,-86.721373&zoom=18&size=500x350&markers=41.6087073,-86.721373,ol-marker-green",
         "email":"union@lapcat.org"
      },
      "ML":{
         "ID":8,
         "name":"Mobile Library",
         "time0":" ",
         "time1":" ",
         "time2":" ",
         "time3":" ",
         "time4":" ",
         "time5":" ",
         "time6":" ",
         "counter":7,
         "street":"La Porte, IN",
         "cityState":"46350",
         "zip":"(219) 362-6156",
         "phone":"reference@lapcat.org",
         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.6087073,-86.721373&zoom=18&size=500x350&markers=41.6087073,-86.721373,ol-marker-green",
         "email":"<a href='/downloads/mobilelibraryschedule.pdf'><span class='icon-bus'></span> Schedule</a>"
         
      }
};

function displayLocation(me,domElementSelector){
  var today = new Date();
  var dayOfWeek = today.getDay();
  locationCode = me.attr("id");
  
  jQuery(".mapZoom").css("background-image","url("+locations[locationCode].map+")");
  //alert(locations[locationCode].map);
  domElementSelector
    .empty()
    .append(
      jQuery("<div/>",{"class":"locationDisplay",css:{"text-align":"left", "height":"auto", "float":"left"}})
      .append(
        jQuery("<div/>")
          .html(
            jQuery("<span/>",{title:locations[locationCode].name}).html(locations[locationCode].name)  
          )
        )
        .append(
          jQuery("<div/>")
            .html(
              jQuery("<span/>",{title:"address"}).html(locations[locationCode].street) 
            )
        )
        .append(
          jQuery("<div/>")
            .html(
              jQuery("<span/>",{title:"city state"}).html(locations[locationCode].cityState) 
            )
        )
        .append(
          jQuery("<div/>")
            .html(
              jQuery("<span/>",{title:"zip code"}).html(locations[locationCode].zip) 
            )
        )
        .append(
          jQuery("<div/>")
            .html(
              jQuery("<span/>",{title:"phone number"}).html(locations[locationCode].phone) 
            )
        )
        .append(
          jQuery("<div/>")
            .html(
              jQuery("<span/>",{title:"email address"}).html(locations[locationCode].email)  
            )
        )
    );
    for(var a=1;a<=6;a++){
      var timeHolder = jQuery("#timeContainer"+a);
      timeHolder.html(locations[locationCode]["time"+a]);
        if(dayOfWeek == a){
          jQuery("#dayBox"+a).addClass("color1").removeClass("color4");
        }
    }
    var offset = me.offset();
    //$(".highlightSelect").css({"top":offset.top-5,"left":offset.left-5,"height":me.outerHeight(true),"width":me.outerWidth(true)-5}).show();
    //$(".highlightSelect").css({"transform":"translate("+offset.left-5+","+offset.top-5+")","height":me.outerHeight(true),"width":me.outerWidth(true)-5}).show(); 
}


jQuery(".headerButton").bind("click",function(){
  me = jQuery(this);
  jQuery(".headerButton").removeClass("color2").addClass("color560");
  me.toggleClass("color2 color560");
  displayLocation(me,jQuery("#locationDisplay"));
});
jQuery("#MA").trigger("click");
jQuery(".mapIcon").bind("click",function(){
  me = jQuery(this);
  me.toggleClass("mapIconZoom");
});
/*
jQuery("body").append($("<div/>",{"class":"highlightSelect"}));
jQuery(".locationHover")
  .mouseenter(function(){displayLocation(jQuery(this),jQuery("#locationDisplay"));})
  .mouseleave(function(){});
//This makes sure something is being shown
displayLocation(jQuery(".locationHover"),jQuery("#locationDisplay"));
*/