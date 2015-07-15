<?php
session_start();
include("connect-db.php");

if (!isset($_SESSION['user_id'])) {
    echo "未登录";
} else {
    $stmt = $dbh->prepare("INSERT INTO `neptune`.`tucao` (`id`, `user_id`, `time`, `content`) VALUES (NULL, ?, NOW(), ?);");
    $ret = $stmt->execute(array($_SESSION['user_id'], $_POST['tc']));

    if ($ret === false) {
        $status['status'] = false;
        echo "吐槽失败";
    } else {
        $status['status'] = true;
        echo "吐槽成功";
    }
}