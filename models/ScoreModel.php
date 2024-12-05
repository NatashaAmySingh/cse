<?php
require_once "config/database.php";

class ScoreModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Get all scores for a student
    public function getScoresByStudent($studentId) {
        $query = "
            SELECT scores.id, scores.score, subjects.name AS subject_name, terms.name AS term_name 
            FROM scores
            JOIN subjects ON scores.subject_id = subjects.id
            JOIN terms ON scores.term_id = terms.id
            WHERE scores.student_id = :student_id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":student_id", $studentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 public function addOrUpdateScore($studentId, $subjectId, $termId, $score) {
    // Validate score
    if (!is_numeric($score) || $score < 0 || $score > 100) {
        die("Invalid score value: $score");
    }

    // Prepare the SQL query
    $query = "INSERT INTO scores (student_id, subject_id, term_id, score) 
              VALUES (:student_id, :subject_id, :term_id, :score)
              ON DUPLICATE KEY UPDATE score = :score";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":student_id", $studentId);
    $stmt->bindParam(":subject_id", $subjectId);
    $stmt->bindParam(":term_id", $termId);
    $stmt->bindParam(":score", $score);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error saving score: " . $e->getMessage();  // Show detailed error message for debugging
    }
} 
 
}
?>