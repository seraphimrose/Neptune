<?php
session_start();
include("conn.php");

include_once("func-check-login.php");

if( $login ) {
    $stmt = $dbh->prepare("INSERT INTO `neptune`.`tucao` (`id`, `user_id`, `time`, `content`) VALUES (NULL, ?, NOW(), ?);");
    $ret = $stmt->execute(array($_SESSION['user_id'], $_POST['tc']));

    if($ret === false){
        $status['status'] = false;
        echo "吐槽失败";
    } else {
        $status['status'] = true;
        echo "吐槽成功";
    }
}