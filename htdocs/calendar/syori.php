<?php 
	include('./config.php');
	header('Location: ./index.php');
?>
    <?php
      include('../dbconnect/mysqli_connect.php');
      $yotei = $_POST['yotei'];
      $date = $_POST['yaer']."-".$_POST['month']."-".$_POST['date'];
      $startTime = $_POST['startTime'];
      $sql = "DELETE FROM schedule WHERE `yotei`='$yotei' AND `date`='$date' AND `startTime`='$startTime'";
      $stmt = $mysqli->query($sql);
     ?>