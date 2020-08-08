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
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id= :id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO tbl_mahasiswa
                    VALUES ('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        // jika berhasil akan menghasilkan angkas satu
        return $this->db->rowCount();
        
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM  " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data){
        $query = "UPDATE tbl_mahasiswa SET
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan          
                    WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        // jika berhasil akan menghasilkan angkas satu
        return $this->db->rowCount();
        
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tbl_mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}