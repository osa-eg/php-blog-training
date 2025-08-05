<?php
require_once __DIR__ . "/../../../session.php";
require_once path("/classes/Writer.php");

use Classes\Writer;

$id = (int) $_GET['id'] ?? null;
if (!$id) {
    alert("Writer Not Presented!", false);
    header("Location:" . url('admin/writers'));
    exit;
} else {
    $writer = new Writer;
    $item = $writer->getById($id);
    if (!$item) {
        alert("Writer Not Found!", false);
        header("Location:" . url('admin/writers'));
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        if ($item['articles_count']) {
            alert("Category Can Not Be Deleted Because It Has Some Articles!", false);
            header("Location:" . url('admin/writers'));
            exit;
        }
        $writer->delete($item['id']);

        alert("Writer Deleted Successfully!");
        header("Location:" . url('admin/writers'));
        exit;
    } catch (Exception $exception) {
        $errors['name'] = $exception->getMessage();
        alert("Writer Not Deleted!");
    }
}
