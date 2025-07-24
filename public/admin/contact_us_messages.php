<?php require_once "./templates/master_head.php";

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
?>
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
                    <h3 class="mb-0">Contact Us Messages</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us Messages </li>
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
                        <h3 class="card-title">All Contact Us Messages</h3>
                    </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Subject</th>
                                <th>Created At</th>
                                <th>Message</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 10; $i++) : ?>
                                <?php
                                $firstName = $names[random_int(0, count($names) - 1)];
                                $lastName = $names[random_int(0, count($names) - 1)];
                                $email = $firstName . '_' . $lastName . "@gmail.com";
                                $phoneNumber = random_int(1000000000, 9999999999);

                                ?>
                                <tr class="align-middle">
                                    <td><?= $i + 1 ?></td>
                                    <td> <?= $firstName ?> </td>
                                    <td> <?= $lastName ?> </td>
                                    <td> <?= $email ?> </td>
                                    <td> <?= $phoneNumber ?> </td>
                                    <td> Lorem ipsum dolor</td>
                                    <td>11-05-2025 12:10PM</td>
                                    <td style="width:360px"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio et commodi quidem autem delectus pariatur nobis . </td>

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


<?php require_once "./templates/master_footer.php" ?>
<!--begin::Javascript-->
<!-- Your script should be here..... -->
<!--end::Javascript-->
<?php require_once "./templates/page_close.php" ?>