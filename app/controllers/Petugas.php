<?php

class Petugas extends Controller
{
   public function index()
   {

      $data['judul'] = 'Dashboard';

      // $data['total_petugas'] = $this->model('Petugas_model')->getTotalPetugas();
      // $data['laporan'] = $this->model('Pengaduan_model')->getTotalPengaduan();

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/index', $data);
      $this->view('templates/footer');
   }


   // PAGINATION FOR ADMIN PAGE * Aduhh
   public function petugas($page = 1)
   {

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



   // Mengambil data laporan dari model berdasarkan permintaan dari pengguna
   public function laporan($tgl_awal = null, $tgl_akhir = null)
   {

      if (!$tgl_awal) $tgl_awal = date('Y-m-01'); // Default: awal bulan
      if (!$tgl_akhir) $tgl_akhir = date('Y-m-d'); // Default: hari ini

      $data['judul'] = 'Data Laporan';
      $data['laporan'] = $this->model('Laporan_model')->getLaporanByDate($tgl_awal, $tgl_akhir);

      // Include data
      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/laporan', $data);
      $this->view('templates/footer');
   }



   // MISC
   public function cari()
   {
      $data['judul'] = "NIK";

      // VALIDASI DATA KEYWORD
      if (!isset($_POST['keyword']) || empty(trim($_POST['keyword']))) {
         header("Location:http://localhost/mvc/public/petugas/masyarakat");
      } else {
         // MENYIMPAN DATA KEDALAM VARIABEL
         $data['masyarakat'] = $data['masyarakat'] = $this->model('Masyarakat_model')->cariDataMasyarakat();
      }

      $this->view('templates/header', $data);
      $this->view('templates/sidebar');
      $this->view('petugas/hasil', $data);
      $this->view('templates/footer');
   }

   public function detail($id)
   {

      $data['judul'] = 'Detail masyarakat';
      $data['masyarakat'] = $this->model('Masyarakat_model')->getMayarakatById($id);

      $this->view('templates/header', $data);
      $this->view('tamplates/sidebar');
      $this->view('petugas/detail', $data);
      $this->view('templates/footer');
   }
}
