<?php
    class User{
        private PDO $pdo;
        
        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        public function register($username, $email, $password){
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->pdo->prepare($sql);
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password]);
        }

        public function findByUsername($username){
            $sql = "SELECT id, password FROM users WHERE username = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
    }
?>