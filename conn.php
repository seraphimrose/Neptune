<?php
header("content_type:text/html; charset = utf_8");
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/13
 * Time: 16:24
 */
$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'neptune';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = '';          //对应的密码
$dsn = "$dbms:host=$host;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    // echo "成功连接!<br/>";
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
$dbh->query('set names utf8;');
?>