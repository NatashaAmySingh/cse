<?php
require_once "config/database.php";

class StudentModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Fetch all students with their class name
    public function getAllStudents() {
        $query = "
            SELECT students.id, students.name, classes.name AS class_name 
            FROM students 
            JOIN classes ON students.class_id = classes.id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch students in a specific class
    public function getStudentsByClass($classId) {
        $query = "SELECT * FROM students WHERE class_id = :class_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":class_id", $classId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new student
    public function createStudent($name, $dob, $gender, $classId) {
        $query = "INSERT INTO students (name, class_id) VALUES (:name, :class_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":class_id", $classId);
        return $stmt->execute();
    }
}
?>