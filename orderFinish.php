<?php
header("Content-type: text/html; charset=utf-8");
include "conn.php";
foreach($dbh->query("SELECT dishname FROM menu WHERE id= '$_POST[dish_id]'") as $dish)

?>

<div align="center"><img width="20%" src="jpg/tongue.png" /></div>
<div align="center">
    <p>
        <br/>
        <p style="font-size: 30px;">=点餐完成=</p>
        <br/>
        <p style="font-size: 18px;"> 您点的加班餐： <?php {echo $dish['dishname'];}?> <br/>将由美丽的HR妹妹在6点左右送到你的面前，请稍等(*￣︶￣)y</p>
    </p>
</div>