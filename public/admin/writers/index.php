<?php
require_once __DIR__ . "/../../../session.php";


require_once path("/classes/Category.php");
require_once path("/classes/User.php");
$names = [
    'Ali',
    'Mohamed',
    'Ahmed',
    'Sayed',
    'Khaled',
    'Osama',
    'Hesham',
    'Nady',
    'Zaid',
    'Momen',
];

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
                            <h3 class="mb-0">Writers List</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Writers List </li>
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
                                <h3 class="card-title">All Writers</h3>
                                <a href="<?= url('admin/writers/create.php') ?>" class="btn btn-primary"> Add New Writer</a>
                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Job Title</th>
                                        <th>About</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                        <?php
                                        $firstName = $names[random_int(0, count($names) - 1)];
                                        $lastName = $names[random_int(0, count($names) - 1)];
                                        ?>
                                        <tr class="align-middle">
                                            <td><?= $i + 1 ?></td>
                                            <td> <?= "$firstName $lastName" ?></td>
                                            <td> Job <?= $i ?> title</td>
                                            <td> Lorem ipsum dolor sit amet consectetur.</td>

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