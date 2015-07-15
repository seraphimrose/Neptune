<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/15
 * Time: 10:08
 */
session_start();
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set('prc');
include "conn.php";
include_once "lyy-test/func-login-check.php";
if ($login) {
    $userid = $_SESSION['user_id'];
    $dishid = "1";////////////
    $content = "我就是说想试试。";///////////
    $time = time();
    $mysqltime = date('Y-m-d H:i:s', $time);
    $status = null;
    $insrt = "INSERT INTO comment(id, user_id, dish_id, time,content) VALUES (null,'$userid','$dishid','$mysqltime','$content')";
    $res = $dbh->query($insrt);
    if ($dbh === false) {
        $status["status"] = false;
    } else {
        $status["status"] = true;
    }
}

