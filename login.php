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
        <style>
            .login{margin-top: 80px;text-align:center;}
            .un{margin-top: 20px;height:30px;width:20%;background:#fff;}
            .pw{margin-top: 20px;height:30px;width:20%;background:#fff;}
            .button{margin-top: 20px;height:30px;width:10%;background:#fff;}
            h1{font-family: Comic Sans MS;text-align:center;}
        </style>

        <h1>Login</h1>
    </head>
    <body background="timg.jpg">
        <form action="login.php?act=chk" method="post" style="width:100%;">
            <div class="login">
                <input class="un"  type="text" name="username" autocomplete="off" placeholder="管理员名"/><br>
                <input class="pw"  type="password" name="password" placeholder="密码"/><br>
                <input class="button" type="submit" value="点击登录"/>
            </div>



        </form>
    </body>
</html>