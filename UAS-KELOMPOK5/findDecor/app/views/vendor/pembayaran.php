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
                        <p class="font">DAFTAR PEMBAYARAN BARANG</p>
                        <hr class="mt-n2">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th>A/N</th>
                                            <th scope="col">BANK</th>
                                            <th>Subtotoal</th>
                                            <th scope="col">Tanggal-Jam</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data['bayar'] as $byr) :
                                        ?>
                                            <tr>
                                                <form action="<?= BASE_URL; ?>vendor/update_pembayaran/<?= $byr['id_pesanan']; ?>" method="POST">
                                                    <input type="hidden" name="status" value="Dikonfirmasi">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $byr['atas_nama']; ?></td>
                                                    <td class="text-uppercase"><?= $byr['bank']; ?></td>
                                                    <td>Rp. <?= number_format($byr['total_harga'], 0, ".", "."); ?></td>
                                                    <td><?= $byr['tgl_bayar']; ?></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-danger btn-sm" name="setkonfirmasi">
                                                            Konfirmasi
                                                        </button>
                                                    </td>
                                                </form>
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