<?php
//引入登入判斷
session_start();

//關閉 session
session_destroy();

//3 秒後跳頁
header("Refresh: 1; url=./index.html");
echo "登出成功";