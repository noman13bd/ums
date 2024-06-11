<?php
require 'db.php';
require 'controllers/UserController.php';
require 'controllers/AuthController.php';

$auth = new AuthController();
$userController = new UserController($pdo);

if (!$auth->isAuthenticated()) {
    // Show login form
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        if ($auth->login($_POST['username'], $_POST['password'])) {
            header('Location: /index.php');
        } else {
            echo 'Invalid credentials';
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <h1>Login</h1>
        <form action="/index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit" name="login">Login</button>
        </form>
    </body>
    </html>

    <?php
    exit;
}

// Handle actions
$action = $_GET['action'] ?? '';
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->create($_POST);
            header('Location: /index.php?action=list');
        } else {
            include 'views/users/create.php';
        }
        break;

    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->update($id, $_POST);
            header('Location: /index.php?action=list');
        } else {
            $user = $userController->getUserById($id);
            include 'views/users/edit.php';
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $userController->delete($id);
        header('Location: /index.php?action=list');
        break;

    case 'list':
    default:
        $users = $userController->list();
        include 'views/users/list.php';
        break;

    case 'logout':
        $auth->logout();
        header('Location: /index.php?action=list');
        break;
}
?>
