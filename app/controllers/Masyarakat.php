<?php

class Masyarakat extends Controller
{
   public function index()
   {

      $data['judul'] = 'Home Masyarakat';

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar_masyarakat');
      $this->view('masyarakat/index', $data);
      $this->view('templates/footer');
   }

   public function laporan()
   {
      $data['judul'] = 'Home Masyarakat';

      $this->view('templates/header', $data);
      $this->view('templates/sidebar_masyarakat');
      $this->view('masyarakat/laporan', $data);
      $this->view('templates/footer');
   }
}
