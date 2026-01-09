<?php include __DIR__ . "/../includes/header.php"?>
    <div class="bg-white py-4 px-12 flex justify-between items-center">
        <h1>My Task</h1>
        <button type="submit">Add Task</button>
    </div>
    <div class="bg-red-700 flex items-center justify-between px-12 py-4 text-white">
        <input type="text" placeholder="Search Task">
        <div class="flex gap-8">
            <h1>All</h1>
            <h1>Pending</h1>
            <h1>Priority</h1>
        </div>
    </div>
    <div class="bg-white my-8 mx-12 rounded-lg shadow-lg">
        <form action="GET" class="w-full px-12 py-8">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Act(Edit/Delete)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sample Task</td>
                    <td>Pending</td>
                    <td>High</td>
                    <td>2024-12-31</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            </tbody>
        </form>
    </div>
</body>

</html>