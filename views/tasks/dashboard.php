<?php include __DIR__ . "/../includes/header.php"; ?>
<div class="bg-gray-600 py-4 px-12 flex justify-between items-center">
    <h1 class="text-white text-2xl font-bold">My Task</h1>
    <a href="index.php?action=create" class="bg-blue-600 font-semibold text-white px-4 py-2 rounded hover:bg-blue-800">+ Add Task</a>
</div>
<div class="bg-gray-600 flex items-center justify-between px-12 py-4 pb-8 text-white gap-8 shadow-lg">
    <input type="text" class="bg-white text-black px-4 py-2 rounded w-full" placeholder="Search Task">
    <div class="flex gap-8">
        <form action="index.php?action=dashboard" method="GET" class="flex gap-4 items-center">
            <input type="hidden" name="action" value="dashboard">
            <select name="sort_due" id="sort_due" class="text-black bg-white px-4 py-2 rounded">
                <?php $sort_due = $_GET['sort_due'] ?? 'all'; ?>
                <option value="all" <?= $sort_due === 'all' ? 'selected' : '' ?>>All (No sorting)</option>
                <option value="nearest" <?= $sort_due === 'nearest' ? 'selected' : '' ?>>Due Date: Nearest</option>
                <option value="furthest" <?= $sort_due === 'furthest' ? 'selected' : '' ?>>Due Date: Furthest</option>
            </select>
            <select name="status" id="status" class="text-black bg-white px-4 py-2 rounded">
                <?php $status = $_GET['status'] ?? 'all'; ?>
                <option value="all" <?= $status === 'all' ? 'selected' : '' ?>>Status: All</option>
                <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>Pending Only</option>
                <option value="in_progress" <?= $status === 'in_progress' ? 'selected' : '' ?>>In Progress Only</option>
                <option value="done" <?= $status === 'done' ? 'selected' : '' ?>>Done Only</option>
            </select>
            <select name="priority" id="priority" class="text-black bg-white px-4 py-2 rounded">
                <?php $priority = $_GET['priority'] ?? 'all'; ?>
                <option value="all" <?= $priority === 'all' ? 'selected' : '' ?>>Priority: All</option>
                <option value="low" <?= $priority === 'low' ? 'selected' : '' ?>>Low Only</option>
                <option value="medium" <?= $priority === 'medium' ? 'selected' : '' ?>>Medium Only</option>
                <option value="high" <?= $priority === 'high' ? 'selected' : '' ?>>High Only</option>
            </select>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 h-10 rounded-md hover:bg-blue-700 whitespace-nowrap">Apply Filter</button>
        </form>
    </div>
</div>
<div class="bg-gray-600 py-8 px-12 my-8 mx-12 rounded-lg shadow-lg">
    <table class="w-full table-auto border-collapse border border-gray-400">
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
            <?php foreach ($taskList as $task): ?>
                <tr class="bg-gray-100 text-black hover:bg-gray-200">
                    <td class="border px-4 py-2 text-center">
                        <?= htmlspecialchars($task['title']) ?>
                    </td>
                    <td class="border px-4 py-2 text-center">
                        <?= htmlspecialchars(ucwords(str_replace('_', ' ', $task['status']))) ?>
                    </td>
                    <td class="border px-4 py-2 text-center">
                        <?= htmlspecialchars(ucwords($task['priority'])) ?>
                    </td>
                    <td class="border px-4 py-2 text-center">
                        <?= htmlspecialchars(date('d M Y', strtotime($task['due_date']))) ?>
                    </td>
                    <td class="border px-4 py-2 flex gap-4 justify-center">
                        <a href="index.php?action=edit&id=<?= $task['id'] ?>" class="bg-yellow-500 hover:bg-yellow-800 text-white py-1 px-2 rounded">Edit</a>
                        <a href="index.php?action=delete&id=<?= $task['id'] ?>" class="bg-red-500 hover:bg-red-800 text-white py-1 px-2 rounded">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>

</html>