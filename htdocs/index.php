<?php
ob_start();
session_start();
if( isset($_SESSION['user_id']) != "") {
	header("Location: ./afterlogin.php");
}else if( isset($_COOKIE['id']) != ""){
	header("Location: ./afterlogin.php");
}else{
	header("Location: ./register_func-master/index.php");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <link rel="shortcut icon" href="favicon.ico">
  <meta charset="utf-8">
</head>
</html>