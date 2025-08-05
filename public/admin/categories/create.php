<?php
require_once __DIR__ . "/../../../session.php";
require_once path("/classes/Category.php");

use Classes\Category;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\Exception;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $nameValidator = Validator::stringType()->notOptional()->setName("Name")->length(1, 200)->check($_POST['name']);
    } catch (Exception $exception) {
        $errors['name'] = $exception->getMessage();
    }

    if (count($errors)) {
        alert("There are some invalid data, please correct it", false);
    } else {
        $name = clean_input($_POST['name']);
        $category = new Category;
        $category->create($name);

        alert("Category Created Successfully!");        
        header("Location:" . url('admin/categories'));
        exit;
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
                            <h3 class="mb-0">Add New Category</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= url('admin/categories') ?>">Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Category </li>
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
                                    <div class="card-title">Category Details</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Form-->
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                                    <!--begin::Body-->
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Category Name </label>
                                            <input type="text" name="name" class="form-control" id="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
                                            <?= inputError($errors, 'name') ?>
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

    <!-- Your script should be here..... -->
</body>
<!--end::Body-->

</html>