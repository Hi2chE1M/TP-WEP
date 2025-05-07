<?php
$conn = new mysqli("localhost", "root", "", "bmi_app");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
header("Location: index.html");
?>