<?php
require_once "models/ReportModel.php";
require_once "models/StudentModel.php";
require_once "models/ClassModel.php";
require_once "models/SubjectModel.php";  // Import the model to fetch subjects


class ReportController {

    private $reportModel;
    private $subjectModel;


    public function __construct() {
        $this->reportModel = new ReportModel();
        $this->subjectModel = new SubjectModel();  // Initialize the subject model

    }


    // Create a new report card entry (add score)
    
    public function createReportCard()
{
    $studentId = $_POST['student_id'];
    $termId = $_POST['term_id'];
    $subjectId = $_POST['subject_id'];
    $score = $_POST['score'];

    // Check if the report card already exists
    $reportModel = new ReportModel();
    $existingScore = $reportModel->getScore($studentId, $termId, $subjectId);

    if ($existingScore) {
        // If the score exists, update it
        $result = $reportModel->updateScore($studentId, $termId, $subjectId, $score);
    } else {
        // If the score does not exist, insert it
        $result = $reportModel->createReportCard($studentId, $termId, $subjectId, $score);
    }
      

            if ($result) {
                header("Location: index.php?controller=report&action=studentReportCard&student_id=$studentId&term=$termId");
            } else {
                echo "Error creating report card.";
            }
        }

    // Update an existing report card entry (edit score)
    public function updateReportCard() {
        if ($_POST) {
            $scoreId = $_POST['score_id'];
            $score = $_POST['score'];

            $result = $this->reportModel->updateReportCard($scoreId, $score);
            if ($result) {
                header("Location: index.php?controller=report&action=studentReportCard&student_id=" . $_POST['student_id'] . "&term=" . $_POST['term_id']);
            } else {
                echo "Error updating report card.";
            }
        }
    }

    // Delete a report card entry
    public function deleteReportCard() {
        $scoreId = $_GET['score_id'];

        $result = $this->reportModel->deleteReportCard($scoreId);
        if ($result) {
            header("Location: index.php?controller=report&action=studentReportCard&student_id=" . $_GET['student_id'] . "&term=" . $_GET['term']);
        } else {
            echo "Error deleting report card.";
        }
    }
    private $studentModel;
    private $classModel;




    // Generate average performance report by subject

    public function averagePerformanceReport() {
    $termId = $_GET['term'];

    // Fetch average performance data
    $averagePerformance = $this->reportModel->getAveragePerformance($termId);

    // Fetch term name for display
    $termName = $this->reportModel->getTermNameById($termId);

    // Pass the data to the view
    include "views/reports/averagePerformanceReport.php";
}

public function studentReportCard() {
    $studentId = $_GET['student_id'];
    $termId = $_GET['term'];
          // Fetch the subjects dynamically
    $subjects = $this->subjectModel->getAllSubjects(); // Fetch all subjects from the database
        

    // Get student report card data
    $studentReportCard = $this->reportModel->getStudentReportCard($studentId, $termId);
    $termName = $this->reportModel->getTermNameById($termId);

    // Pass the data to the view
    include "views/reports/studentReportCard.php";
}



}
?>