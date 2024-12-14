<?php
require_once "config/database.php";

class StudentModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Fetch all students with their class name
    public function getAllStudents() {
        $query = "
            SELECT students.id, students.name, classes.name AS class_name 
            FROM students 
            JOIN classes ON students.class_id = classes.id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch students in a specific class with class name
    public function getStudentsByClass($classId) {
    $query = "
        SELECT students.id, students.name, classes.name AS class_name, grades.name AS grade
        FROM students
        JOIN classes ON students.class_id = classes.id
        LEFT JOIN grades ON classes.grade_id = grades.id
    ";

    // Add condition if class_id is provided
    if ($classId) {
        $query .= " WHERE students.class_id = :class_id";
    }

    $stmt = $this->conn->prepare($query);

    // Bind class_id parameter if provided
    if ($classId) {
        $stmt->bindParam(":class_id", $classId);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Create a new student
    public function createStudent($name, $dob, $gender, $classId) {
        $query = "INSERT INTO students (name, class_id) VALUES (:name, :class_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":class_id", $classId);
        return $stmt->execute();
    }

    /**
     * Get student details by ID.
     * 
     * @param int $studentId
     * @return array|null
     */
    public function getStudentById($studentId) {
        $query = $this->conn->prepare("SELECT * FROM students WHERE id = :id");
        $query->bindParam(':id', $studentId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getStudentsByGrade($gradeId) {
    $query = "
        SELECT students.id, students.name, classes.name AS class_name, grades.name AS grade
        FROM students
        JOIN classes ON students.class_id = classes.id
        LEFT JOIN grades ON classes.grade_id = grades.id
    ";

    // Add condition if grade_id is provided
    if ($gradeId) {
        $query .= " WHERE classes.grade_id = :grade_id";
    }

    $stmt = $this->conn->prepare($query);

    // Bind grade_id parameter if provided
    if ($gradeId) {
        $stmt->bindParam(":grade_id", $gradeId);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>