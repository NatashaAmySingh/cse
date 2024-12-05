<?php
require_once "config/database.php";

class ClassModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Fetch all classes with their associated grade names
    public function getAllClasses() {
        $query = "
            SELECT classes.id, classes.name, grades.name AS grade_name 
            FROM classes 
            JOIN grades ON classes.grade_id = grades.id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch classes for a specific grade
    public function getClassesByGrade($gradeId) {
        $query = "SELECT * FROM classes WHERE grade_id = :grade_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":grade_id", $gradeId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new class
    public function createClass($name, $gradeId) {
        $query = "INSERT INTO classes (name, grade_id) VALUES (:name, :grade_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":grade_id", $gradeId);
        return $stmt->execute();
    }
}
?>