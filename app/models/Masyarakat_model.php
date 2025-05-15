<?php

class Masyarakat_model
{
   private $table = 'masyarakat';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Menampilkan semua data masyarakat
   // public function getAllMasyarakat()
   // {
   //    $this->db->query('SELECT * FROM ' . $this->table);
   //    return $this->db->resultSet();
   // }

   // Mengambil data masyarakat dengan limit
   public function getAllMasyarakatPaginated($limit, $offset)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT :limit OFFSET :offset');
      $this->db->bind(':limit', $limit);
      $this->db->bind(':offset', $offset);
      $this->db->execute();

      return $this->db->resultSet();
   }

   // Mengambil data total masyarakat
   public function getTotalMasyarakat()
   {
      $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
      $this->db->execute();

      return $this->db->single()['total'];
   }

   // Memilih data masyarakat berdasarkan id
   public function getMasyarakatById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
      $this->db->bind('id', $id);
      return $this->db->single();
   }
}
