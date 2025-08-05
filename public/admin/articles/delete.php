<?php
require_once __DIR__ . "/../../../session.php";
require_once path("/classes/Article.php");

use Classes\Article;
use Respect\Validation\Exceptions\Exception;

$id = (int) $_GET['id'] ?? null;
if (!$id) {
    alert("Article Not Presented!", false);
    header("Location:" . url('admin/articles'));
    exit;
} else {
    $category = new Article;
    $item = $category->getById($id);
    if (!$item) {
        alert("Article Not Found!", false);
        header("Location:" . url('admin/articles'));
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $category->delete($item['id']);

        alert("Article Deleted Successfully!");
        header("Location:" . url('admin/articles'));
        exit;
    } catch (Exception $exception) {
        $errors['name'] = $exception->getMessage();
        alert("Article Not Deleted!");
    }
}


?>
