<?php
session_start();
require_once '../db.inc.php';

$objResponse['success'] = false;
$objResponse['info'] = "請輸入完整資料";

if($_POST['userAccount'] == '' ) {
  header('Refresh: 3; url=./admin.php');
  echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
  exit();
}

$sql = "INSERT INTO `users` (`userAccount`,`userPassword`,`userName`,
        `birthday`,`phoneNumber`,`email`,`address`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$arrParam = [
  $_POST["userAccount"],
  sha1($_POST["userPassword"]),
  $_POST["userName"],
  $_POST["birthday"],
  $_POST["phoneNumber"],
  $_POST["email"],
  $_POST["address"]
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
print_r($stmt->fetchAll());

if($stmt->rowCount() > 0 ) {
  header("Refresh: 1; url=./admin.php");
  $_SESSION['username'] = $_POST['userAccount'];

  $objResponse['success'] = true;
  $objResponse['info'] = "註冊成功";
  echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
} else {
  header("Refresh: 1; url=./admin.php");
  $objResponse['info'] = "註冊失敗";
  echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}
?>