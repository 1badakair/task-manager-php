<?php
    class TaskController{
        private Task $taskModel;

        public function __construct(Task $taskModel){
            $this->taskModel = $taskModel;
        }
    
        public function listTasks(){
            return $this->taskModel->fetchAll();
        }

        public function dashboard(){
            $tasks = $this->listTasks();
            include __DIR__ . "/../../views/tasks/dashboard.php";
        }

        public function getTask($id){
            return $this->taskModel->findById($id);
        }

        public function createTask($userId, $title, $status, $priority, $dueDate){
            $userId = $_SESSION['user_id'];
            $this->taskModel->create($userId, $title, $status, $priority, $dueDate);
        }

        public function updateTask($id, $title, $status, $priority, $dueDate){
            $this->taskModel->update($id, $title, $status, $priority, $dueDate);
        }

        public function deleteTask($id){
            $this->taskModel->delete($id);
        }
    }
?>