<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>
</head>

<body>

    <?php
    if (isset($_POST['email'])) {
        $dsn = "mysql:host=localhost;dbname=member;charset=utf8";
        $pdo = new PDO($dsn, 'root', '');
        $sql = "select * from login where email='{$_POST['email']}'";
        $chk = $pdo->query($sql)->fetch();
        if (!empty($chk)) {
            $result = $chk['pw'];
            echo "你的信箱是：".$result;
        } else {
            $result = "查無此人";
            echo "查無此人";
        }
    }


    ?>

    <form action="" method="post">
        <h4>請輸入註冊信箱：</h4>
        <input type="text" name="email">
        <input type="submit" value="查詢">
    </form>

</body>

</html>