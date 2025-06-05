<?php

class Login extends Controller
{
   public function index()
   {

      $data['judul'] = 'Login';

      // Include data
      $this->view('templates/header', $data);
      $this->view('login/index');
      $this->view('templates/footer');
   }

   public function userlogin()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $username = $_POST['username'];
         $password = $_POST['password'];

         $masyarakat = $this->model('Masyarakat_model')->getByUsername($username);
         $petugas = $this->model('Petugas_model')->getByUsername($username);

         // BEKAS DEBUG
         // echo "<pre>";
         // echo "Username: " . $username . "\n";
         // echo "Password Input: " . $password . "\n";
         // var_dump($petugas); // Lihat apakah data petugas ditemukan
         // if ($petugas) {
         //    echo "Hash in DB: " . $petugas['password'] . "\n";
         //    var_dump(password_verify($password, $petugas['password']));
         // }
         // echo "</pre>";
         // exit;

         if ($masyarakat && password_verify($password, $masyarakat['password'])) {
            $_SESSION['username'] = $masyarakat['username'];
            $_SESSION['nama'] = $masyarakat['nama'];
            $_SESSION['level'] = 'masyarakat';
            $_SESSION['nik'] = $masyarakat['nik'];

            header('Location: ' . BASEURL . '/masyarakat');
            exit;
         } elseif ($petugas && password_verify($password, $petugas['password'])) {

            $_SESSION['username'] = $petugas['username'];
            $_SESSION['nama_petugas'] = $petugas['nama_petugas'];
            $_SESSION['level'] = $petugas['level'];
            $_SESSION['id_petugas'] = $petugas['id_petugas'];


            switch ($petugas['level']) {
               case 'petugas':
                  header('Location: ' . BASEURL . '/petugas');
                  break;
               case 'admin':
                  header('Location: ' . BASEURL . '/petugas');
                  break;
               default:
                  Flasher::setFlash('Login gagal', 'Level tidak dikenali', 'danger', 'notifikasi');
                  header('Location: ' . BASEURL . '/login');
                  break;
            }

            exit;
         } else {
            Flasher::setFlash('Login gagal', 'Username atau Password salah!', 'danger', 'notifikasi');
            header('Location: ' . BASEURL . '/login');
            exit;
         }
      }
   }


   public function logout()
   {
      session_destroy();
      header('Location: ' . BASEURL . '/login');
      exit;
   }
}
