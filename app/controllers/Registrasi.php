<?php

class Registrasi extends Controller
{
   public function index()
   {

      $data['judul'] = 'Registrasi';

      // Include data
      $this->view('templates/header', $data);
      $this->view('registrasi/index');
      $this->view('templates/footer');
   }

   public function daftarmasyarakat()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $data = [
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'telp' => $_POST['telp'],
            'nik' => $_POST['nik']
         ];

         if (trim($_POST['username']) === '' || trim($_POST['password']) === '' || trim($_POST['nama']) === '' || trim($_POST['telp']) === '' || trim($_POST['nik']) === '') {
            Flasher::setFlash('Semua field wajib diisi!', '', 'danger');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }

         if ($this->model('Masyarakat_model')->tambahDataMasyarakat($data)) {
            Flasher::setFlash('Akun berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/login');
            exit;
         } else {
            Flasher::setFlash('NIK', 'Sudah dipakai!', 'danger');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }
      }
   }
}
