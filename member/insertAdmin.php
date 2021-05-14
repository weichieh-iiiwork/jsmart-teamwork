<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('../db.inc.php'); //引用資料庫連線
$msg = "";
if( isset($_POST['userAccount']) && isset($_POST['userPassword']) 
&& isset($_POST['userName']) && isset($_POST['birthday']) 
&& isset($_POST['phoneNumber']) && isset($_POST['email'])
&& isset($_POST['address']) ) {
    if( $_POST['userAccount'] != "" && $_POST['userPassword'] != "") {
        $sqlUsers = "SELECT `userAccount`,`userPassword`
        FROM `users`";
        $stmtUsers = $pdo->query($sqlUsers);
        $arrUsers = $stmtUsers->fetchAll();
        for( $i = 0; $i < count($arrUsers); $i++ ) {
            if ( $_POST['userAccount'] === $arrUsers[$i]['userAccount'] ) {
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
                    $msg = "新增成功";
                } else {
                    $msg = "新增失敗";
                }
            } else {
                $msg = "兩個密碼並不相符";
            }
        }
    } else {
        $msg = "不能使用空白當帳號或密碼";
    }
} 
else {
    $msg = "欄位沒有完全正確";
}
header("Refresh: 3; url = ./newAdmin.php");
echo $msg;



