<?php
session_start();  // Start the session

// Destroy session and log the user out
session_unset();
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();