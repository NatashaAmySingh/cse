<?php
if ($_SESSION['role'] == 'Teacher') {
    header('Location: dashboard.php');

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="css/users.css" />
</head>
<body>
    <h1>User Management</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <a class="delete", href="index.php?controller=user&action=deleteUser&id=<?= $user['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a class="create-user", href="index.php?controller=user&action=createForm">Create User</a>
</body>                             
</html>