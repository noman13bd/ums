<?php
require 'models/User.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function create($data) {
        return $this->userModel->create($data['username'], $data['email'], $data['password']);
    }

    public function list() {
        return $this->userModel->getAll();
    }

    public function update($id, $data) {
        return $this->userModel->update($id, $data['username'], $data['email'], $data['password'] ?? null);
    }

    public function delete($id) {
        return $this->userModel->delete($id);
    }

    public function getUserById($id) {
        return $this->userModel->getById($id);
    }
}
?>
