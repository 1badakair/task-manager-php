<?php include __DIR__ . "/../includes/header.php"; ?>
<div class="bg-gray-600 py-8 px-12 my-8 mx-12 rounded-lg shadow-lg gap-8 flex flex-col">
    <div class="flex flex-col bg-gray-400 items-center justify-center text-white rounded-lg shadow-lg py-4 px-8">
        <h1>Delete Tasks</h1>
    </div>
    <form action="index.php?action=deleteTask&id=<?= $taskData['id'] ?>" method="POST" class="space-y-4">
        <div class="flex">
            <h1 class="text-white">Are you sure you want to delete the task "<?= htmlspecialchars($taskData['title']) ?>"?</h1>
        </div>
        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700">Delete</button>
        <button type="button" onclick="window.location.href='index.php?action=dashboard'" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
    </form>
</div>
</body>

</html>