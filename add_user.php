<?php
/*處理新增使用者的功能
將使用者的註冊資料新增到資料庫
把表單的填寫資料送到資料庫
*/

//寫入登入資料表
$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo= new PDO($dsn,'root','');

$acc=$_POST['acc'];
$pw=$_POST['pw'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$education=$_POST['education'];

$insert_to_login_sheet="insert into `login` (`acc`,`pw`,`email`) values('$acc','$pw','$email')";

// $pdo->query($insert_to_login_sheet); //回傳資料集
$pdo->exec($insert_to_login_sheet);     //回傳成功or失敗or影響的比數 二擇一

echo $select_login_id=" select * from `login` where `acc`='$acc' && `pw`='$pw'";
$login_user=$pdo->query($select_login_id)->fetch();
echo $login_id=$login_user['id'];


//寫入使用者資料表

$insert_to_member=" insert into `member` (`name`,`birthday`,`role`,`addr`,`education`,`login_id`) values ('$name','$birthday','會員','$addr','$education','$login_id')";

$result=$pdo->exec($insert_to_member);

// if($result){
//     header("location:index.php?msg=新增成功");
// }else{
//     header("location:index.php?msg=新增失敗");
    
// }

?>