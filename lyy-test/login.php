<?php session_start(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 11:15
 */
include("connect-db.php");

$usr = $_POST['id'];
$pwd = $_POST['password'];

$stmt = $dbh->prepare("SELECT * FROM user where username = ?");
$stmt->execute(array($usr));
$row = $stmt->fetch();

if ($row == NULL) {
    echo "No such user!";
}
else{
    $password = $row['password'];
    if (crypt($pwd, $password) == $password){
        echo "Password verified!";
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['isAdmin'] =  $row['isAdmin'];
    }
    else {
        echo "Username and password don't match!";
    }
}