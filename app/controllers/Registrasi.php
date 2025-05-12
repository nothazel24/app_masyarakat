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
}