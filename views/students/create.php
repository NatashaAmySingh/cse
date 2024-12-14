<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Student</title>
    <style>
        body {
            font-family: Georgia, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #db5079;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
            color: #333;
            text-align: left;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #db5079;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #db5079;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c0486a;
        }
    </style>
</head>
<body>
    <form method="POST" action="index.php?controller=student&action=createStudent">
    <h1>Create Student</h1>
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