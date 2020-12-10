<?php
// Mulai Session
session_start();

// Cek session apakah sudah login
if (!isset($_SESSION["user"])) {
    // kalo belum, login dulu
    $url = 'login.php';
    header("Location: $url");
    exit;
}

// hubungkan dengan file functions 
require 'functions.php';

// ambil data dan urutkan secara descending
$mahasiswa = mysqli_query($db, "SELECT * FROM data ORDER BY id DESC");
// hitung banyak data
$data = mysqli_num_rows($mahasiswa);

// ambil data user yang login
$id = $_SESSION['user'];
$user = mysqli_query($db, "SELECT * FROM user WHERE id = $id");
$user = mysqli_fetch_assoc($user);

// variabel untuk rolenya
$role = $user['role_id'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- MY CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <!-- SWEET ALERT JS -->
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <link href='assets/img/favicon.ico' rel='shortcut icon'>
    <title>Pertemuan 11</title>
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
    <div class="container mb-5">
        <h1 class="text-center">DATA MAHASISWA</h1>
        <!-- d-flex justify-content-center digunakan agar content berada di tengah -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-12">
                <!-- membuat card atau box putih dengan box shadow -->
                <div class="card shadow-sm p-2 bg-white rounded mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Role == 1, dimana 1 sama dengan admin -->
                                <!-- Maka untuk admin bisa tambah data -->
                                <?php if ($role == 1) : ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                                        Tambah Data Mahasiswa
                                    </button>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6">
                                <!-- KETERANGAN JABATAN -->
                                <!-- untuk admin -->
                                <?php if ($role == 1) : ?>
                                    <p class=" user float-right">User Admin: <?= $user['username']; ?></p>
                                    <!-- untuk pegawai -->
                                <?php elseif ($role == 2) : ?>
                                    <p class=" user float-right">User Pegawai: <?= $user['username']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Jika jumlah data kosong -->
                        <?php if ($data == 0) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Tidak Ada Data Yang Ditampilkan
                            </div>
                        <?php else : ?>
                            <!-- TABLE START -->
                            <div class="table-responsive">
                                <table class="table table-bordered mt-2">
                                    <!-- Judul -->
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Lakukan Perulangan sesuai banyaknya data -->
                                        <?php $i = 1;
                                        foreach ($mahasiswa as $row) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <th><?= $row["nama"]; ?></th>
                                                <td><?= $row['nim']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td>
                                                    <!-- Jika admin bisa ubah dan hapus -->
                                                    <?php if ($role == 1) : ?>
                                                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="badge badge-info">Ubah</a>
                                                        <a href="index.php?hapus=<?= $row["id"]; ?>" class="badge badge-danger" onclick=" return confirm ('Yakin Hapus Data?');">Hapus</a>
                                                        <!-- Jika pegawai bisa hapus saja -->
                                                    <?php elseif ($role == 2) : ?>
                                                        <a href="index.php?hapus=<?= $row["id"]; ?>" class="badge badge-danger" onclick=" return confirm ('Yakin Hapus Data?');">Hapus</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                    </tbody>
                                <?php $i++;
                                        endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- FOOTER START -->
    <div class="footer bg-info pb-3 pt-3">
        <div class="container">
            <!-- text-light agar text berwarna putih -->
            <p class="text-light text-center mt-3">&copy;FirdausZulkarnain</p>
        </div>
    </div>
    <!-- FOOTER END -->



    <!-- Modal untuk tambah data-->
    <div class="modal fade mt-5" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">TAMBAH DATA MAHASISWA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- FORM INPUT DATA -->
                <!-- action dikosongkan karena data akan dikirim ke tempat yang sama yaitu index -->
                <form action="" method="POST">
                    <div class="modal-body">
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
                            <label for="email" class="col-sm-3 col-form-label">E-MAIL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-md btn-info float-right">Tambah Data</button>
                    </div>
                </form>
                <!-- END FORM -->
            </div>
        </div>
    </div>

    <!--jQuery and Bootstrap Bundle -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>



</body>

</html>

<?php

// jika tombol dengan name tambah ditekan
if (isset($_POST['tambah'])) {
    // kirimkan data ke fungsi tambah dan cek apakah nilai yang dikembalikan lebih dari 1
    if (tambah($_POST) > 0) {
        // jika iya tampilkan alert
        echo    "<script>
                Swal.fire('SUCCESS','Berhasil Tambah Data','success').then(function() {
                    window.location = 'index.php';
                });;
            </script>";
    } else {
        // digunakan untuk menampilkan informasi error database
        echo mysqli_error($db);
    }
}


if (isset($_GET["hapus"])) {
    // ambil id pelangan
    $id = $_GET["hapus"];
    // kirimkan data ke fungsi hapus dan cek apakah nilai yang dikembalikan lebih dari 1
    if (hapus($id) > 0) {
        echo    "<script>
                Swal.fire('SUCCESS','Berhasil Hapus Data','success').then(function() {
                    window.location = 'index.php';
                });;
            </script>";
    } else {
        // digunakan untuk menampilkan informasi error database
        echo mysqli_error($db);
    }
}
?>