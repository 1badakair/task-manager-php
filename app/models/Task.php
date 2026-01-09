<?php
    class Task{
        private PDO $pdo;
        
        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }
        public function fetchAll(){
            $sql = "SELECT * FROM tasks";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function findById($id){
            $sql = "SELECT * FROM tasks WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create($title, $description, $status, $priority, $dueDate){
            $sql = "INSERT INTO tasks (title, description, status, priority, due_date) VALUES (:title, :description, :status, :priority, :dueDate)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'priority' => $priority, 'dueDate' => $dueDate]);
        }

        public function update($id, $title, $description, $status, $priority, $dueDate){
            $sql = "UPDATE tasks SET title = :title, description = :description, status = :status, priority = :priority, due_date = :dueDate WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'priority' => $priority, 'dueDate' => $dueDate, 'id' => $id]);
        }

        public function delete($id){
            $sql = "DELETE FROM tasks WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        }
    }

?>