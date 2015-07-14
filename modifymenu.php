<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/14
 * Time: 15:02
 */
date_default_timezone_set('prc');

include "conn.php";
try {
//        $id = $_POST["id"];//从前台获取id，进而获取其他修改信息
    $id = 7;
    $picture = "jpg/4.jpg";
    $desc = "youyouy又由于";
    $name = "新的";
    $modify = "update menu set dishname = '$name',picture = '$picture',description = '$desc' where id = '$id' ";
    $dbh->query($modify);

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}
