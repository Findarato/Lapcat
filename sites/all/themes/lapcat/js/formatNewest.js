
var container = jQuery(".view-new-dvd-slider"); 
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

    var scroller = new FTScroller(document.getElementById('slideWrapper'), {
      scrollingY: false,
      snapping: false,
      scrollbars: true,
      brouncing:false,
      alwaysScroll:false,
      updateOnWindowResize:true
    });