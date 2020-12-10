<?php
session_start();

if (!isset($_SESSION["user"])) {
    $url = 'login.php';
    header("Location: $url");
    exit;
}

require 'functions.php';

$id = $_GET['id'];
$row = mysqli_query($db, "SELECT * FROM data WHERE id = $id");
$row = mysqli_fetch_assoc($row);

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
    <nav class="navbar navbar-expand-lg navbar-light bg-info mb-4 p-3">
        <div class="container">
            <a class="navbar-brand text-light" href="index.php">INFORMATIKA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a class="btn pr-3 pl-3 btn-light rounded-pill" href="logout.php">Logout</a>
                    <?php else : ?>
                        <a class="btn pr-3 pl-3 btn-light rounded-pill" href="login.php">Login</a>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <!--  NAVBAR END-->

    <!-- CONTENT START -->
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card shadow-sm p-2 bg-white rounded mt-3">
                    <h1 class="text-center mt-3">Ubah Data Mahasiswa</h1>
                    <div class="card-body">
                        <!-- FORM INPUT DATA -->
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <div class="form-group row">
                                <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" value="<?= $row['nim'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">NAMA</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $row['nama'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">E-MAIL</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= $row['email'] ?>">
                                </div>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-md btn-info float-right">Ubah Data</button>
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

if (isset($_POST['ubah'])) {

    if (ubah($_POST) > 0) {
        echo    "<script>
                Swal.fire('SUCCESS','Berhasil Ubah Data','success').then(function() {
                window.location = 'index.php';
                });;
                </script>";
    } else {
        // digunakan untuk menampilkan informasi error database
        echo mysqli_error($db);
    }
}


?>