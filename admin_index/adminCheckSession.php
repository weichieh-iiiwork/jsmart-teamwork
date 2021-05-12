<?php
session_start();

if( !isset($_SESSION['adminAccount']) ){
    $objResponse['success'] = false;
    $objResponse['info'] = "請確實登入";

    header("Refresh: 3; url=../shoppingCart/index.php");
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}