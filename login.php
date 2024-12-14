<?php
session_start();  



if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css" />
    <title>Login Page</title>
</head>
<body class="login-form">
<div class="login-container">
    <h1>Records Mgmt System</h1>
    <form method="POST" action="login_process.php">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
        <a href="#" class="forgot-password">Forgot Password?</a>
        <br />
    </form>
    </div>
</body>
</html>