<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
　<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
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
        ?>
        <img src='<?php echo "../img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="60px" height="60px"><br>
        <p class="time-index">● <?php echo date("Y/m/d H:i:s");?></p>
        
<!--
        function connectDB() {
            $dbh = new PDO('mysql:host=localhost;dbname=sample_db-test','root','');
            return $dbh;
            }
            // DBから投稿内容を取得
            $sql = "select user_name from users where user_id = '$user_id'";
            $user_name = $key['user_name'];
            $_SESSION['user_name'] = $user_name;
            $class = $key['class'];
            $_SESSION['class'] = $class;
-->

        <form method="post" action="text.php">
                <p class="id-index">● ID: <?php echo $_SESSION["user_id"] ?></p>
                <p class="name-index">● 名前: <?php echo $_SESSION["user_name"] ?></p>
                <textarea type="text" required maxlength="255" name="message" cols="40" rows="8" class="textbox"></textarea>
                <br><button name="send" type="submit">投稿</button>
        </form>
            <!--
                <br>
                チャット履歴
                <p><?php
            include '../dbconnect/pdo_connect.php';
            $sql = "SELECT * FROM message ORDER BY time desc limit 6";
            $stmt = $pdo -> query($sql);
            foreach($stmt as $row){
                echo $row['user_id'].":".$row['user_name'].":".$row['message'];
                echo '<br>';
                ?><h1><?php echo $row['message'] ?></h1>
            <?}?>
            <h2><?php echo $row['message'] ?></h2>

            -->
    </div>
    </div>
</body>
</html>