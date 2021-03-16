<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>みんなの掲示板</title>
    <link rel="stylesheet" type="text/css" href="../CSS/chat.css">
    <script type="text/javascript" src="../JavaScript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../JavaScript/memo.js"></script>
</head>
<body>
    <div class="bg">
    <br>
    <div id="wrapper">
    <h1>チャット履歴</h1>
    <button class="btn"><a href="index.php">投稿画面へ</a></button>
    <button class="btn"><a href="../afterlogin.php">TOPへ</a></button>
        <div class="menu-trigger" href="">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav>
          <div class="profile">
          <p class="text">my profile</p>
                    <a href="img-upload/img-upload.php"><img src='<?php echo "../img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="100px" height="100px"></a> 
                    <p class="text">name : <?= $_SESSION["user_name"] ?></p>
                    <p class="text">id : <?= $_SESSION["user_id"] ?></p>
          </div>
          <ul class="link"><h1>member</h1>
              
<?php
    include '../dbconnect/pdo_connect.php';
    $sql = "SELECT DISTINCT user_id, user_name,  user_img FROM message ORDER BY user_id ";
    $stmt = $pdo -> query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //print $row['user_id'];
        //echo "<br>";
        $_a = $row;
        //echo "{$_a['user_name']}";
        ?>
                <li><a class="contents" href="test.php"><img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimg" width="60px" height="60px"></a><?php echo "{$row['user_id']}";?><br><?php echo "{$row['user_name']}";?></li>
                <!--<h1><?php echo "{$row['user_id']}";?></h1>
                <h1><?php echo "{$row['user_name']}";?></h1>
                <h1><?php echo "{$row['user_img']}";?></h1>-->
<?php
    }
?>
              <!--<li><a class="contents" href="./news.php">ニュース</a></li>
              <li><a class="contents" href="./sns/index.php">チャットルーム</a></li>
              <li><a class="contents" href="./chat/index.php">掲示板</a></li>
              <li><a class="contents" href="">サイトについて</a></li>
              <li><a class="contents" href="">ブログ</a></li>
              <li><a class="contents" href="#map">マップ</a></li>
              <li><a class="contents" href="#cal">カレンダー</a></li>-->
          </ul>
        </nav>
        <div class="overlay"></div>
        
        <p><?php
                include '../dbconnect/pdo_connect.php';
                $sql = "SELECT * FROM message ORDER BY time desc limit 500";
                $stmt = $pdo -> query($sql);
                foreach($stmt as $row){
                    echo $row['time'];
                    echo '<br>';
            ?>
     <div class="tweet">
        <a href="./browse.php"><img src='<?php echo "../img-upload/img/mypage/test_id/" . $row['user_img']; ?>' class="profileimg" width="50px" height="50px"></a>
        <p class="myname"><?php echo $row['user_name'] ?></p>
        <p class="message"><?php echo $row['message'] ?></p>
     </div>
    <?}?>
    </div>
    </div>
</body>
</html>