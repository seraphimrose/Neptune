<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/15
 * Time: 10:08
 */
date_default_timezone_set('prc');
header("Content-Type: text/html;charset=utf-8");
include "conn.php";

$userid = "3";
$dishid = "3";
$time = time();
$mysqltime=date('Y-m-d H:i:s',$time);
$content = "yy好吃吗？";
$status = null;
$insrt = "INSERT INTO comment(id, user_id, dish_id, time,content) VALUES (null,'$userid','$dishid','$mysqltime','$content')";
$res = $dbh->query($insrt);
if ($dbh === false) {
    $status["status"] = false;
} else {
    $status["status"] = true;
}
$dbh = null;
echo json_en($status);

function json_en($val)
{
    return json_encode($val);
}

//    <script >
//        function addSubmitFunc(){
//            var params=$("#addform").serialize(); //序列化表单的值
//            $.ajax({
//                url:'addmenu.php', //后台处理程序
//                type:'post',         //数据发送方式
//                dataType:'json',     //接受数据格式
//                data:params,         //要传递的数据
//                success:function() {
//                if(json.status.status){
//                    alert("success");
//                }else {
//                    alert("error");
//                }
//                $("#myModal").modal("hide");
//            }  //回传函数(这里是函数名)
//            });
//        }
//    </script>
