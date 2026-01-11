<?php
class Task
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll($userId)
    {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAllFiltered($userId, $status = 'all', $priority = 'all', $sortDue = 'all')
    {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id";
        $params = ['user_id' => $userId];

        if ($status !== 'all') {
            $sql .= " AND status = :status";
            $params['status'] = $status;
        }

        if ($priority !== 'all') {
            $sql .= " AND priority = :priority";
            $params['priority'] = $priority;
        }

        if ($sortDue === 'nearest') {
            $sql .= " ORDER BY (due_date IS NULL) ASC, due_date ASC";
        } elseif ($sortDue === 'furthest') {
            $sql .= " ORDER BY (due_date IS NULL) ASC, due_date DESC";
        } else {
            $sql .= " ORDER BY id DESC";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create($userId, $title, $status, $priority, $dueDate)
    {
        $sql = "INSERT INTO tasks (user_id, title, status, priority, due_date) VALUES (:userId, :title, :status, :priority, :dueDate)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['userId' => $userId, 'title' => $title, 'status' => $status, 'priority' => $priority, 'dueDate' => $dueDate]);
    }

    public function update($id, $title, $status, $priority, $dueDate)
    {
        $sql = "UPDATE tasks SET title = :title, status = :status, priority = :priority, due_date = :dueDate WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'status' => $status, 'priority' => $priority, 'dueDate' => $dueDate, 'id' => $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>