<?php

namespace Classes;

require_once 'Database.php';

use Classes\Database;

class Article
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    // 1️⃣ Create - Insert a new article
    public function create(string $title, string $description, string $image, int $read_duration, int $category_id, int $writer_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO articles (title,description,image,read_duration,category_id,writer_id) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssiii", $title, $description, $image, $read_duration, $category_id, $writer_id);
        return $stmt->execute();
    }

    // 2️⃣ Read - Get all articles
    public function getAll(?int $category_id = null)
    {
        $statement = "
        SELECT 
            articles.*,
            writers.id as writer_id,
            writers.name as writer_name,
            writers.image as writer_image,
            writers.job_title as writer_job_title,
            writers.about as writer_about,
            categories.id as category_id,
            categories.name as category_name
        FROM articles 
        LEFT JOIN writers ON articles.writer_id = writers.id
        LEFT JOIN categories ON articles.category_id = categories.id
        ";

        if ($category_id) {
            $statement .= " WHERE articles.category_id = ?";
            $stmt = $this->conn->prepare($statement . " ORDER BY articles.id DESC");
            $stmt->bind_param("i", $category_id);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        $result = $this->conn->query($statement . "ORDER BY articles.id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // 3️⃣ Read - Get article by ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("
        SELECT 
            articles.*,
            writers.id as writer_id,
            writers.name as writer_name,
            writers.image as writer_image,
            writers.job_title as writer_job_title,
            writers.about as writer_about,
            categories.id as category_id,
            categories.name as category_name
        FROM articles 
        LEFT JOIN writers ON articles.writer_id = writers.id
        LEFT JOIN categories ON articles.category_id = categories.id
        WHERE articles.id = ? ");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // 4️⃣ Update - Update a article's info
    public function update(int $id, string $title, string $description, string $image, int $read_duration, int $category_id, int $writer_id)
    {
        $stmt = $this->conn->prepare("UPDATE articles SET title = ? , description = ? , image = ? ,read_duration = ? ,category_id = ? ,writer_id = ? WHERE id = ?");
        $stmt->bind_param("sssiiii", $title, $description, $image, $read_duration, $category_id, $writer_id, $id);
        return $stmt->execute();
    }


    // 5️⃣ Delete - Remove a article
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
