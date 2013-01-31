//$("#blogContainerBox").append($("</div>",{"id":"researchAdultContainerBox"}));
var adultContainer = $(".view-research");
var adultCategories = new Array();
$(".researchInfoBasic").hide();
$(".researchList").find("img").hide();
$(".researchList").each(function(i,item){
  //item = $(item);
  if(item.className.indexOf(" ")){ // we have more than one category
    tempArray = item.className.split(" ");
    $.each(tempArray,function(i2,item2){
      if(item2 !="researchList")
        adultCategories.push(item2);
    });
  }else{
    adultCategories.push(item.className);
  }
});

$.each($(".hoverCard"),function(h,card){
  me=$(card);
  me.show();
  me.hovercard({"detailsHTML":me.next().next().text()+"<br><a href='"+me.attr("data-link")+"'> even more info</a>","width":"400px","cardImgSrc":me.next().attr("src")});
  
})
adultCategories.sort();
adultCategories = adultCategories.getUnique();
var categoryBox = $("<div/>",{"class":"subTitleElement",css:{"margin-top":"8px","width":"100%"}});
$.each(adultCategories,function(i,item){
  if(item.length>1){// lets not have random spaces or one letter categories
  categoryBox
    .append(
      $("<a/>",{"html":item,"class":"roundAll3 insideBoxShadow color560 "+item+"Menu"})
        .css({"padding":"5px","margin":"2px","cursor":"pointer"})
        .click(function(){
          var me = $(this);
          $(".researchList").fadeOut("fast").delay("200");
          $(".subTitleElement a.color2").removeClass("color2").addClass("color560")
          me.addClass("color2").removeClass("color560");
          $("."+item).fadeIn("fast");
          return false;
      })
    );
  }
});
adultContainer.prepend(categoryBox);