<?php
require_once "models/ScoreModel.php";
require_once "models/StudentModel.php";
require_once "models/SubjectModel.php";
require_once "models/TermModel.php";

class ScoreController {
    private $scoreModel;
    private $studentModel;
    private $subjectModel;
    private $termModel;

    public function __construct() {
        $this->scoreModel = new ScoreModel();
        $this->studentModel = new StudentModel();
        $this->subjectModel = new SubjectModel();
        $this->termModel = new TermModel();
    }

    // List all scores for a student
    public function listScores($studentId) {
        $scores = $this->scoreModel->getScoresByStudent($studentId);
        include "views/scores/index.php";
    }

    // Show form to create or update a score for a student
    public function createForm($studentId) {
        $subjects = $this->subjectModel->getAllSubjects();
        $terms = $this->termModel->getAllTerms();
        include "views/scores/create.php";
    }

    // Handle creating or updating a score
    public function saveScore() {
        $studentId = $_POST['student_id'];
        $subjectId = $_POST['subject_id'];
        $termId = $_POST['term_id'];
        $score = $_POST['score'];

        if ($this->scoreModel->addOrUpdateScore($studentId, $subjectId, $termId, $score)) {
            header("Location: index.php?controller=score&action=listScores&studentId=$studentId");
        } else {
            echo "Error saving score.";
        }
    }
}
?>