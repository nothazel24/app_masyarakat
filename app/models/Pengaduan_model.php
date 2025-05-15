<?php

class Pengaduan_model
{

   private $table = 'pengaduan';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Mengambil data masyarakat dengan limit
   public function getAllPengaduanPaginated($limit, $offset)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT :limit OFFSET :offset');
      $this->db->bind(':limit', $limit);
      $this->db->bind(':offset', $offset);
      $this->db->execute();

      return $this->db->resultSet();
   }

   // Mengambil data total masyarakat
   public function getTotalPengaduan()
   {
      $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
      $this->db->execute();

      return $this->db->single()['total'];
   }
}
