<?php

	// 设置内部字符编码为utf-8
    header("Content-type: text/html; charset=utf-8");

    /*
     * 从$str中抽取$sub1、$sub2之间的最短字符串
     */
    function pi_pei($str,$sub1,$sub2){
        $start=mb_strpos($str,$sub1,0,"utf-8")+mb_strlen($sub1,"utf-8");//抽取的字符串开始的位置
        $len=mb_strpos($str,$sub2,$start,"utf-8");//抽取的字符串的长度，注意strpos返回的结果是从$str开头开始计算的位置而不是从$start开始的位置
        $rslt=mb_substr($str,$start,$len-$start,"utf-8");
        return $rslt;
    }

    //城市名
    $city = '上海';
    //获取数据
    $str = file_get_contents("http://php.weather.sina.com.cn/iframe/index/w_cl.php?day=0&city=" . $city);
    //字符编码转换
    $str=iconv('GBK', 'UTF-8',$str);
    //返回的字符串中，w['']里面的是当前查询城市，s1为白天天气，s2为夜晚天气，t1为最高温度，t2为最低温度，now为当前时间，time为当前时间戳
    //匹配白天天气
    $s1=pi_pei($str,"s1:'","'");
    //匹配夜晚天气
    $s2=pi_pei($str,"s2:'","'");
    //显示天气，如果s1与s2相同，则显示一个；如果不相同，则用“转”字连接
    if($s1==$s2)
        $s=$s1;
    else
        $s=$s1."转".$s2;
    //匹配最高温度
    $t1=pi_pei($str,"t1:'","'");
    //匹配最低温度
    $t2=pi_pei($str,"t2:'","'");
    //匹配当前时间，用时间戳
    $date=date("Y-m-d",pi_pei($str,"time:'","'"));
