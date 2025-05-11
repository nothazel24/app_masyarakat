<?php

class Siswa extends Controller
{
    public function index()
    {

        $data['judul'] = 'Daftar siswa';
        $data['sis'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {

        $data['judul'] = 'Detail siswa';
        $data['sis'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->view('templates/header', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) {

            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            // REDIRECT KE HALAMAN UTAMA APABILA DATA BERHASIL DITAMBAHKAN
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            // REDIRECT KE HALAMAN UTAMA APABILA DATA BERHASIL DITAMBAHKAN
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Siswa_model')->hapusDataSiswa($id) > 0) {

            Flasher::setFlash('berhasil', 'dihapus', 'success');
            // REDIRECT KE HALAMAN UTAMA APABILA DATA BERHASIL DITAMBAHKAN
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            // REDIRECT KE HALAMAN UTAMA APABILA DATA BERHASIL DITAMBAHKAN
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    

}
