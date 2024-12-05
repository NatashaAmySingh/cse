<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Class</title>
</head>
<body>
    <h1>Create Class</h1>
    <form method="POST" action="index.php?controller=class&action=createClass">
        <label for="name">Class Name:</label>
        <input type="text" name="name" required><br>

        <label for="grade_id">Grade:</label>
        <select name="grade_id" required>
            <?php foreach ($grades as $grade): ?>
                <option value="<?= $grade['id'] ?>"><?= htmlspecialchars($grade['name']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Create Class</button>
    </form>
</body>
</html>