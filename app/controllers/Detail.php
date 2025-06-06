<?php

class Detail extends Controller
{
   public function detail()
   {
      if (!isset($_SESSION['username']) || $_SESSION['level'] === 'admin' && $_SESSION['level'] === 'petugas') {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning', 'notifikasi');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      $data['judul'] = 'Detail';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('detail/detail');
      $this->view('templates/footer');
   }

   public function tambahpetugas()
   {
      if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
         Flasher::setFlash('Anda Bukan Admin!', '', 'warning', 'notifikasi');
         header('Location: ' . BASEURL . '/petugas/petugas');
         exit;
      }

      $data['judul'] = 'Tambah Petugas';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('edit/tambahPetugas');
      $this->view('templates/footer');
   }

   public function tambah()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $data = [
            'nama_petugas' => $_POST['nama_petugas'],
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'telp' => $_POST['telp'],
            'level' => $_POST['level']
         ];

         if (trim($_POST['username']) === '' || trim($_POST['password']) === '' || trim($_POST['nama_petugas']) === '' || trim($_POST['telp']) === '' || trim($_POST['level']) === '') {
            Flasher::setFlash('Semua field wajib diisi!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/detail/tambahpetugas');
            exit;
         }

         if ($this->model('Petugas_model')->tambahDataPetugas($data)) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'notifikasi');
            header('Location: ' . BASEURL . '/detail/tambah');
            exit;
         } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/detail/tambah');
            exit;
         }
      } else {
         $data['judul'] = 'Tambah Petugas';

         $this->view('templates/header', $data);
         $this->view('templates/sidebar');
         $this->view('edit/tambahPetugas');
         $this->view('templates/footer');
      }
   }

   public function laporan($id)
   {

      if (!isset($_SESSION['username'])) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning', 'notifikasi');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      $data['judul'] = 'Detail Data';
      $data['detail_tanggapan'] = $this->model('Tanggapan_model')->getTanggapanById($id);
      $data['detail_laporan'] = $this->model('Pengaduan_model')->getLaporanByid($id);

      if (!$data['detail_laporan']) {
         Flasher::setFlash('gagal', 'ditemukan', 'danger', 'notifikasi');
         header('Location: ' . BASEURL . '/masyarakat');
         exit;
      }

      $data['judul'] = 'Detail laporan';

      $this->view('templates/header', $data);
      $this->view('templates/sidebar_masyarakat');
      $this->view('masyarakat/detail', $data);
      $this->view('templates/footer');
   }
}
