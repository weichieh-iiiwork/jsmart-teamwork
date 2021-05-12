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
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    <h3>商品類別列表</h3>

    <form name="myForm" method="POST" action="updateCategory.php">
        <table class="border">
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
                <td colspan="3">
                    <?php if($stmt->rowCount() > 0){ ?>
                        <input type="submit" name="smb" value="更新">
                    <?php } ?>
                    <input type="button" value="返回" onclick="location.href='category.php'">
                    </td>
                </tr>
            </tfoot>
        </table>
        <input type="hidden" name="editCategoryId" value="<?php echo (int)$_GET['editCategoryId']; ?>">
    </form>
<?php
require_once('../templates/adtpl-footer.php');
?>
</body>
</html>