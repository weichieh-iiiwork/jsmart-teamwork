<?php
require_once '../db.inc.php';

$sqlTotal = "SELECT count(1) AS `count` FROM `article`";
$stmtTotal = $pdo->query($sqlTotal);
$arrTotal = $stmtTotal->fetchAll()[0];
$total = $arrTotal['count'];
$numPerPage = 10;
$totalPages = ceil($total / $numPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    </style>
</head>

<body>
    <?php
    require_once '../templates/adtpl-header.php';
    ?>
    <div class="header m-5 text-center">
        <a href="./index.php">文章全覽</a>
        ｜
        <a href="./new.php">新增文章</a>
    </div>
    <div style="width: 80%; margin: auto; padding-bottom: 200px;">
        <form name="myForm" method="POST" action="deleteIds.php">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" style="width: 100px;">文章編號</th>
                        <th class="text-center" scope="col" style="width: 150px;">文章標題</th>
                        <th class="text-center" scope="col">文章內容</th>
                        <th class="text-center" scope="col" style="width: 100px;">文章作者</th>
                        <th class="text-center" scope="col" style="width: 100px;">文章分類</th>
                        <th class="text-center" scope="col" style="width: 100px;">文章標籤</th>
                        <th class="text-center" scope="col">文章首圖</th>
                        <!-- 編輯後更新時間無法更新，先拿掉 -->
                        <!-- <th class="text-center" scope="col" style="width: 115px;">新增時間</th>
                        <th class="text-center" scope="col" style="width: 115px;">更新時間</th> -->
                        <th class="text-center" scope="col" style="width: 115px;">功能</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT  `id`,`articleId`, `articleName`, `articleContent`, `articleAuthor`, 
            `articleCategory`, `articleTag`,`articleImg`,`created_at`,`updated_at`
                        FROM `article` 
                        ORDER BY `id` ASC 
                        LIMIT ?, ? ";

                    $arrParam = [
                        ($page - 1) * $numPerPage,
                        $numPerPage
                    ];

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($arrParam);
                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        for ($i = 0; $i < count($arr); $i++) {
                    ?>
                            <tr>
                                <td><?php echo $arr[$i]['articleId'] ?></td>
                                <td><?php echo $arr[$i]['articleName'] ?></td>
                                <td><?php echo $arr[$i]['articleContent'] ?></td>
                                <td><?php echo $arr[$i]['articleAuthor'] ?></td>
                                <td><?php echo $arr[$i]['articleCategory'] ?></td>
                                <td>
                                    <?php echo $arr[$i]['articleTag'] ?>
                                </td>
                                <td>
                                    <img style="width: 200px;" src="../images/article/<?php echo $arr[$i]['articleImg'] ?>" alt="">
                                </td>
                                <!-- 編輯後更新時間無法更新，先拿掉 -->
                                <!-- <td> -->
                                <!-- <?php echo $arr[$i]['created_at'] ?> -->
                                <!-- </td> -->
                                <!-- <td> -->
                                <!-- <?php echo $arr[$i]['updated_at'] ?> -->
                                <!-- </td> -->
                                <td>
                                    <a href="./edit.php?id=<?php echo $arr[$i]['id']; ?>">編輯</a>
                                    ｜
                                    <a href="./delete.php?id=<?php echo $arr[$i]['id']; ?>">刪除</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">沒有資料</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <?php
    require_once '../templates/adtpl-footer.php';
    ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>