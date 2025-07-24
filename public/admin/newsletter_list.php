<?php require_once "./templates/master_head.php" ?>
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
                    <h3 class="mb-0">Newsletter Subscripers List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Newsletter Subscripers List </li>
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
                        <h3 class="card-title">All Newsletter Subscripers</h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 10; $i++) : ?>     
                            <tr class="align-middle">
                                <td><?= $i + 1 ?></td>
                                <td> test<?= $i + 1 ?>@app.com</td>
                                <td>11-05-2025 12:10PM</td>
                            </tr>
                            <?php endfor;?>
                           
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


<?php require_once "./templates/master_footer.php" ?>
<!--begin::Javascript-->
<!-- Your script should be here..... -->
<!--end::Javascript-->
<?php require_once "./templates/page_close.php" ?>