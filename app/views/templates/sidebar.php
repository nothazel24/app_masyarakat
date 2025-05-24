<aside class="sidebar d-flex flex-column justify-content-start p-3 col-md-3 col-lg-3 position-fixed" style="width: 400px; background-color: #4e17eb; min-height: 100vh;" id="sidebar">

   <div class="logo my-5 px-4 text-white">
      <h2><a href="#" target="_self" class="font-weight-bold text-white" style="text-decoration: none;">E-Report</a></h2>
   </div>

   <div class="sidebarWrapper container-sm text-white">

      <div class="userWrapper d-flex flex-row justify-content-start p-1 align-items-center">
         <img src="<?= BASEURL; ?>/assets/img/profile.jpg" alt="pfp" class="pfp rounded-circle m-2" width="50" height="50">

         <div class="userDetail container-sm d-flex flex-column text-start mt-3">
            <p class="font-weight-bold mb-0"><?= $_SESSION['nama_petugas']; ?></p>
            <p><em><?= $_SESSION['level'] ?? 'Undefined status'; ?></em></p>
         </div> <!-- userDetail closing tag-->
      </div> <!-- userWrapper closing tag -->


      <div class="menu-toggle ml-2">
         <p class="m-3" style="font-size: 19px;"><strong>Menu</strong></p>
         <ul type="none" class="my-4">

            <li class="my-3 d-flex flex-row justify-content-start align-items-center" style="gap: 10%;">
               <img src="<?= BASEURL; ?>/assets/icons/home.svg" width="30">
               <a href="<?= BASEURL; ?>/petugas/" class="text-white" style="text-decoration: none;">Dashboard</a>
            </li>

            <li class="my-3 d-flex flex-row justify-content-start align-items-center" style="gap: 10%;">
               <img src="<?= BASEURL; ?>/assets/icons/pengaduan.svg" width="30">
               <a href="<?= BASEURL; ?>/petugas/pengaduan" class="text-white" style="text-decoration: none;">Pengaduan</a>
            </li>

            <li class="my-3 d-flex flex-row justify-content-start align-items-center" style="gap: 10%;">
               <img src="<?= BASEURL; ?>/assets/icons/petugas.svg" width="30">
               <a href="<?= BASEURL; ?>/petugas/petugas" class="text-white" style="text-decoration: none;">Petugas</a>
            </li>

            <li class="my-3 d-flex flex-row justify-content-start align-items-center" style="gap: 10%;">
               <img src="<?= BASEURL; ?>/assets/icons/masyarakat.svg" width="30">
               <a href="<?= BASEURL; ?>/petugas/masyarakat" class="text-white" style="text-decoration: none;">Masyarakat</a>
            </li>

            <li class="my-3 d-flex flex-row justify-content-start align-items-center" style="gap: 10%;">
               <img src="<?= BASEURL; ?>/assets/icons/laporan_petugas.svg" width="30">
               <a href="<?= BASEURL; ?>/petugas/laporan" class="text-white" style="text-decoration: none;">Laporan</a>
            </li>
         </ul>
      </div>

   </div> <!-- sidebarWrapper closing tag -->

   <br><br><br>

   <div class="mt-5 mx-3 d-flex flex-row justify-content-start align-items-center" style="gap: 5%;">
      <img src="<?= BASEURL; ?>/assets/icons/logout.svg" width="28">
      <a href="<?= BASEURL; ?>/login/logout" target="_self" style="text-decoration: none;"><b class="text-white">Logout</b></a>
   </div>

</aside> <!-- sidebar closing tag-->