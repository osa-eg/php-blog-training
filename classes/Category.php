<?php
namespace Classes;

require_once 'Database.php';
use Classes\Database;

class Category
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    // 1️⃣ Create - Insert a new category
    public function create($name)
    {
        $stmt = $this->conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    // 2️⃣ Read - Get all categorys
    public function getAll()
    {
        $result = $this->conn->query("SELECT * FROM categories ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // 3️⃣ Read - Get category by ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT 
        categories.*,
        COUNT(articles.id) as articles_count
        FROM categories 
        LEFT JOIN articles ON categories.id = articles.category_id
        WHERE categories.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

     // 4️⃣ Update - Update a category's info
    public function update($id, $name)
    {
        $stmt = $this->conn->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }


    // 5️⃣ Delete - Remove a category
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}