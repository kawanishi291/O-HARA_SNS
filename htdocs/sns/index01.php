<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="sns.css">
        <script type="text/javascript" src="../JavaScript/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../JavaScript/memo.js"></script>
        <title>履歴</title>
    </head>
    <body>
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
          <h1>class-member</h1><ul class="link">
                <?php
                    include '../dbconnect/pdo_connect.php';
                    $sql = "SELECT user_id, user_name, user_img FROM users";
                    $stmt = $pdo -> query($sql);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <li>
<!--                <form method="post" action="browse-chat.php">-->
                    <form method="post" action="test01.php">
                    <img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimgs" width="60px" height="60px">
                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
                <?php // echo "{$row['user_id']}";
                $_SESSION['member_id'] = $row['user_id']
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
        <button class="btn" onclick="location.href='./index01.php'">更新</button>
        <button class="btn" onclick="location.href='../afterlogin.php'">TOPへ</button>
        <div id="title"><h1>チャット履歴</h1></div>
        <div class="box-index">
        <?php
            $stack = array(0);
            include '../dbconnect/pdo_connect.php';
            $sql = "SELECT user_id, request_id, chat FROM chat WHERE user_id = {$_SESSION['user_id']} OR request_id = {$_SESSION['user_id']} ORDER BY time DESC";
            $stmt = $pdo -> query($sql);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['request_id'] == $_SESSION['user_id']){
                    $_SESSION['search_id'] = $row['user_id'];
                }else{
                    $_SESSION['search_id'] = $row['request_id'];
                }
                if(in_array($_SESSION['search_id'], $stack)){
                }else{
                    array_push($stack, $_SESSION['search_id']);
                    $query = "SELECT user_id, user_name, user_img FROM users WHERE user_id = {$_SESSION['search_id']}";
                    $res = $pdo -> query($query);
                    foreach($res as $data){
        ?>
<!--                            <form method="post" action="browse-chat.php">-->
                                <form method="post" action="test01.php">
                                <img src="../img-upload/img/mypage/test_id/<?php echo "{$data['user_img']}";?>" class="profileimgs">
                                <input type="hidden" value="<?php echo $data['user_id']; ?>" name="id">
                        <?php
                            $_SESSION['member_id'] = $data['user_id']
                        ?>
                                <p class="memberbtn"><?php echo $data['user_name']; ?></p>
                        <?php
                            include '../dbconnect/pdo_connect.php';
                            $sql = "SELECT COUNT(*) FROM chat WHERE flag = 0 AND user_id = {$data['user_id']} AND request_id = {$_SESSION['user_id']}";
                            $ans = $pdo -> query($sql);
//                            $count = $ans->fetch(PDO::FETCH_ASSOC);
                            while($count = $ans->fetch(PDO::FETCH_ASSOC)){
                                if($count['COUNT(*)'] == 0){
                                }else{
                        ?><p class="count"><?php echo $count['COUNT(*)']; ?></p>
                        <?php
                                }
                        } ?>
                            <input name="send" type="submit" value="<?php echo $row['chat']; ?>" class="rireki">
                            </form>
            <?php
                        }
                }
            }
            ?>
    </div>
    </body>
    </html>