<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth.php");
    exit;
}

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/models/BmiModel.php';
require_once __DIR__ . '/app/controllers/BmiController.php';

$model = new BmiModel($conn);
$controller = new BmiController($model);

$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $result = $controller->calculateBmi($name, $weight, $height);
}

$history = $controller->history();
include __DIR__ . '/app/views/bmi_form.php';
?>