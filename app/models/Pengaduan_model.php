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
      $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
      $this->db->execute();

      return $this->db->single()['total'];
   }

   public function getStatus($status)
   {
      $this->db->query('SELECT COUNT(*) AS total FROM ' . $this->table . ' WHERE status = :status');

      $this->db->bind(':status', $status);
      $this->db->execute();

      return $this->db->single()['total'];
   }


   // Mencari data berdasarkan tanggal
   public function getPengaduanByDate($tgl_awal, $tgl_akhir)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tgl_pengaduan BETWEEN :tgl_awal AND :tgl_akhir');

      $this->db->bind(':tgl_awal', $tgl_awal);
      $this->db->bind(':tgl_akhir', $tgl_akhir);

      return $this->db->resultSet();
   }


   // FUNCTION PAGE LAPORAN (*DIUBAH JADI LAPORAN, BIAR GAK PUSING. HEHE)
   public function getLaporanById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengaduan=:id_pengaduan');

      $this->db->bind(':id_pengaduan', $id);
      return $this->db->single();
   }

   // BUAT MENAMPILKAN HISTORY LAPORAN USER
   public function getLaporanByNik($nik)
   {
      $this->db->query('SELECT id_pengaduan, tgl_pengaduan, isi_laporan, status FROM ' . $this->table . ' WHERE nik = :nik ORDER BY tgl_pengaduan DESC');

      $this->db->bind(':nik', $nik);
      return $this->db->resultSet();
   }

   // BUAT MENGHITUNG JUMLAH LAPORAN USER
   public function getLaporanBySession($nik)
   {
      $this->db->query("
         SELECT SUM(status ='proses') AS proses, SUM(status ='proses') AS proses FROM pengaduan WHERE nik = :nik
      ");

      $this->db->bind(':nik', $nik);
      return $this->db->single();
   }


   // MISC *******

   // SEARCH DATA PETUGAS
   public function cariDataPengaduan($keyword)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tgl_pengaduan LIKE :keyword');

      $this->db->bind(':keyword', "%$keyword%");
      return $this->db->resultSet();
   }

   // MENGHAPUS DATA
   public function hapusDataPengaduan($id)
   {
      try {
         $this->db->query('DELETE FROM ' . $this->table .  ' WHERE id_pengaduan = :id_pengaduan');

         $this->db->bind(':id_pengaduan', $id);
         $this->db->execute();
         return $this->db->rowCount();
      } catch (PDOException $e) {
         if ($e->getCode() == '23000') {
            return 'foreign_key_violation';
         } else {
            return false;
         }
      }
   }

   // SIMPAN LAPORAN MASYARAKAT KE DATABASE 
   public function simpanlaporan($data)
   {
      $this->db->query('INSERT INTO ' . $this->table . ' (nik, isi_laporan, tgl_pengaduan, foto, status) VALUES (:nik, :isi_laporan, :tgl_pengaduan, :foto, :status)');

      $this->db->bind(':nik', $data['nik']);
      $this->db->bind(':isi_laporan', $data['isi_laporan']);
      $this->db->bind(':tgl_pengaduan', $data['tgl_pengaduan']);
      // $this->db->bind(':lokasi', $data['lokasi']);
      $this->db->bind(':foto', $data['foto']);
      $this->db->bind(':status', $data['status']);

      $result = $this->db->execute();
      return $result;
   }
} // CLOSING TAG
