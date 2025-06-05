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
            Flasher::setFlash('Semua field wajib diisi!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }

         if (!preg_match("/^[a-zA-Z ]*$/", $_POST['nama'])) {
            Flasher::setFlash('Nama hanya boleh Huruf dan Spasi!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }

         if (!preg_match("/^[a-zA-Z0-9_]+$/", $_POST['username'])) {
            Flasher::setFlash('Username hanya boleh Huruf, Angka, dan Underscore tanpa spasi!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }

         if (!ctype_digit($_POST["telp"])) {
            Flasher::setFlash('Nomor telpon hanya bisa diisi oleh angka!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }

         if (!ctype_digit($_POST["nik"])) {
            Flasher::setFlash('NIK hanya bisa diisi oleh angka!', '', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }

         if ($this->model('Masyarakat_model')->tambahDataMasyarakat($data)) {
            Flasher::setFlash('Akun berhasil', 'ditambahkan', 'success', 'notifikasi');
            header('Location: ' . BASEURL . '/login');
            exit;
         } else {
            Flasher::setFlash('NIK', 'Sudah dipakai!', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/registrasi');
            exit;
         }
      }
   }
}
