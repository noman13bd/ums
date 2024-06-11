<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($username, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        return $stmt->execute([$username, $email, $hash]);
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT id, username, email FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $username, $email, $password = null) {
        if ($password) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->pdo->prepare('UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?');
            return $stmt->execute([$username, $email, $hash, $id]);
        } else {
            $stmt = $this->pdo->prepare('UPDATE users SET username = ?, email = ? WHERE id = ?');
            return $stmt->execute([$username, $email, $id]);
        }
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
?>
