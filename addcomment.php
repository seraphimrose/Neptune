<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set('prc');
include "conn.php";
include_once "lyy-test/func-check-login.php";
if ($login) {
    //echo "评论成功";
    $userid = $_SESSION['user_id'];
    $dishid = $_POST['dish_id'];
    $content = $_POST['content'];
    $time = time();
    $mysqltime = date('Y-m-d H:i:s', $time);
    $status = null;
    $insrt = "INSERT INTO comment(id, user_id, dish_id, time,content) VALUES (null,'$userid','$dishid','$mysqltime','$content')";
    $res = $dbh->query($insrt);
}

