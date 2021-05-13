<?php
// session_start();
require_once '../templates/adtpl-header.php';
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>JSMART(後台)</title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
<nav>
    <!-- <div class="slogan">JSMART</div> -->
    <div class="navbar">
      <a href="./regist.html">註冊</a>
      <a href="./admin.php">會員管理</a>
      <a href="./newAdmin.html">新增頁面</a>
      <!-- <a href="./logout.php?logout=1">登出</a> -->
    </div>
  </nav>
<hr />
<form name="myForm" method="POST" action="updateEditAdmin.php" enctype="multipart/form-data">
    <table class="border">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `userAccount`,`userPassword`,`userName`,`birthday`,
                `phoneNumber`,`email`,`address`
                FROM `users`
                WHERE `id` = ?";

        //設定繫結值
        $arrParam = [
            (int)$_GET['id']
        ];

        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll()[0];
        ?>
            <tr>
                <td class="border">帳號</td>
                <td class="border">
                    <input type="text" name="userAccount" value="<?php echo $arr['userAccount']; ?>" maxlength="50" />
                </td>
            </tr>
            <tr>
                <td class="border">密碼</td>
                <td class="border">
                    <input type="text" name="userPassword" value="" maxlength="40" />
                </td>
            </tr>
            <tr>
                <td class="border">姓名</td>
                <td class="border">
                    <input type="text" name="userName" value="<?php echo $arr['userName']; ?>" maxlength="50" />
                </td>
            </tr>
            <tr>
                <td class="border">生日</td>
                <td class="border">
                    <input type="text" name="birthday" value="<?php echo $arr['birthday']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">手機號碼</td>
                <td class="border">
                    <input type="text" name="phoneNumber" value="<?php echo $arr['phoneNumber']; ?>" maxlength="15" />
                </td>
            </tr>
            <tr>
                <td class="border">Email</td>
                <td class="border">
                    <input type="text" name="email" value="<?php echo $arr['email']; ?>" maxlength="15" />
                </td>
            </tr>
            <tr>
                <td class="border">地址</td>
                <td class="border">
                    <input type="text" name="address" value="<?php echo $arr['address']; ?>" maxlength="50" />
                </td>
            </tr>
            <!-- <tr>
                <td class="border">功能</td>
                <td class="border">
                    <a href="./delete.php?id=<?php echo $arr['id']; ?>">刪除</a>
                </td>
            </tr> -->
        <?php
        } else {
        ?>
            <tr>
                <td class="border" colspan="6">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="6"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoot>
    </table>
    <input type="hidden" name="id" value="<?php echo (int)$_GET['id'] ?>">
</form>

<?php require_once '../templates/adtpl-footer.php' ?>