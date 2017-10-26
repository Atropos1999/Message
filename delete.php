<?php
    session_start();//检查是否是管理员
    if (isset($_SESSION["username"]) == false){
        echo "需要管理员登录";
        exit;
    }

    include ("input.class.php");
    $input = new input();

    include ("db.php");

    $id = $input->get("id");

    $sql = "DELETE from message_board WHERE id='{$id}'";
    $is = $mysqli->query($sql);
    if($is == true) {
        header("Location:Message_board.php");
    }else{
        echo "删除失败";
    }