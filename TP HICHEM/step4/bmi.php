<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit();
}
$conn = new mysqli("localhost", "root", "", "bmi_app");
$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>BMI Calculator</h2>
    <form method="post">
        Weight (kg): <input type="number" name="weight" step="0.1" required><br>
        Height (cm): <input type="number" name="height" step="0.1" required><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST["weight"];
        $height_cm = $_POST["height"];
        $height_m = $height_cm / 100;
        $bmi = $weight / ($height_m * $height_m);
        $bmi_rounded = round($bmi, 2);
        echo "<p>Your BMI is: $bmi_rounded</p>";
        $stmt = $conn->prepare("INSERT INTO bmi_results (user_id, bmi_value) VALUES (?, ?)");
        $stmt->bind_param("id", $user_id, $bmi_rounded);
        $stmt->execute();
    }

    $result = $conn->query("SELECT bmi_value, created_at FROM bmi_results WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 5");
    echo "<h3>Last 5 Results</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["bmi_value"] . " (on " . $row["created_at"] . ")</li>";
    }
    echo "</ul>";
    ?>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>