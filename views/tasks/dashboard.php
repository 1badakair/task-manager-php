<?php include __DIR__ . "/../includes/header.php"; ?>
<div class="bg-blue-900 py-4 px-12 flex justify-between items-center">
        <h1>My Task</h1>
        <a href="index.php?action=create" class="bg-white text-blue-900 px-4 py-2 rounded hover:bg-gray-200">+ Add Task</a>
    </div>
    <div class="bg-red-700 flex items-center justify-between px-12 py-4 text-white gap-8">
        <input type="text" class="bg-white text-black px-4 py-2 rounded w-full" placeholder="Search Task">
        <div class="flex gap-8">
            <h1>All</h1>
            <h1>Pending</h1>
            <h1>Priority</h1>
        </div>
    </div>
    <div class="bg-gray-300 py-8 px-12 mx-8 mx-12 rounded-lg shadow-lg">
        <table class="w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-2/10 px-4 py-2">Title</th>
                    <th class="w-1/10 px-4 py-2">Status</th>
                    <th class="w-1/10 px-4 py-2">Priority</th>
                    <th class="w-2/10 px-4 py-2">Due Date</th>
                    <th class="w-1/10 px-4 py-2">Act</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($taskList as $task): ?>
                <tr>
                    <td class="border px-4 py-2">
                        <?= htmlspecialchars($task['title']) ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?= htmlspecialchars(ucwords(str_replace('_', ' ', $task['status']))) ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?= htmlspecialchars(ucwords($task['priority'])) ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?= htmlspecialchars(date('d M Y', strtotime($task['due_date']))) ?>
                    </td>
                    <td class="border px-4 py-2 flex gap-4">
                        <a href="index.php?action=edit&id=<?= $task['id'] ?>" class="bg-yellow-500 hover:bg-yellow-800 text-white py-1 px-2 rounded">Edit</a>
                        <a href="index.php?action=delete&id=<?= $task['id'] ?>" class="bg-red-500 hover:bg-red-800 text-white py-1 px-2 rounded">Delete</a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</body>

</html>