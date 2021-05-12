<?php
// session_start();
require_once '../db.inc.php';
require '../templates/adtpl-header.php';
require_once('../templates/itemTitle.php');

//先確認商品類別是否存在
$totalCategories = $pdo->query("SELECT count(1) AS `count` FROM `categories`")->fetchAll()[0]['count'];

?>


<div class="m-5">
    <div class="text-center">
        <h4 class="m-5">新增商品</h4>
    </div>
    <?php
    if ($totalCategories > 0) {
    ?>

        <form class="mx-auto col-8" name="myForm" enctype="multipart/form-data" method="POST" action="itemAdd.php">

            <div class="form-group">
                <label class="mr-3" for="itemName">商品名稱</label>
                <input class="form-control" type="text" name="itemName" value="" maxlength="100" />
            </div>

            <div class="form-group">
                <label class="mr-3" for="itemImg">商品圖片</label>
                <input class="form-control" type="file" name="itemImg" value="" />
            </div>
            <div class="form-group">
                <label class="mr-3" for="itemPrice">商品價格</label>
                <input class="form-control" type="text" name="itemPrice" value="" maxlength="11" />
            </div>
            <div class="form-group">
                <label class="mr-3" for="itemQty">商品數量</label>
                <input class="form-control" type="text" name="itemQty" value="" maxlength="3" />
            </div>
            <div class="form-group">
                <label class="mr-3" for="itemCategoryId">商品種類</label>
                <select class="form-control" class="form-control-file" name="itemCategoryId">
                    <?php
                    $sql = "SELECT `categoryId`, `categoryName` FROM `categories` ";
                    $stmt = $pdo->query($sql);

                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        for ($i = 0; $i < count($arr); $i++) {
                    ?>
                            <option value="<?php echo $arr[$i]['categoryId'] ?>">
                                <?php echo $arr[$i]['categoryName'] ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label class="mr-3" for="itemDescription">商品描述</label>
                <textarea class="form-control" type="text" name="itemDescription" value="" maxlength="100"></textarea>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="smb" value="新增">
            </div>

        </form>

    <?php
    } else {
        echo "請先建立商品類別";
    } ?>

</div>

<?php
require_once '../templates/adtpl-footer.php';
?>