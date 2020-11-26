<?php
session_start();

if (isset($_SESSION["isi"])) {
    $jumlah = $_SESSION["isi"];
} else {
    $jumlah = 0;
}


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
    <title>Pertemuan 10</title>
</head>

<body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info mb-5 p-3">
        <div class="container">
            <a class="navbar-brand text-light" href="#">INFORMATIKA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Button trigger modal -->
                    <a class="btn btn-light rounded-pill" href="tambah.php">Tambah Data Nilai</a>
                    <form action="reset.php" method="POST">
                        <button type="submit" class="btn btn-light rounded-pill ml-3" name="reset">Reset Data</button>
                    </form>
                </ul>
            </div>

        </div>
    </nav>
    <!--  NAVBAR END-->
    <!-- CONTENT START -->
    <div class="container mt-3 mb-5">
        <h1 class="text-center">DATA NILAI MAHASISWA</h1>
        <!-- d-flex justify-content-center digunakan agar content berada di tengah -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-12">
                <!-- membuat card atau box putih dengan box shadow -->
                <div class="card shadow-sm p-2 bg-white rounded">
                    <div class="card-body">
                        <?php if ($jumlah == 0) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Tidak Ada Data Yang Ditampilkan
                            </div>
                        <?php else : ?>
                            <!-- Buat Table -->
                            <table class="table">
                                <!-- Judul Tabel -->
                                <thead>
                                    <tr class="table">
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">UTS</th>
                                        <th scope="col">UAS</th>
                                        <th scope="col">Jumlah Nilai</th>
                                        <th scope="col">Rata-Rata</th>
                                    </tr>
                                </thead>
                                <!-- isi Tabel -->
                                <tbody>
                                    <!-- Perulangan sebanya jumlah data pada session -->
                                    <?php for ($i = 1; $i <= $jumlah; $i++) : ?>
                                        <tr>
                                            <!-- Tampilkan NIM -->
                                            <td><?= $_SESSION["data"][$i][0]; ?></td>
                                            <!-- Tampilkan NAMA -->
                                            <td><?= $_SESSION["data"][$i][1]; ?></td>
                                            <!-- Tampilkan Nilai UTS -->
                                            <td><?= $_SESSION["data"][$i][2]; ?></td>
                                            <!-- Tampilkan Nilai UAS -->
                                            <td><?= $_SESSION["data"][$i][3]; ?></td>
                                            <!-- Tampilkan Jumlah Nilai -->
                                            <td><?= $_SESSION["data"][$i][4]; ?></td>
                                            <!-- Tampilkan Rata-rata Nilai -->
                                            <td><?= $_SESSION["data"][$i][5]; ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>

                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- FOOTER START -->
    <div class="footer bg-info fixed-bottom">
        <div class="container">
            <!-- text-light agar text berwarna putih -->
            <p class="text-light text-center mt-3">&copy;FirdausZulkarnain</p>
        </div>
    </div>
    <!-- FOOTER END -->


    <!--jQuery and Bootstrap Bundle -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>



</body>

</html>