<?php

class Masyarakat_model
{
   private $table = 'masyarakat';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Mengambil data masyarakat dengan limit
   public function getAllMasyarakatPaginated($limit, $offset)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT :limit OFFSET :offset');
      $this->db->bind(':limit', $limit);
      $this->db->bind(':offset', $offset);
      $this->db->execute();

      return $this->db->resultSet();
   }

   //  Mengambil data total masyarakat
   public function getTotalMasyarakat()
   {
      $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
      $this->db->execute();

      return $this->db->single()['total'];
   }

   // Memilih data masyarakat berdasarkan NIK
   public function getMasyarakatByNik($nik)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nik=:nik');

      $this->db->bind(':nik', $nik);
      return $this->db->single();
   }

   public function getByUsername($username)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');

      $this->db->bind(':username', $username);
      return $this->db->single();
   }

   // SEARCH FUNCTION
   public function cariDataMasyarakat($keyword)
   {
      $keyword = $_POST['keyword'];

      // mencari berdasarkan nis
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nik LIKE :keyword');

      $this->db->bind(':keyword', "%$keyword%");
      return $this->db->resultSet();
   }

   // mengubah data siswa
   public function ubahDataMasyarakat($data)
   {
      if (!empty($data['password'])) {
         $this->db->query('UPDATE ' . $this->table . ' 
         SET nama = :nama, telp = :telp, username = :username, password = :password 
         WHERE nik = :nik');

         $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT)); // hashing
      } else {
         $this->db->query('UPDATE ' . $this->table . ' 
         SET nama = :nama, telp = :telp, username = :username 
         WHERE nik = :nik');
      }

      // binding data
      $this->db->bind(':nama', $data['nama']);
      $this->db->bind(':nik', $data['nik']);
      $this->db->bind(':telp', $data['telp']);
      $this->db->bind(':username', $data['username']);

      $this->db->execute();

      // JIKA BERHASIL DITAMBAHKAN AKAN MENGHASILKAN ANGKA 1
      return $this->db->rowCount();
   }

   // MENGHAPUS DATA
   public function hapusDataMasyarakat($nik)
   {
      try {
         $this->db->query('DELETE FROM ' . $this->table .  ' WHERE nik = :nik');
         $this->db->bind(':nik', $nik);

         $this->db->execute();
         return $this->db->rowCount();
      } catch (PDOException $e) {
         if ($e->getCode() == '23000') {
            return 'foreign_key_violation';
         } else {
            return false;
         }
      }
   }

   public function tambahDataMasyarakat($data) {
      $this->db->query('INSERT INTO ' . $this->table . ' (nama, username, password, telp, nik) VALUES (:nama, :username, :password, :telp, :nik)');

      $this->db->bind(':nama', $data['nama']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':telp', $data['telp']);
      $this->db->bind(':nik', $data['nik']);

      $this->db->execute();

      return $this->db->rowCount();
   }
   
} // Closing class tag
