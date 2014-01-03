<?
$user_id = "896925642"; //userid
$num_to_display = "1"; //instagram limits to max 20, but you can do less for your layout.
$access_token = "896925642.5b9e1e6.03f6c9f01b8246ee9cf61c4140dafb7e"; 
?>

<style>
.instagram-placeholder {
float: left;
}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<div class="instagram"></div>

<script>

//HELP FROM HERE... THANKS!
//https://forrst.com/posts/Using_the_Instagram_API-ti5

// small = + data.data[i].images.thumbnail.url +
// resolution: low_resolution, thumbnail, standard_resolution

$(function() {
    $.ajax({
    	type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/users/896925642/media/recent/?access_token=896925642.5b9e1e6.03f6c9f01b8246ee9cf61c4140dafb7e",
        success: function(data) {
            for (var i = 0; i < <?=$num_to_display?>; i++) {
        $(".instagram").append("<div class='instagram-placeholder'><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div>");   
      		}     
                            
        }
    });
});

</script>

