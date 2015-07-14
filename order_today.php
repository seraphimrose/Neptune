<?php

//连接数据库，请按照服务器mysql来修改用户名及密码
$con = mysql_connect("localhost","root","root");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

//选择数据库，请按照自己电脑的数据库来修改数据库名称
mysql_select_db("test", $con);

//存放由mysql_query()函数返回的数据
$rslt=mysql_query("SELECT picture,name,COUNT(user_id) as num FROM menu,order WHERE menu.id=order.dish_id",$con);
//以数组的形式从记录集返回从第一行到最后一行的每一行
while($row=mysql_fetch_array($rslt)){
	echo $row['picture']." ".$row['name']." ".$row['num'];
}

mysql_close($con);
