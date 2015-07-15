<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/15
 * Time: 14:35
 */

if( !isset($_SESSION['user_id'])) {
    echo "未登录";
    $login = false;
}
else
    $login = true;

?>