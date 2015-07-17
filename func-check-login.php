<?php
//echo "in check-login";
if( !isset($_SESSION['user_id'])) {
    echo "未登录";

    $login = false;
}
else
    $login = true;
?>