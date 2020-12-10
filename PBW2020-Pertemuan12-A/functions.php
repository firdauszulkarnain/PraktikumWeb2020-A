<?php
// hubungkan dengan file koneksi sama validasi
require "koneksidb.php";
require "validasi.php";

function tambah($data)
{
    // ambil variabel yang menghubungkan database
    global $db;

    // simpan data yang diinputkan user
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);

    // lakukan validasi
    validasiNama($nama);
    validasiNim($nim);
    validasiemail($email);

    // query insert
    $query = "INSERT INTO data VALUES ('','$nama','$nim','$email')";
    mysqli_query($db, $query);

    // kembalikan berapa jumlah baris yang berubah
    return mysqli_affected_rows($db);
}


function hapus($id)
{
    global $db;

    // query delete
    $query = "DELETE FROM data WHERE id  = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function ubah($data)
{
    global $db;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);

    validasiNim($nim);
    validasiNama($nama);
    validasiemail($email);

    // query update
    $query = "UPDATE data SET nama = '$nama',nim = '$nim', email = '$email' WHERE id = $id ";
    mysqli_query($db, $query);
    // jika tidak terjadi perubahan data, data tetap disimpan
    if (mysqli_affected_rows($db) == 0) {
        echo    "<script>
                Swal.fire('Berhasil Simpan Data','Tidak Terjadi Perubahan Data','success').then(function() {
                window.location = 'index.php';
                });
                </script>";
    } else {
        return mysqli_affected_rows($db);
    }
}



function registrasi($data)
{
    global $db;
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $password2 = htmlspecialchars($data['password2']);
    // role pegawai
    $role_id = 2;

    validasiusername($username);
    validasipassword($password);

    //Cek Username apakah di database ada atau tidak
    $result = mysqli_query($db,  "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        Swal.fire('Erorr','Username Telah Digunakan','error');
        </script>";
        return false;
    }

    //Cek Konfirmasi Password sama atau tidak
    if ($password !== $password2) {
        echo "<script>
        Swal.fire('Erorr','Konfimarsi Password Salah','warning');
        </script>";
        return false;
    }


    //Tambah User Ke Database
    $query = "INSERT INTO user VALUES('','$username','$password', '$role_id')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
