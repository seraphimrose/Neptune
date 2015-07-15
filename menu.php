
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(".menu_items").on("click", function () {

            $(this).css("background-color", "#FFCC99").find("[name='menu']").attr("checked", "true");
            $(this).find(".glyphicon-ok").removeClass("hide");
            $(this).siblings(".menu_items").css("background-color", "#FFFFFF").find(".glyphicon-ok").addClass("hide");

        }).on("mouseover", function () {
            $(this).css({"cursor": "hand"});
        }).on("mouseout", function () {
            $(this).css({"cursor": "pointer"});
        });
        $(".comment").click(function (e) {
            e.stopPropagation();
            $(this).parents(".menu_items").next('.collapse').collapse("toggle");
        });
        $(".well").click(function (e) {
            e.stopPropagation();
        });
    });


</script>

<div class="menu_title">
    <h1 style="text-align: center;color:#000033">今日菜单</h1>
    <hr/>
</div>
<div class="row">
    <form>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php include "conn.php";
                foreach ($dbh->query('SELECT * from menu where flag = 0') as $tmp) {
                    ?>
                    <div class="table-bordered menu_items">
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

                                <p><?php echo $tmp[4] ?></p>
                            </div>
                            <div class="col-md-1">
                                <div class="badge" style="margin-top: 20px;">12人</div>
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
                        <div class="well">
                            <form>
                                <div class="row">
                                    <div class="col-md-10">
                                        <textarea name="comment" rows="auto" cols="80" class="comment_form"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit">提交</button>
                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <?php
                            foreach ($dbh->query("SELECT * from comment where dish_id = '$tmp[0]'  ") as $cmt) {
                                ?>
                                <div class="row">
                                    <?php
                                    foreach ($dbh->query("SELECT * from user where id = '$cmt[1]'  ") as $urt) {
                                        ?>
                                        <div class="col-md-2" style="color:red;text-align: center;">
                                            <?php echo $urt[1] ?><!-- 张飞 :根据id链接后台获取用户名  -->
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-offset-1 col-md-9">
                                        <?php echo $cmt[4] ?> <!-- 这菜非常难吃:链接后台获取评论  -->
                                    </div>
                                    <p style="color:gray;margin-top:15px;">
                                        <?php echo $cmt[3] ?> <!-- 后台获取评论时间 -->
                                    </p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                }
                $dbh = null;
            ?>
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning" type="submit" style="position: fixed;margin-top:200px;">就吃这个了！</button>
        </div>
    </form>
</div>