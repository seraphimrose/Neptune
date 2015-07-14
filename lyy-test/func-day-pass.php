<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 10:40
 */

include("connect-db.php");

$orders = $dbh->query("SELECT * FROM `order`");
foreach($orders as $row) {
    // print_r($row);
    if($row['reserve'] == 0) {
        $stmt = $dbh->prepare("INSERT INTO `neptune`.`history_order` (`id`, `user_id`, `dish_id`, `time`, `reserve`) VALUES (?, ?, ?, ?, '0');");
        $ret = $stmt->execute(array($row['id'], $row['user_id'], $row['dish_id'], $row['time']));
        $dbh->query("DELETE FROM `order` WHERE id = " . $row['id']);
    }
}