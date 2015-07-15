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

//HR订菜时需要按照菜名查看订的人数
mysqli_query($con,"CREATE VIEW group_by_dishname AS
SELECT picture,dishname,COUNT(user_id) as num
FROM menu,today_order
WHERE menu.id=today_order.dish_id
GROUP BY dishname
");
//$rslt存放由mysqli_query()函数返回的数据，当SQL语句返回值时，函数需要验证是否返回false
if($rslt=mysqli_query($con,"SELECT * FROM group_by_dishname")){
	//以数组的形式从记录集返回从第一行到最后一行的每一行
	while ($row = mysqli_fetch_array($rslt, MYSQLI_BOTH)) {
		echo $row['picture'] . " " . $row['dishname'] . " " . $row['num'] . "\n";
	}
	mysqli_free_result($rslt);
}

//HR发菜时需要按照用户的房间号查看每道菜订的人数
mysqli_query($con,"CREATE VIEW group_by_roomNo AS
SELECT roomNo,dishname,COUNT(user_id) as num
FROM user,menu,today_order
WHERE menu.id=today_order.dish_id AND user.id=today_order.user_id
GROUP BY roomNo,dishname
");
if($rslt=mysqli_query($con,"SELECT * FROM group_by_roomNo")){
	while ($row = mysqli_fetch_array($rslt, MYSQLI_BOTH)) {
		echo $row['roomNo'] . " " . $row['dishname'] . " " . $row['num'] . "\n";
	}
	mysqli_free_result($rslt);
}

mysqli_close($con);