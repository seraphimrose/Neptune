<?php
/**
 * Created by PhpStorm.
 * User: wudan
 * Date: 2015/7/14
 * Time: 9:44
 */
header("Content-Type: text/html;charset=utf-8");
include "conn.php";
$name = $_POST['dishname'];
$picture = $_POST['picture'];
$desc = $_POST['desc'];
$status = null;
$insrt = "INSERT INTO menu(id, dishname, picture, flag,description) VALUES (null,'$name','$picture',0,'$desc')";
$res = $dbh->query($insrt);
if ($dbh === false) {
    $status["status"] = false;
} else {
    $getid = "select max(id) from menu";
    $nid = $dbh->query($getid);
    $row = $nid->fetch();
    $status["id"] = $row;
    $status["status"] = true;
}
$dbh = null;
echo json_en($status);

function json_en($val)
{
    return json_encode($val);
}
