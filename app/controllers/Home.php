<?php

class Home extends Controller {
   public function index() {

      $data['judul'] = "Beranda";

      // Homepage views
      $this->view('templates/header', $data);
      $this->view('templates/navbar');
      $this->view('home/index');
      $this->view('templates/footer');
   }
}