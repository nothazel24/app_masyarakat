<?php

class Laporan_model
{

   private $table = 'pengaduan';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Mencari data berdasarkan tanggal
   public function getLaporanByDate($tgl_awal, $tgl_akhir)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tgl_pengaduan BETWEEN :tgl_awal AND :tgl_akhir');

      $this->db->bind(':tgl_awal', $tgl_awal);
      $this->db->bind(':tgl_akhir', $tgl_akhir);

      return $this->db->resultSet();
   }
}
