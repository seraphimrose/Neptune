<?php

include("connect-db.php");

function login($usr, $pwd, $dbh)
{
    $password = NULL;
    $stmt = $dbh->prepare("SELECT * FROM user where username = ?");
    if ($stmt->execute(array($usr))) {
        while ($row = $stmt->fetch()) {
            // print_r($row);
            $password = $row['password'];
            // echo $password . "<br/>";
        }
    }


    if (crypt($pwd, $password) == $password) {
        echo "Password verified!<br/>";
    }
    else
        echo "error<br/>";
}
?>

<?php
header("content_type:text/html; charset = utf_8");

/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/13
 * Time: 14:46
 */



login("12345", "12345", $dbh);
login("yy", "12345", $dbh);
login("yy", "mima", $dbh);

/*
$password = crypt("mima"); // 自动生成盐值
$username = "uu";

$dbh->query("INSERT INTO user (`id`, `username`, `password`, `isAdmin`) VALUES (NULL, '$username', '$password', '0')");
*/
/* 你应当使用 crypt() 得到的完整结果作为盐值进行密码校验，以此来避免使用不同散列算法导致的问题。（如上所述，基于标准 DES 算法的密码散列使用 2 字符盐值，但是基于 MD5 算法的散列使用 12 个字符盐值。）*/


?>