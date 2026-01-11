<?php include __DIR__ . "/../includes/header.php"; ?>
<div class="bg-gray-600 py-8 px-12 my-8 mx-12 rounded-lg shadow-lg gap-8 flex flex-col">
    <div class="flex flex-col bg-gray-400 items-center justify-center text-white rounded-lg shadow-lg py-4 px-8">
        <h1>Add Tasks</h1>
    </div>
    <form action="index.php?action=createTask" method="POST" class="space-y-4">
        <div class="flex">
            <label for="title" class="text-white">Title : </label>
            <input class="bg-white text-black" type="text" id="title" name="title" placeholder="Task Title">
        </div>
        <div class="flex justify-between">
            <div class="status">
                <label for="status" class="text-white">Status : </label>
                <select name="status" id="status" class="bg-white text-black">
                    <option value="">-- Select Status --</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <div>
                <label for="priority" class="text-white">Priority : </label>
                <select name="priority" id="priority" class="bg-white text-black">
                    <option value="">-- Select Priority --</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
        </div>
        <div>
            <label for="dueDate" class="text-white">Due Date : </label>
            <input class="bg-white text-black" type="date" id="dueDate" name="due_date">
        </div>
        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        <button type="button" onclick="window.location.href='index.php?action=dashboard'" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
    </form>
</div>
</body>

</html>