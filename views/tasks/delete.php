<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="bg-gray-300 py-8 px-12 mx-8 mx-12 rounded-lg shadow-lg">
        <div class="flex flex-col bg-gray-600 items-center justify-center text-white">
            <h1>Delete Tasks</h1>
        </div>
        <form action="index.php?action=deleteTask&id=<?= $taskData['id'] ?>" method="POST" class="space-y-4">
            <div class="flex">
                <h1>Are you sure you want to delete the task "<?= htmlspecialchars($taskData['title']) ?>"?</h1>
            </div>
            <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700">Delete</button>
            <button type="button" onclick="window.location.href='index.php?action=dashboard'" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800">Cancel</button>
        </form>
    </div>
</body>
</html>