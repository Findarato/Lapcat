
var container = jQuery(".coverSlider"); 
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
      updateOnWindowResize:true
      
    });
    
$(".scrollerBack>a").click(function(){
  scroller.scrollBy(-200,0,500);
  return false;
});

$(".scrollerNext>a").click(function(){
  scroller.scrollBy(200,0,500);
  return false;
});
var previousLeft = 0;
scroller.addEventListener('reachedend',function(i){
  scroller.scrollTo(0,0,750);
  scroller.scrollLeft = 0;
},true);
setInterval(function(){
  if(!scroller.scroll){
    scroller.scrollBy(200,0,500);
  }
},2000);
