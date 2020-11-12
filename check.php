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
$check=$pdo->query($sql)->fetch(); //fetchColumn 列出第0欄的值、fetch則列出陣列

if(!empty($check)){
    echo "登入成功";
    
    //取得會員個人資料
    $member_sql="select * from `member` where `login_id`='{$check['id']}' ";
    $member=$pdo->query($member_sql)->fetch();
    $role=$member['role'];
    setcookie("login",$acc,time()+3600);


    switch ($role) {
        case '會員':
            header('location:mem.php');
        break;
        case 'VIP':
            header('location:vip.php');
        break;
        
        case '管理員':
            header('location:admin.php');
            break;
    }

}else{
    header("location:index.php?msg=帳密不正確，請重新登入");
}


?>