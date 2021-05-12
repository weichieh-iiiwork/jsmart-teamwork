<?php
require_once('../db.inc.php');
require_once '../templates/adtpl-header.php';

$sql = "INSERT INTO `article`(`articleId`, `articleName`, `articleContent`, `articleAuthor`, 
            `articleCategory`, `articleTag`,`articleImg`)
            VALUES(?, ?, ?, ?, ?, ?, ?)";

if ($_FILES["articleImg"]["error"] === 0) {
    //為上傳檔案命名
    $strDatetime = date("YmdHis");

    //找出副檔名
    $extension = pathinfo($_FILES["articleImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $imgFileName = $strDatetime . "." . $extension;

    //移動暫存檔案到實際存放位置
    $isSuccess = move_uploaded_file($_FILES["articleImg"]["tmp_name"], "../images/article/" . $imgFileName);

    //若上傳失敗，則不會繼續往下執行，回到管理頁面
    if (!$isSuccess) {
        header("Refresh: 1; url=./admin.php");
        echo "圖片上傳失敗";
        exit();
    }
}

$arr = [
    $_POST['articleId'],
    $_POST['articleName'],
    $_POST['articleContent'],
    $_POST['articleAuthor'],
    $_POST['articleCategory'],
    $_POST['articleTag'],
    $imgFileName
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arr);
if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=./index.php");
    echo "新增成功";
} else {
    header("Refresh: 1; url=./index.php");
    echo "新增失敗";
}
