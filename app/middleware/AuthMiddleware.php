<?php
class AuthMiddleware
{
    public static function handle()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
    }
}
?>