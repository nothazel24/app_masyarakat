<?php

class Petugas extends Controller
{
   public function index()
   {
      if (!isset($_SESSION['username']) || ($_SESSION['level'] !== 'petugas' && $_SESSION['level'] !== 'admin')) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      $data['judul'] = 'Dashboard';
      $data['total_petugas'] = $this->model('Petugas_model')->getTotalPetugas();

      // LAPORAN
      $data['total_laporan'] = $this->model('Pengaduan_model')->getTotalPengaduan();
      $data['jumlah_proses'] = $this->model('Pengaduan_model')->getStatus('proses');
      $data['jumlah_selesai'] = $this->model('Pengaduan_model')->getStatus('selesai');

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/index', $data);
      $this->view('templates/footer');
   }


   // PAGINATION FOR ADMIN PAGE * Aduhh
   public function petugas($page = 1)
   {

      if (!isset($_SESSION['username']) || ($_SESSION['level'] !== 'petugas' && $_SESSION['level'] !== 'admin')) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      // Pagination
      $data['limit'] = 4;
      $data['offset'] = ($page - 1) * $data['limit'];


      $data['judul'] = 'Data Petugas';

      // Mengambil data masyarakat (paginated)
      $data['petugas'] = $this->model('Petugas_model')->getAllPetugasPaginated($data['limit'], $data['offset']);

      // Mengambil data masyarakat
      $data['total_petugas'] = $this->model('Petugas_model')->getTotalPetugas();

      $data['total_pages'] = ceil($data['total_petugas'] / $data['limit']);
      $data['current_page'] = $page;

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/petugas', $data);
      $this->view('templates/footer');
   }

   public function masyarakat($page = 1)
   {

      if (!isset($_SESSION['username']) || ($_SESSION['level'] !== 'petugas' && $_SESSION['level'] !== 'admin')) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      // Pagination
      $data['limit'] = 4;
      $data['offset'] = ($page - 1) * $data['limit'];


      $data['judul'] = 'Data Masyarakat';

      // Mengambil data masyarakat (paginated)
      $data['masyarakat'] = $this->model('Masyarakat_model')->getAllMasyarakatPaginated($data['limit'], $data['offset']);

      // Mengambil data masyarakat
      $data['total_masyarakat'] = $this->model('Masyarakat_model')->getTotalMasyarakat();

      $data['total_pages'] = ceil($data['total_masyarakat'] / $data['limit']);
      $data['current_page'] = $page;


      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/masyarakat', $data);
      $this->view('templates/footer');
   }

   public function pengaduan($page = 1)
   {

      if (!isset($_SESSION['username']) || ($_SESSION['level'] !== 'petugas' && $_SESSION['level'] !== 'admin')) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      // Pagination
      $data['limit'] = 4;
      $data['offset'] = ($page - 1) * $data['limit'];


      $data['judul'] = 'Data Pengaduan';

      // Mengambil data masyarakat (paginated)
      $data['pengaduan'] = $this->model('Pengaduan_model')->getAllPengaduanPaginated($data['limit'], $data['offset']);

      // Mengambil data masyarakat
      $data['total_pengaduan'] = $this->model('Pengaduan_model')->getTotalPengaduan();

      $data['total_pages'] = ceil($data['total_pengaduan'] / $data['limit']);
      $data['current_page'] = $page;

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/pengaduan', $data);
      $this->view('templates/footer');
   } // END 

   public function laporan($tgl_awal = null, $tgl_akhir = null)
   {

      if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
         Flasher::setFlash('Anda bukan admin!', '', 'warning');
         header('Location: ' . BASEURL . '/petugas');
         exit;
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $tgl_awal = $_POST['tgl_awal'];
         $tgl_akhir = $_POST['tgl_akhir'];
      }

      if (!$tgl_awal) $tgl_awal = date('Y-m-01'); // Default: awal bulan
      if (!$tgl_akhir) $tgl_akhir = date('Y-m-d'); // Default: hari ini

      $data['judul'] = 'Data Laporan';
      $data['laporan'] = $this->model('Pengaduan_model')->getPengaduanByDate($tgl_awal, $tgl_akhir);

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/laporan', $data);
      $this->view('templates/footer');
   }  // END * BUG LAPORAN


   // DETAIL LAPORAN BERDASARKAN ID
   public function detail($id)
   {

      if (!isset($_SESSION['username']) || ($_SESSION['level'] !== 'petugas' && $_SESSION['level'] !== 'admin')) {
         Flasher::setFlash('Anda harus login terlebih dahulu', '', 'warning');
         header('Location: ' . BASEURL . '/login');
         exit;
      }

      $data['judul'] = 'Detail Data';
      $data['detail_laporan'] = $this->model('Pengaduan_model')->getLaporanById($id);
      $data['tanggapan'] = $this->model('Tanggapan_model')->tanggapan($id);

      if (!$data['detail_laporan']) {
         Flasher::setFlash('gagal', 'ditemukan', 'danger');
         header('Location: ' . BASEURL . '/petugas/laporan');
         exit;
      }

      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/detail', $data);
      $this->view('templates/footer');
   }



   // MISC *******

   // CARI DATA BERDASARKAN * NIK, USERNAME DAN TANGGAL SIH..
   public function carimasyarakat()
   {
      // VALIDASI DATA KEYWORD
      if (!isset($_POST['keyword']) || empty(trim($_POST['keyword']))) {
         header("Location:http://localhost/mvc/public/petugas/masyarakat");
         exit;
      } else {
         $keyword = trim($_POST['keyword']);
         $result = $this->model('Masyarakat_model')->cariDataMasyarakat($keyword);
         $this->load('Masyarakat', 'masyarakat', $result);
      }
   }

   public function caripetugas()
   {
      // VALIDASI DATA KEYWORD
      if (!isset($_POST['keyword']) || empty(trim($_POST['keyword']))) {
         header("Location:http://localhost/mvc/public/petugas/petugas");
         exit;
      } else {
         $keyword = trim($_POST['keyword']);
         $result = $this->model('Petugas_model')->cariDataPetugas($keyword);
         $this->load('Petugas', 'petugas', $result);
      }
   }

   public function caripengaduan()
   {
      // VALIDASI DATA KEYWORD
      if (!isset($_POST['keyword']) || empty(trim($_POST['keyword']))) {
         header("Location:http://localhost/mvc/public/petugas/pengaduan");
         exit;
      } else {
         $keyword = trim($_POST['keyword']);
         $result = $this->model('Pengaduan_model')->cariDataPengaduan($keyword);
         $this->load('Pengaduan', 'pengaduan', $result);
      }
   }

   // LOAD HASIL
   private function load($judul, $dataTipe, $result)
   {
      $data['judul'] = $judul;
      $data[$dataTipe] = $result;

      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/hasil', $data);
      $this->view('templates/footer');
   } // END




   // Edit Data
   public function editmasyarakat($nik)
   {
      $result = $this->model('Masyarakat_model')->getMasyarakatByNik($nik);

      if (!$result) {
         Flasher::setFlash('gagal', 'ditemukan', 'danger');
         header('Location: ' . BASEURL . '/petugas/masyarakat');
         exit;
      }

      $this->edit('Masyarakat', 'masyarakat', $result);
   }

   public function editpetugas($id)
   {
      if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
         Flasher::setFlash('Anda bukan Admin!', '', 'warning');
         header('Location: ' . BASEURL . '/petugas');
         exit;
      }
      
      $result = $this->model('Petugas_model')->getPetugasById($id);

      if (!$result) {
         Flasher::setFlash('gagal', 'ditemukan', 'danger');
         header('Location: ' . BASEURL . '/petugas/petugas');
         exit;
      }

      $this->edit('Petugas', 'petugas', $result);
   }

   private function edit($judul, $dataTipe, $result)
   {
      $data['judul'] = $judul;
      $data[$dataTipe] = $result;

      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('edit/index', $data);
      $this->view('templates/footer');
   }



   // execute ubah data
   public function ubahmasyarakat()
   {
      if ($this->model('Masyarakat_model')->ubahDataMasyarakat($_POST) > 0) {
         Flasher::setFlash('berhasil', 'diubah', 'success');
      } else {
         Flasher::setFlash('gagal', 'diubah', 'danger');
      }

      header('Location: ' . BASEURL . '/petugas/masyarakat');
      exit;
   }

   public function ubahpetugas()
   {
      if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
         Flasher::setFlash('Anda bukan Admin!', '', 'warning');
         header('Location: ' . BASEURL . '/petugas');
         exit;
      }

      if ($this->model('Petugas_model')->ubahDataPetugas($_POST) > 0) {
         Flasher::setFlash('berhasil', 'diubah', 'success');
      } else {
         Flasher::setFlash('gagal', 'diubah', 'danger');
      }

      header('Location: ' . BASEURL . '/petugas/petugas');
      exit;
   }


   // Hapus data
   public function hapusmasyarakat($nik)
   {
      $result = $this->model('Masyarakat_model')->hapusDataMasyarakat($nik);

      $this->hapus('masyarakat', $result, '/petugas/masyarakat');
   }

   public function hapuspetugas($id)
   {
      $result = $this->model('Petugas_model')->hapusDataPetugas($id);

      $this->hapus('petugas', $result, '/petugas/petugas');
   }

   public function hapuspengaduan($id)
   {
      $result = $this->model('Pengaduan_model')->hapusDataPengaduan($id);

      $this->hapus('pengaduan', $result, '/petugas/pengaduan');
   }

   private function hapus($dataTipe, $result, $redirectUrl)
   {
      $data[$dataTipe] = $result;

      if ($result === 'foreign_key_violation') {
         Flasher::setFlash('Gagal', 'dihapus, karena masih digunakan di tabel lain', 'danger');
      } elseif ($result > 0) {
         Flasher::setFlash('Berhasil', 'dihapus', 'success');
      } else {
         Flasher::setFlash('Gagal', 'dihapus, data tidak ditemukan atau terjadi kesalahan lain', 'danger');
      }

      header('Location: ' . BASEURL . $redirectUrl);
      exit;
   }


   // TANGGAPAN
   public function tanggapi()
   {
      if (!isset($_POST['submit'])) {
         header('Location: ' . BASEURL . '/petugas/pengaduan');
         exit;
      }

      $id = $_POST['id_pengaduan'];
      $status = $_POST['status'];
      $tanggapan = $_POST['tanggapan'];

      if (empty($status) || empty($tanggapan)) {
         Flasher::setFlash('Semua field wajib diisi!', '', 'danger');
         header('Location: ' . BASEURL . '/petugas/detail' . $id);
         exit;
      }

      $this->model('Tanggapan_model')->kirimTanggapan($id, $status, $tanggapan);
      Flasher::setFlash('Tanggapan berhasil dikirim', '', 'success');
      header('Location: ' . BASEURL . '/petugas/pengaduan');
      exit;
   }
}
