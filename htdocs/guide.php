<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <link rel="shortcut icon" href="favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>サイト紹介</title>
    <script>
        function scrollToTop() {
                window.scrollTo(0,0);
                }
    </script>
  <link rel="stylesheet" type="text/css" href="./CSS/style.css">
  <script type="text/javascript" src="./JavaScript/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="./JavaScript/memo.js"></script>
  <script type="text/javascript" src="./JavaScript/cal.js"></script>
  <!-- 森本書き込み -->
  <link rel="stylesheet" href="CSS/slideshow.css">
  <script src="JavaScript/slideshow01.js"></script>
  <script src="JavaScript/slideshow02.js"></script>

  <script type="text/javascript">
          $(document).ready(function(){
              $('.slider').bxSlider({
                  auto: true,
                  pause: 7000,
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
			<h1>大原柏SNS　サイト紹介</h1>
</header>
    <div class="leftsid-wrapper">
          <ul class="link">
              <li onclick="location.href='./afterlogin.php'"><a class="contents" href="./afterlogin.php">トップページ</a></li>
              <li onclick="location.href='./sns/test02.php'"><a class="contents" href="./sns/test02.php">チャットルーム</a></li>
              <li onclick="location.href='./chat/index.php'"><a class="contents" href="./chat/index.php">掲示板</a></li>
              <li onclick="location.href='./member.php'"><a class="contents" href="./member.php">友達検索</a></li>
              <li onclick="location.href='./ajax.html'"><a class="contents" href="./ajax.html">検定教室検索</a></li>
              <li onclick="location.href='#'"><a class="contents" href="#">ブログ</a></li>
              <li onclick="location.href='./calendar/index.php'"><a class="contents" href="./calendar/index.php">カレンダー</a></li>
          </ul>
    </div>
    <div class="rightsid-wrapper">
        <div class="profile">
          <input type="button" class="text" onclick="location.href='./profile.php'" value="profile">
                    <a href="img-upload/img-upload.php"><img src='<?php echo "./img-upload/img/mypage/test_id/" . $_SESSION["user_img"]; ?>' class="profileimg" width="100px" height="100px"></a>
                    <p class="text">氏名は<?= $_SESSION["user_name"] ?></p>
                    <p class="text">id=<?= $_SESSION["user_id"] ?></p>
                    <!--<p class="text"><a href="img-upload/img-upload.php">プロフィール編集</a></p>-->
                    <p class="text"><a href="./register_func-master/logout.php?logout"><input type="button" id="login-btn" value="logout" onclick=""></a></p>
        </div>

    </div>
      <main>
            <div id="main">
                <h1>はじめに</h1>
                <h3>自己紹介</h3>
                <div class="pl">
                    <img src="./images/ryu.jpg" width="187.5px" height="250px">
                    <li>
                        氏名:森本龍
                    </li>
                    <li>
                        年齢:22歳
                    </li>
                    <li>
                        担当箇所:ログイン、カレンダー
                    </li><br>
                </div>
                <div class="pl">
                    <img src="./images/shotaro.jpg" width="187.5px" height="250px">
                    <li>
                        氏名:河西翔太郎
                    </li>
                    <li>
                        年齢:22歳
                    </li>
                    <li>
                        担当箇所:チャット、掲示板
                    </li><br>
                </div>
            </div>
			<div id="introduction">
                <h1>制作過程</h1>
                    <h3>●このシステムをつくろうと思ったきっかけ</h3>
                    <p class="introduction">学校の授業で習った知識を応用させて何かシステムの開発に挑戦したいと思い、身近な問題を探し始めました。2019年に関東地方を襲った台風19号の影響で学校から学生たちへの緊急連絡の取り方が分かりづらく自分自身も苦労した経験を元にして、学校や学生の間で生まれる問題に注目しました。学校に連絡網がなく休校の連絡などの確認が不便という問題点と、同じクラスメイトとしか関わり合いがなく知り合うきっかけが欲しいという要望をかなえるために、このシステムの開発を考え始めました。学校からの案内を一元的に確認できチャット機能をはじめ、学生検索機能、掲示板投稿機能、カレンダーには各々のスケジュールを入れられる仕様にし、閉鎖的なSNSという新しいジャンルに挑戦してみました。</p>
                    <h3>●問題点</h3>
                        <h4>学生目線</h4>
                            <li>他県からの入学生も多いため、学校周辺の情報が分からない。</li>
                            <li>クラスメイトとしか関わりがなく、学生同士で知り合う機会が無い。</li>
                            <li>学校からの緊急連絡があった場合、確認する方法がHPしか無い。(個別で連絡が来ない)</li>
                        <h4>学校目線</h4>
                            <li>学生に対して緊急の連絡を取る際、個々に連絡が出来ない。</li>
                            <li>クラスの予定などを何度もアナウンスする事が多い。</li>
                            <li>学生の参加するイベントが少なく、クラスメイト同士で固まってしまう。</li>
                    <h3>●解決案</h3>
                            <li>学生たちで作り上げる周辺マップ</li>
                            <li>クラス毎に管理できるカレンダー</li>
                            <li>学生同士が簡単に知りあえて、繋がれるチャット</li>
                            <li>学校からの連絡が一目で分かる掲示板</li>
                    <h3>●システムの使用効果</h3>
                            <li>楽しく</li><p class="introduction">先輩たちから後輩たちへと受け継がれる周辺マップを利用して放課後も有意義な時間に！</p>
                            <li>円滑に</li><p class="introduction">カレンダーや掲示板で学校からの連絡や予定を一元管理！！</p>
                            <li>意欲を持って</li><p class="introduction">チャットと学生検索機能を使用して同じ趣味や気の合う仲間たちと繋がれ、互いに高め合う仲間を探せる！</p>
                    <h3>●今後の課題</h3>
                            <li>セキュリティ面</li>
                            <li>レベルを与えた管理者画面</li>
            </div>
            <div id="main">
                <h1>設計書</h1><br>
                <div class="slider">
                    <img src="./images/TOP.png" width="800px">
                    <img src="./images/chat.png" width="800px">
                </div>
            </div>
            <div id="main">
                <h1>機能、仕様概要</h1>
                <h3>機能概要</h3>
                <li>チャット</li><button onclick="location.href='./sns/test02.php'">チャットルームへ</button>
                <li>掲示板（投稿、閲覧）</li><button onclick="location.href='./chat/index.php'">掲示板へ</button>
                <li>学生検索</li><button onclick="location.href='./member.php'">友達検索へ</button>
                <li>カレンダー（予定編集）</li><button onclick="location.href='./calendar/index.php'">カレンダーへ</button>
                <li>学校周辺マップ（編集）</li><button onclick="location.href='https://www.google.com/maps/d/viewer?mid=1t8VvCWxSM97NyZReEGvY66WIOJ62Cs0a&ll=35.864998935098015%2C139.9722337280308&z=16'">大原柏マップへ</button>
                <h3>使用言語</h3>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript(ajax、jquery)</li>
                <li>PHP</li>
                <li>SQL</li>
                <h3>総コード行数</h3><p>11,293行</p>
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
                <p class="text">id=<?= $_SESSION["user_id"] ?></p>
                <!--<p class="text"><a href="img-upload/img-upload.php">プロフィール編集</a></p>-->
                <p class="text"><a href="./register_func-master/logout.php?logout"><input type="button" id="login-btn" value="logout" onclick=""></a></p>
      </div>
      <ul class="link">
          <li onclick="location.href='./afterlogin.php'"><a class="contents" href="./afterlogin.php">トップページ</a></li>
          <li onclick="location.href='./sns/test02.php'"><a class="contents" href="./sns/test02.php">チャットルーム</a></li>
          <li onclick="location.href='./chat/index.php'"><a class="contents" href="./chat/index.php">掲示板</a></li>
          <li onclick="location.href='./member.php'"><a class="contents" href="./member.php">友達検索</a></li>
          <li onclick="location.href='./ajax.html'"><a class="contents" href="./ajax.html">検定教室検索</a></li>
          <li onclick="location.href='#'"><a class="contents" href="#">ブログ</a></li>
          <li onclick="location.href='./calendar/index.php'"><a class="contents" href="./calendar/index.php">カレンダー</a></li>
      </ul>
  </nav>
  <div class="overlay"></div>
<footer>
    <ul id="under-list">
          <li><a class="contents" href="./afterlogin.php">トップページ</a></li>
          <li><a class="contents" href="./sns/test02.php">チャットルーム</a></li>
          <li><a class="contents" href="./chat/index.php">掲示板</a></li>
          <li><a class="contents" href="member.php">友達検索</a></li>
          <li><a class="contents" href="./ajax.html">検定教室検索</a></li>
          <li><a class="contents" href="">ブログ</a></li>
          <li><a class="contents" href="https://www.google.com/maps/d/viewer?mid=1t8VvCWxSM97NyZReEGvY66WIOJ62Cs0a&ll=35.864998935098015%2C139.9722337280308&z=16">マップ</a></li>
          <li><a class="contents" href="#cal">カレンダー</a></li>
    </ul>
</footer>
</body>
</html>