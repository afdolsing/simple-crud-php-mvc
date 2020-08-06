<?php

class Mahasiswa_model{
    private $table = 'tbl_mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // cara lama tanpa Database wrapper
    // public function getAllMahasiswa()
    // {
    //     // query untuk mendapatkan semua mahasiswa
    //     // ketika menggunakan PDO query harus di prepare terlebih dahulu
    //     $this->stmt = $this->dbh->prepare("SELECT * FROM tbl_mahasiswa");
    //     // dua kali query agar aman
    //     $this->stmt->execute();
    //     // ambil semua data
    //     return $this->stmt->fetchAll((PDO::FETCH_ASSOC));
    // }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
}