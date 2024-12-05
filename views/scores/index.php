<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Scores</title>
</head>
<body>
    <h1>Scores for Student</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Term</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $score): ?>
                <tr>
                    <td><?= htmlspecialchars($score['subject_name']) ?></td>
                    <td><?= htmlspecialchars($score['term_name']) ?></td>
                    <td><?= htmlspecialchars($score['score']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?controller=score&action=createForm&studentId=<?= $studentId ?>">Enter New Score</a>
</body>
</html>