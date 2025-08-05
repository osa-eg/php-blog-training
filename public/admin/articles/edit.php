<?php
require_once __DIR__ . "/../../../session.php";
require_once path("/classes/Article.php");
require_once path("/classes/Category.php");
require_once path("/classes/Writer.php");

use Classes\Article;
use Classes\Category;
use Classes\Writer;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\Exception;

$id = (int) $_GET['id'] ?? null;
if (!$id) {
    alert("Writer ID Not Presented!", false);
    header("Location:" . url('admin/articles'));
    exit;
} else {
    $article = new Article;
    $item = $article->getById($id);
    if (!$item) {
        alert("Article Not Found!", false);
        header("Location:" . url('admin/articles'));
        exit;
    }
}

$errors = [];
$category = new Category;
$categories = $category->getAll();
$category_ids = array_map(fn($item) => (int) $item['id'], $categories);

$writer = new Writer;
$writers = $writer->getAll();
$writer_ids = array_map(fn($item) => (int) $item['id'], $writers);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $titleValidator = Validator::stringType()->notOptional()->setName("Title")->length(1, 250)->check($_POST['title']);
    } catch (Exception $exception) {
        $errors['title'] = $exception->getMessage();
    }

    try {
        $durationValidator = Validator::intType()->notOptional()->setName("Duration")->between(1, 120)->check((int)$_POST['duration']);
    } catch (Exception $exception) {
        $errors['duration'] = $exception->getMessage();
    }

    try {
        $writerValidator = Validator::intType()->notOptional()->setName("Writer")->in($writer_ids)->positive()->check((int)$_POST['writer_id']);
    } catch (Exception $exception) {
        $errors['writer_id'] = $exception->getMessage();
    }

    try {
        $categoryValidator = Validator::intType()->notOptional()->setName("Category")->in($category_ids)->positive()->check((int) $_POST['category_id']);
    } catch (Exception $exception) {
        $errors['category_id'] = $exception->getMessage();
    }

    try {
        $descriptionValidator = Validator::stringType()->notOptional()->setName("Description")->length(1, 5000)->check($_POST['description']);
    } catch (Exception $exception) {
        $errors['description'] = $exception->getMessage();
    }


    try {
        $file = $_FILES['image'];
        $uploadedFile = $file['tmp_name'];
        if ($file['error'] === 0) {
            $imageValidator = Validator::image()->notOptional()->size('1KB', '2MB')->setName("Images")->validate($uploadedFile);
        }
    } catch (Exception $exception) {
        $errors['image'] = $exception->getMessage();
    }

    if (count($errors)) {
        alert("There are some invalid data, please correct it", false);
    } else {
        $title = clean_input($_POST['title']);
        $duration = clean_input($_POST['duration']);
        $writer_id = clean_input($_POST['writer_id']);
        $category_id = clean_input($_POST['category_id']);
        $description = clean_input($_POST['description']);
        $image_path = $item['image'];

        if ($uploadedFile) {
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $newName = uniqid('image_', true) . '.' . $extension;
            $target =  path("/public/uploads/$newName");

            if (!move_uploaded_file($file['tmp_name'], $target)) {
                $errors['image'] = "File not uploaded successfully!";
            } else {
                $image_path = "uploads/$newName";
            }
        }
        if (count($errors)) {
            alert("There are some invalid data, please correct it", false);
        } else {
            $article->update(id: $id ,title: $title, read_duration: $duration, writer_id: $writer_id, category_id: $category_id, description: $description, image: $image_path);
            alert("Article Updated Successfully!");
            header("Location:" . url('admin/articles'));
            exit;
        }
    }
}




?>

<!doctype html>
<html lang="en">

<!--begin::Head-->
<?php require_once path("/public/admin/templates/master_head.php"); ?>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <?php require_once path("/public/admin/templates/header.php") ?>
        <?php require_once path("/public/admin/templates/aside.php") ?>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <?php require_once path("/public/admin/templates/alert.php") ?>
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Add New Article</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= url('admin/articles') ?>">Articles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Article </li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!--begin::Quick Example-->
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Article Details</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Form-->
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title </label>
                                                    <input type="text" name="title" class="form-control" id="title" value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : $item['title']??"" ?>" />
                                                    <?= inputError($errors, 'title') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="duration" class="form-label">Read Duration </label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="duration" min="1" max="120" class="form-control" id="duration" aria-describedby="basic-addon2" value="<?= isset($_POST['duration']) ? htmlspecialchars($_POST['duration']) : $item['read_duration']??"" ?>">
                                                        <span class="input-group-text" id="basic-addon2">Minutes</span>
                                                    </div>
                                                    <?= inputError($errors, 'duration') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="writer_id" class="form-label">Writer </label>
                                                    <select name="writer_id" id="writer_id" class="form-control">
                                                        <option value="">Select Writer</option>
                                                        <?php foreach ($writers as $writer): ?>
                                                            <option value="<?= $writer['id'] ?>" <?= (isset($_POST['writer_id']) && $_POST['writer_id'] == $writer['id'] || $item['writer_id'] == $writer['id'] ) ? 'selected' : '' ?>>
                                                                <?= htmlspecialchars($writer['name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= inputError($errors, 'writer_id') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="category_id" class="form-label">Category </label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?= $category['id'] ?>" <?= (isset($_POST['category_id']) && $_POST['category_id'] == $category['id'] || $item['category_id'] == $category['id']) ? 'selected' : '' ?>>
                                                                <?= htmlspecialchars($category['name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= inputError($errors, 'category_id') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description </label>
                                            <textarea name="description" class="form-control" id="description" rows="3"><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : $item['description']??"" ?></textarea>
                                            <?= inputError($errors, 'description') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label d-block">Current Image</label>
                                            <img style="width:600px; height: 200px;" class="img-thumbnail" src="<?= url($item['image']) ?>" alt="">

                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="image" accept="image/*" />
                                            <?= inputError($errors, 'image') ?>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <!--end::Footer-->
                                </form>
                                <!--end::Form-->
                            </div>

                            <!--end::Container-->
                        </div>
                    </div>
                    <!--end::App Content-->
                </div>
            </div>
        </main>
        <!--end::App Main-->

        <?php require_once path("/public/admin/templates/master_footer.php") ?>
    </div>
    <!--begin::Javascript-->
    <?php require_once path("/public/admin/templates/scripts.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 350,
            });
        });
    </script>
</body>

</html>