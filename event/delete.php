<?php
require_once('../db.inc.php');

//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
$sqlGetImg = "SELECT `eventImg` FROM `event` WHERE `id` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

//加入繫結陣列
$arrGetImgParam = [
    (int)$_GET['id']
];

//執行 SQL 語法
$stmtGetImg->execute($arrGetImgParam);

//若有找到 studentImg 的資料
if ($stmtGetImg->rowCount() > 0) {
    //取得指定 id 的學生資料 (1筆)
    $arrImg = $stmtGetImg->fetchAll()[0];

    //若是 studentImg 裡面不為空值，代表過去有上傳過
    if ($arrImg['eventImg'] !== NULL) {
        //刪除實體檔案
        @unlink("../images/event/" . $arrImg['eventImg']);
    }
}

// SQL 語法
$sql = "DELETE FROM `event` WHERE `id` = ? ";

//加入繫結陣列
$arrParam = [
    (int)$_GET['id']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 1; url=../event/index.php");

if ($stmt->rowCount() > 0) {
    echo "<h3>刪除成功</h3>";
    // echo"<img src=source.gif>";

} else {
    echo "刪除失敗";
}
