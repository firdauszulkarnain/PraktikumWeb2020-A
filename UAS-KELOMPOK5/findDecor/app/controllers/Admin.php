<?php

class Admin extends Controller
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
        if ($role != 'Admin') {
            header('Location: ' . BASE_URL . 'auth/blocked/' . $role);
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Admin';
        $this->view('template/head-admin', $data);
        $this->view('admin/admin');
        $this->view('template/footer-admin');
    }

    public function profil_admin()
    {
        $data['judul'] = 'Profil';
        $data['admin'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/head-admin', $data);
        $this->view('admin/profil_admin', $data);
        $this->view('template/footer-admin');
    }

    public function update_profil()
    {
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $role = 1;
        $foto = $this->model('Home_model')->foto($_FILES, $role);
        if ($foto == NULL) {
            $foto = $data['user']['foto'];
        }
        if ($this->model('Admin_model')->update_profil($_POST, $this->id_user, $foto) > 0) {
            header('Location: ' . BASE_URL . '/admin/profil_admin');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/admin/profil_admin');
            exit;
        }
    }

    public function update_sandi()
    {
        if ($this->model("Home_model")->update_sandi($_POST, $this->id_user) > 0) {
            header('Location: ' . BASE_URL . '/admin');
            exit;
        }
    }

    public function data_vendor()
    {
        $data['judul'] = 'Data Vendor';
        $data['vendor'] = $this->model("Admin_model")->getvendor();
        $this->view('template/head-admin', $data);
        $this->view('admin/data_vendor', $data);
        $this->view('template/footer-admin');
    }

    public function hapusvendor($id_user)
    {
        if ($this->model("Admin_model")->hapususer($id_user) > 0) {
            header('Location: ' . BASE_URL . 'admin/data_vendor');
            exit;
        }
    }

    public function data_customer()
    {
        $data['judul'] = 'Data Customer';
        $data['customer'] = $this->model("Admin_model")->getcustomer();
        $this->view('template/head-admin', $data);
        $this->view('admin/data_customer', $data);
        $this->view('template/footer-admin');
    }

    public function hapuscustomer($id_user)
    {
        if ($this->model("Admin_model")->hapususer($id_user) > 0) {
            header('Location: ' . BASE_URL . 'admin/data_customer');
            exit;
        }
    }


    public function data_transaksi()
    {
        $data['judul'] = 'Data Transaksi';
        $data['invoice'] = $this->model('Admin_model')->getinvoice();
        $this->view('template/head-admin', $data);
        $this->view('admin/data_transaksi', $data);
        $this->view('template/footer-admin');
    }

    public function detail_transaksi()
    {
        $data['judul'] = 'Detail Transaksi';
        $this->view('template/head-admin', $data);
        $this->view('admin/detail_transaksi');
        $this->view('template/footer-admin');
    }



    public function daftar_barang()
    {
        $data['judul'] = 'Daftar Barang';
        $data['barang'] = $this->model('Admin_model')->getbarang();
        $this->view('template/head-admin', $data);
        $this->view('admin/daftar_barang', $data);
        $this->view('template/footer-admin');
    }
}
