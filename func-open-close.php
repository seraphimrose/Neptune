<?php

    session_start();

/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/17
 * Time: 10:27
 */

include("conn.php");
include("func-check-login.php");

if( $login = true && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1 ) {
    include("func-get-state.php");
    if( $state == 1 ) {
        $stmt = $dbh->prepare("UPDATE `neptune`.`system_state` SET `isOpen` = '0' WHERE `system_state`.`id` = ?;");
        $stmt->execute(array(1));
        include("func-day-pass.php");
        //echo "kaiqi";
    }
    else {
        $stmt = $dbh->prepare("UPDATE `neptune`.`system_state` SET `isOpen` = '1' WHERE `system_state`.`id` = ?;");
        $stmt->execute(array(1));
        //echo "guanbi";
    }
}