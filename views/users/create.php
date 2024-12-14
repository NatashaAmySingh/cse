<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Create User</title>
</head>
<body>
    <form method="POST" action="index.php?controller=user&action=createUser">
    <h1>Create User</h1>
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="Teacher">Teacher</option>
            <option value="Office Administrator">Office Administrator</option>
        </select><br>
        <button type="submit">Create User</button>
    </form>
    <style>
        body {
            background-image: url("/assets/image1.png");
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            font-family: Georgia, serif;
             color: #db5079;
            margin-bottom: 20px;
        }
        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #654321;
            font-family: Georgia, serif;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            border: 2px solid rgba(219, 80, 121, 0.5);

        }
        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #db5079;;
            font-family: Georgia, serif;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgba(219, 80, 121, 0.5);
        }
    </style>
</body>
</html>