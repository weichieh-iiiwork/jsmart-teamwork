<?php
session_start();

//預設訊息
$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = "查無購物車編號";

header("Refresh: 2; url=./myCart.php");

if( !isset($_GET['idx']) ){
    // echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    require_once '../templates/sc/deltpl-failure.php';
    exit();
}

//若購物車當中有 GET 指定的 idx，則將之刪除，並重建索引
if( isset($_SESSION['cart'][$_GET["idx"]]) ){
    //刪除指定的索引位置
    unset($_SESSION['cart'][$_GET["idx"]]);

    //重建索引
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    $objResponse['success'] = true;
    $objResponse['info'] = "已刪除購物車商品項目";
}

// echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
require_once '../templates/sc/deltpl-success.php';