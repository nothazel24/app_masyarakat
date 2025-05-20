<?php

class Tanggapan_model
{

   private $table = 'tanggapan';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function tanggapan($id)
   {
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

      $this->db->query('INSERT INTO ' . $this->table . ' (id_pengaduan, tgl_tanggapan, tanggapan) VALUES (:id_pengaduan, NOW(), :tanggapan)'); // TAMBAH :id_petugas *apabila sudah di session
      
      $this->db->bind(':id_pengaduan', $id);
      $this->db->bind(':tanggapan', $tanggapan);
      // BUAT NANTI
     //  $this->db->bind(':id_petugas', $_SESSION['id_petugas']);

      return $this->db->execute();
   }
}
