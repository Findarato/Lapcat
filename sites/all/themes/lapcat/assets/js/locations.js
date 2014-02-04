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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.609126,-86.721036&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         //"map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.609126,-86.721036&zoom=18&size=300x145&markers=41.609126,-86.721036,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f186aedafe3350d0",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.665805,-86.836627&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
//         "map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.665805,-86.836627&zoom=18&size=500x350&markers=41.665805,-86.836627,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1869f04a56d1f0e",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.565039,-86.544764&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         //"map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.565039,-86.544764&zoom=18&size=500x350&markers=41.565039,-86.544764,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1867816fd79f0ce",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.414117,-86.780147&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         //"map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.414117,-86.780147&zoom=18&size=500x350&markers=41.414117,-86.780147,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1864f5f74b3d29a",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.481936,-86.695347&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         //"map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.481936,-86.695347&zoom=18&size=500x350&markers=41.481936,-86.695347,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1866d31e1acd702",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.673963,-86.617124&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         //"map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.673963,-86.617124&zoom=18&size=500x350&markers=41.673963,-86.617124,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f18687b088564839",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.491091,-86.771871&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         //"map":"http://dev.laportelibrary.org/tweeks/staticmaplite/staticmap.php?center=41.491091,-86.771871&zoom=18&size=500x350&markers=41.491091,-86.771871,ol-marker-green",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1865eaf35b544cb",
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
         "map":"http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=300x145&sensor=true&format=jpg&markers=color:0x5f3e12|41.609126,-86.721036&key=AIzaSyAJ86NxojnWWGVk6Sx8s_VKgoHEWgvmVt0",
         "mapLink":"http://maps.google.com/maps/ms?msid=214616702461070085731.00049f1861117f5fba412&msa=0&iwloc=00049f1869f04a56d1f0e",
         "email":"<a href='/downloads/mobilelibraryschedule.pdf'><span class='icon-bus'></span> Schedule</a>"
         
      }
};
var mz = jQuery(".mapZoom");
function displayLocation(me,domElementSelector){
  var today = new Date();
  var dayOfWeek = today.getDay();
  locationCode = me.attr("id");
  if(jQuery("#mapIcon").hasClass("icon-zoom-out")){
    jQuery(".mapZoom").css("background-image","url("+locations[locationCode].map+")");;  
  }
  jQuery(".mapZoom").attr("data-map",locations[locationCode].map);
  mz.attr("href",locations[locationCode].mapLink);
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
}


jQuery(".headerButton").bind("click",function(){
  me = jQuery(this);
  jQuery(".headerButton").removeClass("color2").addClass("color560");
  me.toggleClass("color2 color560");
  displayLocation(me,jQuery("#locationDisplay"));
  
});
jQuery("#MA").trigger("click");

jQuery("#mapIcon").bind("click",function(){
  me = jQuery(this);
  me.parent().toggleClass("mapDisplayZoom");
  var MZ =jQuery(".mapZoom"); 
  MZ.css("background-image","url("+MZ.attr("data-map")+")");
  me.toggleClass("icon-zoom-in icon-zoom-out");
  return false;
});