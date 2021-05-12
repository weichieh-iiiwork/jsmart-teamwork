<?php
session_start();

header("Refresh: 3; url=./myCart.php");
$_SESSION['cart'][$_POST['editCartId']]['cartQty'] = $_POST['cartQty'];

$objResponse = [];
$objResponse['success'] = true;
$objResponse['info'] = "更新成功";

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
