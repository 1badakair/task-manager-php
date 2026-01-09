<?php
session_start();
require_once __DIR__ . "/../../app/config/database.php";
require_once __DIR__ . "/../../app/models/User.php";
require_once __DIR__ . "/../../app/controllers/AuthController.php";

$userModel = new User($pdo);
$auth = new AuthController($userModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);

    if ($username === '' || $email === '' || $password === '') {
        $error = "All fields are required";
    } else {
        $valid = $auth->register($username, $email, $password);

        if ($valid) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Registration failed. Try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex items-center mx-24 justify-center min-h-screen bg-gray-800">
    <div class="bg-white p-8 px-12 rounded-lg shadow-lg w-full max-w-sm gap-8 flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">Register Page</h1>
        <p class="text-red-500"><?php if (isset($error)) echo $error; ?></p>
        <form action="register.php?action=register" method="POST" class="space-y-4">
            <input type="text" id="username" name="username" placeholder="Enter your username" class="w-full border border-gray-300 p-2 px-4 rounded-lg mb-4" required>
            <input type="text" id="email" name="email" placeholder="Enter your email" class="w-full border border-gray-300 p-2 px-4 rounded-lg mb-4" required>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full border border-gray-300 p-2 px-4 rounded-lg mb-4" required>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 mt-4 rounded-lg hover:bg-blue-800">Register</button>
        </form>
        <p>Already have an account? <a href="login.php" class="text-blue-500 hover:underline">Login here</a></p>
    </div>
</body>

</html>