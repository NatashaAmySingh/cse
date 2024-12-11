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

    // List all students
    public function listStudents() {
        $students = $this->model->getAllStudents();
        $classes = $this->classModel->getAllClasses();
        include "views/students/index.php";
    }

    // Show form to create a new student
    public function createForm() {
        $classes = $this->classModel->getAllClasses(); // Fetch all classes
        include "views/students/create.php";
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