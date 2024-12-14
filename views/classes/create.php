<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Class</title>
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
    <form method="POST" action="index.php?controller=class&action=createClass">
    <h1>Create Class</h1>
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