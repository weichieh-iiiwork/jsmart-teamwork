<?php
session_start();
require_once '../db.inc.php';

$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = "加入購物車失敗";
$objResponse['cartItemNum'] = 0;

//判斷是否有收到cartQty和itemId的值
if( !isset($_POST['cartQty']) || !isset($_POST['itemId']) ){
    header("Refresh: 3; url=./index.php");
    $objResponse['info'] = "資料傳遞有誤";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//建立一個cart的session
if( !isset($_SESSION['cart']) ) $_SESSION['cart'] = [];

//計算收到的訂購商品共有幾項
$sql = "SELECT COUNT(1) AS `count` FROM `items` WHERE `itemId` = ? ";
$stmt = $pdo->prepare($sql);
$stmt->execute([ (int)$_POST['itemId'] ]);
$count = $stmt->fetchAll()[0]['count'];

//若商品項目個數大於 0，則將商品代號和購買數量放到購物車['cart']當中
if($count > 0){
    $_SESSION['cart'][]=[
        "itemId" => (int)$_POST['itemId'],
        "cartQty" => (int)$_POST['cartQty']
    ];

    header("Refresh: 3; url=./myCart.php");
    $objResponse['success'] = true;
    $objResponse['info'] = "已加入購物車";
    $objResponse['cartItemNum'] = count($_SESSION['cart']);

} else {
    header("Refresh: 3; url=./index.php");
    $objResponse['info'] = "查無商品項目";
    $objResponse['cartItemNum'] = count($_SESSION['cart']);
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);