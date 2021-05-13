<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('../db.inc.php'); //引用資料庫連線

$sqlUsers = "SELECT `userAccount`,`userPassword`
            FROM `users`";
$stmtUsers = $pdo->query($sqlUsers);
$arrUsers = $stmtUsers->fetchAll();
$msg = "帳號可以使用";
for( $i = 0; $i < count($arrUsers); $i++ ) {
    if ($_POST['userAccount'] === $arrUsers[$i]['userAccount'] ) {
        header("Refresh: 3; url = ./newAdmin.html");
        $msg = '帳號已經有人使用';
        break;
    }
}

if( $msg !== '帳號已經有人使用' ) {
    if( $_POST['userPassword'] === $_POST['passwordComfirm']) {
        

        $sql = "INSERT INTO `users` 
                (`userAccount`, `userPassword`, `userName`, `birthday`, `phoneNumber`, `email`, `address`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";


        // //繫結用陣列
        $arr = [
            $_POST['userAccount'],
            sha1($_POST['userPassword']),
            $_POST['userName'],
            $_POST['birthday'],
            $_POST['phoneNumber'],
            $_POST['email'],
            $_POST['address']
        ];

        $pdo_stmt = $pdo->prepare($sql);
        $pdo_stmt->execute($arr);
        if($pdo_stmt->rowCount() > 0) {
            header("Refresh: 3; url=./admin.php");
            $msg = "新增成功";
        } else {
            header("Refresh: 3; url=./admin.php");
            $msg = "新增失敗";
        }
    } else {
        header("Refresh: 3; url = ./newAdmin.html");
        $msg = "兩個密碼並不相符";
    }
}
echo $msg;


