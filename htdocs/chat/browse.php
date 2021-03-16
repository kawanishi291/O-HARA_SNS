<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>みんなの掲示板</title>
    <link rel="stylesheet" type="text/css" href="../CSS/chat.css">
</head>
<body>
    <div class="bg">
    <br>
    <div id="wrapper">
    <h1>チャット履歴</h1>
    <button class="btn" onclick="history.back()">戻る</button>
    <button class="btn" onclick="location.href='./index.php'">投稿画面へ</button>
    <button class="btn" onclick="location.href='../afterlogin.php'">TOPへ</button>
        <?php
              if(isset($_POST["id"])){
                  $_SESSION['member_id'] = $_POST["id"];
              }else{
                  echo "member_id";
              }
        ?>
                <?php
                    include '../dbconnect/pdo_connect.php';
                    $sql = "SELECT user_img FROM users WHERE user_id = {$_SESSION['member_id']}";
                    $stmt = $pdo -> query($sql);
                    foreach($stmt as $row){
                        $row['img'] = $row['user_img'];
                    }
                ?>
        <br><img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimg-browse" onclick="js_alert()">111                                       
    <p><?php
    include '../dbconnect/pdo_connect.php';
    $sql = "SELECT * FROM message LEFT OUTER JOIN users ON message.user_id = users.user_id WHERE users.user_id = {$_SESSION['member_id']} ORDER BY message.time DESC LIMIT 500";
    $stmt = $pdo -> query($sql);
    foreach($stmt as $row){
        $row['img'] = $row['user_img'];
        ?>
        <div class="tweet">
            <p class="time"><?php echo $row['time']; ?></p><br>
            <p class="message"><?php echo $row['message'] ?></p>
         </div>
    <?}?>
    </div>
    </div>
</body>
</html>