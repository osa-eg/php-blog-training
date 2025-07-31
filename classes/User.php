<?php
namespace Classes;

require_once 'Database.php';
use Classes\Database;

class User
{
    private $conn;

    public function __construct()
    {
        // Database::getInstance() = $instance
        $this->conn = Database::getInstance()->getConnection();
    }

    // 1️⃣ Create - Insert a new user
    public function createAdminUser()
    {
        $password = password_hash("secret", PASSWORD_DEFAULT);
        $name = "Super Admin";
        $email = "admin@app.com";
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?,?)");
        $stmt->bind_param("sss", $name , $email , $password );
        return $stmt->execute();
    }
    
    
    // 1️⃣ Create - Insert a new user
    public function create($name, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }

    // 2️⃣ Read - Get all users
    public function getAll()
    {
        $result = $this->conn->query("SELECT * FROM users ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // 3️⃣ Read - Get user by ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    // 3️⃣ Read - Get user by ID
    public function getByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // 4️⃣ Update - Update a user's info
    public function update($id, $name, $email)
    {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    // 5️⃣ Delete - Remove a user
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}