<?php
//更新使用者資料

$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo=new PDO($dsn,'root','');

$id=$_POST['id'];
$acc=$_POST['acc'];
$pw=$_POST['pw'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$education=$_POST['education'];
$role=$_POST['role'];

$update_login_sql="update `login` set `acc`='$acc',`pw`='$pw',`email`='$email' where `id`='$id' ";
$pdo->exec($update_login_sql);

$update_member_sql="update `member` set `name`='$name',`birthday`='$birthday',`role`='$role',`education`='$education',`addr`='$addr' where `login_id`='$id'";
$pdo->exec($update_member_sql);


echo "login更新<br>".$update_login_sql."<br>";
echo "member更新<br>".$update_member_sql."<br>";

header("location:admin.php");

?>