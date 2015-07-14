<?php

// 设置内部字符编码为utf-8
header("Content-type: text/html; charset=utf-8");

//连接数据库，请按照服务器来修改用户名、密码和数据库名
$con = mysqli_connect("localhost","root","root","test");
if (mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//防止返回的汉字乱码
mysqli_query($con,"SET NAMES UTF8");
//存放由mysqli_query()函数返回的数据，函数需要验证是否返回false
//关键字order做表名必须加上``
if($rslt=mysqli_query($con,"SELECT picture,name,COUNT(user_id) as num FROM menu,`order` WHERE menu.id=`order`.dish_id GROUP BY name")){
	//以数组的形式从记录集返回从第一行到最后一行的每一行
	while ($row = mysqli_fetch_array($rslt, MYSQLI_BOTH)) {
		echo $row['picture'] . " " . $row['name'] . " " . $row['num'] . "\n";
	}

	mysqli_free_result($rslt);
}

mysqli_close($con);