<?php
/**
 * Created by PhpStorm.
 * User: wudan
 * Date: 2015/7/14
 * Time: 9:57
 */
header("Content-Type: text/html;charset=utf-8");
include "conn.php";
$qry = 'select * from menu where flag = 0';
$row = $dbh->query($qry);
//$dbh ->query("set names utf8");
foreach ($row as $tmp) {
    echo "$tmp[0] ";
    echo "$tmp[1] ";
    if (!empty($tmp[2])) {
        echo "$tmp[2]";
    } else {
        echo "no pic!";
    }

    echo "<br />";
}
