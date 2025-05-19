<?php

class Petugas_model
{
   private $table = 'petugas';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Mengambil data Petugas dengan limit
   public function getAllPetugasPaginated($limit, $offset)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT :limit OFFSET :offset');
      $this->db->bind(':limit', $limit);
      $this->db->bind(':offset', $offset);
      $this->db->execute();

      return $this->db->resultSet();
   }

   // Mengambil data total Petugas
   public function getTotalPetugas()
   {
      $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
      $this->db->execute();

      return $this->db->single()['total'];
   }

   // Memilih data Petugas berdasarkan id
   public function getPetugasById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
      $this->db->bind('id', $id);
      return $this->db->single();
   }

   // SEARCH DATA PETUGAS
   public function cariDataPetugas($keyword)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username LIKE :keyword');

      $this->db->bind(':keyword', "%$keyword%");
      return $this->db->resultSet();
   }

   public function tambahDataPetugas($data)
   {
      $this->db->query('INSERT INTO ' . $this->table . ' (nama_petugas, username, password, telp, level) VALUES (:nama_petugas, :username, :password, :telp, :level)');

      $this->db->bind(':nama_petugas', $data['nama_petugas']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':telp', $data['telp']);
      $this->db->bind(':level', $data['level']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function ubahDataPetugas($data)
   {
      if (!empty($data['password'])) {
         $this->db->query('UPDATE ' . $this->table . ' 
         SET nama_petugas = :nama_petugas, telp = :telp, level = :level, username = :username, password = :password 
         WHERE id_petugas = :id_petugas');

         $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT)); // hashing
      } else {
         $this->db->query('UPDATE ' . $this->table . ' 
         SET nama_petugas = :nama_petugas, telp = :telp, level = :level,  username = :username 
         WHERE id_petugas = :id_petugas');
      }

      // binding data
      $this->db->bind(':nama_petugas', $data['petugas']);
      $this->db->bind(':id_petugas', $data['id_petugas']);
      $this->db->bind(':telp', $data['telp']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':level', $data['level']);

      $this->db->execute();

      // JIKA BERHASIL DITAMBAHKAN AKAN MENGHASILKAN ANGKA 1
      return $this->db->rowCount();
   }
}
