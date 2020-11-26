<!-- Alert Menggunakan SweetAlert2 JS -->
<?php

// Validasi Huruf
function validasiNama($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','Nama Tidak Boleh Kosong','error');
                </script>";
        exit;
        // Nama Hanya Boleh menggunakan Karakter Huruf dan Spasi, diluar dari itu akan menampilkan pesan error
    } else if (!preg_match("/^[a-zA-Z ]*$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','Nama Hanya Boleh Karakter Huruf','error');
                </script>";
        exit;
    }
}

// Validasi Angka
function validasiNim($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','NIM & NILAI Tidak Boleh Kosong','error');
                </script>";
        exit;
        // NIM hanya boleh menggunakan karakter angka, diluar dari itu akan menampilkan pesan error
    } else if (!preg_match("/^[0-9]+$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','NIM Hanya Boleh Angka','error');
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

function validasiNilai($data)
{
    // Jika Data Kosong tampilkan alert
    if (empty($data)) {
        echo    "<script>
                Swal.fire('Erorr','NILAI Tidak Boleh Kosong','error');
                </script>";
        exit;
        //Nilai hanya boleh menggunakan karakter angka dan titik, diluar dari itu akan menampilkan pesan error
    } else if (!preg_match("/^[0-9.]+$/", $data)) {
        echo    "<script>
                Swal.fire('Erorr','NILAI Hanya Boleh Angka','error');
                </script>";
        exit;
        // Range Nilai dimulai dari 0 - 100
    } else if ($data < 0 || $data > 100) {
        echo    "<script>
                Swal.fire('Erorr','Range Nilai Hanya Dari 0-100','error');
                </script>";
        exit;
    }
}

// Validasi menggunakan Regular Expression atau Regex dengan pola karakter tertentu