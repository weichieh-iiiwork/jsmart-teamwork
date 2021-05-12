<!-- 剛開始忘記連session會導致if isset session判斷失敗 -->
<?php 
session_start();
require_once '../db.inc.php';
require '../templates/tpl-header.php'
?>


<!-- 商品項目清單 -->
<div class="bg-light p-3">
    <div class="container">
        <div class="row justify-content-between">
        <?php
        $sql="SELECT `items`.`itemId`, 
        `items`.`itemName`, 
        `items`.`itemImg`,
        `items`.`itemPrice`, 
        `items`.`itemQty`, 
        `items`.`itemCategoryId`, 
        `items`.`created_at`, 
        `items`.`updated_at`,
        `categories`.`categoryId`, 
        `categories`.`categoryName`
        FROM `items` INNER JOIN `categories`
        ON `items`.`itemCategoryId` = `categories`.`categoryId`
        -- WHERE `items`.`itemId` = ?
        ORDER BY `items`.`itemId` ASC";
        $stmt = $pdo->query($sql);
        
        //沒有做商品種類篩選，直接印出所有商品
        // if (isset($_GET['categoryId'])) {
        //     $sql .= "WHERE FIND_IN_SET(`items`.`itemCategoryId`, ?)                   ORDER BY `items`.`itemId` ASC ";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute([(int)$_GET['categoryId']]);
        // } else {
        //     $sql.= "ORDER BY `items`.`itemId` ASC ";
        //     $stmt = $pdo->query($sql);
        // }
        if ($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll();
            for ($i = 0; $i < count($arr); $i++){
            ?>
                <div class="col-6 col-md-4">
                    <div class="card mb-4">
                        <a href="./itemDetail.php?itemId=<?php echo $arr[$i]['itemId']?>">
                            <img src="../images/items/<?php echo $arr[$i]['itemImg'] ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-text mb-4 font-weight-bold"><?php echo $arr[$i]['itemName'] ?></h5>
                            <p>價格: <?php echo $arr[$i]['itemPrice'] ?></p>
                            <div class="card-buttom d-flex justify-content-between align-items-center">
                                <!-- 透過href 傳送items的itemId(商品流水號)) -->
                                <a href="./itemDetail.php?itemId=<?php echo $arr[$i]['itemId']?>" class="btn btn-outline-secondary">詳細內容</a>
                                <small>上架時間:<?php echo $arr[$i]['created_at'] ?></small>
                            </div>
                        </div>
                    </div>
                
                </div>
            <?php
            }
        }
        ?> 
        </div>
    </div>
</div>

<?php
require_once '../templates/tpl-footer.php';
?>

    



    