<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/15
 * Time: 11:47
 */

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
        <div class="col-md-10">
            <?php echo $cmt[4] ?> <!-- 这菜非常难吃:链接后台获取评论  -->
        </div>
        <p style="color:gray;margin-top:15px;">
            <?php echo $cmt[3] ?>
        </p>
    </div>
    <?php
}
?>
