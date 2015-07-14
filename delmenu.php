<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/14
 * Time: 9:56
 */
include "conn.php";
$id = "14";
$del = "update menu set flag = 1 where id = '$id' ";//ok
$dbh->query($del);
$dbh = null;
