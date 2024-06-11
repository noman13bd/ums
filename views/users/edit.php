<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Menu</h1>
    <a href="/list">User List</a> | <a href="/logout">Logout</a>
    <h1>Edit User</h1>
    <form action="/index.php?action=edit&id=<?= htmlspecialchars($user['id']) ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <br>
        <label for="password">Password (leave blank to keep current password):</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
