<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enter Score</title>
</head>
<body>
    <h1>Enter Score for Student</h1>
    <form method="POST" action="index.php?controller=score&action=saveScore">
        <input type="hidden" name="student_id" value="<?= $studentId ?>">

        <label for="subject_id">Subject:</label>
        <select name="subject_id" required>
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['id'] ?>"><?= htmlspecialchars($subject['name']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="term_id">Term:</label>
        <select name="term_id" required>
            <?php foreach ($terms as $term): ?>
                <option value="<?= $term['id'] ?>"><?= htmlspecialchars($term['name']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="score">Score:</label>
        <input type="number" step="0.01" name="score" required><br>

        <button type="submit">Save Score</button>
    </form>
</body>
</html>