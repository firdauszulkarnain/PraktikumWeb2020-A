<?php

session_start();
if (isset($_SESSION['user'])) {
    $url = 'index.php';
    header("Location: $url");
    exit;
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
    <title>Pertemuan 11</title>
</head>

<body class="warna">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card warna shadow p-3 mb-5 rounded mt-5">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="text-light">REGISTRASI AKUN</h4>
                            <hr>
                        </div>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username" class="text-light">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="text-light">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password2" class="text-light">Konfirmasi Password</label>
                                        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="button" name="regis">Registrasi Akun</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login.php" class="text-light">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php

require 'functions.php';

if (isset($_POST['regis'])) {
    if (registrasi($_POST) > 0) {
        echo "
    <script>
        Swal.fire('Registrasi Berhasil','Silahkan Login Kembali','success').then(function() {
            window.location = 'login.php';
        });
    </script>";
    } else {
        // digunakan untuk menampilkan informasi error database
        echo mysqli_error($db);
    }
}

?>