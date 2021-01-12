<?php

class Auth extends Controller
{
    private function cekuser()
    {
        if (isset($_SESSION['id_user'])) {
            $id_user = $_SESSION['id_user'];
            $data['user'] = $this->model('Home_model')->getuser($id_user);
            $tujuan = $data['user']['nama_role'];
            header('Location: ' . BASE_URL  . $tujuan);
            exit;
        }
    }

    public function index()
    {
        $this->cekuser();
        $data['judul'] = 'Login';
        $this->view('template/header', $data);
        $this->view('login');
    }

    public function ceklogin()
    {
        $this->cekuser();
        $login = $this->model("Auth_model")->ceklogin($_POST);
        if ($login == 1) {
            header('Location: ' . BASE_URL . '/admin');
            exit;
        } else if ($login == 2) {
            header('Location: ' . BASE_URL . '/vendor');
            exit;
        } else if ($login == 3) {
            header('Location: ' . BASE_URL . '/home');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }
    }

    public function registrasi()
    {
        $this->cekuser();
        $data['judul'] = 'Daftar';
        $this->view('template/header', $data);
        $this->view('daftar');
    }

    public function simpanregis()
    {
        $this->cekuser();
        if ($this->model("Auth_model")->registrasi($_POST) > 0) {
            header('Location: ' . BASE_URL . 'auth');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
        exit;
    }

    public function blocked($tujuan)
    {
        $data['judul'] = 'Access Blocked';
        $data['tujuan'] = $tujuan;
        $this->view('template/header', $data);
        $this->view('blocked', $data);
    }
}
