<?php

class Masyarakat extends Controller
{
   public function index()
   {
      if (!isset($_SESSION['username'])) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      $data['judul'] = 'Home Masyarakat';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar_masyarakat');
      $this->view('masyarakat/index', $data);
      $this->view('templates/footer');
   }

   // KIRIM PENGADUAN
   // public function kirimlaporan()
   // {
   //    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   //       $nik = $_POST['nik'] ?? '';
   //       $laporan = $_POST['laporan'] ?? '';
   //       $tanggal = $_POST['tanggal'] ?? '';
   //       $lokasi = $_POST['lokasi'] ?? '';

   //       // FILE UPLOAD MASS
   //       $ktpName = $_FILES['bukti']['name'];
   //       $ktpTmp = $_FILES['bukti']['tmp_name'];
   //       $ktpPath = BASEURL . '/uploads/img/' . basename($ktpName);

   //       if (move_uploaded_file($ktpTmp, $ktpPath)) {
   //          if ($this->model('Pengaduan_model')->simpanlaporan([
   //             'nik' => $nik,
   //             'laporan' => $laporan,
   //             'tanggal' => $tanggal,
   //             'lokasi' => $lokasi,
   //             'bukti' => $ktpPath,
   //          ])) {
   //             Flasher::setFlash('Laporan berhasil', 'dikirim!', 'success');
   //          } else {
   //             Flasher::setFlash('Laporan gagal', 'disimpan', 'danger');
   //          }
   //       } else {
   //          Flasher::setFlash('Upload file', 'gagal', 'danger');
   //       }

   //       header('Location: ' . BASEURL . '/masyarakat/laporan');
   //       exit;

   //    } else {
   //       $data['masyarakat'] = $this->model('Masyarakat_model')->getMasyarakatBySession();
   //       $this->view('templates/header', $data);
   //       $this->view('templates/sidebar_masyarakat');
   //       $this->view('masyarakat/laporan', $data);
   //       $this->view('templates/footer');
   //    }
   // }

   // public function laporan()
   // {
   //    $data['judul'] = 'Home Masyarakat';
   //    $data['masyarakat'] = $this->model('Masyarakat_model')->getMasyarakatBySession();

   //    $this->view('templates/header', $data);
   //    $this->view('templates/sidebar_masyarakat');
   //    $this->view('masyarakat/laporan', $data);
   //    $this->view('templates/footer');
   // }
}
