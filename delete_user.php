<?php
//刪除使用者
$title="刪除使用者";
include_once('include/header.php');  
?>
<?php
$dsn = "mysql:host=localhost;dbname=member;charset=utf8";
$pdo = new PDO($dsn, 'root', '');

$user_id = $_GET['id'];
$sql_login = "delete from `login` where `id`='$user_id'";
$sql_member = "delete from `member` where `login_id`='$user_id'";

$ask = false;
echo "你確定要刪除id=" . $user_id . "的資料嗎?";
?>

<a href="?id=<?= $user_id ?>&ask=true"><button class="btn btn-danger">確定</button></a>
<a href="?id=<?= $user_id ?>&ask=false"><button class="btn btn-warning">取消</button></a>

<?php

//判斷是否要刪除資料

if (isset($_GET['ask'])) {
    switch ($_GET['ask']) {
        case 'true':
            $pdo->exec($sql_login);
            $pdo->exec($sql_member);
            header("location:admin.php");
            break;
        case 'false':
            header("location:admin.php");
            break;
    }
}


?>
<?php
include_once('include/footer.php');  
?>
