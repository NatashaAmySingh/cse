<!DOCTYPE html>
<html lang="en">
<head>
    <title>Class Management</title>
</head>
<body>
    <h1>Class Management</h1>
    <a href="index.php?controller=class&action=createForm">Create Class</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $class): ?>
                <tr>
                    <td><?= $class['id'] ?></td>
                    <td><?= htmlspecialchars($class['name']) ?></td>
                    <td><?= htmlspecialchars($class['grade_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>