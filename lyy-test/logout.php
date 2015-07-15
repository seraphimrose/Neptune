<?php session_start(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 14:35
 */

unset($_SESSION['login']);
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['isAdmin']);
echo "已退出"

?>