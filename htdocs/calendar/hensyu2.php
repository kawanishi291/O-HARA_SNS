<?php
  session_start();
?>
<?php
  header('Location: ./index.php');
    if(isset($_POST['Y'])){
        $_SESSION['date'] = $_POST['Y'].$_POST['M'].$_POST['D'];
    }else{
        $_SESSION['date'] = $_POST["date"];
    }
  echo $_POST["startTime"];
  try{
  include('../dbconnect/pdo_connect.php');
  if($_POST['flg'] == 1){
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO schedule VALUES ('{$_POST["yotei"]}','{$_SESSION['date']}','{$_POST["startTime"]}','{$_POST["endTime"]}','{$_POST["color"]}','{$_POST["class"]}')";
    $pdo -> query($sql);
  }else{
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO schedule VALUES ('{$_POST["yotei"]}','{$_SESSION['date']}','{$_POST["startTime"]}','{$_POST["endTime"]}','{$_POST["color"]}','{$_SESSION["user_id"]}')";
    $pdo -> query($sql);
  }
  }catch(PDOException $Exception){}
  exit;
?>