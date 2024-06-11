<?php
use PHPUnit\Framework\TestCase;

require 'db.php';
require 'models/User.php';

class UserTest extends TestCase {
    private $user;

    protected function setUp(): void {
        global $pdo;
        $this->user = new User($pdo);
    }

    public function testCreateUser() {
        $result = $this->user->create('testuser', 'test@example.com', 'password123');
        $this->assertTrue($result);
    }

    public function testGetAllUsers() {
        $users = $this->user->getAll();
        $this->assertIsArray($users);
    }

    public function testUpdateUser() {
        $result = $this->user->update(1, 'updateduser', 'updated@example.com', 'newpassword');
        $this->assertTrue($result);
    }

    public function testDeleteUser() {
        $result = $this->user->delete(1);
        $this->assertTrue($result);
    }
}
?>
