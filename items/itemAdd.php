<?php
require_once('../db.inc.php');

$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = "新增失敗";

if ($_FILES['itemImg']['error'] === 0) {
    $strDatetime = "item_" . date("YmdHis");
    $extension = pathinfo($_FILES['itemImg']['name'], PATHINFO_EXTENSION);
    $imgFileName = $strDatetime . "." . $extension;
    $isSuccess = move_uploaded_file($_FILES['itemImg']['tmp_name'], "../images/items/" . $imgFileName);

    if (!$isSuccess) {
        header("Refresh: 3; url=./itemAdmin.php");
        echo "圖片上傳失敗";
        exit();
    }
}

$sql = "INSERT INTO `items`(`itemName`,`itemImg`,`itemPrice`,`itemQty`,`itemCategoryId`,`itemDescription`)
VALUES(?,?,?,?,?,?)";

$arrParam = [
    $_POST['itemName'],
    $imgFileName,
    $_POST['itemPrice'],
    $_POST['itemQty'],
    $_POST['itemCategoryId'],
    $_POST['itemDescription']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./itemAdmin.php");
    $objResponse['success'] = true;
    $objResponse['info'] = "新增成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
} else {
    header("Refresh: 3; url=./itemAdmin.php");
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}
