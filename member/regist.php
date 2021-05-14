<?php
require_once("../templates/adtpl-header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>註冊</title>
</head>
<body>
  <nav>
    <div class="slogan">JSMART</div>
    <div class="navbar">
      <a href="./regist.php">註冊</a>
      <a href="./admin.php">會員管理</a>
      <a href="./newAdmin.php">新增頁面</a>
      <a href="./logout.php?logout=1">登出</a>
    </div>
  </nav>
  <form name="myForm" method="POST" action="./addUser.php">
  <table class="table-striped">
      <tr>
          <td class="border">帳號</td>
          <td class="border">
              <input type="text" name="userAccount" value="" maxlength="50" />
          </td>
      </tr>
      <tr>
          <td class="border">密碼</td>
          <td class="border">
              <input type="password" name="userPassword" value="" maxlength="40" />
          </td>
      </tr>
      <tr>
          <td class="border">密碼確認</td>
          <td class="border">
              <input type="password" name="passwordComfirm" value="" maxlength="40" />
          </td>
      </tr>
      <tr>
          <td class="border">姓名</td>
          <td class="border">
            <input type="text" name="userName" value="" maxlength="50" />
          </td>
      </tr>
      <tr>
          <td class="border">生日</td>
          <td class="border">
              <input type="text" name="birthday" value="" maxlength="10" />
          </td>
      </tr>
      <tr>
          <td class="border">手機號碼</td>
          <td class="border">
              <input type="text" name="phoneNumber" value="" maxlength="15" />
          </td>
      </tr>
      <tr>
          <td class="border">Email</td>
          <td class="border">
            <input type="text" name="email" value="" maxlength="50" />
          </td>
      </tr>
      <tr>
          <td class="border">地址</td>
          <td class="border">
              <input type="text" name="address" value="" maxlength="50" />
          </td>
      </tr>
  </table>
  <input type="submit" name="smb" value="註冊">
  </form>
</body>
</html>
<?php
require_once("../templates/adtpl-footer.php");
?>