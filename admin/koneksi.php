<?php

// $koneksi = mysqli_connect("localhost", "root", "", "tokobuku");

class database{
    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $database = "tokobuku";
    var $koneksi;

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->database);
    }

    function login($username, $password)
    {
        $query = mysqli_query($this->koneksi,"SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $data = $query->num_rows;
        if ($data==1) {
          $_SESSION['admin'] = $query->fetch_assoc();
          echo "<div class='alert alert-info'>Login Berhasil</div>";
          echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
        else {
          echo "<div class='alert alert-danger'>Login Gagal</div>";
          echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
    }

    function select_produk(){
        $query = mysqli_query($this->koneksi,"SELECT * FROM produk");
    }
}



?>