<?php
  require_once('../db.inc.php');
  if( isset($_POST['acc']) && isset($_POST['pwd']) ){
    $sql = "SELECT `adminAccount`,`adminPassword`
            FROM `admin`
            WHERE `adminAccount` = ?
            AND `adminPassword` = ?";
    $arrParam = [$_POST['acc'],
                sha1($_POST['pwd'])];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
    if( $stmt->rowCount() > 0 ){
      session_start();
      $_SESSION['acc'] = $_POST['acc'];
      header("Refresh: 1; url=./admin.php");
      echo "登入成功";
    } else {
      header("Refresh: 1; url=./login.php");
      echo "登入失敗";
    }
  } else {
    header("Refresh: 1; url=./login.php");
    echo "輸入欄位不存在";
  }
?>