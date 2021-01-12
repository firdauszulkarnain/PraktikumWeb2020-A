<?php

class Home_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getvendor()
    {
        $query = mysqli_query($this->db->koneksi, "SELECT * from user where role_id = 2");
        $result = $this->db->resultAll($query);
        return $result;
    }

    public function getuser($id_user)
    {
        $query = "SELECT user.*, user_role.nama_role as nama_role FROM user 
                JOIN user_role 
                ON user.role_id = user_role.id_role 
                WHERE user.id_user = '$id_user'";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    // FOTO SEMUA USER
    public function foto($data, $tmp)
    {
        $ukuranFile = $data["foto"]["size"];
        $temp = $data["foto"]["tmp_name"];
        $namaFile = $data["foto"]["name"];

        if ($namaFile == NULL) {
            return NULL;
            exit;
        }

        // Ekstensi Gambar
        $formatgambar = ['png', 'jpeg', 'jpg'];
        // Pecah Nama File
        $ekstensiGambar = explode('.', $namaFile);
        //AmbilEkstensi
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        //CEK Ekstensi Gambar
        if (!in_array($ekstensiGambar, $formatgambar)) {
            return false;
        }

        //CEK ukuran file
        if ($ukuranFile > 3000000) {
            return false;
        }

        //generate nama baru random
        $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

        // Inputkan Ke Library
        if ($tmp == 1) {
            $dir = '../public/assets/img/admin/';
        } else if ($tmp == 2) {
            $dir = '../public/assets/img/logovendor/';
        } else if ($tmp == 3) {
            $dir = '../public/assets/img/profile/';
        } else if ($tmp == 4) {
            $dir = '../public/assets/img/barang/';
        }

        $dest_path = $dir . $namaFileBaru;

        move_uploaded_file($temp, $dest_path);
        return $namaFileBaru;
    }

    public function carivendor($data)
    {
        $keyword = htmlspecialchars($data['keyword']);
        $query = "SELECT * FROM user WHERE  role_id = 2  AND nama_vendor LIKE '%$keyword%' ";
        $query = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($query);
        return $result;
    }
}
