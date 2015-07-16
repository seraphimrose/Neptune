<head>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="application/javascript">

    </script>
    <style>
        hr{
            padding:0;
            margin:0;
        }
    </style>
</head>


<?php
include("conn.php");
foreach ($dbh->query("select dish_id, username, content, time from user join comment where user.id = comment.user_id and dish_id = '$_POST[dish_id]' order by time desc") as $cmt) {
    ?>
    <div class="row">

        <div class="row">
            <div class="col-md-9"><p class="tc-usr" style="display: inline;"><?php echo $cmt['username'] ?></p></div>
            <div class="col-md-3"><p class="tc-time" style="display: inline;"><?php echo $cmt['time'] ?></p></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="tc-content"><?php echo $cmt['content'] ?></p>
            </div>
        </div>

    </div>
    <hr class="style-six">
    <?php
}
?>

