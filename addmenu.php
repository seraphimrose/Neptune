<?php
/**
 * Created by PhpStorm.
 * User: wudan
 * Date: 2015/7/14
 * Time: 9:44
 */
header("Content-Type: text/html;charset=utf-8");
include "conn.php";
$name = "kaola";
$picture = "C:/Users/Public/Pictures/Sample Pictures/kaola.jpg";
$insrt = "INSERT INTO menu(id, name, picture, flag) VALUES (null,'$name','$picture',0)";
//$dbh ->query("set names utf8");
$dbh->query($insrt);

