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
                <?php echo $urt[1] ?><!-- �ŷ� :����id���Ӻ�̨��ȡ�û���  -->
            </div>
            <?php
        }
        ?>
        <div class="col-md-10">
            <?php echo $cmt[4] ?> <!-- ��˷ǳ��ѳ�:���Ӻ�̨��ȡ����  -->
        </div>
        <p style="color:gray;margin-top:15px;">
            <?php echo $cmt[3] ?>
        </p>
    </div>
    <?php
}
?>
