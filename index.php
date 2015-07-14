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

</head>

<?php include 'weather.php' ?>
<?php

?>
?>

<body>


<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--                    <a class="navbar-brand" href="#"><img class="logo" src="src/baixingLOGO.png"/> </a>-->
                <a href="#"><img class="logo" src="src/baixingLOGO.png"/></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">点餐</span></a></li>
                    <li><a href="#">菜单</a></li>
                    <li><a href="#">统计</a></li>
                    <li><a href="#">吐槽</a></li>

                </ul>
                <ul class="nav navbar-nav login">
                    <li><p class="weather"><?php echo $date."  ".$city."  ".$s."  ".$t2."～".$t1." ℃ "; ?></p></li>
                    <li><a href="#" data-toggle="modal" data-target="#loginModal">登录</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="menu_title">
            <h1 style="text-align: center;">今日菜单</h1><hr/>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form>
                    <div class="radio table-bordered menu_items">
                        <label>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="radio" name="menu" value="option1" class="sr-only">
                                    <img src="src/青椒肉丝.jpg" class="food_pic"/>
                                </div>
                                <div class="col-md-8">
                                    <h4>青椒肉丝饭</h4><br/>
                                    <p>青椒肉丝是一道色香味俱全的汉族名菜，属于川菜系。以青椒为主要食材，口味香辣，色香味俱全，营养价值丰富</p>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-primary comment"><span class="glyphicon glyphicon-comment"></span></button>
                                </div>
                            </div>
                        </label>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="footer">

    </div>
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
                <form method="post" action="lyy-test/login.php">
                    <div class="form-group">
                        <label>账号</label>
                        <input class="form-control" name="id" type="text"/>
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input class="form-control" name="password" type="password"/>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">登录</div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>