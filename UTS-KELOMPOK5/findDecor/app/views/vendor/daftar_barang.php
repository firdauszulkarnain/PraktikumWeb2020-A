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
                        <p class="font">Daftar Barang Vendor</p>
                        <hr class="mt-n2">
                        <div class="vendor">
                            <a href="<?= BASE_URL ?>vendor/tambah_barang" class="btn btn-sm tombol mb-3 p-2">TAMBAH BARANG</a>
                            <div class="row">
                                <?php foreach ($data['barang'] as $br) : ?>
                                    <div class="col-lg-4 mb-4">
                                        <div class="card mx-auto mb-3">
                                            <img src="<?= URL_IMG ?>barang/<?= $br['foto']; ?>" class="card-img-top border-dark border-bottom" alt="...">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5 class="card-title font-weight-bold mt-2"><?= $br['nama_barang']; ?></h5>
                                                        <p class="card-text">Rp. <?= number_format($br['harga_barang'], 0, ".", "."); ?></p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="<?= BASE_URL ?>vendor/detail_barang/<?= $br['id_barang'] ?>" class="btn btn-block tombol">DETAIL</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;  ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>