<?php
// session_start();

//判斷是否登入 (確認先前指派的 session 索引是否存在)
// if( !isset($_SESSION['acc']) ) {
//     //關閉 session
//     session_destroy();
    
//     //3 秒後跳頁
//     header("Refresh: 3; url=./index.html");
//     echo "請確實登入…3秒後自動回登入頁";
//     exit();
// }

if( !isset($_SESSION['adminAccount']) ){
    $objResponse['success'] = false;
    $objResponse['info'] = "請確實登入";

    header("Refresh: 1; url=../login.php");
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}