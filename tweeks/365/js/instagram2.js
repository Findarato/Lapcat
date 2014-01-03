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