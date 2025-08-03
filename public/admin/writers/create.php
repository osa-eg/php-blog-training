<?php
require_once __DIR__ . "/../../../session.php";
require_once path("/classes/Writer.php");

use Classes\Writer;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\Exception;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $namevalidator = Validator::stringType()->notOptional()->setName("Name")->length(1, 100)->check($_POST['name']);
    } catch (Exception $exception) {
        $errors['name'] = $exception->getMessage();
    }

    try {
        $jobTitlevalidator = Validator::stringType()->notOptional()->setName("Job Title")->length(1, 100)->check($_POST['job_title']);
    } catch (Exception $exception) {
        $errors['job_title'] = $exception->getMessage();
    }

    try {
        $aboutValidator = Validator::stringType()->notOptional()->setName("About")->length(1, 100)->check($_POST['about']);
    } catch (Exception $exception) {
        $errors['about'] = $exception->getMessage();
    }

    try {
        $file = $_FILES['image'];
        $uploadedFile = $file['tmp_name'];
        if ($file['error'] === 0) {
            $imageValidator = Validator::image()->notOptional()->size('1KB', '2MB')->setName("Images")->validate($uploadedFile);
        } else {
            $errors['image'] = "Image is not optional!";
        }
    } catch (Exception $exception) {
        $errors['image'] = $exception->getMessage();
    }

    if (count($errors)) {
        alert("There are some invalid data, please correct it", false);
    } else {
        $name = clean_input($_POST['name']);
        $job_title = clean_input($_POST['job_title']);
        $about = clean_input($_POST['about']);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $newName = uniqid('image_', true) . '.' . $extension;
        $target =  path("/public/uploads/$newName");

        if (!move_uploaded_file($file['tmp_name'], $target)) {
            $errors['image'] = "File uploaded successfully!";
        } else {
            $writer = new Writer;
            $writer->create($name, $job_title, $about, "uploads/$newName");

            alert("Writer Created Successfully!");
            header("Location:" . url('admin/writers'));
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
                            <h3 class="mb-0">Add New Writer</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= url('admin/writers') ?>">Writers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Writer </li>
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
                        <div class="col-md-6">
                            <!--begin::Quick Example-->
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Writer Details</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Form-->
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">

                                    <!--begin::Body-->
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name </label>
                                            <input type="text" name="name" class="form-control" id="name" />
                                            <?= inputError($errors, 'name') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="job_title" class="form-label">Job Title </label>
                                            <input type="text" name="job_title" class="form-control" id="job_title" />
                                            <?= inputError($errors, 'job_title') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="about" class="form-label">About </label>
                                            <textarea class="form-control" name="about" id="about" rows="3"></textarea>
                                            <?= inputError($errors, 'about') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="image" />
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
        <!--end::App Main-->


        <?php require_once path("/public/admin/templates/master_footer.php") ?>
    </div>
    <!--begin::Javascript-->
    <?php require_once path("/public/admin/templates/scripts.php") ?>

    <!-- Your script should be here..... -->
</body>
<!--end::Body-->

</html>