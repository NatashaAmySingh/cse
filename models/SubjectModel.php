<?php
require_once "config/database.php";

class SubjectModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Get all subjects
    public function getAllSubjects() {
        $query = "SELECT id, name FROM subjects";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a subject by ID
    public function getSubjectById($subjectId) {
        $query = "SELECT id, name FROM subjects WHERE id = :subject_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":subject_id", $subjectId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>