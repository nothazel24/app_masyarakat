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

   public function masyarakat($page = 1)
   {
      
      // Pagination
      $data['limit'] = 4;
      $data['offset'] = ($page - 1) * $data['limit'];


      $data['judul'] = 'Data Masyarakat';

      // Mengambil data masyarakat (paginated)
      $data['masyarakat'] = $this->model('Masyarakat_model')->getAllMasyarakatPaginated($data['limit'], $data['offset']);

      // Mengambil data masyarakat
      $data['total_masyarakat'] = $this->model('Masyarakat_model')->getTotalMasyarakat();

      $data['total_pages'] = ceil($data['total_masyarakat'] / $data['limit']);
      $data['current_page'] = $page;


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
