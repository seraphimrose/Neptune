<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/14
 * Time: 9:12
 */
try{
    $dbh = new PDO('mysql:host=localhost;dbname=neptune', "root", "");
    $dbh ->query("set names utf8");
}catch(PDOException $e) {
    print "Error!: " . $e->getMessage() ;
    die();
}

?>





