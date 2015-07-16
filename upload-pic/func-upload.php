<?php
/**
 * Created by PhpStorm.
 * User: yyli
 * Date: 2015/7/16
 * Time: 16:09
 */
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=2000000;     //上传文件大小限制, 单位BYTE
$destination_folder="uploadimg/"; //上传文件路径
$watermark=0;      //是否附加水印(1为加水印,其他为不加水印);
$watertype=1;      //水印类型(1为文字,2为图片)
$waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
$waterstring="http://www.xplore.cn/";  //水印字符串
$waterimg="xplore.gif";    //水印图片
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;    //缩略图比例

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
        echo "-1";
        exit;
    }
    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"]) {
        echo "-2";
        exit;
    }
    if(!in_array($file["type"], $uptypes)) {
        echo "-3";
        exit;
    }

    if(!file_exists($destination_folder)) {
        mkdir($destination_folder);
    }

    $filename=$file["tmp_name"];
    $pinfo=pathinfo($file["name"]);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.time().".".$ftype;

    if(!move_uploaded_file ($filename, $destination)) {
        echo "-4";
        exit;
    }
    else {
        echo $destination;
    }
}
else {
    echo "-5";
}


?>