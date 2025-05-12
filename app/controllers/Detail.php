<?php

class Detail extends Controller
{
    public function detail()
    {

        $data['judul'] = 'Detail';

        // Include data
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('detail/detail');
        $this->view('templates/footer');
    }

    public function ubahData()
    {

        $data['judul'] = 'Detail';

        // Include data
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('detail/editData');
        $this->view('templates/footer');
    }

    public function tambahPetugas()
    {

        $data['judul'] = 'Tambah Petugas';

        // Include data
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('detail/tambahPetugas');
        $this->view('templates/footer');
    }
}