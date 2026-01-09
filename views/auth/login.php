<?php
    session_start();
    require_once __DIR__ . "/../../app/config/database.php"; 
    require_once __DIR__ . "/../../app/models/User.php";
    require_once __DIR__ . "/../../app/controllers/AuthController.php";

    $userModel = new User($pdo);
    $auth = new AuthController($userModel);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        $valid = $auth->login($username, $password);

        if ($valid) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password";
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
        <h1 class="text-2xl font-bold mb-4">Login Page</h1>
        <p class="text-red-500"><?php if (isset($error)) echo $error; ?></p>
        <form action="login.php?action=login" method="POST" class="space-y-4">
            <input type="text" id="username" name="username" placeholder="Enter your username" class="w-full border border-gray-300 p-2 px-4 rounded-lg" required>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full border border-gray-300 p-2 px-4 rounded-lg" required>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php" class="text-blue-500 hover:underline">Register here</a></p>
    </div>
</body>
</html>