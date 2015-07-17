<?php
include 'weather.php';
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>百姓网订餐</title>
    <meta charset="UTF-8"/>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/neptune.css"/>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/neptune.js"></script>
    <script type="application/javascript">
        <?php
        if(isset($_SESSION['username'])) {
        echo '
            $(document).ready(function(){
                $("#show-login").hide();
            });
            ';
        }
        else {
        echo '
            $(document).ready(function(){
                $("#show-logout").hide();
                $("#show-user").hide();
            });

            ';
        }
?>
    </script>

</head>
<body>


<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--                    <a class="navbar-brand" href="#"><img class="logo" src="src/baixingLOGO.png"/> </a>-->
                <a href="#"><img class="logo" src="src/baixingLOGO.png"/></a>
            </div>
            <div name="ekko"></div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active" id="menu"><a href="#">点餐</span></a></li>
                    <?php

                    if(isset($_SESSION['username'])){

                        echo'
                            <li id="myOrder"><a href="#">订单</a></li>
                        ';
                    }


                    ?>
                <?php
                if( isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
                    echo '
                    <li id="list"><a href="#">统计</a></li>';
                }?>
                    <li id="comment"><a href="#">吐槽</a></li>
                </ul>
                <ul class="nav navbar-nav login">
                    <li><p class="weather"><?php echo $date."  ".$city."  ".$s."  ".$t2."～".$t1." ℃ "; ?></p></li>
                    <li id="show-user"><p class="user-info"><?php echo "Hi, " . $_SESSION['username']; ?></p></li>
                    <li id="show-logout"><a href="#">退出</a></li>
                    <li id="show-login"><a href="#" data-toggle="modal" data-target="#loginModal">登录</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content" style="margin-bottom: 50px">


    </div>
<!--    <div class="footer navbar-fixed-bottom">-->
<!--        <p>I am a footer</p>-->
<!--    </div>-->
    <div id="empty" style="display: none"></div>
</div>

<!--login modal-->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">登录</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>账号</label>
                        <input class="form-control" name="id" type="text"/>
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input class="form-control" name="password" type="password"/>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary login-submit">登录</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>