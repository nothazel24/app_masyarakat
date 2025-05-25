<?php

class Tanggapan_model
{

   private $table = 'tanggapan';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function getTanggapanById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengaduan = :id_pengaduan');

      $this->db->bind(':id_pengaduan', $id);
      return $this->db->single();
   }

   public function tanggapan($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengaduan = :id');
      $this->db->bind(':id', $id);

      return $this->db->single();
   }

   public function kirimTanggapan($id, $status, $tanggapan)
   {
      // UPDATE STATUS PENGADUAN
      $this->db->query('UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id_pengaduan');
      $this->db->bind(':status', $status);
      $this->db->bind(':id_pengaduan', $id);
      $this->db->execute();

      // CEK TABEL TANGGAPAN
      $this->db->query('SELECT COUNT(*) as jml FROM ' . $this->table . ' WHERE id_pengaduan = :id_pengaduan');
      $this->db->bind(':id_pengaduan', $id);
      $result = $this->db->single();
      $count = $result['jml'];

      // CHECK APAKAH TABEL SUDAH ADA?
      if ($count > 0) {
         $this->db->query('UPDATE ' . $this->table . ' SET tgl_tanggapan = NOW(), tanggapan = :tanggapan, id_petugas = :id_petugas WHERE id_pengaduan = :id_pengaduan');
      } else {
         $this->db->query('INSERT INTO ' . $this->table . ' (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (:id_pengaduan, NOW(), :tanggapan, :id_petugas)');
      }

      $this->db->bind(':id_pengaduan', $id);
      $this->db->bind(':tanggapan', $tanggapan);
      $this->db->bind(':id_petugas', $_SESSION['id_petugas']);

      return $this->db->execute();
   }
}
