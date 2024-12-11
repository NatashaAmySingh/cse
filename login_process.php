<?php
session_start();  // Start the session

// Include the Database class to establish a connection
require_once 'config/database.php';

// Create a new database connection instance
$database = new Database();
$conn = $database->connect();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL to fetch the user from the database
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email );
    $stmt->execute();

    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, create session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // Redirect to the dashboard or home page
        header("Location: index.php");
        exit();
    } else {
        // Invalid login, display an error
        echo "Invalid username or password!";
    }
}
?>