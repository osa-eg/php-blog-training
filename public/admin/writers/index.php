<?php
require_once __DIR__ . "/../../../session.php";


require_once path("/classes/Writer.php");

use Classes\Writer;

$writer = new Writer;
$writers = $writer->getAll();


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
                                        <th>Writer</th>
                                        <th>About</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach ($writers as $writer) : ?>
                                        <tr class="align-middle">
                                            <td><?= $writer['id'] ?></td>
                                            <td> 
                                                <div class="d-flex">
                                                    <img width="50" height="50" class="img-thumbnail rounded-circle"  src="<?= url($writer['image']) ?>" alt="">
                                                    <div class="p-2">
                                                        <span class="d-block"><?= $writer['name'] ?></span>
                                                        <small><?= $writer['job_title'] ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $writer['about'] ?></td>
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
                                    <?php endforeach; ?>

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