<?php
//header("content_type:text/html; charset = utf_8");
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/13
 * Time: 16:24
 */
$dbms = 'mysql';     //���ݿ�����
$host = 'localhost'; //���ݿ�������
$dbName = 'neptune';    //ʹ�õ����ݿ�
$user = 'root';      //���ݿ������û���
$pass = '';          //��Ӧ������
$dsn = "$dbms:host=$host;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass); //��ʼ��һ��PDO����
    // echo "�ɹ�����!<br/>";
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
$dbh->query('set names utf8;');
?>