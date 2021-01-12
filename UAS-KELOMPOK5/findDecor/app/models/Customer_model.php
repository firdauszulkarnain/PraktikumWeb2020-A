<?php

class Customer_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function update_profil($data, $id_user, $foto)
    {
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $notelp = htmlspecialchars($data['notelp']);

        $query = "UPDATE user SET username = '$username', nama = '$nama', email = '$email', notelp = '$notelp', foto = '$foto' WHERE id_user = $id_user";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }

    public function update_sandi($data, $id_user)
    {
        $pass_lama = htmlspecialchars($data['password_lama']);
        $pass = htmlspecialchars($data['password1']);
        $pass2 = htmlspecialchars($data['password2']);

        $query = mysqli_query($this->db->koneksi, "SELECT * from user where id_user = $id_user");
        $data['user'] = mysqli_fetch_assoc($query);
        $pass_db = $data['user']['password'];
        if (!password_verify($pass_lama, $pass_db)) {
            return 0;
        } else if ($pass != $pass2) {
            return 0;
        } else {
            $password = password_hash($pass, PASSWORD_DEFAULT);
        }

        $query = "UPDATE user SET password = '$password'WHERE id_user = $id_user";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }

    public function detail_vendor($vendor_id)
    {
        $query = mysqli_query($this->db->koneksi, "SELECT * from user where id_user = $vendor_id");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    public function getbarang($vendor_id)
    {
        $query = mysqli_query($this->db->koneksi, "SELECT * from barang where vendor_id = $vendor_id");
        $result = $this->db->resultAll($query);
        return $result;
    }

    public function detail_barang($id_barang)
    {
        $query = "SELECT barang.*, user.nama_vendor, user.notelp, user.alamat, user.foto_vendor
                FROM barang JOIN user 
                ON barang.vendor_id = user.id_user
                WHERE id_barang = $id_barang";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    public function buatpesanan($data, $id_barang, $user_id)
    {
        $barang =  mysqli_query($this->db->koneksi, "SELECT * FROM barang where id_barang = $id_barang");
        $barang = mysqli_fetch_assoc($barang);
        $barang_id = $barang['id_barang'];
        $vendor_id = $barang['vendor_id'];
        $total = $barang['harga_barang'];

        $tgl_pinjam = htmlspecialchars($data['tglpinjam']);
        $tgl_kembali = htmlspecialchars($data['tglkembali']);
        $alamat = htmlspecialchars($data['alamat']);
        $kab = htmlspecialchars($data['kabupaten']);
        $kec = htmlspecialchars($data['kecamatan']);
        $catatan = htmlspecialchars($data['catatan']);
        $status = 'Belum Bayar';
        $tgl_pesan = date('Y-m-d H:i:s');

        $query = "INSERT INTO pesanan 
        (barang_id, vendor_id, total_harga, tgl_pesan, tgl_pinjam, tgl_kembali, user_id, alamat_kirim, kab_kirim, kec_kirim, catatan, status_pesanan) 
        VALUES ('$barang_id','$vendor_id', '$total','$tgl_pesan' , '$tgl_pinjam', '$tgl_kembali', '$user_id', '$alamat', '$kab', '$kec', '$catatan', '$status')";


        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }

    public function getbayar($id_user)
    {
        $status = 'Belum Bayar';
        $query = "SELECT pesanan.*, user.nama_vendor, barang.nama_barang
        FROM pesanan JOIN barang 
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON pesanan.vendor_id = user.id_user
        WHERE pesanan.user_id = $id_user AND status_pesanan = '$status'";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }

    public function detail_bayar($id_pesanan)
    {
        $query = "SELECT pesanan.*, barang.nama_barang, user.bca, user.bni, user.bri
        FROM pesanan JOIN barang 
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON pesanan.vendor_id = user.id_user
        WHERE id_pesanan = $id_pesanan";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    public function update_pembayaran($data, $id_pesanan)
    {
        $atasnama = htmlspecialchars($data['atasnama']);
        $bank = htmlspecialchars($data['bank']);
        $tgl_bayar = htmlspecialchars($data['tglbayar']);
        $status = "Menunggu Konfirmasi";

        $query = "UPDATE pesanan SET status_pesanan = '$status', atas_nama = '$atasnama', bank = '$bank', tgl_bayar = '$tgl_bayar' WHERE id_pesanan = $id_pesanan";
        mysqli_query($this->db->koneksi, $query);

        return mysqli_affected_rows($this->db->koneksi);
    }

    public function hapus_pesanan($id_pesanan)
    {
        $query = "DELETE FROM pesanan WHERE id_pesanan  = $id_pesanan";
        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }


    public function getpesan($id_user)
    {
        $status = 'Selesai';
        $query = "SELECT pesanan.*, user.nama_vendor, barang.nama_barang
        FROM pesanan JOIN barang
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON barang.vendor_id = user.id_user
        WHERE pesanan.user_id = $id_user AND pesanan.status_pesanan != '$status'";

        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }

    // INVOICE
    public function getinvoice($user_id)
    {
        $query = "SELECT invoice.*, pesanan.total_harga, pesanan.tgl_pesan, user.nama_vendor, barang.nama_barang
        FROM invoice JOIN pesanan 
        ON invoice.pesanan_id = pesanan.id_pesanan
        JOIN barang 
        ON pesanan.barang_id = barang.id_barang
        JOIN user 
        ON invoice.vendor_id = user.id_user
        WHERE invoice.user_id = $user_id";
        $result = mysqli_query($this->db->koneksi, $query);
        $result = $this->db->resultAll($result);
        return $result;
    }
}
