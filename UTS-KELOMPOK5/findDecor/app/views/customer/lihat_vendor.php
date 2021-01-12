<div class="container mt-3 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4 offset-sm-3">
            <img src="<?= URL_IMG ?>logovendor/<?= $data['vendor']['foto_vendor'] ?>" alt="" width="70%">
        </div>
        <div class="col-sm-5">
            <div class="keterangan">
                <h4 class="mt-5"><?= $data['vendor']['nama_vendor']; ?></h4>
                <p><?= $data['vendor']['notelp']; ?></p>
                <p class="mt-n3"><?= $data['vendor']['alamat']; ?></p>
            </div>
        </div>
    </div>
    <hr class="mb-3">
</div>



<!-- Toko Start -->
<section class="vendor mb-5 ml-2">
    <div class="container">
        <h4 class="sub-tittle text-center mb-4">Produk</h4>
        <div class="row d-flex justify-content-center">
            <?php foreach ($data['barang'] as $br) : ?>
                <div class="col-lg-3 mb-4">
                    <div class="card mx-auto mb-3 ">
                        <img src="<?= URL_IMG ?>barang/<?= $br['foto']; ?>" class="card-img-top border-dark border-bottom" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title font-weight-bold"><?= $br['nama_barang'] ?></h5>
                                    <p class="card-text mt-n2 mb-3">Rp. <?= number_format($br['harga_barang'], 0, ".", "."); ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <a href="<?= BASE_URL ?>customer/sewa_barang/<?= $br['id_barang'] ?>" class="btn btn-block tombol">DETAIL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- END TOKO -->