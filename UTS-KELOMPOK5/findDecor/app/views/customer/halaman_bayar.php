<!-- CONTENT START -->
<section class="content mb-5">
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
                        <p class="font">PEMBAYARAN BARANG</p>
                        <hr class="mt-n2">
                        <div class="row">
                            <div class="col-lg-7 mt-3">
                                <form action="<?= BASE_URL; ?>customer/bayar/<?= $data['bayar']['id_pesanan']; ?>" method="POST">
                                    <div class="form-group">
                                        <label for="atasnama">ATAS NAMA</label>
                                        <input type="text" class="form-control" id="atasnama" name="atasnama">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank">BANK Pembayaran</label>
                                        <select class="form-control" id="bank" name="bank">
                                            <option disabled selected>Pilih Bank</option>
                                            <option value="bca">BCA</option>
                                            <option value="bni">BNI</option>
                                            <option value="bri">BRI</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tglbayar">Tanggal Bayar</label>
                                        <input type="date" class="form-control" id="tglbayar" name="tglbayar">
                                    </div>
                                    <a href="<?= BASE_URL ?>customer/pembayaran" class="btn btn-md tombol mb-3 ">KEMBALI</a>
                                    <button type="submit" name="bayar" class="btn btn-md tombol mb-3 float-right">KIRIM</button>
                                </form>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border border-dark mb-3 mt-4 p-2">
                                    <div class="order">
                                        <p class="text-center">DETAIL PEMBELIAN</p>
                                        <hr class="mt-n2">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>Barang</th>
                                                    <th></th>
                                                    <th>Harga</th>
                                                </thead>
                                                <tbody class="mt-n2">
                                                    <tr>
                                                        <td>
                                                            <?= $data['bayar']['nama_barang']; ?>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            Rp. <?= number_format($data['bayar']['total_harga'], 0, ".", "."); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>TOTAL</th>
                                                        <td></td>
                                                        <td>Rp. <?= number_format($data['bayar']['total_harga'], 0, ".", "."); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card border border-dark mb-3 p-2">
                                    <p class="text-center">BCA</p>
                                    <hr class="mt-n2">
                                    <p class="text-center"><?= $data['bayar']['bca']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border border-dark mb-3 p-2">
                                    <p class="text-center">BNI</p>
                                    <hr class="mt-n2">
                                    <p class="text-center"><?= $data['bayar']['bni']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border border-dark mb-3 p-2">
                                    <p class="text-center">BRI</p>
                                    <hr class="mt-n2">
                                    <p class="text-center"><?= $data['bayar']['bri']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>