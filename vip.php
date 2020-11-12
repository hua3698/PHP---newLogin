<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>白金會員中心</title>
</head>
<body>
<h1>白金會員中心<span style="font-size:1rem"><a href="logout.php" >登出</a></span></h1>
尊爵的<?php
    session_start();

if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
}
?>  你好，歡迎你
</body>
</html>