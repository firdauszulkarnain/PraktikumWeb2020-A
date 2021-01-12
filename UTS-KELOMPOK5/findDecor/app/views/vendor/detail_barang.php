<!-- CONTENT START -->
<section class="content mb-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-2 mt-5">
                <div class="vendor">
                    <ul class="nav mt-3">
                        <?php include 'sidebar.php' ?>
                    </ul>
                </div>
            </div>
            <div class="user-content col-lg-10">
                <div class="card mt-5 p-3 mb-5">
                    <div class="container">
                        <p class="font">Detail Barang</p>
                        <hr class="mt-n2">
                        <form action="<?= BASE_URL; ?>vendor/update_barang/<?= $data['barang']['id_barang'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-8 mt-3">

                                    <div class="form-group">
                                        <label for="namabrg">Nama Barang</label>
                                        <input type="text" class="form-control" id="namabrg" name="namabrg" value="<?= $data['barang']['nama_barang'] ?>" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga / Hari</label>
                                        <input type="text" class="form-control" id="harga" name="hargabrg" value="<?= $data['barang']['harga_barang'] ?>" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsibrg">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsibrg" rows="4" name="deskripsibrg"><?= $data['barang']['deskripsi_barang'] ?></textarea>
                                    </div>

                                </div>
                                <div class="col-lg-4 mt-5">
                                    <div class="card warna mb-3 p-2">
                                        <img src="<?= URL_IMG ?>barang/<?= $data['barang']['foto']; ?>" class="mx-auto border border-white" width="100%">
                                        <div class="form-group">
                                            <input type="file" class="form-control-file mt-3 border border-light" name="foto">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a href="<?= BASE_URL ?>vendor/daftar_barang" class="btn btn-md tombol">KEMBALI</a>
                            <a href="<?= BASE_URL ?>vendor/hapus_barang/<?= $data['barang']['id_barang'] ?>" class="btn btn-md tombol">HAPUS BARANG</a>
                            <button type="submit" name="ubahbarang" class="float-right btn btn-md tombol mb-3 ">UBAH</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>