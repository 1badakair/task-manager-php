<?php
class TaskController
{
    private Task $taskModel;

    public function __construct(Task $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function listTasks($userId)
    {
        return $this->taskModel->fetchAll($userId);
    }

    public function listFilteredTasks($userId, $status = 'all', $priority = 'all', $sortDue = 'all')
    {
        return $this->taskModel->fetchAllFiltered($userId, $status, $priority, $sortDue);
    }

    public function getTask($id)
    {
        return $this->taskModel->findById($id);
    }

    public function createTask($userId, $title, $status, $priority, $dueDate)
    {
        $this->taskModel->create($userId, $title, $status, $priority, $dueDate);
    }

    public function updateTask($id, $title, $status, $priority, $dueDate)
    {
        $this->taskModel->update($id, $title, $status, $priority, $dueDate);
    }

    public function deleteTask($id)
    {
        $this->taskModel->delete($id);
    }
}
?>