<?php
require_once __DIR__ . "/../../../session.php";


require_once path("/classes/Category.php");

use Classes\Category;

$category = new Category;
$categories = $category->getAll();


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
                                <form>
                                    <!--begin::Body-->
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name </label>
                                            <input type="text" class="form-control" id="name" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="job_title" class="form-label">Job Title </label>
                                            <input type="text" class="form-control" id="job_title" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="about" class="form-label">About </label>
                                            <textarea class="form-control" id="about" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="image" />
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