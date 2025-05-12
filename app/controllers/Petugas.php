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

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/petugas');
      $this->view('templates/footer');
   }

   public function masyarakat()
   {

      $data['judul'] = 'Data Masyarakat';

      // Mengambil data masyarakat dengan variabel pagination
      $pagination = $this->model('Masyarakat_model')->getMasyarakatLimit(4);

      // Memastikan variabel pagination ada
      $pagination = $this->model('Masyarakat_model')->getMasyarakatLimit(5);

      $data['data'] = isset($pagination['data']) ? $pagination['data'] : [];
      $data['total_pages'] = isset($pagination['total_pages']) ? $pagination['total_pages'] : 1;
      $data['current_page'] = isset($pagination['current_page']) ? $pagination['current_page'] : 1;
      $data['total_data'] = isset($pagination['total_data']) ? $pagination['total_data'] : 0;
      $data['start'] = isset($pagination['start']) ? $pagination['start'] : 0;
      $data['limit'] = isset($pagination['limit']) ? $pagination['limit'] : 5;

      var_dump($data);

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
