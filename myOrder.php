<?php
session_start();
?>

<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/neptune.css"/>

<head>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("button.btn-dlt").click(
                function(){

                    order_id = $(this).attr("id");
                    if( order_id > 0) {
                        $.post("func-cancel-order.php",
                            {
                                order_id: order_id
                            },
                            function (data, status) {
                                alert(data);
                                $(".content").load("myOrder.php");
                            });
                    }
                });
        });

    </script>
</head>

<style>
    .container_m{
        width:50%;
        margin-left: auto;
        margin-right: auto;
    }
    .row{
        margin-top:20px;
        text-align: center;
    }
    .row p{
        padding-top:7px;
    }

</style>

<div class="container">
    <div class="menu_title">
        <h1 style="text-align: center;color:#000033">我的订单</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">

                <table class="table table-striped table-hover table-bordered">
                    <h3 style="text-align: center;color: black">今日订单</h3><hr/>
                    <tr>
                        <td><b>时间</b></td>
                        <td><b>菜名</b></td>
                        <td><b>取消</b></td>
                    </tr>
                    <?php
                    include("conn.php");
                    foreach ($dbh->query("SELECT * FROM order_with_info where user_id = $_SESSION[user_id] order by time desc") as $row) {
                        echo '
                    <tr>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['dishname'].'</td>
                    <td><button id='.$row['order_id'].' class="btn btn-danger btn-sm btn-dlt"> <span class="glyphicon glyphicon-remove"></span> 取消</button></td>
                    </tr>
                    ';
                    }
                    ?>
                </table>
            </div>
            <div class="row">

                <table class="table table-striped table-hover table-bordered">
                    <h3 style="text-align: center;color: black">历史订单</h3><hr/>
                    <tr>
                        <td><b>时间</b></td>
                        <td><b>菜名</b></td>
                    </tr>
                    <?php
                    include("conn.php");
                    foreach ($dbh->query("SELECT * FROM histort_order_with_info where user_id = $_SESSION[user_id] order by time desc") as $row) {
                        echo '
                    <tr>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['dishname'].'</td>
                    </tr>
                    ';
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>


    </div>
</div>
