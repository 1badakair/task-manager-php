<?php
    class TaskController{
        private Task $taskModel;

        public function __construct(Task $taskModel){
            $this->taskModel = $taskModel;
        }

        public function listTasks(){
            return $this->taskModel->fetchAll();
        }

        public function getTask($id){
            return $this->taskModel->findById($id);
        }

        public function createTask($title, $description, $status, $priority, $dueDate){
            $this->taskModel->create($title, $description, $status, $priority, $dueDate);
        }

        public function updateTask($id, $title, $description, $status, $priority, $dueDate){
            $this->taskModel->update($id, $title, $description, $status, $priority, $dueDate);
        }

        public function deleteTask($id){
            $this->taskModel->delete($id);
        }
    }
?>