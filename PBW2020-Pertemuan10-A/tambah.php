<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- MY CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- SWEET ALERT JS -->
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <link href='assets/img/favicon.ico' rel='shortcut icon'>
    <title>Tambah Data</title>
</head>

<body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info mb-5 p-3">
        <div class="container">
            <a class="navbar-brand text-light" href="index.php">INFORMATIKA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- CONTENT START -->
    <div class="container">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-8">
                <div class="card shadow-sm p-2 bg-white rounded">
                    <h1 class="text-center mt-3">Tambah Data Nilai</h1>
                    <div class="card-body">
                        <!-- FORM INPUT DATA -->
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nim" name="nim" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">NAMA</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="uts" class="col-sm-3 col-form-label">NILAI UTS</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="uts" name="uts" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="uas" class="col-sm-3 col-form-label">NILAI UAS</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="uas" name="uas" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-md btn-info float-right">Simpan Data</button>
                        </form>
                        <!-- END FORM -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->


    <!-- FOOTER START -->
    <div class="footer bg-info fixed-bottom">
        <div class="container">
            <!-- text-light agar text berwarna putih -->
            <p class="text-light text-center mt-3">&copy;FirdausZulkarnain</p>
        </div>
    </div>
    <!-- FOOTER END -->
</body>

</html>

<?php
// Hubungkan dengan file functions.php
require 'functions.php';
// Jika tombol dengan name = simpan di klik
if (isset($_POST['simpan'])) {
    // jika function tambah mengembalikan nilai lebih dari 0
    if (tambah($_POST) > 0) {
        // Tampilkan Alert
        echo "
        <script>
        Swal.fire('Berhasil Tambah Data','','success').then(function() {
            window.location = 'index.php';
        });
    </script>";
    }
}
?>