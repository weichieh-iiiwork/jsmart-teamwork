<?php
require_once('../db.inc.php');
//require_once('./checkAdmin.php');

$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = "新增商品種類失敗";

if( $_POST['categoryName'] == '' ){
    header("Refresh: 1; url=./category.php");
    $objResponse['success'] = false;
    $objResponse['info'] = "請填寫商品種類";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//新增類別
if( isset($_POST['categoryId']) ){
    $sql = "INSERT INTO `categories` (`categoryName`, `categoryParentId`) VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $arrParam = [
        $_POST['categoryName'], 
        $_POST['categoryId']
    ];
    $stmt->execute($arrParam);
    if($stmt->rowCount() > 0) {
        header("Refresh: 1; url=./category.php");
        $objResponse['success'] = true;
        $objResponse['info'] = "新增成功";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    } else {
        header("Refresh: 1; url=./category.php");
        $objResponse['success'] = false;
        $objResponse['info'] = "新增失敗";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    }

} else {
    $sql = "INSERT INTO `categories` (`categoryName`) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $arrParam = [$_POST['categoryName']];
    $stmt->execute($arrParam);
    if($stmt->rowCount() > 0) {
        header("Refresh: 1; url=./category.php");
        $objResponse['success'] = true;
        $objResponse['info'] = "新增成功";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    } else {
        header("Refresh: 1; url=./category.php");
        $objResponse['success'] = false;
        $objResponse['info'] = "新增失敗";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    }
}