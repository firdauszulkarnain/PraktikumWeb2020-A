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
                        <p class="font">DAFTAR PESANAN VENDOR</p>
                        <hr class="mt-n2">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th>Pembeli</th>
                                            <th scope="col">Barang</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data['pesan'] as $ps) :
                                        ?>
                                            <tr>
                                                <form action="<?= BASE_URL; ?>vendor/update_pesanan/<?= $ps['id_pesanan']; ?>" method="POST">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $ps['nama_customer']; ?></td>
                                                    <td><?= $ps['nama_barang']; ?></td>
                                                    <td>Rp. <?= number_format($ps['total_harga'], 0, ".", "."); ?></td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" id="status" name="status">
                                                                <option disabled selected><?= $ps['status_pesanan']; ?></option>
                                                                <?php if ($ps['status_pesanan'] == 'Proses') : ?>
                                                                    <option value="Kirim">Kirim</option>
                                                                    <option value="Selesai">Selesai</option>
                                                                <?php elseif ($ps['status_pesanan'] == 'Kirim') : ?>
                                                                    <option value="Selesai">Selesai</option>
                                                                <?php else : ?>
                                                                    <option value="Proses">Proses</option>
                                                                    <option value="Kirim">Kirim</option>
                                                                    <option value="Selesai">Selesai</option>
                                                                <?php endif ?>
                                                            </select>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- DETAIL PESANAN -->
                                                        <a href="<?= BASE_URL ?>vendor/detail_pesanan/<?= $ps['id_pesanan']; ?>" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-fw fa-info-circle"></i>
                                                        </a>
                                                        <!-- SET STATUS -->
                                                        <button type="submit" class="btn btn-success btn-sm" name="setstatus">
                                                            SET
                                                        </button>
                                                    </td>
                                                </form>
                                            <?php endforeach; ?>
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

</section>