<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grade Management</title>
</head>
<body>
    <h1>Grade Management</h1>
    <a href="index.php?controller=grade&action=createForm">Create Grade</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grades as $grade): ?>
                <tr>
                    <td><?= $grade['id'] ?></td>
                    <td><?= htmlspecialchars($grade['name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>