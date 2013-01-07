Array.prototype.getUnique = function(){
   var u = {}, a = [];
   for(var i = 0, l = this.length; i < l; ++i){
      if(this[i] in u)
         continue;
      a.push(this[i]);
      u[this[i]] = 1;
   }
   return a;
}

function displayFlickr(flickrTag,flickrId){
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
          $("<div/>",{"class":"flickrPicture smoothAnimate roundAll3",css:{"display":"inline-block","position":"relative"}})
              .html(
                  $("<a/>",{"html":"&nbsp;","class":"roundAll3"})
                    .css({"background-image":"url("+item.media.m+")"})
                    .attr({"href":item.link,"title":item.title})  
              )
              .appendTo("#flickerPictureBox");
        });
    });
}
if($("#flickerPictureBox").html()){
 displayFlickr("teens"); 
}

displayFlickr("teens");