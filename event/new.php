<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   
</head>
<body>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">這裡是活動新增頁面</h1>
    <p class="lead"><a href="./admin.php">活動全覽</a>  | <a href="./logout.php?logout=1">登出</a></p>
  </div>
</div>

<hr />
<form name="myForm" method="POST" action="./insert.php" enctype="multipart/form-data">
<table class="table">
  <thead>
    
      <th scope="col">活動名稱</th>
      <th scope="col">活動日期</th>
      <th scope="col">活動地點</th>
      <th scope="col">活動價格</th>
      <th scope="col">活動類別</th>
      <th scope="col">活動介紹</th>
      <th scope="col">活動圖片</th>
     
  </thead>
    <tbody>
        <tr>
            <td class="border">
                <input type="text" name="eventName" id="eventName" value="" maxlength="10" />
            </td>
      
            <td class="border">
                <input type="text" name="eventDate" id="eventDate" value="" maxlength="10" />
            </td>
    
            <td class="border">
                <input type="text" name="eventLocation" id="eventLocation" value="" maxlength="10" />
            </td>
         
            <td class="border">
                <input type="text" name="eventPrice" id="eventPrice" value="" maxlength="10" />
            </td>
            <td class="border">
                <input type="text" name="eventCategory" id="eventCategory" value="" maxlength="10" />
            </td>
            <td class="border">
                <textarea name="eventDescription"></textarea>
            </td>
            <td class="border">
                <input type="file" name="studentImg" />
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="9"><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>