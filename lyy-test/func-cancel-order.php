<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 10:16
 */
include("connect-db.php");

function delete_order($order_id, $dbh) {
    $ret = $dbh->exec("DELETE FROM `neptune`.`order` WHERE `order`.`id` = $order_id");
    echo $ret;
    if($ret != 1){
        $status['status'] = false;
    } else {
        $status['status'] = true;
    }
    echo json_encode($status);
}

