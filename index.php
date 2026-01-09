<?php 
    require_once "app/config/database.php";
    require_once "app/models/User.php";
    require_once "app/models/Task.php";
    require_once "app/controllers/AuthController.php";
    require_once "app/controllers/TaskController.php";

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    $user = new User($pdo);
    $task = new Task($pdo);

    $userController = new AuthController($user);
    $taskController = new TaskController($task);

    switch($action){
        case 'login':
            $userController->login($_POST['username'], $_POST['password']);
            break;
        case 'register':
            $userController->register($_POST['username'], $_POST['email'], $_POST['password']);
            break;
        case 'create':
            $taskController->createTask($_POST['title'], $_POST['status'], $_POST['priority'], $_POST['due_date']);
            break;
        case 'edit':
            $taskController->updateTask($_POST['id'], $_POST['title'], $_POST['status'], $_POST['priority'], $_POST['due_date']);
            break;
        case 'delete':
            $taskController->deleteTask($_GET['id']);
            break;
    }
?>