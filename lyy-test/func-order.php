<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 9:32
 */

include("connect-db.php");

function order_dish($usr_id, $dish_id, $dbh)
{
    $stmt = $dbh->prepare("INSERT INTO `neptune`.`order` (`id`, `user_id`, `dish_id`, `time`, `reserve`) VALUES (NULL, ?, ?, NOW(), '0');");
    $ret = $stmt->execute(array($usr_id, $dish_id));

    if($ret === false){
        $status['status'] = false;
    } else {
        $getid = "SELECT * FROM `order` WHERE id = (SELECT MAX(id) FROM `order`)";
        $nid = $dbh->query($getid);
        $row = $nid ->fetch();

        $status['id'] = $row['id'];
        $status['user_id'] = $row['user_id'];
        $status['dish_id'] = $row['dish_id'];
        $status['time'] = $row['time'];
        $status['status'] = true;
    }
    echo json_encode($status);

}

order_dish(3, 4, $dbh);



?>