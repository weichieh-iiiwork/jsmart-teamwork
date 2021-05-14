<?php
require_once('../db.inc.php'); //引用資料庫連線

//SQL 敘述
$sql = "INSERT INTO `event` 
        (`eventName`, `eventDate`, `eventLocation`, `eventPrice`, `eventCategory`,`eventDescription`,`eventImg`) 
        VALUES (?, ?, ?, ?, ?, ?,?)";

if ($_FILES["eventImg"]["error"] === 0) {
    //為上傳檔案命名
    $strDatetime = date("YmdHis");

    //找出副檔名
    $extension = pathinfo($_FILES["eventImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $imgFileName = $strDatetime . "." . $extension;

    //移動暫存檔案到實際存放位置
    $isSuccess = move_uploaded_file($_FILES["eventImg"]["tmp_name"], "../images/event/" . $imgFileName);

    //若上傳失敗，則不會繼續往下執行，回到管理頁面
    if (!$isSuccess) {
        header("Refresh: 1; url=../event/index.php");
        echo "圖片上傳失敗";
        exit();
    }
}

//繫結用陣列
$arr = [
    $_POST['eventName'],
    $_POST['eventDate'],
    $_POST['eventLocation'],
    $_POST['eventPrice'],
    $_POST['eventCategory'],
    $_POST['eventDescription'],
    $imgFileName
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if ($pdo_stmt->rowCount() > 0) {
    header("Refresh: 1; url=../event/index.php");
    echo "新增成功";
    // require_once("./templates/insert.html");

} else {
    header("Refresh: 1; url=../event/index.php");
    echo "新增失敗";
}
