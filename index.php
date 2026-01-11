<?php 
session_start();
    require_once "app/config/database.php";
    require_once "app/models/User.php";
    require_once "app/models/Task.php";
    require_once "app/controllers/AuthController.php";
    require_once "app/controllers/TaskController.php";

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $request = $_SERVER['REQUEST_METHOD'];
    $userId = $_SESSION['user_id'] ?? null;
    if ($userId == null && !in_array($action, ['login','register',''])) {
        header("Location: index.php?action=login");
        exit;
    }


    $user = new User($pdo);
    $task = new Task($pdo);

    $userController = new AuthController($user);
    $taskController = new TaskController($task);

    switch($action){
        case 'login':
            if ($request === 'POST') {
                $username = ($_POST['username']);
                $password = ($_POST['password']);
                if ($userController->login($username, $password)) {
                    header("Location: index.php?action=dashboard");
                    $taskList = $taskController->listTasks();
                    exit;
                }else{
                    $error = "Invalid username or password";
                }
            }
            include __DIR__ . "/views/auth/login.php";
            break;
        case 'register':
            if ($request === 'POST') {
                $username = ($_POST['username']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);

                if ($username === '' || $email === '' || $password === '') {
                    $error = "All fields are required";
                } else {
                    $valid = $userController->register($username, $email, $password);
                    if ($valid) {
                        header("Location: index.php?action=login");
                        exit;
                    } else {
                        $error = "Registration failed. Try again.";
                    }
                }
            }
            include __DIR__ . "/views/auth/register.php";
            break;
        case 'logout':
            session_unset();
            session_destroy();
            header("Location: index.php?action=login");
            exit;
            break;
        case 'create':
            include __DIR__ . "/views/tasks/create.php";
            break;
        case 'createTask':
            if($request === 'POST'){
                $title = $_POST['title'];
                $status = $_POST['status'];
                $priority = $_POST['priority'];
                $dueDate = $_POST['due_date'];

                if (empty($title) || empty($status) || empty($priority) || empty($dueDate)) {
                    $error = "All fields are required.";
                    include __DIR__ . "/views/tasks/create.php";
                    exit;
                }
                $taskController->createTask($userId, $title, $status, $priority, $dueDate);
                header("Location: index.php?action=dashboard");
                exit;
            }
            $taskController->createTask($userId, $title, $status, $priority, $dueDate);
            break;
        case 'edit':
            $id = $_GET['id'];

            if (!$id) {
                header("Location: index.php?action=dashboard");
                exit;
            }

            $taskData = $taskController->getTask($id);

            // optional: pastikan task milik user yang login
            if ($taskData['user_id'] != $userId) {
                header("Location: index.php?action=dashboard");
                exit;
            }
            include __DIR__ . "/views/tasks/edit.php";
            break;
        case 'updateTask':
            if($request === 'POST'){
                $id = $_GET['id'];
                $title = $_POST['title'];
                $status = $_POST['status'];
                $priority = $_POST['priority'];
                $dueDate = $_POST['due_date'];

                if (empty($title) || empty($status) || empty($priority) || empty($dueDate)) {
                    $error = "All fields are required.";
                    $taskData = $taskController->getTask($id);
                    include __DIR__ . "/views/tasks/edit.php";
                    exit;
                }

                $taskController->updateTask($id, $title, $status, $priority, $dueDate);
                header("Location: index.php?action=dashboard");
                exit;
            }
            break;
        case 'delete':
            $id = $_GET['id'];

            if (!$id) {
                header("Location: index.php?action=dashboard");
                exit;
            }

            $taskData = $taskController->getTask($id);

            // optional: pastikan task milik user yang login
            if ($taskData['user_id'] != $userId) {
                header("Location: index.php?action=dashboard");
                exit;
            }
            include __DIR__ . "/views/tasks/delete.php";
            break;
        case 'deleteTask':
            if($request === 'POST'){
                $id = $_GET['id'];

                $taskController->deleteTask($id);
                header("Location: index.php?action=dashboard");
                exit;
            }
            $taskController->deleteTask($id);
            break;
        case 'dashboard':
            $taskList = $taskController->listTasks();
            include __DIR__ . "/views/tasks/dashboard.php";
            break;
        default:
            $userController->landingPage();
            break;
    }

?>