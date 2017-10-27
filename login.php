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
    <body background="timg.jpg">
        <form action="login.php?act=chk" method="post" style="width:100%;">
            <div class="login" style="margin-top: 100px;text-align:center;">
                <input style="margin-top: 20px;height:30px;width:20%;background:#fff;" type="text" name="username" autocomplete="off"/><br>
                <input style="margin-top: 20px;height:30px;width:20%;background:#fff;" type="password" name="password" /><br>
                <input style="margin-top: 20px;height:30px;width:20%;background:#fff;" type="submit" value="点击登录"/>
            </div>



        </form>
    </body>
</html>