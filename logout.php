<?php
session_start();

unset($_SESSION['userAccount']);

header("Refresh: 2.5; url=./shoppingCart/index.php");

$objResponse['success'] = true;
$objResponse['info'] = "您已登出";
// echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
require_once './templates/sc/tpl-success.php';