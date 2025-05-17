<?php

class Tanggapan_model
{

   private $table = 'tanggapan';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function tanggapan($id) {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengaduan = :id');
      $this->db->bind(':id', $id);

      return $this->db->single();
   }

   public function kirimTanggapan($id, $status, $tanggapan)
   {
      $this->db->query('UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id');
      $this->db->bind(':status', $status);
      $this->db->bind(':id', $id);
      $this->db->execute();

      $this->db->query('INSERT INTO ' . $this->table . ' (id_tanggapan, tgl_tanggapan, tanggapan) VALUES (:id, NOW(), :tanggapan)');
      $this->db->bind(':id', $id);
      $this->db->bind(':tanggapan', $tanggapan);

      return $this->db->execute();
   }

}
