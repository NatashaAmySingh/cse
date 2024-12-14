<?php
require_once "config/database.php";

class ReportModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Fetch term name by term_id
    public function getTermNameById($termId) {
        $query = "SELECT name FROM terms WHERE id = :termId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":termId", $termId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn();  // Returns the term name
    }

    // Get student report card data
    public function getStudentReportCard($studentId, $termId) {
        $query = "SELECT s.name AS student_name, c.name AS class_name, sub.name AS subject, sc.score
                  FROM students s
                  JOIN scores sc ON s.id = sc.student_id
                  JOIN classes c ON s.class_id = c.id
                  JOIN subjects sub ON sc.subject_id = sub.id
                  WHERE s.id = :studentId AND sc.term_id = :termId";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":studentId", $studentId, PDO::PARAM_INT);
        $stmt->bindParam(":termId", $termId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Returns an array of results
    }

    // Calculate average performance for all students in a specific term and subject
    public function getAveragePerformance($termId) {
        $query = "SELECT sub.name AS subject, AVG(sc.score) AS average_score
                  FROM scores sc
                  JOIN subjects sub ON sc.subject_id = sub.id
                  WHERE sc.term_id = :termId
                  GROUP BY sc.subject_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":termId", $termId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Returns an array of subjects with average scores
    }

    // Create a new report card (add scores)

    public function createReportCard($studentId, $termId, $subjectId, $score) {
            $sql = "INSERT INTO scores (student_id, subject_id, score, term_id) 
            VALUES (:student_id, :subject_id, :score, :term_id)";
    $stmt = $this->conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':student_id', $studentId);
    $stmt->bindParam(':subject_id', $subjectId);
    $stmt->bindParam(':score', $score);
    $stmt->bindParam(':term_id', $termId);

    // Execute the insert query
    return $stmt->execute();

}

    // Update a report card (edit score)
    public function updateReportCard($scoreId, $score) {
        $query = "UPDATE scores 
                  SET score = :score 
                  WHERE id = :scoreId";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":score", $score);
        $stmt->bindParam(":scoreId", $scoreId);
        
        return $stmt->execute();  // Return true on success, false on failure
    }

    // Delete a report card (remove score)
    public function deleteReportCard($scoreId) {
        $query = "DELETE FROM scores WHERE id = :scoreId";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":scoreId", $scoreId);
        
        return $stmt->execute();  // Return true on success, false on failure
    }

public function getScore($studentId, $termId, $subjectId)
{
    $sql = "SELECT id FROM scores WHERE student_id = :student_id AND term_id = :term_id AND subject_id = :subject_id LIMIT 1";
    $stmt = $this->conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':student_id', $studentId);
    $stmt->bindParam(':term_id', $termId);
    $stmt->bindParam(':subject_id', $subjectId);
    
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); // Return the score record if found
}

public function updateScore($studentId, $termId, $subjectId, $score)
{
    $sql = "UPDATE scores SET score = :score WHERE student_id = :student_id AND term_id = :term_id AND subject_id = :subject_id";
    $stmt = $this->conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':student_id', $studentId);
    $stmt->bindParam(':term_id', $termId);
    $stmt->bindParam(':subject_id', $subjectId);
    $stmt->bindParam(':score', $score);

    // Execute the update query
    return $stmt->execute();
}

}

?>