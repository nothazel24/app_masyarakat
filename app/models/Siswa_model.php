<?php

class Siswa_model
{
    private $dbh; // database handler
    private $stmt;

    public function __construct()
    {
        // data source name (lokasi data hosting, dan nama database)
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        // TEST KONEKSI DATABASE
        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllSiswa()
    {
        // MEMASUKAN QUERY MENGGUNAKAN PDO 
        $this->stmt = $this->dbh->prepare('SELECT * FROM siswa');
        $this->stmt->execute();

        // MENGEMBALIKAN NILAI SEBAGAI ARRAY ASSOSIATIF
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
