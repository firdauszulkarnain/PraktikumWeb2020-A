<?php

class Home extends Controller
{
    private $id_user;
    public function __construct()
    {
        if (isset($_SESSION['id_user'])) {
            $this->id_user = $_SESSION['id_user'];
            $data['user'] = $this->model('Home_model')->getuser($this->id_user);
            $role = $data['user']['nama_role'];
            if ($role == 'Admin') {
                header('Location: ' . BASE_URL . 'auth/blocked/' . $role);
                exit;
            }
        }
    }
    public function index()
    {

        $data['judul'] = 'Home';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['vendor'] = $this->model('Home_model')->getvendor();
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Home';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $data['vendor'] = $this->model('Home_model')->carivendor($_POST);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }

    public function about()
    {
        $data['judul'] = 'Tentang Kami';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('about/index');
        $this->view('template/footer');
    }

    public function privacy()
    {
        $data['judul'] = 'Privacy';
        $data['user'] = $this->model('Home_model')->getuser($this->id_user);
        $this->view('template/header', $data);
        $this->view('template/navbar', $data);
        $this->view('privacy/index');
        $this->view('template/footer');
    }
}
