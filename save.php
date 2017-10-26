<?php

    include ("input.class.php");//使用php这个类
    $input = new input();
    include ("db.php");

    $message = $input->post("message");
    $user = $input->post("user");



    if( $message == ""){
        echo "留言内容不能为空";
        exit;
    }

    if ($user == ""){
        echo "用户名不能为空";
        exit;
    }
    $t = time();

    $sql = "INSERT INTO message_board (user,message,time) values('$user','$message','$t')" ;
    $is = $mysqli->query($sql);//用于向Mysql连接发送查询或命令
    if ( $is ){
        header("Location:Message_board.php");
    }else{
        echo "插入失败";
    }

    echo $message;
    echo "<hr/>";
    echo $user;


?>
 