/*
$(function() {
    $.ajax({
      type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/users/896925642/media/recent/?access_token=896925642.5b9e1e6.03f6c9f01b8246ee9cf61c4140dafb7e",
        success: function(data) {
            for (var i = 0; i < <?=$num_to_display?>; i++) {
              $(".instagram")
                .append("<div class='instagram-placeholder'><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div>");   
            }     
        }
    });
});
*/

jQuery(function () {
  $(".laporte365").append(jQuery("<div/>", {
    "class": "flickr365",
    "id": "flickr365"
  }));
  var flickrContainer = $(".flickr365");
  flickrContainer
    .append(jQuery("<div/>", {
      "class": "newestSlideWrapper",
      "id": "slideWrapper365"
    }));
  //flickrContainer.appendTo(".laporte365");
  var num_to_display = 3;
  // lets make sure we have some defaults in so that if the user just calls the function it works
  $.ajax({
    type: "GET",
    dataType: "jsonp",
    cache: false,
    url: "https://api.instagram.com/v1/users/896925642/media/recent/?access_token=896925642.5b9e1e6.03f6c9f01b8246ee9cf61c4140dafb7e",
    success: function (data) {
      for (var i = 0; i < num_to_display; i++) {
          jQuery(".flickr365 .newestSlideWrapper")
            .append(insertPoint = jQuery("<section/>", {
              "class": "newestSlide" + i
            }));
          jQuery('<div><a target="_blank" href="' + data.data[i].link +'"><img height=278px width=278px src="' + data.data[i].images.low_resolution.url + '" alt="' + data.data[i].caption.text + '"></a></div>')
            .append("<div class='scollerCaption'>"+data.data[i].caption.text+"</div>")
            .appendTo(insertPoint);
      }
      var scroller = new FTScroller(document.getElementById("slideWrapper365"), {
        scrollingY: false,
        snapping: true,
        scrollbars: true,
        brouncing: true,
        updateOnWindowResize: true
      });

      /*
      var previousLeft = 0;
      scroller.addEventListener('reachedend', function (i) {
        console.log("reached the end");
        scroller.scrollTo(0, 0);
        //scroller.scrollBy(scroller.scrollLeft*-1,0,750);
        console.log(scroller.scrollLeft);
        setTimeout(function () {
          scroller.scrollLeft = 0;
        }, 800);

      }, true);
      /*
      
      /*
      setInterval(function () {
        if (!scroller.scroll) {
          scroller.scrollBy(300, 0, 750);
        }
      }, 10000);
      */
    }
  });

});