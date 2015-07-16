<?php
session_start();

include_once "func-check-login.php";
if ($login) {
    echo "评论成功";
    include "conn.php";
    $userid = $_SESSION['user_id'];
    $dishid = $_POST['dish_id'];
    $content = $_POST['content'];
    $status = null;
    $insrt = "INSERT INTO comment(id, user_id, dish_id, time,content) VALUES (null,'$userid','$dishid',NOW(),'$content')";
    $res = $dbh->query($insrt);
}

