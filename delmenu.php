<?php
/**
 * Created by PhpStorm.
 * User: wudan
 * Date: 2015/7/14
 * Time: 9:56
 */
include "conn.php";
$id = "27";//
$del = "update menu set flag = 1 where id = '$id' ";//ok
$dbh->query($del);

if ($dbh === false) {
    $status["status"] = false;
} else {
    $status["status"] = true;
}
$dbh = null;
echo json_en($status);
function json_en($val)
{
    return json_encode($val);
}
