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

   // Memilih data masyarakat berdasarkan id
   public function getMasyarakatById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
      $this->db->bind('id', $id);
      return $this->db->single();
   }

   // SEARCH FUNCTION
   public function cariDataMasyarakat()
   {
      $keyword = $_POST['keyword'];
      
      // VALIDASI DATA
      if (empty(trim($keyword))) {
         return false;
      }

      // mencari berdasarkan nis
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nik LIKE :keyword');

      $this->db->bind(':keyword', "%$keyword%");
      return $this->db->resultSet();
   }
}
