<!-- Alert Menggunakan SweetAlert2 JS -->
<?php

// Validasi Huruf
function validasiusername($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','Username Tidak Boleh Kosong','warning');
                </script>";
        exit;
        // username hanya boleh huruf
    } else if (!preg_match("/^[a-zA-Z]*$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','Username Hanya Boleh Karakter Huruf Tanpa Spasi','warning');
                </script>";
        exit;
    }
}

// Validasi Angka
function validasipassword($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo   "<script>
                Swal.fire('Erorr','Password Tidak Boleh Kosong','warning');
                </script>";
        exit;
        // password bisa huruf sama angka
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','Password Hanya Huruf & Angka','warning');
                </script>";
        exit;
        // panjang password minimal lebih dari 6
    } else if (strlen($data) < 6) {
        echo    "<script>
                Swal.fire('Erorr','Minimal Password 6 Karakter','warning');
                </script>";
        exit;
    }
}

function validasiNim($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','NIM Tidak Boleh Kosong','warning');
                </script>";
        exit;
        // NIM hanya boleh menggunakan karakter angka, diluar dari itu akan menampilkan pesan error
    } else if (!preg_match("/^[0-9]+$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','NIM Hanya Boleh Angka','warning');
                </script>";
        exit;
        // Jumlah karakter NIM harus 10, jika tidak sama, maka tampilkan pesan error
    } else if (strlen($data) != 10) {
        echo    "<script>
                Swal.fire('Erorr','NIM Kurang Dari 10 Karakter','error');
                </script>";
        exit;
    }
}

function validasiNama($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','Nama Tidak Boleh Kosong','warning');
                </script>";
        exit;
        // Nama Hanya Boleh menggunakan Karakter Huruf dan Spasi, diluar dari itu akan menampilkan pesan error
    } else if (!preg_match("/^[a-zA-Z ]*$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','Nama Hanya Boleh Karakter Huruf','warning');
                </script>";
        exit;
    }
}

function validasiemail($data)
{
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','Email Tidak Boleh Kosong','warning');
                </script>";
        exit;
        // mengecek bahwa inputan merupakan email
    } else if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        echo    "<script>
                Swal.fire('Erorr','Email Salah','warning');
                </script>";
        exit;
    }
}
