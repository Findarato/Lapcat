//loadFlicker("62092835@N08");
$(window).load(function(){
	wowbraryImageLinks("http://www.wowbrary.org/rss.aspx?l=8711&c=EBO",$("#topBooks").find(".slides"),true,"Newest eBooks",10); 
});
$.each($(".hoverCard"),function(h,card){
  me=$(card)
  me.next().hide();
  me.hovercard({"detailsHTML":me.next().html()+"<br>","width":"200px","cardImgSrc":""});
});
