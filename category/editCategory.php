<?php
require_once('../db.inc.php');
//require_once('./checkAdmin.php');
require_once('../templates/adtpl-header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/50a326fed3.js" crossorigin="anonymous"></script>
    <style>
    /* *{
        border: 1px solid red;
    } */
    .title-box{
        width: 80%;
        /* background-color: #17a2b8; */
        /* border: 1px solid blue; */
        margin: 50px auto 15px;
    }
    .table-box{
        width: 80%;
        margin: 0 auto 50px;
        padding: 50px;
        background-color: #17a2b8;
        border-radius: 20px;
    }
    .table-style{
        margin: 50px auto;
        /* border: 1px solid blue; */
    }
    .insert-button{
        font-size: 25px;
        padding: 0 30px;
        margin: 20px;
        border-radius: 90px;
        cursor: pointer;
        background: #444;
        color: #fff;
        transition: .5s;
    }
    .insert-button:hover {
        background: #fff;
        color: #17a2b8;
        text-decoration: none;
        transform: scale(1.1)
    }
    </style>
</head>
<body>
<div>
    <div class="title-box">
        <h3>商品類別編輯 <i class="fas fa-edit"></i></h3>
    </div>
    <form name="myForm" method="POST" action="updateCategory.php">
         <div class="table-box">
            <table class="table-style">
                <thead>
                    <tr>
                        <th>類別名稱</th>
                        <th>新增時間</th>
                        <th>更新時間</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT `categoryId`, `categoryName`, `created_at`, `updated_at`
                        FROM `categories`
                        WHERE `categoryId` = ? ";
                $arrParam = [
                    (INT)$_GET['editCategoryId']
                ];
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);

                if($stmt->rowCount() > 0 ){
                    $arrParam = $stmt->fetchAll()[0];
                ?>
                    <tr>
                        <td>
                        <input type="text" name="categoryName" value="<?php echo $arrParam['categoryName']; ?>" maxlengh="100">
                        </td>
                        <td class="border"><?php echo $arrParam['created_at']; ?></td>
                        <td class="border"><?php echo $arrParam['updated_at']; ?></td>
                    </tr>
                <?php    
                } else {
                ?>
                    <tr>
                        <td colspan="3">沒有資料</td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                    <td colspan="3" style="text-align:center">
                        <?php if($stmt->rowCount() > 0){ ?>
                            <input type="submit" name="smb" value="更新" class="insert-button">
                        <?php } ?>
                        <input type="button" value="返回" onclick="location.href='category.php'" class="insert-button">
                        </td>
                    </tr>
                </tfoot>
            </table>
            <input type="hidden" name="editCategoryId" value="<?php echo (int)$_GET['editCategoryId']; ?>">  
        </div>    
    </form>
</div>    
<?php
require_once('../templates/adtpl-footer.php');
?>
</body>
</html>