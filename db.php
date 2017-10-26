<?php
    $mysqli = new mysqli("localhost","root","","php");//mysqli参数

    if ($mysqli->connect_error>0){
        echo "连接错误";
        echo $mysqli->connect_error;
        exit;
    }

    $mysqli->query("SET NAMES UTF8");//定义字符集
?>