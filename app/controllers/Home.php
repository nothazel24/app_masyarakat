<?php

// class bisa didefinisikan sebagai folder dan dalam MVC itu bisa di definisikan sebagai controller nya
// dan function bisa di definisikan sebagai file, dalam mvc itu bisa didefinisikan sebagai method.

class Home extends Controller
{
    public function index()
    {

        // kita bisa mengirim data ke controller view untuk ditampilkan ke method yang akan dituju. 
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();

        // menampilkan data yang diterima $data.
        $this->view('templates/header', $data);

        // menampilkan method yang ada dalam controller
        // mirip kayak require/include lah...
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
