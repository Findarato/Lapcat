var container = jQuery(".view-new-dvd-slider"); 
var covers = container.children();
var page = 1;
var counter = 0;
container.empty().css({"position":"relative"});
container
  .append(
    jQuery("<div/>",{"class":"newestSlideWrapper","id":"slideWrapper"})
  );
jQuery.each(covers,function(i,item){
  var newItem = jQuery(item);
  if(counter==0){
    jQuery(".newestSlideWrapper")
      .append(
        jQuery("<section/>",{"class":"newestSlide"+i,css:{"height":"120px","width":"80px"}})
     );
    insertPoint = jQuery(".newestSlide"+i);
  }
  insertPoint.append(newItem);
  if(page-1==counter){counter=0;}else{counter++;}
});

var scroller = new FTScroller(document.getElementById('slideWrapper'), {
  scrollingY:false,
  snapping:false,
  scrollbars:true,
  brouncing:true,
  updateOnWindowResize:true
});

container
  .append(
    $("<div/>",{"class":"scrollerBack"})
      .html(
        $("<a/>",{"html":"Back"})
      )
  )
  .append(
    $("<div/>",{"class":"scrollerNext"})
      .html(
        $("<a/>",{"html":"Next"})
      )
  );
    
$(".scrollerBack").click(function(){
  scroller.scrollBy(-80,0,500);
  return false;
});

$(".scrollerNext").click(function(){
  scroller.scrollBy(80,0,500);
  return false;
});
var previousLeft = 0;
/*
scroller.addEventListener('reachedend',function(i){
  console.log("reached the end");
  scroller.scrollTo(0,0);
  scroller.scrollBy(scroller.scrollLeft*-1,0,750);
  console.log(scroller.scrollLeft);
  setTimeout(function(){scroller.scrollLeft = 0;},800);
  
},true);
setInterval(function(){
  if(!scroller.scroll){
    scroller.scrollBy(300,0,750);
  }
},3000);
*/