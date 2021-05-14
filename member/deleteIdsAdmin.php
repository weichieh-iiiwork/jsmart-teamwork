<?php
session_start();
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('../db.inc.php'); //引用資料庫連線

//將所有 id 透過「,」結合在一起，例如「1,2,3」
$strIds = join(",", $_POST['chk']);

//記錄資料表刪除數量
$count = 0;

$sqlDelete = "DELETE FROM `users` WHERE FIND_IN_SET(`id`, ?)";
$stmtDelte = $pdo->prepare($sqlDelete);
$stmtDelte->execute([$strIds]);
$count = $stmtDelte->rowCount();

header("Refresh: 1; url=./admin.php");
if($count > 0) {
    echo "刪除成功";
} else {
    echo "刪除失敗";
}