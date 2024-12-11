<?php
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from session or database
$userName = $_SESSION['email']; // or fetch user details from the database if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
   
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Georgia, 'Times New Roman', Times;
        background-color: #f4f7fc;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }


    .dashboard-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 700px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .dashboard-container:hover {
        transform: translateY(-5px);
    }

  
    .dashboard-container h1 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #db5079;
    }
   
    .link-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 30px;
    }

   
    .link-container a {
        display: inline-block;
        padding: 18px 30px;
        background-color: #fff;
        color:  #db5079;
        text-decoration: none;
        border-radius: 8px;
        border-color: #0056b3;
        font-size: 1.4rem;
        font-weight: 500;
        box-shadow: 0 4px 6px rgba(219, 80, 121, 0.5);
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .link-container a:hover {
        background-color: rgba(219, 80, 121, 0.5);
        transform: translateY(-2px);
    }

    .link-container a:active {
        transform: translateY(0);
    }


    .card {
        margin-top: 25px;
        background-color:#db5079;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

   
    @media (max-width: 768px) {
        .dashboard-container {
            width: 90%;
            padding: 30px;
        }

        .link-container a {
            font-size: 1.1rem;
            padding: 15px 25px;
        }

        .card {
            padding: 15px;
        }
    }
</style>
</head>
<body>
    <div class="dashboard-container">
        <h1 class="heading">Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
        <div class="link-container">
            <a href="index.php">Students</a>
            <a href="index.php">Users</a>
            <a href="logout.php">Logout</a>
        </div>


</body>
</html>