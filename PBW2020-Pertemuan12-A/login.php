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
            <div class="col-md-5">
                <div class="card login warna shadow p-3 mb-5 rounded mt-5">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username" class="text-light">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-light">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="button" name="login">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="registrasi.php" class="text-light">Daftar Akun</a>
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
if (isset($_POST['login'])) {
    // ambil data pada form input login menggunakan method post
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // jika inputan kosong, tampilkan aler
    if (empty($username) || empty($password)) {
        echo    "<script>
                Swal.fire('Erorr','Form Tidak Boleh Kosong','error');
                </script>";
        exit;
    }

    // cek username, apakah ada di database
    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    // jika ada 
    if (mysqli_num_rows($result) == 1) {
        // ambil datanya
        $row = mysqli_fetch_assoc($result);
        // kemudian cek passwordnya sama atau tidak
        if ($password ==  $row['password']) {
            // kalo sama 
            //Set Session user
            $_SESSION['user'] = $row['id'];
            // tampilkan alert berhasil login
            echo    "<script>
                Swal.fire('Login Berhasil','','success').then(function() {
                    window.location = 'index.php';
                });;
            </script>";
        } else {
            // kalo gak sama, berarti passwordnya salah
            echo    "<script>
                Swal.fire('Login Gagal','Password Salah','warning').then(function() {
                    window.location = 'login.php';
                });;
            </script>";
        }
    } else {
        // kalo gak ada di database, berarti tidak ditemukan
        echo    "<script>
    Swal.fire('Login Gagal','Username Tidak Ditemukan','error').then(function() {
        window.location = 'login.php';
    });;
    </script>";
    }
} else {
    // digunakan untuk menampilkan informasi error database
    echo mysqli_error($db);
}

?>