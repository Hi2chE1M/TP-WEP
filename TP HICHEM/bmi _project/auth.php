<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/models/UserModel.php';
require_once __DIR__ . '/app/controllers/UserController.php';

$model = new UserModel($conn);
$controller = new UserController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($action === 'register') {
        $controller->handleRegister($username, $password);
    } elseif ($action === 'login') {
        $controller->handleLogin($username, $password);
    }
} else {
    include __DIR__ . '/app/views/auth_form.php';
}
?>