<?php
class BmiModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function saveBmi($name, $weight, $height, $bmi, $interpretation) {
        $stmt = $this->conn->prepare("INSERT INTO bmi_records (name, weight, height, bmi, interpretation) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $weight, $height, $bmi, $interpretation]);
    }

    public function getHistory() {
        $stmt = $this->conn->query("SELECT * FROM bmi_records ORDER BY date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>