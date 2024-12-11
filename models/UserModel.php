<?php
require_once "config/database.php";

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Fetch all users
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new user
    // Update a user
    public function createUser($name, $email, $password, $role) {
    // Hash the password using PASSWORD_DEFAULT for future-proofing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
    
    // Prepare the statement
    $stmt = $this->conn->prepare($query);
    
    // Bind the parameters
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":role", $role);

    // Execute the query and return the result
    return $stmt->execute();
}
    public function updateUser($id, $name, $email, $role) {
        $query = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":role", $role);
        return $stmt->execute();
    }

    // Delete a user
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>