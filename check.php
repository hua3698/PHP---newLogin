<?php
/******登入檢查******
 * 1. 連線資料庫
 * 2. 取得表單傳遞的帳密資料
 * 3. 比對會員資料表中是否有相符的資料
 * 4. 取得會員資料
 * 5. 檢查會員身份及權限
 * 6. 依據會員身份導向不同的頁面
 */

$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo= new PDO($dsn,'root','');  //參數放入資料庫路徑、帳號、密碼後，此變數即擁有連線資料庫的能力

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";
$check=$pdo->query($sql)->fetch();

print_r($check);


?>