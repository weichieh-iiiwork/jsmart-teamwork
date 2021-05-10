<!-- 還沒成功算出訂單總額並且印出來 -->
<?php
session_start();
require_once '../db.inc.php';
require_once '../templates/tpl-header.php';
?>

<!-- order.php -->
<div class="container mt-5">
    <table id="contentTable" class="table text-center">
        <thead>
            <tr class=" justify-content-center">
                <td style="width: 80px;">訂單編號</td>
                <td style="width: 190px;">成立時間</td>
                <td style="width: 100px;">總金額</td>
                <td style="width: 270px;">商品名稱</td>
                <td style="width: 80px;">價格</td>
                <td style="width: 80px;">數量</td>
                <td style="width: 100px;">小計</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $sqlOrder = "SELECT `orderId`,`orderPrice`,`created_at`
            FROM `orders` 
            WHERE `username` = ? 
            ORDER BY `orderId` DESC";
            $stmtOrder = $pdo->prepare($sqlOrder);
            $stmtOrder->execute([$_SESSION['userAccount']]);

            if($stmtOrder->rowCount() > 0){
                $arrOrders = $stmtOrder->fetchAll();
                for($i=0; $i<count($arrOrders); $i++){
                    $sqlOrderItems = "SELECT `order_items`.`checkPrice`,
                    `order_items`.`checkQty`,
                    `order_items`.`checkSubtotal`,
                    `items`.`itemName`,
                    `categories`.`categoryName`,
                    `orders`.`orderPrice`
                    FROM `order_items` 
                    INNER JOIN `items`
                    ON `order_items`.`orderItemsId` = `items`.`itemId`
                    INNER JOIN `categories` 
                    ON `items`.`itemCategoryId` = `categories`.`categoryId`
                    INNER JOIN `orders`
                    ON `orders`.`orderId` = `order_items`.`orderId`
                    WHERE `order_items`.`orderId` = ? 
                    ORDER BY `order_items`.`id` ASC";
                    $stmtOrderItems = $pdo->prepare($sqlOrderItems);
                    $arrParamOrderItems = [
                        $arrOrders[$i]['orderId']
                    ];
                    $stmtOrderItems->execute($arrParamOrderItems);
                    if($stmtOrderItems->rowCount() > 0){
                        $arrOrderItems = $stmtOrderItems->fetchAll();
                        ?>
                        <tr >
                            <td style="vertical-align : middle;" rowspan="<?php echo count($arrOrderItems) ?>"><?php echo $arrOrders[$i]["orderId"] ?></td>
                            <td style="vertical-align : middle;" rowspan="<?php echo count($arrOrderItems) ?>"><?php echo $arrOrders[$i]['created_at'] ?></td>
                            <td style="vertical-align : middle;" rowspan="<?php echo count($arrOrderItems) ?>">$ <?php echo $arrOrders[$i]['orderPrice']?></td>
                            <?php
                        for($j=0; $j<count($arrOrderItems); $j++){
                            if($j!==0){ ?><tr><?php }
                            ?>
                            <td><?php echo $arrOrderItems[$j]["itemName"] ?></td>
                            <td>$ <?php echo $arrOrderItems[$j]["checkPrice"] ?></td>
                            <td><?php echo $arrOrderItems[$j]["checkQty"] ?></td>
                            <td>$ <?php echo $arrOrderItems[$j]["checkSubtotal"] ?></td>
                            </tr> <?php
                        }
                    }
                    ?>
             
                </tr>
                <?php   
                }
            }
        ?>
        </tbody>
    </table>

</div>


<?php
require_once '../templates/tpl-footer.php';
?>