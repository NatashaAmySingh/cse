<?php
require_once "models/StudentModel.php";
require_once "models/ClassModel.php"; // To fetch classes dynamically

class StudentController {
    private $model;
    private $classModel;

    public function __construct() {
        $this->model = new StudentModel();
        $this->classModel = new ClassModel(); // Fetch classes for dropdown
    }

    // List all students with class filtering

    public function listStudents() {
    // Get the grade ID from the GET request (if any)
    $gradeId = isset($_GET['grade_id']) ? $_GET['grade_id'] : '';

    // Fetch students based on the grade filter
    $students = $this->model->getStudentsByGrade($gradeId);

    // Fetch all grades for the dropdown
    $grades = $this->classModel->getAllGrades(); // Assuming a method to get all grades

    include "views/students/index.php"; // Include the view for displaying the students
}

    // Show form to create a new student
    public function createForm() {
        $classes = $this->classModel->getAllClasses(); // Fetch all classes
        include "views/students/create.php"; // Include the form for creating a new student
    }

    // Handle creating a new student
    public function createStudent() {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $classId = $_POST['class_id'];

        if ($this->model->createStudent($name, $dob, $gender, $classId)) {
            header("Location: index.php?controller=student&action=listStudents");
        } else {
            echo "Error creating student.";
        }
    }
}

?>
