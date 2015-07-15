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

    $(".navbar-nav li").on("click",function(){

        $(".navbar-nav li").removeClass("active");
        $(this).addClass("active");
        switch ($(this).attr("id")){
            case "menu":$(".content").load("menu.php");break;
            case "modify":$(".content").load("modify.php");break;
            case "list":$(".content").load("order.php");break;
            case "comment":$(".content").load("lyy-test/comment.php");break;
            case "show-logout":$("#empty").load("lyy-test/func-logout.php",
                {},
                function(data,status){
                    alert(data);
                    window.location.reload();
                });break;
        }


    });
});
$(document).ready(function(){
    $("div.content").load("menu.php");
});

$(document).ready(function(){
    $("button.login-submit").click(function(){
        id = $("[name='id']").val();
        password = $("[name='password']").val();

        if (id.length > 0 && password.length > 0) {
            $.post("lyy-test/func-login.php",
                {
                    id: id,
                    password: password
                },
                function (data, status) {
                    alert(data);
                    window.location.reload();
                });
        }
        else {
            alert(" ‰»ÎŒ™ø’");
        }
    });
});



