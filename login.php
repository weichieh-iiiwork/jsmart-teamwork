<?php
session_start();
?>
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
    <style>
        :root {
            --bgColor: rgb(243, 219, 192);
        }
        .wrap {
            width: 400px;
            height: 450px;
            background-color: var(--bgColor);
            border-radius: 20px;
        }
    </style>
  </head>
  <body>
    <nav>
        <div class="d-flex shadow-sm flex-column flex-md-row align-items-center px-3 py-4">
            <h4 class="mr-md-auto pl-3">JSMART</h4>
        </div>
    </nav>
    <div class="wrap mt-5 mx-auto py-3 text-align-center">
        <h4 class="text-center mt-4">LOGIN</h4>
        <form class="mt-5" name="loginForm" method="POST" action="./loginCheck.php">
                <label class="text-dark ml-5 mt-1">帳號：</label>

                <input class="w-75 form-control mx-auto" type="text" name="userAccount" value="" maxlength="50" />
                <label class="text-dark ml-5 mt-3">密碼：</label>

                <input class="w-75 form-control mx-auto" type="password" name="userPassword" value="" maxlength="40" />

                <div class="d-flex mt-3">
                    <label class="text-dark ml-5 mt-3">買家</label>
                    <input class="form-control w-25" type="radio" name="identity" value="users" checked />
                    <label class="text-dark ml-5 mt-3">賣家</label>
                    <input class="form-control w-25" type="radio" name="identity" value="admin" />
                </div>
                <input class="w-25 form-control mx-auto mt-5" type="submit" value="登入" />
        </form>


    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
  </body>
</html>