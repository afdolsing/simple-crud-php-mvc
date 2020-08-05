<?php

class Mahasiswa_model{
    //database handler
    private $dbh;
    // statement untuk menyimpan query
    private $stmt;
    // koneksi dulu ke database
    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=php_mvc';

        try{
            $this->dbh = new PDO($dsn, 'root','');
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        // query untuk mendapatkan semua mahasiswa
        // ketika menggunakan PDO query harus di prepare terlebih dahulu
        $this->stmt = $this->dbh->prepare("SELECT * FROM tbl_mahasiswa");
        // dua kali query agar aman
        $this->stmt->execute();
        // ambil semua data
        return $this->stmt->fetchAll((PDO::FETCH_ASSOC));
    }
}