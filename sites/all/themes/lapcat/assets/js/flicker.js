function displayFlickr(flickrTag,flickrId){
  var flickrContainer = $("<ul/>",{"class":"imageGrid"});
  var display = 8;
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
          if(i<display){
                $("<li/>") 
                  .html(
                    '<div><img src="'+item.media.m+'" alt="'+item.title+'"></div>'
                      /*
                      .append(
                        $("<figcaption/>")
                         // .html("<h3>"+item.title+"</h3>")
                         // .append("<span>"+item.author+"</span>")
                          .append('<a href="'+item.link+'">Take a look</a>')
                       
                      )
                    /*
                    $("<a/>",{"html":"&nbsp;","class":"roundAll3"})
                      .css({"background-image":"url("+item.media.m+")"})
                      .attr({"href":item.link,"title":item.title})
                      */  
                  )
              .appendTo(flickrContainer);
          }
        });
    });
    flickrContainer.appendTo(".laporte365");
}
displayFlickr("teens");