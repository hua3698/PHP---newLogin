<?php
    session_start();

// 註銷/移除 變數的函式
unset($_SESSION['login']);

header("location:index.php");
?>