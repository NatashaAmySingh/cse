<?php
require_once "models/ClassModel.php";
require_once "models/GradeModel.php"; // Include GradeModel to fetch grades

class ClassController {
    private $classModel;
    private $gradeModel;

    public function __construct() {
        $this->classModel = new ClassModel();
        $this->gradeModel = new GradeModel(); // Initialize GradeModel
    }

    // List all classes
    public function listClasses() {
        $classes = $this->classModel->getAllClasses();
        include "views/classes/index.php";
    }

    // Show form to create a new class
    public function createForm() {
        $grades = $this->gradeModel->getAllGrades(); // Fetch grades dynamically
        include "views/classes/create.php";
    }

    // Handle creating a new class
    public function createClass() {
        $name = $_POST['name'];
        $gradeId = $_POST['grade_id'];

        if ($this->classModel->createClass($name, $gradeId)) {
            header("Location: index.php?controller=class&action=listClasses");
        } else {
            echo "Error creating class.";
        }
    }
}
?>