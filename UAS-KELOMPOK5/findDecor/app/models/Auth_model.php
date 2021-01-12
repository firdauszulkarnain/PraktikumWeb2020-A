<?php

class Auth_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }



    public function registrasi($data)
    {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $notelp = htmlspecialchars($data['notelp']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $password2 = htmlspecialchars($data['password2']);
        $foto = "Default.jpg";
        $role_id = 3;

        $result = mysqli_query($this->db->koneksi,  "SELECT email FROM user WHERE email = '$email'");
        if (mysqli_fetch_assoc($result)) {
            return false;
        }

        if ($password != $password2) {
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);



        $query = "INSERT INTO user (username, nama, email, notelp, role_id, foto, password) VALUES ('$username', '$nama', '$email', '$notelp', '$role_id', '$foto' , '$password')";


        mysqli_query($this->db->koneksi, $query);
        return mysqli_affected_rows($this->db->koneksi);
    }

    public function ceklogin($data)
    {
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $result = mysqli_query($this->db->koneksi, "SELECT * FROM user WHERE email = '$email'");

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {

                $_SESSION["id_user"] = $row['id_user'];
                $role_id = $row['role_id'];

                return $role_id;
            }
        }

        echo mysqli_error($this->db->koneksi);
    }
}
