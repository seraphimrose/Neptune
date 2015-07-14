<?php session_start(); ?>
<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/14
 * Time: 13:19
 */

?>

<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $("button#login").click(function(){
                id = $("[name='id']").val();
                password = $("[name='password']").val();
                $.post("login.php",
                    {
                        id: id,
                        password: password
                    },
                    function(data,status){
                        alert(data);
                    });
            });
        });

        $(document).ready(function(){
            $("button#logout").click(function(){
                $("#empty").load("logout.php",
                    {},
                    function(data,status){
                        alert(data);
                    });
            });
        });

        <?php
        if(isset($_SESSION['username'])) {
        echo '
            $(document).ready(function(){
                $("form#login").hide();
            });
            ';
        }
        else {
        echo '
            $(document).ready(function(){
                $("form#logout").hide();
            });
            ';
        }
?>
</script>
</head>

<body>

<form id='logout' method="post">
    <div>
        <?php
        if(isset($_SESSION['username']))
            echo $_SESSION['username'] . " login!";
        ?>
        <button id="logout" class="btn btn-primary">退出</div>
    </div>
</form>

<form id='login' method="post">
    <div class="form-group">
        <label>账号</label>
        <input class="form-control" name="id" type="text"/>
    </div>
    <div class="form-group">
        <label>密码</label>
        <input class="form-control" name="password" type="password"/>
    </div>
    <div>
        <button id="login" class="btn btn-primary">登录</div>
    </div>
</form>

<div id="empty" style="display: none"></div>







</body>

</html>