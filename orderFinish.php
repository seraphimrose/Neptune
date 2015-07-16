<?php
header("Content-type: text/html; charset=utf-8");
include "conn.php";
foreach($dbh->query('SELECT dishname FROM menu WHERE id='.$_POST['dish_id']) as $dishname)

?>

<div align="center"><img width="20%" src="jpg/tongue.png" /></div>
<div align="center" style="font-size:18px">
	<p><br/><br/>点餐完成！您点的加班餐： <?php {echo $dishname['dishname'];}?> 将由美丽的HR妹妹在6点左右送到你的面前，请稍等(*￣︶￣)y</p>
</div>