<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/15
 * Time: 10:08
 */
header("Content-Type: text/html;charset=utf-8");
include "conn.php";

$qry = 'select * from comment where dish_id = 1';
$row = $dbh->query($qry);

foreach ($row as $tmp) {
    echo "$tmp[1] ";
    echo "$tmp[3] ";
    echo "$tmp[4] ";


    echo "<br />";
}