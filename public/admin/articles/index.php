<?php
require_once __DIR__ . "/../../../session.php";


require_once path("/classes/Category.php");
require_once path("/classes/User.php");

use Classes\Category;
use Classes\User;

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
            <?php require_once path("/public/admin/templates/alert.php") ?>
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Articles List</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Articles List </li>
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


                    <div class="card mb-4">
                        <div class="card-header ">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">All Categories</h3>
                                <a href="./create_category.php" class="btn btn-primary"> Add New Article</a>
                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th> Title</th>
                                        <th> Category</th>
                                        <th> Wrtier </th>
                                        <th> Read Duration </th>
                                        <th> Created At </th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                        <tr class="align-middle">
                                            <td><?= $i + 1 ?></td>
                                            <td>Title <?= $i + 1 ?></td>
                                            <td>Category <?= $i + 1 ?> Name</td>
                                            <td>Writer <?= $i + 1 ?> Name</td>
                                            <td> <?= random_int(3, 13) ?> Min</td>
                                            <td>11-05-2025 12:10PM</td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="" class="btn btn-info btn-sm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
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