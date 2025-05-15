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

   public function petugas($page = 1)
   {

      // Pagination
      $data['limit'] = 4;
      $data['offset'] = ($page - 1) * $data['limit'];


      $data['judul'] = 'Data Petugas';

      // Mengambil data masyarakat (paginated)
      $data['petugas'] = $this->model('Petugas_model')->getAllPetugasPaginated($data['limit'], $data['offset']);

      // Mengambil data masyarakat
      $data['total_petugas'] = $this->model('Petugas_model')->getTotalPetugas();

      $data['total_pages'] = ceil($data['total_petugas'] / $data['limit']);
      $data['current_page'] = $page;

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

   public function pengaduan($page = 1)
   {

      // Pagination
      $data['limit'] = 4;
      $data['offset'] = ($page - 1) * $data['limit'];


      $data['judul'] = 'Data Pengaduan';

      // Mengambil data masyarakat (paginated)
      $data['pengaduan'] = $this->model('Pengaduan_model')->getAllPengaduanPaginated($data['limit'], $data['offset']);

      // Mengambil data masyarakat
      $data['total_pengaduan'] = $this->model('Pengaduan_model')->getTotalPengaduan();

      $data['total_pages'] = ceil($data['total_masyarakat'] / $data['limit']);
      $data['current_page'] = $page;

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/pengaduan', $data);
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
