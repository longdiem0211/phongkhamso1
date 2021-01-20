<?php
include './mvc/controller/source.php';
setcookie('username', '',1);
        session_start();
        unset($_SESSION['current_user']);
        unset($_SESSION['access_token']);
header('location:index.php');
?>
