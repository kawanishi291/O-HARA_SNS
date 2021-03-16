<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./master.css">
  <?php include('./config.php'); ?>
  <title></title>
</head>
<body>
  <div class="top">
    <?php
    echo '<a href="sakuzyo.php?ym='.$lastmonth.'">前月</a>';
    echo $year; ?>年<?php echo $month;
    ?>月のカレンダー
    <?php
    echo '<a href="sakuzyo.php?ym='.$nextmonth.'">次月</a>';
    ?>
  </div>
	<div class="left">
    <a href="hensyu1.php" class="none">予定編集</a>
    <a href="sakuzyo.php" class="none">予定削除</a>
    <a href="../afterlogin.php" class="none">トップへ戻る</a>
  </div>
<br>
<br>
<table>
    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>

    <tr>
    <?php $cnt = 0; ?>
    <?php foreach ($calendar as $key => $value): ?>

        <td>
        <?php $cnt++; ?>
        <?php echo '<span class="date">'.$value['day'].'</span>'; ?>
        <?php
          include('../dbconnect/mysqli_connect.php');
          // echo $year.'-'.$month.'-'.$value["day"];
          $day = $value["day"];
	  $class = $_SESSION['class'];
	  $id = $_SESSION['user_id'];
          $sql = "SELECT * FROM schedule WHERE date = '$year-$month-$day' AND (class = '$class' OR class = '$id' )ORDER BY startTime";
          // echo $sql;
          $stmt = $mysqli->query($sql);
          // var_dump($stmt);
          echo "<ul>";
          foreach ($stmt as $schedule){
            $color = $schedule['color'];
            echo '<form action="syori.php" method="post">';
            echo '<li class="'.$color.'">';
            if($schedule['startTime'] == "0000"){
              echo "{$schedule['yotei']}"."<br> "."終日";
              echo '<input name="yotei" type="hidden" value="'.$schedule['yotei'].'">';
              echo '<input name="yaer" type="hidden" value="'.$year.'">';
              echo '<input name="month" type="hidden" value="'.$month.'">';
              echo '<input name="date" type="hidden" value="'.$day.'">';
              echo '<input name="startTime" type="hidden" value="'.$schedule['startTime'].'">';
            }else{
              echo "{$schedule['yotei']}"."<br> "."{$schedule['startTime']}".'~'."{$schedule['endTime']}";
              echo '<input name="yotei" type="hidden" value="'.$schedule['yotei'].'">';
              echo '<input name="yaer" type="hidden" value="'.$year.'">';
              echo '<input name="month" type="hidden" value="'.$month.'">';
              echo '<input name="date" type="hidden" value="'.$day.'">';
              echo '<input name="startTime" type="hidden" value="'.$schedule['startTime'].'">';
            }
            echo '<input type="submit" value="削除"></li>';
            echo '</form>';
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
</body>
</html>
