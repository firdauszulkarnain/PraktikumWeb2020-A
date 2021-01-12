<!-- CONTENT START -->
<section class="wrapper">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= BASE_URL ?>">
                    findDecor
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/admin">
                        <i aria-hidden="true" class="fa fa-fw fa-desktop"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/profil_admin">
                        <i aria-hidden="true" class="fa fa-fw fa-user"></i>
                        User profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/data_customer">
                        <i aria-hidden="true" class="fa fa-fw fa-bars"></i>
                        List Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/data_vendor">
                        <i aria-hidden="true" class="fa fa-fw fa-list"></i>
                        List Vendor
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/data_transaksi">
                        <i aria-hidden="true" class="fa fa-fw fa-shopping-basket"></i>
                        List Transaksi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/daftar_barang">
                        <i aria-hidden="true" class="fa fa-fw fa-truck"></i>
                        Daftar Barang
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Start Main Content -->
    <div class="main">
        <!-- Start Navbar -->
        <div class="navbar navbar-admin">
            <a href="<?= BASE_URL; ?>admin">
                Dashboard
            </a>
            <a href="<?= BASE_URL; ?>auth/logout">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i>
                Log out
            </a>
        </div>
        <!-- End Navbar -->

        <!-- Start Content -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <i aria-hidden="true" class="fa fa-users fa-4x"></i><br>
                                <!-- SQL TOTAL JUMLAH USER -->Customer
                            </div>
                            <div class="card-footer ">
                                <a href="<?= BASE_URL; ?>admin/data_customer">
                                    Lihat Data Customer
                                    <i aria-hidden="true" class="fa fa-arrow-circle-right fa-pull-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <i aria-hidden="true" class="fa fa-university fa-4x"></i><br>
                                <!-- SQL TOTAL JUMLAH VENDOR -->Vendor
                            </div>
                            <div class="card-footer ">
                                <a href="<?= BASE_URL; ?>admin/data_vendor">
                                    Lihat Data Vendor
                                    <i aria-hidden="true" class="fa fa-arrow-circle-right fa-pull-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <i aria-hidden="true" class="fa fa-shopping-cart fa-4x"></i><br>
                                <!-- SQL TOTAL JUMLAH VENDOR -->Transaksi
                            </div>
                            <div class="card-footer ">
                                <a href="<?= BASE_URL; ?>admin/data_transaksi">
                                    Lihat Transaksi
                                    <i aria-hidden="true" class="fa fa-arrow-circle-right fa-pull-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

    </div>
</section>