<!-- CONTENT START -->
<section class="content mb-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-2 mt-5">
                <div class="vendor">
                    <ul class="nav">
                        <?php include 'sidebar.php' ?>
                    </ul>
                </div>
            </div>
            <div class="user-content col-lg-10">
                <div class="card mt-5 p-3 mb-5">
                    <div class="container">
                        <p class="font">VENDOR SAYA</p>
                        <hr class="mt-n2">
                        <form action="<?= BASE_URL; ?>vendor/update_profil" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4 mt-5">
                                    <div class="card warna mb-3 p-2">
                                        <img src="assets/img/logovendor/<?= $data['user']['foto_vendor']; ?>" class="rounded-circle mx-auto border border-white" width="90%">
                                        <div class="form-group">
                                            <input type="file" class="form-control-file mt-3 border border-light" name="foto" value="<?= $data['user']['foto_vendor']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <div class="form-group">
                                        <label for="vendor">Nama Vendor</label>
                                        <input type="text" class="form-control" id="vendor" name="vendor" value="<?= $data['user']['nama_vendor'] ?>" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="notelp">No. Telp</label>
                                        <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $data['user']['notelp'] ?>" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['user']['alamat'] ?>" autocomplete="off">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 pr-2">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $data['user']['kecamatan'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 pl-2">
                                            <div class="form-group">
                                                <label for="kabupaten">Kabupaten</label>
                                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $data['user']['kabupaten'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-center">REKENING BANK</p>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="bca">BCA</label>
                                                <input type="text" class="form-control" id="bca" name="bca" value="<?= $data['user']['bca'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="bni">BNI</label>
                                                <input type="text" class="form-control" id="bni" name="bni" value="<?= $data['user']['bni'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="bri">BRI</label>
                                                <input type="text" class="form-control" id="bri" name="bri" value="<?= $data['user']['bri'] ?>" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi"><?= $data['user']['deskripsi_vendor'] ?></textarea>
                                    </div>
                                    <button type="submit" name="setvendor" class="btn btn-md tombol mb-3 float-right">SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--  -->