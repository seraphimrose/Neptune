<?php
/**
 * Created by PhpStorm.
 * User: wudan
 * Date: 2015/7/14
 * Time: 9:56
 */
include "conn.php";
$id = "27";//
$del = "update menu set flag = 1 where id = '$id' ";//ok
$dbh->query($del);

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
//        function DelFunc(){
//            var params=$("#delform").serialize(); //序列化表单的值
//            $.ajax({
//                url:'delmenu.php', //后台处理程序
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