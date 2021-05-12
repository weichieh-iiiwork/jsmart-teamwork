<?php
session_start();
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
    <title></title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
<hr />

<h3>編輯類別</h3>
<form name="myForm" method="POST" action="./insertCategory.php">

<?php
$sql = "SELECT `categoryId`, `categoryName` FROM `categories` ";
$stmt = $pdo->query($sql);
if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll();
?>

<ul>

<?php for($i = 0; $i < count($arr); $i++) { ?>
    <li><?php echo $arr[$i]['categoryName'] ?> 
    | <a href="./editCategory.php?editCategoryId=<?php echo $arr[$i]['categoryId'] ?>">編輯</a> 
    | <a href="./deleteCategory.php?deleteCategoryId=<?php echo $arr[$i]['categoryId'] ?>">刪除</a>
    </li>
<?php } ?>

<?php } ?>

</ul>
<table class="border">
    <thead>
        <tr>
            <th class="border">類別名稱</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border">
                <input type="text" name="categoryName" value="" maxlength="100" placeholder="請輸入類別名稱">
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="border"><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>
<?php
require_once('../templates/adtpl-footer.php');
?>
</body>
</html>
