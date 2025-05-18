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
   
}
