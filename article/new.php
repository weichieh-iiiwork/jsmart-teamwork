<?php
require_once('../db.inc.php');
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
    <div class="container mb-5">
        <form class="mb-5" name="myForm" method="POST" action="./insert.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">文章編號</label>
                <input style="width: 180px;" type="text" class="form-control" name="articleId" id="articleId" placeholder="填寫格式為 a0001 始">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">文章標題</label>
                <input type="text" class="form-control" name="articleName" id="articleName">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">文章內容</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="articleContent"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">文章作者</label>
                <input type="text" class="form-control" name="articleAuthor" id="articleAuthor">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">文章分類</label>
                <select class="form-control" name="articleCategory" id="articleCategory">
                    <option>衛教資訊</option>
                    <option>生理用品介紹</option>
                    <option>性別故事</option>
                    <option>性教育</option>
                    <option>其他</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">文章標籤</label>
                <input type="text" class="form-control" name="articleTag" id="articleTag">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">文章首圖</label>
                <input type="file" name="articleImg" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" name="smb" class="btn btn-primary mb-2">新增</button>
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