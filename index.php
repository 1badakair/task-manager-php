<?php 
    require_once "app/config/database.php";
    require_once "app/models/User.php";

    $user = new User($pdo);
    header('Location: views/auth/login.php');
?>