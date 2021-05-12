<?php
session_start();
require_once('../db.inc.php');
//require_once('./checkAdmin.php');
require_once('../templates/tpl-header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .wrap{
            display: flex;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <?php
                $sql = "SELECT `categoryId`, `categoryName` FROM `categories` ";
                $stmt = $pdo->query($sql);
                if($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll();
                ?>
                    <ul>
                        <?php for($i = 0; $i < count($arr); $i++) { ?>
                        <li>
                            <a href="./itemList.php?categoryId=<?php echo $arr[$i]['categoryId'] ?>">
                                <?php echo $arr[$i]['categoryName'] ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>

            <!-- 商品項目清單 -->
            <div class="col-md-9 col-sm-8">
                <div class="row">
                <?php
                $sql = "SELECT `items`.`itemId`, `items`.`itemName`, `items`.`itemImg`, `items`.`itemPrice`, 
                                `items`.`itemQty`, `items`.`itemCategoryId`, `items`.`created_at`, `items`.`updated_at`,
                                `categories`.`categoryName`
                        FROM `items` INNER JOIN `categories`
                        ON `items`.`itemCategoryId` = `categories`.`categoryId`";

                if(isset($_GET['categoryId'])){ 
                    $sql.= "WHERE FIND_IN_SET(`items`.`itemCategoryId`, ?)
                            ORDER BY `items`.`itemId` ASC ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([ (int)$_GET['categoryId'] ]);
                } else {
                    $sql.= "ORDER BY `items`.`itemId` ASC ";
                    $stmt = $pdo->query($sql);
                }
                

                if($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll();
                    for($i = 0; $i < count($arr); $i++) {
                ?>
                    <div class="col-md-4 col-sm-6 filter-items" data-price="<?php echo $arr[$i]['itemPrice'] ?>">
                        <div class="card mb-3 shadow-sm">
                            <a href="./itemDetail.php?itemId=<?php echo $arr[$i]['itemId'] ?>">
                                <img class="list-item" src="./images/items/<?php echo $arr[$i]['itemImg'] ?>">
                            </a>
                            <div class="card-body">
                                <p class="card-text list-item-card"><?php echo $arr[$i]['itemName'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">價格：<?php echo $arr[$i]['itemPrice'] ?></small>
                                    <small class="text-muted">上架日期：<?php echo $arr[$i]['created_at'] ?></small>
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
    </div>         
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>