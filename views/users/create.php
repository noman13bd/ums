<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Menu</h1>
    <a href="/list">User List</a> | <a href="/logout">Logout</a>
    <h1>Create User</h1>
    <form action="/index.php?action=create" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
