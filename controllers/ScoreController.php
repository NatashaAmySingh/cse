<?php
require_once "models/ScoreModel.php";
require_once "models/StudentModel.php";
require_once "models/SubjectModel.php";
require_once "models/TermModel.php";
require_once "models/ClassModel.php";

class ReportController {
    private $scoreModel;
    private $studentModel;
    private $subjectModel;
    private $termModel;
    private $classModel;

    public function __construct() {
        $this->scoreModel = new ScoreModel();
        $this->studentModel = new StudentModel();
        $this->subjectModel = new SubjectModel();
        $this->termModel = new TermModel();
        $this->classModel = new ClassModel();
    }

    // Generate Report Card for a student
    public function generateReportCard() {
        $studentId = $_GET['student_id'] ?? null;
        $termId = $_GET['term_id'] ?? null;

        if ($studentId && $termId) {
            $student = $this->studentModel->getStudentById($studentId);
            $scores = $this->scoreModel->getScoresByStudentAndTerm($studentId, $termId);
            $subjects = $this->subjectModel->getAllSubjects();
            $term = $this->termModel->getTermById($termId);

            include "views/reports/report_card.php";
        } else {
            echo "Student ID and Term ID are required.";
        }
    }

    // Calculate Average Performance for a class and subject
    public function averagePerformance() {
        $classId = $_GET['class_id'] ?? null;
        $subjectId = $_GET['subject_id'] ?? null;
        $termId = $_GET['term_id'] ?? null;

        if ($classId && $subjectId && $termId) {
            $class = $this->classModel->getClassById($classId);
            $subject = $this->subjectModel->getSubjectById($subjectId);
            $term = $this->termModel->getTermById($termId);

            $students = $this->studentModel->getStudentsByClass($classId);
            $totalScore = 0;
            $count = 0;

            foreach ($students as $student) {
                $score = $this->scoreModel->getScore($student['id'], $subjectId, $termId);
                if ($score !== null) {
                    $totalScore += $score;
                    $count++;
                }
            }

            $average = $count > 0 ? $totalScore / $count : 0;

            include "views/reports/average_performance.php";
        } else {
            echo "Class ID, Subject ID, and Term ID are required.";
        }
    }
}
?>