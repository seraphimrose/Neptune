<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function show_cmt(dish_id) {
        $.post("fetchComment.php", {dish_id: dish_id},
            function (data, status) {
                $("#" + dish_id).next(".collapse").find(".comment-content").html(data);
            })
    }
    $(document).ready(function () {
        $("button").focus(function(){this.blur()});
        $(".menu_items").on("click", function () {
            $(this).css("background-color", "#FFCC99").find("input[name='menu']").attr("checked", "checked");
            $(this).find(".glyphicon-ok").removeClass("hide");
            $(this).siblings(".menu_items").css("background-color", "#FFFFFF").find(".glyphicon-ok").addClass("hide");
            $(this).siblings(".menu_items").find("input[name='menu']").removeAttr("checked");
        }).on("mouseover", function () {
            $(this).css({"cursor": "hand"});
        }).on("mouseout", function () {
            $(this).css({"cursor": "pointer"});
        });
        $(".collapse").hide();
        $(".comment").click(function (e) {
            e.stopPropagation();
            if ($(this).parents(".menu_items").next('.collapse').css("display") == 'none') {
                show_cmt($(this).parents(".menu_items").attr("id"));
            }
            $(this).parents(".menu_items").next('.collapse').delay(50).slideToggle();
        });
        $(".well").click(function (e) {
            e.stopPropagation();
        });
        $(".order_submit").click(function() {
            var dish_id = $("input:checked").parents(".menu_items").attr("id");
            $.post("func-order.php", {dish_id: dish_id},
                function (data, status) {
	                if(data=="点餐成功")
                        $.post("orderFinish.php", {dish_id: dish_id},
                            function (data, status) {
                                $(".content").html(data);
                            });
                });
        });
        $(".comment_submit").click(function () {
            var dish_id = $(this).parents(".collapse").prev(".menu_items").attr("id");
            var content = $(this).parents(".collapse").find("textarea").val();
            if (!content) {
                alert("评论不能为空哦~");
            } else {
                $.post("addcomment.php", {
                    dish_id: dish_id,
                    content: content
                }, function (data, status) {
                    alert(data);
                    show_cmt(dish_id);
                })
            }
            $(this).parents(".collapse").find("textarea").val("");
        });

        $(".add_submit").hide();
        $(".delete_submit").hide();
        var state = 1;
        $(".manage_submit").click(function(){
            var order=$(".order_submit");
            var manage=$(this);
            if(state){
                manage.animate({height:'100px',width:'100px',fontSize:'20px'},function(){
                    manage.text("退出管理");
                    $(".add_submit").show();
                    $(".delete_submit").show();
                });
                order.animate({opacity:'0.1'},function(){
                    order.hide();
                })
            }else{
                manage.animate({height:'60px',width:'60px',fontSize:'14px'},function(){
                    manage.text("管理");
                    order.show();
                    order.animate({opacity:'1.0'});
                    $(".add_submit").hide();
                    $(".delete_submit").hide();
                });
            }
            state=!state;
        });
        $(".add_submit").click(function(){
            $("#addModal").modal("show");
        });
        $(".menu_submit").click(function(){
            $.post("addmenu.php",{
                dishname:dishname,
                picture:picture,
                description:description
            },function(data,status){
                alert(data);
                alert(status)
                $(".content").load("menu.php");
            });
        });

        $(".close_popover").click(function(){
            $("#addModal").modal("hide");
        });


        $(".delete_submit").click(function(){
            var dish_id=$("input:checked").parents(".menu_items").attr("id");
            if(confirm("确认删除？")) {
                $.post("delmenu.php", {
                    dish_id: dish_id
                }, function (data, status) {
                    $(".content").load("menu.php");
                });
            };
        });
    });
</script>
<div class="menu_title">
    <h1 style="text-align: center;color: #000033;">今日菜单</h1>
    <hr/>
</div>
<div class="row">
    <form>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            include("conn.php");
            foreach ($dbh->query('SELECT menu.id,menu.dishname,menu.picture,menu.description,COUNT(today_order.user_id) as num
				FROM menu,today_order
				WHERE menu.id=today_order.dish_id AND menu.flag=0
				GROUP BY menu.id') as $tmp) {
                ?>
                <div class="table-bordered menu_items" id="<?php echo $tmp[0] ?>">
                    <input class="sr-only" type="radio" name="menu" value="option"/>

                    <div class="row">
                        <div class="col-md-3">
                            <?php
                            if (!empty($tmp[2])) {
                                ?>
                                <img src="<?php echo $tmp[2] ?>" class="food_pic"/>
                                <?php
                            } else {
                                ?>
                                <img src="jpg\0.gif" class="food_pic"/>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-7">
                            <h4><?php echo $tmp[1] ?></h4><br/>

                            <p><?php echo $tmp[3] ?></p>
                        </div>
                        <div class="col-md-1">
                            <div class="badge" style="margin-top: 20px;"><?php echo $tmp[4] ?>人</div>
                            <button class="btn btn-primary comment" type="button">
                                <span class="glyphicon glyphicon-comment"></span>
                            </button>
                        </div>
                        <div class="col-md-1">
                            <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                        </div>
                    </div>
                </div>
                <div class="collapse">
                    <div class="well show_comment">

                        <div class="row">
                            <div class="col-md-10">
                                <textarea name="content" rows="auto" cols="80" class="comment_form"></textarea>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary comment_submit" type="button" style="margin-top: 5px;">提交</button>
                            </div>
                        </div>

                        <hr style="margin-top: 18px;" class="style-two"/>

                        <div class="comment-content">

                        </div>

                    </div>
                </div>
                <?php
            }
            $dbh = null;
            ?>
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning order_submit" type="button">点餐</button>
            <button class="btn btn-info manage_submit" type="button" style="margin-top:100px">管理</button>
            <button class="btn btn-success add_submit" type="button" style="margin-top:230px;margin-left:18px;">添加</button>
            <button class="btn btn-danger delete_submit" type="button" style="margin-top:310px;margin-left:18px;">删除</button>

        </div>
    </form>
</div>

<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">添加菜单</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> 名称 </label>
                    <input class="form-control" type="text" name="dishname"/>
                </div>
                <div class="form-group">
                    <label> 图片 </label>
                    <input class="form-control" type="file" name="picture"/></div>
                <div class="form-group">
                    <label> 描述 </label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group" style="text-align:center;margin-top:10px;">
                    <button class="btn btn-warning menu_submit" style="margin-right:15px;">提交</button>
                    <button class="btn btn-default close_popover">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>