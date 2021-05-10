<?php
require_once('./db.inc.php'); //引用資料庫連線
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 300px;
    }
    input,textarea{
        width: 50%;
    }
   
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
    <h1 class="display-4">這裡是活動編輯頁面</h1>
    <p class="lead"><a href="./admin.php">活動總覽</a> | <a href="./new.php">新增頁面</a> | <a href="./logout.php?logout=1">登出</a></p>
  </div>
  </div>

<form name="myForm" method="POST" action="updateEdit.php" enctype="multipart/form-data">
    <table class="table">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`,`eventId`, `eventName`, `eventDate`, `eventDate`, `eventLocation`, `eventPrice`, `eventCategory`, `eventDescription`,`eventCategory`,`eventImg`
                FROM `event` 
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
                <td class="border">活動ID</td>
                <td class="border">
                    <input type="text" name="eventId" value="<?php echo $arr['eventId']; ?>" maxlength="9" />
                </td>
            </tr>
            <tr>
                <td class="border">活動名稱</td>
                <td class="border">
                    <input type="text" name="eventName" class="length" value="<?php echo $arr['eventName'] ?>" maxlength="10" />
                </td>
            </tr>
            
            <tr>
                <td class="border">活動日期</td>
                <td class="border">
                    <input type="date" name="eventDate" value="<?php echo $arr['eventDate'] ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">活動地點</td>
                <td class="border">
                    <input type="text" name="eventLocation" value="<?php echo $arr['eventLocation'] ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">活動價格</td>
                <td class="border">
                    <input type="text" name="eventPrice" value="<?php echo $arr['eventPrice'] ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">活動類別</td>
                <td class="border">
                    <input type="text" name="eventCategory" value="<?php echo $arr['eventCategory'] ?>" maxlength="10" />
                </td>
            </tr>
            
            <tr>
                <td class="border">活動介紹</td>
                <td class="border">
                    <textarea name="eventDescription"><?php echo $arr['eventDescription'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">活動圖片</td>
                <td class="border">
                <?php if($arr['eventImg'] !== NULL) { ?>
                    <img class="w200px" src="./files/<?php echo $arr['eventImg'] ?>" />
                <?php } ?>
                <input type="file" name="eventImg" />
                </td>
            </tr>
            <tr>
                <td class="border">功能</td>
                <td class="border">
                    <a href="./delete.php?id=<?php echo $arr['id'] ?>">刪除</a>
                </td>
            </tr>
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
        </tfoo>
    </table>
    <input type="hidden" name="id" value="<?php echo (int)$_GET['id'] ?>">
</form>
</body>
</html>