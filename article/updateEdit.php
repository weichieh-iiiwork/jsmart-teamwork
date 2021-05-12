<?php
require_once('../db.inc.php');
require_once '../templates/adtpl-header.php';

$sql = "UPDATE `article`
        SET
        `articleId` = ?,
        `articleName` = ?,
        `articleContent` = ?,
        `articleAuthor` = ?,
        `articleCategory` = ?,
        `articleTag` = ? ";

$arrParam = [
    $_POST['articleId'],
    $_POST['articleName'],
    $_POST['articleContent'],
    $_POST['articleAuthor'],
    $_POST['articleCategory'],
    $_POST['articleTag']
];


//判斷檔案上傳是否正常，error = 0 為正常
if ($_FILES["articleImg"]["error"] === 0) {
    //為上傳檔案命名
    $strDatetime = date("YmdHis");

    //找出副檔名
    $extension = pathinfo($_FILES["articleImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $articleImg = $strDatetime . "." . $extension;

    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if (move_uploaded_file($_FILES["articleImg"]["tmp_name"], "../images/article/" . $articleImg)) {
        /**
         * 刪除先前的舊檔案: 
         * 一、先查詢出特定 id 資料欄位中的大頭貼檔案名稱
         * 二、刪除實體檔案
         * 三、更新成新上傳的檔案名稱
         *  */

        //先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
        $sqlGetImg = "SELECT `articleImg` FROM `article` WHERE `id` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);

        //加入繫結陣列
        $arrGetImgParam = [
            (int)$_POST['id']
        ];

        //執行 SQL 語法
        $stmtGetImg->execute($arrGetImgParam);

        //若有找到 studentImg 的資料
        if ($stmtGetImg->rowCount() > 0) {
            //取得指定 id 的學生資料 (1筆)
            $arrImg = $stmtGetImg->fetchAll()[0];

            //若是 studentImg 裡面不為空值，代表過去有上傳過
            if ($arrImg['articleImg'] !== NULL) {
                //刪除實體檔案
                @unlink("../files/" . $arrImg['articleImg']);
            }

            /**
             * 因為前面 `studentDescription` = ? 後面沒有加「,」，
             * 若是這裡會有更新 studentImg 的需要，
             * 代表 `studentDescription` = ? 後面缺一個「,」，
             * 不然會報錯
             */
            $sql .= ",";

            //studentImg SQL 語句字串
            $sql .= "`articleImg` = ? ";

            //僅對 studentImg 進行資料繫結
            $arrParam[] = $articleImg;
        }
    }
}


$sql .= "WHERE `id`=?";
$arrParam[] = (int)$_POST['id'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("refresh:1;url=./index.php");
    echo "更新成功";
} else {
    header("refresh:1;url=./index.php");
    echo "更新失敗";
}
