<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management</title>
</head>
<body>
    <h1>Student Management</h1>
    <a href="index.php?controller=student&action=createForm">Create Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Class</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['class_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>