<?php
if( !isset($_SESSION['username']) && !isset($_SESSION['identity']) ) {
    header("Refresh: 3; url=../index.php");
    echo "請確實登入…3秒後自動回登入頁";
    exit();
}

if($_SESSION['identity'] !== 'admin'){
    header("Refresh: 3; url=../index.php");
    echo "您無權使用該網頁…3秒後自動回登入頁";
    exit();
}