<?php 
session_start();
require_once '../db.inc.php';
require '../templates/tpl-header.php'
?>

<!-- 商品詳細頁面 -->
<div class="wrap border d-flex mx-auto mt-5" style="width: 42rem;">
<?php
    if( isset($_GET['itemId']) ){
        $sql="SELECT `items`.`itemId`, 
            `items`.`itemName`, 
            `items`.`itemImg`,
            `items`.`itemPrice`, 
            `items`.`itemQty`, 
            `items`.`itemDescription`,
            `items`.`itemCategoryId`, 
            `items`.`created_at`, 
            `items`.`updated_at`,
            `categories`.`categoryId`, 
            `categories`.`categoryName`
            FROM `items` INNER JOIN `categories`
            ON `items`.`itemCategoryId` = `categories`.`categoryId`
            WHERE  `items`.`itemId` = ?";

        $arrParam = [
            (int)$_GET['itemId']
        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);

        if($stmt->rowCount() > 0){
            $arrItem = $stmt->fetchAll()[0];
            ?>
            <div class="col">
                <img src="../images/items/<?php echo $arrItem["itemImg"];?>" class="itemImg" alt="...">
            </div>
            <div class="col">
                <div>
                    <h5 class="card-title mt-5 border-bottom pb-3"><?php echo $arrItem["itemName"] ?></h5>
                    <p class="card-text"><?php echo nl2br($arrItem["itemDescription"]) ?></p>
                    <p>價格:<?php echo $arrItem["itemPrice"] ?></p>
                </div>
        
                <form name="cartForm" id="cartForm" method="POST" action="./addCart.php">
                    <div class="qty mt-5 mb-3 ">
                        數量: <input type="number" name="cartQty" value="1" maxlength="5" min="1" max="<?php echo $arrItem["itemQty"] ?>">
                        <input type="hidden" name="itemId" value="<?php echo (int)$_GET['itemId'] ?>">

                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary" name="smb" value="加入購物車">
                    </div>
        
                </form>
        
            </div>



            <?php

        }

            
    }
?>


    
    
</div>

<?php
require_once '../templates/tpl-footer.php';
?>
