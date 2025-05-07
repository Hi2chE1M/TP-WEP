<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bmi_app");

$email = $_POST["email"];
$password = $_POST["password"];

$result = $conn->query("SELECT id FROM users WHERE email='$email' AND password='$password'");
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user["id"];
    header("Location: bmi.php");
} else {
    echo "Invalid login.";
}
?>