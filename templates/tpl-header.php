<!-- 注意填寫路徑時，要以require 的index.php檔案為主 -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>JSMART</title>
    <style type="text/css">
        #contentTable{
            table-layout:fixed; /* bootstrap-table設定colmuns中某列的寬度無效時，需要給整個表設定css屬性 */
            word-break:break-all; word-wrap:break-all; /* 自動換行 */
        }
    </style>
    <style>
    
    /* * {
        outline: 1px solid red;
    } */
    </style>
</head>

<body>

<nav>
        <div class="d-flex shadow-sm flex-column flex-md-row align-items-center px-3 py-4">
            <h3 class="mr-md-auto pl-3">JSMART</h3>
            <div class="my-2 nav-buttons">
                
                <a class="mr-3 text-info" href="#">活動</a>
                <a class="mr-3 text-info" href="#">文章</a>
                <a class="mr-3 text-info" href="./index.php">商品總覽</a>
                <a class="mr-3 text-info" href="./myCart.php">
                <span>購物車</span>
                (<span id="cartItemNum">
                <?php 
                    if(isset($_SESSION["cart"])) {
                        echo count($_SESSION["cart"]);
                    } else {
                        echo 0;
                    }
                ?>
                </span>)
                </a>
                <!-- 我的訂單顯示判斷 -->
                <!-- isset($_SESSION["userAccount"]) --> 
                <?php if(isset($_SESSION["userAccount"])) { ?>
                        <a class="mr-3 text-info" href="./order.php">我的訂單</a>
                <?php } ?>
                <!-- 顯示註冊或會員您好 -->
                <?php if(!isset($_SESSION["userAccount"])){ ?>
                        <a class="mr-3 btn btn-outline-dark" href="./register.php">註冊</a>
                <?php } else { ?>
                        <a class="mr-3 text-info" href="#">會員中心</a>
                        <span class="mr-3"><?php echo $_SESSION["userAccount"] ?> 您好</span>
                <?php } ?>
                
                <?php if(!isset($_SESSION["userAccount"])){ ?>
                        <a class="mr-3 btn btn-outline-dark" href="./login.php">登入</a>
                <?php } else { ?>
                        <a class="mr-3 btn btn-outline-dark" href="./logout.php">登出</a>
                <?php } ?>
            </div>
        </div>
</nav>