<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Student</title>
</head>
<body>
    <h1>Create Student</h1>
    <form method="POST" action="index.php?controller=student&action=createStudent">
        <label for="name">Student Name:</label>
        <input type="text" name="name" required><br>


        <label for="class_id">Class:</label>
        <select name="class_id" required>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['name']) ?> (Grade: <?= $class['grade_name'] ?>)</option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Create Student</button>
    </form>
</body>
</html>