<?php
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPYE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.css">



    <!-- Bootstrap core CSS -->
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <!-- <link href="form-validation.css" rel="stylesheet"> -->
  </head>

  <body class="bg-light">
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <img class="d-block mx-auto mb-4" src="../head_images/images.png" alt="" width="100" height="100">
          <h2>活動編輯</h2>
          <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur ea omnis, illo qui error, debitis illum facere tempore, voluptate nobis autem! Natus vitae consequatur ad fugit aliquid corrupti molestias corporis!</p>
        </div>

        <!-- <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          
        </h4> -->
        <div class="col-md-7 col-lg-12">
          <form name="myForm" class="needs-validation" novalidate method="POST" action="../event/updateEdit.php" enctype="multipart/form-data">


            <table class="table">
              <tbody>
                <?php
                //SQL 敘述
                $sql = "SELECT `id`,`eventId`, `eventName`, `eventDate`, `eventDate`, `eventLocation`, `eventPrice`, `eventCategory`, `eventDescription`,`eventCategory`,`eventImg`
                FROM `event` 
                WHERE `id` = ?";

                //設定繫結值
                $arrParam = [
                  (int)$_GET['id']
                ];

                //查詢
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);
                if ($stmt->rowCount() > 0) {
                  $arr = $stmt->fetchAll()[0];
                ?>
                  <div class="col-md-7 col-lg-12">
                    <!-- <h4 class="mb-3">Billing address</h4> -->
                    <form class="needs-validation" novalidate method="POST" action="../event/insert.php" enctype="multipart/form-data">
                      <div class="row g-3">
                        <div class="col-sm-6">
                          <label for="firstName" class="form-label">活動編號</label>
                          <input type="text" name="eventId" class="form-control" placeholder="" value="<?php echo $arr['eventId']; ?>" required>
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <label for="lastName" class="form-label">活動名稱</label>
                          <input type="text" name="eventName" class="form-control" placeholder="" value="<?php echo $arr['eventName'] ?>" required>
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="username" class="form-label">活動日期</label>
                          <div class="input-group has-validation">
                            <input type="date" name="eventDate" class="form-control" value="<?php echo $arr['eventDate'] ?>" placeholder="Username" required>
                            <div class="invalid-feedback">
                              Your username is required.
                            </div>
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="lastName" class="form-label">活動地點</label>
                          <input type="text" name="eventLocation" class="form-control" placeholder="" value="<?php echo $arr['eventLocation'] ?>" required>
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="lastName" class="form-label">活動價格</label>
                          <input type="text" name="eventPrice" class="form-control" placeholder="" value="<?php echo $arr['eventPrice'] ?>" required />
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="lastName" class="form-label">活動類別</label>
                          <select class="form-control" name="eventCategory" placeholder="" value="<?php echo $arr['eventCategory'] ?>" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                          </select>
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="address" class="form-label">活動介紹</label>
                          <textarea name="eventDescription" class="form-control" placeholder="1234567" required><?php echo $arr['eventDescription'] ?></textarea>
                          <div class="invalid-feedback">
                            Please enter your shipping address.
                          </div>

                          <div class="col-12">
                            <label for="address2" class="form-label">活動圖片<span class="text-muted">(Optional)</span></label>
                            <input type="file" name="eventImg" class="form-control" placeholder="Apartment or suite">
                          </div>





                          <!-- <tr>
                <td class="border">功能</td>
                <td class="border">
                    <a href="./delete.php?id=<?php echo $arr['id'] ?>">刪除</a>
                </td>
            </tr> -->
                        <?php
                      } else {
                        ?>
                          <tr>
                            <td class="border" colspan="6">沒有資料</td>
                          </tr>
                        <?php
                      }
                        ?>
              </tbody>
              <tfoot>
                <hr class="my-4">
                <button class="w-100 btn btn-info btn-lg" type="submit">修改</button>

              </tfoot>
            </table>
            <input type="hidden" name="id" value="<?php echo (int)$_GET['id'] ?>">

          </form>

  </body>

  </html>