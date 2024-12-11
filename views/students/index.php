<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management</title>
</head>
<body>
    <h1>Student Management</h1>

    <!-- Filter Form -->
    <form method="GET" action="index.php">
        <label for="class_filter">Filter by Class:</label>
        <select name="class_id" id="class_filter">
            <option value="">All Classes</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>" <?= isset($_GET['class_id']) && $_GET['class_id'] == $class['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <a href="index.php?controller=student&action=createForm">Create Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['class_name']) ?></td>
                    <td>
                        <a href="index.php?controller=student&action=view&id=<?= $student['id'] ?>">View Details</a> |
                        <a href="index.php?controller=score&action=listScores&studentId=<?= $student['id'] ?>">View Scores</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>