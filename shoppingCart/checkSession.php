<?php
session_start();

if( !isset($_SESSION['userAccount']) ){
    $objResponse['success'] = false;
    $objResponse['info'] = "請確實登入";

    header("Refresh: 2; url=./myCart.php");
    // echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    require_once '../templates/sc/logintpl-failure.php';
    exit();
}