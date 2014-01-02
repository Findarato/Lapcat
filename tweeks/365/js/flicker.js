function displayFlickr(flickrTag,flickrId){
  $(".laporte365").append(jQuery("<div/>",{"class":"flickr365","id":"flickr365"}));
  var flickrContainer = $(".flickr365");
      flickrContainer
        .append(jQuery("<div/>",{"class":"newestSlideWrapper","id":"slideWrapper365"}));
  //flickrContainer.appendTo(".laporte365");
  var display = 5;
  // lets make sure we have some defaults in so that if the user just calls the function it works
  if(flickrTag == undefined)
    flickrTag = "365";
  if(flickrId == undefined)
    flickrId = '62092835@N08';
    jQuery.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
      {
        id: flickrId,
        tags: flickrTag,
        format: "json"
      },
    function(data) {
            jQuery.each(data.items, function(i,item){
          if(i<display){
                jQuery(".newestSlideWrapper")
                  .append(jQuery("<section/>",{"class":"newestSlide"+i}));
                insertPoint = jQuery(".newestSlide"+i);
                               
                jQuery('<div><img src="'+item.media.m+'" alt="'+item.title+'"></div>')
              .appendTo(insertPoint);
          }
        });
        var scroller = new FTScroller(document.getElementById("slideWrapper365"), {
          scrollingY:false,
          snapping:false,
          scrollbars:true,
          brouncing:true,
          updateOnWindowResize:true
        });

        var previousLeft = 0;
        scroller.addEventListener('reachedend',function(i){
          console.log("reached the end");
          scroller.scrollTo(0,0);
          //scroller.scrollBy(scroller.scrollLeft*-1,0,750);
          console.log(scroller.scrollLeft);
          setTimeout(function(){scroller.scrollLeft = 0;},800);
          
        },true);
        setInterval(function(){
          if(!scroller.scroll){
            scroller.scrollBy(300,0,750);
          }
        },5000);






    });
}
displayFlickr("teens");





 
/*
alert("test");
var container = jQuery("#flickr365"); 
var covers = container.children();
var page = 6;
var counter = 0;
container.empty();
container
  .append(
    jQuery("<div/>",{"class":"newestSlideWrapper","id":"slideWrapper"})
  );
jQuery.each(covers,function(i,item){
  var newItem = jQuery(item);
  if(counter==0){
    jQuery(".newestSlideWrapper")
      .append(
        jQuery("<section/>",{"class":"newestSlide"+i})
     );
    insertPoint = jQuery(".newestSlide"+i);
  }
  insertPoint.append(newItem);
  if(page-1==counter){counter=0;}else{counter++;}
});
*/
