<?php

class Masyarakat extends Controller
{
   public function index()
   {

      $data['judul'] = 'Home';

      // Include data
      $this->view('templates/header', $data);
      $this->view('masyarakat/index');
      $this->view('templates/footer');
   }

   public function laporan()
   {
      $data['judul'] = 'Laporan';

      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('masyarakat/laporan');
      $this->view('templates/footer');
   }
}
