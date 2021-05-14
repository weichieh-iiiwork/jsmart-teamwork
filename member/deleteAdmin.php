<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('../db.inc.php'); //引用資料庫連線

//SQL 語法
$sql = "DELETE FROM `users` WHERE `id` = ? ";

//加入繫結陣列
$arrParam = [
    (int)$_GET['id']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 3; url=./admin.php");

if($stmt->rowCount() > 0) {
    echo "刪除成功";
} else {
    echo "刪除失敗";
}