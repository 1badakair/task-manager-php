<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center mx-24 justify-center min-h-screen bg-gray-800">
    <div class="bg-gray-600 p-8 px-12 rounded-lg shadow-lg w-full max-w-sm gap-8 flex flex-col items-center justify-center text-white">
        <h1 class="text-2xl font-bold mb-4">Login Page</h1>
        <p class="text-red-500"><?php if (isset($error)) echo $error; ?></p>
        <form action="index.php?action=login" method="POST" class="space-y-4">
            <input type="text" id="username" name="username" placeholder="Enter your username" class="w-full text-black bg-gray-300 border border-gray-400 p-2 px-4 rounded-lg mb-4" required>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full text-black bg-gray-300 border border-gray-400 p-2 px-4 rounded-lg mb-4" required>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php?action=register" class="text-blue-300 hover:text-blue-500 underline">Register here</a></p>
    </div>
</body>
</html>