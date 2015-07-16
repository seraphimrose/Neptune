<head>
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $("button.img-submit").click(function(){
                alert(5);
                $.ajaxFileUpload({
                    url: 'func-upload.php', //用于文件上传的服务器端请求地址
                    secureuri: false, //是否需要安全协议，一般设置为false
                    fileElementId: 'file-choose', //文件上传域的ID
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data, status)  //服务器成功响应处理函数
                    {
                        alert(1);
                    },
                    error: function (data, status, e)//服务器响应失败处理函数
                    {
                        alert(e);
                    }
                });
            });
        });

    </script>
</head>
<html>


<body>
<form>
    上传文件:
    <input id="file-choose" type="file">
    <button class="img-submit" type="button"">上传</button>
</form>

<form action="func-upload.php" method="post"
      enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="upfile" id="file" />
    <br />
    <input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>