<?php
require_once "models/GradeModel.php";

class GradeController {
    private $model;

    public function __construct() {
        $this->model = new GradeModel();
    }

    // List all grades
    public function listGrades() {
        $grades = $this->model->getAllGrades();
        include "views/grades/index.php";
    }

    // Show form to create a new grade (although this should be restricted)
    public function createForm() {
        include "views/grades/create.php";
    }

    // Handle creating a new grade
    public function createGrade() {
        $name = $_POST['name'];

        if (in_array($name, ['1', '2', '3', '4', '5', '6'])) {
            if ($this->model->createGrade($name)) {
                header("Location: index.php?controller=grade&action=listGrades");
            } else {
                echo "Error creating grade.";
            }
        } else {
            echo "Invalid grade. Only grades 1 to 6 are allowed.";
        }
    }
}
?>
