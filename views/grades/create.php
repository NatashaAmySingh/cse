<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Grade</title>
</head>
<body>
    <h1>Create Grade</h1>
    <form method="POST" action="index.php?controller=grade&action=createGrade">
        <label for="name">Grade (1 to 6):</label>
        <select name="name" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br>
        <button type="submit">Create Grade</button>
    </form>
</body>
</html>