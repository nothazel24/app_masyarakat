<aside class="sidebar d-flex flex-column justify-content-start p-3 col-md-3 col-lg-3 position-fixed shadow" style="width: 400px; background-color: #fefefe; min-height: 100vh;" id="sidebar">

   <div class="logo my-5 px-4">
      <h2><a href="#" target="_self" class=" text-dark font-weight-bold" style="text-decoration: none;">E-Report</a></h2>
      <div class="bg-info pl-1 pr-4 text-white font-weight-bold" style="height: fit-content; width: fit-content; font-size: 12px; margin-top: -5px;">make life easier.</div>
   </div>

   <div class="sidebarWrapper container-sm text-dark">

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

            <li>
               <a href="<?= BASEURL; ?>/petugas/" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%">
                  <img src="<?= BASEURL; ?>/assets/icons/home.svg" width="30" style="opacity: 75%">
                  Dashboard
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/pengaduan" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/pengaduan.svg" width="30" style="opacity: 75%">
                  Pengaduan
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/petugas" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/petugas.svg" width="30" style="opacity: 75%">
                  Petugas
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/masyarakat" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/masyarakat.svg" width="30" style="opacity: 75%">
                  Masyarakat
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/laporan" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/laporan_petugas.svg" width="30" style="opacity: 75%">
                  Laporan
               </a>
            </li>
         </ul>
      </div>

   </div> <!-- sidebarWrapper closing tag -->

   <br><br><br>

   <a href="<?= BASEURL; ?>/login/logout" target="_self" style="text-decoration: none;" class="mt-5 mx-2 d-flex flex-row justify-content-start align-items-center">
      <img src="<?= BASEURL; ?>/assets/icons/logout.svg" width="28">
      <b class="text-dark mx-2">Logout</b>
   </a>

</aside> <!-- sidebar closing tag-->