<?php

// class bisa didefinisikan sebagai folder dan dalam MVC itu bisa di definisikan sebagai controller nya
// dan function bisa di definisikan sebagai file, dalam mvc itu bisa didefinisikan sebagai method.

class About extends Controller
{
    public function index($nama = 'Ryan', $status = 'Siswa', $umur = '18')
    {

        // kita bisa mengirim data ke controller view untuk ditampilkan ke method yang akan dituju. 
        $data['nama'] = $nama;
        $data['status'] = $status;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';

        // memanggil data yang ada di dalam method getUser
        // yang ada didalam controller model
        $data['nama'] = $this->model('User_model')->getUser();

        // menampilkan data yang telah diterima $data
        $this->view('templates/header', $data);
        $this->view('about/index', $data);

        // menampilkan method yang ada dalam controller
        // mirip kayak require/include lah...
        $this->view('templates/footer');
    }

    // ini juga sama
    public function page()
    {
        $data['judul'] = 'Page saya';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
