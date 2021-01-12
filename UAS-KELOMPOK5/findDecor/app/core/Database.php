<?php

class Database
{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "finddecor";

    public $koneksi;


    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);

        if (!$this->koneksi) {
            echo "Koneksi database mysql dan php GAGAL !";
        }
    }


    public function resultAll($query)
    {
        $rows = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
