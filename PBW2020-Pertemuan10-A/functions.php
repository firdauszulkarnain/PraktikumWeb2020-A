<?php
// Hubungkan dengan file validasi.php
require "validasi.php";
function tambah($data)
{

    // Ambil data-data yang dikirimkan melalui form sesuai dengan "name" masing-masing form
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);


    // validasi angka digunakan agar inputan pada form hanya menerima inputan angka
    validasiNim($nim);
    // validasi huruf digunakan agar inputan pada form hanya menerima inputan huruf
    validasiNama($nama);
    // Validasi Nilai UTS dan UAS
    validasiNilai($uts);
    validasiNilai($uas);

    // Jika session masih kosong
    if (empty($_SESSION["isi"])) {
        // maka isi jumlah session sebanyak 1
        $_SESSION["isi"] = 1;
    } else {
        // Jika sudah ada isinya, maka tambahkan isinya
        $_SESSION["isi"]++;
    }

    // Hitung jumlah nilai dan rata-rata nilai
    $jumnilai = $uts + $uas;
    $rata = $jumnilai / 2;

    // Simpan kedalam session web browser
    $_SESSION["data"][$_SESSION["isi"]] = array($nim, $nama, $uts, $uas, $jumnilai, $rata);
    // ubah variabel jumlah data sebanyak isi session

    // Kembalikan nilai 1 jika berhasil melakukan instruksi diatas
    return 1;
}
