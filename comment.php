<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $("button.tc-submit").click(
                function(){
                    otc = $("[name='new-tc']").val();
                    tc = otc.replace(/\n/g,"<br/>");

                    if(tc.length > 5) {
                        $.post("func-tucao.php",
                            {
                                tc: tc
                            },
                            function (data, status) {
                                alert(data);
                                $(".content").load("comment.php");
                            });
                    }
                    else {
                        alert("你这也算吐槽？")
                    }

                }
            );
        });

    </script>
</head>
<div class="menu_title">
    <h1 style="text-align: center;color:red">吐槽！</h1><hr/>
</div>
<div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="menu_items">
            <div class="row">
                <div class="col-md-12"><textarea class="form-control tc-input" name="new-tc" type="text" style="resize:none;"/></div>
            </div>
            <div class="row"><p></p></div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2"></div>
                <div class="col-md-5"></div>
            </div>
            <div class="row"><p></p></div>
        </div>
        <?php
        include("conn.php");

        foreach ($dbh->query("SELECT username, content, time FROM `tucao` join `user` WHERE `tucao`.user_id = `user`.id ORDER BY time DESC") as $row) {
            echo '<div class="tc menu_items table-bordered">
            <div class="row">
                <div class="col-md-9"><p class="tc-usr" style="display: inline;">'.$row["username"].'</p></div>
                <div class="col-md-3"><p class="tc-time" style="display: inline;">'.$row["time"].'</p></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="tc-content">'.$row["content"].'</p>
                </div>
            </div>
        </div>';
        }
        ?>

    </div>
    <div class="col-md-2"><button type="submit" class="btn btn-primary tc-submit">吐了个槽</button></div>

</div>