<!-- 希望登入此頁面可以看到所有註冊資料 -->

<?php
$title="管理中心";
include_once('include/header.php');  
?>

<body>
<h1 class="text-center py-3">管理中心</h1>

<?php

$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo= new PDO($dsn,'root','');

$sql="select `login`.`id`,`acc`,`name`,`role`,`birthday`,`email`,`addr`,`create_time` from `login`,`member` where `login`.`id`=`member`.`login_id` ";

$users=$pdo->query($sql)->fetchAll();

echo "<table class='table container'>";
echo "<tr>";
echo "<td>序號</td>";
echo "<td>帳號</td>";
echo "<td>姓名</td>";
echo "<td>角色</td>";
echo "<td>生日</td>";
echo "<td>信箱</td>";
echo "<td>地址</td>";
echo "<td>註冊日</td>";
echo "<td>操作</td>";
echo "</tr>";

foreach($users as $user){
    echo "<tr>";
    echo "<td>{$user['id']}";
    echo "<td>{$user['acc']}";
    echo "<td>{$user['name']}";
    echo "<td>{$user['role']}";
    echo "<td>{$user['birthday']}";
    echo "<td>{$user['email']}";
    echo "<td>{$user['addr']}";
    echo "<td>{$user['create_time']}";
    echo "<td>";
    echo "<a href='edit.php?id={$user['id']}'><button class='mx-1 btn btn-sm btn-primary'>編輯</button></a>";
    echo "<a href='delete_user.php?id={$user['id']}'><button class='mx-1 btn btn-sm btn-danger'>刪除</button></a>";

    echo "</td>";
    echo "</tr>";
    
}

echo "</table>";

?>



</body>
</html>

<?php
include_once('include/footer.php');  
?>
