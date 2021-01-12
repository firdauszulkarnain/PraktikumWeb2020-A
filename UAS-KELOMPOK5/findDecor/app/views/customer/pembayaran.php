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
                        <p class="font">DAFTAR PEMBAYARAN SAYA</p>
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
                                            <th>Alamat Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data['bayar'] as $byr) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $byr['nama_barang']; ?></td>
                                                <td><?= $byr['nama_vendor']; ?></td>
                                                <td>Rp. <?= number_format($byr['total_harga'], 0, ".", "."); ?></td>
                                                <td>
                                                    <?= $byr['alamat_kirim'] ?> <span class="badge badge-secondary pt-1 pb-1"><?= $byr['kec_kirim'] ?></span>
                                                    <span class="badge badge-dark pt-1 pb-1"><?= $byr['kab_kirim'] ?></span>
                                                </td>
                                                <td>
                                                    <!-- BAYAR -->
                                                    <a href="<?= BASE_URL ?>customer/halaman_bayar/<?= $byr['id_pesanan']; ?>" class="btn btn-warning btn-sm">
                                                        BAYAR
                                                    </a>
                                                    <!-- BAYAR -->
                                                    <a href="<?= BASE_URL ?>customer/hapus_pesanan/<?= $byr['id_pesanan']; ?>" class="btn btn-danger btn-sm">
                                                        X
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