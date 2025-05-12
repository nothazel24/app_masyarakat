<?php

class Masyarakat_model
{
   private $table = 'masyarakat';
   private $db;

   // pagination
   public $page;
   public $start;
   private $total_data;
   public $total_pages;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function getMasyarakatLimit($limit = 4)
   {
      // konfigurasi pagination 
      $this->page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $this->start = ($this->page - 1) * $limit;

      // Query dari data tabel yang diberikan sebagai parameter
      $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT :start, :limit');
      $this->db->bind(':start', $this->start);
      $this->db->bind(':limit', $limit);

      // Menghitung total halaman untuk pagination
      $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
      $data = $this->db->single();
      $this->total_data = isset($data['total']) ? $data['total'] : 0;
      $this->total_pages = ceil($this->total_data / $limit);


      return [
         'data' => $this->db->resultSet(),
         'total_pages' => $this->total_pages,
         'curret_page' => $this->page,
         'total_data' => $this->total_data,
         'start' => $this->start,
         'limit' => $limit
      ];
   }

   // Memilih data masyarakat berdasarkan id
   public function getMasyarakatById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
      $this->db->bind('id', $id);
      return $this->db->single();
   }
}
