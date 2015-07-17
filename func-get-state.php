<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/17
 * Time: 10:31
 */

include("conn.php");

    $stmt = $dbh->prepare("SELECT * FROM system_state where id = ?");
    $stmt->execute(array(1));
    $row = $stmt->fetch();
    $state = $row['isOpen'];
    // echo $state;
