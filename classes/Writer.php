<?php

namespace Classes;

require_once 'Database.php';

use Classes\Database;

class writer
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    // 1️⃣ Create - Insert a new writer
    public function create($name, $job_title, $about, $image)
    {
        $stmt = $this->conn->prepare("INSERT INTO writers (name,job_title,about,image) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $name, $job_title, $about, $image);
        return $stmt->execute();
    }

    // 2️⃣ Read - Get all writers
    public function getAll()
    {
        $result = $this->conn->query("SELECT * FROM writers ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // 3️⃣ Read - Get writer by ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT 
        writers.*,
        COUNT(articles.id) as articles_count
        FROM writers 
        LEFT JOIN articles ON writers.id = articles.writer_id
        WHERE writers.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // 4️⃣ Update - Update a writer's info
    public function update($id, $name, $job_title, $about, $image)
    {
        $stmt = $this->conn->prepare("UPDATE writers SET name = ? , job_title = ? , about = ? ,image = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $job_title, $about, $image, $id);
        return $stmt->execute();
    }


    // 5️⃣ Delete - Remove a writer
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM writers WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
