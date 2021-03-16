<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>みんなの掲示板</title>
    <link rel="stylesheet" type="text/css" href="./sns.css">
<script type="text/javascript">
        window.onload = function (){
            autoScroll();
            update();
        }
        function autoScroll(){
            window.location.hash = "point";
        }
        function update(){
            <?php
                include '../dbconnect/pdo_connect.php';
                $sql = "UPDATE chat SET flag = 1 WHERE user_id = {$_SESSION['member_id']} AND request_id = {$_SESSION['user_id']}";
            ?>
        }
</script>
</head>
<body>
<div class="all-wrapper">
    <?php
              if(isset($_POST["id"])){
                  $_SESSION['member_id'] = $_POST["id"];
              }else{
              }
            include '../dbconnect/pdo_connect.php';
    // 既読処理
            $sql = "UPDATE chat SET flag = 1 WHERE user_id = {$_SESSION['member_id']} AND request_id = {$_SESSION['user_id']}";
            $res = $pdo -> query($sql);
    // アイコンの取り出し
            $sql = "SELECT * FROM users WHERE {$_SESSION['member_id']} = user_id";
            $stmt = $pdo -> query($sql);
                foreach ($stmt as $row) { ?>
                    <img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimg-chat" onclick="js_alert()">
                <script>
//                    function scroll(){
//                        var obj = document.getElementsByClassName("wrapper");
//                        obj.scrollTop = obj.scrollHeight;
//                        console.log(obj);
//                    }
                    function js_alert(){
                        alert("<?php echo $row['user_name']; ?>さん");
                    }
//                    function scrolla(){
//                        var obj = document.getElementsByClassName("wrapper");
//                        var takasa = obj.innerHeight;
//                        console.log(obj);
//                        console.log(takasa);
//                        console.log(obj.innerHeight);
//                        };
                </script>
                <?php
                }
                ?>
<!--    <button class="btn" onclick="history.back()">戻る</button>-->
    <button class="btn" onclick="location.href='./browse-chat.php'">更新</button>
    <button class="btn" onclick="location.href='./index01.php'">投稿画面へ</button>
    <button class="btn" onclick="location.href='../afterlogin.php'">TOPへ</button>
<div class="wrapper">
    <div id="target">
        <?php
        include '../dbconnect/pdo_connect.php';
        $sql = "SELECT * FROM chat WHERE user_id = {$_SESSION['member_id']} AND request_id = {$_SESSION['user_id']} OR user_id = {$_SESSION['user_id']} AND request_id = {$_SESSION['member_id']} ORDER BY time ASC";
            $stmt = $pdo -> query($sql);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
        <?php
        if($row['user_id'] == $_SESSION['user_id']){?>
        <div class="chatbox">
        <div class="my">
        <?php
            echo '<p class="time">';
            echo $row['time'];
            echo '</p><p class="name">';
            echo $row['user_name'];
            echo 'さんからのメッセージ</p><p class="chat">';
            echo $row['chat'];
            echo "</p>";?>
        </div><?php
        }else{?>
<!--            <img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimgs" width="60px" height="60px">-->
        <div class="you">
        <?php
            echo '<p class="time">';
            echo $row['time'];
            echo '</p><p class="name">';
            echo $row['user_name'];
            echo 'さんからのメッセージ</p><p class="chat">';
            echo $row['chat'];
            echo "</p>";
        }?></div><?php
        }
        ?>
        <a name="point" id="point">　</a></div>
<!--    <a name="point">point</a>--></div>
    <form method="post" action="request.php">
                <p><input type="hidden" name="request_id" value="<?php echo $_SESSION['member_id'];?>"></p>
                <textarea type="text" required name="chat" cols="60" rows="5" class="textbox"></textarea><br>
                <button name="send" type="submit">送信</button>        
    </form>
    </div>
</div>
</body>
</html>