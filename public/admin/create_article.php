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
                    <h3 class="mb-0">Add New Article</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="./articles.php">Articles</a></li>
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
                        <form>
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title </label>
                                            <input type="text" class="form-control" id="title" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="duration" class="form-label">Read Duration </label>
                                            <div class="input-group mb-3">
                                                <input type="number" min="1" max="120" class="form-control" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2">Minuts</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="description" class="form-label">Description </label>
                                    <textarea class="form-control" id="description" rows="3"></textarea>
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


<?php require_once "./templates/master_footer.php" ?>
<!--begin::Javascript-->
<!-- Your script should be here..... -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
             height: 350,
        });
    });
</script>

<!--end::Javascript-->
<?php require_once "./templates/page_close.php" ?>