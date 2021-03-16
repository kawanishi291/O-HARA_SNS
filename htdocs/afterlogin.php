<?php
  session_start();
?>
<?php
    setcookie("id", $_SESSION['user_id'], time()+360000);
	if (empty($_COOKIE['id'])){
	header("Location: ./register_func-master/index.php");
    }else if(empty($_SESSION['user_id'])){
        include './dbconnect/pdo_connect.php';
        $sql = "SELECT * FROM users WHERE user_id='{$_COOKIE['id']}'";
                    $stmt = $pdo -> query($sql);
                    foreach($stmt as $row){
                         $_SESSION['user_name'] = $row['user_name'];
			             $_SESSION['class'] = $row['class'];
			             $_SESSION['user_img'] = $row['user_img'];
				     $_SESSION['user_id'] = $_COOKIE['id'];
                    }
    }else{
        // header("Location: ./register_func-master/index.php");
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <link rel="shortcut icon" href="favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <?php
	include('./calendar/config.php');
  ?>
  <title>TOP</title>
    <script>function scrollToTop() {
                window.scrollTo(0,0);
                }
    </script>
  <link rel="stylesheet" type="text/css" href="./CSS/style.css">
  <script type="text/javascript" src="./JavaScript/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="./JavaScript/memo.js"></script>
  <!-- 森本書き込み -->
  <link rel="stylesheet" href="CSS/slideshow.css">
  <script src="JavaScript/slideshow01.js"></script>
  <script src="JavaScript/slideshow02.js"></script>

  <script type="text/javascript">
          $(document).ready(function(){
              $('.slider').bxSlider({
                  auto: true,
                  pause: 5000,
              });
          });
  </script>
<!-- 森本書き込み -->
  <style>
  header {
  	position: relative;
  	/* height: 50vh */
  }
  header {
  	background: url(images/header01.jpg) center / cover;
  }
  </style>

</head>
<body>
<!-- <body style="background: url(images/bliss.jpg) fixed;"> -->
<header>
			<!-- <a href="./afterlogin.php">
                 <img src="images/logo.png" class="logo" alt="O-HARAlogo">
            </a> -->
			<h1>大原柏SNS</h1>
</header>
    <div class="leftsid-wrapper">
          <ul class="link">
	  	<li onclick="location.href='./sns/test02.php'"><a class="contents" href="./sns/test02.php">チャットルーム</a></li>
          	<li onclick="location.href='./chat/index.php'"><a class="contents" href="./chat/index.php">掲示板</a></li>
          	<li onclick="location.href='./member.php'"><a class="contents" href="./member.php">友達検索</a></li>
          	<li onclick="location.href='./ajax.html'"><a class="contents" href="./ajax.html">検定教室検索</a></li>
          	<li onclick="location.href='#'"><a class="contents" href="#">ブログ</a></li>
          	<li onclick="location.href='#map'"><a class="contents" href="#map">マップ</a></li>
          	<li onclick="location.href='./calendar/index.php'"><a class="contents" href="./calendar/index.php">カレンダー</a></li>
          	<li onclick="location.href='./guide.php'"><a class="contents" href="./guide.php">サイトについて</a></li>
          </ul>
    </div>
    <div class="rightsid-wrapper">
        <div class="profile">
          <!-- <input type="button" class="text" onclick="location.href='./profile.php'" value="profile"> -->
          <br>
          <a href="img-upload/img-upload.php"><img src='<?php echo "./img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="100px" height="100px"></a>
          <p class="text">氏名は<?= $_SESSION["user_name"] ?></p>
          <p class="text">id=<?= $_SESSION["user_id"] ?></p>
          <!--<p class="text"><a href="img-upload/img-upload.php">プロフィール編集</a></p>-->
          <p class="text"><a href="./register_func-master/logout.php?logout"><input type="button" id="login-btn" value="logout" onclick=""></a></p>
        </div>
    </div>
    <div class="wrapper">

      <div class="slider">
      <img src="./images/images.jpeg" width="500" height="600" alt="">
      <img src="./images/IMG_3416.jpeg" width="500" height="600" alt="">
      <img src="./images/IMG_3417.jpeg" width="500" height="600" alt="">
      <img src="./images/IMG_3414.jpeg" width="500" height="600" alt="">
      </div>
    <main>
      <!--news-->
			<div id="news">
				<h1>新着ニュース</h1>
				 <table>
				  <tr>
				   <th>2019.11.1</th>
				   <td>snsサイト開発開始</td>
				  </tr>
				  <tr>
				   <th>2019.10.31</th>
				   <td>ハロウイーン</td>
				  </tr>
				  <tr>
			      <th>2019.10.20</th>
			      <td>基本情報技術者午後試験</td>
				  </tr>
				  <tr>
			      <th>2019.10.16</th>
			      <td>スポーツフェスティバル</td>
				  </tr>
				 </table>
			</div>
      <!--/news-->
      <!--main-->
			<div id="main">
                <h1>メイン</h1>
                <?php
                    include './dbconnect/pdo_connect.php';
                    $sql = "SELECT * FROM message LEFT OUTER JOIN users ON message.user_id = users.user_id WHERE message.user_id = 1 ORDER BY message.time DESC LIMIT 10";
                    $stmt = $pdo -> query($sql);
                    foreach($stmt as $row){
                        ?>
                            <p class="name"><?php echo $row['user_name'].'さんからのおしらせ' ?></p>
                            <p class="time"><?php echo $row['time'] ?></p>
                            <p class="message"><?php echo $row['message'] ?></p>
                        <?}?>
                <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">また、多くの学校から１年生も見学に駆け付けており、たくさん情報収集をしていました💪<br><br>将来の夢を叶えるために、一生懸命頑張る姿はとても素敵なものですね✨<a href="https://twitter.com/hashtag/Python?src=hash&amp;ref_src=twsrc%5Etfw">#Python</a> <a href="https://twitter.com/hashtag/Java?src=hash&amp;ref_src=twsrc%5Etfw">#Java</a> <a href="https://twitter.com/hashtag/HTML?src=hash&amp;ref_src=twsrc%5Etfw">#HTML</a> <a href="https://twitter.com/hashtag/CSS?src=hash&amp;ref_src=twsrc%5Etfw">#CSS</a> <a href="https://twitter.com/hashtag/AI?src=hash&amp;ref_src=twsrc%5Etfw">#AI</a> <a href="https://twitter.com/hashtag/SE?src=hash&amp;ref_src=twsrc%5Etfw">#SE</a> <a href="https://twitter.com/hashtag/%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9E%E3%83%BC?src=hash&amp;ref_src=twsrc%5Etfw">#プログラマー</a> <a href="https://t.co/v73XbQzR7i">pic.twitter.com/v73XbQzR7i</a></p>&mdash; 大原簿記法律専門学校柏校【公式】 (@ohara_kashiwa) <a href="https://twitter.com/ohara_kashiwa/status/1226144844512235522?ref_src=twsrc%5Etfw">February 8, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
      <!--/main-->
    <!--TL-->
            <div id="tl">
                <h1>タイムライン</h1>
                <?php
                    include './dbconnect/pdo_connect.php';
                    $sql = "SELECT * FROM message LEFT OUTER JOIN users ON message.user_id = users.user_id ORDER BY message.time DESC LIMIT 10";
                    $stmt = $pdo -> query($sql);
                    foreach($stmt as $row){
                        ?>
                            <div class="tweet">
                                <a href="./chat/browse.php"><img src='<?php echo "./img-upload/img/mypage/test_id/" . $row['user_img']; ?>' class="profileimg" width="50px" height="50px"></a><br>
                                <p class="myname"><?php echo $row['user_name'] ?></p><br>
                                <p class="message"><?php echo $row['message'] ?></p>
                             </div>
                    <?}?>
            </div>
    <!--/TL-->
    <!--calendar-->
    <div id=cal>
      <div class="top">
        <h1><?php echo $year; ?>年<?php echo $month;?>月</h1>
      </div>
      <table class="cal">
        <tr>
          <th class="day">日</th>
          <th class="day">月</th>
          <th class="day">火</th>
          <th class="day">水</th>
          <th class="day">木</th>
          <th class="day">金</th>
          <th class="day">土</th>
        </tr>

        <tr>
          <?php include('./calendar/config.php');
          $cnt = 0;
          foreach ($calendar as $key => $value): ?>

          <td class="caltd">
            <?php $cnt++; ?>
            <?php
              if($value['day'] == date('d')){
                  echo '<span class="today">'.$value['day'].'</span>';
              }else{
                  echo '<span class="date">'.$value['day'].'</span>';
              }
            ?>
            <?php
            include('./dbconnect/mysqli_connect.php');
          // echo $year.'-'.$month.'-'.$value["day"];
          $day = $value["day"];
          $class = $_SESSION['class'];
          $id = $_SESSION['user_id'];
          $sql = "SELECT * FROM schedule WHERE date = '$year-$month-$day' AND (class = '$class' OR class = '$id' )ORDER BY startTime";
          // echo $sql;
	   $stmt = $mysqli->query($sql);
            // var_dump($stmt);
            echo '<ul class="calul">';
            while ($schedule = $stmt->fetch_assoc()){
              $color = $schedule['color'];
              echo '<p class="'.$color.'">';
              if($schedule['startTime'] == "0000"){
                echo "{$schedule['yotei']}"."<br> "."終日";
              }else{
                echo "{$schedule['yotei']}"."<br> "."{$schedule['startTime']}".'~'."{$schedule['endTime']}";
              }
               echo "</li>" ;
//                ここからスマホ
                $k = "\n";
                $y = "予定 : ";
                $j = "時間 : ";
            if($schedule['startTime'] == "0000"){
                echo '<li class="'.$color.'-phone" name="yotei" id="'.$y.$schedule['yotei'].$k.$j.'終日" onclick="calendar(this)">';
                echo "{$schedule['yotei']}";
              }else{
                echo '<li class="'.$color.'-phone" name="yotei" id="'.$y.$schedule['yotei'].$k.$j.$schedule['startTime'].'~'.$schedule['endTime'].'" onclick="calendar(this)">';
                echo "{$schedule['yotei']}";
              }
            }
            echo "</ul>";
            ?>
          </td>

          <?php if ($cnt == 7): ?>
          </tr>
          <tr>
            <?php $cnt = 0; ?>
          <?php endif; ?>

        <?php endforeach; ?>
      </tr>
    </table>
  </div>
        <script>
            function calendar(ele){
              var id_val = ele.id;
              alert(id_val);
            }
        </script>
  <!--/calendar-->
        <div id="map">
                <a name="map"><h1>マップ</h1></a>
                <iframe src="https://www.google.com/maps/d/embed?mid=1t8VvCWxSM97NyZReEGvY66WIOJ62Cs0a" class="g-map"></iframe>
        </div>
            <div class="btn" onclick="scrollToTop()"></div>
    </main>
  <div class="menu-trigger" href="">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav>
      <div class="profile">
      <p class="text" onclick="location.href='./profile.php'">profile</p>
                <a href="img-upload/img-upload.php"><img src='<?php echo "./img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="100px" height="100px"></a>
                <p class="text">氏名は<?= $_SESSION["user_name"] ?></p>
		<p class="text">IDは<?= $_COOKIE["id"] ?></p>	
<!--          <p class="text">id=<?= $_SESSION["user_id"] ?></p>	-->
                <!--<p class="text"><a href="img-upload/img-upload.php">プロフィール編集</a></p>-->
                <p class="text"><a href="./register_func-master/logout.php?logout"><input type="button" id="login-btn" value="logout" onclick=""></a></p>
      </div>
      <ul class="link">
	  <li onclick="location.href='./sns/test02.php'"><a class="contents" href="./sns/test02.php">チャットルーム</a></li>
          <li onclick="location.href='./chat/index.php'"><a class="contents" href="./chat/index.php">掲示板</a></li>
          <li onclick="location.href='./member.php'"><a class="contents" href="./member.php">友達検索</a></li>
          <li onclick="location.href='./ajax.html'"><a class="contents" href="./ajax.html">検定教室検索</a></li>
          <li onclick="location.href='#'"><a class="contents" href="#">ブログ</a></li>
          <li onclick="location.href='#map'"><a class="contents" href="#map">マップ</a></li>
          <li onclick="location.href='./calendar/index.php'"><a class="contents" href="./calendar/index.php">カレンダー</a></li>
          <li onclick="location.href='./guide.php'"><a class="contents" href="./guide.php">サイトについて</a></li>
      </ul>
  </nav>
  <div class="overlay"></div>
</div>
<footer>
    <ul id="under-list">
          <li><a class="contents" href="./sns/test02.php">チャットルーム</a></li>
          <li><a class="contents" href="./chat/index.php">掲示板</a></li>
          <li><a class="contents" href="./member.php">友達検索</a></li>
          <li><a class="contents" href="./ajax.html">検定教室検索</a></li>
          <li><a class="contents" href="">ブログ</a></li>
          <li><a class="contents" href="#map">マップ</a></li>
          <li><a class="contents" href="./calendar/index.php">カレンダー</a></li>
	  <li><a class="contents" href="./guide.php">サイトについて</a></li>
    </ul>
</footer>
</body>
</html>