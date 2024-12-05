<?php
require_once "config/database.php";

class GradeModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Fetch all grades
    public function getAllGrades() {
        $query = "SELECT * FROM grades";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new grade (Note: grades are predefined and fixed)
    public function createGrade($name) {
        $query = "INSERT INTO grades (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        return $stmt->execute();
    }
}
?>