<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/hensyu.css">
    <title>予定記入</title>
  </head>
  <body>
    <form class="" action="hensyu2.php" method="post">
      <input type="text" name='yotei' id="yotei" placeholder="予定を入力してください" required>
      <div>
          <?php
    if( strcmp ($_SESSION['browser'], "Chrome") == 0 ){
        echo "<input type='date' name='date' id='date' required>";
    }else{
    ?>
        <select name="Y" id="Y" required>
            <?php
            $i = date("Y");
	    $i2 = $i+5;
            for($i; $i<$i2; $i++){
            ?>
                <option value="<?= $i ?>-"><?= $i ?></option>
            <?php
            }
            ?>
        </select>
        <select name="M" id="M" required>
            <?php
            $i = 1;
            for($i; $i<10; $i++){
            ?>
                <option value="0<?= $i ?>-"><?= $i ?></option>
            <?php
            }
            $i = 10;
            for($i; $i<13; $i++){
            ?>
                <option value="<?= $i ?>-"><?= $i ?></option>
            <?php
            }
            ?>
        </select>
        <select name="D" id="D" required>
            <?php
            $i = 1;
            for($i; $i<10; $i++){
            ?>
                <option value="0<?= $i ?>"><?= $i ?></option>
            <?php
            }
            $i = 10;
            for($i; $i<32; $i++){
            ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php
            }
            ?>
        </select>
    <?php   
    }
    ?> 
        <select name="startTime" id="Stime">
          <option value="0000">終日</option>
          <?php
          for($i=0; $i<24; $i++){
            for($j=0; $j<2; $j++){
              if($i < 10){
                $hour = "0".$i;
              }else{
                $hour = $i;
              }
              $j30 = $j * 30;
              if($j30 == 0){
                $j00 = "00";
                echo "<option value=".$hour.":".$j00.">".$i.":".$j00."</option>";
              }else{
                $sj30 = "30";
                echo "<option value=".$hour.":".$j30.">".$i.":".$j30."</option>";
              }
            }
          }
          ?>
        </select>
        <select name="endTime" id="Etime">
          <option value="0000">--</option>
          <?php
          for($i=0; $i<24; $i++){
            for($j=0; $j<2; $j++){
              if($i < 10){
                $hour = "0".$i;
              }else{
                $hour = $i;
              }
              $j30 = $j * 30;
              if($j30 == 0){
                $j00 = "00";
                echo "<option value=".$hour.":".$j00.">".$i.":".$j00."</option>";
              }else{
                $sj30 = "30";
                echo "<option value=".$hour.":".$j30.">".$i.":".$j30."</option>";
              }
            }
          }
          ?>
        </select>
      </div>
      <div>
        <select name="color" id="tagu" required>
          <option value="red">赤</option>
          <option value="blue">青</option>
          <option value="yellow">黄色</option>
          <option value="green">緑</option>
        </select>
        <label for="checkbox"><input type="checkbox" name="flg" id="checkbox" value="1">クラスの予定</label>
        <input type="hidden" name="class" value="<?php echo $_SESSION['class']; ?>">
      </div>
      <input type="submit" name="" id="button" value="登録">
    </form>
  </body>
</html>
