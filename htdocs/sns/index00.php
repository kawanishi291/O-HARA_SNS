<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>掲示板</title>
  <link rel="stylesheet" type="text/css" href="../CSS/chat.css">
</head>
<body>
    <div class="bg">
    <br>
    <div id="wrapper">
        <h1>掲示板投稿</h1>
        <button class="btn"><a href="chat.php">みんなの投稿</a></button>
        <button class="btn"><a href="../afterlogin.php">TOPへ</a></button>
         <?php
            date_default_timezone_set('Asia/Tokyo');
            session_start();
        ?>
        <img src='<?php echo "../img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="60px" height="60px"><br>
        <?php
            echo date("Y/m/d H:i:s");
            echo "ID : ",$_SESSION['user_id'];
            echo nl2br("\n");
            echo "img : ", $_SESSION['user_img'];
            echo nl2br("\n");
            echo "name : ", $_SESSION['user_name'];
            $user_id = $_SESSION["user_id"];
                include '../dbconnect/pdo_connect.php';
                    $sql = "SELECT DISTINCT message.user_id, message.user_name, message.user_img FROM message INNER JOIN users ON message.user_id = users.user_id AND message.user_img = users.user_img";
                    $stmt = $pdo -> query($sql);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
        <form method="post" action="request.php">
                <br>
                <p><input type="checkbox" name="request_id" value="<?php echo $row["user_id"];?>">
                <?php
                    echo $row['user_name'];
                    echo " さんへ";
                ?>
                    <img src='<?php echo "../img-upload/img/mypage/test_id/" . $row["user_img"]; ?>' class="profileimg" width="50px" height="50px">
                </p>
            <?php
                    }
            ?>
                <br><br>
                メッセージ　<textarea type="text" name="chat" cols="40" rows="8"></textarea><br><br>
                <button name="send" type="submit">送信</button>
            
        </form>
        
            <?php
        include '../dbconnect/pdo_connect.php';
        $sql = "SELECT * FROM chat WHERE request_id = {$_SESSION['user_id']} ORDER BY time DESC";
            $stmt = $pdo -> query($sql);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
    <?php
    echo $row['time'];
    echo "<br>";
    echo $row['user_name'];
    echo "さんからのメッセージ　<br><h1>";
    echo $row['chat'];
    echo "</h1> <br>";
    }?>
        
    </div>
    </div>
</body>
</html>