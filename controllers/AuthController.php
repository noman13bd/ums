<?php
session_start();

class AuthController {
    public function login($username, $password) {
        // Dummy admin credentials for demonstration
        $adminUsername = 'admin';
        $adminPassword = 'admin123';

        if ($username === $adminUsername && $password === $adminPassword) {
            $_SESSION['admin'] = true;
            return true;
        }

        return false;
    }

    public function logout() {
        unset($_SESSION['admin']);
    }

    public function isAuthenticated() {
        return isset($_SESSION['admin']) && $_SESSION['admin'];
    }
}
?>
