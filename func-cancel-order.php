<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 10:16
 */
include("conn.php");
session_start();

include_once("func-check-login.php");

if( $login ) {
    $order_id = $_POST['order_id'];

    $ret = $dbh->exec("DELETE FROM `neptune`.`today_order` WHERE `today_order`.`id` = $order_id");
    echo $ret;
    if ($ret != 1) {
        echo "取消订单失败";
    } else {
        echo "取消订单成功";
    }
}

?>
