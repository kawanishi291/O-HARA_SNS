<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>画像をアップロード</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>


<body>
    <div class="wrapper">
        <form action="./next.php" method="post" enctype="multipart/form-data">
	        <label>画像のアップロード（最大1MB）</label>
	        <p><input type="file" name="upfile" size="80px" id="upload" accept="image/*"></p>
                <dl>
                    <p>IDは<?= $_SESSION["user_id"] ?></p>
                </dl>
	        <p><input type="submit" name="submit" value="Upload" /></p>
        </form>
</div>
</body>
</html>