<?php
	session_start();
?>
<?php
    header('Content-type: text/plain; charset= UTF-8');
    if(isset($_POST['class'])){
        $cls = $_POST['class'];
        $str = "AJAX REQUEST SUCCESS\nclass:".$cls."\n";
        $result = nl2br($str);
        echo $result;
    }else{
        echo 'FAIL TO AJAX REQUEST';
    }
?>
<?php
	try{
		include './dbconnect/pdo_connect.php';
        $sql = "SELECT * FROM users WHERE class = $cls AND user_id != {$_SESSION['user_id']}";
        $stmt = $pdo -> query($sql);
            $point = 0;
            foreach($stmt as $row){
                $point++;
                $p = $point;
                $p = $p % 3;
                ?>
                <div class="profile<?= $p ?>">
                <img src='<?php echo "./img-upload/img/mypage/test_id/" . $row["user_img"]; ?>' class="profileimg">
<!--		<a href="./sns/test01.php"><?= $row['user_id'] ?></a>	-->
		<p>名前：<?= $row['user_name'] ?></p>
                <p>クラス：<?= $row['class'] ?></p>
                <p class="a<?= $p ?>"><?php echo $point; ?></p>
		    <form method="post" action="sns/test01.php" class="btn">
                        <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
                        <?php
                            $_SESSION['member_id'] = $row['user_id'];
                        ?>
                        <input name="send" type="submit" value="チャットルームへ" >
                    </form>
                </div>
    <?php
            }
	}catch(PDOException $Exception){
		die('接続エラー:' .$Exception -> getMesseage());
	}
?>
