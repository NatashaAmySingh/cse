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

 
    public function getScoresByStudentAndTerm($studentId, $termId) {
        $query = $this->conn->prepare("
            SELECT subject_id, score 
            FROM scores 
            WHERE student_id = :student_id AND term_id = :term_id
        ");
        $query->bindParam(':student_id', $studentId, PDO::PARAM_INT);
        $query->bindParam(':term_id', $termId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    /**
     * Get the score for a specific student, subject, and term.
     * 
     * @param int $studentId
     * @param int $subjectId
     * @param int $termId
     * @return int|null
     */
    public function getScore($studentId, $subjectId, $termId) {
        $query = $this->conn->prepare("
            SELECT score 
            FROM scores 
            WHERE student_id = :student_id AND subject_id = :subject_id AND term_id = :term_id
        ");
        $query->bindParam(':student_id', $studentId, PDO::PARAM_INT);
        $query->bindParam(':subject_id', $subjectId, PDO::PARAM_INT);
        $query->bindParam(':term_id', $termId, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['score'] : null;
    }

    /**
     * Add or update a score for a student, subject, and term.
     * 
     * @param int $studentId
     * @param int $subjectId
     * @param int $termId
     * @param int $score
     * @return void
     */
    public function addOrUpdateScore($studentId, $subjectId, $termId, $score) {
        $query = $this->conn->prepare("
            INSERT INTO scores (student_id, subject_id, term_id, score)
            VALUES (:student_id, :subject_id, :term_id, :score)
            ON DUPLICATE KEY UPDATE score = :score
        ");
        $query->bindParam(':student_id', $studentId, PDO::PARAM_INT);
        $query->bindParam(':subject_id', $subjectId, PDO::PARAM_INT);
        $query->bindParam(':term_id', $termId, PDO::PARAM_INT);
        $query->bindParam(':score', $score, PDO::PARAM_INT);
        $query->execute();
    }
 
}
?>