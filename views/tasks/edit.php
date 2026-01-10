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
            <h1>Edit Tasks</h1>
        </div>
        <form action="index.php?action=updateTask&id=<?= $taskData['id'] ?>" method="POST" class="space-y-4">
            <div class="flex">
                <label for="title">Title : </label>
                <input class="bg-white text-black" value="<?= htmlspecialchars($taskData['title']) ?>" type="text" id="title" name="title" placeholder="Task Title">
            </div>
            <div class="flex justify-between">
                <div class="status">
                    <label for="status">Status : </label>
                    <select name="status" id="status" class="bg-white text-black">
                        <option value="">-- Select Status --</option>
                        <option value="pending" <?= $taskData['status']=='pending'?'selected':'' ?>>Pending</option>
                        <option value="in_progress" <?= $taskData['status']=='in_progress'?'selected':'' ?>>In Progress</option>
                        <option value="done" <?= $taskData['status']=='done'?'selected':'' ?>>Done</option>
                    </select>
                </div>
                <div>
                    <label for="priority">Priority : </label>
                    <select name="priority" id="priority" class="bg-white text-black">
                        <option value="">-- Select Priority --</option>
                        <option value="low" <?= $taskData['priority']=='low'?'selected':'' ?>>Low</option>
                        <option value="medium" <?= $taskData['priority']=='medium'?'selected':'' ?>>Medium</option>
                        <option value="high" <?= $taskData['priority']=='high'?'selected':'' ?>>High</option>
                    </select>    
                </div>
            </div>
            <div>
                <label for="due_date">Due Date : </label>
                <input class="bg-white text-black" value="<?= htmlspecialchars($taskData['due_date']) ?>" type="date" id="due_date" name="due_date">
            </div>
            <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            <button type="button" onclick="window.location.href='index.php?action=dashboard'" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800">Cancel</button>
        </form>
    </div>
</body>
</html>