<?php
session_start();  // Start the session to manage login state
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}


spl_autoload_register(function ($className) {
    $paths = ['models', 'controllers', 'helpers', 'config'];
    foreach ($paths as $path) {
        $file = __DIR__ . "/$path/$className.php";
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});

$db = (new Database())->connect();
$controllerName = $_GET['controller'] ?? 'User';
$action = $_GET['action'] ?? 'listUsers';

$controllerClass = $controllerName . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass($db);
    if (method_exists($controller, $action)) {
        $controller->$action($_POST);
    } else {
        echo "Action not found!";
    }
} else {
    echo "Controller not found!";
}