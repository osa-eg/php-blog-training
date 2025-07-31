<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?= url() ?>" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="<?= url("assets/admin/img/AdminLTELogo.png") ?>"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-columns"></i>
                        <p>Categories Management <i class="nav-arrow bi bi-chevron-right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url('admin/categories') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url('admin/categories/create.php') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Writers Management <i class="nav-arrow bi bi-chevron-right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url('admin/writers') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Writers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url('admin/writers/create.php') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New Writer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-substack"></i>
                        <p>Articles Management <i class="nav-arrow bi bi-chevron-right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url('admin/articles') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url('admin/articles/create.php') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New Article</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= url('admin/contact_us_messages.php') ?>" class="nav-link">
                        <i class="nav-icon bi bi-envelope-arrow-down-fill"></i>
                        <p>Contact Us Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= url('admin/newsletter_list.php') ?>" class="nav-link">
                        <i class="nav-icon bi bi-envelope-at"></i>
                        <p>Newsletter Subscripers</p>
                    </a>
                </li>




            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>