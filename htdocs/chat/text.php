<?php
    session_start();
?>
<?php
date_default_timezone_set('Asia/Tokyo');
//echo date("Y/m/d - M (D) H:i:s");
//echo date("Y/m/d/ H:i:s");
$date = date("Y/m/d/ H:i:s");
$_SESSION["time"] = $date;
//$user_id = $_POST['user_id'];
//$_SESSION["user_id"] = $user_id;
//$user_name = $_POST['user_name'];
//$_SESSION["user_name"] = $user_name;
$message = $_POST['message'];
$_SESSION["message"] = $message;
//echo $_SESSION["user_id"];

try{
      include '../dbconnect/pdo_connect.php';
      $sql = "INSERT INTO message VALUES ('{$_SESSION["user_id"]}','{$_SESSION["message"]}','{$_SESSION["time"]}')";
      $pdo -> query($sql);
    }catch(PDOException $Exception){}
header('location: ./chat.php');
	exit;
        ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>投稿が完了しました。</h1>
    <a href="index.php">戻る</a>
</body>
</html>
