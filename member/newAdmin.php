<?php
require_once("../templates/adtpl-header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>JSMART(後台)</title>
    <style>
    .border {
        border: 1px solid;
    }
    </style>
</head>
<body>
    <nav>
        <!-- <div class="slogan">JSMART</div> -->
        <div class="navbar">
          <a href="./regist.php">註冊</a>
          <a href="./admin.php">會員管理</a>
          <a href="./newAdmin.php">新增頁面</a>
          <!-- <a href="./logout.php?logout=1">登出</a> -->
        </div>
      </nav>
<hr />
<form name="myForm" method="POST" action="./insertAdmin.php" enctype="multipart/form-data">
<table class="border">
    <thead>
        <tr>
          <th class="border">帳號</th>
          <th class="border">密碼</th>
          <th class="border">密碼確認</th>
          <th class="border">姓名</th>
          <th class="border">生日</th>
          <th class="border">手機號碼</th>
          <th class="border">Email</th>
          <th class="border">地址</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border">
                <input type="text" name="userAccount" value="" maxlength="50" />
            </td>
            <td class="border">
                <input type="password" name="userPassword" value="" maxlength="40" />
            </td>
            <td class="border">
                <input type="password" name="passwordComfirm" value="" maxlength="40" />
            </td>
            <td class="border">
              <input type="text" name="userName" value="" maxlength="50" />
          </td>
            <td class="border">
                <input type="text" name="birthday" value="" maxlength="10" />
            </td>
            <td class="border">
                <input type="text" name="phoneNumber" value="" maxlength="15" />
            </td>
            <td class="border">
              <input type="text" name="email" value="" maxlength="50" />
          </td>
          <td class="border">
            <input type="text" name="address" value="" maxlength="50" />
        </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="8"><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>

</body>
</html>
<?php
require_once("../templates/adtpl-footer.php");
?>