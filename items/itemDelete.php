<?php
session_start();
require_once('../db.inc.php');

// 查出特定id的圖片名稱
$sqlGetImg = "SELECT `itemImg` FROM `items` WHERE `itemId` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$arrGetImgParam = [
    (int)$_GET['itemId']
];

$stmtGetImg->execute($arrGetImgParam);

if ($stmtGetImg->rowCount() > 0) {
    $arrImg = $stmtGetImg->fetchAll()[0];

    if ($arrImg['itemImg'] !== NULL) {
        @unlink("../files/items/" . $arrImg['itemImg']);
    }
}

$sql = "DELETE FROM `items` WHERE `itemId` = ? ";

$arrParam = [
    (int)$_GET['itemId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 1; url=./itemAdmin.php");

if ($stmt->rowCount() > 0) {
    echo "刪除成功";
} else {
    echo "刪除失敗";
}
