<?php
//session_start();
require_once('../db.inc.php');
//require_once('./checkAdmin.php');
require_once('../templates/adtpl-header.php');

function buildTree($pdo, $parentId = 0){
    $sql = "SELECT `categoryId`, `categoryName`, `categoryParentId`
            FROM `categories` 
            WHERE `categoryParentId` = ?";
    $stmt = $pdo->prepare($sql);
    $arr = [$parentId];
    $stmt->execute($arr);
    if($stmt->rowCount() > 0){
        echo "<ul>";
        $arr = $stmt->fetchAll();
        for($i = 0; $i < count($arr); $i++) {
        echo "<li>";
        echo "<input type='radio' name='categoryId' value='".$arr[$i]['categoryId']."' />";
        echo $arr[$i]['categoryName'];
        echo " | <a href='./editCategory.php?editCategoryId=".$arr[$i]['categoryId']."'>編輯</a>";
        echo " | <a href='./deleteCategory.php?deleteCategoryId=".$arr[$i]['categoryId']."'>刪除</a>";
        buildTree($pdo, $arr[$i]['categoryId']);
            echo "</li>";
        }
        echo "</ul>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    /* *{
        border: 1px solid red;
    } */
    .wrap{
        margin: 50px auto;
        width: 80%;
    }
    .title-box{
        /* background-color: #17a2b8;
        border: 1px solid blue; */
        margin-bottom: 15px;
    }
    .box{
        display: flex;
        flex-direction: row;
        /* border: 1px solid blue; */
        justify-content: center;
    }
    ul{
        list-style-type: none;
        padding: 5px 10px 5px 30px;
    }
    ol{
        list-style-type: upper-alpha;
    }
    table{
        border: 0;
    }
    .insert-box{
        /* border: 1px solid green; */
        height: 450px;
        margin: auto 10px;
        padding: 50px;
        background-color: #17a2b8;
        border-radius: 20px;
    }
    .insert-button{
        font-size: 25px;
        padding: 0 30px;
        margin: 20px;
        border-radius: 90px;
        cursor: pointer;
        background: #444;
        color: #fff;
        transition: .5s;
    }
    .insert-button:hover {
        background: #fff;
        color: #17a2b8;
        text-decoration: none;
        transform: scale(1.1)
    }
    .category-items{
        height: 450px;
        padding: 10px 0px;
        overflow: auto;
        border: 1px solid #eee;
    }
    /* .category-items::-webkit-scrollbar{
        width: 5px;
    } */
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<div class="wrap">
    <div class="title-box">
        <h3>商品類別管理</h3>
    </div>
    <form name="myForm" method="POST" action="./insertCategory.php" >
        <div class="box">
            <div class="insert-box">
                <table style="text-align:center">
                    <thead>
                        <tr>
                            <th style="color:#fff">新增類別</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="categoryName" value="" maxlength="100" placeholder="請輸入類別名稱（ ꉺᗜꉺ）" size="25px">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><input type="submit" name="smb" value="新增" class="insert-button"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="category-items">
                <?php buildTree($pdo, 0); ?>
            </div>
        </div>    
        </form>
    
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>