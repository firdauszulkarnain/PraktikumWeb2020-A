<?php

class Vendor extends Controller
{
    private $id_user;
    public function __construct()
    {
        if (isset($_SESSION['id_user'])) {
            $this->id_user = $_SESSION['id_user'];
        } else {
            header('Location: ' . BASE_URL . 'auth');
            exit;
        }

        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $role = $data['user']['nama_role'];
        if ($role == 'Admin') {
            header('Location: ' . BASE_URL . 'auth/blocked/' . $role);
            exit;
        }
    }
    private function cekrole()
    {
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        if ($data['user']['nama_role'] == 'Customer') {
            $this->daftar_vendor();
        }
    }
    // INDEX VENDOR START
    public function index()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/index', $data);
        $this->view('template/footer');
    }

    public function update_profil()
    {
        $this->cekrole();
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $role = 2;
        $foto = $this->model('Home_model')->foto($_FILES, $role);
        if ($foto == NULL) {
            $foto = $data['user']['foto_vendor'];
        }
        if ($this->model('Vendor_model')->update_profil($_POST, $this->id_user, $foto) > 0) {
            header('Location: ' . BASE_URL . '/vendor');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/vendor/update_profil');
            exit;
        }
    }


    // BARANG START
    public function daftar_barang()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['barang'] = $this->model('Vendor_model')->getbarang($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/daftar_barang', $data);
        $this->view('template/footer');
    }

    public function tambah_barang()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/tambah_barang');
        $this->view('template/footer');
    }

    public function simpan_barang()
    {
        $this->cekrole();
        $tmp = 4;
        $foto = $this->model('Home_model')->foto($_FILES, $tmp);
        if ($this->model('Vendor_model')->tambah_barang($_POST, $this->id_user, $foto) > 0) {
            header('Location: ' . BASE_URL . '/vendor/daftar_barang');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/vendor/tambah_barang');
            exit;
        }
    }

    public function detail_barang($id_barang)
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['barang'] = $this->model('Vendor_model')->getdetailbrg($id_barang);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/detail_barang', $data);
        $this->view('template/footer');
    }

    public function update_barang($id_barang)
    {
        $this->cekrole();
        $data['barang'] = $this->model('Vendor_model')->getdetailbrg($id_barang);
        $tmp = 4;
        $foto = $this->model('Home_model')->foto($_FILES, $tmp);
        if ($foto == NULL) {
            $foto = $data['barang']['foto'];
        }
        if ($this->model('Vendor_model')->update_barang($_POST, $id_barang, $foto) > 0) {
            header('Location: ' . BASE_URL . '/vendor/daftar_barang');
            exit;
        }
    }

    public function hapus_barang($id_barang)
    {
        if ($this->model('Vendor_model')->hapus_barang($id_barang) > 0) {
            header('Location: ' . BASE_URL . '/vendor/daftar_barang');
            exit;
        }
    }

    // PEMBAYARAN START
    public function pembayaran()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['bayar'] = $this->model('Vendor_model')->getbayar($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/pembayaran', $data);
        $this->view('template/footer');
    }

    public function update_pembayaran($id_pesanan)
    {
        if ($this->model('Vendor_model')->update_pembayaran($_POST, $id_pesanan) > 0) {
            header('Location: ' . BASE_URL . '/vendor/pesanan');
            exit;
        }
    }

    // PESANAN START
    public function pesanan()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['pesan'] = $this->model('Vendor_model')->getpesan($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/pesanan', $data);
        $this->view('template/footer');
    }

    public function detail_pesanan($id_pesanan)
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['pesan'] = $this->model('Vendor_model')->detail_pesanan($id_pesanan);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/detail_pesanan', $data);
        $this->view('template/footer');
    }

    public function update_pesanan($id_pesanan)
    {
        if ($this->model('Vendor_model')->update_pesanan($_POST, $id_pesanan) > 0) {
            header('Location: ' . BASE_URL . '/vendor/pesanan');
            exit;
        }
    }

    // INVOICE START
    public function invoice()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['invoice'] = $this->model('Vendor_model')->getinvoice($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/invoice', $data);
        $this->view('template/footer');
    }

    public function detail_invoice()
    {
        $this->cekrole();
        $data['judul'] = 'Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/detail_invoice');
        $this->view('template/footer');
    }

    // REGIS VENDOR
    public function daftar_vendor()
    {
        $data['judul'] = 'Daftar Vendor';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('vendor/daftar_vendor');
        $this->view('template/footer');
    }

    public function simpan_vendor()
    {
        if ($this->model('Vendor_model')->jadi_vendor($_POST, $this->id_user) > 0) {
            header('Location: ' . BASE_URL . 'vendor');
            exit;
        }
    }
}
