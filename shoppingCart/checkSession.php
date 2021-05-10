<?php
session_start();

if( !isset($_SESSION['userAccount']) ){
    $objResponse['success'] = false;
    $objResponse['info'] = "請確實登入";

    header("Refresh: 3; url=./index.php");
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}