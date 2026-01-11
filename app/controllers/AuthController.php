<?php
require_once __DIR__ . "/../models/User.php";

class AuthController
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function login($username, $password)
    {
        $user = $this->userModel->findByUsername($username);

        if (!$user) return false;

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $email, $password)
    {
        return $this->userModel->register($username, $email, $password);
    }

    public function landingPage()
    {
        include __DIR__ . "/../../views/auth/login.php";
    }
}
?>