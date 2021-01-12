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
                        <p class="font">Detail Pesanan</p>
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
                                                        <th><?= $data['pesan']['nama_customer']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>No. Telepon</th>
                                                        <th><?= $data['pesan']['notelp']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <th><?= $data['pesan']['alamat_kirim']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kabupaten</th>
                                                        <th><?= $data['pesan']['kab_kirim']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kecamatan</th>
                                                        <th><?= $data['pesan']['kec_kirim']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Via Pembayaran</th>
                                                        <th class="text-uppercase"><?= $data['pesan']['bank']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Catatan</th>
                                                        <th><?= $data['pesan']['catatan']; ?></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= BASE_URL ?>vendor/pesanan" class="btn btn-md tombol mb-3">KEMBALI</a>
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
                                                            <th><?= $data['pesan']['tgl_pesan']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th><?= $data['pesan']['status_pesanan']; ?></th>
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
                                                        <th>Harga</th>
                                                    </thead>
                                                    <tbody class="mt-n2">
                                                        <tr>
                                                            <td>
                                                                <?= $data['pesan']['nama_barang']; ?>
                                                            </td>
                                                            <td>
                                                                Rp. <?= number_format($data['pesan']['total_harga'], 0, ".", "."); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>TOTAL</th>
                                                            <th>Rp. <?= number_format($data['pesan']['total_harga'], 0, ".", "."); ?></th>
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