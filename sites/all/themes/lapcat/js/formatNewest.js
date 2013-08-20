
var container = $(".view-new-dvd-slider"); 
var covers = container.children();
var page = 6;
var counter = 0;
container.empty();
container
  .append(
    $("<div/>",{"class":"newest-SlideWrapper",css:{"display":"block"}})
  );
$.each(covers,function(i,item){
  var newItem = $(item);
  if(counter==0){
    $(".newest-SlideWrapper")
      .append(
        $("<section/>",{"class":"newest-Slide"+i})
     );
    insertPoint = $(".newest-Slide"+i);
  }
  
  
  insertPoint.append(newItem);
  if(page==counter){counter=0;}else{counter++;}
  
});

var scroller = new FTScroller(document.getElementsByClassName('newest-SlideWrapper'), {
  scrollingY: false,
  snapping: true,
  scrollbars: false
});