<?php 
require_once __DIR__."/../../../session.php";


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
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Categories List</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categories List </li>
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
                                <a href="<?= url('admin/categories/create.php')?>" class="btn btn-primary"> Add New Category</a>
                            </div>
                        

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($categories as $category) : ?>     
                                    <tr class="align-middle">
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td><?= date('Y-m-d H:i A',strtotime($category['created_at']) )?></td>
                                    
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-info btn-sm"> 
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                
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
