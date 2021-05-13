<?php
session_start();
require_once './db.inc.php';
$objResponse['success'] = false;
$objResponse['info'] = "登入失敗";
    
if( isset($_POST['userAccount']) && isset($_POST['userPassword']) ){
    switch($_POST['identity']){
        case 'admin':
            $sql = "SELECT `adminAccount`, `adminPassword`, `adminName`
            FROM `admin`
            WHERE `adminAccount` = ?
            AND `adminPassword` = ?";
        break;

        case 'users':
            $sql = "SELECT `userAccount`, `userPassword`, `userName`
            FROM `users`
            WHERE `userAccount` = ?
            AND `userPassword` = ?";
        break;
    }
    

    $arrParam = [
        $_POST['userAccount'],
        sha1($_POST['userPassword'])
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    if( $stmt->rowCount() > 0){
        $arr = $stmt->fetchAll()[0];

        if( $_POST['identity'] === 'admin'){
            header("Refresh: 2.5; url=./admin_index/admin.php");
            $_SESSION['adminAccount'] = $arr['adminAccount'];
        } elseif( $_POST['identity'] === 'users') {
            header("Refresh: 2.5; url=./shoppingCart/index.php");
            $_SESSION['userAccount'] = $arr['userAccount'];
        }

    
        $_SESSION['identity'] = $_POST['identity'];
        // $_SESSION['userName'] = $arr['userName'];

        $objResponse['success'] = true;
        $objResponse['info'] = "登入成功";
        // echo json_encode($objResponse,JSON_UNESCAPED_UNICODE);
        require_once './templates/sc/tpl-success.php';
        exit();
    } 
} else {
    $objResponse['info'] = "請確實登入";
    
}

header("Refresh: 2.5; url=./shoppingCart/index.php");
// echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
require_once './templates/sc/tpl-failure.php';