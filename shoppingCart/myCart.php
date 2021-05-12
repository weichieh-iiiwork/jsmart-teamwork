<?php
session_start();
require_once '../db.inc.php';
require_once '../templates/tpl-header.php';
?>

<!-- myCart.php -->

<div class="container mt-5">
    <form name="myCartForm" method="POST" action="./addOrder.php">

        <table id="contentTable" class="table table-hover" >
            <thead>
                <tr class="justify-content-center text-center" >
                    <td style="width: 160px; ">商品名稱</td>
                    <td style="width: 60px; ">價格</td>
                    <td style="width: 60px;">數量</td>
                    <td style="width: 60px;">小計</td>
                    <td style="width: 60px;">功能</td>
                </tr>
            </thead>
            <tbody>
                <?php
                //  5/10 修正直接按購物車會出現"undefined array key"cart"的error 
                if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
                if (!isset($_SESSION['editCart'])) $_SESSION['editCart'] = [];
                //放置結合當前資料庫資料的購物車資訊
                $arr = [];
                $total = 0;
                if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                    $sql = "SELECT `items`.`itemId`, 
                            `items`.`itemName`,
                            `items`.`itemImg`, 
                            `items`.`itemPrice`,
                            `categories`.`categoryId`, 
                            `categories`.`categoryName`
                            FROM `items` INNER JOIN `categories`
                            ON `items`.`itemCategoryId` = `categories`.`categoryId`
                            WHERE `itemId` = ? ";
                }
                //比對購物車裡面所有項目的 itemId，然後透過 SQL 查詢來取得完整的資料
                for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
                    $arrParam = [
                        (int)$_SESSION["cart"][$i]["itemId"]
                    ];

                    //查詢
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($arrParam);

                    //若商品項目個數大於 0，則把買家購買的數量加到查詢結果當中
                    if ($stmt->rowCount() > 0) {
                        $arrItem = $stmt->fetchAll()[0];
                        $arrItem['cartQty'] = $_SESSION["cart"][$i]["cartQty"]; //$arrItem會多一欄['cartQty]
                        $arr[] = $arrItem; //同時，把$arrItem資料push進去$arr裡
                    }
                }

                for ($i = 0; $i < count($arr); $i++) {
                    //計算總額
                    $total += $arr[$i]["itemPrice"] * $arr[$i]["cartQty"];
                ?>
                    <tr class="justify-content-center text-center">
                        <td style="vertical-align : middle;">
                            <div class="d-flex">
                                <img class="img-fluid rounded shadow-sm mr-3" width="70" src="../images/items/<?php echo $arr[$i]["itemImg"] ?>" alt="">
                                <div>
                                    <h5><?php echo $arr[$i]["itemName"] ?></h5>
                                    <p class="font-italic">Category:<?php echo $arr[$i]["categoryName"] ?></p>
                                </div>
                            </div>
                        </td>
                        <td style="vertical-align : middle;">$ <?php echo $arr[$i]["itemPrice"] ?></td>
                        <td style="vertical-align : middle;"> <?php echo $arr[$i]["cartQty"] ?></td>
                        <td style="vertical-align : middle;"> $ <?php echo ($arr[$i]["itemPrice"] * $arr[$i]["cartQty"]) ?></td>
                        <td style="vertical-align : middle;">
                            <!-- 傳送editCart值 -->
                            <a href="./editCart.php?editCartId=<?php echo $i ?>" class="text-dark">編輯</a><br>
                            <a href="./deleteCart.php?idx=<?php echo $i ?>" class="text-dark">刪除</a><br>
                        </td>
                    </tr>
                    <input type="hidden" name="itemId[]" value="<?php echo $arr[$i]["itemId"] ?>">
                    <input type="hidden" name="itemPrice[]" value="<?php echo $arr[$i]["itemPrice"] ?>">
                    <input type="hidden" class="form-control" name="cartQty[]" value="<?php echo $arr[$i]["cartQty"] ?>" maxlength="3">
                    <input type="hidden" class="form-control" name="subtotal[]" value="<?php echo ($arr[$i]["itemPrice"] * $arr[$i]["cartQty"]) ?>" maxlength="10">

                <?php
                }
                ?>
            </tbody>

        </table>
        <?php if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) { ?>
            <div class="row flex-column align-items-end mr-5">
                <h4 class="mt-2">目前總額: <mark id="total"><?php echo $total ?></mark></h4>
                <input class="btn btn-info mt-2 mr-3" style="width: 10%;" type="submit" name="smb" value="送出">
                <!-- 訂單總額 -->
                <input type="hidden" class="form-control" name="orderPrice" value="<?php echo $total ?>" maxlength="10">
            </div>

        <?php } ?>
    </form>


</div>

<?php
require_once '../templates/tpl-footer.php';
?>