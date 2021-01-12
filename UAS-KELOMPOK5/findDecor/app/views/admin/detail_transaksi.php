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
                <li class="nav-item">
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
                <li class="nav-item ">
                    <a class="nav-link" href="<?= BASE_URL; ?>admin/data_vendor">
                        <i aria-hidden="true" class="fa fa-fw fa-list"></i>
                        List Vendor
                    </a>
                </li>
                <li class="nav-item active">
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
            <a href="<?= BASE_URL; ?>admin/data_transaksi">
                List Transaksi
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
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 mt-4">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title-sm">Data Transaksi</h4>
                            </div>
                            <div class="card-body">
                                <b>Nama Customer: Wina Artha</b>
                                <table class="table table-md mt-3">
                                    <tr class="text-center">
                                        <th colspan="2">Info Tanggal</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Pemesanan</th>
                                        <td>22-10-2020</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Pembayaran</th>
                                        <td>22-10-2020</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Selesai</th>
                                        <td>22-10-2020</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Kembali</th>
                                        <td>22-10-2020</td>
                                    </tr>
                                </table>

                                <a class="btn btn-secondary" href="<?= BASE_URL; ?>admin/data_transaksi">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

    </div>
</section>