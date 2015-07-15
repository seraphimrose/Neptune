<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 9:32
 */

include("connect-db.php");
session_start();

include_once("func-check-login.php");

if( $login ) {
    $usr_id = $_SESSION['user_id'];
    $dish_id = $_POST['dish_id'];
    $stmt = $dbh->prepare("INSERT INTO `neptune`.`today_order` (`id`, `user_id`, `dish_id`, `time`, `reserve`) VALUES (NULL, ?, ?, NOW(), '0');");
    $ret = $stmt->execute(array($usr_id, $dish_id));

    if ($ret === false) {
        echo "点餐失败";
    } else {
        echo "点餐成功";
    }
}



?>