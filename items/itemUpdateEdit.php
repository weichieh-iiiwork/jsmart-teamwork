<?php
require_once('../db.inc.php');

$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = "沒有任何更新";

$arrParam = [];

$sql = "UPDATE `items` SET ";

// 處理商品名稱
$sql .= "`itemName` = ? ,";
$arrParam[] = $_POST['itemName'];

// 處理商品圖片
if ($_FILES['itemImg']['error'] === 0) {
    $strDateTime = "item_" . date("YmdHis");
    $extension = pathinfo($_FILES['itemImg']['name'], PATHINFO_EXTENSION);
    $itemImg = $strDateTime . "." . $extension;
    $isSuccess = move_uploaded_file($_FILES['itemImg']['tmp_name'], "../images/items/{$itemImg}");

    if ($isSuccess) {
        $sqlGetImg = "SELECT `itemImg` FROM `items` WHERE `itemId` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);
        $arrGetImgParam = [(int)$_POST['itemId']];
        $stmtGetImg->execute($arrGetImgParam);

        if ($stmtGetImg->rowCount() > 0) {
            $arrImg = $stmtGetImg->fetchAll()[0];

            if ($arrImg['itemImg'] !== NULL) {
                @unlink("../images/items/{$arrImg['itemImg']}");
            }
            // 資料繫結
            $sql .= "`itemImg` = ? ,";
            $arrParam[] = $itemImg;
        }
    }
}

// 資料繫結
$sql .= "`itemPrice` = ?, 
`itemQty` = ? , 
`itemCategoryId` = ? , 
`itemDescription` = ? 
WHERE `itemId` = ?";

$arrParam[] = $_POST['itemPrice'];
$arrParam[] = $_POST['itemQty'];
$arrParam[] = $_POST['itemCategoryId'];
$arrParam[] = $_POST['itemDescription'];
$arrParam[] = (int)$_POST['itemId'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh:3; url=./itemEdit.php?itemId={$_POST['itemId']}");

if ($stmt->rowCount() > 0) {
    $objResponse['success'] = true;
    $objResponse['info'] = "更新成功";
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
