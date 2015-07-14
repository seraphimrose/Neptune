<?php
/**
 * Created by PhpStorm.
 * User: wudan
 * Date: 2015/7/14
 * Time: 9:44
 */
header("Content-Type: text/html;charset=utf-8");
include "conn.php";
$name = "测试a";
$picture = "jpg/8.jpg";
$desc = "aa就是试试";

$status = null;
$insrt = "INSERT INTO menu(id, dishname, picture, flag,description) VALUES (null,'$name','$picture',0,'$desc')";
$res = $dbh->query($insrt);
if ($dbh === false) {
    $status["status"] = false;
} else {
    $getid = "select max(id) from menu";
    $nid = $dbh->query($getid);
    $row = $nid->fetch();
    $status["id"] = $row;
    $status["status"] = true;
}
echo json_en($status);
function json_en($val)
{
    return json_encode($val);
}

//    <script >
//        function addSubmitFunc(){
//            var params=$("#addform").serialize(); //序列化表单的值
//            $.ajax({
//                url:'insert.php', //后台处理程序
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
