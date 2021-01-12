<section class="content mb-5">
    <div class="container">
        <h5 class="text-center mt-5">DAFTAR VENDOR</h5>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= BASE_URL; ?>vendor/simpan_vendor" method="POST">
                            <div class="form-group">
                                <label for="nama_vendor">Nama Vendor</label>
                                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" autocomplete="off" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kab">Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="kecamatan" class="form-control" id="kecamatan" name="kecamatan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat Vendor</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="bank">BANK</label>
                                    <select id="bank" class="form-control" name="bank" required>
                                        <option disabled selected>Choose...</option>
                                        <option value="bca">BCA</option>
                                        <option value="bri">BRI</option>
                                        <option value="bni">BNI</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="rekening">Rekening</label>
                                    <input type="text" class="form-control" id="rekening" name="rekening" required>
                                </div>
                            </div>
                            <button type="submit" name="setvendor" class="btn btn-md tombol mb-3 float-right">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>