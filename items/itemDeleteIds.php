<?php
session_start();
require_once('../db.inc.php');

// $objResponse = [];
// $objResponse['success'] = false;
// $objResponse['info'] = "刪除失敗";

$strIds = join(",", $_POST['chk']);

$count = 0;

$sqlGetImg = "SELECT `itemImg` FROM `items` WHERE FIND_IN_SET(`itemId`, ? )";
$stmtGetImg = $pdo->prepare($sqlGetImg);
$stmtGetImg->execute([$strIds]);
if ($stmtGetImg->rowCount() > 0) {
    $arrImg = $stmtGetImg->fetchAll();

    for ($i = 0; $i < count($arrImg); $i++) {
        if ($arrImg[$i]['itemImg'] !== NULL) {
            @unlink("../images/items/") . $arrImg[$i]['itemImg'];
        }
    }

    //在這裡刪除資料表記錄
    $sqlDelete = "DELETE FROM `items` WHERE FIND_IN_SET(`itemId`, ? )";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$strIds]);
    $count = $stmtDelete->rowCount();
}

header("Refresh: 3; url=./itemAdmin.php");

if ($count > 0) {
    echo "刪除成功";
} else {
    echo "刪除失敗";
}
