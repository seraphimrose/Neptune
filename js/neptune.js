/**
 * Created by Administrator on 15-7-13.
 */
$(document).ready(function(){
    $(".menu_items").on("click",function(){

        $(this).css("background-color","#FFCC99").find("[name='menu']").attr("checked","true");
        $(this).find(".glyphicon-ok").removeClass("hide");
        $(this).siblings(".menu_items").css("background-color","#FFFFFF").find(".glyphicon-ok").addClass("hide");

    }).on("mouseover",function() {
            $(this).css({"cursor":"hand"});
    }).on("mouseout",function(){
            $(this).css({"cursor":"pointer"});
    });
});