<?php

class Petugas extends Controller
{
   public function index()
   {

      $data['judul'] = 'Dashboard';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/index');
      $this->view('templates/footer');
   }

   public function petugas()
   {

      $data['judul'] = 'Data Petugas';
      $data['petugas'] = $this->model('Petugas_model')->getAllPetugas();

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/petugas', $data);
      $this->view('templates/footer');
   }

   public function masyarakat()
   {

      $data['judul'] = 'Data Masyarakat';
      $data['masyarakat'] = $this->model('Masyarakat_model')->getAllMasyarakat();

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/masyarakat', $data);
      $this->view('templates/footer');
   }

   public function pengaduan()
   {

      $data['judul'] = 'Data Pengaduan';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/pengaduan');
      $this->view('templates/footer');
   }

   public function laporan()
   {

      $data['judul'] = 'Data Laporan';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/laporan');
      $this->view('templates/footer');
   }
}
