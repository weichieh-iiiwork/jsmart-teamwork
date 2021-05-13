<?php
// session_start();
require_once '../db.inc.php';
require '../templates/adtpl-header.php';
require_once('../templates/itemTitle.php');
?>

<div class="m-5">
    <div class="text-center">
        <h4 class="m-5">編輯商品</h4>
    </div>

    <form class="mx-auto col-8" name="myForm" method="POST" enctype="multipart/form-data" action="./itemUpdateEdit.php">

        <?php
        //SQL 敘述
        $sql = "SELECT `itemId`,`itemName`,`itemImg`,`itemPrice`,`itemQty`,`itemCategoryId` ,`itemDescription`
            FROM `items`
            WHERE `itemId` = ? ";

        $arrParam = [
            (int)$_GET['itemId']
        ];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        if ($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll()[0];
        ?>

            <div class="form-group">
                <label for="itemName">商品名稱</label>
                <input class="form-control" type="text" name="itemName" value="<?php echo $arr['itemName'] ?>" maxlength="99">
            </div>
            <!-- <div class="form-group">
                <label for="itemImg">商品圖片</label>
                <img class="col-3" src="../images/items/ -->
            <?php //echo $arr['itemImg'] 
            ?>
            <!-- "><br>
                <input class="form-control" type="file" name="itemImg" value="">
            </div> -->
            <div class="form-group">
                <label class="" for="itemImg">商品圖片</label>
                <img class="col-3" src="../images/items/<?php echo $arr['itemImg'] ?>"><br>
                <div class="input-group">
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02" name="itemImg">
                        <label class="custom-file-label" for="inputGroupFile02"></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">商品價格</label>
                <input class="form-control" type="text" name="itemPrice" value="<?php echo $arr['itemPrice'] ?>" maxlength="10">
            </div>
            <div class="form-group">
                <label for="">商品數量</label>
                <input class="form-control" type="text" name="itemQty" value="<?php echo $arr['itemQty'] ?>" maxlength="3">
            </div>

            <div class="form-group">
                <label for="">商品類別</label>
                <select class="form-control" name="itemCategoryId">
                    <?php
                    $sql = "SELECT `categoryId`, `categoryName` FROM `categories` ";
                    $stmt = $pdo->query($sql);

                    if ($stmt->rowCount() > 0) {
                        $arrCategory = $stmt->fetchAll();
                        for ($i = 0; $i < count($arrCategory); $i++) {
                    ?>
                            <option value="<?php echo $arrCategory[$i]['categoryId'] ?>">
                                <?php echo $arrCategory[$i]['categoryName'] ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">


                <label for="itemDescription">商品描述</label>
                <textarea class="form-control" type="text" name="itemDescription"><?php echo $arr['itemDescription'] ?></textarea>
            </div>

        <?php
        } else {

        ?>
            <tr>
                <td colspan="10">沒有資料</td>
            </tr>

        <?php
        }
        ?>

        <div>
            <input class="btn btn-outline-dark" type="submit" name="smb" value="更新"></td>
        </div>

        <input type="hidden" name="itemId" value="<?php echo (int)$_GET['itemId']; ?>">

    </form>

</div>

<?php
require_once '../templates/adtpl-footer.php';
?>