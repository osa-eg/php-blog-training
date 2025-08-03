<?php
require_once __DIR__ . "/../../../session.php";
require_once path("/classes/Category.php");

use Classes\Category;
use Respect\Validation\Exceptions\Exception;

$id = (int) $_GET['id'] ?? null;
if (!$id) {
    alert("Category Not Presented!", false);
    header("Location:" . url('admin/categories'));
    exit;
} else {
    $category = new Category;
    $item = $category->getById($id);
    if (!$item) {
        alert("Category Not Found!", false);
        header("Location:" . url('admin/categories'));
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $category->delete($item['id']);

        alert("Category Deleted Successfully!");
        header("Location:" . url('admin/categories'));
        exit;
    } catch (Exception $exception) {
        $errors['name'] = $exception->getMessage();
        alert("Category Not Deleted!");
    }
}


?>
