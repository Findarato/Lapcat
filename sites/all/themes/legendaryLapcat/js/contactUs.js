var weekday = ["Sunday","Monday","Tuesday","Wednesday",'Thursday',"Friday","Saturday"];
var locations={
      "IT":{
         "ID":1,
         "name":"Rebecca Tomerlin",
         "email":"rtomerlin@lapcat.org",
         "street":"904 Indiana Avenue",
		     "street2":"",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156 ext 349"
      },
      "Dir":{
         "ID":2,
         "name":"Fonda Owens",
         "email":"fowens@lapcat.org",
         "street":"904 Indiana Avenue",
		     "street2":"",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156 ext 316"
      },
      "AS":{
         "ID":3,
         "name":"Monicah Fratena",
         "email":"mfratena@laportelibrary.org",
         "street":"904 Indiana Avenue",
		     "street2":"",         
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156 ext 327"
      },
      "YS":{
         "ID":4,
         "name":"Susan Bannwart",
         "email":"sbannwart@lapcat.org",
         "street":"904 Indiana Avenue",
		     "street2":"",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156 ext 329"
      },
      "Ext":{
         "ID":5,
         "name":"Elizabeth Johnson",
         "email":"ejohnson@laportelibrary.org",
         "street":"904 Indiana Avenue",
		     "street2":"",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156 ext 319"
      },
      "HR":{
         "ID":6,
         "name":"Cindy Lane",
         "email":"clane@lapcat.org",
		     "street2":"",
         "street":"904 Indiana Avenue",
         "cityState":"La Porte, IN",
         "zip":"46350",
         "phone":"(219) 362-6156 ext 322"
      }
     /*
      "Hours":{
         "ID":6,
         "name":"<a href='/hours#MA'>Main Library</a>",
         "email":"<a href='/hours#CS'>Coolspring</a>",
         "street":"<a href='/hours#RP'>Rolling Prairie</a>",
         "street2":"<a href='/hours#FL'>Fish Lake</a>",
         "cityState":"<a href='/hours#KH'>Kingsford Heights</a>",
         "zip":"<a href='/hours#UM'>Union Mills</a>",
         "phone":"<a href='/hours#HA'>Hanna</a>",
	  }*/



};

function displayLocation(me,domElementSelector){
  var today = new Date();
  var dayOfWeek = today.getDay();
  locationCode = me.attr("id"); 
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
              jQuery("<span/>",{title:"address2"}).html(locations[locationCode].street2) 
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
          jQuery("#dayBox"+a).addClass("color1").removeClass("color4")
        }
    }
    var offset = me.offset();
    $(".highlightSelect").css({"top":offset.top-5,"left":offset.left-5,"height":me.outerHeight(true),"width":me.outerWidth(true)-5}).show();
}

jQuery(document).ready(function(){
  jQuery("body").append($("<div/>",{"class":"highlightSelect smoothAnimate insideBoxShadow roundAll3",css:{"cursor":"default","display":"none","position":"absolute","top":0,"left":0}}))
  jQuery(".locationHover")
    .mouseenter(function(){displayLocation(jQuery(this),jQuery("#locationDisplay"));})
    .mouseleave(function(){});
  //This makes sure something is being shown
  displayLocation(jQuery(".locationHover"),jQuery("#locationDisplay"));
});