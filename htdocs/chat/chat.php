<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <title>みんなの掲示板</title>
    <link rel="stylesheet" type="text/css" href="../CSS/chat.css">
    <script type="text/javascript" src="../JavaScript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../JavaScript/memo.js"></script>
</head>
<body>
    <div class="bg">
    <br>
    <div id="wrapper">
    <h1>掲示板履歴</h1>
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
                    <img src='<?php echo "../img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="100px" height="100px">
                    <p class="text">name : <?= $_SESSION["user_name"] ?></p>
                    <p class="text">id : <?= $_SESSION["user_id"] ?></p>
          </div>
          <ul class="link"><h1>member</h1>
              
                <?php
                    include '../dbconnect/pdo_connect.php';
                    $sql = "SELECT user_id, user_name, user_img FROM users WHERE class = {$_SESSION['class']}";
                    $stmt = $pdo -> query($sql);
//                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        //print $row['user_id'];
                        //echo "<br>";
                        //echo "{$_a['user_name']}";
                        //$_SESSION['member_id'] = $row['user_id']
                ?>
                <li>
                <form method="post" action="browse.php">
                    <img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimgs" width="60px" height="60px">
                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
                <?php // echo "{$row['user_id']}";
                $_SESSION['member_id'] = $row['user_id'];
                ?>
                <input name="send" type="submit" value="<?php echo $row['user_name']; ?>" >
                </form>
                <?php //var_dump($row);?>
                </li>
<?php
    }
?>
          </ul>
        </nav>
        <div class="overlay"></div>
        
        <p><?php
                include '../dbconnect/pdo_connect.php';
                $sql = "SELECT * FROM message LEFT OUTER JOIN users ON message.user_id = users.user_id ORDER BY message.time DESC LIMIT 500";
                $stmt = $pdo -> query($sql);
                foreach($stmt as $row){
            ?>
     <div class="tweet">
        <img src='<?php echo "../img-upload/img/mypage/test_id/" . $row['user_img']; ?>' class="profile-img" width="50px" height="50px">
        <p class="time"><?php echo $row['time']; ?></p><br>
        <p class="myname"><?php echo $row['user_name']; ?></p>
        <p class="message"><?php echo $row['message']; ?></p>
     </div>
    <?}?>
    </div>
    </div>
</body>
</html>