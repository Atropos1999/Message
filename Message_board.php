<?php
    session_start();

    include ("db.php");

    $sql = "SELECT * FROM message_board ORDER BY id DESC"; //执行select的查询，返回result的对象，通过fetch_array的方法
    $mysqli_result = $mysqli->query( $sql );

    $rows = array();//rows是一个二维数组，每一行的记录都在这个二维数组中被包含起来
    while( $row = $mysqli_result->fetch_array( MYSQLI_ASSOC )){          //将记录存储在row的变量中
        $rows[] = $row;
    }         //循环所有结果
?>
<!DOCTYDE html>
<html>
    <head>
        <meta charest='utf-8'/>
        <title> Atropos 的留言板 </title>

        <style>
            .login{position: absolute;top:10px;left:1500px;}
            .add{width:600px;margin: 10px auto; overflow:hidden}
            .add textarea{width:100%;height:100px;opacity:0.5;border-radius: 10px;resize:none;}
            .add .user{float:left;opacity: 0.5;margin-top:20px;border-radius: 5px;}
            .add .button{float:right;margin-top:20px;}
            .message{ width:600px;margin:50px auto;}
            .item .user{float: left;font-weight: bold}
            .item .time{float: right;color:darkslategray;}
            .item .hr{height:3px; border:none;border-top:5px dotted burlywood;}
            h1{font-family: Comic Sans MS}

        </style>
        <h1 align="center" >Message</h1>
        <a href="login.php" class="login">登录</a>
    </head>

    <body background="bg.jpg">

        <div class="add">

            <form action="http://localhost/demo/Message/save.php" method="post">
                <textarea name="message" placeholder="在此写下你想要说的话..."></textarea>
                <input class="user" name="user" type="text"  placeholder="用户名"/>
                <input class="button"  type="submit" value="发表"/>
            </form>
        </div>

        <div class="message">

            <?php
                date_default_timezone_set('Asia/Shanghai');
                foreach ($rows as $row){
            $t = date("Y-m-d H:i:s", $row["time"]);
            ?>
            <div class="item">
                <span class="user"><?php echo $row["user"] ?></span>
                <span class="time">
                    <?php echo $t ?>

                    <?php
                        if(isset($_SESSION["username"])){
                    ?>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">删除</a>
                    <?php
                    }
                    ?>
                </span>
                <div style="clear:both"></div>
                <p>
                    <?php echo $row["message"] ?>
                </p>
                <hr class="hr"/>
            <?php
                }
            ?>
            </div>
        </div>

    </body>
</html>

