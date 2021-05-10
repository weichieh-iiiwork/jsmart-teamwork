<?php
session_start();

unset($_SESSION['userAccount']);

header("Refresh: 3; url=./index.php");

$objResponse['success'] = true;
$objResponse['info'] = "您已登出";
echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);