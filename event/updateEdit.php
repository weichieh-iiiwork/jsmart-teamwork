  
<?php
require_once('./db.inc.php'); //引用資料庫連線


//先對其它欄位，進行 SQL 語法字串連接
$sql = "UPDATE `event` 
        SET 
        `eventId` = ?, 
        `eventName` = ?,
        `eventDate` = ?,
        `eventLocation` = ?,
        `eventPrice`= ?,
        `eventCategory` = ?,
        `eventDescription` = ? ";

//先對其它欄位進行資料繫結設定
$arrParam = [
    $_POST['eventId'],
    $_POST['eventName'],
    $_POST['eventDate'],
    $_POST['eventLocation'],
    $_POST['eventPrice'],
    $_POST['eventCategory'],
    $_POST['eventDescription']
];

//判斷檔案上傳是否正常，error = 0 為正常
if( $_FILES["eventImg"]["error"] === 0 ) {
    //為上傳檔案命名
    $strDatetime = date("YmdHis");
        
    //找出副檔名
    $extension = pathinfo($_FILES["eventImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $eventImg = $strDatetime.".".$extension;

    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( move_uploaded_file($_FILES["eventImg"]["tmp_name"], "./files/".$eventImg) ) {
        /**
         * 刪除先前的舊檔案: 
         * 一、先查詢出特定 id 資料欄位中的大頭貼檔案名稱
         * 二、刪除實體檔案
         * 三、更新成新上傳的檔案名稱
         *  */ 

        //先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
        $sqlGetImg = "SELECT `eventImg` FROM `event` WHERE `id` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);

        //加入繫結陣列
        $arrGetImgParam = [
            (int)$_POST['id']
        ];

        //執行 SQL 語法
        $stmtGetImg->execute($arrGetImgParam);

        //若有找到 studentImg 的資料
        if($stmtGetImg->rowCount() > 0) {
            //取得指定 id 的學生資料 (1筆)
            $arrImg = $stmtGetImg->fetchAll()[0];

            //若是 studentImg 裡面不為空值，代表過去有上傳過
            if($arrImg['eventImg'] !== NULL){
                //刪除實體檔案
                @unlink("./files/".$arrImg['eventImg']);
            } 
            
            /**
             * 因為前面 `studentDescription` = ? 後面沒有加「,」，
             * 若是這裡會有更新 studentImg 的需要，
             * 代表 `studentDescription` = ? 後面缺一個「,」，
             * 不然會報錯
             */
            $sql.= ",";

            //studentImg SQL 語句字串
            $sql.= "`eventImg` = ? ";

            //僅對 studentImg 進行資料繫結
            $arrParam[] = $eventImg;
            
        }
    }
}

//SQL 結尾
$sql.= "WHERE `id` = ? ";
$arrParam[] = (int)$_POST['id'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 3; url=./admin.php");

if( $stmt->rowCount() > 0 ){
    // echo "<h3>更新成功</h3>";
    // echo "<img src=source.gif>";
    require_once("templates/updateEdit.html");
} else {
    echo "沒有任何更新";
}