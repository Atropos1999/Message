<?php
    session_start();
    include ("input.class.php");
    $input = new input();

    include ("db.php");

    $act = $input->get("act");

    if ( $act !==false) {
        $username = $input->post("username");
        $password = $input->post("password");

        $sql = "SELECT * from idm WHERE username='{$username}'and password='{$password}'";
        $mysqli_result = $mysqli->query($sql);
        $row = $mysqli_result->fetch_assoc();  //索引数组
        if ($row['username'] == $username && $row['password'] == $password ){
            $_SESSION["username"] = $row["username"];
            header("Location:Message_board.php");
        }else {
            echo "no";
            exit;
        }
    }
?>
<!DOCTYDE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>管理员登录</title>
    </head>
    <body>
        <form action="login.php?act=chk" method="post">
            <input type="text" name="username"/>
            <input type="password" name="password"/>
            <input type="submit" value="点击登录"/>
        </form>
    </body>
</html>