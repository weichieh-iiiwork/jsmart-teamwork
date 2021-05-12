<?php
session_start();
require_once '../db.inc.php';
require_once '../templates/tpl-header.php';
?>

<!-- editCart.php -->
<div class="container mt-5">
    <form name="myCartForm" method="POST" action="./updateEditCart.php">
        <table class="table table-hover">
            <thead>
                <tr class="row justify-content-center text-center">
                    <td class="col-4">商品名稱</td>
                    <td class="col-2">價格</td>
                    <td class="col-2">數量</td>
                    <!-- <td class="col-2">小計</td> -->
                    <td class="col-1">功能</td>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT `items`.`itemId`, 
                `items`.`itemName`,
                `items`.`itemImg`, 
                `items`.`itemPrice`,
                `items`.`itemQty`,
                `categories`.`categoryId`, 
                `categories`.`categoryName`
                FROM `items` INNER JOIN `categories`
                ON `items`.`itemCategoryId` = `categories`.`categoryId`
                WHERE `itemId` = ? ";

                $arrParam = [
                    $_SESSION['cart'][$_GET['editCartId']]['itemId']
                ];

                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);

                    //若商品項目個數大於 0，則把買家購買的數量加到查詢結果當中
                if($stmt->rowCount() > 0) {
                    $arrItem = $stmt->fetchAll()[0];
                }

            ?>

            
                <tr class="row justify-content-center text-center">
                    <td class="col-4 ">
                        <div class="d-flex">
                            <img class="img-fluid rounded shadow-sm" width="70" src="../images/items/<?php echo $arrItem["itemImg"] ?>" alt="">
                            <div>
                                <h5><?php echo $arrItem["itemName"] ?></h5>
                                <span>Category:<?php echo $arrItem["categoryName"] ?></span>
                            </div>
                        </div>
                    </td>
                    <td class="col-2">$ <?php echo $arrItem["itemPrice"] ?></td>
                    <td class="col-2"> 數量
                        <input type="number" name="cartQty" value="<?php echo $_SESSION['cart'][$_GET['editCartId']]['cartQty'] ?>" maxlength="5" min="1" max="<?php echo $arrItem["itemQty"] ?>">
                     </td>
                    <!-- <td class="col-2"> $尚未更新             -->
                     <?php 
                    // echo ($arrItem["itemPrice"] * $_SESSION['cart'][$_GET['editCartId']]['cartQty']) 
                    ?>
                    <!-- </td> -->
                    <td class="col-1">
                        <input type="submit" class="btn btn-primary" name="smb" value="更新">
                        <input type="hidden" name="editCartId" value="<?php echo $_GET['editCartId'] ?>">
                        
                    </td>
                </tr>


            </tbody>
    
        </table>
        
    </form>


</div>


<?php
require_once '../templates/tpl-footer.php';
?>