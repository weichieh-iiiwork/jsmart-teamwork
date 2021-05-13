<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('../db.inc.php'); //引用資料庫連線

/**
 * 注意：
 * 
 * 因為要判斷更新時檔案有無上傳，
 * 所以要先對前面/其它的欄位先進行 SQL 語法字串連接，
 * 再針對圖片上傳的情況，給予對應的 SQL 字串和資料繫結設定。
 * 
 */

// 先對其它欄位，進行 SQL 語法字串連接
$sql = "UPDATE `users` 
        SET 
        `userAccount` = ?, 
        `userPassword` = ?,
        `userName` = ?,
        `birthday` = ?,
        `phoneNumber` = ?,
        `email` = ?,
        `address` = ?";

// 先對其它欄位進行資料繫結設定
$arrParam = [
    $_POST['userAccount'],
    sha1($_POST['userPassword']),
    $_POST['userName'],
    $_POST['birthday'],
    $_POST['phoneNumber'],
    $_POST['email'],
    $_POST['address']
];

//判斷檔案上傳是否正常，error = 0 為正常

//SQL 結尾
$sql.= " WHERE `id` = ? ";
$arrParam[] = (int)$_POST['id'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 3; url=./admin.php");

if( $stmt->rowCount() > 0 ){
    echo "更新成功";
} else {
    echo "沒有任何更新";
}

// $sql = "UPDATE `users` 
//         SET 
//         `userAccount` = ?,
//         `userPassword` = ?

//         WHERE `id` = ?";
// $arrParam = [
//     $_POST['userAccount'],
//     $_POST['userPassword'],
//     (int)$_POST['id']];
// $stmt = $pdo->prepare($sql);
// $stmt->execute($arrParam);
// header("Refresh: 3; url=./admin.php");