<?php
require_once "config/database.php";

class TermModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Get all terms
    public function getAllTerms() {
        $query = "SELECT id, name FROM terms";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a term by ID
    public function getTermById($termId) {
        $query = "SELECT id, name FROM terms WHERE id = :term_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":term_id", $termId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>