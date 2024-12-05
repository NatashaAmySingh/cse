-- Create the database
CREATE DATABASE IF NOT EXISTS sms;
USE sms;

-- Table: users
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Teacher', 'Office Administrator') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table: grades
CREATE TABLE grades (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- Predefined grades (1 to 6)
INSERT INTO grades (name) VALUES ('Grade 1'), ('Grade 2'), ('Grade 3'), ('Grade 4'), ('Grade 5'), ('Grade 6');

-- Table: classes
CREATE TABLE classes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    grade_id INT UNSIGNED NOT NULL,
    UNIQUE (name, grade_id),
    FOREIGN KEY (grade_id) REFERENCES grades(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Sample classes
INSERT INTO classes (name, grade_id) VALUES 
('Class A', 1), ('Class B', 1),
('Class A', 2), ('Class B', 2);

-- Table: students
CREATE TABLE students (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    class_id INT UNSIGNED,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Sample students
INSERT INTO students (name, email, class_id) VALUES 
('John Doe', 'john.doe@example.com', 1),
('Jane Smith', 'jane.smith@example.com', 2);

-- Table: subjects
CREATE TABLE subjects (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- Sample subjects
INSERT INTO subjects (name) VALUES ('Mathematics'), ('Science'), ('English'), ('History');

-- Table: scores
CREATE TABLE scores (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id INT UNSIGNED NOT NULL,
    subject_id INT UNSIGNED NOT NULL,
    grade_id INT UNSIGNED NOT NULL,
    term ENUM('Term 1', 'Term 2', 'Term 3') NOT NULL,
    score DECIMAL(5, 2) NOT NULL CHECK (score BETWEEN 0 AND 100),
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
    FOREIGN KEY (grade_id) REFERENCES grades(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Sample scores
INSERT INTO scores (student_id, subject_id, grade_id, term, score) VALUES 
(1, 1, 1, 'Term 1', 85.50),
(1, 2, 1, 'Term 1', 90.00),
(2, 1, 1, 'Term 1', 78.00),
(2, 3, 1, 'Term 1', 88.00);

-- Table: school_years
CREATE TABLE school_years (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    year_start YEAR NOT NULL,
    year_end YEAR NOT NULL,
    UNIQUE (year_start, year_end)
) ENGINE=InnoDB;

-- Sample school years
INSERT INTO school_years (year_start, year_end) VALUES (2023, 2024), (2024, 2025);

-- Table: terms
CREATE TABLE terms (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name ENUM('Term 1', 'Term 2', 'Term 3') NOT NULL,
    year_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (year_id) REFERENCES school_years(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Sample terms
INSERT INTO terms (name, year_id) VALUES 
('Term 1', 1), ('Term 2', 1), ('Term 3', 1);


ALTER TABLE scores ADD COLUMN term_id INT UNSIGNED NOT NULL;
