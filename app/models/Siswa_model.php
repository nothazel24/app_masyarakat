<?php

class Siswa_model
{

    private $table = 'siswa';

    // MENDEFINISIKAN VARIABEL
    private $db;

    public function __construct()
    {
        // UNTUK MENGINSTANSIASI CLASS DATABASE
        // AGAR BISA MENGGUNAKAN SEMUA METHOD YANG ADA DI CLASS DATABASE
        $this->db = new Database;
    }

    // memilih semua data yang ada di dalam tabel
    public function getAllSiswa()
    {
        // SET QUERY
        $this->db->query('SELECT * FROM ' . $this->table);

        // MENGEMBALIKAN DATA UNTUK MENAMPILKAN SEMUA DATA YANG
        // ADA PADA FUNCTION RESULT SET DI FILE DATABASE.PHP
        return $this->db->resultSet();
    }

    // Memilih data siswa berdasarkan id
    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // memasukkan kolom baru/data baru ke dalam tabel
    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO siswa VALUES ('', :nama, :nis, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        // JIKA BERHASIL DITAMBAHKAN AKAN MENGHASILKAN ANGKA 1
        return $this->db->rowCount();
    }

    // menghapus data
    public function hapusDataSiswa($id)
    {
        $query = "DELETE FROM siswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        // JIKA BERHASIL DITAMBAHKAN, AKAN MENGHASILKAN ANGKA 1
        return $this->db->rowCount();
    }

    // mengubah data siswa
    public function ubahDataSiswa($data)
    {
        $query = "UPDATE siswa SET 
         nama = :nama,
         nis = :nis,
         email = :email,
         jurusan = :jurusan
         WHERE id = :id";

        $this->db->query($query);

        // binding data
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        // JIKA BERHASIL DITAMBAHKAN AKAN MENGHASILKAN ANGKA 1
        return $this->db->rowCount();
    }
    

    // Dibutuhkan
    public function cariDataSiswa()
    {
        $keyword = $_POST['keyword'];
        // mencari berdasarkan nis
        $query = "SELECT * FROM siswa WHERE nis LIKE :keyword";
        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
