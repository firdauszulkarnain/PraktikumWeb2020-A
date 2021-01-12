<!-- CONTENT START -->
<section class="customer-content content mb-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-2 mt-5">
                <div class="menu">
                    <ul class="nav mt-3">
                        <?php include "sidebar.php" ?>
                    </ul>
                </div>
            </div>
            <div class="user-content col-lg-10">
                <div class="tabel-content card mt-5 p-3 mb-5">
                    <div class="container">
                        <p class="font">DAFTAR PEMESANAN SAYA</p>
                        <hr class="mt-n2">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Barang</th>
                                            <td>Vendor</td>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Status Pesanan</th>
                                            <th scope="col">Tanggal Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data['pesan'] as $psn) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $psn['nama_barang']; ?></td>
                                                <td><?= $psn['nama_vendor']; ?></td>
                                                <td>Rp. <?= number_format($psn['total_harga'], 0, ".", "."); ?></td>
                                                <td><?= $psn['status_pesanan']; ?></td>
                                                <td><?= $psn['tgl_pesan']; ?></td>
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