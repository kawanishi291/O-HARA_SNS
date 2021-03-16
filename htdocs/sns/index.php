<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="sns.css">
        <title>line</title>
    </head>
    <body>
        <h1>member list</h1>
        <div class="box-index">
<?php
                    include '../dbconnect/pdo_connect.php';
                    $sql = "SELECT user_id, user_name, user_img FROM users";
                    $stmt = $pdo -> query($sql);
//                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <form method="post" action="browse-chat.php">
                    <img src="../img-upload/img/mypage/test_id/<?php echo "{$row['user_img']}";?>" class="profileimgs">
                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
                <?php
                $_SESSION['member_id'] = $row['user_id']
                ?>
                <input name="send" type="submit" value="<?php echo $row['user_name']; ?>" class="rireki">
                </form>
<?php
    }
?>
<!--         $sql = "SELECT DISTINCT message.user_id, message.user_name, message.user_img FROM message INNER JOIN users ON message.user_id = users.user_id AND message.user_img = users.user_img";-->
    </div>
    </body>
    </html>