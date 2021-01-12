<!-- CONTENT START -->
<section class="content mb-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-2 mt-5">
                <div class="vendor">
                    <?php include 'sidebar.php' ?>
                </div>
            </div>
            <div class="user-content col-lg-10">
                <div class="card mt-5 p-3 mb-5">
                    <div class="container">
                        <p class="font">Detail Invoice</p>
                        <hr class="mt-n2">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card border border-dark mb-3 mt-4 p-4">
                                    <div class="order">
                                        <p class="text-center">DATA PEMBELI</p>
                                        <hr class="mt-n2">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-borderless">
                                                <tbody class="mt-n2">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Firdaus Zulkarnain</th>
                                                    </tr>
                                                    <tr>
                                                        <th>No. Telepon</th>
                                                        <th>08123456789</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <th>Jl. Kampus Unud Bukit Jimbaran</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kabupaten</th>
                                                        <th>Badung</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kecamatan</th>
                                                        <th>Kuta Selatan</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Via Pembayaran</th>
                                                        <th>BCA</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Catatan</th>
                                                        <th>Lebih cepat dalam pengiriman</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= BASE_URL ?>vendor/invoice" class="btn btn-md tombol">KEMBALI</a>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="card border border-dark mb-3 mt-4 p-3">
                                        <div class="order">
                                            <p class="text-center">DETAIL ORDER</p>
                                            <hr class="mt-n2">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-borderless">
                                                    <tbody class="mt-n2">
                                                        <tr>
                                                            <th>Tanggal Pemesanan</th>
                                                            <th>20-10-2020</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Tanggal Selesai</th>
                                                            <th>22-10-2020</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card border border-dark mb-3 pt-3 pl-4 pr-4">
                                        <div class="order">
                                            <p class="text-center">DETAIL BARANG DIBELI</p>
                                            <hr class="mt-n2">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-borderless">
                                                    <thead>
                                                        <th>Barang</th>
                                                        <th></th>
                                                        <th>Harga</th>
                                                    </thead>
                                                    <tbody class="mt-n2">
                                                        <tr>
                                                            <td>
                                                                Set Kursi
                                                            </td>
                                                            <td>x01</td>
                                                            <td>
                                                                Rp. 300.000
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>TOTAL</th>
                                                            <th></th>
                                                            <th>Rp. 300.000</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>