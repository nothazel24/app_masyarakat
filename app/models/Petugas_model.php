<?php

class Petugas_model
{
   private $table = 'petugas';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Mengambil semua data petugas
   public function getAllPetugas()
   {
      $this->db->query('SELECT * FROM ' . $this->table);
      return $this->db->resultSet();
   }

   // Memilih data masyarakat berdasarkan id
   public function getPetugasById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
      $this->db->bind('id', $id);
      return $this->db->single();
   }
}
