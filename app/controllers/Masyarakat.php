<?php

class Masyarakat extends Controller
{
   public function index()
   {
      if (!isset($_SESSION['username'])) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning', 'notifikasi');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      $nik = $_SESSION['nik'];

      $data['judul'] = 'Home';
      $data['laporan'] = $this->model('Pengaduan_model')->getLaporanByNik($nik);

      $rekap = [
         'terverifikasi' => 0,
         'selesai' => 0,
         'proses' => 0,
      ];

      foreach ($data['laporan'] as $laporan) {
         if (isset($rekap[$laporan['status']])) {
            $rekap[$laporan['status']]++;
         }
      }

      // MENYIMPAN SESSION AGAR BISA DIPAKAI DI VIEW
      $_SESSION['laporan_rekap'] = $rekap;

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar_masyarakat');
      $this->view('masyarakat/index', $data);
      $this->view('templates/footer');
   }

   // KIRIM PENGADUAN
   public function kirimlaporan()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $nik = $_POST['nik'] ?? '';
         $laporan = $_POST['isi_laporan'] ?? '';
         $tanggal = $_POST['tgl_pengaduan'] ?? '';
         // $lokasi = $_POST['lokasi'] ?? '';

         // FILE UPLOAD BUKTI.
         $ktpName = uniqid('foto_', true) . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); // VALIDASI FILE TIPE .JPG/.PNG DAN ME-RENAME NYA AGAR TIDAK BENTROK

         $ktpTmp = $_FILES['foto']['tmp_name'];

         // PATH PENYIMPANAN FILE BUKTI
         $uploadDir = __DIR__ . '/../../public/uploads/img/';
         $ktpPath = $uploadDir . $ktpName;

         // LOKASI URL UNTUK DISIMPAN KEDALAM DATABASE
         $ktpPathUrl = BASEURL . '/uploads/img/' . $ktpName;

         if (trim($_POST['isi_laporan']) === '' || empty($_FILES['foto'])) {
            Flasher::setFlash('Semua field wajib diisi!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/masyarakat/laporan');
            exit;
         }

         if (move_uploaded_file($ktpTmp, $ktpPath)) {
            if ($this->model('Pengaduan_model')->simpanlaporan([
               'nik' => $nik,
               'isi_laporan' => $laporan,
               'tgl_pengaduan' => $tanggal,
               // 'lokasi' => $lokasi,
               'foto' => $ktpPathUrl,
               'status' => 'belum terverifikasi',
            ])) {
               Flasher::setFlash('Laporan berhasil', 'dikirim!', 'success', 'notifikasi');
            } else {
               Flasher::setFlash('Laporan gagal', 'disimpan', 'danger', 'notifikasi');
            }
         } else {
            Flasher::setFlash('Upload file', 'gagal', 'danger', 'notifikasi');
         }

         header('Location: ' . BASEURL . '/masyarakat');
         exit;
      } else {
         $data['masyarakat'] = $this->model('Masyarakat_model')->getMasyarakatBySession();
         $this->view('templates/header', $data);
         $this->view('templates/sidebar_masyarakat');
         $this->view('masyarakat/laporan', $data);
         $this->view('templates/footer');
      }
   }

   public function laporan()
   {
      $data['judul'] = 'Laporan';
      $data['masyarakat'] = $this->model('Masyarakat_model')->getMasyarakatBySession();

      $this->view('templates/header', $data);
      $this->view('templates/sidebar_masyarakat');
      $this->view('masyarakat/laporan', $data);
      $this->view('templates/footer');
   }
}
