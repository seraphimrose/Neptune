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
    <div class="container_m" >
        <div class="panel panel-default">

            <div class="panel-heading">
                今日订单
            </div>
            <div class="panel-body">
                <?php
                    include "conn.php";


                ?>
                <div class="row">
                    <div class="col-md-6">
                        <p>青椒肉丝饭</p>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-remove"></span> 取消</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>蚝油牛肉饭</p>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-remove"></span> 取消</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:80px;"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                历史订单
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>2015-07-17</p>
                    </div>
                    <div class="col-md-6">
                        <p>青椒肉丝饭</p>
                    </div>
                </div>

            </div>
        </div>
</div>
