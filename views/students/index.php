<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/students.css" />
    <title>Student Management</title>
</head>
<body>
    <h1>Student Management</h1>

   
<form id="filterForm">
    <label for="grade_filter">Filter by Grade:</label>
    <select name="grade_id" id="grade_filter">
        <option value="">All Grades</option>
        <?php foreach ($grades as $grade): ?>
            <option value="<?= $grade['id'] ?>" 
                <?= isset($_GET['grade_id']) && $_GET['grade_id'] == $grade['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($grade['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="button" onclick="filterByGrade()">Filter</button>
</form>

<script>
    function filterByGrade() {
        var gradeId = document.getElementById("grade_filter").value; // Get the selected grade ID
        var url = "index.php?controller=student&action=listStudents"; // Base URL for filtering students

        // Append grade_id as a query parameter if it's selected
        if (gradeId) {
            url += "&grade_id=" + gradeId;
        }

        // Redirect to the new URL
        window.location.href = url;
    }
</script>

    <a href="index.php?controller=student&action=createForm">Create Student</a>
    <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Grade</th> <!-- Added Grade column -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['class_name']) ?></td>
                <td><?= htmlspecialchars($student['grade']) ?></td> <!-- Display Grade -->
                <td>
                    <a href="index.php?controller=report&action=studentReportCard&student_id=<?= $student['id'] ?>&term=1">View Report Card</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>