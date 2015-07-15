<?php session_start(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 11:15
 */
include("connect-db.php");


if(isset($_SESSION['user_id'])) {
    echo $_SESSION['username'] . ", 请不要重复登陆";
}
else {

    $usr = $_POST['id'];
    $pwd = $_POST['password'];

    $stmt = $dbh->prepare("SELECT * FROM user where username = ?");
    $stmt->execute(array($usr));
    $row = $stmt->fetch();

    if ($row == NULL) {
        echo "用户名不存在";
    } else {
        $password = $row['password'];
        if (crypt($pwd, $password) == $password) {
            echo "登陆成功";
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['isAdmin'] = $row['isAdmin'];
        } else {
            echo "用户名与密码不匹配";
        }
    }
}