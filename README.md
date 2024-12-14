Project Overview
This PHP web application manages a primary school system using the Model-View-Controller (MVC) architecture. It allows users with different roles (admin, teacher, office administrator) to manage school data such as students, grades, classes, subjects, and scores. The application also generates student report cards and average performance reports.

Features
User and Role Management: Allows admins to manage users (teachers, office administrators) and assign roles.
Grade Management: Manages predefined grades (1-6).
Class Management: Allows creation and management of classes tied to specific grades.
Student Management: Students can be assigned to specific classes.
Subject Management: Subjects are shared across all classes in a grade.
Score Management: Teachers can manage scores for students, with scores tied to subjects and recorded for each term.
School Year and Term Management: Manages school years and terms to ensure correct score recording.
Reports: Generates student report cards and average performance reports by grade and subject.
Installation Instructions
Prerequisites
XAMPP: Ensure that XAMPP is installed on your system, as the application is developed to run on a local Apache server with MySQL.
Download XAMPP from: https://www.apachefriends.org/index.html
Install and configure XAMPP (Apache and MySQL services should be running).
Setup Steps
Download and Extract Files

Download the sms.zip file and extract it to your htdocs directory inside your XAMPP installation folder (e.g., C:\xampp\htdocs\).
Database Setup

Open phpMyAdmin (usually accessible at http://localhost/phpmyadmin/).
Create a new database, for example, school_management_system.
Import the SQL file database.sql provided in the sms.zip folder.
Go to the Import tab in phpMyAdmin.
Choose the database.sql file from the sms.zip folder and click Go.
Ensure that the database contains the necessary tables for users, grades, classes, students, subjects, scores, etc.
Configuration

Open the config/database.php file.
Modify the database connection settings (username, password, database name) if necessary to match your local environment.
php
Copy code
<?php
class Database {
    private $host = "localhost";
    private $db_name = "school_management_system"; // Your database name here
    private $username = "root"; // Default XAMPP username
    private $password = ""; // Default XAMPP password is empty
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
Running the Application

Start the Apache and MySQL services in XAMPP.

Open your browser and go to http://localhost/sms/ to access the application.

You should see the main page of the school management system.

Application Workflow
Login Page: Users (admin, teacher, office administrator) can log in using their credentials.
Admin Dashboard: Admins can manage users (add, update, delete) and assign roles.
Teacher Dashboard: Teachers can manage students' scores by subject and term.
Office Admin Dashboard: Office administrators have access to manage students, grades, and classes.
Reports: Admins and teachers can generate student report cards and view average performance reports by grade.
Security Considerations
Input Validation and Sanitization: The application includes measures to sanitize and validate user input to prevent SQL injection and XSS attacks.
Session Management: Proper session management has been implemented to handle user logins and access control.
Known Issues
Browser Compatibility: The application is optimized for modern browsers. Older browsers may experience rendering issues.
Mobile Responsiveness: The UI is designed for desktop use, and mobile responsiveness may require further adjustments.
Contributing
If you'd like to contribute to the project, please fork the repository and submit a pull request. Ensure that all code adheres to the project's coding standards and conventions.

Credits
This project was developed by the following team members:

Natasha Singh USI: 1043692
Zoloni Chase USI: 1042755
Ray-Anna Liverpool USI: 1044823
Eddie Bobb USI: 1045055
Travis Sertimer USI: 1043298
Jaheim Joseph USI: 1045231
Dexter Rogers USI: 1011039

Video Demonstration
You can view a demonstration of the application at the following link: [Link to YouTube Video]
Contact

For any questions or support, please contact natashasingh1716@gmail.com or refer to the project documentation.

