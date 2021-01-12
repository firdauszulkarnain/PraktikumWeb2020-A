<?php

class Vendor_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // INDEX VENDOR START
    public function update_profil($data, $id_user, $fotovendor)
    {
        $nama = htmlspecialchars($data['vendor']);
        $notelp = htmlspecialchars($data['notelp']);
        $alamat = htmlspecialchars($data['alamat']);
        $kecamatan = htmlspecialchars($data['kecamatan']);
        $kabupaten = htmlspecialchars($data['kabupaten']);
        $bni = htmlspecialchars($data['bni']);
        $bca = htmlspecialchars($data['bca']);
        $bri = htmlspecialchars($data['bri']);
        $deskripsi = htmlspecialchars($data['deskripsi']);

        $query = "UPDATE user SET nama_vendor = '$nama', foto_vendor = '$fotovendor', notelp = '$notelp', alamat = '$alamat', kecamatan = '$kecamatan', kabupaten = '$kabupaten', bni = '$bni', bca = '$bca', bri = '$bri', deskripsi_vendor = '$deskripsi'  WHERE id_user = $id_user";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }




    // BARANG STARTa
    public function getbarang($id_user)
    {
        $query = "SELECT * FROM barang WHERE vendor_id = '$id_user'";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }

    public function tambah_barang($data, $user_id, $foto)
    {
        $namabrg = htmlspecialchars($data['namabrg']);
        $hargabrg = htmlspecialchars($data['hargabrg']);
        $deskripsibrg = htmlspecialchars($data['deskripsibrg']);

        $query = "INSERT INTO barang (nama_barang, harga_barang, deskripsi_barang, vendor_id, foto) VALUES ('$namabrg','$hargabrg', '$deskripsibrg', $user_id, '$foto')";

        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }

    public function getdetailbrg($id_brg)
    {
        $query = "SELECT *  FROM barang  WHERE id_barang = $id_brg";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    public function update_barang($data, $id_barang, $foto)
    {
        $namabrg = htmlspecialchars($data['namabrg']);
        $hargabrg = htmlspecialchars($data['hargabrg']);
        $deskripsibrg = htmlspecialchars($data['deskripsibrg']);

        $query = "UPDATE barang SET nama_barang = '$namabrg', harga_barang = '$hargabrg', deskripsi_barang = '$deskripsibrg', foto = '$foto' WHERE id_barang = $id_barang ";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }



    // PEMBAYARAN
    public function getbayar($id_user)
    {
        $status = 'Menunggu Konfirmasi';
        $query = "SELECT * FROM pesanan WHERE vendor_id = '$id_user' AND status_pesanan = '$status'";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }

    public function update_pembayaran($data, $id_pesanan)
    {
        $status = $data['status'];
        $query = "UPDATE pesanan SET status_pesanan = '$status' WHERE id_pesanan = $id_pesanan";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }

    // PESANAN
    public function getpesan($id_user)
    {
        $query = "SELECT pesanan.*, user.nama as nama_customer, barang.nama_barang
        FROM pesanan JOIN barang 
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON pesanan.user_id = user.id_user
        WHERE pesanan.vendor_id = $id_user AND status_pesanan != 'Belum Bayar' AND status_pesanan != 'Selesai'";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }

    public function update_pesanan($data, $id_pesanan)
    {
        $status = $data['status'];
        $query = "UPDATE pesanan SET status_pesanan = '$status' WHERE id_pesanan = $id_pesanan";
        mysqli_query($this->db->koneksi, $query);

        if ($status == 'Selesai') {

            $query = "SELECT user_id, vendor_id FROM pesanan WHERE id_pesanan = $id_pesanan";
            $data = mysqli_query($this->db->koneksi, $query);
            $data = mysqli_fetch_assoc($data);
            $user_id = $data['user_id'];
            $vendor_id = $data['vendor_id'];
            $tgl_selesai = date('Y-m-d H:i:s');

            $query = "INSERT INTO invoice VALUES ('', $id_pesanan, $user_id, $vendor_id, '$tgl_selesai')";
            mysqli_query($this->db->koneksi, $query);
        }

        return mysqli_affected_rows($this->db->koneksi);
    }

    public function detail_pesanan($id_pesanan)
    {
        $query = "SELECT pesanan.*, user.nama as nama_customer, user.notelp, barang.nama_barang
        FROM pesanan JOIN barang 
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON pesanan.vendor_id = user.id_user
        WHERE id_pesanan = $id_pesanan";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    // INVOICE

    public function getinvoice($vendor_id)
    {
        $query = "SELECT invoice.*, pesanan.total_harga, pesanan.tgl_pesan, user.nama, barang.nama_barang
        FROM invoice JOIN pesanan 
        ON invoice.pesanan_id = pesanan.id_pesanan
        JOIN barang 
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON invoice.user_id = user.id_user
        WHERE invoice.vendor_id = $vendor_id";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }

    public function jadi_vendor($data, $id_user)
    {
        $nama = htmlspecialchars($data['nama_vendor']);
        $alamat = htmlspecialchars($data['alamat']);
        $kecamatan = htmlspecialchars($data['kecamatan']);
        $kabupaten = htmlspecialchars($data['kabupaten']);
        $bank = htmlspecialchars($data['bank']);
        $rekening = htmlspecialchars($data['rekening']);
        $role_id = 2;
        $foto = 'Default.jpg';

        $query = "UPDATE user SET nama_vendor = '$nama', alamat = '$alamat', kecamatan = '$kecamatan', kabupaten = '$kabupaten', $bank = '$rekening', foto_vendor = '$foto' , role_id = $role_id WHERE id_user = $id_user";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }
}
