<head>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="application/javascript">

    </script>
</head>


<?php
include("conn.php");
foreach ($dbh->query("SELECT * from comment where dish_id = '$_POST[dish_id]' ORDER BY time DESC") as $cmt) {
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
        <div class="col-md-offset-1 col-md-9 ">
            <?php echo $cmt[4] ?> <!-- 这菜非常难吃:链接后台获取评论  -->
        </div>
        <p style="color:gray;margin-top:15px;">
            <?php echo $cmt[3] ?> <!-- 后台获取评论时间 -->
        </p>
    </div>
    <?php
}
?>
