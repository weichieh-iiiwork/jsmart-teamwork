<?php
require_once("db.inc.php");

$sqlTotal = "SELECT count(1) AS `count` FROM `event`";

$stmtTotal = $pdo->query($sqlTotal);

$arrTotal = $stmtTotal->fetchAll()[0];

$total = $arrTotal['count'];

$numPerPage = 2;

$totalPages = ceil($total/$numPerPage); 


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$page = $page < 1 ? 1 : $page;
?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 
     <title></title>
     <style>
         .w200px {
        width: 200px;
    }
     </style>
   </head>
   <body>
   <div class="jumbotron jumbotron-fluid">
    <div class="container">
    <h1 class="display-4">這裡是活動管理頁面</h1>
    <p class="lead"><a href="./admin.php">活動總覽</a> | <a href="./new.php">新增頁面</a> | <a href="./logout.php?logout=1">登出</a></p>
  </div>
  </div>
   

   <table class="table">
  <thead>
    <tr>
      
      <th scope="col">流水號</th>
      <th scope="col">編號</th>
      <th scope="col">活動名稱</th>
      <th scope="col">活動日期</th>
      <th scope="col">活動地點</th>
      <th scope="col">活動價格</th>
      <th scope="col">活動類別</th>
      <th scope="col">活動介紹</th>
      <th scope="col">活動圖片</th>
      <th scope="col">功能</th>
     

    </tr>
  </thead>
  <tbody>
  <?php $sql = "SELECT `id`,`eventId`, `eventName`, `eventDate`, `eventDate`, `eventLocation`, `eventPrice`, `eventCategory`, `eventDescription`,`eventCategory`,`eventImg`
                FROM `event` 
                ORDER BY `eventId` ASC 
                LIMIT ?, ? ";
    $arrParam = [
    ($page - 1) * $numPerPage, 
    $numPerPage
    ];


    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    if($stmt->rowCount() > 0) {
      $arr = $stmt->fetchAll();
      for($i = 0; $i < count($arr); $i++) {
  ?>

<tr>
                <td class="border">
                    <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id'] ?>" />
                </td>
                <td class="border"><?php echo $arr[$i]['eventId'] ?></td>
                <td class="border"><?php echo nl2br($arr[$i]['eventName']) ?></td>
                <td class="border"><?php echo $arr[$i]['eventDate'] ?></td>
             
                <td class="border"><?php echo nl2br($arr[$i]['eventLocation']) ?></td>
                <td class="border"><?php echo $arr[$i]['eventPrice'] ?></td>
                <td class="border"><?php echo $arr[$i]['eventCategory'] ?></td>
                <td class="border"><?php echo nl2br($arr[$i]['eventDescription']) ?></td>
                <td class="border">
                <?php if($arr[$i]['eventImg'] !== NULL) { ?>
                    <img class="w200px" src="./files/<?php echo $arr[$i]['eventImg'] ?>">
                <?php } ?>
                </td>
                <td class="border">
                    <a href="./edit.php?id=<?php echo $arr[$i]['id']; ?>">編輯</a>
                    <a href="./delete.php?id=<?php echo $arr[$i]['id']; ?>">刪除</a>
                </td>
            </tr>
            <?php
            }
        } else {
        ?>
            <tr>
                <td class="border" colspan="9">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="10">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php } ?>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="submit" name="smb" value="刪除">
</form>

</body>
</html>
    
  </tbody>
</table>
 
 

 
 
 
 
 
 
 
 
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </body>
 </html>