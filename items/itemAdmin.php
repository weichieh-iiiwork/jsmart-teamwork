<?php
// session_start();
require_once '../db.inc.php';
require '../templates/adtpl-header.php';
require_once('../templates/itemTitle.php');

//SQL 敘述: 取得資料表總筆數
$sqlTotal = "SELECT COUNT(1) AS `count` FROM `items` ";

//執行 SQL 語法，並回傳、建立 PDOstatment 物件
$stmtTotal = $pdo->query($sqlTotal);

//查詢結果，取得第一筆資料(索引為 0)
$arrTotal = $stmtTotal->fetchAll()[0];

//資料表總筆數
$total = $arrTotal['count'];

//每頁幾筆
$numPerPage = 5;

// 總頁數，ceil()為無條件進位
$totalPages = ceil($total / $numPerPage);

//目前第幾頁
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//若 page 小於 1，則回傳 1
$page = $page < 1 ? 1 : $page;

?>


<div class="col-12 mx-auto mt-3 mb-5">
    <div class="text-center">
        <h4 class="m-5">商品列表</h4>
    </div>
    <div>

    </div>
    <form name="myForm" method="POST" action="itemDeleteIds.php">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>選擇</th>
                    <th>商品編號</th>
                    <th>商品名稱</th>
                    <th>商品圖片</th>
                    <th>商品價格</th>
                    <th>商品數量</th>
                    <th>商品類別</th>
                    <th>商品描述</th>
                    <th>功能</th>
                </tr>
            </thead>

            <tbody>
                <?php
                //SQL 敘述
                $sql = "SELECT `items`.`itemId`,`items`.`itemName`,`items`.`itemImg`,`items`.`itemPrice`, `items`.`itemQty`, `categories`.`categoryName`, `items`.`itemDescription`
                    FROM `items`
                    INNER JOIN `categories`
                    ON `items`.`itemCategoryId` = `categories`. `categoryId`
                    ORDER BY `itemId` ASC
                            LIMIT ? , ?";


                //設定繫結值
                $arrParam = [
                    ($page - 1) * $numPerPage,
                    $numPerPage
                ];

                //查詢分頁後的資料
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);

                //資料數量大於 0，則列出所有資料
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll();
                    for ($i = 0; $i < count($arr); $i++) { ?>

                        <tr>
                            <td>
                                <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['itemId'] ?>" />
                            </td>

                            <td><?php echo $arr[$i]['itemId'] ?></td>
                            <td>
                                <a class="h6" href="./itemDetail.php?itemId=<?php echo $arr[$i]['itemId'] ?>"><?php echo $arr[$i]['itemName'] ?></a>
                            </td>
                            <td>
                                <img class="img-thumbnail" style="width:200px;" src="../images/items/<?php echo $arr[$i]['itemImg']; ?>" alt=""><br>
                                <small class="">
                                    <?php echo $arr[$i]['itemImg']
                                    ?>
                                </small>
                            </td>
                            <td><?php echo $arr[$i]['itemPrice'] ?></td>
                            <td><?php echo $arr[$i]['itemQty'] ?></td>
                            <td><?php echo $arr[$i]['categoryName'] ?></td>
                            <td><?php echo nl2br($arr[$i]['itemDescription']) ?></td>
                            <td>
                                <a href="./itemEdit.php?itemId=<?php echo $arr[$i]['itemId'] ?>">編輯</a>
                                <br>
                                <a href="./itemDelete.php?itemId=<?php echo $arr[$i]['itemId'] ?>">刪除</a>
                            </td>
                        </tr>

                    <?php
                    }
                } else { ?>

                    <tr>
                        <td colspan="9">沒有資料</td>
                    </tr>

                <?php
                }
                ?>
            </tbody>

            <tfoot>

            </tfoot>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <?php
                // 上一頁
                if ($page <= 1) { ?>
                    <li class="page-item">
                        <a class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                <?php
                } else { ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php
                }
                ?>


                <?php
                for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item" colspan="9">
                        <a class="page-link" href="?page=<?php echo $i ?>">
                            <?php echo $i ?> </a>
                    </li>
                <?php
                }
                ?>

                <li class="page-item">
                    <?php
                    if ($page > $totalPages - 1) { ?>
                        <a class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>

                    <?php
                    } else { ?>

                        <a class="page-link" href="?page=<?php echo $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>

                    <?php
                    } ?>
                </li>

            </ul>
        </nav>
        <input class="btn btn-secondary" type="submit" name="smb" value="多選刪除">
    </form>
</div>


<?php
require_once '../templates/adtpl-footer.php';
?>