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

    public function getAllSiswa()
    {
        // SET QUERY
        $this->db->query('SELECT * FROM ' . $this->table);

        // MENGEMBALIKAN DATA UNTUK MENAMPILKAN SEMUA DATA YANG
        // ADA PADA FUNCTION RESULT SET DI FILE DATABASE.PHP
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

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

    public function hapusDataSiswa($id) {
        $query = "DELETE FROM siswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        // JIKA BERHASIL DITAMBAHKAN, AKAN MENGHASILKAN ANGKA 1
        return $this->db->rowCount();
    }
}
