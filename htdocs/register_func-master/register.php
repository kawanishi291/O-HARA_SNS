<?php
session_start();
if( isset($_SESSION['user']) != "") {
	// ログイン済みの場合はリダイレクト
	header("Location: home.php");
}

// DBとの接続
include_once 'dbconnect.php';
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHPの会員登録機能</title>
<link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="col-xs-6 col-xs-offset-3">

<?php
// signupがPOSTされたときに下記を実行
if(isset($_POST['signup'])) {

	$user_id = $mysqli->real_escape_string($_POST['user_id']);
	$user_name = $mysqli->real_escape_string($_POST['user_name']);
	$user_mailaddress = $mysqli->real_escape_string($_POST['user_mailaddress']);
	$user_password = $mysqli->real_escape_string($_POST['user_password']);
	$user_password = password_hash($user_password, PASSWORD_BCRYPT);
	echo $user_id;
	echo $user_name;
	echo $user_mailaddress;
	echo $user_password;

	// POSTされた情報をDBに格納する
	$query = "INSERT INTO users(user_id,user_name,user_mailaddress,user_password) VALUES('$user_id','$user_name','$user_mailaddress','$user_password')";
	if($mysqli->query($query)) {  ?>
		<div class="alert alert-success" role="alert">登録しました</div>
		<?php } else { ?>
		<div class="alert alert-danger" role="alert">エラーが発生しました。</div>
		<?php
		var_dump($query);
	}
} ?>

<form method="post">
	<h1>会員登録フォーム</h1>
	<p>学生番号</p>
	<div class="form-group">
		<input type="text" class="form-control" name="user_id" placeholder="学生番号" required />
	</div>
	<p>氏名</p>
	<div class="form-group">
		<input type="text" class="form-control" name="user_name" placeholder="ユーザー名" required />
	</div>
	<p>クラス</p>
	<div class="form-group">
		<select class="form-control" name="class" required>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select>
	</div>
	<p>メールアドレス</p>
	<div class="form-group">
		<input type="email"  class="form-control" name="user_mailaddress" placeholder="メールアドレス" required />
	</div>
	<p>パスワード</p>
	<div class="form-group">
		<input type="password" class="form-control" name="user_password" placeholder="パスワード" required />
	</div>
	<button type="submit" class="btn btn-default" name="signup">会員登録する</button>
	<a href="index.php">ログインはこちら</a>
</form>

</div>
</body>
</html>
