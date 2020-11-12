<?php

// 設定時間-100，就可以讓cookie過期
setcookie("login",'',-100);
header("location:index.php");
?>