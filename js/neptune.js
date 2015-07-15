/**
 * Created by Administrator on 15-7-13.
 */

$(document).ready(function () {
    $("div.content").load("menu.php");


    $(".navbar-nav li").on("click", function () {

        $(".navbar-nav li").removeClass("active");
        $(this).addClass("active");
        switch ($(this).attr("id")) {
            case "menu":
                $(".content").load("menu.php");
                break;
            case "modify":
                $(".content").load("modify.php");
                break;
            case "list":
                $(".content").load("order.php");
                break;
            case "comment":
                $(".content").load("comment.php");
                break;
        }
    });

});