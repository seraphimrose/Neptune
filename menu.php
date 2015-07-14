<script src="js/jquery-2.1.4.min.js"></script>
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
            <?php
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=neptune', "root", "");
                $dbh->query("set names utf8");
                foreach ($dbh->query('SELECT * from menu where flag = 0') as $tmp) :
                    ?>
                    <div class="table-bordered menu_items">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name="menu" value="option1" class="hide"/>
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
                                <button class="btn btn-primary comment"><span
                                        class="glyphicon glyphicon-comment"></span></button>
                            </div>
                            <div class="col-md-1">
                                <span class="glyphicon glyphicon-ok hide" style="color:green;margin:10px;"></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
            }
            ?>
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning" type="submit" style="position: fixed;margin-top:200px;">就吃这个了！</button>
        </div>
    </form>
</div>
