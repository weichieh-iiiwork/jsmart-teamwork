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
    <div>
      <label for="inputUsername">帳號: </label>
      <input type="text" id="inputAccount" name="userAccount" placeholder="請輸入帳號" value="">
    </div>
    <div>
      <label for="inputPassword">密碼: </label>
      <input type="text" id="inputPassword" name="userPassword" placeholder="請輸入密碼" value="">
    </div>
    <div>
      <label for="inputPassword">姓名: </label>
      <input type="text" id="inputName" name="userName" placeholder="請輸入姓名" value="">
    </div>
    <div>
      <label for="inputBirthday">生日: </label>
      <input type="text" id="inputBirthday" name="birthday" placeholder="請輸入生日" value="">
    </div>
    <div>
      <label for="inputPhoneNumber">手機號碼: </label>
      <input type="text" id="inputPhoneNumber" name="phoneNumber" placeholder="請輸入電話" value="">
    </div>
    <div>
      <label for="inputEmail">Email: </label>
      <input type="text" id="inputEmail" name="email" placeholder="請輸入信箱" value="">
    </div>
    <div>
      <label for="inputAddress">住址: </label>
      <input type="text" id="inputAddress" name="address" placeholder="請輸入地址" value="">
    </div>
    <button type="submit">註冊</button>
  </form>
</body>
</html>
<?php
require_once("../templates/adtpl-footer.php");
?>