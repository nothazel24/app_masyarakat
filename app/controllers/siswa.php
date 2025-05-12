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

    // menangkap data yang dikirim oleh ajax
    public function getubah()
    {
        // menjalankan model dan menjalankan method getSiswaById, dan mengirimkan id menggunakan method post
        // json_encode disini berfungsi unruk mengubah array menjadi data json
        echo json_encode($this->model('Siswa_model')->getSiswaById($_POST['id']));
    }

    // menjalankan perintah ubah data
    public function ubah()
    {
        if ($this->model('Siswa_model')->ubahDataSiswa($_POST) > 0) {

            Flasher::setFlash('berhasil', 'diubah', 'success');
            // REDIRECT KE HALAMAN UTAMA APABILA DATA BERHASIL DITAMBAHKAN
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            // REDIRECT KE HALAMAN UTAMA APABILA DATA BERHASIL DITAMBAHKAN
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    // fucntion cari berdasarkan nis
    public function cari()
    {
        $data['judul'] = 'Daftar siswa';
        $data['sis'] = $this->model('Siswa_model')->cariDataSiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
}
