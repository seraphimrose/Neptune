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
$content = "yy�ó���";
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
//            var params=$("#addform").serialize(); //���л�����ֵ
//            $.ajax({
//                url:'addmenu.php', //��̨�������
//                type:'post',         //���ݷ��ͷ�ʽ
//                dataType:'json',     //�������ݸ�ʽ
//                data:params,         //Ҫ���ݵ�����
//                success:function() {
//                if(json.status.status){
//                    alert("success");
//                }else {
//                    alert("error");
//                }
//                $("#myModal").modal("hide");
//            }  //�ش�����(�����Ǻ�����)
//            });
//        }
//    </script>
