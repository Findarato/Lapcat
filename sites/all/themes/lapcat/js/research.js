
var adultContainer = jQuery(".adultResearch");
if(adultContainer.html() == null){
  var adultContainer = jQuery(".view-educators-research");
  if(adultContainer.html() == null){
    var adultContainer = jQuery(".view-homework-help");
    if(adultContainer.html() == null){
//    	var adultContainer = jQuery(".view-history-research");
    }
  }
}
var adultCategories = new Array();

if(jQuery('body').innerWidth()>960){
  jQuery(".researchInfoBasic").hide();
  jQuery(".researchList").find("img").hide();
  jQuery(".researchList").each(function(i,item){
    //item = jQuery(item);
    if(item.className.indexOf(" ")){ // we have more than one category
      tempArray = item.className.split(" ");
      jQuery.each(tempArray,function(i2,item2){
        if(item2 !="researchList")
          adultCategories.push(item2);
      });
    }else{
      adultCategories.push(item.className);
    }
  });

  jQuery.each(jQuery(".hoverCard"),function(h,card){
    me=jQuery(card);
    me.show();
    me.hovercard({"background":"#f1f1f1 url(/sites/all/themes/lapcat/less/images/grey.png)","detailsHTML":me.next().next().text()+"<br><a href='"+me.attr("data-link")+"'> even more info</a>","width":"400px","cardImgSrc":me.next().attr("src")});
  });  
}else{}

adultCategories.sort();
adultCategories = adultCategories.getUnique();
var categoryBox = jQuery("<div/>",{"class":"subTitleElement",css:{"margin-top":"8px","width":"100%"}});
jQuery.each(adultCategories,function(i,item){
  if(item.length>1){// lets not have random spaces or one letter categories
  categoryBox
    .append(
      jQuery("<a/>",{"html":item,"class":"roundAll3 insideBoxShadow color560 "+item+"Menu"})
        .css({"padding":"5px","margin":"2px","cursor":"pointer"})
        .click(function(){
          var me = jQuery(this);
          jQuery(".researchList").fadeOut("fast").delay("200");
          jQuery(".subTitleElement a.color2").removeClass("color2").addClass("color560")
          me.addClass("color2").removeClass("color560");
          jQuery("."+item).fadeIn("fast");
          return false;
      })
    );
  }
});
adultContainer.prepend(categoryBox);
$(".AllMenu").trigger("click");
