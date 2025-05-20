<?php

class Detail extends Controller
{
   public function detail()
   {
      if (!isset($_SESSION['username'])) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
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
         Flasher::setFlash('Anda Bukan Admin!', '', 'warning');
         header('Location: ' . BASEURL . '/petugas');
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

         if ($this->model('Petugas_model')->tambahDataPetugas($data)) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/detail/tambah');
            exit;
         } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
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
}
