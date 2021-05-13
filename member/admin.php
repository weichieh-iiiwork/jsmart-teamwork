<?php
require_once("../templates/adtpl-header.php");
require_once('./checkSession.php');
require_once('../db.inc.php');


$sqlTotal = "SELECT count(1) AS `count` FROM `users`";
$stmtTotal = $pdo->query($sqlTotal);
$arrTotal = $stmtTotal->fetchAll()[0];
$total = $arrTotal['count'];
$numPerPage = 5;
$totalPage = ceil($total/$numPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JSMART(後台)</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+TC&display=swap" rel="stylesheet">
  <style>
    .border {
      border: 1px solid;
    }
    .w200px {
      width: 200px;
    }
  </style>
</head>
<body>
<header>
  <nav>
    <div class="slogan">JSMART</div>
    <div class="navbar">
      <a href="./regist.php">註冊</a>
      <a href="./admin.php">會員管理</a>
      <a href="./newAdmin.php">新增頁面</a>
      <a href="./logout.php?logout=1">登出</a>
    </div>
  </nav>
</header>
  <hr>
  <form name="myForm" method="POST" action="deleteIdsAdmin.php">
    <table class="border">
      <thead>
        <tr>
          <th class="border">選擇</th>
          <th class="border">編號</th>
          <th class="border">帳號</th>
          <th class="border">密碼</th>
          <th class="border">姓名</th>
          <th class="border">生日</th>
          <th class="border">手機號碼</th>
          <th class="border">Email</th>
          <th class="border">地址</th>
          <th class="border">新增時間</th>
          <th class="border">更新時間</th>
          <th class="border">功能</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT `id`,`userAccount`,`userPassword`,`userName`,`birthday`,
                `phoneNumber`,`email`,`address`,`created_at`,`updated_at`
                FROM `users`
                ORDER BY `id` ASC
                LIMIT ?, ?";
        $arrParam = [
          ($page - 1) * $numPerPage,
          $numPerPage
        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        //設定繫結值
        $arrParam = [
          ($page - 1) * $numPerPage,
          $numPerPage
      ];

      //查詢分頁後的學生資料
      $stmt = $pdo->prepare($sql);
      $stmt->execute($arrParam);

      //資料數量大於 0，則列出所有資料
      if($stmt->rowCount() > 0) {
          $arr = $stmt->fetchAll();
          for($i = 0; $i < count($arr); $i++) {
      ?>
          <tr>
              <td class="border">
                  <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id'] ?>" />
              </td>
              <td class="border"><?php echo $arr[$i]['id'] ?></td>
              <td class="border"><?php echo $arr[$i]['userAccount'] ?></td>
              <td class="border"><?php echo $arr[$i]['userPassword'] ?></td>
              <td class="border"><?php echo $arr[$i]['userName'] ?></td>
              <td class="border"><?php echo $arr[$i]['birthday'] ?></td>
              <td class="border"><?php echo $arr[$i]['phoneNumber'] ?></td>
              <td class="border"><?php echo $arr[$i]['email'] ?></td>
              <td class="border"><?php echo $arr[$i]['address'] ?></td>
              <td class="border"><?php echo $arr[$i]['created_at'] ?></td>
              <td class="border"><?php echo $arr[$i]['updated_at'] ?></td>
              <td class="border">
                  <a href="./editAdmin.php?id=<?php echo $arr[$i]['id']; ?>">編輯</a>
                  <a href="./deleteAdmin.php?id=<?php echo $arr[$i]['id']; ?>">刪除</a>
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
          <td class="border" colspan="12">
          <?php
            for($i = 1; $i <= $totalPage; $i++) {
          ?>
            <a href="?page=<?php echo $i?>"><?php echo $i ?></a>
          <?php
            }
          ?>
          </td>
        </tr>
      </tfoot>
    </table>
    <input type="submit" name="smb" value="刪除">
  </form>
</body>
</html>
<?php
require_once("../templates/adtpl-footer.php");
?>