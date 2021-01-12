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
                <div class="tabel-content card mt-5 p-3 mb-5">
                    <div class="container">
                        <p class="font">DAFTAR INVOICE VENDOR</p>
                        <hr class="mt-n2">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th>Pembeli</th>
                                            <th scope="col">Barang</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Tanggal Pemesanan</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data['invoice'] as $iv) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $iv['nama']; ?></td>
                                                <td><?= $iv['nama_barang']; ?></td>
                                                <td>Rp. <?= number_format($iv['total_harga'], 0, ".", "."); ?></td>
                                                <td><?= $iv['tgl_pesan']; ?></td>
                                                <td><?= $iv['tgl_selesai']; ?></td>
                                                <td>
                                                    <!-- DETAIL INVOICE -->
                                                    <a href="<?= BASE_URL ?>vendor/detail_invoice" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-fw fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>